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
	
	function getStudygroupsBySchool($school_id)
	{
		$groups = $this->findAll("Studygroup.*, sc.name AS school_name, su.name AS subject_name", array("LEFT JOIN {$this->table_prefix}schools AS sc ON sc.id = Studygroup.school_id", "LEFT JOIN {$this->table_prefix}subjects AS su ON su.id = Studygroup.subject_id"), array("Studygroup.school_id = ".$school_id));
		
		return $groups;
	}
}
?>