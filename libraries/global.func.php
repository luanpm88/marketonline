<?php
/**
 *      [PHPB2B] Copyright (C) 2007-2099, Ualink Inc. All Rights Reserved.
 *      The contents of this file are subject to the License; you may not use this file except in compliance with the License. 
 *
 *      @version $Revision: 2218 $
 */
function da($arr_str, $exit = false)
{
	$x = "<pre>";
	$x .= print_r($arr_str, 1);
	$x .= "</pre>";
	print $x;
	($exit)?exit:'';
}

function pb_getenv($key) {
	if ($key == 'HTTPS') {
		if (isset($_SERVER['HTTPS'])) {
			return (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off');
		}
		return (strpos(pb_getenv('SCRIPT_URI'), 'https://') === 0);
	}

	if ($key == 'SCRIPT_NAME') {
		if (pb_getenv('CGI_MODE') && isset($_ENV['SCRIPT_URL'])) {
			$key = 'SCRIPT_URL';
		}
	}

	$val = null;
	if (isset($_SERVER[$key])) {
		$val = $_SERVER[$key];
	} elseif (isset($_ENV[$key])) {
		$val = $_ENV[$key];
	} elseif (getenv($key) !== false) {
		$val = getenv($key);
	}

	if ($key === 'REMOTE_ADDR' && $val === pb_getenv('SERVER_ADDR')) {
		$addr = pb_getenv('HTTP_PC_REMOTE_ADDR');
		if ($addr !== null) {
			$val = $addr;
		}
	}

	if ($val !== null) {
		return $val;
	}

	switch ($key) {
		case 'SCRIPT_FILENAME':
			if (defined('SERVER_IIS') && SERVER_IIS === true) {
				return str_replace('\\\\', '\\', pb_getenv('PATH_TRANSLATED'));
			}
			break;
		case 'DOCUMENT_ROOT':
			$name = pb_getenv('SCRIPT_NAME');
			$filename = pb_getenv('SCRIPT_FILENAME');
			$offset = 0;
			if (!strpos($name, '.php')) {
				$offset = 4;
			}
			return substr($filename, 0, strlen($filename) - (strlen($name) + $offset));
			break;
		case 'PHP_SELF':
			return str_replace(pb_getenv('DOCUMENT_ROOT'), '', pb_getenv('SCRIPT_FILENAME'));
			break;
		case "REQUEST_URI":
			if(!isset($_SERVER['REQUEST_URI'])) {
			    $_SERVER['REQUEST_URI'] = substr($_SERVER['argv'][0], strpos($_SERVER['argv'][0], ';') + 1);
			}
			return $_SERVER['REQUEST_URI'];
			break;
		case 'CGI_MODE':
			return (PHP_SAPI === 'cgi');
			break;
		case 'HTTP_BASE':
			$host = pb_getenv('HTTP_HOST');
			if (substr_count($host, '.') !== 1) {
				return preg_replace('/^([^.])*/i', null, pb_getenv('HTTP_HOST'));
			}
			return '.' . $host;
			break;
		case 'HTTP_HOST':
			if(isset($_SERVER['SERVER_NAME'])){
				return $_SERVER['SERVER_NAME'];
			}else{
				return $_SERVER['HTTP_HOST'];
			}
			break;
	}
	return null;
}

function pb_strcomp($str1,$str2)
{
	if (strcmp(trim($str1),trim($str2)) == 0) {
		return true;
	}else {
		return false;
	}
}

function pb_radom($len=6,$recycle=1){
	$str = 'ABCDEFGHJKMNPQRSTUVWXYabcdefghjkmnpqrstuvwxy';
	$str.= '123456789';
	$str = str_repeat($str,$recycle);
	return substr(str_shuffle($str),0,$len);
}

function setvar($name,$var)
{
	global $smarty;
	$smarty->assign($name,$var);
}

function uaAssign($names)
{
	global $smarty;
	if (is_array($names)) {
		foreach ($names as $smt_key=>$smt_val) {
			$smarty->assign($smt_key,$smt_val);
		}
	}
}

function pheader($string, $replace = true, $http_response_code = 0) {
	$string = str_replace(array("\r", "\n"), array('', ''), $string);
	if(empty($http_response_code) || PHP_VERSION < '4.3' ) {
		@header($string, $replace);
	} else {
		@header($string, $replace, $http_response_code);
	}
	if(preg_match('/^\s*location:/is', $string)) {
		exit();
	}
}

function flash($message_title = '', $back_url = '', $pause = 3, $extra = '')
{
	global $smarty;
	if (empty($back_url)) {
		if (defined('CURSCRIPT')) {	
			$back_url = CURSCRIPT. ".php";
		}elseif (isset($_SERVER['HTTP_REFERER'])){
			$back_url = $_SERVER['HTTP_REFERER'];
		}else{
			$back_url = "javascript:;";
		}
	}
	$return = $smarty->flash($message_title, $back_url, $pause, $extra);
}


function pb_create_folder($dir)
{
	return is_dir($dir) or (pb_create_folder(dirname($dir)) and mkdir($dir, 0777));
	//@chmod($dir, 0777);
}

function pb_get_cache($models, $path = '')
{
	if (is_array($models)) {
		foreach ($models as $model) {
			$cache_file = $path?CACHE_PATH.$path."cache_".$model.".php":CACHE_PATH."cache_".$model.".php";
			if (file_exists($cache_file)) {
				include $cache_file;
			}
		}
	}else{
		$cache_file = $path?CACHE_PATH.$path."cache_".$models.".php":CACHE_PATH."cache_".$models.".php";
		if (file_exists($cache_file)) {
			include $cache_file;
		}
	}
}

function render($filename = null, $exit = false)
{
	global $smarty, 
	$viewhelper, 
	$theme_name, 
	$cache_id, 
	$dir_name, 
	$default_html_filename, 
	$re_create_file;
	$return = false;
	$tmp_themename = '';
	$smarty->assign('position', $viewhelper->getPosition());
	$smarty->assign('page_title', $viewhelper->getTitle());
	$tpl = $theme_name.DS.$filename.$smarty->tpl_ext;
	if ($theme_name=='blue' || !$smarty->template_exists($tpl)) {
		$tmp_themename = 'default';
		$tpl = 'default'.DS.$filename.$smarty->tpl_ext;
	}
	if (empty($filename)) {
		//Todo:auto select template default
	}
	$smarty->assign('ThemeName', $tmp_themename?$tmp_themename:$theme_name);
	if (!empty($viewhelper->metaDescription)) {
		$smarty->assign("metadescription", $viewhelper->metaDescription);		
	}
	if (!empty($viewhelper->metaKeyword)) {
		$smarty->assign("metakeywords", $viewhelper->metaKeyword);
	}elseif (!empty($viewhelper->metaDescription)){
		$viewhelper->setMetaKeyword($viewhelper->metaDescription);
		$smarty->assign("metakeywords", $viewhelper->metaKeyword);
	}
	if ($smarty->caching) {
		$cache_id = $_GET['page']."|".$_GET['id']."|".$_GET['pos'];
	}
	if (defined("SMARTY_CACHE") && SMARTY_CACHE){
		$smarty->caching = 1;
	}
	if ($smarty->caching) {
		$cache_id = substr(md5(pb_getenv('REQUEST_URI').$cache_id), 0, 16);
	}
	$return = $smarty->display($tpl, $cache_id);
	//for the static homepage,since 1/1/2011
	if ($re_create_file) {
		if (! is_dir ( $dir_name )) {
			pb_create_folder ( $dir_name );
		}
		$content = ob_get_contents ();
		file_put_contents ( $default_html_filename, $content );
	}
	if ($exit) {
		exit;
	}
	if (isset($htmlize) && !$htmlize) {
		return $return;
	}
	return $return;
}

function template($filename = null, $exit = false)
{
	global $smarty;
	$return = false;
	$return = $smarty->display($filename.$smarty->tpl_ext);
	if ($exit) {
		exit;
	}
	return $return;
}

function pb_check_email($email){
	$return = false;
	if(strstr($email, '@') && strstr($email, '.')){
		if(preg_match("/^([_a-z0-9]+([\._a-z0-9-]+)*)@([a-z0-9]{2,}(\.[a-z0-9-]{2,})*\.[a-z]{2,4})$/", $email)){
			$return = true;
		}
	}
	return $return;
}

function usetcookie($var, $value, $life_time = 0, $prefix = 1) {
	global $cookiepre, $cookiepath, $time_stamp, $cookiedomain;
	return setcookie(($prefix ? $cookiepre : '').$var, $value,
	$life_time ? $time_stamp + $life_time : 0, $cookiepath,
	$cookiedomain, $_SERVER['SERVER_PORT'] == 443 ? 1 : 0);
}

function uclearcookies() {
	return usetcookie('auth', '', -86400 * 365);
}

function fileext($filename) {
	return substr(($t=strrchr($filename,'.'))!==false?".".$t:'',1);
}

function pb_htmlspecialchar($string) {
	if(is_array($string)) {
		foreach($string as $key => $val) {
			$string[$key] = pb_htmlspecialchar($val);
		}
	} else {
		$string = preg_replace('/&amp;((#(\d{3,5}|x[a-fA-F0-9]{4})|[a-zA-Z][a-z0-9]{2,5});)/', '&\\1',
		str_replace(array('&', '"', '<', '>'), array('&amp;', '&quot;', '&lt;', '&gt;'), $string));
	}
	return $string;
}

function pb_get_client_ip($type = "long")
{
	if(getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown')) {
		$onlineip = getenv('HTTP_CLIENT_IP');
	} elseif(getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown')) {
		$onlineip = getenv('HTTP_X_FORWARDED_FOR');
	} elseif(getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown')) {
		$onlineip = getenv('REMOTE_ADDR');
	} elseif(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown')) {
		$onlineip = $_SERVER['REMOTE_ADDR'];
	}
	preg_match("/[\d\.]{7,15}/", $onlineip, $onlineipmatches);
	$onlineip = $onlineipmatches[0] ? $onlineipmatches[0] : 'unknown';
	if($onlineip=='unknown') return $onlineip;
	if($type=="long"){
		return pb_ip2long($onlineip);
	}else{
		return $onlineip;
	}
}

function pb_ip2long($ip)
{
	return sprintf("%u",ip2long($ip));
}

function pb_addslashes($string) {
	if(is_array($string)) {
		foreach($string as $key => $val) {
			$string[$key] = pb_addslashes($val);
		}
	} else {
		$string = addslashes($string);
	}
	return $string;
}

function stripslashes_recursive(&$array) {
	while(list($key,$var) = each($array)) {
		if ($key != 'argc' && $key != 'argv' && (strtoupper($key) != $key || ''.intval($key) == "$key")) {
			if (is_string($var)) {
				$array[$key] = stripslashes($var);
			}
			if (is_array($var))  {
				$array[$key] = stripslashes_recursive($var);
			}
		}
	}
	return $array;
}

function stripslashes_deep($value)
{
    if(isset($value)) {
        $value = is_array($value) ?
            array_map('stripslashes_deep', $value) :
            stripslashes($value);
    }
    return $value;
}

if (!function_exists('getmicrotime')) {
	function getmicrotime() {
		list($usec, $sec) = explode(' ', microtime());
		return ((float)$usec + (float)$sec);
	}
}

function pb_get_host($http = true)
{
	if ( isset( $_SERVER['HTTPS'] ) && ( strtolower( $_SERVER['HTTPS'] ) != 'off' ) ) {
		$ul_protocol = 'https';
	}else{
		$ul_protocol = 'http';
	}
	if($http) {
		$return = $ul_protocol."://".$_SERVER['HTTP_HOST'];
	} else {
		$return = $_SERVER['HTTP_HOST'];
	}
	return $return;
}

function uses() {
	$args = func_get_args();
	foreach($args as $arg) {
		$class_name = strtolower($arg);
		include_once(LIB_PATH . "core/controllers/".$class_name. '_controller.php');
		if(is_file($model_file = LIB_PATH . "core/models/".$class_name. '.php')) include_once($model_file);
	}
}

function using() {
	$args = func_get_args();
	foreach($args as $arg) {
		$class_name = strtolower($arg);
		require_once(LIB_PATH . "core/models/".$class_name. '.php');
	}
}

function pb_strip_spaces($string)
{
	$str = preg_replace('#\s+#', ' ', trim($string));
	return $str;
}

function pb_get_member_info()
{
	global $cookiepre;
	$user = array();
	if (!empty($_COOKIE[$cookiepre."auth"])) {
		list($user['pb_userid'], $user['pb_username'], $user['pb_userpasswd'], $user['is_admin']) = explode("\t", authcode($_COOKIE[$cookiepre."auth"], 'DECODE'));
		return $user;
	}else{
		return false;
	}
}

function authcode($string, $operation = "ENCODE", $key = '', $expire = 0) {
	global $phpb2b_auth_key;
	$ckey_length = 4;
	$key = md5($key ? $key : $phpb2b_auth_key);
	$keya = md5(substr($key, 0, 16));
	$keyb = md5(substr($key, 16, 16));
	$keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length): substr(md5(microtime()), -$ckey_length)) : '';

	$cryptkey = $keya.md5($keya.$keyc);
	$key_length = strlen($cryptkey);

	$string = $operation == 'DECODE' ? base64_decode(substr($string, $ckey_length)) : sprintf('%010d', $expire ? $expire + time() : 0).substr(md5($string.$keyb), 0, 16).$string;
	$string_length = strlen($string);

	$result = '';
	$box = range(0, 255);

	$rndkey = array();
	for($i = 0; $i <= 255; $i++) {
		$rndkey[$i] = ord($cryptkey[$i % $key_length]);
	}

	for($j = $i = 0; $i < 256; $i++) {
		$j = ($j + $box[$i] + $rndkey[$i]) % 256;
		$tmp = $box[$i];
		$box[$i] = $box[$j];
		$box[$j] = $tmp;
	}

	for($a = $j = $i = 0; $i < $string_length; $i++) {
		$a = ($a + 1) % 256;
		$j = ($j + $box[$a]) % 256;
		$tmp = $box[$a];
		$box[$a] = $box[$j];
		$box[$j] = $tmp;
		$result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
	}

	if($operation == 'DECODE') {
		if((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26).$keyb), 0, 16)) {
			return substr($result, 26);
		} else {
			return '';
		}
	} else {
		return $keyc.str_replace('=', '', base64_encode($result));
	}
}

