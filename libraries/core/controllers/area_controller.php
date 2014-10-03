<?php
class Area extends PbController {
	var $name = "Area";
	var $names = array();
	
	function Area()
	{
		$this->loadModel("area");
		$this->loadModel("areatype");
		$this->loadModel("product");
		$this->loadModel("trade");
		$this->loadModel("company");
		$this->loadModel("job");
		$this->loadModel("school");
		$this->loadModel("studygroup");
	}
	
	function getNames()
	{
		return $this->names;
	}
	
	function &getInstance() {
		static $instance = array();
		if (!$instance) {
			$instance[0] = new Area();
		}
		return $instance[0];
	}
	
	function setNames()
	{
		if(func_num_args()<1) return;
		$return  = array();
		$_PB_CACHE['area'] = cache_read("area");
		$args = func_get_args();
		foreach ($args as $key=>$val) {
			$return[] = isset($_PB_CACHE['area'][$val]) ? $_PB_CACHE['area'][$val] : '';
		}
		$this->names = $return;
	}
	
	function listing() {
		$areatypes = $this->areatype->findAll("*");
		//var_dump($_GET);
		//get area
		if(isset($_GET["area_id"])){
			$area_id = $_GET["area_id"];
			$area = $this->area->read("*",$area_id);
			$area_name = $area["name"];
			setvar("area",$area);
		}
		if(isset($_GET["areatype_id"])){
			$areatype_id = $_GET["areatype_id"];
			$areatype = $this->areatype->read("*",$areatype_id);
			$areatype_name = "/".$areatype["name"];
			setvar("areatype",$areatype);
		}
		
		//get areas with level 2
		foreach($areatypes as $key => $areatype) {
			$areas = $this->area->findAll("*",null,array("level=2","areatype_id=".$areatype["id"]),"Area.display_order");
			$areatypes[$key]["areas"] = $areas;
		}
		setvar("areatypes",$areatypes);
		
		//GET
		$type = $_GET["type"];
		switch($type) {
			case 'thuong-hieu':
				$script = '
						ajaxLoadModule("company_module", "ajaxCompanyModule","","",1);
						$(".company_module .subtab-area ul li a").live("click", function() {
						   ajaxLoadModule("company_module", "ajaxCompanyModule", "membergroup_id",$(this).attr("rel"),1);
						});
						$(".company_module a.main_a").live("click", function() {
						    ajaxLoadModule("company_module", "ajaxCompanyModule","","",1);
						});
					';
				$container = '<div class="works-list album area-module company_module starting"></div>';
				$paging = 'ajaxLoadModule("company_module", "ajaxCompanyModule", "membergroup_id",$(".areas-container .subtab-area ul li a.active").attr("rel"),$(this).attr("rel"));';
				$PageTypeName = "Thương hiệu";
				break;
			case 'san-pham':
				$script = '
						ajaxLoadModule("product_module", "ajaxProductModule","","",1);
						$(".product_module .subtab-area ul li a").live("click", function() {
						   ajaxLoadModule("product_module", "ajaxProductModule","","",1);
						});
						$(".product_module a.main_a").live("click", function() {
						    ajaxLoadModule("product_module", "ajaxProductModule","","",1);
						});
					';
				$container = '<div class="works-list album area-module product_module starting"></div>';
				$paging = 'ajaxLoadModule("product_module", "ajaxProductModule","","",$(this).attr("rel"));';
				$PageTypeName = "Sản Phẩm";
				break;
			case 'dich-vu':
				$script = '
						ajaxLoadModule("service_module", "ajaxServiceModule","","",1);
						$(".service_module .subtab-area ul li a").live("click", function() {
						   ajaxLoadModule("service_module", "ajaxServiceModule","","",1);
						});
						$(".service_module a.main_a").live("click", function() {
						    ajaxLoadModule("service_module", "ajaxServiceModule","","",1);
						});
					';
				$container = '<div class="works-list album area-module service_module starting"></div>';
				$paging = 'ajaxLoadModule("service_module", "ajaxServiceModule","","",$(this).attr("rel"));';
				$PageTypeName = "Dịch vụ";
				break;
			case 'viec-lam':
				$script = '
						ajaxLoadModule("job_module", "ajaxJobModule","","",1);
						$(".job_module .subtab-area ul li a").live("click", function() {
						   ajaxLoadModule("job_module", "ajaxJobModule","","",1);
						});
						$(".job_module a.main_a").live("click", function() {
						    ajaxLoadModule("job_module", "ajaxJobModule","","",1);
						});
					';
				$container = '<div class="works-list album area-module job_module starting"></div>';
				$paging = 'ajaxLoadModule("job_module", "ajaxJobModule","","",$(this).attr("rel"));';
				$PageTypeName = "Việc làm";
				break;
			case 'thuong-mai':
				$script = '
						ajaxLoadModule("trade_module", "ajaxTradeModule","","",1);
						$(".trade_module .subtab-area ul li a").live("click", function() {
						   ajaxLoadModule("trade_module", "ajaxTradeModule", "type_id",$(this).attr("rel"),1);
						});
						$(".trade_module a.main_a").live("click", function() {
						    ajaxLoadModule("trade_module", "ajaxTradeModule","","",1);
						});
					';
				$container = '<div class="works-list album area-module trade_module starting"></div>';
				$paging = 'ajaxLoadModule("trade_module", "ajaxTradeModule", "type_id",$(".areas-container .subtab-area ul li a.active").attr("rel"),$(this).attr("rel"));';
				$PageTypeName = "Thương mại";
				break;
			case 'hoc-tap':
				$script = '
						ajaxLoadModule("school_module", "ajaxSchoolModule","","",1);
						$(".school_module .subtab-area ul li a").live("click", function() {
						   ajaxLoadModule("school_module", "ajaxSchoolModule", "type",$(this).attr("rel"),1);
						});
						$(".school_module a.main_a").live("click", function() {
						    ajaxLoadModule("school_module", "ajaxSchoolModule","","",1);
						});
					';
				$container = '<div class="works-list album area-module school_module starting"></div>';
				$paging = 'ajaxLoadModule("school_module", "ajaxSchoolModule", "type",$(".areas-container .subtab-area ul li a.active").attr("rel"),$(this).attr("rel"));';
				$PageTypeName = "Học tập";
				break;
			default:
				break;
		}
		setvar("script",$script);
		setvar("container",$container);
		setvar("paging",$paging);
		setvar("PageTypeName",$PageTypeName);
		
		if($PageTypeName) $ttypename = $PageTypeName." - ";
		setvar("PageTitle",$ttypename."Thị trường ".$area_name.$areatype_name.", Việt Nam - MarketOnline.vn");
		render("area/listing", 1);
	}
	
