<?php
class Studypost extends PbController {
	var $name = "studypost";

	function Studypost()
	{
		$this->loadModel("studypost");
		$this->loadModel("company");
		$this->loadModel("trade");
		$this->loadModel("product");
		$this->loadModel("studypostcomment");
		$this->loadModel("member");
		$this->loadModel("memberfield");
		$this->loadModel("studygroup");
		$this->loadModel("studygroupimage");
		$this->loadModel("studygroupimagecomment");
		$this->loadModel("studygroupmember");
		$this->loadModel("school");
		$this->loadModel("schoolimage");
		$this->loadModel("schoolimagecomment");
		$this->loadModel("area");
		$this->loadModel("studyfollow");
		$this->loadModel("studyfriend");
		$this->loadModel("message");
		$this->loadModel("studymemberimage");
		$this->loadModel("studymemberimagecomment");
	}

	function index()
	{
		uses("ad");
		$ad = new Adses();
		
		$pb_userinfo = pb_get_member_info();
		$user = $this->member->getInfoById($pb_userinfo["pb_userid"]);
		
		if(isset($_GET["type"]))
		{
			$type = $_GET["type"];			
		}
		else
		{
			$type = "school";
		}
		setvar("type",$type);		
		setvar("AreaOptions", $this->area->getAreaOptions('['.$_GET['area'].']'));
		setvar("SchoolsOptions", $this->school->getOptions('['.$_GET['school'].']'));
		
		////#################for rightbar#########
		
		//setvar("ads_right", $ad->getByZone(22));
		////get student shops
		//$student_shops = $this->company->getStudentShops(0, 15);
		//setvar("student_shops", $student_shops["result"]);
		//
		////get student service
		//$student_services = $this->product->getStudentProducts(1, 0, 6);
		////var_dump($student_services);
		//setvar("student_services", $student_services["result"]);
		//
		////get student trades
		//$student_trades = $this->trade->getStudentTrades(0, 10);
		//setvar("student_trades", $student_trades);
		//
		////get student product
		//$student_discount_products = $this->product->getStudentDiscountProducts(0, 0, 2);		
		//setvar("student_discount_products", $student_discount_products["result"]);
		////######################################
		
		if($type == "school")
		{
			$conditions = array();
			
			$keyword = '';
			if(isset($_GET["keyword"]) && $_GET["keyword"] != "")
			{
				$keyword = $_GET["keyword"];
				setvar("keyword",$keyword);
			}
			
			if(isset($_GET["area"]) && $_GET["area"] != "")
			{
				$areas = $this->area->getChildArea($_GET["area"]);
				//var_dump($areas.implode(","));
				$conditions[] = "School.area_id IN (".implode(",",$areas).")";
				
				setvar("area",$_GET["area"]);
			}
			
			$school_list = $this->school->getList($conditions, $page->firstcount, $page->displaypg,$keyword);
			setvar("school_list", $school_list);
			
			setvar("ads_top", $ad->getByZone(25));
			setvar("ads_right", $ad->getByZone(30));
			
			render("studypost/school_list");
		}
		elseif($type == "group")
		{
			$conditions = array();
			
			$keyword = '';
			if(isset($_GET["keyword"]) && $_GET["keyword"] != "")
			{
				$keyword = $_GET["keyword"];
				setvar("keyword",$keyword);
			}
			
			if(isset($_GET["area"]) && $_GET["area"] != "")
			{
				$areas = $this->area->getChildArea($_GET["area"]);
				//var_dump($areas.implode(","));
				$conditions[] = "sc.area_id IN (".implode(",",$areas).")";
				
				setvar("area",$_GET["area"]);
			}
			
			$group_list = $this->studygroup->getList(null, null, false, $conditions,$keyword);
			foreach($group_list as $key => $group)
			{
				$group_list[$key]["joined"] = $this->studygroupmember->belongToGroup($group["id"],$user["id"]);
			}
			//var_dump($group_list);
			setvar("group_list", $group_list);
			
			setvar("ads_top", $ad->getByZone(26));
			setvar("ads_right", $ad->getByZone(31));
			
			render("studypost/group_list");
		}
		elseif($type == "learner")
		{
			$conditions = array();
			
			$keyword = '';
			if(isset($_GET["keyword"]) && $_GET["keyword"] != "")
			{
				$keyword = $_GET["keyword"];
				setvar("keyword",$keyword);
			}
			
			if(isset($_GET["area"]) && $_GET["area"] != "")
			{
				$areas = $this->area->getChildArea($_GET["area"]);
				//var_dump($areas.implode(","));
				$conditions[] = "mf.area_id IN (".implode(",",$areas).")";
				
				setvar("area",$_GET["area"]);
			}
			
			$learner_list = $this->member->getStudyList($conditions, $keyword);
			foreach($learner_list as $key => $mem)
			{
				$learner_list[$key]["is_friend"] = $this->studyfriend->isFriend($user["id"], $mem["id"]);
				$learner_list[$key]["friended"] = $this->studyfriend->check($user["id"], $mem["id"]);
				$learner_list[$key]["friending"] = $friend_request = $this->studyfriend->getFriendRequest($user["id"], $mem["id"]);
			}
			//var_dump($learner_list);
			setvar("learner_list", $learner_list);
			
			setvar("ads_top", $ad->getByZone(27));
			setvar("ads_right", $ad->getByZone(32));
			
			render("studypost/learner_list");
		}
		
		setvar("paging", array('total'=>$amount));
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
		foreach($groups as $key => $item)
		{
			$groups[$key]["joined"] = $this->studygroupmember->belongToGroup($item["id"],$user["id"]);
		}
		$joined_groups = $this->studygroup->getList(null, $pb_userinfo["pb_userid"]);
		
		//get current school
		$school = $this->school->getInfoById($school_id, $pb_userinfo["pb_userid"]);
		
		//get school list
		$school_list = $this->school->getList();
		
		//check permission
		$belongToGroup = $this->studygroupmember->belongToGroup($group["id"], $user["id"], 1);
		
		//check forwating
		$isWaitingValid = $this->studygroupmember->belongToGroup($group["id"], $user["id"], 0);
		
		//get leader
		$group_leader = $this->member->getInfoById($group["leader_id"]);
		
		//get waiting list
		$waiting_list = $this->studygroup->getWaitingList($group["id"]);
		setvar("waiting_list", $waiting_list);
		setvar("isWaitingValid", $isWaitingValid);	
		setvar("group_leader", $group_leader);		
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
		$user = $this->member->getInfoById($pb_userinfo["pb_userid"]);
		
		if(!isset($_POST["studypost"]))
		{
			flash("data_not_exists", '', 0);
		}
		$studypost = $_POST["studypost"];
		
		
		pb_submit_check('studypost');
		$studypost["member_id"] = $pb_userinfo["pb_userid"];
		$studypost["created"] = date("Y-m-d H:i:s");
		$studypost["modified"] = date("Y-m-d H:i:s");
		
		$valid = false;
		if(!empty($studypost["school_id"]) && $studypost["school_id"] == $user["school_id"])
		{
			$valid = true;
		}
		elseif(!empty($studypost["group_id"]) && $this->studygroupmember->belongToGroup($studypost["group_id"], $user["id"], 1))
		{
			$valid = true;
		}
		elseif(!empty($studypost["memberpage_id"]) && $user["id"] == $studypost["memberpage_id"])
		{
			$valid = true;
		}
		elseif($user["id"] == 1030)
		{
			$valid = true;
		}

		if($valid)
		{
			$this->studypost->save($studypost);
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
				
				$studypost = $this->studypost->read("*",intval($item["id"]));
				
				echo $studypost["content"];
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
				if(!isset($_GET["id"]))
				{
					$_GET["id"] = $user["school_id"];
				}
				if($_GET["id"] != $user["school_id"])
				{
					//get member ids from school
					$member_ids = $this->school->getMemberIds($_GET["id"]);
					//var_dump($member_ids);
					$conditions[] = "group_id = 0";
					$conditions[] = "(school_id = ".$_GET["id"]." OR member_id IN (".implode(',',$member_ids)."))";
					
					//var_dump($conditions);
				}
				else
				{
					//get member ids from school
					$member_ids = $this->school->getMemberIds($_GET["id"]);
					
					$friend_ids = $this->member->getFriendIds($user["id"]);
					if(count($friend_ids))
					{
						$cond_friends = " OR member_id IN (".implode(',',$friend_ids).")"
							." OR member_id IN (".implode(',',$friend_ids).")";
					}
					//var_dump($friend_ids);
					$conditions[] = "group_id = 0";
					$conditions[] = "(school_id = ".$_GET["id"]
								.$cond_friends
								." OR member_id IN (".implode(',',$member_ids).")"
							.")";
				}
			}
			else if($_GET["type"] == "group" && isset($_GET["id"]))
			{
				$conditions[] = "group_id = ".intval($_GET["id"]);
				$this->studygroup->viewed($item["group_id"], $user["id"]);
			}
			else if($_GET["type"] == "memberpage" && isset($_GET["id"]))
			{
				$conditions[] = "memberpage_id = ".intval($_GET["id"]);
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
		//var_dump($studyposts);
		
		foreach($studyposts as $key => $item)
		{
			$studyposts[$key]["member"] = $this->member->getInfoById(intval($item["member_id"]));
			
			//load comment			
			$comments = $this->studypostcomment->loadComments($item["id"]);
			$comments = $comments["comments"];
			
			foreach($comments as $vv => $itemvv)
			{
				$comments[$vv]["content"] =  str_replace(array("\r\n","\r","\n"), "<br />", $itemvv["content"]);
			}
			
			$studyposts[$key]["comments"] = $comments;
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

		if($pb_userinfo["pb_userid"] && !empty($comment["studypost_id"]) && (!empty($comment["content"]) || !empty($comment["star"])))
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
			
			foreach($comments as $key => $item)
			{
				$comments[$key]["content"] =  str_replace(array("\r\n","\r","\n"), "<br />", $item["content"]);
			}
			
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
		$user = $this->member->getInfoById($pb_userinfo["pb_userid"]);
		
		if(!isset($_GET["id"]))
		{
			flash("data_not_exists", '', 0);
		}
		
		$exsit = $this->studygroupmember->fields("*", array("member_id = '".$pb_userinfo["pb_userid"]."'", "studygroup_id = '".$_GET["id"]."'"));
		
		//var_dump($exsit);
		
		if(empty($exsit)) {
			$val["member_id"] = $pb_userinfo["pb_userid"];
			$val["studygroup_id"] = $_GET["id"];
			$val["created"] = strtotime(date("Y-m-d H:i:s"));
			$val["status"] = 0;
			
			$this->studygroupmember->save($val);
			
			$group = $this->studygroup->getInfoById($_GET["id"]);
			//var_dump($group);
			
			//send message to moderate
			//send message to owner
			$sms['content'] = mysql_real_escape_string("<a href='".URL."index.php?do=studypost&action=memberpage&id=".$user["id"]."'>".$user["first_name"]." ".$user["last_name"]."</a> đã xin tham gia nhóm <a href='".URL."index.php?do=studypost&action=group&id=".$group["id"]."'>".$group["subject_name"]."</a> của bạn");
			$sms['title'] = mysql_real_escape_string($user["first_name"]." ".$user["last_name"] . " xin tham gia nhóm của bạn");
					
			$sms['membertype_ids'] = '[6]';
					
			$result = $this->message->SendToUser($user['id'], $group["leader_id"], $sms);
		}
		//setFlash("Thành công", "<p>Bạn đã xin tham gia nhóm thành công. Đang đợi trưởng nhóm duyệt.</p>");
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
		//echo $member["online"];
		
		if(isset($_GET["id"]))
		{
			$school_id = $_GET["id"];
		}
		else
		{
			$school_id = $user["school_id"];
		}
		
		$groups = $this->studygroup->getList($school_id, $pb_userinfo["pb_userid"], true);
		$joined_groups = $this->studygroup->getList(null, $member["id"]);
		
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
		
		//get current school
		$school = $this->school->getInfoById($member["school_id"], $member["id"]);
		
		$groups = $this->studygroup->getList($member["school_id"], $member["id"], true);
		
		setvar("belongToMemberpage", $user["id"] == $member["id"]);
		setvar("joined_groups",$joined_groups);
		setvar("groups",$groups);
		setvar("groups_count",count($groups));
		setvar("school", $school);
		setvar("school_list", $school_list);
		setvar("member", $member);
		
		render("mordern/studypost/memberpage");
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
					
					$content = "<a style='font-weight:bold' href='".URL."index.php?do=studypost&action=memberpage&id=".$user["id"]."'>".$user["first_name"]." ".$user["last_name"]."</a> đã gửi lời mời kết bạn đến bạn";
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
			
			$vals["name"] = $attachment->file_full_url;
			$vals["member_id"] = $pb_userinfo["pb_userid"];
			$vals["created"] = date("Y-m-d H:i:s");
			
			$this->studymemberimage->save($vals);			
			
		}
		pheader("location:".$_SERVER["HTTP_REFERER"]);
	}
	
	function del_studypic()
	{
		if(isset($_GET["id"]))
		{
			$pb_userinfo = pb_get_member_info();
			$image = $this->studymemberimage->fields("*", array("member_id=".$pb_userinfo["pb_userid"], "id=".$_GET["id"]));
			//var_dump($image);
			if($image)
			{
				//echo getcwd()."/attachment/".$item."0000";
				unlink(getcwd()."/attachment/".$image["name"]);
				unlink(getcwd()."/attachment/".$image["name"].".medium.jpg");
				unlink(getcwd()."/attachment/".$image["name"].".small.jpg");
				
				$this->studymemberimagecomment->delAll(array("studymemberimage_id=".$image["id"]));
				$this->studymemberimage->del(intval($image["id"]));
			}
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
			$user = $this->member->getInfoById($_GET["id"]);
			
			setvar("member", $user);
			$this->render("studypost/ajaxStudypictureDetail");
		}
		
	}
	
	function postStudymemberimageDescription()
	{
		if(isset($_POST["description"]) && isset($_POST["id"]) && $_POST["id"] != '')
		{
			$pb_userinfo = pb_get_member_info();
			
			$image = $this->studymemberimage->saveField("description", $_POST["description"], intval($_POST["id"]), array("member_id=".$pb_userinfo["pb_userid"]));
			
			$des = $this->studymemberimage->field("description",array("id=".$_POST["id"]));
			
			$val["withbreak"] = str_replace("\n","<br />",$des);
			$val["normal"] = $_POST["description"];
			
			echo json_encode($val);
		}
	}
	
	function postStudymemberimageComment()
	{
		$pb_userinfo = pb_get_member_info();
		//var_dump($pb_userinfo);		
		$user = $this->member->getInfoById($pb_userinfo['pb_userid']);
				
		if(isset($_POST["data"]))
		{
			pb_submit_check('data');
			if($user){
				$val["member_id"] =$user["id"];
				
				$p = $this->studymemberimagecomment->read("*", intval($_POST["data"]["id"]));
				
				//$space_controller->setBaseUrlByUserId($p["member_id"], "offer");
				//$url = $space_controller->rewriteDetail("offer", $p['id']);		
				
				//if($pb_userinfo['pb_userid'] != $p["member_id"]) {
				//	//send message to owner
				//	$sms['content'] = mysql_real_escape_string("<a href='".$space_controller->rewrite($com['cache_spacename'])."'>".$memberfield["first_name"]." ".$memberfield["last_name"]."</a> đã bình luận cho rao vặt <a onclick='getOfferDetail(".$p["id"].", 1)' href='javascript:void(0)'>".pb_lang_split($p["title"])."</a> của bạn:<br />".$_POST["data"]["content"]."'");
				//	$sms['title'] = mysql_real_escape_string($pb_userinfo['pb_username']. " đã bình luận cho rao vặt ".$p["title"]." của bạn");
				//	$sms['membertype_ids'] = '[1][2][3]';
				//	$result = $this->message->SendToUser($pb_userinfo['pb_userid'], $p["member_id"], $sms);
				//	//var_dump($pb_userinfo['pb_userid']);
				//}
			}
			
			$val["studymemberimage_id"] = $_POST["data"]["id"];
			$val["content"] = $_POST["data"]["content"];
			$val["created"] = date('Y-m-d H:i:s');
			$this->studymemberimagecomment->save($val);			
		}
		
		if(isset($_POST["id"]))
		{
			$val["studymemberimage_id"] = intval($_POST["id"]);
		}
		
		$comments = $this->studymemberimagecomment->findAll("*", null, array("studymemberimage_id=".$val["studymemberimage_id"]), "created DESC");
		//var_dump($comments);
		foreach($comments as $key => $item)
		{
			$comments[$key]["user"] = $this->member->getInfoById($item['member_id']);
			
			$comments[$key]["created"] = df(strtotime($comments[$key]["created"]), 'd-m-Y H:i');
		}
		
		//var_dump($comments);
		setvar("comments", $comments);
		$this->render("studypost/studymemberimagecomment");
	}
	
	function change_logo_home()
	{
		uses("attachment");
		$pb_userinfo = pb_get_member_info();
		$attachment = new Attachment('upload_logo');

	
		if (!empty($_FILES['upload_logo']['name']) && $pb_userinfo["pb_userid"]) {
			$attachment->if_watermark = false;
			$attachment->if_thumb_middle = false;
			$attachment->if_logo = true;
			$attachment->rename_file = "company-ava-".$pb_userinfo["pb_userid"];
			$attachment->upload_process();
			$vals['picture'] = $attachment->file_full_url;
			$this->member->saveField('photo', $vals['picture'], intval($pb_userinfo["pb_userid"]));
			pheader("location:".$_POST["uri"]);
		}
	}
	
	function change_school_banner()
	{
		uses("attachment");
		$pb_userinfo = pb_get_member_info();
		$attachment_banner = new Attachment('upload_logo');

	
		if ($pb_userinfo["pb_userid"]) {
			$attachment_banner->upload_dir = "school".DS.gmdate("Y").gmdate("m").DS.gmdate("d");
			$attachment_banner->if_watermark = false;
			$attachment_banner->if_school_banner = true;
			$attachment_banner->if_thumb = false;
			$attachment_banner->rename_file = "school-banner-".$_POST["school_id"]."-".strtotime(date("Y-m-d H:i:s"));
			$attachment_banner->upload_process();
			$schoolval['banner'] = $attachment_banner->file_full_url;
			
			
			//create new image
			$val["created"] = date("Y-m-d H:i:s");
			$val["name"] = $schoolval['banner'];
			$val["school_id"] = $_POST["school_id"];
			
			$this->schoolimage->save($val);
			
			
			
			$this->school->saveField('banner', $schoolval['banner'], intval($_POST["school_id"]));
			pheader("location:".$_POST["uri"]);
		}
	}
	
	function change_school_logo()
	{
		uses("attachment");
		$pb_userinfo = pb_get_member_info();
		$attachment_logo = new Attachment('upload_logo');

	
		if ($pb_userinfo["pb_userid"]) {
			$attachment_logo->upload_dir = "school".DS.gmdate("Y").gmdate("m").DS.gmdate("d");
			$attachment_logo->if_watermark = false;
			$attachment_logo->if_logo = true;
			$attachment_logo->rename_file = "school-logo-".$_POST["school_id"];
			$attachment_logo->upload_process();
			$schoolval['logo'] = $attachment_logo->file_full_url;			
			
			$this->school->saveField('logo', $schoolval['logo'], intval($_POST["school_id"]));
			pheader("location:".$_POST["uri"]);
		}
	}
	
	function change_group_banner()
	{
		uses("attachment");
		$pb_userinfo = pb_get_member_info();
		$attachment_banner = new Attachment('upload_logo');

	
		if ($pb_userinfo["pb_userid"]) {
			$attachment_banner->upload_dir = "group".DS.gmdate("Y").gmdate("m").DS.gmdate("d");
			$attachment_banner->if_watermark = false;
			$attachment_banner->if_school_banner = true;
			$attachment_banner->if_thumb = false;
			$attachment_banner->rename_file = "group-banner-".$_POST["group_id"]."-".strtotime(date("Y-m-d H:i:s"));
			$attachment_banner->upload_process();
			$schoolval['banner'] = $attachment_banner->file_full_url;
			
			//create new image
			$val["created"] = date("Y-m-d H:i:s");
			$val["name"] = $schoolval['banner'];
			$val["group_id"] = $_POST["group_id"];
			
			$this->studygroupimage->save($val);
			
			
			$this->studygroup->saveField('banner', $schoolval['banner'], intval($_POST["group_id"]));
			pheader("location:".$_POST["uri"]);
		}
	}
	
	function change_group_logo()
	{
		uses("attachment");
		$pb_userinfo = pb_get_member_info();
		$attachment_logo = new Attachment('upload_logo');

	
		if ($pb_userinfo["pb_userid"]) {
			$attachment_logo->upload_dir = "school".DS.gmdate("Y").gmdate("m").DS.gmdate("d");
			$attachment_logo->if_watermark = false;
			$attachment_logo->if_logo = true;
			$attachment_logo->rename_file = "group-logo-".$_POST["group_id"];
			$attachment_logo->upload_process();
			$schoolval['logo'] = $attachment_logo->file_full_url;
			$this->studygroup->saveField('logo', $schoolval['logo'], intval($_POST["group_id"]));
			pheader("location:".$_POST["uri"]);
		}
	}
	
	function del_schoolbanner()
	{
		if(isset($_GET["id"]))
		{
			$pb_userinfo = pb_get_member_info();
			$image = $this->schoolimage->fields("*", array("id=".$_GET["id"]));
			$school = $this->school->read("*", $image["school_id"]);
			//var_dump($image);
			if($image && ($pb_userinfo["pb_userid"] == 1030 || $pb_userinfo["pb_userid"] == $school["leader_id"]))
			{
				//echo getcwd()."/attachment/".$item."0000";
				unlink(getcwd()."/attachment/".$image["name"]);
				unlink(getcwd()."/attachment/".$image["name"].".banner.jpg");
				
				$this->schoolimagecomment->delAll(array("schoolimage_id=".$image["id"]));
				$this->schoolimage->del(intval($image["id"]));
			}
		}
		pheader("location:".$_SERVER["HTTP_REFERER"]);
	}
	
	function del_studygroupbanner()
	{
		if(isset($_GET["id"]))
		{
			$pb_userinfo = pb_get_member_info();
			$image = $this->studygroupimage->fields("*", array("id=".$_GET["id"]));
			$group = $this->studygroup->read("*", $image["group_id"]);
			//var_dump($image);
			if($image && ($pb_userinfo["pb_userid"] == 1030 || $pb_userinfo["pb_userid"] == $group["leader_id"]))
			{
				//echo getcwd()."/attachment/".$item."0000";
				unlink(getcwd()."/attachment/".$image["name"]);
				unlink(getcwd()."/attachment/".$image["name"].".banner.jpg");
				
				$this->studygroupimagecomment->delAll(array("studygroupimage_id=".$image["id"]));
				$this->studygroupimage->del(intval($image["id"]));
			}
		}
		pheader("location:".$_SERVER["HTTP_REFERER"]);
	}
	
	function getSchoolpicDetail()
	{
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
			//get current school
			$school = $this->school->getInfoById($_GET["id"]);
			
			setvar("school", $school);
			$this->render("studypost/ajaxSchoolpicDetail");
		}
		
	}
	
