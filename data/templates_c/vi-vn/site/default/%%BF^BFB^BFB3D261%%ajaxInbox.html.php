<?php /* Smarty version 2.6.27, created on 2014-04-14 11:02:42
         compiled from default/product/ajaxInbox.html */ ?>
<div id="inboxhome">
<a class="but" href="javascript:void(0)"><?php echo $this->_tpl_vars['_inbox']; ?>
 </a><?php if ($this->_tpl_vars['Count']): ?><span class="outcount"><span class="inbox_counter"><?php echo $this->_tpl_vars['Count']; ?>
</span></span><?php endif; ?>


    <div id="quick_inbox_content" class="over_air_box">
        <div class="pointer"></div>
	<div class="announce_title">Hộp thư</div>
        <ul>
            <?php if (! $this->_tpl_vars['Items']): ?>
                <li style="text-align: center">Hiện chưa có thông tin nào</li>
            <?php endif; ?>
            <?php $_from = $this->_tpl_vars['Items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['level']['iteration']++;
?>
                <li <?php if (! $this->_tpl_vars['item']['status']): ?>class="unread"<?php endif; ?>>
                    <img src="<?php echo $this->_tpl_vars['item']['company_logo']; ?>
" />
                    <!--<p class="title"><?php echo $this->_tpl_vars['item']['title']; ?>
</p>-->
                    <p class="content"><?php echo $this->_tpl_vars['item']['content']; ?>
</p>
                    <p class="timeinbox"><?php echo $this->_tpl_vars['item']['created']; ?>
</p>
                </li>
            <?php endforeach; endif; unset($_from); ?>
        </ul>
        <a class="inbox_more inbox_close" href="javascript:void(0)">X <?php echo $this->_tpl_vars['_close']; ?>
</a> <a class="inbox_more" href="javascript:void(0)">|</a>
        <a class="inbox_more" href="<?php echo $this->_tpl_vars['SiteUrl']; ?>
virtual-office/pms.php"><?php echo $this->_tpl_vars['_read_more']; ?>
</a>
    </div>
</div>
<?php echo '
<script>
    
    
    
$(\'#verytopmenu #quick_inbox_content ul li img\').resizecrop({
		   width:40,
		   height:40
		 });

//$("#quick_inbox_content ul").mCustomScrollbar({
//						autoHideScrollbar:true,
//						theme:"light-thin",
//						scrollSpeed: 40
//					});
                 
$(\'#quick_inbox_content\').css("display","none");
$(\'#quick_inbox_content\').css("visibility","visible");
$("#inboxhome a.but").click(function(e){
                    $(\'.over_air_box\').css("display","none");
		    $(\'#quick_inbox_content\').toggle();
                    e.stopPropagation();
                    clearInbox();
		});
$(".inbox_close").click(function(){
		    $(\'#quick_inbox_content\').css("display","none");
                    getInbox();
		});


                
</script>
'; ?>
