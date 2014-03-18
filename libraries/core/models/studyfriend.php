<?php
class Studyfriends extends PbModel {
 	var $name = "Studyfriend";

 	function Studyfriends()
 	{
 		parent::__construct();
 	}
	
	function addFriend($userid, $followid)
	{
		uses("message");
		$message = new Messages();
		
		$follow = $this->fields("*", array("member_id=".$userid, "friend_id=".$followid));
		if(!$follow)
		{
			return $this->save(array("member_id"=>$userid, "friend_id"=>$followid, "created"=>date("Y-m-d H:i:s")));
		}
		else
		{
			$sms = $message->delAll(array("content=\"".$follow["message"]."\""));
			$this->del($follow["id"]);
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
	
	function getFriendRequest($userid, $memid)
	{
		return $this->field("id", array("member_id=".$memid, "friend_id=".$userid, "status=0"));
	}
	
	function acceptFriend($userid, $memid)
	{
		uses("message");
		$message = new Messages();
		
		$friend = $this->fields("*", array("member_id=".$memid, "friend_id=".$userid));
		$id = $friend["id"];
		$this->saveField("status", 1, intval($id));
		
		$sms = $message->delAll(array("content=\"".$friend["message"]."\""));
	}
	
	function isFriend($userid, $memid)
	{
		return $this->field("id", array("((member_id=".$memid." AND friend_id=".$userid.") OR (member_id=".$userid." AND friend_id=".$memid."))", "status=1"));
	}
	
	function rejectFriend($userid, $memid)
	{
		
		uses("message");
		$message = new Messages();
		
		$friend = $this->fields("*", array("member_id=".$memid, "friend_id=".$userid));
		$id = $friend["id"];
		$this->del(intval($id));
		$sms = $message->delAll(array("content=\"".$friend["message"]."\""));
	}
}
?>