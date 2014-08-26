<?php
    echo "0";
require_once("sdk/facebook.php"); // set the right path
    echo "1";
$config = array();
$config['appId'] = '632064076907388';
$config['secret'] = 'ad9ff0da7689970bff20c31ac770f90c';
$config['fileUpload'] = false; // optional
$fb = new Facebook($config);
    echo "2";
$params = array (
    //sthis is the main access token (facebook profile)
    "access_token" => "CAAIZB2ZBLHg3wBAC0gAO4T6zZAXjFrcEpwEgyaZAgdYIuJlkAKANZCIMHhvuUIwEkvzwoKZBfLNVGKrNnBRAURBUccbnlWimiPD1gDjVZCqyybnxpQAR8FwH4oYz5ZAB7EJuJHZCUvQK68y79hTm8GsRDHNCZBxP0y7uKTibX5QhjZAOy50N4ilOeMRZBLx26tBZClxAepxeOG07ST0YX104C1K8ZA",
    "message" => "Here is a blog post about auto posting on Facebook using PHP #php #facebook",
    "link" => "http://www.pontikis.net/blog/auto_post_on_facebook_with_php",
    "picture" => "http://i.imgur.com/lHkOsiH.png",
    "name" => "How to Auto Post on Facebook with PHP",
    "caption" => "www.pontikis.net",
    "description" => "Automatically post on Facebook with PHP using Facebook PHP SDK. How to create a Facebook app. Obtain and extend Facebook access tokens. Cron automation."
);
    echo "3";
try {
    $ret = $fb->api('/466400200079875/feed', 'POST', $params);
    echo 'Successfully posted to Facebook Personal Profile';
} catch(Exception $e) {
    echo $e->getMessage();
}
?>