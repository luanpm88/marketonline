<?php /* Smarty version 2.6.27, created on 2013-06-08 16:13:28
         compiled from default%5Cproduct/detail.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'nl2br', 'default\\product/detail.html', 123, false),array('modifier', 'stripslashes', 'default\\product/detail.html', 123, false),array('function', 'the_url', 'default\\product/detail.html', 150, false),array('block', 'product', 'default\\product/detail.html', 167, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/header.html", 'smarty_include_vars' => array('page_title' => ($this->_tpl_vars['page_title']),'nav_id' => ($this->_tpl_vars['nav_id']))));
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
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/topmenu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<div class="row">
    <div class="fifteen columns" id="page-title">
        <a class="back" href="javascript:history.back()"></a>
        <div class="subtitle">
            
                        <p><?php echo $this->_tpl_vars['_product']; ?>
</p>
        </div>
        <h1 class="page-title">
                        <?php echo $this->_tpl_vars['item']['title']; ?>
                    </h1>

        <div class="breadcrumbs"><a href="<?php echo $this->_tpl_vars['SiteUrl']; ?>
"><?php echo $this->_tpl_vars['_home_page']; ?>
</a> <span class="delim">/</span><a href="index.php?do=product"><?php echo $this->_tpl_vars['_product']; ?>
</a> <span class="delim">/</span><?php echo $this->_tpl_vars['item']['industry_names']; ?>
 </div>

    </div>
    
    <div class="postitem" style="background: #FFAA31"><?php echo $this->_tpl_vars['_post_product']; ?>
</div>
    <div class="fifteen columns"><div class="line"></div></div>
</div>


<div class="row">
    <div class="eleven columns">

        <div id="container">
	<div id="content" role="main">


        
        

<div itemscope itemtype="http://schema.org/Product" id="product-850" class="post-850 product type-product status-publish hentry">

	<div class="images">
		<?php if ($this->_tpl_vars['item']['picture']): ?>
			<a itemprop="image" href="<?php echo $this->_tpl_vars['item']['image']; ?>
" class="zoom" rel="thumbnails" title="<?php echo $this->_tpl_vars['item']['title']; ?>
"><img width="313" height="418" src="<?php echo $this->_tpl_vars['item']['image']; ?>
" class="attachment-shop_single wp-post-image" alt="<?php echo $this->_tpl_vars['item']['title']; ?>
"></a>
			<!--<div class="detailtopconleft">
				<p class="left1"><img src="<?php echo $this->_tpl_vars['item']['image']; ?>
" alt="" width="80" height="80" /></p>
				<p class="left2"><a href="misc.php?source=<?php echo $this->_tpl_vars['item']['image_url']; ?>
" target="_blank"><img src="<?php echo $this->_tpl_vars['theme_img_path']; ?>
images/detail_17.jpg" alt="" /></a><span><?php echo $this->_tpl_vars['_enlarge_image']; ?>
</span></p>
			</div>-->
		<?php endif; ?>
	
		

	
	<div class="thumbnails">
		<?php if ($this->_tpl_vars['item']['picture1']): ?><a href="<?php echo $this->_tpl_vars['item']['image1']; ?>
" title="<?php echo $this->_tpl_vars['item']['title']; ?>
" rel="thumbnails" class="zoom first">
			<img width="200" height="200" src="<?php echo $this->_tpl_vars['item']['imgmiddle1']; ?>
" class="attachment-shop_thumbnail" alt="<?php echo $this->_tpl_vars['item']['title']; ?>
" /></a><?php endif; ?>
		<?php if ($this->_tpl_vars['item']['picture2']): ?><a href="<?php echo $this->_tpl_vars['item']['image2']; ?>
" title="<?php echo $this->_tpl_vars['item']['title']; ?>
" rel="thumbnails" class="zoom ">
			<img width="200" height="200" src="<?php echo $this->_tpl_vars['item']['imgmiddle2']; ?>
" class="attachment-shop_thumbnail" alt="<?php echo $this->_tpl_vars['item']['title']; ?>
" /></a><?php endif; ?>
			<?php if ($this->_tpl_vars['item']['picture3']): ?><a href="<?php echo $this->_tpl_vars['item']['image3']; ?>
" title="<?php echo $this->_tpl_vars['item']['title']; ?>
" rel="thumbnails" class="zoom ">
			<img width="200" height="200" src="<?php echo $this->_tpl_vars['item']['imgmiddle3']; ?>
" class="attachment-shop_thumbnail" alt="<?php echo $this->_tpl_vars['item']['title']; ?>
" /></a><?php endif; ?>
			<?php if ($this->_tpl_vars['item']['picture4']): ?><a href="<?php echo $this->_tpl_vars['item']['image4']; ?>
" title="<?php echo $this->_tpl_vars['item']['title']; ?>
" rel="thumbnails" class="zoom ">
			<img width="200" height="200" src="<?php echo $this->_tpl_vars['item']['imgmiddle4']; ?>
" class="attachment-shop_thumbnail" alt="<?php echo $this->_tpl_vars['item']['title']; ?>
" /></a><?php endif; ?>
			
	</div>
</div>
	<div class="summary">

		
		
		<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">

	
	<?php if ($this->_tpl_vars['item']['brand_name']): ?><p><span class="title_disc" style=""><?php echo $this->_tpl_vars['_brand']; ?>
:</span> <?php echo $this->_tpl_vars['item']['brand_name']; ?>
</p><?php endif; ?>
	<p><span class="title_disc" style=""><?php echo $this->_tpl_vars['_area']; ?>
</span> <?php echo $this->_tpl_vars['item']['area_names']; ?>
</p>

	
		<?php $_from = $this->_tpl_vars['ObjectParams']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['form'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['form']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key1'] => $this->_tpl_vars['item1']):
        $this->_foreach['form']['iteration']++;
?>
		<?php if ($this->_tpl_vars['item1']['value'] != ""): ?><p><span class="title_disc" style=""><?php echo $this->_tpl_vars['item1']['label']; ?>
</span> <?php echo $this->_tpl_vars['item1']['value']; ?>
</p><?php endif; ?>
 <?php endforeach; endif; unset($_from); ?>
	
	<br />
	<p itemprop="price" class="price"><span class="amount"><?php echo $this->_tpl_vars['item']['price']; ?>
 VNĐ</span></p>
	

	<link itemprop="availability" href="http://schema.org/InStock" />

</div>
		<div itemprop="description">


</div>
		<br />


	
	<form action="/onetouch/shop/backpack-iuter/?add-to-cart=850" class="cart" method="post" enctype='multipart/form-data'>

	 	
	 	<div class="quantity"><input id="quantity" name="quantity" data-min="1" data-max="0" value="1" size="4" title="Qty" class="input-text qty text" maxlength="12" /></div>
	 	<button onclick="getCart(<?php echo $this->_tpl_vars['item']['id']; ?>
, $('#quantity').val());" type="button" class="single_add_to_cart_button button alt"><?php echo $this->_tpl_vars['_add_to_cart']; ?>
</button>

	 	
	</form>

	


	</div>

		<div class="woocommerce_tabs">
		<ul class="tabs">
			<li class="description_tab  active">
				<a href="#tab-description"><?php echo $this->_tpl_vars['_description']; ?>
</a>
			</li>
		</ul>
		
		<div class="panel entry-content" id="tab-description">

			<p><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['content'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</p>

		</div>

	</div>

	


</div>


        
        <div class="clear"></div>


        	</div>
</div>
    </div>
    <div class="four columns">

			
			<section id="recent_products-3" class="widget-3 widget-last widget widget_recent_products"><div class="widget-inner">
			
			
			
			<h3><?php if ($this->_tpl_vars['item']['companyname']): ?>
<a href="<?php echo smarty_function_the_url(array('module' => 'space','userid' => ($this->_tpl_vars['item']['space_name'])), $this);?>
" target="_blank" title="<?php echo $this->_tpl_vars['item']['companyname']; ?>
"><?php echo $this->_tpl_vars['item']['companyname']; ?>
</a><?php else: ?><?php echo $this->_tpl_vars['_released_by_personnal']; ?>
<?php endif; ?></h3>
			
			<p>
			  <?php echo $this->_tpl_vars['_contact_people']; ?>
 <strong><?php echo $this->_tpl_vars['item']['link_people']; ?>
</strong> <br />
			  <?php echo $this->_tpl_vars['_member_type']; ?>
 <img src="<?php echo $this->_tpl_vars['MEMBER']['groupimage']; ?>
" alt="<?php echo $this->_tpl_vars['MEMBER']['groupname']; ?>
" /><br />
			  <?php echo $this->_tpl_vars['_reputation_index_n']; ?>
 <strong><?php echo $this->_tpl_vars['MEMBER']['credits']; ?>
</strong><br />
			<?php echo $this->_tpl_vars['_authentication_type']; ?>
 <strong><?php echo $this->_tpl_vars['MEMBER']['trust_image']; ?>
</strong><br />

			</p>
		</div></section>
	
	
			<section id="recent_products-3" class="widget-3 widget-last widget widget_recent_products">
				
				<div class="widget-inner">
					<h3><?php echo $this->_tpl_vars['_add_information_release']; ?>
</h3>
			<ul class="product_list_widget">
				<?php $this->_tag_stack[] = array('product', array('memberid' => ($this->_tpl_vars['item']['member_id']),'row' => 10,'name' => 'item')); $_block_repeat=true;smarty_block_product($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
					<li><?php echo $this->_tpl_vars['item']['link']; ?>

			<img width="200" height="200" src="<?php echo $this->_tpl_vars['item']['thumb']; ?>
" class="attachment-shop_thumbnail wp-post-image" alt="675476-1">
				
				<!--<del><span class="amount">&#36;<?php echo $this->_tpl_vars['item']['price']; ?>
</span></del>-->
				<ins><span class="amount">&#36;<?php echo $this->_tpl_vars['item']['price']; ?>
</span></ins>
					</li>
                    <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_product($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
				
				
			
			</ul>
		</div></section>
			
    </div>
</div>  </div>
  </div>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>