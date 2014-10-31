<?php
/**
 *      [PHPB2B] Copyright (C) 2007-2099, Ualink Inc. All Rights Reserved.
 *      The contents of this file are subject to the License; you may not use this file except in compliance with the License. 
 *
 *      @version $Revision: 2048 $
 */
if(!defined('IN_PHPB2B')) exit('Not A Valid Entry Point');
require(CACHE_LANG_PATH.'lang_space.php');
$_PB_CACHE['membergroup'] = cache_read("membergroup");
uses("companyoffice","point","shopvote","member","company","space","follow","industry","area", "producttype", "product", "announcement","tag");

$shopvote = new Shopvotes();
$tag = new Tags();
$point = new Points();
$product = new Products();
$producttype = new ProductTypes();
$area = new Areas();
$member = new Members();
$space = new Space();
$company = new Companies();
$companyoffice = new Companyoffices();
$follow = new Follows();
$industry = new Industries();
$announcement = new Announcements();
$space_name = '';
if (empty($theme_name)) {
	$theme_name = "default";
	$style_name = (isset($G['theme']) && !empty($G['theme']))?$G['theme']:"default";
	$ADODB_CACHE_DIR = DATA_PATH.'dbcache';
}

//$pdb->setFetchMode(ADODB_FETCH_BOTH);
//$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
$smarty->flash_layout = $theme_name."/flash";
$smarty->assign("theme_img_path", "templates/".$theme_name."/");
$smarty->assign('ThemeName', $theme_name);
$cache_data = $push_data = array();
//$pdb->Execute("DELETE FROM {$tb_prefix}spacecaches WHERE expiration<".$time_stamp);

if (!empty($userid)) {
	$userid = rawurldecode($userid);
	$member->setInfoBySpaceName($userid);
	if(!empty($member->info['id'])) {
		$company->setInfoByMemberId($member->info['id']);
	}else{
		$company->setInfoBySpaceName($userid);
	}
	$push_data['company'] = $company->info;
	$push_data['member'] = $member->info;
}elseif(!empty($_GET['id'])) {
	$id = intval($_GET['id']);
	$company->setId($id);
	if (!empty($company->info['member_id'])) {
		$member->setId($company->info['member_id']);
	}
	$push_data['company'] = $company->info;
	$push_data['member'] = $member->info;
}
if (isset($company->info['status']) && $company->info['status']===0) {
    header_sent(L('company_checking'));
    exit;
}elseif (empty($company->info) || !$company->info) {
	header_sent(L('data_not_exists'));
	exit;
}
$cache_data = $pdb->GetRow("SELECT data2 AS style FROM {$tb_prefix}spacecaches WHERE company_id='".$company->info['id']."'");
/**
 * only for 4.2=>4.3 converts
 * 2012.9
 */
if(isset($cache_data['style'])) $skin_extra_style = $cache_data['style'];
if(!empty($company->info['created'])){
	$time_tmp = $time_stamp-$company->info['created'];
	$company->info['year_sep'] = $time_tmp = ceil($time_tmp/(3600*24*365));
}
if (empty($company->info['email'])) {
	$company->info['email'] = $G['service_email'];
}
if (empty($company->info['picture'])) {
	$company->info['logo'] = $absolute_uri.pb_get_attachmenturl('', '', 'small');
}else{
	$company->info['logo'] = $absolute_uri.pb_get_attachmenturl($company->info['picture'], '', 'small');
	$company->info['logo_big'] = $absolute_uri.pb_get_attachmenturl($company->info['picture'], '', '');
}

//if (empty($company->info['banner'])) {
//	$company->info['banner'] = $absolute_uri."templates/default/image/bannerCongTy.png";
//}else{
//	$company->info['banner'] = $absolute_uri.$attachment_url.$company->info['banner'];
//}

$banners = json_decode($company->info['banners'], true);
foreach($banners as $key => $item)
{
	if ($item) $banners[$key] = $absolute_uri.$attachment_url.$item;
}
if(!count($banners)) $banners["noimage"] = $absolute_uri."templates/default/image/bannerCongTy.png";

setvar('banners',$banners);


