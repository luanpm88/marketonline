<?php /* Smarty version 2.6.27, created on 2014-08-21 12:25:07
         compiled from default/_footer_script.html */ ?>
<?php echo '
    <script>
	    $(document).ready(function() {
                
                //CART
                getCart();
                
                //INBOX ANNOUNCE
		'; ?>
<?php if ($this->_tpl_vars['pb_username'] != ""): ?><?php echo 'getInbox();'; ?>
<?php endif; ?><?php echo '
                var ann_count = 0;
		setInterval(function(){
			getAnnounce(ann_count);
			getInbox();ann_count++}, 300000);
                
                //load main category tree
                if($(\'.super-main-category\').length > 0) loadMainCategoryMenu();
                
                loadViewedHistory();
                
                //CHATTING
                '; ?>
<?php if ($this->_tpl_vars['pb_username'] != ""): ?><?php echo 'getTopChat();'; ?>
<?php endif; ?><?php echo '
                
                //chatboxs
		'; ?>

		    <?php if ($this->_tpl_vars['pb_username'] != ""): ?>
                        <?php echo '
                            setInterval(function(){ updateChatboxNew(); }, 15000);
                        '; ?>

                        
                        <?php $_from = $this->_tpl_vars['chatboxsnew']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['level']['iteration']++;
?>
                            <?php if ($this->_tpl_vars['item'] != ''): ?>
                                getChatboxNew("<?php echo $this->_tpl_vars['item']; ?>
", true);
                            <?php endif; ?>
                        <?php endforeach; endif; unset($_from); ?>
		    <?php endif; ?>
		<?php echo '                
                
                
                //get chat friend list
                '; ?>
<?php if ($this->_tpl_vars['pb_userinfo']['id']): ?>getChatFriendList(<?php echo $this->_tpl_vars['pb_userinfo']['id']; ?>
);<?php endif; ?><?php echo '
                '; ?>
<?php if ($this->_tpl_vars['pb_userinfo']['id']): ?>setInterval('getChatFriendList(<?php echo $this->_tpl_vars['pb_userinfo']['id']; ?>
);',60000);<?php endif; ?><?php echo '
                
                //COMPANY CLICK COUNT
                '; ?>
<?php if ($this->_tpl_vars['pb_company']['id']): ?>getNewClicked('<?php echo $this->_tpl_vars['pb_company']['id']; ?>
');<?php endif; ?><?php echo '
                
            });
    </script>
'; ?>