<?php
class Error extends PbController {
	var $name = "Error";
	var $code;
	var $msg;
	
	function Error()
	{
		if (!empty($_GET['code'])) {
			$this->code = trim($_GET['code']);
		}
		if (!empty($_GET['msg'])) {
			$this->message = urldecode($_GET['msg']);
		}
	}
	
	function redirect($code = null) {
		global $smarty, $theme_name;
		$codes = array(
		100 => "Continue",
		101 => "Switching Protocols",
		200 => "OK",
		201 => "Created",
		202 => "Accepted",
		203 => "Non-Authoritative Information",
		204 => "No Content",
		205 => "Reset Content",
		206 => "Partial Content",
		300 => "Multiple Choices",
		301 => "Moved Permanently",
		302 => "Found",
		303 => "See Other",
		304 => "Not Modified",
		305 => "Use Proxy",
		307 => "Temporary Redirect",
		400 => "Bad Request",
		401 => "Unauthorized",
		402 => "Payment Required",
		403 => "Forbidden",
		404 => "Not Found",
		405 => "Method Not Allowed",
		406 => "Not Acceptable",
		407 => "Proxy Authentication Required",
		408 => "Request Time-out",
		409 => "Conflict",
		410 => "Gone",
		411 => "Length Required",
		412 => "Precondition Failed",
		413 => "Request Entity Too Large",
		414 => "Request-URI Too Large",
		415 => "Unsupported Media Type",
		416 => "Requested range not satisfiable",
		417 => "Expectation Failed",
		500 => "Internal Server Error",
		501 => "Not Implemented",
		502 => "Bad Gateway",
		503 => "Service Unavailable",
		504 => "Gateway Time-out"
		);
		$dir = $smarty->template_dir.'errors'.DS;
		if (empty($code)) {
			$code = $this->code;
		}
		$msg = (!empty($this->message))?$this->message:$codes[$this->code];
		@header("HTTP/1.1 ".$this->code." ".$msg);
		$qs = (!empty($_SERVER['REDIRECT_URL']))?$_SERVER['REDIRECT_URL']:$_SERVER['QUERY_STRING'];
		if(strpos($qs, '404;') !== false) {
			$qs = str_replace('404;', '', $qs);
			$qs = substr($qs, strpos($qs, ':80')+3);
		}
		setvar("url", $qs);
		setvar("msg", $code." ".urldecode($msg));
		if (file_exists($dir.$this->code.$smarty->tpl_ext)) {
			$smarty->display($dir.$code.$smarty->tpl_ext);
		}else{
			$smarty->display($dir."error".$smarty->tpl_ext);
		}
	}	
}
?>