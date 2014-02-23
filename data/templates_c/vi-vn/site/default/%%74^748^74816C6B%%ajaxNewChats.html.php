<?php /* Smarty version 2.6.27, created on 2013-11-06 15:53:03
         compiled from default%5Cproduct/ajaxNewChats.html */ ?>
<?php if ($this->_tpl_vars['Items']): ?>
<ul class="chat-list">
<?php $_from = $this->_tpl_vars['Items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['level']['iteration']++;
?>
                        <li <?php if ($this->_tpl_vars['item']['me']): ?>class="me"<?php endif; ?> rel="<?php echo $this->_tpl_vars['item']['created_or']; ?>
" chat-id="<?php echo $this->_tpl_vars['item']['id']; ?>
" read="<?php echo $this->_tpl_vars['item']['read']; ?>
">
                            <span class="datetimec"><?php echo $this->_tpl_vars['item']['created']; ?>
</span>
                            <img width="40" height="40" src="<?php echo $this->_tpl_vars['item']['company_logo']; ?>
" class="avatar">
                            <?php echo $this->_tpl_vars['item']['content']; ?>
</li>
                    <?php endforeach; endif; unset($_from); ?>
</ul>
<?php endif; ?>
<?php if ($this->_tpl_vars['chatitem']): ?>
<div class="seen-id"><?php echo $this->_tpl_vars['chatitem']['id']; ?>
</div>
<div class="seen-content">Đã xem</div>
<?php endif; ?>