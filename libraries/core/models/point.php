<?php
class Points extends PbModel {
	var $max_point = 100;
 	var $name = "Point";
 	var $rules = array("every", "once", "daily", "weekly", "monthly", "yearly");
 	var $actions = array(
 		"logging"=>array("rule"=>"daily","do"=>"inc","point"=>1),
		"invite"=>array("rule"=>"every","do"=>"inc","point"=>10),
		"connect_facebook"=>array("rule"=>"monthly","do"=>"inc","point"=>5),
		"checkout"=>array("rule"=>"monthly","do"=>"inc","point"=>10),
		"good_shop"=>array("rule"=>"monthly","do"=>"inc","point"=>5),
		"up"=>array("rule"=>"every","do"=>"inc","point"=>0),
		"down"=>array("rule"=>"every","do"=>"dec","point"=>0),
		"from_storage"=>array("rule"=>"every","do"=>"inc","point"=>0)
 	);
	
	function Points() {
		uses('setting');
		$setting = new Settings();
		
		$this->actions['invite']['point'] = $setting->getValue('point_invite');
		$this->actions['connect_facebook']['point'] = $setting->getValue('point_connect_facebook');
		$this->actions['checkout']['point'] = $setting->getValue('point_checkout');
		$this->actions['good_shop']['point'] = $setting->getValue('point_good_shop');
		
		parent::__construct();
	}
 	
 	function increase($point, $member_id)
 	{
 		$this->dbstuff->Execute("UPDATE {$this->table_prefix}members SET points=points+{$point} WHERE id={$member_id}");
		$this->updateMonthlyPoint($member_id);
 	}
 	
 	function decrease($point, $member_id)
 	{
 		$this->dbstuff->Execute("UPDATE {$this->table_prefix}members SET points=points-{$point} WHERE id={$member_id}");
		$this->updateMonthlyPoint($member_id);
 	}
 	
 	function checkIfCanUpdate($member_id, $rule, $action)
 	{
 		$conditions = array();
 		if (!empty($member_id)) {
 			$conditions[] = "member_id={$member_id}";
 		}
 		$today_timestamp = mktime(0, 0, 0, date("m"), date("d"), date("Y"));
 		switch ($rule) {
 			case "every":
 				return true;
 				break;
 			case "once":
 				$conditions[] =  "action_name='".$action."'";
 				break;
 			case "daily":
				$conditions[] =  "action_name='".$action."'";
 				$conditions[] = "created>".$today_timestamp;
 				break;
 			case "weekly":
				$conditions[] =  "action_name='".$action."'";
 				$conditions[] = "created>".($this->timestamp-7*86400);
 				break;
 			case "monthly":
				$conditions[] =  "action_name='".$action."'";
 				$conditions[] = "(MONTH(FROM_UNIXTIME(created)) = MONTH(NOW()) AND YEAR(FROM_UNIXTIME(created)) = YEAR(NOW()))";
 				break;
 			case "yearly":
				$conditions[] =  "action_name='".$action."'";
 				$conditions[] = "created>".($this->timestamp-365*86400);
 				break;
 			default:
 				break;
 		}
 		$this->setCondition($conditions);
 		$result = $this->dbstuff->GetRow("SELECT action_name,points,created FROM {$this->table_prefix}pointlogs".$this->getCondition());
		//var_dump($result);
 		if (!empty($result)) {
 			return false;
 		}else{
 			return true;
 		}
 	}
 	
 	function update($action, $member_id, $description = '', $cusom_point = 0)
 	{
 		if (array_key_exists($action, $this->actions) && !empty($member_id)) {
 			$rule = $this->actions[$action]['rule'];
 			$can_update = $this->checkIfCanUpdate($member_id, $rule, $action);
 			if($can_update){
 				$point = abs($this->actions[$action]['point']);
				if($cusom_point) {
					$point = $cusom_point;
				}
	 			switch ($this->actions[$action]['do']) {
	 				case "inc":
	 					$updated = $this->increase($point, $member_id);
	 					break;
	 				case "dec":
	 					$updated = $this->decrease($point, $member_id);
	 					break;
	 				default:
	 					break;
	 			}
	 			$sql = "INSERT INTO {$this->table_prefix}pointlogs (member_id,action_name,points,description,ip_address,created) VALUE ({$member_id},'".$action."',".$point.",'".$description."','".pb_get_client_ip('str')."',".$this->timestamp.")";
	 			$this->dbstuff->Execute($sql);
				return true;
 			}else{
 				return false;
 			}
 		}else{
 			return;
 		}
 	}
	
