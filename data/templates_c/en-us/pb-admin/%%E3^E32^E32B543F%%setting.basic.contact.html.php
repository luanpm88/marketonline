<?php /* Smarty version 2.6.27, created on 2013-05-02 06:41:06
         compiled from setting.basic.contact.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'setting.basic.contact.html', 18, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="currentPosition">
	<p><?php echo $this->_tpl_vars['_your_current_position']; ?>
 <?php echo $this->_tpl_vars['_setting_global']; ?>
 &raquo; <?php echo $this->_tpl_vars['_site_info']; ?>
</p>
</div>
<div id="rightTop">
	<h3><?php echo $this->_tpl_vars['_site_info']; ?>
</h3>
	<ul class="subnav">
		<li><a href="setting.php?do=basic"><?php echo $this->_tpl_vars['_basic_setting']; ?>
</a></li>
		<li><a class="btn1" href="setting.php?do=basic_contact"><span><?php echo $this->_tpl_vars['_contact_method']; ?>
</span></a></li>
		<li><a href="setting.php?do=basic_desc"><?php echo $this->_tpl_vars['_site_desc']; ?>
</a></li>
	</ul>
</div>
<div class="info">
  <form method="post">
    <table class="infoTable">
      <tr>
        <th class="paddingT15"><label for="price_format"> <?php echo $this->_tpl_vars['_company_name']; ?>
<?php echo $this->_tpl_vars['_colon']; ?>
</label></th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput" name="data[setting][company_name]" type="text" id="company_name" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['item']['COMPANY_NAME'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['companyname']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['companyname'])); ?>
" />
          <span class="gray"><?php echo $this->_tpl_vars['_company_name_copyright_information']; ?>
</span>
		</td>
      </tr>
      <tr>
        <th class="paddingT15"><label for="price_format"> <?php echo $this->_tpl_vars['_website']; ?>
 <?php echo $this->_tpl_vars['_service_hotline']; ?>
<?php echo $this->_tpl_vars['_colon']; ?>
</label></th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput" name="data[setting][service_tel]" type="text" id="service_tel" size="30" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['item']['SERVICE_TEL'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['service_tel']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['service_tel'])); ?>
"  />
		</td>
      </tr>
      <tr>
        <th class="paddingT15"><label for="price_format"> <?php echo $this->_tpl_vars['_website']; ?>
 <?php echo $this->_tpl_vars['_sales_hotline']; ?>
<?php echo $this->_tpl_vars['_colon']; ?>
</label></th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput" name="data[setting][sale_tel]" type="text" id="sale_tel" size="30" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['item']['SALE_TEL'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['sale_tel']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['sale_tel'])); ?>
" />
		</td>
      </tr>
      <tr>
        <th class="paddingT15"><label for="price_format"> <?php echo $this->_tpl_vars['_website']; ?>
 <?php echo $this->_tpl_vars['_service_qq']; ?>
</label></th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput" name="data[setting][service_qq]" type="text" id="data[setting][sale_tel]" size="30" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['item']['SERVICE_QQ'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['service_qq']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['service_qq'])); ?>
" />
		</td>
      </tr>
      <tr>
        <th class="paddingT15"><label for="price_format"> <?php echo $this->_tpl_vars['_website']; ?>
 <?php echo $this->_tpl_vars['_service_msn']; ?>
</label></th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput" name="data[setting][service_msn]" type="text" id="data[setting][sale_tel]2" size="30" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['item']['SERVICE_MSN'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['service_msn']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['service_msn'])); ?>
" />
		</td>
      </tr>
      <tr>
        <th class="paddingT15"><label for="price_format"> <?php echo $this->_tpl_vars['_website']; ?>
 <?php echo $this->_tpl_vars['_service_email']; ?>
</label></th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput" name="data[setting][service_email]" type="text" id="service_email" size="30" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['item']['SERVICE_EMAIL'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['service_email']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['service_email'])); ?>
" />
		</td>
      </tr>
      <tr>
        <th></th>
        <td class="ptb20"><input class="formbtn" type="submit" name="savebasic" value="<?php echo $this->_tpl_vars['_submit']; ?>
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