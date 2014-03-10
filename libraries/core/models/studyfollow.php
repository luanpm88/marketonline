<?php
class Studyfollows extends PbModel {
 	var $name = "Studyfollow";

 	function Studyfollows()
 	{
 		parent::__construct();
 	}
	
	function addFollow($userid, $followid)
	{
		$follow = $this->field("*", array("member_id=".$userid, "follow_id=".$followid));
		if(!$follow)
		{
			return $this->save(array("member_id"=>$userid, "follow_id"=>$followid, "created"=>date("Y-m-d H:i:s")));
		}
		else
		{
			$this->del($follow);
			return false;
		}
	}
	
	function check($userid, $followid)
	{
		$follow = $this->field("*", array("member_id=".$userid, "follow_id=".$followid));
		if($follow)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function getFollowIDs($userid)
	{
		$follows = $this->findAll("follow_id", null, array("member_id=".$userid));
		$arr = array();
		foreach($follows as $item)
		{
			$arr[] = $item["follow_id"];
		}
		return $arr;
	}
}
?>