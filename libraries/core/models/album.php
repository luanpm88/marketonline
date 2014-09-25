<?php
class Albums extends PbModel {
 	var $name = "Album";

 	function Albums()
 	{
 		parent::__construct();
 	}
	
	function screenshot($file) {
		exec("ffmpeg",$output,$vars);
		var_dump($output);
		var_dump($vars);
	}
}
?>