	function index() {
		$areatypes = $this->areatype->findAll("*");
		
		//get area
		if(isset($_GET["area_id"])){
			$area_id = $_GET["area_id"];
			$area = $this->area->read("*",$area_id);
			$area_name = "/".$area["name"];
			setvar("area",$area);
		}
		if(isset($_GET["areatype_id"])){
			$areatype_id = $_GET["areatype_id"];
			$areatype = $this->areatype->read("*",$areatype_id);
			$areatype_name = $areatype["name"];
			setvar("areatype",$areatype);
		}
		
		//get areas with level 2
		foreach($areatypes as $key => $areatype) {
			$areas = $this->area->findAll("*",null,array("level=2","areatype_id=".$areatype["id"]),"Area.display_order");
			$areatypes[$key]["areas"] = $areas;
		}
		setvar("areatypes",$areatypes);
		
		////get products by areas
		//$products = $this->product->getByArea(array("area_id"=>$area_id,"areatype_id"=>$areatype_id,"service"=>0));
		//setvar("products",$products);
		//
		////get services by areas
		//$services = $this->product->getByArea(array("area_id"=>$area_id,"areatype_id"=>$areatype_id,"service"=>1));
		//setvar("services",$services);
		
		////get trades by areas
		//$trades = $this->trade->getByArea(array("area_id"=>$area_id,"areatype_id"=>$areatype_id));
		//setvar("trades",$trades);
		
		////get companies by areas
		//$companies = $this->company->getByArea(array("area_id"=>$area_id,"areatype_id"=>$areatype_id));
		//setvar("companies",$companies);
		
		////get jobs by areas
		//$jobs = $this->job->getByArea(array("area_id"=>$area_id,"areatype_id"=>$areatype_id));
		//setvar("jobs",$jobs);
		
		setvar("PageTitle","Thị trường ".$areatype_name.$area_name.", Việt Nam - MarketOnline.vn");
		render("area/index", 1);
	}
	
