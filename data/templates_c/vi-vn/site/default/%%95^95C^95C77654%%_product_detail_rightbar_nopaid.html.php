<?php /* Smarty version 2.6.27, created on 2014-06-13 10:31:13
         compiled from default/product/_product_detail_rightbar_nopaid.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'default/product/_product_detail_rightbar_nopaid.html', 3, false),array('modifier', 'truncate', 'default/product/_product_detail_rightbar_nopaid.html', 3, false),array('block', 'product', 'default/product/_product_detail_rightbar_nopaid.html', 18, false),)), $this); ?>
                <a style="margin-bottom: 10px" href="http://marketonline.vn/product/detail/19550.html" class="leftlogodetail"><img title="TÊN SẢN PHẨM (CHI TIẾT MẪU ) CẦN CÓ CÁC HẠNG MỤC SAU" alt="TÊN SẢN PHẨM (CHI TIẾT MẪU ) CẦN CÓ CÁC HẠNG MỤC SAU" src="http://marketonline.vn/attachment/2013/09/26/product-1-19550.jpg" /><span class="shopname_right">Sản phẩm mẫu</span></a>
		
		<?php if ($this->_tpl_vars['COMPANY']['r_spacename']): ?><a href="<?php echo smarty_function_the_url(array('module' => 'space','userid' => ($this->_tpl_vars['COMPANY']['r_spacename'])), $this);?>
" class="leftlogodetail"><img title="<?php echo $this->_tpl_vars['COMPANY']['r_name']; ?>
" alt="<?php echo $this->_tpl_vars['COMPANY']['r_name']; ?>
" src="<?php echo $this->_tpl_vars['COMPANY']['r_logo']; ?>
" /><span class="shopname_right"><?php echo ((is_array($_tmp=$this->_tpl_vars['COMPANY']['r_shop_name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 32) : smarty_modifier_truncate($_tmp, 32)); ?>
</span></a><?php endif; ?>
		
		<?php $_from = $this->_tpl_vars['banners']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['itemxxx']):
?>
		
			<!--<a target="_blank" rel="nofollow" class="leftlogodetail" href="<?php echo smarty_function_the_url(array('module' => 'banner_click','id' => ($this->_tpl_vars['itemxxx']['id'])), $this);?>
"><img title="<?php echo $this->_tpl_vars['itemxxx']['title']; ?>
" alt="<?php echo $this->_tpl_vars['itemxxx']['title']; ?>
" src="<?php echo $this->_tpl_vars['itemxxx']['image']; ?>
" /><span class="shopname_right"><?php echo ((is_array($_tmp=$this->_tpl_vars['itemxxx']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 32) : smarty_modifier_truncate($_tmp, 32)); ?>
</span></a>-->
			<a class="" style="border: none;margin-top: 25px;padding-top: 10px;border-top:solid 1px #ccc;padding-bottom: 0" href="<?php echo smarty_function_the_url(array('module' => 'space','userid' => ($this->_tpl_vars['itemxxx']['space_name'])), $this);?>
"><?php echo $this->_tpl_vars['itemxxx']['title']; ?>
</a>
			<a class="leftlogodetailz" href="<?php echo smarty_function_the_url(array('module' => 'space','userid' => ($this->_tpl_vars['itemxxx']['space_name'])), $this);?>
">
				<img title="<?php echo $this->_tpl_vars['itemxxx']['title']; ?>
" alt="<?php echo $this->_tpl_vars['itemxxx']['title']; ?>
" src="<?php echo $this->_tpl_vars['itemxxx']['image']; ?>
" />
				<span style="display: none" class="shopname_right"><?php echo ((is_array($_tmp=$this->_tpl_vars['itemxxx']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 32) : smarty_modifier_truncate($_tmp, 32)); ?>
</span>
			</a>
			<?php if ($this->_tpl_vars['itemxxx']['description']): ?><div style="margin-bottom: 0"><?php echo ((is_array($_tmp=$this->_tpl_vars['itemxxx']['description'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 99) : smarty_modifier_truncate($_tmp, 99)); ?>
</div><?php endif; ?>
	
		<?php endforeach; endif; unset($_from); ?>
		
		
		<?php $this->_tag_stack[] = array('product', array('name' => 'itemz','industryid' => ($this->_tpl_vars['inn_array']),'row' => 2)); $_block_repeat=true;smarty_block_product($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
		    <?php if ($this->_tpl_vars['Product']['id'] != $this->_tpl_vars['itemz']['id']): ?>
			<a style="display: none;margin-bottom: 20px" href="<?php echo smarty_function_the_url(array('module' => 'product','id' => ($this->_tpl_vars['itemz']['id']),'product_name' => ($this->_tpl_vars['itemz']['name'])), $this);?>
"><img title="<?php echo $this->_tpl_vars['itemz']['name']; ?>
" alt="<?php echo $this->_tpl_vars['itemz']['name']; ?>
" src="<?php echo $this->_tpl_vars['itemz']['thumb']; ?>
" /></a>
		    <?php endif; ?>
		<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_product($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
		
		<!--<a href="index.php?do=product&level=1&industryid=<?php echo $this->_tpl_vars['banner']['banner1_id']; ?>
"><img src="<?php echo $this->_tpl_vars['banner']['banner1']; ?>
" /></a>-->