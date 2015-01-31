<?php
class Producttypes extends PbModel {
 	var $name = "Producttype";

 	function Producttypes()
 	{
 		parent::__construct();
 	}
	
	function getCustomIndustriesByParent($id, $member_id)
	{
		if($id != 0)
		{
			$sql = "SELECT t.name, t.id FROM {$this->table_prefix}producttypes t WHERE t.member_id='{$member_id}' AND t.parent_industry_id='".$id."' {$condition} ORDER BY t.name";		
			return $this->dbstuff->GetArray($sql);
		}
	}
	function getCustomIndustriesByCustomParent($id, $member_id)
	{
		if($id != 0)
		{
			$sql = "SELECT t.name, t.id FROM {$this->table_prefix}producttypes t WHERE t.member_id='{$member_id}' AND t.custom_parent_industry_id='".$id."' {$condition} ORDER BY t.name";		
			return $this->dbstuff->GetArray($sql);
		}
	}
	function getCustomIndustriesByCurrent($id, $member_id)
	{
		if($id != 0)
		{
			$sql = "SELECT t.* FROM {$this->table_prefix}producttypes t WHERE t.member_id='{$member_id}' AND t.id='".$id."' ORDER BY t.name";		
			$current = $this->dbstuff->GetRow($sql);
			
			$sql = "SELECT t.name, t.id FROM {$this->table_prefix}producttypes t WHERE t.member_id='{$member_id}' AND t.custom_parent_industry_id='".$current["id"]."' ORDER BY t.name";		
			$list[$current["level"]+1]["children"] = $this->dbstuff->GetArray($sql);
			//$list[$current["level"]+1]["active"] = $current["id"];
			
			if(!empty($current) && $current["custom_parent_industry_id"] != 0)
			{
				$sql = "SELECT t.name, t.id FROM {$this->table_prefix}producttypes t WHERE t.member_id='{$member_id}' AND t.custom_parent_industry_id='".$current["custom_parent_industry_id"]."' ORDER BY t.name";		
				$list[$current["level"]]["children"] = $this->dbstuff->GetArray($sql);
				$list[$current["level"]]["active"] = $current["id"];
				
				
				
				$sql = "SELECT t.* FROM {$this->table_prefix}producttypes t WHERE t.member_id='{$member_id}' AND t.id='".$current["custom_parent_industry_id"]."' ORDER BY t.name";		
				$current = $this->dbstuff->GetRow($sql);
				
				if(!empty($current) && $current["custom_parent_industry_id"] != 0)
				{
					$sql = "SELECT t.name, t.id FROM {$this->table_prefix}producttypes t WHERE t.member_id='{$member_id}' AND t.custom_parent_industry_id='".$current["custom_parent_industry_id"]."' ORDER BY t.name";		
					$list[$current["level"]]["children"] = $this->dbstuff->GetArray($sql);
					$list[$current["level"]]["active"] = $current["id"];
					
					
					$sql = "SELECT t.* FROM {$this->table_prefix}producttypes t WHERE t.member_id='{$member_id}' AND t.id='".$current["custom_parent_industry_id"]."' ORDER BY t.name";		
					$current = $this->dbstuff->GetRow($sql);
					
					if(!empty($current) && $current["custom_parent_industry_id"] != 0)
					{
						$sql = "SELECT t.name, t.id FROM {$this->table_prefix}producttypes t WHERE t.member_id='{$member_id}' AND t.custom_parent_industry_id='".$current["custom_parent_industry_id"]."' ORDER BY t.name";		
						$list[$current["level"]]["children"] = $this->dbstuff->GetArray($sql);
						$list[$current["level"]]["active"] = $current["id"];
						
						$sql = "SELECT t.* FROM {$this->table_prefix}producttypes t WHERE t.member_id='{$member_id}' AND t.id='".$current["custom_parent_industry_id"]."' ORDER BY t.name";		
						$current = $this->dbstuff->GetRow($sql);
						
						if(!empty($current) && $current["custom_parent_industry_id"] != 0)
						{
							$sql = "SELECT t.name, t.id FROM {$this->table_prefix}producttypes t WHERE t.member_id='{$member_id}' AND t.custom_parent_industry_id='".$current["custom_parent_industry_id"]."' ORDER BY t.name";		
							$list[$current["level"]]["children"] = $this->dbstuff->GetArray($sql);
							$list[$current["level"]]["active"] = $current["id"];
						}
					}
				}
			}			
			if(!empty($current) && $current["parent_industry_id"] != 0)
			{
				$sql = "SELECT t.name, t.id FROM {$this->table_prefix}producttypes t WHERE t.member_id='{$member_id}' AND t.parent_industry_id='".$current["parent_industry_id"]."' ORDER BY t.name";		
				$list[$current["level"]]["children"] = $this->dbstuff->GetArray($sql);
				$list[$current["level"]]["active"] = $current["id"];
			}
			return $list;
		}
	}
	