	function ajaxTradeModule() {
		$offset = 0;
		$row = 3;
		$num = 7;
		
		//GETs
		if(isset($_GET["area_id"])){
			$area_id = $_GET["area_id"];
			$area = $this->area->read("*",$area_id);
			setvar("area",$area);
		}
		if(isset($_GET["areatype_id"])){
			$areatype_id = $_GET["areatype_id"];
			$areatype = $this->area->read("*",$area_id);
			setvar("areatype",$areatype);
		}
		if(isset($_GET["type_id"])){
			$type_id = $_GET["type_id"];
		}
		
		//paging
		if(isset($_GET["p"])){
			$offset = $row*$num*($_GET["p"]-1);			
		}
		
		$trades = $this->trade->getByArea(array("area_id"=>$area_id,"areatype_id"=>$areatype_id,"type_id"=>$type_id),$offset,$row,$num);
		setvar("trades",$trades["result"]);
		setvar("count",$trades["count"]);
		
		render("area/ajaxTradeModule", 1);
	}
	
	function ajaxCompanyModule() {
		$offset = 0;
		$row = 3;
		$num = 7;
		
		//GETs
		if(isset($_GET["area_id"])){
			$area_id = $_GET["area_id"];
			$area = $this->area->read("*",$area_id);
			setvar("area",$area);
		}
		if(isset($_GET["areatype_id"])){
			$areatype_id = $_GET["areatype_id"];
			$areatype = $this->area->read("*",$area_id);
			setvar("areatype",$areatype);
		}
		if(isset($_GET["membergroup_id"])){
			$membergroup_id = $_GET["membergroup_id"];
		}
		
		//paging
		if(isset($_GET["p"])){
			$offset = $row*$num*($_GET["p"]-1);			
		}
		
		//get companies by areas
		$companies = $this->company->getByArea(array("area_id"=>$area_id,"areatype_id"=>$areatype_id,"membergroup_id"=>$membergroup_id),$offset,$row,$num);
		setvar("companies",$companies["result"]);
		setvar("count",$companies["count"]);
		
		render("area/ajaxCompanyModule", 1);
	}
	
	function ajaxProductModule() {
		$offset = 0;
		$row = 3;
		$num = 7;
		
		//GETs
		if(isset($_GET["area_id"])){
			$area_id = $_GET["area_id"];
			$area = $this->area->read("*",$area_id);
			setvar("area",$area);
		}
		if(isset($_GET["areatype_id"])){
			$areatype_id = $_GET["areatype_id"];
			$areatype = $this->area->read("*",$area_id);
			setvar("areatype",$areatype);
		}
		if(isset($_GET["membergroup_id"])){
			$membergroup_id = $_GET["membergroup_id"];
		}
		
		//paging
		if(isset($_GET["p"])){
			$offset = $row*$num*($_GET["p"]-1);			
		}
		
		//get products by areas
		$products = $this->product->getByArea(array("area_id"=>$area_id,"areatype_id"=>$areatype_id,"service"=>0),$offset,$row,$num);
		setvar("products",$products["result"]);
		
		if($products["count"] > $row*$num*70) {
			$products["count"] = $row*$num*70;
		}
		setvar("count",$products["count"]);
		
		render("area/ajaxProductModule", 1);
	}
	
