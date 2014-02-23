<?php /* Smarty version 2.6.27, created on 2013-06-01 09:19:11
         compiled from default/topmenu_iframe.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'get_cache', 'default/topmenu_iframe.html', 5, false),)), $this); ?>
<div id="verytopmenu">
    <div class="left">
	<a class="homex" href="<?php echo $this->_tpl_vars['SiteUrl']; ?>
" target="_blank" style="margin-left: 2px;">.</a>
        <!--<a href="<?php echo $this->_tpl_vars['SiteUrl']; ?>
" target="_blank" class="home"><?php echo $this->_tpl_vars['_home_page']; ?>
</a>--><a href="javascript:void(0)"><?php echo $this->_tpl_vars['_help']; ?>
</a><a href="contact.php"><?php echo $this->_tpl_vars['_contact']; ?>
</a>
	<p id="f_language_bar"><?php echo smarty_function_get_cache(array('name' => 'language','image' => 'y','sep' => "&nbsp;",'echo' => 'y'), $this);?>
</p>
    </div>
    <div class="right">
        <div id="topCart" class="cart"><a class="cart_link" href="javascript:void(0)"><?php echo $this->_tpl_vars['_cart']; ?>
</a></div>
        
        
       
	
        <?php if ($this->_tpl_vars['pb_username'] != ""): ?>
        <a href="javascript:void(0)" class="message"><?php echo $this->_tpl_vars['_inbox']; ?>
</a>
	
        
	
	<div id="settingouter" style="float:right">
	    <a href="javascript:void(0)"><img src="<?php echo $this->_tpl_vars['theme_img_path']; ?>
image/usericon.jpg" width="20" height="20" /></a>
	    <a class="name" target="_blank" href="redirect.php?url=/virtual-office/"><?php echo $this->_tpl_vars['pb_username']; ?>
</a>
	    <a href="javascript:void(0)" class="setting"></a>
	    <div id="settingbox" style="display: none">
		<ul>
		    <li><a target="_blank" href="redirect.php?url=/virtual-office/"><?php echo $this->_tpl_vars['_my_office_room']; ?>
</a></li>
		    <li><a href="logging.php?action=logout"><?php echo $this->_tpl_vars['_login_out']; ?>
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