function ___L() {
	global $arrTemplate;
	$args = func_get_args();
	if ($args[1] == "msg") {
		unset($arrTemplate);
		if(is_file(CACHE_LANG_PATH. "lang_message.php")){
			require(CACHE_LANG_PATH. "lang_message.php");
		}
	}
	$return = $arrTemplate['_'.$args[0]];
	if (is_array($args[2])) {
		$return = vsprintf($return, $args[2]);
	}else{
		$return = sprintf($return, $args[2]);
	}
	return (!empty($return))?pb_lang_split($return):$args[0];
}

function L($key, $type = "msg", $extra = null){
	return call_user_func_array("___L", array($key, $type, $extra));
}

if (!function_exists('file_get_contents')) {
	function file_get_contents($filename, $incpath = false, $resource_context = null)
	{
		if (false === $fh = fopen($filename, 'rb', $incpath)) {
			trigger_error('file_get_contents() failed to open stream: No such file or directory', E_USER_WARNING);
			return false;
		}
		clearstatcache();
		if ($fsize = @filesize($filename)) {
			$data = fread($fh, $fsize);
		} else {
			$data = '';
			while (!feof($fh)) {
				$data .= fread($fh, 8192);
			}
		}

		fclose($fh);
		return $data;
	}
}

if (!function_exists('file_put_contents')) {
	function file_put_contents($filename, $data) {
		$f = @fopen($filename, 'w');
		if (!$f) {
			return false;
		} else {
			$bytes = fwrite($f, $data);
			fclose($f);
			return $bytes;
		}
	}
}

