<?php
class Members extends PbModel {
 	var $name = "Member";
 	var $info = null;
 	var $id = -1;
 	var $user_name;
 	var $mask_user_name = "admin";
 	var $ins_passport = true;
 	var $default_cachetime = 86400;

 	function Members()
 	{
		parent::__construct();
 	}

 	function &getInstance() {
 		static $instance = array();
 		if (!$instance) {
 			$instance[0] =& new Members();
 		}
 		return $instance[0];
 	}
	
 	function setUserName($user_name)
 	{
 		$this->user_name = $user_name;
 	}
 	
 	function getUserName()
 	{
 		return $this->user_name;
 	}
 	
 	function setInfoByUserName($user_name)
 	{
 		$return = $field_info = array();
 		$sql = "SELECT m.* FROM {$this->table_prefix}members m WHERE m.username='{$user_name}'";
 		$result = $this->dbstuff->GetRow($sql);
 		if (!empty($result)) {
 			$field_info = $this->dbstuff->GetRow("SELECT mf.* FROM {$this->table_prefix}memberfields mf WHERE mf.member_id=".$result['id']);
 		}
 		$this->info = array_merge($result, $field_info);
 	}
 	
 	function setInfoBySpaceName($space_name)
 	{
 		$return = $field_info = array();
 		$sql = "SELECT m.* FROM {$this->table_prefix}members m WHERE m.space_name='{$space_name}'";
 		$result = $this->dbstuff->GetRow($sql);
 		if (empty($result) || !$result) {
 			$sql = "SELECT m.* FROM {$this->table_prefix}members m WHERE m.username='{$space_name}'";
 			$result = $this->dbstuff->GetRow($sql);
 			if (!empty($result)) {
	 			$field_info = $this->dbstuff->GetRow("SELECT mf.* FROM {$this->table_prefix}memberfields mf WHERE mf.member_id=".$result['id']);
 			}else{
 				return false;
 			}
 		}else{
 			$field_info = $this->dbstuff->GetRow("SELECT mf.* FROM {$this->table_prefix}memberfields mf WHERE mf.member_id=".$result['id']);
 		}
 		$return = array_merge($result, $field_info);
 		$this->info = $result; 	
 	}
 	
 	function setId($id)
 	{
 		$this->id = $id;
 		$info = null;
 		$info = $this->getInfoById($id);
 		$this->setInfo($info); 		
 	}
 	
 	function getId()
 	{
 		return $this->id;
 	}
 	
 	function setInfo($info)
 	{
 		$this->info = $info;
 	}
 	
 	function getInfo()
 	{
 		return $this->info;
 	}
	
	function setPaid($id)
	{
		//find parent's agent
		uses("link", "connectpaidnote");
		$link = new Links();
		$note = new Connectpaidnotes();
		
		$member = $this->getInfoById($id);
		
		//update if type is agent
		$parentid = $link->findParent($id, 1);		
		if($parentid)
		{
			////echo "--".$parentid."--";
			$parent = $this->getInfoById($parentid);
			$link->updateStatus($parentid, $id, 3);
			if($this->saveField("level1_point", $parent["level1_point"]+3, (int) $parentid))
			{
				$note->save(array("member_id" => $parentid, "point" => "3", "type" => "level1 up", "created" => date("Y-m-d H:i:s")));
			}
			
						
			////update grandparent 10%
			$grandid = $link->findParent($parentid, 2);
			//echo $grandid;
			if($grandid)
			{
				////echo "--".$parentid."--";
				$grand = $this->getInfoById($grandid);				
				if($this->saveField("level2_point", $grand["level2_point"]+1, (int) $grandid))
				{
					$note->save(array("member_id" => $grandid, "point" => "1", "type" => "level2 up", "created" => date("Y-m-d H:i:s")));
				}			
			}
		}
		
		
		
			
		$this->saveField("checkout", "1", $id);
	}
	

