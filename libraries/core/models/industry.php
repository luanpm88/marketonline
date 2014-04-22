<?php
class Industries extends PbModel {
	var $name = "Industry";
	var $info;

 	function Industries()
 	{
		parent::__construct();
 	}
 	
 	function setInfo($id)
 	{
 		$result = $this->dbstuff->GetRow("SELECT * FROM {$this->table_prefix}industries WHERE id='".$id."'");
 		if (!($result) || empty($result)) {
 			return null;
 		}else {
 			$_tmp = unserialize($result['description']);
 			if (!empty($_tmp[$GLOBALS['app_lang']])) {
 				$result['name'] = $_tmp[$GLOBALS['app_lang']];
 			}
 			$this->info = $result;
 			return $result;
 		}
 	}
 	
 	function getInfo()
 	{
 		return $this->info;
 	}

	function getCacheIndustry($module = 0)
	{
		//ECHO "SDFSDF";
		$data = cache_read("industry", null, false);
		return $data;
	}
	
	function getIndustry()
	{
		$_PB_CACHE['industry'] = cache_read("industry");
		return $_PB_CACHE['industry'];
	}
	
	function getSubDatas($id, $extra = false)
	{
		$return = $result = array();
		$row = $this->dbstuff->GetRow("SELECT * FROM {$this->table_prefix}industries WHERE id=".$id);
		if (!empty($row)) {
			$return[$id] = $row['name'];
			$result = $this->dbstuff->GetArray("SELECT t2.id,t2.name FROM {$this->table_prefix}industries t1 LEFT JOIN {$this->table_prefix}industries t2 ON t2.parent_id=t1.id WHERE t1.id='".$row['id']."'");
		}
		if (!empty($result)) {
			foreach ($result as $key=>$val) {
				$return[$val['id']] = $val['name'];
			}
		}
		return $return;
	}
	
	function getByID($id, $extra = false)
	{
		//$return = $result = array();
		$row = $this->dbstuff->GetRow("SELECT * FROM {$this->table_prefix}industries WHERE id=".$id);
		//if (!empty($row)) {
		//	$return[$id] = $row['name'];
		//	$result = $this->dbstuff->GetArray("SELECT t2.id,t2.name FROM {$this->table_prefix}industries t1 LEFT JOIN {$this->table_prefix}industries t2 ON t2.parent_id=t1.id WHERE t1.id='".$row['id']."'");
		//}
		//if (!empty($result)) {
		//	foreach ($result as $key=>$val) {
		//		$return[$val['id']] = $val['name'];
		//	}
		//}
		return $row;
	}
	
	function getMinalId()
	{
		$args = func_get_args();
		if (!empty($args)) {
			foreach ($args as $key=>$val) {
				if($val==0) return intval($args[$key-1]);
			}
		}else {
			return false;
		}
	}	
	
 	function disSubOptions($id, $prefix = "")
 	{
 		$r = array();
 		if (!empty($id)) {
 			$this->dbstuff->setFetchMode(ADODB_FETCH_ASSOC);
 			$sql = "SELECT * FROM ".$this->table_prefix."industries WHERE id=".$id;
 			$result = $this->GetRow($sql);
 			if (!empty($result)) {
	 			if ($result['level']==4) {
	 				$sql = "SELECT t1.id AS ".$prefix."id1, t2.id as ".$prefix."id2, t3.id as ".$prefix."id3, t4.id as ".$prefix."id4 FROM ".$this->table_prefix."industries AS t1 LEFT JOIN ".$this->table_prefix."industries AS t2 ON t2.parent_id = t1.id LEFT JOIN ".$this->table_prefix."industries AS t3 ON t3.parent_id = t2.id LEFT JOIN ".$this->table_prefix."industries AS t4 ON t4.parent_id = t3.id WHERE t4.id = ".$id;
	 				$r = $this->GetRow($sql);
	 			}elseif ($result['level']==3) {
	 				$sql = "SELECT t1.id AS ".$prefix."id1, t2.id as ".$prefix."id2, t3.id as ".$prefix."id3 FROM ".$this->table_prefix."industries AS t1 LEFT JOIN ".$this->table_prefix."industries AS t2 ON t2.parent_id = t1.id LEFT JOIN ".$this->table_prefix."industries AS t3 ON t3.parent_id = t2.id WHERE t3.id = ".$id;
	 				$r = $this->GetRow($sql);
	 			}elseif ($result['level']==2){
	 				$sql = "SELECT t1.id AS ".$prefix."id1, t2.id as ".$prefix."id2 FROM ".$this->table_prefix."industries AS t1 LEFT JOIN ".$this->table_prefix."industries AS t2 ON t2.parent_id = t1.id WHERE t2.id = ".$id;
	 				$r = $this->GetRow($sql);
	 			}else{
	 				$r[$prefix.'id1'] = $id;
	 			}
 			}
 		}
 		return $r;
 	}
 	
