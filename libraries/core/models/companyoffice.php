<?php
class Companyoffices extends PbModel {
 	var $name = "Companyoffice";
	
 	function Companyoffices()
 	{
 		parent::__construct();
 	}
	
	function findByCompany($cid) {
		$conditions = array("company_id=".$cid);
		
		$offices = $this->findAll("*",null,$conditions);
		foreach($offices as $key => $office) {
			$offices[$key] = $this->formatResult($office);
		}
		$count = $this->findCount(null,$conditions,"Companyoffice.id");
		
		return array("items"=>$offices,"count"=>$count);
	}
	
	function getOffice($id) {
		$item = $this->read("*",$id);
		
		return $item;
	}
	
	function formatResult($item) {
		uses("company");
		$company = new Companies();
		
		list(,$telcode, $telzone, $tel) = $company->splitPhone($item['phone']);
		list(,$faxcode, $faxzone, $fax) = $company->splitPhone($item['fax']);
		if($telcode != '000' && $telzone != '' && $tel != '')
		{
			$item['phone'] = '('.$telcode.') '.$telzone.'.'.substr($tel, 0, 4)." ".substr($tel, 4);
		}
		else
		{
			$item['phone'] = '';
		}
		if($faxcode != '000' && $faxzone != '' && $fax != '')
		{
			$item['fax'] = '('.$faxcode.') '.$faxzone.'.'.substr($fax, 0, 4)." ".substr($fax, 4);
		}
		else
		{
			$item['fax'] = '';
		}
		
		return $item;

	}

}
?>