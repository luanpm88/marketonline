<?php
require_once('sharelib.php');
uses("setting");

$companydb = new Companies();
$tradedb = new Trades();
$setting = new Settings();

$row = $setting->findAll("*", null, array("variable='auto_click_settings'"));
$settings = json_decode($row[0]["valued"], true);
if(!$settings) {
    $settings = array();
}
//var_dump($settings);

$sql = "update pb_companies set clicked=clicked+FLOOR((RAND() * ({$settings["max_rand"]}-{$settings["min_rand"]}+1))+{$settings["min_rand"]}), new_clicked=new_clicked+FLOOR((RAND() * ({$settings["max_rand"]}-{$settings["min_rand"]}+1))+{$settings["min_rand"]}) where clicked >= ".$settings["min_rate"]." AND clicked <= ".$settings["max_rate"]."";
$return = $companydb->dbstuff->Execute($sql);

echo "Trade auto click... <br />";


$sql = "update pb_trades set clicked=clicked+FLOOR((RAND() * ({$settings["offer_max_rand"]}-{$settings["offer_min_rand"]}+1))+{$settings["offer_min_rand"]}) where clicked >= ".$settings["offer_min_rate"]." AND clicked <= ".$settings["offer_max_rate"]."";
$return = $tradedb->dbstuff->Execute($sql);

echo "Product auto click... <br />";




?>