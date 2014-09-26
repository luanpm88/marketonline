<?php
class Album extends PbController {
	var $name = "Album";
	
	function Album() {
		global $viewhelper;
		
		$this->loadModel("company");
		$this->loadModel("album");
		
		$this->viewhelper = $viewhelper;
	}
	
	function index() {
		$images = $this->album->Search('image');
		$videos = $this->album->Search('video');
		
		setvar("images",$images);
		setvar("videos",$videos);
		setvar("PageTitle", "Album Thương hiệu - MarketOnline.vn");
		render("company/index", 1);
	}
}
?>