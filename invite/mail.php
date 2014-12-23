<html>
<head><title>PHP Mail Sender</title></head>
<body>
<?php
$list = $_POST['check'];
foreach ($list as $user){
$email = $user;
$message = "Welcome to i-visionblog.com | invite by email script! this is an test invite mail from localhost!";
$subject = "test mail - i-visionblog";
if (mail($email,$subject,$message)) {
  echo "<h4>Thank you for sending email</h4>";
} else {
  echo "<h4>Can't send email to $email</h4>";
}

}

?>
</body>
</html>