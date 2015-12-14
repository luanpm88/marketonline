<?php
class Area extends PbController {
	var $name = "Area";
	var $names = array();
	
	function Area()
	{
		$this->loadModel("area");
		$this->loadModel("member");
		$this->loadModel("areainfo");
		$this->loadModel("areatypeinfo");
		$this->loadModel("areatype");
		$this->loadModel("product");
		$this->loadModel("trade");
		$this->loadModel("company");
		$this->loadModel("job");
		$this->loadModel("school");
		$this->loadModel("studygroup");
		$this->loadModel("industry");
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
		$pb_userinfo = pb_get_member_info();
		$areatypes = $this->areatype->findAll("*",null,null,"id DESC");
		//var_dump($_GET);
		//get area
		if(isset($_GET["area_id"])){
			$area_id = $_GET["area_id"];
			$area = $this->area->read("*",$area_id);
			$parent_area = $this->area->read("*",$area["parent_id"]);
			$area_name = "/".$area["name"];
			setvar("area",$area);
			setvar("parent_area",$parent_area);
			
			//get area info by member
			$area_info_by_member = $this->getAreaInfoByMember($area_id,$pb_userinfo["pb_userid"]);
			if(!empty($area_info_by_member)) {
				setvar("area_info_by_member",$area_info_by_member);
			}
			
			//area info
			$area_info = $this->getAreaInfo($area_id);
			if($area_info) {
				setvar("area_info",$area_info);
			}
			
			//listing district
			$districts = $this->area->findAll("*",null,array("parent_id=".$area_id));
			setvar("districts",$districts);
		}
		if(isset($_GET["areatype_id"])){
			$areatype_id = $_GET["areatype_id"];
			$areatype = $this->areatype->read("*",$areatype_id);
			$areatype_name = "/".$areatype["name"];
			
			$areas_by_areatype = $this->getAreasByAreatype();
			setvar("areas_by_areatype",$areas_by_areatype);
			
			setvar("areatype",$areatype);
		}
		if(isset($_GET["industry_id"])){
			$industry_id = $_GET["industry_id"];
			$industry = $this->industry->read("*",$industry_id);
			setvar("industry",$industry);
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
						ajaxLoadModule("company_module", "ajaxCompanyModule","membergroup_id",type,1,"'.$industry_id.'");
						$(".company_module .subtab-area ul li a").live("click", function() {
						   ajaxLoadModule("company_module", "ajaxCompanyModule", "membergroup_id",$(this).attr("rel"),1,"'.$industry_id.'");
						});
						$(".company_module a.main_a").live("click", function() {
						    ajaxLoadModule("company_module", "ajaxCompanyModule","","",1,"'.$industry_id.'");
						});
					';
				$container = '<div class="works-list album area-module company_module starting"></div>';
				$paging = 'ajaxLoadModule("company_module", "ajaxCompanyModule", "membergroup_id",$(".areas-container .subtab-area ul li a.active").attr("rel"),$(this).attr("rel"),"'.$industry_id.'");';
				$PageTypeName = "Thương hiệu";
				
				//get positions on map
				$companies_map_script = $this->getMapCompany();
				setvar("companies_map_script",$companies_map_script);
				setvar("num_per_row",6);
				
				break;
			case 'san-pham':
				$script = '
						ajaxLoadModule("product_module", "ajaxProductModule","","",1,"'.$industry_id.'");
						$(".product_module .subtab-area ul li a").live("click", function() {
						   ajaxLoadModule("product_module", "ajaxProductModule","","",1,"'.$industry_id.'");
						});
						$(".product_module a.main_a").live("click", function() {
						    ajaxLoadModule("product_module", "ajaxProductModule","","",1,"'.$industry_id.'");
						});
					';
				$container = '<div class="works-list album area-module product_module starting"></div>';
				$paging = 'ajaxLoadModule("product_module", "ajaxProductModule","","",$(this).attr("rel"),"'.$industry_id.'");';
				$PageTypeName = "Sản Phẩm";
				
				//get positions on map
				$companies_map_script = $this->getMapCompany();
				setvar("companies_map_script", $companies_map_script);
				break;
			case 'dich-vu':
				$script = '
						ajaxLoadModule("service_module", "ajaxServiceModule","","",1,"'.$industry_id.'");
						$(".service_module .subtab-area ul li a").live("click", function() {
						   ajaxLoadModule("service_module", "ajaxServiceModule","","",1,"'.$industry_id.'");
						});
						$(".service_module a.main_a").live("click", function() {
						    ajaxLoadModule("service_module", "ajaxServiceModule","","",1,"'.$industry_id.'");
						});
				';
				$container = '<div class="works-list album area-module service_module starting"></div>';
				$paging = 'ajaxLoadModule("service_module", "ajaxServiceModule","","",$(this).attr("rel"),"'.$industry_id.'");';
				$PageTypeName = "Dịch vụ";

				//get positions on map
				$companies_map_script = $this->getMapCompany();
				setvar("companies_map_script",$companies_map_script);
				break;
			case 'viec-lam':
				$script = '
						ajaxLoadModule("job_module", "ajaxJobModule","","",1,"'.$industry_id.'");
						$(".job_module .subtab-area ul li a").live("click", function() {
						   ajaxLoadModule("job_module", "ajaxJobModule","","",1,"'.$industry_id.'");
						});
						$(".job_module a.main_a").live("click", function() {
						    ajaxLoadModule("job_module", "ajaxJobModule","","",1,"'.$industry_id.'");
						});
					';
				$container = '<div class="works-list album area-module job_module starting"></div>';
				$paging = 'ajaxLoadModule("job_module", "ajaxJobModule","","",$(this).attr("rel"),"'.$industry_id.'");';
				$PageTypeName = "Việc làm";
				break;
			case 'thuong-mai':
				$script = '
						ajaxLoadModule("trade_module", "ajaxTradeModule","type_id",type,1,"'.$industry_id.'");
						$(".trade_module .subtab-area ul li a").live("click", function() {
						   ajaxLoadModule("trade_module", "ajaxTradeModule", "type_id",$(this).attr("rel"),1,"'.$industry_id.'");
						});
						$(".trade_module a.main_a").live("click", function() {
						    ajaxLoadModule("trade_module", "ajaxTradeModule","","",1,"'.$industry_id.'");
						});
					';
				$container = '<div class="works-list album area-module trade_module starting"></div>';
				$paging = 'ajaxLoadModule("trade_module", "ajaxTradeModule", "type_id",$(".areas-container .subtab-area ul li a.active").attr("rel"),$(this).attr("rel"),"'.$industry_id.'");';
				$PageTypeName = "Thương mại";
				
				//get positions on map
				$companies_map_script = $this->getMapCompany();
				setvar("companies_map_script",$companies_map_script);

				break;
			case 'hoc-tap':
				$script = '
						ajaxLoadModule("school_module", "ajaxSchoolModule","type",type,1,"'.$industry_id.'");
						$(".school_module .subtab-area ul li a").live("click", function() {
						   ajaxLoadModule("school_module", "ajaxSchoolModule", "type",$(this).attr("rel"),1,"'.$industry_id.'");
						});
						$(".school_module a.main_a").live("click", function() {
						    ajaxLoadModule("school_module", "ajaxSchoolModule","","",1,"'.$industry_id.'");
						});
					';
				$container = '<div class="works-list album area-module school_module starting"></div>';
				$paging = 'ajaxLoadModule("school_module", "ajaxSchoolModule", "type",$(".areas-container .subtab-area ul li a.active").attr("rel"),$(this).attr("rel"),"'.$industry_id.'");';
				$PageTypeName = "Học tập";
				break;
			default:
				break;
		}

		setvar("script",$script);
		setvar("container",$container);
		setvar("paging",$paging);
		setvar("PageTypeName",$PageTypeName);
		setvar("type",$type);
		
		//
		if($industry_id) {
			$industry_tree = $this->findIndustryTree($industry_id);
			//var_dump($industry_tree);
			setvar("industry_tree",$industry_tree);
		}
		
		if(!isset($_GET["areatype_id"]) && !isset($_GET["areatype_id"])) {
			$main_ades = $this->getMainThreeBanners();
			setvar("main_ades",$main_ades);
		}
		
		setvar("industries",$this->industry->getCacheIndustry());
		
		if($PageTypeName) $ttypename = $PageTypeName." - ";
		setvar("PageTitle",$ttypename."Thị trường ".$area_name.$areatype_name.", Việt Nam - MarketOnline.vn");
		render("area/listing", 1);
	}
	
