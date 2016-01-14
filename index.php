<?php
/**
 *      [PHPB2B] Copyright (C) 2007-2099, Ualink Inc. All Rights Reserved.
 *      The contents of this file are subject to the License; you may not use this file except in compliance with the License. 
 *
 *      @version $Revision: 2075 $
 */
define('CURSCRIPT', 'index');
//$cache_archiver = true;
$htmlize = true;
require("libraries/common.inc.php");
require("share.inc.php");

if (!empty($_GET['do'])) {
	$action = isset($_GET['action']) ?trim($_GET['action']) : 'index' ;
	$do = $_GET['do'] == '' ? 'home' : htmlspecialchars(trim($_GET['do']));
	$c_do = ucwords($do);
	$c_file = LIB_PATH .'core/controllers/'.$do.'_controller.php';
	$secure_c = array(
		"offer",
		"news",
		"job",
		"fair",
		"space",
		"wap",
		"help",
		"friendlink",
		"page",
		"standard",
		"brand",
		"company",
		"announce",
		"error",
		"product",
		"market",
		"member",
		"message",
		"topic",
		"service",
		"search",
		"dict",
		"employee",
		"studypost",
		"album",
		"area",
		"chatc",
		"industry"
	);
	
	if(in_array($do, $secure_c) && file_exists($c_file)){
		
		include_once($c_file);
		$pc = new $c_do();
		//var_dump($c_file);
		if(method_exists($pc, $action))
			$pc->{$action}();
		elseif (method_exists($pc, 'index'))
			$pc->index();
	}else{
		flash();
	}
}else{
	require('libraries/core/models/industry.php');
	require('libraries/core/models/product.php');
		
	//require('libraries/core/models/announcement.php');
	$industrybd = new Industries();
	$product = new Products();
	
	//Get industry level 1
	$industries = $industrybd->getCacheIndustry();
	
	//$product = $product->getNewProduct(2);
	$count0 = 0;
	//$cats = array();
	
	//FACEBOOK IMAGEs
	$fimages = array();
	
	foreach($industries as $key0 => $level0)
	{
		$cats = array();
		$cats[] = $level0["id"];
		
		//$industries[$key0]["ppcount"] = $industrybd->read("count", $level0["id"]);
		//$industries[$key0]["ppcount"] = $industries[$key0]["ppcount"]["count"];
		
		if($count1%6 == 1)
		{
			$industries[$key0]["break"] = 1;
		}
		else
		{
			$industries[$key0]["break"] = 0;
		}
		
		if($count0%6 == 0 || $count0%6 == 5)
		{
			$maxitem = 11;
		}
		else
		{
			$maxitem = 3;
		}

		
		
		//getImage
		//$rowi = $industrybd->getByID($key0);
		//var_dump($rowi);
		$industries[$key0]["image"] = pb_get_attachmenturl($industries[$key0]["picture"], "", "");
		
		if(preg_match('/nopicture/', $industries[$key0]["image"]))  $industries[$key0]["image"] = "";
		
		//FACEBOOK IMAGES
		if($industries[$key0]["image"] != '' && $industries[$key0]["share_facebook"])
		{
			$fimages[] = $industries[$key0]["image"];
		}
		
		$industries[$key0]["image"] = $industries[$key0]["image"];
		
		$kkc = 0;
		foreach($level0['sub'] as $key1 => $level1)
		{
			$cats[] = $level1["id"];
			
			//$industries[$key0]["sub"][$key1]["ppcount"] = $industrybd->read("count", $level1["id"]);
			//$industries[$key0]["sub"][$key1]["ppcount"] = $industries[$key0]["sub"][$key1]["ppcount"]["count"];
			
			foreach($level1['sub'] as $key2 => $level2)
			{
				$cats[] = $level2["id"];
			}
			
			if($kkc > $maxitem)
			{
				unset($industries[$key0]["sub"][$key1]);
			}
			$kkc++;
		}
		//echo $level0["name"]."-".$maxitem."-";
		
		if($count0 == count($industries)-1)
		{
			$industries[$key0]["last"] = 1;
			//echo $industries[$key0]["name"];
		}
		else
		{
			$industries[$key0]["last"] = 0;
		}
		
		//Get images from new product
		//$images = $product->getNewProductImages($cats, 2);
		//if(count($images))
		//{
		//	$industries[$key0]["images"] = $images;
		//}
		//else
		//{
		//	$industries[$key0]["images"] = "";
		//}
		
		
		
		//var_dump($industries[$key0]["images"]);
		if($key0 != 19 && $key0 != 5 && $key0 != 3965) $count0++;
	}
	//var_dump($industries);
	//var_dump($industry);
	setvar("IndustryList", $industries);
			
	//FACEBOOK SHARE
	$FACE["title"] = 'MarketOnline.vn';
	$FACE["summary"] = urlencode('Trang Market Online là nơi hội tụ và gặp gỡ giữa người tiêu dùng và nhà cung cấp sản phẩm/dịch vụ. Ngoài ra còn là nơi trao đổi thông tin thương mại/đầu tư giữa cá nhân/doanh nghiệp/tổ chức trong và ngoài nước.');
	//$FACE["images"] = '&p[images][0]='.urlencode('http://marketonline.vn/images/logo_1.png');
	$imageface = array();
	foreach($fimages as $key => $img)
	{
		//if(in_array($key, array(0,1,2,3,4)))
		//{
			$FACE["images"] .= '&p[images]['.($key).']='.urlencode(URL.$img);
			$fimages[$key] = URL.$img;
			$imageface[] = URL.$img;
		//}
	}
	
	//$setvar("FACE", $FACE);
	
	//listing main industries
	$industries = $industrybd->getCacheIndustry();
	setvar("industries",$industries);
	
	setvar("fimages", $imageface);
	setvar("count_fimages", count($imageface));
	
	#setvar("tet2014", true);
	setvar("tet_others", false);
	
	//announce
	
	
	$dksd = $announcement->read("message",23);
	setvar("dksd", $dksd["message"]);
	setvar("dksd_raw", substr(trim(strip_tags($dksd["message"])),29,1000));
	
	$qltv = $announcement->read("message",24);
	setvar("qltv", $qltv["message"]);
	setvar("qltv_raw", substr(trim(strip_tags($qltv["message"])),40,1000));
	
	$baomat = $announcement->read("message",25);
	setvar("baomat", $baomat["message"]);
	setvar("baomat_raw", substr(trim(strip_tags($baomat["message"])),12,1000));
	
	$qc = $announcement->read("message",31);
	$qc2 = $announcement->read("message",32);
	setvar("qc", $qc["message"]);
	setvar("qc2", $qc2["message"]);
	setvar("qc_raw", substr(trim(strip_tags($qc["message"])),12,1000));
	
	
	//FOR MOBILE DATA
	require('libraries/core/models/ad.php');
	$ad = new Adses();
	//var_dump($ad->getByZone(38));
	
	setvar("home_ads", $ad->getByZone(38));
	setvar("mobile_home_cats", $product->getMobileHomeCats());
	
	//detectMobile()
	if(detectMobile()) {
		if($_GET["mobile_page"] == "deal_intro") {
			render("mobile/deal_intro");
		} else if($_GET["mobile_page"] == "home_ads") {
			render("mobile/home_ads");
		} else if($_GET["mobile_page"] == "mobile_album") {
			$product = new Products();
	
			if (isset($_GET['id'])) {
				$id = intval($_GET['id']);
			}
			$info = $product->getProductById($id);
			
			//if($info.picture) {
				list($w,$h) = getimagesize($info.image2);
			//}
			
			setvar("item", $info);
			setvar("w", $w);
			setvar("h", $h);
			render("mobile/product/mobile_album");
		} else {			
				render("mobile/index");
			
		}		
	} else if($_GET["custom_page"] == "deal_home") {
		render("modern/deal_home");
		exit;
	} else {
		//$industry = new Industries();
		//var_dump($industry->countProduct(1));
		
		
		//if show Home Top Main Right
		$show_home_top_main_left = $ad->getByZone(40);
		setvar("show_home_top_main_left",count($show_home_top_main_left));
		
		//if show Home Top Main Right
		$productbox_left = $ad->getByZone(43);
		$productbox_right = $ad->getByZone(44);
		$productbox_center = $ad->getByZone(45);
		$productbox_more = $ad->getByZone(52);
		setvar("show_productbox",count($productbox_more)+count($productbox_left)+count($productbox_right)+count($productbox_center));
		setvar("productbox_center",$productbox_center);
		setvar("productbox_more",$productbox_more);
		
		//if show Home Top Main Right
		$servicebox_left = $ad->getByZone(46);
		$servicebox_right = $ad->getByZone(47);
		$servicebox_center = $ad->getByZone(48);
		$servicebox_more = $ad->getByZone(53);
		setvar("show_servicebox",count($servicebox_more)+count($servicebox_left)+count($servicebox_right)+count($servicebox_center));
		setvar("servicebox_center",$servicebox_center);
		setvar("servicebox_more",$servicebox_more);
		
		//if show Home Top Main Right
		$tradebox_left = $ad->getByZone(49);
		$tradebox_right = $ad->getByZone(50);
		$tradebox_center = $ad->getByZone(51);
		$tradebox_more = $ad->getByZone(54);
		setvar("show_tradebox",count($tradebox_more)+count($tradebox_left)+count($tradebox_right)+count($tradebox_center));
		setvar("tradebox_center",$tradebox_center);
		setvar("tradebox_more",$tradebox_more);
		
		//if show Home Top Main Right
		$combox_left = $ad->getByZone(55);
		$combox_right = $ad->getByZone(56);
		$combox_center = $ad->getByZone(57);
		$combox_more = $ad->getByZone(58);
		setvar("show_combox",count($combox_more)+count($combox_left)+count($combox_right)+count($combox_center));
		setvar("combox_center",$combox_center);
		setvar("combox_more",$combox_more);
		
		//get companie
		$companies = $company->getNewHome();
		//var_dump($companies);
		setvar("companies",$companies["result"]);
		setvar("newhome",1);
		render("newhome");
	//} else {
	//	render("newhome");
		
		
	}

	
}
?>