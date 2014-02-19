<?php /* Smarty version 2.6.27, created on 2013-06-10 01:06:14
         compiled from offer.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'offer', 'offer.html', 36, false),array('modifier', 'truncate', 'offer.html', 37, false),array('function', 'the_url', 'offer.html', 43, false),array('function', 'pager', 'offer.html', 72, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array('PageTitle' => ($this->_tpl_vars['_space_offer']),'cur' => 'space_index')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="body-wrapper" >
<div id="body-wrapper-padding">
<!--[if lt IE 7]>
<div class="alert">Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different
    browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to
    experience this site.
</div><![endif]-->


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "topmenu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<div class="row widget space_content">


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "leftbar.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>



<div class="eleven columns" id="content">


              
              <div class="row" style="margin-right: 0;">
    <div style="width: 100%;padding-left: 0; padding-right: 0" class="eleven columns">

	<div id="container">
	<div role="main" id="">
<?php if ($this->_tpl_vars['Type']['name']): ?><h6><a href="<?php echo $this->_tpl_vars['Menus']['product']; ?>
"><?php echo $this->_tpl_vars['_product_show']; ?>
</a></h6><?php endif; ?>
<h3 style="padding: 0; margin: 0 0 0 0;height: 40px;"><?php if ($this->_tpl_vars['Type']['name']): ?><?php echo $this->_tpl_vars['Type']['name']; ?>
<?php else: ?><?php echo $this->_tpl_vars['_offer']; ?>
<?php endif; ?></h3>
		
			
			<ul class="products">
				
				<?php $this->_tag_stack[] = array('offer', array('name' => 'item','companyid' => ($this->_tpl_vars['COMPANY']['id']),'row' => 10)); $_block_repeat=true;smarty_block_offer($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
						<!--<li><a href="<?php echo $this->_tpl_vars['WebRootUrl']; ?>
<?php echo $this->_tpl_vars['item']['url']; ?>
" target="_blank"><img src="<?php echo $this->_tpl_vars['item']['thumb']; ?>
" width="80" height="80" alt="<?php echo $this->_tpl_vars['item']['title']; ?>
"></a><p><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 20) : smarty_modifier_truncate($_tmp, 20)); ?>
</p></li>-->
						
						
						<li class="product <?php echo $this->_tpl_vars['item']['pos']; ?>
">

	
	<a href="<?php echo smarty_function_the_url(array('module' => 'product','id' => ($this->_tpl_vars['item']['id'])), $this);?>
" title="<?php echo $this->_tpl_vars['item']['name']; ?>
">

		<div class="imgout"><img alt="<?php echo $this->_tpl_vars['item']['name']; ?>
" class="attachment-shop_catalog wp-post-image" src="<?php echo $this->_tpl_vars['item']['thumb']; ?>
"></div>
		<h3><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 40) : smarty_modifier_truncate($_tmp, 40)); ?>
</h3>

		
	<span class="price"><span class="amount"><?php echo $this->_tpl_vars['item']['price']; ?>
 VNĐ</span></span>

	</a>

	

	<!--<a onclick="getCart(<?php echo $this->_tpl_vars['item']['id']; ?>
, 1)" href="javascript:void(0)" rel="nofollow" class="add_to_cart_button button product_type_simple"><?php echo $this->_tpl_vars['_add_to_cart']; ?>
</a>-->

</li>
				<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_offer($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
				

				
				
					
				
			</ul>

			
		
		<div class="clear"></div>


						<p><div class="pagination"><?php echo smarty_function_pager(array('rowcount' => ($this->_tpl_vars['paging']['total']),'limit' => 20), $this);?>
</div></p>

		</div>
</div>
    </div>

</div>
                  
              </div>



</div>



</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>




<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array('PageTitle' => ($this->_tpl_vars['_space_offer']),'cur' => 'space_offer')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="wrapper">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "banner.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="content">
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "leftbar.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<div class="rightbarcontact">
				<div class="playercontact">
				<div class="playerheadcontact"><span class="playlistcontact"><?php echo $this->_tpl_vars['_space_offer']; ?>
</span><span class="player_head_concontact"></span><img src="<?php echo $this->_tpl_vars['SpaceUrl']; ?>
images/contactus_13.jpg" /></div>
				<div class="clear"></div>
				<div class="player_concontact clearfix">
					<ul>
					<?php $this->_tag_stack[] = array('offer', array('name' => 'item','companyid' => ($this->_tpl_vars['COMPANY']['id']),'row' => 12)); $_block_repeat=true;smarty_block_offer($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
						<li><a href="<?php echo $this->_tpl_vars['WebRootUrl']; ?>
<?php echo $this->_tpl_vars['item']['url']; ?>
" target="_blank"><img src="<?php echo $this->_tpl_vars['item']['thumb']; ?>
" width="80" height="80" alt="<?php echo $this->_tpl_vars['item']['title']; ?>
"></a><p><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 20) : smarty_modifier_truncate($_tmp, 20)); ?>
</p></li>
					<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_offer($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>				
					</ul>
					<div class="clear"></div>
					<p><div class="pagination"><?php echo smarty_function_pager(array('rowcount' => ($this->_tpl_vars['paging']['total'])), $this);?>
</div></p>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>