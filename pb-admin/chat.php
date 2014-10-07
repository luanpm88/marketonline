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
uses("chat");
$chat = new Chats();
$page = new Pages();
$page->displaypg = 120;

$tpl_file = 'chat';

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

$joins[] = "LEFT JOIN {$member->table_prefix}members sender ON sender.id = Chat.from_member_id";
$joins[] = "LEFT JOIN {$member->table_prefix}memberfields psender ON psender.member_id = Chat.from_member_id";
$joins[] = "LEFT JOIN {$member->table_prefix}members receiver ON receiver.id = Chat.to_member_id";
$joins[] = "LEFT JOIN {$member->table_prefix}memberfields preceiver ON preceiver.member_id = Chat.to_member_id";

$amount = $chat->findCount($joins, $conditions,"Chat.id");
$page->setPagenav($amount);

$result = $chat->findAll("preceiver.first_name as r_first_name,preceiver.last_name as r_last_name,receiver.username as r_username,psender.first_name as s_first_name,psender.last_name as s_last_name,sender.username as s_username,Chat.*", $joins, $conditions,"Chat.created DESC",$page->firstcount,$page->displaypg);
foreach($result as $key => $chat) {
	$chat['r_fullname'] = $chat['r_first_name']." ".$chat['r_last_name'];
	$chat['s_fullname'] = $chat['s_first_name']." ".$chat['s_last_name'];
	$chat['created'] = date("Y-m-d H:i",$chat['created']);
	
	$result[$key] = $chat;
}
//var_dump($result);

setvar("Items", $result);
setvar("ByPages", $page->pagenav);

template($tpl_file);
?>