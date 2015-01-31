<?php
if(!defined('IN_PHPB2B')) exit('Not A Valid Entry Point');
setvar("service_page",1);
setvar("pagetitle","Dịch vụ");
if(detectMobile()) {
    setvar("tree_type","service");
	$space->render_mobile("space/product");
} else {
	pheader("location: /".$member->info['space_name']);
}

?>