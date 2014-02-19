<?php
/**
 *      [PHPB2B] Copyright (C) 2007-2099, Ualink Inc. All Rights Reserved.
 *      The contents of this file are subject to the License; you may not use this file except in compliance with the License. 
 *
 *      @version $Revision: 2075 $
 */
require("../libraries/common.inc.php");
require("room.share.php");
require(PHPB2B_ROOT.'./libraries/page.class.php');
require(CACHE_COMMON_PATH."cache_type.php");
uses("companynews", "typeoption");
check_permission("companynews");
$companynews = new Companynewses();
$typeoption = new Typeoption();
$tables = $companynews->getTable(true);
$tpl_file = "news";
$page = new Pages();
setvar("CompanynewsTypes", $_PB_CACHE['companynewstype']);
if(isset($company_id)){
	$conditions = "company_id=".$company_id;
}

if (isset($_GET['typeid']) && $_GET['typeid'] == 9) {
	$conditions .= " and type_id=9";
	setvar('typeid', 9);
}
else
{
	$conditions .= " and type_id!=9";
}

if (!$company->Validate($companyinfo)) {
	flash("pls_complete_company_info", "company.php", 0);
}
if (isset($_GET['do'])) {
	$do = trim($_GET['do']);
	if (!empty($_GET['id'])) {
		$id = intval($_GET['id']);
	}
	if ($do == "edit") {
		$company->newCheckStatus($companyinfo['status']);
		if(!empty($id)){
			//echo $id;
			$res = $companynews->read("Companynews.id AS ID,title AS Title,content AS Content,type_id,created AS CreateDate",intval($id));
			//var_dump($res);
			setvar("item",$res);
			setvar("ShowCaption","none");
		}
		$tpl_file = "news_edit";
		template($tpl_file);
		exit;
	}
}
if (isset($_POST['save'])) {
	pb_submit_check('title');
	$vals = null;
	$vals['title'] = trim($_POST['title']);
	$vals['content'] = trim($_POST['content']);
	$vals['type_id'] =$_POST['type_id'];
	
	if (isset($_POST['typeid'])) {
		$vals["type_id"] = intval($_POST['typeid']);
	}
	
	$now_companynews_amount = $companynews->findCount(null, "created>".$today_start." AND member_id=".$the_memberid);
    //if ($g['companynews_check']) {
    //    $vals['status'] = 0;
    //    $msg = 'msg_wait_check';
    //}else {
        $vals['status'] = 1;
        $msg = 'success';
    //}
    //echo $_POST['newsid']."Sdsdsd";
	if(!empty($_POST['newsid'])){
		$vals['modified'] = $time_stamp;
		$companynews->save($vals, "update",intval($_POST['newsid']),null, "member_id=".$the_memberid);
		pheader("location:news.php?action=list");
	}else {
    	if ($g['max_companynews'] && $now_companynews_amount>=$g['max_companynews']) {
    		flash('one_day_max');
    	}
		$vals['created'] = $time_stamp;
		$vals['member_id'] = $the_memberid;
		$vals['company_id'] = $company_id;
		$result = $companynews->save($vals);
		
		if (isset($_POST['typeid'])) {
			pheader("location:news.php?action=list&typeid=".$_POST['typeid']);
		}else{
			pheader("location:news.php?action=list");
		}
	}
}
if (isset($_POST['del'])) {
	//echo "sdfsdfsdf";
	//var_dump($conditions);
	$result = $companynews->del($_POST['newsid'], $conditions);
	if ($result) {
		//flash("success");
	}else {
		//flash("action_failed");
	}
}
$amount = $companynews->findCount(null, $conditions);
$page->setPagenav($amount);
$fields = "title as CompanynewsTitle,content,status,created,type_id,id as CompanynewsId";
$result = $companynews->findAll($fields,null, $conditions,"id DESC",$page->firstcount,$page->displaypg);
setvar("CheckStatus", $typeoption->get_cache_type("check_status"));
for($i=0;$i<count($result);$i++){
	$result[$i]['pubdate'] = df($result[$i]['created'], 'd-m-Y');
	
	$result[$i]['created_d'] = date('d', $result[$i]['created']);
	$result[$i]['created_f'] = date('m', $result[$i]['created']);
	$result[$i]['created_y'] = date('Y', $result[$i]['created']);
	$result[$i]['created_time'] = date('h:i a', $result[$i]['created']);
}
setvar("Items", $result);
setvar("ByPages",$page->pagenav);
template($tpl_file);
?>