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
	
	function getList($school_id = null, $member_id = null, $not_member = false)
	{
		uses("studygroupmember");
		$studygroupmember = new Studygroupmembers();
		
		$conditions = array();
		if($school_id) $conditions[] = "sc.id = ".$school_id;
		if($member_id)
		{
			if($not_member)
			{
				//$conditions[] = "((sgm.member_id IS NULL) OR (sgm.member_id != ".$member_id."))";
				$conditions[] = "Studygroup.id NOT IN (SELECT studygroup_id FROM {$this->table_prefix}studygroupmembers WHERE member_id = ".$member_id.")";
			}
			else
			{
				$conditions[] = "sgm.member_id = ".$member_id;
			}
		}
		
		$joins = array("LEFT JOIN {$this->table_prefix}schools AS sc ON sc.id = Studygroup.school_id");
		$joins[] = "LEFT JOIN {$this->table_prefix}subjects AS su ON su.id = Studygroup.subject_id";
		$joins[] = "LEFT JOIN {$this->table_prefix}studygroupmembers AS sgm ON sgm.studygroup_id = Studygroup.id";
		
		$groups = $this->findAll("Studygroup.*, sc.name AS school_name, su.name AS subject_name", $joins, $conditions, null, null, null, null, "Studygroup.id");
		foreach($groups as $key => $item)
		{
			$groups[$key]["member_count"] = $studygroupmember->findCount(null, array("studygroup_id = ".$item["id"]));
			
			$pb_userinfo = pb_get_member_info();
			$groups[$key]["new_count"] = $this->getCountNew($item["id"], $pb_userinfo["pb_userid"]);
		}
		
		return $groups;
	}
	
	function getInfoById($id)
	{
		uses("studygroupmember");
		$studygroupmember = new Studygroupmembers();
		
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
		}
		//var_dump($groups);
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
		//var_dump($count);
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
}
?>