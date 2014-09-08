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
$attachment = new Attachment('pic');
$attachment->if_product_square = true;
$attachment1 = new Attachment('pic1');
$attachment1->if_product_square = true;
$attachment2 = new Attachment('pic2');
$attachment2->if_product_square = true;
$attachment3 = new Attachment('pic3');
$attachment3->if_product_square = true;
$attachment4 = new Attachment('pic4');
$attachment4->if_product_square = true;
$conditions[] = "member_id = ".$the_memberid;
setvar("Countries", $countries = cache_read("country"));
setvar("ProductSorts", $_PB_CACHE['productsort']);
setvar("ProductTypes",$producttype->findAll('id,name', null, $conditions, "id DESC"));
setvar("Productcategories", $productcategory->getTypeOptions());
setvar("getvar", $_GET);

$current_uri = $_SERVER['REQUEST_URI'];
$current_uri = explode('?', $current_uri);
$current_uri = preg_replace('/do=refresh&id=\d*/','', $current_uri[1]);
setvar("current_uri", $current_uri);

//echo $pb_userinfo["fb_access_token"];
var_dump($companyinfo);

$rand = rand(9,17);
$company->saveField("clicked",$companyinfo["clicked"]+$rand,intval($companyinfo["id"]));
$company->saveField("new_clicked",$companyinfo["new_clicked"]+$rand,intval($companyinfo["id"]));

//get de qui
function saveCustomIndustry(&$value,$val,$index,$industry_id = 0,$parent = 0)
{
	uses("producttype");
	$producttype = new Producttypes();
	
	//echo "///////";
	//for($i=$index+1; $i<5; $i++)
	//{
		if(isset($_POST['customIndustry']['id'][$index]) && $_POST['customIndustry']['id'][$index] != -1)
		{
			if($_POST['customIndustry']['id'][$index])
			{
				if($industry_id != 0)
				{
					//echo $industry_id;
				}
				elseif($parent != 0)
				{
					//echo $parent;
				}				
				//echo $_POST['customIndustry']['id'][$index];
				$value = $_POST['customIndustry']['id'][$index];
				
				saveCustomIndustry($value, $val, $index+1, 0, $_POST['customIndustry']['id'][$index]);
			}
			elseif(isset($_POST['customIndustry']['name'][$index]) && $_POST['customIndustry']['name'][$index] != '')
			{
				$new_id = 0;
				
				if($industry_id != 0)
				{
					//echo $industry_id;
				}
				elseif($parent != 0)
				{
					//echo $parent;
				}				
				//echo $_POST['customIndustry']['name'][$index];
				
				//save new type
				//echo "<br />##"."member_id: ".$val["member_id"]."; "."company_id: ".$val["company_id"]."; "."name: ".$_POST['customIndustry']['name'][$index]."; "."level: ".$index."; "."created: ".$val["created"]."; "."modified: ".$val["modified"]."; "."parent_industry_id: ".$industry_id."; "."custom_parent_industry_id: ".$parent."; "."##";
				$result = $producttype->save(array(
					"member_id"=>$val["member_id"],
					"company_id"=>$val["company_id"],
					"name"=>$_POST['customIndustry']['name'][$index],
					"level"=>$index,
					"created"=>$val["created"],
					"modified"=>$val["modified"],
					"parent_industry_id"=>$industry_id,
					"custom_parent_industry_id"=>$parent
				));
				
				if($result)
				{
					$new_id = $producttype->table_name."_id";
					$value = $producttype->$new_id;
				}
				
				for($j=$index+1; $j<5; $j++)
				{				
					if(isset($_POST['customIndustry']['name'][$j]) && $_POST['customIndustry']['name'][$j] != '')
					{
						//echo "///////new_id";
						//echo $_POST['customIndustry']['name'][$j];
						
						
						//echo "<br />##"."member_id: ".$val["member_id"]."; "."company_id: ".$val["company_id"]."; "."name: ".$_POST['customIndustry']['name'][$j]."; "."level: ".$j."; "."created: ".$val["created"]."; "."modified: ".$val["modified"]."; "."parent_industry_id: 0; "."custom_parent_industry_id: ".$_POST['customIndustry']['name'][$j-1]."; "."##";
						
						if($new_id)
						{
							$resultchild = $producttype->save(array(
								"member_id"=>$val["member_id"],
								"company_id"=>$val["company_id"],
								"name"=>$_POST['customIndustry']['name'][$j],
								"level"=>$j,
								"created"=>$val["created"],
								"modified"=>$val["modified"],
								"parent_industry_id"=>0,
								"custom_parent_industry_id"=>$producttype->$new_id
							));
							if($resultchild)
							{
								$new_id = $producttype->table_name."_id";
								$value = $producttype->$new_id;
							}
							else
								$new_id = 0;
						}
						
					}
					else
					{
						break;
					}
				}
				return;
			}
		}		
	//}
	
}



