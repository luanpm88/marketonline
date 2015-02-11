<?php
class Announcements extends PbModel {
 	var $name = "Announcement";
 	var $amount;
 	
 	function Announcements()
 	{
		parent::__construct();
 	}
 	
 	function initSearch()
 	{
 		if (isset($_GET['typeid'])) {
 			$this->condition[] = "announcetype_id='".intval($_GET['typeid'])."'";
 		}
 		if (isset($_GET['q'])) {
 			$this->condition[] = "subject like '%".htmlspecialchars($_GET['q'], ENT_QUOTES)."%'";
 		}
 		$this->amount = $this->findCount();
 	}
	
 	function Search($firstcount, $displaypg)
 	{
 		global $cache_types;
 		$result = $this->findAll("*", null, null, "display_order ASC,id DESC", $firstcount, $displaypg);
 		while(list($keys,$values) = each($result)){
 			$result[$keys]['title'] = $values['subject'];
 			$result[$keys]['digest'] = $values['message'];
 			$result[$keys]['pubdate'] = df( $values['created']);
 			$result[$keys]['typename'] = $cache_types['announcementtype'][$values['announcetype_id']];
 			$result[$keys]['url'] = $this->url(array("module"=>"announce", "id"=>$values['id']));
 			unset($result[$keys]['subject'], $result[$keys]['message']);
 		}
 		return $result;
 	}
	
	function getOldestUnread($member_id=null, $member_type=null, $type_id=null) {
		$conditions = array();
		
		$conditions[] = "status=1";
		
		if (isset($type_id)) {
			$conditions[] = "announcetype_id=".$type_id;
		}
		if (isset($member_type)) {
			$conditions[] = "(membertypes LIKE '%".$member_type."%' OR membertypes = '')";
		}
		if (isset($member_id)) {
			$conditions[] = "(read_members NOT LIKE '%[".$member_id."]%')";
		}
		
		$annouce = $this->findAll("*", null, $conditions, "created", 0, 1);
		
		if($annouce) {
			return $annouce[0];
		}
		
		return false;
	}
}
?>