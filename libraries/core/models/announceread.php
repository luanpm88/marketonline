<?php
class Announcereads extends PbModel {
 	var $name = "Announceread";
 	
 	function Announcereads()
 	{
 		parent::__construct();
 	}
	
	function read($announce_id, $member_id) {
		$read = $this->getRead($announce_id, $member_id);
		if($read) {			
			$read["times"] = $read["times"]+1;
			$read["created"] = date("Y-m-d H:i:s");
			$this->save($read,"update",intval($read["id"]));
		} else {
			$this->save(array("times"=>1,"announce_id"=>$announce_id,"member_id"=>$member_id,"created"=>date("Y-m-d H:i:s")));
		}
	}
	
	function getRead($announce_id, $member_id) {
		$read = $this->findAll("*", null, array("announce_id=".$announce_id,"member_id=".$member_id));
		
		return $read[0];
	}
	
	
}
?>