	function ajaxServiceModule() {
		$offset = 0;
		$row = 3;
		$num = 7;
		
		//GETs
		if(isset($_GET["area_id"])){
			$area_id = $_GET["area_id"];
			$area = $this->area->read("*",$area_id);
			setvar("area",$area);
		}
		if(isset($_GET["areatype_id"])){
			$areatype_id = $_GET["areatype_id"];
			$areatype = $this->area->read("*",$area_id);
			setvar("areatype",$areatype);
		}
		if(isset($_GET["membergroup_id"])){
			$membergroup_id = $_GET["membergroup_id"];
		}
		
		//paging
		if(isset($_GET["p"])){
			$offset = $row*$num*($_GET["p"]-1);			
		}
		
		//get services by areas
		$services = $this->product->getByArea(array("area_id"=>$area_id,"areatype_id"=>$areatype_id,"service"=>1),$offset,$row,$num);
		setvar("services",$services["result"]);
		if($services["count"] > $row*$num*70) {
			$services["count"] = $row*$num*70;
		}
		setvar("count",$services["count"]);
		
		render("area/ajaxServiceModule", 1);
	}
	
	function ajaxSchoolModule() {
		$offset = 0;
		$row = 3;
		$num = 7;
		
		//GETs
		if(isset($_GET["area_id"])){
			$area_id = $_GET["area_id"];
			$area = $this->area->read("*",$area_id);
			setvar("area",$area);
		}
		if(isset($_GET["areatype_id"])){
			$areatype_id = $_GET["areatype_id"];
			$areatype = $this->area->read("*",$area_id);
			setvar("areatype",$areatype);
		}
		
		//paging
		if(isset($_GET["p"])){
			$offset = $row*$num*($_GET["p"]-1);			
		}
		
		if($_GET["type"]=='student') {
			$list = $this->school->getStudentByArea(array("area_id"=>$area_id,"areatype_id"=>$areatype_id),$offset,$row,$num);
		} else if($_GET["type"]=='subject') {
			$list = $this->studygroup->getByArea(array("area_id"=>$area_id,"areatype_id"=>$areatype_id),$offset,$row,$num);
		} else {
			$list = $this->school->getByArea(array("area_id"=>$area_id,"areatype_id"=>$areatype_id),$offset,$row,$num);			
		}		
		setvar("list",$list);
		setvar("list",$list["result"]);
		if($list["count"] > $row*$num*70) {
			$list["count"] = $row*$num*70;
		}
		setvar("count",$list["count"]);
		
		render("area/ajaxSchoolModule", 1);
	}
	
	function ajaxJobModule() {
		$offset = 0;
		$row = 3;
		$num = 7;
		
		//GETs
		if(isset($_GET["area_id"])){
			$area_id = $_GET["area_id"];
			$area = $this->area->read("*",$area_id);
			setvar("area",$area);
		}
		if(isset($_GET["areatype_id"])){
			$areatype_id = $_GET["areatype_id"];
			$areatype = $this->area->read("*",$area_id);
			setvar("areatype",$areatype);
		}
		
		//paging
		if(isset($_GET["p"])){
			$offset = $row*$num*($_GET["p"]-1);			
		}
		
		//get services by areas
		//get jobs by areas
		$jobs = $this->job->getByArea(array("area_id"=>$area_id,"areatype_id"=>$areatype_id),$offset,$row,$num);
		setvar("jobs",$jobs["result"]);
		if($jobs["count"] > $row*$num*70) {
			$jobs["count"] = $row*$num*70;
		}
		setvar("count",$jobs["count"]);
		
		render("area/ajaxJobModule", 1);
	}
}
?>