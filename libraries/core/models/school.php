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
		uses("memberfield", "schoolimage", "schoolimagecomment","area");
		$memberfield = new Memberfields();
		$schoolimage = new Schoolimages();
		$schoolimagecomment = new Schoolimagecomments();
		$area = new Areas();
		
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
		//$school["address"] = pb_get_attachmenturl($school['banner'], '', 'banner');
		$school["address"] = $school["address"].", ".$area->getFullName($school["area_id"]);
		$school["area"] = $area->getFullName($school["area_id"]);
		//var_dump($school["area_id"]);
		
		
		return $school;
	}
	
	function getList($conditions = null, $firstcount = null, $displaypg = null, $keyword = "")
	{
		uses("memberfield","area");
		$memberfield = new Memberfields();
		$area = new Areas();
		
		//for keyword
		$keyword_str = '';
		$order_by_score = null;
		if($keyword != '')
		{
			$keyword_str = ",MATCH(School.name) AGAINST ('".$keyword."') as score";
			$conditions[] = "(MATCH(School.name) AGAINST('".$keyword."') OR School.name LIKE '%".$keyword."%')";
			$order_by_score = "score DESC,";
		}
		
		$school_list = $this->findAll("*".$keyword_str, null, $conditions, $order_by_score."created DESC",$firstcount,$displaypg);
		foreach($school_list as $key => $item)
		{
			$school_list[$key]["logo"] = pb_get_attachmenturl($item['logo'], '', 'small');
			$school_list[$key]["member_count"] = $memberfield->findCount(null, array("school_id = ".$item["id"]), "member_id");
			$school_list[$key]["address"] = $item["address"].", ".$area->getFullName($item["area_id"]);
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
	
	function getMemberIds($school_id)
	{
		$sql = "SELECT m.id FROM {$this->table_prefix}members m LEFT JOIN {$this->table_prefix}memberfields mf ON mf.member_id=m.id LEFT JOIN {$this->table_prefix}schools sc ON mf.school_id=sc.id WHERE mf.school_id='{$school_id}'";
 		$result = $this->dbstuff->GetArray($sql);
		//var_dump($sql);
		$ids = array("-1");
		foreach($result as $row)
		{
			$ids[] = $row["id"];
		}
		return $ids;
	}
	
	function getByArea($params=array(), $offset=0, $row=3, $num=7) {		
		if($params["area_id"]) {
			//echo $params["area_id"];
			$conditions[] = "(a_parent.id=".intval($params["area_id"])." OR a.id=".intval($params["area_id"]).")";
		}
		if($params["areatype_id"]) {
			$conditions[] = "(a_parent.areatype_id=".intval($params["areatype_id"])." OR a.areatype_id=".intval($params["areatype_id"]).")";
		}
		
		$conditions[] = 'School.area_show=1';
		
		$joins = array();
		$joins[] = "LEFT JOIN {$this->table_prefix}areas a ON a.id=School.area_id";
		$joins[] = "LEFT JOIN {$this->table_prefix}areas a_parent ON a_parent.id=a.parent_id";
		$joins[] = "LEFT JOIN {$this->table_prefix}members AS m ON m.id = School.member_id";
		
		$count = $row*$num;
		$result = $this->findAll("School.*", $joins, $conditions, "School.created DESC", $offset, $count);
		$result = $this->formatItems($result);
		$count = $this->findCount($joins, $conditions, "School.id");
		//var_dump($result);
		
		return array("result"=>$result,"count"=>$count);
	}
	
	function formatItems($result) {
		foreach($result as $key => $item) {
			$item["thumb"] = pb_get_attachmenturl($item['logo'], '', 'small');
			$item["title"] = $item["name"];
			$item["href"] = $this->url(array("module"=>"studypost","action"=>"school","id"=>$item["id"],"title"=>$item["name"]));
			$result[$key] = $item;
		}
		return $result;
	}
	
	function getStudentByArea($params=array(), $offset=0, $row=3, $num=7) {
		uses("member");
		$memberdb = new Members();
		
		if($params["area_id"]) {
			$conditions[] = "(a_parent.id=".intval($params["area_id"])." OR a.id=".intval($params["area_id"]).")";
		}
		if($params["areatype_id"]) {
			$conditions[] = "(a_parent.areatype_id=".intval($params["areatype_id"])." OR a.areatype_id=".intval($params["areatype_id"]).")";
		}		
		
		$conditions[] = "mf.school_id!=0";
		$conditions[] = 'Member.area_show=1';
		$joins = array();		
		$joins[] = "LEFT JOIN {$this->table_prefix}memberfields AS mf ON Member.id = mf.member_id";
		$joins[] = "LEFT JOIN {$this->table_prefix}schools AS sc ON sc.id = mf.school_id";
		$joins[] = "LEFT JOIN {$this->table_prefix}areas a ON a.id=sc.area_id";
		$joins[] = "LEFT JOIN {$this->table_prefix}areas a_parent ON a_parent.id=a.parent_id";
		
		$count = $row*$num;
		$result = $memberdb->findAll("mf.last_name,mf.first_name,Member.*", $joins, $conditions, "Member.created DESC", $offset, $count);
		$result = $this->formatStudentItems($result);
		$count = $memberdb->findCount($joins, $conditions, "Member.id");
		
		return array("result"=>$result,"count"=>$count);
	}
	
	function formatStudentItems($result) {
		foreach($result as $key => $item) {
			$item["thumb"] = URL.pb_get_attachmenturl($item['photo'], '', 'small');
			$item["title"] = $item["first_name"]." ".$item["last_name"];
			//{the_url module=studypost action=memberpage id=`$item.id` title=`$item.fullname`}
			$item["href"] = $this->url(array("module"=>"studypost","action"=>"memberpage","id"=>$item["id"],"title"=>$item["title"]));
			$result[$key] = $item;
		}
		return $result;
	}
}
?>