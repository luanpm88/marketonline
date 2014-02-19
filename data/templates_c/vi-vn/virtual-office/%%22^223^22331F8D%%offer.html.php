<?php /* Smarty version 2.6.27, created on 2014-02-12 15:07:29
         compiled from offer.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'formhash', 'offer.html', 46, false),array('modifier', 'pl', 'offer.html', 65, false),array('modifier', 'truncate', 'offer.html', 65, false),array('modifier', 'strip_tags', 'offer.html', 69, false),)), $this); ?>
<?php $this->assign('page_title', ($this->_tpl_vars['_business_information'])); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
<script>
	jQuery(document).ready(function($) {
		$(\'.MenuItem2\').addClass(\'mActive\');
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
     <div class="offer_info_title"><h2><?php echo $this->_tpl_vars['_business_information']; ?>
 (<?php echo $this->_tpl_vars['_raovat']; ?>
)</h2></div>
     
     <?php if ($this->_tpl_vars['notice']): ?><p class="notice" style="margin-bottom: 0px;"><?php echo $this->_tpl_vars['notice']; ?>
</p><?php endif; ?>
     
      <table class="offer_count">
        <tr>
          <td class="orange"></td>
          <td></td>
        </tr>
         <tr>
          <td class="nntype">
		
		<a href="offer.php" <?php if (! $this->_tpl_vars['TypeID']): ?>class="active"<?php endif; ?>>Tất cả</a>
	    
	    <a href="offer.php?typeid=16" <?php if ($this->_tpl_vars['TypeID'] == 16): ?>class="active"<?php endif; ?>><?php echo $this->_tpl_vars['_supply_corp']; ?>
</a>
	    <a href="offer.php?typeid=14" <?php if ($this->_tpl_vars['TypeID'] == 14): ?>class="active"<?php endif; ?>><?php echo $this->_tpl_vars['_buy_offer']; ?>
</a>
	    <a href="offer.php?typeid=9" <?php if ($this->_tpl_vars['TypeID'] == 9): ?>class="active"<?php endif; ?>><?php echo $this->_tpl_vars['_sell_offer']; ?>
</a>
	    <a href="offer.php?typeid=10" <?php if ($this->_tpl_vars['TypeID'] == 10): ?>class="active"<?php endif; ?>><?php echo $this->_tpl_vars['_supply_offer']; ?>
</a>
	    
	    
	  </td>
          <td class="height35"><a title="<?php echo $this->_tpl_vars['_release']; ?>
<?php echo $this->_tpl_vars['ActionName']; ?>
" href="offer.php?do=edit" class="btn_publish"><?php echo $this->_tpl_vars['_release_supply']; ?>
</a></td>
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
              <th width="9%"><?php echo $this->_tpl_vars['_sample_image']; ?>
</th>
              <th width="40%" style="text-align: left"><?php echo $this->_tpl_vars['_content']; ?>
</th>
              <th><?php echo $this->_tpl_vars['_due_date']; ?>
</th>
              <th width="7%"><?php echo $this->_tpl_vars['_published']; ?>
</th>
              <th width="17%"><?php echo $this->_tpl_vars['_operation']; ?>
</th>
              <th><?php echo $this->_tpl_vars['_choose']; ?>
</th>
            </tr>
			<?php $_from = $this->_tpl_vars['Items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
            <tr>
              <td><img class="iiimg" style="margin: 3px;" src="<?php echo $this->_tpl_vars['item']['image']; ?>
" width=75></td>
              <td style="text-align: left" valign="top">
		<strong>
			    <a title="<?php echo $this->_tpl_vars['item']['name']; ?>
" href="offer.php?do=edit&id=<?php echo $this->_tpl_vars['item']['id']; ?>
">
				<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('pl', true, $_tmp) : smarty_modifier_pl($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 100) : smarty_modifier_truncate($_tmp, 100)); ?>

			    </a>
			</strong>
			
			<p><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['content'])) ? $this->_run_mod_handler('pl', true, $_tmp) : smarty_modifier_pl($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 180) : smarty_modifier_truncate($_tmp, 180)); ?>
</p>
			<?php if ($this->_tpl_vars['item']['price']): ?><p style="color: #ec8a49"><?php echo $this->_tpl_vars['item']['price']; ?>
 VNĐ</p><?php endif; ?>
			
	      
	      
	      </td>
              <td><?php if ($this->_tpl_vars['item']['expire_time'] < $this->_tpl_vars['TimeStamp']): ?><?php echo $this->_tpl_vars['_has_expired']; ?>
<?php else: ?><?php echo $this->_tpl_vars['item']['expire_date']; ?>
<?php endif; ?></td>
              <td>
		
		    <?php if ($this->_tpl_vars['item']['status'] == 1): ?>
			<a href="<?php echo $_SERVER['PHP_SELF']; ?>
?do=state&type=down&id=<?php echo $this->_tpl_vars['item']['id']; ?>
" title="<?php echo $this->_tpl_vars['_web_down_shelves']; ?>
">
			    <img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/published.png">
			</a>
		    <?php else: ?>
			<a href="<?php echo $_SERVER['PHP_SELF']; ?>
?do=state&type=up&id=<?php echo $this->_tpl_vars['item']['id']; ?>
" title="<?php echo $this->_tpl_vars['_goods_on_shelves']; ?>
">
			    <img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/unpublished.png">
			</a>
		    <?php endif; ?>
	      
	      </td>
              <td><a href="offer.php?do=edit&id=<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['_modify']; ?>
</a><br />
	      <?php if ($this->_tpl_vars['item']['status'] == 1): ?><a href="offer.php?do=refresh&id=<?php echo $this->_tpl_vars['item']['id']; ?>
" title="<?php echo $this->_tpl_vars['_extension_time']; ?>
"><?php echo $this->_tpl_vars['_repeating']; ?>
</a> /<?php endif; ?> <a href="offer.php?do=moderate&id=<?php echo $this->_tpl_vars['item']['id']; ?>
"  onclick="return window.confirm('<?php echo $this->_tpl_vars['_you_should_pay_for_this']; ?>
');"><?php echo $this->_tpl_vars['_bump_to_top']; ?>
</a>
	      <br /><a href="<?php echo $this->_tpl_vars['item']['url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['_preview']; ?>
</a></td>
              <td><input name="tradeid[]" type="checkbox" id="id_<?php echo $this->_tpl_vars['item']['id']; ?>
" value="<?php echo $this->_tpl_vars['item']['id']; ?>
"></td>
            </tr>
			<?php endforeach; else: ?>
			<?php endif; unset($_from); ?>
          </table></td>
        </tr>
        <tr>
          <td>
          <table class="offer_publish_submit">
            <tr>
              <td>
				<div align="right">
                <input type="submit" name="del" value="<?php echo $this->_tpl_vars['_delete_message']; ?>
" onclick="return window.confirm('<?php echo $this->_tpl_vars['_ok_delete']; ?>
');">&nbsp;
				<input type="submit" name="refresh" value="<?php echo $this->_tpl_vars['_repeating_information']; ?>
" onclick="return window.confirm<?php echo $this->_tpl_vars['_ok_repeating_information']; ?>
">
				</div>
			  </td>
              </tr>
          </table>
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>
          <table class="room_pages">
              <tr>
                <td><?php echo $this->_tpl_vars['ByPages']; ?>
</td>
              </tr>
          </table>
          </td>
        </tr>
      </table>
      </form>
      <!--<table class="attentions" >     
          <tr>
            <td class="bottom"><?php echo $this->_tpl_vars['_offer_post_attention']; ?>
</td>
          </tr>
    </table>-->
    </div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>