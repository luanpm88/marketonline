<?php /* Smarty version 2.6.27, created on 2014-07-09 13:41:19
         compiled from stat.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'stat.html', 32, false),)), $this); ?>
<?php $this->assign('page_title', ($this->_tpl_vars['_statistics'])); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
<script>
	jQuery(document).ready(function($) {
		$(\'.MenuItem3\').addClass(\'mActive\');
	});
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
      <table class="bggray">
          <tr>
            <td align="center"><span class="font14b_org"><?php echo $this->_tpl_vars['_information_statistics']; ?>
</span> </td>
          </tr>
      </table>
        <table class="offer_info_count">

                  <?php $_from = $this->_tpl_vars['UserTradeStat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ut']):
?>
		  <?php if ($this->_tpl_vars['ut']['name']): ?>
                    <tr>
                      <td height="35" class="font14"><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/stat.gif" width="13" height="13" border="0"> <strong><?php echo $this->_tpl_vars['ut']['name']; ?>
<?php echo $this->_tpl_vars['_colon']; ?>
</strong> <span class="orange"><strong><?php echo ((is_array($_tmp=@$this->_tpl_vars['ut']['Amount'])) ? $this->_run_mod_handler('default', true, $_tmp, '0') : smarty_modifier_default($_tmp, '0')); ?>
</strong></span> <?php echo $this->_tpl_vars['_number']; ?>
</td>
                    </tr>
		    <?php endif; ?>
                    <?php endforeach; endif; unset($_from); ?>
					<?php if ($this->_tpl_vars['pb_userlevel'] > 1): ?>
                    <tr>
                      <td height="35" class="font14"><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/stat.gif" width="13" height="13" border="0"> <strong><?php echo $this->_tpl_vars['_products_n']; ?>
</strong>  <span class="orange"><strong><?php echo $this->_tpl_vars['ProductAmount']; ?>
</strong></span><?php echo $this->_tpl_vars['_account_product']; ?>
</td>
                    </tr>
					<?php endif; ?>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="1" background="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/index_trade_line.gif"></td>
                    </tr>
       </table>

        
</div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>