<?php /* Smarty version 2.6.27, created on 2014-05-23 10:05:14
         compiled from product.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'product.html', 41, false),array('function', 'pager', 'product.html', 131, false),array('block', 'product', 'product.html', 72, false),array('modifier', 'truncate', 'product.html', 89, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array('PageTitle' => ($this->_tpl_vars['_space_product']),'cur' => 'space_index')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="body-wrapper" class="space_wrapper" >
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



<div class="eleven columns  normal_page" id="content">


              
              <div class="row" style="margin-right: 0;">
    <div style="width: 100%;padding-left: 0; padding-right: 0" class="eleven columns">

	<div id="container">
	<div role="main" id="">
	    
	   
	    
 <div class="page-title">
	    
	    <div class="subtitle" style="margin-top: 7px;">
        <?php echo $this->_tpl_vars['_product_list']; ?>
/<?php echo $this->_tpl_vars['_services']; ?>
    </div>
	    <?php if ($this->_tpl_vars['current_cat']): ?><h2><?php echo $this->_tpl_vars['current_cat']['name']; ?>
</h2><?php endif; ?>
    <h1 style="font-size: 18px;margin: 0;padding-top: 7px;" class="page-title mainhotnew">
	<a id="new_product_but" class="hotnewlist<?php if ($_GET['order'] == 'new' || ! $_GET['order'] || $_GET['order'] == ''): ?> active<?php endif; ?>" href="<?php echo smarty_function_the_url(array('module' => 'producttype','typeid' => ($_GET['typeid']),'member_id' => ($_GET['memberid']),'userid' => ($_GET['userid']),'order' => 'new'), $this);?>
">Mới nhất</a>&nbsp;&nbsp;&nbsp;&nbsp;
      <a id="hot_product_but" class="hotnewlist<?php if ($_GET['order'] == 'popular'): ?> active<?php endif; ?>" href="<?php echo smarty_function_the_url(array('module' => 'producttype','typeid' => ($_GET['typeid']),'member_id' => ($_GET['memberid']),'userid' => ($_GET['userid']),'order' => 'popular'), $this);?>
">Nổi bật</a>&nbsp;&nbsp;&nbsp;&nbsp;
      <a id="new_service_but" class="hotnewlist<?php if ($_GET['order'] == 'product'): ?> active<?php endif; ?>" href="<?php echo smarty_function_the_url(array('module' => 'producttype','typeid' => ($_GET['typeid']),'member_id' => ($_GET['memberid']),'userid' => ($_GET['userid']),'order' => 'product'), $this);?>
"><?php echo $this->_tpl_vars['_products']; ?>
</a>&nbsp;&nbsp;&nbsp;&nbsp;
      <a id="new_service_but" class="hotnewlist<?php if ($_GET['order'] == 'service'): ?> active<?php endif; ?>" href="<?php echo smarty_function_the_url(array('module' => 'producttype','typeid' => ($_GET['typeid']),'member_id' => ($_GET['memberid']),'userid' => ($_GET['userid']),'order' => 'service'), $this);?>
"><?php echo $this->_tpl_vars['_services']; ?>
</a>&nbsp;&nbsp;&nbsp;&nbsp;
      
      
      
      <!--<a id="recentbuy_product_but" class="hotnewlist" href="#list"><?php echo $this->_tpl_vars['_recent_buy']; ?>
</a>-->
      
      </h1>

       <div id="space_search_box" <?php if ($this->_tpl_vars['pb_username'] == $this->_tpl_vars['MEMBER']['username']): ?>style="margin-top:-8px;"<?php endif; ?>>
		<form action="<?php echo $this->_tpl_vars['Menus']['product']; ?>
" method="POST">
		    <input type="submit" value="Tìm" id="search_list_but">
		    <input value="<?php echo $_POST['keyword']; ?>
" type="text" name="keyword" placeholder="Tìm kiếm (nhập tên, mã sản phẩm/dịch vụ)" />
		</form>
	    </div>

<?php if ($this->_tpl_vars['pb_username'] == $this->_tpl_vars['MEMBER']['username']): ?>
  <div class="postitem kkkk"><a target="_blank" href="redirect.php?url=/virtual-office/product.php?do=edit"><?php echo $this->_tpl_vars['_post_product']; ?>
</a>
  <a target="_blank" href="redirect.php?url=/virtual-office/product.php?do=edit%26type=service"><?php echo $this->_tpl_vars['_add_service']; ?>
</a>
  </div>
<?php endif; ?>

 </div>

			
			
			<ul class="products new_products">
				

				<?php $this->_tag_stack[] = array('product', array('name' => 'item','companyid' => ($this->_tpl_vars['COMPANY']['id']),'industryid' => ($this->_tpl_vars['indus_array']),'customid' => ($this->_tpl_vars['custom_array']),'row' => 30,'orderz' => ($_GET['order']))); $_block_repeat=true;smarty_block_product($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
						
					
				
					<li class="product <?php echo $this->_tpl_vars['item']['pos']; ?>
">
					    
					    <div class="hidden-info-list-item">
						    <a href="<?php echo smarty_function_the_url(array('id' => ($this->_tpl_vars['item']['id']),'module' => 'product'), $this);?>
">Xem chi tiết</a>
						    <!--Và liên hệ với nhà cung cấp<br />
						    <strong class='red'><?php echo $this->_tpl_vars['item']['shop_name']; ?>
</strong>-->
					    </div>

	
	<a href="<?php echo smarty_function_the_url(array('module' => 'product','id' => ($this->_tpl_vars['item']['id'])), $this);?>
" title="">

		<div class="u_p_img_box"><div class="imgout"><img alt="<?php echo $this->_tpl_vars['item']['name']; ?>
" class="attachment-shop_catalog wp-post-image" src="<?php echo $this->_tpl_vars['item']['thumb']; ?>
"></div></div>
    <div class="price_title">
		<h3><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 40) : smarty_modifier_truncate($_tmp, 40)); ?>
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

	
    </div>
	<a onclick="getCart(<?php echo $this->_tpl_vars['item']['id']; ?>
, 1, $(this))" href="javascript:void(0)" rel="nofollow" class="add_to_cart_button button product_type_simple"><?php echo $this->_tpl_vars['_add_to_cart']; ?>
</a>
	
	<div class="product_tools">
		<a class="comment_link stat_link" href="javascript:void(0)"><?php echo $this->_tpl_vars['item']['clicked']; ?>
</a>
		<a class="comment_link comment_count_li" href="<?php echo smarty_function_the_url(array('id' => ($this->_tpl_vars['item']['id']),'module' => 'product'), $this);?>
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
					
					<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_product($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
				
					
				
			</ul>

			
		
		<div class="clear"></div>


						<p><div class="pagination"><?php echo smarty_function_pager(array('rowcount' => ($this->_tpl_vars['paging']['total']),'limit' => 30), $this);?>
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













