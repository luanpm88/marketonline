<?php
/**
 *      [PHPB2B] Copyright (C) 2007-2099, Ualink Inc. All Rights Reserved.
 *      The contents of this file are subject to the License; you may not use this file except in compliance with the License. 
 *
 *      @version $Revision: 2223 $
 */
require("../libraries/common.inc.php");
require("room.share.php");
uses("product","producttype","form","attachment","tag","brand","productcategory","area","industry");
require(PHPB2B_ROOT.'libraries/page.class.php');
require(CACHE_COMMON_PATH."cache_type.php");

$_PB_CACHE['membergroup'] = cache_read("membergroup");
check_permission("product");
$area = new Areas();
$industry = new Industries();
$productcategory = new Productcategories();
$page = new Pages();
$page->displaypg = 10;
$brand = new Brands();
$tag = new Tags();
$form = new Forms();
$product = new Products();
$producttype = new Producttypes();
$conditions[] = "valid_moderator = ".$the_memberid;
setvar("Countries", $countries = cache_read("country"));
setvar("ProductSorts", $_PB_CACHE['productsort']);
setvar("ProductTypes",$producttype->findAll('id,name', null, $conditions, "id DESC"));
setvar("Productcategories", $productcategory->getTypeOptions());
setvar("getvar", $_GET);

//echo $_SERVER['HTTP_REFERER'];
$tpl_file = "moderator";

if (isset($_GET['typeid']) && !empty($_GET['typeid'])) {
	$conditions[] = "producttype_id = ".$_GET['typeid'];
}
if (isset($_GET['level4']) && $_GET['level4'] != '0') {
	$conditions[] = "industry_id IN (".getCatsByCatID($_GET['level4']).")";	
}
else if(isset($_GET['level3']) && $_GET['level3'] != '0') {
	$conditions[] = "industry_id IN (".getCatsByCatID($_GET['level3']).")";	
}
else if(isset($_GET['level2']) && $_GET['level2'] != '0') {
	$conditions[] = "industry_id IN (".getCatsByCatID($_GET['level2']).")";	
}
else if(isset($_GET['level1']) && $_GET['level1'] != '0') {
	$conditions[] = "industry_id IN (".getCatsByCatID($_GET['level1']).")";	
}
if (isset($_GET['keyword']) && !empty($_GET['keyword'])) {
	$conditions[] = "LOWER(name) LIKE '%".strtolower($_GET['keyword'])."%' OR LOWER(product_code) LIKE '%".strtolower($_GET['keyword'])."%'";	
}
if (isset($_GET['type']) && $_GET['type'] == 'service') {
	$conditions[] = "service = 1";	
}
else
{
	$conditions[] = "service = 0";
}

$amount = $product->findCount(null, $conditions, "Product.id");

$page->setPagenav($amount);

$orderby = "CASE WHEN valid_status = 3 THEN 1 WHEN valid_status = 0 THEN 2 ELSE 3 END ASC, Product.created DESC";
if (isset($_GET['order_by']) && !empty($_GET['order_by'])) {
	$orderby = $_GET['order_by'];
	$o_arr = explode(' ', $_GET['order_by']);
	setvar('sortType',$o_arr[0]);
	setvar('sortOrder',$o_arr[1]);
}

$joins = array();
$joins[] = "LEFT JOIN {$product->table_prefix}members AS m ON Product.valid_moderator=m.id";
$result = $product->findAll("m.username as mod_username, Product.*", $joins, $conditions, $orderby, $page->firstcount, $page->displaypg);
//var_dump($result);

if ($result) {
	$i_count = count($result);
	for ($i=0; $i<$i_count; $i++) {
		$result[$i]["price"] = number_format($result[$i]["price"], 0, ',', '.');
		
		//Defaut Image
		if($result[$i]['default_pic'])
		{
			$col_pic = 'picture'.$result[$i]['default_pic'];
		}
		else
		{
			$col_pic = 'picture';
		}
		
		$result[$i]['image'] = pb_get_attachmenturl($result[$i][$col_pic], '../', 'small');
		$result[$i]['created'] = df($result[$i]['created'], "d-m-Y H:i");
		$result[$i]['row'] = $i%2;
		
		if($result[$i]['valid_status'] == 1) {
			$string = '<img title="Hợp lệ" src="../templates/office/images/published.png">';
			//$string .= '<a href="offer.php?do=valid&id='.$result[$i]["id"].'">Duyệt</a>/';
			//$string .= '<a href="offer.php?do=unvalid&id='.$result[$i]["id"].'">Cấm</a>';
			$result[$i]['validation'] = $string;
		}
		if($result[$i]['valid_status'] == 0) {
			$string = '<img title="Không hợp lệ" src="../templates/office/images/unpublished.png">';
			$string .= '<br /><span class="unvalid_message">'.$result[$i]['valid_message'].'</span>';
			//$string .= '<br /><a href="product.php?type='.$_GET["type"].'&do=edit&id='.$result[$i]['id'].'" class="unvalid_edit">Chỉnh sửa</a>';
			//$string .= '<a href="offer.php?do=unvalid&id='.$result[$i]["id"].'">Cấm</a>';
			$result[$i]['validation'] = $string;
		}
		if($result[$i]['valid_status'] == 3) {
			$string = '<img title="Đang chờ duyệt" src="../templates/office/images/alert-icon.png">';
			$string .= '<br /><span class="pending_message">Đang chờ duyệt</span>';
			//$string .= '<a href="offer.php?do=valid&id='.$result[$i]["id"].'">Duyệt</a>';
			//$string .= '<a href="offer.php?do=unvalid&id='.$result[$i]["id"].'">Cấm</a>';
			$result[$i]['validation'] = $string;
		}
	}
}

setvar("Items",$result);
setvar("right",$_GET["type"]);
setvar("nlink",$page->nextpage_link);
setvar("plink", $page->previouspage_link);
setvar("CheckStatus", explode(",",L('product_status', 'tpl')));
uaAssign(array("pagenav"=>$page->getPagenav()));
template($tpl_file);

?>