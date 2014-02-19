<?php /* Smarty version 2.6.27, created on 2013-11-13 08:52:55
         compiled from changepass.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'formhash', 'changepass.html', 36, false),)), $this); ?>
<?php $this->assign('page_title', ($this->_tpl_vars['_change_password'])); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
<script>
	jQuery(document).ready(function($) {
		$(\'.MenuItem19\').addClass(\'mActive\');
	});
</script>
'; ?>


<?php echo '
<script>
$(document).ready(function() {
	$("#ChangePassFrm").validate({
	submitHandler: function(form) {
		$(form).find(":submit").attr("disabled", true).attr("value",pb_lang.DO_PROCESSING);
		form.submit();
	}
	})
})
</script>
'; ?>

<div class="wrap clearfix">
    <div class="sidebar">
       <div class="sidebar_menu">
         <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
       </div>
    </div>
     <div class="main_content">
     <div class="blank"></div>
	 <div class="offer_banner"><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/offer_01.gif" /></div>
     <div class="offer_info_title"><h2><?php echo $this->_tpl_vars['page_title']; ?>
</h2></div>
     <div class="hint"><?php echo $this->_tpl_vars['_must_input_with_star']; ?>
</div>
	  <form name="changepassfrm" id="ChangePassFrm" method="post">
	  <?php echo smarty_function_formhash(array(), $this);?>

	  <input type="hidden" name="action" value="checkpasswd" />
		 <table class="offer_info_content">
              <tr>
                <th class="circle_left"><span class="fontred"> *</span><?php echo $this->_tpl_vars['_old_password']; ?>
</th>
              <td class="circle_right"><input name="oldpass" type="password" id="oldpass" class="required" value=""><span id="checkoldpwdDiv"></span> </td>
            </tr>
            <tr>
              <th><span class="fontred"> *</span> <?php echo $this->_tpl_vars['_new_password_n']; ?>
</th>
              <td><input name="newpass" type="password" id="newpass" class="required" minlength="5"></td>
            </tr>
            <tr>
              <th><span class="fontred"> *</span> <?php echo $this->_tpl_vars['_repeat']; ?>
<?php echo $this->_tpl_vars['_new_password_n']; ?>
</th>
              <td><input name="re_newpass" type="password" id="re_newpass" class="required" minlength="5" equalTo="#newpass"></td>
            </tr> 
            <tr>
              <th class="circle_bottomleft"></th>
              <td class="circle_bottomright"><input name="btn_change_pwd" type="submit" id="BtnChangePwd" value="<?php echo $this->_tpl_vars['_i_sure']; ?>
<?php echo $this->_tpl_vars['_change_password']; ?>
"></td>
            </tr> 
        </table>
	  </form>
	</div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>