 	function disSubNames($id, $sep = "&raquo;", $link = false, $do = null)
 	{
 		$ids = $this->disSubOptions($id);
		//var_dump($ids);
 		$tmp_controller = new PbController();
 		if (is_null($sep)) {
 			$sep = "&raquo;";
 		}
 		$_PB_CACHE['industry'] = cache_read("industry");
 		$datas = $tmp_controller->array_multi2single($_PB_CACHE['industry']);
 		$tmp_ids = $ids;
 		foreach ($ids as $key=>$val) {
 			if($link){
 				$tmp = ltrim($key, "id");
 				switch ($tmp) {
 					case 1:
						$level = 1;
 						$the_id = implode(",", $ids);
 						break;
 					case 2:
						$level = 2;
 						unset($tmp_ids["id1"]);
 						$the_id = implode(",", $tmp_ids);
 						break;
					case 3:
						$level = 3;
 						unset($tmp_ids["id1"]);
 						$the_id = implode(",", $tmp_ids);
 						break;
 					default:
						$level = 4;
 						$the_id = $val;
 						break;
 				}
				$the_id = $val;
 				if (!function_exists("smarty_function_the_url")) {
 					require(PLUGIN_PATH."slug/function.the_url.php");
 				}
 				$r[] = "<a href='index.php?do=product&level=".$level."&industryid=".$the_id."' rel='special_link'>".$datas[$val]."</a>";
 			}else{
 				$r[] = $datas[$val];
 			}
 		}
 		unset($_PB_CACHE);
 		return implode($sep, $r);
 	}
	
	function disSubNames_($id, $sep = "&raquo;", $link = false, $do = null)
 	{
 		$ids = $this->disSubOptions($id);
 		$tmp_controller = new PbController();
 		if (is_null($sep)) {
 			$sep = "&raquo;";
 		}
 		$_PB_CACHE['industry'] = cache_read("industry");
 		$datas = $tmp_controller->array_multi2single($_PB_CACHE['industry']);
 		$tmp_ids = $ids;
 		foreach ($ids as $key=>$val) {
 			if($link){
 				$tmp = ltrim($key, "id");
 				switch ($tmp) {
 					case 1:
 						$the_id = implode(",", $ids);
 						break;
 					case 2:
 						unset($tmp_ids["id1"]);
 						$the_id = implode(",", $tmp_ids);
 						break;
 					default:
 						$the_id = $val;
 						break;
 				}
 				if (!function_exists("smarty_function_the_url")) {
 					require(PLUGIN_PATH."slug/function.the_url.php");
 				}
 				$r[] = "<a href='".smarty_function_the_url(array("module"=>"search", "action"=>"lists", "do"=>$do, "industryid"=>$the_id))."' rel='special_link'>".$datas[$val]."</a>";
 			}else{
 				$r[] = $datas[$val];
 			}
 		}
 		unset($_PB_CACHE);
 		return implode($sep, $r);
 	}
	
