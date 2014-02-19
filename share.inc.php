<?php
/**
 *      [PHPB2B] Copyright (C) 2007-2099, Ualink Inc. All Rights Reserved.
 *      The contents of this file are subject to the License; you may not use this file except in compliance with the License. 
 *
 *      @version $Revision: 2075 $
 */
$theme_name = "default";//templet
//if(is_dir(PHPB2B_ROOT. "templates/".$app_lang."/")) $theme_name = $app_lang;
$limit = 10;//site every page set.
$pos = 0;
if (isset($_GET['pos'])) {
	$pos = intval($_GET['pos']);
}
$_G['nav'] = cache_read("nav");
setvar("navs", $_G['nav']['navs']);
if(!MAGIC_QUOTES_GPC) {
	if(!empty($_GET)) $_GET = stripslashes_recursive($_GET);
	setvar("_G", am($G, $_GET, $_SERVER));
}
$style_name = !empty($G['site_style'])?$G['site_style']:"red";
$theme_name = !empty($G['site_theme'])?$G['site_theme']:$theme_name;
require(CACHE_LANG_PATH.'lang_site.php');
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
$ADODB_CACHE_DIR = DATA_PATH.'dbcache';
$theme_img_name = !empty($style_name)?"style/".$style_name."/":'';
$smarty->flash_layout = $theme_name."/flash";
$smarty->assign("theme_img_path", "templates/".$theme_name."/");
$smarty->assign("theme_style_path", "templates/".$style_name."/");
$smarty->assign("theme_style_name", $style_name);
$smarty->assign("theme_img_name", "templates/".$theme_name."/".$theme_img_name);
$smarty->assign('theme_name', $theme_name);
$smarty->setCompileDir("site".DS.$theme_name.DS);
if (!empty($arrTemplate)) {
    $smarty->assign($arrTemplate);
}
?>