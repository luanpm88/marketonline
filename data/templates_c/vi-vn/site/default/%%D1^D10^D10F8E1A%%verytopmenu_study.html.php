<?php /* Smarty version 2.6.27, created on 2014-03-11 16:43:26
         compiled from default/verytopmenu_study.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'get_cache', 'default/verytopmenu_study.html', 8, false),array('function', 'the_url', 'default/verytopmenu_study.html', 47, false),)), $this); ?>
<div id="topmenu_outer">
<div id="verytopmenu">
    <div class="left">
	<a class="homex" href="<?php echo $this->_tpl_vars['SiteUrl']; ?>
" style="margin-left: -4px;">.</a>
        <!--<a href="<?php echo $this->_tpl_vars['SiteUrl']; ?>
" class="home"><?php echo $this->_tpl_vars['_home_page']; ?>
</a>-->
	<!--<a href="javascript:void(0)"><?php echo $this->_tpl_vars['_help']; ?>
</a>-->
	<a class="top_contact_help" href="contact.php"><?php echo $this->_tpl_vars['_contact_help']; ?>
</a>
	<p id="f_language_bar"><?php echo smarty_function_get_cache(array('name' => 'language','image' => 'y','sep' => "&nbsp;",'echo' => 'y'), $this);?>
</p>
	
	<div id="TopSearch">
	    <input type="text" placeholder="<?php echo $this->_tpl_vars['_search_shop']; ?>
" />
	    <div class="search_result">
		
		<ul><li><h2><a></a></h2><p></p></li></ul>
	    </div>
	    <span class="right-search-icon">search</span>
	</div>
    </div>
    <div class="right">
        <div id="topCart" class="cart"><a class="cart_link" href="javascript:void(0)"></a></div>
        
        
	
	
        <?php if ($this->_tpl_vars['pb_username'] != ""): ?>
	
	
	
	<div id="settingouter" style="float:right">
	    <!--<a href="<?php if ($this->_tpl_vars['pb_company']): ?>space/?userid=<?php echo $this->_tpl_vars['pb_username']; ?>
&do=<?php else: ?>redirect.php?url=/virtual-office/<?php endif; ?>"></a>-->
	    <a style="padding-left: 0; margin-right: 10px" class="name" href="redirect.php?url=/virtual-office/">
		<img class="avatar" src="<?php if ($this->_tpl_vars['user_avatar']): ?> <?php echo $this->_tpl_vars['user_avatar']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['theme_img_path']; ?>
image/usericon.jpg  <?php endif; ?>" width="20" height="20" />
		<?php if ($this->_tpl_vars['pb_userinfo']['first_name']): ?><?php echo $this->_tpl_vars['pb_userinfo']['first_name']; ?>
 <?php echo $this->_tpl_vars['pb_userinfo']['last_name']; ?>
<?php else: ?><?php echo $this->_tpl_vars['pb_userinfo']['username']; ?>
<?php endif; ?>
	    </a>

	    <div id="message_out" class="message">
		<div id="messagehome">
		    <a class="but" href="javascript:void(0)"><?php echo $this->_tpl_vars['_message']; ?>
 </a>
		</div>
	    </div>
	    <div id="inbox_out" class="message">
		<div id="inboxhome">
		    <a class="but" href="javascript:void(0)"><?php echo $this->_tpl_vars['_inbox']; ?>
 </a>
		</div>
	    </div>
	    
	    <a style="padding-left: 0" class="name" href="<?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'school'), $this);?>
"><img src="<?php echo $this->_tpl_vars['theme_img_path']; ?>
image/connect.png" width="20" height="20" />&nbsp;<?php echo $this->_tpl_vars['_connect_title']; ?>
</a>
	    
	    <a href="javascript:void(0)" class="setting"><img style="border: none" src="templates/default/image/setting-icon_small_w.png" width="20" height="20" /></a>
	    <div id="settingbox" style="display: none">
		<ul>
		    <li><a target="_blank" href="redirect.php?url=/virtual-office/"><?php echo $this->_tpl_vars['_my_office_room']; ?>
</a></li>
		    <li><a href="logging.php?action=logout"><?php echo $this->_tpl_vars['_login_out']; ?>
</a></li>
		</ul>
		<span class="pointer_topmenu">.</span>
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
			    //$(\'#settingbox\').fadeOut();
			}
		    );
		    $(\'body\').click(function(){$(\'#settingbox\').fadeOut()});	
		    $(\'#settingouter a.setting\').click(function(e){$(\'#settingbox\').toggle();e.stopPropagation();});
		    
		    $(\'body\').click(function(){if($(\'.clicked_note_box\').css(\'display\') == \'block\') $(\'.clicked_note_box\').fadeOut("slow", refreshClickedCompany(\''; ?>
<?php echo $this->_tpl_vars['pb_company']['id']; ?>
<?php echo '\'))});	
		    $(\'.staticon\').click(function(e){$(\'.over_air_box\').css("display","none");$(\'.clicked_note_box\').toggle();e.stopPropagation();});
		    
		    
		    
		});
</script>
'; ?>