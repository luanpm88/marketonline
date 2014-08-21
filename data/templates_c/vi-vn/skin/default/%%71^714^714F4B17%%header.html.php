<?php /* Smarty version 2.6.27, created on 2014-08-21 12:22:35
         compiled from header.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'header.html', 317, false),array('function', 'formhash', 'header.html', 1196, false),)), $this); ?>
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
<title><?php echo $this->_tpl_vars['PageTitle']; ?>
 - <?php echo $this->_tpl_vars['COMPANY']['name']; ?>
</title>
<base href="<?php echo $this->_tpl_vars['SiteUrl']; ?>
">
<meta name ="keywords" content="<?php echo $this->_tpl_vars['TAG_STRING']; ?>
">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php if ($this->_tpl_vars['COMPANY']['logo']): ?><meta property="og:image" content="<?php echo $this->_tpl_vars['COMPANY']['logo_big']; ?>
"/><?php endif; ?>




<?php if ($this->_tpl_vars['fb_description']): ?>
<meta property="og:description" content="<?php echo $this->_tpl_vars['fb_description']; ?>
"/>
<meta name ="description" content="<?php echo $this->_tpl_vars['fb_description']; ?>
">
<?php else: ?>
<meta name ="description" content="MarketOnline.vn là Thị trường Giới thiệu, Cung cấp uy tín mọi nhu cầu Cuộc sống và Công việc dành cho Cá nhân/Công ty/Tổ chức trong và ngoài nước.">
<meta property="og:description" content="MarketOnline.vn là Thị trường Giới thiệu, Cung cấp uy tín mọi nhu cầu Cuộc sống và Công việc dành cho Cá nhân/Công ty/Tổ chức trong và ngoài nước."/>
<?php endif; ?>

  <!--<script src="http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/assets/js/modernizr.foundation.js"></script>-->

  <link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,200italic,300italic,400italic,600italic,700italic' rel='stylesheet' type='text/css'>

  <link rel="icon" type="image/png" href="">

  
  <link href="images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />

  

<link rel="stylesheet" href="<?php echo $this->_tpl_vars['theme_img_path']; ?>
css/woocommerce.css?ver=3.5.1">
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['theme_img_path']; ?>
css/aqpb-view.css?ver=1364883969">
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['theme_img_path']; ?>
css/bootstrap.css?ver=3.4.12">
<!--<link rel="stylesheet" href="<?php echo $this->_tpl_vars['theme_img_path']; ?>
css/js_composer_front.css?ver=3.4.12">-->
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
<!--<link rel="stylesheet" href="<?php echo $this->_tpl_vars['theme_img_path']; ?>
css/responsive.css">-->
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['theme_img_path']; ?>
css/colorbox.css">
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['theme_img_path']; ?>
css/tooltip/tooltipster.css">
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['theme_img_path']; ?>
css/jquery.mCustomScrollbar.css">
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['theme_img_path']; ?>
css/pml.css">
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['WebRootUrl']; ?>
templates/skins/default/css/custom_space.css">
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
<script src="https://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>

<link rel="stylesheet" href="<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/fancybox/jquery.fancybox.css">
<script type='text/javascript' src='<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/fancybox/jquery.fancybox.js'></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyCekN0iNOaac9Kla1TdA73q579qZhmVVRI&sensor=false"></script>
<script type='text/javascript' src='<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/jquery.mousewheel.js'></script>
<script type='text/javascript' src='<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/jquery.mCustomScrollbar.js'></script>
<script type='text/javascript' src='<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/jquery.resizecrop-1.0.3.js'></script>
<script type='text/javascript' src='<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/jquery.jcookie.min.js'></script>
<script type='text/javascript' src='<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/jquery.bxslider.js'></script>
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['theme_img_path']; ?>
css/jquery.bxslider.css">


<link href="<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/select2/select2.css" rel="stylesheet" type="text/css">
<script src="<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/select2/select2.min.js"></script>
<script src="<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/select2/select2_locale_vi.js"></script>


<script src="<?php echo $this->_tpl_vars['WebRootUrl']; ?>
data/cache/<?php echo $this->_tpl_vars['JsLanguage']; ?>
/locale.js" charset="<?php echo $this->_tpl_vars['charset']; ?>
"></script>

<script src="<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/jquery.qtip.min.js"></script>
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['theme_img_path']; ?>
css/jquery.qtip.min.css">

<script src="<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/custom.js?v=1"></script>

<link rel="stylesheet" media="screen" type="text/css" href="<?php echo $this->_tpl_vars['theme_img_path']; ?>
css/colorpicker.css" />

<link rel="stylesheet" media="screen" type="text/css" href="<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/nivo/nivo-slider.css" />
<link rel="stylesheet" media="screen" type="text/css" href="<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/nivo/themes/default/default.css" />

<script type="text/javascript" src="<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/jemotion/jemotion.js"></script>

<!--<script src="http://marketonline.vn/scripts/mudim-0.9-r162.js"></script>-->

<!-- WooCommerce Version -->
<meta name="generator" content="WooCommerce 1.6.6" />

	

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
 
 function showCart()
    {
        $.ajax({
	    url: "index.php?do=product&action=getTopCartAjaxNew",
	}).done(function ( data ) {
	    if( console && console.log ) {
                $(\'#show_top_cart\').html(data);
                $(\'#topcart-but\').trigger("click");
                //cart product image
                $(\'#cart img\').resizecrop({
		   width:200,
		   height:200
		});
            }
        });
    }
    
    

    
    function inserCustomBGFile(url, image) {
		$(\'#uploadIVbutton\').removeAttr(\'disabled\');
		//$(\'#uploadIVbutton\').attr(\'value\',\'Tải Ảnh/Video\');
		if (image) {
			//alert(url);
			d = new Date();
			$(\'#background_image\').val("url(\'"+"'; ?>
<?php echo $this->_tpl_vars['WebRootUrl']; ?>
<?php echo 'attachment/"+url+"\')");
			$(\'#body-wrapper\').css(\'backgroundImage\', "url(\''; ?>
<?php echo $this->_tpl_vars['WebRootUrl']; ?>
<?php echo 'attachment/"+url+"?"+d.getTime()+"\')");
			$(\'.custom_bg img\').attr("src", "'; ?>
<?php echo $this->_tpl_vars['WebRootUrl']; ?>
<?php echo 'attachment/"+url+"?"+d.getTime());
			$(\'#uploadIVbutton\').removeAttr(\'disabled\');
		}
			
	}
 
function goclicky_custom(meh, url, images, title, summary)
{
    var x = screen.width/2 - 626/2;
    var y = screen.height/2 - 436/2;
    window.open(
      \'https://www.facebook.com/sharer/sharer.php?s=100&p[url]=\'+url+images+\'&p[title]=\'+title+\'&p[summary]=\'+summary, 
      \'facebook-share-dialog\', 
      \'width=626,height=436,left=\'+x+\',top=\'+y); 
    return false;
    //window.open(meh.href, \'sharegplus\',\'height=485,width=700,left=\'+x+\',top=\'+y);
}

function goclicky(meh, url)
{
    var x = screen.width/2 - 626/2;
    var y = screen.height/2 - 436/2;
    window.open(
      \'https://www.facebook.com/sharer/sharer.php?u=\'+encodeURIComponent(url), 
      \'facebook-share-dialog\', 
      \'width=626,height=436,left=\'+x+\',top=\'+y); 
    return false;
    //window.open(meh.href, \'sharegplus\',\'height=485,width=700,left=\'+x+\',top=\'+y);
}
 
	function shareStreamFacebook(url) {
	 //code
	    FB.ui({
	      method: \'stream.share\',
	      u: url
	   }, function(response){});
	}
 
	function shareFeedFacebook(link, picture, name, caption, description) {
	 //code
	    FB.ui({
	     method: \'feed\',
	     link: link,
	     picture: picture,
	     name: name,
	     caption: caption,
	     description: description
	   }, function(response){});
	}
	
	function loadAlbumDetail(a_id, u_id, item)
	{
	    item.parent().prepend("<div class=\'img-after\'></div>");
	    //alert(p_id);
	    $.ajax({
			url: "index.php?do=product&action=loadAlbumDetail&id="+a_id+"&user="+u_id,
		}).done(function ( data ) {
			if( console && console.log ) {
				$(\'.img-after\').remove();
				//$(\'#album-detail-but\').trigger(\'click\');
				//$(\'.staticon span\').remove();
				//$(\'.staticon div\').remove();
				//$(\'.staticon\').append(data);
				//$(\'#com_album li a img\').removeClass("loading");
				$(\'#showAlbumDetail\').html(data);
				$(\'#showAlbumDetail\').css(\'display\',\'block\');
				$(\'h1.other_album\').css(\'display\',\'block\');
				//$(\'#com_album\').css(\'display\',\'none\');
				$("html, body").animate({ scrollTop: 500 }, 500);
				
				$(\'.album_close\').click(function(){
						$(\'#showAlbumDetail\').fadeOut();
						$(\'h1.other_album\').fadeOut();
				});
			}
		});
	}
	
	
	function refreshClickedCompany(p_id)
	{
	    //alert(p_id);
	    $.ajax({
			url: "index.php?do=product&action=refreshNewClickedCompany&id="+p_id,
		}).done(function ( data ) {
			if( console && console.log ) {
				//alert(data);
				$(\'.staticon span\').remove();
				$(\'.staticon div\').remove();
				$(\'.staticon\').append(data);
			}
		});
	}
	
	function getNewClicked(p_id) {
		$.ajax({
			url: "index.php?do=product&action=getNewClickedCompany&id="+p_id,
		}).done(function ( data ) {
			if( console && console.log ) {
				//alert(data);
				$(\'.staticon\').append(data);
			}
		});
	}
	
	function getCart(p_id, amount, item) {
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
	
	var pos_searchlist = 300;
	var ichatbox = new Array();
	var companylogo = \''; ?>
<?php if ($this->_tpl_vars['pb_company'] && $this->_tpl_vars['pb_userinfo']['current_type'] != 6): ?><?php echo $this->_tpl_vars['pb_company']['image']; ?>
<?php else: ?> <?php if ($this->_tpl_vars['user_avatar']): ?> <?php echo $this->_tpl_vars['user_avatar']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['theme_img_path']; ?>
image/usericon.jpg  <?php endif; ?>  <?php endif; ?><?php echo '\';
        
        var ROOT_URL = \''; ?>
<?php echo smarty_function_the_url(array('module' => "root-url"), $this);?>
<?php echo '\';
        
	$(document).ready(function() {
		if (window.chrome) {
			$("#f_language_bar").css("margin-top", "-1px");
			$("#settingouter").css("margin-top", "0px");
		}
		
		$(\'.thumbnails a\').eq(4).css(\'margin-right\', \'0\');
		
		
		'; ?>
<?php if ($this->_tpl_vars['pb_username'] != ""): ?><?php echo 'getTopChat();'; ?>
<?php endif; ?><?php echo '
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
		
		$("#album-detail-but").fancybox({
			\'padding\': 0,
			\'zoomOpacity\': true,
			\'zoomSpeedIn\': 500,
			\'zoomSpeedOut\': 500,
			\'overlayOpacity\': 0.75,
			\'frameWidth\': 530,
			\'frameHeight\': 400,
			\'hideOnContentClick\': false
		});
		
		$(".main_bannerz").fancybox({
			
		});
		
		$("#browser-info-but").fancybox({
			\'padding\': 0,
			\'zoomOpacity\': true,
			\'zoomSpeedIn\': 500,
			\'zoomSpeedOut\': 500,
			\'overlayOpacity\': 0.75,
			\'frameWidth\': 530,
			\'frameHeight\': 400,
			\'hideOnContentClick\': false
		});
		
		$(".no_ii a").fancybox({
			\'padding\': 0,
			\'zoomOpacity\': true,
			\'zoomSpeedIn\': 500,
			\'zoomSpeedOut\': 500,
			\'overlayOpacity\': 0.75,
			\'frameWidth\': 530,
			\'height\': 72,
			\'hideOnContentClick\': false
		});
		
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
		
		$("#edit_logo a").fancybox({
			\'padding\': 0,
			\'zoomOpacity\': true,
			\'zoomSpeedIn\': 500,
			\'zoomSpeedOut\': 500,
			\'overlayOpacity\': 0.75,
			\'frameWidth\': 530,
			\'frameHeight\': 400,
			\'hideOnContentClick\': false
		});
		
		$("#topcart-but").fancybox({
			\'padding\': 0,
			\'zoomOpacity\': true,
			\'zoomSpeedIn\': 500,
			\'zoomSpeedOut\': 500,
			\'overlayOpacity\': 0.75,
			\'frameWidth\': 530,
			\'frameHeight\': 400,
			\'hideOnContentClick\': false,
			helpers: { 
			      title: null
			}
		});
		
		$(\'.scrollbarleft ul li img\').click(function() {
			$(this).parent().find(\'ul\').toggle();
			$(this).parent().find(\'ul li ul\').css(\'display\',\'none\');
		});
		
		//$(".scrollbarleft").mCustomScrollbar({
		//			autoHideScrollbar:true,
		//			theme:"light-thin"
		//});
		
		
		
		$(\'.offers .imgout img\').resizecrop({
		   width:160,
		   height:160		   
		 });
		
		
		
		$(\'.offer_list .product img\').css("display", "block");
		
		//$(\'.logoz img\').css(\'display\', \'block\');
		
		$(\'#settingbox\').css(\'margin-left\', $(\'#settingouter\').width()-205);
		
		$("#policy_but").fancybox({
			\'padding\': 0,
			\'zoomOpacity\': true,
			\'zoomSpeedIn\': 500,
			\'zoomSpeedOut\': 500,
			\'overlayOpacity\': 0.75,
			\'frameWidth\': 530,
			\'frameHeight\': 400,
			\'hideOnContentClick\': false,
			helpers: { 
			      title: null
			}
		});
		
		if($(\'#content\').height() > $(\'#left-sidebar\').height())
		{
		    $(\'#left-sidebar\').css(\'min-height\',$(\'#content\').height()+45+"px");
		}
		
		
        	$(\'body\').click(function(){if($(\'.clicked_note_box\').css(\'display\') == \'block\') $(\'.clicked_note_box\').fadeOut("slow", refreshClickedCompany(\''; ?>
<?php echo $this->_tpl_vars['pb_company']['id']; ?>
<?php echo '\'))});	
		$(\'.staticon\').click(function(e){$(\'.over_air_box\').css("display","none");$(\'.clicked_note_box\').toggle();e.stopPropagation();});
		
		//$(\'.facebookOuter iframe\').addClass();
		$(\'.facebookOuter iframe\').ready(function() {
		    $(\'.facebookOuter iframe\').contents().find(".link").hide();
		});
		
		$(\'.top_tab_intro a\').click(function(){
		     $(\'.top_tab_intro a\').removeClass(\'active\');
		     $(\'#intro_tab\').css(\'display\', \'none\');
		     $(\'#policy_tab\').css(\'display\', \'none\');
		     $(\'#album_tab\').css(\'display\', \'none\');
		     
		     $(this).addClass(\'active\');
		     $(\'#\'+$(this).attr(\'rel\')).css(\'display\', \'block\');
		});
		
		$(\'.top_images_offer .offer-thumbnails a img\').resizecrop({
		   width:94,
		   height:94		   
		 });
		
		$(\'.uload_banner p img\').resizecrop({
		   width:80,
		   height:38		   
		 });
		
		$(\'.top_images_offer a img\').css("display", "block");
		
		$(\'#com_album li a img\').resizecrop({
		   width:434,
		   height:280		   
		 });
		$(\'#album_tab\').css(\'display\',\'none\');
		
		$("#com_album li a").fancybox({
			\'padding\': 0,
			\'zoomOpacity\': true,
			\'zoomSpeedIn\': 500,
			\'zoomSpeedOut\': 500,
			\'overlayOpacity\': 0.75,
			\'frameWidth\': 530,
			\'frameHeight\': 400,
			\'hideOnContentClick\': false
		});
		
		$("#share-info-but").fancybox({
			\'padding\': 0,
			\'zoomOpacity\': true,
			\'zoomSpeedIn\': 500,
			\'zoomSpeedOut\': 500,
			\'overlayOpacity\': 0.75,
			\'frameWidth\': 530,
			\'frameHeight\': 400,
			\'hideOnContentClick\': false
		});
		
		
		$(\'#topmenu img\').css("display", "block");
		
		//$(\'.pagination a, .pagination span\').each(function( index ){
		//  if($.isNumeric($(this).html())) $(this).html(parseInt($(this).html()) + 1);
		//  if($(this).html() == "2")
		//  {
		//     if (!$(\'.pagination span\').length) {
		//       $(this).before(\'<span>1</span>\');
		//     }
		//     else
		//     {
		//       $(this).before(\'<a href="\'+$(location).attr(\'href\').replace("pos=", "posz=")+\'">1</a>\');
		//     }
		//  }
		//});
		
		
		$(\'#custom-style-box .custom-button\').click(function(){
		   if($(\'#custom-style-box\').css("left") == "-275px")
		     $(\'#custom-style-box\').animate({left: "0"}, 500);
		   else
		     $(\'#custom-style-box\').animate({left: "-275px"}, 500);
		});
		
		
		
		//custom styles
		$(\'#colorSelector\').ColorPicker({
			 color: \''; ?>
<?php if ($this->_tpl_vars['styles']['backgroundColor']): ?><?php echo $this->_tpl_vars['styles']['backgroundColor']; ?>
<?php else: ?>#ffffff<?php endif; ?><?php echo '\',
			 onShow: function (colpkr) {
				 $(\'.colorpicker\').addClass(\'colorpicker_bg\');
				 $(colpkr).fadeIn(10);				 
				 return false;
			 },
			 onHide: function (colpkr) {
				 $(\'.colorpicker\').removeClass(\'colorpicker_bg\');
				 $(colpkr).fadeOut(10);				 
				 return false;
			 },
			 onChange: function (hsb, hex, rgb) {
				 $(\'#colorSelector div, #body-wrapper\').css(\'backgroundColor\', \'#\' + hex);
				 $(\'#background_color\').val(\'#\' + hex);
			 }
		 });
		'; ?>
<?php if ($this->_tpl_vars['styles']['backgroundColor']): ?><?php echo '
		    $(\'#colorSelector div\').css("background-color", "'; ?>
<?php echo $this->_tpl_vars['styles']['backgroundColor']; ?>
<?php echo '");
		    $(\'#background_color\').val("'; ?>
<?php echo $this->_tpl_vars['styles']['backgroundColor']; ?>
<?php echo '");
		'; ?>
<?php endif; ?><?php echo '
		 
		$(\'#body-wrapper-padding\').click(function(){if($(\'.pattern-select\').css(\'display\') == \'block\') $(\'.pattern-select\').fadeOut("slow")});	
		$(\'#backgroundSelector img\').eq(0).click(function(e){$(\'.pattern-select\').toggle();e.stopPropagation();});
		
		$(\'#backgroundSelector .pattern-example img\').click(function(){
		    $(\'#background_image\').val("url(\'"+$(this).attr("rel")+"\')");
		    $(\'#body-wrapper\').css(\'backgroundImage\', "url(\'"+$(this).attr("rel")+"\')");
		    if($(this).attr("rel") != "")
			$(\'.custom_bg img\').attr("src", $(this).attr("rel"));
		    else
			$(\'.custom_bg img\').attr("src", $(this).attr("src"));
		});
		'; ?>
<?php if ($this->_tpl_vars['styles']['backgroundImage']): ?><?php echo '
			var n="'; ?>
<?php echo $this->_tpl_vars['styles']['backgroundImage']; ?>
<?php echo '";
			var n=n.replace("url(\'","");
			var n=n.replace("\')","");
			
		    $(\'#background_image\').val("url(\'"+n+"\')");
		    
		    if("'; ?>
<?php echo $this->_tpl_vars['styles']['backgroundImage']; ?>
<?php echo '" != "url(\'\')")
		    {
			
			//alert(n);		    
			$(\'.custom_bg img\').attr("src", n);
		    }
		    
		'; ?>
<?php endif; ?><?php echo '
		
		
		$(\'#colorSelector2\').ColorPicker({
			    color: \''; ?>
<?php if ($this->_tpl_vars['styles_all']['textColor']): ?><?php echo $this->_tpl_vars['styles_all']['textColor']; ?>
<?php else: ?>#333333<?php endif; ?><?php echo '\',
			 onShow: function (colpkr) {
				 $(\'.colorpicker\').addClass(\'colorpicker_bg2\');
				 $(colpkr).fadeIn(10);				 
				 return false;
			 },
			 onHide: function (colpkr) {
				 $(\'.colorpicker\').removeClass(\'colorpicker_bg2\');
				 $(colpkr).fadeOut(10);				 
				 return false;
			 },
			 onChange: function (hsb, hex, rgb) {
				 $(\'#colorSelector2 div\').css(\'backgroundColor\', \'#\' + hex);
				 $(\'#left-sidebar ul li.plevel3 a,.childcat,.nntype a,.top_tab_intro a,#body-wrapper-padding label,body,.mainhotnew .hotnewlist, #top-social a.open-soc,#top-social a.open-soc span, h6, .section-block .subtitle, #page-title .subtitle, .widget .subtitle, .scrollbarleft ul li a span\').css(\'color\', \'#\' + hex);
				$(\'#text-color\').val(\'#\' + hex);
			 }
		 });
		'; ?>
<?php if ($this->_tpl_vars['styles_all']['textColor']): ?><?php echo '
		    $(\'#colorSelector2 div\').css("background-color", "'; ?>
<?php echo $this->_tpl_vars['styles_all']['textColor']; ?>
<?php echo '");
		    $(\'#text-color\').val("'; ?>
<?php echo $this->_tpl_vars['styles_all']['textColor']; ?>
<?php echo '");
		'; ?>
<?php endif; ?><?php echo '
		
		$(\'#colorSelector3\').ColorPicker({
			 color: \''; ?>
<?php if ($this->_tpl_vars['styles_all']['titleColor']): ?><?php echo $this->_tpl_vars['styles_all']['titleColor']; ?>
<?php else: ?>#1F9ED9<?php endif; ?><?php echo '\',
			 onShow: function (colpkr) {
				 $(\'.colorpicker\').addClass(\'colorpicker_bg3\');
				 $(colpkr).fadeIn(10);				 
				 return false;
			 },
			 onHide: function (colpkr) {
				 $(\'.colorpicker\').removeClass(\'colorpicker_bg3\');
				 $(colpkr).fadeOut(10);				 
				 return false;
			 },
			 onChange: function (hsb, hex, rgb) {
				 $(\'#colorSelector3 div\').css(\'backgroundColor\', \'#\' + hex);
				 $(\'.nntype a.active,.nntype a:hover,.top_shop_name,#body-wrapper-padding h2,#body-wrapper-padding .widget h3\').css(\'color\', \'#\' + hex);
				$(\'#title-color\').val(\'#\' + hex);
			 }
		 });
		'; ?>
<?php if ($this->_tpl_vars['styles_all']['titleColor']): ?><?php echo '
		    $(\'#colorSelector3 div\').css("background-color", "'; ?>
<?php echo $this->_tpl_vars['styles_all']['titleColor']; ?>
<?php echo '");
		    $(\'#title-color\').val("'; ?>
<?php echo $this->_tpl_vars['styles_all']['titleColor']; ?>
<?php echo '");
		'; ?>
<?php endif; ?><?php echo '
		
		
		$(\'#colorSelector4\').ColorPicker({
			 color: \''; ?>
<?php if ($this->_tpl_vars['styles_all']['linkColor']): ?><?php echo $this->_tpl_vars['styles_all']['linkColor']; ?>
<?php else: ?>#117FB2<?php endif; ?><?php echo '\',
			 onShow: function (colpkr) {
				 $(\'.colorpicker\').addClass(\'colorpicker_bg4\');
				 $(colpkr).fadeIn(10);				 
				 return false;
			 },
			 onHide: function (colpkr) {
				 $(\'.colorpicker\').removeClass(\'colorpicker_bg4\');
				 $(colpkr).fadeOut(10);				 
				 return false;
			 },
			 onChange: function (hsb, hex, rgb) {
				 $(\'#colorSelector4 div\').css(\'backgroundColor\', \'#\' + hex);
				 $(\'#body-wrapper-padding .widget .product h3,.space_contact_box a,#policy_but,.mainhotnew .active,.mainhotnew a:hover,#left-sidebar li a\').css(\'color\', \'#\' + hex);
				 $(\'.postitem a,a.button, button.button, input.button, #respond input#submit, #content input.button\').css(\'background\', \'#\' + hex);
				$(\'#link-color\').val(\'#\' + hex);
			 }
		 });
		'; ?>
<?php if ($this->_tpl_vars['styles_all']['linkColor']): ?><?php echo '
		    $(\'#colorSelector4 div\').css("background-color", "'; ?>
<?php echo $this->_tpl_vars['styles_all']['linkColor']; ?>
<?php echo '");
		    $(\'#link-color\').val("'; ?>
<?php echo $this->_tpl_vars['styles_all']['linkColor']; ?>
<?php echo '");
		'; ?>
<?php endif; ?><?php echo '
		
		
		
		$(\'#colorSelector5\').ColorPicker({
			 color: \''; ?>
<?php if ($this->_tpl_vars['styles_all']['menuBgColor']): ?><?php echo $this->_tpl_vars['styles_all']['menuBgColor']; ?>
<?php else: ?>#4BC14B<?php endif; ?><?php echo '\',
			 onShow: function (colpkr) {
				 $(\'.colorpicker\').addClass(\'colorpicker_bg5\');
				 $(colpkr).fadeIn(10);				 
				 return false;
			 },
			 onHide: function (colpkr) {
				 $(\'.colorpicker\').removeClass(\'colorpicker_bg5\');
				 $(colpkr).fadeOut(10);				 
				 return false;
			 },
			 onChange: function (hsb, hex, rgb) {
				 $(\'#colorSelector5 div\').css(\'backgroundColor\', \'#\' + hex);
				 $(\'.table_th,.recent-tabs-widget .tabs dd a:hover, .recent-tabs-widget .tabs dd.active a,.recent-tabs-widget .tabs a\').css(\'background\', \'#\' + hex);
				$(\'#menuBgColor\').val(\'#\' + hex);
			 }
		 });
		'; ?>
<?php if ($this->_tpl_vars['styles_all']['menuBgColor']): ?><?php echo '
		    $(\'#colorSelector5 div\').css("background-color", "'; ?>
<?php echo $this->_tpl_vars['styles_all']['menuBgColor']; ?>
<?php echo '");
		    $(\'#menuBgColor\').val("'; ?>
<?php echo $this->_tpl_vars['styles_all']['menuBgColor']; ?>
<?php echo '");
		'; ?>
<?php endif; ?><?php echo '
		
		
		$(\'#colorSelector6\').ColorPicker({
			 color: \''; ?>
<?php if ($this->_tpl_vars['styles_all']['footerColor']): ?><?php echo $this->_tpl_vars['styles_all']['footerColor']; ?>
<?php else: ?>#64A852<?php endif; ?><?php echo '\',
			 onShow: function (colpkr) {
				 $(\'.colorpicker\').addClass(\'colorpicker_bg6\');
				 $(colpkr).fadeIn(10);				 
				 return false;
			 },
			 onHide: function (colpkr) {
				 $(\'.colorpicker\').removeClass(\'colorpicker_bg6\');
				 $(colpkr).fadeOut(10);				 
				 return false;
			 },
			 onChange: function (hsb, hex, rgb) {
				 $(\'#colorSelector6 div\').css(\'backgroundColor\', \'#\' + hex);
				 $(\'#darkf\').css(\'background\', \'#\' + hex);
				$(\'#footerColor\').val(\'#\' + hex);
			 }
		 });
		'; ?>
<?php if ($this->_tpl_vars['styles_all']['footerColor']): ?><?php echo '
		    $(\'#colorSelector6 div\').css("background-color", "'; ?>
<?php echo $this->_tpl_vars['styles_all']['footerColor']; ?>
<?php echo '");
		    $(\'#footerColor\').val("'; ?>
<?php echo $this->_tpl_vars['styles_all']['footerColor']; ?>
<?php echo '");
		'; ?>
<?php endif; ?><?php echo '
		
		
		
		$(\'#colorSelector7\').ColorPicker({
			 color: \''; ?>
<?php if ($this->_tpl_vars['styles_all']['menuTextColor']): ?><?php echo $this->_tpl_vars['styles_all']['menuTextColor']; ?>
<?php else: ?>#ffffff<?php endif; ?><?php echo '\',
			 onShow: function (colpkr) {
				 $(\'.colorpicker\').addClass(\'colorpicker_bg7\');
				 $(colpkr).fadeIn(10);				 
				 return false;
			 },
			 onHide: function (colpkr) {
				 $(\'.colorpicker\').removeClass(\'colorpicker_bg7\');
				 $(colpkr).fadeOut(10);				 
				 return false;
			 },
			 onChange: function (hsb, hex, rgb) {
				 $(\'#colorSelector7 div\').css(\'backgroundColor\', \'#\' + hex);
				 $(\'.recent-tabs-widget .tabs a\').css(\'color\', \'#\' + hex);
				$(\'#menuTextColor\').val(\'#\' + hex);
			 }
		 });
		'; ?>
<?php if ($this->_tpl_vars['styles_all']['menuTextColor']): ?><?php echo '
		    $(\'#colorSelector7 div\').css("background-color", "'; ?>
<?php echo $this->_tpl_vars['styles_all']['menuTextColor']; ?>
<?php echo '");
		    $(\'#menuTextColor\').val("'; ?>
<?php echo $this->_tpl_vars['styles_all']['menuTextColor']; ?>
<?php echo '");
		'; ?>
<?php endif; ?><?php echo '
		
		$(\'#colorSelector8\').ColorPicker({
			 color: \''; ?>
<?php if ($this->_tpl_vars['styles_all']['footerTextColor']): ?><?php echo $this->_tpl_vars['styles_all']['footerTextColor']; ?>
<?php else: ?>#ffffff<?php endif; ?><?php echo '\',
			 onShow: function (colpkr) {
				 $(\'.colorpicker\').addClass(\'colorpicker_bg8\');
				 $(colpkr).fadeIn(10);				 
				 return false;
			 },
			 onHide: function (colpkr) {
				 $(\'.colorpicker\').removeClass(\'colorpicker_bg8\');
				 $(colpkr).fadeOut(10);				 
				 return false;
			 },
			 onChange: function (hsb, hex, rgb) {
				 $(\'#colorSelector8 div\').css(\'backgroundColor\', \'#\' + hex);
				 $(\'#darkf a,.user_footer h3,#darkf p\').css(\'color\', \'#\' + hex);
				$(\'#footerTextColor\').val(\'#\' + hex);
			 }
		 });
		'; ?>
<?php if ($this->_tpl_vars['styles_all']['footerTextColor']): ?><?php echo '
		    $(\'#colorSelector8 div\').css("background-color", "'; ?>
<?php echo $this->_tpl_vars['styles_all']['footerTextColor']; ?>
<?php echo '");
		    $(\'#footerTextColor\').val("'; ?>
<?php echo $this->_tpl_vars['styles_all']['footerTextColor']; ?>
<?php echo '");
		'; ?>
<?php endif; ?><?php echo '
		
		
		
		$(\'#colorSelector9\').ColorPicker({
			 color: \''; ?>
<?php if ($this->_tpl_vars['styles_all']['borderColor']): ?><?php echo $this->_tpl_vars['styles_all']['borderColor']; ?>
<?php else: ?>#aaaaaa<?php endif; ?><?php echo '\',
			 onShow: function (colpkr) {
				 $(\'.colorpicker\').addClass(\'colorpicker_bg9\');
				 $(colpkr).fadeIn(10);				 
				 return false;
			 },
			 onHide: function (colpkr) {
				 $(\'.colorpicker\').removeClass(\'colorpicker_bg9\');
				 $(colpkr).fadeOut(10);				 
				 return false;
			 },
			 onChange: function (hsb, hex, rgb) {
				 $(\'#colorSelector9 div\').css(\'backgroundColor\', \'#\' + hex);
				 $(\'#top_company_info, #topmenu img, .fb_boxx,.logoz,.childcat,#header #recent_products-3,#topmenu span,#left-sidebar,.space_content,aside .widget,ul.new_products li.product,ul.products li.product a img, div.product div.images img, #content div.product div.images img\').css(\'border-color\', \'#\' + hex);
				 $(\'.pagination span,.pagination a:hover\').css(\'background\', \'#\' + hex);
				 $(\'#darkf\').css(\'border-top\', \'solid 1px #\' + hex);
				$(\'#borderColor\').val(\'#\' + hex);
			 }
		 });
		'; ?>
<?php if ($this->_tpl_vars['styles_all']['borderColor']): ?><?php echo '
		    $(\'#colorSelector8 div\').css("background-color", "'; ?>
<?php echo $this->_tpl_vars['styles_all']['borderColor']; ?>
<?php echo '");
		    $(\'#borderColor\').val("'; ?>
<?php echo $this->_tpl_vars['styles_all']['borderColor']; ?>
<?php echo '");
		'; ?>
<?php endif; ?><?php echo '
		
		
		
		////slider
		//for(var i=0; i<6; i++)
		//{
		//    $(\'.main_banner ul li\').eq(i).css("display", "none");
		//}
		//
		//var loadedcount = 0;
		//$(\'#topmenu img\').each(function(){
		//   $(this).load(function(){
		//	loadedcount++;
		//    });	   
		// });
		
		//refreshIntervalId1 = setInterval(function(){
		//    if (loadedcount == $(\'#topmenu ul li\').length) {
		//	$(\'#topmenu img\').resizecrop({
		//	   width:907,
		//	   height:339		   
		//	});
		//	clearInterval(refreshIntervalId1);
		//    }
		//}, 100);
		//
		//
		//refreshIntervalId = setInterval(function(){
		//    if ($(\'#topmenu ul li\').length == $(\'#topmenu ul li span\').length && loadedcount == $(\'#topmenu ul li\').length) {
		//	for(var i=0; i<6; i++)
		//	{
		//	    $(\'.main_banner ul li\').eq(i).css("display", "block");
		//	}
		//	$(\'.newx\').remove();
		//	if ($(\'.main_banner ul li span\').length) {
		//	    $(\'.bxslider\').bxSlider({
		//		auto: true,
		//		easing: \'linear\',
		//		controls: true,
		//		mode: \'fade\',
		//	    });
		//	}
		//	clearInterval(refreshIntervalId);
		//    }
		//    //alert("not yet");
		//},  1000);
		
		
		//slider
		//for(var i=0; i<6; i++)
		//{
		//    $(\'.main_banner ul li\').eq(i).addClass("dnone");
		//}
		//
		////setTimeout(function(){
		////$(\'.newx\').remove();
		//        $(\'#topmenu img\').resizecrop({
		//	   width:907,
		//	   height:339		   
		//	});
		//
		////}, 2000);
		//
		//refreshIntervalId = setInterval(function(){
		//    
		//    if ($(\'#topmenu ul li\').length == $(\'#topmenu ul li span\').length) {
		//	
		//	
		//	setTimeout(function(){
		//	    $(\'.newx\').remove();
		//	    for(var i=0; i<6; i++)
		//	    {
		//		$(\'.main_banner ul li\').eq(i).removeClass("dnone");
		//	    }
		//	    $(\'.bxslider\').bxSlider({
		//		    auto: true,
		//		    easing: \'linear\',
		//		    controls: true,
		//		    mode: \'fade\',
		//	    });
		//	}, 1000);
		//	
		//	
		//	
		//	clearInterval(refreshIntervalId);
		//	
		//    }
		//}, 100);
		
		$(\'ul.products li.product a img\').resizecrop({
		   width:290,
		   height:290,
		   vertical:"top"
		});
		
		$(\'.bxslider\').nivoSlider();
		
		//$(\'.link_item img\').resizecrop({
		//   width:99,
		//   height:99
		// });
		//$(\'.link_item img\').css("display","block");
		
		 $(\'body\').click(function(){$(\'#quick_inbox_content\').fadeOut();$(\'#quick_message_content\').fadeOut()});
		    $(\'#inboxhome a.but\').click(function(event){$(\'#quick_inbox_content\').toggle();event.stopPropagation();});
		    
		
				
		$(".comment_but").fancybox({
			\'padding\': 0,
			\'zoomOpacity\': true,
			\'zoomSpeedIn\': 500,
			\'zoomSpeedOut\': 500,
			\'overlayOpacity\': 0.75,
			\'frameWidth\': 530,
			\'frameHeight\': 400,
			\'hideOnContentClick\': false
		});
		
		
		'; ?>
<?php if ($_GET['un']): ?><?php echo '
		 	$("#share-info-but").trigger("click");
		'; ?>
<?php endif; ?><?php echo '
		
		$(".zoomz").fancybox();
		
		
		
		//for offer
		$("#offerbox-but").fancybox({
			\'padding\': 0,
			\'zoomOpacity\': true,
			\'zoomSpeedIn\': 500,
			\'zoomSpeedOut\': 500,
			\'overlayOpacity\': 0.75,
			\'frameWidth\': 530,
			\'frameHeight\': 400,
			\'hideOnContentClick\': false,
			height: 500,
			helpers: { 
			      title: null
			}
		});
		
		$("#welcomnew-info-but").fancybox({
			\'padding\': 0,
			\'zoomOpacity\': true,
			\'zoomSpeedIn\': 500,
			\'zoomSpeedOut\': 500,
			\'overlayOpacity\': 0.75,
			\'frameWidth\': 530,
			\'frameHeight\': 400,
			\'hideOnContentClick\': false,
			height: 500,
			helpers: { 
			      title: null
			}
		});
		//alert('; ?>
<?php echo $_GET['welcome']; ?>
<?php echo ');
		'; ?>
<?php if ($_GET['welcome']): ?><?php echo '
			$(\'#welcomnew-info-but\').trigger("click");
		'; ?>
<?php endif; ?><?php echo '
		
		
		if (window.location.hash == "#chinh-sach") {
		    $(\'#policy_but\').trigger("click");
		}
		
		$("#guestbox-but").fancybox({
			\'padding\': 0,
			\'zoomOpacity\': true,
			\'zoomSpeedIn\': 500,
			\'zoomSpeedOut\': 500,
			\'overlayOpacity\': 0.75,
			\'frameWidth\': 530,
			\'frameHeight\': 400,
			\'hideOnContentClick\': false
		});
		
		$(\'.products a,.products img\').qtip({ // Grab some elements to apply the tooltip to
                    content: {
                        attr: \'title\'                        
                    },
                    position: {
                        target: \'mouse\', // Track the mouse as the positioning target
                        adjust: { x: 10, y: 25 } // Offset it slightly from under the mouse
                    }
                })
		

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
		    
		    $(\'body\').click(function(){if($(\'.clicked_note_box\').css(\'display\') == \'block\') $(\'.clicked_note_box\').fadeOut("slow", refreshClickedCompany(\'578\'))});	
		    $(\'.staticon\').click(function(e){$(\'.over_air_box\').css("display","none");$(\'.clicked_note_box\').toggle();e.stopPropagation();});
		    
		   $(\'#topCart\').live("click",function() {
		       showCart();
		   });
                   
                   
                $("#underconstruction-info-but").fancybox({
			\'padding\': 0,
			\'zoomOpacity\': true,
			\'zoomSpeedIn\': 500,
			\'zoomSpeedOut\': 500,
			\'overlayOpacity\': 0.75,
			\'frameWidth\': 530,
			\'frameHeight\': 400,
			\'hideOnContentClick\': false,
			height: 500,
			helpers: { 
			      title: null
			}
		});
                   
                //if(!$.cookie("underconstruction"))
                //{
                //    $.cookie("underconstruction", true);
                //    $("#underconstruction-info-but").trigger("click");
                //}
	});
	
	
$(window).scroll(function(){
	 
	 //$(\'#topmenu_outer\').css(\'top\', $(window).scrollTop()+\'px\');
	 
    $.each($(\'.connect_searchxz\'),function(){
        var eloffset = $(this).offset();
	var windowpos;
	if ($(window).scrollTop() >= pos_searchlist) {
	  windowpos = $(window).scrollTop()+22;
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
	    $(this).css(\'top\', \'22px\');    
        }
	//console.log(eloffset.top);
	//console.log(windowpos);
	//console.log($(this).css(\'top\'));
    });
    
    
    
});
	
$(window).scroll(function() {
 
 //move verytopmenu with small screen
 autoAjustVerytopmenu();
 
 if($(\'#left-sidebar\').height() < $(\'#content\').height()) $(\'#left-sidebar\').height($(\'#content\').height());
 
 //$(\'#verytopmenu\').css(\'padding-right\', 1200 - $(window).width());
 //  if ($(window).width() < 1200) {
 //  $(\'#darkf\').css(\'width\', \'1200px\');
 //}
 //else
 //{
 //  $(\'#darkf\').css(\'width\', \'100%\');
 //}
 //
 //if ($(window).width() < 1190) {
 //  $(\'#top-social a.open-soc\').css(\'right\', 1194 - $(window).width());
 //  $(\'#top-social .soc-wrap\').css(\'margin-right\', 1194 - $(window).width());
 //}
 //else
 //{
 // $(\'#top-social a.open-soc\').css(\'right\', \'4px;\');
 // $(\'#top-social .soc-wrap\').css(\'margin-right\', \'0\');
 //}
 
});

$(window).resize(function() {
    //move verytopmenu with small screen
    autoAjustVerytopmenu();
});

	
</script>

	'; ?>

	
	<?php echo $this->_tpl_vars['styles_string']; ?>

	

</head>


<body class="home page page-template page-template-page-no_top-php theme-onetouch wpb-js-composer js-comp-ver-3.4.12 vc_responsive">
	
	

	
<div id="loading" style="display: none"><?php echo $this->_tpl_vars['_loading']; ?>
</div>

<?php echo '
<script> var customStyleImgUrl = "http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/inc/custom_style/assets/img/";</script>
'; ?>






<a id="hiddenclicker" href="#box_alert" style="display: none">Hidden Clicker</a>
<div id="box_alert" style="display: none">
	
	<div style="width:400px;">
        <div class="fifteen columns" id="page-title" style="padding-left: 20px;margin-top: 5px;">
        
                <h1 class="page-title">
                                <strong><?php echo $this->_tpl_vars['_cart']; ?>
</strong>                    </h1>
        
                <div class="breadcrumbs" style="width:auto"><a href="<?php echo $this->_tpl_vars['SiteUrl']; ?>
"><?php echo $this->_tpl_vars['_home_page']; ?>
</a> <span class="delim">/</span><a href="index.php?do=product"><?php echo $this->_tpl_vars['_product_center']; ?>
</a><span class="delim">/</span><?php echo $this->_tpl_vars['_cart']; ?>
 </div>
        
            </div>
                            <div class="qiugouleftcon carttable" style="padding: 20px">
                                <p style="" class="no_pp" style="padding: 15px;"><?php echo $this->_tpl_vars['_added_to_cart']; ?>
!
                                    <br /><br />
                                    <a id="add_paragraph" title="Vào giỏ hàng" class="button button-blue" href="javascript:void(0)" onclick="showCart()" style="margin-right: 10px;"><?php echo $this->_tpl_vars['_go_to_cart']; ?>
</a>
                                    <a id="add_paragraph" title="Tiếp tục mua" class="button button-blue" href="javascript:void(0)" onclick="javascript:$.fancybox.close();">Tiếp tục mua</a>
                                </p>
                                
                            </div>
        </div>
	
   </div>

   
   
   
   <a id="browser-info-but" href="#browser-info" style="display: none">Hidden Clicker</a>
   <div id="browser-info" style="display: none">
	
	<div style="padding: 20px 20px 20px 20px;width: 525px">
			
			 <div class="content_inner" style="padding-bottom:10px;">
			 <h4>Kính chào Quý khách !<br><br>Hiện tại trang <a href="<?php echo $this->_tpl_vars['WebRootUrl']; ?>
">MarketOnline.vn</a> xem tốt trên các trình duyệt sau:</h4>
			  <p style="float:left">
			   <a style="margin-left: 33px;display: block;float: left;text-align: center;padding-top: 10px;margin-right: 25px" href="http://www.mozilla.org/vi/firefox/new/">
			    <img style="padding: 5px 0px 0 3px" src="http://marketonline.vn/templates/default/image/firefox.png" /><br>Tải về</a>
			   <a style="display: block;float: left;text-align: center;padding-top: 10px;margin-right: 15px" href="http://www.google.com/intl/vi/chrome/">
			    <img style="padding: 5px 0px 0 3px" src="http://marketonline.vn/templates/default/image/chrome.png" /><br>Tải về</a>
			   <a style="display: block;float: left;text-align: center" href="http://support.apple.com/kb/dl1531">
			    <img style="padding: 5px 10px 0 5px" src="http://marketonline.vn/templates/default/image/safari.png" /><br>Tải về</a>
			  </p>
			 </div>

			
			
	</div>
	
</div>
   
<a id="album-detail-but" href="#album-detail" style="display: none">Hidden Clicker</a>
<div id="album-detail" style="display: none">
	
	<div style="padding: 20px 20px 20px 20px;width: 1000px;max-height: 600px;">
			
			<div class="album-content"></div>
			
	</div>
	
</div>

<a id="share-info-but" href="#share-info" style="display: none">Hidden Clicker</a>
<div id="share-info" style="display: none">
	
	<div style="padding: 20px 20px 20px 20px;width: 1000px;max-height: 800px;overflow-x: hidden">
			
			<?php echo $this->_tpl_vars['share_info']['message']; ?>

			
	</div>
	
</div>


<div id="announce-frame"></div>
   
      <div id="chat-frame">
    
   </div>
      <div style="display:none">
        <iframe name="uploadChatImage_frame" id="uploadChatImage_frame" style="display: none"></iframe>
            <form target="uploadChatImage_frame" name="productaddfrm" id="uploadChatImage" method="post" action="<?php echo $this->_tpl_vars['WebRootUrl']; ?>
index.php?do=product&action=uploadChatImage" enctype="multipart/form-data">
              <?php echo smarty_function_formhash(array(), $this);?>

              <input type="hidden" name="chatbox_id" value="" />
              <p><input accept="image/*" type="file" name="uploadChatImage" id="uploadChatImage_but" onchange="$('#uploadChatImage').submit()" /></p>
    
            </form>
    </div>
      
      
         <div id="history-list-frame">    
      <div class="content">
       <div class="content-inner">
	   <div class="toggle-button"><?php echo $this->_tpl_vars['_history_viewed']; ?>
</div>
	   <div class="history-list">
	  
	   </div>
	   <span class="nav next">next</span>
	   <span class="nav prev hide">prev</span>
       </div>
      </div>
   </div>
      
      
<a id="offerbox-but" href="#offerbox-fancy" style="display: none">Hidden Clicker</a>
<div id="offerbox-fancy" style="display: none">
	
	<div style="padding: 0;width: 1070px;float: left" class="offerbox-outer">
			
		
      </div>
	
</div>

<a id="welcomnew-info-but" href="#welcomnew-info" style="display: none">Hidden Clicker</a>
<div id="welcomnew-info" style="display: none">
	
	<div style="padding: 20px 20px 20px 20px;width: 800px;max-height: 600px;overflow-x: hidden">
			
			<?php echo $this->_tpl_vars['welcomnew_info']['message']; ?>

			
	</div>
	
</div>

<a id="guestbox-but" href="#guest-box" style="display: none">Hidden Clicker</a>
<div id="guest-box" style="display: none">
	
	<div style="padding: 20px 20px 10px 20px;width: 320px">
			
			 <div class="content_inner" style="padding-bottom:10px;">
                            <div class="login_pls">
                                Vui lòng <a class="comment_but" href="#login-box">Đăng nhập/Đăng ký</a> để viết lời bình hoặc điền thông tin bên dưới:
                            </div>
                            <div class="guest_form">
                                <label>Họ và Tên <span>*</span></label>
                                <input name="box_guest_name" />
                                <label>Email <span>*</span></label>
                                <input name="box_guest_email" />
                                <button>Gửi</button>
                            </div>
                            
                         </div>
        </div>
</div>

<a id="topcart-but" href="#show_top_cart" style="display: none">Hidden Clicker</a>
<div id="show_top_cart">
    
</div>

<?php if ($this->_tpl_vars['pb_userinfo']['current_type'] == 6 || $this->_tpl_vars['pb_userinfo']['role'] == 'admin' || $this->_tpl_vars['pb_userinfo']['current_type']): ?>
<div class="chat_friend_list">
    <div class="chat_list_hooker">Bạn bè</div>
    <div class="main_list">
        <div class="chat-list-ajax">loading...</div>
    </div>
</div>
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/_header_includes.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>