<?php /* Smarty version 2.6.27, created on 2014-04-25 14:54:40
         compiled from default%5Cproduct/cart.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'default\\product/cart.html', 62, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/header.html", 'smarty_include_vars' => array('page_title' => "Giỏ hàng ".($this->_tpl_vars['page_title']),'nav_id' => ($this->_tpl_vars['nav_id']))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<div id="body-wrapper" >
<div id="body-wrapper-padding">
<!--[if lt IE 7]>
<div class="alert">Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different
    browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to
    experience this site.
</div><![endif]-->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/topmenu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<div class="row">
    <div class="fifteen columns" id="page-title">
        <a class="back" href="javascript:history.back()"></a>
        <div class="subtitle">
            
                        <p></p>
        </div>
        <h1 class="page-title">
                        <?php echo $this->_tpl_vars['_cart']; ?>
                    </h1>

        <div class="breadcrumbs"><a href="<?php echo $this->_tpl_vars['SiteUrl']; ?>
"><?php echo $this->_tpl_vars['_home_page']; ?>
</a> <span class="delim">/</span><a href="index.php?do=product"><?php echo $this->_tpl_vars['_product_center']; ?>
</a><span class="delim">/</span><?php echo $this->_tpl_vars['_cart']; ?>
 </div>

    </div>
    
    
    
    
    
    
    <div class="cart_content" style="clear: both;">
	
    
    <div class="detailtopcon clearfix">
		<h3><?php echo $this->_tpl_vars['_cart_items']; ?>
</h3>
		
		<?php if ($this->_tpl_vars['count']): ?>
		
		<div class="qiugouleftcon carttable">
			<form name="offer_list_frm" id="cart">
				<input type='hidden' name="do" value="product" />
				<input type='hidden' name="action" value="add_cart" />
				<input type='hidden' id="task" name="task" value="update" />
				<input type='hidden' id="cartitemid" name="cartitemid" value="" />
				<table cellspacing=1>
					<tr>
						<th><?php echo $this->_tpl_vars['_picture']; ?>
</th>
						<th width="35%" style="text-align: left"><?php echo $this->_tpl_vars['_products']; ?>
</th>
						
						<th style="text-align: right" width="157px"><?php echo $this->_tpl_vars['_quantity']; ?>
 <span id="update_quantity_but"></span></th>
						<th style="text-align: right"><?php echo $this->_tpl_vars['_unit_price']; ?>
 (VNĐ)</th>
						<th style="text-align: right"><?php echo $this->_tpl_vars['_sum_price']; ?>
 (VNĐ)</th>
						<th style="text-align: right" width="10%" style="text-align: left" width="15%"><?php echo $this->_tpl_vars['_action']; ?>
</th>	
						
					</tr>
					<?php $_from = $this->_tpl_vars['StickyItems']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['sticky_offer'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['sticky_offer']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['shop']):
        $this->_foreach['sticky_offer']['iteration']++;
?>
						<tr>
							<td colspan=6 style="background: #efefef">
								<a href="<?php echo smarty_function_the_url(array('module' => 'space','userid' => ($this->_tpl_vars['shop']['space_name'])), $this);?>
"><?php echo $this->_tpl_vars['shop']['shop_name']; ?>
</a>
							</td>
						</tr>
													
							<?php $_from = $this->_tpl_vars['shop']['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['sticky_offer'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['sticky_offer']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['sticky']):
        $this->_foreach['sticky_offer']['iteration']++;
?>
							<tr>
							<td class="offer_img" width="9%"><a href="<?php echo smarty_function_the_url(array('module' => 'product','id' => ($this->_tpl_vars['sticky']['p_id'])), $this);?>
" title="<?php echo $this->_tpl_vars['sticky']['p_name']; ?>
"><img src="<?php echo $this->_tpl_vars['sticky']['image']; ?>
" border=0 alt="<?php echo $this->_tpl_vars['sticky']['title']; ?>
"></a></td>
							<td style="padding-top: 20px" class="title_link">
								<a href="<?php echo smarty_function_the_url(array('module' => 'product','id' => ($this->_tpl_vars['sticky']['p_id'])), $this);?>
" title="<?php echo $this->_tpl_vars['sticky']['p_name']; ?>
"><?php echo $this->_tpl_vars['sticky']['p_name']; ?>
</a>
							</td>
							
							<td style="padding-top: 20px" align="right">
							    <select class="quantity_sel" onchange="$(this).parent().find('.quantity_val').val($(this).val())">
								<option value="1" selected="selected">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
							    </select>
							    <input class="quantity_val" style="height:22px;margin: 0 auto; width: 48px; text-align: right" type="text" name="product[<?php echo $this->_tpl_vars['sticky']['id']; ?>
]" value="<?php echo $this->_tpl_vars['sticky']['quantity']; ?>
" />
							    <input class="quantity_but" type="submit" value="<?php echo $this->_tpl_vars['_update']; ?>
" />
							</td>
							<td align=right style="text-align: right;padding-top: 20px"><?php echo $this->_tpl_vars['sticky']['p_price']; ?>
</td>
							<td align=right style="text-align: right;padding-top: 20px"><?php echo $this->_tpl_vars['sticky']['p_total']; ?>
</td>
							<td align="right"  style="text-align: right;padding-top: 20px">
							    
							    <input class="cart_remove" onclick="$('#cartitemid').val('<?php echo $this->_tpl_vars['sticky']['id']; ?>
');$('#task').val('remove');$('#cart').submit()" type="button" value="<?php echo $this->_tpl_vars['_remove']; ?>
" />
							</td>
							</tr>
							<?php endforeach; endif; unset($_from); ?>
							<tr>
							    <td colspan=4 align=right style="text-align: right;">
								Tổng cộng
								<span class="hide_border">.</span>
							    </td>
							    <td align=right style="text-align: right;">
								<?php echo $this->_tpl_vars['shop']['total']; ?>

								<span class="hide_border">.</span>
							    </td>
							    <td>
								VNĐ
							    </td>
							</tr>
							<tr>
								<td colspan=6 align=right style="text-align: right;">
									<?php if ($this->_tpl_vars['pb_username']): ?>										
										<input name="checkout" class="checkout_but" onclick="window.location='index.php?do=product&action=meminfo&id=<?php echo $this->_tpl_vars['shop']['id']; ?>
'"  type="button" value="<?php echo $this->_tpl_vars['_confirm_cart']; ?>
" />
									<?php endif; ?>
									<?php if (! $this->_tpl_vars['pb_username']): ?>										
										<input name="checkout" class="checkout_but" onclick="window.location='cartlogging.php?id=<?php echo $this->_tpl_vars['shop']['id']; ?>
'"  type="button" value="<?php echo $this->_tpl_vars['_confirm_cart']; ?>
" />
									<?php endif; ?>
									<input type="submit" class="checkout_but" style="margin-right: 10px" value="Cập nhật" />
								</td>
								
							</tr>
						
					<?php endforeach; endif; unset($_from); ?>
				</table>
			</form>
		</div>
		
		<?php else: ?>
		
			<p>Hiện chưa có sản phẩm nào!</p>
			
			<p class="back button"><a href="javascript:history.go(-1);"><?php echo $this->_tpl_vars['_go_back']; ?>
</a></p>
			<!--<p class="close button"><a href="javascript:;" onclick="window.opener=null;window.close();"><?php echo $this->_tpl_vars['_close_window']; ?>
</a></p>-->
			
		<?php endif; ?>
		
		
	</div>	
    <div class="blank6"></div>
	
</div>
    
    
    
    
    
    
    
    
</div>






</div>
  </div>




	
	
	
	
	
	
	
<script>
$("#SearchFrm").attr("action","<?php echo smarty_function_the_url(array('module' => 'search'), $this);?>
");
$("#hdModule").val("product");
$("#topMenuProduct").addClass("lcur");
</script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>