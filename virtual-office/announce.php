<?php
/**
 *      [PHPB2B] Copyright (C) 2007-2099, Ualink Inc. All Rights Reserved.
 *      The contents of this file are subject to the License; you may not use this file except in compliance with the License. 
 *
 *      @version $Revision: 2075 $
 */
require("../libraries/common.inc.php");
require("room.share.php");
require(PHPB2B_ROOT.'./libraries/page.class.php');
require(CACHE_COMMON_PATH."cache_type.php");
uses("announcement","announcementtype");

$announce = new Announcements();
$announcementtype = new Announcementtypes();

if (!empty($_GET['id'])) {
	$id = intval($_GET['id']);
	$info = $announce->read("*", $id, null, null);
	
	//check if read
	if(!strpos("[0]".$info["read_members"], "[".$the_memberid."]"))
	{			
		$info["read_members"] .= "[".$the_memberid."]";
		$announce->saveField("read_members", $info["read_members"], intval($info["id"]));
	}

	//var_dump($info);	
	$tpl_file = "announce";
	setvar("item",$info);
	template($tpl_file);
}
elseif (!empty($_GET['type']))
{
	$info = $announcementtype->read("*", $_GET['type'], null, null);
	
	var_dump($info);
	$tpl_file = "announce_list";
	setvar("item",$info);
	template($tpl_file);
}
?>