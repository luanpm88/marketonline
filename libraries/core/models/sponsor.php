<?php
class Sponsors extends PbModel {
 	var $name = "Sponsor";
 	
 	function Sponsors()
 	{
 		parent::__construct();
 	}
	
	function formatResult($item) {
		uses("company","area");
		$company = new Companies();
		$area = new Areas();
		
		$item["address_full"] = $item["address"].", ".$area->getFullName($item["area_id"]);		
		return $item;
	}
}
?>