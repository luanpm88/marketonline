<?php
/**
 *      [PHPB2B] Copyright (C) 2007-2099, Ualink Inc. All Rights Reserved.
 *      The contents of this file are subject to the License; you may not use this file except in compliance with the License. 
 *
 *      @version $Revision: 2048 $
 */
if(!defined('IN_PHPB2B')) exit('Not A Valid Entry Point');
uses("product", "producttype", "industry");
$industry = new Industries();
$product = new Products();
$producttype = new ProductTypes();
$tpl_file = "product_admin";
$conditions = null;
$conditions[] = "Product.status=1 AND Product.company_id='".$COMPANY_CURRENT['id']."'";

if (isset($_GET['typeid'])) {
	//$conditions[]= "producttype_id=".intval($_GET['typeid']);
	$type = $producttype->GetArray("SELECT * FROM {$producttype->table_prefix}producttypes WHERE id=".$_GET['typeid']);
	//var_dump($type);
	if(isset($type[0])) setvar("Type", $type[0]);
}
if (isset($_GET['new']) && $_GET['new'] == 1) {
	$conditions[]= "ifnew=1";
}




$isLevel = 0;

//setvar("Type", $_GET['typeid']);
$IndustryList["box1"] = $industries;
		if (isset($_GET['typeid'])) {
			//Get industry level 1
			$IndustryList["id"] = $_GET['typeid'];
			$area_a = array();
			$area_a[] = $_GET['typeid'];
			foreach($industries as $key0 => $level0)
			{
				if($level0["id"] == $_GET['typeid'])
				{
					foreach($level0['sub'] as $key1 => $level1)
					{
						$area_a[] = $level1["id"];
						foreach($level1['sub'] as $key2 => $level2)
						{
							$area_a[] = $level2["id"];
							foreach($level2['sub'] as $key3 => $level3)
							{
								$area_a[] = $level3["id"];
							}
						}
					}
					$Cat = $level0;
					$level[0] = $level0["id"];
					$isLevel = 1;
					
					//$IndustryList["box4"] = $level2['sub'];
					//$IndustryList["box3"] = $level1['sub'];
					//$IndustryList["box2"] = $level0['sub'];
					//$IndustryList["level2_name"] = $level2["name"];
					//$IndustryList["level2_id"] = $level2["id"];
					//$IndustryList["level1_name"] = $level1["name"];
					//$IndustryList["level1_id"] = $level1["id"];
					$IndustryList["level0_name"] = $level0["name"];
					$IndustryList["level0_id"] = $level0["id"];
					$IndustryList["box1"] = $industries;
				}
				else
				{
					foreach($level0['sub'] as $key1 => $level1)
					{
						if($level1["id"] == $_GET['typeid'])
						{
							foreach($level1['sub'] as $key2 => $level2)
							{
								$area_a[] = $level2["id"];
								foreach($level2['sub'] as $key3 => $level3)
								{
									$area_a[] = $level3["id"];
								}
							}
							$Cat = $level1;
							$level[0] = $level0["id"];
							$level[1] = $level1["id"];
							$isLevel = 2;
							
							//$IndustryList["box4"] = $level2['sub'];
							//$IndustryList["box3"] = $level1['sub'];
							//$IndustryList["level2_name"] = $level2["name"];
							//$IndustryList["level2_id"] = $level2["id"];
							$IndustryList["level1_name"] = $level1["name"];
							$IndustryList["level1_id"] = $level1["id"];
							$IndustryList["level0_name"] = $level0["name"];
							$IndustryList["level0_id"] = $level0["id"];
							$IndustryList["box2"] = $level0['sub'];
							$IndustryList["box1"] = $industries;
						}
						else
						{
							foreach($level1['sub'] as $key2 => $level2)
							{
								if($level2["id"] == $_GET['typeid'])
								{
									$area_a[] = $level2["id"];

									foreach($level2['sub'] as $key3 => $level3)
									{
										//echo $level3["id"];
										$area_a[] = $level3["id"];
									}
									$Cat = $level2;
									$level[0] = $level0["id"];
									$level[1] = $level1["id"];
									$level[2] = $level2["id"];
									$isLevel = 3;
									
									//$IndustryList["box4"] = $level2['sub'];
									
									$IndustryList["level2_name"] = $level2["name"];
									$IndustryList["level2_id"] = $level2["id"];
									$IndustryList["level1_name"] = $level1["name"];
									$IndustryList["level1_id"] = $level1["id"];
									$IndustryList["level0_name"] = $level0["name"];
									$IndustryList["level0_id"] = $level0["id"];
									$IndustryList["box3"] = $level1['sub'];
									$IndustryList["box2"] = $level0['sub'];
									$IndustryList["box1"] = $industries;
								}
								else
								{
									foreach($level2['sub'] as $key3 => $level3)
									{
										
										if($level3["id"] == $_GET['typeid'])
										{
											$area_a[] = $level3["id"];
											$Cat = $level3;
											$level[0] = $level0["id"];
											$level[1] = $level1["id"];
											$level[2] = $level2["id"];
											$level[3] = $level3["id"];
											$isLevel = 4;
											
											$IndustryList["level3_name"] = $level3["name"];
											$IndustryList["level3_id"] = $level3["id"];
											$IndustryList["level2_name"] = $level2["name"];
											$IndustryList["level2_id"] = $level2["id"];
											$IndustryList["level1_name"] = $level1["name"];
											$IndustryList["level1_id"] = $level1["id"];
											$IndustryList["level0_name"] = $level0["name"];
											$IndustryList["level0_id"] = $level0["id"];
											$IndustryList["box4"] = $level2['sub'];
											$IndustryList["box3"] = $level1['sub'];
											$IndustryList["box2"] = $level0['sub'];
											$IndustryList["box1"] = $industries;
										}
									}
								}
							}
						}
					}
					
				}
			}
			//var_dump($area_a);
		}
		
		foreach($product->condition as $key => $item)
		{
			if(strpos($item, "industry_id"))
			{
				$product->condition[$key] = "Product.industry_id IN (".implode(',',$area_a).")";
			}			
		}





//var_dump($COMPANY_CURRENT);

//var_dump($level);
//echo $_GET["pos"];
//echo $amount;
$conditions[]= "Product.industry_id IN (".implode(',', $area_a).")";
$amount = $product->findCount(null, $conditions,"id");
//echo $amount."eerwerwerwerwer wer wer w";
$_GET['typeid'] = $_GET['typeid'] ? $_GET['typeid'] : 0;
$_GET['pos'] = $_GET['pos'] ? $_GET['pos'] : 0;

foreach($IndustryList["box1"] as $key => $item)
{
	$IndustryList["box1"][$key]["count"] = $industry->countProduct($item["id"], $COMPANY_CURRENT['member_id']);
}

setvar('IndustryList', $IndustryList);
setvar('pos', $_GET["pos"]);
setvar("isLevel", $isLevel);
setvar("TypeID", $_GET['typeid']);
setvar("level", $level);
setvar("Cat", $Cat);
setvar("aaa", $area_a);
setvar("paging", array('total'=>$amount));
setvar('comid', $COMPANY_CURRENT['id']);
setvar('userID', $COMPANY_CURRENT['member_id']);
setvar("pagetitle","Sản phẩm");
if(detectMobile()) {
	setvar("tree_type","product");
	$space->render_mobile("space/product");
} else {
	$space->render($tpl_file);
}
?>
