<?php
class Jobindusts extends PbModel {
 	
 	var $name = "Jobindust";

 	function Jobindusts()
 	{
 		parent::__construct();
 	}
 	function disSubOptions($parent_id, $level, $ids = null)
 	{
 		$data = $this->findAll("*", null, "parent_id='".$parent_id."'", "`group`,name ASC");
 		if (!empty($data)) {
 			$this->hasChildren=true;
 			foreach ($data as $key=>$val) {				
				if($val["group"] != "") {
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
 			}
			$this->typeOptions.='<optgroup label="Đang đợi duyệt">';
			foreach ($data as $key=>$val) {				
				if($val["group"] == "") {
					$selected = '';
					if(strpos("[0]".$ids, "[".$val["id"]."]"))
					{
						$selected = ' selected="selected"';
					}
					
					$this->typeOptions.='<option value="'.$val['id'].'" '.$selected.'>';
					$this->typeOptions.=str_repeat('&nbsp;&nbsp;', $level) . $val['name'];
					$this->typeOptions.='</option>';
									
					
				}
 			}
			$this->typeOptions.='</optgroup>';
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
	
	function getByName($name)
	{
		$childzs = $this->findAll("id, name", null, "name LIKE '%".trim($name)."%'");
		//echo "SELECT id,name FROM ".$this->table_prefix."jobindusts WHERE name LIKE '%".trim($name)."%'";
		//var_dump($childzs);
		if(!empty($childs))
		{
			return $childs[0];
		}
		return 0;
	}
}

?>