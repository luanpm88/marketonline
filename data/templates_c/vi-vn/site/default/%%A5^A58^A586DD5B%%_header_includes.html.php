<?php /* Smarty version 2.6.27, created on 2014-08-14 08:16:52
         compiled from default/_header_includes.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'formhash', 'default/_header_includes.html', 18, false),array('function', 'the_url', 'default/_header_includes.html', 52, false),)), $this); ?>
<?php if (! $this->_tpl_vars['pb_username']): ?>
	<div id="login-box" style="display: none">
		
		<div style="padding: 20px 20px 0px 20px;width: 375px">
	
			<div class="content_inner" style="padding-bottom:10px;">
			    <div class="wrapper">
	
	    <div class="content">
		
		<h1><?php echo $this->_tpl_vars['_login']; ?>
</h1>
		
		<div class="loadingcon">
		<form name="loggingfrm" id="LoggingFrm" method="post" action="logging.php">
		    <input type="hidden" name="action" value="logging">
		    <input type="hidden" name="type" value="<?php echo $this->_tpl_vars['Type']; ?>
">
		    <input type="hidden" name="redirect" value="<?php echo $this->_tpl_vars['F_URL']; ?>
">
		    <?php echo smarty_function_formhash(array(), $this);?>

		    <input type="hidden" name="forward" value="<?php echo $this->_tpl_vars['_G']['forward']; ?>
" />
		    <div class="loadingconleft">
			
					<?php if ($this->_tpl_vars['LoginError']): ?><?php echo $this->_tpl_vars['LoginError']; ?>
<?php endif; ?>
					<br />
						<label class="loadingname">
				<?php echo $this->_tpl_vars['_user_name']; ?>

			    </label>
			    <label>
				<input type="text" style="color: #333;" name="data[login_name]" id="LoginName"  value="" placeholder="<?php echo $this->_tpl_vars['_account_n_email_n_mobile']; ?>
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
			    
			    <div class="clear"></div>
			    <div class="login" id="btnLoginDiv">
			       <input type="submit" name="log_in" value="<?php echo $this->_tpl_vars['_login']; ?>
" id="wp-submit" class="submitbutton" />
			       <div class="info_but_login">
				<a href="<?php echo $this->_tpl_vars['WebRootUrl']; ?>
getpasswd.php"><?php echo $this->_tpl_vars['_forget_password']; ?>
</a><br />
				<!--<a href="<?php echo $this->_tpl_vars['WebRootUrl']; ?>
register.php"><?php echo $this->_tpl_vars['_register']; ?>
</a>-->
			       </div>
			    </div>
			    
			    
			    <div class="box-res-con">
				<div class="inner-boxx">
				    <h4>Nếu bạn chưa có tài khoản thành viên.<br />Vui lòng đăng ký để tham gia với chúng tôi.</h4><br />
				    <?php if ($_GET['do'] == 'product'): ?>
					<a target="blank" class="single_add_to_cart_button button alt" type="button" href="<?php echo smarty_function_the_url(array('module' => 'register','typename' => 'Company'), $this);?>
"><?php echo $this->_tpl_vars['_register']; ?>
</a>
				    <?php elseif ($_GET['do'] == 'employee'): ?>
					<a target="blank" class="single_add_to_cart_button button alt" type="button" href="<?php echo smarty_function_the_url(array('module' => 'register','typename' => 'Employee'), $this);?>
"><?php echo $this->_tpl_vars['_register']; ?>
</a>
				    <?php elseif ($_GET['do'] == 'job'): ?>
					<a target="blank" class="single_add_to_cart_button button alt" type="button" href="<?php echo smarty_function_the_url(array('module' => 'register','typename' => 'Employer'), $this);?>
"><?php echo $this->_tpl_vars['_register']; ?>
</a>
				    <?php elseif ($_GET['do'] == 'studypost'): ?>
					<a target="blank" class="single_add_to_cart_button button alt" type="button" href="<?php echo smarty_function_the_url(array('module' => 'register','typename' => 'Learner'), $this);?>
"><?php echo $this->_tpl_vars['_register']; ?>
</a>
				    <?php else: ?>
					<a target="blank" class="single_add_to_cart_button button alt" type="button" href="<?php echo smarty_function_the_url(array('module' => 'register','typename' => 'Company'), $this);?>
"><?php echo $this->_tpl_vars['_register']; ?>
</a>
				    <?php endif; ?>
				</div>
			    </div>
			    
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

	</div>
		</div>
		
	</div>
<?php endif; ?>
   