//echo $_POST['redirect'];
if (isset($_POST['redirect']))
{
	setvar("back_link", $_POST['redirect']);
}
else
{
	setvar("back_link", $_SERVER['HTTP_REFERER']);
}
//echo $_SERVER['HTTP_REFERER'];
$tpl_file = "product";
if(!$hasCompany) {
	//flash("pls_complete_company_info", "company.php", 0);
	setvar('no_company_info', true);
}

if (isset($_POST['save'])) {
	$company->newCheckStatus($companyinfo['status']);
	if(!empty($_POST['data']['product'])){
		$product->setParams();
		$now_product_amount = $product->findCount(null, "created>".$today_start." AND member_id=".$the_memberid);
		$check_product_update = $g['product_check'];
		//if ($check_product_update == 0) {
			$product->params['data']['product']['status'] = 1;
		//}else {
		//	$product->params['data']['product']['status'] = 0;
		//	$message_info = 'msg_wait_check';
		//}
		if(isset($_POST['id'])){
			$id = intval($_POST['id']);
		}
    	if (!empty($_FILES['pic']['name']) && empty($_POST['linkpic'])) {
    		$attach_id = (empty($id))?"product-".$the_memberid."-".($product->getMaxId()+1):"product-".$the_memberid."-".$id;
    		$attachment->rename_file = $attach_id;
		$attachment->upload_process();    		
    	    $product->params['data']['product']['picture'] = $attachment->file_full_url;
    	}
	elseif(!empty($_POST['linkpic']))
	{
		$product->params['data']['product']['picture'] = $_POST['linkpic'];
	}
	//echo "sdfsdfs";
	if (!empty($_FILES['pic1']['name']) && empty($_POST['linkpic1'])) {
    		$attach_id = (empty($id))?"product1-".$the_memberid."-".($product->getMaxId()+1):"product1-".$the_memberid."-".$id;
    		$attachment1->rename_file = $attach_id;
			$attachment1->upload_process();    		
    	    $product->params['data']['product']['picture1'] = $attachment1->file_full_url;
    	}
	elseif(!empty($_POST['linkpic1']))
	{
		$product->params['data']['product']['picture1'] = $_POST['linkpic1'];
	}
	if (!empty($_FILES['pic2']['name']) && empty($_POST['linkpic2'])) {
    		$attach_id = (empty($id))?"product2-".$the_memberid."-".($product->getMaxId()+1):"product2-".$the_memberid."-".$id;
    		$attachment2->rename_file = $attach_id;
			$attachment2->upload_process();    		
    	    $product->params['data']['product']['picture2'] = $attachment2->file_full_url;
    	}
	elseif(!empty($_POST['linkpic2']))
	{
		$product->params['data']['product']['picture2'] = $_POST['linkpic2'];
	}
	if (!empty($_FILES['pic3']['name']) && empty($_POST['linkpic3'])) {
    		$attach_id = (empty($id))?"product3-".$the_memberid."-".($product->getMaxId()+1):"product3-".$the_memberid."-".$id;
    		$attachment3->rename_file = $attach_id;
			$attachment3->upload_process();    		
    	    $product->params['data']['product']['picture3'] = $attachment3->file_full_url;
    	}
	elseif(!empty($_POST['linkpic3']))
	{
		$product->params['data']['product']['picture3'] = $_POST['linkpic3'];
	}
	if (!empty($_FILES['pic4']['name']) && empty($_POST['linkpic4'])) {
    		$attach_id = (empty($id))?"product4-".$the_memberid."-".($product->getMaxId()+1):"product4-".$the_memberid."-".$id;
    		$attachment4->rename_file = $attach_id;
			$attachment4->upload_process();    		
    	    $product->params['data']['product']['picture4'] = $attachment4->file_full_url;
    	}
	elseif(!empty($_POST['linkpic4']))
	{
		$product->params['data']['product']['picture4'] = $_POST['linkpic4'];
	}
	
    	$form_type_id = 2;
    	$form_id = 1;
		$product->params['data']['product']['tag_ids'] = $tag->setTagId($_POST['data']['tag']);
		$product->params['data']['product']['cache_companyname'] = $companyinfo['name'];
		$product->params['data']['product']['industry_id'] = PbController::getMultiId($_POST['industry']['id']);
		
		$product->params['data']['product']['price'] = str_replace(".", "", $product->params['data']['product']['price']);
		$product->params['data']['product']['new_price'] = str_replace(".", "", $product->params['data']['product']['new_price']);
		
		
		//require_once(PHPB2B_ROOT. 'libraries'.DS.'htmlpurifier'.DS.'library'.DS.'HTMLPurifier.auto.php');

		//$config = HTMLPurifier_Config::createDefault();
		//$purifier = new HTMLPurifier($config);
		//$product->params['data']['product']['content'] = $purifier->purify($product->params['data']['product']['content']);
		
		//$product->params['data']['product']['price'] = str_replace('.', '', $product->params['data']['product']['price']);
		
		//Custom industry - product types		
		foreach($_POST['industry']['id'] as $key => $item)
		{
			if($item == $product->params['data']['product']['industry_id'])
			{
				$array_index = $key;
			}
		}
		if($product->params['data']['product']['industry_id'] == -1)
		{
			$array_index = 0;
		}
		//echo $array_index;
		$value = 0;
		$val = array("member_id"=>$the_memberid, "company_id"=>$company_id, "created"=>strtotime(date('Y-m-d H:i:s')), "modified"=>strtotime(date('Y-m-d H:i:s')));
		saveCustomIndustry($value, $val, $array_index+1, $product->params['data']['product']['industry_id']);
		
		$product->params['data']['product']['producttype_id'] = $value;
		
		
		
		$product->params['data']['product']['area_id'] = PbController::getMultiId($_POST['area']['id']);
		if (!empty($id)) {
			//var_dump($_POST['data']['formitem']);
			$item_ids = $form->Add($id,$_POST['data']['formitem'], $form_id, $form_type_id);
			$product->params['data']['product']['modified'] = $time_stamp;
			$product->params['data']['product']['formattribute_ids'] = $item_ids;
			
			$ppp = $product->read("valid_status", $id);
			if($ppp["valid_status"] == 0) {
				$product->params['data']['product']["valid_status"] = 3;
			}
			
			
			
			$result = $product->save($product->params['data']['product'], "update", $id, null, $conditions);
			
			
			
		} else {
			if ($g['max_product'] && $now_product_amount>=$g['max_product']) {
				flash('one_day_max');
			}
			$product->params['data']['product']['member_id'] = $the_memberid;
			$product->params['data']['product']['company_id'] = $company_id;
			$product->params['data']['product']['created'] = $product->params['data']['product']['modified'] = $time_stamp;
			
			//random new product click
			$rand = rand(9,17);
			$company->saveField("clicked",$companyinfo["clicked"]+$rand,intval($companyinfo["id"]));
			$company->saveField("new_clicked",$companyinfo["new_clicked"]+$rand,intval($companyinfo["id"]));
			
			$result = $product->save($product->params['data']['product']);
			$new_id = $product->table_name."_id";
			$product_id = $product->$new_id;
			$item_ids = $form->Add($product_id, $_POST['data']['formitem'], $form_id, $form_type_id);
			if($item_ids){
				$pdb->Execute("UPDATE {$tb_prefix}products SET formattribute_ids='{$item_ids}' WHERE id=".$product_id);
			}
			
			if($result)
			{
				$industry->updateProductCount($product->params['data']['product']['industry_id']);
			}
		}
		if ($result) {
			if (!empty($id)) {
				//flash($message_info?$message_info:"success");
				//header('Location: '.$_SERVER['REQUEST_URI']);
			}
			else
			{
				if (isset($product->params['data']['product']['service'])) {
					header('Location:product.php?type=service&success=1');
				}
				else {
					header('Location:product.php?success=1');
				}				
			}
			setvar("notice", "Sản phẩm được lưu thành công!");

		}else {			
			header('Location: '.$_SERVER['REQUEST_URI']);
		}
	}
}
if (isset($_GET['do']) || isset($_GET['act'])) {
	$do = trim($_GET['do']);
	$action = null;
	if(isset($_GET['action'])) $action = trim($_GET['action']);
	if (isset($_GET['id'])) {
		$id = intval($_GET['id']);
	}
	else
	{
		setvar("back_link", 0);
	}
	if ($do == "edit") {
		if(!empty($company_id)) {
			$company->primaryKey = "member_id";
			$company->checkStatus($company_id);
			$company_info = $company->getInfoById($company_id);
			setvar("CompanyInfo",$company_info);
		}
		$sql = "SELECT id,name FROM {$tb_prefix}brands WHERE member_id=".$the_memberid;
		$user_brands = $pdb->GetArray($sql);
		$tmp_arr = array();
		if (!empty($user_brands)) {
			foreach ($user_brands as $user_brand) {
				$tmp_arr[$user_brand['id']] = $user_brand['name'];
			}
			setvar("UserBrands", $tmp_arr);
		}
		setvar("Forms", $attrs = $form->getAttributes(0,2));
		if (!empty($id)) {
			$productinfo = $product->read("*", $id, null, $conditions);
			//var_dump($productinfo);
			if (empty($productinfo)) {
				flash("action_failed");
			}else {
				if (true) {
					$productinfo['image1'] = pb_get_attachmenturl($productinfo['picture'], '../');
					$productinfo['image2'] = pb_get_attachmenturl($productinfo['picture1'], '../');
					$productinfo['image3'] = pb_get_attachmenturl($productinfo['picture2'], '../');
					$productinfo['image4'] = pb_get_attachmenturl($productinfo['picture3'], '../');
					$productinfo['image5'] = pb_get_attachmenturl($productinfo['picture4'], '../');
				}		   
				if(!empty($productinfo['tag_ids'])){
					$tag->getTagsByIds($productinfo['tag_ids'], true);
					$productinfo['tag'] = $tag->tag;
				}
				$r1 = $industry->disSubOptions($productinfo['industry_id'], "industry_");
				$r2 = $area->disSubOptions($productinfo['area_id'], "area_");
				$productinfo = am($productinfo, $r1, $r2);
				setvar("Forms", $form->getAttributes(explode(",", $productinfo['formattribute_ids']),2));
			}
		}else{
			//$productinfo['industry_id'] = $companyinfo['industry_id'];
			//$productinfo['area_id'] = $companyinfo['area_id'];
			//echo $companyinfo['industry_id']."-".$companyinfo['area_id'];
			//$r1 = $industry->disSubOptions($companyinfo['industry_id'], "industry_");
			$r2 = $area->disSubOptions($companyinfo['area_id'], "area_");
			$productinfo = am($productinfo, $r1, $r2);
		}
		if (!empty($productinfo['country_id'])) {
			$productinfo['country'] = $countries[$productinfo['country_id']]['picture'];
		}else{
			$productinfo['country'] = "blank.gif";
		}
		if (isset($_GET['type']) && $_GET['type'] == 'service') {
			$productinfo["service"] = "1";	
		}
		else
		{
			$productinfo["service"] = "0";	
		}
		$productinfo['price'] = number_format($productinfo['price'], 0, ',', '.');
		$productinfo['new_price'] = number_format($productinfo['new_price'], 0, ',', '.');
		
		$productinfo['content'] = str_replace("\\", "", $productinfo['content']);
		
		//var_dump($productinfo);
		setvar("item",$productinfo);
		$tpl_file = "product_edit";
		template($tpl_file);
		exit;
	}
	if ($do == "price") {
		if($action == "edit"){
			$tpl_file = "product.price";
		}
		template($tpl_file);
		exit;
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
			$updated = $pdb->Execute("UPDATE {$tb_prefix}products SET state={$state} WHERE id={$id} AND member_id={$the_memberid}");
		}
		header('Location: '.$_SERVER['HTTP_REFERER']);
	}
	if ($do == "ads") {
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
			$vals['ads'] = $state;
			$vals['ads_time'] = date('Y-m-d H:i:s');
			$updated = $pdb->Execute("UPDATE {$tb_prefix}products SET ads={$state}, ads_time='{$vals['ads_time'] }' WHERE id={$id} AND member_id={$the_memberid}");
		}
		header('Location: '.$_SERVER['HTTP_REFERER']);
	}
	if (($do == "del" || $_GET['act']=="del") && !empty($id)) {
		$res = $product->read("id, picture, picture1, picture2, picture3, picture4, industry_id,service",$id);
		$isService = $res["service"];
		if($res){
			if($the_memberid == $res["id"]) $product->deleteImage($res);
			
			//update count			
			
			if(!$product->del($_GET['id'], $conditions)){
				flash();
			}
			else
			{
				$industry->updateProductCount($res['industry_id']);
			}
		}else {
			flash("data_not_exists");;
		}
		
		if (isset($isService)) {
			header('Location:product.php?type=service&success=1');
		}
		else {
			header('Location:product.php?success=1');
		}
	}
	if($do == 'refresh' && !empty($id))
	{
		$cons[] = 'member_id = '.$the_memberid;
		if (isset($_GET['level4']) && $_GET['level4'] != '0') {
			$cons[] = "industry_id IN (".getCatsByCatID($_GET['level4']).")";	
		}
		else if(isset($_GET['level3']) && $_GET['level3'] != '0') {
			$cons[] = "industry_id IN (".getCatsByCatID($_GET['level3']).")";	
		}
		else if(isset($_GET['level2']) && $_GET['level2'] != '0') {
			$cons[] = "industry_id IN (".getCatsByCatID($_GET['level2']).")";	
		}
		else if(isset($_GET['level1']) && $_GET['level1'] != '0') {
			$cons[] = "industry_id IN (".getCatsByCatID($_GET['level1']).")";	
		}
		
		//$res = $product->read("id, picture, picture1, picture2, picture3, picture4",$id);		
		$latest = $product->findAll("created", null, $cons,"created DESC",0,1);
		$product->saveField("created", $latest[0]['created']+1, intval($id), $cons );

	}
	//var_dump($do == 'admin_refresh' && $pb_userinfo["role"] == "admin");
	if($do == 'admin_refresh' && $pb_userinfo["role"] == "admin")
	{
		$product->saveField("created", $time_stamp, intval($_GET["id"]));
	}
	
	
}
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

