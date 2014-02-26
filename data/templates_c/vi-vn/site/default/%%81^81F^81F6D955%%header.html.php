<?php /* Smarty version 2.6.27, created on 2014-02-26 10:33:01
         compiled from default/header.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'default/header.html', 1099, false),array('function', 'formhash', 'default/header.html', 1183, false),array('modifier', 'default', 'default/header.html', 1194, false),array('modifier', 'date_format', 'default/header.html', 1208, false),)), $this); ?>
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
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php if ($this->_tpl_vars['TAG_STRING']): ?>
	<meta name ="keywords" content="<?php echo $this->_tpl_vars['TAG_STRING']; ?>
">
<?php else: ?>
	<meta name ="keywords" content="Thị trường Mua Bán, Phân phối, Việc làm, Đầu tư, Tiêu dùng, Dịch vụ">
<?php endif; ?>


<?php if ($this->_tpl_vars['fb_description']): ?>
<meta property="og:description" content="<?php echo $this->_tpl_vars['fb_description']; ?>
"/>
<meta name ="description" content="<?php echo $this->_tpl_vars['fb_description']; ?>
">
<?php else: ?>
<meta name ="description" content="MarketOnline.vn là Thị trường Giới thiệu, Cung cấp uy tín mọi nhu cầu Cuộc sống và Công việc dành cho Cá nhân/Công ty/Tổ chức trong và ngoài nước.">
<meta property="og:description" content="MarketOnline.vn là Thị trường Giới thiệu, Cung cấp uy tín mọi nhu cầu Cuộc sống và Công việc dành cho Cá nhân/Công ty/Tổ chức trong và ngoài nước."/>
<?php endif; ?>
		

		<!--<meta property="og:type" content="article"/>-->
		
		
  <?php if (! $this->_tpl_vars['fb_image'] && $this->_tpl_vars['count_fimages'] < 3): ?><meta property="og:image" content="http://marketonline.vn/images/logo-marketonline.png"/><?php endif; ?>
  <?php if ($this->_tpl_vars['fb_image']): ?>
     <meta property="og:image" content="<?php echo $this->_tpl_vars['fb_image']; ?>
"/>
  <?php endif; ?>
  <?php if ($this->_tpl_vars['fb_image1']): ?>
     <meta property="og:image" content="<?php echo $this->_tpl_vars['fb_image1']; ?>
"/>
  <?php endif; ?>
  <?php if ($this->_tpl_vars['fb_image2']): ?>
     <meta property="og:image" content="<?php echo $this->_tpl_vars['fb_image2']; ?>
"/>
  <?php endif; ?>
  <?php if ($this->_tpl_vars['fb_image3']): ?>
     <meta property="og:image" content="<?php echo $this->_tpl_vars['fb_image3']; ?>
"/>
  <?php endif; ?>
  <?php if ($this->_tpl_vars['fb_image4']): ?>
     <meta property="og:image" content="<?php echo $this->_tpl_vars['fb_image4']; ?>
"/>
  <?php endif; ?>
   
  <?php $_from = $this->_tpl_vars['fimages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['level']['iteration']++;
?>
	<meta property="og:image" content="<?php echo $this->_tpl_vars['item']; ?>
"/>
  <?php endforeach; endif; unset($_from); ?>
  
  
  
  
  <!--<script src="http://theme.crumina.net/onetouch/wp-content/themes/theme_v_1.tmp/assets/js/modernizr.foundation.js"></script>-->

  <link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,200italic,300italic,400italic,600italic,700italic' rel='stylesheet' type='text/css'>

  <link href="images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />


<link rel="stylesheet" href="<?php echo $this->_tpl_vars['theme_img_path']; ?>
css/woocommerce.css?ver=3.5.1">
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['theme_img_path']; ?>
css/aqpb-view.css?ver=1364883969">
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['theme_img_path']; ?>
css/bootstrap.css?ver=3.4.12">
<!--<link rel="stylesheet" href="<?php echo $this->_tpl_vars['theme_img_path']; ?>
css/js_composer_frontz.css?ver=3.4.12">-->
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
css/responsivez.css">-->
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['theme_img_path']; ?>
css/colorbox.css">
 <link rel="stylesheet" href="<?php echo $this->_tpl_vars['theme_img_path']; ?>
css/jquery.mCustomScrollbar.css">
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
<script src="https://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>

<script src="<?php echo $this->_tpl_vars['WebRootUrl']; ?>
data/cache/<?php echo $this->_tpl_vars['JsLanguage']; ?>
/locale.js" charset="<?php echo $this->_tpl_vars['charset']; ?>
"></script>
<script type='text/javascript' src='<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/jquery.mousewheel.js'></script>
<script type='text/javascript' src='<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/jquery.mCustomScrollbar.js'></script>
<script type='text/javascript' src='<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/jquery.resizecrop-1.0.3.js'></script>
<script type='text/javascript' src='<?php echo $this->_tpl_vars['SiteUrl']; ?>
images/jwplayer/jwplayer.js'></script>
<!-- Include the Etalage plugin: -->
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['theme_img_path']; ?>
css/etalage.css">
 <link rel="stylesheet" href="<?php echo $this->_tpl_vars['theme_img_path']; ?>
css/etalage_custom.css">
<script src="<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/jquery.etalage.min.js"></script>
<script src="<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/hashtable.js"></script>
<script src="<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/jquery.numberformatter.js"></script>


<script src="<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/jquery.qtip.min.js"></script>
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['theme_img_path']; ?>
css/jquery.qtip.min.css">
    
<!--<script src="http://marketonline.vn/scripts/mudim-0.9-r162.js"></script>-->

<!-- Tiny MCE -->
<script src="<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/tinymce/tinymce.min.js"></script>

<script src="<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/custom.js"></script>

   <!--[if IE]>
    <script src="<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/html5.js"></script>
    <link href='<?php echo $this->_tpl_vars['theme_img_path']; ?>
css/ie.css' rel='stylesheet' type='text/css'>

  <![endif]-->

      
        <link href='<?php echo $this->_tpl_vars['theme_img_path']; ?>
css/options.css' rel='stylesheet' type='text/css'>


	

	
<link href="<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/select2/select2.css" rel="stylesheet" type="text/css">
<script src="<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/select2/select2.min.js"></script>
<script src="<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/select2/select2_locale_vi.js"></script>
	
        
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['theme_img_path']; ?>
css/editorcss.css">
        
<?php echo '	
<style>
#body-wrapper {
	background-attachment:fixed!important;
	background-repeat:repeat;
}
</style>

<script type="application/x-javascript">
    
    
    function displayTet2014()
    {
     var show = true;
	  if ($(\'.soc-icons\').width() > 0) {	      
	  }
	  else
	  {
	      show = false;
	  }
	  

	  
	  if (show) {	      
	      $(\'.banner-small-top\').css("display","block");
	  }
	  else
	  {
	      $(\'.banner-small-top\').css("display","none");
	  }
    }
   
 
 function getAnnounce(ann_count)
 {
    $.ajax({
			url: "index.php?do=product&action=getAnnounce",
		}).done(function ( data ) {
			if( console && console.log ) {
				//alert(data);
				$(\'#announce-frame\').prepend(data);
				
				$(\'#announce-frame .announce-box\').each(function(index){				    
				    if (!$(this).hasClass("showed")) {
					$(this).addClass("ann"+ann_count);
					$(this).addClass("showed");
					setTimeout(function(){$(".ann"+ann_count).fadeOut()}, 60000);					
				    }				    
				});
			}
		});
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
	
	
	function FacebookInviteFriends()
	{
		FB.ui({
		method: \'apprequests\',
		message: \'Your Message diaolog\'
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
	 
		if(item) item.addClass(\'loading\');
	 
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
				
				if(item) item.removeClass(\'loading\');
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
				//$(row).parent().parent().fadeOut();
				//$(\'#cart_count\').html($(\'#cart_count\').html()-1);
				//
				//$(\'#cart_total\').html($.number($(\'#cart_total\').html().replace(/\\./g, "") - down.replace(/\\./g, ""), 0, \',\', \'.\'));
                                
                                getCart();				
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
	
	function clearInbox() {
		//code
		$.ajax({
			url: "index.php?do=product&action=ajaxClearInbox",
		}).done(function ( data ) {
			if( console && console.log ) {
				
			}
		});
	}
	
	var pos_searchlist = 278;
	//chatbox
	var ichatbox = new Array();
	
	var companylogo = \''; ?>
<?php if ($this->_tpl_vars['pb_company']): ?><?php echo $this->_tpl_vars['pb_company']['image']; ?>
<?php else: ?> <?php if ($this->_tpl_vars['user_avatar']): ?> <?php echo $this->_tpl_vars['user_avatar']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['theme_img_path']; ?>
image/usericon.jpg  <?php endif; ?>  <?php endif; ?><?php echo '\';
	
	
	$(document).ready(function() {
		if (window.chrome) {
			$("#f_language_bar").css("margin-top", "-1px");
			$("#settingouter").css("margin-top", "0px");
		}
		
		$(\'.thumbnails a\').eq(4).css(\'margin-right\', \'0\');
		
		getCart();
		getInbox();
		getTopChat();
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
		$("a.notyet").fancybox({
			\'padding\': 0,
			\'zoomOpacity\': true,
			\'zoomSpeedIn\': 500,
			\'zoomSpeedOut\': 500,
			\'overlayOpacity\': 0.75,
			\'frameWidth\': 530,
			\'frameHeight\': 400,
			\'hideOnContentClick\': false
		});
		
		$("#thongbao_home").fancybox({
			\'padding\': 0,
			\'zoomOpacity\': true,
			\'zoomSpeedIn\': 500,
			\'zoomSpeedOut\': 500,
			\'overlayOpacity\': 0.75,
			\'frameWidth\': 530,
			\'frameHeight\': 400,
			\'hideOnContentClick\': false
		});
		
		$(".row-fluid h2 a").fancybox({
			\'padding\': 0,
			\'zoomOpacity\': true,
			\'zoomSpeedIn\': 500,
			\'zoomSpeedOut\': 500,
			\'overlayOpacity\': 0.75,
			\'frameWidth\': 530,
			\'frameHeight\': 400,
			\'hideOnContentClick\': false
		});
		
		$(".row-fluid a.more").fancybox({
			\'padding\': 0,
			\'zoomOpacity\': true,
			\'zoomSpeedIn\': 500,
			\'zoomSpeedOut\': 500,
			\'overlayOpacity\': 0.75,
			\'frameWidth\': 530,
			\'frameHeight\': 400,
			\'hideOnContentClick\': false
		});
                
		$(".fancybox-inner a.more").fancybox({
			\'padding\': 0,
			\'zoomOpacity\': true,
			\'zoomSpeedIn\': 500,
			\'zoomSpeedOut\': 500,
			\'overlayOpacity\': 0.75,
			\'frameWidth\': 530,
			\'frameHeight\': 400,
			\'hideOnContentClick\': false
		});
		
		$(".add_link").fancybox({
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
		$(".top_plus").fancybox({
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
		
		$("#links_list_but").fancybox({
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
		
		$("#follows_list_but").fancybox({
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
		
		
		//$(".banner_top").click(function(){alert("assadas")});
		$(\'.ws_images div\').eq(1).css(\'display\', \'none\');
		
		$("#ProductName").keyup(function(event){
		    if(event.keyCode == 13){
			$("#search_list_but").click();
		    }
		});
		
        	$(\'#right_detail_banner\').stickyScroll({ container: \'#right_detail_banner\', leftBanner: true, topbound: 275.1 });
		//$(\'#topmenu_outer\').stickyScroll({ container: \'#topmenu_outer\', leftBanner: false, topbound: 275.1});
		 
		 console.log("zzzzz");
		 
		 //alert($(window).height());
		 //alert($(\'body\').height());
		 if ($(window).height() > $(\'body\').height()) {
		  //code
		  $(\'#darkf\').css(\'position\', \'absolute\');
		 }
		 
		 $(\'.fancyx\').fancybox();
		 
		 //$(\'.sum_bottom\').height($(\'.images\').height() - $(\'.sum_top\').height() - 47);
		 
		 $(\'.klbox\').resizecrop({
		   width:139,
		   height:139
		   
		 });	 
		 $(\'.klbox\').css(\'display\', \'block\');
		 
		 $(\'.leftlogodetail img\').resizecrop({
		   width:168,
		   height:168
		 });
		 $(\'.leftlogodetail img\').css("visibility","visible");
		 
		 $(\'.inner_slide .link_item img\').css(\'visibility\', \'visible\');
		 
		 $(\'#settingbox\').css(\'margin-left\', $(\'#settingouter\').width()-205);
		 
		 //$(\'.res_done_box .success_box\').width($(\'.res_done_box h2\').width()-4);
		 $(\'.res_done_box .success_box\').css(\'display\', \'block\');
		 
		 
		 
		 getNewClicked(\''; ?>
<?php echo $this->_tpl_vars['pb_company']['id']; ?>
<?php echo '\');
		 
		 $(\'#product_detail_box ul.product_list_widget li img\').resizecrop({
		   width:100,
		   height:100
		 });
		 $(\'#product_detail_box ul.product_list_widget li img\').css("float", "none");
		 $(\'#product_detail_box ul.product_list_widget li img\').css("visibility", "visible");
		 
		 $(\'#detail_box_top .thumbnails img\').resizecrop({
		   width:91,
		   height:91
		 });
		 $(\'#detail_box_top .thumbnails img\').css("visibility","visible");
		 
		'; ?>
<?php if ($this->_tpl_vars['theight']): ?><?php echo '
                    $(\'#example2\').etalage({
                        thumb_image_width: 370,
                        thumb_image_height: '; ?>
<?php echo $this->_tpl_vars['theight']; ?>
<?php echo ',
                        source_image_width: '; ?>
<?php echo $this->_tpl_vars['width']; ?>
<?php echo ',
                        source_image_height: '; ?>
<?php echo $this->_tpl_vars['height']; ?>
<?php echo ',
                        zoom_area_width: '; ?>
<?php echo $this->_tpl_vars['tile']*220; ?>
<?php echo ',
                        zoom_areafalseheight: '; ?>
<?php echo $this->_tpl_vars['tile']*220-$this->_tpl_vars['tile']*20; ?>
<?php echo ',
                        zoom_area_distance: 5,
                        //small_thumbs: 4,
                        //smallthumb_inactive_opacity: 0.3,
                        //smallthumbs_position: \'left\',
                        show_icon: false,
                        autoplay: false,
                        keyboard: false,
                        zoom_easing: false
                    });
		'; ?>
<?php endif; ?><?php echo '
		
		if ($(\'#product_desc .product_list_widget li\').length == 11) {
		    $(\'#product_desc .product_list_widget li:last-child\').remove();
		}
		
		$(\'body\').click(function(){$(\'#quick_inbox_content\').fadeOut();$(\'#quick_message_content\').fadeOut();});
		$(\'#inboxhome a.but\').click(function(event){$(\'#quick_inbox_content\').toggle();event.stopPropagation();});
		
		var ann_count = 0;
		setInterval(function(){getAnnounce(ann_count);getInbox();ann_count++}, 15000);

		//chatbox get new arrival
		//chatboxs
		'; ?>

		    <?php if ($this->_tpl_vars['pb_username'] != ""): ?>
                        <?php echo '
                            setInterval(function(){ updateChatbox(); }, 8000);
                        '; ?>

                        
                        <?php $_from = $this->_tpl_vars['chatboxs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['level']['iteration']++;
?>
                            <?php if ($this->_tpl_vars['item'] != '' && $this->_tpl_vars['item'] != 0): ?>
                                getChatbox(<?php echo $this->_tpl_vars['item']; ?>
, true);			    
                            <?php endif; ?>
                        <?php endforeach; endif; unset($_from); ?>
		    <?php endif; ?>		
		<?php echo '
		
		
		if (window.location.hash == "#welcomenew") {
			$(\'#welcomnew-info-but\').trigger("click");
		}
		
		////		
		$(\'.scroll-box .item img\').each(function() {
		 
		  $(this).attr("src", $(this).attr("rel"));
                  
                });
                
		$(\'.hot_market .item img\').each(function() {
		 
		   $(this).attr("src", $(this).attr("rel"));
                   
		});
		
		$(\'#show-social\').click(function(){
		
		   displayTet2014();
		
		});
		
		$(\'#menu-primary-navigation\').hover(function() {
		    $(\'.banner-small-top\').css("display","none");
		},
		function() {
		    $(\'.banner-small-top\').css("display","block");
		}
		);
		
		
		$(\'#job-search-box .job-search-tab .tab-content select\').select2();
		
		$(\'.pagination a, .pagination span\').each(function( index ) {
		  if($.isNumeric($(this).html())) $(this).html(parseInt($(this).html()) + 1);
		  if($(this).html() == "2")
		  {
		     if (!$(\'.pagination span\').length) {
		       $(this).before(\'<span>1</span>\');
		     }
		     else
		     {
		       $(this).before(\'<a href="\'+$(location).attr(\'href\').replace("pos=", "posz=")+\'">1</a>\');
		     }
		  }
		});
		
		$(\'#TopWorkCategory ul.list-hot-cat li a\').click(function(){		   
		    $(\'#job-learn input[name="type"]\').val($(this).parent().attr(\'rel\'));
		    $(\'#job-learn input[name="pos"]\').remove();
		    $(\'#job-learn input[name="total_count"]\').remove();
		    $(\'#job-learn form\').submit();
		});
		
		$(\'#job-learn input[type="submit"]\').click(function(){
		    $(\'#job-learn input[name="pos"]\').remove();
		    $(\'#job-learn input[name="total_count"]\').remove();
		});
		
		$(\'.job_city_link\').click(function(){
		    $(\'#job-learn select[name="area"]\').val($(this).attr(\'rel\'));
		    $(\'#job-learn input[name="pos"]\').remove();
		    $(\'#job-learn input[name="total_count"]\').remove();
		    //$(\'#job-learn input[name="type"]\').val(\'\');
		    $(\'#job-learn form\').submit();
		});
		
		//
		$(\'.you_are_form input[type="radio"]\').removeAttr("checked");
		$(\'.main_user_select li\').click(function() {
		    $(\'.main_user_select li\').removeClass(\'active\');
		    $(this).addClass(\'active\');
		    
		    var type = $(this).attr("rel");
		    
		    $(\'.you_are_form input[type="radio"]\').removeAttr("checked");
		    if (type == \'employee\') {			
			$(\'.you_are_form input[value="Employee"]\').attr("checked","checked");
			$(\'.you_are_form\').addClass("hide");
		    } else if(type == \'employer\') {
			$(\'.you_are_form input[value="Employer"]\').attr("checked","checked");
			$(\'.you_are_form\').addClass("hide");
		    } else if(type == \'learner\') {
			$(\'.you_are_form input[value="Learner"]\').attr("checked","checked");
			$(\'.you_are_form\').addClass("hide");
		    } else {
			$(\'.you_are_form\').removeClass("hide");
		    }
		});
                
                $(\'.joblevel_link\').click(function(){		   
		    $(\'#job-learn input[name="type"]\').val($(this).attr(\'rel\'));
		    $(\'#job-learn input[name="pos"]\').remove();
		    $(\'#job-learn input[name="total_count"]\').remove();
		    $(\'#job-learn form\').submit();
		});
                
                $(\'.job_indust_link\').click(function(){		   
		    $(\'#job-learn select[name="indust"]\').val($(this).attr(\'rel\'));
		    $(\'#job-learn input[name="pos"]\').remove();
		    $(\'#job-learn input[name="total_count"]\').remove();
		    $(\'#job-learn form\').submit();
		});
                
                $(\'.joblevel_link\').click(function(){		   
		    $(\'#TopWorkCategory ul.list-hot-cat li[rel="\'+$(\'.joblevel_link\').attr("rel")+\'"] a\').trigger("click");
		});

                $(".quantity_val").keyup(function(){
                        $(this).parseNumber({format:"####", locale:"vn"});
                        $(this).formatNumber({format:"####", locale:"vn"});
                });

                $(\'.product_listing a,.product_listing img, .logo_box_u a, .red_box a\').qtip({ // Grab some elements to apply the tooltip to
                    content: {
                        attr: \'title\'                        
                    },
                    position: {
                        target: \'mouse\', // Track the mouse as the positioning target
                        adjust: { x: 10, y: 25 } // Offset it slightly from under the mouse
                    }
                })
	});
	
        
$(window).scroll(function(){
	
    $.each($(\'.connect_searchx\'),function(){
        var eloffset = $(this).offset();
	//console.log(eloffset);
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
	    $(this).css(\'top\', \'24px\');    
        }
    });        
    
    //move verytopmenu with small screen
    autoAjustVerytopmenu();
   
});



$(window).resize(function() {
    
    //move verytopmenu with small screen
    autoAjustVerytopmenu();
 
    //for sidebar
    if ($(\'#main_sidebar\').length) {
       
    }
 
    $(\'#facelike_col2\').css("min-height",$(window).height());
 
});

$(document).scroll(function() {
    //$(\'#facelike_col1, #facelike_col2\').height($(\'.facelike_content\').height());
});
</script>

	'; ?>


</head>



<body class="home page page-template page-template-page-no_top-php theme-onetouch wpb-js-composer js-comp-ver-3.4.12 vc_responsive">
 
 
 
 
<?php echo '
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=156688944521460";
  fjs.parentNode.insertBefore(js, fjs);
}(document, \'script\', \'facebook-jssdk\'));</script>
'; ?>

 
 
<div id="loading" style="display: none"><?php echo $this->_tpl_vars['_loading']; ?>
</div>

<?php echo '
<script> var customStyleImgUrl = "templates/default/image/";</script>
'; ?>


<!--<div id = "custom-style-wrapper" style="display: none">
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

</div>-->


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
			
<!--<h2><strong>Kính chào Quý khách !</strong></h2>
<p>Trang Market Online là nơi hội tụ và gặp gỡ giữa người tiêu dùng và nhà cung cấp sản phẩm/dịch vụ. Ngoài ra còn là nơi trao đổi thông tin thương mại/đầu tư giữa cá nhân/doanh nghiệp/tổ chức trong và ngoài nước.</p>
<p>Mời bạn <a href="logging.php">đăng ký thành viên</a> để tham gia với chúng tôi.</p>
<p>- <strong>Bạn là người tiêu dùng:</strong> cung cấp thông tin sản phẩm/khuyến mãi/nhu cầu mua sắm của bạn. </p>
<p>- <strong>Bạn là người bán sản phẩm, cần tìm kiếm khách hàng:</strong> mở gian hàng miễn phí với đa dạng thể loại sản phẩm. Tham khảo tại <a href="#">shop mẫu</a></p>
<p>- <strong>Bạn là nhà phân phối/doanh nghiệp:</strong> tìm kiếm/đăng nhu cầu mua-bán/đầu tư/tuyển dụng,... Mở rộng kinh doanh, nâng cao thương hiệu. Tham khảo tại <a href="#">trang doanh nghiệp mẫu</a></p>-->


<h2><strong>Kính chào Quý khách hàng !</strong></h2>
<p>Công ty cổ phần Truyền Thông và Tiếp Thị BMN (BMN) xin giới thiệu Trang điện tử <a href="http://www.marketonline.vn">(Marketonline.vn)</a> hoạt động theo mô hình kinh doanh B2B.</p>
<p>B2B (Business – to – Business): việc kinh doanh Thương mại điện tử giữa hai nhóm đối tượng trong đó người mua và người bán đều là Doanh nghiệp/Chủ cửa hàng (là thành viên tạo ra trang thương mại trên MarketOnline.vn). Vì vậy Quý khách tự tạo trang thương mại điện tử cho Cá nhân/Cửa hàng/Doanh nghiệp với thương hiệu riêng của chính mình trên trang <a href="http://www.marketonline.vn">Marketonline.vn</a>.</p>
<p>Trang thương mại điện tử chuyên cung cấp cho từng Cá nhân/ Công ty/ Cửa hàng/ Tổ chức nhằm đưa tất cả sản phẩm đến với người tiêu dùng một cách trực tiếp và hiệu quả. Bên cạnh đó, trong thời gian tới Trang điện tử <a href="http://www.marketonline.vn">Marketonline.vn</a> còn cung cấp cho Quý thành viên một công cụ quản lý hoạt động tiêu dùng trong cuộc sống sinh hoạt cũng như mọi hoạt động sống còn trong doanh nghiệp. </p>
<p>Ngoài việc BMN cung cấp cho Quý thành viên một công cụ thương mại chúng tôi còn hỗ trợ thành viên “đăng tin miễn phí trên Trang tin điện tử <a href="http://www.kinhdoanhtiepthi.vn">Kinhdoanhtiepthi.vn</a>” là phương tiện bổ trợ để Quý thành viên Truyền thông mọi hoạt động liên quan đến kinh doanh của Cá nhân/ Công ty/ Cửa hàng/ Tổ chức trong việc quảng cáo sản phẩm, quảng bá hình ảnh chính mình đến với cộng đồng. Bài viết giới thiệu liên quan hoạt động kinh doanh do thành viên cung cấp. Chương trình áp dụng cho tất cả các khách hàng đã đăng ký thành viên của <a href="http://www.marketonline.vn">Marketonline.vn</a>. Mọi bài viết và thông tin liên lạc xin gởi về <a href="mailto:contact@marketonline.vn">contact@marketonline.vn</a>.</p>
<p>Sứ mệnh đặt ra Trang điện tử <a href="http://www.marketonline.vn">Marketonline.vn</a> và Trang tin điện tử <a href="http://www.kinhdoanhtiepthi.vn">Kinhdoanhtiepthi.vn</a> là một địa chỉ Giới thiệu (PR) – Thương mại điện tử (E-Commerce) “đầy đủ  tiện lợi, uy tín” không giới hạn địa lý.</p>
<p>Trang điện tử <a href="http://www.marketonline.vn">Marketonline.vn</a> và Trang tin điện tử <a href="http://www.kinhdoanhtiepthi.vn">Kinhdoanhtiepthi.vn</a> là kênh thông tin để nhà đầu tư, đối tác, khách hàng có thể cập nhật các thông tin mới nhất, sản phẩm, tin tức và hoạt động của Quý thành viên.</p>
<p>Trân trọng kính mời !</p>
<p></p>
<p style="font-weight:bold">Lưu ý: Trang <a href="http://www.marketonline.vn">Marketonline.vn</a> đang trong quá trình hoàn thiện chức năng.</p>

			
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
   
   
   
   <div id="home_announce_box" style="display: none">
	
	<div style="padding: 20px;width: 900px">
	 
	 
	 
	 <h2><strong>Kính chào Quý khách hàng!</strong></h2>
	 
<p>Công ty cổ phần Truyền Thông và Tiếp Thị BMN (BMN) xin giới thiệu Trang Thương Mại Điện Tử <a href="http://www.marketonline.vn">MarketOnline.vn</a> là Thị Trường Trực Tuyến để tương tác giữa <strong>Cung và Cầu</strong> cho mọi hoạt động trong cuộc sống và công việc.</p>
<p>Trang Thương Mại Điện Tử là nơi để Quý khách hàng đăng tải Thông tin thương mại / Đầu tư / Mua-Bán / Phân phối / Dịch vụ / Tìm đối tác / Tuyển dụng / Rao vặt. Cũng như là Thị trường để Quý khách hàng tự giới thiệu năng lực Cá nhân, năng lực Cửa hàng, năng lực Doanh nghiệp, năng lực Tổ chức ở mọi lĩnh vực trong và ngoài nước.</p>
<p>Mời Quý khách hàng <a href="<?php echo $this->_tpl_vars['WebRootUrl']; ?>
register.php">Đăng ký thành viên</a> và tạo SHOP miễn phí để tham gia Thị trường.</p>
<p>Ngoài việc BMN cung cấp cho Quý thành viên công cụ Thị Trường Trực Tuyến chúng
tôi còn hỗ trợ thành viên đăng tin miễn phí trên Trang Tin Điện tử <a target="_blank" rel="nofollow" href="http://www.kinhdoanhtiepthi.vn">KinhDoanhTiepThi.vn</a>
là phương tiện bổ trợ để Quý thành viên truyền thông mọi hoạt động liên quan đến nhu cầu
của Cá nhân / Cửa hàng / Công ty / Tổ chức trong việc quảng cáo sản phẩm,
quảng bá hình ảnh chính mình đến với cộng đồng. Bài viết giới thiệu liên
quan hoạt động kinh doanh do thành viên cung cấp. Chương trình áp dụng cho tất
cả các khách hàng đã đăng ký thành viên của <a href="http://marketonline.vn">MarketOnline.vn</a>.
Mọi bài viết và thông tin liên lạc xin gởi về <a href="mailto:contact@marketonline.vn">contact@marketonline.vn</a>.</p>
<p>Sứ mệnh đặt ra của Trang Thương Mại Điện tử <a href="http://marketonline.vn">MarketOnline.vn</a> và Trang Tin Điện tử <a target="_blank" rel="nofollow" href="http://www.kinhdoanhtiepthi.vn">KinhDoanhTiepThi.vn</a>
là Thị trường đáng tin cậy, đầy đủ và tiện lợi cho Quý khách hàng.</p>
<p>Trân trọng kính mời!</p>
<p></p>
<p><strong>Lưu ý: Trang <a href="http://marketonline.vn">MarketOnline.vn</a> đang trong quá trình hoàn thiện chức năng.</strong></p>

			
	</div>
	
   </div>
   

   
   
   
   
   
<div id="add_follow" style="display: none">
	
	<div style="padding: 20px 20px 10px 20px;width: 500px">
			<p style="text-align: center; font-size: 18px;">
			 <!--<img src="slider/linkBuilding.jpg" />-->
			 <?php echo $this->_tpl_vars['_follow_help']; ?>

			</p>
			
			
	</div>
	
</div>

<div id="add_link" style="display: none">
	
	<div style="padding: 20px 20px 10px 20px;width: 540px">
			<p style="text-align: center; font-size: 18px;">
			 <!--<img src="slider/linkBuilding.jpg" />-->
			 <?php echo $this->_tpl_vars['_add_link_help']; ?>
 (<strong><?php echo $this->_tpl_vars['pb_username']; ?>
</strong>) <?php echo $this->_tpl_vars['_add_link_help1']; ?>
 (<strong><?php echo $this->_tpl_vars['pb_company']['shop_name']; ?>
</strong>) <?php echo $this->_tpl_vars['_add_link_help2']; ?>

			 
			</p>
			<p style="text-align: center; font-size: 18px;">
			 
			 <!--<a href="javascript:void(0)" onclick="shareStreamFacebook('<?php echo smarty_function_the_url(array('module' => 'space','userid' => ($this->_tpl_vars['pb_company']['cache_spacename'])), $this);?>
<?php if ($this->_tpl_vars['pb_company']['product_count'] > 8): ?>/<?php echo $this->_tpl_vars['pb_username']; ?>
_un.htmls<?php endif; ?>')">Chia sẻ cho bạn bè trên Facebook</a>-->
			<a href="javascript:void(0)" onclick="goclicky_custom(this, '<?php echo smarty_function_the_url(array('module' => 'space','userid' => ($this->_tpl_vars['pb_company']['cache_spacename'])), $this);?>
/<?php echo $this->_tpl_vars['pb_username']; ?>
_un.htmls', '<?php echo $this->_tpl_vars['FACEShare']['images']; ?>
', '<?php echo $this->_tpl_vars['FACEShare']['title']; ?>
', '<?php echo $this->_tpl_vars['FACEShare']['summary']; ?>
')">Chia sẻ gian hàng <strong><?php echo $this->_tpl_vars['pb_company']['shop_name']; ?>
</strong> cho bạn bè trên Facebook</a>
			</p>

	</div>
	
</div>


   <a id="links_list_but" href="#links_list_all" style="display: none">Hidden Clicker</a>
   <div id="links_list_all" style="display: none">
	
	<div style="padding: 0px 20px 10px 20px;width: 856px">
			
			 <div class="content_inner">
			 
			 </div>

			
			
	</div>
	
</div>
   
   
   <a id="follows_list_but" href="#follows_list_all" style="display: none">Hidden Clicker</a>
   <div id="follows_list_all" style="display: none">
	
	<div style="padding: 0px 20px 10px 20px;width: 856px">
			
			 <div class="content_inner">
			 

			  
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
   
   <div id="login-box" style="display: none">
	
	<div style="padding: 20px 20px 0px 20px;width: 320px">
			
			 <div class="content_inner" style="padding-bottom:10px;">
			 
			 
			 
			 
			 
			 
			    <div class="wrapper">
    <div class="content">
        
	<h1><?php echo $this->_tpl_vars['_login']; ?>
</h1>
	
        <div class="loadingcon">
        <form name="loggingfrm" id="LoggingFrm" method="post" action="logging.php">
            <input type="hidden" name="action" value="logging">
	    <input type="hidden" name="type" value="<?php echo $this->_tpl_vars['Type']; ?>
">
	    <input type="hidden" name="redirect" value="<?php echo $this->_tpl_vars['F_URL']; ?>
">
	    <?php echo smarty_function_formhash(array(), $this);?>

	    <input type="hidden" name="forward" value="<?php echo $this->_tpl_vars['_G']['forward']; ?>
" />
            <div class="loadingconleft">
                
				<?php if ($this->_tpl_vars['LoginError']): ?><?php echo $this->_tpl_vars['LoginError']; ?>
<?php endif; ?>
				<br />
<?php if ($this->_tpl_vars['pb_username'] != ""): ?>
					<label class="loadingname">
                        <?php echo $this->_tpl_vars['_user_name']; ?>

                    </label>
                    <label>
                        <?php echo ((is_array($_tmp=@$this->_tpl_vars['pb_username'])) ? $this->_run_mod_handler('default', true, $_tmp, '`$_account_n_email_n_mobile`') : smarty_modifier_default($_tmp, '`$_account_n_email_n_mobile`')); ?>

                    </label>
                    <br clear="all" />
					<label class="loadingname">
                        <?php echo $this->_tpl_vars['_member_type']; ?>

                    </label>
                    <label>
                        <?php echo $this->_tpl_vars['member_info']['groupname']; ?>
<img src="<?php echo $this->_tpl_vars['member_info']['groupimage']; ?>
" />
                    </label>
                    <br clear="all" />
					<label class="loadingname">
                        <?php echo $this->_tpl_vars['_your_last_login']; ?>
<?php echo $this->_tpl_vars['_colon']; ?>

                    </label>
                    <label>
                        <?php echo ((is_array($_tmp=$this->_tpl_vars['member_info']['last_login'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d %H:%M") : smarty_modifier_date_format($_tmp, "%Y-%m-%d %H:%M")); ?>

                    </label>
                    <br clear="all" />
<?php else: ?>
					<label class="loadingname">
                        <?php echo $this->_tpl_vars['_user_name']; ?>

                    </label>
                    <label>
                        <input type="text" style="color: #333;" name="data[login_name]" id="LoginName"  value="" placeholder="<?php echo $this->_tpl_vars['_account_n_email_n_mobile']; ?>
" tabindex="1">&nbsp;
                    </label>
                    <label class="loadingname">
                    <?php echo $this->_tpl_vars['_password']; ?>

                    </label>
                    <label>
                        <input name="data[login_pass]" type="password" id="LoginPass" value="" tabindex="2"><input type="checkbox" name="remember_pass" id="RememberPass" value="1" title="<?php echo $this->_tpl_vars['_remember_password']; ?>
">&nbsp;<?php echo $this->_tpl_vars['_remember_password']; ?>
&nbsp;
                    </label>
                    <br clear="all" />
                    
                    <div class="clear"></div>
                    <div class="login" id="btnLoginDiv">
                       <input type="submit" name="log_in" value="<?php echo $this->_tpl_vars['_login']; ?>
" id="wp-submit" class="submitbutton" />
		       <div class="info_but_login">
		       	<a href="<?php echo $this->_tpl_vars['WebRootUrl']; ?>
getpasswd.php"><?php echo $this->_tpl_vars['_forget_password']; ?>
</a><br />
		       	<a href="<?php echo $this->_tpl_vars['WebRootUrl']; ?>
register.php"><?php echo $this->_tpl_vars['_register']; ?>
</a>
		       </div>
                    </div>
		    
		    
		     <div class="box-res-con">
		     <div class="inner-boxx">
    <h4><?php echo $this->_tpl_vars['_not_register_annouce']; ?>
</h4><br />
    <button class="single_add_to_cart_button button alt" type="button" onclick="window.location='register.php?typename=Company'"><?php echo $this->_tpl_vars['_register']; ?>
</button>
</div>
		    </div>
<?php endif; ?>
                    
            </div>
            
        </form>
        </div>
    </div>
</div>
<script src="data/cache/<?php echo $this->_tpl_vars['JsLanguage']; ?>
/locale.js" charset="<?php echo $this->_tpl_vars['charset']; ?>
"></script>
<script language="javascript" src="scripts/jquery/jquery.validate.js"></script>
<script language="javascript" src="scripts/validate.js" charset="<?php echo $this->_tpl_vars['charset']; ?>
"></script>
<script>
var account_n_email_n_mobile = "<?php echo $this->_tpl_vars['_account_n_email_n_mobile']; ?>
";
</script>
			 
			 
			 
			  
			 </div>
	</div>
	
</div>
   
   
   
   
   
   
<a id="offerbox-but" href="#offerbox-fancy" style="display: none">Hidden Clicker</a>
<div id="offerbox-fancy" style="display: none">
	
	<div style="padding: 0;width: 1070px;float: left" class="offerbox-outer">
			
		
      </div>
	
</div>
   
   
   
   
   
   
   <div id="announce-frame"></div>
   
   <div id="chat-frame">
    
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
   
   
<a id="welcomnew-info-but" href="#welcomnew-info" style="display: none">Hidden Clicker</a>
<div id="welcomnew-info" style="display: none">
	
	<div style="padding: 20px 20px 20px 20px;width: 710px;max-height: 600px;overflow-x: hidden">
			
			<?php echo $this->_tpl_vars['welcomnew_info']['message']; ?>

			
	</div>
	
</div>

<div style="display: none">
<h2>mua bán trực tuyến</h2>
<h2>tìm việc làm</h2>
<h2>tuyển dụng</h2>
<h2>thị trường hàng giảm giá, khuyến mãi</h2>
<h2>mua bán giá rẻ</h2>
<h2>học và việc làm</h2>
<h2>đầu tư hiệu quả</h2>
<h2>đại lý, phân phối hàng hóa</h2>
<h2>quảng cáo thương hiệu</h2>
<h2>dịch vụ chuyên nghiệp</h2>
<h2>rao vặt</h2>
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