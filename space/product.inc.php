<?php
/**
 *      [PHPB2B] Copyright (C) 2007-2099, Ualink Inc. All Rights Reserved.
 *      The contents of this file are subject to the License; you may not use this file except in compliance with the License. 
 *
 *      @version $Revision: 2048 $
 */
if(!defined('IN_PHPB2B')) exit('Not A Valid Entry Point');
uses("product");
$product = new Products();
$tpl_file = "product";
$conditions = null;
$indus_array = array();
$custom_array = array();
//var_dump($company->info);
$conditions[] = "Product.status=1 AND Product.company_id='".$COMPANY_CURRENT['id']."' AND Product.show = 1";

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
	//var_dump($indus_array);
	//var_dump($custom_array);
	
	$conditions_temp = null;
		if(!empty($indus_array))
		     $conditions_temp['industry'] = "Product.industry_id IN (".implode(',',$indus_array).")";
				     
		if(!empty($custom_array))
		     $conditions_temp['customid'] = "Product.producttype_id IN (".implode(',',$custom_array).")";		
	      
	$conditions[] = "(".implode(" OR ", $conditions_temp).")";
		
}
if (isset($_GET['new']) && $_GET['new'] == 1) {
	$conditions[]= "ifnew=1";
}

//var_dump($conditions);
setvar("indus_array", $indus_array);
setvar("custom_array", $custom_array);
//var_dump($conditions);
$amount = $product->findCount(null, $conditions,"id");
//echo $amount."ssds";
setvar("paging", array('total'=>$amount));
$space->render($tpl_file);
?>