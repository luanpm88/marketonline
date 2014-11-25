<?php
class Chatc extends PbController {
	var $name = "Chatc";

	var $CHAT_ANNOUNCE_COUNT = 20;
	
	function Chatc()
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
		$this->loadModel("trade");
		$this->loadModel("tradecomment");
		$this->loadModel("tradetype");
		$this->loadModel("chat");
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
	function ajaxTopChatbox()
	{
		$pb_userinfo = pb_get_member_info();
		$user = $this->member->getInfoById($pb_userinfo["pb_userid"]);
		
		$user_code = $user["id"]."x".$user["current_type"];
		
		$conditions[] = "((Chat.to_code='".$user_code."' AND Chat.from_code!='".$user_code."') OR (Chat.from_code='".$user_code."' AND Chat.to_code!='".$user_code."'))";
		
		//filter membertype
		if($user["current_type"])
		{
			//$conditions[] = "((CONCAT('[]',Chat.membertype_to_ids,'[]') LIKE '%[".$user["current_type"]."]%') OR (CONCAT('[]',Chat.membertype_from_ids,'[]') LIKE '%[".$user["current_type"]."]%'))";
		}
		
		$index = 0;
		if(isset($_GET["page"])) {
			$index = $_GET["page"]*$this->CHAT_ANNOUNCE_COUNT;
		}
		
		$joins[] = "LEFT JOIN {$this->product->table_prefix}companies c ON c.member_id = Chat.from_member_id";
		$joins[] = "LEFT JOIN {$this->product->table_prefix}companies c2 ON c2.member_id = Chat.to_member_id";
		
		$joins[] = "INNER JOIN ( SELECT chat_code, MAX(created) as maxdate, from_code, to_code FROM {$this->product->table_prefix}chats GROUP BY chat_code ) ppp ON ppp.chat_code = Chat.chat_code AND ppp.maxdate = Chat.created";
		
		$result = $this->chat->findAll("Chat.*, c.picture, c.shop_name, c2.picture as picture_2, c2.shop_name as shop_name_2", $joins, $conditions, "Chat.created DESC", $index, $this->CHAT_ANNOUNCE_COUNT, null);
		
		if (!empty($result)) {
			for($i=0; $i<count($result); $i++){
				
				if($result[$i]["from_member_id"] != $pb_userinfo["pb_userid"])
				{
					$mem = $this->member->getInfoById($result[$i]["from_member_id"]);
					$pps = explode("x",$result[$i]["from_code"]);
					
					$result[$i]["membertype_id"] = $pps[1];
					
					if($result[$i]["picture"] && $pps[1] != 6)
					{
						$result[$i]["company_logo"] = pb_get_attachmenturl($result[$i]["picture"], '', 'smaller');
					}
					else
					{						
						if($mem["photo"])
						{
							$result[$i]["company_logo"] = pb_get_attachmenturl($mem["photo"], '', 'small');
						}
						else
						{
							$result[$i]["company_logo"] = URL."templates/default/image/usericon_big.png";
						}
					}
					
					if($result[$i]["shop_name"] && $pps[1] != 6)
					{
						$result[$i]["name"] = $result[$i]["shop_name"];
					}
					else if($mem["first_name"])
					{
						$result[$i]["name"] = $mem["first_name"]." ".$mem["last_name"];
					}
					else
					{
						$result[$i]["name"] = $mem["username"];
					}
					
					$result[$i]["chatid"] = $result[$i]["from_member_id"];
					
					//check member type
					//var_dump($result[$i]);
					if (strpos($result[$i]["membertype_from_ids"],$mem["membertype_id"]) !== false || true) {
						$result[$i]["chattypeid"] = $mem["membertype_id"];
					}
					else
					{
						$ids = $this->member->getOtherMembertypes($result[$i]["from_member_id"]);
						if (strpos($result[$i]["membertype_from_ids"],$ids[0]["membertype_id"]) !== false) {
							$result[$i]["chattypeid"] = $ids[0]["membertype_id"];
						}
					}
				}
				else
				{
					$mem = $this->member->getInfoById($result[$i]["to_member_id"]);
					
					$pps = explode("x",$result[$i]["to_code"]);
					
					$result[$i]["membertype_id"] = $pps[1];
					
					if($result[$i]["picture_2"] && $pps[1] != 6)
					{
						$result[$i]["company_logo"] = pb_get_attachmenturl($result[$i]["picture_2"], '', 'smaller');
					}
					else
					{						
						if($mem["photo"])
						{
							$result[$i]["company_logo"] = pb_get_attachmenturl($mem["photo"], '', 'small');
						}
						else
						{
							$result[$i]["company_logo"] = URL."templates/default/image/usericon_big.png";
						}
					}
					
					if($result[$i]["shop_name_2"] && $pps[1] != 6)
					{
						$result[$i]["name"] = $result[$i]["shop_name_2"];
					}
					else if($mem["first_name"])
					{
						$result[$i]["name"] = $mem["first_name"]." ".$mem["last_name"];
					}
					else
					{
						$result[$i]["name"] = $mem["username"];
					}
					
					$result[$i]["chatid"] = $result[$i]["to_member_id"];
					
					//check member type
					if (strpos($mem["membertype_to_ids"],$mem["membertype_id"]) !== false || true) {
						$result[$i]["chattypeid"] = $mem["membertype_id"];
					}
					else
					{
						$ids = $this->member->getOtherMembertypes($result[$i]["to_member_id"]);
						if (strpos($result[$i]["membertype_to_ids"],$ids[0]["membertype_id"]) !== false) {
							$result[$i]["chattypeid"] = $ids[0]["membertype_id"];
						}
					}
					
				}
				
				$result[$i]["created_or"] = $result[$i]["created"];
				$result[$i]["created"] = df($result[$i]["created"], 'd-m-Y H:i');				
			}
		}
		//var_dump($result);
		setvar("Items",$result);
		setvar("Items_count", $this->chat->findCount($joins, $conditions, "Chat.id"));
		setvar("CHAT_ANNOUNCE_COUNT",$this->CHAT_ANNOUNCE_COUNT);
		setvar("Count", $this->chat->findCount(null, array("(Chat.to_member_id=".$pb_userinfo["pb_userid"]." AND Chat.from_member_id!=".$pb_userinfo["pb_userid"].")","Chat.read=0")));
		$this->render("modern/chat/ajaxTopChatbox");
	}
}
?>