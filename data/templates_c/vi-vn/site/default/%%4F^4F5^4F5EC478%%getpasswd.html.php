<?php /* Smarty version 2.6.27, created on 2013-10-31 09:09:15
         compiled from default%5Cgetpasswd.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'formhash', 'default\\getpasswd.html', 65, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/header.html", 'smarty_include_vars' => array('page_title' => ($this->_tpl_vars['_get_password']))));
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
    <div class="fifteen columns"><div class="line"></div></div>
</div>


<div class="row">

    <div class="four columns logging getpass" style="margin-left: 80px">

        <section id="woocommerce_login-2" class="widget-1 widget-first widget widget_login">
	  
	  <div class="widget-inner">
	    <h3><?php echo $this->_tpl_vars['_forget_pass']; ?>
</h3>
	  
	  
	  



<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/header.html", 'smarty_include_vars' => array('page_title' => ($this->_tpl_vars['_get_password']))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script src="data/cache/<?php echo $this->_tpl_vars['JsLanguage']; ?>
/locale.js" charset="<?php echo $this->_tpl_vars['charset']; ?>
"></script>
<script language="javascript" src="scripts/jquery/jquery.validate.js"></script>
<?php echo '
<script>
jQuery(document).ready(function($) {
	$("#getPasswdFrm").validate({
	submitHandler: function(form) {
		$(form).find(":submit").attr("disabled", true).attr("value",pb_lang.DO_PROCESSING);
		form.submit();
	}
	});
})
</script>
'; ?>


              <form name="getpasswdfrm" id="getPasswdFrm" method="post" action="getpasswd.php">
                  <input type="hidden" name="action" value="getpasswd" />
                  <?php echo smarty_function_formhash(array(), $this);?>

                    <strong><?php echo $this->_tpl_vars['_input_name_email']; ?>
</strong>
		    
		    <p>
			<label>
				<?php echo $this->_tpl_vars['_login_name']; ?>

			</label>
			<input type="text" name="data[username]" value="" id="dataUsername" class="required"/>
		    </p>
                     <p>
			<label>
				<?php echo $this->_tpl_vars['_your_email']; ?>

			</label>
			<input type="text" name="data[email]" id="UserEmail" value="" class="required email"/>
		    </p>
		     <p>
			<label style="text-transform: none;"><?php echo $this->_tpl_vars['_send_password_email_next']; ?>
</label>
			<input type="submit" name="go_next" value="<?php echo $this->_tpl_vars['_pass_confirm']; ?>
" id="wp-submit" class="submit_w165"/>
		     </p>
		    
                </form>
                <div class="messageconright">
                <?php if ($this->_tpl_vars['ERRORS']): ?>
                    <p><?php echo $this->_tpl_vars['ERRORS']; ?>
</p>
                <?php else: ?>
                    
                <?php endif; ?>
                </div>
	      
	      
	
	  </div>
	
	
	</section>
			
    </div>
</div>



</div>
  </div>






<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
