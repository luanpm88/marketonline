<?php
/**
 *      [PHPB2B] Copyright (C) 2007-2099, Ualink Inc. All Rights Reserved.
 *      The contents of this file are subject to the License; you may not use this file except in compliance with the License. 
 *
 *      @version $Revision: 2075 $
 */
 function smarty_block_product($params, $content, &$smarty, &$repeat) {
       
	$conditions = array();
	$param_count = count($smarty->_tag_stack);
	if(empty($params['name'])) $params['name'] = "product";
	if (class_exists("Products")) {
		$product = new Products();
		$product_controller = new Product();
	}else{
		uses("product", "productcomment");
		$product = new Products();
		$product_controller = new Product();
		$productcomment = new Productcomments();
	}
	
	      uses("productcomment");
		$productcomment = new Productcomments();
	
	
	$conditions[] = "p.status=1 AND p.state=1 AND valid_status=1";
	if(isset($params['type'])) {
		$type = explode(",", $params['type']);
		$type = array_unique($type);
		foreach ($type as $val) {
			switch ($val) {
				case 'image':
					$conditions[] = "p.picture!=''";
					break;
				case 'commend':
					$conditions[] = "p.ifcommend>0";
					break;
				case 'brand':
					$conditions[] = "p.brand_id>0";
					break;
				case 'hot':
					$orderbys[] = "clicked DESC";
					break;
				default:
					break;
			}
		}
	}
	if (isset($params['state'])) {
		$conditions[] ="p.state='".intval($params['state'])."'";
	}
	if (isset($params['companyid'])) {
		$conditions[] = "p.company_id=".$params['companyid'];
	}
	if (isset($params['memberid'])) {
		$conditions[] = "p.member_id=".$params['memberid'];
	}
	if (isset($params['sortid'])) {
		$conditions[] = "p.sort_id='".$params['sortid']."'";
	}
	if (isset($params['typeid'])) {
	      $conditions[] = "p.producttype_id=".$params['typeid'];
	}
	if (isset($params['brandid'])) {
		$conditions[] = "p.brand_id=".$params['brandid'];
	}
	
	if(isset($_POST["keyword"]) && $_POST["keyword"] != "")
       {
		     $conditions[] = "LOWER(p.name) LIKE '%".strtolower($_POST['keyword'])."%' OR LOWER(p.product_code) LIKE '%".strtolower($_POST['keyword'])."%'";
       }
	
	
	if (isset($params['orderz']) && $params['orderz'] == 'service') {
	      $conditions[] = "p.service=1";
	}
	else if((isset($params['orderz']) && $params['orderz'] == 'product')) {
	      $conditions[] = "p.service!=1";
	}
	
	
       //var_dump($params['customid']);
	if (!empty($params['industryid']) || !empty($params['customid'])) {
	      if(is_array($params['industryid']) && !empty($params['industryid']))
		     $conditions_temp['industry'] = "p.industry_id IN (".implode(',',$params['industryid']).")";
	      elseif(!empty($params['industryid']))
		     $conditions_temp['industry'] = "p.industry_id='".$params['industryid']."'";
		     
		     
	      if(is_array($params['customid']) && !empty($params['customid']))
		     $conditions_temp['customid'] = "p.producttype_id IN (".implode(',',$params['customid']).")";
	      elseif(!empty($params['customid']))
		     $conditions_temp['customid'] = "p.producttype_id='".$params['customid']."'";
	      
	      $conditions["cusindus"] = "(".implode(" OR ", $conditions_temp).")";
	      //var_dump($conditions["cusindus"]);
	      
	}
	if (!empty($params['areaid'])) {
		$conditions['area'] = "p.area_id='".$params['areaid']."'";
	}
	if (!empty($_GET['industryid'])) {
		$conditions['industry'] = "p.industry_id=".intval($_GET['industryid']);
	}
	if (!empty($_GET['areaid'])) {
		$conditions['area'] = "p.area_id=".intval($_GET['areaid']);
	}
	$orderby = " ORDER BY created DESC ";
	if (!empty($orderbys)) {
		$orderby.=" ORDER BY ".implode(",", $orderbys);
	}
	if (isset($params['orderby'])) {
		$orderby = " ORDER BY ".implode(",", array(trim($params['orderby']), $orderby))." ";
	}
	if(empty($orderby)){
		$orderby = " ORDER BY id DESC ";
	}
	
	if (isset($params['orderz']) && $params['orderz'] == 'new') {
	      $orderby = " ORDER BY created DESC ";
	}
	
	if (isset($params['orderz']) && $params['orderz'] == 'popular') {
	      $orderby = " ORDER BY clicked DESC ";
	}
	
	$product->setCondition($conditions);
	$limit = $offset = 0;
	if (isset($params['row'])) {
		$limit = $params['row'];
	}
	
	if (isset($params['start'])) {
		$offset = $params['start'];
	}
	if (isset($_GET['pos'])) {
		//$limit = $GLOBALS['limit'];
		$offset = intval($_GET['pos']);
	}
	$product->setLimitOffset($offset, $limit);
	$mysql_limit = $product->getLimitOffset();
	if (isset($params['limit'])) {
		$mysql_limit = " ".trim($params['limit']);
	}
	$sql = "SELECT m.membertype_id,p.*,p.id as productid,p.name as names,p.name as title,cache_companyname as companyname,p.order as porder FROM {$product->table_prefix}products p INNER JOIN {$product->table_prefix}members m ON m.id = p.member_id ".$product->getCondition()."{$orderby}".$mysql_limit;
	//echo $sql;

	if(empty($smarty->blockvars[$param_count])) {
		$smarty->blockvars[$param_count] = $product->GetArray($sql);
		if(!$smarty->blockvars[$param_count]) return $repeat = false;
	}
	
	
	
	if(list($key, $item) = each($smarty->blockvars[$param_count])) {	      
	      
		$repeat = true;
		$item['rownum'] = $key;
		$item['iteration'] = ++$key;
		$url = smarty_function_the_url(array("module"=>"product", "id"=>$item['id'], "product_name"=>$item['name']));
		$item['url'] = $url;
		$item['name'] = $item['names'] = $item['title'] = pb_lang_split($item['name']);
		if (isset($params['titlelen'])) {
	    	$item['names'] = $item['title'] = mb_substr($item['name'], 0, $params['titlelen']);
	    	$item['companynames'] = mb_substr($item['companyname'], 0, $params['titlelen']);
		}
		$item['company'] = $item['companyname'];
		$item['link'] = '<a title="'.$item['name'].'" href="'.$url.'">'.$item['names'].'</a>';
		$item['hits'] = number_format($item['clicked']);
		$item['pubdate'] = @date("m-d", $item['created']);
		
		$item['comments_count'] = $productcomment->findCount(null, array("product_id=".$item['id']));
		
		if($item['default_pic'])
		{
			$col_pic = 'picture'.$item['default_pic'];
		}
		else
		{
			$col_pic = 'picture';
		}
		
		
		$item['thumb'] = pb_get_attachmenturl($item[$col_pic], '', 'small');
		$item['price'] = number_format($item["price"], 0, ',', '.');
		$item['new_price'] = number_format($item["new_price"], 0, ',', '.');
		
		//
		$item['pos'] = '';
		if(($key-1)%3 == 0) $item['pos'] = 'first';
		if(($key-1)%3 == 2) $item['pos'] = 'last';
		
		$smarty->assign($params['name'], $item);
	}
	else {
		$repeat = false;
		reset($smarty->blockvars[$param_count]);
	}
	if(!is_null($content)) print $content;
	if(!$repeat) $smarty->blockvars[$param_count] = array();
}
?>