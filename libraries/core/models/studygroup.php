<?php
class Studygroups extends PbModel {
 	var $name = "Studygroup";
 	function Studygroups()
 	{
		parent::__construct();
 	}
 	
 	function getServiceEndtime($default_live_time_id)
 	{
 		if (empty($default_live_time_id) || !$default_live_time_id) {
 			return false;
 		}
		switch ($default_live_time_id) {
			case 1:
				$time_add = $this->timestamp+7*86400;
				break;
			case 2:
				$time_add = $this->timestamp+30*86400;
				break;
			case 3:
				$time_add = $this->timestamp+3*30*86400;
				break;
			case 4:
				$time_add = $this->timestamp+6*30*86400;
				break;
			case 5:
				$time_add = $this->timestamp+12*30*86400;
				break;
			case 6:
				$time_add = $this->timestamp+5*12*30*86400;
				break;
			default:
				$time_add = $this->timestamp+12*30*86400;
				break;
		}
		return $time_add;
 	}
	
	function updateGroups($school_id, $subjects, $member_id)
	{
		
		$group_ids = array();
		foreach($subjects as $subject_id) {
			$exsit = $this->fields("*", array("school_id = '".$school_id."'", "subject_id = '".$subject_id."'"));
			if(empty($exsit)) {
				$val["name"] = "";
				$val["school_id"] = $school_id;
				$val["subject_id"] = $subject_id;
				$val["member_id"] = $member_id;
				$val["leader_id"] = $member_id;
				$val["created"] = strtotime(date('Y-m-d H:i:s'));
				$this->save($val);
				
				$insert_key = $this->table_name."_id";
				$group_ids[] = $this->$insert_key;
			}
			else
			{
				$group_ids[] = $exsit["id"];
			}
		}
		return $group_ids;
	}
	
	function getList($school_id = null, $member_id = null, $not_member = false, $conds = array(),$keyword = '')
	{
		uses("studygroupmember","area");
		$area = new Areas();
		$studygroupmember = new Studygroupmembers();
		
		$conditions = $conds;
		if($school_id) $conditions[] = "sc.id = ".$school_id;
		if($member_id)
		{
			if($not_member)
			{
				//$conditions[] = "((sgm.member_id IS NULL) OR (sgm.member_id != ".$member_id."))";
				$conditions[] = "Studygroup.id NOT IN (SELECT studygroup_id FROM {$this->table_prefix}studygroupmembers sgm2 WHERE member_id = ".$member_id." AND sgm2.status=1)";
			}
			else
			{
				$conditions[] = "(sgm.member_id = ".$member_id." AND sgm.status=1)";
			}
		}
		
		//for keyword
		$keyword_str = '';
		$order_by_score = null;
		if($keyword != '')
		{
			$keyword_str = ",MATCH(su.name) AGAINST ('".$keyword."') as score,MATCH(sc.name) AGAINST ('".$keyword."') as score2";
			$conditions[] = "(MATCH(su.name) AGAINST('".$keyword."') OR MATCH(sc.name) AGAINST('".$keyword."') OR sc.name LIKE '%".$keyword."%' OR su.name LIKE '%".$keyword."%')";
			$order_by_score = "score DESC,score2 DESC";
		}
		
		$joins = array("LEFT JOIN {$this->table_prefix}schools AS sc ON sc.id = Studygroup.school_id");
		$joins[] = "LEFT JOIN {$this->table_prefix}subjects AS su ON su.id = Studygroup.subject_id";
		$joins[] = "LEFT JOIN {$this->table_prefix}studygroupmembers AS sgm ON sgm.studygroup_id = Studygroup.id";
		
		$groups = $this->findAll("sgm.status, Studygroup.*, sc.name AS school_name, sc.address AS school_address, sc.area_id AS school_area_id, su.name AS subject_name".$keyword_str, $joins, $conditions, $order_by_score, null, null, null, "Studygroup.id");
		foreach($groups as $key => $item)
		{
			$groups[$key]["member_count"] = $studygroupmember->findCount(null, array("studygroup_id = ".$item["id"]));
			
			$pb_userinfo = pb_get_member_info();
			$groups[$key]["new_count"] = $this->getCountNew($item["id"], $pb_userinfo["pb_userid"]);
			
			$groups[$key]["logo_origin"] = $groups[$key]["logo"];
			$groups[$key]["logo"] = pb_get_attachmenturl($groups[$key]['logo'], '', 'small');
			
			$groups[$key]["address"] = $item["school_address"].", ".$area->getFullName($item["school_area_id"]);
			
			$groups[$key]["created_at"] = date("d-m-Y", $item["created"]);
		}
		
		return $groups;
	}
	
