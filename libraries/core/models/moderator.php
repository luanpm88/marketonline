<?php
class Moderators extends PbModel {
 	var $name = "Moderator";

 	function Moderators()
 	{
 		parent::__construct();
 	}
	
	function getTypePermisstions($mid) {
		uses("moderator","product","industry","member");
		$moderatordb = new Moderators();
		$productdb = new Products();
		$industrydb = new Industries();
		$memberdb = new Members();
		
		$permissions = array();
		
		$moderator = $moderatordb->fields("*", array("member_id = ".intval($mid),"status=1"));
		$member_info = $memberdb->getInfoById($mid);
		
		if(count($moderator)) {
			$types = explode(",",$moderator["manage_types"]);
			$industries = explode(",",$moderator["manage_industries"]);
			$rights = explode(",",$moderator["rights"]);
			
			if($member_info["role"] == 'admin') {
				$rights = array("valid","unvalid");
				$types = array("product","service","trade");
			}
			
			foreach($types as $type) {
				$permissions[$type] = array("permissions" => array(
								"valid" => false,
								"unvalid" => false
							)
						);
				
				foreach($permissions[$type]["permissions"] as $right => $value) {
					if(in_array($right,$rights)) {
						$permissions[$type]["permissions"][$right] = true;
					}
				}
			}
		}
		
		return $permissions;
	}
}
?>