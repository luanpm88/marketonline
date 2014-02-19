<?php
/**
 *      [PHPB2B] Copyright (C) 2007-2099, Ualink Inc. All Rights Reserved.
 *      The contents of this file are subject to the License; you may not use this file except in compliance with the License. 
 *
 *      @version $Revision: 2075 $
 */
require("../libraries/common.inc.php");

$check = true;

require("room.share.php");
require(PHPB2B_ROOT.'./libraries/page.class.php');
require(CACHE_COMMON_PATH."cache_type.php");
uses("employee","language","typeoption","area","jobindust","member","employeeexperience","employeeeducation","employeereference");

$employee = new Employees();
$language = new Languages();

$area = new Areas();
$jobindust = new Jobindusts();

$typeoption = new Typeoption();

$member = new Members();

$employeeexperience = new Employeeexperiences();
$employeeeducation = new Employeeeducations();
$employeereference = new Employeereferences();

$page = new Pages();
$page->displaypg = 10;

$tpl_file = "employee";

if (isset($_GET['do'])) {
	$do = trim($_GET['do']);
	if (isset($_GET['id'])) {
		$id = intval($_GET['id']);
	}
	if($do=="del" && !empty($id)){
		$employee->del($id, "member_id=".$the_memberid);
	}
	if($do == "edit"){
		if(!empty($id)){
			$res = $employee->read("*", $id, null, "Employee.member_id=".$the_memberid);
			if (empty($res)) {
				flash("action_failed");
			}
			
			$res["languages"] = substr($res["languages"],1,strlen($res["languages"])-2);
			$res["languages"] = explode("][", $res["languages"]);
			foreach($res["languages"] as $key => $item)
			{
				$res["languages"][$key] = explode(",", $item);
			}
			$res["salary"] = number_format($res["salary"], 0, ',', '.');
			
			
			setvar("item",$res);
		}
		
		setvar("language_options",$language->getListOptions());
		setvar("JobProficiencies", $typeoption->get_cache_type("job_proficiency"));
		setvar("LanguageLevels", $typeoption->get_cache_type("language_level"));
		
		setvar("JobindustOptions", $jobindust->getTypeOptions($res["jobindusts"]));
		setvar("AreaOptions", $area->getAreaOptions($res["areas"]));
		
		$tpl_file = "employee_edit";
		template($tpl_file);
		exit;
	}
	else if($do == "step2"){
		if(!empty($id)){
			$res = $employee->read("*", $id, null, "Employee.member_id=".$the_memberid);
			if (empty($res)) {
				flash("action_failed");
			}
			
			//user info
			$memberinfo = $member->getInfoById($the_memberid);
			
			//
			$expers = $employeeexperience->findall("*", null, array("employee_id=".$res["id"]),"order_num");
			if($expers){
				$result = '<div class="list_item_employeebox">';
				foreach($expers as $item) {
					$result .= '<div class="boxitem" rel="'.$item["id"].'">';
					
					$result .= '<h4>'.$item["job_title"].'</h4>';
					$result .= '<strong>'.$item["company_name"].'</strong>';
					$result .= '<em> - Tháng '.$item["startmonth"].'/'.$item["startyear"].' - ';
					$result .= $item["current"] == "on"?'hiện tại</em>':'Tháng '.$item["endmonth"].'/'.$item["endyear"].'</em>';
					$result .= '<div class="employee_content">'.$item["content"].'</div>';
					$result .= '<div class="controls"><a href="javascript:void(0)" class="more">Xem thêm</a><a href="javascript:void(0)" class="edit">Cập nhật</a><a href="javascript:void(0)" class="delete">Xóa</a><a href="javascript:void(0)" class="down">Đưa xuống</a><a href="javascript:void(0)" class="up">Đưa lên</a></div>';
					
						$result .= '<div class="formdata">';
						foreach($item as $key => $value)
						{
							$result .= '<span class="'.$key.'">'.$value.'</span>';
						}
						$result .= '</div>';
						
					$result .= '</div>';	
				}
				$result .= '</div>';
				$res["employeeexperience"] = $result;
			}
			
			//
			$expers = $employeeeducation->findall("*", null, array("employee_id=".$res["id"]),"order_num");
			if($expers){
				$result = '<div class="list_item_employeebox">';
				foreach($expers as $item) {
					$result .= '<div class="boxitem" rel="'.$item["id"].'">';
					
					$result .= '<h4>'.$item["school_name"].'</h4>';
					$result .= '<strong>'.$item["level_id"].'</strong>';
					
					if($item["startmonth"] != "0" && $item["startyear"] != "0" && (($item["endmonth"] != "0" && $item["endyear"] != "0") || $item["current"] == "on")) {
						$result .= '<em> - Tháng '.$item["startmonth"].'/'.$item["startyear"].' - ';
						$result .= $item["current"] == "on"?'hiện tại</em>':'Tháng '.$item["endmonth"].'/'.$item["endyear"].'</em>';
					}
					
					$result .= '<div class="employee_content">'.$item["content"].'</div>';
					$result .= '<div class="controls"><a href="javascript:void(0)" class="more">Xem thêm</a><a href="javascript:void(0)" class="edit">Cập nhật</a><a href="javascript:void(0)" class="delete">Xóa</a><a href="javascript:void(0)" class="down">Đưa xuống</a><a href="javascript:void(0)" class="up">Đưa lên</a></div>';
					
						$result .= '<div class="formdata">';
						foreach($item as $key => $value)
						{
							$result .= '<span class="'.$key.'">'.$value.'</span>';
						}
						$result .= '</div>';
							
					$result .= '</div>';	
				}
				$result .= '</div>';
				$res["employeeeducation"] = $result;
			}
			
			//
			$expers = $employeereference->findall("*", null, array("employee_id=".$res["id"]),"order_num");
			if($expers){
				$result = '<div class="list_item_employeebox">';
				foreach($expers as $item) {
					$result .= '<div class="boxitem" rel="'.$item["id"].'">';
					
						$result .= '<h4>'.$item["name"].'</h4>';
						$result .= '<strong>'.$item["company"].'</strong>';
						$result .= '<em> - '.$item["title"].'</em>';
						$result .= '<div class="employee_content">Email: '.$item["email"].($item["phone"]?' - Điện thoại: '.$item["phone"]:"").' </div>';
						$result .= '<div class="controls"><a href="javascript:void(0)" class="more">Xem thêm</a><a href="javascript:void(0)" class="edit">Cập nhật</a><a href="javascript:void(0)" class="delete">Xóa</a><a href="javascript:void(0)" class="down">Đưa xuống</a><a href="javascript:void(0)" class="up">Đưa lên</a></div>';
						
						$result .= '<div class="formdata">';
						foreach($item as $key => $value)
						{
							$result .= '<span class="'.$key.'">'.$value.'</span>';
						}
						$result .= '</div>';
							
						$result .= '</div>';
				}
				$result .= '</div>';
				$res["employeereference"] = $result;
			}
					
					
			
			setvar("item",$res);
			setvar("memberinfo",$memberinfo);
			
			setvar("JobindustOptions", $jobindust->getTypeOptions());
			setvar("JobProficiencies", $typeoption->get_cache_type("job_proficiency"));
			
			$tpl_file = "employee_step2";
			template($tpl_file);
			exit;
		}
		else
		{
			flash("action_failed");
		}
	}
	else if($do == "finish"){
		if(!empty($id)){
			$res = $employee->read("*", $id, null, "Employee.member_id=".$the_memberid);
			if (empty($res)) {
				flash("action_failed");
			}
			$edu_count = count($employeeeducation->findall("*", null, array("employee_id=".$res["id"]),"order_num"));
			if(!$hasProfile || empty($res["skills"]) || empty($res["career_objective"]) || !$edu_count)
			{
				flash("action_failed");
			}
			else
			{
				$employee->saveField("status", 1, intval($res["id"]), "member_id=".$the_memberid);
				$tpl_file = "employee";
			}
		}
		else
		{
			flash("action_failed");
		}
	} else if ($do == "setShowed") {
		switch ($_GET['type']) {
			case "up":
				$state = 1;
				break;
			case "down":
				$state = 0;
				break;
			default:
				$state = 0;
				break;
		}
		if (!empty($id)) {
			$vals['showed'] = $state;
			$updated = $pdb->Execute("UPDATE {$tb_prefix}employees SET `showed`={$state} WHERE id={$id} AND member_id={$the_memberid}");
		}
		header('Location: '.$_SERVER['HTTP_REFERER']);
	} else if ($do == "setSearched") {
		switch ($_GET['type']) {
			case "up":
				$state = 1;
				break;
			case "down":
				$state = 0;
				break;
			default:
				$state = 0;
				break;
		}
		if (!empty($id)) {
			$vals['searched'] = $state;
			$updated = $pdb->Execute("UPDATE {$tb_prefix}employees SET searched={$state} WHERE id={$id} AND member_id={$the_memberid}");
		}
		header('Location: '.$_SERVER['HTTP_REFERER']);
	}
}