if (!function_exists('http_build_query')) {
	function http_build_query($data, $prefix = null, $argSep = null, $baseKey = null) {
		if (empty($argSep)) {
			$argSep = ini_get('arg_separator.output');
		}
		if (is_object($data)) {
			$data = get_object_vars($data);
		}
		$out = array();

		foreach ((array)$data as $key => $v) {
			if (is_numeric($key) && !empty($prefix)) {
				$key = $prefix . $key;
			}
			$key = urlencode($key);

			if (!empty($baseKey)) {
				$key = $baseKey . '[' . $key . ']';
			}

			if (is_array($v) || is_object($v)) {
				$out[] = http_build_query($v, $prefix, $argSep, $key);
			} else {
				$out[] = $key . '=' . urlencode($v);
			}
		}
		return implode($argSep, $out);
	}
}

function formhash() {
	global $time_stamp, $phpb2b_auth_key;
	return substr(md5(substr($time_stamp, 0, -4).$phpb2b_auth_key), 16);
}

function pb_submit_check($var) {
	$referer = pb_getenv('HTTP_REFERER');
	if (is_file(DATA_PATH.'antispam'.DS.'index.php')) {
		require(DATA_PATH.'antispam'.DS.'index.php');
	}
	if(!empty($_POST[$var]) && $_SERVER['REQUEST_METHOD'] == 'POST') {
		if((empty($referer) || preg_replace("/https?:\/\/([^\:\/]+).*/i", "\\1", $referer) == preg_replace("/([^\:]+).*/", "\\1", pb_getenv('HTTP_HOST'))) && $_POST['formhash'] == formhash()) {
			return true;
		}
	}
	header_sent(L("invalid_submit"));
	exit;
}

