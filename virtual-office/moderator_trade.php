<?php
/**
 *      [PHPB2B] Copyright (C) 2007-2099, Ualink Inc. All Rights Reserved.
 *      The contents of this file are subject to the License; you may not use this file except in compliance with the License. 
 *
 *      @version $Revision: 2223 $
 */
require("../libraries/common.inc.php");
require("room.share.php");
require(PHPB2B_ROOT.'libraries/page.class.php');
check_permission("offer");
$tpl_file = "moderator_trade";
$page = new Pages();
uses("trade", "tradefield", "product","tag","attachment", "form", "typeoption", "point", "industry", "area", "space");
$attachment = new Attachment("pic");
$attachment->if_offer_150_120 = true;
$attachment1 = new Attachment('pic1');
$attachment1->if_offer_150_120 = true;
$attachment2 = new Attachment('pic2');
$attachment2->if_offer_150_120 = true;
$attachment3 = new Attachment('pic3');
$attachment3->if_offer_150_120 = true;
$attachment4 = new Attachment('pic4');
$attachment4->if_offer_150_120 = true;
$area = new Areas();
$industry = new Industries();
$form = new Forms();
$point = new Points();
$tradefield = new Tradefields();
$tag = new Tags();
$trade = new Trades();
$trade_controller = new Trade();
$space_controller = new Space();
$typeoption = new Typeoption();
$conditions = array();
if($pb_userinfo["role"] != 'admin') {
	$conditions[]= "(valid_date != '' OR valid_moderator != '')";
} else {
	$conditions[]= "valid_moderator = ".$the_memberid;
}
setvar("TradeTypes", $trade_controller->getTradeTypes());
setvar("TradeNames", $trade_controller->getTradeTypeNames());
$tmp_personalinfo = $memberinfo;
setvar("MemberInfo", $tmp_personalinfo);
$expires = $trade_controller->getOfferExpires();
setvar("TradeTypes", $trade_controller->getTradeTypes());
setvar("PhoneTypes", $typeoption->get_cache_type("phone_type"));
setvar("ImTypes", $typeoption->get_cache_type("im_type"));
setvar("OfferExpires",$expires);
setvar("Countries", $countries = cache_read("country"));



if(isset($company_id))
setvar("CompanyId", $company_id);
$tMaxDay = (!empty($_PB_CACHE['setting']['offer_refresh_lower_day']))?$_PB_CACHE['setting']['offer_refresh_lower_day']:3;
$tMaxHours = (!empty($_PB_CACHE['setting']['offer_update_lower_hour']))?$_PB_CACHE['setting']['offer_update_lower_hour']:24;
$prod_info = array();
//$conditions[] = "member_id='".$the_memberid."'";
if(!empty($company_info)){
    $tmp_personalinfo['MemberTel'] = $company_info['tel'];
    $tmp_personalinfo['ContactEmail'] = $company_info['email']?$company_info['email']:$tmp_personalinfo['email'];
}
if (isset($_GET['typeid'])) {
	$conditions[] = "type_id='".intval($_GET['typeid'])."'";
	setvar('TypeID', $_GET['typeid']);
}

$amount = 0;
$amount = $trade->findCount(null, $conditions);
$page->setPagenav($amount);

$joins = array();
$joins[] = "LEFT JOIN {$trade->table_prefix}members AS m ON Trade.valid_moderator=m.id";
$result = $trade->findAll("m.username as mod_username, Trade.*", $joins, $conditions, "CASE WHEN valid_status = 3 THEN 1 WHEN valid_status = 0 THEN 2 ELSE 3 END ASC, Trade.submit_time DESC,Trade.id DESC", $page->firstcount,$page->displaypg);
//var_dump($result);
if (!empty($result)) {
	for($i=0; $i<count($result); $i++){
	    $result[$i]["price"] = number_format($result[$i]["price"], 0, ',', '.');;
	    
	    $result[$i]['expire_date'] = df($result[$i]['expire_time']);
	    
	    $space_controller->setBaseUrlByUserId($tmp_personalinfo["space_name"], "offer");
	    $result[$i]['url'] = $space_controller->rewriteDetail("offer", $result[$i]['id']);
	    
		//echo $result[$i]['default_pic'];
		if($result[$i]['default_pic'])
		{
			$col_pic = 'picture'.$result[$i]['default_pic'];
		}
		else
		{
			$col_pic = 'picture';
		}
		
		$result[$i]['image'] = pb_get_attachmenturl($result[$i][$col_pic], '../', 'small');
		$result[$i]['created'] = df($result[$i]['created'], "d-m-Y H:i");
		$result[$i]['row'] = $i%2;
		
		
		if($result[$i]['valid_status'] == 1) {
			$string = '<img title="Hợp lệ" src="../templates/office/images/published.png">';
			//$string .= '<a href="offer.php?do=valid&id='.$result[$i]["id"].'">Duyệt</a>/';
			//$string .= '<a href="offer.php?do=unvalid&id='.$result[$i]["id"].'">Cấm</a>';
			$result[$i]['validation'] = $string;
		}
		if($result[$i]['valid_status'] == 0) {
			$string = '<img title="Không hợp lệ" src="../templates/office/images/unpublished.png">';
			$string .= '<br /><span class="unvalid_message">'.$result[$i]['valid_message'].'</span>';
			//$string .= '<br /><a href="offer.php?do=edit&id='.$result[$i]['id'].'" class="unvalid_edit">Chỉnh sửa</a>';
			//$string .= '<a href="offer.php?do=unvalid&id='.$result[$i]["id"].'">Cấm</a>';
			$result[$i]['validation'] = $string;
		}
		if($result[$i]['valid_status'] == 3) {
			$string = '<img title="Đang chờ duyệt" src="../templates/office/images/alert-icon.png">';
			$string .= '<br /><span class="pending_message">Đang chờ duyệt</span>';
			//$string .= '<a href="offer.php?do=valid&id='.$result[$i]["id"].'">Duyệt</a>';
			//$string .= '<a href="offer.php?do=unvalid&id='.$result[$i]["id"].'">Cấm</a>';
			$result[$i]['validation'] = $string;
		}
	}
	setvar("Items", $result);
}
setvar("right","trade");
uaAssign(array("ByPages"=>$page->getPagenav()));
setvar("OFFER_MODERATE_POINT", $_PB_CACHE['setting']['offer_moderate_point']);
setvar("CheckStatus", $typeoption->get_cache_type("check_status"));
setvar("Amount", $amount);
setvar("TimeStamp", $time_stamp);
template($tpl_file);
?>