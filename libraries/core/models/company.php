<?php
class Companies extends PbModel {
 	var $name = "Company";
	var $configs = null;
	var $info = null;
	var $id;
 	var $validate = array(
		'name' => array('required' => true),
		//'description' => array( 'required' => true),
	);

 	function Companies()
 	{
 		parent::__construct();
 		$this->validate['name']['message'] = L("please_input_companyname");
 		$this->validate['description']['message'] = L("please_input_companydesc");
 	}
 	
 	function Validate($data)
 	{
		return true;
 		if (is_array($data)) {
 			foreach ($this->validate as $key=>$val) {
 				if (empty($data[$key])) {
 					return false;
 				}
 			}
 			return true;
 		}
 		return false;
 	}
 	
 	function initSearch()
 	{
 		if (isset($_GET['industryid'])) {
 			if (strpos($_GET['industryid'], ",")!==false) {
 				$this->condition[]= "Company.industry_id IN (".trim($_GET['industryid']).")";
 			} else {
	 			$industryid = intval($_GET['industryid']);
	 			$this->condition[]= "((Company.industries LIKE '".$industryid."')"
							." OR (Company.industries LIKE '%,".$industryid."')"
							." OR (Company.industries LIKE '".$industryid.",%')"
							." OR (Company.industries LIKE '%,".$industryid.",%'))";
 			}
 		}
 		if (isset($_GET['areaid'])) {
 			if (strpos($_GET['areaid'], ",")!==false) {
 				$this->condition[]= "Company.area_id IN (".trim($_GET['areaid']).")";
 			}else{
	 			$areaid = intval($_GET['areaid']);
	 			$this->condition[]= "Company.area_id='".$areaid."'";
 			}
 		}
 		if (isset($_GET['type'])) {
 			if ($_GET['type']=="commend") {
 				$this->condition[]="Company.if_commend='1'";
 			}
 		}
 		if(!empty($_GET['le'])){
 			$this->condition[]="Company.first_letter='".strtolower($_GET['le'])."'";
 		}
 		if(isset($_GET['typeid'])){
 			$this->condition[]="Company.type_id=".intval($_GET['typeid']);
 		}
 		if(isset($_GET['q'])) {
 			$searchwords = urldecode($_GET['q']);
 			$this->condition[]= "Company.name like '%".$searchwords."%'";
 		}
 		if (isset($_GET['main_prod'])) {
 			$this->condition[]= "Company.main_prod='".$_GET['main_prod']."'";
 		}
 		if (!empty($_GET['total_count'])) {
 			$this->amount = intval($_GET['total_count']);
 		}else{
 			$this->amount = $this->findCount();
 		}
 		if (!empty($_GET['orderby'])) {
 			switch ($_GET['orderby']) {
 				case "dateline":
 					$this->orderby = "created DESC";
 					break;
 				default:
 					break;
 			}
 		} else {
			$this->orderby = "created DESC";
		}
		
		if(!empty($_GET['membertype_id'])){
 			$this->condition[]="m.membertype_id='".intval($_GET['membertype_id'])."'";
 		}
		if(!empty($_GET['membergroup_id'])){
 			$this->condition[]="m.membergroup_id='".intval($_GET['membergroup_id'])."'";
 		}
 	}
 	