$company->info = pb_lang_split_recursive($company->info);
//$company->info['description'] = nl2br(strip_tags($company->info['description']));
$is_set_default_skins = false;
$member_templet_id = $member->info['templet_id'];
if (isset($_GET['force_templet_id'])) {
	$member_templet_id = intval($_GET['force_templet_id']);
}
if(!empty($member_templet_id)){
	$skin_path_info = $pdb->GetRow("SELECT name,directory FROM {$tb_prefix}templets WHERE type='user' AND status='1' AND id='".$member_templet_id."'");
}
if (empty($skin_path_info)) {
	$skin_path_info = $pdb->GetRow("SELECT name,directory FROM {$tb_prefix}templets WHERE type='user' AND is_default='1'");
	if (empty($skin_path_info)) {
		$is_set_default_skins = true;
	}
}elseif (!is_dir(PHPB2B_ROOT.$skin_path_info)){
	$is_set_default_skins = true;
}
if ($is_set_default_skins) {
	$skin_path_info = array();
	$skin_path_info[] = "default";
	$skin_path_info[] = "templates/skins/default/";
}
list($skin_path, $skin_dir) = $skin_path_info;
if (strpos($skin_dir, "templates")===false) {
	$skin_dir = "templates/".$skin_dir;//for 4.3 upgrade from 4.3 below,begin 2012.10
}

//var_dump($company->info);
$company->info["address"] = $company->info["address"].", ".$area->getFullName($company->info["area_id"]);
$company->info["site_url_name"] = str_replace('http://', '', $company->info["site_url"]);
$company->info["site_url_name"] = str_replace('https://', '', $company->info["site_url_name"]);

$company->info["found_date"] = date('Y', $company->info["found_date"]);
$company->info["industry"] = $industry->disSubNames($company->info["industry_id"], " &raquo; ");
//var_dump($member->info);


//edit comapny info
list(,$telcode, $telzone, $tel) = $company->splitPhone($company->info['tel']);
list(,$faxcode, $faxzone, $fax) = $company->splitPhone($company->info['fax']);
if($telcode != '000' && $telzone != '' && $tel != '')
{
	$company->info['tel'] = '('.$telcode.') '.$telzone.'.'.substr($tel, 0, 4)." ".substr($tel, 4);
}
else
{
	$company->info['tel'] = '';
}
if($faxcode != '000' && $faxzone != '' && $fax != '')
{
	$company->info['fax'] = '('.$faxcode.') '.$faxzone.'.'.substr($fax, 0, 4)." ".substr($fax, 4);
}
else
{
	$company->info['fax'] = '';
}

//var_dump($company->info);
if($do != 'ajaxannoucebox')
{	
	$company->info['clicked'] += $company->clicked($company->info['id']);
}

$member->info['fb_des'] = str_replace('\'', '', $member->info['description']);
$member->info['fb_des'] = str_replace('\"', '', $member->info['fb_des']);

$member->info['online'] = $member->isOnline($member->info['id']);

$company->info['description'] = str_replace('<a', '<a target="_blank" rel="nofollow"', $company->info['description']);

$company->info['facebook_full'] = $company->info['facebook'];
if($company->info['fb_fanpage_main'] && $member->info['fb_access_token']) {
	$company->info['facebook'] =  "https://www.facebook.com/pages/fanpage/".$company->info['fb_fanpage_main'];
	$company->info['facebook_full'] = $company->info['facebook'];
} else {
	if(!$member->info['fb_access_token'] && $company->info['facebook']) {
		$company->info['facebook'] =  str_replace("http://", 'https://', $company->info['facebook']);
		$company->info['facebook'] =  str_replace("https://", 'https://', $company->info['facebook']);
	} else {
		$company->info['facebook'] = "";
	}
}

if($member->info['fb_user_id'] && $member->info['fb_access_token']) {
	$fb_user = json_decode($member->info['fb_user_id'], true);
	$company->info['facebook_personal'] =  $fb_user["link"];
} else {
	if(!$member->info['fb_access_token'] && $company->info['facebook_personal']) {
		$company->info['facebook_personal'] =  str_replace("http://", 'https://', $company->info['facebook_personal']);
		$company->info['facebook_personal'] =  str_replace("https://", 'https://', $company->info['facebook_personal']);
	} else {
		$company->info['facebook_personal'] = "";
	}
}

