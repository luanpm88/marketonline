<?php /* Smarty version 2.6.27, created on 2013-06-28 04:55:03
         compiled from default%5Cindex.html */ ?>
<?php $this->assign('metakeywords', ($this->_tpl_vars['site_description'])); ?>
<?php $this->assign('metadescription', ($this->_tpl_vars['site_description'])); ?>
<?php $this->assign('do', 'offer'); ?>
<?php $this->assign('home_title', $this->_tpl_vars['_G']['site_name']); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/header.html", 'smarty_include_vars' => array('page_title' => ($this->_tpl_vars['home_title']),'nav_id' => 1)));
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

    <div id = "content" class = "fifteen columns" ><div class = "row" >

    <!--<div id="aq-block-1" class="aq-block clearing-container aq-block-aq_info_row_block fifteen columns aq-first cf">        <div class="promo">
            <span class="icon info"></span>
            <h2>Hey people! My name is <a href="http://themeforest.net/user/Crumina/portfolio">Crumina</a> and let me introduce my new Metro Theme - One touch</h2>
            <h5>COMRADES! WE MUST INCREASE THE EFFICIENCY AND QUALITY OF WORK IN EVERY WORKPLACE!</h5>
        </div>
    </div>-->
  
  
  
    <div id="aq-block-2" class="aq-block aq-block-aq_hslider_posts_block fifteen columns aq-first cf">
    <div class="wrap" style="">
        <div class="scroll-box" data-boxed="1">
                <div class = "dragger">
                    <div class="grid">
			
			
			<?php $_from = $this->_tpl_vars['IndustryList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_0'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_0']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key0'] => $this->_tpl_vars['item0']):
        $this->_foreach['level_0']['iteration']++;
?>
			<?php if ($this->_tpl_vars['key0'] != 19): ?>
			
		<?php if ($this->_tpl_vars['k']%6 == 0 && $this->_tpl_vars['k'] != 0): ?>
		     <br style="clear:both" />
		<?php endif; ?>
		  <?php if ($this->_tpl_vars['k']%3 == 0): ?>
		     <div class = "gr-box">
		  <?php endif; ?>
		  
		  
		  <div class="item <?php if ($this->_tpl_vars['k']%6 == 5 || $this->_tpl_vars['k']%6 == 0): ?>large<?php else: ?>half<?php endif; ?> <?php if ($this->_tpl_vars['k']%6 == 0): ?>odd<?php else: ?><?php if ($this->_tpl_vars['k']%2 == 0): ?>even<?php else: ?>odd<?php endif; ?><?php endif; ?> <?php if ($this->_tpl_vars['item0']['image'] != ''): ?> hasbanner <?php endif; ?>">
                                    <?php if ($this->_tpl_vars['item0']['image'] != ""): ?>
					<img src="<?php echo $this->_tpl_vars['item0']['image']; ?>
" style="margin:0 0;" alt="<?php echo $this->_tpl_vars['item0']['name']; ?>
" title="<?php echo $this->_tpl_vars['item0']['name']; ?>
" >
                                    <?php else: ?>
					<img src="images/green.jpg" style="margin:0 0;" alt="<?php echo $this->_tpl_vars['item0']['name']; ?>
" title="<?php echo $this->_tpl_vars['item0']['name']; ?>
" >
				    <?php endif; ?>
                                    <div class="description divlink <?php echo $this->_tpl_vars['item0']['disp']; ?>
" onclick="window.location='index.php?do=product&level=1&industryid=<?php echo $this->_tpl_vars['item0']['id']; ?>
'">
                                        <time><?php echo $this->_tpl_vars['_category']; ?>
</time>
                                        <h4><a class="tile_title" href="index.php?do=product&level=1&industryid=<?php echo $this->_tpl_vars['item0']['id']; ?>
" title="<?php echo $this->_tpl_vars['level0']['name']; ?>
" class="typeboxlet01"><?php echo $this->_tpl_vars['item0']['name']; ?>
</a></h4>

                                        <ul>
					  <?php $_from = $this->_tpl_vars['item0']['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_1_industry'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_1_industry']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key_level1'] => $this->_tpl_vars['level1']):
        $this->_foreach['level_1_industry']['iteration']++;
