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
uses("studygroup");
$studygroup = new Studygroups();
$page = new Pages();
$page->displaypg = 30;

$tpl_file = 'studygroup';

if (isset($_GET['do'])) {
	$do = trim($_GET['do']);
	if (!empty($_GET['id'])) {
		$id = intval($_GET['id']);
	}
	if ($do=="area_show" && $id) {
		$studygroup->saveField("area_show", intval($_GET["value"]), intval($id));
		pheader("location:".$_SERVER['HTTP_REFERER']);
	}
	if ($do == "del" && !empty($id)) {
		$studygroup->del($id);
		pheader("location:".$_SERVER['HTTP_REFERER']);
	}
}

$conditions = array();
$joins = array();

	
$joins = array();
$joins[] = "LEFT JOIN {$studygroup->table_prefix}schools sc ON sc.id=Studygroup.school_id";
$joins[] = "LEFT JOIN {$studygroup->table_prefix}areas a ON a.id=sc.area_id";
$joins[] = "LEFT JOIN {$studygroup->table_prefix}areas a_parent ON a_parent.id=a.parent_id";
$joins[] = "LEFT JOIN {$studygroup->table_prefix}subjects su ON su.id=Studygroup.subject_id";
		

$amount = $studygroup->findCount($joins, $conditions,"Studygroup.id");
$page->setPagenav($amount);

$result = $studygroup->findAll("sc.name as school_name, su.name as subject_name,Studygroup.*", $joins, $conditions,"sc.name,su.name",$page->firstcount,$page->displaypg);


setvar("Items", $result);
setvar("ByPages", $page->pagenav);

template($tpl_file);
?>