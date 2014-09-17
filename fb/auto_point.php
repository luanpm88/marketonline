<?php
require_once('sharelib.php');
uses("setting","point");

$companydb = new Companies();
$memberdb = new Members();
$tradedb = new Trades();
$setting = new Settings();
$pointdb = new Points();

$joins = array();

$result = "";

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
if(count($rows)) $result .= "Num of connect_facebook: " . count($rows) . $line_break;


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
if(count($rows)) $result .= "Num of checkout: " . count($rows) . $line_break;


//write log
if($result) $result .= date("Y-m-d H:i:s") . $line_break;


if(php_sapi_name() == 'cli') {
  // keep log
  if($result) file_put_contents('/home/marketon/domains/marketonline.vn/public_html/fb/auto_point.log', $result . str_repeat('-', 80) . PHP_EOL, FILE_APPEND);
 
  echo $result;
 
} else {
  $html = '<html><head>';
  $html .= '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
  $html .= '</head>';
  $html .= '<body>';
  $html .= $result;
  $html .= '</body>';
  $html .= '</html>';
  
  echo $html;
}

?>