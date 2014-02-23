<?php /* Smarty version 2.6.27, created on 2013-06-03 06:50:13
         compiled from footer.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'mailto', 'footer.html', 7, false),array('modifier', 'pl', 'footer.html', 9, false),)), $this); ?>
<div class="h30"></div>
</div>
</div>
<div id="footer_bkg">
   <div id="base_page_footer">
  <div class="footer_content">
   <p><?php echo $this->_tpl_vars['_G']['site_name']; ?>
 - <?php echo $this->_tpl_vars['_have_problem_send_email']; ?>
<?php echo smarty_function_mailto(array('text' => ($this->_tpl_vars['service_email']),'address' => ($this->_tpl_vars['service_email']),'encode' => 'javascript'), $this);?>
 <?php echo $this->_tpl_vars['_or']; ?>
 <a href="<?php echo $this->_tpl_vars['SiteUrl']; ?>
help/" target="_blank"><?php echo $this->_tpl_vars['_view_help']; ?>
</a></p> 
   <p><?php echo $this->_tpl_vars['_customer_hotline']; ?>
<?php echo $this->_tpl_vars['service_tel']; ?>
 <?php echo $this->_tpl_vars['_sales_hotline']; ?>
<?php echo $this->_tpl_vars['sale_tel']; ?>
</p>
   <?php if ($this->_tpl_vars['company_name']): ?><p>Copyright &copy; <?php echo $this->_tpl_vars['_G']['site_name']; ?>
. All rights reserved. <?php echo ((is_array($_tmp=$this->_tpl_vars['_G']['company_name'])) ? $this->_run_mod_handler('pl', true, $_tmp) : smarty_modifier_pl($_tmp)); ?>
 <?php echo $this->_tpl_vars['_copyright']; ?>
</p><?php endif; ?>
</div>
</div>
</div>
</body>
</html>