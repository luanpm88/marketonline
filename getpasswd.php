<?php
/**
 *      [PHPB2B] Copyright (C) 2007-2099, Ualink Inc. All Rights Reserved.
 *      The contents of this file are subject to the License; you may not use this file except in compliance with the License. 
 *
 *      @version $Revision: 2098 $
 */
define('CURSCRIPT', 'getpasswd');
require("libraries/common.inc.php");
require("share.inc.php");
require("libraries/sendmail.inc.php");
uses("member");
$member = new Members();
if (isset($_POST['action'])) {
	pb_submit_check("data");
	$checked = true;
	$login_name = trim($_POST['data']['username']);
	$user_email = strtolower(trim($_POST['data']['email']));
	if(!pb_check_email($user_email)){
		setvar("ERRORS", L("wrong_email_format"));
		$checked = false;
	}else{
		//$member->setInfoByUserName($login_name);
		$member->setInfoByEmail($user_email);
		$member_info = $member->getInfo();
		if(!$member_info || empty($member_info)){
			setvar("ERRORS", "Tài khoản không có trong hệ thống. Hãy thử lại email khác.");
			setvar("postLoginName", $login_name);
			setvar("postUserEmail", $user_email);
			$checked = false;
		}elseif (!pb_strcomp($user_email, $member_info['email'])){
			setvar("ERRORS", L("please_input_email"));
			$checked = false;
		}
		if(!pb_check_email($member_info['email'])){
			$checked = false;
		}
		if ($checked) {
			$exp_time = $time_stamp + 86400;
			$hash = authcode(addslashes($member_info['username'])."\t".$exp_time,"ENCODE");
			setvar("hash", rawurlencode($hash));
			setvar("expire_date", date("d-m-Y H:i",strtotime("+1 day")));
			$sended = pb_sendmail(array($member_info['email'], $login_name), L("pls_reset_passwd"), "getpasswd");
			if(!$sended)
			{
				flash("email_send_false");
			}else{
				preg_match('/(.*?)@(.*?)$/', $member_info['email'], $match);
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
				//setvar("gomail", $gomail);
				
				flash(array("message"=>"Vui lòng kiểm tra email<br/> <strong gomail='".$gomail."'>".$member_info['email']."</strong> và chọn lại mật khẩu mới.", "box_title"=>"Xác minh tài khoản", "page_title"=>"Lấy lại mật khẩu", "gomail" => $gomail));
			}
		}
	}
}
$viewhelper->setPosition(L("get_password", "tpl"));
formhash();

if(detectMobile()) {
	render("mobile/getpasswd", true);
} else {
	render("getpasswd");
}

?>