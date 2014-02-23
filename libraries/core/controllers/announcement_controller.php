<?php
/**
 * instead by announce_controller
 * @2012.9.11
 */
class Announcement extends PbController {
	var $name = "Announcement";
	
	
	function &getInstance() {
		static $instance = array();
		if (!$instance) {
			$instance[0] =& new Announcement();
		}
		return $instance[0];
	}
}
?>