<?php
require_once('sharelib.php'); 
    
    
    



// create array with topics to be posted on Facebook
$sql = 'SELECT type.name as type_name, com.cache_spacename, com.name as company_name, trade.id, trade.facebook_pubstatus, trade.title, trade.content, trade.picture, trade.picture1, trade.picture2, trade.picture3, trade.picture4'    
    .' FROM pb_trades trade'
    .' LEFT JOIN pb_companies as com ON com.id = trade.company_id'
    .' LEFT JOIN pb_tradetypes as type ON type.id = trade.type_id'
    .' WHERE facebook_pubstatus=0'
    .' LIMIT 1';

$rs = $conn->query($sql);
if($rs === false) {
  $user_error = 'Wrong SQL: ' . $sql . '<br>' . 'Error: ' . $conn->errno . ' ' . $conn->error;
  trigger_error($user_error, E_USER_ERROR);
}
$rs->data_seek(0);
$share_topics = array();
while($res_s = $rs->fetch_assoc()) {
    //prepair content
    $res["id"] = $res_s["id"];
    $res["facebook_pubstatus"] = $res_s["facebook_pubstatus"];
    $res['url'] = "http://marketonline.vn/thuong-mai/".$res_s['id']."/".stringToURI($res_s['title']);    
    $res["title"]= str_replace('[:vi-vn]', '', $res_s["title"]);
    $res["content"]= strip_tags(str_replace('[:vi-vn]', '', $res_s["content"]));
    
    $message = str_replace("{chuyen_muc}","Gian hàng Online",$message);
    $message = str_replace("{ten_chu_the}",$res_s["company_name"],$message);
    $message = str_replace("{ten_loai}",$res_s["type_name"],$message);
    $message = str_replace("{ten_bai_viet}",$res["title"],$message);
    $message = str_replace("{link_bai_viet}",$res['url'],$message);
    $res["post_title"] = $message;//mb_convert_encoding($res_s["company_name"],"ASCII", "UTF8");
    
    
    
    if(isset($res_s['default_pic']))
    {
        $pic_col = 'picture'.$res_s['default_pic'];
    }
    else
    {
        $pic_col = 'picture';
    }
    
    if ($res_s[$pic_col]) $res['image'] = "http://marketonline.vn/attachment/".$res_s[$pic_col];
    
    
    $share_topics[] = $res;
}

$rs->free();






$result = '';
// AUTOMATIC POST EACH TOPIC TO FACEBOOK
foreach($share_topics as $share_topic) {
 
  if($share_topic['facebook_pubstatus'] == 0) {
  //if(true) {  
    // define POST parameters
    $params = array(
      "access_token" => $fb_access_token, // configure appropriately
      "message" => $share_topic['post_title'],
      "link" => $share_topic['url'],
      "name" => $share_topic['title'],
      "caption" => "http://marketonline.vn", // configure appropriately
      "description" => $share_topic['content']
    );
 
    if(isset($share_topic['image'])) {
      $params["picture"] = $share_topic['image'];
    }
 
    // check if topic successfully posted to Facebook
    try {
      $ret = $fb->api('/me/feed', 'POST', $params); // configure appropriately
 
      // mark topic as posted (ensure that it will be posted only once)
      $sql = 'UPDATE pb_trades SET facebook_pubstatus = 1 WHERE id = ' . $share_topic['id'];
      if($conn->query($sql) === false) {
        trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
      }
      $result .= 'successfully posted to Facebook! : ' . $share_topic['url'] . ' ' . $share_topic['title'] . $line_break;
 
    } catch(Exception $e) {
      $result .= ' FAILED... (' . $e->getMessage() . ') : ' . $share_topic['url'] . ' ' . $share_topic['title'] . ' FAILED... (' . $e->getMessage() . ')' . $line_break;
    }
 
    sleep(3);
  }
  
}
 
if(php_sapi_name() == 'cli') {
  // keep log
  if($result) file_put_contents('/home/marketon/domains/marketonline.vn/public_html/fb/auto_trade.log', $result . str_repeat('=', 80) . PHP_EOL, FILE_APPEND);

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