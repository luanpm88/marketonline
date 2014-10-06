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
uses("member");
$member = new Members();
$page = new Pages();
$page->displaypg = 30;

$tpl_file = 'student';

if (isset($_GET['do'])) {
	$do = trim($_GET['do']);
	if (!empty($_GET['id'])) {
		$id = intval($_GET['id']);
	}
	if ($do=="show" && $id) {
		$member->saveField("area_show", intval($_GET["value"]), intval($id));
		pheader("location:".$_SERVER['HTTP_REFERER']);
	}
}

$conditions = array();
$joins = array();

$conditions[] = "mf.school_id!=0";
	
$joins[] = "LEFT JOIN {$member->table_prefix}memberfields AS mf ON Member.id = mf.member_id";
$joins[] = "LEFT JOIN {$member->table_prefix}schools AS sc ON sc.id = mf.school_id";
$joins[] = "LEFT JOIN {$member->table_prefix}areas a ON a.id=sc.area_id";
$joins[] = "LEFT JOIN {$member->table_prefix}areas a_parent ON a_parent.id=a.parent_id";

$amount = $member->findCount($joins, $conditions,"School.id");
$page->setPagenav($amount);

$result = $member->findAll("mf.last_name,mf.first_name,Member.*", $joins, $conditions,"mf.first_name DESC",$page->firstcount,$page->displaypg);
//var_dump($result);

setvar("Items", $result);
setvar("ByPages", $page->pagenav);

template($tpl_file);
?>