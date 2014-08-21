<?php /* Smarty version 2.6.27, created on 2014-08-13 14:58:06
         compiled from default%5Cproduct/ajax.list.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'default\\product/ajax.list.html', 12, false),)), $this); ?>
<div class="total-count"><?php echo $this->_tpl_vars['TotalCount']; ?>
</div>
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
	<div class="hidden-info-list-item">
		<a href="<?php echo smarty_function_the_url(array('id' => ($this->_tpl_vars['item']['id']),'module' => 'product','product_name' => ($this->_tpl_vars['item']['name']),'service' => ($this->_tpl_vars['item']['service'])), $this);?>
">Xem chi tiết</a>
		<!--Và liên hệ với nhà cung cấp<br />
		<strong class='red'><?php echo $this->_tpl_vars['item']['shop_name']; ?>
</strong>-->
	</div>
	
	<a href="<?php echo smarty_function_the_url(array('id' => ($this->_tpl_vars['item']['id']),'module' => 'product','product_name' => ($this->_tpl_vars['item']['name']),'service' => ($this->_tpl_vars['item']['service'])), $this);?>
">

		<div><img width="225" height="" src="<?php echo $this->_tpl_vars['item']['thumb']; ?>
" class="attachment-shop_catalog wp-post-image" alt="<?php echo $this->_tpl_vars['item']['name']; ?>
"></div>
		<a class="shop_info_product" href="<?php echo $this->_tpl_vars['item']['shop_url']; ?>
" title="">
			<div>Xem gian hàng:</div>
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
		<a class="comment_link" href="<?php echo smarty_function_the_url(array('id' => ($this->_tpl_vars['item']['id']),'module' => 'product','product_name' => ($this->_tpl_vars['item']['name']),'service' => ($this->_tpl_vars['item']['service'])), $this);?>
#comment_pos"><?php echo $this->_tpl_vars['_comment_list']; ?>
 (<?php echo $this->_tpl_vars['item']['comments_count']; ?>
)</a>
		<?php if ($this->_tpl_vars['pb_username'] != ""): ?>
			<a class="comment_link message_tool" href="javascript:void(0)" onclick="getChatboxNew('<?php echo $this->_tpl_vars['item']['member_id']; ?>
x<?php echo $this->_tpl_vars['item']['membertype_id']; ?>
', false)"><?php echo $this->_tpl_vars['_message']; ?>
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

<?php if (! $this->_tpl_vars['TotalCount']): ?>

<ul class="products_0">

	<li class="empty-list">
		<?php if ($_GET['type'] == 'service'): ?>
			Hiện chưa có dịch vụ phù hợp ở mục này...
		<?php else: ?>
			Đã hết hàng trên kệ...
		<?php endif; ?>	
	</li>

</ul>
<?php endif; ?>

<?php endif; ?>

<?php echo '
<script>
			
</script>
'; ?>