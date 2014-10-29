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
uses("sponsor","area","attachment");
$attachment = new Attachment('pic');
$sponsor = new Sponsors();
$area = new Areas();
$page = new Pages();
$page->displaypg = 120;

$tpl_file = 'sponsor';

$conditions = array();
$joins = array();

if (isset($_POST['save'])) {
	$vals = $_POST['data']['sponsor'];
	$vals["types"] = implode(",", $_POST['types']);
	$vals['area_id'] = PbController::getMultiId($_POST['area']['id']);
	$vals['created'] = date("Y-m-d H:i:s");
	
	if (!empty($_FILES['pic']['name'])) {
		$attachment->if_watermark = false;
		$attachment->if_thumb_middle = false;
		$attachment->if_logo = true;
		$attachment->rename_file = "sponsor-".strtotime(date('Y-m-d H:i:s')).rand(0,9000);
		$attachment->upload_process();
		
		if($attachment->width > 150 && $attachment->height > 150)
		{
			$vals['logo'] = $attachment->file_full_url;
		}
		else
		{
			$upload_error = true;
		}
	}
	
	if(isset($_POST["id"])) {
		$sponsor->save($vals,"update",intval($_POST["id"]));
	} else {
		$sponsor->save($vals);
	}
}

if (isset($_GET['do'])) {
	$do = trim($_GET['do']);
	if (!empty($_GET['id'])) {
		$id = intval($_GET['id']);
	}
	if ($do == "del" && !empty($id)) {
		$sponsor->del($id);
		pheader("location:".$_SERVER['HTTP_REFERER']);
	}
	if($do == "edit"){
		if(!empty($id)){			
			$item = $sponsor->read("*",$id);
			$r2 = $area->disSubOptions($item['area_id'], "area_");
			$item = am($item, $r1, $r2, $seo);
			
			setvar("item",$item);
		}
		
		//get types
		$types = array(array("name"=>"school","name_s"=>"Trường học"),
			       array("name"=>"job","name_s"=>"Việc làm"),
			       array("name"=>"trade","name_s"=>"Thương mại"));
		$current_types = explode(",", $item["types"]);
		foreach($types as $key => $ii) {
			if(in_array($ii["name"],$current_types)) {
				$types[$key]["checked"] = 1;
			}
		}
		setvar("types", $types);
		
		$tpl_file = "sponsor.edit";
		template($tpl_file);
		exit;
	}
}

$amount = $sponsor->findCount($joins, $conditions,"Sponsor.id");
$page->setPagenav($amount);

$result = $sponsor->findAll("Sponsor.*", $joins, $conditions,"Sponsor.created DESC",$page->firstcount,$page->displaypg);
foreach($result as $key => $office) {	
	$result[$key] = $sponsor->formatResult($office);
}
setvar("Items", $result);
setvar("ByPages", $page->pagenav);

template($tpl_file);
?>