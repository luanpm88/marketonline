<?php /* Smarty version 2.6.27, created on 2014-03-31 10:02:35
         compiled from default/studypost/_rightbar_groups.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'default/studypost/_rightbar_groups.html', 9, false),)), $this); ?>
                            <h4>Nhóm học tập</h4>
                            <?php if ($this->_tpl_vars['groups_count'] > 5): ?>
                                <div class="title_more_group_button" onclick="$('.rightbar_grouplist .group_item').css('display','block');$(this).remove()" href="">Xem thêm</div>
                            <?php endif; ?>
                            <ul class="group_list rightbar_grouplist">
                                <?php $_from = $this->_tpl_vars['groups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_group'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_group']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['group_key'] => $this->_tpl_vars['group']):
        $this->_foreach['level_group']['iteration']++;
?>
                                    <li class="group_item" <?php if ($this->_tpl_vars['group_key'] > 4): ?>style="display:none"<?php endif; ?>>
                                        <div  <?php if ($this->_tpl_vars['group']['logo_origin']): ?>style="background:url(<?php echo $this->_tpl_vars['group']['logo']; ?>
) no-repeat scroll 0 0 / 42px auto rgba(0, 0, 0, 0)"<?php endif; ?> class="logo" onclick="" title="<?php echo $this->_tpl_vars['group']['subject_name']; ?>
 <?php echo $this->_tpl_vars['group']['school_name']; ?>
">
                                            <strong onclick="window.location='<?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'group','id' => ($this->_tpl_vars['group']['id'])), $this);?>
'"><?php echo $this->_tpl_vars['group']['subject_name']; ?>
</strong>
                                            <div onclick="window.location='<?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'group','id' => ($this->_tpl_vars['group']['id'])), $this);?>
'" class="more-studybar">Thành viên: <?php echo $this->_tpl_vars['group']['member_count']; ?>
</div>
                                            <a class="join_group" onclick="window.location='<?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'join_group','id' => ($this->_tpl_vars['group']['id'])), $this);?>
'">
                                                <i>.</i>
                                                Tham gia
                                            </a>
                                        </div>
                                    </li>
                                <?php endforeach; endif; unset($_from); ?>
                            </ul>