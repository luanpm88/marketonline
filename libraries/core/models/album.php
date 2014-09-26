<?php
class Albums extends PbModel {
 	var $name = "Album";

 	function Albums()
 	{
 		parent::__construct();
 	}
	
	function screenshot($file) {
		//echo getcwd();
		//exec("ffmpeg -i album-757-118.mp4 -ss 00:00:5.435 -f image2 -vframes 1 album-757-118.mp4.thumb.png",$output,$vars);
		$file = "..".DS.$file;
		
		
		$time =  exec('ffmpeg -i '.$file.' 2>&1 | grep "Duration" | cut -d " " -f 4 | sed s/,//');
		// echo 'ffmpeg -i '.$file.' 2>&1 | grep "Duration" | cut -d " " -f 4 | sed s/,//';
		// var_dump($time);
		// duration in seconds; half the duration = middle
		$duration = explode(":",$time);
		
		$total = $duration[0]*3600 + $duration[1]*60 + $duration[2];
		$middle = intval($total/2);
		
		$hour = intval($middle/3600);
		$minute = intval($middle/60)%60;
		$second = $middle%60;
		
		//@unlink($file);
		
		exec("ffmpeg -y -i {$file} -ss {$hour}:{$minute}:{$second} -f image2 -vframes 1 {$file}.thumb.png",$output,$vars);
		//var_dump("ffmpeg -i {$file} -ss {$hour}:{$minute}:{$second} -f image2 -vframes 1 {$file}.thumb.png");
		//var_dump($vars);
	}
	
	function Search($type=null) {
		$num_per_page = 35;
		$offset = 0;
		$conditions = array();
		$joins = array();
		
		if($type) {
			$conditions[] = "type='".$type."'";
		}
		
		$joins[] = "LEFT JOIN {$this->table_prefix}attachments att ON att.id=Album.attachment_id";
		$joins[] = "LEFT JOIN {$this->table_prefix}members m ON m.id=Album.member_id";
		$joins[] = "LEFT JOIN {$this->table_prefix}companies c ON c.member_id=Album.member_id";
		
		$list = $this->findAll("c.shop_name,m.space_name,att.modified,att.title,att.modified,att.attachment,Album.*",$joins,$conditions,"att.modified DESC",$offset,$num_per_page);
		foreach($list as $key => $item) {
			$list[$key]['href'] = pb_get_attachmenturl($item['attachment'], '', "");
			$list[$key]['image'] = pb_get_attachmenturl($item['attachment'], '', "small");
			if($list[$key]['type']=='video') {
				$list[$key]['image'] = URL."attachment/".$item['attachment'].".thumb.png?v=".$item['modified'];
				$list[$key]['source'] = URL."attachment/".$item['attachment']."?v=".$item['modified'];
				$list[$key]['href'] = $list[$key]['source'];
			}
			if($list[$key]['thumb_id']) {
				$list[$key]['image'] = URL."attachment/".$item['attachment'].".thumb.jpg?v=".$item['modified'];
			}
			
		}
		
		return $list;
	}
}
?>