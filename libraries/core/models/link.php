<?php
class Links extends PbModel {
 	var $name = "Link";

 	function Links()
 	{
 		parent::__construct();
 	}
	
	function findMember($userid)
	{
		uses("member");
		$member = new Members();
		////findAll($fields = null, $joins = null, $conditions = null, $order = null, $limit = null, $offset = null, $recursive = null)
		$result = $member->findAll("Member.*, c.status AS company_status, l.type_id", array("LEFT JOIN {$this->table_prefix}links l ON l.member_id=Member.id", "LEFT JOIN {$this->table_prefix}companies c ON c.member_id=Member.id"), array("l.parent_id=".$userid));
		return $result;
	}
	
	function findParent($userid, $type_id)
	{		
		// = "Member.*, c.status AS company_status, l.type_id", array("LEFT JOIN {$this->table_prefix}links l ON l.member_id=Member.id", "LEFT JOIN {$this->table_prefix}companies c ON c.member_id=Member.id"), array("l.member_id=".$userid, "type_id=".$type_id);
		return $this->field("parent_id", array("member_id=".$userid, "type_id=".$type_id));
	}
	
	function countAgent($userid)
	{
		$count = $this->field("COUNT(type_id)", array("parent_id=".$userid,"type_id=2"));
		return $count;
	}
	
	function updateStatus($parent, $member, $status)
	{
		$type = $this->field("type_id", array("parent_id=".$parent, "member_id=".$member));
		if($status == 2 || $status == 3)
		{
			if($type == 1)
			{
				return $this->saveField("type_id", $status, null, array("parent_id=".$parent, "member_id=".$member));
			}
			else
			{
				return false;
			}
		}
		return false;
	}
	
	function countMember($userid)
	{
		uses("member");
		$member = new Members();
		//findAll($fields = null, $joins = null, $conditions = null, $order = null, $limit = null, $offset = null, $recursive = null)
		$result = $member->findAll("Member.id", array("LEFT JOIN {$this->table_prefix}links l ON l.parent_id=Member.id"), array("l.parent_id=".$userid));
		return(count($result));
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