<?php
class Message extends PbController {
	var $name = "Message";
	
	function Message()
	{
		$this->loadModel("product");
		$this->loadModel("producttype");
		$this->loadModel("industry");
		$this->loadModel("area");
		$this->loadModel("company");
		$this->loadModel("message");
		$this->loadModel("space");
		$this->loadModel("member");
		$this->loadModel("memberfield");
		$this->loadModel("chat");
		$this->loadModel("trade");
		$this->loadModel("tradecomment");
		$this->loadModel("tradetype");
		$this->loadModel("tag");
		$this->loadModel("link");
		$this->loadModel("language");
		$this->loadModel("announcement");
		$this->loadModel("adzone");
		$this->loadModel("modlog");
		$this->loadModel("attachment");
		$this->loadModel("album");
	}
	
	function add()
	{
		global $pb_user, $smarty, $administrator_id;
		if (isset($_POST['companyid']) && !empty($_POST['feed']) && !empty($pb_user)) {
			$vals = $_POST['feed'];
			$vals['created'] = $this->message->timestamp;
			$vals['status'] = 0;
			$vals['from_member_id'] = $pb_user['pb_userid'];
			$vals['cache_from_username'] = $pb_user['pb_username'];
			$member_id = $this->message->GetOne("SELECT member_id FROM {$this->message->table_prefix}companies WHERE id=".intval($_POST['companyid']));
			if (empty($member_id)) {
				$vals['to_member_id'] = $administrator_id;
				$vals['cache_to_username'] = $this->message->GetOne("SELECT username FROM {$this->message->table_prefix}members WHERE id=".$administrator_id);
			}else{
				$member_info = $this->message->GetRow("SELECT id,username FROM {$this->message->table_prefix}members WHERE id=".$member_id);
				$vals['to_member_id'] = $member_info['id'];
				$vals['cache_to_username'] = $member_info['username'];
			}
			$vals['title'] = L("pms_from_space", "tpl");
			if($this->message->save($vals)){
				$smarty->flash('feedback_already_submit', null, 0);
			}
		}
	}
	
	function ajaxTopMailbox()
	{
		uses("message");
		$pms = new Messages();
		$pb_userinfo = pb_get_member_info();
		$user = $this->member->getInfoById($pb_userinfo["pb_userid"]);
		
		$conditions[] = "Message.to_member_id=".$pb_userinfo["pb_userid"];
		
		//type filter
		if($user["current_type"])
		{
			$conditions[] = "CONCAT('[]',Message.membertype_ids,'[]') LIKE '%[".$user["current_type"]."]%'";
		}
		
		$joins = array("LEFT JOIN {$this->product->table_prefix}companies c ON c.member_id = Message.from_member_id");
		
		$result = $pms->findAll("Message.*,c.picture,c.cache_spacename", $joins, $conditions, "Message.created DESC", 0, $this->MESSAGE_ANNOUNCE_COUNT);
		//echo count($result);
		if (!empty($result)) {
			for($i=0; $i<count($result); $i++){
				$result[$i]['senddate'] = df($result[$i]['created']);
				switch ($result[$i]['type']) {
					case 'user':
						$result[$i]['typename'] = L("private_message", "tpl");
						break;
					case 'inquery':
						$result[$i]['typename'] = L("inquery_message", "tpl");
						break;
					default:
						$result[$i]['typename'] = L("system_message", "tpl");
						break;
				}
				if($result[$i]["picture"] && $result[$i]["membertype_ids"] != '[6]')
				{
					$result[$i]["company_logo"] = pb_get_attachmenturl($result[$i]["picture"], '', 'smaller');
				}
				else
				{
					$member = $this->member->read("photo", $result[$i]["from_member_id"]);
					if($member["photo"])
					{
						$result[$i]["company_logo"] = pb_get_attachmenturl($member["photo"], '', 'small');
					}
					else
					{
						$result[$i]["company_logo"] = URL."templates/default/image/usericon_big.png";
					}
				}
				$result[$i]["created"] = date('d-m-Y H:i',$result[$i]["created"]);
				
				if($result[$i]["cache_spacename"]) {
					$result[$i]["logo_link"] = $pms->url(array("module"=>"space", "userid"=>$result[$i]["cache_spacename"]));
				}
				
				//if(!isset($_GET["type"])) $pms->saveField("status", 1, intval($result[$i]["id"]));
			}
			setvar("Items",$result);
		}
		
		//var_dump(count($result));
		//var_dump($result);
		$conditions[] = "Message.status=0";
		setvar("Link", $absolute_uri."virtual-office/pms.php");
		setvar("Count", $pms->findCount(null, $conditions));
		//setvar("Item", $result);
		$this->render("modern/message/ajaxTopMailbox");
	}
}
?>