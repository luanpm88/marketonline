<?php
class Studypost extends PbController {
	var $name = "studypost";

	function Studypost()
	{
		$this->loadModel("studypost");
		$this->loadModel("studypostcomment");
		$this->loadModel("member");
		$this->loadModel("memberfield");
		$this->loadModel("studygroup");
		$this->loadModel("studygroupmember");
		$this->loadModel("school");
		$this->loadModel("area");
		$this->loadModel("studyfollow");
		$this->loadModel("studyfriend");
		$this->loadModel("message");
	}

	function index()
	{
		setvar("school_list", $school_list = $this->school->getList());
		setvar("AreaOptions", $this->area->getAreaOptions('['.$_GET['area'].']'));
		setvar("SchoolsOptions", $this->school->getOptions('['.$_GET['school'].']'));
		render("studypost/index");
	}
	
	function school()
	{
		$pb_userinfo = pb_get_member_info();
		//cleanEditorFile
		//$studyposts = $this->studypost->
		//get list group
		$user = $this->member->getInfoById($pb_userinfo["pb_userid"]);
		
		if(isset($_GET["id"]))
		{
			$school_id = $_GET["id"];
		}
		else
		{
			$school_id = $user["school_id"];
		}
		
		$groups = $this->studygroup->getList($school_id, $pb_userinfo["pb_userid"], true);
		$joined_groups = $this->studygroup->getList(null, $pb_userinfo["pb_userid"]);
		
		//get current school
		$school = $this->school->getInfoById($school_id, $pb_userinfo["pb_userid"]);
		
		//get school list
		$school_list = $this->school->getList();
		
		$belongToSchool = $user["school_id"] == $school["id"]?true:false;
		setvar("belongToSchool",$belongToSchool);
		
		setvar("joined_groups",$joined_groups);
		setvar("groups",$groups);
		setvar("groups_count",count($groups));
		setvar("school", $school);
		setvar("school_list", $school_list);
		render("studypost/school");
	}
	
	function group()
	{
		$pb_userinfo = pb_get_member_info();
		//cleanEditorFile
		//$studyposts = $this->studypost->
		//get list group
		$user = $this->member->getInfoById($pb_userinfo["pb_userid"]);
		
		//		
		$group = $this->studygroup->getInfoById(intval($_GET["id"]));
		
		if($group["school_id"])
		{
			$school_id = $group["school_id"];
		}
		else
		{
			$school_id = $user["school_id"];
		}
		
		$this->studygroup->viewed(intval($_GET["id"]), $pb_userinfo["pb_userid"]);
		$groups = $this->studygroup->getList($school_id, $pb_userinfo["pb_userid"], true);
		$joined_groups = $this->studygroup->getList(null, $pb_userinfo["pb_userid"]);
		
		//get current school
		$school = $this->school->getInfoById($school_id, $pb_userinfo["pb_userid"]);
		
		//get school list
		$school_list = $this->school->getList();
		
		//check permission
		$belongToGroup = $this->studygroupmember->belongToGroup($group["id"], $user["id"]);
		
		setvar("belongToGroup",$belongToGroup);
		setvar("joined_groups",$joined_groups);
		setvar("groups",$groups);
		setvar("groups_count",count($groups));
		setvar("group",$group);
		setvar("school", $school);
		setvar("school_list", $school_list);
		render("studypost/group");
	}
	
	function post()
	{
		$pb_userinfo = pb_get_member_info();
		
		if(!isset($_POST["studypost"]))
		{
			flash("data_not_exists", '', 0);
		}
		$studypost = $_POST["studypost"];
		
		if(!empty($studypost["school_id"]) || !empty($studypost["group_id"]))
		{
			pb_submit_check('studypost');
			$studypost["member_id"] = $pb_userinfo["pb_userid"];
			$studypost["created"] = date("Y-m-d H:i:s");
			$studypost["modified"] = date("Y-m-d H:i:s");
			
			//var_dump($studypost);
			
			$this->studypost->save($studypost);
			
			//pheader("location:".$_SERVER["HTTP_REFERER"]);
		}
	}
	
