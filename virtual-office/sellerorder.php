<?php
/**
 *      [PHPB2B] Copyright (C) 2007-2099, Ualink Inc. All Rights Reserved.
 *      The contents of this file are subject to the License; you may not use this file except in compliance with the License. 
 *
 *      @version $Revision: 2075 $
 */
require("../libraries/common.inc.php");
require("room.share.php");
require(PHPB2B_ROOT.'libraries/page.class.php');
uses("message","saleorder","saleorderitem", "members");

$saleorder = new Saleorders();
$saleorderitem = new saleorderitems();

$member = new Members();


$pms = new Messages();
$page = new Pages();




$fields = "id,buyer_id";
$conditions[] = "seller_id=".$the_memberid;





if (isset($_GET['type'])) {
	$type = trim($_GET['type']);
	if (in_array($type, array("system", "user", "inquery"))) {
		$conditions[] = "type='".$type."'";
	}
}
if (isset($_GET['do'])) {
	$do = trim($_GET['do']);
	if (!empty($_GET['id'])) {
		$id = intval($_GET['id']);
	}
	if ($do=="send") {
		$item = array();
		if (isset($_GET['to'])) {
			$item['to'] = $_GET['to'];
		}
		setvar("item", $item);
		template("pms_send");
		exit;
	}
	if($do == "view" && !empty($id)){
		//
		
		pheader("location: http://marketonline.vn:3000/pb_saleorders/".$id);
		
						$datas = $saleorderitem->getStickyDatas($id);
						$info = $saleorder->read("*", $id, null, array('id'=>$id));
						
						if($info["seller_id"] != $the_memberid) {
							pheader("location:index.php");
						}
						
						if($info["read"] == 0)
						{
							$saleorder->saveField("`read`", 1, intval($id));
						}
						
						$seller = $member->read("c.shop_name,Member.*, mf.address, mf.mobile", $info["seller_id"], null, array('id'=>$info["seller_id"]), array("LEFT JOIN pb_memberfields mf ON mf.member_id=Member.id","LEFT JOIN pb_companies c ON c.member_id=Member.id"));
						//var_dump($seller);
						//var_dump($datas);
						
						foreach($datas["items"] as $key => &$item)
						{
							$item["p_total"] = number_format($item["p_price"]*$item["quantity"], 0, ',', '.');
							$item["p_price"] = number_format($item["p_price"], 0, ',', '.');
						}
						
						$datas["total"] = number_format($datas["total"], 0, ',', '.');
						
						$info["created"] = date("Y-m-d H:i:s",$info["created"]);
						
						setvar("StickyItems", $datas);
						setvar("Info", $info);
						setvar("total", $cartitem->total);
						setvar("Seller", $seller);
						setvar("PageTitle","Đơn đặt hàng");

						if(detectMobile()) {	
							$smarty->template_dir = PHPB2B_ROOT. "templates/default/mobile/office/";
							template("m_sellerorder_detail");
						} else {
							template("sellerorder_detail");
						}
						exit;
	}
}
if (isset($_POST['send']) && !empty($_POST['pms'])) {
	pb_submit_check('pms');
	$vals = array();
	$vals = $_POST['pms'];
	$vals['type'] = 'user';
	if (is_int($_POST['to'])) {
		$to_memberid = intval($_POST['to']);
		$member_info = $pdb->GetRow("SELECT id,username FROM {$tb_prefix}members WHERE id='".$to_memberid."'");
	}else{
		$member_info = $pdb->GetRow("SELECT id,username FROM {$tb_prefix}members WHERE username='".$_POST['to']."'");
	}
	if (!$member_info || empty($member_info) || $member_info['id']==$the_memberid) {
		flash();
	}
	$result = $pms->SendToUser($the_membername, $member_info['username'], $vals);
	if (!$result) {
		flash();
	}
}

if (isset($_POST['del'])) {
	$result = $pms->del($_POST['id'],"to_member_id=".$the_memberid);
	if ($result) {
		pheader("location:pms.php");
	}else {
		flash();
	}
}
$tpl_file = "sellerorder";
$page->displaypg = 25;
$amount = $saleorder->findCount(null, $conditions);
//echo $amount;
$page->setPagenav($amount);
$result = $saleorder->findAll("Saleorder.read, mf.first_name, mf.last_name, Member.username, Saleorder.id,Saleorder.buyer_id,Saleorder.message,Saleorder.created, space_name", array("LEFT JOIN pb_members as Member ON Member.id = Saleorder.buyer_id","LEFT JOIN pb_memberfields as mf ON Member.id = mf.member_id"), $conditions, "id DESC", $page->firstcount, $page->displaypg);

if (!empty($result)) {
	for($i=0; $i<count($result); $i++){
		$result[$i]['created'] = df($result[$i]['created']);		
	}
	setvar("Items",$result);
}

setvar("ByPages",$page->pagenav);

setvar("PageTitle","Đơn đặt hàng");

if(detectMobile()) {	
	$smarty->template_dir = PHPB2B_ROOT. "templates/default/mobile/office/";
	template("m_sellerorder");
} else {
	template($tpl_file);
}
?>