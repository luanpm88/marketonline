<?php
 echo "0";
require_once("sdk/facebook.php"); // set the right path
 echo "1";
$config = array();
$config['appId'] = '1474589189465986';
$config['secret'] = 'f02d8dc5fcb156d9cb393f26db039d25';
$config['fileUpload'] = false; // optional
$fb = new Facebook($config);
 echo "2";
$params = array(
  // this is the main access token (facebook profile)
  "access_token" => "CAAU9IYzT54IBAHZAxxr4U44xHHHiAzeZCNNyEip8b7ZBV1y9I8HkMUL896SxRnra1gcWyAhmXc2DG7cJAehVKMAK3gHZB8ulZA754jE0PqcqR7bVCPhy3l6lhUcQfvfP04D1YZA586ev8zJvDewDHHOIFOWtIMeGehIum40cfGW3bWgaNXlI0DT7IoHpwrZC5KlUcmnZCOCgKF1RiHdhvZBRR",
  "message" => "Here is a blog post about auto posting on Facebook using PHP #php #facebook",
  "link" => "http://www.pontikis.net/blog/auto_post_on_facebook_with_php",
  "picture" => "http://i.imgur.com/lHkOsiH.png",
  "name" => "How to Auto Post on Facebook with PHP",
  "caption" => "www.pontikis.net",
  "description" => "Automatically post on Facebook with PHP using Facebook PHP SDK. How to create a Facebook app. Obtain and extend Facebook access tokens. Cron automation."
);
 echo "3";
try {
  $ret = $fb->api('/me/feed', 'POST', $params);
  echo 'Successfully posted to Facebook Personal Profile';
} catch(Exception $e) {
  echo $e->getMessage();
}
?>