function parse_highlight($highlight, $return_color = false) {
	if($highlight) {
		//as like to colorPicker, viewHelper
		$colorarray = array('#000000', '#FF0000', '#FFA500', '#FFFF00', '#008000', '#00FFFF', '#0000FF', '#800080', '#808080');
		$string = sprintf('%02d', $highlight);
		$stylestr = sprintf('%03b', $string[0]);
		if ($return_color) {
			$r['bold'] = $stylestr[0];
			$r['italic'] = $stylestr[1];
			$r['underline'] = $stylestr[2];
			$r['color'] = $colorarray[intval($string[1])];
			return $r;
		}
		$style = ' style="';
		$style .= $stylestr[0] ? 'font-weight: bold;' : '';
		$style .= $stylestr[1] ? 'font-style: italic;' : '';
		$style .= $stylestr[2] ? 'text-decoration: underline;' : '';
		$style .= $string[1] ? 'color: '.$colorarray[$string[1]] : '';
		$style .= '"';
	} else {
		$style = '';
	}
	return $style;
}

function pb_get_attachmenturl($src, $path = '', $size = '', $force = false, $nosize = '')
{
	if(preg_match('/http/', $src))
	{
		return $src;
	}
	global $attachment_dir, $attachment_url;
	$default_thumb_img = 'images/nopicture_small.gif';
	switch ($size) {
		case "smaller":
			$scope = ".".$size;
			break;
		case "square":
			$scope = ".".$size;
			break;
		case "small":
			$scope = ".".$size;
			break;
		case "middle":
			$scope = ".".$size;
			break;
		case "medium":
			$scope = ".".$size;
			break;
		case "banner":
			$scope = ".".$size;
			break;
		case "country":
			return '<img src="images/country/'.$src.'"/>';
			break;
		case "group":
			return '<img src="images/group/'.$src.'"/>';
			break;
		default:
			$scope = "";
			break;
	}
	if (!empty($scope)) {
		$default_thumb_img = 'images/nopicture_'.$size.$nosize.'.gif';
	}
	if ($force) {
		$default_thumb_img = 'images/nopicture_'.$force.$nosize.'.gif';
	}
	$img =  $src ? $attachment_url.$src : $default_thumb_img;
	if ($scope && ($img!=$default_thumb_img)) {
		$img.="{$scope}.jpg";
	}
	return $path.$img;
}


