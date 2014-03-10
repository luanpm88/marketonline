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
				}
				else
				{
					echo "0";
				}
			}
		}
	}
}
?>