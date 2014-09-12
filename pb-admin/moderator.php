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
		$vals["rights"] = implode(",", $_POST['rights']);
		$vals["status"] = $_POST["status"];
		
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
			foreach($level1 as $key => $ii) {
				$level2 = $industry->findAll("id,name",null,array("parent_id=".$ii["id"]));
				foreach($level2 as $key2 => $item2) {
					if(in_array($item2["id"],$current_industries)) {
						$level2[$key2]["checked"] = 1;
					}
				}
				$level1[$key]["children"] = $level2;
			}
			setvar("industries", $level1);
			
			//get types
			$types = array(array("name"=>"product","name_s"=>"Sản phẩm"),array("name"=>"service","name_s"=>"Dịch vụ"),array("name"=>"trade","name_s"=>"Thương mại"));
			$current_types = explode(",", $item["manage_types"]);
			foreach($types as $key => $ii) {
				if(in_array($ii["name"],$current_types)) {
					$types[$key]["checked"] = 1;
				}
			}
			setvar("types", $types);
			
			//get rights
			$rights = array(array("name"=>"valid","name_s"=>"Xác nhận"),array("name"=>"unvalid","name_s"=>"Kiểm duyệt"));
			$current_rights = explode(",", $item["rights"]);
			foreach($rights as $key => $ii) {
				if(in_array($ii["name"],$current_rights)) {
					$rights[$key]["checked"] = 1;
				}
			}
			setvar("rights", $rights);
			
			$tpl_file = "moderator.edit";
			template($tpl_file);
			exit;
		}		
	}
	if ($do == "del") {
		if(!empty($id)){
			$moderatordb->del($id);
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
foreach($result as $key => $item) {
	$result[$key]["industries"] = $industry->findAll("id,name",null,array("id IN (".$item["manage_industries"].")"));
	if($item["status"]) {
		$string = '<img src="../templates/office/images/published.png">';
	} else {
		$string = '<img src="../templates/office/images/unpublished.png">';
	}
	$result[$key]["status_s"] = $string;
}

setvar("Items", $result);
setvar("ByPages", $page->pagenav);
template($tpl_file);
?>