 	function getInfoById($member_id)
 	{
		uses("area", "space", "studymemberimage", "studymemberimagecomment");
 		$area = new Areas();
		$space = new Space();
		$studymemberimagecomment = new Studymemberimagecomments();
		$studymemberimage = new Studymemberimages();
 		$tmp_img = null;
 		$_PB_CACHE['membergroup'] = cache_read("membergroup");
 		$_PB_CACHE['trusttype'] = cache_read("trusttype");
 		$result = array();
 		$sql = "SELECT m.*,mf.*,sc.name as school_name FROM {$this->table_prefix}members m LEFT JOIN {$this->table_prefix}memberfields mf ON mf.member_id=m.id LEFT JOIN {$this->table_prefix}schools sc ON mf.school_id=sc.id WHERE m.id='{$member_id}'";
 		$result = $this->dbstuff->GetRow($sql);
 		if (!empty($result)) {
 			if(isset($result['link_man']))
 			$result['link_people'] = $result['link_man'];
			$result['online'] = $this->isOnline($result['id']);
 			$result['groupname'] = $_PB_CACHE['membergroup'][$result['membergroup_id']]['name'];
 			$result['groupimage'] = "images/group/".$_PB_CACHE['membergroup'][$result['membergroup_id']]['avatar'];
			if (!empty($result['trusttype_ids'])) {
				$tmp_str = explode(",", $result['trusttype_ids']);
				foreach ($tmp_str as $key=>$val){
					$tmp_img.="<img src=\"images/icon/".$_PB_CACHE['trusttype'][$val]['avatar']."\" alt=\"".$_PB_CACHE['trusttype'][$val]['name']."\" />";
				}
				$result['trust_image'] = $tmp_img;
			}
			
			if($result["address"])
			{
				$result["address_s"] = $result["address"];
				$result["address"] = $result["address"].", ".$area->getFullName($result["area_id"]);
			}
			
			if (empty($result['photo'])) {
				$result['photo'] = URL.pb_get_attachmenturl('', '', 'big');				
			}else{
				$result['photo'] = URL.pb_get_attachmenturl($result['photo'], '', 'small');;
			}
			
			
			//get study images
			$studyimages = $studymemberimage->findAll("*", null, array("member_id=".$member_id), "created DESC");
			//var_dump($studyimages);
			if($studyimages)
			{
				foreach($studyimages as $key => $item)
				{
					$item["name_small"] = URL.pb_get_attachmenturl($item["name"], '', 'small');
					$item["name_medium"] = URL.pb_get_attachmenturl($item["name"], '', 'medium');
					$item["name_origin"] = URL.pb_get_attachmenturl($item["name"], '', '');
					$item["comments"]["count"] = $studymemberimagecomment->findCount(null, array("studymemberimage_id=".$item["id"]));
					$item["description_raw"] = $item["description"];
					$item["description"] = str_replace("\n","<br />",$item["description"]);
					
					
					if($key == 0)
					{
						$result["studypics"]["main"] = $item;
					}
					else
					{						
						$result["studypics"]["thumbs"][] = $item;
					}
					$result['studypics']['pics'][] = $item;
				}
			}
			else
			{
				$result['studypics']['main']['name_medium'] = URL."images/no_studypic.png";
				$result['studypics']['main']['id'] = 0;
			}
			
			
			$result['url'] = $space->rewrite($result["spacename"]);
			$result['online'] = $this->isOnline($result["id"]);
			
			$result['other_types'] = $this->getOtherMembertypes($result["id"]);
			//echo $result["id"];
			//var_dump($this->getOtherMembertypes($result["id"]));
			$is_student = false;
			foreach($result['other_types'] as $item)
			{				
				if($item["membertype_id"] == 6)
				{
					$is_student = true;
					break;
				}
			}
			$result['is_student'] = $is_student;
 		}		
 		return $result;
 	}
 	
