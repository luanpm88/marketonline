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
uses("companyoffice","area");

$companyoffice = new Companyoffices();
$page = new Pages();
$area = new Areas();
$page->displaypg = 100;

$tpl_file = "companyoffice";
$page = new Pages();


if (isset($_GET['do'])) {
	$do = trim($_GET['do']);
	if (!empty($_GET['id'])) {
		$id = intval($_GET['id']);
	}
	if ($do=="edit") {
		if (!empty($id)) {
			$item = $companyoffice->getOffice($id);
			
			$r2 = $area->disSubOptions($item['area_id'], "area_");
			$item = am($item, $r1, $r2);
			
			list(,$item['telcode'], $item['telzone'], $item['tel']) = $company->splitPhone($item['phone']);
			list(,$item['faxcode'], $item['faxzone'], $item['fax']) = $company->splitPhone($item['fax']);
			
			setvar("item",$item);
		}
		$tpl_file = "companyoffice_edit";
		template($tpl_file);
		exit;
	}
	if (($do == "del" || $_GET['act']=="del") && !empty($id)) {
		$companyoffice->del($id);
	}
}

if (isset($_POST['do']) && !empty($_POST['data']['company']) && $_POST['do'] == "save") {
	//var_dump($_POST);
	pb_submit_check('data');
	$vals = $_POST['data']['company'];
	
	$_POST['data']['tel'] = str_replace(' ', '', $_POST['data']['tel']);
	$_POST['data']['tel'] = str_replace('.', '', $_POST['data']['tel']);
	
	$_POST['data']['fax'] = str_replace(' ', '', $_POST['data']['fax']);
	$_POST['data']['fax'] = str_replace('.', '', $_POST['data']['fax']);
	
	$vals['phone'] = $company->getPhone($_POST['data']['telcode'], $_POST['data']['telzone'], $_POST['data']['tel']);
	$vals['fax'] = $company->getPhone($_POST['data']['faxcode'], $_POST['data']['faxzone'], $_POST['data']['fax']);
	
	$vals['area_id'] = PbController::getMultiId($_POST['area']['id']);
	
	$vals["company_id"] = $company_id;
	
	//var_dump($vals);
	
	if (!empty($_POST["id"])) {
		$companyoffice->save($vals, "update", $_POST["id"]);
	}else{
		$companyoffice->save($vals);
	}
}

$result = $companyoffice->findByCompany($company_id);

$page->setPagenav($result["count"]);

setvar("Items",$result["items"]);
uaAssign(array("pagenav"=>$page->getPagenav()));
template($tpl_file);
?>