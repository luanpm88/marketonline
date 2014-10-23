<?php
/**
 *      [PHPB2B] Copyright (C) 2007-2099, Ualink Inc. All Rights Reserved.
 *      The contents of this file are subject to the License; you may not use this file except in compliance with the License. 
 *
 *      @version $Revision: 2048 $
 */
if(!defined('IN_PHPB2B')) exit('Not A Valid Entry Point');
uses("product","producttype");
$product = new Products();
$producttype = new Producttypes();
$tpl_file = "product";
$conditions = null;
$indus_array = array();
$custom_array = array();
//var_dump($company->info);
$conditions[] = "Product.status=1 AND Product.company_id='".$COMPANY_CURRENT['id']."' AND Product.state = 1";

if(isset($_POST["keyword"]) && $_POST["keyword"] != "")
{
	      $conditions[] = "LOWER(Product.name) LIKE '%".strtolower($_POST['keyword'])."%' OR LOWER(Product.product_code) LIKE '%".strtolower($_POST['keyword'])."%'";
}

if (isset($_GET['order']) && $_GET['order'] == 'service') {
	      $conditions[] = "Product.service=1";

}
elseif (isset($_GET['order']) && $_GET['order'] == 'product')
{
	      $conditions[] = "Product.service!=1";
}

if (isset($_GET['typeid'])) {
	$id_i = intval($_GET['typeid']);

	
	$level = 0;
	$tree = $producttype->findTree('id,name,level', array("0"=>'member_id='.$info['id']));
	foreach($tree as $key => $item)
	{		
		if($level)
		{
			if($item["level"] > $level)
			{
				if(!isset($item["member_id"]))
				{
					$indus_array[] = $item["id"];
				}
				else
				{
					$custom_array[] = $item["id"];
				}
			}
			else
			{
				break;
			}
		}		
		elseif($item["id"] == $id_i)
		{
			//echo "no do".$id_i;
			if($_GET["memberid"] == '' && !isset($item["member_id"]))
			{			
				$indus_array[] = $id_i;
				$level = $item["level"];
				
				setvar('current_cat', $item);
			}
			if($_GET["memberid"] != '' && isset($item["member_id"]))
			{
				$custom_array[] = $id_i;
				$level = $item["level"];
				setvar('current_cat', $item);
			}
			
		}
		//echo $level;
	}
	//var_dump($_GET['typeid']);
	//var_dump($custom_array);
	
	$conditions_temp = null;
		if(!empty($indus_array))
		     $conditions_temp['industry'] = "Product.industry_id IN (".implode(',',$indus_array).")";
				     
		if(!empty($custom_array))
		     $conditions_temp['customid'] = "Product.producttype_id IN (".implode(',',$custom_array).")";		
	      
	$conditions[] = "(".implode(" OR ", $conditions_temp).")";
		
}

$amount = $product->findCount(null, $conditions,"id");

if (isset($_GET['new']) && $_GET['new'] == 1) {
	$conditions[]= "ifnew=1";
}

//for ten lines product
if($company->info["custom_style"]) {
    $styling = json_decode($company->info["custom_style"],true);    
    if(!$styling["cols_number"]) {
	$styling["cols_number"] = 3;
    }    
}
$tto = $styling["cols_number"]*10*10;
if($amount > $tto) $amount = $tto;
setvar("num_per_page",$styling["cols_number"]*10);
//var_dump($styling["cols_number"]);
//var_dump($company->info["custom_style"]);

//var_dump($conditions);
setvar("indus_array", $indus_array);
setvar("custom_array", $custom_array);
//var_dump($amount);

setvar("paging", array('total'=>$amount));
$space->render($tpl_file);
?>