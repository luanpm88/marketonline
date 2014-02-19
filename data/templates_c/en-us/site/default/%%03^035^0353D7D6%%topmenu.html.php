<?php /* Smarty version 2.6.27, created on 2013-06-28 04:42:38
         compiled from default/topmenu.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'get_cache', 'default/topmenu.html', 7, false),array('block', 'topmenuindustries', 'default/topmenu.html', 66, false),)), $this); ?>
<div id="topmenu_outer">
<div id="verytopmenu">
    <div class="left">
	<a class="homex" href="<?php echo $this->_tpl_vars['SiteUrl']; ?>
" style="margin-left: 2px;">.</a>
        <!--<a href="<?php echo $this->_tpl_vars['SiteUrl']; ?>
" class="home"><?php echo $this->_tpl_vars['_home_page']; ?>
</a>-->
	<a href="javascript:void(0)"><?php echo $this->_tpl_vars['_help']; ?>
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
	    <!--<a href="<?php if ($this->_tpl_vars['pb_company']): ?>space/?userid=<?php echo $this->_tpl_vars['pb_username']; ?>
&do=<?php else: ?>redirect.php?url=/virtual-office/<?php endif; ?>"></a>-->
	    <a style="padding-left: 0" class="name" href="<?php if ($this->_tpl_vars['pb_company']): ?>space/?userid=<?php echo $this->_tpl_vars['pb_username']; ?>
&do=<?php else: ?>redirect.php?url=/virtual-office/<?php endif; ?>"><img class="avatar" src="<?php if ($this->_tpl_vars['pb_company']): ?><?php echo $this->_tpl_vars['pb_company']['image']; ?>
<?php else: ?><?php echo $this->_tpl_vars['theme_img_path']; ?>
image/usericon.jpg<?php endif; ?>" width="20" height="20" />&nbsp;&nbsp;<?php if ($this->_tpl_vars['pb_company']): ?><?php echo $this->_tpl_vars['pb_company']['name']; ?>
<?php else: ?><?php echo $this->_tpl_vars['pb_username']; ?>
<?php endif; ?></a>
	    <!--<a href="index.php?do=product&action=connect"></a>-->
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



<section id="header" class="row" role="banner">
  <div class="four columns logo">
    <a href="<?php echo $this->_tpl_vars['SiteUrl']; ?>
"><img src="<?php echo $this->_tpl_vars['theme_img_path']; ?>
image/logo_1.png" alt="OneTouch"></a>
    <div id="announce_top">
	<ul>
	    <li><a href="">Thông báo</a></li>
	    <li><a href="">Góp ý</a></li>
	</ul>
    </div>
  </div>
  <nav class="eleven columns" id="topmenu">

      <ul id="menu-primary-navigation" class="tiled-menu">
        <li class="menu-portfolio">
            <span class="menu-item-wrap">
                <a  href="index.php?do=product" style='background-color:#83D329; background-size:cover; background-image:none;' >
                    <span class="link-text"><?php echo $this->_tpl_vars['_products']; ?>
</span>
                    <span class="arrow">&nbsp;</span>
                    <span class='tile-icon' style='background-image:url(<?php echo $this->_tpl_vars['theme_img_path']; ?>
image/product_bg.png);'></span></a></span>
<ul>
    
    <?php $this->_tag_stack[] = array('topmenuindustries', array('level' => 1,'row' => 4,'orderby' => 'display_order')); $_block_repeat=true;smarty_block_topmenuindustries($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
	
	<li class="menu-sortable-portfolio"><span class="menu-item-wrap"><a href="index.php?do=product&level=1&industryid=<?php echo $this->_tpl_vars['industry']['id']; ?>
"><span class="link-text"><?php echo $this->_tpl_vars['industry']['name']; ?>
</span></a></span></li>
	
	    
    <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_topmenuindustries($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
    
	
	
        <li class="menu-sortable-portfolio"><span class="menu-item-wrap"><a href="index.php?do=product"><span class="link-text"><?php echo $this->_tpl_vars['_read_more']; ?>
</span></a></span></li>
	
</ul>
</li>
<li class="menu-blog" style="visibility: hidden"><span class="menu-item-wrap">
<a  href="ThuongMai.php" style='background-color:#57BAE8; background-size:cover; background-image:url();' >
<span class="link-text">Thương mại</span><span class="arrow">&nbsp;</span><span class='tile-icon' style='background-image:url(<?php echo $this->_tpl_vars['theme_img_path']; ?>
image/trade_bg.png);'></span></a></span>
<ul>
	<li class="menu-grid-items"><span class="menu-item-wrap"><a  href="ThuongMaiCap2.php"><span class="link-text">Nhu cầu Mua</span></a></span></li>
	<li class="menu-left-sidebar"><span class="menu-item-wrap"><a  href="ThuongMaiCap2.php"><span class="link-text">Nhu cầu Bán</span></a></span></li>
	<li class="menu-right-sidebar"><span class="menu-item-wrap"><a  href="ThuongMaiCap2.php"><span class="link-text">Nhà Phân phối</span></a></span></li>
</ul>
</li>
<li class="menu-shop" style="visibility: hidden">
    <span class="menu-item-wrap">
        <a  href="ThiTruong.php" style='background-color:#6cbe42; background-size:cover; background-image:url();'>
            <span class="link-text">Thị trường</span><span class='tile-icon' style='background-image:url(<?php echo $this->_tpl_vars['theme_img_path']; ?>
image/TT_bg.png);'></span></a></span></li>
<li class="menu-shortcodes" style="visibility: hidden"><span class="menu-item-wrap"><a  href="DauTu.php" style='background-color:#f8c039; background-size:cover; background-image:none;'>
<span class="link-text">Đầu tư</span><span class="arrow">&nbsp;</span><span class='tile-icon' style='background-image:url(<?php echo $this->_tpl_vars['theme_img_path']; ?>
image/invest_bg.png);'></span></a></span>

<ul>
	<li class="menu-grid-items"><span class="menu-item-wrap"><a  href="DauTu.php"><span class="link-text">Dự án</span></a></span></li>
	<li class="menu-left-sidebar"><span class="menu-item-wrap"><a  href="DauTu.php"><span class="link-text">Tài chính</span></a></span></li>
	<li class="menu-left-sidebar"><span class="menu-item-wrap"><a  href="DauTu.php"><span class="link-text">Tìm đối tac</span></a></span></li>
	
</ul>

</li>
<li class="menu-features" style="visibility: hidden"><span class="menu-item-wrap">
<a  href="ThuongHieu.php" style='background-color:#fe7477; background-size:cover; background-image:url();'>
    <span class="link-text">Thương hiệu</span><span class="arrow">&nbsp;</span><span class='tile-icon' style='background-image:url(<?php echo $this->_tpl_vars['theme_img_path']; ?>
image/brand_bg.png);'></span></a></span>

<ul>
	<li class="menu-grid-items"><span class="menu-item-wrap"><a  href="ThuongHieu.php"><span class="link-text">Thương hiệu</span></a></span></li>
	<li class="menu-left-sidebar"><span class="menu-item-wrap"><a  href="DoanhNghiep.php"><span class="link-text">Doanh nghiệp</span></a></span></li>
	<li class="menu-left-sidebar"><span class="menu-item-wrap"><a  href="CuaHang.php"><span class="link-text">Shop</span></a></span></li>
	
</ul>

</li>
<li class="menu-contacts" style="visibility: hidden"><span class="menu-item-wrap"><a  href="ViecLam.php" style='background-color:#83d328; background-size:cover; background-image:url();'>
<!--<img src='http://theme.crumina.net/onetouch/wp-content/uploads/2012/11/409277-92x92.jpg' class='contact-menu-icons contact-icon-1' alt='' />
<img src='http://theme.crumina.net/onetouch/wp-content/uploads/2012/11/378743-92x46.jpg' class='contact-menu-icons contact-icon-2' alt='' />
<img src='http://theme.crumina.net/onetouch/wp-content/uploads/2012/11/397209-46x46.jpg' class='contact-menu-icons contact-icon-3' alt='' />-->
<span class="link-text">Việc làm</span><span class='tile-icon' style='background-image:url(<?php echo $this->_tpl_vars['theme_img_path']; ?>
image/job_bg.png);'></span></a></span></li>
</ul>
      
      <div class="banner_top" href="#box_underi">
	
	
	<link rel="stylesheet" type="text/css" href="slider/engine1/style.css" />
	
	<!-- Start WOWSlider.com BODY section -->
	<div id="wowslider-container1z">
	<div class="ws_images"><ul>
<li><img src="slider/data1/images/3d_circles.jpg" alt="Thương mại" title="Thương mại" id="wows1_0"/></li>
<li><img src="slider/data1/images/clover.jpg" alt="Thị trường" title="Thị trường" id="wows1_1"/></li>
<li><img src="slider/data1/images/hoopoe.jpg" alt="Đầu tư" title="Đầu tư" id="wows1_2"/></li>
<li><img src="slider/data1/images/orange_slices.jpg" alt="Thương hiệu" title="Thương hiệu" id="wows1_3"/></li>
<li><img src="slider/data1/images/pray_for_fallen.jpg" alt="Học và Làm" title="Học và Làm" id="wows1_4"/></li>

</ul></div>
<div class="ws_bullets"><div>
<a href="#" title="Thương mại"><img src="slider/data1/tooltips/3d_circles.jpg" alt="Thương mại"/>1</a>
<a href="#" title="Thị trường"><img src="slider/data1/tooltips/clover.jpg" alt="Thị trường"/>2</a>
<a href="#" title="Đầu tư"><img src="slider/data1/tooltips/hoopoe.jpg" alt="Đầu tư"/>3</a>
<a href="#" title="Thương hiệu"><img src="slider/data1/tooltips/orange_slices.jpg" alt="Thương hiệu"/>4</a>
<a href="#" title="Học và Làm"><img src="slider/data1/tooltips/pray_for_fallen.jpg" alt="Học và Làm"/>5</a>
</div></div>
<span class="wsl"><a href="http://wowslider.com">Java Script Slideshow</a> by WOWSlider.com v3.9</span>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="slider/engine1/wowslider.js"></script>
	<script type="text/javascript" src="slider/engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
	
	
	<!--<iframe src="slider/" style="width:715px;height:140px;max-width:100%;overflow:hidden;border:none;padding:0;margin:0 auto;display:block;" marginheight="0" marginwidth="0"></iframe>-->
	
      </div>
      
  </nav>
</section>




<div class="row">
  <div class="fifteen columns" id="top-social">

    <a class="open-soc" id="show-social" href="javascript:void(0)">
      <div class="twit-open"></div>
      <span>Chia sẻ</span>
      Thông tin
    </a>

      <div class="soc-wrap">

      <div class="soc-icons">


          <a class="rss" href="javascript:void(0)" data-original-title="RSS feed">RSS</a>

          <a href="http://twitter.com" class="tw" data-original-title="Twitter">Twitter</a>
	  <a href="http://flickr.com" class="fl" data-original-title="Flickr">Flickr</a>
	  <a href="http://vimeo.com" class="vi" data-original-title="Vimeo">Vimeo</a>
	  <a href="http://dribble.com" class="dr" data-original-title="Dribble">Dribble</a>
	  <a href="http://lastfm.com" class="lf" data-original-title="Last FM">Last FM</a>
	  <a href="http://youtube.com" class="yt" data-original-title="YouTube">YouTube</a>
	  <a href="https://accountservices.passport.net/" class="ms" data-original-title="Microsoft ID">Microsoft ID</a>
	  <a href="http://linkedin.com" class="li" data-original-title="LinkedIN">LinkedIN</a>
	  <a href="https://accounts.google.com/" class="gp" data-original-title="Google +">Google +</a>
	  <a href="http://picasa.com" class="pi" data-original-title="Picasa">Picasa</a>
	  <a href="http://pinterest.com" class="pt" data-original-title="Pinterest">Pinterest</a>
	  <a href="http://wordpress.com" class="wp" data-original-title="Wordpress">Wordpress</a>
	  <a href="http://dropbox.com" class="db" data-original-title="Dropbox">Dropbox</a>
	  <a href="http://facebook.com" class="fb" data-original-title="Facebook">Facebook</a>

      </div>

      </div>
  </div>
</div>

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