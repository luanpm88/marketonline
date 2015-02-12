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
		
		$conditions[] = "Announcement.status=1";
		//$conditions[] = "r.id IS NULL";
		
		if (isset($type_id)) {
			$conditions[] = "announcetype_id=".$type_id;
		}
		if (isset($member_type)) {
			$conditions[] = "(membertypes LIKE '%".$member_type."%' OR membertypes = '')";
		}		
		
		$joins = array("LEFT JOIN {$this->table_prefix}announcereads r ON r.announce_id=Announcement.id");
		$joins[] = "LEFT JOIN {$this->table_prefix}members m ON r.member_id=m.id";
		
		$annouce = $this->findAll("Announcement.*,r.id as read_id,r.times", $joins, $conditions, "Announcement.created", 0, 1);
		//var_dump($annouce);
		if($annouce) {
			return $annouce[0];
		}
		
		return false;
	}
}
?>