<?php
header('Content-Type: application/json');
if($_POST)
{
if($_POST['email'])
{
$incominglist = $_POST['email'];
$full=array();
$con=mysqli_connect("localhost","marketon_user","aA456321@","marketon_main");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT email,pic,name FROM email");
$full = array();
while($row = mysqli_fetch_assoc($result)) { 
	$full[]=$row['email'];
	$fulls[]=$row['pic'];
	$fulln[]=$row['name'];

}
  $friendlist = array_intersect($full,$incominglist);
  $piclist = array_intersect_key($fulls, $friendlist);
  $namelist = array_intersect_key($fulln, $friendlist);
   $friendlist = array_values($friendlist);
   $piclist = array_values($piclist);
   $namelist = array_values($namelist);
  
  $newlist= array_diff($incominglist,$friendlist);
  $newlist = array_values($newlist);
 echo json_encode(array("newlist" =>$newlist,"users" =>$friendlist,"pic" => $piclist,"name" => $namelist));


mysqli_close($con);
}
}