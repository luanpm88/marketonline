<?php /* Smarty version 2.6.27, created on 2014-03-31 10:23:15
         compiled from topmenu_study.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'topmenu_study.html', 24, false),)), $this); ?>
<div id="topmenu_outer">
<div id="verytopmenu" style="padding-left:9px; height: 27px; margin-top: 9px;width: 1170px;">
    <div class="left">
	<a class="homex" href="<?php echo $this->_tpl_vars['SiteUrl']; ?>
" target="_blank" style="margin-left: -8px;">.</a>
        <!--<a href="<?php echo $this->_tpl_vars['SiteUrl']; ?>
" target="_blank" class="home"><?php echo $this->_tpl_vars['_home_page']; ?>
</a>--><a target="_blank" href="../contact.php"><?php echo $this->_tpl_vars['_contact_help']; ?>
</a>
	<!--<p id="f_language_bar"><a title="English" href="../redirect.php?url=virtual-office/index.php&amp;app_lang=en-us"><img alt="English" src="../languages/en-us/icon.gif"></a>&nbsp;<a title="Vietnam" href="../redirect.php?url=virtual-office/index.php&amp;app_lang=vi-vn"><img alt="Vietnam" src="../languages/vi-vn/icon.gif"></a>&nbsp;</p>-->
    </div>
    <div class="right">
        <div id="topCart" class="cart"><a class="cart_link" target="_blank" href="../index.php?do=product&action=add_cart"></a></div>
        
        
       
	
        <?php if ($this->_tpl_vars['pb_username'] != ""): ?>
        <div id="inbox_out" class="messagez">
	    <a href="pms.php"><?php echo $this->_tpl_vars['_inbox']; ?>
</a>
	</div>
	
        
	
	<div id="settingouter" style="float:right">
	    <a href="../redirect.php?url=/virtual-office/"><img class="avatar" src="<?php if ($this->_tpl_vars['COMPANYINFO']['name']): ?>../<?php echo $this->_tpl_vars['COMPANYINFO']['logo']; ?>
<?php else: ?><?php if ($this->_tpl_vars['user_avatar']): ?> ../<?php echo $this->_tpl_vars['user_avatar']; ?>
 <?php else: ?> ../templates/default/image/usericon.jpg  <?php endif; ?><?php endif; ?>" width="20" height="20" /></a>
	    
	    <a class="name" target="_blank" href="<?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'memberpage','id' => ($this->_tpl_vars['pb_userinfo']['id'])), $this);?>
">
		   <?php if ($this->_tpl_vars['pb_userinfo']['first_name']): ?><?php echo $this->_tpl_vars['pb_userinfo']['first_name']; ?>
 <?php echo $this->_tpl_vars['pb_userinfo']['last_name']; ?>
<?php else: ?><?php echo $this->_tpl_vars['pb_userinfo']['username']; ?>
<?php endif; ?>
	    </a>
	    	    
	    <a target="_blank" href="<?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'school'), $this);?>
"><img style="margin-bottom: -6px" src="../templates/default/image/connect.png" width="20" height="20" /></a>
	    <a target="_blank" class="name" href="<?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'school'), $this);?>
"><?php echo $this->_tpl_vars['_connect_title']; ?>
</a>
	    
	    <a href="javascript:void(0)" class="setting"><img style="margin-bottom: -6px" style="border: none" src="../templates/default/image/setting-icon_small.png" width="20" height="20" /></a>
	    <div id="settingbox" style="display: none">
		<ul>
		    <li><a href="../redirect.php?url=/virtual-office/"><?php echo $this->_tpl_vars['_my_office_room']; ?>
</a></li>
		    <li><a href="../logging.php?action=logout"><?php echo $this->_tpl_vars['_login_out']; ?>
</a></li>
		</ul>		
	    </div>	
	</div>
        <?php else: ?>
        <a href="logging.php"><?php echo $this->_tpl_vars['_pls_login']; ?>
</a><a href="register.php?typename=Company"><?php echo $this->_tpl_vars['_register_now']; ?>
</a>
        <?php endif; ?>
        
    </div>
</div>
</div>



<?php echo '
<script type="text/javascript">
                jQuery(document).ready(function() {
		    $(\'#settingouter\').hover(
			function () {
			    //$(\'#settingbox\').fadeIn();
			}
			,
			function () {
			    $(\'#settingbox\').fadeOut();
			}
		    );
		    $(\'#settingouter a.setting\').click(function(){$(\'#settingbox\').toggle()});	    
		    
		});
</script>
'; ?>