$orderby = "CASE WHEN valid_status = 0 THEN 1 WHEN valid_status = 3 THEN 2 ELSE 3 END ASC, Product.created DESC";
if (isset($_GET['order_by']) && !empty($_GET['order_by'])) {
	$orderby = $_GET['order_by'];
	$o_arr = explode(' ', $_GET['order_by']);
	setvar('sortType',$o_arr[0]);
	setvar('sortOrder',$o_arr[1]);
}

$result = $product->findAll("valid_status,valid_status_message,ads,sort_id,id,default_pic,price,name,picture,picture1,picture2,picture3,picture4,content,created,status,state,created,Product.order,Product.product_code", null, $conditions, $orderby, $page->firstcount, $page->displaypg);
if ($result) {
	$i_count = count($result);
	for ($i=0; $i<$i_count; $i++) {
		$result[$i]["price"] = number_format($result[$i]["price"], 0, ',', '.');
		
		//echo $result[$i]['default_pic'];
		if($result[$i]['default_pic'])
		{
			$col_pic = 'picture'.$result[$i]['default_pic'];
		}
		else
		{
			$col_pic = 'picture';
		}
		//echo $result[$i][$col_pic]."-";
		
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
			$string .= '<br /><span class="unvalid_message">'.$result[$i]['valid_status_message'].'</span>';
			$string .= '<br /><a href="product.php?type='.$_GET["type"].'&do=edit&id='.$result[$i]['id'].'" class="unvalid_edit">Chỉnh sửa</a>';
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
setvar("nlink",$page->nextpage_link);
setvar("plink", $page->previouspage_link);
setvar("CheckStatus", explode(",",L('product_status', 'tpl')));
uaAssign(array("pagenav"=>$page->getPagenav()));
template($tpl_file);

?>