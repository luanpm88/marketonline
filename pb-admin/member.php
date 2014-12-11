<?php
/**
 *      [PHPB2B] Copyright (C) 2007-2099, Ualink Inc. All Rights Reserved.
 *      The contents of this file are subject to the License; you may not use this file except in compliance with the License. 
 *
 *      @version $Revision: 2258 $
 */
require("../libraries/common.inc.php");
require("session_cp.inc.php");
uses("point","member","membergroup","typeoption","link","moderator");
require(LIB_PATH. 'time.class.php');
require(PHPB2B_ROOT. 'libraries/page.class.php');
require(CACHE_COMMON_PATH."cache_type.php");
$_PB_CACHE['membergroup'] = cache_read("membergroup");
$_PB_CACHE['trusttype'] = cache_read("trusttype");
$typeoption = new Typeoption();
$membergroup = new Membergroup();
$member = new Members();
$moderator = new Moderators();
$page = new Pages();
$link = new Links();
$point = new Points();
$tpl_file = "member";
$conditions = array();
setvar("MembergroupOptions", $membergroup->getUsergroups());
setvar("Membergroups", $member_groups = $_PB_CACHE['membergroup']);
setvar("Membertypes", $member_types = $_PB_CACHE['membertype']);
$genders = $typeoption->get_cache_type("gender");
foreach($_PB_CACHE['trusttype'] as $key=>$val){
	$tmp_trusttypes[$key] = $val['name'];
}
setvar("Trusttypes", $tmp_trusttypes);
if (isset($_POST)) {
	if (isset($_POST['del'])) {
	      $member->Delete($_POST['id']);
		  flash("success");
	}
	if (isset($_POST['check_in'])){
		$vals['status'] = 1;
		if(!$member->save($vals, "update", $member_id)){
			flash();
		}
	}
	if (isset($_POST['check_out'])){
		$vals['status'] = 0;
		if(!$member->save($vals, "update", $member_id)){
			flash();
		}
	}
	if (isset($_POST['export']) && !empty($_POST['id'])) {
		$result = $pdb->GetArray("SELECT m.*,mf.first_name,mf.last_name,mf.gender,mf.tel,mf.fax,mf.mobile,mf.address,mf.zipcode FROM {$tb_prefix}members m LEFT JOIN {$tb_prefix}memberfields mf ON m.id=mf.member_id WHERE m.id IN (".implode(",", $_POST['id']).")");
		if (!empty($result)) {
			require_once(LIB_PATH. "excel_export.class.php");
			$excel = new excel_xml();
			$header_style = array(
				'bold'       => 1,
				'size'       => '10',
				'color'      => '#FFFFFF',
				'bgcolor'    => '#4F81BD'
			);
			$excel->add_style('header', $header_style);
			$excel->add_row(array(
				'User Name',
				'Email',
				'Member Type',
				'Member Group',
				'True Name',
				'Gender',
				'Telephone',
				'Fax',
				'Mobile',
				'Address',
				'Zipcode'
			), 'header');
			foreach ($result as $key=>$val) {
				$excel->add_row(array(
				$val['username'],
				$val['email'],
				$member_types[$val['membertype_id']],
				$member_groups[$val['membergroup_id']]['name'],
				$val['first_name'].$val['last_name'],
				$genders[$val['gender']],
				$val['tel'],
				$val['fax'],
				$val['mobile'],
				$val['address'],
				$val['zipcode']
				));
			}
			$excel->create_worksheet(L("member", "tpl"));
			$excel->download(L("member", "tpl").date("YmdHis").'.xls');
		}
	}	
}

