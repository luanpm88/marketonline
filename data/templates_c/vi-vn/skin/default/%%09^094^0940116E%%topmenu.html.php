<?php /* Smarty version 2.6.27, created on 2014-03-12 10:52:02
         compiled from ../default/topmenu.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'formhash', '../default/topmenu.html', 80, false),array('function', 'get_cache', '../default/topmenu.html', 123, false),array('function', 'the_url', '../default/topmenu.html', 148, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../default/topmenu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<?php echo '

<script type="application/x-javascript">
    
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
		
		if ($(\'.secondline-address\').height() > 30) {
			$(\'.secondline-address span.website\').css(\'display\', \'block\');
			$(\'.secondline-address span.divid\').css(\'display\', \'none\');
		}
		
	});
</script>

	'; ?>

	
<div id="upload_banner" class="hide">
    <div class="uload_banner">
	<h3><?php echo $this->_tpl_vars['_change_banner']; ?>
</h3>
	<p><?php echo $this->_tpl_vars['_banner_size_1200']; ?>
</p>
	<iframe name="upload" id="upload" style="display: none"></iframe>
	<form name="productaddfrm" id="Frm1" method="post" action="<?php echo $this->_tpl_vars['WebRootUrl']; ?>
index.php?do=product&action=change_banner" enctype="multipart/form-data" onsubmit="$('#Save').attr('disabled',true);">
	  <?php echo smarty_function_formhash(array(), $this);?>

	  <input type="hidden" name="username" value="<?php echo $this->_tpl_vars['MEMBER']['username']; ?>
" />
	  <input type="hidden" name="com_id" value="<?php echo $this->_tpl_vars['COMPANY']['id']; ?>
" />
	  <input type="hidden" name="uri" value="<?php echo $this->_tpl_vars['FURI']; ?>
" />
	
	
	  <p><?php if ($this->_tpl_vars['banners']['1']): ?><img src="<?php echo $this->_tpl_vars['banners']['1']; ?>
" /><?php endif; ?><input type="file" name="upload_banner_1" accept="image/*" /></p>
	  <p><?php if ($this->_tpl_vars['banners']['2']): ?><img src="<?php echo $this->_tpl_vars['banners']['2']; ?>
" /><?php endif; ?><input type="file" name="upload_banner_2" accept="image/*" /></p>
	  <p><?php if ($this->_tpl_vars['banners']['3']): ?><img src="<?php echo $this->_tpl_vars['banners']['3']; ?>
" /><?php endif; ?><input type="file" name="upload_banner_3" accept="image/*" /></p>
	  <p><?php if ($this->_tpl_vars['banners']['4']): ?><img src="<?php echo $this->_tpl_vars['banners']['4']; ?>
" /><?php endif; ?><input type="file" name="upload_banner_4" accept="image/*" /></p>
	  <p><?php if ($this->_tpl_vars['banners']['5']): ?><img src="<?php echo $this->_tpl_vars['banners']['5']; ?>
" /><?php endif; ?><input type="file" name="upload_banner_5" accept="image/*" /></p>
	  
	  <input type="submit" class="checkout_but" style="padding: 3px 50px; margin-left: 10px;" value="<?php echo $this->_tpl_vars['_upload']; ?>
" /><br>
	</form>
    </div>
</div>

<div id="upload_logo" class="hide">
    <div class="upload_logo">
	<h3><?php echo $this->_tpl_vars['_change_logo']; ?>
</h3>
	<p><?php echo $this->_tpl_vars['_logo_size_1200']; ?>
</p>
	<iframe name="upload" id="upload" style="display: none"></iframe>
	<form name="productaddfrm" id="Frm2_logo" method="post" action="<?php echo $this->_tpl_vars['WebRootUrl']; ?>
index.php?do=product&action=change_logo_home" enctype="multipart/form-data" onsubmit="$('#Save').attr('disabled',true);">
	  <?php echo smarty_function_formhash(array(), $this);?>

	  <input type="hidden" name="username" value="<?php echo $this->_tpl_vars['MEMBER']['username']; ?>
" />
	  <input type="hidden" name="com_id" value="<?php echo $this->_tpl_vars['COMPANY']['id']; ?>
" />
	  <input type="hidden" name="uri" value="<?php echo $this->_tpl_vars['FURI']; ?>
" />
	
	
	  <p><input type="file" name="upload_logo" id="changelogo-but" onchange="$('#Frm2_logo').submit()" /></p>
	  
	  
	  <input type="submit" class="checkout_but" style="padding: 3px 50px; margin-left: 10px;" value="<?php echo $this->_tpl_vars['_upload']; ?>
" /><br>
	</form>
    </div>
</div>


<div id="topmenu_outer">
<div id="verytopmenu">
    <div class="left">
        <a class="homex" href="<?php echo $this->_tpl_vars['SiteUrl']; ?>
" style="margin-left: -4px;">.</a>
		<a class="top_contact_help" href="contact.php"><?php echo $this->_tpl_vars['_contact_help']; ?>
</a>
	<p id="f_language_bar"><?php echo smarty_function_get_cache(array('name' => 'language','image' => 'y','sep' => "&nbsp;",'echo' => 'y'), $this);?>
</p>
	
	<div id="TopSearch">
	    <input type="text" placeholder="<?php echo $this->_tpl_vars['_search_shop']; ?>
" />
	    <div class="search_result">
			
			<ul><li><h2><a></a></h2><p></p></li></ul>
			
	    </div>
		<span class="right-search-icon">search</span>
	</div>
    </div>
    <div class="right">
        <div id="topCart" class="cart"><a class="cart_link" href="javascript:void(0)"></a></div>
        
        
       
	
        <?php if ($this->_tpl_vars['pb_username'] != ""): ?>
        
	
        
	
	<div id="settingouter" style="float:right">
	    
	    <a style="padding-left: 0;" class="name" href="<?php if ($this->_tpl_vars['pb_company']): ?><?php echo smarty_function_the_url(array('module' => 'space','userid' => ($this->_tpl_vars['pb_company']['cache_spacename'])), $this);?>
<?php else: ?>redirect.php?url=/virtual-office/<?php endif; ?>"><img class="avatar" src="<?php if ($this->_tpl_vars['pb_company']): ?><?php echo $this->_tpl_vars['pb_company']['image']; ?>
<?php else: ?>  <?php if ($this->_tpl_vars['user_avatar']): ?> <?php echo $this->_tpl_vars['user_avatar']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['theme_img_path']; ?>
image/usericon.jpg  <?php endif; ?> <?php endif; ?>" width="20" height="20" />&nbsp;<?php if ($this->_tpl_vars['pb_company']): ?><?php echo $this->_tpl_vars['pb_company']['shop_name']; ?>
<?php else: ?><?php echo $this->_tpl_vars['pb_username']; ?>
<?php endif; ?></a>
	    <?php if ($this->_tpl_vars['pb_company']): ?><a class="staticon" style="padding-left: 0" class="name" href="javascript:void(0)"><img class="avatar" src="<?php echo $this->_tpl_vars['theme_img_path']; ?>
image/stat.png" width="20" height="20" /></a><?php endif; ?>
	    <div id="message_out" class="message">
		<div id="messagehome">
		    <a class="but" href="javascript:void(0)"><?php echo $this->_tpl_vars['_message']; ?>
 </a>
		</div>
	    </div>
	    <div id="inbox_out" class="message">
		<div id="inboxhome">
		    <a class="but" href="javascript:void(0)"><?php echo $this->_tpl_vars['_inbox']; ?>
</a>
		</div>
	    </div>
	    
	    <a style="padding-left: 0" class="name" href="<?php echo smarty_function_the_url(array('module' => 'connect'), $this);?>
"><img src="<?php echo $this->_tpl_vars['theme_img_path']; ?>
image/connect.png" width="20" height="20" />&nbsp;<?php echo $this->_tpl_vars['_connect_title']; ?>
</a>
	    
	    <a href="javascript:void(0)" class="setting"><img style="border: none" src="templates/default/image/setting-icon_small_w.png" width="20" height="20" /></a>
	    <div id="settingbox" style="display: none">
		<ul>
		    <li><a target="_blank" href="redirect.php?url=/virtual-office/"><?php echo $this->_tpl_vars['_my_office_room']; ?>
</a></li>
		    <li><a href="logging.php?action=logout"><?php echo $this->_tpl_vars['_login_out']; ?>
</a></li>
		</ul>
		<span class="pointer_topmenu">.</span>
	    </div>	
	</div>
        <?php else: ?>
        <a href="logging.php"><?php echo $this->_tpl_vars['_pls_login']; ?>
</a><a href="register.php?typename=Company"><?php echo $this->_tpl_vars['_register_now']; ?>
</a>
        <?php endif; ?>
        
    </div>
</div>
</div>



<section role="banner" class="row" id="header"><div style="float: left">
  <div class="columns logo logoz">
    
    <a href="<?php echo $this->_tpl_vars['Menus']['index']; ?>
">
	<img alt="<?php echo $this->_tpl_vars['COMPANY']['name']; ?>
" src="<?php echo $this->_tpl_vars['COMPANY']['logo']; ?>
"></a>
    
    <?php if ($this->_tpl_vars['pb_username'] == $this->_tpl_vars['MEMBER']['username']): ?>
	<div id="edit_logo" <?php if (! $this->_tpl_vars['COMPANY']['picture']): ?>style="display:block"<?php endif; ?>><a href="javascript:void(0)" onclick="$('#changelogo-but').trigger('click')"><?php echo $this->_tpl_vars['_change_logo']; ?>
</a>
	      <?php if (! $this->_tpl_vars['COMPANY']['picture']): ?>
		      <div class="tooltip-box" style="width:235px"><span class="pointer-tooltip">...</span><div class="tooltip-box-content">
		      Nhắp vào nút trên để bổ sung LOGO đại diện cho Gian hàng của bạn
		      </div></div>
	      <?php endif; ?>
	</div>
  <?php endif; ?>
  
  </div>
  <div id="TopMenuCat">
    <div class="childcat">
	<img src="<?php echo $this->_tpl_vars['WebRootUrl']; ?>
<?php echo $this->_tpl_vars['Info']['groupimage']; ?>
" alt="<?php echo $this->_tpl_vars['Info']['groupname']; ?>
" /><br />(<?php echo $this->_tpl_vars['COMPANY']['clicked']; ?>
)
    </div>
    <div style="margin-top: 5px;" class="childcat">
	<span><a id="policy_but" href="#policy_content">Chính sách<br><span style="font-size: 14px;font-weight: bold;background: none"><?php if ($this->_tpl_vars['MEMBER']['membergroup_id'] == 2): ?><?php echo $this->_tpl_vars['_member_person']; ?>
 <span style='font-weight:normal;background: none'>(<?php echo $this->_tpl_vars['_personal']; ?>
)</span><?php endif; ?><?php if ($this->_tpl_vars['MEMBER']['membergroup_id'] == 3): ?><?php echo $this->_tpl_vars['_member_company']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['MEMBER']['membergroup_id'] == 1): ?><?php echo $this->_tpl_vars['_member_shop']; ?>
<?php endif; ?></span></a></span>
    </div>
    
    
    
    
<div id="policy_content" style="display: none">
	
	<div style="padding: 20px;width: 800px">
			<h2><strong>Chính sách <?php if ($this->_tpl_vars['MEMBER']['membertype_id'] == 1): ?><?php echo $this->_tpl_vars['_member_person']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['MEMBER']['membertype_id'] == 2): ?><?php echo $this->_tpl_vars['_member_company']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['MEMBER']['membertype_id'] == 3): ?><?php echo $this->_tpl_vars['_member_shop']; ?>
<?php endif; ?></strong></h2>

			<p>
				<?php if ($this->_tpl_vars['COMPANY']['policy']): ?><?php echo $this->_tpl_vars['COMPANY']['policy']; ?>
<?php else: ?>Hiện chưa cập nhật chính sách.<?php endif; ?>
			</p>
			
	</div>
	
   </div>
    
    
  </div>
  <div class="top_shop_name"><span><?php echo $this->_tpl_vars['COMPANY']['shop_name']; ?>
</span></div>
    
<section id="recent_products-3" class="widget-3 widget-last widget widget_recent_products" style="">
                <div class="widget-inner announcebox">
                    <h3 style="padding-left: 0; margin-bottom: 7px;">Thông báo</h3>
		    
		    <div id="annouce_box">
		    
		    </div>
		</div></section>

  </div>
  <nav id="topmenu" class="eleven columns">

<a href="javascript:void(0)" class="main_banner theme-default">
		<?php if (! $this->_tpl_vars['banners']['noimage']): ?><div class="bx-loading newx"></div><?php endif; ?>
		<?php if ($this->_tpl_vars['banners']['noimage']): ?>
			<img class="noiimage" src="<?php echo $this->_tpl_vars['banners']['noimage']; ?>
" />
		<?php else: ?>
			<ul class="bxslider">
				<?php $_from = $this->_tpl_vars['banners']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['level']['iteration']++;
?>
				
				<!--<img style="max-width: none;" src="<?php echo $this->_tpl_vars['item']; ?>
">-->
					
				<?php if ($this->_tpl_vars['item']): ?>
					<li class="item_<?php echo $this->_tpl_vars['key']; ?>
"><img src="<?php echo $this->_tpl_vars['item']; ?>
.banner.jpg" /></li>
				<?php endif; ?>
					
				<?php endforeach; endif; unset($_from); ?>
				</ul>
		<?php endif; ?>
	
</a>
 
  
  <?php if ($this->_tpl_vars['pb_username'] == $this->_tpl_vars['MEMBER']['username']): ?>
  <div id="edit_banner" <?php if ($this->_tpl_vars['banners']['noimage']): ?>style="display: block"<?php endif; ?>><a href="#upload_banner"><?php if ($this->_tpl_vars['banners']['noimage']): ?><?php echo $this->_tpl_vars['_add_banner']; ?>
<?php else: ?><?php echo $this->_tpl_vars['_change_banner']; ?>
<?php endif; ?></a>
  
  <?php if ($this->_tpl_vars['banners']['noimage']): ?>
	<div class="tooltip-box"><span class="pointer-tooltip">...</span><div class="tooltip-box-content">Nhắp vào nút trên để bổ sung hình ảnh Công ty/Cửa hàng/Sản phẩm đại diện cho Gian hàng của bạn</div></div>
  <?php endif; ?>
  </div>
  <?php endif; ?>
  
  <div id="top_company_info">
	<h3><?php echo $this->_tpl_vars['COMPANY']['name']; ?>
</h3>
	<p class="secondline-address">
		<span class="token"><?php echo $this->_tpl_vars['COMPANY']['address']; ?>
</span>
		<span class="token phone"><label><?php echo $this->_tpl_vars['_mobile_number']; ?>
:</label> <?php echo $this->_tpl_vars['COMPANY']['contact_mobile']; ?>
 (<?php echo $this->_tpl_vars['COMPANY']['link_man']; ?>
)</span>
		<?php if ($this->_tpl_vars['COMPANY']['site_url_name'] && false): ?>
			<span class="token"><label><?php echo $this->_tpl_vars['_website']; ?>
:</label> <a target="_blank" rel="nofollow" href="<?php echo $this->_tpl_vars['COMPANY']['site_url']; ?>
"><?php echo $this->_tpl_vars['COMPANY']['site_url_name']; ?>
</a></span>
		<?php endif; ?>
	</p>
  </div>

  </nav>


</section>

<?php echo '
<script type="text/javascript">
                jQuery(document).ready(function() {
		    $(\'#settingouter\').hover(
			function () {
			    //$(\'#settingbox\').fadeIn();
			}
			,
			function () {
			    //$(\'#settingbox\').fadeOut();
			}
		    );
		   $(\'body\').click(function(){$(\'#settingbox\').fadeOut()});	
		    $(\'#settingouter a.setting\').click(function(e){$(\'#settingbox\').toggle();e.stopPropagation();});	        
		    
		});
</script>
'; ?>




<div class="row" style="height:33px; margin-top: 2px;">
    <!--<div style="right: inherit; left: auto;float: left;padding: 10px 20px;font-size: 14px;margin-top: 6px;margin-bottom: -30px;" class="postitem"><?php echo $this->_tpl_vars['_post_product']; ?>
</div>-->
    <?php if ($this->_tpl_vars['pb_username'] != ""): ?>
	<div style="" class="postitem follow_but">
		<?php if (! $this->_tpl_vars['Followed']): ?>
			<a onclick="follow(<?php echo $this->_tpl_vars['COMPANY']['id']; ?>
, this)" href="javascript:void(0)"><?php echo $this->_tpl_vars['_follow']; ?>
</a>
		<?php else: ?>
			<a onclick="follow(<?php echo $this->_tpl_vars['COMPANY']['id']; ?>
, this)" href="javascript:void(0)"><?php echo $this->_tpl_vars['_followed']; ?>
</a>
		<?php endif; ?>
		
		<a class="skin_chat_with_owner <?php if ($this->_tpl_vars['MEMBER']['online']): ?>online<?php endif; ?>" onclick="getChatbox(<?php echo $this->_tpl_vars['MEMBER']['id']; ?>
, false)" href="javascript:void(0)">Tin nhắn</a>
	</div>
	<?php else: ?>
	<div style="" class="postitem follow_but">
		<?php if (! $this->_tpl_vars['Followed']): ?>
		    <a class="comment_but" href="#login-box" href="<?php echo $this->_tpl_vars['WebRootUrl']; ?>
logging.php"><?php echo $this->_tpl_vars['_follow']; ?>
</a>
		<?php else: ?>
		    <a class="comment_but" href="#login-box" href="<?php echo $this->_tpl_vars['WebRootUrl']; ?>
logging.php"><?php echo $this->_tpl_vars['_followed']; ?>
</a>
		<?php endif; ?>
		
		<a class="skin_chat_with_owner <?php if ($this->_tpl_vars['MEMBER']['online']): ?>online<?php endif; ?> comment_but" href="#login-box">Tin nhắn</a>
	</div>
    <?php endif; ?>
    
    <!--<div style="position: relative; margin-left: 10px;" class="postitem follow_but"><a onclick="getChatbox(<?php echo $this->_tpl_vars['MEMBER']['id']; ?>
, false)" href="javascript:void(0)">Chat</a></div>-->
    
  <div id="top-social" class="fifteen columns">

    <a href="#" id="show-social" class="open-soc">
      <div class="twit-open"></div>
      <span>Chia sẻ</span>
      Thông tin
    </a>

      <div class="soc-wrap">

      <div class="soc-icons">


          <a class="rss" href="javascript:void(0)" data-original-title="RSS feed">RSS</a>

          <a href="http://twitter.com" class="tw" data-original-title="Twitter">Twitter</a>
	  
	  <a href="http://vimeo.com" class="vi" data-original-title="Vimeo">Vimeo</a>
	  
	 
	  <a href="http://youtube.com" class="yt" data-original-title="YouTube">YouTube</a>
	  <a href="https://accountservices.passport.net/" class="ms" data-original-title="Microsoft ID">Microsoft ID</a>
	  <a href="http://linkedin.com" class="li" data-original-title="LinkedIN">LinkedIN</a>
	  <a href="https://accounts.google.com/" class="gp" data-original-title="Google +">Google +</a>
	  <a href="http://picasa.com" class="pi" data-original-title="Picasa">Picasa</a>
	  
	 
	  <a href="http://dropbox.com" class="db" data-original-title="Dropbox">Dropbox</a>
	  <a class="fb" onclick="<?php if (! $this->_tpl_vars['FACEz']): ?>goclicky(this, '<?php echo smarty_function_the_url(array('module' => 'space','userid' => ($this->_tpl_vars['COMPANY']['cache_spacename']),'welcome' => 1), $this);?>
')<?php else: ?>goclicky_custom(this, '<?php echo smarty_function_the_url(array('module' => 'space','userid' => ($this->_tpl_vars['COMPANY']['cache_spacename']),'welcome' => 1), $this);?>
', '<?php echo $this->_tpl_vars['FACE']['images']; ?>
', '<?php echo $this->_tpl_vars['FACE']['title']; ?>
', '<?php echo $this->_tpl_vars['FACE']['summary']; ?>
')" href="javascript:void(0)<?php endif; ?>" href="javascript:void(0)">Facebook</a>
	  <!--<a class="fb" onclick="shareStreamFacebook('<?php echo smarty_function_the_url(array('module' => 'space','userid' => ($this->_tpl_vars['COMPANY']['cache_spacename'])), $this);?>
/<?php echo $this->_tpl_vars['MEMBER']['username']; ?>
_un.htmls')" href="javascript:void(0)">Facebook</a>-->

      </div>

      </div>
  </div>
</div>


<div style="margin-top: 15px;" class="row">
        
    <section style="background: none" id="aq_tabs-2" class="widget-1 widget-first widget recent-tabs-widget">
        <div class="widget-inner">
            


    <dl class="tabs">
      <dd style="display: none" <?php if ($this->_tpl_vars['do'] == 'home'): ?>class="active"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['Menus']['index']; ?>
">
        
        <span><?php echo $this->_tpl_vars['_home_page']; ?>
</span>
      </a></dd>
      
      <dd <?php if ($this->_tpl_vars['do'] == 'product'): ?>class="active"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['Menus']['product']; ?>
">
        
        <span><?php echo $this->_tpl_vars['_product_show']; ?>
</span>
      </a></dd>
      <dd <?php if ($this->_tpl_vars['do'] == 'offer'): ?>class="active"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['Menus']['offer']; ?>
">
        
        <span><?php echo $this->_tpl_vars['_offer']; ?>
</span>
      </a></dd>
      <dd <?php if ($this->_tpl_vars['do'] == 'news'): ?>class="active"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['Menus']['news']; ?>
">
        
        <span><?php echo $this->_tpl_vars['_space_news']; ?>
</span>
      </a></dd>
      <dd <?php if ($this->_tpl_vars['do'] == 'job'): ?>class="active"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['Menus']['job']; ?>
">
        
        <span><?php echo $this->_tpl_vars['_space_hr']; ?>
</span>
      </a></dd>
      <dd <?php if ($this->_tpl_vars['do'] == 'intro'): ?>class="active"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['Menus']['intro']; ?>
">
        
        <span><?php echo $this->_tpl_vars['_comnote']; ?>
 <?php if ($this->_tpl_vars['MEMBER']['membertype_id'] == 1): ?><?php echo $this->_tpl_vars['_member_person']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['MEMBER']['membertype_id'] == 2): ?><?php echo $this->_tpl_vars['_member_company']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['MEMBER']['membertype_id'] == 3): ?><?php echo $this->_tpl_vars['_member_shop']; ?>
<?php endif; ?></span>
      </a></dd>
      <dd <?php if ($this->_tpl_vars['do'] == 'contact'): ?>class="active"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['Menus']['contact']; ?>
">
        
        <span><?php echo $this->_tpl_vars['_contact_us']; ?>
</span>
      </a></dd>
    </dl>

    </div></section>
    
</div>