	function update()
	{
		$pb_userinfo = pb_get_member_info();
		
		if(!isset($_POST["studypost"]))
		{
			flash("data_not_exists", '', 0);
		}
		$studypost = $_POST["studypost"];
		
		if((!empty($studypost["school_id"]) || !empty($studypost["group_id"])) && !empty($studypost["id"]))
		{
			pb_submit_check('studypost');
			
			$item = $this->studypost->read("*", intval($studypost["id"]));
					
			
			if($pb_userinfo["pb_userid"] == $item["member_id"])
			{
				$item["content"] = $studypost["content"];
				$item["modified"] = date("Y-m-d H:i:s");

				$this->studypost->save($item, "update", intval($item["id"]));
				
				echo $item["content"];
			}
		}
	}
	
	function delete()
	{
		$pb_userinfo = pb_get_member_info();
		
		if(!isset($_GET["id"]))
		{
			flash("data_not_exists", '', 0);
		}
		
			
		$item = $this->studypost->read("*", intval($_GET["id"]));

		if($pb_userinfo["pb_userid"] == $item["member_id"])
		{
			$this->studypostcomment->delAll("studypost_id = ".$item["id"]);
			$this->studypost->del(intval($item["id"]));
		}
	}
	
	function ajaxLoadStudyposts()
	{
		$pb_userinfo = pb_get_member_info();
		$user = $this->member->getInfoById(intval($pb_userinfo["pb_userid"]));
		
		$conditions = array();
		
		if(isset($_GET["type"]))
		{
			if($_GET["type"] == "school")
			{
				$conditions[] = "school_id = ".$user["school_id"];
			}
			else if($_GET["type"] == "group" && isset($_GET["id"]))
			{
				$conditions[] = "group_id = ".intval($_GET["id"]);
				$this->studygroup->viewed($item["group_id"], $user["id"]);
			}
			else
			{
				$conditions[] = "FALSE";
			}
		}
		else
		{
			$conditions[] = "FALSE";
		}
		
		$load_pos = 0;
		if(isset($_GET["load_pos"]))
		{
			$load_pos = $_GET["load_pos"];
		}
		
		$load_num = 0;
		if(isset($_GET["load_num"]))
		{
			$load_num = $_GET["load_num"];
		}
		
		$studyposts = $this->studypost->findAll("*", null, $conditions, "created DESC limit ".$load_pos.", ".$load_num);
		
		foreach($studyposts as $key => $item)
		{
			$studyposts[$key]["member"] = $this->member->getInfoById(intval($item["member_id"]));
			
			//load comment			
			$comments = $this->studypostcomment->loadComments($item["id"]);			
			$studyposts[$key]["comments"] = $comments["comments"];
			$studyposts[$key]["more"] = $comments["more"];
			
			//var_dump($comments["more"]);
			
			//$count = $this->studypostcomment->findCount(null, "studypost_id=".$item["id"]);
			//setvar("count", $count);
			
			//check commented
			$comment_with_star = $this->studypostcomment->findCommentWithStar($item["id"],$user["id"]);
			
			$studyposts[$key]["comment_with_star"] = $comment_with_star;
			
			//save viewed
			//echo "sdsdsd";
			//$this->studygroup->viewed($item["group_id"], $user["id"]);
		}
		
		setvar("List", $studyposts);
		
		render("studypost/ajaxLoadStudyposts");
	}
	
	function postcomment()
	{
		$pb_userinfo = pb_get_member_info();
		//if(!isset($_POST["comment"]))
		//{
		//	flash("data_not_exists", '', 0);
		//}
		$comment = $_POST["comment"];

		if(!empty($comment["studypost_id"]) && (!empty($comment["content"]) || !empty($comment["star"])))
		{
			pb_submit_check('comment');
			$comment["member_id"] = $pb_userinfo["pb_userid"];
			$comment["created"] = date("Y-m-d H:i:s");
			$comment["modified"] = date("Y-m-d H:i:s");
			
			//check commented
			$comment_with_star = $this->studypostcomment->findCommentWithStar($comment["studypost_id"],$pb_userinfo["pb_userid"]);

			if(count($comment_with_star)) {
				$comment["star"] = 0;
			}
			$this->studypostcomment->save($comment);
			//pheader("location:".$_SERVER["HTTP_REFERER"]);
		}
	}
	
	function ajaxLoadStudypostComments()
	{
		if(isset($_GET["studypost_id"]))
		{
			//load comment			
			$comments_a = $this->studypostcomment->loadComments($_GET["studypost_id"], $_GET["count"]);
			
			$comments = $comments_a["comments"];
			
			setvar("more", $comments_a["more"]);
			
			//echo $comments_a["more"];
			
			setvar("comments", $comments);
			render("studypost/ajaxLoadStudypostComments");
		}
	}
	