	function findTree($field, $conditions)
	{
		if(!empty($conditions))
		{
			if (is_array($conditions) && !empty($conditions)) {
				$conditions = implode(" AND ", $conditions);
			}
		}
		
		
		
		$sql = "SELECT t.* FROM {$this->table_prefix}producttypes t WHERE t.level='1' AND ".$conditions." ORDER BY t.name";
		$list = $this->dbstuff->GetArray($sql);		
		$list = $this->findChildren($list, $conditions);
		
		
		
		$sql = "SELECT t.* FROM {$this->table_prefix}producttypes t WHERE t.parent_industry_id!='0' AND level!='1' AND ".$conditions." ORDER BY t.name";
		$list_links = $this->dbstuff->GetArray($sql);
		$list_links = $this->findChildren($list_links, $conditions);
		//var_dump($list_links);

		
		
		
		
		
		//search for custom cats
		$list_industry = $this->findTreeIndustry($field, $conditions);		
		foreach($list_links as $item)
		{
				$sql = "SELECT i.id, i.name, i.level FROM {$this->table_prefix}industries i WHERE i.children LIKE '%,".$item["parent_industry_id"].",%' OR  i.children LIKE '%,".$item["parent_industry_id"]."' OR i.children LIKE '".$item["parent_industry_id"].",%' ORDER BY i.level";
				$temps = $this->dbstuff->GetArray($sql);
				foreach($temps as $key => $kk)
				{
					if($kk["level"] == 1 && $kk["id"] == $item["parent_industry_id"])
					{
						if(isset($list_industry[$kk["id"]])) $list_industry[$kk["id"]]["children"][] = $item;
					}
					elseif($kk["level"] == 2 && $kk["id"] == $item["parent_industry_id"])
					{
						if(isset($list_industry[$temps[$key-1]["id"]]["children"][$kk["id"]])) $list_industry[$temps[$key-1]["id"]]["children"][$kk["id"]]["children"][] = $item;
					}
					elseif($kk["level"] == 3 && $kk["id"] == $item["parent_industry_id"])
					{						
						if(isset($list_industry[$temps[$key-2]["id"]]["children"][$temps[$key-1]["id"]]["children"][$kk["id"]])) $list_industry[$temps[$key-2]["id"]]["children"][$temps[$key-1]["id"]]["children"][$kk["id"]]["children"][] = $item;
					}
					
				}
		}
		
		
		//var_dump($list_industry);
		//var_dump($list);
		$return_array = array();
		foreach($list as $key2 => $item2)
		{
			$item2["countChildren"] = count($item2["children"]);
			$return_array[] = $item2;
			foreach($item2["children"] as $key3 => $item3)
			{
				$item3["countChildren"] = count($item3["children"]);
				$return_array[] = $item3;
				foreach($item3["children"] as $key4 => $item4)
				{
					$item4["countChildren"] = count($item4["children"]);
					$return_array[] = $item4;
					foreach($item4["children"] as $key5 => $item5)
					{
						$return_array[] = $item5;
					}
				}
			}
		}
		
		foreach($list_industry as $key2 => $item2)
		{
			$item2["countChildren"] = count($item2["children"]);
			$return_array[] = $item2;
			foreach($item2["children"] as $key3 => $item3)
			{
				$item3["countChildren"] = count($item3["children"]);
				$return_array[] = $item3;
				foreach($item3["children"] as $key4 => $item4)
				{
					$item4["countChildren"] = count($item4["children"]);
					$return_array[] = $item4;					
					foreach($item4["children"] as $key5 => $item5)
					{
						$return_array[] = $item5;
					}
				}
			}
		}
		
		return $return_array;
	}
	
