<?php /* Smarty version 2.6.27, created on 2013-06-13 11:35:22
         compiled from product.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'product.html', 65, false),array('modifier', 'default', 'product.html', 69, false),array('modifier', 'strip_tags', 'product.html', 70, false),array('function', 'the_url', 'product.html', 85, false),)), $this); ?>
<?php $this->assign('page_title', ($this->_tpl_vars['_product_management'])); ?>
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
     <div class="offer_info_title"><h2><?php echo $this->_tpl_vars['_product_management']; ?>
</h2></div>
	 <div class="hint"><?php echo $this->_tpl_vars['_tips_buy_no_repeat']; ?>
"<a href="offer.php" class="orange"><?php echo $this->_tpl_vars['_modify']; ?>
<?php echo $this->_tpl_vars['_our_offer']; ?>
</a>"<?php echo $this->_tpl_vars['_repeat_function']; ?>
</div>
	 <div class="h30">
	    <!--<span class="btn_hint">
		<a href="product.php?do=import" class="btn_publish"><?php echo $this->_tpl_vars['_data_import']; ?>
 <?php echo $this->_tpl_vars['_product']; ?>
</a>
	    </span>
	    <span class="btn_hint"><a href="price.php?do=edit" class="btn_publish"><?php echo $this->_tpl_vars['_price_allow']; ?>
</a>
	    </span>-->
	    <span class="btn_hint"><a href="product.php?do=edit" class="btn_publish"><?php echo $this->_tpl_vars['_release_products']; ?>
</a>
	    </span>
	 </div>
		  <form name="typefrm" id="TypeFrm" method="get" action="">
		   <table class="product_sort">
            <tr>
              <td><?php echo $this->_tpl_vars['_according']; ?>

                  <select name="typeid" onchange="$('#TypeFrm').submit();">
                    <option value="0"><?php echo $this->_tpl_vars['_all_categories']; ?>
</option>
				  <?php $_from = $this->_tpl_vars['ProductTypes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['producttypes'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['producttypes']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['pt']):
        $this->_foreach['producttypes']['iteration']++;
?>
				  <option value="<?php echo $this->_tpl_vars['pt']['id']; ?>
" <?php if ($this->_tpl_vars['pt']['id'] == $_GET['typeid']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['pt']['name']; ?>
</option>
					<?php endforeach; endif; unset($_from); ?>
                  </select>
&nbsp;&nbsp;</td>
             <td class="prev_page"><a href="<?php echo $this->_tpl_vars['plink']; ?>
" title="<?php echo $this->_tpl_vars['_prev_page']; ?>
"><?php echo $this->_tpl_vars['_prev_page']; ?>
</a>&nbsp;&nbsp;&nbsp;<a href="<?php echo $this->_tpl_vars['nlink']; ?>
" title="<?php echo $this->_tpl_vars['_next_page']; ?>
"><?php echo $this->_tpl_vars['_next_page']; ?>
</a></td>
            </tr>
          </table>
		  </form>
	     <table class="pagedown">
	  <tr>
		<td>
		  <div id="msg" align="center"><?php echo $this->_tpl_vars['Msg']; ?>
</div></td>
	  </tr>
	  </table>
         <table class="bglist">
              <!-- product -->
                    <col width="75">
                    <col width="260">
                    <col width="80">
                    <col width="120">
                    <col width="120">
                <tr>
                   <th width="9%"><?php echo $this->_tpl_vars['_sample_image']; ?>
</th>
                   <th><?php echo $this->_tpl_vars['_content']; ?>
</th>
                   <th><?php echo $this->_tpl_vars['_published']; ?>
</th>
                   <th style="text-align: left"><?php echo $this->_tpl_vars['_release']; ?>
</th>
                   <th width="15%" style="text-align: left"><?php echo $this->_tpl_vars['_operation']; ?>
</th>
                </tr> 
              <?php $_from = $this->_tpl_vars['Items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
                <tr>
                <td><img style="margin: 3px;" src="<?php echo $this->_tpl_vars['item']['image']; ?>
" width=75></td>
                <td style='word-break: break-all'>
                    <div style="text-align:left;">
			<strong>
			    <a href="product.php?do=edit&id=<?php echo $this->_tpl_vars['item']['id']; ?>
">
				<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 70) : smarty_modifier_truncate($_tmp, 70)); ?>

			    </a>
			</strong>
			<br />
			[<?php echo $this->_tpl_vars['CheckStatus'][$this->_tpl_vars['item']['status']]; ?>
]<!--[<?php echo ((is_array($_tmp=@$this->_tpl_vars['ProductSorts'][$this->_tpl_vars['item']['sort_id']])) ? $this->_run_mod_handler('default', true, $_tmp, ($this->_tpl_vars['_ordinary_goods'])) : smarty_modifier_default($_tmp, ($this->_tpl_vars['_ordinary_goods']))); ?>
]-->
			<br /><?php echo $this->_tpl_vars['_description']; ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['content'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 100) : smarty_modifier_truncate($_tmp, 100)); ?>

		    </div>
                </td>
                <td>
		    <?php if ($this->_tpl_vars['item']['state'] == 1): ?>
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
                <td style="text-align: left"><a href="offer.php?do=pro2offer&productid=<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['_as_release_supply']; ?>
</a><br /><a href="price.php?do=edit&productid=<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['_prices']; ?>
</a></td>
                <td style="text-align: left"><a href="product.php?do=edit&id=<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['_modify']; ?>
</a><br /><a href="<?php echo smarty_function_the_url(array('id' => ($this->_tpl_vars['item']['id']),'module' => 'product'), $this);?>
" target="_blank" title="<?php echo $this->_tpl_vars['_click_preview']; ?>
"><?php echo $this->_tpl_vars['_click_preview']; ?>
</a><br /><a onclick="return confirm('<?php echo $this->_tpl_vars['_delete_confirm']; ?>
')" href="<?php echo $_SERVER['PHP_SELF']; ?>
?act=del&id=<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['_delete']; ?>
</a></td>
                </tr> 
              <?php endforeach; endif; unset($_from); ?>
        </table> 
         <!-- :~product  -->
        <table class="room_pages">
        <tr>
          <td><?php echo $this->_tpl_vars['pagenav']; ?>
&nbsp;</td>
        </tr>
       </table>
       <table class="trade_line">
            <tr>
          <td height="1" background="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/index_trade_line.gif"></td>
        </tr>
        <tr>
          <td align="center"></td>
        </tr>
      </table>
    
</div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>