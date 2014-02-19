<?php /* Smarty version 2.6.27, created on 2013-06-22 00:17:29
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
">

	
	<a href="<?php echo smarty_function_the_url(array('id' => ($this->_tpl_vars['item']['id']),'module' => 'product'), $this);?>
">

		<img width="225" height="" src="<?php echo $this->_tpl_vars['item']['thumb']; ?>
" class="attachment-shop_catalog wp-post-image" alt="683920-1">
		<h3><?php echo $this->_tpl_vars['item']['name']; ?>
</h3>

		
	<span class="price"><span class="amount"><?php echo $this->_tpl_vars['item']['price']; ?>
 VNĐ</span></span>

	</a>

	

	<a onclick="getCart(<?php echo $this->_tpl_vars['item']['id']; ?>
, 1)" href="javascript:void(0)" rel="nofollow" class="add_to_cart_button button product_type_simple"><?php echo $this->_tpl_vars['_add_to_cart']; ?>
</a>

</li>

</ul>

<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>		
					
				
					
				
					
				
			
<?php else: ?>
<div style="text-align: center; margin-top: 20px;">

</div>
<?php endif; ?>