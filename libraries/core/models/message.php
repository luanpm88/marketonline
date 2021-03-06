<?php
class Messages extends PbModel  {
 	var $name = "Message";
 	
 	function Messages()
 	{
 		parent::__construct();
 	}
 	
 	function getReadStatus()
 	{
 		$tmp_status = explode(",", L("read_status", "tpl"));
 		return $tmp_status;
 	}
 	
 	function SendToUser($from_username, $to_username, $data)
 	{
 		$member_info = $this->dbstuff->GetRow("SELECT m.id,m.username FROM {$this->table_prefix}members m WHERE m.username ='".$to_username."' OR m.id ='".$to_username."'");
 		$from_memberinfo = $this->dbstuff->GetRow("SELECT m.id,m.username FROM {$this->table_prefix}members m WHERE m.username ='".$from_username."' OR m.id ='".$from_username."'");
			
		//var_dump(!$member_info || empty($member_info) || !$from_memberinfo || empty($from_memberinfo));
		
		if($from_username == 0)
		{
			$from_memberinfo['id'] = 0;
			$from_memberinfo['username'] = "Kh�ch h�ng";
		}
		
 		if (!$member_info || empty($member_info)) {
 			return false;
 		}else{
 			if (empty($data['type'])) {
 				$data['type'] = 'user';
 			}
 			$sql = "INSERT INTO {$this->table_prefix}messages (title,content,from_member_id,cache_from_username,to_member_id,cache_to_username,created,type,membertype_ids) VALUE ('".$data['title']."','".$data['content']."',".$from_memberinfo['id'].",'".$from_memberinfo['username']."',".$member_info['id'].",'".$member_info['username']."',{$this->timestamp},'".$data['type']."','".$data['membertype_ids']."')";

 			return $this->dbstuff->Execute($sql);
 		}
 	}
 	
 	function SendToAdmin($from_username, $data)
 	{
 		global $administrator_id; 		
 		$member_info = $this->dbstuff->GetRow("SELECT m.id,m.username FROM {$this->table_prefix}members m WHERE m.id ='".$administrator_id."'");
 		$from_memberinfo = $this->dbstuff->GetRow("SELECT m.id,m.username FROM {$this->table_prefix}members m WHERE m.username ='".$from_username."'");
 		if (!$from_memberinfo || empty($from_memberinfo)) {
 			$from_memberinfo['id'] = -1;
 			$from_memberinfo['username'] = L("anonymous", "tpl");
 		}
 		$sql = "INSERT INTO {$this->table_prefix}messages (title,content,from_member_id,cache_from_username,to_member_id,cache_to_username,created) VALUE ('".$data['title']."','".$data['content']."',".$from_memberinfo['id'].",'".$from_memberinfo['username']."',".$administrator_id.",'".$member_info['username']."',{$this->timestamp})";
 		return $this->dbstuff->Execute($sql);
 	}
}
?>