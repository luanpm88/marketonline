<?php
class Album extends PbController {
	var $name = "Album";
	
	function Album() {
		global $viewhelper;
		
		$this->loadModel("company");
		$this->loadModel("album");
		$this->loadModel("albumtype");
		$this->loadModel("attachmentcomment");
		$this->loadModel("attachment");
		
		$this->viewhelper = $viewhelper;
	}
	
	function index() {
		$images = $this->album->Search('image');
		$videos = $this->album->Search('video');
		
		$albumtypes = $this->albumtype->findAll("*");
		//var_dump($albumtypes);
		foreach($albumtypes as $key => $albumtype) {
			$albumtypes[$key]["videos"] = $this->album->Search('video', $albumtype["id"]);
			//var_dump($albumtypes[$key]["videos"]);
		}
		setvar("albumtypes",$albumtypes);
		setvar("images",$images);
		setvar("videos",$videos);
		setvar("PageTitle", "Album Thương hiệu - MarketOnline.vn");
		render("company/index", 1);
	}
	
	function detail() {
		global $customer_code;
		
		if(!isset($_GET["id"]))
		{
			return;
		}
		
		if(isset($_GET["id"]))
		{
			$id = intval($_GET["id"]);
			
			$item = $this->album->getInfoById($id);
			//var_dump($item);
			
			if(!$item["id"]) {
				flash("Hình ảnh/videos đã bị xóa", '', 0, '', '<a class="link_underline" href="'.$this->album->url(array("module"=>"album")).'">Mời Quý khách xem hình ảnh/videos khác tại đây</a>');
			}
			
			$company = $this->company->getInfoByUserId($item["member_id"]);
			
			$images = $this->album->Search('image');
			$videos = $this->album->Search('video');
			
			$albumtypes = $this->albumtype->findAll("*");
			//var_dump($albumtypes);
			foreach($albumtypes as $key => $albumtype) {
				$albumtypes[$key]["videos"] = $this->album->Search('video', $albumtype["id"]);
			}
			setvar("albumtypes",$albumtypes);
			
			setvar("images",$images);
			setvar("videos",$videos);
			
			
			$comments_count =  $this->attachmentcomment->findCount(null, array("attachment_id=".$item["attachment_id"]));
			setvar("comments_count",$comments_count);
			
			//clicked for attachment
			$Trade = $this->attachment->read("*", $item["attachment_id"], null, null);			
			$this->attachment->clicked($customer_code, $Trade);
			
			setvar("item",$item);
			setvar("company",$company);
			setvar('fb_image', $item['image']);
			setvar('fb_description', strip_tags($item['description']));
			setvar("PageTitle", $item["title"]." - MarketOnline.vn");
			render("album/detail", 1);
		}		
	}
}
?>