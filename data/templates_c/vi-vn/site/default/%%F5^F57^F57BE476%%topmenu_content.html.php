<?php /* Smarty version 2.6.27, created on 2014-04-28 16:59:04
         compiled from default/topmenu_content.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'default/topmenu_content.html', 25, false),array('block', 'topmenuindustries', 'default/topmenu_content.html', 31, false),)), $this); ?>
<section id="header" class="row" role="banner">
  <div class="four columns logo">
    <a href="<?php echo $this->_tpl_vars['SiteUrl']; ?>
"><img src="<?php echo $this->_tpl_vars['theme_img_path']; ?>
image/logo-home.png" alt=""></a>
    <div id="announce_top">
	<ul>
	    <li><a id="thongbao_home" href="#home_announce_box">Giới thiệu</a></li>
	    <li>
		
		<?php if ($this->_tpl_vars['pb_username'] != ""): ?>
		    <a class="" title="Hỗ trợ trực tuyến" href="javascript:void(0)" onclick="getChatboxNew('1x2', false)">Hỗ trợ trực tuyến</a>
		<?php else: ?>
		    <a title="Hỗ trợ trực tuyến" class="comment_but" href="#login-box" onclick="">Hỗ trợ trực tuyến</a>
		<?php endif; ?>
		
		<!--<a href="contact"><?php echo $this->_tpl_vars['_contact_help']; ?>
</a>-->
	    </li>
	</ul>
    </div>
  </div>
  <nav class="eleven columns" id="topmenu">

      <ul id="menu-primary-navigation" class="tiled-menu">
        <li class="menu-portfolio">
            <span class="menu-item-wrap">
                <a  href="<?php echo smarty_function_the_url(array('module' => 'product_main'), $this);?>
" style='background-color:rgba(108, 190, 66, 0.95); background-size:cover; background-image:none;' >
                    <span class="link-text"><?php echo $this->_tpl_vars['_products']; ?>
</span>
                    <span class="arrow">&nbsp;</span>
                    <span class='tile-icon' style='background-image:url(<?php echo $this->_tpl_vars['theme_img_path']; ?>
image/product_bg.png);'></span></a></span>
<ul>
    
    <?php $this->_tag_stack[] = array('topmenuindustries', array('level' => 1,'row' => 4,'orderby' => 'display_order')); $_block_repeat=true;smarty_block_topmenuindustries($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
	
	<li class="menu-sortable-portfolio"><span class="menu-item-wrap"><a href="<?php echo smarty_function_the_url(array('module' => 'products','level' => 1,'industryid' => ($this->_tpl_vars['industry']['id'])), $this);?>
"><span class="link-text"><?php echo $this->_tpl_vars['industry']['name']; ?>
</span></a></span></li>
	
	    
    <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_topmenuindustries($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
    
	
	
        <li class="menu-sortable-portfolio"><span class="menu-item-wrap"><a href="index.php?do=product"><span class="link-text"><?php echo $this->_tpl_vars['_read_more']; ?>
</span></a></span></li>
	
</ul>
</li>
	
<li class="menu-blog" style=""><span class="menu-item-wrap">
<a  href="<?php echo smarty_function_the_url(array('module' => 'service_main'), $this);?>
" style='background-color:#ffaa31; background-size:cover; background-image:url();' >
<span class="link-text">Dịch vụ</span><span class="arrow">&nbsp;</span><span class='tile-icon' style='background-image:url(<?php echo $this->_tpl_vars['theme_img_path']; ?>
image/service_bg.png);'></span></a></span>
<!--<ul>
	<li class="menu-grid-items"><span class="menu-item-wrap"><a  href="ThuongMaiCap2.php"><span class="link-text">Nhu cầu Mua</span></a></span></li>
	<li class="menu-left-sidebar"><span class="menu-item-wrap"><a  href="ThuongMaiCap2.php"><span class="link-text">Nhu cầu Bán</span></a></span></li>
	<li class="menu-right-sidebar"><span class="menu-item-wrap"><a  href="ThuongMaiCap2.php"><span class="link-text">Nhà Phân phối</span></a></span></li>
</ul>-->
</li>
	
<li class="menu-blog" style=""><span class="menu-item-wrap">
<a  href="<?php echo smarty_function_the_url(array('module' => 'offer_main'), $this);?>
" style='background-color:#57BAE8; background-size:cover; background-image:url();' >
<span class="link-text">Thương mại</span><span class="arrow">&nbsp;</span><span class='tile-icon' style='background-image:url(<?php echo $this->_tpl_vars['theme_img_path']; ?>
image/trade_bg.png);'></span></a></span>
<ul>
	<li class="menu-grid-items"><span class="menu-item-wrap"><a  href="<?php echo smarty_function_the_url(array('module' => 'offer_main','offertype' => 'buy'), $this);?>
"><span class="link-text">Nhu cầu Mua</span></a></span></li>
	<li class="menu-left-sidebar"><span class="menu-item-wrap"><a  href="<?php echo smarty_function_the_url(array('module' => 'offer_main','offertype' => 'sell'), $this);?>
"><span class="link-text">Nhu cầu Bán</span></a></span></li>
	<li class="menu-right-sidebar"><span class="menu-item-wrap"><a  href="<?php echo smarty_function_the_url(array('module' => 'offer_main','offertype' => 'supply'), $this);?>
"><span class="link-text">Nhà Phân phối</span></a></span></li>
</ul>
</li>
<li class="menu-shop" style="visibility: hidden;display: none">
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
<li class="menu-contacts"><span class="menu-item-wrap"><a  href="<?php echo smarty_function_the_url(array('module' => 'jobs'), $this);?>
" style='background-color:#83d328; background-size:cover; background-image:url();'>
<span class="link-text">Học và Làm</span><span class='tile-icon' style='background-image:url(<?php echo $this->_tpl_vars['theme_img_path']; ?>
image/job_bg.png);'></span></a></span>
</li>
</ul>
      
      <div class="banner_top" href="#box_underi">
	
	
	<link rel="stylesheet" type="text/css" href="slider/engine1/style.css" />
	
	<!-- Start WOWSlider.com BODY section -->
	<div id="wowslider-container1">
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
<!--<a href="#" title="Học và Làm"><img src="slider/data1/tooltips/pray_for_fallen.jpg" alt="Học và Làm"/>5</a>-->
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
  <div class="fifteen columns" id="top-social" <?php if ($this->_tpl_vars['tet2014']): ?>style="margin-bottom: -25px;"<?php endif; ?>>
    
    <?php if ($this->_tpl_vars['tet2014']): ?>
	<div class="banner-small-top">
	    <img src="<?php echo $this->_tpl_vars['WebRootUrl']; ?>
images/tet2014.png" />
	</div>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['jobpage']): ?>
	<div class="banner-small-top">
	    <img src="<?php echo $this->_tpl_vars['WebRootUrl']; ?>
images/tet2014.png" />
	</div>
    <?php endif; ?>

    <a class="open-soc" id="show-social" href="javascript:void(0)" <?php if ($this->_tpl_vars['tet2014']): ?>style="margin-top: 5px;"<?php endif; ?>>
      <div class="twit-open"></div>
      <span>Chia sẻ</span>
      Thông tin
    </a>

      <div class="soc-wrap" <?php if ($this->_tpl_vars['tet2014']): ?>style="margin-top: 5px;"<?php endif; ?>>

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
	  <a class="fb" onclick="<?php if (! $this->_tpl_vars['FACE']): ?>goclicky(this, '<?php echo $this->_tpl_vars['F_URL']; ?>
')<?php else: ?>goclicky_custom(this, '<?php if ($this->_tpl_vars['FACE']['share_f']): ?><?php echo smarty_function_the_url(array('module' => 'space','userid' => ($this->_tpl_vars['pb_company']['cache_spacename'])), $this);?>
/<?php echo $this->_tpl_vars['pb_username']; ?>
_un.htmls<?php else: ?><?php echo $this->_tpl_vars['F_URL']; ?>
<?php endif; ?>', '<?php echo $this->_tpl_vars['FACE']['images']; ?>
', '<?php echo $this->_tpl_vars['FACE']['title']; ?>
', '<?php echo $this->_tpl_vars['FACE']['summary']; ?>
')<?php endif; ?>" href="javascript:void(0)">Facebook</a>
	  

      </div>

      </div>
  </div>
</div>
