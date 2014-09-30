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
	
	function index() {
		$areatypes = $this->areatype->findAll("*");
		
		//get area
		if(isset($_GET["area_id"])){
			$area_id = $_GET["area_id"];
		}
		if(isset($_GET["areatype_id"])){
			$areatype_id = $_GET["areatype_id"];
		}
		
		//get areas with level 2
		foreach($areatypes as $key => $areatype) {
			$areas = $this->area->findAll("*",null,array("level=2","areatype_id=".$areatype["id"]),"Area.name");
			$areatypes[$key]["areas"] = $areas;
		}
		setvar("areatypes",$areatypes);
		
		//get products by areas
		$products = $this->product->getByArea(array("area_id"=>$area_id,"areatype_id"=>$areatype_id,"service"=>0));
		setvar("products",$products);
		
		//get services by areas
		$services = $this->product->getByArea(array("area_id"=>$area_id,"areatype_id"=>$areatype_id,"service"=>1));
		setvar("services",$services);
		
		//get trades by areas
		$trades = $this->trade->getByArea(array("area_id"=>$area_id,"areatype_id"=>$areatype_id));
		setvar("trades",$trades);
		
		//get companies by areas
		$companies = $this->company->getByArea(array("area_id"=>$area_id,"areatype_id"=>$areatype_id));
		setvar("companies",$companies);
		
		//get jobs by areas
		$jobs = $this->job->getByArea(array("area_id"=>$area_id,"areatype_id"=>$areatype_id));
		setvar("jobs",$jobs);
		
		render("area/index", 1);
	}
}
?>