function capt_check($capt_name)
{
	global $_POST, $_PB_CACHE, $smarty, $charset;
	$capt_require = array(
	"capt_logging",
	"capt_register",
	"capt_post_free",
	"capt_add_market",
	"capt_login_admin",
	"capt_apply_friendlink",
	"capt_service"
	);
	if (in_array($capt_name, $capt_require)) {
		$t = decbin($_PB_CACHE['setting']['capt_auth']);
		$capt_auth = sprintf("%07d", $t);
		$key = array_search($capt_name, $capt_require);
		if($capt_auth[$key]){
			if (!empty($_POST['data'])) {
				include(LIB_PATH. "securimage/securimage.php");
				$img = new Securimage();
				$post_code = trim($_POST['data'][$capt_name]);
				header('Content-Type: text/html; charset='.$charset);
				if(!$img->check($post_code)){
					flash('invalid_capt', null, 0);
				}
			}
			$smarty->assign("ifcapt", true);
		}else{
			$smarty->assign("ifcapt", false);
		}
	}
}


function am() {
	$r = array();
	$args = func_get_args();
	foreach ($args as $a) {
		if (!is_array($a)) {
			$a = array($a);
		}
		$r = array_merge($r, $a);
	}
	return $r;
}

function header_sent($msg)
{
	global $charset;
	echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset='.$charset.'" />
</head>
<body>
<div style="font:normal normal normal 12px/1.2em Arial Black;">
'.$msg.'
</div>
</body>
</html>';
}

