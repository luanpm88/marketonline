<?php
/**
 *      [PHPB2B] Copyright (C) 2007-2099, Ualink Inc. All Rights Reserved.
 *      The contents of this file are subject to the License; you may not use this file except in compliance with the License. 
 *
 *      @version $Revision: 2238 $
 */
require("../libraries/common.inc.php");

$check = true;

require("room.share.php");
uses("attachment", "typeoption", "area", "school", "subject", "studygroup", "studygroupmember");
$attachment = new Attachment('photo');
$attachment->if_logo = true;

$attachment_logo = new Attachment('other_school_logo');
$attachment_logo->if_logo = true;

$attachment_banner = new Attachment('other_school_banner');

$member = new Members();
$area = new Areas();
$member_controller = new Member();
$typeoption = new Typeoption();
$school = new Schools();
$subject = new Subjects();
$studygroup = new Studygroups();
$studygroupmember = new Studygroupmembers();
$conditions = null;
//var_dump($_POST);
if (isset($_POST['save'])) {
	pb_submit_check('member');
	$vals['office_redirect'] = $_POST['member']['office_redirect'];
	$vals['email'] =  $_POST['member']['email'];
	
	//for other school
		if($_POST['other_school'] == "on")
		{			
			$schoolexsit = $school->fields("*", array("LOWER(name) = '".trim($_POST['other_school_name'])."'"));
			//var_dump($schoolexsit);
			if(!$schoolexsit)
			{
				$schoolval["name"] = trim($_POST['other_school_name']);
				$schoolval["address"] = trim($_POST['other_school_addres']);
				$schoolval["phone"] = trim($_POST['other_school_phone']);
				$schoolval["email"] = trim($_POST['other_school_email']);
				$schoolval["website"] = trim($_POST['other_school_website']);
				$schoolval["area_id"] = PbController::getMultiId($_POST['other_school_area']['id']);
				$schoolval["member_id"] = $the_memberid;
				$schoolval["leader_id"] = $the_memberid;
				
				//logo and banner
				if (!empty($_FILES['other_school_logo'])) {
					$attachment_logo->upload_dir = "school".DS.gmdate("Y").gmdate("m").DS.gmdate("d");
					$attachment_logo->if_watermark = false;
					$attachment_logo->rename_file = "school-logo-".$the_memberid;
					$attachment_logo->upload_process();
					$schoolval['logo'] = $attachment_logo->file_full_url;
				}
				if (!empty($_FILES['other_school_banner'])) {
					$attachment_banner->upload_dir = "school".DS.gmdate("Y").gmdate("m").DS.gmdate("d");
					$attachment_banner->if_watermark = false;
					$attachment_banner->if_school_banner = true;
					$attachment_banner->if_thumb = false;
					$attachment_banner->rename_file = "school-banner-".$the_memberid;
					$attachment_banner->upload_process();
					$schoolval['banner'] = $attachment_banner->file_full_url;
				}
				
				$schoolval["created"] = strtotime(date('Y-m-d H:i:s'));
				
				$school->save($schoolval);
				$insert_key = $school->table_name."_id";
				$_POST['memberfield']['school_id'] = $school->$insert_key;
				//var_dump($school->$insert_key);
			}
			else
			{
				$_POST['memberfield']['school_id'] = $schoolexsit["id"];
			}
		}
		
	
	//SUBJECTS
		$subject_main_array = array();
		//for other subject
		if($_POST['other_subject'] == "on")
		{
			$subject_string = $_POST['other_subject_name'];
			$subject_array = explode(',', $subject_string);
			
			foreach($subject_array as $mon) {
				if($mon) {
					$mon = trim($mon);
					
					$subjectexsit = $subject->fields("*", array("name = '".$mon."'"));
					
					if(!$subjectexsit)
					{
						$subjectval["name"] = $mon;
						$subjectval["created"] = strtotime(date('Y-m-d H:i:s'));
						
						//save new subject
						$subject->save($subjectval);
						$insert_key = $subject->table_name."_id";
						$subject_add_id = $subject->$insert_key;
					}
					else
					{
						$subject_add_id = $subjectexsit["id"];
					}
					
					$subject_main_array[] = $subject_add_id;
				}
			}
		}
		//for selected subject
		if(is_array($_POST["subjects_id"])) $subject_main_array = array_merge($_POST["subjects_id"],$subject_main_array);
		
		//update studygroups
		$studygroup_ids = $studygroup->updateGroups($_POST['memberfield']['school_id'], $subject_main_array, $the_memberid);
		
		//connect member to group
		$studygroupmember->addMember($studygroup_ids, $the_memberid);
		
	
	if (isset($_POST['image_tmp']) && !empty($_POST['image_tmp']))
	{
		$vals['photo'] = $_POST['image_tmp'];
	}
	
	if (empty($_POST['member']['email'])) {
		unset($vals['email']);
	}
	if (!empty($_FILES['photo']['name'])) {
		$attachment->upload_dir = "profile".DS.gmdate("Y").gmdate("m").DS.gmdate("d");
		$attachment->insert_new = false;
		$attachment->if_orignal = false;
		$attachment->if_watermark = false;
		$attachment->rename_file = "photo-".$the_memberid;
		$attachment->upload_process();
		$vals['photo'] = $attachment->file_full_url;
	}
	
	$_POST['memberfield']['area_id'] = PbController::getMultiId($_POST['area']['id']);
	$result = $member->save($vals, "update", $the_memberid);
	$memberfield->primaryKey = "member_id";
	//var_dump($_POST['memberfield']);
	$result = $memberfield->save($_POST['memberfield'], "update", $the_memberid);
	$member->clearCache($the_memberid);
	$member->updateMemberCaches($the_memberid);
	if(isset($_POST['personal']['resume_status']))
	$result = $pdb->Execute("REPLACE INTO {$tb_prefix}personals (member_id,resume_status,max_education) VALUE (".$the_memberid.",'".$_POST['personal']['resume_status']."','".$_POST['personal']['max_education']."')");
	if(!$result){
		//flash('action_failed');
	}else{	
		if(!$hasCompany && $meminfo != 1 && $meminfo != 4 && $meminfo != 6)
		{
			pheader('location:company.php');
		}
		else if($meminfo == 1)
		{
			pheader('location:company.php');
		}
		else if($meminfo == 4)
		{
			pheader('location:employee.php');
		}
		else if($meminfo == 6)
		{
			pheader('location:../index.php?do=studypost&action=memberpage&id='.$the_memberid);
		}
		else
		{
			flash('success');
		}
	}
}
setvar("Genders", $typeoption->get_cache_type('gender', null, array(-1)));
setvar("Educations", $typeoption->get_cache_type('education'));
setvar("OfficeRedirects", explode(",", L("office_redirects", "tpl")));
setvar("Schools",$school->getListOptions());

//$memberinfo["studygroup_ids"] = $studygroupmember->getGroupsByMember($the_memberid);
setvar("Subjects",$subject->getListOptions($studygroupmember->getSubjectIdsByMember($the_memberid)));
//var_dump($studygroupmember->getSubjectIdsByMember($the_memberid));
$personal =  $pdb->GetRow("SELECT * FROM {$tb_prefix}personals WHERE member_id=".$the_memberid);

setvar("resume_status",$personal['resume_status']);
setvar("max_education",$personal['max_education']);
//echo $memberinfo['photo'];
if (!empty($memberinfo['photo'])) {
	$memberinfo['image'] = pb_get_attachmenturl($memberinfo['photo'], "../", "small")."?v=".rand(0,900);
}
if(strpos($memberinfo['photo'], "nopicture")) $memberinfo['photo'] = "";
$r2 = $area->disSubOptions($memberinfo['area_id'], "area_");
//echo $memberinfo["address"];
$memberinfo = am($memberinfo, $r2);
setvar("item",$memberinfo);

if(detectMobile()) {	
	$smarty->template_dir = PHPB2B_ROOT. "templates/default/mobile/office/";
	template("m_personal");
} else {

	template("personal");
}

?>