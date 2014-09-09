<?php
/**
 *      [PHPB2B] Copyright (C) 2007-2099, Ualink Inc. All Rights Reserved.
 *      The contents of this file are subject to the License; you may not use this file except in compliance with the License. 
 *
 *      @version $Revision: 2075 $
 */
require("../libraries/common.inc.php");
require(PHPB2B_ROOT.'libraries/page.class.php');
require("session_cp.inc.php");
uses("moderator","industry");
$moderatordb = new Moderators();
$industry = new Industries();
$page = new Pages();
$tpl_file = "moderator";

$page->displaypg = 30;

$conditions = array();

if (isset($_POST)) {
	if (isset($_POST['id'])) {
		$id = $_POST['id'];
		
		$vals["manage_types"] = implode(",", $_POST['types']);
		$vals["manage_industries"] = implode(",", $_POST['industries']);
		
		var_dump($vals);
		
		$moderatordb->save($vals, "update", intval($id));
	}
}

if (isset($_GET['do'])) {
	$do = trim($_GET['do']);
	if (!empty($_GET['id'])) {
		$id = intval($_GET['id']);
	}
	if ($do == "edit") {
		if(!empty($id)){
			$joins = array("LEFT JOIN {$tb_prefix}members m ON m.id=Moderator.member_id");
			
			$item = $moderatordb->read("Moderator.*,m.username", $id, null, null, $joins);
			setvar("item", $item);
			
			//get industries with level == 2
			$level1 = $industry->findAll("id,name",null,array("level=1"));
			$current_industries = explode(",", $item["manage_industries"]);
			foreach($level1 as $key => $item) {
				$level2 = $industry->findAll("id,name",null,array("parent_id=".$item["id"]));
				foreach($level2 as $key2 => $item2) {
					if(in_array($item2["id"],$current_industries)) {
						$level2[$key2]["checked"] = 1;
					}
				}
				$level1[$key]["children"] = $level2;
			}
			setvar("industries", $level1);
			
			//get types
			$types = array(array("name"=>"product"),array("name"=>"service"),array("name"=>"trade"));
			setvar("types", $types);
			
			$tpl_file = "moderator.edit";
			template($tpl_file);
			exit;
		}		
	}
}

$amount = $moderatordb->findCount(null, $conditions);
$page->setPagenav($amount);

$joins = array("LEFT JOIN {$tb_prefix}members m ON m.id=Moderator.member_id");
$joins[] = "LEFT JOIN {$tb_prefix}memberfields mf ON m.id=mf.member_id";
$joins[] = "LEFT JOIN {$tb_prefix}links link ON m.id=link.member_id";
$joins[] = "LEFT JOIN {$tb_prefix}members parent ON parent.id=link.parent_id";
$joins[] = "LEFT JOIN {$tb_prefix}companies c ON m.id=c.member_id";

$result = $moderatordb->findAll("m.space_name,c.shop_name,parent.username as parent_username,m.username, CONCAT(mf.first_name,' ',mf.last_name) AS NickName,Moderator.*", $joins, $conditions, "created DESC", $page->firstcount, $page->displaypg);

setvar("Items", $result);
setvar("ByPages", $page->pagenav);
template($tpl_file);
?>