//checking follow
if($pb_userinfo["pb_userid"])
{
	$user_vote = $shopvote->getVote($pb_userinfo["pb_userid"], $company->info['id']);
	$user_vote["created"] = date("Y-m-d H:i",strtotime($user_vote["created"]));
	$company->info['user_vote'] = $user_vote;	
}
$vote = $shopvote->getResult($company->info['id']);
$company->info['vote'] = $vote;
$vote_list = $shopvote->getList($company->info['id'], $pb_userinfo["pb_userid"]);
foreach($vote_list as $ore => $vv) {
	$vote_list[$ore]["created"] = date("Y-m-d H:i",strtotime($vv["created"]));
}
$company->info['vote_list'] = $vote_list;
//var_dump($vote_list);

//$point->updateMonthlyPoint($pb_userinfo["pb_userid"]);
//$point->resetMonthlyPoint();

uaAssign(array(
"SkinName"=>$skin_path,
"ThemeName"=>$skin_path,
"SkinPath"=>$skin_dir,
"COMPANY"=>$company->info,
"MEMBER"=>$member->info,
));

$COMPANY_CURRENT = $company->info;
//var_dump($company->info);
$info = $member->getInfoById($member->info["id"]);
//var_dump($info);
setvar("Info", $info);

//keywords
if (!empty($company->info['tag_ids'])) {
			$tag_res = $tag->getTagsByIds($company->info['tag_ids']);
			if (!empty($tag_res)) {
				
				$tags = null;
				$ii = 0;
				foreach ($tag_res as $key=>$val){
					//$tags.='<a href="'.$this->url(array("module"=>"tag", "do"=>"product", "q"=>$val)).'" target="_blank">'.$val.'</a>';
					$tags.='<a href="javascript:void(0)">'.$val.'</a>';
					if($ii != count($tag_res)-1) $tags.=", ";
					$ii++;
				}
				$company->info['tag'] = $tags;
				$company->info['tag_string'] = implode(", ", $tag_res);
				unset($tags, $tag_res, $tag);
				//echo $company->info['tag_tring'];
				setvar("TAG_STRING", $company->info['tag_string']);
			}
}


//checking follow
if($pb_userinfo["pb_userid"])
{
	$followed = $follow->check($pb_userinfo["pb_userid"], $company->info["id"]);
	setvar("Followed", $followed);
}

