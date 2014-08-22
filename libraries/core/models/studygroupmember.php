<?php
class Studygroupmembers extends PbModel {
 	var $name = "Studygroupmember";
 	function Studygroupmembers()
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
	
	function addMember($group_ids, $member_id) {
		
		$allGroups = $this->findAll("*", null, array("member_id = '".$member_id."'"));
		
		$dels = array();
		foreach($allGroups as $group) {
			if(!in_array($group["studygroup_id"], $group_ids)){
				$dels[] = $group["id"];
			}
		}
		//var_dump($dels);
		$this->del($dels);
		
		foreach ($group_ids as $group_id) {
			$exsit = $this->fields("*", array("member_id = '".$member_id."'", "studygroup_id = '".$group_id."'"));
			if(empty($exsit)) {
				$val["member_id"] = $member_id;
				$val["studygroup_id"] = $group_id;
				$val["created"] = strtotime(date('Y-m-d H:i:s'));
	
				$this->save($val);
			}
		}
	}
	
	function getSubjectIdsByMember($member_id)
	{
		$groups = $this->findAll("Studygroupmember.*, sg.subject_id", array("LEFT JOIN {$this->table_prefix}studygroups sg ON sg.id = Studygroupmember.studygroup_id"), array("Studygroupmember.member_id = '".$member_id."'"));
		
		$result = array();
		foreach($groups as $group) {
			$result[] = $group["subject_id"];
		}
		
		return $result;
	}
	
	function belongToGroup($group_id, $member_id, $status = 0)
	{
		$conditions[] = "studygroup_id=".intval($group_id);
		$conditions[] = "member_id=".intval($member_id);
		$conditions[] = "status=".$status;
		
		$exsit = $this->fields("id", $conditions);
		
		if(!empty($exsit))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}
?>