<?php /* Smarty version 2.6.27, created on 2013-06-18 10:09:04
         compiled from header.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'sprintf', 'header.html', 139, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->_tpl_vars['charset']; ?>
">
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title><?php echo $this->_tpl_vars['page_title']; ?>
 - <?php echo $this->_tpl_vars['_office_room']; ?>
 - <?php echo $this->_tpl_vars['_G']['site_name']; ?>
</title>
<link href="../css/common.css" rel="stylesheet" type="text/css">
<link href="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/style.css" rel="stylesheet" type="text/css">
<script src="../scripts/jquery.js"></script>
<script src="../data/cache/<?php echo $this->_tpl_vars['JsLanguage']; ?>
/locale.js" charset="<?php echo $this->_tpl_vars['charset']; ?>
"></script>
<script src="../scripts/jquery/jquery.validate.js"></script>
<script src="../scripts/general.js"></script>
<?php echo '
<script>
$(document).ready(function() {
	$("#GoTop").click(function(){
		$(\'html, body\').animate({scrollTop: \'0px\'}, 300);return false;
	});
	$("#check_all").click(function(){
		var isCheckAll=$(this).attr("checked");
		$(\'input[type="checkbox"][rel="check_item"]\').each(function(){
		   $(this).attr("checked",isCheckAll);
		});
	});
});
</script>
'; ?>



<?php echo '
<style>
#body-wrapper {
	background-attachment:fixed!important;
	background-repeat:repeat;
}
</style>

<script type="application/x-javascript">
	
	function getCart(p_id, amount) {
		var param = "";
		if(typeof(p_id)!=\'undefined\')
		{
			param += "&id="+p_id;
		}
		if(typeof(amount)!=\'undefined\') param += "&amount="+amount;
		
		//code
		$.ajax({
			url: "../index.php?do=product&action=getTopCartAjax"+param,
		}).done(function ( data ) {
			if( console && console.log ) {
				//alert(data);
				$(\'#topCart\').html(data);
				$(\'a.cart_link\').attr(\'href\', \'../index.php?do=product&action=add_cart\');
				$(\'a.cart_link\').attr(\'target\', \'_blank\');
				$(\'.item_rows\').hover(
					function () {
					    //$(\'#settingbox\').fadeIn();
					}
					,
					function () {
					    $(\'.item_rows\').fadeOut();
					}
				);
				
				//alert
				if(typeof(p_id)!=\'undefined\')
				{
					//alert("'; ?>
<?php echo $this->_tpl_vars['_added_to_cart']; ?>
<?php echo '");
					//$(\'#box_alert\')
					$(\'#hiddenclicker\').trigger(\'click\');
				}
			}
		});
	}
	
	function removeCartItem(id, row, down) {
		//code
		//alert(down.replace(/\\./g, ""));
		//alert($.number($(\'#cart_total\').html().replace(/\\./g, "") - down.replace(/\\./g, ""), 0, \',\', \'.\'));
		
		$.ajax({
			url: "../index.php?do=product&action=add_cart&task=remove&cartitemid="+id,
		}).done(function ( data ) {
			if( console && console.log ) {
				//alert(data);
				$(row).parent().parent().fadeOut();
				$(\'#cart_count\').html($(\'#cart_count\').html()-1);
				
				$(\'#cart_total\').html($.number($(\'#cart_total\').html().replace(/\\./g, "") - down.replace(/\\./g, ""), 0, \',\', \'.\'));
				
			}
		});
	}
	
	function getInbox() {
		//code
		$.ajax({
			url: "../index.php?do=product&action=ajaxInbox",
		}).done(function ( data ) {
			if( console && console.log ) {
				$("#inbox_out").html(data);
			}
		});
	}
	
	$(document).ready(function() {
		
		if (window.chrome) {
			$("#f_language_bar").css("margin-top", "-17px");
			$("#settingouter").css("margin-top", "0");
		}
		
		getCart();
		getInbox();
		//$(\'a.cart_link\').click(function(){
		//	$(\'.item_rows\').toggle();
		//});
		
		
		
	});
</script>

	'; ?>



</head>
<body>	
	<!--<iframe src="<?php echo $this->_tpl_vars['SiteUrl']; ?>
?do=product&action=TopIframe" style="border: none; width: 100%; height: 40px;" ></iframe>-->
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../default/topmenu_iframe.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="content_bkg">
<div id="basePageFrame">
    <div class="header clearfix" style="display: none">
	
        <div class="header_nav">
       </div>
       <div class="login_info"><?php echo ((is_array($_tmp=$this->_tpl_vars['_hello'])) ? $this->_run_mod_handler('sprintf', true, $_tmp, $this->_tpl_vars['UserName']) : sprintf($_tmp, $this->_tpl_vars['UserName'])); ?>
(<a href="personal.php" style="text-decoration:underline;"><?php echo $_SESSION['MemberName']; ?>
</a>)
       <?php if ($this->_tpl_vars['menu']['pms'] && $this->_tpl_vars['newpm']): ?><a href="pms.php" title=""><img src="../images/message.gif" alt="<?php echo $this->_tpl_vars['newpm']; ?>
" /></a><?php endif; ?>
       </div>
    </div>
    <div class="header_txt">
       <div class="welcome_txt">
	   <span class="title" id="welcome-to"><?php echo $this->_tpl_vars['_welcome_to_office']; ?>
</span>
	   <form name="searchFrm" id="HeadSearchFrm" action="../index.php" target="_blank" method="get">
	   <input type="hidden" name="do" value="offer" />
	   <input type="hidden" name="action" value="lists" />
	   <span class="search"><input name="q" type="text"  id="SearchKeyword" value="<?php echo $this->_tpl_vars['_input_keywords']; ?>
" onfocus="if(this.value=='<?php echo $this->_tpl_vars['_input_keywords']; ?>
') this.value='';" onblur="if(this.value=='') this.value='<?php echo $this->_tpl_vars['_input_keywords']; ?>
';" class="input_white" /><input type="submit" value="<?php echo $this->_tpl_vars['_search']; ?>
" onclick="if($('#SearchKeyword').val()=='<?php echo $this->_tpl_vars['_input_keywords']; ?>
') alert('<?php echo $this->_tpl_vars['_input_keywords']; ?>
');$('#SearchKeyword').focus();return false;" /></span>
	   </form>
	   </div>
       <!--<div class="welcome_txt_small"><span><?php echo $this->_tpl_vars['_service_hotline']; ?>
<?php echo $this->_tpl_vars['service_tel']; ?>
</span></div>-->
   </div>
   <div id="main-nav">
	 <div class="nav-wrapper">
		<ul>
		  <li><a href="index.php" id="home-page"><span><?php echo $this->_tpl_vars['_office_homepage']; ?>
</span></a></li>
		  
		  <li><a class="current_nav" href="offer.php" id="info-manage"><span><?php echo $this->_tpl_vars['_info_manage']; ?>
</span></a></li>
		  <?php if ($this->_tpl_vars['COMPANYINFO']['cache_spacename'] && $this->_tpl_vars['COMPANYINFO']['status'] == 1): ?><li><a href="<?php echo $this->_tpl_vars['COMPANYINFO']['space_url']; ?>
" target="_blank"><span><?php echo $this->_tpl_vars['_front_page']; ?>
</span></a></li><?php endif; ?>
		  <li><a href="../logging.php?action=logout"><span><?php echo $this->_tpl_vars['_login_out']; ?>
</span></a></li>
		</ul>
	</div>
  </div>
   
   