if (!empty($_POST['employee']) && $_POST['save']) {
	$vals = $_POST['employee'];
	pb_submit_check('employee');
	
	if (isset($_POST['id'])) {
		$id = $_POST['id'];
	}
	
	$vals["newgrad"] = $vals["newgrad"] == "on"?1:0;
	
	//languages
	if(!empty($_POST["languages"]))
	{
		foreach($_POST["languages"] as $lang)
		{
			if($lang["name"] != "0" && $lang["level"] != "0")
			{
				$vals["languages"] .= "[".$lang["name"].",".$lang["level"]."]";
			}
		}
	}
	
	if(!empty($vals["searched"]))
	{
		$vals["searched"] = 1;
	}
	else
	{
		$vals["searched"] = 0;
	}
	
	$vals['areas'] = "[".implode("][", $_POST['areas'])."]";
	$vals['jobindusts'] = "[".implode("][", $_POST['jobindusts'])."]";
	$vals["salary"] = str_replace(".", "", $vals["salary"]);
	
	if(!empty($id)){
		$vals['modified'] = $time_stamp;
		$result = $employee->save($vals, "update", $id, null, "member_id=".$the_memberid);
	}
	else
	{
		$vals['created'] = $vals['modified'] = $time_stamp;
		$vals['company_id'] = $companyinfo['id'];
		$vals['member_id'] = $the_memberid;
		
		$result = $employee->save($vals);
		$insert_id = $employee->table_name."_id";
		$id = $employee->$insert_id;
	}
	
	if($result)
	{
		header('Location: employee.php?do=step2&id='.$id);
	}
}

$result = $employee->findAll("*", null, "Employee.member_id=".$the_memberid, "id DESC", 0, 50);
if (!empty($result)) {
	for ($i=0; $i<count($result); $i++){
		$result[$i]['pubdate'] = date("d/m/Y", $result[$i]["created"]);		
	}
	setvar("Items",$result);
}

$amount = $employee->findCount(null, "Employee.member_id=".$the_memberid,"Employee.id DESC");
$page->setPagenav($amount);

template($tpl_file);
?>