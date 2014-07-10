<?php /* Smarty version 2.6.27, created on 2014-07-07 14:06:28
         compiled from producttype.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'formhash', 'producttype.html', 25, false),)), $this); ?>
<?php $this->assign('page_title', ($this->_tpl_vars['_product_sort'])); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
<script>
	jQuery(document).ready(function($) {
		$(\'.MenuItem24\').addClass(\'mActive\');
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
      <div class="hint"><?php echo $this->_tpl_vars['_friendly_tip']; ?>
</span><?php echo $this->_tpl_vars['_adjustment_sequence']; ?>
</div>

		  <form name="prodtypefrm" action="producttype.php" method="post">
		  <?php echo smarty_function_formhash(array(), $this);?>

		   <table class="product_type bglist">
            <tr>
              <th colspan="4"><strong><?php echo $this->_tpl_vars['_series_sort_product']; ?>
</strong></th>
            </tr>
			 <?php $_from = $this->_tpl_vars['Items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['producttype'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['producttype']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['producttype']['iteration']++;
?>
            <tr>
              <td width="86%" align="center" style="padding-left:<?php echo $this->_tpl_vars['item']['padding']; ?>
px; text-align: left"><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/on<?php if (! $this->_tpl_vars['item']['member_id']): ?>_off<?php endif; ?>.gif"> <?php echo $this->_tpl_vars['item']['name']; ?>
</td>
              <td align="center"><?php if ($this->_tpl_vars['item']['member_id']): ?><a href="producttype.php?do=edit&id=<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['_modify']; ?>
</a><?php endif; ?></td>
              <td align="center"><?php if ($this->_tpl_vars['item']['member_id']): ?><a href="producttype.php?do=del&id=<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['_delete']; ?>
</a><?php endif; ?></td>
            </tr>
			<?php endforeach; endif; unset($_from); ?>
          </table>
		  </form>
		 
		<form style="display:none" name="edit_frm" method="post" action="producttype.php" autocomplete="off">
		<?php echo smarty_function_formhash(array(), $this);?>

        <table>
        <tr>
          <td colspan="2">&nbsp;<?php echo $this->_tpl_vars['_product_sort_name']; ?>

            <input name="data[name]" type="Text" value="">
            <input type="Submit" name="save" value="&nbsp;<?php echo $this->_tpl_vars['_add']; ?>
&nbsp;"></td>
        </tr>
        </table>
		</form>
        <table>
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td height="1" colspan="2" background="<?php echo $this->_tpl_vars['office_theme_path']; ?>
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