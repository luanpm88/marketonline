<?php /* Smarty version 2.6.27, created on 2014-03-05 11:56:20
         compiled from default/studypost/_joined_groups.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'default/studypost/_joined_groups.html', 6, false),)), $this); ?>
                <div class="school_list">                    
                    <h4>Nhóm đã tham gia</h4>
                    <ul class="group_list">
                        <?php $_from = $this->_tpl_vars['joined_groups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_group'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_group']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['group_key'] => $this->_tpl_vars['group']):
        $this->_foreach['level_group']['iteration']++;
?>
                            <li class="group_item <?php if ($_GET['action'] == 'group' && $_GET['id'] == $this->_tpl_vars['group']['id']): ?>active<?php endif; ?>">
                                <a class="logo" href="<?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'group','id' => ($this->_tpl_vars['group']['id'])), $this);?>
" title="<?php echo $this->_tpl_vars['group']['subject_name']; ?>
 <?php echo $this->_tpl_vars['group']['school_name']; ?>
">
                                    <?php if ($this->_tpl_vars['group']['new_count'] && false): ?>
                                        <div class="new_count"><?php echo $this->_tpl_vars['group']['new_count']; ?>
</div>
                                    <?php endif; ?>
                                    <h5><?php echo $this->_tpl_vars['group']['subject_name']; ?>
</h5>
                                    <div class="more-studybar"><?php echo $this->_tpl_vars['group']['school_name']; ?>
<br />Bài viết mới: <span <?php if ($this->_tpl_vars['group']['new_count']): ?>class="active"<?php endif; ?>><?php echo $this->_tpl_vars['group']['new_count']; ?>
</span></div>
                                </a>
                            </li>
                        <?php endforeach; endif; unset($_from); ?>
                    </ul>
                </div>