if (!function_exists("array_combine")) {
	function array_combine($arr1, $arr2) {
		$out = array();

		$arr1 = array_values($arr1);
		$arr2 = array_values($arr2);

		foreach($arr1 as $key1 => $value1) {
			$out[(string)$value1] = $arr2[$key1];
		}

		return $out;
	}
}

function check_proxy(){
	$v = getenv("HTTP_VIA");
	$f = getenv("HTTP_X_FORWARDED_FOR");
	$c = getenv("HTTP_XROXY_CONNECTION");
	$o = getenv("HTTP_PRAGMA");
	if ( ($v=="")&&($f=="")&&($c=="")&&($o=="") ) return false;
	return true;
}

function cache_read($file = null, $item = null, $prefix = true, $remove_params = null) {
	global $app_lang;
	$return = false;
	if($prefix) $file_name = CACHE_COMMON_PATH. 'cache_'.$file.'.php';
	else $file_name = CACHE_COMMON_PATH. $file.'.php';
//	$file_name = CACHE_ROOT. $app_lang. DS. 'cache_'.$file.'.php';
	if(!is_file($file_name)) return $return;
	$_required = require($file_name);
	if (empty($item)) {
		$item = $file;
	}
	if(isset($_PB_CACHE[$item])){
		$return = $_PB_CACHE[$item];
	}elseif(!empty($_PB_CACHE[$file])){
		$return = $_PB_CACHE[$file];
	}elseif(!empty($_PB_CACHE)){
		$return = $_PB_CACHE;
	}else{
		$return = $_required;
	}
	if (is_array($return)) {
		$return = array_map_recursive("pb_lang_split", $return);
	}
	if (!empty($remove_params)) {
		if (is_array($remove_params)) {
			foreach ($remove_params as $val) {
				unset($return[$val]);
			}
		}else{
			unset($return[$remove_params]);
		}
	}
	return $return;
}

function array_map_recursive($fn, $arr) {
    $ret = array();
    if (!empty($arr)) {
	    foreach ($arr as $key => $val) {
	        $ret[$key] = is_array($val)
	            ? array_map_recursive($fn, $val)
	            : $fn($val);
	    }
    }
    return $ret;
}

function df($timestamp = null, $format = null)
{
	global $time_stamp;
	$return = '';
	if (empty($timestamp)) {
		$timestamp = $time_stamp;
	}
	if (!empty($format)) {
		$return = date($format, $timestamp);
	}else{
		$return = date("d-m-Y H:i:s", $timestamp);
	}
	return $return;
}

function sens_str($content, $to = "***")
{
	$str = $content;
	$badword = cache_read("words", "words");
	if(!empty($badword)){
		$badword1 = array_combine($badword,array_fill(0,count($badword),$to));
		$str = strtr($content, $badword1);	
	}
	return $str;
}

function pb_lang_enabled($lang_name, $languages) {
	return in_array($lang_name, $languages);
}

/**
 * merge multi language title to one column
 *
 * @param array $inputs multi language title
 * @return string one title
 */
function pb_lang_merge($inputs)
{
	global $G, $app_lang;
//	if(!empty($G['languages']))
	$_languages = array_keys(unserialize($G['languages']));
//	else
//	$_languages[] = $app_lang;
	$ret = '';
	$inputs = array_filter($inputs);
	foreach ($inputs as $key=>$val) {
		if(pb_lang_enabled($key, $_languages)) $ret.="[:".$key."]".$val;
	}
	return $ret;
}

function pb_lang_split_recursive($arr)
{
	$ret = array();
	if(!empty($arr))
	$ret = array_map_recursive("pb_lang_split", $arr);
	return $ret;
}

/**
 * split lang title
 *
 * @param string $text title
 * @param string $lang_name language name
 * @param boolean $all if return all
 * @return string or array
 */
