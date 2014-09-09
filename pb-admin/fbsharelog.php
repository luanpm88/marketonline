<?php
/**
 *      [PHPB2B] Copyright (C) 2007-2099, Ualink Inc. All Rights Reserved.
 *      The contents of this file are subject to the License; you may not use this file except in compliance with the License. 
 *
 *      @version $Revision: 2075 $
 */
require("../libraries/common.inc.php");
require(PHPB2B_ROOT.'libraries/page.class.php');
require("session_cp.inc.php");
uses("fbsharelog");
$logdb = new Fbsharelogs();
$page = new Pages();

$conditions = array();

$amount = $logdb->findCount(null, $conditions);
$page->setPagenav($amount);
$result = $logdb->findAll("*", null, $conditions, "created DESC", $page->firstcount, $page->displaypg);
//var_dump($result);
setvar("Items", $result);
setvar("ByPages", $page->pagenav);
template("fbsharelog");
?>