 	function authPasswd($passwd, $type = 'md5', $salt = null)
 	{
 		switch ($type) {
 			case "md5":
 				return md5($passwd);
 				break;
 			case "crypt":
 				if (!empty($salt)) {
 					return crypt($passwd, $salt);
 				}else{
 					$salt = substr($passwd, 0, 2);
 					return crypt($passwd, $salt);
 				}
 				break;
 			case "crc32":
 				$crc = crc32($passwd);
 				return sprintf("%u", $crc);
 			default:
 				return $passwd;
 				break;
 		}
 	}
 	 	
	function checkUserLogin($uname,$upass)
	{
		global $_PB_CACHE, $passport, $memberfield, $phpb2b_auth_key, $if_need_check, $membergroup;
		$default_membergroupid = $membergroup->field("id","is_default=1");
		//$is_company = 1;
		$userid = trim($uname);
		if (pb_check_email($userid)) {
			$sql = "SELECT m.id,m.username,m.userpass,status,email,credits,service_end_date,office_redirect,af.member_id AS aid FROM {$this->table_prefix}members m LEFT JOIN {$this->table_prefix}adminfields af ON m.id=af.member_id WHERE m.email='$userid'";
		}else{
			$sql = "SELECT m.id,m.username,m.userpass,status,email,credits,service_end_date,office_redirect,af.member_id AS aid FROM {$this->table_prefix}members m LEFT JOIN {$this->table_prefix}adminfields af ON m.id=af.member_id WHERE m.username='$userid'";
		}
		$tmpUser = $this->dbstuff->GetRow($sql);
		if (empty($tmpUser)) {
			//check passport
			//check user
			$passport_userinfo = $passport->ucGetUserInfo($uname);
			//if exists, get info
			if ($passport_userinfo) {
				$tmpUser = $passport_userinfo;
				//Todo:check passport passowrd
				if (!$passport->ucSinleCheckPass($uname, $upass)){
					return -3;//passports password wrong
				}
				//add member to system
				if(!empty($tmpUser['email'])){
					$this->params['data']['member']['username'] = $uname;
					$this->params['data']['member']['userpass'] = $upass;
					$this->params['data']['member']['email'] = $tmpUser['email'];
					$this->params['data']['member']['last_login'] = $this->params['data']['member']['created'] = $this->params['data']['member']['modified'] = $this->timestamp;
					$i18n =& new L10n();
					$this->params['data']['member']['space_name'] = $i18n->translateSpaceName($this->params['data']['member']['username']); //Todo:
					//some memberfiled info
					$this->params['data']['member']['membergroup_id'] = (!empty($passport->default_groupid))?$passport->default_groupid:$default_membergroupid;
					$time_limits = $this->dbstuff->GetOne ( "SELECT default_live_time FROM {$this->table_prefix}membergroups WHERE id={$this->params['data']['member']['membergroup_id']}" );
					$this->params['data']['member']['service_start_date'] = $this->timestamp;
					$this->params['data']['member']['service_end_date'] = $membergroup->getServiceEndtime ( $time_limits );
					$this->params['data']['member']['membertype_id'] = (!empty($passport->default_typeid)) ? $passport->default_typeid : 1;
					$this->params['data']['member']['status'] = 1;
					//set login info
					$this->ins_passport = false;
					$this->Add();
					$passport->ucenter($uname, $upass, $tmpUser['email'], 'login');
					return true;
				}
			}
			//or return -2
			return -2;
		}else{
			$true_pass = $tmpUser['userpass'];
		}
		if (empty($userid) || empty($upass)){
			return -1;
		}elseif (strcmp($true_pass,$this->authPasswd($upass))!=0){
			return -3;
		}elseif ($tmpUser['status'] !=1) {
			return -4;
		}else {
			if (!empty($tmpUser['aid'])) {
				$tmpUser['is_admin'] = 1;
			}else{
				$tmpUser['is_admin'] = 0;
			}
		    $this->info = $tmpUser;
		    $tmpUser['userpass'] = $upass;
		    $tmpUser['useremail'] = $tmpUser['email'];//add useremail
		    //check the passport if has the user
		    //if not, register this user.
		    $this->putLoginStatus($tmpUser);
			$loginip = pb_get_client_ip();
			$this->dbstuff->Execute("UPDATE {$this->table_prefix}members SET last_login=".$this->timestamp.",last_ip='".$loginip."' WHERE id='{$tmpUser['id']}'");
		    unset($tmpUser);
			return true;
		}
	}