	function postSchoolpicDescription()
	{
		if(isset($_POST["description"]) && isset($_POST["id"]) && $_POST["id"] != '')
		{
			$pb_userinfo = pb_get_member_info();
			
			$school_id = $this->schoolimage->field("school_id",array("id=".$_POST["id"]));
			$school = $this->school->read("*", $school_id);
			
			if ($pb_userinfo["pb_userid"] == 1030 || $pb_userinfo["pb_userid"] == $school["leader_id"])
			{
				$image = $this->schoolimage->saveField("description", $_POST["description"], intval($_POST["id"]));
			}
			
			$des = $this->schoolimage->field("description",array("id=".$_POST["id"]));
			
			$val["withbreak"] = str_replace("\n","<br />",$des);
			$val["normal"] = $_POST["description"];
			
			echo json_encode($val);
		}
	}
	
	function postSchoolpicComment()
	{
		$pb_userinfo = pb_get_member_info();
		//var_dump($pb_userinfo);		
		$user = $this->member->getInfoById($pb_userinfo['pb_userid']);
				
		if(isset($_POST["data"]))
		{
			pb_submit_check('data');
			if($user){
				$val["member_id"] = $user["id"];
				
				$p = $this->schoolimagecomment->read("*", intval($_POST["data"]["id"]));

			}
			
			$val["schoolimage_id"] = $_POST["data"]["id"];
			$val["content"] = $_POST["data"]["content"];
			$val["created"] = date('Y-m-d H:i:s');
			$this->schoolimagecomment->save($val);			
		}
		
		if(isset($_POST["id"]))
		{
			$val["schoolimage_id"] = intval($_POST["id"]);
		}
		
		$comments = $this->schoolimagecomment->findAll("*", null, array("schoolimage_id=".$val["schoolimage_id"]), "created DESC");
		//var_dump($comments);
		foreach($comments as $key => $item)
		{
			$comments[$key]["user"] = $this->member->getInfoById($item['member_id']);
			
			$comments[$key]["created"] = df(strtotime($comments[$key]["created"]), 'd-m-Y H:i');
		}
		
		//var_dump($comments);
		setvar("comments", $comments);
		$this->render("studypost/studymemberimagecomment");
	}
	
