<?php
/**
 *      [PHPB2B] Copyright (C) 2007-2099, Ualink Inc. All Rights Reserved.
 *      The contents of this file are subject to the License; you may not use this file except in compliance with the License. 
 *
 *      @version $Revision: 2154 $
 */
require("../libraries/common.inc.php");


$check = true;

require("room.share.php");
require(LIB_PATH .'time.class.php');
require(LIB_PATH. 'validation.class.php');
$validate = new Validation();
check_permission("company");
uses("industry","area", "attachment", "companyfield", "typeoption", "member","tag","membertype","membermembertype");
$tag = new Tags();
$attachment = new Attachment('pic');
$attachment1 = new Attachment('banner');
$area = new Areas();
$member = new Members();
$membertype = new Membertypes();
$industry = new Industries();
$companyfield = new Companyfields();
$typeoption = new Typeoption();
$membermembertype = new Membermembertypes();

if($meminfo == 3)
	$tpl_file = "shop";
else if($meminfo == 2)
	$tpl_file = "company";
else if($meminfo == 5)
	$tpl_file = "employer";
else $tpl_file = "person";

if (isset($_POST['do']) && !empty($_POST['data']['company']) && $_POST['do'] == "save") {
	pb_submit_check('data');
	$vals = $_POST['data']['company'];
	$company->doValidation($vals);
	if (!empty($company->validationErrors)) {
		setvar("item", $vals);
		setvar("Errors", $validate->show($company));
		template($tpl_file, true);
	}
	if (isset($companyinfo)) {
		if (empty($companyinfo['name'])) {
			$i18n = new L10n();
			//$space_name = $i18n->translateSpaceName($_POST['data']['company']['shop_name']);
			$space_name = stringToURI($_POST['data']['company']['shop_name']);			
			
			//$vals['cache_spacename'] = $space_name;
			$vals['first_letter'] = substr($space_name, 0, 1);
			$vals['cache_spacename'] = $member->updateSpaceName(array("id"=>$the_memberid), $space_name);
			if(isset($companyinfo['status']) && $companyinfo['status'] == 0){
				$vals['name'] = strip_tags($_POST['data']['company']['name']);
				$vals['english_name'] = strip_tags($vals['english_name']);
			}
		}
	}
	else
	{
		
	}
	
	$vals['employee_amount'] = $vals['employee_amount'];
	if(!empty($vals['found_date'])) {
		$vals['found_date'] = Times::dateConvert($vals['found_date']);
	}
	if(!empty($_POST['manage_type']))
	{
		$managetype = implode(",",$vals['manage_type']);
		$vals['manage_type'] = $managetype;
	}
	$vals['property'] = $vals['property'];
	$vals['main_prod'] = $vals['main_prod'];
	$vals['address'] = strip_tags($vals['address']);
	$vals['description'] = $vals['description'];
	$vals['boss_name'] = $vals['boss_name'];
	$vals['reg_address'] = $vals['reg_address'];
	$vals['reg_fund'] = $vals['reg_fund'];
	$vals['bank_from'] = $vals['bank_from'];
	$vals['bank_account'] = $vals['bank_account'];
	$vals['main_brand'] = $vals['main_brand'];
	$vals['year_annual'] = $vals['year_annual'];
	$vals['main_customer'] = $vals['main_customer'];
	$vals['main_biz_place'] = $vals['main_biz_place'];
	$vals['link_man'] = $vals['link_man'];
	$vals['position'] = $vals['position'];
	$vals['industries'] = implode(",", $_POST["industries_checkbox"]);
	/**tel and fax**/
	if($_POST['data']['telcode'] == '')
	{
		$_POST['data']['telcode'] = "84";
	}
	if($_POST['data']['faxcode'] == '')
	{
		$_POST['data']['faxcode'] = "84";
	}
	
	$_POST['data']['tel'] = str_replace(' ', '', $_POST['data']['tel']);
	$_POST['data']['tel'] = str_replace('.', '', $_POST['data']['tel']);
	
	$_POST['data']['fax'] = str_replace(' ', '', $_POST['data']['fax']);
	$_POST['data']['fax'] = str_replace('.', '', $_POST['data']['fax']);
	
	$vals['tel'] = $company->getPhone($_POST['data']['telcode'], $_POST['data']['telzone'], $_POST['data']['tel']);
	$vals['fax'] = $company->getPhone($_POST['data']['faxcode'], $_POST['data']['faxzone'], $_POST['data']['fax']);	
	$vals['mobile'] = $vals['mobile'];
	$vals['site_url'] = $vals['site_url'];
	$vals['email'] = $vals['email'];
	
	
	//save tag
	$vals['tag_ids'] = $tag->setTagId($_POST['data']['tag']);
	$vals['keywords_string'] = $tag->getTagsByIds($vals['tag_ids'], true);
	$vals['keywords_string'] =  implode(",",$vals['keywords_string']);
	//echo $vals['keywords_string'];
	
	if (isset($_POST['image_tmp']) && !empty($_POST['image_tmp']))
	{
		$vals['picture'] = $_POST['image_tmp'];
	}

	if (!preg_match("/^(http|https|ftp):/", strtolower($vals['site_url']))) {
		$vals['site_url'] = 'http://'.$vals['site_url'];
	}
	if(!empty($vals['main_market'])) {
		$mainmarket = implode(",",$vals['main_market']);
		$vals['main_market'] = $mainmarket;
	}
	if (!empty($_FILES['pic']['name'])) {
		$attachment->if_watermark = false;
		$attachment->if_thumb_middle = false;
		$attachment->if_logo = true;
		$attachment->rename_file = "company-".$time_stamp.rand(0,9000);
		$attachment->upload_process();
		
		if($attachment->width > 150 && $attachment->height > 150)
		{
			$vals['picture'] = $attachment->file_full_url;
		}
		else
		{
			$upload_error = true;
		}
	}
	
	if (!empty($_FILES['banner']['name'])) {
		$attachment1->if_watermark = false;
		$attachment1->if_thumb_middle = false;
		$attachment1->rename_file = "company-banner-".$the_memberid;
		$attachment1->upload_process();
		$vals['banner'] = $attachment1->file_full_url;
	}
	
	//if ($g['company_check']) {
	//	$vals['status'] = 0;
	//	$msg = "wait_for_check";
	//}else{
		$vals['status'] = 1;
	//}
    $vals['industry_id'] = PbController::getMultiId($_POST['industry']['id']);
    $vals['area_id'] = PbController::getMultiId($_POST['area']['id']);
	if(!empty($company_id)){
		$vals['modified'] = $time_stamp;
		$vals['cache_membergroupid'] = $memberinfo['membergroup_id'];
		$company->save($vals, "update", $company_id, null, "member_id=".$the_memberid);
		
		$company->updateCachename($company_id, $vals['shop_name']);
	} else {
		$vals['member_id'] = $the_memberid;
		$vals['cache_membergroupid'] = $memberinfo['membergroup_id'];
		$vals['created'] = $vals['modified'] = $time_stamp;
		$vals['new_clicked_date'] = date('d-m-Y H:i:s');
		
		$space_name = stringToURI($vals['shop_name']);
			
		
		$member->updateSpaceName($memberinfo['id'], $space_name);
		$company->save($vals);
		$key = $company->table_name."_id";
		$company_id = $company->$key;
		
		//
		
		//add default follow shop
		uses("follow");
		$follow = new Follows();
		$follow->addFollow($the_memberid, 1);
	}
	$cfield_exits = $pdb->GetOne("SELECT company_id FROM {$tb_prefix}companyfields WHERE company_id={$company_id}");
	$companyfield->primaryKey = "company_id";
	if ($cfield_exits) {
		$companyfield->save($_POST['data']['companyfield'], "update", $company_id);
	}else{
		$_POST['data']['companyfield']['company_id'] = $company_id;
		$companyfield->save($_POST['data']['companyfield']);
	}
	$member->clearCache($the_memberid);
	$member->updateMemberCaches($the_memberid);
	
	//if(!$hasProfile)
		
		if(!$upload_error)
		{
			if(isset($_POST["isnew"]))
			{
				pheader("location:index.php#newshop");
			}
			else
			{
				if($meminfo == 5)
				{
					pheader("location:job.php");
				}
				else
				{
					pheader("location:company.php?message=success");
				}
			}
			
		}
		else
			flash($msg?$msg:"image_size_error");
	//else
	//	flash($msg?$msg:"success");
	
	
	//var_dump($_POST["industries"]);
	
	
}

