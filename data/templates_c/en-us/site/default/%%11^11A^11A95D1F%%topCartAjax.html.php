<?php /* Smarty version 2.6.27, created on 2013-05-31 06:43:12
         compiled from default%5Cproduct/topCartAjax.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'default\\product/topCartAjax.html', 44, false),)), $this); ?>
<a class="cart_link" href="javascript:void(0)"><?php echo $this->_tpl_vars['_cart']; ?>
 (<span id="cart_count"><?php echo $this->_tpl_vars['count']; ?>
</span>)</a>


<div class="row item_rows" style="display: none">

    
    
    
    
    
    

	
    
<?php if ($this->_tpl_vars['count']): ?>

			<form name="offer_list_frm" id="cart">
				<input type='hidden' name="do" value="product" />
				<input type='hidden' name="action" value="add_cart" />
				<input type='hidden' id="task" name="task" value="update" />
				<input type='hidden' id="cartitemid" name="cartitemid" value="" />
				<table width="100%">
					<tr>
						<th><?php echo $this->_tpl_vars['_picture']; ?>
</th>
						<th style="text-align: left;"><?php echo $this->_tpl_vars['_product']; ?>
</th>
						
						<th></th>
						
						<th width="20%"><?php echo $this->_tpl_vars['_sum_price']; ?>
 (VNĐ)</th>
						<h></h>
						
					</tr>
					<?php $_from = $this->_tpl_vars['StickyItems']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['sticky_offer'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['sticky_offer']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['shop']):
        $this->_foreach['sticky_offer']['iteration']++;
?>
						<tr>
							<td colspan=5 style="background: #efefef">
								<?php echo $this->_tpl_vars['shop']['space_name']; ?>

							</td>
						</tr>
													
							<?php $_from = $this->_tpl_vars['shop']['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['sticky_offer'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['sticky_offer']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['sticky']):
        $this->_foreach['sticky_offer']['iteration']++;
?>
							<tr>
							<td class="offer_img"><img src="<?php echo $this->_tpl_vars['sticky']['image']; ?>
" border=0 alt="<?php echo $this->_tpl_vars['sticky']['title']; ?>
"></td>
							<td class="title_link">
								<a href="<?php echo smarty_function_the_url(array('module' => 'product','id' => ($this->_tpl_vars['sticky']['p_id'])), $this);?>
" title="<?php echo $this->_tpl_vars['sticky']['p_name']; ?>
"><?php echo $this->_tpl_vars['sticky']['p_name']; ?>
 </a>
													
							</td>
							
							<td>x<?php echo $this->_tpl_vars['sticky']['quantity']; ?>
</td>

							<td align=right style="text-align: right;"><?php echo $this->_tpl_vars['sticky']['p_total']; ?>
</td>
							<td><input  class="cart_remove" onclick="removeCartItem(<?php echo $this->_tpl_vars['sticky']['id']; ?>
, this, '<?php echo $this->_tpl_vars['sticky']['p_total']; ?>
');" type="button" value="<?php echo $this->_tpl_vars['_remove']; ?>
" /></td>
							
							</tr>
							<?php endforeach; endif; unset($_from); ?>
							<tr>
								<td colspan=3 align=right style="text-align: right;"><?php echo $this->_tpl_vars['_total']; ?>
</td>
								<td colspan=2 align=right style="text-align: right;"><span id="cart_total"><?php echo $this->_tpl_vars['shop']['total']; ?>
</span> VNĐ</td>
							</tr>
							<tr>
								<td colspan=5 align=right style="text-align: right;">
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
									
									<input name="checkout" class="checkout_but go_cart" onclick="window.location='index.php?do=product&action=add_cart'"  type="button" value="<?php echo $this->_tpl_vars['_go_to_cart']; ?>
" />
										
								</td>								
							</tr>
						
					<?php endforeach; endif; unset($_from); ?>
				</table>
			</form>

		

	
<?php else: ?>
					<form name="offer_list_frm" id="cart">
					    
					    <table width="100%">
					<tr>
						<td>
			<p style="text-align: center; margin-top: 10px;"><?php echo $this->_tpl_vars['_cart_empty']; ?>
</p>
						</td>
					</form>
			
<?php endif; ?>
    
    
    
    
    
    
    
    
</div>








