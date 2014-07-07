<?php /* Smarty version 2.6.27, created on 2014-07-03 15:08:19
         compiled from default%5Cproduct/_related_products.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'product', 'default\\product/_related_products.html', 3, false),array('function', 'the_url', 'default\\product/_related_products.html', 7, false),)), $this); ?>
<ul class="product_list_widget">
				
		    <?php $this->_tag_stack[] = array('product', array('memberid' => ($this->_tpl_vars['member_id']),'row' => 11,'titlelen' => '35','name' => 'itemz')); $_block_repeat=true;smarty_block_product($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
				<?php if ($this->_tpl_vars['product_id'] != $this->_tpl_vars['itemz']['id']): ?>
					<li>
							    
			<a style="float: right;width: 100px;" href="<?php echo smarty_function_the_url(array('id' => ($this->_tpl_vars['itemz']['id']),'module' => 'product','product_name' => ($this->_tpl_vars['itemz']['name']),'service' => ($this->_tpl_vars['itemz']['service'])), $this);?>
">
					<img width="200" height="200" src="<?php echo $this->_tpl_vars['itemz']['thumb']; ?>
" class="attachment-shop_thumbnail wp-post-image" alt="675476-1">
			</a>
				
				<!--<del><span class="amount">&#36;<?php echo $this->_tpl_vars['itemz']['price']; ?>
</span></del>-->
				<ins style="margin-bottom: 5px;padding: 0;max-width: 162px;">
				
				<?php if ($this->_tpl_vars['itemz']['new_price'] || $this->_tpl_vars['itemz']['price']): ?>
					<?php if ($this->_tpl_vars['itemz']['new_price'] != "" && $this->_tpl_vars['itemz']['new_price'] != 0): ?>
					    <?php if ($this->_tpl_vars['itemz']['price']): ?><span class="old_price"><?php echo $this->_tpl_vars['itemz']['price']; ?>
 <span class="price_unit">VNĐ<?php if ($this->_tpl_vars['itemz']['price_unit']): ?>/<?php echo $this->_tpl_vars['itemz']['price_unit']; ?>
<?php endif; ?></span></span> <?php endif; ?><span class="amount"><?php echo $this->_tpl_vars['itemz']['new_price']; ?>
 <span class="price_unit">VNĐ<?php if ($this->_tpl_vars['itemz']['price_unit']): ?>/<?php echo $this->_tpl_vars['itemz']['price_unit']; ?>
<?php endif; ?></span></span>
					<?php else: ?>
					    <span class="amount"><?php echo $this->_tpl_vars['itemz']['price']; ?>
 <span class="price_unit">VNĐ<?php if ($this->_tpl_vars['itemz']['price_unit']): ?>/<?php echo $this->_tpl_vars['itemz']['price_unit']; ?>
<?php endif; ?></span></span>
					<?php endif; ?>
				<?php endif; ?>
				
				</ins>
				<div class="related_title"><a href="<?php echo smarty_function_the_url(array('id' => ($this->_tpl_vars['itemz']['id']),'module' => 'product','product_name' => ($this->_tpl_vars['itemz']['name']),'service' => ($this->_tpl_vars['itemz']['service'])), $this);?>
"><?php echo $this->_tpl_vars['itemz']['name']; ?>
</a></div>
					</li>
					<?php endif; ?>
                    <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_product($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
		    
			</ul>