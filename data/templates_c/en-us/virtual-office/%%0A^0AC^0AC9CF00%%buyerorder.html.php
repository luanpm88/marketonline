<?php /* Smarty version 2.6.27, created on 2013-05-27 08:46:06
         compiled from buyerorder.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'formhash', 'buyerorder.html', 15, false),)), $this); ?>
<?php $this->assign('page_title', ($this->_tpl_vars['_sms'])); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
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
     <div class="offer_info_title"><h2><?php echo $this->_tpl_vars['_order_list']; ?>
</h2></div>

	  <form name="pmsfrm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
">
	  <?php echo smarty_function_formhash(array(), $this);?>

       <table class="news">
            <tr align="left">
              
              
	      <th width="30%"><?php echo $this->_tpl_vars['_seller']; ?>
</th>
	      <th width="50%"><?php echo $this->_tpl_vars['_message']; ?>
</th>
	      <th width="20%"><?php echo $this->_tpl_vars['_time']; ?>
</th>              
	      

              
            </tr>
			<?php $_from = $this->_tpl_vars['Items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
            <tr class="bggray">
              

	      <td width=10%><?php echo $this->_tpl_vars['item']['space_name']; ?>
</td>
	      <td align="left"><?php echo $this->_tpl_vars['item']['message']; ?>
</td>
	      <td width=40%><a href="buyerorder.php?do=view&id=<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['item']['created']; ?>
 >></a></td>
              
              
	      
              
            </tr>
			<?php endforeach; endif; unset($_from); ?>
            <tr align="center" class="bggray">
              <td colspan="5"><?php echo $this->_tpl_vars['ByPages']; ?>
</td>
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