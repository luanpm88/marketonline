<?php
/**
 *      [PHPB2B] Copyright (C) 2007-2099, Ualink Inc. All Rights Reserved.
 *      The contents of this file are subject to the License; you may not use this file except in compliance with the License. 
 *
 *      @version $Revision: 2075 $
 */
require("../libraries/common.inc.php");
require("session_cp.inc.php");
require(LIB_PATH .'time.class.php');
require(LIB_PATH .'page.class.php');
require(LIB_PATH .'xml.class.php');
uses("adsize","adzone","ad","attachment","typeoption","industry");
$tpl_file = "ad";
$attachment = new Attachment('attach','company');
$company = new Companies();
$adzone = new Adzones();
$adsize = new Adsizes();
$ads = new Adses();
$page = new Pages();
$page->displaypg = 20;
$typeoption = new Typeoption();
$industry = new Industries();
$conditions = array();
setvar("AdsStatus", $typeoption->get_cache_type("common_option"));
setvar("Adzones",$adzone->findAll("id,name",null, null,"name"));
if (isset($_POST['save'])) {
	$vals = $_POST['ad'];
	if(isset($_POST['id'])){
		$id = intval($_POST['id']);
	}
	
	$vals['industries'] = implode(",", $_POST["industries_checkbox"]);
	
	if (!empty($_FILES['attach']['name'])) {
		$aname = (empty($id))?($ads->getMaxId()+1):$id;
		$attachment->if_thumb=false;
		$attachment->if_thumb_large = false;
		$attachment->if_watermark = false;
		$attachment->insert_new = false;
		$attachment->rename_file = $vals['adzone_id']."-".$aname;
		$attachment->upload_process();
		$vals['source_url'] = URL.$attachment_dir."/".$attachment->file_full_url;
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
	
	if(!empty($_POST['space_name'])) {
		$com = $company->getInfoBySpaceName($_POST['space_name']);
		$vals['company_id'] = $com["id"];
	}
	
	
	if (!empty($id)) {
		$vals['modified'] = $time_stamp;
		$result = $ads->save($vals, "update", $id);
		$url = "ad.php?do=edit&id=".$id;
	}else{
		if (empty($vals['start_date'])) {
			$vals['start_date'] = $time_stamp;
		}
		$vals['created'] = $vals['modified'] = $time_stamp;
		$result = $ads->save($vals);
	}
	if (!$result) {
		flash();
	}
	$adzone->updateBreathe($vals['adzone_id']);
	if (!empty($url)) {
		//flash("success", $url);
	}
}
if (isset($_POST['del']) && !empty($_POST['id'])) {
	$result = $ads->del($_POST['id']);
}
if(isset($_POST['up'])&&!empty($_POST['id'])){
	$ids = $_POST['id'];
	foreach($ids as $id){
		$pdb->Execute("UPDATE {$tb_prefix}adses set state=1 where id=".$id);
    }
}
if(isset($_POST['down'])&&!empty($_POST['id'])){
	$ids = $_POST['id'];
	foreach($ids as $id){
		$pdb->Execute("UPDATE {$tb_prefix}adses set state=0 where id=".$id);
    }
}
if (isset($_POST['saveorder'])) {
	foreach ($_POST['order'] as $key => $val) {
		//echo $key." ".$val;
		$ads->saveField("`display_order`",$val,intval($key));
	}
}
if (isset($_GET['do'])){
	$do = trim($_GET['do']);
	if (!empty($_GET['id'])) {
		$id = intval($_GET['id']);
	}
	if($do=="del" && !empty($id)) {
		$result = $ads->del($_GET['id'])	;
		if (!empty($_GET['adzone_id'])) {
			$adzone->updateBreathe($_GET['adzone_id']);
		}
	}
	if ($do == "edit") {
		if (!empty($id)) {
			$result = $ads->read("*", $id);
			if (!empty($result['start_date'])) {
				$result['start_date'] = df($result['start_date']);
			}
			if (!empty($result['end_date'])) {
				$result['end_date'] = df($result['end_date']);
			}
			
			if($result["company_id"]) {
				$result["company"] = $company->getInfoById($result["company_id"]);
				//var_dump($result["company"]);
			}
			
			setvar("item",$result);
			setvar("CacheItems", $industry->getTypeOptions($result["industry_id"]));
		}
		$tpl_file = "ad.edit";
		
		$industries_array = explode(",", $result["industries"]);
		$industries_checkbox = $industry->findAll("id, name", null, array("level = 1"));
		foreach($industries_checkbox as $key => $item)
		{
			if(in_array($item["id"], $industries_array))
			{
				$industries_checkbox[$key]["checked"] = 1;
			}
		}
		//var_dump($industries_array);
		setvar("industries_checkbox", $industries_checkbox);
		
		//get ad sizes
		setvar("adsizes",$adsize->findAll("*"));
		
		template($tpl_file);
		exit;
	}
	if ($do == "search") {
		if (!empty($_GET['adzone_id'])) {
			$company_zone = $adzone->read("*", intval($_GET['adzone_id']));
			$company_zone = $company_zone["company_zone"];
			setvar("company_zone", $company_zone);
			$conditions[] = "Ads.adzone_id=".$_GET['adzone_id'];
		}
		if ($_GET['adzone_id'] == "7" && isset($_GET['industry_id']) && $_GET['industry_id'] !=0) {
			$parent = $industry->getParent($_GET['industry_id']);
			$conditions[] = "Ads.industry_id IN (".implode(",",$parent).")";;
		}
		if ($_GET['status'] != "") {
			$conditions[] = "Ads.status=".$_GET['status'];
		}
		
		if ($_GET['company_industry_id'] != "") {
			$industryid = $_GET['company_industry_id'];			
			
			//conditions
			$conditions[] = "(((c.industries LIKE '".$industryid."')"
							." OR (c.industries LIKE '%,".$industryid."')"
							." OR (c.industries LIKE '".$industryid.",%')"
							." OR (c.industries LIKE '%,".$industryid.",%')) OR ("
					."(Ads.industries LIKE '".$industryid."')"
							." OR (Ads.industries LIKE '%,".$industryid."')"
							." OR (Ads.industries LIKE '".$industryid.",%')"
							." OR (Ads.industries LIKE '%,".$industryid.",%')"
					."))";
		}
		if(!empty($_GET['membergroup_id'])){
 			$conditions[] = "(m.membergroup_id='".intval($_GET['membergroup_id'])."' OR Ads.membergroup_id='".intval($_GET['membergroup_id'])."')";
 		}
	}
	
	if($do=="paid" && !empty($id))
	{
		$ads->setPaid($id, $_GET["months"], $_GET["amount"]);
		//echo $id.$_GET["months"].$_GET["amount"];
	}
}

$joins[] = "LEFT JOIN {$tb_prefix}adzones az ON az.id=Ads.adzone_id";
$joins[] = "LEFT JOIN {$tb_prefix}industries indust ON indust.id=Ads.industry_id";
$joins[] = "LEFT JOIN {$tb_prefix}companies c ON c.id=Ads.company_id";
$joins[] = "LEFT JOIN {$tb_prefix}members m ON m.id=c.member_id";

$amount = $ads->findCount($joins,$conditions,"Ads.id");
$page->setPagenav($amount);

$result = $ads->findAll("Ads.*,az.name AS adzone,indust.name AS industry_name",$joins, $conditions, " Ads.display_order,Ads.created DESC", $page->firstcount, $page->displaypg);
for($i=0; $i<count($result); $i++){
	if (!empty($result[$i]['source_url'])) {
		if (strstr($result[$i]['source_url'], "http")) {
			$result[$i]['src'] = $result[$i]['source_url'];
		}else{
			$result[$i]['src'] = URL.$result[$i]['source_url'];
		}
		$result[$i]['src'] = pb_get_attachmenturl($result[$i]['source_url'], "../", "");
	}
	$comm = $company->getInfoByUserId($result[$i]['member_id']);
	$result[$i]["cache_spacename"] = $comm["cache_spacename"];
	
	$result[$i]["industry_names"] = $industry->getTreeIndustry($result[$i]["industry_id"]);
	//var_dump($result[$i]["com"] );
	$result[$i]["lastcheck"] = $ads->getLastCheckout($result[$i]['id']);
	//var_dump($result[$i]["lastcheck"]);
	if($result[$i]["company_id"]) {
		$result[$i]["company"] = $company->getInfoById($result[$i]["company_id"]);
	}
}
setvar("CompanyTopLevel", $industry->findAll("id,name", null, array("level=1")));
setvar("CacheItems", $industry->getTypeOptions($_GET["industry_id"]));
setvar("Items",$result);
setvar("ByPages",$page->pagenav);
template($tpl_file);
?>