<?php
class Studypostcomments extends PbModel {
 	var $name = "Studypostcomment";
 	function Studypostcomments()
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
	
	function loadComments($studypost_id, $count = "")
	{
		uses("member");
		$member = new Members();
		
		if($count != "")
		{
			$limit = 0;
			$nums = $count+10;
		}
		else
		{
			$limit = 0;
			$nums = 4;
		}
		
		$studypost_id = intval($studypost_id);
		$comment_conditions = array("studypost_id = ".$studypost_id);
		$comments = $this->findAll("*", null, $comment_conditions, "created DESC limit ".$limit.", ".$nums);
		foreach($comments as $comment_key => $comment)
		{
			$comments[$comment_key]["member"] = $member->getInfoById(intval($comment["member_id"]));
		}
		return $comments;
	}
	
	function findCommentWithStar($studypost_id, $member_id)
	{
		$studypost_id = intval($studypost_id);
		$conditions = array("studypost_id = ".intval($studypost_id));
		$conditions[] = "member_id = ".intval($member_id);
		$conditions[] = "star > 0";
		$comments = $this->findAll("*", null, $conditions, "created DESC limit 0, 1");
		
		return $comments;
	}
}
?>