function pb_lang_split($text, $all = false) {
	global $G, $app_lang;
	$lang_name = $app_lang;
	//convert to array	
	if(!empty($G['languages'])) 
		$_languages = array_keys(unserialize($G['languages']));
	else 
		$_languages[] = $lang_name;
	$ret = '';
	$split_regex = "#(<!--[^>]*[^\/]-->|\[:[-:a-z]{3,5}\])#ism";
	$current_language = "";
	$result = array();
	foreach($_languages as $language) {
		$result[$language] = "";
	}
	$blocks = preg_split($split_regex, $text, -1, PREG_SPLIT_NO_EMPTY|PREG_SPLIT_DELIM_CAPTURE);
	foreach($blocks as $block) {
		if(preg_match("#^\[:([-:a-z]{3,5})\]$#ism", $block, $matches)) {
			if(pb_lang_enabled($matches[1], $_languages)) {
				$current_language = $matches[1];
			} else {
				$current_language = "invalid";
			}
			continue;
		}
		if($current_language == "") {
			foreach($_languages as $language) {
				$result[$language] .= $block;
			}
		} elseif($current_language != "invalid") {
			$result[$current_language] .= $block;
		}
	}
	if($all) return $result;
	else{
		$result = array_filter($result);
		if(isset($result[$lang_name])) $ret = $result[$lang_name];
		if(!empty($ret)) return $ret;
		elseif(current($result)) return current($result);//get the first
//		elseif(current($result)) return current($result)."[".key($result)."]";
		else return $text;//return orignal
	}
}

function clear_html($string)
{
	$farr = array(
	"/\s+/",
	"/<(\/?)(script|i?frame|style|html|body|title|link|meta|\?|\%)([^>]*?)>/isU",
	"/(<[^>]*)on[a-zA-Z]+\s*=([^>]*>)/isU",
	);
	$tarr = array(
	" ",
	"＜\1\2\3＞",
	"\1\2",
	);
	if(is_array($string)) {
		foreach($string as $key => $val) {
			$str[$key] = clear_html($val);
		}
	} else {
		$str = preg_replace( $farr,$tarr,$string);
	}
	return $str;
}

function pb_hidestr($string)
{
	$ret = '';
	if(empty($string)){ 
		return false; 
	}
	$show = array('m_0', 'm_1', 'm_2', 'm_3', 'm_8', 'm_9', 'm_10', 'm_16', 'm_19', 'm_20', 'm_22', 'm_33', 'm_34', 'm_37', 'm_38', 'm_40', 'm_44', 'm_45', 'm_46', 'm_48');
	$hide = array('m_4', 'm_5', 'm_6', 'm_7', 'm_11', 'm_12', 'm_13', 'm_14', 'm_15', 'm_17', 'm_18', 'm_21', 'm_23', 'm_24', 'm_25', 'm_26', 'm_27', 'm_28', 'm_29', 'm_30', 'm_31', 'm_32', 'm_35', 'm_36', 'm_39', 'm_41', 'm_42', 'm_43', 'm_47', 'm_49');
	for($i=0;$i<strlen($string);$i++){
		$flag = mt_rand(0,1);
		if($flag){
			$show_style = array_rand($show);
			$ret .="<span class='".$show[$show_style]."'>".$string[$i]."</span>";
		}else{
			$hide_style = array_rand($hide);
			$ret .="<span class='".$hide[$hide_style]."'>".mt_rand(0,1000)."</span>";
			$i--;
		}
	}
	return $ret;
}


function is_mobile(){
	$regex_match="/(nokia|iphone|android|motorola|^mot\-|softbank|foma|docomo|kddi|up\.browser|up\.link|";
	$regex_match.="htc|dopod|blazer|netfront|helio|hosin|huawei|novarra|CoolPad|webos|techfaith|palmsource|";
	$regex_match.="blackberry|alcatel|amoi|ktouch|nexian|samsung|^sam\-|s[cg]h|^lge|ericsson|philips|sagem|wellcom|bunjalloo|maui|";
	$regex_match.="symbian|smartphone|midp|wap|phone|windows ce|iemobile|^spice|^bird|^zte\-|longcos|pantech|gionee|^sie\-|portalmmm|";
	$regex_match.="jig\s browser|hiptop|^ucweb|^benq|haier|^lct|opera\s*mobi|opera\*mini|320x320|240x320|176x220";
	$regex_match.=")/i";
	return isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE']) or preg_match($regex_match, strtolower($_SERVER['HTTP_USER_AGENT']));
}