setvar("FURI", $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");

$smarty->template_dir = PHPB2B_ROOT ."templates".DS."skins".DS;
$smarty->flash_layout = $skin_path."/flash";
if (!$smarty->template_exists($skin_path."flash")) {
	setvar("SkinName", "default");
	$smarty->template_dir = PHPB2B_ROOT ."templates".DS."skins".DS;
	$smarty->flash_layout = 'templates/default/flash';
}
$smarty->setCompileDir();
$smarty->setCompileDir("skin".DS.$skin_path.DS);
if(isset($member->info['id'])) $space->setLinks($member->info['id']);
$space->setMenu($company->info['cache_spacename'], $space_actions);
$product_types = $pdb->CacheGetArray("SELECT *,id as typeid,name as typename FROM {$tb_prefix}producttypes WHERE company_id=".$company->info['id']);//set and get db cache

$industries = $industry->getCacheIndustry();
//echo $industry->countProduct(1);
//var_dump($industries);

//foreach($industries as $key => $item)
//{
//	//if($industry->countProduct($item["id"]))
//	//{
//		//$industries[$key]["count"] = $industry->countProduct($item["id"]);
//		//$industries[$key]["count"] = $industry->countProduct($item["id"]);
//		$industry->saveField('count', $industry->countProduct($item["id"]), (int)$item["id"]);
//		
//		//echo $industries[$key]["count"];
//	//}
//	
//	foreach($item["sub"] as $item1)
//	{
//		$industry->saveField('count', $industry->countProduct($item1["id"]), (int)$item1["id"]);
//		foreach($item1["sub"] as $item2)
//		{
//			$industry->saveField('count', $industry->countProduct($item2["id"]), (int)$item2["id"]);
//			foreach($item2["sub"] as $item3)
//			{
//				$industry->saveField('count', $industry->countProduct($item3["id"]), (int)$item3["id"]);
//			}
//		}
//	}
//}


setvar("IndustryList", $industries);
setvar("ProductTypes", $product_types);
$group_info = array();
$group_info['year'] = $time_tmp;
if (!empty($member->info['membergroup_id']['name'])) {
	$group_info['name'] = $_PB_CACHE['membergroup'][$member->info['membergroup_id']]['name'];
}else{
	$group_info['name'] = L("undefined_image", "tpl");
}
if (!empty($member->info['membergroup_id']['avatar'])) {
	$group_info['image'] = $absolute_uri."images/group/".$_PB_CACHE['membergroup'][$member->info['membergroup_id']]['avatar'];
}else{
	$group_info['image'] = $absolute_uri."images/group/formal.gif";
}
setvar("GROUP", $group_info);
//for old version
if(isset($member->info['membergroup_id']['name'])) setvar("GroupName", $_PB_CACHE['membergroup'][$member->info['membergroup_id']]['name']);
if(isset($member->info['membergroup_id']['avatar'])) setvar("GroupImage", $absolute_uri."images/group/".$_PB_CACHE['membergroup'][$member->info['membergroup_id']]['avatar']);
//:~
setvar("Menus", $space->getMenu());
setvar("Links", $space->getLinks());

setvar("Friends", $space->getFriends($member->info['id']));
setvar("FollowFriends", $space->getFollowFriends($member->info['id']));

$space_url = $space->rewrite($company->info['cache_spacename'], $company->info['id']);
setvar("space_url", $space_url);
setvar("SpaceUrl", $absolute_uri.$skin_dir);
if (!empty($skin_extra_style)) {
	setvar("SpaceExtraStyle", $absolute_uri.$skin_dir."styles/".$skin_extra_style."/");
}
setvar("BASEMAP", $absolute_uri.$skin_dir);



if (!empty($arrTemplate)) {
    $smarty->assign($arrTemplate);
}


//company user
//var_dump($company->info);
if($pb_userinfo["pb_userid"])
{
	$pb_company = $company->getInfoByUserId($pb_userinfo["pb_userid"]);
	setvar('userID', $pb_userinfo["pb_userid"]);
	if(count($pb_company))
	{
		$pb_company["image"] = pb_get_attachmenturl($pb_company['picture'], '', 'smaller');
		setvar("pb_company", $pb_company);
	}
	else
	{
		setvar("pb_company", false);
	}
	//var_dump($pb_company);
	
	//FACEBOOK SHARE
		$FACE["title"] = urlencode($COMPANY_CURRENT["name"]);
		$FACE["summary"] = urlencode(strip_tags($COMPANY_CURRENT["description"]));
		$FACE["images"] = '&p[images][0]='.urlencode($COMPANY_CURRENT["logo"]);
		foreach($fimages as $key => $img)
		{
			//$FACE["images"] .= '&p[images]['.($key).']='.urlencode("http://marketonline.vn/".$img);
		}
		setvar("FACE", $FACE);
}

//if(strtolower($_GET["userid"]) != "admin" && $do != 'ajaxannoucebox')
//{
//	$tree = $producttype->findTree('id,name,level', array("0"=>'member_id='.$member->info['id']));
//	
//	$level_padding = 0;
//	foreach($tree as $key0 => $item0)
//	{
//		
//		
//		//count product
//		$conditions = null;
//		$conditions[] = "Product.status=1 AND Product.state=1 AND Product.company_id='".$COMPANY_CURRENT['id']."'";
//		$indus_array = array();
//		$custom_array = array();
//		$id_i = intval($item0["id"]);
//		//$_GET["memberid"] = $item0["member_id"];
//		$level = 0;
//		
//		foreach($tree as $key => $item)
//		{			
//			if($level)
//			{
//				if($item["level"] > $level)
//				{
//					if(!isset($item["member_id"]))
//					{
//						$indus_array[] = $item["id"];
//					}
//					else
//					{
//						$custom_array[] = $item["id"];
//					}
//				}
//				else
//				{
//					break;
//				}
//			}		
//			elseif($item["id"] == $id_i)
//			{
//				//echo "no do".$id_i;
//				if(!$item0["member_id"] && !isset($item["member_id"]))
//				{			
//					$indus_array[] = $id_i;
//					$level = $item["level"];
//				}
//				if($item0["member_id"] && isset($item["member_id"]))
//				{
//					$custom_array[] = $id_i;
//					$level = $item["level"];
//				}
//				
//			}
//			//echo $level;
//		}
//		$conditions_temp = null;
//		if(!empty($indus_array))
//			$conditions_temp['industry'] = "Product.industry_id IN (".implode(',',$indus_array).")";
//					     
//		if(!empty($custom_array))
//			$conditions_temp['customid'] = "Product.producttype_id IN (".implode(',',$custom_array).")";		
//		      
//		$conditions[] = "((".implode(" OR ", $conditions_temp).") AND Product.state=1)";
//				
//		$tree[$key0]["count"] = $product->findCount_left(null, $conditions,"id");
//		
//		
//		
//		
//	}
//	
//	foreach($tree as $key0 => $item0)
//	{
//		
//		$tree[$key0]["lpad"] = $level_padding;
//		$tree[$key0]["padding"] = $level_padding*25;
//		//$item0["countChildren"] == 1
//		//echo $tree[$key0]["count"]."-".$tree[$key0+1]["count"]."<br>";
//		if($item0["countChildren"] == 1 && $tree[$key0]["count"] == $tree[$key0+1]["count"])
//		{
//			$tree[$key0]["hide"] = true;
//			//$tree[$key-1]["countChildren"] = $tree[$key-1]["countChildren"] - 1;
//		}
//		else
//		{
//			if($tree[$key0+1]["level"] > $tree[$key0]["level"])
//			{
//				$level_padding++;
//			}
//			
//			if($tree[$key0+1]["level"] <= $level_padding)
//			{
//				$level_padding = $tree[$key0+1]["level"]-1;
//			}
//		}
//		
//		
//		//else
//		//{
//		//	$level_padding++;
//		//}
//		//
//		//if($tree[$key0+1]["level"] == $tree[$key0]["level"])
//		//{
//		//	$level_padding = $level_padding-1;
//		//}
//		//
//		//if($tree[$key0+1]["level"] < $tree[$key0]["level"])
//		//{
//		//	$level_padding = $tree[$key0+1]["level"]-1;
//		//}
//		
//		
//		
//	}
//
//}
////var_dump($tree);


//Custome Style
$styles = json_decode($COMPANY_CURRENT["custom_style"], true);
$styles_string = "<style>";
//foreach($styles as $element => $items)
//{
	$styles_string .= "#body-wrapper{";
	foreach($styles["body-wrapper"] as $key => $value)
	{
		if(!empty($value)) $styles_string .= $key.":".str_replace('\\', '', $value).";";
		
	}	
	$styles_string .= "}";
	//var_dump($styles["body-wrapper"]);
	if(!empty($styles["body-wrapper"]["background-color"]) || !empty($styles["body-wrapper"]["background-image"])) {
		$styles_string .= ".space_content #content {background: rgba(255, 255, 255, 0.5)}";
	}
	
	if(!empty($styles["textColor"]))
	{
		//$styles_string .= "#body-wrapper{";
		$styles_string .= "#left-sidebar ul li.plevel3 a,.childcat,.nntype a,.top_tab_intro a,#body-wrapper-padding label,body,.mainhotnew .hotnewlist, #top-social a.open-soc,#top-social a.open-soc span, h6, .section-block .subtitle, #page-title .subtitle, .widget .subtitle, .scrollbarleft ul li a span{color:".$styles["textColor"]."}";
		//$styles_string .= "}";
	}
	
	if(!empty($styles["titleColor"]))
	{
		$styles_string .= ".nntype a.active,.nntype a:hover,.top_shop_name,#body-wrapper-padding h2,#body-wrapper-padding .widget h3{color:".$styles["titleColor"]."}";
	}
	
	if(!empty($styles["linkColor"]))
	{
		$styles_string .= "#body-wrapper-padding .widget .product h3,.space_contact_box a,#policy_but,.mainhotnew .active,.mainhotnew a:hover,#left-sidebar li a{color:".$styles["linkColor"]."}";
		$styles_string .= ".postitem a,a.button, button.button, input.button, #respond input#submit, #content input.button{background:".$styles["linkColor"]."}";
	}
	
	if(!empty($styles["menuBgColor"]))
	{
		$styles_string .= ".tree_bound h3,.table_th,.recent-tabs-widget .tabs dd a:hover, .recent-tabs-widget .tabs dd.active a,.recent-tabs-widget .tabs a{background:".$styles["menuBgColor"]."}";
		
	}
	
	if(!empty($styles["footerColor"]))
	{
		$styles_string .= "#darkf{background:".$styles["footerColor"]."}";
	}
	
	if(!empty($styles["menuTextColor"]))
	{
		$styles_string .= ".recent-tabs-widget .tabs a{color:".$styles["menuTextColor"]."}";
	}
	
	if(!empty($styles["footerTextColor"]))
	{
		$styles_string .= "#darkf a,.user_footer h3,#darkf p{color:".$styles["footerTextColor"]."}";
	}
	
	if(!empty($styles["borderColor"]))
	{
		$styles_string .= ".space_content #content,.leftbar_space .widget.widget_recent_products,#top_company_info, #topmenu img, .fb_boxx,.logoz,.childcat,#header #recent_products-3,#topmenu span,#left-sidebar,.space_content,aside .widget,ul.new_products li.product,ul.products li.product a img, div.product div.images img, #content div.product div.images img{border-color:".$styles["borderColor"]."}";
		$styles_string .= ".pagination span,.pagination a:hover{background:".$styles["borderColor"]."}";
		$styles_string .= "#darkf{border-top:solid 1px ".$styles["borderColor"]."}";
	}
	
	$image_crop_script = "$('ul.products li.product a img').resizecrop({
		width:281,
		height:281,
		vertical:'top'
	});";
	if(!empty($styles["cols_number"]))
	{
		if($styles["cols_number"]==1) {
			$img_width = 883;
			$img_height = 450;
			$img_align = "center";
		}
		if($styles["cols_number"]==2) {
			$img_width = 436;
			$img_height = 290;
			$img_align = "center";
		}
		if($styles["cols_number"]==3) {
			$img_width = 287;
			$img_height = 287;
			$img_align = "top";
		}
		if($styles["cols_number"]==4) {
			$img_width = 213;
			$img_height = 213;
			$img_align = "top";
		}		
		if($styles["cols_number"]==5) {
			$img_width = 168;
			$img_height = 168;
			$img_align = "top";
		}
		
		$styles_string .= "ul.new_products li.product {width:".$img_width."px}";
		$styles_string .= ".u_p_img_box {height:".$img_height."px}";
		$image_crop_script = "$('ul.products li.product a img').resizecrop({
			width:".($img_width-6).",
			height:".($img_height-6).",
			vertical:'".$img_align."'
		});";
	}
	setvar("image_crop_script",$image_crop_script);
	
