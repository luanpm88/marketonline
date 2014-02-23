<?php /* Smarty version 2.6.27, created on 2013-05-02 06:41:10
         compiled from setting.register.file.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'setting.register.file.html', 23, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="currentPosition">
	<p><?php echo $this->_tpl_vars['_your_current_position']; ?>
 <?php echo $this->_tpl_vars['_setting_global']; ?>
 &raquo; <?php echo $this->_tpl_vars['_reg_and_visit']; ?>
</p>
</div>
<div id="rightTop"> 
    <h3><?php echo $this->_tpl_vars['_reg_and_visit']; ?>
</h3> 
    <ul class="subnav">
		<li><a href="setting.php?do=register"><?php echo $this->_tpl_vars['_register']; ?>
</a></li>
        <li><a href="setting.php?do=registerfile" class="btn1"><span><?php echo $this->_tpl_vars['_default_setting']; ?>
</span></a></li>
    </ul>
</div>
<div class="info"> 
    <form method="post" name="edit_frm" action="setting.php"> 
    <input type="hidden" name="data[reg_filename]" value="<?php echo $this->_tpl_vars['item']['REG_FILENAME']; ?>
" />
    <input type="hidden" name="data[post_filename]" value="<?php echo $this->_tpl_vars['item']['POST_FILENAME']; ?>
" />
        <table class="infoTable"> 
		    <tr>
				<th class="paddingT15"> <?php echo $this->_tpl_vars['_direct_access_to_url']; ?>
</th>
				<td class="paddingT15 wordSpacing5"><input name="data[setting][redirect_url]" type="text" id="RedirectUrl" value="<?php echo $this->_tpl_vars['item']['REDIRECT_URL']; ?>
" class="infoTableInput" /><span class="gray"><p><?php echo $this->_tpl_vars['_direct_access_to_url_descriptiondd']; ?>
</p></span></td>
			</tr>
         	<tr> 
                <th class="paddingT15"><?php echo $this->_tpl_vars['_enterprise_space_named']; ?>
</th> 
              	<td class="paddingT15 wordSpacing5"><input type="text" name="data[setting][space_name]" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['item']['SPACE_NAME'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['_space_name']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['_space_name'])); ?>
" class="infoTableInput" /></td> 
          	</tr> 
            <tr> 
            <th></th> 
            <td class="ptb20"> 
                <input class="formbtn" type="submit" name="saveregisterfile" value="<?php echo $this->_tpl_vars['_submit']; ?>
" /> 
                <input class="formbtn" type="reset" name="reset" value="<?php echo $this->_tpl_vars['_reset']; ?>
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