	function index() {
		$pb_userinfo = pb_get_member_info();
		$areatypes = $this->areatype->findAll("*",null,null,"id DESC");
		
		//get area
		if(isset($_GET["area_id"])){
			$area_id = $_GET["area_id"];
			$area = $this->area->read("*",$area_id);
			$parent_area = $this->area->read("*",$area["parent_id"]);
			$area_name = "/".$area["name"];
			setvar("area",$area);
			setvar("parent_area",$parent_area);
			
			//get companies in map
			$companies = $this->company->getByArea(array("for_map"=>true,"industry_id"=>$_GET["industry_id"],"area_id"=>$_GET["area_id"],"areatype_id"=>$_GET["areatype_id"],"membergroup_id"=>$_GET["membergroup_id"]),0,10,10);
			//var_dump($companies["count"]);
			//setvar("companies",$companies["result"]);
			$companies_map_script = $this->getMapCompany();
			setvar("companies_map_script",$companies_map_script);
			
			//get area info by member
			$area_info_by_member = $this->getAreaInfoByMember($area_id,$pb_userinfo["pb_userid"]);
			if(!empty($area_info_by_member)) {
				setvar("area_info_by_member",$area_info_by_member);
			}
			
			//area info
			$area_info = $this->getAreaInfo($area_id);
			if($area_info) {
				setvar("area_info",$area_info);
			}
			
			//get all area infos
			$area_infos = $this->getAreaInfosByArea($area_id);
			setvar("area_infos",$area_infos);
			
			//listing district
			$districts = $this->area->findAll("*",null,array("parent_id=".$area_id));
			setvar("districts",$districts);
		}
		if(isset($_GET["areatype_id"])){
			$areatype_id = $_GET["areatype_id"];
			$areatype = $this->areatype->read("*",$areatype_id);
			$areatype_name = $areatype["name"];
			setvar("areatype",$areatype);
			
			//get area info by member
			$areatype_info_by_member = $this->getAreatypeInfoByMember($areatype_id,$pb_userinfo["pb_userid"]);
			if(!empty($areatype_info_by_member)) {
				setvar("areatype_info_by_member",$areatype_info_by_member);
			}
			
			//area info
			$areatype_info = $this->getAreatypeInfo($areatype_id);
			if($areatype_info) {
				setvar("areatype_info",$areatype_info);
			}
			
			//get all area infos
			$areatype_infos = $this->getAreatypeInfosByArea($areatype_id);
			setvar("areatype_infos",$areatype_infos);
		}
		
		$areas_by_areatype = $this->getAreasByAreatype();
		setvar("areas_by_areatype",$areas_by_areatype);
		
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
		
		if(!isset($_GET["areatype_id"]) && !isset($_GET["areatype_id"])) {
			$main_ades = $this->getMainThreeBanners();
			setvar("main_ades",$main_ades);
		}
		
		
		setvar("industries",$this->industry->getCacheIndustry());
		setvar("PageTitle","Thị trường ".$areatype_name.$area_name.", Việt Nam - MarketOnline.vn");
		render("area/index", 1);
	}
	
