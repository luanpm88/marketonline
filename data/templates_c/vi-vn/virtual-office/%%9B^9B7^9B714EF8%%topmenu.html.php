<?php /* Smarty version 2.6.27, created on 2014-07-04 10:35:06
         compiled from topmenu.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'topmenu.html', 37, false),)), $this); ?>
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
	    
	    
	    <?php if ($this->_tpl_vars['COMPANYINFO']['name']): ?>
		<a class="name" href="<?php echo $this->_tpl_vars['COMPANYINFO']['space_url']; ?>
">
		   <?php echo $this->_tpl_vars['COMPANYINFO']['shop_name']; ?>

		</a>	    
	    <?php else: ?>
		<a class="name" href="../redirect.php?url=/virtual-office/">
		   <?php if ($this->_tpl_vars['pb_userinfo']['first_name']): ?><?php echo $this->_tpl_vars['pb_userinfo']['first_name']; ?>
 <?php echo $this->_tpl_vars['pb_userinfo']['last_name']; ?>
<?php else: ?><?php echo $this->_tpl_vars['pb_userinfo']['username']; ?>
<?php endif; ?>
	    </a>
	    <?php endif; ?>
	    
	    
	    <?php if ($this->_tpl_vars['showEmployeeShop'] && $this->_tpl_vars['membertype_id'] != 5): ?>
		<a target="_blank" href="<?php echo smarty_function_the_url(array('module' => 'connect'), $this);?>
"><img style="margin-bottom: -6px" src="../templates/default/image/connect.png" width="20" height="20" /></a>
		<a target="_blank" class="name" href="<?php echo smarty_function_the_url(array('module' => 'connect'), $this);?>
"><?php echo $this->_tpl_vars['_connect_title']; ?>
</a>
	    <?php endif; ?>
	    
	    <a href="javascript:void(0)" class="setting"><img style="margin-bottom: -6px" style="border: none" src="../templates/default/image/setting-icon_small.png" width="20" height="20" /></a>
	    <div id="settingbox" style="display: none">
		<ul>
		    
		    <?php if ($this->_tpl_vars['pb_userinfo']['membertype_id'] == 1 || $this->_tpl_vars['pb_userinfo']['membertype_id'] == 2 || $this->_tpl_vars['pb_userinfo']['membertype_id'] == 3): ?>
                        <?php if ($this->_tpl_vars['pb_company']): ?>
                            <li <?php if ($this->_tpl_vars['pb_userinfo']['current_type'] == 1 || $this->_tpl_vars['pb_userinfo']['current_type'] == 2 || $this->_tpl_vars['pb_userinfo']['current_type'] == 3): ?>class="active"<?php endif; ?>>
                                <a href="<?php echo smarty_function_the_url(array('module' => 'space','userid' => ($this->_tpl_vars['pb_company']['cache_spacename']),'change_current_type' => ($this->_tpl_vars['pb_userinfo']['membertype_id'])), $this);?>
">
                                    <?php echo $this->_tpl_vars['pb_company']['shop_name']; ?>

                                </a>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>
                    
		    <?php $_from = $this->_tpl_vars['pb_userinfo']['other_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['typeitem_0'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['typeitem_0']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['typeitemkey0'] => $this->_tpl_vars['typeitem']):
        $this->_foreach['typeitem_0']['iteration']++;
?>
			<?php if ($this->_tpl_vars['typeitem']['membertype_id'] == 6): ?>
                            <li <?php if ($this->_tpl_vars['pb_userinfo']['current_type'] == $this->_tpl_vars['typeitem']['membertype_id']): ?>class="active"<?php endif; ?>>                                
                                <a href="<?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'school','change_current_type' => ($this->_tpl_vars['typeitem']['membertype_id'])), $this);?>
">
                                    <?php echo $this->_tpl_vars['pb_userinfo']['first_name']; ?>
 <?php echo $this->_tpl_vars['pb_userinfo']['last_name']; ?>

                                </a>
                            </li>
                        <?php endif; ?>
		    <?php endforeach; endif; unset($_from); ?>
		    
		    <li><a href="../redirect.php?url=/virtual-office/"><?php echo $this->_tpl_vars['_my_office_room']; ?>
</a></li>
		    <li><a href="../logging.php?action=logout"><?php echo $this->_tpl_vars['_login_out']; ?>
</a></li>
		</ul>		
	    </div>	
	</div>
        <?php else: ?>
	    <a href="logging.php"><?php echo $this->_tpl_vars['_pls_login']; ?>
</a>
	    <?php if ($_GET['do'] == 'product' || $_GET['do'] == ""): ?>
		<a href="<?php echo smarty_function_the_url(array('module' => 'register'), $this);?>
"><?php echo $this->_tpl_vars['_register_now']; ?>
</a>	    
	    <?php endif; ?>
	    <?php if ($_GET['do'] == 'employee'): ?>
		<a href="<?php echo smarty_function_the_url(array('module' => 'register','typename' => 'Employee'), $this);?>
"><?php echo $this->_tpl_vars['_register_now']; ?>
</a>	    
	    <?php endif; ?>
	    <?php if ($_GET['do'] == 'job'): ?>
		<a href="<?php echo smarty_function_the_url(array('module' => 'register','typename' => 'Employer'), $this);?>
"><?php echo $this->_tpl_vars['_register_now']; ?>
</a>	    
	    <?php endif; ?>
	    <?php if ($_GET['do'] == 'studypost'): ?>
		<a href="<?php echo smarty_function_the_url(array('module' => 'register','typename' => 'Learner'), $this);?>
"><?php echo $this->_tpl_vars['_register_now']; ?>
</a>	    
	    <?php endif; ?>
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