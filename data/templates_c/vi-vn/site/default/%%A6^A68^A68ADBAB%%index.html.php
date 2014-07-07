<?php /* Smarty version 2.6.27, created on 2014-07-02 13:36:13
         compiled from default%5Cindex.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'default\\index.html', 97, false),array('modifier', 'truncate', 'default\\index.html', 104, false),)), $this); ?>
<?php $this->assign('metakeywords', ($this->_tpl_vars['site_description'])); ?>
<?php $this->assign('metadescription', ($this->_tpl_vars['site_description'])); ?>
<?php $this->assign('do', 'offer'); ?>
<?php $this->assign('home_title', $this->_tpl_vars['_G']['site_name']); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/header.html", 'smarty_include_vars' => array('page_title' => ($this->_tpl_vars['home_title']),'nav_id' => 1)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/_four_intro_box_content.html", 'smarty_include_vars' => array('page_title' => ($this->_tpl_vars['home_title']),'nav_id' => 1)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
<style>
	#top-social
	{
	    padding-top: 5px;
	    margin-bottom: -35px;
	}
</style>
'; ?>



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






<div class="row" style="position: relative; <?php if (! $this->_tpl_vars['tet2014']): ?>margin-top: -13px<?php endif; ?>">
    
    
    
      <div class="fifteen columns">

    <div id="page-title" style="padding: 10px 10px 0 0">
	
	<div class="super-main-category">
		<div class="show-but">
			Chuyên mục chính
			
		</div>
		<br style="clear:both" />
		<div class="main-cat-content-out">
			<span class="pointer_topmenuz">.</span>
			<div class="main-cat-content"></div>
		</div>
	</div>

    <h1 class="page-title" style="font-size: 25px;margin-bottom: -2px !important;float: left;clear: none">
	Thị trường trực tuyến
    </h1>


    
    
  </div>

  
  </div>
      
      
      

    <div id = "content" class = "fifteen columns" ><div class = "row" >

    <div id="aq-block-2" class="aq-block aq-block-aq_hslider_posts_block fifteen columns aq-first cf">
    <div class="wrap" style="">
        <div class="scroll-box scroll-box-home" data-boxed="1">
                <div class = "dragger">
                    <div class="grid">
			
			
			<?php $_from = $this->_tpl_vars['IndustryList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_0'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_0']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key0'] => $this->_tpl_vars['item0']):
        $this->_foreach['level_0']['iteration']++;
?>
			<?php if ($this->_tpl_vars['key0'] != 19 && $this->_tpl_vars['key0'] != 5 && $this->_tpl_vars['key0'] != 3965): ?>
			
		<?php if ($this->_tpl_vars['k']%6 == 0 && $this->_tpl_vars['k'] != 0): ?>
		     <br style="clear:both" />
		<?php endif; ?>
		  <?php if ($this->_tpl_vars['k']%3 == 0): ?>
		     <div class = "gr-box">
		  <?php endif; ?>
		  
		  
		  <div class="item <?php if ($this->_tpl_vars['k']%6 == 5 || $this->_tpl_vars['k']%6 == 0): ?>large<?php else: ?>half<?php endif; ?> <?php if ($this->_tpl_vars['k']%6 == 0): ?>odd<?php else: ?><?php if ($this->_tpl_vars['k']%2 == 0): ?>even<?php else: ?>odd<?php endif; ?><?php endif; ?> <?php if ($this->_tpl_vars['item0']['image'] != ''): ?> hasbanner <?php endif; ?>">
                                    <?php if ($this->_tpl_vars['item0']['image'] != "" && false): ?>
					<img src="<?php echo $this->_tpl_vars['item0']['image']; ?>
.small.jpg" style="margin:0 0;" alt="<?php echo $this->_tpl_vars['item0']['name']; ?>
" title="<?php echo $this->_tpl_vars['item0']['name']; ?>
" >					
                                    <?php else: ?>
					<img id="imgitem<?php echo $this->_tpl_vars['item0']['id']; ?>
" rel="<?php echo $this->_tpl_vars['item0']['image']; ?>
.small.jpg" src="images/green.jpg" style="margin:0 0;" alt="<?php echo $this->_tpl_vars['item0']['name']; ?>
" title="<?php echo $this->_tpl_vars['item0']['name']; ?>
" >
				    <?php endif; ?>
                                    <div class="description divlink <?php echo $this->_tpl_vars['item0']['disp']; ?>
" onclick="window.location='<?php echo smarty_function_the_url(array('module' => 'products','level' => 1,'industryid' => ($this->_tpl_vars['item0']['id']),'title' => ($this->_tpl_vars['item0']['name'])), $this);?>
'">
                                        <time><?php echo $this->_tpl_vars['_category']; ?>
</time>
                                        <h3><a class="tile_title" href="<?php echo smarty_function_the_url(array('module' => 'products','level' => 1,'industryid' => ($this->_tpl_vars['item0']['id']),'title' => ($this->_tpl_vars['item0']['name'])), $this);?>
" title="<?php echo $this->_tpl_vars['item0']['name']; ?>
 (<?php echo $this->_tpl_vars['item0']['ppcount']; ?>
)" class="typeboxlet01"><?php echo $this->_tpl_vars['item0']['name']; ?>
</a></h3>

                                        <ul>
					  <?php $_from = $this->_tpl_vars['item0']['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_1_industry'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_1_industry']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key_level1'] => $this->_tpl_vars['level1']):
        $this->_foreach['level_1_industry']['iteration']++;
?>
					  	<li>
							<h4><a href="<?php echo smarty_function_the_url(array('module' => 'products','level' => 2,'industryid' => ($this->_tpl_vars['level1']['id']),'title' => ($this->_tpl_vars['level1']['name'])), $this);?>
" title="<?php echo $this->_tpl_vars['level1']['name']; ?>
 (<?php echo $this->_tpl_vars['level1']['ppcount']; ?>
)" class="typeboxlet01"><?php if ($this->_tpl_vars['k']%6 == 5 || $this->_tpl_vars['k']%6 == 0): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['level1']['name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 30) : smarty_modifier_truncate($_tmp, 30)); ?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['level1']['name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 50) : smarty_modifier_truncate($_tmp, 50)); ?>
<?php endif; ?></a>                        </h4>
						</li>				     
					  <?php endforeach; endif; unset($_from); ?>
					    <li><a href="<?php echo smarty_function_the_url(array('module' => 'products','level' => 1,'industryid' => ($this->_tpl_vars['item0']['id']),'title' => ($this->_tpl_vars['item0']['name'])), $this);?>
"><?php echo $this->_tpl_vars['_read_more']; ?>
</a></li>					    
					</ul>

                                    </div>
                                    <a<?php if ($this->_tpl_vars['item0']['id'] == 3788): ?> rel="nofollow"<?php endif; ?> href="<?php if ($this->_tpl_vars['item0']['url'] != ""): ?><?php echo $this->_tpl_vars['item0']['url']; ?>
<?php else: ?><?php echo smarty_function_the_url(array('module' => 'products','level' => 1,'industryid' => ($this->_tpl_vars['item0']['id']),'title' => ($this->_tpl_vars['item0']['name'])), $this);?>
<?php endif; ?>" <?php if ($this->_tpl_vars['item0']['url'] != ""): ?>target="_blank"<?php endif; ?>></a>
                  </div>
		  
		  
		  <?php if ($this->_tpl_vars['k']%3 == 2 || $this->_tpl_vars['item0']['last'] == 1): ?>
		     </div>
		  <?php endif; ?>
		  <?php if ($this->_tpl_vars['k']++): ?><?php endif; ?>
		  <?php endif; ?>
	    <?php endforeach; endif; unset($_from); ?>
		    
		    
		    </div>
                </div>
            </div>
            
<?php echo '
            <script type="text/javascript">
                jQuery(document).ready(function() {
                    var countElements = jQuery(".scroll-box .grid .gr-box").size();
                    jQuery(".scroll-box .grid").width(countElements*584);

                    var scrollbox = jQuery(".scroll-box");
                    var indent = ( jQuery(window).width() - jQuery(".fifteen.columns>.wrap").width() ) / 2;

                    setBoxedSlider();

                    var animateTime = 1,
                            offsetStep = 5;

                    scrollWrapper = jQuery(\'.scroll-box\');
                    scrollContent = jQuery(\'.scroll-box .grid\');

                    //event handling for buttons "left", "right"
                    jQuery(\'.bttL\')
                            .mousedown(function() {
                                scrollContent.data(\'loop\', true).loopingAnimation(jQuery(this), jQuery(this).is(\'.bttR\') );
                            })
                            .bind("mouseup mouseout", function(){
                                //scrollContent.data(\'loop\', false).stop();
                            });

                    jQuery.fn.loopingAnimation = function(el, dir){
                        if(this.data(\'loop\')){
                            var sign = (dir) ? \'-=\' : \'+=\';
                            this.animate({ marginLeft: sign + offsetStep + \'px\' }, animateTime, function(){ jQuery(this).loopingAnimation(el,dir) });
                        }
                        return false;
                    };
                    //jQuery(\'.scroll-box\').tinyscrollbar({ axis: \'x\'});

                });

                jQuery(window).resize(function(){
                    setBoxedSlider();
                    setBoxedSlider();
                });

                function setBoxedSlider(){
                    scrollbox = jQuery(".scroll-box");

                    if(scrollbox.data("boxed") == "3"){
                        var marginLeft = jQuery(\'.fifteen.columns\').width();
                        marginLeft = (jQuery(window).width() - marginLeft)/2 - 9;

                        scrollbox.width(jQuery(window).width() );

                        if(marginLeft > 0)
                            scrollbox.closest(".wrap").css("margin-left",(-marginLeft)+"px");
                        scrollbox.closest(".wrap").width(jQuery(window).width());
                    }
                    else if(scrollbox.data("boxed") == "1"){
                        scrollbox.closest(".wrap").css("width","100%");
                        scrollbox.css("width","100%");
                    }
                    else if(scrollbox.data("boxed") == "2") {

                        scrollbox.closest(".wrap").css("width","100%");
                        scrollbox.css("width","100%");
                        var indent = jQuery(window).width() - jQuery(".fifteen").width();
                        console.log(indent);
                        scrollbox.width(jQuery(".fifteen").width() + indent/2 + 9);
                    }
                    scrollbox.getNiceScroll().resize();
                }
            </script>
	'; ?>

       </div>
    </div>
  
  
  <div class="fifteen columns"><div class="text-block clearing-container"><div class="row"><div id="aq-block-4" class="aq-block aq-block-aq_page_15_block fifteen aq-first cf">    <div class="">
        <div class="row-fluid">
	
	<div class="wpb_content_element span4 column_container" style="margin-left: 20px">
		<div class="wpb_wrapper">
			 <div class="row-fluid">
	<div class="wpb_content_element span12 text-item wpb_text_column">
		<div class="wpb_wrapper">
			
<!--<h6>Great made option</h6>-->
<h2><a href="#box_4home_tb">Giới thiệu</a></h2>
Công ty cổ phần Truyền Thông và Tiếp Thị BMN (BMN) xin giới thiệu Trang Thương Mại Điện Tử MarketOnline.vn là Thị Trường Trực Tuyến tương tác giữa Cung và Cầu cho mọi hoạt động trong cuộc sống...
<a class="more" href="#box_4home_tb">Xem thêm</a>

<img class="icon_post" title="settings" alt="" src="<?php echo $this->_tpl_vars['theme_img_path']; ?>
/image/check1.png" width="32" height="32" />


		</div> 
	</div> </div> <div class="row-fluid">
	<div class="wpb_content_element span12 text-item no-740 wpb_text_column">
		<div class="wpb_wrapper">
			
<!--<h6>It was hard to make it so cool</h6>-->
<h2><a href="#box_4home_ql">Quyền lợi thành viên</a></h2>

Truy cập Trang điện tử www.marketonline.vn (Marketonline.vn) bằng tài khoản quản trị do Quý khách tự tạo. Sử dụng các sản phẩm, dịch vụ đã đăng ký với Marketonline.vn để phục vụ cho ..
<a class="more" href="#box_4home_ql">Xem thêm</a>

<img class="icon_post" title="check" alt="" src="<?php echo $this->_tpl_vars['theme_img_path']; ?>
/image/check1.png" width="32" height="32" />


		</div> 
	</div> </div> 
		</div> 
	</div>
	<div class="wpb_content_element span4 column_container">
		<div class="wpb_wrapper">
			 <div class="row-fluid">
	<div class="wpb_content_element span12 text-item wpb_text_column">
		<div class="wpb_wrapper">
			
<!--<h6>Great made option</h6>-->
<h2><a href="#box_4home_dk">Điều khoản sử dụng</a></h2>
Công ty Cổ phần Truyền Thông và Tiếp Thị BMN (gọi tắt là BMN) duy trì trang www.marketonline.vn (sau đây gọi là Trang điện tử) như một dịch vụ cung cấp cho khách hàng, bao gồm...
<a class="more" href="#box_4home_dk">Xem thêm</a>

<img class="icon_post" title="settings" alt="" src="<?php echo $this->_tpl_vars['theme_img_path']; ?>
/image/check1.png" width="32" height="32" />


		</div> 
	</div> </div> <div class="row-fluid">
	<div class="wpb_content_element span12 text-item no-740 wpb_text_column">
		<div class="wpb_wrapper">
			
<!--<h6>It was hard to make it so cool</h6>-->
<h2><a href="#box_4home_bm">Bảo mật</a></h2>
Công ty Cổ phần Truyền thông và Tiếp thị BMN (BMN) là đơn vị hoạt động trong lĩnh vực truyền thông tin tức và tiếp thị sản phẩm. Marketonline.vn là sản phẩm được BMN xây dựng...
<a class="more" href="#box_4home_bm">Xem thêm</a>

<img class="icon_post" title="check" alt="" src="<?php echo $this->_tpl_vars['theme_img_path']; ?>
/image/check1.png" width="32" height="32" />


		</div> 
	</div> </div> 
		</div> 
	</div>  
	<div class="wpb_content_element span4 pad-r20 column_container">
		<div class="wpb_wrapper fb_boxx">
		    <img src="images/facebg.png" style="display: block; margin: 0 auto" />
		    
		    
			    <div class="facebookOuter">
        <div class="facebookInner">
            <div class="fb-like-box"
                 data-width="380" data-height="255"
                 data-href="https://www.facebook.com/EMarketOnline.vn"
                 data-colorscheme="light"
                 data-border-color="#4e616d" data-show-faces="true"
                 data-stream="false" data-header="false">
            </div>
        </div>
    </div>

    
    
    
		</div> 
	</div> </div>    </div>

    </div></div></div></div>
  
  
  
  
  <div id="aq-block-5" class="aq-block aq-block-aq_recent_block fifteen columns aq-first cf">        <div id="recent" class="section-block clearing-container">
        <span class="icon recent"></span>
        <div class="subtitle"><?php echo $this->_tpl_vars['_category']; ?>
</div>
        <h2 class="block-title">Thị trường nổi bật</h2>
   

    <div class="works-list hot_market dragger" style="margin-top: 20px;height: auto">
        <ul class="filterable-grid gr-box" style="width: 100%">
            

	    

                                

                
		
		   <?php $_from = $this->_tpl_vars['IndustryList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_0'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_0']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key0'] => $this->_tpl_vars['item0']):
        $this->_foreach['level_0']['iteration']++;
?>
	    <?php if ($this->_tpl_vars['key0'] == 3965): ?>

		  
		  
		  <li style="float: left;width: 3" class="item large odd<?php if ($this->_tpl_vars['item0']['image'] != ''): ?> hasbanner <?php endif; ?>">
                                    <?php if ($this->_tpl_vars['item0']['image'] != "" && false): ?>
					<img src="<?php echo $this->_tpl_vars['item0']['image']; ?>
" style="margin:0 0;" alt="<?php echo $this->_tpl_vars['item0']['name']; ?>
" title="<?php echo $this->_tpl_vars['item0']['name']; ?>
" >
                                    <?php else: ?>
					<img id="imgitem<?php echo $this->_tpl_vars['item0']['id']; ?>
" rel="<?php echo $this->_tpl_vars['item0']['image']; ?>
" src="images/green.jpg" style="margin:0 0;" alt="<?php echo $this->_tpl_vars['item0']['name']; ?>
" title="<?php echo $this->_tpl_vars['item0']['name']; ?>
" >
				    <?php endif; ?>
                                    <div class="description divlink <?php echo $this->_tpl_vars['item0']['disp']; ?>
" onclick="window.location='index.php?do=product&level=1&industryid=<?php echo $this->_tpl_vars['item0']['id']; ?>
'">
                                        <time><?php echo $this->_tpl_vars['_category']; ?>
</time>
                                        <h3><a class="tile_title" href="index.php?do=product&level=1&industryid=<?php echo $this->_tpl_vars['item0']['id']; ?>
" title="<?php echo $this->_tpl_vars['level0']['name']; ?>
" class="typeboxlet01"><?php echo $this->_tpl_vars['item0']['name']; ?>
</a></h3>

                                        <ul>
					  <?php $_from = $this->_tpl_vars['item0']['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_1_industry'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_1_industry']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key_level1'] => $this->_tpl_vars['level1']):
        $this->_foreach['level_1_industry']['iteration']++;
?>
					  	<li>
							<h4><a href="index.php?do=product&level=2&industryid=<?php echo $this->_tpl_vars['level1']['id']; ?>
" title="<?php echo $this->_tpl_vars['level1']['name']; ?>
" class="typeboxlet01"><?php echo ((is_array($_tmp=$this->_tpl_vars['level1']['name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 30) : smarty_modifier_truncate($_tmp, 30)); ?>
</a></h4>
						</li>				     
					  <?php endforeach; endif; unset($_from); ?>
					    <li><a href="index.php?do=product&level=1&industryid=<?php echo $this->_tpl_vars['item0']['id']; ?>
"><?php echo $this->_tpl_vars['_read_more']; ?>
</a></li>					    
					</ul>

                                    </div>
                                    <a href="index.php?do=product&level=1&industryid=<?php echo $this->_tpl_vars['item0']['id']; ?>
"></a>
                  </li>
		  
		  
		<?php endif; ?>  

	    <?php endforeach; endif; unset($_from); ?>

		
		  <?php $_from = $this->_tpl_vars['IndustryList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_0'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_0']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key0'] => $this->_tpl_vars['item0']):
        $this->_foreach['level_0']['iteration']++;
?>
	    <?php if ($this->_tpl_vars['key0'] == 5): ?>

		  
		  
		  <li style="float: left;width: 3" class="item large odd<?php if ($this->_tpl_vars['item0']['image'] != ''): ?> hasbanner <?php endif; ?>">
                                    <?php if ($this->_tpl_vars['item0']['image'] != "" && false): ?>
					<img src="<?php echo $this->_tpl_vars['item0']['image']; ?>
" style="margin:0 0;" alt="<?php echo $this->_tpl_vars['item0']['name']; ?>
" title="<?php echo $this->_tpl_vars['item0']['name']; ?>
" >
                                    <?php else: ?>
					<img id="imgitem<?php echo $this->_tpl_vars['item0']['id']; ?>
" rel="<?php echo $this->_tpl_vars['item0']['image']; ?>
" src="images/green.jpg" style="margin:0 0;" alt="<?php echo $this->_tpl_vars['item0']['name']; ?>
" title="<?php echo $this->_tpl_vars['item0']['name']; ?>
" >
				    <?php endif; ?>
                                    <div class="description divlink <?php echo $this->_tpl_vars['item0']['disp']; ?>
" onclick="window.location='index.php?do=product&level=1&industryid=<?php echo $this->_tpl_vars['item0']['id']; ?>
'">
                                        <time><?php echo $this->_tpl_vars['_category']; ?>
</time>
                                        <h3><a class="tile_title" href="index.php?do=product&level=1&industryid=<?php echo $this->_tpl_vars['item0']['id']; ?>
" title="<?php echo $this->_tpl_vars['level0']['name']; ?>
" class="typeboxlet01"><?php echo $this->_tpl_vars['item0']['name']; ?>
</a></h3>

                                        <ul>
					  <?php $_from = $this->_tpl_vars['item0']['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_1_industry'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_1_industry']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key_level1'] => $this->_tpl_vars['level1']):
        $this->_foreach['level_1_industry']['iteration']++;
?>
					  	<li>
							<h4><a href="index.php?do=product&level=2&industryid=<?php echo $this->_tpl_vars['level1']['id']; ?>
" title="<?php echo $this->_tpl_vars['level1']['name']; ?>
" class="typeboxlet01"><?php echo ((is_array($_tmp=$this->_tpl_vars['level1']['name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 30) : smarty_modifier_truncate($_tmp, 30)); ?>
</a>                        </h4>
						</li>				     
					  <?php endforeach; endif; unset($_from); ?>
					    <li><a href="index.php?do=product&level=1&industryid=<?php echo $this->_tpl_vars['item0']['id']; ?>
"><?php echo $this->_tpl_vars['_read_more']; ?>
</a></li>					    
					</ul>

                                    </div>
                                    <a href="index.php?do=product&level=1&industryid=<?php echo $this->_tpl_vars['item0']['id']; ?>
"></a>
                  </li>
		  
		  
		<?php endif; ?>  

	    <?php endforeach; endif; unset($_from); ?>



                <?php $_from = $this->_tpl_vars['IndustryList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_0'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_0']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key0'] => $this->_tpl_vars['item0']):
        $this->_foreach['level_0']['iteration']++;
?>
	    <?php if ($this->_tpl_vars['key0'] == 19): ?>

		  
		  
		  <li style="float: left;width: 3" class="item large odd<?php if ($this->_tpl_vars['item0']['image'] != ''): ?> hasbanner <?php endif; ?>">
                                    <?php if ($this->_tpl_vars['item0']['image'] != "" && false): ?>
					<img src="<?php echo $this->_tpl_vars['item0']['image']; ?>
" style="margin:0 0;" alt="<?php echo $this->_tpl_vars['item0']['name']; ?>
" title="<?php echo $this->_tpl_vars['item0']['name']; ?>
" >
                                    <?php else: ?>
					<img id="imgitem<?php echo $this->_tpl_vars['item0']['id']; ?>
" rel="<?php echo $this->_tpl_vars['item0']['image']; ?>
" src="images/green.jpg" style="margin:0 0;" alt="<?php echo $this->_tpl_vars['item0']['name']; ?>
" title="<?php echo $this->_tpl_vars['item0']['name']; ?>
" >
				    <?php endif; ?>
                                    <div class="description divlink <?php echo $this->_tpl_vars['item0']['disp']; ?>
" onclick="window.location='index.php?do=product&level=1&industryid=<?php echo $this->_tpl_vars['item0']['id']; ?>
'">
                                        <time><?php echo $this->_tpl_vars['_category']; ?>
</time>
                                        <h3><a class="tile_title" href="index.php?do=product&level=1&industryid=<?php echo $this->_tpl_vars['item0']['id']; ?>
" title="<?php echo $this->_tpl_vars['level0']['name']; ?>
" class="typeboxlet01"><?php echo $this->_tpl_vars['item0']['name']; ?>
</a></h3>

                                        <ul>
					  <?php $_from = $this->_tpl_vars['item0']['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_1_industry'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_1_industry']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key_level1'] => $this->_tpl_vars['level1']):
        $this->_foreach['level_1_industry']['iteration']++;
?>
					  	<li>
							<h4><a href="index.php?do=product&level=2&industryid=<?php echo $this->_tpl_vars['level1']['id']; ?>
" title="<?php echo $this->_tpl_vars['level1']['name']; ?>
" class="typeboxlet01"><?php echo ((is_array($_tmp=$this->_tpl_vars['level1']['name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 30) : smarty_modifier_truncate($_tmp, 30)); ?>
</a>                        </h4>
						</li>				     
					  <?php endforeach; endif; unset($_from); ?>
					    <li><a href="index.php?do=product&level=1&industryid=<?php echo $this->_tpl_vars['item0']['id']; ?>
"><?php echo $this->_tpl_vars['_read_more']; ?>
</a></li>					    
					</ul>

                                    </div>
                                    <a href="index.php?do=product&level=1&industryid=<?php echo $this->_tpl_vars['item0']['id']; ?>
"></a>
                  </li>
		  
		  
		<?php endif; ?>  

	    <?php endforeach; endif; unset($_from); ?>


                                            
        </ul>
    </div>
    </div>

    <?php echo '
    <script type="text/javascript">
        /*-----------------------------------------------------------------------------------

           Custom JS - All front-end jQuery

      -----------------------------------------------------------------------------------*/

        jQuery(document).ready(function($) {

            function portfolio_quicksand() {

                // Setting Up Our Variables
                var $filter;
                var $container;
                var $containerClone;
                var $filterLink;
                var $filteredItems

                // Set Our Filter
                $filter = $(\'.filter li.active a\').attr(\'class\');

                // Set Our Filter Link
                $filterLink = $(\'.filter li a\');

                // Set Our Container
                $container = $(\'ul.filterable-grid\');

                // Clone Our Container
                $containerClone = $container.clone();

                // Apply our Quicksand to work on a click function
                // for each for the filter li link elements
                $filterLink.click(function(e)
                {
                    // Remove the active class
                    $(\'.filter li\').removeClass(\'active\');

                    // Split each of the filter elements and override our filter
                    $filter = $(this).attr(\'class\').split(\' \');

                    // Apply the \'active\' class to the clicked link
                    $(this).parent().addClass(\'active\');

                    // If \'all\' is selected, display all elements
                    // else output all items referenced to the data-type
                    if ($filter == \'all\') {
                        $filteredItems = $containerClone.find(\'li\');
                    }
                    else {
                        $filteredItems = $containerClone.find(\'li[data-type~=\' + $filter + \']\');
                    }

                    // Finally call the Quicksand function
                    $container.quicksand($filteredItems,
                            {
                                // The Duration for animation
                                duration: 750,
                                // the easing effect when animation
                                easing: \'easeInOutQuad\'
                                // height adjustment becomes dynamic

                            });

                    //Initalize our PrettyPhoto Script When Filtered
                    $container.quicksand($filteredItems,
                            function () { lightbox(); }
                    );
                });
            }

            if(jQuery().quicksand) {
                portfolio_quicksand();
            }


        }); // END OF DOCUMENT
    </script>
    '; ?>

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
				<a class="level0" href="<?php echo smarty_function_the_url(array('module' => 'products','level' => 1,'industryid' => ($this->_tpl_vars['item0']['id']),'title' => ($this->_tpl_vars['item0']['name'])), $this);?>
"><?php echo $this->_tpl_vars['item0']['name']; ?>
</a>
				<ul>
					<?php $_from = $this->_tpl_vars['item0']['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_1_industry'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_1_industry']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key_level1'] => $this->_tpl_vars['level1']):
        $this->_foreach['level_1_industry']['iteration']++;
?>
						<li class="level1 <?php if ($this->_tpl_vars['key_level1'] > 4): ?>hide<?php endif; ?>">
							<a class="level1" href="<?php echo smarty_function_the_url(array('module' => 'products','level' => 2,'industryid' => ($this->_tpl_vars['level1']['id']),'title' => ($this->_tpl_vars['level1']['name'])), $this);?>
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
  
  
  
  
  
</div></div>
</div>

</div>
  </div>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>



