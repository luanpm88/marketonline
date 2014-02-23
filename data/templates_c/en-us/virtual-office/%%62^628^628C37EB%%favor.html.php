<?php /* Smarty version 2.6.27, created on 2013-06-03 01:10:08
         compiled from favor.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'formhash', 'favor.html', 19, false),array('function', 'the_url', 'favor.html', 33, false),)), $this); ?>
<?php $this->assign('page_title', ($this->_tpl_vars['_favorites'])); ?>
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
      <table class="bggray">
        <tr>
          <td class="orange"><?php echo $this->_tpl_vars['_favorites_tips']; ?>
</td>
        </tr>
      </table>      
      <form name="listfrm" action="<?php echo $_SERVER['PHP_SELF']; ?>
" method="post">
	  <?php echo smarty_function_formhash(array(), $this);?>

      <table class="offer_publish_list">
        <tr>
          <td>
          <table class="bglist">
            <tr>
            <th><?php echo $this->_tpl_vars['_type']; ?>
</th>
            <th><?php echo $this->_tpl_vars['_title']; ?>
</th>
            <th><?php echo $this->_tpl_vars['_collection_time']; ?>
</th>
            <th><?php echo $this->_tpl_vars['_selected']; ?>
</th>
            </tr>
			<?php $_from = $this->_tpl_vars['Items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
            <tr>
              <td class="orange"><?php echo $this->_tpl_vars['TradeTypes'][$this->_tpl_vars['item']['type_id']]; ?>
</td>
              <td><a href="<?php echo smarty_function_the_url(array('module' => 'offer','id' => $this->_tpl_vars['item']['offerid']), $this);?>
" target="_blank" style="text-decoration:  underline;"><?php echo $this->_tpl_vars['item']['title']; ?>
</a>&nbsp;</td>
              <td><?php echo $this->_tpl_vars['item']['pubdate']; ?>
&nbsp;</td>
              <td><input name="id[]" type="checkbox" id="id_<?php echo $this->_tpl_vars['item']['id']; ?>
" value="<?php echo $this->_tpl_vars['item']['id']; ?>
"></td>
            </tr>
			<?php endforeach; endif; unset($_from); ?>
          </table>
          </td>
        </tr>
		<?php if ($this->_tpl_vars['Items']): ?>
        <tr>
          <td><div align="right" style="padding:5px 0 ;">
                <input type="submit" name="del" value="<?php echo $this->_tpl_vars['_delete_message']; ?>
" onClick="return window.confirm<?php echo $this->_tpl_vars['_ok_delete']; ?>
">
              </div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="1" background="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/index_trade_line.gif"></td>
        </tr>
		<?php else: ?>
        <tr align="center">
          <td><B><?php echo $this->_tpl_vars['_no_collection_message']; ?>
</B>&nbsp;</td>
        </tr>
		<?php endif; ?>
        <tr>
          <td><table class="room_pages">
              <tr>
                <td><?php echo $this->_tpl_vars['ByPages']; ?>
</td>
              </tr>
          </table></td>
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