 	function Search($firstcount, $displaypg)
 	{
 		global $cache_types;
 		uses("space","industry","area");
 		$space = new Space();
 		$area = new Areas();
 		$industry = new Industries();
 		$cache_options = cache_read('typeoption');
 		$area_s = $space->array_multi2single($area->getCacheArea());
 		$industry_s = $space->array_multi2single($industry->getIndustry());
		
		$joins = array("LEFT JOIN {$this->table_prefix}members AS m ON m.id = Company.member_id");
		
 		$result = $this->findAll("Company.*,Company.name AS title,Company.description AS digest", $joins, null, $this->orderby, $firstcount, $displaypg);
		if (!isset($_PB_CACHE['membergroup'])) {
			$_PB_CACHE['membergroup'] = cache_read("membergroup");
		}
 		while(list($keys,$values) = each($result)){
 			$r = array();
 			$result[$keys]['pubdate'] = df($values['created']);
 			$result[$keys]['typename'] = $cache_options['manage_type'][$values['manage_type']];
 			$result[$keys]['thumb'] = $result[$keys]['logo'] = pb_get_attachmenturl($values['picture'], '', 'small');
 			$result[$keys]['gradeimg'] = URL.'images/group/'.
 			$_PB_CACHE['membergroup'][$result[$keys]['cache_membergroupid']]['avatar'];
 			$result[$keys]['gradename'] = $_PB_CACHE['membergroup'][$result[$keys]['cache_membergroupid']]['name'];
 			if (!empty($result[$keys]['area_id'])) {
 				$r[] = $area_s[$result[$keys]['area_id']];
 			}
 			if (!empty($result[$keys]['industry_id'])) {
 				$r[] = $industry_s[$result[$keys]['industry_id']];
 			}
 			$r[] = L("integrity_index", "tpl")."(".$result[$keys]['cache_credits'].")";
 			if (!empty($r)) {
 				$result[$keys]['extra'] = implode(" - ", $r);
 			}
 			$result[$keys]['url'] = $space->rewrite($values['member_id'], $values['id']);
 		}
 		return $result;
 	}
 	
 	function setInfo($info)
 	{
 		$this->info = $info;
 	}
 	
 	function getInfo()
 	{
 		return $this->info;
 	}
 	
 	function setId($id)
 	{
 		$this->id = $id;
 		$info = null;
 		$info = $this->getInfoById($id);
 		$this->setInfo($info);
 	}
 	
 	function getId()
 	{
 		return $this->id;
 	}
 	
 	function setInfoById($company_id)
 	{
 		$result = array();
 		$sql = "SELECT c.* FROM {$this->table_prefix}companies c WHERE c.id='{$company_id}'";
 		$result = $this->dbstuff->GetRow($sql);
 		$this->info = $result;
 	}
 	
 	function setInfoByMemberId($member_id)
 	{
 		$return = $field_info = array();
 		$sql = "SELECT c.* FROM {$this->table_prefix}companies c WHERE c.member_id='{$member_id}'";
 		$result = $this->dbstuff->GetRow($sql);
 		if (!empty($result)) {
 			$field_info = $this->dbstuff->GetRow("SELECT * FROM {$this->table_prefix}companyfields WHERE company_id=".$result['id']);
 		}
 		$this->info = array_merge($result, $field_info);
 	} 	
 	
 	function setInfoBySpaceName($user_id)
 	{
 		$return = $field_info = array();
 		$sql = "SELECT c.* FROM {$this->table_prefix}companies c WHERE c.cache_spacename='{$user_id}'";
 		$result = $this->dbstuff->GetRow($sql);
 		if (empty($result) || !$result) {
 			$user_id = rawurldecode($user_id);
 			$sql = "SELECT c.* FROM {$this->table_prefix}companies c WHERE c.name='{$user_id}'";
 			$result = $this->dbstuff->GetRow($sql);
 			if (!empty($result)) {
 				$field_info = $this->dbstuff->GetRow("SELECT * FROM {$this->table_prefix}companyfields WHERE company_id=".$result['id']);
 			}else{
 				return false;
 			}
 		}else{
 			$field_info = $this->dbstuff->GetRow("SELECT * FROM {$this->table_prefix}companyfields WHERE company_id=".$result['id']);
 		}
 		$return = array_merge($result, $field_info);
 		$this->info = $result; 		
 	}
 	
 	function Delete($ids, $conditions = array())
	{
		$condition = array();
		if (is_array($ids)) {
			$condition[] = "id IN (".implode(",", $ids).")";
		}else{
			$condition[] = "id=".$ids;
		}
		$condition = am($condition, $conditions);
		$this->setCondition($condition);
		$this->dbstuff->Execute("DELETE FROM {$this->table_prefix}companies,{$this->table_prefix}companyfields USING {$this->table_prefix}companies LEFT JOIN {$this->table_prefix}companyfields ON {$this->table_prefix}companyfields.company_id={$this->table_prefix}companies.id ".$this->getCondition());
		return true;
	}

