<?php /* Smarty version 2.6.27, created on 2014-01-21 08:01:11
         compiled from contact.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array('PageTitle' => ($this->_tpl_vars['_contact_us']),'cur' => 'space_index')));
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
$this->_smarty_include(array('smarty_include_tpl_file' => "topmenu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<div class="row widget space_content">


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "leftbar.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>



<div class="eleven columns contact_content" id="content">



                
                
<div class="columns logo logoz"><a href="<?php echo $this->_tpl_vars['Menus']['index']; ?>
"><img src="<?php echo $this->_tpl_vars['COMPANY']['logo']; ?>
"></a></div>
                
		<div class="text left_com_info">
			<h3><?php echo $this->_tpl_vars['COMPANY']['name']; ?>
</h3>
			<p><label><?php echo $this->_tpl_vars['_address']; ?>
</label> <?php echo $this->_tpl_vars['COMPANY']['address']; ?>
</p>
			<?php if ($this->_tpl_vars['COMPANY']['tel']): ?><p><label><?php echo $this->_tpl_vars['_phone']; ?>
</label> <?php echo $this->_tpl_vars['COMPANY']['tel']; ?>
</p><?php endif; ?>
			<?php if ($this->_tpl_vars['COMPANY']['fax']): ?><p><label><?php echo $this->_tpl_vars['_fax']; ?>
</label> <?php echo $this->_tpl_vars['COMPANY']['fax']; ?>
</p><?php endif; ?>
			<?php if ($this->_tpl_vars['COMPANY']['email']): ?><p><label><?php echo $this->_tpl_vars['_email']; ?>
</label> <?php echo $this->_tpl_vars['COMPANY']['email']; ?>
</p><?php endif; ?>
			<?php if ($this->_tpl_vars['COMPANY']['site_url']): ?><p><label><?php echo $this->_tpl_vars['_company_home']; ?>
</label> <a rel="nofollow" target="_blank" href="http://<?php echo $this->_tpl_vars['COMPANY']['site_url_name']; ?>
"><?php echo $this->_tpl_vars['COMPANY']['site_url_name']; ?>
</a></p><?php endif; ?>			
		</div>
              
              
	    
	    <br style="clear: both">
		<span style="color: green"><?php if ($this->_tpl_vars['amessage']): ?><?php echo $this->_tpl_vars['_thanks_email']; ?>
<?php endif; ?></span>
<div class="fifteen columns" style="padding-left: 0; padding-right: 0"><div style="margin-bottom: 15px;" class="line"> </div></div>


<br style="clear: both">
    
    

    <div class="ten columns" style="width: 100%; padding: 0">
	
<div class="space_contact_box">
	
	<div class="space_contact_left">
	    <h3><?php echo $this->_tpl_vars['_support_info']; ?>
</h3>

	    <div style="padding-left: 80px">
	    <p>
		<span style="">
		    <label style="">Liên hệ</label> <?php echo $this->_tpl_vars['COMPANY']['link_man']; ?>

		</span>
	    </p>
	    <p>
		<span style="">
		    <label style=""><?php echo $this->_tpl_vars['_hotline']; ?>
</label> <?php echo $this->_tpl_vars['COMPANY']['contact_mobile']; ?>

		</span>
	    </p>
	    <p>
		<label><?php echo $this->_tpl_vars['_email']; ?>
</label>
		<a title="Liên hệ với chúng tôi qua email" onclick="" href="mailto:<?php echo $this->_tpl_vars['COMPANY']['contact_email']; ?>
" rel="noreferrer"><?php echo $this->_tpl_vars['COMPANY']['contact_email']; ?>
</a>
	    </p>
	    <?php if ($this->_tpl_vars['COMPANY']['facebookz']): ?>
		<p>
		    <label>Facebook</label>
		    <a title="Liên hệ với chúng tôi qua facebook" rel="nofollow" target="_blank" onclick="" href="https://<?php echo $this->_tpl_vars['COMPANY']['facebook']; ?>
" rel="noreferrer"><?php echo $this->_tpl_vars['COMPANY']['facebook']; ?>
</a>
		</p>
	    <?php endif; ?>
	    </div>
	</div>
	
	<div class="space_contact_right">
		<h3 style="padding-left: 0"><?php echo $this->_tpl_vars['_contact']; ?>
</h3>

	     <form action="" method="POST" name="contact_feedback" id="contact_feedback" class="contact-form">
		
		<div class="four columns logging contact_box">
		
		 <div class="fields">
		     <label for="sender_name"><?php echo $this->_tpl_vars['_sender']; ?>
</label>
		     <input class="text" name="sender_name" id="sender_name" type="text">
		     <label for="sender_email"><?php echo $this->_tpl_vars['_sender_email']; ?>
</label>
		     <input id="sender_email" name="sender_email" class="text span4" type="text">
		     <label><?php echo $this->_tpl_vars['_subject']; ?>
</label>
		     <input class="text span4" name="letter_subject" id="letter_subject" type="text">
			<label><?php echo $this->_tpl_vars['_message']; ?>
</label>
			<textarea style="min-height: 158px;max-width:430px; width:430px;" name="letter_text" id="letter_text" cols="40" rows="10" placeholder="" tabindex="4"></textarea>
		 </div>
		</div>
		 
		 <input style="clear:both" class="button right" tabindex="5" value="<?php echo $this->_tpl_vars['_send_contact_email']; ?>
" type="submit">
		 <input id="agree" style="display:none;" type="checkbox">
		 <label for="antispam_answer" style="float:left; width:300px; margin-top:0px; margin-right:20px;"></label><input style="display: none;" class="text" name="antispam_answer" id="antispam_answer" type="text">
	     </form>
     
	</div>
	
	<br style="clear: both">
	
</div>	
	
	<h3 style="padding-left: 0;margin-top: 0px;margin-bottom: 10px;"><?php echo $this->_tpl_vars['_map']; ?>
</h3>
              
	      <div id="map" style="width: 100%; height: 600px;margin-top: 10px; "></div>
	      
	      
	      <?php echo '
            <script type="text/javascript">
        jQuery(document).ready(function () {
          jQuery("#map").gmap3(
              { action:\'addMarker\',
                address:"'; ?>
<?php echo $this->_tpl_vars['COMPANY']['address']; ?>
<?php echo '",
                map:{
                  center:true,
                  zoom:14,
                  scrollwheel: false
                }})
        });
      </script>
        
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
                            required: "",
                            email: ""
                        },
                        sender_name: {
                            required:""
                        },
                        letter_subject: {
                            required:""
                        },
                        letter_text: {
                            required:""
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



</div>



</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>












