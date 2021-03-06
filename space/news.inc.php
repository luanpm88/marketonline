<?php
/**
 *      [PHPB2B] Copyright (C) 2007-2099, Ualink Inc. All Rights Reserved.
 *      The contents of this file are subject to the License; you may not use this file except in compliance with the License. 
 *
 *      @version $Revision: 2048 $
 */
if(!defined('IN_PHPB2B')) exit('Not A Valid Entry Point');
uses("companynews");
$companynews = new Companynewses();
$conditions = "Companynews.status='1' And Companynews.type_id != '9' And Companynews.company_id=".$company->info['id'];
if (isset($_GET['nid'])) {
	$id = intval($_GET['nid']);
	//echo $id;
	if ($id) {
		$info = $companynews->read("*", $id, null, null);
		//var_dump($info);
		if (empty($info)) {
			flash('data_not_exists', null, 0);
		}
		$tpl_file = "news_detail";
		
		//find images share
		$fb_images = findImagesFromHTML($info["content"]);
		
		setvar("item",$info);
		setvar("fb_images",$fb_images);
		setvar("fb_current_page",1);
		setvar("fb_no_logo",1);
		setvar("fb_description",substr(strip_tags($info["content"]),0,9999));
		
		setvar("pagetitle",$info["title"]);
		if(detectMobile()) {
			$space->render_mobile("space/news_detail");
		} else {
			$space->render($tpl_file);
		}
		
		exit;
	}
}
$amount = $companynews->findCount(null, $conditions,"Companynews.id");
setvar("paging", array('total'=>$amount));


//var_dump(detectMobile());
setvar("pagetitle","Tin tức");
if(detectMobile()) {
	$space->render_mobile("space/news");
} else {
	$space->render("news");
}

?>