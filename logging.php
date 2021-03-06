<?php
/**
 *      [PHPB2B] Copyright (C) 2007-2099, Ualink Inc. All Rights Reserved.
 *      The contents of this file are subject to the License; you may not use this file except in compliance with the License. 
 *
 *      @version $Revision: 2121 $
 */
define('CURSCRIPT', 'logging');
require("libraries/common.inc.php");
require("share.inc.php");
require(LIB_PATH. "validation.class.php");
require(PHPB2B_ROOT. 'libraries/sendmail.inc.php');
require(LIB_PATH.'passport.class.php');
session_start();
uses("announcement","member","company","point","memberfield","membergroup");
$validate = new Validation();
$announcement = new Announcements();
$membergroup = new Membergroups();
$passport = new Passports();
$memberfield = new Memberfields();
$company = new Companies();
$point = new Points();
$member = new Members();
$referer = "";
setvar("hide_search_bar", true);
capt_check("capt_logging");
if (empty($_GET['forward'])) {
	$_GET['forward'] = $_SERVER['HTTP_REFERER'];
}
if(isset($_GET['type'])){
	setvar('Type', $_GET['type']);
}
if (!empty($pb_user)) {
	//get more user info from logined.
	//pheader('location: '.$viewhelper->office_dir."/");
	$member_info = $member->getInfoById($pb_user['pb_userid']);
	if (!empty($member_info)) {
		setvar('member_info', $member_info);
	}
}
if(isset($_POST['action']) && ($_POST['action']=="logging")){
	pb_submit_check('data');
	if(!empty($_POST['data']['login_name']) && !empty($_POST['data']['login_pass'])){
		unset($_SESSION['authnum_session']);
		$tmpUserName = $_POST['data']['login_name'];
		$tmpUserPass = $_POST['data']['login_pass'];
		$checked = $member->checkUserLogin($tmpUserName,$tmpUserPass);
		$tmp_memberinfo = array();
		if ($checked > 0) {
			$tmp_memberinfo = $member->info;
			$point->update("logging", $member->info['id']);			
			//logging counting
			$member->loggingCount($member->info['id']);
			
			$announce = $announcement->getOldestUnread($member->info["id"],$member->info["membertype_id"], 1);
			if(($announce["times"]==null || $announce["times"] < 4)) {
				pheader("location:virtual-office/announce.php?announce=1&id=".$announce["id"]);
				exit;
			}
			
			if (!empty($_REQUEST['return_page'])) {				
				pheader("location:".$_REQUEST['return_page']);
				exit;
			}
			
			if (!empty($_REQUEST['forward'])) {
				$referer = $_REQUEST['forward'];
				if(!preg_match("/(\.php|[a-z]+(\-\d+)+\.html)/", $referer) || strpos($referer, 'logging.php')) {
					$referer = $viewhelper->office_dir."/";
				}
				pheader("location:".$referer);
				exit;
			}
			switch ($tmp_memberinfo['office_redirect']) {
				case 1:
					$goto_page = URL;
					break;
				case 2:
					$goto_page = $viewhelper->office_dir."/";
					break;
				case 3:
					$goto_page = $viewhelper->office_dir."/offer.php";
					break;
				case 4:
					$goto_page = $viewhelper->office_dir."/pms.php";
					break;
				default:
					$goto_page = URL."index.php";
					break;
			}
			if(isset($_POST['type']) && $_POST['type'] == 'new'){
				$mem = $member->read("*", intval($member->info['id']));
				
				if($mem['membertype_id'] == 5)
				{
					$goto_page = $viewhelper->office_dir."/company.php";
				}
				else $goto_page = $viewhelper->office_dir."/personal.php";
			}	
			
			if(!empty($_POST["redirect"]))
			{
				pheader('location: '.urldecode($_POST["redirect"]));
			}
			else
			{
				pheader('location: '.$goto_page);
			}
			
			
			
			exit;
		}elseif ($checked == (-2) ) {
			$member->validationErrors[] = L('member_not_exists');
		}elseif ($checked == (-3)) {
			$member->validationErrors[] = L('login_pwd_false');
		}elseif ($checked == (-4)) {
			$member->validationErrors[] = L('member_checking');
		}elseif ($checked == (-5)) {
			$member->validationErrors[] = "Tài khoản đã bị cấm.";
		}else {
			$member->validationErrors[] = L('login_faild');
		}
		
		setvar("LoginError", $validate->show($member));
	}
}

function ua_referer($default = '') {
	global $referer;
	$indexname = URL."index.php";
	$default = empty($default) ? $indexname : '';
	$referer = pb_htmlspecialchar($referer);
	if(!preg_match("/(\.php|[a-z]+(\-\d+)+\.html)/", $referer) || strpos($referer, 'logging.php')) {
		$referer = $default;
	}
	return $referer;
}

if(isset($_GET['action'])) {
	$action = trim($_GET['action']);
	switch ($action) {
		case "logout":
			$referer = null;
			$referer = ua_referer();
			if (isset($_GET['fr'])) {
				if ($_GET['fr']=="cp") {
					usetcookie("admin", '');
				}
			}
			$member->logOut();
			$gopage = $referer;
			if (!empty($_GET['forward'])) {
				pheader("location:".$_GET['forward']);
			}else{
				pheader("location:".$gopage);
				exit;
			}
			break;
		case "autologin":
			break;
		default:
			break;
	}
}
if(detectMobile()) {
	render("mobile/logging");
} else {
	render("logging");
}
?>