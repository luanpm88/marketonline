<?php
/**
 *      [PHPB2B] Copyright (C) 2007-2099, Ualink Inc. All Rights Reserved.
 *      The contents of this file are subject to the License; you may not use this file except in compliance with the License. 
 *
 *      @version $Revision: 2153 $
 */
session_start();
define('CURSCRIPT', 'redirect');
require("libraries/common.inc.php");
require("share.inc.php");
$sid = session_id();
//search the urls at the url table.
echo $_GET['url'];
if (!empty($_GET['url'])) {
	$url = htmlspecialchars(trim($_GET['url']));
	if (isset($_GET['app_lang'])){
		if(is_file(CACHE_ROOT.$_GET['app_lang'].DS."lang_site.php")) {
			usetcookie("lang", $_GET['app_lang']);
			
			$user = "";
			if (!empty($_GET['userid'])) {
				$user = "&userid=".$_GET['userid'];
			}
			
			pheader("location:".$url.$user);
			exit;
		}else{
			flash(L("file_not_exists", "msg", "lang_site.php"));
		}
	}
	if (strpos($url, "/")===0){
		$url = ltrim($url, "/");
	}
	$url = str_replace("amp;","",$url);
	pheader("location:".$url);
	echo $url;
	exit;
}else{
	flash(null, URL);
}
?>