 	function getConditionIds($id)
 	{
 		$r = null;
 		if (!empty($id)) {
 			$this->dbstuff->setFetchMode(ADODB_FETCH_ASSOC);
 			$sql = "SELECT * FROM ".$this->table_prefix."industries WHERE id=".$id;
 			$result = $this->GetRow($sql);
 			if (!empty($result)) {
	 			if ($result['level']==3) {
	 				$r = $id;
	 			}elseif ($result['level']==2){
	 				$sql = "SELECT t1.id AS id1, t2.id as id2, t3.id as id3 FROM ".$this->table_prefix."industries AS t1 LEFT JOIN ".$this->table_prefix."industries AS t2 ON t2.parent_id = t1.id LEFT JOIN ".$this->table_prefix."industries AS t3 ON t3.parent_id = t2.id WHERE t2.id = ".$id;
	 				$rr = $this->GetArray($sql);
	 				foreach ($rr as $val) {
	 					$tmp[] = $val['id1'];
	 					$tmp[] = $val['id2'];
	 					$tmp[] = $val['id3'];
	 				}
	 				unset($tmp[0]);
	 				$r = array_unique($tmp);
	 			}else{
	 				$sql = "SELECT t1.id AS id1, t2.id as id2, t3.id as id3 FROM ".$this->table_prefix."industries AS t1 LEFT JOIN ".$this->table_prefix."industries AS t2 ON t2.parent_id = t1.id LEFT JOIN ".$this->table_prefix."industries AS t3 ON t3.parent_id = t2.id WHERE t1.id = ".$id;
	 				$rr = $this->GetArray($sql);
	 				foreach ($rr as $val) {
	 					$tmp[] = $val['id1'];
	 					$tmp[] = $val['id2'];
	 					$tmp[] = $val['id3'];
	 				}
	 				$r = array_unique($tmp);
	 			}
 			}
 		}
 		return $r;
 	}
 	
 	function getTypeOptions()
 	{
 		$_PB_CACHE['industry'] = cache_read("industry");
 		$this->typeOptions = '';
 		$this->dbstuff->setFetchMode(ADODB_FETCH_ASSOC);
 		$this->params['data'] = $this->dbstuff->GetArray("SELECT id,parent_id,name,level FROM ".$this->table_prefix."industries ORDER BY level ASC,display_order ASC");
 		$tmp_arr = array();
 		foreach ($this->params['data'] as $key=>$val) {
 			$tmp_arr[$val['id']] = $this->params['data'][$key];
 		}
 		unset($key, $val);
 		foreach ($_PB_CACHE['industry'][1] as $key=>$val) {
 			$this->typeOptions.='<option value="'.$key.'" class="option-level0">';
 			$this->typeOptions.=str_repeat('&nbsp;&nbsp;', 0) . $val;
 			$this->typeOptions.='</option>' . "\n";
 			foreach ($_PB_CACHE['industry'][2] as $key2=>$val2) {
 				if ($tmp_arr[$key2]['parent_id'] == $key) {
		 			$this->typeOptions.='<option value="'.$key2.'" class="option-level1">';
		 			$this->typeOptions.=str_repeat('&nbsp;&nbsp;', 1) . $val2;
		 			$this->typeOptions.='</option>' . "\n";
		 			foreach ($_PB_CACHE['industry'][3] as $key3=>$val3) {
		 				if ($tmp_arr[$key3]['parent_id'] == $key2) {
				 			$this->typeOptions.='<option value="'.$key3.'" class="option-level2">';
				 			$this->typeOptions.=str_repeat('&nbsp;&nbsp;', 2) . $val3;
				 			$this->typeOptions.='</option>' . "\n";
		 				}
		 			}
 				}
 			}
 		}
 		return $this->typeOptions;
 	}
 	
 	function updateCache()
 	{
 		return true;
 	}
	
