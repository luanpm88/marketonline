<?php
/**
 *      [PHPB2B] Copyright (C) 2007-2099, Ualink Inc. All Rights Reserved.
 *      The contents of this file are subject to the License; you may not use this file except in compliance with the License. 
 *
 *      @version $Revision: 2075 $
 */
define('CURSCRIPT', 'index');
require("libraries/common.inc.php");
require("share.inc.php");
uses("setting","membertype");
$setting = new Settings();
$membertype = new Membertypes();
setvar("MemberTypes", pb_lang_split_recursive($pdb->GetArray("SELECT * FROM {$tb_prefix}membertypes")));
setvar("SiteDescription", pb_lang_split($G['site_description']));
render("member");
?>