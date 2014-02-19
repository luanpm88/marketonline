<?php
/**
 *      [PHPB2B] Copyright (C) 2007-2099, Ualink Inc. All Rights Reserved.
 *      The contents of this file are subject to the License; you may not use this file except in compliance with the License. 
 *
 *      @version $Revision: 2090 $
 */
function smarty_function_get_cache($params, &$smarty) {
	$op = null;
	extract($params);
	if (empty($var)) {
		$var = "item";
	}
	if (isset($name)){
		switch ($name) {
			case "language":
				global $G;
				$languages = unserialize($G['languages']);
				if (!empty($languages)) {
					if (!$echo) {
						$smarty->assign($var, $languages);
					}else{
						foreach ($languages as $lang_key=>$lang_val) {
							$tmp="<a href='".URL.'redirect.php?url='.pb_getenv("REQUEST_URI")."&app_lang=".$lang_key."' title='".$lang_val['title']."'>";
							if($image && !empty($lang_val['img'])){
								$tmp.="<img src='".$lang_val['img']."' alt='".$lang_val['title']."' />";
							}else{
								$tmp.=$lang_val['title'];
							}
							$tmp.="</a>";
							if ($sep) {
								$tmp.=$sep;
							}
							if ($title_li=="list") {
								$op.="<li>".$tmp."</li>";
							}else{
								$op.=$tmp;
							}
						}
					}
				}
				break;
			case "nav":
				$_nav = cache_read("nav");
				$navs = $_nav['navs'];
				if (!empty($exclude)) {
					$_exclude_navs = explode(",", $exclude);
					foreach ($_exclude_navs as $_exkey=>$_exval) {
						unset($navs[$_exval]);
					}
				}
				if(!$echo)
				$smarty->assign($var, $navs);
				else{
					foreach ($navs as $nav) {
						$op.= '<li id="mn_'.$nav['id'].'" class="nav_item nav-item-'.$nav['id'];
						$file_name = pb_getenv('REQUEST_URI');
						if (strpos($file_name, $nav['url'])!==false && $nav['url']!='index.php') {
							$op.=' current_nav_item';
						}
						$op.='"><a href="'.$nav['url'].'" target="_self"><span>'.pb_lang_split($nav['name']).'</span></a></li>';
					}
				}
				break;
			default:
				if (is_file(CACHE_COMMON_PATH."cache_".$name.".php")) {
					require(CACHE_COMMON_PATH."cache_".$name.".php");
				}
				$smarty->assign($var, $_PB_CACHE);
				unset($_PB_CACHE);
				break;
		}
	}
	return $op;
}
?>