?>
					  	<li>
							<a href="index.php?do=product&level=2&industryid=<?php echo $this->_tpl_vars['level1']['id']; ?>
" title="<?php echo $this->_tpl_vars['level1']['name']; ?>
" class="typeboxlet01"><?php echo $this->_tpl_vars['level1']['name']; ?>
</a>                        
						</li>				     
					  <?php endforeach; endif; unset($_from); ?>
					    <li><a href="index.php?do=product&level=1&industryid=<?php echo $this->_tpl_vars['item0']['id']; ?>
"><?php echo $this->_tpl_vars['_read_more']; ?>
</a></li>					    
					</ul>

                                    </div>
                                    <a href="<?php if ($this->_tpl_vars['item0']['url'] != ""): ?> <?php echo $this->_tpl_vars['item0']['url']; ?>
 <?php else: ?> # <?php endif; ?> " target="_blank"></a>
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
	<!--<div class="wpb_content_element span3 column_container">
		<div class="wpb_wrapper">
			 <div class="row-fluid">
	<div class="wpb_content_element wpb_single_image span12">
		<div class="wpb_wrapper">
			<img src="http://theme.crumina.net/onetouch/wp-content/uploads/2012/12/director1.png" width="335" height="367" />
		</div> 
	</div> </div> 
		</div> 
	</div>-->
	<div class="wpb_content_element span4 column_container" style="margin-left: 20px">
		<div class="wpb_wrapper">
			 <div class="row-fluid">
	<div class="wpb_content_element span12 text-item wpb_text_column">
		<div class="wpb_wrapper">
			
<h6>Great made option</h6>
<h2><a>Thông báo</a></h2>
Psychic self-regulation, to a first approximation, enlightens positivist ericson hypnosis, so is a kind of

relationship with the darkness of the unconscious. Thinking integrates cultural entity

<img class="icon_post" title="settings" alt="" src="<?php echo $this->_tpl_vars['theme_img_path']; ?>
/image/settings.png" width="32" height="32" />


		</div> 
	</div> </div> <div class="row-fluid">
	<div class="wpb_content_element span12 text-item no-740 wpb_text_column">
		<div class="wpb_wrapper">
			
<h6>It was hard to make it so cool</h6>
<h2><a>Quyền lợi thành viên</a></h2>
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.

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
			
<h6>Great made option</h6>
<h2><a>Điều khoản sử dụng</a></h2>
Psychic self-regulation, to a first approximation, enlightens positivist ericson hypnosis, so is a kind of

relationship with the darkness of the unconscious. Thinking integrates cultural entity

<img class="icon_post" title="settings" alt="" src="<?php echo $this->_tpl_vars['theme_img_path']; ?>
/image/settings.png" width="32" height="32" />


		</div> 
	</div> </div> <div class="row-fluid">
	<div class="wpb_content_element span12 text-item no-740 wpb_text_column">
		<div class="wpb_wrapper">
			
<h6>It was hard to make it so cool</h6>
<h2><a>Bảo mật</a></h2>
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.

