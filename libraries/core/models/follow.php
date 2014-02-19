<?php
class Follows extends PbModel {
 	var $name = "Follow";

 	function Follows()
 	{
 		parent::__construct();
 	}
	
	function addFollow($userid, $shopid)
	{
		$follow = $this->field("*", array("member_id=".$userid, "shop_id=".$shopid));
		if(!$follow)
		{
			return $this->save(array("member_id"=>$userid, "shop_id"=>$shopid, "created"=>date("Y-m-d H:i:s")));
		}
		else
		{
			$this->del($follow);
			return false;
		}
	}
	
	function check($userid, $shopid)
	{
		$follow = $this->field("*", array("member_id=".$userid, "shop_id=".$shopid));
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
		$follows = $this->findAll("shop_id", null, array("member_id=".$userid));
		$arr = array();
		foreach($follows as $item)
		{
			$arr[] = $item["shop_id"];
		}
		return $arr;
	}
}
?>