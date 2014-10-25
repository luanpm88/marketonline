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
	if ($do == "del" && !empty($id)) {
		$companyoffice->del($id);
		pheader("location:".$_SERVER['HTTP_REFERER']);
	}
}

$amount = $companyoffice->findCount($joins, $conditions,"Companyoffice.id");
$page->setPagenav($amount);

$joins[] = "LEFT JOIN {$tb_prefix}companies c ON c.id=Companyoffice.company_id";
$joins[] = "LEFT JOIN {$tb_prefix}members m ON c.member_id=m.id";

$result = $companyoffice->findAll("c.shop_name,m.space_name,m.username,Companyoffice.*", $joins, $conditions,"Companyoffice.created DESC",$page->firstcount,$page->displaypg);
foreach($result as $key => $office) {	
	$result[$key] = $companyoffice->formatResult($office);
}

setvar("Items", $result);
setvar("ByPages", $page->pagenav);

template($tpl_file);
?>