	function getCompanyInfo($companyid, $memberid = null)
	{
		$sql = "SELECT * FROM ".$this->getTable(true)." WHERE 1 ";
		if(!is_null($memberid)) $sql.=" AND member_id=".$memberid;
		if(!is_null($companyid)) $sql.=" AND id=".$companyid;
		$res = $this->dbstuff->GetRow($sql);
		
		return $res;
	}

	function statCompany()
	{
		$sql = "select type_id,count(Company.id) as Amount from ".$this->getTable(true)." group by Company.type_id";
		$return = $this->dbstuff->GetAll($sql);
		foreach ($return as $key=>$val) {
			$m[$val['type_id']] = $val['Amount'];
		}
		if($return) $m['sum'] = array_sum($m);
		return $m;
	}

	function update($posts, $action=null, $id=null, $tbname = null, $conditions = null){
		global $data;
		if(isset($data['Templet']['title'])){
			$cfg['templet_name'] = $data['Templet']['title'];
			$posts['configs'] = serialize($cfg);
		}
		return $this->save($posts, $action, $id, $tbname, $conditions);
	}

	function getTempletName($configs){
		$cfgs = unserialize($configs);
		return $cfgs['templet_name'];
	}

	function setConfigs($configs){
		$cfgs = unserialize($configs);
		$this->configs = $cfg;
	}

	function getConfigs(){
		return $this->configs;
	}

	function checkStatus($company_id)
	{
		$sql = "SELECT status FROM {$this->table_prefix}companies WHERE id='".$company_id."'";
		$c_status = $this->dbstuff->GetRow($sql);
		if (!$c_status['status'] || empty($c_status['status'])) {
			flash("company_checking", "company.php");
		}
	}
	
	function newCheckStatus($status)
	{
		if (!$status || empty($status)) {
			flash("company_checking", "company.php");
		}
	}
	
	function getInfoById($company_id)
	{
		uses("area", "space");
 		$area = new Areas();
		$space = new Space();
		
		$sql = "SELECT link.parent_id,c.*,c.name as companyname,tel AS link_tel,cf.* FROM {$this->table_prefix}companies c LEFT JOIN {$this->table_prefix}companyfields cf ON c.id=cf.company_id LEFT JOIN {$this->table_prefix}links link ON c.member_id=link.member_id WHERE c.id={$company_id}";
		$result = $this->dbstuff->GetRow($sql);
		
		if($result)
		{
			$result["address"] = $result["address"].", ".$area->getFullName($result["area_id"]);
			
			list(,$telcode, $telzone, $tel) = $this->splitPhone($result['tel']);
			list(,$faxcode, $faxzone, $fax) = $this->splitPhone($result['fax']);
			if($telcode != '000' && $telzone != '' && $tel != '')
			{
				$result['tel'] = '('.$telcode.') '.$telzone.'.'.substr($tel, 0, 4)." ".substr($tel, 4);
			}
			else
			{
				$result['tel'] = '';
			}
			if($faxcode != '000' && $faxzone != '' && $fax != '')
			{
				$result['fax'] = '('.$faxcode.') '.$faxzone.'.'.substr($fax, 0, 4)." ".substr($fax, 4);
			}
			else
			{
				$result['fax'] = '';
			}
			
			if (empty($result['picture'])) {
				$result['logo'] = pb_get_attachmenturl('', '', 'smaller');
			}else{
				$result['logo'] = pb_get_attachmenturl($result['picture'], '', 'smaller');
				$result['logosmall'] = pb_get_attachmenturl($result['picture'], '', 'small');
				$result['logobig'] = pb_get_attachmenturl($result['picture'], '', '');
			}
			
			$result['url'] = $space->rewrite($result["cache_spacename"]);
			
			$result["site_url_name"] = str_replace('http://', '', $result["site_url"]);
			$result["site_url_name"] = str_replace('https://', '', $result["site_url_name"]);
		}
		
		$this->info = $result;
		return $result;
	}
	
