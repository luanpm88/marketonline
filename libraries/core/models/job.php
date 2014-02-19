<?php
class Jobs extends PbModel {
	var $name = "Job";

	function Jobs()
 	{
		parent::__construct();
 	}
	
	function updateStatus()
	{
		$sql = "UPDATE {$this->table_prefix}jobs SET `status` = 0 WHERE `expired_dates` < ".strtotime(date('Y-m-d H:i:s'));
		
		//echo $sql;
		$results = $this->dbstuff->Execute($sql);
		return $results;
	}
}
?>