<?php
/**
 *      [PHPB2B] Copyright (C) 2007-2099, Ualink Inc. All Rights Reserved.
 *      The contents of this file are subject to the License; you may not use this file except in compliance with the License. 
 *
 *      @version $Revision: 2238 $
 */
require("../libraries/common.inc.php");
require("room.share.php");
require(LIB_PATH. 'page.class.php');
require(CACHE_COMMON_PATH."cache_type.php");
uses("attachment", "task");

$attachment_controller = new Attachment('pic');

$task = new Tasks();

$tpl_file = "task";
$page = new Pages();
$page->displaypg = 1000;

if($pb_userinfo["role"]!="admin") {
	exit;
}

$max_order = $task->findAll("MAX(display_order) as maxnum");

if (isset($_POST['save_order'])) {
	foreach ($_POST['order'] as $key => $val) {
		$task->saveField("`display_order`",$val,intval($key));
	}
}

if (isset($_POST['do'])) {
	$vals = $_POST["album"];
	
	if($_POST['id']) {
		$vals["modified"] = date('Y-m-d H:i:s');
		$task->save($vals,"update",$_POST['id']);
	} else {
		$vals["display_order"] = $max_order[0]["maxnum"]+1;
		$vals["created"] = date('Y-m-d H:i:s');
		$vals["modified"] = date('Y-m-d H:i:s');
		$task->save($vals);
	}
}

if (isset($_GET['do'])) {
	$do = trim($_GET['do']);
	if (!empty($_GET['id'])) {
		$id = intval($_GET['id']);
	}
	if($do=="del" && !empty($id)) {
		$task->del(intval($id));
	}
	if ($do=="edit") {
		if (!empty($id)) {
			$item = $task->read("*",$id);
			
			setvar("item", $item);
		}
		$tpl_file = "task_edit";
		template($tpl_file);
		exit;
	}
	if ($do == "status") {		
		if (!empty($id)) {
			$updated = $pdb->Execute("UPDATE {$tb_prefix}tasks SET status=".$_GET['status'].", modified='".date('Y-m-d H:i:s')."' WHERE id={$id}");
		}
	}
}

$amount = $task->findCount(null, null, "Task.created DESC");
$page->setPagenav($amount);
$res = $pdb->GetAll("SELECT * from {$tb_prefix}albums");
$result = $task->findAll("*", null, null, "Task.display_order");
foreach($result as $key => $task) {
	if (strpos($task["image"],'http') !== false) {
		$result[$key]["link"] = $task["image"];
	} else {
		$result[$key]["link"] = "../images/tasks/".$task["image"];
	}
	
}
setvar("Items",$result);
template($tpl_file);
?>