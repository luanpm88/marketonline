<?php
/**
 *      [PHPB2B] Copyright (C) 2007-2099, Ualink Inc. All Rights Reserved.
 *      The contents of this file are subject to the License; you may not use this file except in compliance with the License. 
 *
 *      @version $Revision: 2048 $
 */

if(!defined('IN_PHPB2B')) exit('Not A Valid Entry Point');
require(PHPB2B_ROOT."libraries/sendmail.inc.php");
require(CACHE_LANG_PATH."lang_site.php");

$capt_check = capt_check_2("capt_service");

if(isset($_POST["sender_email"]) && $_POST["sender_email"]!="" && $capt_check)
{
    $sended = pb_sendmail(array($company->info["email"], "Customer"), "Liên hệ từ khách hàng trên trang MarketOnline.vn", null, '<p><strong>'.$arrTemplate["_name"].'</strong>: '.$_POST["sender_name"].'</p>'.'<p><strong>'.$arrTemplate["_email"].'</strong>: '.$_POST["sender_email"].'</p>'.'<p><strong>'.$arrTemplate["_subject"].'</strong>: '.$_POST["letter_subject"].'</p>'.'<p><strong>'.$arrTemplate["_message"].'</strong>: '.$_POST["letter_text"].'</p>');
    if($sended)
    {
        setvar("success", 1);
    }
}
else
{
    setvar("post", $_POST);
}

setvar("capt_check",$capt_check);
setvar("sid",md5(uniqid($time_stamp)));
$space->render("contact");
?>