	function getStudygrouppicDetail()
	{
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
			//get current school
			$group = $this->studygroup->getInfoById($_GET["id"]);
			
			//get leader
			$group_leader = $this->member->getInfoById($group["leader_id"]);
			
			setvar("group", $group);
			setvar("group_leader", $group_leader);
			$this->render("studypost/ajaxStudygrouppicDetail");
		}
		
	}
	
	function postStudygrouppicDescription()
	{
		if(isset($_POST["description"]) && isset($_POST["id"]) && $_POST["id"] != '')
		{
			$pb_userinfo = pb_get_member_info();
			
			$group_id = $this->studygroupimage->field("group_id",array("id=".$_POST["id"]));
			$group = $this->studygroup->read("*", $group_id);
			
			if ($pb_userinfo["pb_userid"] == 1030 || $pb_userinfo["pb_userid"] == $group["leader_id"])
			{
				$image = $this->studygroupimage->saveField("description", $_POST["description"], intval($_POST["id"]));
			}
			
			$des = $this->studygroupimage->field("description",array("id=".$_POST["id"]));
			
			$val["withbreak"] = str_replace("\n","<br />",$des);
			$val["normal"] = $_POST["description"];
			
			echo json_encode($val);
		}
	}
	
	function postStudygrouppicComment()
	{
		$pb_userinfo = pb_get_member_info();
		//var_dump($pb_userinfo);		
		$user = $this->member->getInfoById($pb_userinfo['pb_userid']);
				
		if(isset($_POST["data"]))
		{
			pb_submit_check('data');
			if($user){
				$val["member_id"] = $user["id"];
				
				$p = $this->studygroupimagecomment->read("*", intval($_POST["data"]["id"]));

			}
			
			$val["studygroupimage_id"] = $_POST["data"]["id"];
			$val["content"] = $_POST["data"]["content"];
			$val["created"] = date('Y-m-d H:i:s');
			$this->studygroupimagecomment->save($val);			
		}
		
		if(isset($_POST["id"]))
		{
			$val["studygroupimage_id"] = intval($_POST["id"]);
		}
		
		$comments = $this->studygroupimagecomment->findAll("*", null, array("studygroupimage_id=".$val["studygroupimage_id"]), "created DESC");
		//var_dump($comments);
		foreach($comments as $key => $item)
		{
			$comments[$key]["user"] = $this->member->getInfoById($item['member_id']);
			
			$comments[$key]["created"] = df(strtotime($comments[$key]["created"]), 'd-m-Y H:i');
		}
		
		//var_dump($comments);
		setvar("comments", $comments);
		$this->render("studypost/studymemberimagecomment");
	}
	
	function getChatFriendList()
	{
		$pb_userinfo = pb_get_member_info();
		$user = $this->member->getInfoById($pb_userinfo["pb_userid"]);
		if(isset($_GET["id"]))
		{
			$members = $this->member->getFriendChatList($_GET["id"]);
			$online_list = $this->member->getOnlineChatList($user);
			//var_dump($online_list);
		}
		setvar("members",$members);
		setvar("online_list",$online_list);
		setvar("count_online_list", count($online_list));
		setvar("count",count($members));
		$this->render("studypost/getChatFriendList");
	}
	
	function group_accept()
	{
		$pb_userinfo = pb_get_member_info();
		
		$group = $this->studygroup->read("*", $_GET["group_id"]);
		
		if($pb_userinfo["pb_userid"] == 1030 || $pb_userinfo["pb_userid"] == $group["leader_id"])
		{
			$gm = $this->studygroupmember->field("id",array("member_id=".$_GET["id"],"studygroup_id=".$_GET["group_id"]));
			//var_dump($gm);
			$this->studygroupmember->saveField("status", 1, intval($gm));			
		}
		pheader("location:".$_SERVER["HTTP_REFERER"]);
	}
	
	function group_reject()
	{
		$pb_userinfo = pb_get_member_info();
		
		$group = $this->studygroup->read("*", $_GET["group_id"]);
		
		if($pb_userinfo["pb_userid"] == 1030 || $pb_userinfo["pb_userid"] == $group["leader_id"])
		{
			$gm = $this->studygroupmember->field("id",array("member_id=".$_GET["id"],"studygroup_id=".$_GET["group_id"]));
			//var_dump($gm);
			$this->studygroupmember->del(intval($gm));			
		}
		pheader("location:".$_SERVER["HTTP_REFERER"]);
	}
	
	function changeGroupLeader()
	{
		$pb_userinfo = pb_get_member_info();
		$group = $this->studygroup->read("*", $_GET["group_id"]);

		if($pb_userinfo["pb_userid"] == 1030)
		{
			$newleader = $this->member->fields("*",array("username='".$_GET["username"]."'"));
			if(!empty($newleader))
			{
				$this->studygroup->saveField("leader_id", $newleader["id"],intval($_GET["group_id"]));
				pheader("location:".$_SERVER["HTTP_REFERER"]);
			}
			else
			{
				echo "<meta charset='utf-8'>Tên người dùng không tồn tại..!<br /><br /><a href='#' onclick='history.go(-1)'>Quay trởi lại</a>";
			}
		}
		
	}
	
	function group_info_edit()
	{
		$group = $this->studygroup->read("*", $_GET["group_id"]);
		$group["info"] = $group[$_GET["type"]];
		setvar("group", $group);
		$this->render("studypost/group_info_edit");
	}
	
	function update_group_info()
	{
		$pb_userinfo = pb_get_member_info();
		$group = $this->studygroup->read("*", $_POST["group_id"]);

		if ($pb_userinfo["pb_userid"] == 1030 || $pb_userinfo["pb_userid"] == $group["leader_id"])
		{
			$this->studygroup->saveField($_POST["type"], $_POST["group-info-content"], intval($_POST["group_id"]));
		}
		
		echo '<script>window.parent.location.reload(false);</script>';
	}	
	function random_rate()
	{
		//$setting_file = "fb/auto_click.setting";
		//$json = file_get_contents($setting_file);
		//$settings = json_decode($json, true);
		//if(!$settings) {
		//	$settings = array();
		//}
		
		uses("setting"); 
		$setting = new Settings();
		$row = $setting->findAll("*", null, array("variable='auto_click_settings'"));
		$settings = json_decode($row[0]["valued"], true);
		if(!$settings) {
			$settings = array();
		}
		//var_dump($settings);
		if(!empty($_POST["shop"]))
		{
			$settings["min_rand"] = $_POST["min_rand"];
			$settings["max_rand"] = $_POST["max_rand"];
			$settings["min_rate"] = $_POST["min_rate"];
			$settings["max_rate"] = $_POST["max_rate"];
			
			//$add = rand($_POST["min_rand"],$_POST["max_rand"]);
			//$sql = "update pb_companies set clicked=clicked+FLOOR((RAND() * ({$_POST["max_rand"]}-{$_POST["min_rand"]}+1))+{$_POST["min_rand"]}), new_clicked=new_clicked+FLOOR((RAND() * ({$_POST["max_rand"]}-{$_POST["min_rand"]}+1))+{$_POST["min_rand"]}) where clicked >= ".$_POST["min_rate"]." AND clicked <= ".$_POST["max_rate"]."";
			//echo "Thành công...!!<br /><br />";
			//
			//$return = $this->company->dbstuff->Execute($sql);
		}
		if(!empty($_POST["offer"]))
		{
			$settings["offer_min_rand"] = $_POST["offer_min_rand"];
			$settings["offer_max_rand"] = $_POST["offer_max_rand"];
			$settings["offer_min_rate"] = $_POST["offer_min_rate"];
			$settings["offer_max_rate"] = $_POST["offer_max_rate"];
			
			//$add = rand($_POST["offer_min_rand"],$_POST["offer_max_rand"]);
			//$sql = "update pb_trades set clicked=clicked+FLOOR((RAND() * ({$_POST["offer_max_rand"]}-{$_POST["offer_min_rand"]}+1))+{$_POST["offer_min_rand"]}) where clicked >= ".$_POST["offer_min_rate"]." AND clicked <= ".$_POST["offer_max_rate"]."";
			//echo "Thành công...!!<br /><br />";
			//
			//$return = $this->trade->dbstuff->Execute($sql);
		}
		
		$setting->saveField("valued",json_encode($settings),intval($row[0]["id"]));
		
		//write configs file
		setvar("setting",$settings);
		
		//file_put_contents( $setting_file , json_encode($settings));
		
		$this->render("studypost/random_rate");
	}
	
	function home() {
		uses("ad");
		$ad = new Adses();
		
		$pb_userinfo = pb_get_member_info();
		$user = $this->member->getInfoById($pb_userinfo["pb_userid"]);
		
		setvar("AreaOptions", $this->area->getAreaOptions('['.$_GET['area'].']'));
		setvar("SchoolsOptions", $this->school->getOptions('['.$_GET['school'].']'));
		
		//get ads for employee module
		$article_employees = $ad->getByZone(10);
		setvar("article_employee",$article_employees[0]);
		
		//get ads for employee module
		$article_jobs = $ad->getByZone(11);
		setvar("article_job",$article_jobs[0]);
		
		//get school list for school module
		$module_schools = $this->school->getList(null,0,5);
		setvar("module_schools", $module_schools);
		//get article for school module
		$article_schools = $ad->getByZone(12);
		setvar("article_school",$article_schools[0]);
		
		//get group list for school module
		$module_groups = $this->studygroup->getList(null, null, false, array(),$keyword,0,6);
		setvar("module_groups", $module_groups);
		
		//get learner list for school module
		$module_learners = $this->member->getStudyList($conditions, $keyword,0,10);
		foreach($module_learners as $key => $mem)
		{
			$module_learners[$key]["is_friend"] = $this->studyfriend->isFriend($user["id"], $mem["id"]);
			$module_learners[$key]["friended"] = $this->studyfriend->check($user["id"], $mem["id"]);
			$module_learners[$key]["friending"] = $friend_request = $this->studyfriend->getFriendRequest($user["id"], $mem["id"]);
		}
		setvar("module_learners", $module_learners);
		
		//get ads in
		$ads_top = $ad->getByZone(13);
		setvar("ads_top", $ads_top);
		setvar("ads_left_1", $ad->getByZone(14));
		setvar("ads_left_2", $ad->getByZone(15));
		setvar("ads_left_3", $ad->getByZone(16));
		setvar("ads_left_4", $ad->getByZone(17));
		setvar("ads_left_5", $ad->getByZone(18));
		setvar("ads_left_6", $ad->getByZone(19));
		setvar("ads_left_7", $ad->getByZone(20));
		setvar("ads_left_8", $ad->getByZone(21));
		
		
		//#################for rightbar#########
		setvar("ads_right", $ad->getByZone(22));
		//get student shops
		$student_shops = $this->company->getStudentShops(0, 15);
		setvar("student_shops", $student_shops["result"]);
		
		//get student service
		$student_services = $this->product->getStudentProducts(1, 0, 6);
		//var_dump($student_services);
		setvar("student_services", $student_services["result"]);
		
		//get student trades
		$student_trades = $this->trade->getStudentTrades(0, 10);
		setvar("student_trades", $student_trades);
		
		//get student product
		$student_discount_products = $this->product->getStudentDiscountProducts(0, 0, 6);		
		setvar("student_discount_products", $student_discount_products["result"]);
		//######################################
		
		$this->render("studypost/home");
	}
}
?>