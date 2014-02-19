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


if(isset($_POST["sender_email"]) && $_POST["sender_email"]!="")
{
    //setvar("message", $_POST["letter_text"]);
    $sended = pb_sendmail(array($company->info["email"], "Customer"), $_POST["letter_subject"], null, '<p>'.$arrTemplate["_name"].': '.$_POST["sender_name"].'</p>'.'<p>'.$arrTemplate["_email"].': '.$_POST["sender_email"].'</p>'.'<p>'.$arrTemplate["_subject"].': '.$_POST["letter_subject"].'</p>'.'<p>'.$arrTemplate["_message"].': '.$_POST["letter_text"].'</p>');
    //echo $sended;
    //if($sended)
    //{
        setvar("amessage", $sended);
    //}
    

}
    //var_dump($company->info["email"]);

$space->render("contact");
?>