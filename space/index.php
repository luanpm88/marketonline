<?php
/**
 *      [PHPB2B] Copyright (C) 2007-2099, Ualink Inc. All Rights Reserved.
 *      The contents of this file are subject to the License; you may not use this file except in compliance with the License. 
 *
 *      @version $Revision: 2048 $
 */
define('CURSCRIPT', 'index');
require("../libraries/common.inc.php");


	////get chatboxs
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
	
	$chatboxsnew = $session->read("chatboxsnew".session_id());
	//echo $chatboxs."ddfdfdf";
	$chatboxsnew = explode(",", $chatboxsnew);
	setvar("chatboxsnew", $chatboxsnew);


$do = null;
$space_actions = array(
"intro", 
"home", 
"product", 
"offer", 
"hr", 
"job", 
"news", 
"album", 
"index", 
"contact", 
"feedback",
"ajaxannoucebox"
);
$userid = 0;
if(isset($_GET['userid'])) {
	$userid = trim(htmlspecialchars($_GET['userid']));
}
if ($subdomain_support && $rewrite_able) {
	$hosts = explode($subdomain_support, pb_getenv('HTTP_HOST'));
	if(($hosts[0]!="www")){
	    $userid = trim($hosts[0]);
	}
}
if (isset($_GET['do'])) {
	$do = trim($_GET['do']);
	if($do=="" || $do=="index" || !in_array($do, $space_actions)) {
    	$do = "product";
	}
}else{
	$do = "product";
}
//var_dump($company->info);
if($do == "product" && strtolower($_GET["userid"]) == "admin")
{
	$do = "product_admin";
}

$pos = 0;
$limit = 10;//site every page set.
if (isset($_GET['pos'])) {
	$pos = intval($_GET['pos']);
}
setvar("do", $do);

require("common.inc.php");
require($do.".inc.php");
?>