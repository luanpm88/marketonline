<?php
/**
 *      [PHPB2B] Copyright (C) 2007-2099, Ualink Inc. All Rights Reserved.
 *      The contents of this file are subject to the License; you may not use this file except in compliance with the License. 
 *
 *      @version $Revision: 2238 $
 */
require("../libraries/common.inc.php");
require("room.share.php");
require(LIB_PATH .'time.class.php');
uses("job", "typeoption", "area", "industry", "jobtype", "jobcat", "jobindust");
check_permission("job");
$job = new Jobs();
$area = new Areas();
$industry = new Industries();
$typeoption = new Typeoption();
$jobtypes = new Jobtypes();
$jobcats = new Jobcats();
$jobindusts = new Jobindusts();
$tpl_file = "job";
if (!$company->Validate($companyinfo)) {
	flash("pls_complete_company_info", "company.php", 0);
}
if (isset($_GET['do'])) {
	$do = trim($_GET['do']);
	if (isset($_GET['id'])) {
		$id = intval($_GET['id']);
	}
	if($do=="del" && !empty($id)){
		$job->del($id, "member_id=".$the_memberid);
	}
	if($do == "edit"){
		setvar("Genders", $typeoption->get_cache_type('gender'));
		setvar("Educations", $typeoption->get_cache_type('education'));
		setvar("Salary", $typeoption->get_cache_type('salary'));
		setvar("Worktype", $typeoption->get_cache_type('work_type'));
		setvar("JobtypeOptions", $jobtypes->getTypeOptions());
		
		if(!empty($id)){
			$res = $job->read("*", $id, null, "Job.member_id=".$the_memberid);
			if (empty($res)) {
				flash("action_failed");
			}
			$res['expire_date'] = df($res['expire_time']);
			
			$res['expired_dates'] = date('d/m/Y', $res['expired_dates']);
			$res["salary"] = number_format($res["salary"], 0, ',', '.');
			
			$r1 = $industry->disSubOptions($res['industry_id'], "industry_");
			$r2 = $area->disSubOptions($res['area_id'], "area_");
			$res = am($res, $r1, $r2);
			setvar("item",$res);
		}
		
		setvar("JobcatOptions", $jobcats->getTypeOptions($res["jobcats"]));
		setvar("JobindustOptions", $jobindusts->getTypeOptions($res["jobindusts"]));
		
		$tpl_file = "job_edit";
		template($tpl_file);
		exit;
	}
}
if (!empty($_POST['job']) && $_POST['save']) {
	$vals = $_POST['job'];
	pb_submit_check('job');
	$now_job_amount = $job->findCount(null, "created>".$today_start." AND member_id=".$the_memberid);
	if (isset($_POST['id'])) {
		$id = $_POST['id'];
	}
	if(!empty($_POST['expire_time'])) {
		$vals['expire_time'] = Times::dateConvert($_POST['expire_time']);
	}
	$check_job_update = $g['job_check'];
	//if ($check_job_update=="0") {
		$vals['status'] = 1;
        	$message_info = 'success';
	//}else {
	//	$vals['status'] = 0;
	//	$message_info = 'msg_wait_check';
	//}
	$vals['industry_id'] = PbController::getMultiId($_POST['industry']['id']);
	$vals['area_id'] = PbController::getMultiId($_POST['area']['id']);
    
	$vals['jobcats'] = "[".implode("][", $_POST['jobcats'])."]";
	$vals['jobindusts'] = "[".implode("][", $_POST['jobindusts'])."]";
	//echo $vals['jobcats'];
	//echo $vals['expired_dates'].strtotime($vals['expired_dates']);
	$custom_indust_ids = array();
	if(isset($_POST["custom_indust"])) {
		$custom_industs = explode(",", $_POST["custom_indust"]);
		foreach($custom_industs as $item) {
			$item = trim($item);
			if($item) {
				$exsit = $jobindusts->findAll("id,name",null,array("LOWER(name) = '".strtolower($item)."'"));
				if(count($exsit)) {
					$exsit = $exsit[0];
					$custom_indust_ids[] = $exsit["id"];
				}
				else
				{
					$jobindusts->save(array("name"=>$item,"`group`"=>"zzzKhác"));
					$tbname = (is_null($tbname))? $jobindusts->getTable():trim($tbname);
					$insert_key = $tbname."_id";
					$custom_indust_ids[] =  $jobindusts->$insert_key;
				}
			}
		}
	}
	//var_dump($custom_indust_ids);
	if(count($custom_indust_ids)) {
		$vals['jobindusts'] .= "[".implode("][", $custom_indust_ids)."]";
	}
	
	$vals['expired_dates'] = str_replace('/', '-', $vals['expired_dates']);
	$vals['expired_dates'] = strtotime($vals['expired_dates']);
	//echo date('Y-m-d', $vals['expired_dates']);
	
	$vals["salary"] = str_replace(".", "", $vals["salary"]);
    
	if(!empty($id)){
		$vals['modified'] = $time_stamp;
		$result = $job->save($vals, "update", $id, null, "member_id=".$the_memberid);
	}else{
    	if ($g['max_job'] && $now_job_amount>=$g['max_job']) {
    		flash('one_day_max');
    	}
		$vals['created'] = $vals['modified'] = $time_stamp;
		$vals['company_id'] = $companyinfo['id'];
		$vals['member_id'] = $the_memberid;
		$vals['cache_spacename'] = $pdb->GetOne("SELECT space_name FROM {$tb_prefix}members WHERE id=".$the_memberid);
		$result = $job->save($vals);
	}
	if(!$result){
		//flash();
	}else{
		//flash($message_info);
	}
	//var_dump($_POST);
}
$result = $job->findAll("*", null, "Job.member_id=".$the_memberid, "id DESC", 0, 50);
if (!empty($result)) {
	for ($i=0; $i<count($result); $i++){
		$result[$i]['pubdate'] = date("d/m/Y", $result[$i]["created"]);
		$result[$i]['expire_date'] = date("d/m/Y", $result[$i]["expired_dates"]);
	}
	setvar("Items",$result);
}


//$date = '03/11/2010';
//$date = str_replace('/', '-', $date);
//echo date('Y-m-d', strtotime($date));

$job_status = explode(",",L('product_status', 'tpl'));
setvar("CheckStatus", $job_status);
setvar("Worktype", $typeoption->get_cache_type("work_type"));
setvar("Salary", $typeoption->get_cache_type("salary"));
template($tpl_file);
?>