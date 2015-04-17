<?php
/**
 *      [PHPB2B] Copyright (C) 2007-2099, Ualink Inc. All Rights Reserved.
 *      The contents of this file are subject to the License; you may not use this file except in compliance with the License. 
 *
 *      @version $Revision: 2258 $
 */
session_start();
define('CURSCRIPT', 'register');
require("libraries/common.inc.php");
require("share.inc.php");
require(PHPB2B_ROOT."libraries/sendmail.inc.php");
require(LIB_PATH.'passport.class.php');
require(CACHE_LANG_PATH."lang_emails.php");
$_PB_CACHE['membergroup'] = cache_read("membergroup");
$passport = new Passports();
uses("point","member","company","companyfield","memberfield","membergroup","link");
$cfg['reg_time_seperate'] = 3*60;
$memberfield = new Memberfields();
$member = new Members();
$membergroup = new Membergroups();
$company = new Companies();
$companyfield = new Companyfields();
$point = new Points();
$link = new Links();
$check_invite_code = false;
$register_type = $_PB_CACHE['setting']['register_type'];
$ip_reg_sep = $_PB_CACHE['setting']['ip_reg_sep'];
$forbid_ip = $_PB_CACHE['setting']['forbid_ip'];
$conditions = array();
$capt_check = capt_check_2("capt_register");
$tpl_file = "register";
$member_reg_auth = $_PB_CACHE['setting']['new_userauth'];
if (isset($_GET['action'])) {
	$action = trim($_GET['action']);
	if ($action == "done") {
		$tpl_file = "register.done";
		$reg_tips = null;
		$reg_result = true;
		$is_company = false;
		if ($member_reg_auth) {
			switch ($member_reg_auth) {
				case 1:
					$reg_tips = L("pls_active_your_account", "msg", "index.php?do=member&action=reactive&em=".$_GET['em'])."<br /> [".date("d-m-Y _ H:i")."]";
					$reg_result = false;
					break;
				case 0:
					break;
				case 2:
					$reg_tips = L("pls_wait_for_check");
					$reg_result = false;
					break;
				default:
					$reg_tips = L("sth_wrong_occured");
					$reg_result = false;
					break;
			}
		}else{
			if (empty($pb_user)) {
				flash();
			}
			$member_info = $pdb->GetRow("SELECT membergroup_id,membertype_id FROM {$tb_prefix}members WHERE id='".$pb_user['pb_userid']."'");
			$gid = $member_info['membergroup_id'];
			$smarty->assign("groupname", $_PB_CACHE['membergroup'][$gid]['name']);
			$smarty->assign("groupimg", "images/group/".$_PB_CACHE['membergroup'][$gid]['avatar']);
			if ($member_info['membertype_id'] == 2) {
				$is_company = true;
			}
		}
		
		//forward email
		//echo $_GET['em'];
		preg_match('/(.*?)@(.*?)$/', $_GET['em'], $match);
		$rail = $match[2];		
		
		switch($rail)
		{
			case 'gmail.com':
				$gomail = 'http://gmail.com';
				break;
			case 'outlook.com':
				$gomail = 'http://outlook.com';
				break;
			default;
				$gomail = 'http://mail.'.$rail;
				break;			
		}
		setvar("gomail", $gomail);
		
		//echo $_GET['em'];
		$member_infoz = $pdb->GetRow("SELECT username,membertype_id FROM {$tb_prefix}members WHERE email='".$_GET['em']."'");
		//var_dump($member_infoz);
		$smarty->assign("is_company", $is_company);
		$smarty->assign("result", $reg_result);
		$smarty->assign("RegTips", $reg_tips);
		setvar("username",$member_infoz["username"]);
		
		
		if(detectMobile()) {
			render("mobile/".$tpl_file, true);
		} else {
			render($tpl_file, true);
		}
		
	}
}
if (!empty($ip_reg_sep)) {
	$cfg['reg_time_seperate'] = $ip_reg_sep*60*60;
}
if ($register_type=="close_register") {
	flash("register_closed", URL);
}elseif ($register_type=="open_invite_reg"){
	setvar("IfInviteCode", true);
	$check_invite_code = true;
}
if(isset($_POST['register']) && $capt_check) {
	$is_company = false;
	$if_need_check = false;
	$register_type = trim($_POST['register']);
	$register_typename = trim($_POST['typename']);
	pb_submit_check('data');
	$default_membergroupid_res = $pdb->GetRow("SELECT * FROM {$tb_prefix}membertypes WHERE name='".$register_typename."'");
	$default_membergroupid = $default_membergroupid_res['default_membergroup_id'];
	if(empty($default_membergroupid)) $default_membergroupid = $membergroup->field("id","is_default=1");
	if ($default_membergroupid_res['id']>1) {
		$is_company = true;
	}
	$member->setParams();
	$memberfield->setParams();
	$member->params['data']['member']['membergroup_id'] = $default_membergroupid;
	$time_limits = $pdb->GetOne("SELECT default_live_time FROM {$tb_prefix}membergroups WHERE id={$default_membergroupid}");
	$member->params['data']['member']['service_start_date'] = $time_stamp;
	$member->params['data']['member']['service_end_date'] = $membergroup->getServiceEndtime($time_limits);
	$member->params['data']['member']['membertype_id'] = $default_membergroupid_res['id'];
	//$member->params['data']['member']['new_clicked_date'] = date('d-m-Y H:i:s');
	if($member_reg_auth=="1" || $member_reg_auth!=0 || !empty($_PB_CACHE['setting']['new_userauth'])){
		$member->params['data']['member']['status'] = 0;
		$if_need_check = true;
	} else {
		$member->params['data']['member']['status'] = 1;
	}
	
	if(trim($member->params['data']['member']['referrer_id']) != '') $referrer = $member->field("id", "username='".$member->params['data']['member']['referrer_id']."' OR email='".$member->params['data']['member']['referrer_id']."' OR space_name='".$member->params['data']['member']['referrer_id']."'");
	if($referrer)
	{
		$member->params['data']['member']['referrer_id'] = $referrer;
	}
	else
	{
		$member->params['data']['member']['referrer_id'] = "757";
	}
	
	$updated = false;
	$updated = $member->Add();
	if ($member_reg_auth == 1) {
		$if_need_check = true;
		$exp_time = $time_stamp+1296000;
		$tmp_username = $member->params['data']['member']['username'];
		$hash = authcode("{$tmp_username}\t".$exp_time, "ENCODE");
		//$hash = str_replace(array("+", "|"), array("|", "_"), $hash);
		$hash = rawurlencode($hash);
		setvar("hash", $hash);
		setvar("username", $tmp_username);
		setvar("expire_date", date("d-m-Y",strtotime("+100 day")));
		$sended = pb_sendmail(array($member->params['data']['member']['email'], $member->params['data']['member']['username']), $tmp_username.", ".L("pls_active_your_account_title", "tpl"), "activite");
	}
	if (!empty($_PB_CACHE['setting']['welcome_msg'])) {
		setvar("user_name", $member->params['data']['member']['username']);
		$sended = pb_sendmail(array($member->params['data']['member']['email'], $member->params['data']['member']['username']), L("thx_for_your_reg", "tpl", $_PB_CACHE['setting']['site_name']), "welcome");
	}

	if($updated){
		$key = $member->table_name."_id";
		$last_member_id = $member->$key;
		
		//update link tables
		if($referrer)
		{
			$link->save(array("parent_id"=>$referrer, "member_id"=>$last_member_id, "type_id"=>1, "created"=>date("Y-m-d H:i:s")));
			$point->update("invite",intval($referrer));
		}
		else
		{
			$link->save(array("parent_id"=>757, "member_id"=>$last_member_id, "type_id"=>1, "created"=>date("Y-m-d H:i:s")));
			$point->update("invite",intval(757));
		}
		
		if (empty($_PB_CACHE['setting']['reg_filename'])) {
			$gopage = URL.'register.php?action=done&em='.urlencode($member->params['data']['member']['email']);
		}else{
			$gopage = URL.$_PB_CACHE['setting']['reg_filename'].'?action=done&em='.urlencode($member->params['data']['member']['email']);
		}
		pheader("location:".$gopage);
	}else{
		setvar("member", $_POST['data']['member']);
		if(isset($_POST['data']['memberfield'])) setvar("memberfield", $_POST['data']['memberfield']);
	}
}

setvar("capt_check",$capt_check);
setvar("sid",md5(uniqid($time_stamp)));
setvar("agreement", $_PB_CACHE['setting']['agreement']);

	//announce	
	$dksd = $announcement->read("message",23);
	setvar("dksd", $dksd["message"]);
	setvar("dksd_raw", substr(trim(strip_tags($dksd["message"])),29,1000));
	
	$qltv = $announcement->read("message",24);
	setvar("qltv", $qltv["message"]);
	setvar("qltv_raw", substr(trim(strip_tags($qltv["message"])),40,1000));
	
	$baomat = $announcement->read("message",25);
	setvar("baomat", $baomat["message"]);
	setvar("baomat_raw", substr(trim(strip_tags($baomat["message"])),12,1000));
	
	$qc = $announcement->read("message",31);
	setvar("qc", $qc["message"]);
	setvar("qc_raw", substr(trim(strip_tags($qc["message"])),12,10000));

	
	if(detectMobile()) {
		render("mobile/register");
	} else {
		render($tpl_file);
	}

?>