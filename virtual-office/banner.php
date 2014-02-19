<?php
/**
 *      [PHPB2B] Copyright (C) 2007-2099, Ualink Inc. All Rights Reserved.
 *      The contents of this file are subject to the License; you may not use this file except in compliance with the License. 
 *
 *      @version $Revision: 2238 $
 */
require("../libraries/common.inc.php");
require("room.share.php");
require(LIB_PATH .'time.class.php');
require(LIB_PATH .'page.class.php');
require(LIB_PATH .'xml.class.php');
require(CACHE_COMMON_PATH."cache_type.php");
uses("attachment", "ad", "adzone","industry","typeoption");
$attachment = new Attachment('attach');
//$attachment = new Attachments();
$adses = new Adses();
$adzone = new Adzones();
$industry = new Industries();
$typeoption = new Typeoption();
$tpl_file = "banner";
$page = new Pages();
setvar("Adzones",$adzone->findAll("id,name",null, null,"id desc"));
setvar("AdsStatus", $typeoption->get_cache_type("common_option"));


if (isset($_POST['do'])) {
}

if (isset($_POST['save'])) {
	$vals = $_POST['ad'];
	
	$vals['member_id'] = $the_memberid;		
	$vals['industry_id'] = PbController::getMultiId($_POST['industry']['id']);
	$vals['status'] = 0;
	
	if(isset($_POST['id'])){
		$id = intval($_POST['id']);
	}
	if (!empty($_FILES['attach']['name'])) {
		$aname = (empty($id))?($adses->getMaxId()+1):$id;
		$attachment->if_thumb=false;
		$attachment->if_thumb_large = false;
		$attachment->if_watermark = false;
		$attachment->insert_new = false;
		$attachment->rename_file = $vals['adzone_id']."-".$aname."-".$companyinfo["id"];
		$attachment->upload_process();
		$vals['source_url'] = $attachment->file_full_url;
		$vals['source_type'] = $_FILES['attach']['type'];
		$vals['is_image'] = $attachment->is_image;
		$vals['width'] = (!empty($vals['width']))?$vals['width']:$attachment->width;
		$vals['height'] = (!empty($vals['height']))?$vals['height']:$attachment->height;
	}
	if(!empty($_POST['data']['end_date'])) {
	    $vals['end_date'] = Times::dateConvert($_POST['data']['end_date']);
	}
	if(!empty($_POST['data']['start_date'])) {
		$vals['start_date'] = Times::dateConvert($_POST['data']['start_date']);
	}
	if (!empty($id)) {
		$vals['modified'] = $time_stamp;
		$result = $adses->save($vals, "update", $id);
		$url = "banner.php";
	}else{
		if (empty($vals['start_date'])) {
			$vals['start_date'] = $time_stamp;
		}
		$vals['created'] = $vals['modified'] = $time_stamp;
		$result = $adses->save($vals);
	}
	if (!$result) {
		flash();
	}
	//$adzone->updateBreathe($vals['adzone_id']);
	if (!empty($url)) {
		flash("success", $url);
	}
}

if (isset($_GET['do'])) {
	$do = trim($_GET['do']);
	$id = intval($_GET['id']);
	if ($do=="edit") {
		if (!empty($id)) {
			$info = $adses->GetRow("SELECT * FROM {$tb_prefix}adses AS a WHERE a.member_id=".$the_memberid." AND a.id={$id}");			
			if (!empty($info['source_url'])) {
				$info['image'] = pb_get_attachmenturl($info['source_url'], "../", "");
			}
			$r1 = $industry->disSubOptions($info['industry_id'], "industry_");
			//$r2 = $area->disSubOptions($info['area_id'], "area_");
			$info = am($info, $r1, $r2);
			
			//$info['src'] = pb_get_attachmenturl($info['source_url'], '../', "");
			setvar("item", $info);
		}
		$tpl_file = "banner_edit";
		template($tpl_file);
		exit;
	}
	if($do=="del" && !empty($id)) {
		//get attach info
		
		$result = $adses->del(intval($id), "member_id=".$the_memberid);
	}
	if ($do == "state") {
		switch ($_GET['type']) {
			case "up":
				$state = 1;
				break;
			case "down":
				$state = 0;
				break;
			default:
				$state = 0;
				break;
		}
		if (!empty($id)) {
			$vals['state'] = $state;
			$updated = $pdb->Execute("UPDATE {$tb_prefix}adses SET state={$state} WHERE id={$id} AND member_id={$the_memberid}");
		}
		header('Location: '.$_SERVER['HTTP_REFERER']);
	}
}


//$joins[] = "LEFT JOIN {$tb_prefix}attachments Attachment ON Album.attachment_id=Attachment.id";
$jions = NULL;
$conditions[] = "Ads.member_id=".$the_memberid;
$amount = $adses->findCount($joins, $conditions, "Ads.id");
$page->setPagenav($amount);
$res = $pdb->GetAll("SELECT * from {$tb_prefix}adses");
$result = $adses->findAll("*", $joins, $conditions, "Ads.id DESC", $page->firstcount, $page->displaypg);
if (!empty($result)) {
	for($i=0; $i<count($result); $i++){
		$result[$i]['src'] = pb_get_attachmenturl($result[$i]['source_url'], '../', "");
		$result[$i]['industry_names'] = $industry->disSubNames($result[$i]['industry_id'],' <span class="delim">/</span> ', false, "product");
	}
	setvar("Items", $result);
	setvar("ByPages", $page->pagenav);
}
template($tpl_file);
?>