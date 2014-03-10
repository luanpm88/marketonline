<?php
class Studyfriends extends PbModel {
 	var $name = "Studyfriend";

 	function Studyfriends()
 	{
 		parent::__construct();
 	}
	
	function addFriend($userid, $followid)
	{
		$follow = $this->field("*", array("member_id=".$userid, "friend_id=".$followid));
		if(!$follow)
		{
			return $this->save(array("member_id"=>$userid, "friend_id"=>$followid, "created"=>date("Y-m-d H:i:s")));
		}
		else
		{
			$this->del($follow);
			return false;
		}
	}
	
	function check($userid, $followid)
	{
		$follow = $this->field("*", array("member_id=".$userid, "friend_id=".$followid));
		if($follow)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function getFriendIDs($userid)
	{
		$follows = $this->findAll("friend_id", null, array("member_id=".$userid));
		$arr = array();
		foreach($follows as $item)
		{
			$arr[] = $item["friend_id"];
		}
		return $arr;
	}
}
?>