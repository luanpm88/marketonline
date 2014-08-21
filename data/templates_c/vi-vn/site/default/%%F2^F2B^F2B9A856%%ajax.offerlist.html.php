<?php /* Smarty version 2.6.27, created on 2014-08-13 14:37:43
         compiled from default%5Cproduct/ajax.offerlist.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'default\\product/ajax.offerlist.html', 13, false),array('modifier', 'truncate', 'default\\product/ajax.offerlist.html', 38, false),)), $this); ?>
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
" rel="<?php echo $this->_tpl_vars['item']['id']; ?>
">
	
		<div class="images">
			<a target="_blank" href="<?php echo smarty_function_the_url(array('module' => 'offers','action' => 'detail','id' => ($this->_tpl_vars['item']['id']),'title' => ($this->_tpl_vars['item']['title'])), $this);?>
" class="fancy-box-offer">	
				<img width="225" height="" src="<?php echo $this->_tpl_vars['item']['thumb']; ?>
" class="attachment-shop_catalog wp-post-image" alt="<?php echo $this->_tpl_vars['item']['name']; ?>
">
			</a>
		</div>
		
		<div class="title_detail">
			<h3>
				
				<a target="_blank" href="<?php echo smarty_function_the_url(array('module' => 'offers','action' => 'detail','id' => ($this->_tpl_vars['item']['id']),'title' => ($this->_tpl_vars['item']['title'])), $this);?>
" title="<?php echo $this->_tpl_vars['item']['title']; ?>
">
					<?php echo $this->_tpl_vars['item']['title']; ?>

				</a>
							
			</h3>
			<p>
				<?php if ($this->_tpl_vars['item']['new_price'] || $this->_tpl_vars['item']['price']): ?>
				<?php if ($this->_tpl_vars['item']['new_price'] != "" && $this->_tpl_vars['item']['new_price'] != 0): ?>
					<span class="price">Giá: <?php if ($this->_tpl_vars['item']['price']): ?><span class="old_price"><?php echo $this->_tpl_vars['item']['price']; ?>
 <span class="price_unit">VNĐ<?php if ($this->_tpl_vars['item']['price_unit']): ?>/<?php echo $this->_tpl_vars['item']['price_unit']; ?>
<?php endif; ?></span></span><?php endif; ?> <span class="amount"><?php echo $this->_tpl_vars['item']['new_price']; ?>
 <span class="price_unit">VNĐ<?php if ($this->_tpl_vars['item']['price_unit']): ?>/<?php echo $this->_tpl_vars['item']['price_unit']; ?>
<?php endif; ?></span></span></span> <?php if ($this->_tpl_vars['item']['price_note']): ?><span class="noteprice">(<?php echo $this->_tpl_vars['item']['price_note']; ?>
)</span><?php endif; ?>
				<?php else: ?>
					<span class="price">Giá: <span class="amount"><?php echo $this->_tpl_vars['item']['price']; ?>
</span> <span class="price_unit">VNĐ<?php if ($this->_tpl_vars['item']['price_unit']): ?>/<?php echo $this->_tpl_vars['item']['price_unit']; ?>
<?php endif; ?></span></span>
				<?php endif; ?>
				<?php endif; ?>
				
			</p>
				<?php if ($this->_tpl_vars['isConnect']): ?>
					<?php if ($this->_tpl_vars['item']['new_price'] || $this->_tpl_vars['item']['price']): ?>
						<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['content'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 120) : smarty_modifier_truncate($_tmp, 120)); ?>

					<?php else: ?>
						<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['content'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 170) : smarty_modifier_truncate($_tmp, 170)); ?>

					<?php endif; ?>
				<?php else: ?>
					<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['content'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 350) : smarty_modifier_truncate($_tmp, 350)); ?>

				<?php endif; ?>
				
				
			
		</div>
		
		<div class="offer_clicked_col">
			
				<h4>Lượt truy cập</h4>
			<p>	<?php echo $this->_tpl_vars['item']['clicked']; ?>

			</p>
			<p>
				<a href="javascript:void(0)" class="quick_view" onclick="getOfferDetail(<?php echo $this->_tpl_vars['item']['id']; ?>
,0);">Xem nhanh</a>
			</p>
		</div>
		
		<div class="offer_date_col">
			
				<h4>Ngày đăng</h4>
			<p>	<?php echo $this->_tpl_vars['item']['created']; ?>

			</p>
			
				<h4>Ngày hết hạn</h4>
			<p>	<?php echo $this->_tpl_vars['item']['enddate']; ?>

			</p>
			
		</div>
		
		<div class="offer_date_col areax">
			
			<?php if ($this->_tpl_vars['item']['area_names']): ?>
				<h4>Nơi đăng</h4>
			<p>	<?php echo $this->_tpl_vars['item']['area_names']; ?>

			</p>
			<?php endif; ?>
			
				<?php if ($this->_tpl_vars['item']['market']): ?>
				<h4>Thị trường</h4>
			<p>	<?php echo $this->_tpl_vars['item']['market']; ?>

			</p>
			<?php endif; ?>
			
		</div>
		
			<!--<a class="shop_info_product" href="<?php echo $this->_tpl_vars['item']['shop_url']; ?>
"><span><?php echo $this->_tpl_vars['item']['shop_name']; ?>
</span></a>
			<h3><?php echo $this->_tpl_vars['item']['title']; ?>
</h3>
			
			<?php if ($this->_tpl_vars['item']['new_price'] || $this->_tpl_vars['item']['price']): ?>
				<?php if ($this->_tpl_vars['item']['new_price'] != "" && $this->_tpl_vars['item']['new_price'] != 0): ?>
					<span class="price"><?php if ($this->_tpl_vars['item']['price']): ?><span class="old_price"><?php echo $this->_tpl_vars['item']['price']; ?>
 <span class="price_unit">VNĐ<?php if ($this->_tpl_vars['item']['price_unit']): ?>/<?php echo $this->_tpl_vars['item']['price_unit']; ?>
<?php endif; ?></span></span><?php endif; ?> <span class="amount"><?php echo $this->_tpl_vars['item']['new_price']; ?>
 <span class="price_unit">VNĐ<?php if ($this->_tpl_vars['item']['price_unit']): ?>/<?php echo $this->_tpl_vars['item']['price_unit']; ?>
<?php endif; ?></span></span></span> <?php if ($this->_tpl_vars['item']['price_note']): ?><span class="noteprice">(<?php echo $this->_tpl_vars['item']['price_note']; ?>
)</span><?php endif; ?>
				<?php else: ?>
					<span class="price"><span class="amount"><?php echo $this->_tpl_vars['item']['price']; ?>
</span> <span class="price_unit">VNĐ<?php if ($this->_tpl_vars['item']['price_unit']): ?>/<?php echo $this->_tpl_vars['item']['price_unit']; ?>
<?php endif; ?></span></span>
				<?php endif; ?>
			<?php endif; ?>-->
		
	
		
	
		<a style="display: none" onclick="getCart(<?php echo $this->_tpl_vars['item']['id']; ?>
, 1, $(this))" href="javascript:void(0)" rel="nofollow" class="add_to_cart_button button product_type_simple"><?php echo $this->_tpl_vars['_add_to_cart']; ?>
</a>
		
		<div class="product_tools" style="display: none">
			<a class="comment_link" href="<?php echo smarty_function_the_url(array('id' => ($this->_tpl_vars['item']['id']),'module' => 'product','product_name' => ($this->_tpl_vars['item']['name'])), $this);?>
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
	
		Hiện chưa có thương mại phù hợp ở mục này...
	
	</li>

</ul>
<?php endif; ?>
<?php endif; ?>