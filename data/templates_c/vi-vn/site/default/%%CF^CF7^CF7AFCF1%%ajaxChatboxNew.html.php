<?php /* Smarty version 2.6.27, created on 2014-08-13 16:03:29
         compiled from default%5Cproduct/ajaxChatboxNew.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'default\\product/ajaxChatboxNew.html', 6, false),)), $this); ?>
<div class="chat-outer">
    <div class="chat-box" id="chat-box-<?php echo $this->_tpl_vars['chatid']; ?>
" rel="<?php echo $this->_tpl_vars['chatid']; ?>
">
	<div class="chat-title">
	    <span class="chat-close-but">x</span>
	    <span class="chat-min-but">-</span>
	    <h2><a rel="<?php if ($this->_tpl_vars['type_id'] == 6): ?><?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'memberpage','id' => ($this->_tpl_vars['member']['id']),'title' => ($this->_tpl_vars['member']['fullname'])), $this);?>
<?php else: ?><?php echo smarty_function_the_url(array('module' => 'space','userid' => ($this->_tpl_vars['member']['space_name'])), $this);?>
<?php endif; ?>" href="javascript:void(0)" class="<?php if ($this->_tpl_vars['member']['online']): ?>online<?php endif; ?>"><?php echo $this->_tpl_vars['chattitle']; ?>
</a></h2>
	</div>
	<div class="chat-content">
	    <div class="chat-list">
		<ul>
		    <li class="chatloading"></li>
		</ul>
		<div class="notification"></div>
		<div class="typing" style="display: none">		
		    <img width="40" height="40" src="<?php echo $this->_tpl_vars['member']['company_logo']; ?>
" class="avatar">
		    <span class="emotion">đang viết...</span>
		    <!--<?php echo $this->_tpl_vars['chattitle']; ?>
 đang viết...-->
		</div>
	    </div>
	    
	</div>
	<div class="chat-form">
	    <a class="emotion-box-but" href="javascript:void(0)">show</a>
	    <a class="chatimage-box-but" href="javascript:void(0)">image</a>
	    <textarea id="chatboxarea<?php echo $this->_tpl_vars['chatid']; ?>
" class="post-content" name="chat[content]"></textarea>
	    
	    
	    <div style="display: none" class="emotion-box emotion"> >:) :)) /:) <):) :)] :) :(( :( ;;) ;) >:D< :D :-SS #:-S :-? >:P :P (:| :| :-/ :-* =(( ~X( B-) :-S =)) O:-) :-B =; 8-| L-) :oo :-$ [-( :O) 8-}
<:-P :x =P~ #-o =D> @-) :^o :-w :-< :-O :> :-c X( :-h 8-> :bd o|^_^|o (y) </div>
	</div>
    </div>
</div>