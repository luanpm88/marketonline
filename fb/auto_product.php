<?php
require_once('Encoding.php'); 
use \ForceUTF8\Encoding;  // It's namespaced now.

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
//$conn = new mysqli("localhost", "root", "", "marketonline"); // configure appropriately
// check connection
if ($conn->connect_error) {
  trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
}
mysqli_set_charset( $conn, 'utf8' );

//get message template
$sql = 'SELECT *'    
    .' FROM pb_announcements'
    .' WHERE id=21'
    .' LIMIT 1';
$mm = $conn->query($sql);
if($mm === false) {
  $user_error = 'Wrong SQL: ' . $sql . '<br>' . 'Error: ' . $conn->errno . ' ' . $conn->error;
  trigger_error($user_error, E_USER_ERROR);
}
$mm->data_seek(0);
$template = $mm->fetch_assoc();
$message = Encoding::toUTF8($template["message"]);
$message = strip_tags(str_replace("<br />","\n",$message));
    
    
    



// create array with topics to be posted on Facebook
$sql = 'SELECT com.cache_spacename, com.name as company_name, product.id, product.facebook_pubstatus, product.name, product.content, product.picture, product.picture1, product.picture2, product.picture3, product.picture4'    
    .' FROM pb_products product'
    .' LEFT JOIN pb_companies as com ON com.id = product.company_id'
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
    $res["title"]= str_replace('[:vi-vn]', '', $res_s["name"]);
    $res['url'] = "http://marketonline.vn/san-pham/".$res_s['id']."/".stringToURI($res['title']);
    $res["content"]= strip_tags(str_replace('[:vi-vn]', '', $res_s["content"]));
    
    $message = str_replace("{chuyen_muc}","Gian hàng Online",$message);
    $message = str_replace("{ten_chu_the}",$res_s["company_name"],$message);
    $message = str_replace("{ten_loai}","Sản phẩm",$message);
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
 
      // mark topic as posted (ensure that it will be posted only once)
      $sql = 'UPDATE pb_products SET facebook_pubstatus = 1 WHERE id = ' . $share_topic['id'];
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
  file_put_contents('/home/marketon/domains/marketonline.vn/public_html/fb/auto_product.log', $result . str_repeat('=', 80) . PHP_EOL, FILE_APPEND);
 
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