if (isset($_POST['pb_action']) && !empty($_POST['id'])) {
	list($action_name, $action_id) = explode("_", $_POST['pb_action']);
	$ids = "(".implode(",", $_POST['id']).")";
	switch ($action_name) {
		case "status":
			$sql = "UPDATE {$tb_prefix}members SET status='".$action_id."' WHERE id IN ".$ids;
			break;
		case "membertype":
			$sql = "UPDATE {$tb_prefix}members SET membertype_id='".$action_id."' WHERE id IN ".$ids;
			break;
		case "membergroup":
			$sql = "UPDATE {$tb_prefix}members SET membergroup_id='".$action_id."' WHERE id IN ".$ids;
			break;
		default:
			break;
	}
	$result = $pdb->Execute($sql);
	if (!$result) {
		flash();
	}
}
if (isset($_POST['save'])) {
	if (isset($_POST['id'])) {
		$member_id = $_POST['id'];
	}
	$vals = $_POST['data']['member'];
	if(!empty($_POST['data']['userpass'])) {
		if (!pb_strcomp($_POST['data']['userpass'],$_POST['data']['re_userpass'])) {
			flash("invalid_password");
		}else{
			$vals['userpass'] = $member->authPasswd($_POST['data']['userpass']);
		}
	}
		if (!empty($_POST['data']['trusttype'])) {
			$vals['trusttype_ids'] = implode(",", $_POST['data']['trusttype']);
		}
	if (isset($_POST['data']['service_start_date'])) {
		$vals['service_start_date'] = Times::dateConvert($_POST['data']['service_start_date']);
	}	
	if (isset($_POST['data']['service_end_date'])) {
		$vals['service_end_date'] = Times::dateConvert($_POST['data']['service_end_date']);
	}
	
	$parent_id = $member->field("id", "username='".$_POST['parent_username']."' OR email='".$_POST['parent_username']."'");
	if($parent_id)
	{
		$vals['referrer_id'] = $parent_id;
	}
	else
	{
		$vals['referrer_id'] = false;
	}
	//update link tables
	if($vals['referrer_id'])
	{
		$link_exsit = $link->fields("*", array("member_id=".$member_id));
		if($link_exsit) {
			$link->saveField("parent_id",$vals['referrer_id'], intval($link_exsit["id"]));
		}
		else {
			$link->save(array("parent_id"=>$vals['referrer_id'], "member_id"=>$member_id, "type_id"=>1, "created"=>date("Y-m-d H:i:s")));
		}
	}
	//var_dump($vals['referrer_id']);
	
	if(!empty($member_id)){
		$vals['modified'] = $time_stamp;
		if (!empty($vals['space_name'])) {
			$member->updateSpaceName(array('id'=>$member_id), $vals['space_name']);
		}
		$result = $member->save($vals, "update", $member_id);
	}else{
		$vals['status'] = 1;
		$vals['created'] = $vals['modified'] = $time_stamp;
		$result = $member->save($vals);
	}
	if(!$result){
		flash();
	}
}
if (isset($_GET['do'])) {
	$do = trim($_GET['do']);
	if (isset($_GET['id'])) {
		$id = intval($_GET['id']);
	}
	if ($do == "edit") {
		$vals =  null;
		if (!empty($id)){
			$res = $pdb->GetRow("SELECT link.parent_id, parent.username as parent_username, m.*,mf.* FROM {$tb_prefix}members m LEFT JOIN {$tb_prefix}memberfields mf ON m.id=mf.member_id LEFT JOIN {$tb_prefix}links link ON m.id=link.member_id LEFT JOIN {$tb_prefix}members parent ON parent.id=link.parent_id WHERE m.id={$id}");
			if (empty($res)) {
				flash("data_not_exists");
			}
			if (!empty($res['trusttype_ids'])) {
				$tmp_user_trusttype = explode(",", $res['trusttype_ids']);
				$res['selected_trusttypeid'] = $tmp_user_trusttype;
				unset($tmp_user_trusttype);
			}
			if (!empty($res['membergroup_id'])) {
				$res['groupimage'] = URL."images/group/".$_PB_CACHE['membergroup'][$res['membergroup_id']]['avatar'];
			}
			if($res['service_start_date']) $res['service_start_date'] = df($res['service_start_date']);
			if($res['service_end_date']) $res['service_end_date'] = df($res['service_end_date']);
			setvar("item", $res);
		}
		uaAssign(array("Genders"=> $genders));
		setvar("MemberStatus", $typeoption->get_cache_type("check_status"));
		$tpl_file = "member.edit";
		template($tpl_file);
		exit;
	}
	if ($do == "search") {
		if(!empty($_GET['member']['name'])) $conditions[] = "(Member.username like '%".$_GET['member']['name']."%' OR Member.id=".$_GET['member']['name']." OR Member.space_name='".$_GET['member']['name']."')";
		if(isset($_GET['member']['status']) && $_GET['member']['status']>=0) $conditions[] = "Member.status='".$_GET['member']['status']."'";
		if ($_GET['groupid']>0) {
			$conditions[] = "Member.membergroup_id=".intval($_GET['groupid']);
		}
		
		if(!empty($_GET['orderby'])) {
			$orderby = 'Member.'.$_GET['orderby'].' DESC, ';
		}
	}
	if ($do=="del" && !empty($id)) {
		$member->Delete($id);
	}
	
	if($do=="paid" && !empty($id))
	{
		//$member->saveField("checkout", "1", $id);
		$member->setPaid($id, $_GET["months"], $_GET["amount"]);
	}
	
	if($do=="unpaid" && !empty($id))
	{
		$member->saveField("checkout", "0", $id);
	}
	
	if($do=="set_moderator" && !empty($id))
	{
		$current = $moderator->fields("*", array("member_id=".$id));
		//var_dump($id);
		if($current) {
			pheader("location:moderator.php?do=edit&id=".$current["id"]);
		} else {
			$moderator->save(array("member_id"=>$id,"created"=>date("Y-m-d H:i:s")));
			$mod_id = $moderator->dbstuff->Insert_ID();
			pheader("location:moderator.php?do=edit&id=".$mod_id);
		}
		
		
	}
	
	if($do=="point_up" && !empty($id) && !empty($_GET["point"]))
	{
		$point->update('up', intval($id), $_GET["description"], intval($_GET["point"]));
		pheader("location:".$_SERVER['HTTP_REFERER']);
	}
	
	if($do=="point_down" && !empty($id) && !empty($_GET["point"]))
	{
		$point->update('down', intval($id), $_GET["description"], intval($_GET["point"]));
		pheader("location:".$_SERVER['HTTP_REFERER']);
	}
	
	if ($do == "monthlypoint") {
		if (!empty($id)){
			$logs = $point->getDetails($id);
		}
		setvar("logs",$logs);
		$tpl_file = "member.monthlypoint";
		template($tpl_file);
		exit;
	}
	
	if ($do == "weeklypoint") {
		if (!empty($id)){
			$logs = $point->getWeeklyDetails($id);
		}
		setvar("logs",$logs);
		$tpl_file = "member.weeklypoint";
		template($tpl_file);
		exit;
	}
	
	if ($do=="area_moderator" && $id) {
		$member->saveField("area_moderator", intval($_GET["value"]), intval($id));
		pheader("location:".$_SERVER['HTTP_REFERER']);
	}
}
$fields = "Member.area_moderator,Member.active_time,Member.points_monthly,Member.points_weekly,c.shop_name,Member.space_name,parent.username as parent_username, Member.id,Member.username,CONCAT(mf.first_name,mf.last_name) AS NickName,mf.reg_ip,Member.last_ip,Member.points,Member.credits,Member.membergroup_id,Member.status,Member.created AS pubdate,Member.last_login,Member.trusttype_ids,Member.checkout";
$amount = $member->findCount(null, $conditions);
$page->setPagenav($amount);
$joins[] = "LEFT JOIN {$tb_prefix}memberfields mf ON Member.id=mf.member_id";
$joins[] = "LEFT JOIN {$tb_prefix}links link ON Member.id=link.member_id";
$joins[] = "LEFT JOIN {$tb_prefix}members parent ON parent.id=link.parent_id";
$joins[] = "LEFT JOIN {$tb_prefix}companies c ON Member.id=c.member_id";
$result = $member->findAll($fields, $joins, $conditions, $orderby."Member.id DESC ",$page->firstcount,$page->displaypg);
if (!empty($result)) {
	for($i=0; $i<count($result); $i++){
		$tmp_img = null;
		if ($result[$i]['id']!=$administrator_id) {
			$result[$i]['candelete'] = 1;
		}else{
			$result[$i]['candelete'] = 0;
		}
		if (!empty($result[$i]['trusttype_ids'])) {
			$tmp_str = explode(",", $result[$i]['trusttype_ids']);
			foreach ($tmp_str as $key=>$val){
				$tmp_img.="<img src='".URL."images/icon/".$_PB_CACHE['trusttype'][$val]['avatar']."' alt='".$_PB_CACHE['trusttype'][$val]['name']."' />";
			}
			$result[$i]['trust_image'] = $tmp_img;
		}
		if (!empty($result[$i]['membergroup_id'])) {
			$result[$i]['group_image'] = URL."images/group/".$member_groups[$result[$i]['membergroup_id']]['avatar'];
		}
		
		$result[$i]['active_time'] = format_time($result[$i]['active_time']);
		
		$result[$i]['points_monthly'] = $result[$i]['points_monthly'] > 100 ? 100 : $result[$i]['points_monthly'];
		$result[$i]['points_weekly'] = $result[$i]['points_weekly'] > 100 ? 100 : $result[$i]['points_weekly']; 
	}
	setvar("Items", $result);
}
uaAssign(array("MemberStatus"=> $typeoption->get_cache_type("check_status"),"ByPages"=>$page->pagenav));
template($tpl_file);
?>