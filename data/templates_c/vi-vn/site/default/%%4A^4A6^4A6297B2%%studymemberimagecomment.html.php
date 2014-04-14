<?php /* Smarty version 2.6.27, created on 2014-03-19 14:49:36
         compiled from default/studypost/studymemberimagecomment.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'default/studypost/studymemberimagecomment.html', 9, false),)), $this); ?>
<?php if ($this->_tpl_vars['comments']): ?>
<ul class="comment_list">
    <?php $_from = $this->_tpl_vars['comments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['level']['iteration']++;
?>
        <li>
            <img src="<?php echo $this->_tpl_vars['item']['user']['photo']; ?>
" />
            <h2>
                
                <?php if ($this->_tpl_vars['item']['user']): ?>
                    <a href="<?php echo smarty_function_the_url(array('module' => 'space','userid' => ($this->_tpl_vars['item']['space_name']),'do' => 'contact'), $this);?>
"><?php echo $this->_tpl_vars['item']['first_name']; ?>
 <?php echo $this->_tpl_vars['item']['last_name']; ?>
</a> <span class="c_content"><?php echo $this->_tpl_vars['item']['content']; ?>
</span>
                <?php else: ?>
                    <a href="javascript:void(0)" style="color: #333;cursor: default"><?php echo $this->_tpl_vars['item']['guest_name']; ?>
</a> <span class="c_content"><?php echo $this->_tpl_vars['item']['content']; ?>
</span>
                <?php endif; ?>
                <br /><span><?php echo $this->_tpl_vars['item']['created']; ?>
</span>
            </h2>
            
            
        </li>
    <?php endforeach; endif; unset($_from); ?>
</ul>
<?php else: ?>
<p><?php echo $this->_tpl_vars['_no_offer_comment']; ?>
</p>
<?php endif; ?>

