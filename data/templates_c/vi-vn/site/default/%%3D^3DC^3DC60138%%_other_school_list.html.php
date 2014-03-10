<?php /* Smarty version 2.6.27, created on 2014-03-05 12:58:10
         compiled from default/studypost/_other_school_list.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'default/studypost/_other_school_list.html', 7, false),array('modifier', 'truncate', 'default/studypost/_other_school_list.html', 10, false),)), $this); ?>
<div class="title_more_school_button" href="#other-school-list">Danh sách trường</div>
<div id="other-school-list" style="display: none" class="school_list">
    <h3>Danh sách các trường khác</h3>
    <ul class="group_list">
        <?php $_from = $this->_tpl_vars['school_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['level']['iteration']++;
?>
            <?php if ($this->_tpl_vars['school']['id'] != $this->_tpl_vars['item']['id']): ?>
                <li onclick="window.location='<?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'school','id' => ($this->_tpl_vars['item']['id'])), $this);?>
'" class="school_list_box <?php if ($this->_tpl_vars['item']['id'] == $this->_tpl_vars['school']['id']): ?>active<?php endif; ?>">
                    <a class="head-title">
                        <img src="<?php echo $this->_tpl_vars['WebRootUrl']; ?>
/<?php echo $this->_tpl_vars['item']['logo']; ?>
" />
                        <span><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 40) : smarty_modifier_truncate($_tmp, 40)); ?>
</span>
                    </a>
                    <?php if ($this->_tpl_vars['item']['address']): ?><p><?php echo $this->_tpl_vars['item']['address']; ?>
</p><?php endif; ?>
                    <?php if ($this->_tpl_vars['item']['phone']): ?><p><label>Điện thoại:</label> <?php echo $this->_tpl_vars['item']['phone']; ?>
</p><?php endif; ?>
                    <?php if ($this->_tpl_vars['item']['email']): ?><p><label>Email:</label> <a href="mailto:<?php echo $this->_tpl_vars['item']['email']; ?>
"><?php echo $this->_tpl_vars['item']['email']; ?>
</a></p><?php endif; ?>
                    <?php if ($this->_tpl_vars['item']['website']): ?><p><label>Website:</label> <?php echo $this->_tpl_vars['item']['website']; ?>
</p><?php endif; ?>
                </li>
            <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>
    </ul>
</div>