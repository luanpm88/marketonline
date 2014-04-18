<?php /* Smarty version 2.6.27, created on 2014-04-14 16:59:18
         compiled from default%5Cregister.done.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/header.html", 'smarty_include_vars' => array('page_title' => ($this->_tpl_vars['_register']))));
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
            
                        <p><?php echo $this->_tpl_vars['_member']; ?>
</p>
        </div>
        <h1 class="page-title">
                        <?php echo $this->_tpl_vars['_register']; ?>
                </h1>


    </div>
</div>




<div class="row res_box res_done_box">
   <!-- <h2><?php echo $this->_tpl_vars['_pls_click_the_link_to_active_first']; ?>
 '<?php echo $this->_tpl_vars['username']; ?>
' <?php echo $this->_tpl_vars['_pls_click_the_link_to_active_last']; ?>
</h2>-->
   <h2>Xác nhận địa chỉ email của bạn</h2>
<div class="success_box">
<?php if ($this->_tpl_vars['result'] === true): ?>
		 <h2 class="member_level"><?php echo $this->_tpl_vars['_welcome_join']; ?>
 <?php echo $this->_tpl_vars['_G']['site_name']; ?>
</h2>
		 <!--<p><?php echo $this->_tpl_vars['_ps_register_done']; ?>
</p>-->
		 <p class="member_room"><?php echo $this->_tpl_vars['_you_continue_next']; ?>
 <a href="virtual-office/" ><span><?php echo $this->_tpl_vars['_into_office_room']; ?>
</span></a> / <a href="<?php echo $this->_tpl_vars['SiteUrl']; ?>
"><span><?php echo $this->_tpl_vars['_back_index']; ?>
</span></a></p>
		 
		 
		 <div class="row">
		    
		    

		    
		    
		    
    <div class="steps">
	<div>
	    <h2><a href="virtual-office/personal.php"><?php echo $this->_tpl_vars['_complete_pro_date']; ?>
</a></h2>
	</div>
	<div>
	    <h2><a href="virtual-office/company.php"><?php echo $this->_tpl_vars['_added_comany_info']; ?>
</a></h2>
	</div>
    </div>
</div>
		 
		 <!--<p> <b><?php echo $this->_tpl_vars['_complete_pro_date']; ?>
</b></p>
		 <p><?php echo $this->_tpl_vars['_need_complete_pro_date']; ?>
 <a href="virtual-office/personal.php" style="text-decoration:underline" target="_blank"><?php echo $this->_tpl_vars['_click_here_add']; ?>
</a></p>-->
		 <?php if ($this->_tpl_vars['is_company']): ?>
		 
		 
		 <!--<p><b><?php echo $this->_tpl_vars['_added_comany_info']; ?>
</b></p>
		 <p> <?php echo $this->_tpl_vars['_open_company_website']; ?>
 <a href="virtual-office/company.php" style="text-decoration:underline" target="_blank"><?php echo $this->_tpl_vars['_click_perfect']; ?>
</a></p>-->
		 
		 
		 <?php endif; ?>
		 <?php else: ?>
			<!--<h4><?php echo $this->_tpl_vars['RegTips']; ?>
</h4>-->
			<h4>Chúng tôi đã gửi email kích hoạt tài khoản "<strong><?php echo $this->_tpl_vars['username']; ?>
</strong>" qua <strong><?php echo $_GET['em']; ?>
</strong>.
			<br >Vui lòng kiểm tra và nhấn vào liên kết kích hoạt tài khoản trong email.
			<br /><br />(Lưu ý: kiểm tra cả mục inbox và spam)</h4>

			
			
			
			
		 <?php endif; ?>
</div>
			<div class="reg_foot">
			    <a class="resend" href="index.php?do=member&action=reactive&em=<?php echo $_GET['em']; ?>
">Gửi lại email xác nhận.</a>
			    <a class="gomail" href="<?php echo $this->_tpl_vars['gomail']; ?>
" target="_blank" rel="nofollow">Tới email của bạn</a>
			<div>


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