<img class="icon_post" title="check" alt="" src="<?php echo $this->_tpl_vars['theme_img_path']; ?>
/image/check1.png" width="32" height="32" />


		</div> 
	</div> </div> 
		</div> 
	</div>  
	<div class="wpb_content_element span4 pad-r20 column_container"  style="visibility: hidden">
		<div class="wpb_wrapper">
			 <!--<div class='tile mini' style='background-color:#57bae8'>
			  <a href='http://theme.crumina.net/onetouch/features/visual-composer/'></a>
			  <div  style='margin-top:29.5px;' class='icon big_icon_center' >
			    <img src='http://theme.crumina.net/onetouch/wp-content/uploads/2012/12/composer.png' alt=''>
			  </div>
			 </div>-->
			 <div class='tile mini' style='background-color:#FE7477'>
			  <a href='http://kinhdoanhtiepthi.vn' target="_blank"></a>
			  <div class='text-tile text-big-left top-left-custom' >Thông tin thị trường</div>
			 </div>
			 
			 <div class='tile mini' style='background-color:#57BAE8'>
			  <a href='#'></a>
			  <div class='text-tile text-big-left top-left-custom' >Hội chợ</div>
			 </div>
			 
			 <div class='tile mini' style='background-color:#f8d639'>
			  <a href='#'></a>
			  <div class='text-tile text-big-left top-left-custom' >Câu lạc bộ</div>
			 </div>
			 
			 <div class='tile mini' style='background-color:#62a73d'>
			  <a href='#'></a>
			  <div class='text-tile text-big-left top-left-custom' >Ngành nghề dịch vụ</div>
			 </div>
			 
			 <!--<div class='tile mini' style='background-color:#90a7b1'>
			 <a href='http://theme.crumina.net/onetouch/features/tile-generator/'></a><div class='icon icon_center' ><img src='http://theme.crumina.net/onetouch/wp-content/uploads/2012/12/maps-70x70.png' alt=''></div><div class='text-tile text-mini-left' >Tile generator</div></div> <div class='tile mini' style='background-color:#57bae8'><a href='http://theme.crumina.net/onetouch/features/slider-revolution/'></a><img class='ibg' src='http://theme.crumina.net/onetouch/wp-content/uploads/2012/12/slider3.png' alt='' /></div> -->
		</div> 
	</div> </div>    </div>

    </div></div></div></div><div id="aq-block-5" class="aq-block aq-block-aq_recent_block fifteen columns aq-first cf">        <div id="recent" class="section-block clearing-container">
        <span class="icon recent"></span>
        <div class="subtitle"><?php echo $this->_tpl_vars['_category']; ?>
</div>
        <h2 class="block-title">Thị trường nổi bật</h2>
   

    <div class="works-list hot_market dragger" style="margin-top: 20px;height: auto">
        <ul class="filterable-grid gr-box" style="width: 100%">
            

	    

                                

                
		
		   <li class="item large odd" style="float: left;width: 3">
                                    					<img title="Đồ cổ, bộ sưu tập" alt="Đồ cổ, bộ sưu tập" style="margin:0 0;" src="images/bds1.png">
				                                        <div onclick="window.location='index.php?do=product&amp;level=1&amp;industryid=19'" class="description divlink ">
                                        <time>Chuyên mục</time>
                                        <h4><a title="" href="index.php?do=product&amp;level=1&amp;industryid=19" class="tile_title">Bất động sản</a></h4>

                                        

                                    </div>
                                    <a target="_blank" href=" http://localhost/b2bwin8/index.php?do=special&amp;action=detail&amp;id=19  "></a>
                  </li>

		
		  <?php $_from = $this->_tpl_vars['IndustryList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_0'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_0']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key0'] => $this->_tpl_vars['item0']):
        $this->_foreach['level_0']['iteration']++;
?>
	    <?php if ($this->_tpl_vars['key0'] == 5): ?>

		  
		  
		  <li style="float: left;width: 3" class="item large odd<?php if ($this->_tpl_vars['item0']['image'] != ''): ?> hasbanner <?php endif; ?>">
                                    <?php if ($this->_tpl_vars['item0']['image'] != ""): ?>
					<img src="<?php echo $this->_tpl_vars['item0']['image']; ?>
" style="margin:0 0;" alt="<?php echo $this->_tpl_vars['item0']['name']; ?>
" title="<?php echo $this->_tpl_vars['item0']['name']; ?>
" >
                                    <?php else: ?>
					<img src="images/green.jpg" style="margin:0 0;" alt="<?php echo $this->_tpl_vars['item0']['name']; ?>
" title="<?php echo $this->_tpl_vars['item0']['name']; ?>
" >
				    <?php endif; ?>
                                    <div class="description divlink <?php echo $this->_tpl_vars['item0']['disp']; ?>
" onclick="window.location='index.php?do=product&level=1&industryid=<?php echo $this->_tpl_vars['item0']['id']; ?>
'">
                                        <time><?php echo $this->_tpl_vars['_category']; ?>
