<?php
class Tasks extends PbModel {
 	var $name = "Task";
	
 	function Tasks()
 	{
 		parent::__construct();
 	}
	
	function updateOrder($id,$order) {
		$task = $this->read("*",$id);
		
		if($order == -1) {			
			$sql = "update ".$this->getTable()." set display_order=display_order-1 where display_order>".$task["display_order"];
			$this->dbstuff->Execute($sql);
			return;
		}
		
		if(!empty($task)) {
			if($task["display_order"] != $order) {
				$this->saveField("display_order",$order,intval($id));
				if($task["display_order"] > $order) {				
					$sql = "update ".$this->getTable()." set display_order=display_order+1 where display_order>=".$order." AND display_order<".$task["display_order"];
					$this->dbstuff->Execute($sql);
				} else {
					$sql = "update ".$this->getTable()." set display_order=display_order-1 where display_order<=".$order." AND display_order>".$task["display_order"];
					$this->dbstuff->Execute($sql);
				}
			}
		} else {
			$sql = "update ".$this->getTable()." set display_order=display_order+1 where display_order>=".$order;
			$this->dbstuff->Execute($sql);
		}
		
	}
}
?>