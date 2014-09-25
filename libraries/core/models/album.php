<?php
class Albums extends PbModel {
 	var $name = "Album";

 	function Albums()
 	{
 		parent::__construct();
 	}
	
	function screenshot($file) {
		//exec("ffmpeg -i album-757-118.mp4 -ss 00:00:5.435 -f image2 -vframes 1 album-757-118.mp4.thumb.png",$output,$vars);
		exec("ls /home/marketon/domains/marketonline.vn/public_html/",$output,$vars);
		var_dump($output);
		var_dump($vars);
	}
}
?>