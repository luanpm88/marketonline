<?php /* Smarty version 2.6.27, created on 2014-04-29 16:07:47
         compiled from default/product/_product_detail_rightbar_paid.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'default/product/_product_detail_rightbar_paid.html', 3, false),array('modifier', 'truncate', 'default/product/_product_detail_rightbar_paid.html', 3, false),)), $this); ?>
<?php $_from = $this->_tpl_vars['product_banners']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['itemxxx']):
?>
		
			<!--<a target="_blank" rel="nofollow" class="leftlogodetail" href="<?php echo smarty_function_the_url(array('module' => 'banner_click','id' => ($this->_tpl_vars['itemxxx']['id'])), $this);?>
"><img title="<?php echo $this->_tpl_vars['itemxxx']['title']; ?>
" alt="<?php echo $this->_tpl_vars['itemxxx']['title']; ?>
" src="<?php echo $this->_tpl_vars['itemxxx']['image']; ?>
" /><span class="shopname_right"><?php echo ((is_array($_tmp=$this->_tpl_vars['itemxxx']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 32) : smarty_modifier_truncate($_tmp, 32)); ?>
</span></a>-->
			<div class="rightbanner_block">
				
				<a class="noresize" href="<?php echo smarty_function_the_url(array('module' => 'product','id' => ($this->_tpl_vars['itemxxx']['id'])), $this);?>
">
					<div class="img_box">
						<img title="<?php echo $this->_tpl_vars['itemxxx']['name']; ?>
" alt="<?php echo $this->_tpl_vars['itemxxx']['name']; ?>
" src="<?php echo $this->_tpl_vars['itemxxx']['thumb']; ?>
" />
					</div>
					<span style="display: none" class="shopname_right"><?php echo ((is_array($_tmp=$this->_tpl_vars['itemxxx']['name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 32) : smarty_modifier_truncate($_tmp, 32)); ?>
</span>
				</a>
				<a class="title" style="border: none;margin-top: 10px;padding-top: 5px;border-top:solid 1px #ccc;" href="<?php echo smarty_function_the_url(array('module' => 'product','id' => ($this->_tpl_vars['itemxxx']['id'])), $this);?>
"><?php echo $this->_tpl_vars['itemxxx']['name']; ?>
</a>
				
				<?php if ($this->_tpl_vars['itemxxx']['new_price'] || $this->_tpl_vars['itemxxx']['price']): ?>
					<?php if ($this->_tpl_vars['itemxxx']['new_price'] != "" && $this->_tpl_vars['itemxxx']['new_price'] != 0): ?>
						<span class="price"><?php if ($this->_tpl_vars['itemxxx']['price']): ?><span class="old_price"><?php echo $this->_tpl_vars['itemxxx']['price']; ?>
 <span class="price_unit">VNĐ<?php if ($this->_tpl_vars['itemxxx']['price_unit']): ?>/<?php echo $this->_tpl_vars['itemxxx']['price_unit']; ?>
<?php endif; ?></span></span><?php endif; ?> <span class="amount"><?php echo $this->_tpl_vars['itemxxx']['new_price']; ?>
</span> <span class="price_unit">VNĐ<?php if ($this->_tpl_vars['itemxxx']['price_unit']): ?>/<?php echo $this->_tpl_vars['itemxxx']['price_unit']; ?>
<?php endif; ?></span></span> <?php if ($this->_tpl_vars['itemxxx']['price_note']): ?><span class="noteprice">(<?php echo $this->_tpl_vars['itemxxx']['price_note']; ?>
)</span><?php endif; ?>
					<?php else: ?>
						<span class="price"><span class="amount"><?php echo $this->_tpl_vars['itemxxx']['price']; ?>
</span> <span class="price_unit">VNĐ<?php if ($this->_tpl_vars['itemxxx']['price_unit']): ?>/<?php echo $this->_tpl_vars['itemxxx']['price_unit']; ?>
<?php endif; ?></span></span>
					<?php endif; ?>
				<?php endif; ?>
				
				
			</div>
			<?php echo ((is_array($_tmp=$this->_tpl_vars['itemxxx']['description'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 99) : smarty_modifier_truncate($_tmp, 99)); ?>

		
<?php endforeach; endif; unset($_from); ?>