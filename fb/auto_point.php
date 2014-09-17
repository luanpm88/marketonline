<?php
require_once('sharelib.php');
uses("setting","point");

$companydb = new Companies();
$memberdb = new Members();
$tradedb = new Trades();
$setting = new Settings();
$pointdb = new Points();

$joins = array();

$conditions = array();
$joins = array();
$joins[] = "LEFT JOIN (SELECT member_id, MAX(created) AS max_date FROM {$memberdb->table_prefix}pointlogs pointlogs WHERE pointlogs.action_name='connect_facebook' GROUP BY member_id) logs ON logs.member_id=Member.id";
$conditions[] = "(logs.max_date<".($memberdb->timestamp-30*86400)." OR logs.max_date IS NULL)";
$conditions[] = "fb_access_token != ''";
$rows = $memberdb->findAll("logs.max_date,Member.*", $joins, $conditions);
foreach($rows as $member) {
    $return =  file_get_contents("https://graph.facebook.com/me?access_token=".$member["fb_access_token"]);
    $return = json_decode($return,true);
    if($return["id"]) {
        $pointdb->update("connect_facebook",intval($member["id"]));
    }
}

$conditions = array();
$joins = array();
$joins[] = "LEFT JOIN (SELECT member_id, MAX(created) AS max_date FROM {$memberdb->table_prefix}pointlogs pointlogs WHERE pointlogs.action_name='checkout' GROUP BY member_id) logs ON logs.member_id=Member.id";
$conditions[] = "(logs.max_date<".($memberdb->timestamp-30*86400)." OR logs.max_date IS NULL)";
$conditions[] = "fb_access_token != ''";
$rows = $memberdb->findAll("logs.max_date, Member.*", $joins, $conditions);
//var_dump($rows);

foreach($rows as $member) {    
    $pointdb->update("checkout",intval($member["id"]));
}

?>