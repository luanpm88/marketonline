<?php /* Smarty version 2.6.27, created on 2014-04-29 14:34:34
         compiled from default/product/detail.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'default/product/detail.html', 51, false),array('function', 'formhash', 'default/product/detail.html', 570, false),array('modifier', 'truncate', 'default/product/detail.html', 729, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/header.html", 'smarty_include_vars' => array('page_title' => ($this->_tpl_vars['page_title']),'nav_id' => ($this->_tpl_vars['nav_id']))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
<style>
	.fancybox-skin
	{
		padding: 0px !important;
	}
</style>

<script type="application/x-javascript">
	
	function postComment()
	{
		valid = true;
		var guest_string = \'\';
		if (!$(\'#comment\').val().trim()) {
			$(\'#comment\').addClass(\'invalid\');
			$(\'#comment\').focus();
			$(\'#comment\').val("");
			valid = false;
		}
		else
		{
			$(\'#comment\').removeClass(\'invalid\');
		}
		
		//check guest
		if($(\'#guest_name\').length)
		{			
			if($(\'#guest_name\').val() == \'\' || $(\'#guest_email\').val() == \'\')
			{		
				$(\'#guest_isedit\').val("1");
				$("#guestbox-but").trigger("click");
				//$(\'input[name="box_guest_name"]\').focus();
				valid = false;
			}
			else
			{
				guest_string = \'&data[guest_name]=\'+$(\'#guest_name\').val()+\'&data[guest_email]=\'+$(\'#guest_email\').val();
			}
		}

		if (valid) {
			$(\'#comments\').addClass(\'cloading\');
			$("#comment").prop(\'disabled\', true);				
			//alert(encodeURI($(\'#comment\').val()));
			$.cookie("comment_tpm", null);
			$.ajax({
				type: "POST",
				url: "'; ?>
<?php echo smarty_function_the_url(array('module' => 'products','action' => 'postcomment','id' => ($this->_tpl_vars['item']['id'])), $this);?>
<?php echo '",
				encoding: "UTF-8",
				data: "data[content]="+encodeURI($(\'#comment\').val())+"&formhash="+$(\'#FormHash\').val()+"&data[id]='; ?>
<?php echo $this->_tpl_vars['item']['id']; ?>
<?php echo '"+guest_string
			}).done(function ( data ) {
				if( console && console.log ) {
					//alert(data);
					$(\'#comm-list\').html(data);
					
					
					
					$(".comment_list").mCustomScrollbar({
						autoHideScrollbar:true,
						theme:"light-thin",
						scrollSpeed: 40
					});
					
					$(\'#comments\').removeClass(\'cloading\');
					$(\'#comment\').val("");
					$("#comment").prop(\'disabled\', false);
					
					getInbox();
				}
			});
		}
	}
	
	function loadComment()
	{
		$(\'#comments\').addClass(\'cloading\');
		$.ajax({
				type: "POST",
				url: "'; ?>
<?php echo smarty_function_the_url(array('module' => 'products','action' => 'postcomment','id' => ($this->_tpl_vars['item']['id'])), $this);?>
<?php echo '",
				data: "id='; ?>
<?php echo $this->_tpl_vars['item']['id']; ?>
<?php echo '"
			}).done(function ( data ) {
				if( console && console.log ) {
					//alert("ddd");
					$(\'#comm-list\').html(data);		
					
					
					$(\'#comments\').removeClass(\'cloading\');
					
					if (window.location.hash == "#comment_pos") {
						$(\'#comment_link\').trigger("click");
					}
					
					if (!$(\'#comments .mCSB_container\').length) {
						$(".comment_list").mCustomScrollbar({
							autoHideScrollbar:true,
							theme:"light-thin",
							scrollSpeed: 40
						});
					}
					//$(\'#comments\').css("display","none");
					
					
				}
			});
	}
    
	function loadAnnouceBox() {
		
		$.ajax({
			url: "space/?userid='; ?>
<?php echo $this->_tpl_vars['MEMBER']['space_name']; ?>
<?php echo '&do=ajaxannoucebox",
		}).done(function ( data ) {
			if( console && console.log ) {
				//alert(data);
				$(\'#annouce_box\').html(data);
				//$(\'.tooltipz\').tooltipster({fixedWidth: 300,
				//    position: \'right\'});
			    }
		});
	}
	
	function follow(shopid, but) {
		$(but).addClass("following");
		var temp = $(but).html();
		$(but).html("'; ?>
<?php echo $this->_tpl_vars['_following']; ?>
<?php echo '");
		$.ajax({
			url: "index.php?do=product&action=ajaxFollow&shopid="+shopid,
		}).done(function ( data ) {
			if( console && console.log ) {
			    //alert(data);
				if(data == "1")
				{
				    $(but).removeClass("following");
				    $(but).addClass("followed");
				    $(but).attr("title", "'; ?>
<?php echo $this->_tpl_vars['_unfollow']; ?>
<?php echo '");
				    $(but).html("'; ?>
<?php echo $this->_tpl_vars['_followed']; ?>
<?php echo '");
				}
				else
				{
				    $(but).removeClass("following");
				    $(but).removeClass("followed");
				    $(but).attr("title", "'; ?>
<?php echo $this->_tpl_vars['_postfollow']; ?>
<?php echo '");
				    $(but).html("'; ?>
<?php echo $this->_tpl_vars['_follow']; ?>
<?php echo '");
				}
			    }
		});
		
		
	}
	
    
    
	$(document).ready(function() {
		$("#edit_banner a").fancybox({
			\'padding\': 0,
			\'zoomOpacity\': true,
			\'zoomSpeedIn\': 500,
			\'zoomSpeedOut\': 500,
			\'overlayOpacity\': 0.75,
			\'frameWidth\': 530,
			\'frameHeight\': 400,
			\'hideOnContentClick\': false
		});
		
		loadAnnouceBox();
		
		loadComment();
		$(\'#comment\').keydown(function(event) {
			if (event.keyCode == 13) {
				//event.preventDefault();
				//postComment();				
			}
		});
		
		$(\'#comment\').keypress(function(event) {
			$.cookie("comment_tpm", $(\'#comment\').val());
			if (event.keyCode == 13) {				
				event.preventDefault();
				postComment();
			}
		});
		
		//$(".comment_list").mCustomScrollbar({
		//	autoHideScrollbar:true,
		//	theme:"light-thin",
		//	scrollSpeed: 40
		//});
		
		$(\'#comment_link\').click(function() {
			//$(\'#comments\').toggle();
			
			if (!$(\'.woocommerce_tabs .mCSB_container\').length) {
						$(".comment_list").mCustomScrollbar({
							autoHideScrollbar:true,
							theme:"light-thin",
							scrollSpeed: 40
						});
					}
		});	
		
		
		//Products Detail Tab
                $(\'.woocommerce_tabs .tabs li\').click(function(event) {
                    event.preventDefault();
                    
                    $(\'.woocommerce_tabs .panel\').css("display","none");
                    $($(this).find(\'a\').attr(\'href\')).css("display","block");
                });
                
		
		
		
			
		//$.cookie("welcome", "cookie_value");
		//alert($.cookie("welcssome"));
		
		
	});
</script>

	'; ?>







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


<div class="row">
    <div class="fifteen columns" id="page-title">
        <a class="back" href="javascript:history.back()"></a>
        <div class="subtitle">
            
                        <p><?php if ($this->_tpl_vars['item']['service']): ?><?php echo $this->_tpl_vars['_services']; ?>
<?php else: ?><?php echo $this->_tpl_vars['_products']; ?>
<?php endif; ?></p>
        </div>
        

        <?php if ($this->_tpl_vars['item']['service']): ?>
		<div class="breadcrumbs"><a href="<?php echo $this->_tpl_vars['SiteUrl']; ?>
"><?php echo $this->_tpl_vars['_home_page']; ?>
</a> <span class="delim">/</span><a href="<?php echo smarty_function_the_url(array('module' => 'service_main'), $this);?>
">Dịch vụ</a> <span class="delim">/</span><?php echo $this->_tpl_vars['item']['industry_service_names']; ?>
 </div>
	<?php else: ?>
		<div class="breadcrumbs"><a href="<?php echo $this->_tpl_vars['SiteUrl']; ?>
"><?php echo $this->_tpl_vars['_home_page']; ?>
</a> <span class="delim">/</span><a href="<?php echo smarty_function_the_url(array('module' => 'product_main'), $this);?>
">Sản phẩm</a> <span class="delim">/</span><?php echo $this->_tpl_vars['item']['industry_names']; ?>
 </div>
	<?php endif; ?>
	
	<h1 class="page-title">
                        <?php echo $this->_tpl_vars['item']['title']; ?>

	</h1>
	<?php if ($this->_tpl_vars['pb_username'] != ""): ?>
  <div class="postitem">
	<a target="_blank" href="redirect.php?url=/virtual-office/product.php?do=edit"><?php echo $this->_tpl_vars['_post_product']; ?>
</a>
	<a target="_blank" href="redirect.php?url=/virtual-office/product.php?do=edit%26type=service"><?php echo $this->_tpl_vars['_add_service']; ?>
</a>
  </div>
<?php else: ?>
  <div class="postitem"><a href="redirect.php?url=/logging.php"><?php echo $this->_tpl_vars['_post_product']; ?>
</a>
  <a target="_blank" href="redirect.php?url=/logging.php"><?php echo $this->_tpl_vars['_add_service']; ?>
</a></div>
<?php endif; ?>



    </div>
    
    
    <div class="fifteen columns" style="margin-top: -5px;"><div class="line"></div></div>
</div>


<div class="row" id="detail_box">
    
    
    
    
    
    
    <div id="product_detail_box" class="product">
    
	<div id="detail_box_top">
	    
	    <table id="three_box_detail" class="" cellspacing="0" style="background: #EFEFEF; border: none; padding-right: 5px;margin-bottom: 5px;">
		<tr>
		    <td class="imgg">
			
			
				<div class="images">
					<?php if ($this->_tpl_vars['item']['d_image']): ?>
						<!--<a itemprop="image" href="<?php echo $this->_tpl_vars['item']['d_image']; ?>
" class="zoomz fancyx" rel="thumbnails" title="<?php echo $this->_tpl_vars['item']['title']; ?>
"><img width="313" height="418" src="<?php echo $this->_tpl_vars['item']['d_image']; ?>
" class="attachment-shop_single wp-post-image" alt="<?php echo $this->_tpl_vars['item']['title']; ?>
"></a>-->
						<!--<div class="detailtopconleft">
							<p class="left1"><img src="<?php echo $this->_tpl_vars['item']['image']; ?>
" alt="" width="80" height="80" /></p>
							<p class="left2"><a href="misc.php?source=<?php echo $this->_tpl_vars['item']['image_url']; ?>
" target="_blank"><img src="<?php echo $this->_tpl_vars['theme_img_path']; ?>
images/detail_17.jpg" alt="" /></a><span><?php echo $this->_tpl_vars['_enlarge_image']; ?>
</span></p>
						</div>-->
						<a itemprop="image" href="<?php echo $this->_tpl_vars['item']['d_image']; ?>
" class="fancyx" rel="thumbnails" title="<?php echo $this->_tpl_vars['item']['title']; ?>
">
						<ul id="example2">
							<li>
								<img class="etalage_thumb_image" src="<?php echo $this->_tpl_vars['item']['d_imgsmall']; ?>
" />
								<img class="etalage_source_image" src="<?php echo $this->_tpl_vars['item']['d_image']; ?>
" />
							</li>
						</ul>
						</a>
					<?php endif; ?>
				
					
			
				
				<div class="thumbnails">
					<?php if ($this->_tpl_vars['item']['picture'] && $this->_tpl_vars['item']['d_image'] != $this->_tpl_vars['item']['image']): ?><a href="<?php echo $this->_tpl_vars['item']['image']; ?>
" title="<?php echo $this->_tpl_vars['item']['title']; ?>
" rel="thumbnails" class="zoomz first fancyx">
						<img width="200" height="200" src="<?php echo $this->_tpl_vars['item']['imgsmall']; ?>
" class="attachment-shop_thumbnail" alt="<?php echo $this->_tpl_vars['item']['title']; ?>
" /></a>
						<?php endif; ?>
					<?php if ($this->_tpl_vars['item']['picture1'] && $this->_tpl_vars['item']['d_image'] != $this->_tpl_vars['item']['image1']): ?><a href="<?php echo $this->_tpl_vars['item']['image1']; ?>
" title="<?php echo $this->_tpl_vars['item']['title']; ?>
" rel="thumbnails" class="zoomz first fancyx">
						<img width="200" height="200" src="<?php echo $this->_tpl_vars['item']['imgsmall1']; ?>
" class="attachment-shop_thumbnail" alt="<?php echo $this->_tpl_vars['item']['title']; ?>
" /></a>
						<?php endif; ?>
					<?php if ($this->_tpl_vars['item']['picture2'] && $this->_tpl_vars['item']['d_image'] != $this->_tpl_vars['item']['image2']): ?><a href="<?php echo $this->_tpl_vars['item']['image2']; ?>
" title="<?php echo $this->_tpl_vars['item']['title']; ?>
" rel="thumbnails" class="zoomz fancyx">
						<img width="200" height="200" src="<?php echo $this->_tpl_vars['item']['imgsmall2']; ?>
" class="attachment-shop_thumbnail" alt="<?php echo $this->_tpl_vars['item']['title']; ?>
" /></a>
						<?php endif; ?>
					<?php if ($this->_tpl_vars['item']['picture3'] && $this->_tpl_vars['item']['d_image'] != $this->_tpl_vars['item']['image3']): ?><a href="<?php echo $this->_tpl_vars['item']['image3']; ?>
" title="<?php echo $this->_tpl_vars['item']['title']; ?>
" rel="thumbnails" class="zoomz fancyx">
						<img width="200" height="200" src="<?php echo $this->_tpl_vars['item']['imgsmall3']; ?>
" class="attachment-shop_thumbnail" alt="<?php echo $this->_tpl_vars['item']['title']; ?>
" /></a>
						<?php endif; ?>
					<?php if ($this->_tpl_vars['item']['picture4'] && $this->_tpl_vars['item']['d_image'] != $this->_tpl_vars['item']['image4']): ?><a href="<?php echo $this->_tpl_vars['item']['image4']; ?>
" title="<?php echo $this->_tpl_vars['item']['title']; ?>
" rel="thumbnails" class="zoomz fancyx">
						<img width="200" height="200" src="<?php echo $this->_tpl_vars['item']['imgsmall4']; ?>
" class="attachment-shop_thumbnail" alt="<?php echo $this->_tpl_vars['item']['title']; ?>
" /></a>
						<?php endif; ?>
						
				</div>
			</div>
			
		    </td>
		    <td style="width: 34%">
			
			<div class="summary">

				    <div class="sum_top">
					<?php if ($this->_tpl_vars['item']['service']): ?><service class="service_title"><span><?php echo $this->_tpl_vars['_services']; ?>
</span> <?php echo $this->_tpl_vars['item']['industry_name']; ?>
</service><?php endif; ?>
					<div class="top_left_info" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
			
				
				<?php if ($this->_tpl_vars['item']['brand_name']): ?><p><span class="title_disc" style=""><?php echo $this->_tpl_vars['_brand']; ?>
</span> <?php echo $this->_tpl_vars['item']['brand_name']; ?>
</p><?php endif; ?>
				<?php if ($this->_tpl_vars['item']['market']): ?><p><span class="title_disc" style=""><?php echo $this->_tpl_vars['_market']; ?>
</span> <?php echo $this->_tpl_vars['item']['market']; ?>
</p><?php endif; ?>
				<?php if ($this->_tpl_vars['item']['product_code']): ?><p><span class="title_disc" style=""><?php echo $this->_tpl_vars['_product_code']; ?>
</span> <?php echo $this->_tpl_vars['item']['product_code']; ?>
</p><?php endif; ?>
				<?php if (false): ?><p><span class="title_disc" style=""><?php echo $this->_tpl_vars['_area_tt']; ?>
</span> <?php echo $this->_tpl_vars['item']['area_names']; ?>
</p><?php endif; ?>
			
				
					<?php $_from = $this->_tpl_vars['ObjectParams']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['form'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['form']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key1'] => $this->_tpl_vars['item1']):
        $this->_foreach['form']['iteration']++;
?>
					<?php if ($this->_tpl_vars['item1']['value']): ?><p style="clear: both"><span class="title_disc" style=""><?php echo $this->_tpl_vars['item1']['label']; ?>
</span> <?php echo $this->_tpl_vars['item1']['value']; ?>
</p><?php endif; ?>
			 <?php endforeach; endif; unset($_from); ?>
				
			
				<p itemprop="price" class="price">
					<?php if ($this->_tpl_vars['item']['new_price'] || $this->_tpl_vars['item']['price']): ?>					
						<?php if ($this->_tpl_vars['item']['new_price'] != "" && $this->_tpl_vars['item']['new_price'] != 0): ?>
							<?php if ($this->_tpl_vars['item']['price']): ?><span class="old_price"><?php echo $this->_tpl_vars['item']['price']; ?>
 <span class="price_unit">VNĐ<?php if ($this->_tpl_vars['item']['price_unit']): ?>/<?php echo $this->_tpl_vars['item']['price_unit']; ?>
<?php endif; ?></span></span><?php endif; ?> <span class="amount"><?php echo $this->_tpl_vars['item']['new_price']; ?>
 </span><span class="price_unit">VNĐ<?php if ($this->_tpl_vars['item']['price_unit']): ?>/<?php echo $this->_tpl_vars['item']['price_unit']; ?>
<?php endif; ?></span> <?php if ($this->_tpl_vars['item']['price_note']): ?><span class="noteprice">(<?php echo $this->_tpl_vars['item']['price_note']; ?>
)</span><?php endif; ?>
						<?php else: ?>
							<span class="amount"><?php echo $this->_tpl_vars['item']['price']; ?>
 <span class="price_unit">VNĐ<?php if ($this->_tpl_vars['item']['price_unit']): ?>/<?php echo $this->_tpl_vars['item']['price_unit']; ?>
<?php endif; ?></span></span>
						<?php endif; ?>
					<?php endif; ?>
				</p>
			
			
				<link itemprop="availability" href="http://schema.org/InStock" />
			
			</div>
					<div itemprop="description">
			
			
			</div>
			
			
			
				
				<form style="padding-top: 6px;clear: both" action="/onetouch/shop/backpack-iuter/?add-to-cart=850" class="cart" method="post" enctype='multipart/form-data' id="comment_pos">
			
					<button onclick="getCart(<?php echo $this->_tpl_vars['item']['id']; ?>
, $('#quantity').val(), $(this));" type="button" class="single_add_to_cart_button button alt"><?php echo $this->_tpl_vars['_add_to_cart']; ?>
</button>
					<div class="quantity">
					    <input id="quantity" name="quantity" data-min="1" data-max="0" value="1" size="4" title="Qty" class="input-text qty text" maxlength="12" />
					</div>
					
					<?php if ($this->_tpl_vars['item']['tag']): ?><p class="keywords"><label>Từ khóa tìm kiếm: </label><?php echo $this->_tpl_vars['item']['tag']; ?>
</p><?php endif; ?>
					
				</form>

				<a class="" title="" onclick="<?php if (! $this->_tpl_vars['FACE']): ?>goclicky(this, '<?php echo $this->_tpl_vars['F_URL']; ?>
#welcomenew')<?php else: ?>goclicky_custom(this, '<?php echo $this->_tpl_vars['F_URL']; ?>
#welcomenew', '<?php echo $this->_tpl_vars['FACE']['images']; ?>
', '<?php echo $this->_tpl_vars['FACE']['title']; ?>
', '<?php echo $this->_tpl_vars['FACE']['summary']; ?>
')<?php endif; ?>" href="javascript:void(0)">
					<span class="at15t_facebookz">
						<span class="">Share on facebook</span>
					</span>
				</a>
				<div class="share_buts">
					
				  <!-- AddThis Button BEGIN -->
				<?php echo '
					<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
					<!--<a class="addthis_button_facebook"></a>-->
					<a class="addthis_button_twitter"></a>
					<a class="addthis_button_google_plusone_share"></a>
					<a class="addthis_button_compact"></a><a class="addthis_counter addthis_bubble_style"></a>
					</div>
					<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
					<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-520993b51c3b7da7"></script>
				'; ?>

				<!-- AddThis Button END -->
			</div>
			
			
				
				    </div>
				
				    
				
				</div>
			
			
			
		    </td>
		    <td style="min-width:254px">
			
			
			    
			    <div id="shop_info">
			
				
				<section style="background:none; margin-bottom: 0" id="recent_products-3" class="widget-3 widget-last widget widget_recent_products"><div class="widget-inner">
					
					
					<?php if ($this->_tpl_vars['item']['shop_name']): ?>			
								
					<div class="logo_box_u">
					<div class="four columns logo logoz">
					    
					
					    <a href="<?php echo smarty_function_the_url(array('module' => 'space','userid' => ($this->_tpl_vars['item']['space_name'])), $this);?>
" title="Vào xem gian hàng <br><strong class='red'><?php echo $this->_tpl_vars['COMPANY']['shop_name']; ?>
</strong>">
						<img class="klbox" alt="<?php echo $this->_tpl_vars['COMPANY']['name']; ?>
" src="<?php echo $this->_tpl_vars['COMPANY']['logo']; ?>
"></a>
					  </div>
					  <div id="TopMenuCat">
					    <div class="childcat">
						<img class="" src="<?php echo $this->_tpl_vars['MEMBER']['groupimage']; ?>
" alt="<?php echo $this->_tpl_vars['MEMBER']['groupname']; ?>
" /><br />(<?php echo $this->_tpl_vars['COMPANY']['clicked']; ?>
)
					    </div>
					    <div style="margin-top: 5px;" class="childcat">
						<span><a href="<?php echo smarty_function_the_url(array('module' => 'space','userid' => ($this->_tpl_vars['item']['space_name'])), $this);?>
#chinh-sach">Chính sách<br><span style="font-size: 13px;font-weight: bold;background: none"><?php if ($this->_tpl_vars['MEMBER']['membergroup_id'] == 2): ?><?php echo $this->_tpl_vars['_member_person']; ?>
 <span style='font-weight:normal;background: none'>(<?php echo $this->_tpl_vars['_personal']; ?>
)</span><?php endif; ?><?php if ($this->_tpl_vars['MEMBER']['membergroup_id'] == 3): ?><?php echo $this->_tpl_vars['_member_company']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['MEMBER']['membergroup_id'] == 1): ?><?php echo $this->_tpl_vars['_member_shop']; ?>
<?php endif; ?></span></a></span>
					    </div>
					    
					  </div>
					</div>			
								
					<?php endif; ?>			
								
								<!--<h5>Chủ Shop</h5>-->
						<div class="red_box">
								<h3 class="shop_name" style=""><?php if ($this->_tpl_vars['item']['shop_name']): ?>
					<a href="<?php echo smarty_function_the_url(array('module' => 'space','userid' => ($this->_tpl_vars['item']['space_name'])), $this);?>
" title="Vào xem gian hàng <br><strong class='red'><?php echo $this->_tpl_vars['item']['shop_name']; ?>
</strong>"><?php echo $this->_tpl_vars['item']['shop_name']; ?>
</a><?php else: ?><?php echo $this->_tpl_vars['_released_by_personnal']; ?>
<?php endif; ?></h3>
								
						
								    <table class="box_info_col">
									<tr>
									    <th>Liên hệ:</th>
									    <td><?php echo $this->_tpl_vars['item']['link_people']; ?>
</td>
									</tr>
									<tr>
									    <th><?php echo $this->_tpl_vars['_phone']; ?>
:</th>
									    <td><?php echo $this->_tpl_vars['COMPANY']['contact_mobile']; ?>
</td>
									</tr>
									<tr>
									    <th><?php echo $this->_tpl_vars['_email']; ?>
:</th>
									    <td><a href="<?php echo smarty_function_the_url(array('module' => 'space','userid' => ($this->_tpl_vars['item']['space_name'])), $this);?>
contact"><?php echo $this->_tpl_vars['COMPANY']['contact_email']; ?>
</a></td>
									</tr>
										<tr>
									    
									    <td colspan="2" style="width: 100%">
										<?php if ($this->_tpl_vars['pb_username'] != ""): ?>
											<a class="chat_with_owner <?php if ($this->_tpl_vars['online']): ?>online<?php endif; ?>" href="javascript:void(0)" onclick="getChatboxNew('<?php echo $this->_tpl_vars['MEMBER']['id']; ?>
x<?php echo $this->_tpl_vars['MEMBER']['membertype_id']; ?>
', false)"><?php echo $this->_tpl_vars['_chat_with_owner']; ?>
</a>
										<?php else: ?>
											<a class="chat_with_owner <?php if ($this->_tpl_vars['online']): ?>online<?php endif; ?> comment_but" href="#login-box" onclick=""><?php echo $this->_tpl_vars['_chat_with_owner']; ?>
</a>
										<?php endif; ?>
									    </td>
									</tr>
								  </table>
						 </div>
					

							</div>
				
				
							<h3 style="padding-left: 0;border-bottom: solid 1px #aaa;padding-bottom: 5px;"><?php echo $this->_tpl_vars['_announce']; ?>
</h3>
							    <div id="annouce_box">
				    <div style="clear: both">Đang tải...</div>
							    </div>
				
				
				</section>
			    
			    </div>
			    
			    
			</div>
		    
			
			
		    </td>
		</tr>
	    </table>
	    
    
    </div>
    
    
    <div id="product_desc">
	
	
	
	
	    <div class="eleven columns" style="padding: 0;">

        <div id="container">
	<div id="content" role="main">


        
        

<div itemscope itemtype="http://schema.org/Product" id="product-850" class="post-850 product type-product status-publish hentry">


		<div class="woocommerce_tabs">
		<ul class="tabs">
			<li class="description_tab  active">
				<a href="#tab-description"><?php echo $this->_tpl_vars['_details_n']; ?>
</a>
			</li>
			<li class="description_tab">
				<a href="#tab-commenttab">
					<div id="comment_link">
						<label>
							<h2><?php echo $this->_tpl_vars['_comment_list']; ?>
 (<?php echo $this->_tpl_vars['comments_count']; ?>
)</h2>
						</label>
					</div>
				</a>
			</li>
		</ul>
		
		<div class="panel entry-content" id="tab-description">
			<?php if ($this->_tpl_vars['item']['content']): ?>
			    <h2 class="page-title">
				<?php echo $this->_tpl_vars['item']['title']; ?>
                    </h2>
	
				<?php echo $this->_tpl_vars['item']['content']; ?>

			<?php endif; ?>
			
			<div class="buy-bottom">
				<div>
					<a rel="buynow" href="index.php?do=product&action=add_cart&id=<?php echo $this->_tpl_vars['item']['id']; ?>
">ĐẶT MUA</a>
				</div>
			</div>

		</div>
		
		<div class="panel entry-content" id="tab-commenttab" style="display: none">
			
			<div id="comments">
				
				<div id="comm-list"></div>
				
				<?php if ($this->_tpl_vars['pb_username'] != ""): ?>
					<form name="productaddfrm" class="productaddfrm" id="Frm1" method="post" action="<?php echo smarty_function_the_url(array('module' => 'products','action' => 'postcomment','id' => ($this->_tpl_vars['item']['id'])), $this);?>
" onsubmit="$('#Save').attr('disabled',true);">
						<img src="<?php if ($this->_tpl_vars['pb_company']): ?><?php echo $this->_tpl_vars['pb_company']['image']; ?>
<?php else: ?>  <?php if ($this->_tpl_vars['user_avatar']): ?> <?php echo $this->_tpl_vars['user_avatar']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['theme_img_path']; ?>
image/usericon_big.png  <?php endif; ?> <?php endif; ?>" />
						<?php echo smarty_function_formhash(array(), $this);?>

						<input type="hidden" id="pid" name="data[id]" value="<?php echo $this->_tpl_vars['item']['id']; ?>
" />
						<textarea id="comment" name="data[content]"></textarea>
					</form>
				<?php else: ?>
					<form name="productaddfrm" class="productaddfrm" id="Frm1" method="post" action="<?php echo smarty_function_the_url(array('module' => 'products','action' => 'postcomment','id' => ($this->_tpl_vars['item']['id'])), $this);?>
" onsubmit="$('#Save').attr('disabled',true);">
						<img src="<?php if ($this->_tpl_vars['pb_company']): ?><?php echo $this->_tpl_vars['pb_company']['image']; ?>
<?php else: ?>  <?php if ($this->_tpl_vars['user_avatar']): ?> <?php echo $this->_tpl_vars['user_avatar']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['theme_img_path']; ?>
image/usericon_big.png  <?php endif; ?> <?php endif; ?>" />
						<?php echo smarty_function_formhash(array(), $this);?>

						<input type="hidden" id="pid" name="data[id]" value="<?php echo $this->_tpl_vars['item']['id']; ?>
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


        
        <div class="clear"></div>


        	</div>
</div>
    </div>
	
	
	
	
	    <div class="four columns" style="padding-bottom: 0;padding-top: 5px">


	
	
			<section style="background: none; margin-bottom: 0" id="recent_products-3" class="widget-3 widget-last widget widget_recent_products">
				<img class="logoiconz" src="<?php echo $this->_tpl_vars['COMPANY']['logo']; ?>
" title="<?php echo $this->_tpl_vars['COMPANY']['name']; ?>
" alt="<?php echo $this->_tpl_vars['COMPANY']['name']; ?>
" />
				<div class="widget-inner">
					<div class="left-bottom-detail-head">
						<h5><?php if ($this->_tpl_vars['item']['shop_name']): ?>
	    <a style="color:#6E7476" href="<?php echo smarty_function_the_url(array('module' => 'space','userid' => ($this->_tpl_vars['item']['space_name'])), $this);?>
" title="<?php echo $this->_tpl_vars['item']['shop_name']; ?>
"><?php echo $this->_tpl_vars['item']['shop_name']; ?>
</a><?php else: ?><?php echo $this->_tpl_vars['_released_by_personnal']; ?>
<?php endif; ?></h5>
						    <h3><?php echo $this->_tpl_vars['_add_information_release']; ?>
 cùng gian hàng</h3>
					</div>
			
			
			
			<div class="related_products_box">
				
			</div>
			
		
			<div class="view_more_detail">
				<a href="<?php echo smarty_function_the_url(array('module' => 'space','userid' => ($this->_tpl_vars['item']['space_name'])), $this);?>
">Xem thêm sản phẩm của gian hàng <strong><?php echo $this->_tpl_vars['item']['shop_name']; ?>
</strong></a>
			</div>
		</div></section>
			
    </div>
	
	
	
	
	
    
	
    </div>
    
    <h2 style="width: 900px !important; display: block" class="bottom-title">Gian hàng <?php echo $this->_tpl_vars['item']['shop_name']; ?>
 trực tuyến</h2>
    <div class="bottom-address">
	
		<div class="bottom-address-left">
			
			<h2><?php echo $this->_tpl_vars['COMPANY']['name']; ?>
</h2>
                    
			<p><?php echo $this->_tpl_vars['_address']; ?>
: <?php echo $this->_tpl_vars['COMPANY']['address']; ?>
</p>
			    <?php if ($this->_tpl_vars['COMPANY']['tel']): ?><p><?php echo $this->_tpl_vars['_phone']; ?>
: <?php echo $this->_tpl_vars['COMPANY']['tel']; ?>
</p><?php endif; ?>
			    <?php if ($this->_tpl_vars['COMPANY']['fax']): ?><p><?php echo $this->_tpl_vars['_fax']; ?>
: <?php echo $this->_tpl_vars['COMPANY']['fax']; ?>
</p><?php endif; ?>
			    <?php if ($this->_tpl_vars['COMPANY']['email']): ?><p><?php echo $this->_tpl_vars['_email']; ?>
: <?php echo $this->_tpl_vars['COMPANY']['email']; ?>
</p><?php endif; ?>
			    <?php if ($this->_tpl_vars['COMPANY']['site_url_name']): ?><p><?php echo $this->_tpl_vars['_company_home']; ?>
: <?php echo $this->_tpl_vars['COMPANY']['site_url_name']; ?>
<?php endif; ?>
			</p>
			    

		</div>
		<div class="bottom-address-right">
			
			<div class="red_box">
				<h3 class="shop_name" style=""><?php if ($this->_tpl_vars['item']['shop_name']): ?>
					<a href="<?php echo smarty_function_the_url(array('module' => 'space','userid' => ($this->_tpl_vars['item']['space_name'])), $this);?>
" title="<?php echo $this->_tpl_vars['item']['shop_name']; ?>
"><?php echo $this->_tpl_vars['item']['shop_name']; ?>
</a><?php else: ?><?php echo $this->_tpl_vars['_released_by_personnal']; ?>
<?php endif; ?></h3>
								
								    <table class="box_info_col">
									<tr>
									    <th>Liên hệ:</th>
									    <td><?php echo $this->_tpl_vars['item']['link_people']; ?>
</td>
									</tr>
									<tr>
									    <th><?php echo $this->_tpl_vars['_phone']; ?>
:</th>
									    <td><?php echo $this->_tpl_vars['COMPANY']['contact_mobile']; ?>
</td>
									</tr>
									<tr>
									    <th><?php echo $this->_tpl_vars['_email']; ?>
:</th>
									    <td><a href="<?php echo smarty_function_the_url(array('module' => 'space','userid' => ($this->_tpl_vars['item']['space_name'])), $this);?>
contact"><?php echo $this->_tpl_vars['COMPANY']['contact_email']; ?>
</a></td>
									</tr>
										<tr>
									    
									    <td colspan="2" style="width: 100%">
										<?php if ($this->_tpl_vars['pb_username'] != ""): ?>
											<a class="chat_with_owner <?php if ($this->_tpl_vars['online']): ?>online<?php endif; ?>" href="javascript:void(0)" onclick="getChatboxNew('<?php echo $this->_tpl_vars['MEMBER']['id']; ?>
x<?php echo $this->_tpl_vars['MEMBER']['membertype_id']; ?>
', false)"><?php echo $this->_tpl_vars['_chat_with_owner']; ?>
</a>
										<?php else: ?>
											<a class="chat_with_owner <?php if ($this->_tpl_vars['online']): ?>online<?php endif; ?> comment_but" href="#login-box" onclick=""><?php echo $this->_tpl_vars['_chat_with_owner']; ?>
</a>
										<?php endif; ?>
									    </td>
									</tr>
								  </table>
						 </div>
			
		</div>
    </div>
    
    
	
    
    
    
</div>



<div id="right_detail_banner">
	<div class="inner">
	    <div class="detail_box_content">
		<?php if (! $this->_tpl_vars['MEMBER']['checkout']): ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/product/_product_detail_rightbar_nopaid.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php else: ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/product/_product_detail_rightbar_paid.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php endif; ?>
		
	    </div>
	</div>
</div>

<div class="middle-bottom-line" style="clear: both"></div>

<h3 class="related_bottom_h3">Sản phẩm cùng loại</h3>
<div class="related_products_bottom">	
	<ul>
		
		<?php $_from = $this->_tpl_vars['bottom_related_products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['levelvv'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['levelvv']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['keyvv'] => $this->_tpl_vars['itemvv']):
        $this->_foreach['levelvv']['iteration']++;
?>
			<li class="">
				<a href="<?php echo smarty_function_the_url(array('module' => 'product','id' => ($this->_tpl_vars['itemvv']['id'])), $this);?>
" title="<?php echo $this->_tpl_vars['itemvv']['name']; ?>
">
					<div class="img_box">
						<img title="<?php echo $this->_tpl_vars['itemvv']['name']; ?>
" alt="<?php echo $this->_tpl_vars['itemvv']['name']; ?>
" src="<?php echo $this->_tpl_vars['itemvv']['thumb']; ?>
" />
					</div>
					<?php echo ((is_array($_tmp=$this->_tpl_vars['itemvv']['name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 45) : smarty_modifier_truncate($_tmp, 45)); ?>

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

<div class="bottom_industry_list">
	<h3><a href="<?php echo smarty_function_the_url(array('module' => 'product_main'), $this);?>
">Danh mục sản phẩm</a></h3>
	<ul>
		<?php $_from = $this->_tpl_vars['industries']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_0'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_0']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key0'] => $this->_tpl_vars['item0']):
        $this->_foreach['level_0']['iteration']++;
?>
			<li class="level0 <?php if ($this->_tpl_vars['level_0']%4 == 0): ?>clear<?php endif; ?>">
				<a class="level0" href="<?php echo smarty_function_the_url(array('module' => 'products','level' => 1,'industryid' => ($this->_tpl_vars['item0']['id'])), $this);?>
"><?php echo $this->_tpl_vars['item0']['name']; ?>
</a>
				<ul>
					<?php $_from = $this->_tpl_vars['item0']['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_1_industry'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_1_industry']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key_level1'] => $this->_tpl_vars['level1']):
        $this->_foreach['level_1_industry']['iteration']++;
?>
						<li class="level1 <?php if ($this->_tpl_vars['key_level1'] > 4): ?>hide<?php endif; ?>">
							<a class="level1" href="<?php echo smarty_function_the_url(array('module' => 'products','level' => 2,'industryid' => ($this->_tpl_vars['level1']['id'])), $this);?>
"><?php echo $this->_tpl_vars['level1']['name']; ?>
</a>
						</li>
					<?php endforeach; endif; unset($_from); ?>
					<li class="view-more"><a href="javascript:void(0)">Xem thêm</a></li>
				</ul>
			</li>
			<?php if ($this->_tpl_vars['level_0']++): ?><?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
		<li class="level0 more-item"><a href="<?php echo smarty_function_the_url(array('module' => 'product_main'), $this);?>
">Sản phẩm mới</a></li>
		<li class="level0 more-item"><a href="<?php echo smarty_function_the_url(array('module' => 'product_main'), $this);?>
#sale">Giảm giá/Khuyến mãi</a></li>
	</ul>
</div>


</div>
  </div>

<?php echo '
<script>
	//get related products
	$.ajax({
		url: "'; ?>
<?php echo smarty_function_the_url(array('module' => "root-url"), $this);?>
<?php echo 'index.php?do=product&action=related_products&member_id='; ?>
<?php echo $this->_tpl_vars['item']['member_id']; ?>
<?php echo '&product_id='; ?>
<?php echo $this->_tpl_vars['item']['id']; ?>
<?php echo '",
	}).done(function ( data ) {
		if( console && console.log ) {
			$(\'.related_products_box\').html(data);
			
			$(\'#product_detail_box ul.product_list_widget li img\').resizecrop({
				width:100,
				height:100
			});
			
			$(\'#product_detail_box ul.product_list_widget li img\').css("float", "none");
			$(\'#product_detail_box ul.product_list_widget li img\').css("visibility", "visible");
			if ($(\'.product_list_widget li\').length < 6) {
				$(\'.view_more_detail\').remove()
			}
		}
	});
</script>
'; ?>



<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>