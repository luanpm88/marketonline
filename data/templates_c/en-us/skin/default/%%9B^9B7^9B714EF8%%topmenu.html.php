<?php /* Smarty version 2.6.27, created on 2013-06-27 23:42:24
         compiled from topmenu.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'formhash', 'topmenu.html', 74, false),array('function', 'get_cache', 'topmenu.html', 88, false),)), $this); ?>
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
		
		
	});
</script>

	'; ?>

	
<div id="upload_banner" style="display: none">
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
	  <input type="file" name="upload_banner" />
	  <input type="submit" class="checkout_but" style="padding: 2px 10px; margin-left: 10px;" value="<?php echo $this->_tpl_vars['_upload']; ?>
" />
	</form>
    </div>
</div>

<div id="topmenu_outer">
<div id="verytopmenu">
    <div class="left">
        <a class="homex" href="<?php echo $this->_tpl_vars['SiteUrl']; ?>
" style="margin-left: 2px;">.</a><a href="javascript:void(0)"><?php echo $this->_tpl_vars['_help']; ?>
</a><a href="contact.php"><?php echo $this->_tpl_vars['_contact']; ?>
</a>
	<p id="f_language_bar"><?php echo smarty_function_get_cache(array('name' => 'language','image' => 'y','sep' => "&nbsp;",'echo' => 'y'), $this);?>
</p>
    </div>
    <div class="right">
        <div id="topCart" class="cart"><a class="cart_link" href="javascript:void(0)"><?php echo $this->_tpl_vars['_cart']; ?>
</a></div>
        
        
       
	
        <?php if ($this->_tpl_vars['pb_username'] != ""): ?>
        <div id="inbox_out" class="message">
	    <a href="javascript:void(0)"><?php echo $this->_tpl_vars['_inbox']; ?>
</a>
	</div>
	
        
	
	<div id="settingouter" style="float:right">
	    
	    <a style="padding-left: 0" class="name" href="<?php if ($this->_tpl_vars['pb_company']): ?>space/?userid=<?php echo $this->_tpl_vars['pb_username']; ?>
&do=<?php else: ?>redirect.php?url=/virtual-office/<?php endif; ?>"><img class="avatar" src="<?php if ($this->_tpl_vars['pb_company']): ?><?php echo $this->_tpl_vars['pb_company']['image']; ?>
<?php else: ?><?php echo $this->_tpl_vars['theme_img_path']; ?>
image/usericon.jpg<?php endif; ?>" width="20" height="20" />&nbsp;&nbsp;<?php if ($this->_tpl_vars['pb_company']): ?><?php echo $this->_tpl_vars['pb_company']['name']; ?>
<?php else: ?><?php echo $this->_tpl_vars['pb_username']; ?>
<?php endif; ?></a>

	    <a style="padding-left: 0" class="name" href="index.php?do=product&action=connect"><img src="<?php echo $this->_tpl_vars['theme_img_path']; ?>
image/connect.png" width="20" height="20" />&nbsp;&nbsp;<?php echo $this->_tpl_vars['_connect_title']; ?>
</a>
	    <a href="javascript:void(0)" class="setting"><img style="border: none" src="templates/default/image/setting-icon_small_w.png" width="20" height="20" /></a>
	    <div id="settingbox" style="display: none">
		<ul>
		    <li><a target="_blank" href="redirect.php?url=/virtual-office/"><?php echo $this->_tpl_vars['_my_office_room']; ?>
</a></li>
		    <li><a href="logging.php?action=logout"><?php echo $this->_tpl_vars['_login_out']; ?>
</a></li>
		</ul>
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
  <div class="four columns logo logoz">
    
    <a href="<?php echo $this->_tpl_vars['Menus']['index']; ?>
">
	<img alt="<?php echo $this->_tpl_vars['COMPANY']['name']; ?>
" src="<?php echo $this->_tpl_vars['COMPANY']['logo']; ?>
"></a>
  </div>
  <div id="TopMenuCat">
    <div class="childcat">
	<img src="<?php echo $this->_tpl_vars['Info']['groupimage']; ?>
" alt="<?php echo $this->_tpl_vars['Info']['groupname']; ?>
" /> (<?php echo $this->_tpl_vars['Info']['points']; ?>
)
    </div>
    <div style="margin-top: 5px;" class="childcat">
	<span><a href="<?php echo $this->_tpl_vars['Menus']['intro']; ?>
">Chính sách<br>Công ty</a></span>
    </div>
    
  </div>
  
    
<section id="recent_products-3" class="widget-3 widget-last widget widget_recent_products" style="background: none repeat scroll 0 0 transparent;
    border: 1px solid #aaa;
    clear: both;
    height: 172px;
    width: 261px;
    margin-bottom: 0;
    margin-top: 135px;
    padding: 10px;">
                <div class="widget-inner announcebox">
                    <h3 style="padding-left: 0; margin-bottom: 7px;">Thông báo</h3>
		    
		    <div id="annouce_box">
		    
		    </div>
		</div></section>

  </div>
  <nav id="topmenu" class="eleven columns">

<img style="margin-left: 10px;margin-top: 5px;max-width: none; width: 907px;height: 302px;" src="<?php echo $this->_tpl_vars['COMPANY']['banner']; ?>
">
  
  
  
  <div id="edit_banner"><a href="#upload_banner"><?php echo $this->_tpl_vars['_change_banner']; ?>
</a></div>
  

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




<div class="row">
    <!--<div style="right: inherit; left: auto;float: left;padding: 10px 20px;font-size: 14px;margin-top: 6px;margin-bottom: -30px;" class="postitem"><?php echo $this->_tpl_vars['_post_product']; ?>
</div>-->
    <?php if ($this->_tpl_vars['pb_username'] != ""): ?>
	<?php if (! $this->_tpl_vars['Followed']): ?>
	    <div style="" onclick="follow(<?php echo $this->_tpl_vars['COMPANY']['id']; ?>
, this)" class="postitem follow_but"><?php echo $this->_tpl_vars['_follow']; ?>
</div>
	<?php else: ?>
	    <div style="" onclick="follow(<?php echo $this->_tpl_vars['COMPANY']['id']; ?>
, this)" class="postitem follow_but followed"><?php echo $this->_tpl_vars['_followed']; ?>
</div>
	<?php endif; ?>
    <?php endif; ?>
  <div id="top-social" class="fifteen columns">

    <a href="#" id="show-social" class="open-soc">
      <div class="twit-open"></div>
      <span>Chia sẻ</span>
      Thông tin
    </a>

      <div class="soc-wrap">

      <div class="soc-icons">


          <a data-original-title="RSS feed" href="
          http://theme.crumina.net/onetouch/feed=rss2          " class="rss">RSS</a>

          <a data-original-title="Twitter" class="tw" href="http://twitter.com">Twitter</a><a data-original-title="Flickr" class="fl" href="http://flickr.com">Flickr</a><a data-original-title="Vimeo" class="vi" href="http://vimeo.com">Vimeo</a><a data-original-title="Dribble" class="dr" href="http://dribble.com">Dribble</a><a data-original-title="Last FM" class="lf" href="http://lastfm.com">Last FM</a><a data-original-title="YouTube" class="yt" href="http://youtube.com">YouTube</a><a data-original-title="Microsoft ID" class="ms" href="https://accountservices.passport.net/">Microsoft ID</a><a data-original-title="LinkedIN" class="li" href="http://linkedin.com">LinkedIN</a><a data-original-title="Google +" class="gp" href="https://accounts.google.com/">Google +</a><a data-original-title="Picasa" class="pi" href="http://picasa.com">Picasa</a><a data-original-title="Pinterest" class="pt" href="http://pinterest.com">Pinterest</a><a data-original-title="Wordpress" class="wp" href="http://wordpress.com">Wordpress</a><a data-original-title="Dropbox" class="db" href="http://dropbox.com">Dropbox</a><a data-original-title="Facebook" class="fb" href="http://facebook.com">Facebook</a>

      </div>

      </div>
  </div>
</div>


<div style="margin-top: 15px;" class="row">
        
    <section style="background: none" id="aq_tabs-2" class="widget-1 widget-first widget recent-tabs-widget">
        <div class="widget-inner">
            


    <dl class="tabs">
      <dd <?php if ($this->_tpl_vars['do'] == 'home'): ?>class="active"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['Menus']['index']; ?>
">
        <!--<img alt="" src="http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/assets/img/tab-people.png">-->
        <span><?php echo $this->_tpl_vars['_home_page']; ?>
</span>
      </a></dd>
      <dd <?php if ($this->_tpl_vars['do'] == 'intro'): ?>class="active"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['Menus']['intro']; ?>
">
        <!--<img alt="" src="http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/assets/img/tab-people.png">-->
        <span><?php echo $this->_tpl_vars['_space_intro']; ?>
</span>
      </a></dd>
      <dd <?php if ($this->_tpl_vars['do'] == 'product'): ?>class="active"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['Menus']['product']; ?>
">
        <!--<img alt="" src="http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/assets/img/tab-card.png">-->
        <span><?php echo $this->_tpl_vars['_product_show']; ?>
</span>
      </a></dd>
      <dd <?php if ($this->_tpl_vars['do'] == 'offer'): ?>class="active"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['Menus']['offer']; ?>
">
        <!--<img alt="" src="http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/assets/img/tab-card.png">-->
        <span><?php echo $this->_tpl_vars['_offer']; ?>
</span>
      </a></dd>
      <dd <?php if ($this->_tpl_vars['do'] == 'news'): ?>class="active"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['Menus']['news']; ?>
">
        <!--<img alt="" src="http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/assets/img/tab-card.png">-->
        <span><?php echo $this->_tpl_vars['_space_news']; ?>
</span>
      </a></dd>
      <dd <?php if ($this->_tpl_vars['do'] == 'job'): ?>class="active"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['Menus']['job']; ?>
">
        <!--<img alt="" src="http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/assets/img/tab-card.png">-->
        <span><?php echo $this->_tpl_vars['_space_hr']; ?>
</span>
      </a></dd>
      <dd <?php if ($this->_tpl_vars['do'] == 'contact'): ?>class="active"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['Menus']['contact']; ?>
">
        <!--<img alt="" src="http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/assets/img/tab-card.png">-->
        <span><?php echo $this->_tpl_vars['_contact_us']; ?>
</span>
      </a></dd>
    </dl>

    </div></section>
    
    </div>