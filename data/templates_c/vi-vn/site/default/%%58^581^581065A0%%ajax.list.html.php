<?php /* Smarty version 2.6.27, created on 2014-02-26 09:19:23
         compiled from default%5Cproduct/ajax.list.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'default\\product/ajax.list.html', 12, false),)), $this); ?>
<?php if ($this->_tpl_vars['Count']): ?>


<?php if ($this->_tpl_vars['Products']): ?>
<?php $_from = $this->_tpl_vars['Products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['level']['iteration']++;
?>

<ul class="products_<?php echo $this->_tpl_vars['key']; ?>
">

<li class="product<?php echo $this->_tpl_vars['item']['isfirst']; ?>
 boxcols">

	
	<a href="<?php echo smarty_function_the_url(array('id' => ($this->_tpl_vars['item']['id']),'module' => 'product'), $this);?>
">

		<div><img title="Vào xem chi tiết <?php if (! $this->_tpl_vars['item']['service']): ?>sản phẩm<?php else: ?>dịch vụ<?php endif; ?><br>Và liên hệ với nhà cung cấp <br /><strong class='red'><?php echo $this->_tpl_vars['item']['shop_name']; ?>
</strong>" width="225" height="" src="<?php echo $this->_tpl_vars['item']['thumb']; ?>
" class="attachment-shop_catalog wp-post-image" alt="<?php echo $this->_tpl_vars['item']['name']; ?>
"></div>
		<a class="shop_info_product" href="<?php echo $this->_tpl_vars['item']['shop_url']; ?>
" title="Vào xem gian hàng <br><strong class='red'><?php echo $this->_tpl_vars['item']['shop_name']; ?>
</strong>">
			<div>Sản phẩm của gian hàng:</div>
			<span><?php echo $this->_tpl_vars['item']['shop_name']; ?>
</span>
		</a>
		<h3><?php echo $this->_tpl_vars['item']['name']; ?>
</h3>
		
		<?php if ($this->_tpl_vars['item']['new_price'] || $this->_tpl_vars['item']['price']): ?>
			<?php if ($this->_tpl_vars['item']['new_price'] != "" && $this->_tpl_vars['item']['new_price'] != 0): ?>
				<span class="price"><?php if ($this->_tpl_vars['item']['price']): ?><span class="old_price"><?php echo $this->_tpl_vars['item']['price']; ?>
 <span class="price_unit">VNĐ<?php if ($this->_tpl_vars['item']['price_unit']): ?>/<?php echo $this->_tpl_vars['item']['price_unit']; ?>
<?php endif; ?></span></span><?php endif; ?> <span class="amount"><?php echo $this->_tpl_vars['item']['new_price']; ?>
</span> <span class="price_unit">VNĐ<?php if ($this->_tpl_vars['item']['price_unit']): ?>/<?php echo $this->_tpl_vars['item']['price_unit']; ?>
<?php endif; ?></span></span> <?php if ($this->_tpl_vars['item']['price_note']): ?><span class="noteprice">(<?php echo $this->_tpl_vars['item']['price_note']; ?>
)</span><?php endif; ?>
			<?php else: ?>
				<span class="price"><span class="amount"><?php echo $this->_tpl_vars['item']['price']; ?>
</span> <span class="price_unit">VNĐ<?php if ($this->_tpl_vars['item']['price_unit']): ?>/<?php echo $this->_tpl_vars['item']['price_unit']; ?>
<?php endif; ?></span></span>
			<?php endif; ?>
		<?php endif; ?>
	</a>


	<a style="display: none" onclick="getCart(<?php echo $this->_tpl_vars['item']['id']; ?>
, 1, $(this))" href="javascript:void(0)" rel="nofollow" class="add_to_cart_button button product_type_simple"><?php echo $this->_tpl_vars['_add_to_cart']; ?>
</a>
	
	<div class="product_tools">
		<a class="comment_link stat_link" href="javascript:void(0)"><?php echo $this->_tpl_vars['item']['clicked']; ?>
</a>
		<a class="comment_link" href="<?php echo smarty_function_the_url(array('id' => ($this->_tpl_vars['item']['id']),'module' => 'product'), $this);?>
#comment_pos"><?php echo $this->_tpl_vars['_comment_list']; ?>
 (<?php echo $this->_tpl_vars['item']['comments_count']; ?>
)</a>
		<?php if ($this->_tpl_vars['pb_username'] != ""): ?>
			<a class="comment_link message_tool" href="javascript:void(0)" onclick="getChatbox(<?php echo $this->_tpl_vars['item']['member_id']; ?>
, false)"><?php echo $this->_tpl_vars['_message']; ?>
</a>
		<?php else: ?>
			<a class="comment_link message_tool comment_but" href="#login-box"><?php echo $this->_tpl_vars['_message']; ?>
</a>
		<?php endif; ?>
		
		
	</div>

</li>

</ul>

<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>		
					
				
					
				
					
				
			
<?php else: ?>
<div style="text-align: center; margin-top: 20px;">

</div>
<?php endif; ?>

<?php echo '
<script>
			
</script>
'; ?>