	function ajaxTradeModule() {
		$offset = 0;
		$row = 3;
		$num = 7;
		
		if(isset($_GET["row"])) {
			$row = intval($_GET["row"]);
		}
		if(isset($_GET["num_per_row"])) {
			$num = intval($_GET["num_per_row"]);
		}
		
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
		if(isset($_GET["industry_id"])){
			$industry_id = $_GET["industry_id"];
			$industries = $this->getAreas($industry_id);
		}
		
		//paging
		if(isset($_GET["p"])){
			$offset = $row*$num*($_GET["p"]-1);			
		}
		
		$trades = $this->trade->getByArea(array("industries"=>$industries,"area_id"=>$area_id,"areatype_id"=>$areatype_id,"type_id"=>$type_id),$offset,$row,$num);
		setvar("trades",$trades["result"]);
		setvar("count",$trades["count"]);
		
		render("area/ajaxTradeModule", 1);
	}
	
	function ajaxCompanyModule() {
		$offset = 0;
		$row = 3;
		$num = 6;
		
		if(isset($_GET["row"])) {
			$row = intval($_GET["row"]);
		}
		if(isset($_GET["num_per_row"])) {
			$num = intval($_GET["num_per_row"]);
		}
		
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
		if(isset($_GET["industry_id"])){
			$industry_id = $_GET["industry_id"];
			$industries = $this->getAreas($industry_id);
		}
		
		//paging
		if(isset($_GET["p"])){
			$offset = $row*$num*($_GET["p"]-1);			
		}
		
		//get companies by areas
		$companies = $this->company->getByArea(array("industry_id"=>$industry_id,"area_id"=>$area_id,"areatype_id"=>$areatype_id,"membergroup_id"=>$membergroup_id),$offset,$row,$num);
		setvar("companies",$companies["result"]);
		setvar("count",$companies["count"]);
		
		render("area/ajaxCompanyModule", 1);
	}
	
