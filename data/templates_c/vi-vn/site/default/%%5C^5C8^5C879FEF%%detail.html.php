<?php /* Smarty version 2.6.27, created on 2014-07-04 10:19:32
         compiled from default%5Coffers/detail.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'default\\offers/detail.html', 95, false),array('function', 'formhash', 'default\\offers/detail.html', 222, false),array('modifier', 'truncate', 'default\\offers/detail.html', 278, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/header.html", 'smarty_include_vars' => array('page_title' => ($this->_tpl_vars['Trade']['name'])." - MarketOnline.vn",'nav_id' => ($this->_tpl_vars['nav_id']))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="body-wrapper" >
<div id="body-wrapper-padding" class="product_detail_page">

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


<?php echo '
	<script>
		$(document).ready(function() {
			if ($.cookie("guest_name") && $.cookie("guest_email")) {
				$(\'input[name="box_guest_name"]\').val($.cookie("guest_name"));
				$(\'input[name="box_guest_email"]\').val($.cookie("guest_email"));
			}
			if($(\'input[name="box_guest_name"]\').val() != \'\' && $(\'input[name="box_guest_name"]\').val() != \'\')
			{
				$(\'#guest_name\').val($(\'input[name="box_guest_name"]\').val());
				$(\'#guest_email\').val($(\'input[name="box_guest_email"]\').val());
				$(\'.guest_info\').html(\'<strong>\'+$(\'#guest_name\').val()+\'</strong> (\'+$(\'#guest_email\').val()+\') | <a class="change_guest_info" href="javascript:void(0)">Chỉnh sửa</a> - <a class="delete_guest_info" href="javascript:void(0)">Thoát</a>\');
			}			
		
			$(\'.left-offerbox a img\').css("display", "none");
			  $(\'.left-offerbox a img\').eq(0).addClass("active");
			  
			  $(\'.offer_content_inner .left-offerbox span.next\').click(function() {
			    $(\'.left-offerbox a img\').each(function() {
			      if ($(this).hasClass("active")) {				     
				$(this).removeClass("active");
				if ($(this).next().length) {
				  $(this).next().addClass("active");
				}
				else
				{
				  $(\'.left-offerbox a img\').eq(0).addClass("active");
				}					
				return false;
			      }
			    });
			  });
			  $(\'.offer_content_inner .left-offerbox span.previous\').click(function() {
			    $(\'.left-offerbox a img\').each(function() {
			      if ($(this).hasClass("active")) {				     
				$(this).removeClass("active");
				if ($(this).prev().length) {
				  $(this).prev().addClass("active");
				}
				else
				{
				  $(\'.left-offerbox a img:last-child\').addClass("active");
				}					
				return false;
			      }
			    });
			  });
			  
			  $(\'.left-offerbox a\').click(function() {
			    $(\'.offer_content_inner .left-offerbox span.next\').trigger("click");
			  });
			  
			  
			  
			  //$(\'.offer_transform ul.products li.product[rel="\'+id+\'"]\').removeClass(\'loading\');
			  
			  if ($(\'.left-offerbox img\').length < 2) {
				$(\'.left-offerbox span\').remove();
			  }
			  
			  
			  loadOfferComment();
			  
			  $(\'#comment\').val($.cookie("comment_tpm"));
		
		});
	</script>
'; ?>



<div class="row">
  <div class="fifteen columns" style="padding-left: 0">

    <div id="page-title" class="connect_ptitle" style="padding-left: 110px">

    <div class="super-main-category mainproductpage market">
		<div class="show-but">
			Chuyên mục chính
			
		</div>
		<a href="<?php echo smarty_function_the_url(array('module' => 'offer_main'), $this);?>
" class="show-but current-but market">
			.			
		</a>
		<br style="clear:both" />
		<div class="main-cat-content-out">
			<span class="pointer_topmenuz">.</span>
			<div class="main-cat-content"></div>
		</div>
	</div>
    
    <div class="subtitle">Thương mại / <?php echo $this->_tpl_vars['Trade']['typename']; ?>
</div>
    

    <div class="breadcrumbs"><a href="<?php echo $this->_tpl_vars['SiteUrl']; ?>
"><?php echo $this->_tpl_vars['_home_page']; ?>
</a> <span class="delim">/</span><a href="<?php echo smarty_function_the_url(array('module' => 'offer_main'), $this);?>
">Thương mại</a> <span class="delim">/</span><?php echo $this->_tpl_vars['Trade']['industry_names']; ?>
</div>

    <h1 class="page-title"><?php echo $this->_tpl_vars['Trade']['name']; ?>
</h1>
    
  </div>

  </div>
</div>



<div id="detail_box" class="row">
	<div id="offer_detail_box" class="product offer_detail_page">
		
		
		<div class="offer_content_inner" style="">
			 
			<div class="left-offerbox">
				<a href="javascript:void(0)">
					<?php if ($this->_tpl_vars['Trade']['image']): ?><img src="<?php echo $this->_tpl_vars['Trade']['image']; ?>
" /><?php endif; ?>
                                        <?php if ($this->_tpl_vars['Trade']['image1']): ?><img src="<?php echo $this->_tpl_vars['Trade']['image1']; ?>
" /><?php endif; ?>
                                        <?php if ($this->_tpl_vars['Trade']['image2']): ?><img src="<?php echo $this->_tpl_vars['Trade']['image2']; ?>
" /><?php endif; ?>
                                        <?php if ($this->_tpl_vars['Trade']['image3']): ?><img src="<?php echo $this->_tpl_vars['Trade']['image3']; ?>
" /><?php endif; ?>
                                        <?php if ($this->_tpl_vars['Trade']['image4']): ?><img src="<?php echo $this->_tpl_vars['Trade']['image4']; ?>
" /><?php endif; ?>					
				</a>
				<span class="next">.</span>
				<span class="previous">.</span>
			</div>
			
			<div class="right-offerbox">
				<div class="member-title">
						
						
			<?php if ($this->_tpl_vars['company']): ?>
						
					<div class="avatar">
						<a class="pic" href="<?php echo $this->_tpl_vars['company']['url']; ?>
"><img src="<?php echo $this->_tpl_vars['company']['logo']; ?>
" /></a>
						<?php if ($this->_tpl_vars['pb_username'] != ""): ?>
							<a class="chat_with_owner <?php if ($this->_tpl_vars['member']['online']): ?>online<?php endif; ?>" onclick="getChatboxNew('<?php echo $this->_tpl_vars['Trade']['member_id']; ?>
x<?php echo $this->_tpl_vars['member']['membertype_id']; ?>
', false)" href="javascript:void(0)">Tin nhắn</a>
						<?php else: ?>
							<a onclick="" href="#login-box" class="chat_with_owner <?php if ($this->_tpl_vars['member']['online']): ?>online<?php endif; ?> comment_but">Nhắn tin</a>
						<?php endif; ?>
					</div>
					<h2><a href="<?php echo $this->_tpl_vars['company']['url']; ?>
"><?php echo $this->_tpl_vars['company']['shop_name']; ?>
</a></h2>
					<?php if ($this->_tpl_vars['company']['link_man']): ?>
						<p>
							<label>Liên hệ</label>:
							<?php echo $this->_tpl_vars['company']['link_man']; ?>

						</p>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['company']['contact_mobile']): ?>
						<p>
							<label>Di động</label>:
							<?php echo $this->_tpl_vars['company']['contact_mobile']; ?>

						</p>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['company']['contact_email']): ?>
						<p>
							<label>Email</label>:
							<?php echo $this->_tpl_vars['company']['contact_email']; ?>

						</p>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['company']['address']): ?>
						<p>
							<label>Địa chỉ</label>:
							<?php echo $this->_tpl_vars['member']['address']; ?>

						</p>
					<?php endif; ?>
			<?php else: ?>
			
						<div class="avatar">
						<img src="<?php echo $this->_tpl_vars['member']['photo']; ?>
" />
						<a onclick="" href="#login-box" class="chat_with_owner online comment_but">Nhắn tin</a>
					</div>
					<h2><?php echo $this->_tpl_vars['member']['name']; ?>
</h2>
					
					<?php if ($this->_tpl_vars['member']['mobile']): ?>
						<p>
							<label>Điện thoại</label>:
							<?php echo $this->_tpl_vars['member']['mobile']; ?>

						</p>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['member']['email']): ?>
						<p>
							<label>Email</label>:
							<?php echo $this->_tpl_vars['member']['email']; ?>

						</p>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['member']['address']): ?>
						<p>
							<label>Địa chỉ</label>:
							<?php echo $this->_tpl_vars['member']['address']; ?>

						</p>
					<?php endif; ?>
			<?php endif; ?>
						
						
					
						
				</div>
				<br style="clear: both" />
				<br />
				<div class="detail-comments">
					<h4><?php echo $this->_tpl_vars['_comments']; ?>
 (<span class="comment_count"><?php echo $this->_tpl_vars['comments_count']; ?>
</span>)</h4>
					
					<div class="comments-box">
					
						<div class="comments_list">
							
						</div>
					
						<?php if ($this->_tpl_vars['pb_username'] != ""): ?>
							<form name="productaddfrm" class="productaddfrm" id="Frm1" method="post" action="<?php echo smarty_function_the_url(array('module' => 'products','action' => 'postoffercomment','id' => ($this->_tpl_vars['item']['id'])), $this);?>
" onsubmit="$('#Save').attr('disabled',true);">
								<img src="<?php if ($this->_tpl_vars['pb_company']): ?><?php echo $this->_tpl_vars['pb_company']['image']; ?>
<?php else: ?>  <?php if ($this->_tpl_vars['user_avatar']): ?> <?php echo $this->_tpl_vars['user_avatar']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['theme_img_path']; ?>
image/usericon_big.png  <?php endif; ?> <?php endif; ?>" />
								<?php echo smarty_function_formhash(array(), $this);?>

								<input type="hidden" id="pid" name="data[id]" value="<?php echo $this->_tpl_vars['Trade']['id']; ?>
" />
								<textarea id="comment" name="data[content]"></textarea>
								
								<!--<input type="button" id="postcmm" value="<?php echo $this->_tpl_vars['_send']; ?>
" onclick="postComment()" />-->
							</form>
						<?php else: ?>
							<form name="productaddfrm" class="productaddfrm" id="Frm1" method="post" action="<?php echo smarty_function_the_url(array('module' => 'products','action' => 'postoffercomment','id' => ($this->_tpl_vars['item']['id'])), $this);?>
" onsubmit="$('#Save').attr('disabled',true);">
									<img src="<?php if ($this->_tpl_vars['pb_company']): ?><?php echo $this->_tpl_vars['pb_company']['image']; ?>
<?php else: ?>  <?php if ($this->_tpl_vars['user_avatar']): ?> <?php echo $this->_tpl_vars['user_avatar']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['theme_img_path']; ?>
image/usericon_big.png  <?php endif; ?> <?php endif; ?>" />
									<?php echo smarty_function_formhash(array(), $this);?>

									<input type="hidden" id="pid" name="data[id]" value="<?php echo $this->_tpl_vars['Trade']['id']; ?>
" />
									<input type="hidden" id="guest_name" name="data[guest_name]" value="" />
									<input type="hidden" id="guest_email" name="data[guest_email]" value="" />
									<input type="hidden" id="guest_isedit" name="guest_isedit" value="0" />
									<textarea id="comment" name="data[content]"></textarea> <span class="guest_info"></span>
							</form>
						<?php endif; ?>
					
					</div>
				</div>
				
				
			</div>
			 
		</div>		
		
		<div class="detail-info">
			<h1><?php echo $this->_tpl_vars['Trade']['name']; ?>
</h1>
			<div class="description">
				<?php echo $this->_tpl_vars['Trade']['content']; ?>

			</div>
		</div>
	</div>
	
	
	<!--<div id="right_detail_banner">
		<div class="inner">
		    <div class="detail_box_content">
			aaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaa 
			
		    </div>
		</div>
	</div>-->
	
	<div class="middle-bottom-line" style="clear: both"></div>
	<p></p>
	<h3 class="related_bottom_h3"><?php echo $this->_tpl_vars['Trade']['typename']; ?>
 mới</h3>
	<div class="related_products_bottom">	
		<ul>
			
			<?php $_from = $this->_tpl_vars['bottom_related_products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['levelvv'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['levelvv']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['keyvv'] => $this->_tpl_vars['itemvv']):
        $this->_foreach['levelvv']['iteration']++;
?>
				<li class="">
					<a href="<?php echo smarty_function_the_url(array('module' => 'offers','id' => ($this->_tpl_vars['itemvv']['id']),'title' => ($this->_tpl_vars['itemvv']['title'])), $this);?>
" title="<?php echo $this->_tpl_vars['itemvv']['title']; ?>
">
						<div class="img_box">
							<img title="<?php echo $this->_tpl_vars['itemvv']['title']; ?>
" alt="<?php echo $this->_tpl_vars['itemvv']['title']; ?>
" src="<?php echo $this->_tpl_vars['itemvv']['thumb']; ?>
" />
						</div>
						<?php echo ((is_array($_tmp=$this->_tpl_vars['itemvv']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 45) : smarty_modifier_truncate($_tmp, 45)); ?>

					</a>
					<?php if ($this->_tpl_vars['itemvv']['new_price'] || $this->_tpl_vars['itemvv']['price']): ?>
						<?php if ($this->_tpl_vars['itemvv']['new_price'] != "" && $this->_tpl_vars['itemvv']['new_price'] != 0): ?>
							<span class="price"><?php if ($this->_tpl_vars['itemvv']['price']): ?><span class="old_price"><?php echo $this->_tpl_vars['itemvv']['price']; ?>
 <span class="price_unit">VNĐ<?php if ($this->_tpl_vars['itemvv']['price_unit']): ?>/<?php echo $this->_tpl_vars['itemvv']['price_unit']; ?>
<?php endif; ?></span></span><?php endif; ?> <span class="amount"><?php echo $this->_tpl_vars['itemvv']['new_price']; ?>
</span> <span class="price_unit">VNĐ<?php if ($this->_tpl_vars['itemvv']['price_unit']): ?>/<?php echo $this->_tpl_vars['itemvv']['price_unit']; ?>
<?php endif; ?></span></span> <?php if ($this->_tpl_vars['itemvv']['price_note']): ?><span class="noteprice">(<?php echo $this->_tpl_vars['itemvv']['price_note']; ?>
)</span><?php endif; ?>
						<?php else: ?>
							<span class="price"><span class="amount"><?php echo $this->_tpl_vars['itemvv']['price']; ?>
</span> <span class="price_unit">VNĐ<?php if ($this->_tpl_vars['itemvv']['price_unit']): ?>/<?php echo $this->_tpl_vars['itemvv']['price_unit']; ?>
<?php endif; ?></span></span>
						<?php endif; ?>
					<?php endif; ?>
				</li>
			<?php endforeach; endif; unset($_from); ?>
			
		</ul>
	</div>
	
</div>

</div>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>