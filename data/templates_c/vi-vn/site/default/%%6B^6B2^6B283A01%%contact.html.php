<?php /* Smarty version 2.6.27, created on 2014-08-15 10:31:53
         compiled from default%5Ccontact.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/header.html", 'smarty_include_vars' => array('page_title' => "Liên hệ với chúng tôi")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="body-wrapper" >
<div id="body-wrapper-padding" class="contact_page">
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
            <?php echo $this->_tpl_vars['_useman']; ?>

        </div>

                <h1 class="page-title">
            <?php echo $this->_tpl_vars['_contact_help']; ?>
        </h1>

        <div class="breadcrumbs"><a href="<?php echo $this->_tpl_vars['SiteUrl']; ?>
"><?php echo $this->_tpl_vars['_homepage']; ?>
</a> <span class="delim">/</span> <?php echo $this->_tpl_vars['_contact']; ?>
</div>


      </div>

      

    </div>

<div id="content" class="contact_page">

  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>


  <div class="row">

  <div class="contact_border">



    

    <div class="five columns contact_page_left" style="width: 55%">
<h3><?php echo $this->_tpl_vars['_support_info']; ?>
</h3>

<div style="padding-left: 62px">
<p><span style="font-weight: bold;font-size: 16px;"><label style="padding-top: 2px;"><?php echo $this->_tpl_vars['_hotline']; ?>
</label> 0903.07.1122</span><br />
<label><?php echo $this->_tpl_vars['_email']; ?>
</label> <a title="Liên hệ với chúng tôi qua email" onclick="" href="mailto:contact@marketonline.vn" rel="noreferrer">contact@marketonline.vn</a></p>
</div>

                <h3><?php echo $this->_tpl_vars['_company_info']; ?>
</h3>
<div style="padding-left: 62px">
                <p style="font-size: 19px;margin-bottom: 2px; font-weight: bold">CÔNG TY CỔ PHẦN TRUYỀN THÔNG VÀ TIẾP THỊ BMN</p>
<p><label><?php echo $this->_tpl_vars['_office_room']; ?>
</label> 444/4 Cách Mạng Tháng 8, Phường 11, Quận 3, TP.HCM<br />
<label><?php echo $this->_tpl_vars['_vpgd']; ?>
</label> Block B R.606 - Indochina Park Tower, 04 Nguyễn Đình Chiểu, Quận 1, TP.HCM<br />
<label><?php echo $this->_tpl_vars['_phone']; ?>
</label> (84) 08.3846 1716<br />
<label><?php echo $this->_tpl_vars['_fax']; ?>
</label> (84) 08.3947 0385<br />
</p>
</div>


<h3>Hỗ trợ trực tuyến</h3>
<div style="padding-left: 57px" class="support-contact">
    <ul>
        <?php $_from = $this->_tpl_vars['support_members']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
            <?php if (! $this->_tpl_vars['pb_userinfo']): ?>
                <li class="<?php if ($this->_tpl_vars['item']['online']): ?>online<?php endif; ?> comment_but" href="#login-box" redirect="<?php echo $this->_tpl_vars['SiteUrl']; ?>
lien-he">
                    <img src="<?php echo $this->_tpl_vars['item']['photo']; ?>
" />
                    <?php if ($this->_tpl_vars['item']['membertype_id'] == 6): ?>
                        <h2 class="title"><?php echo $this->_tpl_vars['item']['first_name']; ?>
 <?php echo $this->_tpl_vars['item']['last_name']; ?>
 <div class="online_status">.</div></h2>
                        <p class="content"><?php echo $this->_tpl_vars['item']['school_name']; ?>
</p>
                    <?php else: ?>
                        <h2 class="title"><?php echo $this->_tpl_vars['item']['shop_name']; ?>
 <span class="online_status">.</span></h2>
                        <p class="content"><?php if ($this->_tpl_vars['item']['first_name']): ?><?php echo $this->_tpl_vars['item']['first_name']; ?>
 <?php echo $this->_tpl_vars['item']['last_name']; ?>
<?php else: ?><?php echo $this->_tpl_vars['item']['username']; ?>
<?php endif; ?></p>
                    <?php endif; ?>
                    <!--<p class="timeinbox"><?php echo $this->_tpl_vars['item']['created']; ?>
</p>-->
                </li>
            <?php else: ?>
                <li class="<?php if ($this->_tpl_vars['item']['online']): ?>online<?php endif; ?>" onclick="getChatboxNew('<?php echo $this->_tpl_vars['item']['id']; ?>
x<?php echo $this->_tpl_vars['item']['membertype_id']; ?>
', false);">
                    <img src="<?php echo $this->_tpl_vars['item']['photo']; ?>
" />
                    <?php if ($this->_tpl_vars['item']['membertype_id'] == 6): ?>
                        <h2 class="title"><?php echo $this->_tpl_vars['item']['first_name']; ?>
 <?php echo $this->_tpl_vars['item']['last_name']; ?>
 <span class="online_status">.</span></h2>
                        <p class="content"><?php echo $this->_tpl_vars['item']['school_name']; ?>
</p>
                    <?php else: ?>
                        <h2 class="title"><?php echo $this->_tpl_vars['item']['shop_name']; ?>
 <span class="online_status">.</span></h2>
                        <p class="content"><?php if ($this->_tpl_vars['item']['first_name']): ?><?php echo $this->_tpl_vars['item']['first_name']; ?>
 <?php echo $this->_tpl_vars['item']['last_name']; ?>
<?php else: ?><?php echo $this->_tpl_vars['item']['username']; ?>
<?php endif; ?></p>
                    <?php endif; ?>
                    <!--<p class="timeinbox"><?php echo $this->_tpl_vars['item']['created']; ?>
</p>-->
                </li>
            <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>
    </ul>
</div>



</div>

<?php if ($this->_tpl_vars['success']): ?><p class="contact_success"><?php echo $this->_tpl_vars['_contact_success']; ?>
</p><?php endif; ?>

<?php if ($this->_tpl_vars['capt_check'] == false): ?><div class="capt-error contact-error">Mã bảo mật không đúng. Vui lòng nhập lại!</div><?php endif; ?>

    <div class="ten columns contactbox_right">
           <h3><?php echo $this->_tpl_vars['_contact_with_us']; ?>
</h3>
           
           <form action="" method="POST" name="contact_feedback" id="contact_feedback" class="contact-form">
           <div class="four columns logging contact_box">

        
            <div class="fields">
                <label for="sender_name"><?php echo $this->_tpl_vars['_sender']; ?>
</label>
                <input type="text" class="text" name="sender_name" id="sender_name" value="<?php echo $this->_tpl_vars['post']['sender_name']; ?>
" />
                <label for="sender_email"><?php echo $this->_tpl_vars['_sender_email']; ?>
</label>
                <input id="sender_email" name="sender_email" class="text span4" type="text" value="<?php echo $this->_tpl_vars['post']['sender_email']; ?>
" />
                <label><?php echo $this->_tpl_vars['_subject']; ?>
</label>
                <input class="text span4"  type="text" name="letter_subject" id="letter_subject" value="<?php echo $this->_tpl_vars['post']['letter_subject']; ?>
" />
            </div>
            <label style="clear: both"><?php echo $this->_tpl_vars['_message']; ?>
</label>
            <textarea name="letter_text" id="letter_text" cols="30" rows="10" placeholder="" tabindex="4"><?php echo $this->_tpl_vars['post']['letter_text']; ?>
</textarea>
            
        
            <?php if ($this->_tpl_vars['ifcapt']): ?>
                <div id="res_captcha">
                    <div class="left" style="padding-right: 120px">
                            
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
                            <input class="" name="data[capt_service]" id="login_auth" type="text" value="" size="4" style="width:117px; margin-bottom: 5px;" tabindex="5">&nbsp;<font class="gray" style="float: left"><?php echo $this->_tpl_vars['_input_code']; ?>
</font>
                    </div>
               </div>
            <?php endif; ?>
        
        
        </div>
           
            <input type="submit" class="right" name="send" id="wp-submit" style="margin-right: 0" tabindex="5" value="<?php echo $this->_tpl_vars['_send_contact_email']; ?>
" />
            <input type="checkbox" id="agree" style="display:none;" />
            <label for="antispam_answer" style="float:left; width:300px; margin-top:13px; margin-right:20px;"></label><input style="display: none;" class="text" style="width:331px; float:left;"  type="text" name = "antispam_answer" id="antispam_answer" />
            
           </form>
        <?php echo '
        <script type="text/javascript">
            jQuery(document).ready(function($){

                $("#sender_email,#sender_name,#letter_subject,#letter_text").on("keydown", function(){
                    if( $(this).css("color") == "rgb(255, 0, 0)" )
                        $(this).css("color","#000000").val("");
                });

                $("#contact_feedback input[type=submit]").on("click", function(){
                    if( $("#sender_email").css("color") == "rgb(255, 0, 0)") $("#sender_email").val("");
                    if( $("#sender_name").css("color") == "rgb(255, 0, 0)") $("#sender_name").val("");
                    if( $("#letter_subject").css("color") == "rgb(255, 0, 0)") $("#letter_subject").val("");
                    if ($("#letter_text").css("color") == "rgb(255, 0, 0)") $("#letter_text").val("");
                });

                $("#contact_feedback").validate({
                    submitHandler: function(form) {
                        form.submit();
                    },
                    rules: {
                        sender_email: {
                            required: true,
                            email: true
                        },
                        sender_name: {
                            required:true
                        },
                        letter_subject: {
                            required:true
                        },
                        letter_text: {
                            required:true
                        }
                    },
                    messages: {
                        sender_email: {
                            required: "Nhập địa chỉ email!",
                            email: "Email không hợp lệ"
                        },
                        sender_name: {
                            required:"Nhập tên của bạn!"
                        },
                        letter_subject: {
                            required:"Nhập tiêu đề!"
                        },
                        letter_text: {
                            required:"Nhập nội dung tin nhắn!"
                        }
                    },
                    errorPlacement: function(error, element) {
                        //element.css("color","red").val(error.html());
                    },
                    invalidHandler: function(form, validator) {
                        for(z in validator[\'errorList\'] ){
                            var element = validator[\'errorList\'][z][\'element\'];
                            var message = validator[\'errorList\'][z][\'message\'];
                            jQuery(element).css("color","red").val(message);
                        }
                    }
                });
            });
        </script>
        '; ?>

            </div>
    
    
    
    
  </div>
    
    
    <div class="fifteen columns"><div class="line"> </div></div>
    
    
    <div class="fifteen columns">
      <div id="map"></div>
      <?php echo '
            <script type="text/javascript">
        jQuery(document).ready(function () {
          jQuery("#map").gmap3(
              { action:\'addMarker\',
                address:"444/4 Cách Mạng Tháng 8, Phường 11, Quận 3, TP.HCM",
                map:{
                  center:true,
                  zoom:14,
                  scrollwheel: false
                }})
        });
      </script>
            '; ?>


    </div>
    
    
    
    
    
  </div>

</div>  </div>
  </div>





<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>