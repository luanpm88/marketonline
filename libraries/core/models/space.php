<?php
class Spaces extends PbModel {
 	var $name = "Space";

 	function __construct()
 	{
 		parent::__construct();
 	}
 	
	function &getInstance() {
		static $instance = array();
		if (!$instance) {
			$instance[0] = new Spaces();
		}
		return $instance[0];
	}
	
	function getSpaceLinks($member_id, $company_id = 0)
	{
		$result = array();
		$condition = null;
		if (!empty($company_id)) {
			$condition = "AND company_id='{$company_id}'";
		}
		$sql = "SELECT id,title,url,is_outlink,description,logo,highlight FROM {$this->table_prefix}spacelinks s WHERE member_id='{$member_id}' {$condition} ORDER BY s.display_order ASC";
		$result = $this->dbstuff->GetArray($sql);//set and get db cache
		if (empty($result)) {
			return false;
		}else{
			for($i=0; $i<count($result); $i++){
				if (!$result[$i]['is_outlink']) {
					$result[$i]['url'] = URL.$result[$i]['url'];
				}
			}
		}
		return $result;
	}
	
	function getFriends_old($member_id, $company_id = 0)
	{
		global $rewrite_able;
		
		$result = array();
		$condition = null;
		//if (!empty($company_id)) {
		//	$condition = "AND company_id='{$company_id}'";
		//}
		
		uses("member");
		$member = new Members();
		$m = $member->read('referrer_id', $member_id);
		
		$sql = "SELECT s.*, c.shop_name as shop_name, c.picture as company_picture FROM {$this->table_prefix}members s LEFT JOIN {$this->table_prefix}companies c ON c.member_id = s.id WHERE referrer_id='{$member_id}' OR s.id='".$m["referrer_id"]."' {$condition} ORDER BY s.created DESC";
		$result = $this->dbstuff->GetArray($sql);//set and get db cache
		//var_dump($result);
		//return $sql;
		
			$returna = array();
			for($i=0; $i<count($result); $i++){
				//echo $result[$i]["shop_name"];
				if($result[$i]["shop_name"])
				{
					$result[$i]["image"] = pb_get_attachmenturl($result[$i]['company_picture'], '', 'smaller');
					
					if($rewrite_able)
						$result[$i]["link"] = URL.$result[$i]["space_name"];
					else
						$result[$i]["link"] = URL.'space/?userid='.$result[$i]["username"].'&do=';
						
					$returna[] = $result[$i];
				}
			}

		//var_dump($returna);
		return $returna;
	}
	
	function getFriends($member_id, $limit = 0)
	{
		global $rewrite_able;
		
		$result = array();
		$condition = null;
		if (!empty($limit)) {
			$limitstr = "LIMIT 0,".$limit;
		}
		
		uses("member");
		$member = new Members();
		$m = $member->read('referrer_id', $member_id);
		//echo "llll".$member_id."ssss";
		$sql = "SELECT s.*, c.shop_name as shop_name, c.picture as company_picture"
			." FROM {$this->table_prefix}members s"
			." LEFT JOIN {$this->table_prefix}links l ON l.member_id = s.id"
			." LEFT JOIN {$this->table_prefix}companies c ON c.member_id = l.member_id"
			." WHERE (l.parent_id='{$member_id}' OR s.id IN (SELECT parent_id FROM {$this->table_prefix}links r_l WHERE r_l.member_id='{$member_id}')) AND c.shop_name IS NOT NULL"
			//." OR s.id='{$member_id}' {$condition}"
			." ORDER BY s.created DESC {$limitstr}";
			$result = $this->dbstuff->GetArray($sql);//set and get db cache
			//var_dump($result);
		
			//$returna = array();
			for($i=0; $i<count($result); $i++){
				$result[$i]["image"] = pb_get_attachmenturl($result[$i]['company_picture'], '', 'smaller');
					
				if($rewrite_able)
					$result[$i]["link"] = URL.$result[$i]["space_name"];
				else
					$result[$i]["link"] = URL.'space/?userid='.$result[$i]["username"].'&do=';

			}

		return $result;
	}
	
	function getFriendsCount($member_id)
	{
		global $rewrite_able;
		
		$result = array();
		$condition = null;
		if (!empty($limit)) {
			$limitstr = "LIMIT 0,".$limit;
		}
		
		uses("member");
		$member = new Members();
		$m = $member->read('referrer_id', $member_id);
		//echo "llll".$member_id."ssss";
		$sql = "SELECT COUNT(s.id)"
			." FROM {$this->table_prefix}members s"
			." LEFT JOIN {$this->table_prefix}links l ON l.member_id = s.id"
			." LEFT JOIN {$this->table_prefix}companies c ON c.member_id = l.member_id"
			." WHERE (l.parent_id='{$member_id}' OR s.id IN (SELECT parent_id FROM {$this->table_prefix}links r_l WHERE r_l.member_id='{$member_id}')) AND c.shop_name IS NOT NULL"
			//." OR s.id='{$member_id}' {$condition}"
			." ORDER BY s.created DESC {$limitstr}";
		$result = $this->dbstuff->GetArray($sql);//set and get db cache
		
		return $result;
	}
	
	function getFollowFriends($member_id, $company_id = 0)
	{
		global $rewrite_able;
		
		$result = array();
		$condition = null;
		
		uses("member","follow");
		$member = new Members();
		$follow = new Follows();
		$fids = $follow->getFollowIDs($member_id);
		
		//var_dump($fids);
		
		$sql = "SELECT DISTINCT s.id, s.*, m.username, f.created as f_created  FROM {$this->table_prefix}companies s LEFT JOIN {$this->table_prefix}members m ON s.member_id = m.id INNER JOIN {$this->table_prefix}follows f ON f.member_id = m.id WHERE s.id IN (".implode(",", $fids).")";

		$result = $this->dbstuff->GetArray($sql);
		
		//usort($result, function($a, $b)
		//{
		//	return strcmp($b->f_created, $a->f_created);
		//});
		
		//var_dump($result);

		$returna = array();
		for($i=0; $i<count($result); $i++) {
			if($result[$i]["shop_name"])
			{
				$result[$i]["image"] = pb_get_attachmenturl($result[$i]['picture'], '', 'smaller');
				if($rewrite_able)
					$result[$i]["link"] = $result[$i]["cache_spacename"];
				else
					$result[$i]["link"] = URL.'space/?userid='.$result[$i]["username"].'&do=';
				$returna[] = $result[$i];
			}
		}

		return $returna;
	}
}
?>