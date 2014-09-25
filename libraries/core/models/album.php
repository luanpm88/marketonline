<?php
class Albums extends PbModel {
 	var $name = "Album";

 	function Albums()
 	{
 		parent::__construct();
 	}
	
	function screenshot($file) {
		echo $file;
		var_dump(shell_exec("ffmpeg -i album-757-118.mp4 -ss 00:00:5.435 -f image2 -vframes 1 album-757-118.mp4.thumb.png"));
		echo "ffmpeg -i ../../../".$file." -ss 00:00:5.435 -f image2 -vframes 1 ../../../".$file.".thumb.png";
	}
}
?>