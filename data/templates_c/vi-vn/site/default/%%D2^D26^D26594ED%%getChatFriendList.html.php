<?php /* Smarty version 2.6.27, created on 2014-08-21 08:21:21
         compiled from default%5Cstudypost/getChatFriendList.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'default\\studypost/getChatFriendList.html', 20, false),)), $this); ?>
<div class="chat_list_title"><strong>Danh sách bạn bè</strong> <!--<span><?php echo $this->_tpl_vars['count']; ?>
 bạn</span>--></div>
<div class="scroll_list">
            <ul>
                        <li class="title" style="">Bạn học tập đang trực tuyến (<?php echo $this->_tpl_vars['count']; ?>
)</li>
                        <?php if (! $this->_tpl_vars['members']): ?>
                            <li style="text-align: center">Chưa có bạn</li>
                        <?php else: ?>
                            <?php $_from = $this->_tpl_vars['members']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['level']['iteration']++;
?>
                                    <li class="<?php if ($this->_tpl_vars['item']['online']): ?>online<?php endif; ?>" onclick="getChatboxNew('<?php echo $this->_tpl_vars['item']['id']; ?>
x6', false);">
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
                        <?php if ($this->_tpl_vars['pb_userinfo']['id']): ?>
                            <li class="title" style="">Liên kết đang trực tuyến (<?php echo $this->_tpl_vars['count_online_list']; ?>
)</li>
                            <li class="invite" style=""><a href="<?php echo smarty_function_the_url(array('module' => 'share_shop','space_name' => ($this->_tpl_vars['pb_userinfo']['space_name'])), $this);?>
">Mời bạn bè tham gia</a></li>
                                <?php if (! $this->_tpl_vars['online_list']): ?>
                                    <li style="text-align: center">Chưa có bạn</li>
                                <?php else: ?>
                                    <?php $_from = $this->_tpl_vars['online_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['level']['iteration']++;
?>
                                            <li class="<?php if ($this->_tpl_vars['item']['online']): ?>online<?php endif; ?>" onclick="getChatboxNew('<?php echo $this->_tpl_vars['item']['id']; ?>
x<?php echo $this->_tpl_vars['item']['membertype_id']; ?>
', false);">
                                                <div class="online_status">.</div>
                                                <img src="<?php echo $this->_tpl_vars['item']['photo']; ?>
" />
                                                
                                                <?php if ($this->_tpl_vars['item']['membertype_id'] == 6): ?>
                                                    <h2 class="title"><?php echo $this->_tpl_vars['item']['first_name']; ?>
 <?php echo $this->_tpl_vars['item']['last_name']; ?>
</h2>
                                                    <p class="content"><?php echo $this->_tpl_vars['item']['school_name']; ?>
</p>
                                                <?php else: ?>
                                                    <h2 class="title"><?php echo $this->_tpl_vars['item']['shop_name']; ?>
</h2>
                                                    <p class="content"><?php if ($this->_tpl_vars['item']['first_name']): ?><?php echo $this->_tpl_vars['item']['first_name']; ?>
 <?php echo $this->_tpl_vars['item']['last_name']; ?>
<?php if (! $this->_tpl_vars['item']['shop_name']): ?> (<?php echo $this->_tpl_vars['item']['username']; ?>
)<?php endif; ?><?php else: ?><?php echo $this->_tpl_vars['item']['username']; ?>
<?php endif; ?></p>
                                                <?php endif; ?>
                                                <!--<p class="timeinbox"><?php echo $this->_tpl_vars['item']['created']; ?>
</p>-->
                                            </li>
                                    <?php endforeach; endif; unset($_from); ?>
                                <?php endif; ?>
                        <?php endif; ?>
                        
            </ul>
</div>
