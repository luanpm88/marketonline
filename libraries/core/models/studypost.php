<?php
class Studyposts extends PbModel {
 	var $name = "Studypost";
 	function Studyposts()
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
	
	function viewed($post_id, $member_id)
	{
		uses("studypostview");
		$studypostview = new Studypostviews();
			
		$conditions = array();
		
		$conditions[] = "studypost_id=".intval($post_id);
		$conditions[] = "member_id=".intval($member_id);
		
		$exsit = $studypostview->fields("id", $conditions);

		if(empty($exsit))
		{
			$val["studypost_id"] = intval($post_id);
			$val["member_id"] = intval($member_id);
			$val["created"] = date("Y-m-d H:i:s");
			
			
			$studypostview->save($val);
		}
	}
}
?>