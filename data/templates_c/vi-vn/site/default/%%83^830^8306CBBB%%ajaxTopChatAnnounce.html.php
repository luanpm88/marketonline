<?php /* Smarty version 2.6.27, created on 2014-04-19 11:22:41
         compiled from default/product/ajaxTopChatAnnounce.html */ ?>
<div id="messagehome">

<a class="but" href="javascript:void(0)"><?php echo $this->_tpl_vars['_inbox']; ?>
 </a><?php if ($this->_tpl_vars['Count']): ?><span class="outcount"><span class="message_counter"><?php echo $this->_tpl_vars['Count']; ?>
</span></span><?php endif; ?>


    <div id="quick_message_content" class="over_air_box">
	<div class="pointer"></div>
	<div class="announce_title">Tin nhắn</div>
        <ul>
            <?php if (! $this->_tpl_vars['Items']): ?>
                <li style="text-align: center"><?php echo $this->_tpl_vars['_no_message']; ?>
</li>
            <?php endif; ?>
            <?php $_from = $this->_tpl_vars['Items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['level']['iteration']++;
?>
		<?php if (! $this->_tpl_vars['item']['hide']): ?>
		    <li onclick="getChatboxNew('<?php echo $this->_tpl_vars['item']['chatid']; ?>
x<?php echo $this->_tpl_vars['item']['membertype_id']; ?>
', false);" <?php if (! $this->_tpl_vars['item']['read']): ?>class="unread" read="0"<?php endif; ?> chat-id="<?php echo $this->_tpl_vars['item']['id']; ?>
" mem="<?php echo $this->_tpl_vars['item']['chatid']; ?>
">
			<img src="<?php echo $this->_tpl_vars['item']['company_logo']; ?>
" />
			<p class="title"><?php echo $this->_tpl_vars['item']['name']; ?>
</p>
			<p class="content"><?php echo $this->_tpl_vars['item']['content']; ?>
</p>
			<p class="timeinbox"><?php echo $this->_tpl_vars['item']['created']; ?>
</p>
		    </li>
		<?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
        </ul>
        <a class="inbox_more message_close" href="javascript:void(0)">X <?php echo $this->_tpl_vars['_close']; ?>
</a>
<!--      <a class="inbox_more" href="javascript:void(0)">|</a>   <a class="inbox_more" href="<?php echo $this->_tpl_vars['SiteUrl']; ?>
virtual-office/pms.php"><?php echo $this->_tpl_vars['_read_more']; ?>
</a>-->
    </div>
</div>
<?php echo '
<script>
    
//$("#quick_message_content ul").mCustomScrollbar({
//						autoHideScrollbar:true,
//						theme:"light-thin",
//						scrollSpeed: 40
//					});
$(\'#quick_message_content\').css("display","none");
$(\'#quick_message_content\').css("visibility","visible");
$("#messagehome a.but").click(function(e){
		    $(\'.over_air_box\').css("display","none");
		    $(\'#quick_message_content\').toggle();
                    e.stopPropagation();
		    updateReadTopChat();
		});
$("#messagehome .message_close").click(function(){
		    $(\'#quick_message_content\').css("display","none");
		});
                
</script>
'; ?>
