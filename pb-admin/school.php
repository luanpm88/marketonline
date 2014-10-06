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
uses("school");
$school = new Schools();
$page = new Pages();
$page->displaypg = 30;

$tpl_file = 'school';

if (isset($_GET['do'])) {
	$do = trim($_GET['do']);
	if (!empty($_GET['id'])) {
		$id = intval($_GET['id']);
	}
	if ($do=="show" && $id) {
		$school->saveField("area_show", intval($_GET["value"]), intval($id));
		pheader("location:".$_SERVER['HTTP_REFERER']);
	}
}

$conditions = array();
$joins = array();

$joins[] = "LEFT JOIN {$school->table_prefix}members AS m ON m.id = School.member_id";
$joins[] = "LEFT JOIN {$school->table_prefix}members AS leader ON leader.id = School.leader_id";

$amount = $school->findCount($joins, $conditions,"School.id");
$page->setPagenav($amount);

$result = $school->findAll("leader.username,School.*", $joins, $conditions,"School.id DESC",$page->firstcount,$page->displaypg);

setvar("Items", $result);
setvar("ByPages", $page->pagenav);

template($tpl_file);
?>