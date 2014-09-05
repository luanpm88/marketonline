<?php
/**
 *      [PHPB2B] Copyright (C) 2007-2099, Ualink Inc. All Rights Reserved.
 *      The contents of this file are subject to the License; you may not use this file except in compliance with the License. 
 *
 *      @version $Revision: 2258 $
 */
require("../libraries/common.inc.php");
require(PHPB2B_ROOT.'./libraries/page.class.php');
require("session_cp.inc.php");
require(LIB_PATH .'time.class.php');
require(CACHE_COMMON_PATH."cache_type.php");
uses("message","product","attachment", "tag", "typeoption","area","industry","meta","productadtype");
$productadtype = new Productadtypes();
$typeoption = new Typeoption();
$area = new Areas();
$meta = new Metas();
$industry = new Industries();
$attachment = new Attachment('pic');
$tag = new Tags();
$product = new Products();
$page = new Pages();
$message = new Messages();
$conditions = array();
$tpl_file = "product";
setvar("CheckStatus", $typeoption->get_cache_type("common_status"));
setvar("BooleanVars", $typeoption->get_cache_type("common_option"));
setvar("ProductSorts",$_PB_CACHE['productsort']);
if (isset($_POST['save']) && !empty($_POST['data']['product']['name'])) {
	$result = false;
	$vals = array();
	$vals = $_POST['data']['product'];
	if (isset($_POST['data']['company_name'])) {
		if (!pb_strcomp($_POST['data']['company_name'], $_POST['company_name'])) {
			$vals['company_id'] = $pdb->GetOne("SELECT id FROM {$tb_prefix}companies WHERE name='".$_POST['data']['company_name']."'");
		}else{
			$vals['company_id'] = $pdb->GetOne("SELECT id FROM {$tb_prefix}companies WHERE name='".$_POST['company_name']."'");
		}
	}
	if (isset($_POST['data']['username'])) {
		if (!pb_strcomp($_POST['data']['username'], $_POST['username'])) {
			$vals['member_id'] = $pdb->GetOne("SELECT id FROM {$tb_prefix}members WHERE username='".$_POST['data']['username']."'");
		}else{
			$vals['member_id'] = $pdb->GetOne("SELECT id FROM {$tb_prefix}members WHERE username='".$_POST['username']."'");
		}
	}
	$attachment->rename_file = "product-".$time_stamp;
	if(isset($_POST['id'])){
		$id = intval($_POST['id']);
	}
	if(!empty($id)){
		$attachment->rename_file = "product-".$id;
	}
	if (!empty($vals['content'])) {
		$vals['content'] = stripcslashes($vals['content']);
	}
	if (!empty($_FILES['pic']['name'])) {
		$attachment->upload_process();
		$vals['picture'] = $attachment->file_full_url;
	}
	$vals['tag_ids'] = $tag->setTagId($_POST['data']['tag']);
	$vals['industry_id'] = PbController::getMultiId($_POST['industry']['id']);
	$vals['area_id'] = PbController::getMultiId($_POST['area']['id']);
	if(!empty($id)){
		$vals['modified'] = $time_stamp;
		$result = $product->save($vals, "update", $id);
	}else{
		$vals['created'] = $vals['modified'] = $time_stamp;
		$result = $product->save($vals);
		$last_insert_key = "{$tb_prefix}product_id";
    	$id = $product->$last_insert_key;
	}
	
	//var_dump($_POST['data']['productadtype']);
	$product->saveAdTypes($id, $_POST['data']['productadtype']);
	
	//seo info
	$meta->save('product', $id, $_POST['data']['meta']);
	if (!$result) {
		flash();
	}else{
		flash("success", "product.php?do=search&page=".$_REQUEST['page']);
	}
}
if (isset($_POST['recommend'])) {
	foreach($_POST['id'] as $val){
		$commend_now = $product->field("ifcommend", "id=".$val);
		if($commend_now=="0"){
			$result = $product->saveField("ifcommend", "1", intval($val));
		}else{
			$result = $product->saveField("ifcommend", "0", intval($val));
		}
	}
	if ($result) {
		flash("success");
	}else{
		flash();
	}
}
if (isset($_POST['status'])) {
	if(!empty($_POST['id'])){
		$tmp_to = intval($_POST['status']);
		$result = $product->checkProducts($_POST['id'], $tmp_to);
	}
}
if(isset($_POST['pass'])){
	if(!empty($_POST['id'])){
		$result = $product->checkProducts($_POST['id'], '1');
	}
}
if(isset($_POST['forbid'])){
	if(!empty($_POST['id'])){
		$result = $product->checkProducts($_POST['id'], '0');
	}
}

