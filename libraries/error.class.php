<?php 
/**
 *      [PHPB2B] Copyright (C) 2007-2099, Ualink Inc. All Rights Reserved.
 *      The contents of this file are subject to the License; you may not use this file except in compliance with the License. 
 *
 *      @version $Revision: 2095 $
 */
class Errors
{
	function Errors()
	{
		
	}
	
	function showError($msg, $type = null)
	{
	global $charset;
	$host = pb_getenv('HTTP_HOST');
	$title = $type == 'db' ? 'Database' : 'System';
echo <<<EOT
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<title>MarketOnline.vn</title>
	<meta http-equiv="Content-Type" content="text/html; charset={$charset}" />
	<script>
		function goBack() {
			location.reload(); 
		}
		setInterval("goBack()",1000);
	</script>
</head>
<body>
</body>
</html>
EOT;
		exit;
}
}