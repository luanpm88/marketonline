<?php /* Smarty version 2.6.27, created on 2013-06-13 11:50:24
         compiled from default%5Ccontact.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/header.html", 'smarty_include_vars' => array('page_title' => ($this->_tpl_vars['_member_reg']))));
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
      <div class="fifteen columns" id="page-title">
        <a class="back" href="javascript:history.back()"></a>
        <div class="subtitle">
            <?php echo $this->_tpl_vars['_customer']; ?>
        </div>

                <h1 class="page-title">
            <?php echo $this->_tpl_vars['_contact']; ?>
        </h1>

        <div class="breadcrumbs"><a href="<?php echo $this->_tpl_vars['SiteUrl']; ?>
"><?php echo $this->_tpl_vars['_homepage']; ?>
</a> <span class="delim">/</span> <?php echo $this->_tpl_vars['_contact']; ?>
</div>


      </div>

      <div class="fifteen columns"><div class="line"> </div></div>

    </div>

<div id="content">

  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

  <div class="team row" style="display: none !important;">


      

        <div class="team-brick five columns">
          <div class="bg">
            <a href="http://theme.crumina.net/onetouch/contacts-page/ivan-petrov-designer/">
              <img src="http://theme.crumina.net/onetouch/wp-content/uploads/2012/11/397209-140x140.jpg" alt="Georgia Frie, designer"/>
            </a>
            <div class="desc">
              <h4><a href="http://theme.crumina.net/onetouch/contacts-page/ivan-petrov-designer/">Georgia Frie, designer</a></h4>
              <p>sectetur adipiscing elit. Donec iaculis metus vitae ligula elementum ut luctus lorem facilisis.</p>
            </div>
          </div>
        </div>

          

        <div class="team-brick five columns">
          <div class="bg">
            <a href="http://theme.crumina.net/onetouch/contacts-page/loren-anderson-developer/">
              <img src="http://theme.crumina.net/onetouch/wp-content/uploads/2012/11/378743-140x140.jpg" alt="Max Pain, developer"/>
            </a>
            <div class="desc">
              <h4><a href="http://theme.crumina.net/onetouch/contacts-page/loren-anderson-developer/">Max Pain, developer</a></h4>
              <p>sectetur adipiscing elit. Donec iaculis metus vitae ligula elementum ut luctus lorem facilisis.</p>
            </div>
          </div>
        </div>

          

        <div class="team-brick five columns">
          <div class="bg">
            <a href="http://theme.crumina.net/onetouch/contacts-page/anna-egorova-director/">
              <img src="http://theme.crumina.net/onetouch/wp-content/uploads/2012/11/409277-140x140.jpg" alt="John Doe, director"/>
            </a>
            <div class="desc">
              <h4><a href="http://theme.crumina.net/onetouch/contacts-page/anna-egorova-director/">John Doe, director</a></h4>
              <p>sectetur adipiscing elit. Donec iaculis metus vitae ligula elementum ut luctus lorem facilisis.</p>
            </div>
          </div>
        </div>

          
  </div>
  <div class="row"><div class="fifteen columns" style="display: none">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec iaculis metus vitae ligula elementum ut luctus lorem facilisis. Sed non leo nisl, ac euismod nisi. Aenean augue dolor, facilisis id fringilla ut, tempus vitae nibh. Nullam nec diam risus. Donec laoreet ultricies rhoncus. Aliquam adipiscing,… </p>

        </div></div>
  <div class="row">



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

    <div class="five columns">
                <h3><?php echo $this->_tpl_vars['_company_info']; ?>
</h3>
<p><?php echo $this->_tpl_vars['_address']; ?>
 444/4 Cách Mạng Tháng 8, Phường 11, Quận 3, TP.HCM<br />
<?php echo $this->_tpl_vars['_phone']; ?>
 08.3846.1716<br />
<?php echo $this->_tpl_vars['_fax']; ?>
 08.3947.0385</p>
<h3><?php echo $this->_tpl_vars['_support_info']; ?>
</h3>
<p><?php echo $this->_tpl_vars['_phone']; ?>
 0903.07.1122<br />
Email: <a title="[GMCP] Compose a new mail to ouremail@planetearth.com" onclick="window.open('https://mail.google.com/mail/u/0/?view=cm&amp;fs=1&amp;tf=1&amp;to=ouremail@planetearth.com', null, 'width=640,height=580,scrollbars=yes');return false" href="mailto:ouremail@planetearth.com" rel="noreferrer">contact@kinhdoanhtiepthi.vn</a></p>

            </div>


    <div class="ten columns">
           <h3><?php echo $this->_tpl_vars['_contact_with_us']; ?>
</h3>

        <form action="" method="POST" name="contact_feedback" id="contact_feedback" class="contact-form">
            <div class="fields">
                <label for="sender_name"><?php echo $this->_tpl_vars['_sender']; ?>
</label>
                <input type="text" class="text" name="sender_name" id="sender_name" />
                <label for="sender_email">E-mail:</label>
                <input id="sender_email" name="sender_email" class="text span4" type="text" />
                <label><?php echo $this->_tpl_vars['_message']; ?>
:</label>
                <input class="text span4"  type="text" name="letter_subject" id="letter_subject" />
            </div>

            <textarea  name="letter_text" id="letter_text" cols="30" rows="10" placeholder="" tabindex="4"></textarea>
            <input type="submit" class="button right" tabindex="5" value="<?php echo $this->_tpl_vars['_send']; ?>
" />
            <input type="checkbox" id="agree" style="display:none;" />
            <label for="antispam_answer" style="float:left; width:300px; margin-top:13px; margin-right:20px;"></label><input style="display: none;" class="text" style="width:331px; float:left;"  type="text" name = "antispam_answer" id="antispam_answer" />        </form>
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
                            required: "Type your email!",
                            email: "Email is incorect"
                        },
                        sender_name: {
                            required:"Type your name!"
                        },
                        letter_subject: {
                            required:"Type the subject!"
                        },
                        letter_text: {
                            required:"Type the message!"
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

</div>  </div>
  </div>





<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>