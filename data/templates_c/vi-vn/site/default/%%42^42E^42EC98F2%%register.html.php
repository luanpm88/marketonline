<?php /* Smarty version 2.6.27, created on 2014-02-26 14:46:52
         compiled from default%5Cregister.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'formhash', 'default\\register.html', 161, false),array('modifier', 'urldecode', 'default\\register.html', 163, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/header.html", 'smarty_include_vars' => array('page_title' => ($this->_tpl_vars['_member_reg']))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script src="data/cache/<?php echo $this->_tpl_vars['JsLanguage']; ?>
/locale.js" charset="<?php echo $this->_tpl_vars['charset']; ?>
"></script>
<?php echo '
<style type="text/css">
label.error {
  font-weight: bold;
  color: #b80000;
}
</style>


<script>
  
function getSharingUsername() {
		//code
		$.ajax({
			url: "index.php?do=product&action=getSharingUsername",
		}).done(function ( data ) {
			if( console && console.log ) {
				//$("#message_out").html(data);
				//alert(data);
				if(data != \'\')
				{
				  $(\'#dataMemberReferrerHidden\').val(data);
				  $(\'.noreferrer\').remove();
				}
				else
				{
				  $(\'#dataMemberReferrerHidden\').remove();
				  $(\'.noreferrer\').css("display", "block");
				}
			}
  });
}
  
  $(document).ready(function() {
  
    getSharingUsername();
    
  
  });
</script>

'; ?>










   


<?php echo '
<script>
  $(document).ready(function() {
    $(\'.submit_res\').click(function() {
	    
	    
	    
	    setTimeout(function(){
	      if ($(\'label[for=typename]\').css(\'display\') != \'none\') {
		$(\'.typename_out\').append($(\'label[for=typename]\').clone())
		$(\'label[for=typename]\').eq(0).remove();
	      }
	      $("html, body").animate({ scrollTop:250 }, 100);
	      
	      
	      //check submit button
	      if(!$(\'#regfrm label.error\').filter(function() {
		return $(this).css(\'display\') !== \'none\';
	      }).length)
	      {
		$(\'.submit_res\').val("Đang xử lý thông tin...");
		$(\'.submit_res\').addClass("reg-loading");
		$(\'.submit_res\').after(\'<span class="lloading"></span>\');
	      }	     
	      
	    }, 100);
    });
    
    $(\'#dataMemberEmail\').keyup(function() {
      if ($(this).val() == "") {
	if (!$(\'.email_confirm\').hasClass("hide_res")) {
	  $(\'.email_confirm\').addClass("hide_res");
	}
      }
      else
      {
	$(\'.email_confirm\').removeClass("hide_res");
      }
    });
    
    $(\'#memberpass\').keyup(function() {
      if ($(this).val() == "") {
	if (!$(\'.password_confirm\').hasClass("hide_res")) {
	  $(\'.password_confirm\').addClass("hide_res");
	}
      }
      else
      {
	$(\'.password_confirm\').removeClass("hide_res");
      }
    });
    
    
    
    
  });
</script>
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


<div class="row">
    <div class="fifteen columns" id="page-title" style="margin-top: -10px">
        <a class="back" href="javascript:history.back()"></a>
        <div class="subtitle">
            
                        <p><?php echo $this->_tpl_vars['_member']; ?>
</p>
        </div>
        <h1 class="page-title">
                        <?php echo $this->_tpl_vars['_register']; ?>
                </h1>


    </div>
    <div class="fifteen columns"><div class="line" style="margin-top: -17px"></div></div>
</div>


<div class="row">
  
<ul class="main_user_select">
  <li class="active" rel="shop"><a href="javascript:void(0)">Tạo Gian hàng</a></li>
  <li rel="employee"><a href="javascript:void(0)">Xin Việc</a></li>
  <li rel="employer"><a href="javascript:void(0)">Tuyển dụng</a></li>
  <li rel="learner"><a href="javascript:void(0)">Học tập</a></li>
</ul>

    <div class="four columns loginbox resbox">

        <section id="woocommerce_login-2" class="widget-1 widget-first widget">
	  <div class="widget-inner">
	    
	    
	    
	    
	    <form name="regfrm" id="regfrm" method="post" action="" autocomplete="off">
            <?php echo smarty_function_formhash(array(), $this);?>

            <input type="hidden" name="register" value="<?php echo $this->_tpl_vars['_G']['type']; ?>
" />
            <!--<input type="hidden" name="typename" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['_G']['typename'])) ? $this->_run_mod_handler('urldecode', true, $_tmp) : urldecode($_tmp)); ?>
" />-->
            <input type="hidden" name="forward" value="<?php echo $this->_tpl_vars['_G']['forward']; ?>
" />
	    <p class="typename_out you_are_form" style="margin-bottom: 15px;">
			<label class="registerlabel" for="dataMemberUsername">
			<?php echo $this->_tpl_vars['_member_type_choose']; ?>
:<span>*</span>
			</label>
			
			<input type="radio" name="typename" value="Personal" /> Cá nhân |
			<input type="radio" name="typename" value="Shop" /> Cửa hàng |
			<input type="radio" name="typename" value="Company" /> Doanh nghiệp
			
			<input class="hidden_check" type="radio" name="typename" value="Employee" />
			<input class="hidden_check" type="radio" name="typename" value="Employer" />
			<input class="hidden_check" type="radio" name="typename" value="Learner" />
			
	    </p>
	    <p>
			<label class="registerlabel" for="dataMemberUsername">
			<?php echo $this->_tpl_vars['_member_login_name']; ?>
<span>*</span>
			</label>
			
			<input placeholder="Tên đăng nhập (không phải tên Shop)" type="text" name="data[member][username]" id="dataMemberUsername" value="" tabindex="1"/>
	    
			<label class="lenglabel" id="membernameDiv">
			
			</label>
	    </p>
	    <p>
			<label class="registerlabel" for="dataMemberEmail">
			<?php echo $this->_tpl_vars['_email']; ?>
<span>*</span>
			</label>

			<input placeholder="E-mail để khách hàng liên hệ với bạn" type="text" name="data[member][email]" id="dataMemberEmail" value="" tabindex="2"/>

			<label class="lenglabel" id="memberemailDiv">

			</label>
	</p>
	<p class="email_confirm hide_res">
			<label class="registerlabel" for="dataMemberEmail">
			Nhập lại email<span>*</span>
			</label>

			<input placeholder="" type="text" name="confirm_email" id="dataMemberConfirmEmail" value="" tabindex="2"/>

			<label class="lenglabel" id="memberemailDiv">

			</label>
	</p>
	    <p>
			<label class="registerlabel" for="memberpass">
			<?php echo $this->_tpl_vars['_password']; ?>
<span>*</span>
			</label>

			<input type="password" name="data[member][userpass]" id="memberpass" value="" tabindex="3">

			<label class="lenglabel">
			
			</label>
		</p>
	    <p class="password_confirm hide_res">
			<label class="registerlabel" for="re_memberpass">
			<?php echo $this->_tpl_vars['_re_enter_password']; ?>
<span>*</span>
			</label>

			<input name="re_memberpass" type="password" id="re_memberpass" value="" tabindex="4">

			<label class="lenglabel">
			
			</label>
            </p>
	    
	    
	    
	      <input type="hidden" name="data[member][referrer_id]" id="dataMemberReferrerHidden" value="" tabindex="5"/>
	       
	    
	      <p class="noreferrer" style="display: none">
			  <label class="registerlabel" for="dataMemberUsername">
			  <?php echo $this->_tpl_vars['_referrer_name']; ?>

			  </label>
			  
			  <input placeholder="<?php echo $this->_tpl_vars['_referrer_intro']; ?>
" type="text" name="data[member][referrer_id]" id="dataMemberReferrer" value="" tabindex="5"/>
			  <span class="referer_info">(<?php echo $this->_tpl_vars['_referer_info']; ?>
)</span>
	      
			  <label class="lenglabel" id="memberReferrer">
  
			  </label>
	      </p>
	    
	    
	    
	    
            <?php if ($this->_tpl_vars['ifcapt']): ?>
	    <div id="res_captcha">
		<div class="left">
			
			<span class="registercheck"><img class="registerpic" width="123" height="50" id="imgcaptcha" src="captcha.php?sid=<?php echo $this->_tpl_vars['sid']; ?>
" alt="<?php echo $this->_tpl_vars['_unclear_see_numbers']; ?>
" title="<?php echo $this->_tpl_vars['_unclear_see_numbers']; ?>
" />
			
			<object type="application/x-shockwave-flash" data="images/play.swf?audio=captcha.php&amp;do=play&amp;bgColor1=#fff&amp;bgColor2=#fff&amp;iconColor=#777&amp;borderWidth=1&amp;borderColor=#000" height="19" width="19">
			<param name="movie" value="images/play.swf?audio=captcha.php&amp;do=play&amp;bgColor1=#fff&amp;bgColor2=#fff&amp;iconColor=#777&amp;borderWidth=1&amp;borderColor=#000" />
			</object>
			<a href="javascript:;"><img src="<?php echo $this->_tpl_vars['theme_img_path']; ?>
images/gongqiu03.jpg" class="registerpic2" id="exchange_imgcapt" /></a>
			</span>
		</div>
		<div class="right">
			<label class="registerlabel" for="login_auth" style="margin-top: 5px;margin-bottom: 8px;">
			  <?php echo $this->_tpl_vars['_code']; ?>
<span>*</span>
			</label>
			<input class="" name="data[capt_register]" id="login_auth" type="text" value="" size="4" style="width:117px; margin-bottom: 5px;" tabindex="5">&nbsp;<font class="gray" style="float: left"><?php echo $this->_tpl_vars['_input_code']; ?>
</font>
		</div>
           </div>
            <?php endif; ?>
	    <br style="clear: both" />
			<p class="registerp2">
			  <input style="float: left; margin: 5px 5px 5px 0;" name="licence_check" id="LicenseCheck" type="checkbox" onclick="if(this.checked)$('#Submit').removeAttr('disabled'); else $('#Submit').attr('disabled','true');" checked="checked" />
			  <label style="float: left;margin-top: 3px;" for="LicenseCheck"><?php echo $this->_tpl_vars['_see_agree']; ?>
</label>
			</p>
			<div class="agree" id="agreements" style="display: none;"><?php echo $this->_tpl_vars['agreement']; ?>
</div>
          
			<p class="registerbutton">
			  <input type="submit" name="Submit" id="wp-submit" value="<?php echo $this->_tpl_vars['_register']; ?>
" class="submit_w67 submit_res" />
			</p>
			</form>
	    
	    
			<ul class="pagenav"></ul></div></section>
			
    </div>
    
    <div class="four columns register_right">
	<div class="wpb_content_element span4 column_container">
		<div class="wpb_wrapper" style="margin-top:-25px">
			 <div class="row-fluid">
	<div class="wpb_content_element span12 text-item wpb_text_column">
		<div class="wpb_wrapper">
			
<h2><a href="#box_4home_tb">Giới thiệu</a></h2>

Công ty cổ phần Truyền Thông và Tiếp Thị BMN (BMN) xin giới thiệu Trang Thương Mại Điện Tử MarketOnline.vn là Thị Trường Trực Tuyến tương tác giữa Cung và Cầu cho mọi hoạt động trong cuộc sống và công việc...
<br /><a class="more" href="#box_4home_tb">Xem thêm</a>

<img height="32" width="32" src="http://theme.crumina.net/onetouch/wp-content/uploads/2012/12/check1.png" alt="" title="settings" class="icon_post">


		</div> 
	</div> </div> <div class="row-fluid">
	<div class="wpb_content_element span12 text-item no-740 wpb_text_column">
		<div class="wpb_wrapper">
			

<h2><a href="#box_4home_ql">Quyền lợi thành viên</a></h2>
Truy cập Trang điện tử www.marketonline.vn (Marketonline.vn) bằng tài khoản quản trị do Quý khách tự tạo. Sử dụng các sản phẩm, dịch vụ đã đăng ký với Marketonline.vn để phục vụ cho ..
<br /><a class="more" href="#box_4home_ql">Xem thêm</a>

<img height="32" width="32" src="http://theme.crumina.net/onetouch/wp-content/uploads/2012/12/check1.png" alt="" title="check" class="icon_post">


		</div> 
	</div> </div> 
		</div> 
	</div>
	
	
	<div class="wpb_content_element span4 column_container">
		<div class="wpb_wrapper">
			 <div class="row-fluid">
	<div class="wpb_content_element span12 text-item wpb_text_column">
		<div class="wpb_wrapper">
			

<h2><a href="#box_4home_dk">Điều khoản sử dụng</a></h2>
Công ty Cổ phần Truyền Thông và Tiếp Thị BMN (gọi tắt là BMN) duy trì trang www.marketonline.vn (sau đây gọi là Trang điện tử) như một dịch vụ cung cấp cho khách hàng, bao gồm...
<br /><a class="more" href="#box_4home_dk">Xem thêm</a>


<img height="32" width="32" src="http://theme.crumina.net/onetouch/wp-content/uploads/2012/12/check1.png" alt="" title="settings" class="icon_post">


		</div> 
	</div> </div> <div class="row-fluid">
	<div class="wpb_content_element span12 text-item no-740 wpb_text_column">
		<div class="wpb_wrapper">
			

<h2><a href="#box_4home_bm">Bảo mật</a></h2>
Công ty Cổ phần Truyền thông và Tiếp thị BMN (BMN) là đơn vị hoạt động trong lĩnh vực truyền thông tin tức và tiếp thị sản phẩm. Marketonline.vn là sản phẩm được BMN xây dựng...
<br /><a class="more" href="#box_4home_bm">Xem thêm</a>

<img height="32" width="32" src="http://theme.crumina.net/onetouch/wp-content/uploads/2012/12/check1.png" alt="" title="check" class="icon_post">


		</div> 
	</div> </div> 
		</div> 
	</div>
	
	
    </div>
    
</div>



</div>
  </div>

<!--<script language="javascript" src="scripts/jquery/jquery.validatez.js"></script>-->
<script language="javascript" src="scripts/validate.js" charset="<?php echo $this->_tpl_vars['charset']; ?>
"></script>
<?php echo '
<script>
$(document).ready(function() {

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
		
		$("#SeeAgreement").fancybox({
			\'padding\': 0,
			\'zoomOpacity\': true,
			\'zoomSpeedIn\': 500,
			\'zoomSpeedOut\': 500,
			\'overlayOpacity\': 0.75,
			\'frameWidth\': 530,
			\'frameHeight\': 400,
			\'hideOnContentClick\': false
		});

});
</script>
'; ?>





<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


