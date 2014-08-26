<?php

function utf8_to_ascii($str) {
	$chars = array(
		'a' => array('ấ','ầ','ẩ','ẫ','ậ','Ấ','Ầ','Ẩ','Ẫ','Ậ','ắ','ằ','ẳ','ẵ','ặ','Ắ','Ằ','Ẳ','Ẵ','Ặ','á','à','ả','ã','ạ','â','ă','Á','À','Ả','Ã','Ạ','Â','Ă'),
		'e' => array('ế','ề','ể','ễ','ệ','Ế','Ề','Ể','Ễ','Ệ','é','è','ẻ','ẽ','ẹ','ê','É','È','Ẻ','Ẽ','Ẹ','Ê'),
		'i' => array('í','ì','ỉ','ĩ','ị','Í','Ì','Ỉ','Ĩ','Ị'),
		'o' => array('ố','ồ','ổ','ỗ','ộ','Ố','Ồ','Ổ','Ô','Ộ','ớ','ờ','ở','ỡ','ợ','Ớ','Ờ','Ở','Ỡ','Ợ','ó','ò','ỏ','õ','ọ','ô','ơ','Ó','Ò','Ỏ','Õ','Ọ','Ô','Ơ'),
		'u' => array('ứ','ừ','ử','ữ','ự','Ứ','Ừ','Ử','Ữ','Ự','ú','ù','ủ','ũ','ụ','ư','Ú','Ù','Ủ','Ũ','Ụ','Ư'),
		'y' => array('ý','ỳ','ỷ','ỹ','ỵ','Ý','Ỳ','Ỷ','Ỹ','Ỵ'),
		'd' => array('đ','Đ')
	);
	foreach ($chars as $key => $arr)
		foreach ($arr as $val)
		{
			$str = str_replace($val,$key,strtolower($str));
			$str = preg_replace("/ /", '-', $str);
		}	
	return $str;
}

function stringToURI($string)
{
	return preg_replace("/\-$/", '', preg_replace("/\-(\-)+/", '-', preg_replace("/[^A-Za-z0-9 \-]/", '', utf8_to_ascii($string))));
}

// determine script invocation (CLI or Web Server)
if(php_sapi_name() == 'cli') {
  $line_break = PHP_EOL;
} else {
  $line_break = '<br>';
}

require_once("sdk/facebook.php"); // set the right path

$config = array();
$config['appId'] = '632064076907388';
$config['secret'] = 'ad9ff0da7689970bff20c31ac770f90c';
$config['fileUpload'] = false; // optional
$fb = new Facebook($config);

// connect to database
$conn = new mysqli("localhost", "marketon_user", "aA456321@", "marketon_main"); // configure appropriately
// check connection
if ($conn->connect_error) {
  trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
}

mysqli_set_charset( $conn, 'utf8' );

// create array with topics to be posted on Facebook
$sql = 'SELECT com.name as company_name, trade.id, trade.title, trade.content, trade.picture, trade.picture1, trade.picture2, trade.picture3, trade.picture4'    
    .' FROM pb_trades trade'
    .' LEFT JOIN pb_companies as com ON com.id = trade.company_id'
    .' LIMIT 5';

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
    $res["post_title"] = mb_convert_encoding($res_s["company_name"],"ASCII", "UTF8");
    $res["title"]= str_replace('[:vi-vn]', '', $res_s["title"]);
    $res["content"]= strip_tags(str_replace('[:vi-vn]', '', $res_s["content"]));
    
    if(isset($res_s['default_pic']))
    {
        $pic_col = 'picture'.$res_s['default_pic'];
    }
    else
    {
        $pic_col = 'picture';
    }
    
    if ($res_s[$pic_col]) $res['image'] = "http://marketonline.vn/attachment/".$res_s[$pic_col];
    $res['url'] = "http://marketonline.vn/thuong-mai/".$res_s['id']."/".stringToURI($res_s['title']);
    
    $share_topics[] = $res;
}

$rs->free();






$result = '';
// AUTOMATIC POST EACH TOPIC TO FACEBOOK
foreach($share_topics as $share_topic) {
 
  //if(!isset($share_topic['facebook_pubstatus']) && $share_topic['facebook_pubstatus'] == 0) {
  if(true) {  
    // define POST parameters
    $params = array(
      "access_token" => "CAAIZB2ZBLHg3wBAC0gAO4T6zZAXjFrcEpwEgyaZAgdYIuJlkAKANZCIMHhvuUIwEkvzwoKZBfLNVGKrNnBRAURBUccbnlWimiPD1gDjVZCqyybnxpQAR8FwH4oYz5ZAB7EJuJHZCUvQK68y79hTm8GsRDHNCZBxP0y7uKTibX5QhjZAOy50N4ilOeMRZBLx26tBZClxAepxeOG07ST0YX104C1K8ZA", // configure appropriately
      "message" => $share_topic['post_title'],
      "link" => $share_topic['url'],
      "name" => $share_topic['title'],
      "caption" => "http://marketonline.vn", // configure appropriately
      "description" => $share_topic['content']
    );
 
    if($share_topic['image']) {
      $params["picture"] = $share_topic['image'];
    }
 
    // check if topic successfully posted to Facebook
    try {
      $ret = $fb->api('/me/feed', 'POST', $params); // configure appropriately
 
      //// mark topic as posted (ensure that it will be posted only once)
      //$sql = 'UPDATE topics SET facebook_pubstatus = 1 WHERE id = ' . $share_topic['topic_id'];
      //if($conn->query($sql) === false) {
      //  trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
      //}
      $result .= 'successfully posted to Facebook! : ' . $share_topic['url'] . ' ' . $share_topic['title'] . $line_break;
 
    } catch(Exception $e) {
      $result .= ' FAILED... (' . $e->getMessage() . ') : ' . $share_topic['url'] . ' ' . $share_topic['title'] . ' FAILED... (' . $e->getMessage() . ')' . $line_break;
    }
 
    sleep(3);
  }
 
}
 
if(php_sapi_name() == 'cli') {
  // keep log
  //file_put_contents('test.log', $result . str_repeat('=', 80) . PHP_EOL, FILE_APPEND);
 
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







//$params = array (
//    //sthis is the main access token (facebook profile)
//    "access_token" => "CAAIZB2ZBLHg3wBAC0gAO4T6zZAXjFrcEpwEgyaZAgdYIuJlkAKANZCIMHhvuUIwEkvzwoKZBfLNVGKrNnBRAURBUccbnlWimiPD1gDjVZCqyybnxpQAR8FwH4oYz5ZAB7EJuJHZCUvQK68y79hTm8GsRDHNCZBxP0y7uKTibX5QhjZAOy50N4ilOeMRZBLx26tBZClxAepxeOG07ST0YX104C1K8ZA",
//    "message" => "Here is a blog post about auto posting on Facebook using PHP #php #facebook",
//    "link" => "http://www.pontikis.net/blog/auto_post_on_facebook_with_php",
//    "picture" => "http://i.imgur.com/lHkOsiH.png",
//    "name" => "How to Auto Post on Facebook with PHP",
//    "caption" => "www.pontikis.net",
//    "description" => "Automatically post on Facebook with PHP using Facebook PHP SDK. How to create a Facebook app. Obtain and extend Facebook access tokens. Cron automation."
//);
//
//
//try {
//    $ret = $fb->api('/100000235631026/feed', 'POST', $params);
//    echo 'Successfully posted to Facebook Personal Profile';
//} catch(Exception $e) {
//    echo $e->getMessage();
//}
?>