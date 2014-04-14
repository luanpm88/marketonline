<?php
/**
 *      [PHPB2B] Copyright (C) 2007-2099, Ualink Inc. All Rights Reserved.
 *      The contents of this file are subject to the License; you may not use this file except in compliance with the License. 
 *
 *      @version $Revision: 2048 $
 */
if(!defined('IN_PHPB2B')) exit('Not A Valid Entry Point');
uses("job","typeoption", "jobtype", "area");
$area = new Areas();
$job = new Jobs();
$jobtype = new Jobtypes();
$conditions = "Job.status=1 AND company_id=".$COMPANY_CURRENT['id'];
if (isset($_GET['nid'])) {
	$id = intval(($_GET['nid']));
	//echo $id."sdfsdf";
	if ($id) {
		$info = $job->read("*", $id, null, $conditions);
		//echo $conditions;
		//var_dump($info);
		
		$jtype = $jobtype->read("*", $info["jobtype_id"], null, null);
		//var_dump($jtype);
		
		$info["type_name"] = $jtype["name"];
		
		$info["area"] = $area->getFullName($info["area_id"]);
		
		$info['expired_dates'] = date("d/m/Y", $info["expired_dates"]);
		
		$info["salary"] = number_format($info["salary"], 0, ',', '.');
		
		if (empty($info)) {
			flash('data_not_exists', null, 0);
		}
		$sql = "UPDATE {$tb_prefix}jobs SET clicked=clicked+1 WHERE id=".$id." AND status=1 AND company_id='".$company->info['id']."'";
		$pdb->Execute($sql);
		$tpl_file = "job_detail";
		setvar("item",$info);
		$space->render($tpl_file);
		exit;
	}
}
$amount = $job->findCount(null, $conditions,"id");
setvar("paging", array('total'=>$amount));
$space->render("job");
?>