	function ajaxProductModule() {
		$offset = 0;
		$row = 3;
		$num = 7;
		
		//Get industry level 1
		$industries_list = $this->industry->getCacheIndustry();
		
		if(isset($_GET["row"])) {
			$row = intval($_GET["row"]);
		}
		if(isset($_GET["num_per_row"])) {
			$num = intval($_GET["num_per_row"]);
		}
		
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
		if(isset($_GET["industry_id"])){
			$industry_id = $_GET["industry_id"];
			$industries = $this->getAreas($industry_id);
			
			$industry = $this->industry->read("*" ,$industry_id);
		}
		
		//paging
		if(isset($_GET["p"])){
			$offset = $row*$num*($_GET["p"]-1);			
		}
		
		//get products by areas
		$products = $this->product->getByArea(array("industries"=>$industries,"area_id"=>$area_id,"areatype_id"=>$areatype_id,"service"=>0),$offset,$row,$num);
		setvar("products",$products["result"]);
		
		//if($products["count"] > $row*$num*70) {
		//	$products["count"] = $row*$num*70;
		//}
		setvar("industry", $industry);
		setvar("industries_list", $industries_list);
		setvar("count",$products["count"]);
		
		render("area/ajaxProductModule", 1);
	}
	
	function ajaxServiceModule() {
		$offset = 0;
		$row = 3;
		$num = 7;
		
		if(isset($_GET["row"])) {
			$row = intval($_GET["row"]);
		}
		if(isset($_GET["num_per_row"])) {
			$num = intval($_GET["num_per_row"]);
		}
		
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
		if(isset($_GET["industry_id"])){
			$industry_id = $_GET["industry_id"];
			$industries = $this->getAreas($industry_id);
		}
		
		//paging
		if(isset($_GET["p"])){
			$offset = $row*$num*($_GET["p"]-1);			
		}
		
		//get services by areas
		$services = $this->product->getByArea(array("industries"=>$industries,"area_id"=>$area_id,"areatype_id"=>$areatype_id,"service"=>1),$offset,$row,$num);
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
		
		if(isset($_GET["row"])) {
			$row = intval($_GET["row"]);
		}
		if(isset($_GET["num_per_row"])) {
			$num = intval($_GET["num_per_row"]);
		}
		
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
		
		if(isset($_GET["row"])) {
			$row = intval($_GET["row"]);
		}
		if(isset($_GET["num_per_row"])) {
			$num = intval($_GET["num_per_row"]);
		}
		
		//GETs
		if(isset($_GET["area_id"])) {
			$area_id = $_GET["area_id"];
			$area = $this->area->read("*",$area_id);
			setvar("area",$area);
		}
		if(isset($_GET["areatype_id"])) {
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
	
	function getAreas($industry_id) {
		$area_a = array();
		$_GET['industryid'] = $industry_id;
		if (isset($_GET['industryid']) && $_GET['industryid'] != 0) {
			//Get industry level 1
			$industries = $this->industry->getCacheIndustry();
			
			$area_a[] = $_GET['industryid'];
			
			if (isset($_GET['type']) && $_GET['type'] == 'service' && !isset($_GET['service_page'])) {
				$citem = $this->industry->read("*", $_GET['industryid'], null, array('id'=>$_GET['industryid']));
				//var_dump($citem);
				//echo $citem["top_parentid"];
				if($citem["top_parentid"])
				{
					$area_a[] = $citem["top_parentid"];
					$_GET['industryid'] = $citem["top_parentid"];
				}
			}	
			
			foreach($industries as $key0 => $level0)
			{
				if($level0["id"] == $_GET['industryid'])
				{
					foreach($level0['sub'] as $key1 => $level1)
					{
						$area_a[] = $level1["id"];
						foreach($level1['sub'] as $key2 => $level2)
						{
							$area_a[] = $level2["id"];
							foreach($level2['sub'] as $key3 => $level3)
							{
								$area_a[] = $level3["id"];
								foreach($level3['sub'] as $key4 => $level4)
								{												
									$area_a[] = $level4["id"];												
								}
							}
						}
					}
					break;
				}
				else
				{
					foreach($level0['sub'] as $key1 => $level1)
					{
						if($level1["id"] == $_GET['industryid'])
						{
							foreach($level1['sub'] as $key2 => $level2)
							{
								$area_a[] = $level2["id"];
								foreach($level2['sub'] as $key3 => $level3)
								{
									$area_a[] = $level3["id"];
									foreach($level3['sub'] as $key4 => $level4)
									{
										$area_a[] = $level4["id"];
									}
								}
							}
							break;
						}
						else
						{
							foreach($level1['sub'] as $key2 => $level2)
							{
								if($level2["id"] == $_GET['industryid'])
								{
									$area_a[] = $level2["id"];
									//echo count($level2['sub']);
									foreach($level2['sub'] as $key3 => $level3)
									{
										//echo $level3["id"];
										$area_a[] = $level3["id"];
										foreach($level3['sub'] as $key4 => $level4)
										{												
											$area_a[] = $level4["id"];												
										}
									}
									//var_dump($area_a);
									break;
								}
								else
								{
									foreach($level2['sub'] as $key3 => $level3)
									{
										
										if($level3["id"] == $_GET['industryid'])
										{
											$area_a[] = $level3["id"];
											foreach($level3['sub'] as $key4 => $level4)
											{												
												$area_a[] = $level4["id"];												
											}
											break;
										}
										else
										{
											foreach($level3['sub'] as $key4 => $level4)
											{
												
												if($level4["id"] == $_GET['industryid'])
												{
													$area_a[] = $level4["id"];
													break;
												}
											}
										}
									}
								}
							}
						}
					}
				}
			}
		}
		return $area_a;
	}
	function findIndustryTree($industry_id) {
		$industries = array();
		$industry = $this->industry->read("id,name,parent_id",$industry_id);
		$industry["last"] = 1;
		$industries[] = $industry;
		
		while($industry["parent_id"]) {
			$industry = $this->industry->read("id,name,parent_id",$industry["parent_id"]);
			array_unshift($industries,$industry);
		}
		
		return $industries;
	}
	function ajaxUpdateAreaLatLng() {
		$area = $this->area->read("map_lat,map_lng,map_zoom",$_GET["id"]);
		if($area["map_lat"] && $area["map_lng"]) {
			echo json_encode($area);
		} else {
			echo "none";
		}
	}
	
	function getMapCompany() {
		if(isset($_GET["area_id"])){
			$companies = $this->company->getByArea(array("for_map"=>true,"industry_id"=>$_GET["industry_id"],"area_id"=>$_GET["area_id"],"areatype_id"=>$_GET["areatype_id"],"membergroup_id"=>$_GET["membergroup_id"]),0,10,10);
			//var_dump($companies["count"]);
			//setvar("companies",$companies["result"]);
			$companies_map_script = '';
			foreach($companies["result"] as $com) {
				$html = '<div class=map_box_info>';
					$html .= '<img src='.$com["thumb"].' class=map_com_thumb />';
					
					$html .= '<p>';
						$html .= '<strong>'.$com["shop_name"].'</strong>';
						$html .= '<br />'.$com["address"];						
						$more = array();
						if($com["tel"]) $more[] = '<br />ĐT: '.$com["tel"];
						if($com["fax"]) $more[] = '<br />Fax: '.$com["fax"];
						if($com["email"]) $more[] = '<br />Email: '.$com["email"];				
						if(!empty($more)) $html .= implode(", ",$more);					
					$html .= '</p>';
				$html .= '</div>';
				
				//$companies_map_script .= 'addAreaMarker('.$com["map_lat"].','.$com["map_lng"].',"'.$html.'","'.$com["href"].'");';
				$companies_map_script .= 'addMarkerByLatLng('.$com["map_lat"].','.$com["map_lng"].',map,"'.$html.'","'.$com["href"].'");';
			}
		}
		
		return $companies_map_script;
	}
	
	function getAreasByAreatype() {
		if(isset($_GET["areatype_id"])){
			$areas_by_areatype = $this->area->findAll("*",null,array("level=2","areatype_id=".$_GET["areatype_id"]));
		} else {
			$areas_by_areatype = $this->area->findAll("*",null,array("level=2"));
		}
		
		return $areas_by_areatype;
	}
	
	function getMainThreeBanners() {
		uses("ad");
		$ads = new Adses();
		
		$ades = $ads->findAll("*",null,array("Ads.adzone_id=9","Ads.status=1","Ads.state=1"),"Ads.display_order");
		//var_dump($ades);
		return $ades;
	}
	
	function postAreaInfo() {
		$pb_userinfo = pb_get_member_info();
		
		if(isset($_POST["area_id"]) && isset($_POST["content"]) && trim(strip_tags($_POST["content"]))!='') {
			$exsit = $this->areainfo->findAll("*",null,array("member_id=".$pb_userinfo["pb_userid"],"area_id=".$_POST["area_id"]));
			
			$vals["created"] = date("Y-m-d H:i:s");
			$vals["content"] = $_POST["content"];
			if(empty($exsit)) {
				$vals["member_id"] = $pb_userinfo["pb_userid"];				
				$vals["area_id"] = $_POST["area_id"];
				$vals["status"] = 0;
				
				$this->areainfo->save($vals);
			} else {
				$this->areainfo->save($vals,'update',intval($exsit[0]["id"]));
			}
			
			
			
			header('Location: '.$_SERVER['HTTP_REFERER'].'#thanks');
			echo "ok";
			return;
		}
		echo "failed";
	}
	
	function getAreaInfoByMember($area_id,$member_id) {
		$exsit = $this->areainfo->fields("*",array("member_id=".$member_id,"area_id=".$area_id));
		return $exsit;
	}
	
	function getAreaInfo($area_id) {
		$exsit = $this->areainfo->findAll("*",null,array("status=1","area_id=".$area_id),"created DESC",0,1);
		if(count($exsit)) {
			return $exsit[0];
		} else {
			return false;
		}
	}
	
	function getAreaInfosByArea($id) {
		$conditions = array("Areainfo.area_id=".$id);
		$joins = array("LEFT JOIN {$this->areainfo->table_prefix}areas AS a ON a.id=Areainfo.area_id");
		$joins[] = "LEFT JOIN {$this->areainfo->table_prefix}members AS m ON m.id=Areainfo.member_id";
		$joins[] = "LEFT JOIN {$this->areainfo->table_prefix}memberfields AS mf ON mf.member_id=Areainfo.member_id";
		$items = $this->areainfo->findAll("Areainfo.id,mf.first_name,mf.last_name",$joins,$conditions,"Areainfo.created DESC");
		
		return $items;
	}
	
	function getAreaInfoContent() {
		$area = $this->areainfo->read("*",intval($_GET["id"]));
		echo $area["content"];
	}
	
	function saveAreaInfoDefault() {
		
		$pb_userinfo = pb_get_member_info();
		$user = $this->member->getInfoById($pb_userinfo['pb_userid']);
		
		if($user["role"] != "admin" && !$user["area_moderator"]) {
			return;
		}
		
		$info = $this->areainfo->read("*",intval($_GET["id"]));
		
		$sql = "update ".$this->areainfo->getTable()." set status=0,area_moderator=".$pb_userinfo['pb_userid']." where area_id=".$info["area_id"];
		$this->areainfo->dbstuff->Execute($sql);
		$this->areainfo->saveField("status",1,intval($_GET["id"]));
	}
	
	function postAreatypeInfo() {
		$pb_userinfo = pb_get_member_info();
		
		if(isset($_POST["areatype_id"]) && isset($_POST["content"]) && trim(strip_tags($_POST["content"]))!='') {
			$exsit = $this->areatypeinfo->findAll("*",null,array("member_id=".$pb_userinfo["pb_userid"],"areatype_id=".$_POST["areatype_id"]));
			
			$vals["created"] = date("Y-m-d H:i:s");
			$vals["content"] = $_POST["content"];
			if(empty($exsit)) {
				$vals["member_id"] = $pb_userinfo["pb_userid"];				
				$vals["areatype_id"] = $_POST["areatype_id"];
				$vals["status"] = 0;
				
				$this->areatypeinfo->save($vals);
			} else {
				$this->areatypeinfo->save($vals,'update',intval($exsit[0]["id"]));
			}
			
			
			
			header('Location: '.$_SERVER['HTTP_REFERER'].'#thanks');
			echo "ok";
			return;
		}
		echo "failed";
	}
	
	function getAreatypeInfoByMember($areatype_id,$member_id) {
		$exsit = $this->areatypeinfo->fields("*",array("member_id=".$member_id,"areatype_id=".$areatype_id));
		return $exsit;
	}
	
	function getAreatypeInfo($areatype_id) {
		$exsit = $this->areatypeinfo->findAll("*",null,array("status=1","areatype_id=".$areatype_id),"created DESC",0,1);
		if(count($exsit)) {
			return $exsit[0];
		} else {
			return false;
		}
	}
	
	function getAreatypeInfosByArea($id) {
		$conditions = array("Areatypeinfo.areatype_id=".$id);
		$joins = array("LEFT JOIN {$this->areainfo->table_prefix}areatypes AS a ON a.id=Areatypeinfo.areatype_id");
		$joins[] = "LEFT JOIN {$this->areainfo->table_prefix}members AS m ON m.id=Areatypeinfo.member_id";
		$joins[] = "LEFT JOIN {$this->areainfo->table_prefix}memberfields AS mf ON mf.member_id=Areatypeinfo.member_id";
		$items = $this->areatypeinfo->findAll("Areatypeinfo.id,mf.first_name,mf.last_name",$joins,$conditions,"Areatypeinfo.created DESC");
		
		return $items;
	}
	
	function getAreatypeInfoContent() {
		$area = $this->areatypeinfo->read("*",intval($_GET["id"]));
		echo $area["content"];
	}
	
	function saveAreatypeInfoDefault() {
		$pb_userinfo = pb_get_member_info();
		$user = $this->member->getInfoById($pb_userinfo['pb_userid']);
		
		if($user["role"] != "admin" && !$user["area_moderator"]) {
			return;
		}
		
		$info = $this->areatypeinfo->read("*",intval($_GET["id"]));
		
		$sql = "update ".$this->areatypeinfo->getTable()." set status=0,area_moderator=".$pb_userinfo['pb_userid']." where areatype_id=".$info["areatype_id"];
		$this->areatypeinfo->dbstuff->Execute($sql);
		$this->areatypeinfo->saveField("status",1,intval($_GET["id"]));
	}
}
?>