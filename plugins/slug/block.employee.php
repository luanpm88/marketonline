<?php
/**
 *      [PHPB2B] Copyright (C) 2007-2099, Ualink Inc. All Rights Reserved.
 *      The contents of this file are subject to the License; you may not use this file except in compliance with the License. 
 *
 *      @version $Revision: 2075 $
 */
function smarty_block_employee($params, $content, &$smarty, &$repeat) {
	uses("area");
	$area = new Areas();
	
	$conditions = array();
	$param_count = count($smarty->_tag_stack);
	if(empty($params['name'])) $params['name'] = "job";
	if (class_exists("Employees")) {
		$job = new Employees();
	}else{
		uses("employee");
		$job = new Employees();
	}
	if (!class_exists('Space')) {
		uses("space");
	}
	$space_controller = new Space();
	if(isset($params['companyid'])) {
		$conditions[] = "company_id=".$params['companyid'];
	}
	if(isset($params['status'])) {
		$conditions[] = "j.status='".$params['status']."'";
	}
	if(isset($params['showed'])) {
		$conditions[] = "j.showed='".$params['showed']."'";
	}
	if(isset($params['searched'])) {
		$conditions[] = "j.searched='".$params['searched']."'";
	}
	if(isset($params['memberid'])) {
		$conditions[] = "member_id=".$params['memberid'];
	}	
	if (isset($params['id'])) {
		$conditions[] = "j.id=".$params['id'];
	}
	
	//custom search
	if (isset($params['keyword'])) {
		$conditions[] = "j.expected_position LIKE '%".$params['keyword']."%'";
	}
	//echo $params['indust'];
	if (isset($params['indust']) && $params['indust'] != 0) {
		$conditions[] = "j.jobindusts LIKE '%[".intval($params['indust'])."]%'";
	}
	if (isset($params['area']) && $params['area'] != 0) {
		$conditions[] = "j.areas LIKE '%[".$params['area']."]%'";
	}
	if (!$params['area'] && isset($params['areatype_id']) && $params['areatype_id'] != 0) {
		$all_areas = $area->findAll("id",null,array("areatype_id=".$params['areatype_id']));
		$ors = array();
		foreach($all_areas as $key => $aaaa) {
			$ors[] = "j.areas LIKE '%[".$aaaa.id."]%'";
		}
		$conditions[] = "(".implode(" OR ", $ors).")";
	}
	
	if (isset($params['type']) && $params['type'] != 0) {
		$conditions[] = "j.joblevel_id = ".intval($params['type']);
	}
	
	$orderby = null;
	if (isset($params['orderby'])) {
		$orderby = " ORDER BY ".trim($params['orderby'])." ";
	}else{
		$orderby = " ORDER BY j.created DESC";
	}
	$job->setCondition($conditions);
	$limit = $offset = 0;
	if (isset($params['row'])) {
		$limit = $params['row'];
	}
	if (isset($params['start'])) {
		$offset = $params['start'];
	}
	$job->setLimitOffset($offset, $limit);
	$sql = "SELECT j.*, j.expected_position FROM {$job->table_prefix}employees j ".$job->getCondition()."{$orderby}".$job->getLimitOffset();
	//echo $sql;
	if(empty($smarty->blockvars[$param_count])) {
		$smarty->blockvars[$param_count] = $job->GetArray($sql);
		if(!$smarty->blockvars[$param_count]) return $repeat = false;
	}
	
	$JobProficiencies = cache_read('typeoption', 'job_proficiency');	
		
	
	if(list($key, $item) = each($smarty->blockvars[$param_count])) {
		//var_dump($item);
		$repeat = true;
		
		
		
		uses("company");
		$company = new Companies();
		// Get company
		$com = $company->read("*", $item["company_id"]);
		$item["company"] = $com;
		$html = '<div class=map_box_info>';
			$html .= '<img src='.$com["thumb"].' class=map_com_thumb />';
			
			$html .= '<p>';
				$html .= '<strong>'.$com["shop_name"].'</strong>';
				$html .= '<br />'.$com["address"];						
				$more = array();
				if($com["tel"]) $more[] = '<br />ĐT: '.$com["tel"];
				if($com["fax"]) $more[] = '<br />Fax: '.$com["fax"];
				if($com["email"]) $more[] = '<br />Email: '.$com["email"];				
				if(!empty($more)) $html .= implode(", ",$more);
			$html .= '</p>';
		$html .= '</div>';
		if(in_array($com["map_lng"], $addresses)) {
			$com["map_lng"] = $com["map_lng"]+(0.0005*$dup);
			$dup++;
		}
		$item["company_map"] = 'addMarkerByLatLng('.$com["map_lat"].','.$com["map_lng"].',map,"'.$html.'","/'.$com["cache_spacename"].'/tuyen-dung");';
		
		
		//$space_controller->setBaseUrlByUserId($item['userid'], "job");
		//$url = $space_controller->rewriteDetail("job", $item['id']);
		//$item['url'] = $url;
		//$item['space_url'] = $space_controller->rewrite($item['userid'], $item['company_id']);
		//$item['name'] = pb_lang_split($item['name']);
		
		//$item['expire_time'] = date('d/m/Y', $item['expire_time']);
		
		//uses("area");
		//$area = new Areas();
		//$item["area"] = $area->getFullName($item["area_id"]);
		//
		//$item["area"] = explode(',',$item["area"]);
		//$item["area"] = $item["area"][count($item["area"])-2];
		//
		////city
		//$item["city_id"] = $area->getByName($item["area"]);
		//$item["city_id"] = $item["city_id"]["id"];
		//
		//$item["expired_dates"] = date("d/m/Y", $item["expired_dates"]);
		
		//$item['title'] = pb_lang_split($item['title']);
		//$item['content'] = strip_tags(pb_lang_split($item['content']));
		//if (isset($params['titlelen'])) {
		//	$item['title'] = mb_substr(strip_tags($item['title']), 0, $params['titlelen']);
		//}
		//$item['link'] = '<a title="'.strip_tags($item['name']).'" href="'.$url.'">'.$item['title'].'</a>';
		//if (isset($params['infolen'])) {
		//	if(isset($item['content'])) $item['content'] = mb_substr(pb_strip_spaces($item['content']),0, $params['infolen']);
		//}
		
		$item["joblevel"] = $JobProficiencies[$item["joblevel_id"]];
		
		//areas
		$item["areas"] = substr($item["areas"],1,strlen($item["areas"])-2);
		$item["areas"] = str_replace("][",",",$item["areas"]);
		$item["areas"] = $area->findAll("id, name", null, array("id IN (".$item["areas"].")"));
		
		$string = "";
		foreach($item["areas"] as $a => $b)
		{
			$string .= '<a class="job_city_link" onclick="$(\'#job-learn input[name=do]\').val(\'employee\')" href="javascript:void(0)" rel="'.$b["id"].'">'.$b["name"].'</a>';
			if($a < count($item["areas"])-1) $string .= ', ';
		}
		$item["areas"] = $string;
		
		//var_dump($item);
		
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