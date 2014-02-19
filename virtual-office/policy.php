<?php
/**
 *      [PHPB2B] Copyright (C) 2007-2099, Ualink Inc. All Rights Reserved.
 *      The contents of this file are subject to the License; you may not use this file except in compliance with the License. 
 *
 *      @version $Revision: 2154 $
 */
require("../libraries/common.inc.php");
require("room.share.php");

$tpl_file = "policy";

if (isset($_POST['do']) && !empty($_POST['data']['company'])) {

	if (isset($companyinfo)) {
		//var_dump($companyinfo);
		//echo $_POST['data']['company']['policy'];
		$company->saveField('policy',$_POST['data']['company']['policy'], intval($companyinfo["id"]));
		$companyinfo["policy"] = $_POST['data']['company']['policy'];
	}

}
setvar("item",$companyinfo);
template($tpl_file);
?>