<?php /* Smarty version 2.6.27, created on 2013-06-18 10:27:03
         compiled from links.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'formhash', 'links.html', 15, false),)), $this); ?>
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
     <div class="offer_info_title"><h2><?php echo $this->_tpl_vars['page_title']; ?>
</h2></div>
<div class="hint"><span class="btn_hint"><a href="pms.php?do=send" class="btn_publish"><?php echo $this->_tpl_vars['_send_message']; ?>
</a></span><?php echo $this->_tpl_vars['_sms_tips']; ?>
</div>
	  <form name="pmsfrm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
">
	  <?php echo smarty_function_formhash(array(), $this);?>

       <table class="news">
            <tr align="center">
              <th><?php echo $this->_tpl_vars['_choose']; ?>
</th>
              <th><?php echo $this->_tpl_vars['_username']; ?>
</th>
              <th><?php echo $this->_tpl_vars['_status']; ?>
</th>
	      <th><?php echo $this->_tpl_vars['_checkout']; ?>
</th>
              <th><?php echo $this->_tpl_vars['_created_link']; ?>
</th>
            </tr>
			<?php $_from = $this->_tpl_vars['Items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
            <tr align="center" class="bggray">
              <td><input type="checkbox" name="id[]" value="<?php echo $this->_tpl_vars['item']['id']; ?>
" id="item_<?php echo $this->_tpl_vars['item']['id']; ?>
"></td>
              <td><?php echo $this->_tpl_vars['item']['username']; ?>
</td>
              <td><?php if ($this->_tpl_vars['item']['company_status'] == 1): ?><img src="../templates/office/images/published.png"><?php else: ?><img src="../templates/office/images/unpublished.png"><?php endif; ?></td>
	      <td><img src="../templates/office/images/unpublished.png"></td>
              <td><?php echo $this->_tpl_vars['item']['senddate']; ?>
</td>
            </tr>
			<?php endforeach; endif; unset($_from); ?>
            <tr align="center" class="bggray">
              <td colspan="5"><?php echo $this->_tpl_vars['ByPages']; ?>
</td>
            </tr>
        </table>  
       <table class="trade_line">
			<tr align="center" valign="bottom">
				<td height="40"><input  name="del" type="submit" id="del" value=" <?php echo $this->_tpl_vars['_delete_select']; ?>
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