	function getInfoById($id)
	{
		uses("studygroupmember", "studygroupimage", "studygroupimagecomment");
		$studygroupmember = new Studygroupmembers();
		$studygroupimage = new Studygroupimages();
		$studygroupimagecomment = new Studygroupimagecomments();
		
		$conditions = array();
		if($id) $conditions[] = "Studygroup.id = ".intval($id);
		
		$joins = array("RIGHT JOIN {$this->table_prefix}schools AS sc ON sc.id = Studygroup.school_id");
		$joins[] = "RIGHT JOIN {$this->table_prefix}subjects AS su ON su.id = Studygroup.subject_id";
		$joins[] = "RIGHT JOIN {$this->table_prefix}studygroupmembers AS sgm ON sgm.studygroup_id = Studygroup.id";
		
		$groups = $this->findAll("Studygroup.*, sc.name AS school_name, su.name AS subject_name", $joins, $conditions);
		foreach($groups as $key => $item)
		{
			$groups[$key]["member_count"] = $studygroupmember->findCount(null, array("studygroup_id = ".$item["id"]));
			
			$pb_userinfo = pb_get_member_info();
			$groups[$key]["new_count"] = $this->getCountNew($item["id"], $pb_userinfo["pb_userid"]);
			
			$groups[$key]["logo_origin"] = $groups[$key]["logo"];
			$groups[$key]["logo"] = pb_get_attachmenturl($groups[$key]['logo'], '', 'small');
			
			//get banners
			$banners = $studygroupimage->findAll("*", null, array("group_id=".$id), "created DESC");
			
			if(count($banners))
			{
				foreach($banners as $kk => $item)
				{
					$banners[$kk]["image"] = pb_get_attachmenturl($item['name'], '', '');
					$banners[$kk]["banner"] = pb_get_attachmenturl($item['name'], '', 'banner');
					$banners[$kk]["description_raw"] = $item["description"];
					$banners[$kk]["description"] = str_replace("\n","<br />",$item["description"]);
					$banners[$kk]["comments"]["count"] = $studygroupimagecomment->findCount(null, array("studygroupimage_id=".$item["id"]));
				}
				$groups[$key]["banners"] = $banners;
			}
			else
			{
				$groups[$key]["no_banner"] = pb_get_attachmenturl('', '', 'banner');;
			}
			//var_dump($groups[$key]["banners"]);
			
			
			$groups[$key]["banner_origin"] = $groups[$key]["banner"];
			$groups[$key]["banner"] = pb_get_attachmenturl($groups[$key]['banner'], '', 'banner');
			
		}
		return $groups[0];
	}
	
	function getCountNew($group_id, $member_id)
	{		
		uses("studygroupview", "studypost");
		$studygroupview = new Studygroupviews();
		$studypost = new Studyposts();
			
		$conditions = array();
		
		$conditions[] = "Studypost.member_id != ".intval($member_id);
		$conditions[] = "stv.member_id=".intval($member_id);
		$conditions[] = "stv.studygroup_id=".intval($group_id);
		$conditions[] = "stv.created < Studypost.created";
		
		$joins = array("RIGHT JOIN {$this->table_prefix}studygroupviews AS stv ON stv.studygroup_id = Studypost.group_id");
		
		$count = $studypost->findCount($joins, $conditions, "Studypost.id");
		return $count;
	}
	
	function viewed($group_id, $member_id)
	{
		uses("studygroupview");
		$studygroupview = new Studygroupviews();
			
		$conditions = array();
		
		$conditions[] = "studygroup_id=".intval($group_id);
		$conditions[] = "member_id=".intval($member_id);
		
		$exsit = $studygroupview->fields("*", $conditions);
		//var_dump($exsit);
		if(empty($exsit))
		{
			$val["studygroup_id"] = intval($group_id);
			$val["member_id"] = intval($member_id);
			$val["created"] = date("Y-m-d H:i:s");
			
			
			$studygroupview->save($val);
		}
		else
		{
			$studygroupview->saveField("created", date("Y-m-d H:i:s"), intval($exsit["id"]));
		}
	}
	
	function getWaitingList($group_id)
	{
		uses("studygroupmember","member");
		$studygroupmember = new Studygroupmembers();
		$member = new Members();
		
		$conditions = array();		
		$conditions[] = "stgm.studygroup_id=".intval($group_id);
		$conditions[] = "stgm.status=0";
		
		$joins = array("INNER JOIN {$this->table_prefix}studygroupmembers AS stgm ON stgm.member_id = Member.id");
		$members = $member->findAll("*,stgm.studygroup_id", $joins, $conditions);
		//var_dump($members);
		foreach($members as $key => $item)
		{
			$members[$key]["info"] = $member->getInfoById($item["member_id"]);
		}
		
		return $members;
	}
	
	function getByArea($params=array(), $offset=0, $row=3, $num=7) {		
		if($params["area_id"]) {
			//echo $params["area_id"];
			$conditions[] = "(a_parent.id=".intval($params["area_id"])." OR a.id=".intval($params["area_id"]).")";
		}
		if($params["areatype_id"]) {
			$conditions[] = "(a_parent.areatype_id=".intval($params["areatype_id"])." OR a.areatype_id=".intval($params["areatype_id"]).")";
		}
		
		$conditions[] = 'Studygroup.area_show=1';
		
		$joins = array();
		$joins[] = "LEFT JOIN {$this->table_prefix}schools sc ON sc.id=Studygroup.school_id";
		$joins[] = "LEFT JOIN {$this->table_prefix}areas a ON a.id=sc.area_id";
		$joins[] = "LEFT JOIN {$this->table_prefix}areas a_parent ON a_parent.id=a.parent_id";
		$joins[] = "LEFT JOIN {$this->table_prefix}subjects su ON su.id=Studygroup.subject_id";
		
		$count = $row*$num;
		$result = $this->findAll("sc.name as school_name, su.name as subject_name,Studygroup.*", $joins, $conditions, "Studygroup.created DESC", $offset, $count);
		$result = $this->formatItems($result);
		$count = $this->findCount($joins, $conditions, "Studygroup.id");
		//var_dump($count);
		return array("result"=>$result,"count"=>$count);
	}
	
	function formatItems($result) {
		foreach($result as $key => $item) {
			$item["thumb"] = URL.pb_get_attachmenturl($item['logo'], '', 'small');
			$item["title"] = $item["subject_name"]."<br />".$item["school_name"];
			//{the_url module=studypost action=group id=`$group.id` title=`$group.subject_name`}
			$item["href"] = $this->url(array("module"=>"studypost","action"=>"group","id"=>$item["id"],"title"=>$item["title"]));
			$result[$key] = $item;
		}
		return $result;
	}

}
?>