function getCatsByCatID($id)
{
		uses("industry");
		$industry = new Industries();
		$industries = $industry->getCacheIndustry();
		
			$area_a = array();
			$area_a[] = $id;
			foreach($industries as $key0 => $level0)
			{
				if($level0["id"] == $id)
				{
					foreach($level0['sub'] as $key1 => $level1)
					{
						$area_a[] = $level1["id"];
						foreach($level1['sub'] as $key2 => $level2)
						{
							$area_a[] = $level2["id"];
							foreach($level2['sub'] as $key3 => $level3)
							{
								$area_a[] = $level3["id"];								
							}
						}
					}
					break;
				}
				else
				{
					foreach($level0['sub'] as $key1 => $level1)
					{
						if($level1["id"] == $id)
						{
							foreach($level1['sub'] as $key2 => $level2)
							{
								$area_a[] = $level2["id"];
								foreach($level2['sub'] as $key3 => $level3)
								{
									$area_a[] = $level3["id"];									
								}
							}
							break;
						}
						else
						{
							foreach($level1['sub'] as $key2 => $level2)
							{
								if($level2["id"] == $id)
								{
									$area_a[] = $level2["id"];
									//echo count($level2['sub']);
									foreach($level2['sub'] as $key3 => $level3)
									{
										//echo $level3["id"];
										$area_a[] = $level3["id"];										
									}
									//var_dump($area_a);
									break;
								}
								else
								{
									foreach($level2['sub'] as $key3 => $level3)
									{										
										if($level3["id"] == $id)
										{
											$area_a[] = $level3["id"];											
											break;
										}										
									}
									
								}
							}
						}
					}
					
				}
			}
			//var_dump($area_a);
			$result = implode(',', $area_a);
			//$industry->saveField('children', $result, (int)$id);
			
			return $result;
			
}

function selfURL(){
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}

function utf8_to_ascii($str) {
	$chars = array(
		'a' => array('ấ','ầ','ẩ','ẫ','ậ','Ấ','Ầ','Ẩ','Ẫ','Ậ','ắ','ằ','ẳ','ẵ','ặ','Ắ','Ằ','Ẳ','Ẵ','Ặ','á','à','ả','ã','ạ','â','ă','Á','À','Ả','Ã','Ạ','Â','Ă'),
		'e' => array('ế','ề','ể','ễ','ệ','Ế','Ề','Ể','Ễ','Ệ','é','è','ẻ','ẽ','ẹ','ê','É','È','Ẻ','Ẽ','Ẹ','Ê'),
		'i' => array('í','ì','ỉ','ĩ','ị','Í','Ì','Ỉ','Ĩ','Ị'),
		'o' => array('ố','ồ','ổ','ỗ','ộ','Ố','Ồ','Ổ','Ô','Ộ','ớ','ờ','ở','ỡ','ợ','Ớ','Ờ','Ở','Ỡ','Ợ','ó','ò','ỏ','õ','ọ','ô','ơ','Ó','Ò','Ỏ','Õ','Ọ','Ô','Ơ'),
		'u' => array('ứ','ừ','ử','ữ','ự','Ứ','Ừ','Ử','Ữ','Ự','ú','ù','ủ','ũ','ụ','ư','Ú','Ù','Ủ','Ũ','Ụ','Ư'),
		'y' => array('ý','ỳ','ỷ','ỹ','ỵ','Ý','Ỳ','Ỷ','Ỹ','Ỵ'),
		'd' => array('đ','Đ')
	);
	foreach ($chars as $key => $arr)
		foreach ($arr as $val)
		{
			$str = str_replace($val,$key,strtolower($str));
			$str = preg_replace("/ /", '-', $str);
		}	
	return $str;
}

function cleanContent($content)
{
	$content = str_replace("&quot;",'"',$content);
	$content = str_replace("\\",'"',$content);
	
	require_once(PHPB2B_ROOT. 'libraries'.DS.'htmlpurifier'.DS.'library'.DS.'HTMLPurifier.auto.php');
		
	$config = HTMLPurifier_Config::createDefault();
	$purifier = new HTMLPurifier($config);
	$clean_html = $purifier->purify($content);
		
	$content = $clean_html;
	$content = str_replace('<a', '<a target="_blank" rel="nofollow"', $content);
		
		
	//format html
	$content = strip_tags($content, "<p><br><strong><font><span><img><h2><h3><h4><ul><li>");
	
	return $content;
}
function stringToURI($string)
{
	return preg_replace("/\-$/", '', preg_replace("/\-(\-)+/", '-', preg_replace("/[^A-Za-z0-9 \-]/", '', utf8_to_ascii($string))));
}
?>