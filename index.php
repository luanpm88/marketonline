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
		"album"
	);
	if(in_array($do, $secure_c) && file_exists($c_file)){
		include_once($c_file);
		$pc = new $c_do();
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
		//echo "sdfsdf";
		//$rowi = $industrybd->getByID($key0);
		//var_dump($rowi);
		$industries[$key0]["image"] = pb_get_attachmenturl($industries[$key0]["picture"], "", "");
		
		if(preg_match('/nopicture/', $industries[$key0]["image"]))  $industries[$key0]["image"] = "";
		
		//FACEBOOK IMAGES
		if($industries[$key0]["image"] != '' && $industries[$key0]["share_facebook"])
		{
			$fimages[] = $industries[$key0]["image"];
		}
		
		$industries[$key0]["image"] = URL.$industries[$key0]["image"];
		
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
	
	setvar("tet2014", false);
	
	render("index");
}
?>