<?php
class Fair extends PbController {
	var $name = "Fair";
	
	function Fair()
	{
		$this->loadModel("expo");
	}
	
	function index()
	{
		$this->render("fair/index");
	}
	
	function lists()
	{
		global $viewhelper, $pos, $limit;
		require(CACHE_COMMON_PATH."cache_type.php");
		$_PB_CACHE['area'] = cache_read("area");
		$_PB_CACHE['industry'] = cache_read("industry");
		using("area");
		$area = new Areas();
		$conditions = array();
		$viewhelper->setTitle(L("fair", "tpl"));
		$viewhelper->setPosition(L("fair", "tpl"), "index.php?do=fair");
		if (!empty($_GET['q'])) {
			$conditions[] = "name like '%".$_GET['q']."%'";
		}
		if (!empty($_GET['type'])) {
			if ($_GET['type']=="commend") {
				$conditions[] = "if_commend=1";
			}
		}
		if(!empty($_GET['typeid'])){
			$type_id = intval($_GET['typeid']);
			$conditions[] = "expotype_id=".$type_id;
			$type_name = $_PB_CACHE['expotype'][$type_id];
			$viewhelper->setTitle($type_name);
			$viewhelper->setPosition($type_name, "index.php?do=fair&action=lists&typeid=".$type_id);
		}
		if (isset($_GET['areaid'])) {
			$area_id = intval($_GET['areaid']);
			$tmp_info = $area->setInfo($area_id);
			if (!empty($tmp_info)) {
				$conditions[] = "area_id".$tmp_info['level']."=".$tmp_info['id'];
				$viewhelper->setTitle($tmp_info['name']);
				$viewhelper->setPosition($tmp_info['name'], "index.php?do=fair&action=lists&areaid=".$tmp_info['id']);
			}
		}
		$amount = $this->expo->findCount(null, $conditions);
		$result = $this->expo->findAll("*", null, $conditions, "id desc", $pos, $limit);
		if (!empty($result)) {
			for ($i=0; $i<count($result); $i++){
				if($result[$i]['begin_time']) $result[$i]['begin_date'] = df($result[$i]['begin_time']);
				if($result[$i]['end_time']) $result[$i]['end_date'] = df($result[$i]['end_time']);
				$result[$i]['description'] = mb_substr(strip_tags(trim(pb_lang_split($result[$i]['description']))), 0, 100);
				$result[$i]['typename'] = $_PB_CACHE['expotype'][$result[$i]['expotype_id']];
				$result[$i]['title'] = pb_lang_split($result[$i]['name']);
				if(isset($result[$i]['picture'])) $result[$i]['image'] = pb_get_attachmenturl($result[$i]['picture'], '', 'small');
				if(!empty($result[$i]['area_id'])){
					$result[$i]['area'] = "(".$_PB_CACHE['area'][1][$result[$i]['area_id']].")";
				}
			}
			setvar("items", $result);
		}
		setvar("Areas", $_PB_CACHE['area']);
		setvar("Type",$_PB_CACHE['expotype']);
		$viewhelper->setTitle(L("search", "tpl"));
		$viewhelper->setPosition(L("search", "tpl"));
		setvar("paging", array('total'=>$amount));
		render("fair/list");
		
	}
	
	function detail()
	{
		global $viewhelper;
		require(CACHE_COMMON_PATH."cache_type.php");
		$_PB_CACHE['area'] = cache_read("area");
		$_PB_CACHE['industry'] = cache_read("industry");
		if (isset($_GET['title'])) {
			$title = rawurldecode(trim($_GET['title']));
			$res = $this->expo->findByName($title);
			$id = $res['id'];
		}
		if (isset($_GET['id'])) {
			$id = intval($_GET['id']);
		}
		if (!$this->expo->checkExist($id, true)) {
			flash("data_not_exists");
		}
		$info = $this->expo->info;
		if(!empty($info)){
			$info['typename'] = $_PB_CACHE['expotype'][$info['expotype_id']];
			$viewhelper->setTitle($info['typename']);
			$viewhelper->setPosition($info['typename'], 'index.php?do=fair&action=lists&typeid='.$info['expotype_id']);
			$viewhelper->setTitle($info['name']);
			$viewhelper->setPosition($info['name']);
			$result = $this->expo->dbstuff->GetArray("SELECT c.name,c.id,c.cache_spacename AS userid FROM {$this->expo->table_prefix}expomembers em LEFT JOIN {$this->expo->table_prefix}companies c ON c.id=em.company_id WHERE c.status=1");
			$result = pb_lang_split_recursive($result);
			$info = pb_lang_split_recursive($info);
			if (!empty($result)) {
				setvar("Items", $result);
			}
			setvar("item", $info);
		}
		render("fair/detail");
	}
	
	function add_post()
	{
		global $charset, $pb_user;
		if (empty($pb_user)) {
			die("<img src='images/check_error.gif'/>".iconv($charset, "UTF-8//IGNORE", L("please_login_first")));
		}
		$the_memberid = $pb_user['pb_userid'];
		$company_id = '';
		if(isset($_POST['do']) && isset($_POST['id'])){
			pb_submit_check('do');
			if ($this->expo->checkExist($_POST['id']) && !$this->expo->dbstuff->GetOne("SELECT id FROM ".$fair->table_prefix."expos WHERE member_id='".$the_memberid."' AND expo_id='".$_POST['id']."'")) {
				$sql = "INSERT INTO {$this->expo->table_prefix}expomembers (expo_id,member_id,company_id,created,modified) VALUE (".$_POST['id'].",".$the_memberid.",".$company_id.",".$this->expo->timestamp.",".$this->expo->timestamp.")";
				$result = $this->expo->dbstuff->Execute($sql);
				if (isset($_POST['is_ajax']) && $_POST['is_ajax']) {
					die("<img src='images/check_right.gif'/>".iconv($charset, "UTF-8//IGNORE", L("action_successfully")));
				}
				echo "<script language='javascript'>window.close();</script>";
				exit;
			}else {
				if (isset($_POST['is_ajax']) && $_POST['is_ajax']) {
					die("<img src='images/check_error.gif'/>".iconv($charset, "UTF-8//IGNORE", L("action_failed")));
				}
				flash("action_failed", '', 0);
			}
		}
	}
}
?>