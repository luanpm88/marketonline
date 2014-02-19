<?php /* Smarty version 2.6.27, created on 2013-06-01 06:19:21
         compiled from offer.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'formhash', 'offer.html', 24, false),array('function', 'the_url', 'offer.html', 43, false),array('modifier', 'pl', 'offer.html', 40, false),)), $this); ?>
<?php $this->assign('page_title', ($this->_tpl_vars['_offer'])); ?>
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
      <table class="offer_count">
        <tr>
          <td class="orange"></td>
          <td></td>
        </tr>
         <tr>
          <td><strong><?php echo $this->_tpl_vars['_success_release']; ?>
<span class="font14b_org"> <?php echo $this->_tpl_vars['Amount']; ?>
</span> <?php echo $this->_tpl_vars['_number']; ?>
<?php echo $this->_tpl_vars['ActionName']; ?>
<?php echo $this->_tpl_vars['_information_g']; ?>
</strong></td>
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
              <th><?php echo $this->_tpl_vars['_type']; ?>
</th>
              <th><?php echo $this->_tpl_vars['_theme']; ?>
</th>
              <th><?php echo $this->_tpl_vars['_due_date']; ?>
</th>
              <th><?php echo $this->_tpl_vars['_state']; ?>
</th>
              <th><?php echo $this->_tpl_vars['_operation']; ?>
</th>
              <th><?php echo $this->_tpl_vars['_choose']; ?>
</th>
            </tr>
			<?php $_from = $this->_tpl_vars['Items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
            <tr>
              <td>[<a href="offer.php?typeid=<?php echo $this->_tpl_vars['item']['type_id']; ?>
"><?php echo $this->_tpl_vars['TradeTypes'][$this->_tpl_vars['item']['type_id']]; ?>
</a>]</td>
              <td><div style="text-align:left; font-weight:bold;"><a href="offer.php?do=edit&id=<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('pl', true, $_tmp) : smarty_modifier_pl($_tmp)); ?>
</a><?php if ($this->_tpl_vars['item']['picture'] != ""): ?>&nbsp;<?php echo $this->_tpl_vars['_picture']; ?>
<?php endif; ?></div></td>
              <td><?php if ($this->_tpl_vars['item']['expire_time'] < $this->_tpl_vars['TimeStamp']): ?><?php echo $this->_tpl_vars['_has_expired']; ?>
<?php else: ?><?php echo $this->_tpl_vars['item']['expire_date']; ?>
<?php endif; ?></td>
              <td><?php echo $this->_tpl_vars['CheckStatus'][$this->_tpl_vars['item']['status']]; ?>
</td>
              <td><a href="offer.php?do=edit&id=<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['_modify']; ?>
</a>&nbsp;&nbsp;<?php if ($this->_tpl_vars['item']['status'] == 1): ?><a href="offer.php?do=refresh&id=<?php echo $this->_tpl_vars['item']['id']; ?>
" title="<?php echo $this->_tpl_vars['_extension_time']; ?>
"><?php echo $this->_tpl_vars['_repeating']; ?>
</a>&nbsp;&nbsp;<a href="offer.php?do=update&id=<?php echo $this->_tpl_vars['item']['id']; ?>
" title="<?php echo $this->_tpl_vars['_update_site']; ?>
"><?php echo $this->_tpl_vars['_update']; ?>
</a><?php endif; ?>&nbsp;&nbsp;<a href="offer.php?do=moderate&id=<?php echo $this->_tpl_vars['item']['id']; ?>
"  onclick="return window.confirm('<?php echo $this->_tpl_vars['_you_should_pay_for_this']; ?>
');"><?php echo $this->_tpl_vars['_bump_to_top']; ?>
</a>&nbsp;&nbsp;<a href="<?php echo smarty_function_the_url(array('module' => 'offer','id' => $this->_tpl_vars['item']['id']), $this);?>
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