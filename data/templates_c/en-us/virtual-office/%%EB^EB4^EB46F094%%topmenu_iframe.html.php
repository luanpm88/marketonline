<?php /* Smarty version 2.6.27, created on 2013-06-18 06:43:21
         compiled from ../default/topmenu_iframe.html */ ?>
<div id="verytopmenu">
    <div class="left">
	<a class="homex" href="<?php echo $this->_tpl_vars['SiteUrl']; ?>
" target="_blank" style="margin-left: 2px;">.</a>
        <!--<a href="<?php echo $this->_tpl_vars['SiteUrl']; ?>
" target="_blank" class="home"><?php echo $this->_tpl_vars['_home_page']; ?>
</a>--><a href="javascript:void(0)"><?php echo $this->_tpl_vars['_help']; ?>
</a><a href="contact.php"><?php echo $this->_tpl_vars['_contact']; ?>
</a>
	<p id="f_language_bar"><a title="English" href="../redirect.php?url=virtual-office/index.php&amp;app_lang=en-us"><img alt="English" src="../languages/en-us/icon.gif"></a>&nbsp;<a title="Vietnam" href="../redirect.php?url=virtual-office/index.php&amp;app_lang=vi-vn"><img alt="Vietnam" src="../languages/vi-vn/icon.gif"></a>&nbsp;</p>
    </div>
    <div class="right">
        <div id="topCart" class="cart"><a class="cart_link" target="_blank" href="../index.php?do=product&action=add_cart"><?php echo $this->_tpl_vars['_cart']; ?>
</a></div>
        
        
       
	
        <?php if ($this->_tpl_vars['pb_username'] != ""): ?>
        <div id="inbox_out" class="messagez">
	    <a href="javascript:void(0)"><?php echo $this->_tpl_vars['_inbox']; ?>
</a>
	</div>
	
        
	
	<div id="settingouter" style="float:right">
	    <a target="_blank" href="javascript:void(0)"><img class="avatar" src="<?php if ($this->_tpl_vars['COMPANYINFO']['name']): ?>../<?php echo $this->_tpl_vars['COMPANYINFO']['logo']; ?>
<?php else: ?>../templates/default/image/usericon.jpg<?php endif; ?>" width="20" height="20" /></a>
	    <a class="name" target="_blank" href="<?php if ($this->_tpl_vars['COMPANYINFO']['name']): ?><?php echo $this->_tpl_vars['COMPANYINFO']['space_url']; ?>
<?php else: ?>../redirect.php?url=/virtual-office/<?php endif; ?>"><?php if ($this->_tpl_vars['COMPANYINFO']['name']): ?><?php echo $this->_tpl_vars['COMPANYINFO']['name']; ?>
<?php else: ?><?php echo $this->_tpl_vars['pb_username']; ?>
<?php endif; ?></a>
	    <a target="_blank" href="../index.php?do=product&action=connect"><img src="../templates/default/image/connect.png" width="20" height="20" /></a>
	    <a target="_blank" class="name" href="../index.php?do=product&action=connect"><?php echo $this->_tpl_vars['_connect_title']; ?>
</a>
	    <a href="javascript:void(0)" class="setting"><img style="border: none" src="../templates/default/image/setting-icon_small.png" width="20" height="20" /></a>
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