	function getInfoByUserId($id)
	{
		uses("area", "space");
 		$area = new Areas();
		$space = new Space();
		
		$sql = "SELECT c.*,c.name as companyname,tel AS link_tel,cf.*,m.membertype_id FROM {$this->table_prefix}companies c LEFT JOIN {$this->table_prefix}companyfields cf ON c.id=cf.company_id LEFT JOIN {$this->table_prefix}members m ON m.id=c.member_id WHERE c.member_id={$id}";
		$result = $this->dbstuff->GetRow($sql);
		
		if($result)
		{
			$result["address"] = $result["address"].", ".$area->getFullName($result["area_id"]);
			
			list(,$telcode, $telzone, $tel) = $this->splitPhone($result['tel']);
			list(,$faxcode, $faxzone, $fax) = $this->splitPhone($result['fax']);
			if($telcode != '000' && $telzone != '' && $tel != '')
			{
				$result['tel'] = '('.$telcode.') '.$telzone.'.'.substr($tel, 0, 4)." ".substr($tel, 4);
			}
			else
			{
				$result['tel'] = '';
			}
			if($faxcode != '000' && $faxzone != '' && $fax != '')
			{
				$result['fax'] = '('.$faxcode.') '.$faxzone.'.'.substr($fax, 0, 4)." ".substr($fax, 4);
			}
			else
			{
				$result['fax'] = '';
			}
			
			if (empty($result['picture'])) {
				$result['logo'] = pb_get_attachmenturl('', '', 'smaller');
			}else{
				$result['logo'] = pb_get_attachmenturl($result['picture'], '', 'smaller');
				$result['logosmall'] = pb_get_attachmenturl($result['picture'], '', 'small');
				$result['logobig'] = pb_get_attachmenturl($result['picture'], '', '');
			}
			
			$result['url'] = $space->rewrite($result["cache_spacename"]);
			
			$result["site_url_name"] = str_replace('http://', '', $result["site_url"]);
			$result["site_url_name"] = str_replace('https://', '', $result["site_url_name"]);
		}
		
		$this->info = $result;
		return $result;
	}
	
	function getInfoBySpaceName($id)
	{
		uses("area", "space");
 		$area = new Areas();
		$space = new Space();
		
		$sql = "SELECT c.*,c.name as companyname,tel AS link_tel,cf.*,m.membertype_id FROM {$this->table_prefix}companies c LEFT JOIN {$this->table_prefix}companyfields cf ON c.id=cf.company_id LEFT JOIN {$this->table_prefix}members m ON m.id=c.member_id WHERE LOWER(c.cache_spacename)='".strtolower($id)."'";
		$result = $this->dbstuff->GetRow($sql);
		
		if($result)
		{
			$result["address"] = $result["address"].", ".$area->getFullName($result["area_id"]);
			
			list(,$telcode, $telzone, $tel) = $this->splitPhone($result['tel']);
			list(,$faxcode, $faxzone, $fax) = $this->splitPhone($result['fax']);
			if($telcode != '000' && $telzone != '' && $tel != '')
			{
				$result['tel'] = '('.$telcode.') '.$telzone.'.'.substr($tel, 0, 4)." ".substr($tel, 4);
			}
			else
			{
				$result['tel'] = '';
			}
			if($faxcode != '000' && $faxzone != '' && $fax != '')
			{
				$result['fax'] = '('.$faxcode.') '.$faxzone.'.'.substr($fax, 0, 4)." ".substr($fax, 4);
			}
			else
			{
				$result['fax'] = '';
			}
			
			if (empty($result['picture'])) {
				$result['logo'] = pb_get_attachmenturl('', '', 'smaller');
			}else{
				$result['logo'] = pb_get_attachmenturl($result['picture'], '', 'smaller');
				$result['logosmall'] = pb_get_attachmenturl($result['picture'], '', 'small');
				$result['logobig'] = pb_get_attachmenturl($result['picture'], '', '');
			}
			
			$result['url'] = $space->rewrite($result["cache_spacename"]);
		}
		
		$this->info = $result;
		return $result;
	}
	
