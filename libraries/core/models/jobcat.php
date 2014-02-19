<?php
class Jobcats extends PbModel {
 	
 	var $name = "Jobcat";

 	function Jobcats()
 	{
 		parent::__construct();
 	}
 	function disSubOptions($parent_id, $level, $ids = null)
 	{
 		$data = $this->findAll("*", null, "parent_id='".$parent_id."'", "`group`,name ASC");
 		if (!empty($data)) {
 			$this->hasChildren=true;
			
			$groupname = '';		
 			foreach ($data as $key=>$val) {
				$selected = '';
				if(strpos("[0]".$ids, "[".$val["id"]."]"))
				{
					$selected = ' selected="selected"';
				}
				
				if($groupname != $val["group"])
				{
					$this->typeOptions.='<optgroup label="'.$val["group"].'">';
					$groupname = $val["group"];
				}
				
 				$this->typeOptions.='<option value="'.$val['id'].'" '.$selected.'>';
 				$this->typeOptions.=str_repeat('&nbsp;&nbsp;', $level) . $val['name'];
 				$this->typeOptions.='</option>';
 								
				if($groupname != $data[$key+1]["group"])
				{
					$this->typeOptions.='</optgroup>';
				}
				
				$this->disSubOptions($val['id'], $level+1);
 			}
 		}else{
 			$this->hasChildren=false;
 		}
 	}
 	
 	function getTypeOptions($ids = null)
 	{
 		$this->typeOptions = '';
 		$this->disSubOptions(0, 0, $ids);
 		return $this->typeOptions;
 	}
}

?>