<?php /* Smarty version 2.6.27, created on 2014-08-13 15:47:58
         compiled from footer.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'mailto', 'footer.html', 7, false),array('modifier', 'pl', 'footer.html', 9, false),)), $this); ?>
<div class="h30"></div>
</div>
</div>
<div id="footer_bkg">
   <div id="base_page_footer">
  <div class="footer_content">
   <p><?php echo $this->_tpl_vars['_G']['site_name']; ?>
 - <?php echo $this->_tpl_vars['_have_problem_send_email']; ?>
<?php echo smarty_function_mailto(array('text' => ($this->_tpl_vars['service_email']),'address' => ($this->_tpl_vars['service_email']),'encode' => 'javascript'), $this);?>
</p> 
   <p><?php echo $this->_tpl_vars['_customer_hotline']; ?>
<?php echo $this->_tpl_vars['service_tel']; ?>
 - <?php echo $this->_tpl_vars['_phone']; ?>
: <?php echo $this->_tpl_vars['sale_tel']; ?>
</p>
   <?php if ($this->_tpl_vars['company_name']): ?><p>Copyright &copy; <?php echo $this->_tpl_vars['_G']['site_name']; ?>
. All rights reserved. <?php echo ((is_array($_tmp=$this->_tpl_vars['_G']['company_name'])) ? $this->_run_mod_handler('pl', true, $_tmp) : smarty_modifier_pl($_tmp)); ?>
 <?php echo $this->_tpl_vars['_copyright']; ?>
</p><?php endif; ?>
</div>
</div>
</div>

<?php echo '
<script type="text/javascript">
  (function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,\'script\',\'//www.google-analytics.com/analytics.js\',\'ga\');
  
  ga(\'create\', \'UA-42562780-1\', \'marketonline.vn\');
  ga(\'send\', \'pageview\');

$(document).ready(function() {

		

	       $(\'#dataIndustry select\').each(function( index ) {
		  changeIndustry(this);
		  //getCustomIndustriesByParent($(this).val(), $(this).attr("rel"));
		//alert($(this).children().length);
		if($(this).children().length == 1)
		     {
		       $(this).addClass(\'lock\');
		     }
		     else
		     {
		      $(this).removeClass(\'lock\');
		     }
		 });
		 
		 $(\'#dataIndustry select\').change(function( index ) {
			changeIndustry(this);
			if ($(this).val() == 0 && $(this).attr("rel") != 1) {
			   getCustomIndustriesByParent($(this).prev().val(), $(this).prev().attr("rel"));
			}
			else
			{
			   getCustomIndustriesByParent($(this).val(), $(this).attr("rel"));
			}
			   
                        $(\'#dataIndustry select\').each(function( index ) {
                        //alert($(this).children().length);
                           if($(this).children().length == 1)
                           {
                             $(this).addClass(\'lock\');
                           }
                           else
                           {
                            $(this).removeClass(\'lock\');
                           }
                       });
		 });
                 
                 
                 $(\'#dataArea select\').each(function( index ) {
		//alert($(this).children().length);
		if($(this).children().length == 1)
		     {
		       $(this).addClass(\'lock\');
		     }
		     else
		     {
		      $(this).removeClass(\'lock\');
		     }
		 });
		 
		 $(\'#dataArea select\').change(function( index ) {
                        $(\'#dataArea select\').each(function( index ) {
                        //alert($(this).children().length);
                           if($(this).children().length == 1)
                           {
                             $(this).addClass(\'lock\');
                           }
                           else
                           {
                            $(this).removeClass(\'lock\');
                           }
                       });
		 });
		 
		 $(\'#dataSchoolArea select\').each(function( index ) {
		//alert($(this).children().length);
		if($(this).children().length == 1)
		     {
		       $(this).addClass(\'lock\');
		     }
		     else
		     {
		      $(this).removeClass(\'lock\');
		     }
		 });
		 
		 $(\'#dataSchoolArea select\').change(function( index ) {
                        $(\'#dataSchoolArea select\').each(function( index ) {
                        //alert($(this).children().length);
                           if($(this).children().length == 1)
                           {
                             $(this).addClass(\'lock\');
                           }
                           else
                           {
                            $(this).removeClass(\'lock\');
                           }
                       });
		 });

		$("#add_new_brand_but").fancybox({
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


<link rel="stylesheet" href="../templates/default/js/fancybox/jquery.fancybox.css">
<script type='text/javascript' src='../templates/default/js/fancybox/jquery.fancybox.js'></script>



</body>
</html>