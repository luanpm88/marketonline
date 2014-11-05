<?php
/**
 *      [PHPB2B] Copyright (C) 2007-2099, Ualink Inc. All Rights Reserved.
 *      The contents of this file are subject to the License; you may not use this file except in compliance with the License. 
 *
 *      @version $Revision: 2075 $
 */
require("../libraries/common.inc.php");
require("session_cp.inc.php");
uses("adsize");
require(PHPB2B_ROOT.'libraries/page.class.php');
$_PB_CACHE['membergroup'] = cache_read("membergroup");
$tpl_file = "adsize";
$adsize = new Adsizes();
$page = new Pages();
$conditions = null;
if (isset($_GET['do'])) {
	$do = trim($_GET['do']);
	if (!empty($_GET['id'])) {
		$id = intval($_GET['id']);
		setvar("id", $id);
	}
	if ($do=="del" && !empty($id)) {
		$adsize->del($id);		
	}
	if ($do == "edit") {		
		if (!empty($id)) {
			$result = $adsize->read("*", $id);
			
			setvar("item",$result);
		}
		$tpl_file = "adsize.edit";
		template($tpl_file);
		exit;
	}
}
if (isset($_POST['save'])) {
	$vals = $_POST['adsize'];
	$id = $_POST['id'];

	if (!empty($id)) {
		$result = $adsize->save($vals, "update", $id);
	}else{
		$result = $adsize->save($vals);
	}
}


$amount = $adsize->findCount();
$page->setPagenav($amount);
$result = $adsize->findAll("*",null, $conditions, "id", $page->firstcount, $page->displaypg);
setvar("Items",$result);

template($tpl_file);
?>