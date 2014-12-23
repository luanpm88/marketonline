<?php
class Googlecontacts extends PbModel {
 	var $name = "Googlecontact";

 	function Googlecontacts()
 	{
		parent::__construct();
 	}
 	
	function update($userid, $data) {
		$exsit = $this->findAll("id",null,array("member_id=".$userid));
		
		if(empty($exsit)) {
			$val["member_id"] = $userid;
			$val["data"] = $data;
			$val["created"] = date("Y-m-d H:i:s");
			
			$this->save($val);
		} else {
			$val["data"] = $data;
			$val["created"] = date("Y-m-d H:i:s");
			
			$this->save($val,"update",intval($exsit[0]["id"]));
		}
	}
}
?>