<?php /* Smarty version 2.6.27, created on 2013-06-11 13:13:35
         compiled from ajaxannoucebox.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'offer', 'ajaxannoucebox.html', 3, false),array('block', 'job', 'ajaxannoucebox.html', 10, false),array('block', 'companynews', 'ajaxannoucebox.html', 20, false),array('block', 'product', 'ajaxannoucebox.html', 33, false),array('modifier', 'truncate', 'ajaxannoucebox.html', 5, false),array('function', 'the_url', 'ajaxannoucebox.html', 35, false),)), $this); ?>
<ul  class="product_list_widget">
    
    <?php $this->_tag_stack[] = array('offer', array('name' => 'item','companyid' => ($this->_tpl_vars['COMPANY']['id']),'row' => 1,'typeid' => $this->_tpl_vars['Type']['id'],'memberid' => $this->_tpl_vars['MEMBER']['id'])); $_block_repeat=true;smarty_block_offer($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
						<li style="border-top:solid 1px #dfdfdf;border-bottom:solid 1px #dfdfdf">
				    <img alt="<?php echo $this->_tpl_vars['item']['title']; ?>
" class="attachment-shop_catalog wp-post-image" src="<?php echo $this->_tpl_vars['item']['thumb']; ?>
"><a class="tooltipz iim" href="<?php echo $this->_tpl_vars['Menus']['offer']; ?>
&id=<?php echo $this->_tpl_vars['item']['id']; ?>
" title="<?php echo $this->_tpl_vars['item']['title']; ?>
">[<?php echo $this->_tpl_vars['_offer']; ?>
] <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 50) : smarty_modifier_truncate($_tmp, 50)); ?>
</a>

                                </li>
				<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_offer($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>	

<?php $this->_tag_stack[] = array('job', array('companyid' => ($this->_tpl_vars['COMPANY']['id']),'row' => 1,'status' => 1)); $_block_repeat=true;smarty_block_job($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
				
				
				<li style="border-bottom:solid 1px #dfdfdf">
				    <img alt="<?php echo $this->_tpl_vars['job']['title']; ?>
" class="attachment-shop_catalog wp-post-image" src="<?php echo $this->_tpl_vars['theme_img_path']; ?>
image/job.png"><a class="tooltipz" href="<?php echo $this->_tpl_vars['Menus']['job']; ?>
&nid=<?php echo $this->_tpl_vars['job']['id']; ?>
" title="<?php echo $this->_tpl_vars['job']['title']; ?>
">[<?php echo $this->_tpl_vars['_job']; ?>
] <?php echo ((is_array($_tmp=$this->_tpl_vars['job']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 25) : smarty_modifier_truncate($_tmp, 25)); ?>
</a>

                                </li>

<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_job($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

<?php $this->_tag_stack[] = array('companynews', array('companyid' => ($this->_tpl_vars['COMPANY']['id']),'row' => 1)); $_block_repeat=true;smarty_block_companynews($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>

<li>
				    <img alt="<?php echo $this->_tpl_vars['companynews']['title']; ?>
" class="attachment-shop_catalog wp-post-image" src="<?php echo $this->_tpl_vars['theme_img_path']; ?>
image/news.png"><a class="tooltipz" href="<?php echo $this->_tpl_vars['Menus']['news']; ?>
&nid=<?php echo $this->_tpl_vars['companynews']['id']; ?>
" title="<?php echo $this->_tpl_vars['companynews']['title']; ?>
">[<?php echo $this->_tpl_vars['_space_news']; ?>
] <?php echo ((is_array($_tmp=$this->_tpl_vars['companynews']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 25) : smarty_modifier_truncate($_tmp, 25)); ?>
</a>

</li>
						


	
		<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_companynews($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

                
                <?php $this->_tag_stack[] = array('product', array('name' => 'item','companyid' => $this->_tpl_vars['COMPANY']['id'],'memberid' => $this->_tpl_vars['MEMBER']['id'],'row' => 1)); $_block_repeat=true;smarty_block_product($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
				<!--<li>
				<img alt="<?php echo $this->_tpl_vars['item']['name']; ?>
" class="attachment-shop_catalog wp-post-image" src="<?php echo $this->_tpl_vars['item']['thumb']; ?>
"><a class="tooltipz iim" target="_blank" href="<?php echo smarty_function_the_url(array('module' => 'product','id' => ($this->_tpl_vars['item']['id'])), $this);?>
" title="<?php echo $this->_tpl_vars['item']['name']; ?>
">[<?php echo $this->_tpl_vars['_products']; ?>
] <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 25) : smarty_modifier_truncate($_tmp, 25)); ?>
</a>
				
				</li>-->
					
					<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_product($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

                

</ul>