<?php
/**
 *      [PHPB2B] Copyright (C) 2007-2099, Ualink Inc. All Rights Reserved.
 *      The contents of this file are subject to the License; you may not use this file except in compliance with the License. 
 *		@description please use smarty/plugins/prefilter.fix.php
 *      @version $Revision: 2075 $
 */
function smarty_prefilter_fix($tpl_source,&$smarty)
{
	$pattern = array();
	$replace = array();
    $tpl_source = preg_replace($pattern, $replace, $tpl_source);
    $tpl_source = str_replace("pb:", "", $tpl_source);
    return $tpl_source;
}
?>