</time>
                                        <h4><a class="tile_title" href="index.php?do=product&level=1&industryid=<?php echo $this->_tpl_vars['item0']['id']; ?>
" title="<?php echo $this->_tpl_vars['level0']['name']; ?>
" class="typeboxlet01"><?php echo $this->_tpl_vars['item0']['name']; ?>
</a></h4>

                                        <ul>
					  <?php $_from = $this->_tpl_vars['item0']['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_1_industry'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_1_industry']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key_level1'] => $this->_tpl_vars['level1']):
        $this->_foreach['level_1_industry']['iteration']++;
?>
					  	<li>
							<a href="index.php?do=product&level=2&industryid=<?php echo $this->_tpl_vars['level1']['id']; ?>
" title="<?php echo $this->_tpl_vars['level1']['name']; ?>
" class="typeboxlet01"><?php echo $this->_tpl_vars['level1']['name']; ?>
</a>                        
						</li>				     
					  <?php endforeach; endif; unset($_from); ?>
					    <li><a href="index.php?do=product&level=1&industryid=<?php echo $this->_tpl_vars['item0']['id']; ?>
"><?php echo $this->_tpl_vars['_read_more']; ?>
</a></li>					    
					</ul>

                                    </div>
                                    <a href="<?php if ($this->_tpl_vars['item0']['url'] != ""): ?> <?php echo $this->_tpl_vars['item0']['url']; ?>
 <?php else: ?> # <?php endif; ?> " target="_blank"></a>
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
                                    <?php if ($this->_tpl_vars['item0']['image'] != ""): ?>
					<img src="<?php echo $this->_tpl_vars['item0']['image']; ?>
" style="margin:0 0;" alt="<?php echo $this->_tpl_vars['item0']['name']; ?>
" title="<?php echo $this->_tpl_vars['item0']['name']; ?>
" >
                                    <?php else: ?>
					<img src="images/green.jpg" style="margin:0 0;" alt="<?php echo $this->_tpl_vars['item0']['name']; ?>
" title="<?php echo $this->_tpl_vars['item0']['name']; ?>
" >
				    <?php endif; ?>
                                    <div class="description divlink <?php echo $this->_tpl_vars['item0']['disp']; ?>
" onclick="window.location='index.php?do=product&level=1&industryid=<?php echo $this->_tpl_vars['item0']['id']; ?>
'">
                                        <time><?php echo $this->_tpl_vars['_category']; ?>
</time>
                                        <h4><a class="tile_title" href="index.php?do=product&level=1&industryid=<?php echo $this->_tpl_vars['item0']['id']; ?>
" title="<?php echo $this->_tpl_vars['level0']['name']; ?>
" class="typeboxlet01"><?php echo $this->_tpl_vars['item0']['name']; ?>
</a></h4>

                                        <ul>
					  <?php $_from = $this->_tpl_vars['item0']['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_1_industry'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_1_industry']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key_level1'] => $this->_tpl_vars['level1']):
        $this->_foreach['level_1_industry']['iteration']++;
?>
					  	<li>
							<a href="index.php?do=product&level=2&industryid=<?php echo $this->_tpl_vars['level1']['id']; ?>
" title="<?php echo $this->_tpl_vars['level1']['name']; ?>
" class="typeboxlet01"><?php echo $this->_tpl_vars['level1']['name']; ?>
</a>                        
						</li>				     
					  <?php endforeach; endif; unset($_from); ?>
					    <li><a href="index.php?do=product&level=1&industryid=<?php echo $this->_tpl_vars['item0']['id']; ?>
"><?php echo $this->_tpl_vars['_read_more']; ?>
</a></li>					    
					</ul>

                                    </div>
                                    <a href="<?php if ($this->_tpl_vars['item0']['url'] != ""): ?> <?php echo $this->_tpl_vars['item0']['url']; ?>
 <?php else: ?> # <?php endif; ?> " target="_blank"></a>
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
  
</div></div>
</div>

</div>
  </div>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>