	function Add($member_id = -1)
	{
		global $companyfield, $default_membergroupid;
		if (empty($this->params['data']['company']['name'])) {
			return false;
		}
		$this->params['data']['company']['member_id'] = $member_id;
		$this->params['data']['company']['created'] = $this->params['data']['company']['modified'] = $this->timestamp;
		$this->params['data']['company']['cache_spacename'] = $this->timestamp;
		$this->params['data']['company']['cache_membergroupid'] = $default_membergroupid;
		$this->save($this->params['data']['company']);
		$key = $this->table_name."_id";
		$last_companyid = $this->$key;
		$companyfield->primaryKey = "company_id";
		$companyfield->params['data']['companyfield']['company_id'] = $last_companyid;
		$companyfield->save($companyfield->params['data']['companyfield']);
		return true;
	}
	
	function checkNameExists($company_name)
	{
		$result = $this->field("id", "name='".$company_name."'");
		if (empty($result) || !$result) {
			return false;
		}else{
			return true;
		}
	}
	
	function updateCachename($id, $new_name)
	{
		$old_name = $this->dbstuff->GetOne("SELECT name FROM {$this->table_prefix}companies WHERE id=".$id);
		if (pb_strcomp($old_name, $new_name)) {
			return;
		}
		$this->dbstuff->Execute("UPDATE {$this->table_prefix}products p SET p.cache_companyname='".$new_name."' WHERE p.company_id=".$id);
		$this->dbstuff->Execute("UPDATE {$this->table_prefix}trades t SET t.cache_companyname='".$new_name."' WHERE t.company_id=".$id);
	}

	function formatResult($result)
	{
		global $_PB_CACHE;
		if (!class_exists('Space')) {
			uses("space");
		}
		$space_controller = new Space();
		if (!$result || empty($result)) {
			return null;
		}
		if (!isset($_PB_CACHE['membergroup'])) {
			$_PB_CACHE['membergroup'] = cache_read("membergroup");
		}
		if (!isset($_PB_CACHE['manage_type'])) {
			require(CACHE_COMMON_PATH. "cache_typeoption.php");
		}
		$count = count($result);
		for ($i=0; $i<$count; $i++){
			$result[$i]['gradeimg'] = 'images/group/'.$_PB_CACHE['membergroup'][$result[$i]['cache_membergroupid']]['avatar'];
			if(!empty($result[$i]['manage_type'])) $result[$i]['managetype'] = $_PB_CACHE['manage_type'][$result[$i]['manage_type']];
			if(!empty($result[$i]['membergroup_id'])) $result[$i]['gradename'] = $_PB_CACHE['membergroup'][$result[$i]['membergroup_id']]['name'];
			if (isset($result[$i]['space_name'])) {
				$result[$i]['url'] = $space_controller->rewrite($result[$i]['space_name'], $result[$i]['id']);
			}else{
				$result[$i]['url'] = "javascript:;";
			}
			if (isset($result[$i]['picture'])) {
				$result[$i]['logo'] = pb_get_attachmenturl($result[$i]['picture'], '', 'small');
				$result[$i]['logosrc'] = '<img alt="'.$result[$i]['name'].'" src="'.pb_get_attachmenturl($result[$i]['picture'], '', 'small').'" />';
			}
		}
		return $result;		
	}

	function getPhone($code = 0, $zone = 0, $id = 0)
	{
		$p = null;
		if (!empty($code)) {
			$p.="(".$code.")";
		}else{
			$p.="(000)";
		}
		if (empty($zone)) {
			$zone = "00";
		}
		$p.=@implode("-", array($zone, $id));
		return trim($p);
	}

	function splitPhone($phone)
	{
		$return = array();
		preg_match("/\(+([0-9]{2,3})+\)([0-9]{1,3})-([0-9]{1,8})/", $phone, $return);
		return $return;
	}

	function clicked($id, $force = false)
	{
		//echo $session->read('company_click_lock')."----".$id;if(!isset($_SESSION["customer_code"]))
		if($_SESSION['company_click_lock'] != $id || $force)
		{
			$this->dbstuff->Execute("UPDATE {$this->table_prefix}companies SET clicked=clicked+1 WHERE id='".$id."'");
			$this->dbstuff->Execute("UPDATE {$this->table_prefix}companies SET new_clicked=new_clicked+1 WHERE id='".$id."'");
			$_SESSION['company_click_lock'] = $id;
			return 1;
		}
		return 0;
	}