	function getMonthlyPoint($member_id,$month=null,$year=null) {
		$actions = array("logging","from_storage","checkout","invite","connect_facebook","good_shop","up","down");
		
		if(!$month) {
			$month = date('m');
		}
		if(!$year) {
			$year = date('Y');
		}
		
		$begining_time = strtotime("{$year}-{$month}-01 00:00:00");
		
		//$member = $this->dbstuff->GetRow("SELECT * FROM {$this->table_prefix}members WHERE id=".$member_id);
		
		$conditions = array("member_id=".$member_id);
		$conditions[] = "action_name IN ('".implode("','", $actions)."')";
		$conditions[] = "(MONTH(FROM_UNIXTIME(created)) = ".$month." AND YEAR(FROM_UNIXTIME(created)) = ".$year.")";
		$point = $this->dbstuff->GetRow("SELECT sum(points) as point FROM {$this->table_prefix}pointlogs WHERE ".implode(" AND ",$conditions));
		
		$point = $point["point"];
		
		if($point) {
			return $point;
		} else {
			return 0;
		}
		
	}
	
	function updateMonthlyPoint($member_id, $force = false) {		
		$point = $this->getMonthlyPoint($member_id);
		$this->dbstuff->Execute("UPDATE {$this->table_prefix}members SET points_monthly={$point} WHERE id={$member_id}");
	}
	
	function resetMonthlyPointNew() {
		uses('member');
		$memberdb = new Members();		
		$members = $memberdb->findAll("DISTINCT id,points_monthly,points_storage");
		
		$month = intval(date('m'));
		$year = intval(date('Y'));
		
		$prev_month = $month - 1;
		$prev_year = $year;
		if($prev_month == 0) {
			$prev_month = 12;
			$prev_year = $prev_year-1;
		}
		
		//echo $prev_month."/".$prev_year."=>".$month."/".$year;
		
		//Put addition points to storage
		foreach($members as $member) {
			
			$prev_point = $this->getMonthlyPoint($member["id"],$prev_month,$prev_year);
			
			$total = $prev_point+$member["points_storage"];
			
			//reset to 0
			if($prev_point > $this->max_point) {
				$store = $prev_point - $this->max_point;
				
				$points_monthly = 0;
				$storage = $member["points_storage"]+$store;
			} else {
				$points_monthly = 0;
				$storage = $member["points_storage"];			
			}
			
			//update from storage
			if($storage > $this->max_point) {
				$points_monthly = $this->max_point;
				$storage = $storage - $this->max_point;
			} else {
				$points_monthly = $storage;
				$storage = 0;
			}
			
			//echo $points_monthly."/".$storage."<br />";
			
			$this->dbstuff->Execute("UPDATE {$this->table_prefix}members SET points_storage={$storage}, points_storage_updated = '".date('Y-m-d H:i:s')."' WHERE id=".$member["id"]);
			if($points_monthly) {
				$this->update('from_storage',$member["id"],'',$points_monthly);				
			}
			$this->updateMonthlyPoint($member["id"]);
		}
		
		return count($members);
	}
	
	function getDetails($member_id) {
		//echo "SELECT * FROM {$this->table_prefix}pointlogs log WHERE member_id=".$member_id." AND (MONTH(FROM_UNIXTIME(log.created)) = ".date('m')." AND YEAR(FROM_UNIXTIME(log.created)) = ".date('m').") ORDER BY log.created";
		$logs = $this->dbstuff->GetArray("SELECT * FROM {$this->table_prefix}pointlogs log WHERE member_id=".$member_id." AND (MONTH(FROM_UNIXTIME(log.created)) = ".date('m')." AND YEAR(FROM_UNIXTIME(log.created)) = ".date('Y').") ORDER BY log.created");
		
		$total = 0;
		foreach($logs as $key => $item) {
			$logs[$key]["date"] = date('Y-m-d H:i:s',$item["created"]);
			$total += $item["points"];
		}
		
		return array("logs"=>$logs,"total"=>$total);
	}
	
	function updateAllMonthlyPoint() {
		uses('member');
		$memberdb = new Members();		
		$members = $memberdb->findAll("DISTINCT id,points_monthly,points_storage");
		
		foreach($members as $member) {
			//echo $member["id"];
			$point = $this->getMonthlyPoint($member["id"]);
			$this->dbstuff->Execute("UPDATE {$this->table_prefix}members SET points_monthly={$point} WHERE id=".$member["id"]);
		}
	}
}
?>