//}
$styles_string .= "</style>";
//echo $styles_string;
setvar('styles_string', $styles_string);


//styling
if(!($styles["cols_number"])) $styles["cols_number"] = 3;
setvar('styling', $styles);

$styles["body-wrapper"]["backgroundColor"] = $styles["body-wrapper"]["background-color"];
$styles["body-wrapper"]["backgroundImage"] = $styles["body-wrapper"]["background-image"];
setvar('styles', $styles["body-wrapper"]);
setvar('styles_all', $styles);
//var_dump($styles["body-wrapper"]);

//share info
$share_info = $announcement->read("message", 6);
$share_info = str_replace("{shop}","<a target='_blank' style='text-decoration: underline;' href='http://marketonline.vn/".$COMPANY_CURRENT["cache_spacename"]."'>".$COMPANY_CURRENT["shop_name"]."</a>",$share_info);
$share_info = str_replace("{phone}",$COMPANY_CURRENT["tel"],$share_info);
$share_info = str_replace("{email}",$member->info["email"],$share_info);
setvar('share_info', $share_info);

setvar('tree', $tree);


$welcomnew_info = $announcement->read("message", 7);
$welcomnew_info["message"] = str_replace("{shop}","<a href='http://marketonline.vn/".$COMPANY_CURRENT["cache_spacename"]."'>".$COMPANY_CURRENT["shop_name"]."</a>",$welcomnew_info["message"]);
setvar('welcomnew_info', $welcomnew_info);

setvar("fb_description", strip_tags($COMPANY_CURRENT["description"]));

setvar("theme_name", "../../default");


//get Offices
$offices = $companyoffice->findByCompany($company->info["id"]);
setvar("offices",$offices);
?>