	function deleteComment()
	{
		$pb_userinfo = pb_get_member_info();
		
		if(!isset($_GET["id"]))
		{
			flash("data_not_exists", '', 0);
		}
		
			
		$item = $this->studypostcomment->read("*", intval($_GET["id"]));

		if($pb_userinfo["pb_userid"] == $item["member_id"])
		{
			$this->studypostcomment->del(intval($item["id"]));
		}
	}
	
	function join_group()
	{
		$pb_userinfo = pb_get_member_info();
		
		if(!isset($_GET["id"]))
		{
			flash("data_not_exists", '', 0);
		}
		
		$exsit = $this->studygroupmember->fields("*", array("member_id = '".$pb_userinfo["pb_userid"]."'", "studygroup_id = '".$_GET["id"]."'"));
		
		var_dump($exsit);
		
		if(empty($exsit)) {
			$val["member_id"] = $pb_userinfo["pb_userid"];
			$val["studygroup_id"] = $_GET["id"];
			$val["created"] = strtotime(date("Y-m-d H:i:s"));
			
			$this->studygroupmember->save($val);
		}
		
		pheader("location:index.php?do=studypost&action=group&id=".$_GET["id"]);
	}
	
	function leave_group()
	{
		$pb_userinfo = pb_get_member_info();
		
		if(!isset($_GET["id"]))
		{
			flash("data_not_exists", '', 0);
		}
		
		$exsit = $this->studygroupmember->fields("*", array("member_id = '".$pb_userinfo["pb_userid"]."'", "studygroup_id = '".$_GET["id"]."'"));
		
		if(!empty($exsit)) {
			$this->studygroupmember->del(intval($exsit["id"]));
		}
		
		pheader("location:index.php?do=studypost&action=school");
	}
	
	function memberpage()
	{
		if(!isset($_GET["id"]))
		{
			flash("data_not_exists", '', 0);
		}
		$pb_userinfo = pb_get_member_info();
		$user = $this->member->getInfoById($pb_userinfo["pb_userid"]);
		$member = $this->member->getInfoById($_GET["id"]);
		
		if(isset($_GET["id"]))
		{
			$school_id = $_GET["id"];
		}
		else
		{
			$school_id = $user["school_id"];
		}
		
		$groups = $this->studygroup->getList($school_id, $pb_userinfo["pb_userid"], true);
		$joined_groups = $this->studygroup->getList(null, $pb_userinfo["pb_userid"]);
		
		//get current school
		$school = $this->school->getInfoById($school_id, $pb_userinfo["pb_userid"]);
		
		//get school list
		$school_list = $this->school->getList();
		
		//checking follow
		if($user["id"])
		{
			$followed = $this->studyfollow->check($user["id"], $member["id"]);
			setvar("Followed", $followed);
		}
		//checking follow
		if($user["id"])
		{
			$friended = $this->studyfriend->check($user["id"], $member["id"]);
			setvar("Friended", $friended);
		}
		
		//get friend request
		$friend_request = $this->studyfriend->getFriendRequest($user["id"], $member["id"]);
		//var_dump($friend_request);
		setvar("friend_request",$friend_request);
		
		setvar("is_friend",$this->studyfriend->isFriend($user["id"], $member["id"]));
		
		setvar("joined_groups",$joined_groups);
		setvar("groups",$groups);
		setvar("groups_count",count($groups));
		setvar("school", $school);
		setvar("school_list", $school_list);
		setvar("member", $member);
		render("studypost/memberpage");
	}
	
	function ajaxFollow()
	{
		if(isset($_GET["followid"]))
		{
			$followid = intval($_GET['followid']);
			$pb_userinfo = pb_get_member_info();
			//echo $pb_userinfo["pb_userid"];
			if($pb_userinfo ["pb_username"])
			{
				if($this->studyfollow->addFollow($pb_userinfo["pb_userid"], $followid))
				{
					echo "1";
				}
				else
				{
					echo "0";
				}
			}
		}
	}
	