	function countProduct($id)
	{
//#####		uses("product");
// 		$product = new Products();
		
		////$result = $product->findCount(null, array("Product.company_id=".intval($id)));
		//
		//$sql = "SELECT count(id) AS amount FROM pb_products AS Product WHERE Product.company_id=".intval($id);
		//$result = $this->dbstuff->GetRow($sql);
		////var_dump($result);
		//return $result["amount"];
		return 0;
	}
	
	function fullTextSearch($keyword, $offset = 0, $limit = 150, $pagination = false)
	{
		uses("area","space");
 		$area = new Areas();
		$space = new Spaces();
		
		//$keyword = utf8_encode($keyword);

		//$sql = "SELECT c.*, MATCH (`shop_name`,`name`) AGAINST"
		//		." ('".$keyword."') AS score"
		//		." FROM {$this->table_prefix}companies c WHERE MATCH (`shop_name`,`name`) AGAINST"
		//		." ('".$keyword."')"
		//		." ORDER BY score DESC LIMIT 0, 10";
		//echo $sql;

		$sql = "SELECT c.*, mf.first_name, mf.last_name,"
			." MATCH (`shop_name`) AGAINST ('".$keyword."') AS score,"
			." MATCH (`name`) AGAINST ('".$keyword."') AS score1,"
			." MATCH (`first_name`,`last_name`) AGAINST ('".$keyword."') AS score2,"
			." MATCH (`keywords_string`) AGAINST ('".$keyword."') AS score3";
		$sql_middle = " FROM {$this->table_prefix}companies c"
			." LEFT JOIN {$this->table_prefix}memberfields mf ON mf.member_id = c.member_id"
			." WHERE"
			." MATCH (`shop_name`) AGAINST ('".$keyword."')"
			." OR MATCH (`name`) AGAINST ('".$keyword."')"
			." OR MATCH (`first_name`,`last_name`) AGAINST ('".$keyword."')"
			." OR MATCH (`keywords_string`) AGAINST ('".$keyword."')"
			." OR LOWER(c.`email`) LIKE '%".strtolower($keyword)."%'"
			." OR c.`shop_name` LIKE '%".$keyword."%'"
			." OR c.`name` LIKE '%".$keyword."%'"
			." OR CONCAT(mf.`last_name`,' ', mf.`first_name`) LIKE '%".$keyword."%'"
			." OR c.`keywords_string` LIKE '%".$keyword."%'";
		$sql_foot = " ORDER BY (score*3 + score1*2 + score2 + score3) DESC LIMIT {$offset}, {$limit}";

		//echo $sql;
		//$sql = "SELECT c.*, mf.first_name, mf.last_name"
		//	
		//	." FROM {$this->table_prefix}companies c"
		//	." LEFT JOIN {$this->table_prefix}memberfields mf ON mf.member_id = c.member_id"
		//	." WHERE"
		//	." OR c.`shop_name` LIKE '%".$keyword."%'"
		//	." OR c.`name` LIKE '%".$keyword."%'"
		//	." OR CONCAT(mf.`last_name`,' ', mf.`first_name`) LIKE '%".$keyword."%'"
		//	//." OR mf.`last_name` LIKE '%".$keyword."%'"
		//	." OR c.`keywords_string` LIKE '%".$keyword."%'"			
		//	." ORDER BY created DESC LIMIT 0, 20";

		//echo $sql."dddd";
		$keyword = trim($keyword);
		if(!empty($keyword)) $results = $this->dbstuff->GetArray($sql.$sql_middle.$sql_foot);
		//echo count($results);
		foreach($results as &$result)
		{
			if($result)
			{
				$result["address"] = $result["address"].", ".$area->getFullName($result["area_id"]);
				
				list(,$telcode, $telzone, $tel) = $this->splitPhone($result['tel']);
				list(,$faxcode, $faxzone, $fax) = $this->splitPhone($result['fax']);
				if($telcode != '000' && $telzone != '' && $tel != '')
				{
					$result['tel'] = '('.$telcode.') '.$telzone.'.'.substr($tel, 0, 4)." ".substr($tel, 4);
				}
				else
				{
					$result['tel'] = '';
				}
				if($faxcode != '000' && $faxzone != '' && $fax != '')
				{
					$result['fax'] = '('.$faxcode.') '.$faxzone.'.'.substr($fax, 0, 4)." ".substr($fax, 4);
				}
				else
				{
					$result['fax'] = '';
				}
				
				if (empty($result['picture'])) {
					$result['logo'] = pb_get_attachmenturl('', '', 'small');
				}else{
					$result['logo'] = pb_get_attachmenturl($result['picture'], '', 'smaller');
				}
				
				$result['url'] = $space->rewrite($result["cache_spacename"]);
			}
		}
		
		if($pagination) {
			$count = $this->dbstuff->GetRow("SELECT COUNT(c.id) ".$sql_middle);
			$count = $count["COUNT(c.id)"];
			return array("result"=>$results,"count"=>$count);
		} else {
			return $results;
		}		
	}
	
