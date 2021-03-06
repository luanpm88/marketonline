<?php
class Languages extends PbModel {
 	var $name = "Language";
 	var $amount;
 	
 	function Languages()
 	{
		parent::__construct();
 	}
	
	function disSubOptions($parent_id, $level, $ids = null)
 	{
 		$data = $this->findAll("*", null, null, "name ASC");
 		if (!empty($data)) {
 			foreach ($data as $key=>$val) {
				$selected = '';
				if(strpos("[0]".$ids, "[".$val["id"]."]"))
				{
					$selected = ' selected="selected"';
				}
				
				
				
 				$this->typeOptions.='<option value="'.$val['id'].'" '.$selected.'>';
 				$this->typeOptions.=str_repeat('&nbsp;&nbsp;', $level) . $val['name'];
 				$this->typeOptions.='</option>';
 								
				
				
				//$this->disSubOptions($val['id'], $level+1);
 			}
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
	
	function getListOptions()
	{
		$data = $this->findAll("id,name", null, null, "name ASC");
		
		return $data;
	}
}
?>