if (isset($_POST['checkin_product']) && !empty($_POST['id'])) {
	$result = $product->checkProducts($_POST['id'], 1);
}

if (isset($_POST['checkout_product']) && !empty($_POST['id'])) {
	$result = $product->checkProducts($_POST['id'], 2);
}
if (isset($_POST['del'])) {
	$deleted = false;
	foreach ($_POST['id'] as $val) {
		$picture = $product->field("picture", "id=".$val);
		@unlink($media_paths['attachment_dir'].$picture);
		@unlink($media_paths['attachment_dir'].$picture.".small.jpg");
	}
	if (is_array($_POST['id'])) {
		$deleted = $product->del($_POST['id']);
		if(!$deleted){
			flash();
		}
	}
}
if (isset($_GET['do'])) {
	$do = trim($_GET['do']);
	if (!empty($_GET['id'])) {
		$id = intval($_GET['id']);
	}
	if ($do == "import") {
		$tpl_file = "product.import";
		template($tpl_file);
		exit;
	}
	if($do == "edit"){
		if(!empty($id)){
			$res = $product->getInfo($id);
			if (!empty($res['picture'])) {
				$res['image'] = pb_get_attachmenturl($res['picture'], '../', 'small');
			}
			$tag->getTagsByIds($res['tag_ids'], true);
			$res['tag'] = $tag->tag;
			$r1 = $industry->disSubOptions($res['industry_id'], "industry_");
			$r2 = $area->disSubOptions($res['area_id'], "area_");
			$seo = $meta->getSEOById($id, 'product');
			$res = am($res, $r1, $r2, $seo);
			
			//product ad type
			$productadtypes = $productadtype->findAll("*");
			$current_types = $product->getAdTypes($id);
			//var_dump($current_types);
			foreach($productadtypes as &$item) {
				if(in_array($item["id"],$current_types)) {
					$item["check"] = 'checked="checked"';
				}
			}
			//var_dump($productadtypes);
			setvar("productadtypes",$productadtypes);
			setvar("item",$res);
			unset($res);
		}
		$tpl_file = "product.edit";
		template($tpl_file);
		exit;
	}
	if ($do == 'search') {
		if(!empty($_GET['username'])) {
			$member_id = $pdb->GetOne("SELECT id from {$tb_prefix}members where username='".$_GET['username']."'");
			if($member_id) $conditions[]= "Product.member_id='".$member_id."'";
		}
		if(!empty($_GET['companyname'])) {
			$conditions[]= "c.name like '%".$_GET['companyname']."%'";
			$joins[] = "LEFT JOIN {$tb_prefix}companies c ON c.id=Product.company_id";
		}
		if($_GET['status']>=0) $conditions[]= "Product.status='".$_GET['status']."'";
		if(!empty($_GET['q'])) $conditions[]= "Product.name like '%".$_GET['q']."%'";
		if($_GET['industryid']) $conditions[]= "Product.industry_id =".$_GET['industryid'];
		if($_GET['provinceid']) $conditions[]= "c.province_code_id =".$_GET['provinceid'];
		if ($_GET['FromDate'] && $_GET['FromDate']!="None" && $_GET['ToDate'] && $_GET['ToDate']!="None") {
			$condition= "Product.created BETWEEN ";
			$condition.= Times::dateConvert($_GET['FromDate']);
			$condition.= " AND ";
			$condition.= Times::dateConvert($_GET['ToDate']);
			$conditions[] = $condition;
		}
	}
	if ($do == 'refresh') {
		$product->saveField("created", $time_stamp, $id);
		$product->saveField("`show`", 1, $id);
	}
	
	if ($do=="valid" && $id) {
		$product->saveField("valid_status", 1, intval($id));
	}
	if ($do=="unvalid" && $id) {
		$iiffoo = $product->read("*", $id);
		
		$product->saveField("valid_status", 0, intval($id));
		$product->saveField("valid_status_message", $_GET["message"], intval($id));
		
		if($iiffoo["service"]) {
			$kindname = "Dịch vụ";
			$typeurl = "?type=service";
		} else {
			$kindname = "Sản phẩm";
			$typeurl = "";
		}
		
		$content = "<a href='".URL."virtual-office/product.php".$typeurl."'>".$kindname." '".$iiffoo["name"]."' không hợp lệ. Vui lòng kiểm tra lại (".$iiffoo["valid_status_message"].")</a>";
		$sms['content'] = mysql_real_escape_string($content);
		$sms['title'] = mysql_real_escape_string($kindname." không hợp lệ");
		$sms['membertype_ids'] = '[1][2][3]';
		$message->SendToUser(1, $iiffoo["member_id"], $sms);
	}
}
$amount = $product->findCount($joins, $conditions,"Product.id");
unset($joins);
$joins[] = "LEFT JOIN {$tb_prefix}companies c ON c.id=Product.company_id";
$joins[] = "LEFT JOIN {$tb_prefix}members m ON m.id=Product.member_id";
$page->setPagenav($amount);
$fields = "Product.service, m.username,Product.valid_status,Product.id,Product.company_id AS CompanyID,c.cache_spacename,c.shop_name,c.id AS CID,c.name AS companyname,Product.name AS ProductName,Product.status AS ProductStatus,Product.created,Product.ifcommend as Ifcommend, Product.state as ProductState,Product.picture as ProductPicture ";
$result = $product->findAll($fields, $joins, $conditions,"CASE WHEN valid_status = 3 THEN 1 ELSE 2 END ASC, Product.id DESC",$page->firstcount,$page->displaypg);
if (!empty($result)) {
	for($i=0; $i<count($result); $i++){
		$result[$i]['pubdate'] = df($result[$i]['created']);
		if(!empty($result[$i]['picture'])){
			$result[$i]['image'] = pb_get_attachmenturl($result[$i]['ProductPicture'], "../", "small");
		}
		
		if($result[$i]['valid_status'] == 1) {
			$string = '<img src="../templates/office/images/published.png">';
			$string .= '<a onclick="$(this).attr(\'href\', $(this).attr(\'href\')+\'&message=\'+$(\'.iipp'.$result[$i]["id"].'\').val());" href="product.php?do=unvalid&id='.$result[$i]["id"].'">Cấm</a><br />';
			$string .= '<input class="iipp'.$result[$i]["id"].'" size="30" name="message" placeholder="Nội dung cấm" />';
			$result[$i]['validation'] = $string;
		}
		if($result[$i]['valid_status'] == 0) {
			$string = '<img src="../templates/office/images/unpublished.png">';
			$string .= '<a href="product.php?do=valid&id='.$result[$i]["id"].'">Duyệt</a>';
			//$string .= '<a href="offer.php?do=unvalid&id='.$result[$i]["id"].'">Cấm</a>';
			$result[$i]['validation'] = $string;
		}
		if($result[$i]['valid_status'] == 3) {
			$string = '<img src="../templates/office/images/alert-icon.png">';
			$string .= '<a href="product.php?do=valid&id='.$result[$i]["id"].'">Duyệt</a> / ';
			$string .= '<a onclick="$(this).attr(\'href\', $(this).attr(\'href\')+\'&message=\'+$(\'.iipp'.$result[$i]["id"].'\').val());" href="product.php?do=unvalid&id='.$result[$i]["id"].'">Cấm</a><br />';
			$string .= '<input class="iipp'.$result[$i]["id"].'" size="30" name="message" placeholder="Nội dung cấm" />';
			//$string .= '<a href="offer.php?do=unvalid&id='.$result[$i]["id"].'">Cấm</a>';
			$result[$i]['validation'] = $string;
		}
		//$result[$i]['validation'] = "ss";
	}
}
setvar("Items", $result);
setvar("ByPages", $page->pagenav);
template($tpl_file);
?>