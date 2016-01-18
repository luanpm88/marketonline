<?php
class Industry extends PbController {
	var $name = "Industry";
	var $names = array();
	
	function Industry()
	{
		$this->loadModel("industry");
	}
	
	function getNames()
	{
		return $this->names;
	}
	
	function setNames()
	{
		if(func_num_args()<1) return;
		$return  = array();
		$_PB_CACHE['industry'] = cache_read("industry");
		$args = func_get_args();
		foreach ($args as $key=>$val) {
			$return[] = isset($_PB_CACHE['industry'][$val])?$_PB_CACHE['industry'][$val]:'';
		}
		$this->names = $return;
	}	
	
	function &getInstance() {
		static $instance = array();
		if (!$instance) {
			$instance[0] =& new Industry();
		}
		return $instance[0];
	}
	
	function updateCatFilter() {
		
		if($_GET["id"] == "0") {
			$cats = array();
			$cats[] = array("id"=>"0","name"=>"Tất cả chuyên mục","parent_id"=>"0","level"=>0,"count"=>21);
			echo json_encode($cats);
			return;
		}
		
		$industry = $this->industry->read("id,name,parent_id", $_GET["id"]);
		$industry["count"] = $this->industry->findCount(null, array("parent_id=".$industry["id"]));
		
		$cats = array();
		$cats[] = $industry;
		
		while($industry["parent_id"]) {
			$industry = $this->industry->read("id,name,parent_id", $industry["parent_id"]);
			$industry["count"] = $this->industry->findCount(null, array("parent_id=".$industry["id"]));
			array_unshift( $cats , $industry );
		}
		//var_dump($cats);
		
		echo json_encode($cats);
	}
	
	function updateCatList() {
		$cats = $this->industry->findAll("id,name,parent_id,level", null, array("parent_id=".$_GET["id"]));
		
		foreach($cats as $key => $cat) {
			$cats[$key]["count"] = $this->industry->findCount(null, array("parent_id=".$cat["id"]));
		}
		$item = $this->industry->read("id,name,parent_id,level", $_GET["id"]);
		if(!$item) {
			$item = array("id"=>"0","name"=>"Tất cả chuyên mục","parent_id"=>"0","level"=>0,"count"=>0);
		}
		
		foreach($cats as $kk => $tem) {
			if($module == "offers") {
				$cats[$kk]["pcount"] = $this->industry->countTrade($tem["id"]);
			} else {
				$cats[$kk]["pcount"] = $this->industry->countProduct($tem["id"], null, $_GET["service"])+"aa";
			}
		}
		
		setvar("cats",$cats);
		setvar("item",$item);
		render("mobile/industry/ajax_cat_list");
	}
}
?>