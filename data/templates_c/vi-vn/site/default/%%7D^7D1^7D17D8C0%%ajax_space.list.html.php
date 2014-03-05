<?php /* Smarty version 2.6.27, created on 2014-03-04 14:37:43
         compiled from default%5Cproduct/ajax_space.list.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'default\\product/ajax_space.list.html', 18, false),array('modifier', 'truncate', 'default\\product/ajax_space.list.html', 21, false),)), $this); ?>




<?php if ($this->_tpl_vars['Products']): ?>
<?php $_from = $this->_tpl_vars['Products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['level']['iteration']++;
?>

<div id="list_product_ajax0" class="col_products">
			<ul class="products" <?php if ($this->_tpl_vars['k']%4 == 3): ?>style="margin-right:0"<?php endif; ?>>
					
					
					
					
					
					<li class="product ">

	
	<a href="<?php echo smarty_function_the_url(array('module' => 'product','id' => ($this->_tpl_vars['item']['id'])), $this);?>
">

		<div class="space_img_out"><img width="225" height="" src="<?php echo $this->_tpl_vars['item']['thumb']; ?>
" class="attachment-shop_catalog wp-post-image" alt="683920-1"></div>
		<h3><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 60) : smarty_modifier_truncate($_tmp, 60)); ?>
</h3>

		<?php if ($this->_tpl_vars['item']['new_price'] || $this->_tpl_vars['item']['price']): ?>
			<?php if ($this->_tpl_vars['item']['new_price'] != "" && $this->_tpl_vars['item']['new_price'] != 0): ?>
						<span class="price"><?php if ($this->_tpl_vars['item']['price']): ?><span class="old_price"><?php echo $this->_tpl_vars['item']['price']; ?>
 <span class="price_unit">VNĐ<?php if ($this->_tpl_vars['item']['price_unit']): ?>/<?php echo $this->_tpl_vars['item']['price_unit']; ?>
<?php endif; ?></span></span> <?php endif; ?><span class="amount"><?php echo $this->_tpl_vars['item']['new_price']; ?>
 <span class="price_unit">VNĐ<?php if ($this->_tpl_vars['item']['price_unit']): ?>/<?php echo $this->_tpl_vars['item']['price_unit']; ?>
<?php endif; ?></span></span></span> <?php if ($this->_tpl_vars['item']['price_note']): ?><span class="noteprice">(<?php echo $this->_tpl_vars['item']['price_note']; ?>
)</span><?php endif; ?>
			<?php else: ?>
						<span class="price"><span class="amount"><?php echo $this->_tpl_vars['item']['price']; ?>
 <span class="price_unit">VNĐ<?php if ($this->_tpl_vars['item']['price_unit']): ?>/<?php echo $this->_tpl_vars['item']['price_unit']; ?>
<?php endif; ?></span></span></span>
			<?php endif; ?>
<?php endif; ?>

	</a>

	

	<a onclick="getCart(<?php echo $this->_tpl_vars['item']['id']; ?>
, 1, $(this))" href="javascript:void(0)" rel="nofollow" class="add_to_cart_button button product_type_simple"><?php echo $this->_tpl_vars['_add_to_cart']; ?>
</a>

</li>
					</ul>
			
			</div>
					<?php if ($this->_tpl_vars['k']++): ?><?php endif; ?>





<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>		
					