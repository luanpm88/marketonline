<?php /* Smarty version 2.6.27, created on 2014-03-12 11:10:22
         compiled from verytopmenu_study.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'get_cache', 'verytopmenu_study.html', 8, false),array('function', 'the_url', 'verytopmenu_study.html', 47, false),)), $this); ?>
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
	    
	    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/_settingbox.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	    
	</div>
        <?php else: ?>
        <a href="logging.php"><?php echo $this->_tpl_vars['_pls_login']; ?>
</a><a href="register.php?typename=Company"><?php echo $this->_tpl_vars['_register_now']; ?>
</a>
        <?php endif; ?>
        
    </div>
</div>
</div>