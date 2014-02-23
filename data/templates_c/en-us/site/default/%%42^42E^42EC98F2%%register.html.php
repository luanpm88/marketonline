<?php /* Smarty version 2.6.27, created on 2013-06-13 06:39:46
         compiled from default%5Cregister.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'formhash', 'default\\register.html', 50, false),array('modifier', 'urldecode', 'default\\register.html', 52, false),)), $this); ?>
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
    <div class="fifteen columns" id="page-title">
        <a class="back" href="javascript:history.back()"></a>
        <div class="subtitle">
            
                        <p><?php echo $this->_tpl_vars['_member']; ?>
</p>
        </div>
        <h1 class="page-title">
                        <?php echo $this->_tpl_vars['_register']; ?>
                </h1>


    </div>
    <div class="fifteen columns"><div class="line"></div></div>
</div>


<div class="row">

    <div class="four columns loginbox">

        <section id="woocommerce_login-2" class="widget-1 widget-first widget">
	  <div class="widget-inner">
	    
	    
	    
	    
	    <form name="regfrm" id="regfrm" method="post" action="" autocomplete="off">
            <?php echo smarty_function_formhash(array(), $this);?>

            <input type="hidden" name="register" value="<?php echo $this->_tpl_vars['_G']['type']; ?>
" />
            <input type="hidden" name="typename" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['_G']['typename'])) ? $this->_run_mod_handler('urldecode', true, $_tmp) : urldecode($_tmp)); ?>
" />
            <input type="hidden" name="forward" value="<?php echo $this->_tpl_vars['_G']['forward']; ?>
" />
	    <p>
			<label class="registerlabel" for="dataMemberUsername">
			<?php echo $this->_tpl_vars['_member_login_name']; ?>
<span>*</span>
			</label>
			
			<input type="text" name="data[member][username]" id="dataMemberUsername" value="" tabindex="1"/>
	    
			<!--<label class="lenglabel" id="membernameDiv">
			<?php echo $this->_tpl_vars['_member_login_name_conditions']; ?>

			</label>-->
	    </p>
	    <p>
			<label class="registerlabel" for="dataMemberEmail">
			E-mail<?php echo $this->_tpl_vars['_colon']; ?>
<span>*</span>
			</label>

			<input type="text" name="data[member][email]" id="dataMemberEmail" value="" tabindex="2"/>

			<!--<label class="lenglabel" id="memberemailDiv">
			<?php echo $this->_tpl_vars['_email_conditions']; ?>

			</label>-->
	</p>
	    <p>
			<label class="registerlabel" for="memberpass">
			<?php echo $this->_tpl_vars['_password']; ?>
<span>*</span>
			</label>

			<input type="password" name="data[member][userpass]" id="memberpass" value="" tabindex="3">

			<!--<label class="lenglabel">
			<?php echo $this->_tpl_vars['_password_conditions']; ?>

			</label>-->
		</p>
	    <p>
			<label class="registerlabel" for="re_memberpass">
			<?php echo $this->_tpl_vars['_re_enter_password']; ?>
<span>*</span>
			</label>

			<input name="re_memberpass" type="password" id="re_memberpass" value="" tabindex="4">

			<!--<label class="lenglabel">
			<?php echo $this->_tpl_vars['_re_enter_up_password']; ?>

			</label>-->
            </p>
            <?php if ($this->_tpl_vars['ifcapt']): ?>
	    <p>
			<label class="registerlabel" for="login_auth">
			<?php echo $this->_tpl_vars['_code']; ?>

			</label>
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
			<br style="clear:both" /><label class="checkinput">
			<input name="data[capt_register]" id="login_auth" type="text" value="" size="4" style="width:60px;" tabindex="5">&nbsp;<font class="gray"><?php echo $this->_tpl_vars['_input_code']; ?>
</font>
			</label>
           </p>
            <?php endif; ?>
			<p class="registerp2">
			  <input style="float: left; margin: 5px;" name="licence_check" id="LicenseCheck" type="checkbox" onclick="if(this.checked)$('#Submit').removeAttr('disabled'); else $('#Submit').attr('disabled','true');" checked="checked" />
			  <label style="float: left;margin-top: 3px;" for="LicenseCheck"><?php echo $this->_tpl_vars['_see_agree']; ?>
</label>
			</p>
			<div class="agree" id="agreements" style="display: none;"><?php echo $this->_tpl_vars['agreement']; ?>
</div>
          
			<p class="registerbutton">
			  <input id="wp-submit" type="submit" name="Submit" id="Submit" value="<?php echo $this->_tpl_vars['_register']; ?>
" class="submit_w67" />
			</p>
			</form>
	    
	    
			<ul class="pagenav"></ul></div></section>
			
    </div>
    
    <div class="four columns register_right">
	<div class="wpb_content_element span4 column_container">
		<div class="wpb_wrapper">
			 <div class="row-fluid">
	<div class="wpb_content_element span12 text-item wpb_text_column">
		<div class="wpb_wrapper">
			
<h6>Great made option</h6>
<h2><a>Thông báo</a></h2>
Psychic self-regulation, to a first approximation, enlightens positivist ericson hypnosis, so is a kind of

relationship with the darkness of the unconscious. Thinking integrates cultural entity

<img height="32" width="32" src="http://theme.crumina.net/onetouch/wp-content/uploads/2012/12/settings.png" alt="" title="settings" class="icon_post">


		</div> 
	</div> </div> <div class="row-fluid">
	<div class="wpb_content_element span12 text-item no-740 wpb_text_column">
		<div class="wpb_wrapper">
			
<h6>It was hard to make it so cool</h6>
<h2><a>Quyền lợi thành viên</a></h2>
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.

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
			
<h6>Great made option</h6>
<h2><a>Tiêu chuẩn</a></h2>
Psychic self-regulation, to a first approximation, enlightens positivist ericson hypnosis, so is a kind of

relationship with the darkness of the unconscious. Thinking integrates cultural entity

<img height="32" width="32" src="http://theme.crumina.net/onetouch/wp-content/uploads/2012/12/settings.png" alt="" title="settings" class="icon_post">


		</div> 
	</div> </div> <div class="row-fluid">
	<div class="wpb_content_element span12 text-item no-740 wpb_text_column">
		<div class="wpb_wrapper">
			
<h6>It was hard to make it so cool</h6>
<h2><a>Bảo mật</a></h2>
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.

<img height="32" width="32" src="http://theme.crumina.net/onetouch/wp-content/uploads/2012/12/check1.png" alt="" title="check" class="icon_post">


		</div> 
	</div> </div> 
		</div> 
	</div>
	
	
    </div>
    
</div>



</div>
  </div>

<script language="javascript" src="scripts/jquery/jquery.validate.js"></script>
<script language="javascript" src="scripts/validate.js" charset="<?php echo $this->_tpl_vars['charset']; ?>
"></script>
<?php echo '
<script>
$("#SeeAgreement").click(function() { 
	$("#agreements").toggle();
});
</script>
'; ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


