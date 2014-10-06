<?php
class Jobs extends PbModel {
	var $name = "Job";

	function Jobs()
 	{
		parent::__construct();
 	}
	
	function updateStatus()
	{
		$sql = "UPDATE {$this->table_prefix}jobs SET `status` = 0 WHERE `expired_dates` < ".strtotime(date('Y-m-d H:i:s'));
		
		$results = $this->dbstuff->Execute($sql);
		return $results;
	}
	
	function getByArea($params=array(), $offset=0, $row=3, $num=7) {
		if($params["area_id"]) {
			$conditions[] = "(a_parent.id=".intval($params["area_id"])." OR a.id=".intval($params["area_id"]).")";
		}
		if($params["areatype_id"]) {
			$conditions[] = "(a_parent.areatype_id=".intval($params["areatype_id"])." OR a.areatype_id=".intval($params["areatype_id"]).")";
		}
		if($params["service"]) {
			$conditions[] = "Product.service=1";
		}
		
		$conditions[] = "Job.area_show=1";
		
		$joins = array();
		$joins[] = "LEFT JOIN {$this->table_prefix}companies c ON c.id=Job.company_id";
		$joins[] = "LEFT JOIN {$this->table_prefix}areas a ON a.id=c.area_id";
		$joins[] = "LEFT JOIN {$this->table_prefix}areas a_parent ON a_parent.id=a.parent_id";
		$joins[] = "LEFT JOIN {$this->table_prefix}members AS m ON m.id = Job.member_id";
		
		$count = $row*$num;
		$result = $this->findAll("Job.*,Job.name as title,c.name AS companyname,c.picture AS company_picture,c.cache_spacename AS userid, m.membertype_id", $joins, $conditions, "Job.created DESC", $offset, $count);
		$count = $this->findCount($joins, $conditions, "Job.id");
		$result = $this->formatItems($result);
		
		return array("result"=>$result,"count"=>$count);
	}
	
	function formatItems($result) {
		uses("space","area");		
		$space_controller = new Space();
		$area = new Areas();
				
		foreach($result as $key => $item){
			$space_controller->setBaseUrlByUserId($item['userid'], "job");
			$url = $space_controller->rewriteDetail("job", $item['id']);
			$item['url'] = $url;
			$item['space_url'] = $space_controller->rewrite($item['userid'], $item['company_id']);
			$item['name'] = pb_lang_split($item['name']);
			
			$item['expire_time'] = date('d/m/Y', $item['expire_time']);
			
			
			$item["area"] = $area->getFullName($item["area_id"]);
			
			$item["area"] = explode(',',$item["area"]);
			$item["area"] = $item["area"][count($item["area"])-2];
			
			//city
			$item["city_id"] = $area->getByName($item["area"]);
			$item["city_id"] = $item["city_id"]["id"];
			
			$item["salary"] = number_format($item["salary"], 0, ',', '.');
			
			$item["expired_dates"] = date("d/m/Y", $item["expired_dates"]);
			
			$item['title'] = pb_lang_split($item['title']);
			$item['content'] = strip_tags(pb_lang_split($item['content']));
			if (isset($params['titlelen'])) {
				$item['title'] = mb_substr(strip_tags($item['title']), 0, $params['titlelen']);
			}
			$item['link'] = '<a title="'.strip_tags($item['name']).'" href="'.$url.'">'.$item['title'].'</a>';
			if (isset($params['infolen'])) {
				if(isset($item['content'])) $item['content'] = mb_substr(pb_strip_spaces($item['content']),0, $params['infolen']);
			}
			
			if (empty($item['company_picture'])) {
				$item['logo'] = URL.pb_get_attachmenturl('', '', 'small');
			}else{
				$item['logo'] = URL.pb_get_attachmenturl($item['company_picture'], '', 'smaller');
			}
			
			$item['thumb'] = $item['logo'];
			$item['href'] = $item['url'];
			
			$result[$key] = $item;
		}		
		
		return $result;
	}
}
?>