<?php /* Smarty version 2.6.27, created on 2014-07-04 14:14:23
         compiled from offer_detail.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'offer_detail.html', 151, false),array('function', 'formhash', 'offer_detail.html', 153, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array('PageTitle' => ($this->_tpl_vars['Trade']['name']),'cur' => 'space_index')));
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


<?php echo '
<script>
$(document).ready(function() {
    loadOfferComment();
});
</script>
'; ?>



<div class="eleven columns offer_detail offer-detail-is" id="content">


              
              <div class="row content_main_left" style="margin-right: 0;">
    <div style="width: 100%;padding-left: 0; padding-right: 0;padding-top: 2px;" class="eleven columns">

	<div id="container">
	<div role="main" id="">



<h5 style="text-transform: none;font-size: 16px;"><a href="<?php echo $this->_tpl_vars['Menus']['offer']; ?>
"><?php echo $this->_tpl_vars['_offer']; ?>
</a> / <a href="<?php echo $this->_tpl_vars['Menus']['offer']; ?>
&typeid=<?php echo $this->_tpl_vars['Type']['id']; ?>
"><?php echo $this->_tpl_vars['Type']['name']; ?>
</a></h5>
<h3 style="padding: 0; margin: 0 0 0 0;height: auto;margin-bottom: 10px"><?php echo $this->_tpl_vars['Trade']['name']; ?>
</h3>

<div class="top_images_offer">
    <div class="main-image">
	<?php if ($this->_tpl_vars['Trade']['d_image']): ?>
			<a href="<?php echo $this->_tpl_vars['Trade']['d_image']; ?>
" title="<?php echo $this->_tpl_vars['Trade']['name']; ?>
" rel="thumbnails" class="zoomz first">
			<img width="200" height="200" src="<?php echo $this->_tpl_vars['Trade']['d_image']; ?>
" class="attachment-shop_thumbnail" alt="<?php echo $this->_tpl_vars['Trade']['name']; ?>
" /></a>
			<?php endif; ?>
    </div>
    <div class="offer-thumbnails">
			<?php if ($this->_tpl_vars['Trade']['picture'] && $this->_tpl_vars['Trade']['d_image'] != $this->_tpl_vars['Trade']['image']): ?>
			<a href="<?php echo $this->_tpl_vars['Trade']['image']; ?>
" title="<?php echo $this->_tpl_vars['Trade']['name']; ?>
" rel="thumbnails" class="zoomz first">
			<img width="200" height="200" src="<?php echo $this->_tpl_vars['Trade']['image']; ?>
" class="attachment-shop_thumbnail" alt="<?php echo $this->_tpl_vars['Trade']['name']; ?>
" /></a>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['Trade']['picture1'] && $this->_tpl_vars['Trade']['d_image'] != $this->_tpl_vars['Trade']['imgmiddle1']): ?><a href="<?php echo $this->_tpl_vars['Trade']['image1']; ?>
" title="<?php echo $this->_tpl_vars['Trade']['name']; ?>
" rel="thumbnails" class="zoomz first">
			<img width="200" height="200" src="<?php echo $this->_tpl_vars['Trade']['imgmiddle1']; ?>
" class="attachment-shop_thumbnail" alt="<?php echo $this->_tpl_vars['Trade']['name']; ?>
" /></a><?php endif; ?>
			<?php if ($this->_tpl_vars['Trade']['picture2'] && $this->_tpl_vars['Trade']['d_image'] != $this->_tpl_vars['Trade']['imgmiddle2']): ?><a href="<?php echo $this->_tpl_vars['Trade']['image2']; ?>
" title="<?php echo $this->_tpl_vars['Trade']['name']; ?>
" rel="thumbnails" class="zoomz ">
			<img width="200" height="200" src="<?php echo $this->_tpl_vars['Trade']['imgmiddle2']; ?>
" class="attachment-shop_thumbnail" alt="<?php echo $this->_tpl_vars['Trade']['name']; ?>
" /></a><?php endif; ?>
			<?php if ($this->_tpl_vars['Trade']['picture3'] && $this->_tpl_vars['Trade']['d_image'] != $this->_tpl_vars['Trade']['imgmiddle3']): ?><a href="<?php echo $this->_tpl_vars['Trade']['image3']; ?>
" title="<?php echo $this->_tpl_vars['Trade']['name']; ?>
" rel="thumbnails" class="zoomz ">
			<img width="200" height="200" src="<?php echo $this->_tpl_vars['Trade']['imgmiddle3']; ?>
" class="attachment-shop_thumbnail" alt="<?php echo $this->_tpl_vars['Trade']['name']; ?>
" /></a><?php endif; ?>
			<?php if ($this->_tpl_vars['Trade']['picture4'] && $this->_tpl_vars['Trade']['d_image'] != $this->_tpl_vars['Trade']['imgmiddle4']): ?><a href="<?php echo $this->_tpl_vars['Trade']['image4']; ?>
" title="<?php echo $this->_tpl_vars['Trade']['name']; ?>
" rel="thumbnails" class="zoomz ">
			<img width="200" height="200" src="<?php echo $this->_tpl_vars['Trade']['imgmiddle4']; ?>
" class="attachment-shop_thumbnail" alt="<?php echo $this->_tpl_vars['Trade']['name']; ?>
" /></a><?php endif; ?>
    </div>
</div>

<div class="images" style="display: none">
		<?php if ($this->_tpl_vars['Trade']['picture']): ?>
			<a itemprop="image" href="<?php echo $this->_tpl_vars['Trade']['image']; ?>
" class="zoom" rel="thumbnails" title="<?php echo $this->_tpl_vars['Trade']['name']; ?>
"><img width="313" height="418" src="<?php echo $this->_tpl_vars['Trade']['image']; ?>
" class="attachment-shop_single wp-post-image" alt="<?php echo $this->_tpl_vars['Trade']['name']; ?>
"></a>
			<!--<div class="detailtopconleft">
				<p class="left1"><img src="<?php echo $this->_tpl_vars['Trade']['image']; ?>
" alt="" width="80" height="80" /></p>
				<p class="left2"><a href="misc.php?source=<?php echo $this->_tpl_vars['Trade']['image_url']; ?>
" target="_blank"><img src="<?php echo $this->_tpl_vars['theme_img_path']; ?>
images/detail_17.jpg" alt="" /></a><span><?php echo $this->_tpl_vars['_enlarge_image']; ?>
</span></p>
			</div>-->
		<?php endif; ?>
	
		

	
	<div class="thumbnails">
		<?php if ($this->_tpl_vars['Trade']['picture1']): ?><a href="<?php echo $this->_tpl_vars['Trade']['image1']; ?>
" title="<?php echo $this->_tpl_vars['Trade']['name']; ?>
" rel="thumbnails" class="zoom first">
			<img width="200" height="200" src="<?php echo $this->_tpl_vars['Trade']['imgmiddle1']; ?>
" class="attachment-shop_thumbnail" alt="<?php echo $this->_tpl_vars['Trade']['name']; ?>
" /></a><?php endif; ?>
		<?php if ($this->_tpl_vars['Trade']['picture2']): ?><a href="<?php echo $this->_tpl_vars['Trade']['image2']; ?>
" title="<?php echo $this->_tpl_vars['Trade']['name']; ?>
" rel="thumbnails" class="zoom ">
			<img width="200" height="200" src="<?php echo $this->_tpl_vars['Trade']['imgmiddle2']; ?>
" class="attachment-shop_thumbnail" alt="<?php echo $this->_tpl_vars['Trade']['name']; ?>
" /></a><?php endif; ?>
			<?php if ($this->_tpl_vars['Trade']['picture3']): ?><a href="<?php echo $this->_tpl_vars['Trade']['image3']; ?>
" title="<?php echo $this->_tpl_vars['Trade']['name']; ?>
" rel="thumbnails" class="zoom ">
			<img width="200" height="200" src="<?php echo $this->_tpl_vars['Trade']['imgmiddle3']; ?>
" class="attachment-shop_thumbnail" alt="<?php echo $this->_tpl_vars['Trade']['name']; ?>
" /></a><?php endif; ?>
			<?php if ($this->_tpl_vars['Trade']['picture4']): ?><a href="<?php echo $this->_tpl_vars['Trade']['image4']; ?>
" title="<?php echo $this->_tpl_vars['Trade']['name']; ?>
" rel="thumbnails" class="zoom ">
			<img width="200" height="200" src="<?php echo $this->_tpl_vars['Trade']['imgmiddle4']; ?>
" class="attachment-shop_thumbnail" alt="<?php echo $this->_tpl_vars['Trade']['name']; ?>
" /></a><?php endif; ?>
			
	</div>
</div>
<div class="summary">

		
		

								
	
		

	
				

</div>
		


	</div>



<div class="trade-detail-info">



		
		<?php if ($this->_tpl_vars['Trade']['price']): ?><p class="price"><span style="" class="title_disc"><?php echo $this->_tpl_vars['_price']; ?>
:</span> <?php echo $this->_tpl_vars['Trade']['price']; ?>
 VNĐ</p><?php endif; ?>
		<?php if ($this->_tpl_vars['Trade']['brand_name']): ?><p><span class="title_disc" style=""><?php echo $this->_tpl_vars['_brand']; ?>
:</span> <?php echo $this->_tpl_vars['Trade']['brand_name']; ?>
</p><?php endif; ?>
		<?php if ($this->_tpl_vars['Trade']['market']): ?><p><span class="title_disc" style=""><?php echo $this->_tpl_vars['_market']; ?>
</span> <?php echo $this->_tpl_vars['Trade']['market']; ?>
</p><?php endif; ?>
		
		<?php $_from = $this->_tpl_vars['ObjectParams']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['form'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['form']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key1'] => $this->_tpl_vars['item1']):
        $this->_foreach['form']['iteration']++;
?>
		    <?php if ($this->_tpl_vars['item1']['value']): ?><p><span class="title_disc" style=""><?php echo $this->_tpl_vars['item1']['label']; ?>
</span> <?php echo $this->_tpl_vars['item1']['value']; ?>
</p><?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
		
		
		
		
</div>
<br style="clear:both" />
<?php if ($this->_tpl_vars['Trade']['content']): ?>
    <h4 style="margin: 25px 0 5px 0; font-size: 20px;"><?php echo $this->_tpl_vars['_description']; ?>
</h4>
		    <?php echo $this->_tpl_vars['Trade']['content']; ?>

		
		
		
		<?php endif; ?>
		</div>
	
	
	
	<div id="comment_link"></div>
	<div class="detail-comments offer-detail-comment">
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
</div>
                  
              </div>



</div>



</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
