<?php
class Studypost extends PbController {
	var $name = "studypost";

	function Studypost()
	{
		$this->loadModel("studypost");
		$this->loadModel("member");
	}

	function index()
	{
		
	}
	
	function school()
	{
		//cleanEditorFile
		//$studyposts = $this->studypost->
		
		render("studypost/school");
	}
	
	function post()
	{
		$pb_userinfo = pb_get_member_info();
		
		if(!isset($_POST["studypost"]))
		{
			flash("data_not_exists", '', 0);
		}
		$studypost = $_POST["studypost"];
		
		if(!empty($studypost["school_id"]))
		{
			pb_submit_check('studypost');
			$studypost["member_id"] = $pb_userinfo["pb_userid"];
			$studypost["created"] = date("Y-m-d H:i:s");
			$studypost["modified"] = date("Y-m-d H:i:s");
			
			var_dump($studypost);
			
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
		
		if(!empty($studypost["school_id"]) && !empty($studypost["id"]))
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
			$this->studypost->del(intval($item["id"]));
		}
	}
	
	function ajaxLoadStudyposts()
	{
		$pb_userinfo = pb_get_member_info();
		$user = $this->member->getInfoById(intval($pb_userinfo["pb_userid"]));
		
		$conditions = array();
		
		if(isset($_GET["type"]) && $_GET["type"] == "school")
		{
			$conditions[] = "member_id = ".$user["id"];
			$conditions[] = "school_id = ".$user["school_id"];
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
		}
		
		setvar("List", $studyposts);
		
		render("studypost/ajaxLoadStudyposts");
	}

}
?>