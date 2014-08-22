<?php
/**
 *      [PHPB2B] Copyright (C) 2007-2099, Ualink Inc. All Rights Reserved.
 *      The contents of this file are subject to the License; you may not use this file except in compliance with the License. 
 *
 *      @version $Revision: 2075 $
 */
require("../libraries/common.inc.php");
require("session_cp.inc.php");
require(LIB_PATH. "cache.class.php");
require(CACHE_COMMON_PATH."cache_type.php");
require(LIB_PATH .'page.class.php');
$cache = new Caches();
$tpl_file = "companytype";

uses("companytype");
$companytype = new Companytypes();
$page = new Pages();

if (isset($_POST['del']) && !empty($_POST['id'])) {
	$result = $companytype->del($_POST['id']);
}

if (isset($_POST['saveorder'])) {
	foreach ($_POST['order'] as $key => $val) {
		$companytype->saveField("`display_order`",$val,intval($key));
	}
}


if (isset($_POST['save'])) {
	$vals = $_POST['companytype'];
	if(isset($_POST['id'])){
		$id = intval($_POST['id']);
	}
	
	if (!empty($id)) {		
		$result = $companytype->save($vals, "update", $id);		
	}else{
		$result = $companytype->save($vals);
	}
	if (!$result) {
		flash();
	}
	$url = "companytype.php";
	pheader("location:".$url);
}

if (isset($_GET['do'])){
	$do = trim($_GET['do']);
	if (!empty($_GET['id'])) {
		$id = intval($_GET['id']);
	}
	if($do=="del" && !empty($id)) {
		$result = $companytype->del($_GET['id'])	;
	}
	if ($do == "edit") {
		if (!empty($id)) {
			$result = $companytype->read("*", $id);
			setvar("item",$result);
		}
		$tpl_file = "companytype.edit";		
		template($tpl_file);
		exit;
	}
}

$amount = $companytype->findCount($joins,$conditions,"Companytype.id");
$page->setPagenav($amount);

$result = $companytype->findAll("Companytype.*",$joins, $conditions, " Companytype.id", $page->firstcount, $page->displaypg);
setvar("Items",$result);

template($tpl_file);
?>