<?php
/**
 *      [PHPB2B] Copyright (C) 2007-2099, Ualink Inc. All Rights Reserved.
 *      The contents of this file are subject to the License; you may not use this file except in compliance with the License. 
 *
 *      @version $Revision: 2075 $
 */
require("../libraries/common.inc.php");
require(PHPB2B_ROOT.'./libraries/page.class.php');
require("session_cp.inc.php");
require(LIB_PATH. "cache.class.php");
require(CACHE_COMMON_PATH."cache_type.php");
uses("companyoffice");
$companyoffice = new Companyoffices();
$page = new Pages();
$page->displaypg = 120;

$tpl_file = 'companyoffice';

$conditions = array();
$joins = array();

if (isset($_POST)) {
	if (isset($_POST['del'])) {
		//$chat->del($_POST['id']);
		var_dump($_POST['id']);
	}
}

if (isset($_GET['do'])) {
	$do = trim($_GET['do']);
	if (!empty($_GET['id'])) {
		$id = intval($_GET['id']);
	}
	if ($do=="area_show" && $id) {
		$member->saveField("area_show", intval($_GET["value"]), intval($id));
		pheader("location:".$_SERVER['HTTP_REFERER']);
	}
	
	if ($do == "del" && !empty($id)) {
		$chat->del($id);
		pheader("location:".$_SERVER['HTTP_REFERER']);
	}
	if ($do == "search") {
		if (isset($_GET['q'])) $conditions[]= "(LOWER(LTRIM(RTRIM(Chat.cache_from_username)))='".strtolower(trim($_GET['q']))."' OR LOWER(LTRIM(RTRIM(Chat.cache_to_username)))='".strtolower(trim($_GET['q']))."')";		
	}
}

$amount = $companyoffice->findCount($joins, $conditions,"Companyoffice.id");
$page->setPagenav($amount);

$result = $companyoffice->findAll("Companyoffice.*", $joins, $conditions,"Companyoffice.created DESC",$page->firstcount,$page->displaypg);
foreach($result as $key => $office) {	
	$result[$key] = $companyoffice->formatResult($office);
}

setvar("Items", $result);
setvar("ByPages", $page->pagenav);

template($tpl_file);
?>