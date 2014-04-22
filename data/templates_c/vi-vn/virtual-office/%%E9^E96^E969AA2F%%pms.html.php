<?php /* Smarty version 2.6.27, created on 2014-04-21 16:21:23
         compiled from pms.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'formhash', 'pms.html', 53, false),)), $this); ?>
<?php if ($_GET['type']): ?>
			<?php $this->assign('page_title', ($this->_tpl_vars['_sms_sent'])); ?>
		<?php else: ?>
			<?php $this->assign('page_title', ($this->_tpl_vars['_sms'])); ?>
		<?php endif; ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
<script>
	jQuery(document).ready(function($) {
		'; ?>
<?php if ($_GET['type']): ?><?php echo '
			$(\'.MenuItem16sent\').addClass(\'mActive\');
		'; ?>
<?php else: ?><?php echo '
			$(\'.MenuItem16\').addClass(\'mActive\');
		'; ?>
<?php endif; ?><?php echo '
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
     <div class="offer_info_title"><h2><?php echo $this->_tpl_vars['_sms_box']; ?>
</h2></div>


<table class="offer_count">
        <tr>
          <td class="orange"></td>
          <td></td>
        </tr>
         <tr>
          <td class="nntype">
	    
	    <a href="pms.php" <?php if (! $_GET['type']): ?>class="active"<?php endif; ?>><?php echo $this->_tpl_vars['_sms']; ?>
</a>
	    <a href="pms.php?type=sent" <?php if ($_GET['type']): ?>class="active"<?php endif; ?>><?php echo $this->_tpl_vars['_sms_sent']; ?>
</a>
	    
	    
	  </td>
          <td class="height35"><span class="btn_hint"><a href="pms.php?do=send" class="btn_publish"><?php echo $this->_tpl_vars['_send_message']; ?>
</a></span></td>
        </tr>
</table>     

<?php if ($this->_tpl_vars['message']): ?><div class="hint"><?php echo $this->_tpl_vars['message']; ?>
</div><?php endif; ?>
	  <form name="pmsfrm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
">
	  <?php echo smarty_function_formhash(array(), $this);?>

       <table class="bglist">
            <tr align="center">
              <th width="5%"><?php echo $this->_tpl_vars['_choose']; ?>
</th>
	      <th width="50%" style="text-align: left"><?php echo $this->_tpl_vars['_title']; ?>
</th>
              
		<?php if ($_GET['type']): ?>
			<th width="15%" style="text-align: left"><?php echo $this->_tpl_vars['_receiver']; ?>
</th>
		<?php else: ?>
			<th width="15%" style="text-align: left"><?php echo $this->_tpl_vars['_sender']; ?>
</th>
		<?php endif; ?>
	      
              <th width="10%" style="text-align: left"><?php echo $this->_tpl_vars['_category']; ?>
</th>

              <th><?php echo $this->_tpl_vars['_time']; ?>
</th>
            </tr>
			<?php $_from = $this->_tpl_vars['Items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
            <tr align="center" class="bggray <?php if ($this->_tpl_vars['item']['status'] == 0): ?>unread<?php endif; ?>" >
              <td><input type="checkbox" name="id[]" value="<?php echo $this->_tpl_vars['item']['id']; ?>
" id="item_<?php echo $this->_tpl_vars['item']['id']; ?>
"></td>
	      <td style="text-align: left<?php if ($this->_tpl_vars['item']['status'] == 0): ?>;font-weight: 700<?php endif; ?>" align="left"><a  style="color: #3B984C" href="pms.php?do=view&id=<?php echo $this->_tpl_vars['item']['id']; ?>
<?php if ($_GET['type']): ?>&type=sent<?php endif; ?>"><?php echo $this->_tpl_vars['item']['title']; ?>
</a></td>
              
	      
	      <?php if ($_GET['type']): ?>
			<td style="text-align: left"><?php echo $this->_tpl_vars['item']['cache_to_username']; ?>
</td>
		<?php else: ?>
			<td style="text-align: left"><?php echo $this->_tpl_vars['item']['cache_from_username']; ?>
</td>
		<?php endif; ?>
	      
	      <td style="text-align: left"><?php echo $this->_tpl_vars['item']['typename']; ?>
</td>
	      
		
	      
	      
	      
              
              
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