	function checkUserExist($uname, $set = true)
	{
		if(strlen($uname)<1 || strlen($uname)>255) {
			return false;
		}
		$sql = "SELECT m.id,m.username,m.userpass FROM {$this->table_prefix}members m WHERE m.username='{$uname}'";
		$uinfo = $this->dbstuff->GetRow($sql);
		if (!empty($uinfo) && $uinfo!='') {
			if($set) $this->info = $uinfo;
			return true;
		}else {
			//check passport
			//if exists,return true
			return false;
		}
	}
	
	function checkReferrerExist($uname, $set = true)
	{
		
		$referrer = $this->field("id", "username='".$uname."' OR email='".$uname."'");
		//var_dump($referrer);
		if($referrer) return false;
		else return true;
	}
	
	function checkUserExistsByEmail($email)
	{
		$result = $this->field("id", "email='".$email."'");
		if (!$result || empty($result)) {
			return false;
		}else{
			return true;
		}
	}

	function updateUserStatus($id_array, $status = 1)
	{
		if (is_array($id_array))
		{
			$tmp_ids = implode(",",$id_array);
			$sql = "UPDATE ".$this->getTable()." SET status='$status' where id in (".$tmp_ids.")";
		}
		else
		{
			$sql = "UPDATE ".$this->getTable()." SET status='$status'  WHERE id=".intval($id_array);
		}
		$result = $this->dbstuff->Execute($sql);
		if($result)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function checkUserPasswdById($input_passwd, $member_id)
	{
		$return = false;
		$user_pass = $this->field("userpass", "id=".$member_id);
		if (pb_strcomp($this->authPasswd($input_passwd), $user_pass)) {
			return true;
		}else{
			return false;
		}
	}
	
	function updateUserPasswdById($member_id, $new_passwd)
	{
		$sql = "UPDATE {$this->table_prefix}members SET userpass='".$this->authPasswd($new_passwd)."' WHERE id={$member_id} AND status='1'";
		$result = $this->dbstuff->Execute($sql);
		return $result;
	}
	
	function passport($data, $action = 'login')
	{
		global $G, $passport;
		if (!$G['passport_support'] || empty($data)) {
			return false;
		}
		if(!$this->ins_passport) return false; 
		list($uid, $uname, $upass, $uemail) = $data;
		$passport->ucenter($uname, $upass, $uemail, $action);
	}
	
	function putLoginStatus($user_info)
	{
		global $phpb2b_auth_key;
		$_SESSION["MemberID"] = $user_info['id'];
		$_SESSION["MemberName"] = $user_info['username'];
		$auth = authcode($user_info['id']."\t".$user_info['username']."\t".$this->authPasswd($user_info['userpass'])."\t".$user_info['is_admin'], 'ENCODE', $phpb2b_auth_key);
		if (isset($_POST['remember_pass'])) {
			usetcookie('auth', $auth, $this->timestamp+86400*365);//default 1 year if set remember
		}else{
			usetcookie('auth', $auth);
		}
		$this->passport(array($user_info['id'], $user_info['username'], $user_info['userpass'], $user_info['useremail']), "login");
	}
	
	function Add()
	{
		global $_PB_CACHE, $memberfield, $phpb2b_auth_key, $if_need_check;
		$error_msg = array();
		if (empty($this->params['data']['member']['username']) or 
		empty($this->params['data']['member']['userpass']) or 
		empty($this->params['data']['member']['email'])) return false;
		$space_name = $this->params['data']['member']['username'];
		$userpass = $this->params['data']['member']['userpass'];
		$this->params['data']['member']['userpass'] = $this->authPasswd($this->params['data']['member']['userpass']);
		$i18n =& new L10n();
		if(empty($this->params['data']['member']['space_name']))
		$this->params['data']['member']['space_name'] = $i18n->translateSpaceName($space_name);//Todo:
		//$uip = pb_ip2long(pb_getenv('REMOTE_ADDR'));
		//if(empty($uip)){
		//	pheader("location:".URL."redirect.php?message=".urlencode(L('sys_error')));
		//}
		$this->params['data']['member']['last_login'] = $this->params['data']['member']['created'] = $this->params['data']['member']['modified'] = $this->timestamp;
		$this->params['data']['member']['last_ip'] = pb_get_client_ip('str');
		$email_exists = $this->checkUserExistsByEmail($this->params['data']['member']['email']);
		if ($email_exists) {
			flash("email_exists", null, 0);
		}
		$if_exists = $this->checkUserExist($this->params['data']['member']['username']);
		if ($if_exists) {
			flash('member_has_exists', null, 0);
		}else{
			$this->save($this->params['data']['member']);
			$key = $this->table_name."_id";
			if($this->ins_passport) $this->passport(array($this->$key, $this->params['data']['member']['username'], $userpass, $this->params['data']['member']['email']), "reg");
			$memberfield->primaryKey = "member_id";
			$memberfield->params['data']['memberfield']['member_id'] = $this->$key;
			$memberfield->params['data']['memberfield']['reg_ip'] = $this->params['data']['member']['last_ip'];
			$memberfield->save($memberfield->params['data']['memberfield']);
			if (!$if_need_check) {
				$user_info['id'] = $this->$key;
				$user_info['username'] = $this->params['data']['member']['username'];
				$user_info['userpass'] = $userpass;
				$user_info['useremail'] = $this->params['data']['member']['email'];
				$user_info['lifetime'] = $this->timestamp+86400;
				$user_info['is_admin'] = 0;
				$this->putLoginStatus($user_info);
			}
		}
		return true;
	}
	
	function Delete($ids, $condition = null)
	{
		global $administrator_id;
		$id_condition = null;
		if (is_array($ids)) {
			if (in_array($administrator_id, $ids)) {
				flash("cant_del_founder");
			}
			$id_condition = "{$this->table_prefix}members.id IN (".implode(",", $ids).")";
		}else{
			if ($ids == $administrator_id) {
				flash("cant_del_founder");
			}
			$id_condition = "{$this->table_prefix}members.id = ".intval($ids);
		}
		$id_condition = "WHERE ".$id_condition;
		$sql = "DELETE FROM {$this->table_prefix}members,
		{$this->table_prefix}companies,
		{$this->table_prefix}trades,
		{$this->table_prefix}products,
		{$this->table_prefix}producttypes,
		{$this->table_prefix}personals,
		{$this->table_prefix}memberfields,
		{$this->table_prefix}tradefields 
		USING {$this->table_prefix}members 
		LEFT JOIN {$this->table_prefix}companies ON {$this->table_prefix}companies.member_id={$this->table_prefix}members.id 
		LEFT JOIN {$this->table_prefix}trades ON {$this->table_prefix}trades.member_id={$this->table_prefix}members.id 
		LEFT JOIN {$this->table_prefix}products ON {$this->table_prefix}products.member_id={$this->table_prefix}members.id 
		LEFT JOIN {$this->table_prefix}tradefields ON {$this->table_prefix}members.id={$this->table_prefix}tradefields.member_id 
		LEFT JOIN {$this->table_prefix}producttypes ON {$this->table_prefix}members.id={$this->table_prefix}producttypes.member_id
		LEFT JOIN {$this->table_prefix}memberfields ON {$this->table_prefix}members.id={$this->table_prefix}memberfields.member_id 
		LEFT JOIN {$this->table_prefix}personals ON {$this->table_prefix}members.id={$this->table_prefix}personals.member_id {$id_condition}";
		return $this->dbstuff->Execute($sql);
	}
	
	function updateSpaceName($member_info, $new_space_name)
	{
		if (empty($member_info) || !$member_info || !is_array($member_info)) {
			return false;
		}
		if (!empty($member_info['id'])) {
			$this->id = $member_info['id'];
			$data = $this->dbstuff->GetRow("SELECT id,space_name FROM {$this->table_prefix}members WHERE id='".$member_info['id']."'");
		}elseif (!empty($member_info['username'])){
			$data = $this->dbstuff->GetRow("SELECT id,space_name FROM {$this->table_prefix}members WHERE username='".$member_info['username']."'");
			$this->id = $data['id'];
		}
		if (pb_strcomp($new_space_name, $data['space_name']) || empty($data)) {
			return $data['space_name'];
		}else{
			$if_exists = $this->dbstuff->GetOne("SELECT id FROM {$this->table_prefix}members WHERE space_name='".$new_space_name."'");
			if ($if_exists) {
				//flash("space_name_exists");
				$date = new MyDateTime();
				$new_space_name .= "-".$date->getTimestamp();
			}
			$return = $this->dbstuff->Execute("UPDATE {$this->table_prefix}members m SET m.space_name='".$new_space_name."' WHERE m.id=".$this->id);
			$return = $this->dbstuff->Execute("UPDATE {$this->table_prefix}companies c SET c.cache_spacename='".$new_space_name."' WHERE c.member_id=".$this->id);
			$return = $this->dbstuff->Execute("UPDATE {$this->table_prefix}jobs j SET j.cache_spacename='".$new_space_name."' WHERE j.member_id=".$this->id);
			
			return $new_space_name;
		}
	}
	
	function logOut(){
		uses("product");
 		$product = new Product();
		$oldhis = $_SESSION["viewed_list"];
		//echo $oldhis;
		
		session_destroy();
		uclearcookies();
		$this->passport(array($user_info['id'], $user_info['username'], $user_info['userpass']), "logout");
		$session = new PbSessions();
		$product->restoreHistory($oldhis);
	}
	
	function clearCache($member_id = null)
	{
		return ;
	}
	
	function _clearCache($member_id = null)
	{
		if (!is_null($member_id) && $member_id>0) {
			$this->dbstuff->Execute("DELETE FROM `{$this->table_prefix}membercaches` WHERE member_id='".$member_id."'");
		}else{
			$this->dbstuff->Execute("TRUNCATE `{$this->table_prefix}membercaches`");
		}
	}
	
	/**
	 * instead of _updateMemberCaches
	 *
	 * @param unknown_type $id
	 * @return unknown
	 */
	function updateMemberCaches($member_id)
	{
		if (class_exists("Spaces")) {
			$space_controller = new Space();
		}else{
		    uses("space");
		    $space_controller = new Space();
		}	
		$data = array();
		if (empty($member_id)) {
			$member_id = $_SESSION['MemberID'];
		}
		$data['member'] = $this->getInfoById($member_id);
		$new_pm = $this->dbstuff->GetOne("SELECT count(id) AS amount FROM {$this->table_prefix}messages WHERE status='0' AND  to_member_id=".$member_id);
		$data['message']['new_pm'] = $new_pm;
		if ($data['member']['membertype_id']) {
			$data['company'] = $this->GetRow("SELECT c.* FROM {$this->table_prefix}companies c LEFT JOIN {$this->table_prefix}companyfields cf ON c.id=cf.company_id WHERE c.member_id='".$member_id."'");
			$data['company']['space_url'] = $space_controller->rewrite($data['company']['cache_spacename']);
		}
		return $data;
	}
	
	/**
	 * only use data1 col for cache,data2 is disabled
	 * 03/05/2011
	 * @param int $id member id
	 * @update 7.7.2011
	 */
	function _updateMemberCaches($id)
	{
		global $_PB_CACHE;
		$cache_time = $this->default_cachetime;
		if (class_exists("Spaces")) {
			$space_controller = new Space();
		}else{
		    uses("space");
		    $space_controller = new Space();
		}	
		$data = array();
		if (empty($id)) {
			$id = $_SESSION['MemberID'];
		}
		$data['member'] = $this->getInfoById($_SESSION['MemberID']);
		$new_pm = $this->dbstuff->GetOne("SELECT count(id) AS amount FROM {$this->table_prefix}messages WHERE status='0' AND  to_member_id=".$id);
		$data['message']['new_pm'] = $new_pm;
		if ($data['member']['membertype_id']) {
			$data['company'] = $this->GetRow("SELECT c.* FROM {$this->table_prefix}companies c LEFT JOIN {$this->table_prefix}companyfields cf ON c.id=cf.company_id WHERE c.member_id='".$id."'");
			$data['company']['space_url'] = $space_controller->rewrite($data['company']['cache_spacename']);
		}
		if ($_PB_CACHE['office_cache'] && $_PB_CACHE['main_cache_lifetime']) {
			$cache_time = $_PB_CACHE['main_cache_lifetime'];
			$this->dbstuff->Execute("REPLACE INTO `{$this->table_prefix}membercaches` (member_id,data1,data2,expiration) VALUE ('".$id."','".@serialize($data)."','',".($this->timestamp+$cache_time).")");
		}
		return $data;
	}
	
	function hasProfile($user_id)
	{
		
		uses("memberfield");
		$field = new Memberfields();
		
		$name = $field->field("first_name", "member_id=".$user_id);
		
		if(trim($name))
		{
			return true;
		}
		else
		{
			return false;
		}
		
	}
	
	function hasCompany($user_id)
	{
		
		uses("company");
		$field = new Companies();
		
		$name = $field->field("shop_name", "member_id=".$user_id);
		//return false;
		if(trim($name) != '')
		{
			return true;
		}
		else
		{
			return false;
		}
		
	}
	
	function getUserOnlines()
	{
		$sql = "SELECT s.* FROM {$this->table_prefix}sessions s WHERE s.data LIKE '%MemberID%'";
		$result = $this->dbstuff->GetArray($sql);
		
		$users = array();
		foreach($result as $key => $item)
		{
			$users[] = $this->unserializes($result[$key]["data"]);
		}
		
		//var_dump($users);
		
		return $users;
	}
	
	function unserializes($data) {
		$vars = preg_split(
		'/([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)\|/',
		$data, -1, PREG_SPLIT_NO_EMPTY |
		PREG_SPLIT_DELIM_CAPTURE
		);
		for ($i = 0; isset($vars[$i]); $i++) {
			$result[$vars[$i++]] = unserialize($vars[$i]);
		}
		return $result;
	}
	
	function isOnline($uid)
	{		
		$users = $this->getUserOnlines();
		//var_dump($users);
		//echo $uid;
		foreach($users as $key => $item)
		{
			if($item["MemberID"] == $uid)
			{
				return true;
			}
		}		
		return false;
	}	
	function getOtherMembertypes($member_id)
	{
		uses("Membermembertype");
		$mmt = new Membermembertypes();
		
		$ids = $mmt->findAll("membertype_id", null, "member_id=".$member_id);
		
		return $ids;
	}	
	function getStudyList($conds = array(), $keyword = '')
	{
		uses("area");
 		$area = new Areas();
		
		$conditions = $conds;
		$conditions[] = "(Member.membertype_id=6 OR mmt.membertype_id=6)";
		$conditions[] = "sc.id IS NOT NULL";
		
		//for keyword
		$keyword_str = '';
		$order_by_score = null;
		if($keyword != '')
		{
			$keyword_str = ",MATCH(mf.first_name, mf.last_name) AGAINST ('".$keyword."') as score";
			$conditions[] = "(MATCH(mf.first_name, mf.last_name) AGAINST('".$keyword."') OR CONCAT(mf.first_name, ' '. mf.last_name) LIKE '%".$keyword."%' )";
			$order_by_score = "score DESC";
		}
		//echo "sdsd".$keyword_str."sdsd";
		
		$joins = array("LEFT JOIN {$this->table_prefix}memberfields mf ON mf.member_id=Member.id");
		$joins[] = "LEFT JOIN {$this->table_prefix}schools sc ON mf.school_id=sc.id";
		$joins[] = "LEFT JOIN {$this->table_prefix}membermembertypes mmt ON mmt.member_id=Member.id";
				
		$members = $this->findAll("Member.*,mf.*,sc.name as school_name".$keyword_str, $joins, $conditions, $order_by_score);
		
		foreach($members as $key => $result)
		{
			$result["address_s"] = $result["address"];
			$result["address"] = $result["address"].", ".$area->getFullName($result["area_id"]);
			
			$result['photo'] = URL.pb_get_attachmenturl($result['photo'], '', 'small');

			$result['online'] = $this->isOnline($result["id"]);
			
			
			
			$members[$key] = $result;	
		}
		
		return $members;
	}
	
	function getFriendIds($user_id)
	{
		$conditions = array("sf.member_id=".$user_id);
		$joins = array("LEFT JOIN {$this->table_prefix}studyfriends sf ON sf.member_id=Member.id");
		$member_ids = $this->findAll("sf.friend_id", $joins, $conditions);

		$ids = array();
		foreach($member_ids as $row)
		{
			$ids[] = $row["friend_id"];
		}
		
		$conditions = array("sf.friend_id=".$user_id);
		$joins = array("LEFT JOIN {$this->table_prefix}studyfriends sf ON sf.member_id=Member.id");
		$member_ids = $this->findAll("sf.member_id", $joins, $conditions);
		
		foreach($member_ids as $row)
		{
			$ids[] = $row["member_id"];
		}
		
		//var_dump($ids);
		return $ids;
	}
	
	function getFriendChatList($user_id)
	{
		uses("area");
 		$area = new Areas();
		
		$conditions = array("(sf.friend_id=".$user_id." OR sfr.member_id=".$user_id.")","(sfr.status=1 OR sf.status=1)");
		$joins = array("LEFT JOIN {$this->table_prefix}studyfriends sf ON sf.member_id=Member.id");
		$joins[] = "LEFT JOIN {$this->table_prefix}studyfriends sfr ON sfr.friend_id=Member.id";
		$joins[] = "LEFT JOIN {$this->table_prefix}memberfields mf ON mf.member_id=Member.id";
		$joins[] = "LEFT JOIN {$this->table_prefix}schools sc ON mf.school_id=sc.id";
		$members = $this->findAll("Member.*,mf.*,sc.name as school_name", $joins, $conditions);
		//var_dump($members);
		foreach($members as $key => $item)
		{
			$members[$key]['link_people'] = $members[$key]['link_man'];
 			
			if($members[$key]["address"])
			{
				$members[$key]["address_s"] = $members[$key]["address"];
				$members[$key]["address"] = $members[$key]["address"].", ".$area->getFullName($members[$key]["area_id"]);
			}
			
			if (empty($members[$key]['photo'])) {
				$members[$key]['photo'] = URL.pb_get_attachmenturl('', '', 'big');				
			}else{
				$members[$key]['photo'] = URL.pb_get_attachmenturl($members[$key]['photo'], '', 'small');;
			}
			
			
			$members[$key]['online'] = $this->isOnline($members[$key]["id"]);

		}
		//var_dump($members);
		return $members;
	}
	
	function belongToGroup()
	{
		
	}
}
?>