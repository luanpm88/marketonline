<?php
class Albums extends PbModel {
 	var $name = "Album";

 	function Albums()
 	{
 		parent::__construct();
 	}
	
	function screenshot($file) {
		//exec("ffmpeg -i album-757-118.mp4 -ss 00:00:5.435 -f image2 -vframes 1 album-757-118.mp4.thumb.png",$output,$vars);
		$file = "/home/marketon/domains/marketonline.vn/public_html/".$file;
		
		
		$time =  exec("ffmpeg -i {$file} 2>&1 | grep 'Duration' | cut -d ' ' -f 4 | sed s/,//");   
		//echo $time;
		// duration in seconds; half the duration = middle
		$duration = explode(":",$time);
		$duration[2] = intval($duration[2]/2);
		$duration[1] = intval($duration[1]/2);
		$duration[0] = intval($duration[0]/2);
		
		$total = $duration[0]*3600+$duration[0]*60+$duration[0];
		$middle = intval($total/2);
		
		$hour = intval($middle/3600);
		$minute = intval(($middle/60)%60);
		$second = intval($middle%60);
		
		exec("ffmpeg -i {$file} -ss {$hour}:{$minute}:{$second} -f image2 -vframes 1 {$file}.thumb.png",$output,$vars);
		var_dump("ffmpeg -i {$file} -ss {$hour}:{$minute}:{$second} -f image2 -vframes 1 {$file}.thumb.png");
		//var_dump($vars);
	}
}
?>