	function formatItems($results) {
		uses("area","space");
 		$area = new Areas();
		$space = new Spaces();
		
		foreach($results as $key => $result)
		{
			if($results)
			{
				$results[$key]["address"] = $result["address"].", ".$area->getFullName($result["area_id"]);
				
				list(,$telcode, $telzone, $tel) = $this->splitPhone($result['tel']);
				list(,$faxcode, $faxzone, $fax) = $this->splitPhone($result['fax']);
				if($telcode != '000' && $telzone != '' && $tel != '')
				{
					$results[$key]['tel'] = '('.$telcode.') '.$telzone.'.'.substr($tel, 0, 4)." ".substr($tel, 4);
				}
				else
				{
					$results[$key]['tel'] = '';
				}
				if($faxcode != '000' && $faxzone != '' && $fax != '')
				{
					$results[$key]['fax'] = '('.$faxcode.') '.$faxzone.'.'.substr($fax, 0, 4)." ".substr($fax, 4);
				}
				else
				{
					$results[$key]['fax'] = '';
				}
				
				if (empty($result['picture'])) {
					$results[$key]['logo'] = pb_get_attachmenturl('', '', 'small');
				}else{
					$results[$key]['logo'] = pb_get_attachmenturl($result['picture'], '', 'small');
				}
				
				$results[$key]['url'] = $this->url(array("module"=>"space","userid"=>$result["cache_spacename"])); //$space->rewrite($result["cache_spacename"]);
				$results[$key]['href'] = $results[$key]['url'];
				$results[$key]['thumb'] = $results[$key]['logo'];
				$results[$key]['title'] = $results[$key]['shop_name'];
			}
		}
		
		return $results;
	}
	
	function getParent($id) {
		
	}
	
	function findFacebookId($url) {
		$fid = '';
		preg_match('/\d{13,}/', $url, $match1);
		preg_match('/facebook.com[^\/]*\/([^\/\?]+)/', $url, $match2);
		if(count($match1)) {
			$fid = $match1[0];
		} elseif (count($match2)) {
			$fid = $match2[1];			
			$content = file_get_contents("http://graph.facebook.com/?id=".$fid);
			$content = json_decode($content, true);
			$fid = $content["id"];
		}		
		if($fid) {
			return $fid;
		} else {
			return false;
		}
	}
	
