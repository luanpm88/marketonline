<?php
/**
 *      [PHPB2B] Copyright (C) 2007-2099, Ualink Inc. All Rights Reserved.
 *      The contents of this file are subject to the License; you may not use this file except in compliance with the License. 
 *
 *      @version $Revision: 2075 $
 */
require("../libraries/common.inc.php");
require("room.share.php");
require(PHPB2B_ROOT.'libraries/page.class.php');
uses("message");
$pms = new Messages();
$page = new Pages();
$fields = "id,title,content";

if(isset($_GET["type"]))
{
	$conditions[] = "from_member_id=".$the_memberid;
}
else
{
	$conditions[] = "to_member_id=".$the_memberid;
}

if (isset($_GET['type'])) {
	$type = trim($_GET['type']);
	if (in_array($type, array("system", "user", "inquery"))) {
		$conditions[] = "type='".$type."'";
	}
}
if (isset($_GET['do'])) {
	$do = trim($_GET['do']);
	if (!empty($_GET['id'])) {
		$id = intval($_GET['id']);
	}
	if ($do=="send") {
		$item = array();
		if (isset($_GET['to'])) {
			$item['to'] = $_GET['to'];
		}
		setvar("item", $item);
		
		setvar("PageTitle","Hộp thư");

			if(detectMobile()) {	
				$smarty->template_dir = PHPB2B_ROOT. "templates/default/mobile/office/";
				template("m_pms_send");
			} else {
				template("pms_send");
			}

		exit;
	}
	if($do == "view" && !empty($id)){
		$message_info = $pms->read("*", $id, null, $conditions);
		if(!$message_info || empty($message_info)){
			flash();
		}else{
			$pdb->Execute("UPDATE {$tb_prefix}messages SET status=1 WHERE to_member_id=".$the_memberid." AND id=".$id);
			$message_info['pubdate'] = df($message_info['created']);
			setvar("item",$message_info);
			$tpl_file = "pms_detail";
			
			setvar("PageTitle","Hộp thư");

			if(detectMobile()) {	
				$smarty->template_dir = PHPB2B_ROOT. "templates/default/mobile/office/";
				template("m_pms_detail");
			} else {
				template($tpl_file);
			}

			exit;
		}
	}
}
if (isset($_POST['send']) && !empty($_POST['pms'])) {
	pb_submit_check('pms');
	$vals = array();
	$vals = $_POST['pms'];
	$vals['type'] = 'user';
	if (is_int($_POST['to'])) {
		$to_memberid = intval($_POST['to']);
		$member_info = $pdb->GetRow("SELECT id,username FROM {$tb_prefix}members WHERE id='".$to_memberid."'");
	}else{
		//echo "SELECT id,username FROM {$tb_prefix}members WHERE username='".$_POST['to']."'";
		$member_info = $pdb->GetRow("SELECT id,username FROM {$tb_prefix}members WHERE username='".$_POST['to']."'");
	}
	//var_dump($member_info);
	if (!$member_info || empty($member_info)) {
		//flash();3
		//echo "asdsada";
		setvar("mm", $vals);
		setvar("message", "Lỗi! Thông tin người gửi không đúng. Vui lòng thử lại.");
		//pheader("location:pms.php?do=send");
		template("pms_send");
		exit;
	}
	$result = $pms->SendToUser($the_membername, $member_info['username'], $vals);
	if ($result) {
		//flash();
		setvar("message", "Tin nhắn đã được gửi thành công!");
	}
}

if (isset($_POST['del'])) {
	$result = $pms->del($_POST['id'],"to_member_id=".$the_memberid);
	if ($result) {
		pheader("location:pms.php");
	}else {
		flash();
	}
}
$tpl_file = "pms";
$page->displaypg = 15;
$amount = $pms->findCount(null, $conditions);
$page->setPagenav($amount);
$result = $pms->findAll("id,from_member_id,cache_from_username,cache_to_username,title,content,status,created", null, $conditions, "id DESC", $page->firstcount, $page->displaypg);
setvar("MessageStatus", $pms->getReadStatus());
if (!empty($result)) {
	for($i=0; $i<count($result); $i++){
		$result[$i]['senddate'] = df($result[$i]['created']);
		switch ($result[$i]['type']) {
			case 'user':
				$result[$i]['typename'] = L("private_message", "tpl");
				break;
			case 'inquery':
				$result[$i]['typename'] = L("inquery_message", "tpl");
				break;
			default:
				$result[$i]['typename'] = L("system_message", "tpl");
				break;
		}
	}
	setvar("Items",$result);
}
//var_dump($result);
setvar("ByPages",$page->pagenav);

setvar("PageTitle","Hộp thư");

if(detectMobile()) {	
	$smarty->template_dir = PHPB2B_ROOT. "templates/default/mobile/office/";
	template("m_pms");
} else {
	template($tpl_file);
}

?>