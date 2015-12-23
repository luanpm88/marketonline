<?php
    //print_r($_GET);
    define('CURSCRIPT', 'index');
    //$cache_archiver = true;
    $htmlize = true;
    require("../libraries/common.inc.php");
    require("../share.inc.php");

    $member = new Members();
    $pb_userinfo = pb_get_member_info();
    $user = $member->read("*", $pb_userinfo["pb_userid"]);
    $admin = $member->read("*", 1);
    
    if(isset($_GET["code"])) {
        $member->saveField("fb_code", $_GET["code"], intval($user["id"]));
        echo "testing";
        $access_string =  file_get_contents("https://graph.facebook.com/oauth/access_token?client_id=".$admin["fb_app_id"]."&redirect_uri=http://marketonline.vn/fb-tokens/&client_secret=".$admin["fb_secret"]."&code=".$_GET["code"]);
        var_dump("https://graph.facebook.com/oauth/access_token?client_id=".$admin["fb_app_id"]."&redirect_uri=http://marketonline.vn/fb-tokens/&client_secret=".$admin["fb_secret"]."&code=".$_GET["code"]);
        $access_string = explode("=",$access_string);
        $access_token = $access_string[1];
        
        $access_token = explode("&",$access_token);
        $access_token = $access_token[0];
        
        echo $access_token."<br /><br /><br />";
        
        $member->saveField("fb_access_token", $access_token, intval($user["id"]));
        
        $data = file_get_contents("https://graph.facebook.com/me/accounts?access_token=".$access_token);
        
        $member->saveField("fb_data", $data, intval($user["id"]));
        
        echo $data."<br /><br /><br />";
        
        $data = file_get_contents("https://graph.facebook.com/me?access_token=".$access_token);
        $member->saveField("fb_user_id", $data, intval($user["id"]));
        
        //pheader("location: ../virtual-office/company.php");
        echo "<script>window.opener.updateFacebookConnect();window.close()</script>";
    }

?>