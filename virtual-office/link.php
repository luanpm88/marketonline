<?php
/**
 *      [PHPB2B] Copyright (C) 2007-2099, Ualink Inc. All Rights Reserved.
 *      The contents of this file are subject to the License; you may not use this file except in compliance with the License. 
 *
 *      @version $Revision: 2133 $
 */
require("../libraries/common.inc.php");
require("room.share.php");
require(LIB_PATH .'time.class.php');
require(PHPB2B_ROOT.'libraries/page.class.php');
uses("link", "member");

$link = new Links();
$page = new Pages();
$member = new Members();
$countAgent = $link->countAgent($the_memberid);

if (isset($_GET['do'])) {
	$do = trim($_GET['do']);
	if (!empty($_GET['id'])) {
		$id = intval($_GET['id']);
	}
	if ($do=="setAgent" && !empty($id)) {
		if($countAgent < 10)
		{
			$link->updateStatus($the_memberid ,$id, 2);
		}
	}
}


$tpl_file = "links";
$page->displaypg = 15;

$amount = $link->countMember($the_memberid);
$page->setPagenav($amount);
$result = $link->findMember($the_memberid);

if (!empty($result)) {
	for($i=0; $i<count($result); $i++){
		
		if ($result[$i]['company_status'] == 1 && $result[$i]['checkout'] == 1)
		{
			$link->updateStatus($the_memberid ,$result[$i]['id'], 3);
			$result[$i]['type_id'] = 3;
		}
		//get memifo
		//$result[$i]['info'] = $member->getInfoById($the_memberid);
		
	}
	setvar("Items", $result);
}

setvar("CountAgent", $countAgent);
setvar("ByPages",$page->pagenav);
template($tpl_file);
?>