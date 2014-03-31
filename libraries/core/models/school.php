<?php
class Schools extends PbModel {
 	var $name = "School";
 	var $amount;
 	
 	function Schools()
 	{
		parent::__construct();
 	}
	
	function disSubOptions($parent_id, $level, $ids = null)
 	{
 		$data = $this->findAll("*", null, null, "name ASC");
 		if (!empty($data)) {
 			foreach ($data as $key=>$val) {
				$selected = '';
				if(strpos("[0]".$ids, "[".$val["id"]."]"))
				{
					$selected = ' selected="selected"';
				}
				
				
				
 				$this->typeOptions.='<option value="'.$val['id'].'" '.$selected.'>';
 				$this->typeOptions.=str_repeat('&nbsp;&nbsp;', $level) . $val['name'];
 				$this->typeOptions.='</option>';
 								
				
				
				//$this->disSubOptions($val['id'], $level+1);
 			}
 		}
 	} 	
 	function getTypeOptions($ids = null)
 	{
 		$this->typeOptions = '';
 		$this->disSubOptions(0, 0, $ids);
 		return $this->typeOptions;
 	}
	
	function getByName($name)
	{
		$childzs = $this->findAll("id, name", null, "name LIKE '%".trim($name)."%'");
		//echo "SELECT id,name FROM ".$this->table_prefix."jobindusts WHERE name LIKE '%".trim($name)."%'";
		//var_dump($childzs);
		if(!empty($childs))
		{
			return $childs[0];
		}
		return 0;
	}
	
	function getListOptions()
	{
		$data = $this->findAll("id,name", null, null, "name ASC");
		
		return $data;
	}
	
	function getInfoById($id)
	{
		uses("memberfield", "schoolimage", "schoolimagecomment");
		$memberfield = new Memberfields();
		$schoolimage = new Schoolimages();
		$schoolimagecomment = new Schoolimagecomments();
		
		$school = $this->read("*", intval($id));
		
		$school["member_count"] = $memberfield->findCount(null, array("school_id = ".$id), "member_id");
		$school["logo_origin"] = $school["logo"];
		$school["logo"] = pb_get_attachmenturl($school['logo'], '', 'small');
		
		//get banners
		$banners = $schoolimage->findAll("*", null, array("school_id=".$id), "created DESC");
		//var_dump($banners);
		
		if(count($banners))
		{
			foreach($banners as $key => $item)
			{
				$banners[$key]["image"] = pb_get_attachmenturl($item['name'], '', '');
				$banners[$key]["banner"] = pb_get_attachmenturl($item['name'], '', 'banner');
				$banners[$key]["description_raw"] = $item["description"];
				$banners[$key]["description"] = str_replace("\n","<br />",$item["description"]);
				$banners[$key]["comments"]["count"] = $schoolimagecomment->findCount(null, array("schoolimage_id=".$item["id"]));
			}
			$school["banners"] = $banners;
		}
		else
		{
			$school["no_banner"] = pb_get_attachmenturl('', '', 'banner');;
		}
		
		
		$school["banner_origin"] = $school["banner"];
		$school["banner"] = pb_get_attachmenturl($school['banner'], '', 'banner');
		
		
		
		return $school;
	}
	
	function getList($conditions = null)
	{
		uses("memberfield");
		$memberfield = new Memberfields();
		
		$school_list = $this->findAll("*", null, $conditions, "created DESC");
		foreach($school_list as $key => $item)
		{
			$school_list[$key]["logo"] = pb_get_attachmenturl($item['logo'], '', 'small');
			$school_list[$key]["member_count"] = $memberfield->findCount(null, array("school_id = ".$item["id"]), "member_id");
		}
		
		return $school_list;
	}
	
	function getOptions($id = null)
 	{
		$school_list = $this->findAll("*", null, null, "name");
		
		$typeOptions = "";
		foreach($school_list as $key => $item)
		{
			if($id == $item["id"])
			{
				$selected = ' selected="selected"';
			}
			
			$typeOptions.='<option value="'.$item["id"].'" '.$selected.'>';
		 	$typeOptions.=$item["name"];
		 	$typeOptions.='</option>' . "\n";
		}
		return $typeOptions;
 	}
}
?>