if (isset($_GET['do']) && !empty($_GET['id']) && $_GET['do'] == "change_grouptype") {
	$mem = $member->read("*", intval($memberinfo["id"]));
	$member->saveField("membergroup_id", intval($_GET['id']), intval($memberinfo["id"]));
	pheader("location:company.php");
}

if (isset($_GET['do']) && !empty($_GET['id']) && $_GET['do'] == "upgrade_company") {
	$mem = $member->read("*", intval($memberinfo["id"]));
	$memtype = $membertype->read("*", intval($_GET['id']));
	
	//save old membertype
	$mmt["member_id"] = $mem["id"];
	$mmt["membertype_id"] = $mem["membertype_id"];
	$mmt["created"] = date("Y-m-d H:i:s");
	$membermembertype->save($mmt);
	
	$member->saveField("membertype_id", intval($_GET['id']), intval($memberinfo["id"]));
	$member->saveField("membergroup_id", intval($memtype['default_membergroup_id']), intval($memberinfo["id"]));
	pheader("location:company.php");
}


setvar("MainMarkets", $typeoption->get_cache_type("main_market"));
if(!empty($companyinfo['name'])){

	
	
	list(,$companyinfo['telcode'], $companyinfo['telzone'], $companyinfo['tel']) = $company->splitPhone($companyinfo['tel']);
	list(,$companyinfo['faxcode'], $companyinfo['faxzone'], $companyinfo['fax']) = $company->splitPhone($companyinfo['fax']);
	$companyinfo["option_manage_type"] = $typeoption->get_cache_key_unique("manage_type", $companyinfo['manage_type']);
	$selected['markets'] = explode(",",$companyinfo['main_market']);
	setvar("SelectedMarket",$selected['markets']);
	//$companyinfo["option_reg_fund"] = $typeoption->get_cache_key_unique("reg_fund", $companyinfo['reg_fund']);
	//$companyinfo["option_year_annual"] = $typeoption->get_cache_key_unique("year_annual", $companyinfo['year_annual']);
	//$companyinfo["option_position"] = $typeoption->get_cache_key_unique("position", $companyinfo['position']);
	//$companyinfo["option_employee_amount"] = $typeoption->get_cache_key_unique("employee_amount", $companyinfo['employee_amount']);
	//$companyinfo["option_economic_type"] = $typeoption->get_cache_key_unique("economic_type", $companyinfo['property']);
	if(!empty($companyinfo["picture"])) {
		$companyinfo["logo"] = pb_get_attachmenturl($companyinfo["picture"], "../");
	}
	if(!empty($companyinfo["banner"])) {
		$companyinfo["banner"] = pb_get_attachmenturl($companyinfo["banner"], "../");
	}
	$company_fields = $pdb->GetRow("SELECT * FROM {$tb_prefix}companyfields WHERE company_id={$company_id}");
	if (!empty($company_fields)) {
		$companyinfo = am($companyinfo, $company_fields);
	}
	if($companyinfo['found_date']) $companyinfo['found_year'] = date("Y", (int)$companyinfo['found_date']);
	$r1 = $industry->disSubOptions($companyinfo['industry_id'], "industry_");
	$r2 = $area->disSubOptions($companyinfo['area_id'], "area_");
	$companyinfo = am($companyinfo, $r1, $r2);
	
	$companyinfo['tel'] = substr($companyinfo['tel'], 0, 4)." ".substr($companyinfo['tel'], 4);
	$companyinfo['fax'] = substr($companyinfo['fax'], 0, 4)." ".substr($companyinfo['fax'], 4);
	
	if(!empty($companyinfo['tag_ids'])){
		$tag->getTagsByIds($companyinfo['tag_ids'], true);
		$companyinfo['tag'] = $tag->tag;
	}
	
	$fb_data = $member->read("fb_data", $companyinfo["id"]);
	$fb_data = $fb_data["fb_data"];
	$fb_data = json_decode($fb_data, true);
	
	setvar("fb_data", $fb_data);
	
	setvar("item", $companyinfo);
	
	
	$industries_array = explode(",", $companyinfo["industries"]);
	unset($selected,$companyinfo);
}
else
{
	$tpm["link_man"] = $memberinfo["last_name"]." ".$memberinfo["first_name"];
	$tpm["contact_mobile"] = $memberinfo["mobile"];
	$tpm["contact_email"] = $memberinfo["email"];
	$tpm["email"] = $memberinfo["email"];
	$tpm["address"] = $memberinfo["address"];
	$r2 = $area->disSubOptions($memberinfo['area_id'], "area_");
	$tpm["telcode"] = "84";
	$tpm["faxcode"] = "84";
	
	$tpm["link_man_gender"] = $memberinfo["gender"];
	
	
	$tpm = am($tpm, $r1, $r2);
	setvar("item", $tpm);
}

//List industries level 1

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
setvar("Genders", $typeoption->get_cache_type('gender', null, array(-1)));
template($tpl_file);
?>