	function ajaxFriend()
	{
		if(isset($_GET["friendid"]))
		{
			$friendid = intval($_GET['friendid']);
			$pb_userinfo = pb_get_member_info();
			//echo $pb_userinfo["pb_userid"];
			if($pb_userinfo ["pb_username"])
			{
				if($this->studyfriend->addFriend($pb_userinfo["pb_userid"], $friendid))
				{
					echo "1";
					
					$user = $this->member->getInfoById($pb_userinfo["pb_userid"]);
					$member = $this->member->getInfoById($_GET['friendid']);
					
					$content = "<a href='".URL."index.php?do=studypost&action=memberpage&id=".$user["id"]."'>".$user["first_name"]." ".$user["last_name"]." đã gửi lời mời kết bạn đến bạn</a>";
					$sms['content'] = mysql_real_escape_string($content);
					$sms['title'] = mysql_real_escape_string("Lời mời kết bạn");
					$sms['membertype_ids'] = '[6]';
					$result = $this->message->SendToUser($user['id'], $member["id"], $sms);
					
					//get study friend id					
					$key = $this->studyfriend->table_name."_id";
					$stf_id = $this->studyfriend->$key;

					$this->studyfriend->saveField("message", $sms['content'], intval($stf_id));
				}
				else
				{
					echo "0";
				}				
			}
		}
	}
	
	function acceptFriend()
	{
		if(isset($_GET["id"]))
		{
			$pb_userinfo = pb_get_member_info();
			
			$this->studyfriend->acceptFriend($pb_userinfo["pb_userid"], $_GET["id"]);
		}
		pheader("location:".$_SERVER["HTTP_REFERER"]);
	}
	function rejectFriend()
	{
		if(isset($_GET["id"]))
		{
			$pb_userinfo = pb_get_member_info();
			
			$this->studyfriend->rejectFriend($pb_userinfo["pb_userid"], $_GET["id"]);
		}
		pheader("location:".$_SERVER["HTTP_REFERER"]);
	}
	
	function upload_picture()
	{
		uses("attachment");
		$pb_userinfo = pb_get_member_info();
		$user = $this->member->getInfoById($pb_userinfo["pb_userid"]);
		
		$attachment = new Attachment('upload_picture');

		if (!empty($_FILES['upload_picture']['name']) && $pb_userinfo["pb_userid"]) {
			$attachment->upload_dir = "studypictures".DS.gmdate("Y").gmdate("m").DS.gmdate("d");
			$attachment->if_watermark = false;
			$attachment->if_thumb_middle = false;
			$attachment->if_thumb_study = true;
			$attachment->rename_file = "studypictures-".$pb_userinfo["pb_userid"]."-".strtotime(date('Y-m-d H:i:s'));
			$attachment->upload_process();
			
			if(!$user['studypictures'])
			{
				$arr = array();
				$arr[] = $attachment->file_full_url;
				$vals['studypictures'] = json_encode($arr);
			}
			else
			{
				$arr = json_decode($user['studypictures']);
				$arr[] = $attachment->file_full_url;
				//var_dump($arr);
				$vals['studypictures'] = json_encode($arr);
			}
			
			$this->member->saveField('studypictures', $vals['studypictures'], intval($pb_userinfo["pb_userid"]));
		}
		pheader("location:".$_SERVER["HTTP_REFERER"]);
	}
	
	function del_studypic()
	{
		if(isset($_GET["id"]))
		{
			$pb_userinfo = pb_get_member_info();
			$user = $this->member->getInfoById($pb_userinfo["pb_userid"]);
			
			$iarr = json_decode($user["studypictures"]);
			
			$newarr = array();
			foreach($iarr as $key => $item)
			{
				if($_GET["id"] == $item)
				{
					//echo getcwd()."/attachment/".$item."0000";
					unlink(getcwd()."/attachment/".$item);
					unlink(getcwd()."/attachment/".$item.".medium.jpg");
					unlink(getcwd()."/attachment/".$item.".small.jpg");
				}
				else
				{
					$newarr[] = $item;
				}
			}
			$this->member->saveField("studypictures", json_encode($newarr), intval($user["id"]));
			//unlink('test.html');
		}
		pheader("location:".$_SERVER["HTTP_REFERER"]);
	}
	
