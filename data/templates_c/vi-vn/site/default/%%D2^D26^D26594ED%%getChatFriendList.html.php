<?php /* Smarty version 2.6.27, created on 2014-04-14 15:46:52
         compiled from default%5Cstudypost/getChatFriendList.html */ ?>
<div class="chat_list_title"><strong>Danh sách bạn bè</strong> <span><?php echo $this->_tpl_vars['count']; ?>
 bạn</span></div>
<div class="scroll_list">
            <ul>
                        <?php if (! $this->_tpl_vars['members']): ?>
                            <li style="text-align: center">Chưa có bạn</li>
                        <?php else: ?>
                            <?php $_from = $this->_tpl_vars['members']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['level']['iteration']++;
?>
                                    <li class="<?php if ($this->_tpl_vars['item']['online']): ?>online<?php endif; ?>" onclick="getChatbox(<?php echo $this->_tpl_vars['item']['id']; ?>
, false, <?php echo $this->_tpl_vars['item']['membertype_id']; ?>
);">
                                        <div class="online_status">.</div>
                                        <img src="<?php echo $this->_tpl_vars['item']['photo']; ?>
" />
                                        <h2 class="title"><?php echo $this->_tpl_vars['item']['first_name']; ?>
 <?php echo $this->_tpl_vars['item']['last_name']; ?>
</h2>
                                        <p class="content"><?php echo $this->_tpl_vars['item']['school_name']; ?>
</p>
                                        <!--<p class="timeinbox"><?php echo $this->_tpl_vars['item']['created']; ?>
</p>-->
                                    </li>
                            <?php endforeach; endif; unset($_from); ?>
                        <?php endif; ?>
                        
            </ul>
</div>