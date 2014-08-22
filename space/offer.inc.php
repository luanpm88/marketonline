<?php
/**
 *      [PHPB2B] Copyright (C) 2007-2099, Ualink Inc. All Rights Reserved.
 *      The contents of this file are subject to the License; you may not use this file except in compliance with the License. 
 *
 *      @version $Revision: 2048 $
 */
if(!defined('IN_PHPB2B')) exit('Not A Valid Entry Point');
uses("trade", "tradefield", "tradetype","form","tradecomment");
$form = new Forms();
$tradecomment = new Tradecomments();
$trade = new Trades();
$trade_controller = new Trade();
$tradetype = new Tradetypes();
$conditions = array();
$conditions[]= "Trade.status=1";
$list = false;
if (!empty($member->info['id'])) {
	$conditions[] = "Trade.member_id='".$member->info['id']."'";
}
if (!empty($company->info['id'])) {
	$conditions[] = "Trade.company_id='".$company->info['id']."'";
}

if(isset($_GET["typeid"]))
{
	$list = true;
	$Type = $tradetype->read("*", $_GET["typeid"], null, null);
	$conditions[] = "Trade.type_id='".$_GET["typeid"]."'";
}

if(isset($_GET["nid"]))
{
	global $customer_code;
	
	$Trade = $trade->read("*", $_GET["nid"], null, null);
	$Trade = $trade->getProductById($_GET["nid"]);
	
	$trade->clicked($customer_code, $Trade);
	
	$Trade["name"] = strip_tags(pb_lang_split($Trade["title"]));
	$Trade["content"] = pb_lang_split($Trade["content"]);
	$Trade['content'] = str_replace("&quot;",'"',$Trade['content']);
	$Trade["price"] = number_format($Trade["price"], 0, ',', '.');
	
	$Type = $tradetype->read("*", $Trade["type_id"], null, null);
	//var_dump($_GET["nid"]);
	setvar("Type", $Type);
	
	
		
	
	//var_dump($Trade['formattribute_ids']);
	if (isset($Trade['formattribute_ids'])) {
			$form_vars = $form->getAttributes(explode(",", $Trade['formattribute_ids']),2);
			//echo $form_vars["old_price"];
	//		$form_vars[4]["value"] = number_format($form_vars[4]["value"], 0, ',', '.');
			setvar("ObjectParams", $form_vars);
	//		setvar("OldPrice", $form_vars[4]["value"]);
	//		//var_dump($form_vars);
	}
	
	$comments_count =  $tradecomment->findCount(null, array("trade_id=".$Trade["id"]));
	setvar("comments_count", $comments_count);
	
	//var_dump($Trade);
	setvar("Trade", $Trade);
	$space->render("offer_detail");
	exit;
}

$amount = $trade->findCount(null, $conditions,"Trade.id");

setvar("TradeTypes", $tradetypes = $trade_controller->getTradeTypes());
setvar("TradeNames", $tradenames = $trade_controller->getTradeTypeNames());
setvar("paging", array('total'=>$amount));
setvar("list", $list);
setvar("Type", $Type);
$space->render("offer");
?>