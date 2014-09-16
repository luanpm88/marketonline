<?php
require_once('sharelib.php');
uses("setting","point");

$companydb = new Companies();
$memberdb = new Members();
$tradedb = new Trades();
$setting = new Settings();
$pointdb = new Points();

$rows = $memberdb->findAll("*", null, array("fb_access_token != ''"));
foreach($rows as $member) {
    $pointdb->update("connect_facebook",intval($member["id"]));
}

//$rows = $memberdb->findAll("*", null, array("checkout == 0"));
//foreach($rows as $member) {
//    $pointdb->update("connect_facebook",intval($member["id"]));
//}

?>