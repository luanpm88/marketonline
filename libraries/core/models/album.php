<?php
class Albums extends PbModel {
 	var $name = "Album";

 	function Albums()
 	{
 		parent::__construct();
 	}
	
	function screenshot($file) {
		echo $file;
		//$dir = "/home/marketon/domains/marketonline";
		exec("ffmpeg -i ../../../".$file." -ss 00:00:5.435 -f image2 -vframes 1 ../../../".$file.".thumb.png", $out, $err);
		//exec("ls /", $out, $err);
		var_dump($out);
		var_dump($err);
	}
}
?>