<?php /* Smarty version 2.6.27, created on 2013-06-18 08:46:05
         compiled from index.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'product', 'index.html', 46, false),array('function', 'the_url', 'index.html', 53, false),array('modifier', 'truncate', 'index.html', 56, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array('PageTitle' => ($this->_tpl_vars['_home_page']),'cur' => 'space_index')));
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



<div class="eleven columns" id="content" style="">

<!--<div class="row" style="padding-left: 10px; padding-top: 0;">                
                <div class="four columns logo logoz"><a href="#com"><img src="<?php echo $this->_tpl_vars['COMPANY']['logo']; ?>
"></a></div>
                
              <h3 style="padding-left: 0; margin-bottom: 15px;"><?php echo $this->_tpl_vars['COMPANY']['name']; ?>
</h3>
              
              <p><?php echo $this->_tpl_vars['COMPANY']['description']; ?>
</p>
              
              <br>
              <br style="clear: both">
</div> -->             
              
              <div class="row">
    <div style="width: 100%;padding-left: 0;" class="eleven columns">

	<div id="container">
	<div role="main" id="">

        
<h3 style="padding: 0; margin: 0 0 0 0;height: 40px;">Sản phẩm gần đây</h3>
		
			
			<ul class="products">

				<?php $this->_tag_stack[] = array('product', array('name' => 'item','companyid' => $this->_tpl_vars['COMPANY']['id'],'memberid' => $this->_tpl_vars['MEMBER']['id'],'row' => 10)); $_block_repeat=true;smarty_block_product($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
						
					
				
					<li class="product <?php echo $this->_tpl_vars['item']['pos']; ?>
">

	
	<a href="<?php echo smarty_function_the_url(array('module' => 'product','id' => ($this->_tpl_vars['item']['id'])), $this);?>
">

		<div class="imgout"><img width="225" height="300" alt="<?php echo $this->_tpl_vars['item']['name']; ?>
" class="attachment-shop_catalog wp-post-image" src="<?php echo $this->_tpl_vars['item']['thumb']; ?>
"></div>
		<h3><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 40) : smarty_modifier_truncate($_tmp, 40)); ?>
</h3>

		
	<span class="price"><span class="amount"><?php echo $this->_tpl_vars['item']['price']; ?>
 VNĐ</span></span>

	</a>

	

	<a onclick="getCart(<?php echo $this->_tpl_vars['item']['id']; ?>
, 1)" href="javascript:void(0)" rel="nofollow" class="add_to_cart_button button product_type_simple"><?php echo $this->_tpl_vars['_add_to_cart']; ?>
</a>

</li>
					
					<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_product($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
				
					
				
			</ul>

			
		
		<div class="clear"></div>

		

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