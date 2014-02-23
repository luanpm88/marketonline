<?php /* Smarty version 2.6.27, created on 2013-05-02 06:41:19
         compiled from setting.auth.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_radios', 'setting.auth.html', 17, false),array('modifier', 'default', 'setting.auth.html', 17, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="currentPosition">
	<p><?php echo $this->_tpl_vars['_your_current_position']; ?>
 <?php echo $this->_tpl_vars['_setting_global']; ?>
 &raquo; <?php echo $this->_tpl_vars['_secure_auth']; ?>
</p>
</div>
<div id="rightTop"> 
    <h3><?php echo $this->_tpl_vars['_secure_auth']; ?>
</h3> 
    <ul class="subnav">
        <li><a href="setting.php?do=secure"><?php echo $this->_tpl_vars['_security']; ?>
</a></li>
		<li><a href="setting.php?do=auth" class="btn1"><span><?php echo $this->_tpl_vars['_secure_auth']; ?>
</span></a></li>
    </ul>
</div>
<div class="info"> 
    <form method="post" action="setting.php" name="edit_frm"> 
        <table class="infoTable"> 
         	<tr> 
                <th class="paddingT15"><?php echo $this->_tpl_vars['_cp_login']; ?>
 <?php echo $this->_tpl_vars['_auth_key_n']; ?>
</th> 
              	<td class="paddingT15 wordSpacing5"><?php echo smarty_function_html_radios(array('name' => "data[setting][capt_logging]",'options' => $this->_tpl_vars['AskAction'],'checked' => ((is_array($_tmp=@$this->_tpl_vars['item']['CAPT_LOGGING'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)),'separator' => ""), $this);?>
</td> 
          	</tr> 
         	<tr> 
                <th class="paddingT15"><?php echo $this->_tpl_vars['_register']; ?>
 <?php echo $this->_tpl_vars['_auth_key_n']; ?>
</th> 
              	<td class="paddingT15 wordSpacing5"><?php echo smarty_function_html_radios(array('name' => "data[setting][capt_register]",'options' => $this->_tpl_vars['AskAction'],'checked' => ((is_array($_tmp=@$this->_tpl_vars['item']['CAPT_REGISTER'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)),'separator' => ""), $this);?>
</td> 
          	</tr> 
         	<tr> 
                <th class="paddingT15"><?php echo $this->_tpl_vars['_free_post_trade']; ?>
 <?php echo $this->_tpl_vars['_auth_key_n']; ?>
</th> 
              	<td class="paddingT15 wordSpacing5"><?php echo smarty_function_html_radios(array('name' => "data[setting][capt_post_free]",'options' => $this->_tpl_vars['AskAction'],'checked' => ((is_array($_tmp=@$this->_tpl_vars['item']['CAPT_POST_FREE'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)),'separator' => ""), $this);?>
</td> 
          	</tr> 
         	<tr> 
                <th class="paddingT15"><?php echo $this->_tpl_vars['_market']; ?>
 <?php echo $this->_tpl_vars['_auth_key_n']; ?>
</th> 
              	<td class="paddingT15 wordSpacing5"><?php echo smarty_function_html_radios(array('name' => "data[setting][capt_add_market]",'options' => $this->_tpl_vars['AskAction'],'checked' => ((is_array($_tmp=@$this->_tpl_vars['item']['CAPT_ADD_MARKET'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)),'separator' => ""), $this);?>
</td> 
          	</tr> 
			<tr> 
                <th class="paddingT15"><?php echo $this->_tpl_vars['_control_pannel']; ?>
 <?php echo $this->_tpl_vars['_login']; ?>
 <?php echo $this->_tpl_vars['_auth_key_n']; ?>
</th> 
       			<td class="paddingT15 wordSpacing5"><?php echo smarty_function_html_radios(array('name' => "data[setting][capt_login_admin]",'options' => $this->_tpl_vars['AskAction'],'checked' => ((is_array($_tmp=@$this->_tpl_vars['item']['CAPT_LOGIN_ADMIN'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)),'separator' => ""), $this);?>
</td> 
          	</tr> 
         	<tr> 
                <th class="paddingT15"><?php echo $this->_tpl_vars['_friendlink']; ?>
 <?php echo $this->_tpl_vars['_auth_key_n']; ?>
</th> 
              	<td class="paddingT15 wordSpacing5"><?php echo smarty_function_html_radios(array('name' => "data[setting][capt_apply_friendlink]",'options' => $this->_tpl_vars['AskAction'],'checked' => ((is_array($_tmp=@$this->_tpl_vars['item']['CAPT_APPLY_FRIENDLINK'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)),'separator' => ""), $this);?>
</td> 
          	</tr> 
			<tr> 
                <th class="paddingT15"><?php echo $this->_tpl_vars['_comments_or_suggestions']; ?>
 <?php echo $this->_tpl_vars['_auth_key_n']; ?>
</th> 
       			<td class="paddingT15 wordSpacing5"><?php echo smarty_function_html_radios(array('name' => "data[setting][capt_service]",'options' => $this->_tpl_vars['AskAction'],'checked' => ((is_array($_tmp=@$this->_tpl_vars['item']['CAPT_SERVICE'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)),'separator' => ""), $this);?>
</td> 
          	</tr>
            <tr> 
            <th></th> 
            <td class="ptb20"> 
                <input class="formbtn" type="submit" name="saveauth" value="<?php echo $this->_tpl_vars['_submit']; ?>
" /> 
            </td> 
        </tr> 
        </table> 
    </form> 
</div> 
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>