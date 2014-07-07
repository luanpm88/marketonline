<?php /* Smarty version 2.6.27, created on 2014-07-07 09:35:26
         compiled from default%5Ccartlogging.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'formhash', 'default\\cartlogging.html', 60, false),array('function', 'the_url', 'default\\cartlogging.html', 158, false),array('modifier', 'default', 'default\\cartlogging.html', 71, false),array('modifier', 'date_format', 'default\\cartlogging.html', 85, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/header.html", 'smarty_include_vars' => array('page_title' => ($this->_tpl_vars['_login']))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>



<div id="body-wrapper" >
<div id="body-wrapper-padding">
<!--[if lt IE 7]>
<div class="alert">Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different
    browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to
    experience this site.
</div><![endif]-->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/topmenu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<div class="row">
    <div class="fifteen columns" id="page-title">
        <a class="back" href="javascript:history.back()"></a>
        <div class="subtitle">
            
                        <p><?php echo $this->_tpl_vars['_member']; ?>
</p>
        </div>
        <h1 class="page-title">
                        <?php echo $this->_tpl_vars['_login']; ?>
                    </h1>

        

    </div>
    <div class="fifteen columns"><div class="line" style="margin-bottom: 10px"></div></div>
</div>


<div class="row">

    <div class="four columns logging">

        <section id="woocommerce_login-2" class="widget-1 widget-first widget widget_login">
	  
	  
	  
	  <div class="widget-inner">
	    
	    
	    
	   <?php echo '
<style type="text/css">
label.error {
  font-weight: bold;
  color: #b80000;
}
</style>
'; ?>

<div class="wrapper">
    <div class="content">
        
        <div class="loadingcon">
        <form name="loggingfrm" id="LoggingFrm" method="post" action="cartlogging.php">
        	<input type="hidden" name="action" value="logging">
		  <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['id']; ?>
">
			<?php echo smarty_function_formhash(array(), $this);?>

			<input type="hidden" name="forward" value="<?php echo $this->_tpl_vars['_G']['forward']; ?>
" />
            <div class="loadingconleft">
                
				<?php if ($this->_tpl_vars['LoginError']): ?><?php echo $this->_tpl_vars['LoginError']; ?>
<?php endif; ?>
				<br />
<?php if ($this->_tpl_vars['pb_username'] != ""): ?>
					<label class="loadingname">
                        <?php echo $this->_tpl_vars['_user_name']; ?>

                    </label>
                    <label>
                        <?php echo ((is_array($_tmp=@$this->_tpl_vars['pb_username'])) ? $this->_run_mod_handler('default', true, $_tmp, '`$_account_n_email_n_mobile`') : smarty_modifier_default($_tmp, '`$_account_n_email_n_mobile`')); ?>

                    </label>
                    <br clear="all" />
					<label class="loadingname">
                        <?php echo $this->_tpl_vars['_member_type']; ?>

                    </label>
                    <label>
                        <?php echo $this->_tpl_vars['member_info']['groupname']; ?>
<img src="<?php echo $this->_tpl_vars['member_info']['groupimage']; ?>
" />
                    </label>
                    <br clear="all" />
					<label class="loadingname">
                        <?php echo $this->_tpl_vars['_your_last_login']; ?>
<?php echo $this->_tpl_vars['_colon']; ?>

                    </label>
                    <label>
                        <?php echo ((is_array($_tmp=$this->_tpl_vars['member_info']['last_login'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d %H:%M") : smarty_modifier_date_format($_tmp, "%Y-%m-%d %H:%M")); ?>

                    </label>
                    <br clear="all" />
<?php else: ?>
					<label class="loadingname">
                        <?php echo $this->_tpl_vars['_user_name']; ?>

                    </label>
                    <label>
                        <input type="text" style="color: #333;" name="data[login_name]" id="LoginName" value="" placeholder="<?php echo $this->_tpl_vars['_account_n_email_n_mobile']; ?>
" tabindex="1">&nbsp;
                    </label>
                    <label class="loadingname">
                    <?php echo $this->_tpl_vars['_password']; ?>

                    </label>
                    <label>
                        <input name="data[login_pass]" type="password" id="LoginPass" value="" tabindex="2"><input type="checkbox" name="remember_pass" id="RememberPass" value="1" title="<?php echo $this->_tpl_vars['_remember_password']; ?>
">&nbsp;<?php echo $this->_tpl_vars['_remember_password']; ?>
&nbsp;
                    </label>
                    <br clear="all" />
                    <?php if ($this->_tpl_vars['ifcapt']): ?>
                    <label class="loadingname">
                        <?php echo $this->_tpl_vars['_code']; ?>

                    </label>
                    <label class="loadingcheck">
                        <input name="data[capt_logging]" id="LoginAuth" type="text" value="" size="5" maxlength="5" tabindex="3"><a href="javascript:;" onclick="$('#imgcaptcha').attr('src','captcha.php?sid=' + Math.random());return false;"><img src="captcha.php" id="imgcaptcha" alt="<?php echo $this->_tpl_vars['_unclear_see_numbers']; ?>
" title="<?php echo $this->_tpl_vars['_unclear_see_numbers']; ?>
" width="128"/></a>
                    </label>
                    <div class="clear"></div>
                    <p class="loadingp1"><?php echo $this->_tpl_vars['_refresh_code']; ?>
</p>
                    <?php endif; ?>
                    <div class="clear"></div>
                    <div class="login" id="btnLoginDiv">
                       <input type="submit" name="log_in" value="<?php echo $this->_tpl_vars['_login']; ?>
" id="wp-submit" class="submitbutton" />&nbsp;&nbsp;&nbsp;<a href="getpasswd.php"><?php echo $this->_tpl_vars['_forget_password']; ?>
</a>
                    </div>
		    
<?php endif; ?>
                    
            </div>
            
        </form>
        </div>
    </div>
</div>
<script src="data/cache/<?php echo $this->_tpl_vars['JsLanguage']; ?>
/locale.js" charset="<?php echo $this->_tpl_vars['charset']; ?>
"></script>
<script language="javascript" src="scripts/jquery/jquery.validate.js"></script>
<script language="javascript" src="scripts/validate.js" charset="<?php echo $this->_tpl_vars['charset']; ?>
"></script>
<script>
var account_n_email_n_mobile = "<?php echo $this->_tpl_vars['_account_n_email_n_mobile']; ?>
";
</script>
<?php echo '
<script>
$(document).ready(function(){
	//$("#LoginName").focus(function(){
	//	if($("#LoginName").val()==account_n_email_n_mobile){
	//		$("#LoginName").val(\'\').css(\'color\', \'#000\');
	//	};
	//}).blur(function(){
	//	if($("#LoginName").val()==\'\'){
	//	$("#LoginName").val(account_n_email_n_mobile).css("color","#ccc")};
	//});
});
</script>
'; ?>

	  
	  
	  
	  </div>
	
	
	</section>
			
    </div>
    
    
    <div class="res_logging">
	<h4><?php echo $this->_tpl_vars['_not_register_annouce']; ?>
</h4><br />
	<button class="single_add_to_cart_button button alt" type="button" onclick="window.location='<?php echo smarty_function_the_url(array('module' => 'register'), $this);?>
'"><?php echo $this->_tpl_vars['_register']; ?>
</button>
    </div>
    
</div>



</div>
  </div>






<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