	function findChildren($list, $conditions)
	{
		foreach($list as $key2 => $item2)
		{
			$sql = "SELECT t.* FROM {$this->table_prefix}producttypes t WHERE t.custom_parent_industry_id='".$item2["id"]."' AND ".$conditions." ORDER BY t.name";
			$list[$key2]["children"] = $this->dbstuff->GetArray($sql);
			foreach($list[$key2]["children"] as $key3 => $item3)
			{
				$sql = "SELECT t.* FROM {$this->table_prefix}producttypes t WHERE t.custom_parent_industry_id='".$item3["id"]."' AND ".$conditions." ORDER BY t.name";
				$list[$key2]["children"][$key3]["children"] = $this->dbstuff->GetArray($sql);
				
				foreach($list[$key2]["children"][$key3]["children"] as $key4 => $item4)
				{
					$sql = "SELECT t.* FROM {$this->table_prefix}producttypes t WHERE t.custom_parent_industry_id='".$item4["id"]."' AND ".$conditions." ORDER BY t.name";
					$list[$key2]["children"][$key3]["children"][$key4]["children"] = $this->dbstuff->GetArray($sql);					
				}
			}
		}
		return $list;
	}
	
	function findTreeIndustry($field, $conditions)
	{
		
		if(!empty($conditions))
		{
			if (is_array($conditions) && !empty($conditions)) {
				
				$conditions = implode(" AND ", $conditions);
			}
		}
		
		$list = array();
		
		$sql = "SELECT p.industry_id, i.level, i.name as industry_name FROM {$this->table_prefix}products p LEFT JOIN {$this->table_prefix}industries i ON i.id = p.industry_id WHERE ".$conditions." GROUP BY p.industry_id";
		
		$ids = $this->dbstuff->GetArray($sql);
		if(count($ids))
		{
			foreach($ids as $item)
			{
				
				$sql = "SELECT i.id, i.name, i.level FROM {$this->table_prefix}industries i WHERE i.id = ".$item["industry_id"]." OR i.children LIKE '%,".$item["industry_id"].",%' OR  i.children LIKE '%,".$item["industry_id"]."' OR i.children LIKE '".$item["industry_id"].",%' ORDER BY i.level";
				$temps = $this->dbstuff->GetArray($sql);
								
				foreach($temps as $key => $kk)
				{
					if($kk["level"] == 1)
					{
						if(!isset($list[$kk["id"]])) $list[$kk["id"]] = $kk;
					}
					elseif($kk["level"] == 2)
					{
						if(!isset($list[$temps[$key-1]["id"]]["children"][$kk["id"]])) $list[$temps[$key-1]["id"]]["children"][$kk["id"]] = $kk;
					}
					elseif($kk["level"] == 3)
					{
						if(!isset($list[$temps[$key-2]["id"]]["children"][$temps[$key-1]["id"]]["children"][$kk["id"]])) $list[$temps[$key-2]["id"]]["children"][$temps[$key-1]["id"]]["children"][$kk["id"]] = $kk;
					}
					elseif($kk["level"] == 4)
					{
						if(!isset($list[$temps[$key-3]["id"]]["children"][$temps[$key-2]["id"]]["children"][$temps[$key-1]["id"]]["children"][$kk["id"]])) $list[$temps[$key-3]["id"]]["children"][$temps[$key-2]["id"]]["children"][$temps[$key-1]["id"]]["children"][$kk["id"]] = $kk;
					}
					
				}
			}
		}
		//var_dump($list);
		
		return $list;
		
		//$sql = "SELECT i.id, i.name FROM {$this->table_prefix}industries i WHERE i.level = 1 AND i.id IN (".$ids_string.")";
		////echo $sql;
		//var_dump($this->dbstuff->GetArray($sql));
	}
}
?>