	function getStudypictureDetail()
	{
		global $customer_code;
		
		if(isset($_GET["id"]))
		{
			$user_id = intval($_GET["id"]);
		}
		else
		{
			return;
		}
		
		if(isset($_GET["id"]))
		{	
			//$Trade = $this->trade->read("*", $_GET["id"], null, null);
			
			//$this->trade->clicked($customer_code, $Trade);
			
			//$Trade["name"] = strip_tags(pb_lang_split($Trade["title"]));
			//$Trade["content"] = pb_lang_split($Trade["content"]);
			//$Trade["price"] = number_format($Trade["price"], 0, ',', '.');
			
			//$Type = $this->tradetype->read("*", $Trade["type_id"], null, null);
			//var_dump($Type);
			//setvar("Type", $Type);
			
			
			//if (!empty($Trade['picture'])) {
			//		$Trade['imgsmall'] = pb_get_attachmenturl($Trade['picture'], '', 'small');
			//		$Trade['imgmiddle'] = pb_get_attachmenturl($Trade['picture'], '', 'middle');
			//		$Trade['image'] = pb_get_attachmenturl($Trade['picture'], '', '');
			//		$Trade['image_url'] = rawurlencode($Trade['picture']);
			//	} else {
			//		$Trade['image'] = pb_get_attachmenturl('', '', 'middle');
			//	}
			//	if (!empty($Trade['picture1'])) {
			//		$Trade['imgsmall1'] = pb_get_attachmenturl($Trade['picture1'], '', 'small');
			//		$Trade['imgmiddle1'] = pb_get_attachmenturl($Trade['picture1'], '', 'middle');
			//		$Trade['image1'] = pb_get_attachmenturl($Trade['picture1'], '', '');
			//		$Trade['image_url1'] = rawurlencode($Trade['picture1']);
			//	}
			//	if (!empty($Trade['picture2'])) {
			//		$Trade['imgsmall2'] = pb_get_attachmenturl($Trade['picture2'], '', 'small');
			//		$Trade['imgmiddle2'] = pb_get_attachmenturl($Trade['picture2'], '', 'middle');
			//		$Trade['image2'] = pb_get_attachmenturl($Trade['picture2'], '', '');
			//		$Trade['image_url2'] = rawurlencode($Trade['picture2']);
			//	}
			//	if (!empty($Trade['picture3'])) {
			//		$Trade['imgsmall3'] = pb_get_attachmenturl($Trade['picture3'], '', 'small');
			//		$Trade['imgmiddle3'] = pb_get_attachmenturl($Trade['picture3'], '', 'middle');
			//		$Trade['image3'] = pb_get_attachmenturl($Trade['picture3'], '', '');
			//		$Trade['image_url3'] = rawurlencode($Trade['picture3']);
			//	}
			//	if (!empty($Trade['picture4'])) {
			//		$Trade['imgsmall4'] = pb_get_attachmenturl($Trade['picture4'], '', 'small');
			//		$Trade['imgmiddle4'] = pb_get_attachmenturl($Trade['picture4'], '', 'middle');
			//		$Trade['image4'] = pb_get_attachmenturl($Trade['picture4'], '', '');
			//		$Trade['image_url4'] = rawurlencode($Trade['picture4']);
			//	}
			//
			//
			//$company = $this->company->getInfoByUserId($Trade["member_id"]);
			//$member = $this->member->getInfoById($Trade["member_id"]);
			//
			//if($member["first_name"])
			//{
			//	$member["name"] = $member["first_name"]." ".$member["last_name"];
			//}
			//else
			//{
			//	$member["name"] = $member["username"];
			//}
			//
			//$comments_count =  $this->tradecomment->findCount(null, array("trade_id=".$Trade["id"]));
			//
			////format html
			//$Trade['content'] = strip_tags($Trade['content'], "<p><br><strong><font><span><img><h2><h3><h4>");
			//
			//setvar("comments_count", $comments_count);					
			////var_dump($Trade);
			//setvar("Trade", $Trade);
			//setvar("company", $company);
			//setvar("member", $member);
			//
			//$this->render("product/ajaxOfferDetail");
			
			$user = $this->member->getInfoById($_GET["id"]);
			
			$studypics = json_decode($user['studypictures']);
			for($i=count($studypics)-1; $i >= 0; $i--)
			{
				$user["slides"][$i] = URL.pb_get_attachmenturl($studypics[$i], '', '');
			}
			
			setvar("member", $user);
			$this->render("studypost/ajaxStudypictureDetail");
		}
	}
}
?>