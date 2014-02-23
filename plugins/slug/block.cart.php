<?php
/**
 *      [PHPB2B] Copyright (C) 2007-2099, Ualink Inc. All Rights Reserved.
 *      The contents of this file are subject to the License; you may not use this file except in compliance with the License. 
 *
 *      @version $Revision: 2075 $
 */
function smarty_block_cart($params, $content, &$smarty, &$repeat){
	if (class_exists("Cartitems")) {
		$cartitem = new Cartitems();
	}
	
	//require_once(LIB_PATH. "session_mysql.class.php");
	//$session = new PbSessions();

	//var_dump($session);
	//$session_cart_id = $session->read('cart_id');
	//echo $session_cart_id;
	
	return "jjhkjhkjhjkhk"; //or echo $content
}
?>