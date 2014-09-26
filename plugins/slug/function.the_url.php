<?php
/**
 *      [PHPB2B] Copyright (C) 2007-2099, Ualink Inc. All Rights Reserved.
 *      The contents of this file are subject to the License; you may not use this file except in compliance with the License. 
 *
 *      @version $Revision: 2244 $
 */
function smarty_function_the_url($params){
	$do = null;
	extract($params);
	global $subdomain_support, $topleveldomain_support, $rewrite_able, $rewrite_compatible;
	$return = "##";
	if (!empty($module)) {
		switch ($module) {
			case 'login':
				if ($rewrite_able) {
					$return = URL."dang-nhap";
				}else{
					$return = URL."logging.php";
				}
				break;
			case 'product_main':
				if ($rewrite_able) {
					$return = URL."san-pham";
				}else{
					$return = URL."index.php?do=product";
				}
				break;
			case 'service_main':
				if ($rewrite_able) {
					$return = URL."dich-vu";					
				}else{
					$return = URL."index.php?do=product&action=services";
				}
				break;
			case 'offer_main':
				if ($rewrite_able) {
					$return = URL."thuong-mai";
					if($offertype)
					{
						switch($offertype) {
							case "buy":
								$offertype = "mua";
								break;
							case "sell":
								$offertype = "ban";
								break;
							case "supply":
								$offertype = "phan-phoi";
								break;
							case "partner":
								$offertype = "tim-doi-tac";
								break;
							default:
								break;
						}
						$return = URL."thuong-mai/".$offertype;
					}
				}else{
					$return = URL."index.php?do=product&action=offers";
					if($offertype)
					{
						$return = URL."index.php?do=product&action=offers&offertype=".$offertype;
					}
				}
				break;
			case "announce":
				if ($rewrite_able) {
					$return = URL."$module/detail/".$id.".html";
				}else{
					$return = URL."index.php?do=".$module."&action=detail&id=".$id;
				}
				break;
			case "fair":
				if ($rewrite_able) {
					$return = URL."$module/detail/".$id.".html";
				}else{
					$return = URL."index.php?do=".$module."&action=detail&id=".$id;
				}
				break;
			case "news":
				if ($rewrite_able) {
					$return = URL."$module/detail/".$id.".html";
				}else{
					$return = URL."index.php?do=".$module."&action=detail&id=".$id;
				}
				break;
			case "market":
				if ($rewrite_able) {
					$return = URL.$module."/detail/".$id.".html";
				}else{
					$return = URL."index.php?do=".$module."&action=detail&id=".$id;
				}
				break;
			case "standard":
				if ($rewrite_able) {
					$return = URL."$module/detail/".$id.".html";
				}else{
					$return = URL."index.php?do=".$module."&action=detail&id=".$id;
				}
				break;
			case "brand":
				if ($rewrite_able) {
					$return = URL."$module/detail/".$id.".html";
				}else{
					$return = URL."index.php?do=".$module."&action=detail&id=".$id;
				}
				break;
			case "dict":
				if ($rewrite_able) {
					$return = URL."$module/detail/".$id.".html";
				}else{
					$return = URL."index.php?do=".$module."&action=detail&id=".$id;
				}
				break;
			case "product":
				if ($rewrite_able) {
					$rootname = "san-pham";
					if($service == "1") $rootname = "dich-vu";
					
					$return = URL.$rootname."/".$id."/".stringToURI($product_name);
				}else{
					$return = URL."index.php?do=".$module."&action=detail&id=".$id;
				}
				break;
			case "company":
				if ($rewrite_able) {
					$return = URL."$module/detail/".$id.".html";
				}else{
					$return = URL."index.php?do=".$module."&action=detail&id=".$id;
				}
				break;
			case "topic":
				if ($rewrite_able) {
					$return = "topic/detail/".$id.".html";
				}else{
					$return = "index.php?do=topic&action=detail&id=".$id;
				}
				break;
			case "offer":
				if ($rewrite_able) {
					$return = URL."offer/detail/".$id.".html";
				}else{
					$return = URL."index.php?do=offer&action=detail&id=".$id;
				}
				break;
			case "producttype":
				if ($rewrite_able) {
					if($member_id)
						$return = URL.$userid."/product/type-".intval($typeid)."-".intval($page)."-".$member_id.          ($order != ''?"_".$order:'')          .".htmls";
					else
						$return = URL.$userid."/product/type-".intval($typeid)."-".intval($page).         ($order != ''?"_".$order:'')          .".htmls";
				}else{
					$return = URL."space/?userid=".$userid."&do=product&typeid=".$typeid."&page=".$page."&memberid=".$member_id."&order=".$order;
				}
				break;
			case "space":
				if($change_current_type)
				{					
					$return = URL."space/?userid=".$userid."&change_current_type=".$change_current_type;
					break;
				}
				
				if (!class_exists('Space')) {
					uses("space");
				}
				$space_controller = new Space();
				$return = $space_controller->rewrite($userid, $id, $do, $typeid, $welcome);
				break;
			case "page":
				//after 4.3, title replaced by name
				if ($rewrite_able) {
					$return = "page/".urlencode($title)."/";
				}else{
					$return = "index.php?do=page&title=".urlencode($title);
				}
				break;
			case "list":
				$extra_param = array();
				if (!empty($extra)) {
					if(strpos($extra, "|")>0){
						$tmp = explode("|", $extra);
						foreach ($tmp as $k=>$v) {
							$tmp_p = explode(",", $v);
							$extra_param[$tmp_p[0]] = $tmp_p[1];
						}
					}else{
						$tmp = explode(",", $extra);
						$extra_param[$tmp[0]] = $tmp[1];
					}
				}
				$param = http_build_query($extra_param + $_GET);
				$return = $GLOBALS['php_self']."?".$param;
				break;
			case "search":
				$return = "index.php?do=search";
				if (!empty($do)) {
					$return.="&module=".$do;
				}
				if (!empty($action)) {
					$return.="&action=".$action;
				}
				if (!empty($pos)) {
					$return.="&pos=".$pos;
				}
				if (!empty($q)) {
					$return.="&q=".$q;
				}
				if (!empty($typeid)) {
					$return.="&typeid=".intval($typeid);
				}
				if (!empty($areaid)) {
					$return.="&areaid=".$areaid;
				}
				if (!empty($industryid)) {
					$return.="&industryid=".$industryid;
				}
				if (!empty($type)) {
					$return.="&type=".$type;
				}
				if (!empty($action)) {
					$return.="&action=".$action;
				}
				break;
			case "wap":
				if($do){
					$return = "index.php?do=wap&module=".$do;
				}else{
					$return = URL."index.php?do=wap";
				}
				break;
			case "tag":
				if ($rewrite_able) {
					$return = "tag/".$do."-".$q."/";
				}else{
					$return = smarty_function_the_url(array("do"=>$do, "action"=>"lists", "q"=>$q, "module"=>"search"));
				}
				break;
			case "products":
				if ($rewrite_able) {
					$return = URL."san-pham/".$level."/".$industryid."/".stringToURI($title);
					if($action == 'postcomment')
					{
						$return = URL."comments/add.html";
					}
					else if($action == 'postoffercomment')
					{
						$return = URL."comments/offer/add.html";
					}
					else if($action == 'search')
					{
						$return = URL."search/tag/keyid_".$tag.".html";
					}
					else if($level == "search")
					{
						$return = URL."index.php?do=product&level=search&tag=".$tag;
					}
				}else{
					$return = URL."index.php?do=product&level=".$level."&industryid=".$industryid;
					if($action == 'postcomment')
					{
						$return = URL."index.php?do=product&action=postcomment";
					}
					else if($action == 'postoffercomment')
					{
						$return = URL."index.php?do=product&action=postoffercomment";
					}
					else if($action == 'search')
					{
						$return = URL."index.php?do=product&action=search&tag=".$tag;
					}
					else if($level == "search")
					{
						$return = URL."index.php?do=product&level=search&tag=".$tag;
					}
				}
				break;
			case "offers":
				if ($rewrite_able) {
					$return = URL."thuong-mai/".$level."/".$industryid."/".stringToURI($title);
					if(!empty($id))
					{
						$return = URL."thuong-mai/".$id."/".stringToURI($title);
					}
				}else{
					$return = URL."index.php?do=product&action=offers&level=".$level."&industryid=".$industryid;
					if(!empty($id))
					{
						$return = URL."index.php?do=offer&action=detail&id=".$id;
					}
				}
				break;
			case "connect":
				if ($rewrite_able) {
					$return = URL."trang-chu";
				}else{
					$return = URL."index.php?do=product&action=connect";
					//http://marketonline.vn/beta/index.php?do=product&level=1&industryid=1
				}
				break;
			case "banner_click":
				if ($rewrite_able) {
					$return = URL."banner/click/".$id.".html";
				}else{
					$return = URL."index.php?do=product&action=banner_click&id=".$id;
					//http://marketonline.vn/beta/index.php?do=product&level=1&industryid=1
				}
				break;
			case "jobs":
				if ($rewrite_able) {
					$return = URL."hoc-va-lam/viec-lam";
					if(!empty($id))
					{
						$return = URL."hoc-va-lam/viec-lam/".$id."/".stringToURI($title);
					}
				}else{
					$return = URL."index.php?do=job";
					if(!empty($id))
					{
						$return = URL."index.php?do=job&action=detail&id=".$id;
					}
				}
				break;
			case "employees":
				if ($rewrite_able) {
					$return = URL."hoc-va-lam/ho-so-ung-vien";
					if(!empty($id))
					{
						$return = URL."hoc-va-lam/ho-so-ung-vien/".$id."/".stringToURI($title);
					}
				}else{
					$return = URL."index.php?do=employee";
					if(!empty($id))
					{
						$return = URL."index.php?do=employee&action=detail&id=".$id;
					}
				}
				break;
			case "studypost":
				if ($rewrite_able && (!empty($type) || (in_array($action, array("group","school","memberpage","")) && empty($change_current_type)))) {
					if(!empty($action))
					{
						switch($action) {
							case "group":
								$action = "nhom";
								break;
							case "memberpage":
								$action = "hoc-vien";
								break;
							default:
								$action = "truong";
								break;
						}
						if(!empty($id)) {
							$return = URL."hoc-va-lam/".$action."/".$id."/".stringToURI($title);
						}
						else {
							$return = URL."hoc-va-lam/".$action;
						}
					}
					else
					{
						if(!empty($type))
						{
							switch($type) {
								case "group":
									$type = "nhom";
									break;
								case "learner":
									$type = "hoc-vien";
									break;
								default:
									$type = "truong";
									break;
							}
							$return = URL."hoc-va-lam/".$type;
						}
						else
						{
							$return = URL."hoc-va-lam/truong";
						}
					}
				}else{
					if(!empty($action))
					{
						if(!empty($change_current_type))
						{
							$change_current_type = "&change_current_type=".$change_current_type;
						}
						if(!empty($id))
						{
							$id_s = "&id=".$id;
						}
						if(!empty($group_id))
						{
							$group_id_s = "&group_id=".$group_id;
						}
						$return = URL."index.php?do=studypost&action=".$action.$id_s.$group_id_s.$change_current_type;
					}
					else
					{
						if(!empty($type))
						{
							$return = URL."index.php?do=studypost&type=".$type;
						}
						else
						{
							$return = URL."index.php?do=studypost";
						}
					}
				}
				break;
			case "root-url":
				$return = URL;
				break;
			case "services":
				if ($rewrite_able) {
					$return = URL."dich-vu/".$level."/".$industryid."/".stringToURI($title);
					if($level == "search")
					{
						$return = URL."index.php?do=product&action=services&level=search&tag=".$tag;
					}
				}else{
					$return = URL."index.php?do=product&action=services&level=".$level."&industryid=".$industryid;
					if($level == "search")
					{
						$return = URL."index.php?do=product&action=services&level=search&tag=".$tag;
					}
				}
				break;
			case "register":
				if ($rewrite_able) {
					$return = URL."dang-ky";					
					if(isset($typename))
					{
						switch($typename) {
							case "Company":
								$typename = "tao-gian-hang";
								break;
							case "Employee":
								$typename = "xin-viec";
								break;
							case "Employer":
								$typename = "tuyen-dung";
								break;
							case "Learner":
								$typename = "hoc-tap";
								break;
							default:
								$typename = "tao-gian-hang";
								break;
						}
						$return = URL."dang-ky/".$typename;
					}
				}else{
					$return = URL."register.php?typename=Company";
					if(isset($typename))
					{
						$return = URL."register.php?typename=".$typename;
					}
				}
				break;
			case "redirect":
				if ($rewrite_able) {
					if(isset($url))
					{
						switch($url) {
							case "/virtual-office/product.php?do=edit":
								$return = URL."dang-san-pham";
								break;
							case "/logging.php":
								$return = URL."dang-nhap";
								break;
							case "/virtual-office/product.php?do=edit%26type=service":
								$return = URL."dang-dich-vu";
								break;
							default:
								$return = URL."redirect.php?url=".$url;
								break;
						}
						
					}
				}else{
					if(isset($url))
					{
						$return = URL."redirect.php?url=".$url;
					}
				}
				break;
			case "ad":
				if ($rewrite_able) {
					$return = URL."index.php?do=product&action=adClick&id=".$id;
				}else{
					$return = URL."index.php?do=product&action=adClick&id=".$id;
				}
				break;
			case "share_shop":
				if ($rewrite_able) {
					$return = URL.$space_name."/chia-se";
				}else{
					$return = URL."index.php?do=product&action=inviteFriendPage&space_name=".$space_name;
				}
				break;
			case "companies":
				if ($rewrite_able) {
					$return = URL."thuong-hieu";
					if($action){
						$return = URL."index.php?do=company&action=".$action;
						if($keyword) {
							$return .= "&keyword=".$keyword;
						}
					}
					else {
						switch($membergroup_id) {
							case "1":
								$return = URL."thuong-hieu/cua-hang";
								break;
							case "2":
								$return = URL."thuong-hieu/ca-nhan";
								break;
							case "3":
								$return = URL."thuong-hieu/doanh-nghiep";
								break;
							default:
								$return = URL."thuong-hieu";
								break;
						}
						if(isset($industryid)) {
							$return = $return."/".$industryid."/".stringToURI($title);
						}
					}
				}else{
					$return = URL."index.php?do=company&membergroup_id=3";
					if($action){
						$return = URL."index.php?do=company&action=".$action;
						if($keyword) {
							$return .= "&keyword=".$keyword;
						}
					}
					else {						
						if(isset($membergroup_id)) {
							$return = URL."index.php?do=company&membergroup_id=".$membergroup_id;
						}
						if(isset($industryid)) {
							$return = URL."index.php?do=company&level=".$level."&industryid=".$industryid;
						}
					}
				}
				break;
			case "rate_shop":
				if ($rewrite_able) {
					$return = URL."danh-gia-shop/".$space_name."/".$star;				
				}else{
					$return = URL."index.php?do=company&action=rating&star=".$star."&space_name=".$space_name;					
				}
				break;
			case "album":
				if ($rewrite_able) {
					$return = URL."index.php?do=album&type=image";
				}else{
					$return = URL."index.php?do=album&type=image";
					//http://marketonline.vn/beta/index.php?do=product&level=1&industryid=1
				}
				break;
			default:
				if (!empty($id)) {
					if ($rewrite_able) {
						$return = URL.$module."/detail/".$id.".html";
					}else{
						$return = URL."index.php?do=".$module."&action=detail&id=".$id;
					}
				}
				break;
		}
	}
	return $return;
}
?>