<?php
require_once('sharelib.php');

$companydb = new Companies();
$tradedb = new Trades();

$setting_file = "auto_click.setting";
$json = file_get_contents($setting_file);
$settings = json_decode($json, true);
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