	function countProduct_3($id, $member_id = null)
	{
		uses("industry");
		$industry = new Industries();
		
		$_GET['industryid'] = $id;
		if (isset($_GET['industryid'])) {
			//Get industry level 1
			$industries = $industry->getCacheIndustry();
			$area_a = array();
			$area_a[] = $_GET['industryid'];
			foreach($industries as $key0 => $level0)
			{
				if($level0["id"] == $_GET['industryid'])
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
					break;
				}
				else
				{
					foreach($level0['sub'] as $key1 => $level1)
					{
						if($level1["id"] == $_GET['industryid'])
						{
							foreach($level1['sub'] as $key2 => $level2)
							{
								$area_a[] = $level2["id"];
								foreach($level2['sub'] as $key3 => $level3)
								{
									$area_a[] = $level3["id"];									
								}
							}
							break;
						}
						else
						{
							foreach($level1['sub'] as $key2 => $level2)
							{
								if($level2["id"] == $_GET['industryid'])
								{
									$area_a[] = $level2["id"];
									//echo count($level2['sub']);
									foreach($level2['sub'] as $key3 => $level3)
									{
										//echo $level3["id"];
										$area_a[] = $level3["id"];										
									}
									//var_dump($area_a);
									break;
								}
								else
								{
									foreach($level2['sub'] as $key3 => $level3)
									{
										
										if($level3["id"] == $_GET['industryid'])
										{
											$area_a[] = $level3["id"];											
											break;
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
		//if($member_id) 
		return $this->getCountProduct($area_a, $member_id);
	}
	
	function countProduct($id, $member_id = null)
	{
		uses("product");
		$product = new Product();
		
		//$_GET['industryid'] = $id;
		//if (isset($_GET['industryid'])) {
		//	//Get industry level 1
		//	$industries = $industry->getCacheIndustry();
		//	$area_a = array();
		//	$area_a[] = $_GET['industryid'];
		//	foreach($industries as $key0 => $level0)
		//	{
		//		if($level0["id"] == $_GET['industryid'])
		//		{
		//			foreach($level0['sub'] as $key1 => $level1)
		//			{
		//				$area_a[] = $level1["id"];
		//				foreach($level1['sub'] as $key2 => $level2)
		//				{
		//					$area_a[] = $level2["id"];
		//					foreach($level2['sub'] as $key3 => $level3)
		//					{
		//						$area_a[] = $level3["id"];								
		//					}
		//				}
		//			}
		//			break;
		//		}
		//		else
		//		{
		//			foreach($level0['sub'] as $key1 => $level1)
		//			{
		//				if($level1["id"] == $_GET['industryid'])
		//				{
		//					foreach($level1['sub'] as $key2 => $level2)
		//					{
		//						$area_a[] = $level2["id"];
		//						foreach($level2['sub'] as $key3 => $level3)
		//						{
		//							$area_a[] = $level3["id"];									
		//						}
		//					}
		//					break;
		//				}
		//				else
		//				{
		//					foreach($level1['sub'] as $key2 => $level2)
		//					{
		//						if($level2["id"] == $_GET['industryid'])
		//						{
		//							$area_a[] = $level2["id"];
		//							//echo count($level2['sub']);
		//							foreach($level2['sub'] as $key3 => $level3)
		//							{
		//								//echo $level3["id"];
		//								$area_a[] = $level3["id"];										
		//							}
		//							//var_dump($area_a);
		//							break;
		//						}
		//						else
		//						{
		//							foreach($level2['sub'] as $key3 => $level3)
		//							{
		//								
		//								if($level3["id"] == $_GET['industryid'])
		//								{
		//									$area_a[] = $level3["id"];											
		//									break;
		//								}										
		//							}
		//							
		//						}
		//					}
		//				}
		//			}
		//			
		//		}
		//	}
		//	//var_dump($area_a);
		//}
		//if($member_id)
		
		$cats = $this->read('count,children', intval($id));
		//echo $cats;
		//var_dump($cats);
		//return $cats;
		if(!$cats["children"])
		{
			$cats["children"] = $product->updateIndustryChildren($id);
		}
		
		
		$result = $this->getCountProduct($cats["children"], $member_id);
		
		if($cats["count"] != $result) $this->saveField("count", $result, intval($id));
		
		return $result;
	}
	
	function getCountProduct($ids, $member_id = null)
	{
		$member_condition = '';
		if($member_id)
		{
			$member_condition = " AND p.member_id='".$member_id."'";
		}
		$sql = "SELECT COUNT(*) FROM ".$this->table_prefix."products p WHERE p.industry_id IN (".$ids.")".$member_condition;
 		$result = $this->GetRow($sql);
		return $result["COUNT(*)"];
	}
	
	function getCountProduct_3($ids, $member_id = null)
	{
		$member_condition = '';
		if($member_id)
		{
			$member_condition = " AND member_id='".$member_id."'";
		}
		$sql = "SELECT COUNT(*) FROM ".$this->table_prefix."products p LEFT JOIN ".$this->table_prefix."industries i ON p.industry_id = i.id WHERE i.id IN (".implode(',', $ids).")".$member_condition;
 		$result = $this->GetRow($sql);
		return $result["COUNT(*)"];
	}
	
	function getCountProduct_2($ids, $member_id = null)
	{
		$member_condition = '';
		if($member_id)
		{
			$member_condition = " AND member_id='".$member_id."'";
		}
		$sql = "select count(*) from pb_products where industry_id in (
    
select id FROM pb_industries where
parent_id in
    (
SELECT id
FROM pb_industries
WHERE parent_id
IN (

SELECT id
FROM pb_industries
WHERE parent_id =1
OR id =1
)
OR id
IN (

SELECT id
FROM pb_industries
WHERE parent_id =1
OR id =1
)
        )
or
id in
    (
SELECT id
FROM pb_industries
WHERE parent_id
IN (

SELECT id
FROM pb_industries
WHERE parent_id =1
OR id =1
)
OR id
IN (

SELECT id
FROM pb_industries
WHERE parent_id =1
OR id =1
)
        )
    
    
    
    
    )";
 		$result = $this->GetRow($sql);
		return $result["COUNT(*)"];
	}
	
	
	function findRelatedBanners($industry_id)
	{
		uses("ad");
		$ads = new Adses();
		$banners = array();
		while(true)
		{
			$industry = $this->read("id,level,parent_id", $industry_id);
			//var_dump($industry);
			$rows = $ads->findAll("Ads.*, m.space_name", array("LEFT JOIN ".$this->table_prefix."members m ON m.id = Ads.member_id"), array("Ads.industry_id='".$industry_id."'","Ads.state='1'","Ads.status='1'"));
			//var_dump($rows);
			if(count($rows))
			{
				foreach($rows as $item)
				{
					$banners[] = $item;
				}
			}
			
			if($industry["level"] != 1 && isset($industry["parent_id"]))
			{
				$industry_id = $industry["parent_id"];
			}
			else
			{
				break;
			}
		}
		//var_dump($banners);
		
		return $banners;
	}
	
	function getTreeIndustry($industry_id)
	{
		uses("industry");
		$industry = new Industries();
		$names = array();
		while(true)
		{
			$industry = $this->read("id,name,level,parent_id", $industry_id);
			
			if($industry)
			{
				$names[] = $industry["name"];
				$industry_id = $industry["parent_id"];
			}
			else
			{
				break;
			}
		}
		$names_tring = '';
		foreach($names as $name)
		{
			$names_tring = $name."/".$names_tring;
		}
		
		return $names_tring;
	}
	
	function updateProductCount($id)
	{
		uses("industry");
		$industry = new Industries();
		
				//update product count
				$in1 = $industry->read("*", intval($id));
				if($in1)
				{
					$industry->countProduct($in1["id"]);					
					if($in1["parent_id"])
					{
						$in2 = $industry->read("*", intval($in1["parent_id"]));
						if($in2)
						{
							$industry->countProduct($in2["id"]);
							if($in2["parent_id"])
							{
								$in3 = $industry->read("*", intval($in2["parent_id"]));
								if($in3)
								{
									$industry->countProduct($in3["id"]);
									if($in3["parent_id"])
									{
										$in4 = $industry->read("*", intval($in3["parent_id"]));
										if($in4)
										{
											$industry->countProduct($in4["id"]);
										}
									}
								}
							}
						}
					}
				}
	}
	
	function getCount($id)
	{
		$ii = $this->field("children", "id=".$id);
		$cats = $this->getCountProduct($ii);
		//$cats = $this->field('count', array("id=".$id));
		return $cats;

	}
}
?>