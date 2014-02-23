<?php /* Smarty version 2.6.27, created on 2013-06-27 23:06:43
         compiled from default/header.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip_tags', 'default/header.html', 15, false),)), $this); ?>
  <!DOCTYPE html>

<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
<title><?php echo $this->_tpl_vars['page_title']; ?>
</title>
<base href="<?php echo $this->_tpl_vars['SiteUrl']; ?>
">
<meta name ="keywords" content="<?php echo ((is_array($_tmp=$this->_tpl_vars['metakeywords'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script src="http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/assets/js/modernizr.foundation.js"></script>

  <link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,200italic,300italic,400italic,600italic,700italic' rel='stylesheet' type='text/css'>

  <link rel="icon" type="image/png" href="">

  
  

  

<link rel="stylesheet" href="<?php echo $this->_tpl_vars['theme_img_path']; ?>
css/woocommerce.css?ver=3.5.1">
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['theme_img_path']; ?>
css/aqpb-view.css?ver=1364883969">
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['theme_img_path']; ?>
css/bootstrap.css?ver=3.4.12">
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['theme_img_path']; ?>
css/js_composer_front.css?ver=3.4.12">
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['theme_img_path']; ?>
css/settings.css?ver=3.5.1">
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['theme_img_path']; ?>
css/captions.css?ver=3.5.1">
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['theme_img_path']; ?>
css/frontend.css">
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['theme_img_path']; ?>
css/foundation.min.css">
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['theme_img_path']; ?>
css/app.css">
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['theme_img_path']; ?>
css/shortcodes.css">
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['theme_img_path']; ?>
css/responsive.css">
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['theme_img_path']; ?>
css/colorbox.css">
    <link rel="stylesheet" href="<?php echo $this->_tpl_vars['theme_img_path']; ?>
css/pml.css">
<script type='text/javascript' src='<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/jquery.js?ver=1.8.3'></script>
<script type='text/javascript' src='<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/jquery.themepunch.plugins.min.js?ver=3.5.1'></script>
<script type='text/javascript' src='<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/jquery.themepunch.revolution.min.js?ver=3.5.1'></script>
<script type='text/javascript' src='<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/modernizr.foundation.js'></script>
<script type='text/javascript' src='<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/foundation.min.js'></script>
<script type='text/javascript' src='<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/app.js'></script>
<script type='text/javascript' src='<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/jquery.number.js'></script>
<script type='text/javascript' src='<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/jquery.stickyscroll.js'></script>
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/fancybox/jquery.fancybox.css">
<script type='text/javascript' src='<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/fancybox/jquery.fancybox.js'></script>
<script type='text/javascript' src='<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/jquery.jcookie.min.js'></script>

<script src="<?php echo $this->_tpl_vars['WebRootUrl']; ?>
data/cache/<?php echo $this->_tpl_vars['JsLanguage']; ?>
/locale.js" charset="<?php echo $this->_tpl_vars['charset']; ?>
"></script>

<!-- WooCommerce Version -->
<meta name="generator" content="WooCommerce 1.6.6" />

	<link rel="canonical" href="http://theme.crumina.net/onetouch/">

   <!--[if IE]>
    <script src="<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/html5.js"></script>
    <link href='<?php echo $this->_tpl_vars['theme_img_path']; ?>
css/ie.css' rel='stylesheet' type='text/css'>
  <![endif]-->

      
        <link href='<?php echo $this->_tpl_vars['theme_img_path']; ?>
css/options.css' rel='stylesheet' type='text/css'>

	<?php echo '
<style>
#body-wrapper {
	background-attachment:fixed!important;
	background-repeat:repeat;
}
</style>

<script type="application/x-javascript">
	
	function getCart(p_id, amount) {
		var param = "";
		if(typeof(p_id)!=\'undefined\')
		{
			param += "&id="+p_id;
		}
		if(typeof(amount)!=\'undefined\') param += "&amount="+amount;
		
		//code
		$.ajax({
			url: "index.php?do=product&action=getTopCartAjax"+param,
		}).done(function ( data ) {
			if( console && console.log ) {
				//alert(data);
				$(\'#topCart\').html(data);
				$(\'a.cart_link\').click(function(){$(\'.item_rows\').toggle()});
				$(\'.item_rows\').hover(
					function () {
					    //$(\'#settingbox\').fadeIn();
					}
					,
					function () {
					    $(\'.item_rows\').fadeOut();
					}
				);
				
				//alert
				if(typeof(p_id)!=\'undefined\')
				{
					//alert("'; ?>
<?php echo $this->_tpl_vars['_added_to_cart']; ?>
<?php echo '");
					//$(\'#box_alert\')
					$(\'#hiddenclicker\').trigger(\'click\');
				}
			}
		});
	}
	
	function removeCartItem(id, row, down) {
		//code
		//alert(down.replace(/\\./g, ""));
		//alert($.number($(\'#cart_total\').html().replace(/\\./g, "") - down.replace(/\\./g, ""), 0, \',\', \'.\'));
		
		$.ajax({
			url: "index.php?do=product&action=add_cart&task=remove&cartitemid="+id,
		}).done(function ( data ) {
			if( console && console.log ) {
				//alert(data);
				$(row).parent().parent().fadeOut();
				$(\'#cart_count\').html($(\'#cart_count\').html()-1);
				
				$(\'#cart_total\').html($.number($(\'#cart_total\').html().replace(/\\./g, "") - down.replace(/\\./g, ""), 0, \',\', \'.\'));
				
			}
		});
	}
	
	function getInbox() {
		//code
		$.ajax({
			url: "index.php?do=product&action=ajaxInbox",
		}).done(function ( data ) {
			if( console && console.log ) {
				$("#inbox_out").html(data);
			}
		});
	}
	
	var pos_searchlist = 328;
	$(document).ready(function() {
		if (window.chrome) {
			$("#f_language_bar").css("margin-top", "-1px");
			$("#settingouter").css("margin-top", "0px");
		}
		
		$(\'.thumbnails a\').eq(4).css(\'margin-right\', \'0\');
		
		getCart();
		getInbox();
		//$(\'a.cart_link\').click(function(){
		//	$(\'.item_rows\').toggle();
		//});
		
		$("#hiddenclicker").fancybox({
			\'padding\': 0,
			\'zoomOpacity\': true,
			\'zoomSpeedIn\': 500,
			\'zoomSpeedOut\': 500,
			\'overlayOpacity\': 0.75,
			\'frameWidth\': 530,
			\'frameHeight\': 400,
			\'hideOnContentClick\': false
		});
		
		$("#welcome_but").fancybox({
			\'padding\': 0,
			\'zoomOpacity\': true,
			\'zoomSpeedIn\': 500,
			\'zoomSpeedOut\': 500,
			\'overlayOpacity\': 0.75,
			\'frameWidth\': 530,
			\'frameHeight\': 400,
			\'hideOnContentClick\': false
		});
		
		$(".banner_top").fancybox({
			\'padding\': 0,
			\'zoomOpacity\': true,
			\'zoomSpeedIn\': 500,
			\'zoomSpeedOut\': 500,
			\'overlayOpacity\': 0.75,
			\'frameWidth\': 530,
			\'frameHeight\': 400,
			\'hideOnContentClick\': false
		});
		
		//$(".banner_top").click(function(){alert("assadas")});
		$(\'.ws_images div\').eq(1).css(\'display\', \'none\');
		
		//$(\'.connect_menu li a.menu_lvl1\').click(function(){
		//	$(this).parent().parent().css(\'visibility\', \'hidden\');
		//	$(\'.nav-products-menu\').css(\'height\', $(this).parent().find(\'ul\').height()+100);
		//	$(this).parent().find(\'ul\').css(\'display\', \'block\');
		//	$(this).parent().find(\'ul\').css(\'visibility\', \'visible\');
		// });
		//
		// $(\'.connect_menu .menu li ul li a.bmenu_lvl2\').click(function(){
		//  
		//	$(this).parent().parent().parent().parent().css(\'visibility\', \'visible\');
		//	$(\'.nav-products-menu\').css(\'height\', \'auto\');			
		//	$(this).parent().parent().css(\'visibility\', \'hidden\');
		// });
		// 
		// $(\'.connect_menu li a.menu_lvl2\').click(function(){
		//	$(this).parent().parent().css(\'visibility\', \'hidden\');
		//	$(\'.nav-products-menu\').css(\'height\', $(this).parent().find(\'ul\').height()+100);
		//	$(this).parent().find(\'ul\').css(\'display\', \'block !important\');
		//	$(this).parent().find(\'ul\').css(\'visibility\', \'visible !important\');
		// });
		//
		// $(\'.connect_menu .menu li ul li a.bmenu_lvl3\').click(function(){
		//  
		//	$(this).parent().parent().parent().parent().css(\'visibility\', \'visible\');
		//	$(\'.nav-products-menu\').css(\'height\', \'auto\');			
		//	$(this).parent().parent().css(\'visibility\', \'hidden\');
		// });
		
		//$(\'#left-sidebar\').stickyScroll({ container: \'#containerz\' });
		//$(\'.connect_searchx\').stickyScroll({ container: \'#containerz\', topBoundary: \'32px\' });
		
		//cookie
		$.cookie.settings = {
		    path : "/",
		    expires : 2
		};
		 
		//$.cookie("welcome", "cookie_value");
		//$.cookie("cookie_name2", "cookie_value2");
		//alert($.cookie("welcome"));
		if (typeof($.cookie("welcome")) == \'undefined\') {
		 //code
		 $.cookie("welcome", true);
		 $(\'#welcome_but\').trigger(\'click\');
		}
		
		
		
		
	});
	
$(window).scroll(function(){
    $.each($(\'.connect_searchx\'),function(){
        var eloffset = $(this).offset();
	var windowpos;
	if ($(window).scrollTop() >= pos_searchlist) {
	  windowpos = $(window).scrollTop()+27;
	}
	else
	{
	  windowpos = $(window).scrollTop();
	}
        
        if(windowpos<eloffset.top) {
            $(this).css(\'position\', \'absolute\');
	    $(this).css(\'top\', pos_searchlist+\'px\');
        } else {
            $(this).css(\'position\', \'fixed\');
	    $(this).css(\'top\', \'27px\');    
        }
	//console.log(eloffset.top);
	//console.log(windowpos);
	//console.log($(this).css(\'top\'));
    });
    
    
    
});
</script>

	'; ?>

	

</head>

<body class="home page page-template page-template-page-no_top-php theme-onetouch wpb-js-composer js-comp-ver-3.4.12 vc_responsive">
	
<div id="loading" style="display: none"><?php echo $this->_tpl_vars['_loading']; ?>
</div>

<?php echo '
<script> var customStyleImgUrl = "http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/";</script>
'; ?>


<div id = "custom-style-wrapper" style="display: none">
    <div id="tempate-switcher" style="display: none;">

        <div class="option-title">
            <span>Choose site template:</span>
        </div>

        <div class="template-switch">
            <a class="template-option" href = "http://theme.crumina.net/onetouch/" data-size="normal"><img src="http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/checkbox_2.png" alt="">Usual</a>
            <a class="template-option" href = "http://theme.crumina.net/onetouch/magazine-layout/" data-size="magazine"><img src="http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/checkbox_2.png" alt="">Magazine</a>
            <a class="template-option" href = "http://theme.crumina.net/onetouch/corporate-layout/" data-size="corporate"><img src="http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/checkbox_2.png" alt="">Corporate</a>
        </div>


    </div>

    <div id="custom-style" style="display: none;">

        <div class="option-title">
            <span>
            Choose background:
            </span>
        </div>

        <ul class="background-select">
            <li data-selector = "#body-wrapper"><span class = "bg-title">16 Content BG textures</span> <span class="float-right"><a class="pattern-example color"><img src="http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/color.png" alt="" /></a><a class="pattern-example image"><img src="http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/title-icon.png" alt="" /></a></span>
                <div class="pattern-select-wrapper"><div class="pattern-select"><div class="pattern-example pic"><img src = "http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/pattern/thumb/furley_bg.png" alt = "" /> </div><div class="pattern-example pic"><img src = "http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/pattern/thumb/2.jpg" alt = "" /> </div><div class="pattern-example pic"><img src = "http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/pattern/thumb/1.jpg" alt = "" /> </div><div class="pattern-example pic"><img src = "http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/pattern/thumb/city.jpg" alt = "" /> </div><div class="pattern-example pic"><img src = "http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/pattern/thumb/3.jpg" alt = "" /> </div><div class="pattern-example pic"><img src = "http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/pattern/thumb/tileable_wood_texture.png" alt = "" /> </div><div class="pattern-example pic"><img src = "http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/pattern/thumb/vertical_cloth.png" alt = "" /> </div><div class="pattern-example pic"><img src = "http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/pattern/thumb/bg.jpg" alt = "" /> </div><div class="pattern-example pic"><img src = "http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/pattern/thumb/purty_wood.png" alt = "" /> </div><div class="pattern-example pic"><img src = "http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/pattern/thumb/scribble_light.png" alt = "" /> </div><div class="pattern-example pic"><img src = "http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/pattern/thumb/brushed_alu.png" alt = "" /> </div><div class="pattern-example pic"><img src = "http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/pattern/thumb/hexellence.png" alt = "" /> </div><div class="pattern-example pic"><img src = "http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/pattern/thumb/darkdenim3.png" alt = "" /> </div><div class="pattern-example pic"><img src = "http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/pattern/thumb/111.jpg" alt = "" /> </div><div class="pattern-example pic"><img src = "http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/pattern/thumb/diamond_upholstery2.png" alt = "" /> </div><div class="pattern-example pic"><img src = "http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/pattern/thumb/egg_shell.png" alt = "" /> </div></div></div>            </li>
            <li data-selector = "#darkf"><span class = "bg-title">16 Footer BG textures</span> <span class="float-right"><a class="pattern-example color"><img src="http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/color.png" alt="" /></a><a class="pattern-example image"><img src="http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/title-icon.png" alt="" /></a></span>
                <div class="pattern-select-wrapper"><div class="pattern-select"><div class="pattern-example pic"><img src = "http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/pattern/thumb/furley_bg.png" alt = "" /> </div><div class="pattern-example pic"><img src = "http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/pattern/thumb/2.jpg" alt = "" /> </div><div class="pattern-example pic"><img src = "http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/pattern/thumb/1.jpg" alt = "" /> </div><div class="pattern-example pic"><img src = "http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/pattern/thumb/city.jpg" alt = "" /> </div><div class="pattern-example pic"><img src = "http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/pattern/thumb/3.jpg" alt = "" /> </div><div class="pattern-example pic"><img src = "http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/pattern/thumb/tileable_wood_texture.png" alt = "" /> </div><div class="pattern-example pic"><img src = "http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/pattern/thumb/vertical_cloth.png" alt = "" /> </div><div class="pattern-example pic"><img src = "http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/pattern/thumb/bg.jpg" alt = "" /> </div><div class="pattern-example pic"><img src = "http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/pattern/thumb/purty_wood.png" alt = "" /> </div><div class="pattern-example pic"><img src = "http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/pattern/thumb/scribble_light.png" alt = "" /> </div><div class="pattern-example pic"><img src = "http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/pattern/thumb/brushed_alu.png" alt = "" /> </div><div class="pattern-example pic"><img src = "http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/pattern/thumb/hexellence.png" alt = "" /> </div><div class="pattern-example pic"><img src = "http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/pattern/thumb/darkdenim3.png" alt = "" /> </div><div class="pattern-example pic"><img src = "http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/pattern/thumb/111.jpg" alt = "" /> </div><div class="pattern-example pic"><img src = "http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/pattern/thumb/diamond_upholstery2.png" alt = "" /> </div><div class="pattern-example pic"><img src = "http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/pattern/thumb/egg_shell.png" alt = "" /> </div></div></div>            </li>
            <li data-selector = "body"><span class = "bg-title">16 Body BG textures</span> <span class="float-right"><a class="pattern-example color"><img src="http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/color.png" alt="" /></a><a class="pattern-example image"><img src="http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/title-icon.png" alt="" /></a></span>
                <div class="pattern-select-wrapper"><div class="pattern-select"><div class="pattern-example pic"><img src = "http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/pattern/thumb/furley_bg.png" alt = "" /> </div><div class="pattern-example pic"><img src = "http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/pattern/thumb/2.jpg" alt = "" /> </div><div class="pattern-example pic"><img src = "http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/pattern/thumb/1.jpg" alt = "" /> </div><div class="pattern-example pic"><img src = "http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/pattern/thumb/city.jpg" alt = "" /> </div><div class="pattern-example pic"><img src = "http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/pattern/thumb/3.jpg" alt = "" /> </div><div class="pattern-example pic"><img src = "http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/pattern/thumb/tileable_wood_texture.png" alt = "" /> </div><div class="pattern-example pic"><img src = "http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/pattern/thumb/vertical_cloth.png" alt = "" /> </div><div class="pattern-example pic"><img src = "http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/pattern/thumb/bg.jpg" alt = "" /> </div><div class="pattern-example pic"><img src = "http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/pattern/thumb/purty_wood.png" alt = "" /> </div><div class="pattern-example pic"><img src = "http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/pattern/thumb/scribble_light.png" alt = "" /> </div><div class="pattern-example pic"><img src = "http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/pattern/thumb/brushed_alu.png" alt = "" /> </div><div class="pattern-example pic"><img src = "http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/pattern/thumb/hexellence.png" alt = "" /> </div><div class="pattern-example pic"><img src = "http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/pattern/thumb/darkdenim3.png" alt = "" /> </div><div class="pattern-example pic"><img src = "http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/pattern/thumb/111.jpg" alt = "" /> </div><div class="pattern-example pic"><img src = "http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/pattern/thumb/diamond_upholstery2.png" alt = "" /> </div><div class="pattern-example pic"><img src = "http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/pattern/thumb/egg_shell.png" alt = "" /> </div></div></div>            </li>
        </ul>

        <div class="option-title">
            <span>
            Choose layout:
            </span>
        </div>

        <ul class="wrapper-switch" data-checkbox="http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/">
            <li><a class="boxed-switcher" data-wrap="no-wrap"><img src="http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/checkbox_1.png" alt="">Wide layout 1200 px grid</a></li>
            <li><a class="boxed-switcher" data-wrap="wrap-2"><img src="http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/checkbox_2.png" alt="">Boxed layout 1200 px grid</a></li>
        </ul>

        <div class="option-title">
            <span>
            Choose menu:
            </span>
        </div>

        <a class="menu-option" data-size="normal"><img src="http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/checkbox_1.png" alt="">First variant</a>
        <a class="menu-option" data-size="dropdown"><img src="http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/checkbox_2.png" alt="">Second variant</a>

        <div class="option-title">
            <span>
            Choose slider width:
            </span>
        </div>


        <div class="slider-switch">
            <a class="slider-switcher current" data-size="boxed"><img src="http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/slider-1.png" alt=""></a>
            <a class="slider-switcher" data-size="right"><img src="http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/slider-2.png" alt=""></a>
            <a class="slider-switcher" data-size="full"><img src="http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/slider-3.png" alt=""></a>
        </div>

        <a href="" id="load_defaults_settings">Load Defaults</a>
        <img id="appear_icon" src=http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/settings.png alt="" />
        <div id="custom-style-colorpicker">
        </div>
    </div>

</div>


<a id="hiddenclicker" href="#box_alert" style="display: none">Hidden Clicker</a>
<div id="box_alert" style="display: none">
	
	<div style="padding: 20px;width: 300px">
			<h4><?php echo $this->_tpl_vars['_added_to_cart']; ?>
</h4>
<br />
			<p>
				<a id="add_paragraph" title="Add" class="button button-blue" href="index.php?do=product&action=add_cart"><?php echo $this->_tpl_vars['_go_to_cart']; ?>
</a>
				&nbsp;
				<a href="javascript:$.fancybox.close();"><?php echo $this->_tpl_vars['_close']; ?>
</a>
			</p>
			
	</div>
	
   </div>

   <a id="welcome_but" href="#welcome_box" style="display: none">Hidden Clicker</a>
<div id="welcome_box" style="display: none">
	
	<div style="padding: 20px;width: 900px">
			
			<h2><strong>Kính chào Quý khách !</strong></h2>
<p>Trang Market Online là nơi hội tụ và gặp gỡ giữa người tiêu dùng và nhà cung cấp sản phẩm/dịch vụ. Ngoài ra còn là nơi trao đổi thông tin thương mại/đầu tư giữa cá nhân/doanh nghiệp/tổ chức trong và ngoài nước.</p>
<p>Mời bạn <a href="logging.php">đăng ký thành viên</a> để tham gia với chúng tôi.</p>
<p>- <strong>Bạn là người tiêu dùng:</strong> cung cấp thông tin sản phẩm/khuyến mãi/nhu cầu mua sắm của bạn. </p>
<p>- <strong>Bạn là người bán sản phẩm, cần tìm kiếm khách hàng:</strong> mở gian hàng miễn phí với đa dạng thể loại sản phẩm. Tham khảo tại <a href="#">shop mẫu</a></p>
<p>- <strong>Bạn là nhà phân phối/doanh nghiệp:</strong> tìm kiếm/đăng nhu cầu mua-bán/đầu tư/tuyển dụng,... Mở rộng kinh doanh, nâng cao thương hiệu. Tham khảo tại <a href="#">trang doanh nghiệp mẫu</a></p>
			
	</div>
	
   </div>

   <div id="box_underi" style="display: none">
	
	<div style="padding: 20px 20px 10px 20px;width: 500px">
			<p style="text-align: center; font-size: 18px;">
			 <img src="slider/linkBuilding.jpg" />
			 <br />Trang thương mại điện tử <strong>MarketOnline.vn</strong> sẽ cung cấp những dịch vụ này trong thời gian tới. Để thuận lợi trong kinh doanh/đẩy mạnh thương hiệu của Quý khách.<br /><br />Mời Quý khách đón nhận và tham gia !</p>
<br />
			
			
	</div>
	
   </div>