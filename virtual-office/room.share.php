<?php
/**
 *      [PHPB2B] Copyright (C) 2007-2099, Ualink Inc. All Rights Reserved.
 *      The contents of this file are subject to the License; you may not use this file except in compliance with the License. 
 *
 *      @version $Revision: 2133 $
 */
session_start();
$office_theme_name = "";
require(CACHE_LANG_PATH.'lang_office.php');
$_PB_CACHE['membergroup'] = cache_read("membergroup");
uses("member", "memberfield", "company", "job", "employee");
$job = new Jobs();
$employee = new Employees();
$member = new Members();
$memberfield = new Memberfields();
$company = new Companies();
$company_controller = new Company();
$smarty->template_dir = PHPB2B_ROOT. "templates/office/";
setvar("office_theme_path", "../templates/office/");
$smarty->setCompileDir($viewhelper->office_dir.DS);
$smarty->flash_layout = "flash";
$check_invite_code = false;
$pdb->setFetchMode(ADODB_FETCH_ASSOC);
$ADODB_CACHE_DIR = DATA_PATH.'dbcache';
if (isset($G['register_type'])) {
	$register_type = $G['register_type'];
	if ($register_type=="open_invite_reg"){
	    setvar("IfInviteCode", true);
	}
}
if (empty($_SESSION['MemberID']) || empty($_SESSION['MemberName'])) {
	uclearcookies();
	if (isset($_POST['is_ajax']) && $_POST['is_ajax']) {
		die(strip_tags(L("please_login_first")));
	}
	$other = "";
	if(isset($_GET))
	{
		$other = "?";
		//var_dump($_GET);
		foreach($_GET as $key => $value)
		{
			$other .= $key."=".$value."&";
		}
	}
	//echo URL."logging.php?forward=".urlencode(pb_get_host().$php_self.$other);
	pheader("location:".URL."logging.php?forward=".urlencode(pb_get_host().$php_self.$other));
}
$the_memberid = intval($_SESSION['MemberID']);
$the_membername = $_SESSION['MemberName'];
//if caches
$cache_data = array();
$pdb->Execute("DELETE FROM {$tb_prefix}membercaches WHERE expiration<".$time_stamp);
$result = $pdb->GetRow("SELECT data1 AS info FROM `{$tb_prefix}membercaches` WHERE member_id='".$the_memberid."'");
if (empty($result)) {
	$cache_data = $member->updateMemberCaches($the_memberid);
}else{
	$cache_data = @unserialize($result['info']);
}
$memberinfo = $cache_data['member'];
$companyinfo = $cache_data['company'];
$companyinfo["logo"] = pb_get_attachmenturl($companyinfo['picture'], '', 'small');
$company_id = $companyinfo['id'];

setvar("COMPANYINFO", $companyinfo);
$g = $_PB_CACHE['membergroup'][$memberinfo['membergroup_id']];
if (!empty($g['auth_level'])) {
	$auth = sprintf("%05b", $g['auth_level']);
	$menu['basic'] = $auth[0];
	$menu['offer'] = $auth[1];
	$menu['product'] = $auth[2];
	$menu['company'] = $auth[3];
	$menu['pms'] = $auth[4];
	setvar("menu", $menu);
}
function check_permission($perm)
{
	global $g, $smarty;
	$allow = ($perm=="space")? "allow_space" : $perm."_allow";
	if (!$g[$allow]) {
		//echo "sdfdsfsdf sdf s";
		//$message = L("have_no_perm", "msg", L($allow, "tpl"));
		//$smarty->assign('action_img', "failed.png");
		//$smarty->assign('url', 'javascript:;');
		//$smarty->assign('message', $message);
		//$smarty->assign('title', $message);
		//$smarty->assign('page_title', strip_tags($message));
		//template($smarty->flash_layout);
		//exit();
	}
}
function check_permission_old($perm)
{
	global $g, $smarty;
	$allow = ($perm=="space")? "allow_space" : $perm."_allow";
	if (!$g[$allow]) {
		$message = L("have_no_perm", "msg", L($allow, "tpl"));
		$smarty->assign('action_img', "failed.png");
		$smarty->assign('url', 'javascript:;');
		$smarty->assign('message', $message);
		$smarty->assign('title', $message);
		$smarty->assign('page_title', strip_tags($message));
		template($smarty->flash_layout);
		exit();
	}
}
$new_pm = $cache_data['message']['new_pm'];
setvar("newpm", (empty($new_pm) || !$new_pm)? false : $new_pm);
$user_name = (!empty($memberinfo['last_name']))?$memberinfo['first_name'].$memberinfo['last_name']:$_SESSION['MemberName'];
setvar("UserName", $user_name);
if (!empty($arrTemplate)) {
    $smarty->assign($arrTemplate);
}
$today_start = mktime(0, 0, 0, date("m"), date("d"), date("Y"));



//var_dump($the_memberid);

$hasProfile = $member->hasProfile($the_memberid);
$hasCompany = $member->hasCompany($the_memberid);

//var_dump($hasProfile);
//var_dump($hasCompany);

$meminfo = $memberinfo["membertype_id"];
$memgroup = $memberinfo["membergroup_id"];

if($memgroup == 3){
	$meminfo_name = "Doanh nghiệp";
}elseif($memgroup == 1){
	$meminfo_name = "Cửa hàng";
}elseif($memgroup == 2){
	$meminfo_name = "Cá nhân";
}

if($meminfo == 5){
	$meminfo_name = "Nhà tuyển dụng";
	setvar("jobcount", $job->findCount(null, array("member_id=".$the_memberid)));
}
else if($meminfo == 4){
	setvar("employeecount", $employee->findCount(null, array("member_id=".$the_memberid)));
}

//show company with emloyee
if($hasCompany || $meminfo != 4)
{
	$showEmployeeShop = true;
}

setvar("showEmployeeShop", $showEmployeeShop);
setvar("hasProfile", $hasProfile);
setvar("hasCompany", $hasCompany);
setvar("membertype_id", $meminfo);
setvar("membertype_name", $meminfo_name);
setvar("MEMBER", $memberinfo);

if (!$check)
	if(!$hasProfile && $meminfo != 5)
		pheader("location:personal.php");
	else if(!$hasCompany && $meminfo != 1 && $meminfo != 4 && $meminfo != 6)
		pheader("location:company.php");


if($hasProfile && $hasCompany)
{
	
}

	////get chatboxs
	//var_dump($session);
	$chatboxs = $session->read("chatboxs".session_id());
	$chatboxs = explode(",", $chatboxs);
	foreach($chatboxs as $key => $uuu)
	{
		$uuu = explode("_",$uuu);
		$chatboxsx[$key]["userid"] = $uuu[0];
		$chatboxsx[$key]["typeid"] = $uuu[1];
	}
	////$session->write("chatboxs".session_id(), NULL);
	setvar("chatboxs", $chatboxsx);

?>