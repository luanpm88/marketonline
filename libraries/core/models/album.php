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

		// duration in seconds; half the duration = middle
		$duration = explode(":",$time);   
		$durationInSeconds = $duration[0]*3600 + $duration[1]*60+ round($duration[2]);
		$durationMiddle = $durationInSeconds/2;
		
		// recalculte to minutes and seconds
		$minutes = $durationMiddle/60;
		$realMinutes = floor($minutes);
		$realSeconds = round(($minutes-$real_minutes)*60);
		
		var_dump($realMinutes);
		var_dump($realSeconds);
		
		exec("ffmpeg -i {$file} -ss {$realMinutes}:{$realSeconds}:5.435 -f image2 -vframes 1 {$file}.thumb.png",$output,$vars);
		var_dump($output);
		var_dump($vars);
	}
}
?>