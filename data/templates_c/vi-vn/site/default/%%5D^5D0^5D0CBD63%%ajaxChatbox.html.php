<?php /* Smarty version 2.6.27, created on 2014-03-17 08:36:39
         compiled from default/product/ajaxChatbox.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'default/product/ajaxChatbox.html', 6, false),)), $this); ?>
<div class="chat-outer">
    <div class="chat-box" id="chat-box-<?php echo $this->_tpl_vars['member']['id']; ?>
" rel="<?php echo $this->_tpl_vars['member']['id']; ?>
" member-type="<?php echo $_GET['membertypeid']; ?>
">
	<div class="chat-title">
	    <span class="chat-close-but">x</span>
	    <span class="chat-min-but">-</span>
	    <h2><a rel="<?php echo smarty_function_the_url(array('module' => 'space','userid' => ($this->_tpl_vars['member']['space_name'])), $this);?>
" href="javascript:void(0)" class="<?php if ($this->_tpl_vars['member']['online']): ?>online<?php endif; ?>"><?php echo $this->_tpl_vars['chattitle']; ?>
</a></h2>
	</div>
	<div class="chat-content">
	    <div class="chat-list">
		<ul>
		    <li class="chatloading"></li>
		</ul>
		<div class="notification"></div>
	    </div>	    
	</div>
	<div class="chat-form">
	    <textarea class="post-content" name="chat[content]"></textarea>
	</div>
    </div>
</div>