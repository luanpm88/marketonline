<?php /* Smarty version 2.6.27, created on 2014-03-12 10:57:32
         compiled from verytopmenu_shop.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'get_cache', 'verytopmenu_shop.html', 5, false),array('function', 'the_url', 'verytopmenu_shop.html', 30, false),)), $this); ?>
<div id="verytopmenu">
    <div class="left">
        <a class="homex" href="<?php echo $this->_tpl_vars['SiteUrl']; ?>
" style="margin-left: -4px;">.</a>
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
	    
	    <a style="padding-left: 0;" class="name" href="<?php if ($this->_tpl_vars['pb_company']): ?><?php echo smarty_function_the_url(array('module' => 'space','userid' => ($this->_tpl_vars['pb_company']['cache_spacename'])), $this);?>
<?php else: ?>redirect.php?url=/virtual-office/<?php endif; ?>"><img class="avatar" src="<?php if ($this->_tpl_vars['pb_company']): ?><?php echo $this->_tpl_vars['pb_company']['image']; ?>
<?php else: ?>  <?php if ($this->_tpl_vars['user_avatar']): ?> <?php echo $this->_tpl_vars['user_avatar']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['theme_img_path']; ?>
image/usericon.jpg  <?php endif; ?> <?php endif; ?>" width="20" height="20" />&nbsp;<?php if ($this->_tpl_vars['pb_company']): ?><?php echo $this->_tpl_vars['pb_company']['shop_name']; ?>
<?php else: ?><?php echo $this->_tpl_vars['pb_username']; ?>
<?php endif; ?></a>
	    <?php if ($this->_tpl_vars['pb_company']): ?><a class="staticon" style="padding-left: 0" class="name" href="javascript:void(0)"><img class="avatar" src="<?php echo $this->_tpl_vars['theme_img_path']; ?>
image/stat.png" width="20" height="20" /></a><?php endif; ?>
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
	    
	    <a style="padding-left: 0" class="name" href="<?php echo smarty_function_the_url(array('module' => 'connect'), $this);?>
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