	function getByArea($params=array(), $offset=0, $row=3, $num=7) {
		if($params["area_id"]) {
			$conditions[] = "(a_parent.id=".intval($params["area_id"])." OR a.id=".intval($params["area_id"]).")";
		}
		if($params["areatype_id"]) {
			$conditions[] = "(a_parent.areatype_id=".intval($params["areatype_id"])." OR a.areatype_id=".intval($params["areatype_id"]).")";
		}
		if($params["membergroup_id"]) {
			$conditions[] = "m.membergroup_id=".$params["membergroup_id"];
		}
		if($params["for_map"]) {
			$conditions[] = "(Company.map_lat!='' AND Company.map_lng!='')";
		}
		if($params["industry_id"]) {
			$$industryid = $params["industry_id"];
			$conditions[] = "((Company.industries LIKE '".$industryid."')"
							." OR (Company.industries LIKE '%,".$industryid."')"
							." OR (Company.industries LIKE '".$industryid.",%')"
							." OR (Company.industries LIKE '%,".$industryid.",%'))";
		}
		
		$conditions[] = 'Company.area_show=1';
		
		//Conditions for effective company
		$other_con = " > 8";
		$company_has_logo = "" //"AND Company.picture != '' AND Company.banners IS NOT NULL";
		$conditions[] = "(Company.id IN (".
				"SELECT id FROM (SELECT cc.id, COUNT(pp.id) AS pcount FROM {$this->table_prefix}companies AS cc"
				." INNER JOIN {$this->table_prefix}products AS pp ON cc.id = pp.company_id"
				." WHERE pp.status=1 GROUP BY cc.id) AS kk WHERE pcount".$other_con.") ".$company_has_logo." )";
		
		$joins = array();
		$joins[] = "LEFT JOIN {$this->table_prefix}areas a ON a.id=Company.area_id";
		$joins[] = "LEFT JOIN {$this->table_prefix}areas a_parent ON a_parent.id=a.parent_id";
		$joins[] = "LEFT JOIN {$this->table_prefix}members AS m ON m.id = Company.member_id";
		
		$count = $row*$num;
		$result = $this->findAll("Company.*", $joins, $conditions, "m.points_weekly DESC, m.active_time DESC", $offset, $count);
		$count = $this->findCount($joins, $conditions, "Company.id");
		$result = $this->formatItems($result);
		
		return array("result"=>$result,"count"=>$count);
	}
	
	function getStudentShops($offset = null, $num = null) {
		$conditions = array();
		
		$conditions[] = "mf.school_id!=0";
		//Conditions for effective company
		$other_con = " > 0";
		$company_has_logo = ""; //"AND Company.picture != '' AND Company.banners IS NOT NULL";
		$conditions[] = "(Company.id IN (".
				"SELECT id FROM (SELECT cc.id, COUNT(pp.id) AS pcount FROM {$this->table_prefix}companies AS cc"
				." INNER JOIN {$this->table_prefix}products AS pp ON cc.id = pp.company_id"
				." WHERE pp.status=1 GROUP BY cc.id) AS kk WHERE pcount".$other_con.") ".$company_has_logo." )";

		$joins = array();
		$joins[] = "LEFT JOIN {$this->table_prefix}areas a ON a.id=Company.area_id";
		$joins[] = "LEFT JOIN {$this->table_prefix}areas a_parent ON a_parent.id=a.parent_id";
		$joins[] = "LEFT JOIN {$this->table_prefix}members AS m ON m.id = Company.member_id";
		$joins[] = "LEFT JOIN {$this->table_prefix}memberfields AS mf ON mf.member_id = Company.member_id";
		
		$result = $this->findAll("Company.*", $joins, $conditions, "m.points_weekly DESC, m.active_time DESC", $offset, $num);
		//$count = $this->findCount($joins, $conditions, "Company.id");
		$result = $this->formatItems($result);

		return array("result"=>$result,"count"=>$count);
	}
	
	function getNewHome() {
		$conditions = array();
		
		$conditions[] = "Company.new_home!=0";
		

		$joins = array();
		
		$joins[] = "LEFT JOIN {$this->table_prefix}members AS m ON m.id = Company.member_id";
		$joins[] = "LEFT JOIN {$this->table_prefix}memberfields AS mf ON mf.member_id = Company.member_id";
		
		$result = $this->findAll("Company.*", $joins, $conditions, "m.points_weekly DESC, m.active_time DESC", $offset, $num);
		//$count = $this->findCount($joins, $conditions, "Company.id");
		$result = $this->formatItems($result);

		return array("result"=>$result,"count"=>$count);
	}
}
?>