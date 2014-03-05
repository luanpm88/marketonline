<?php /* Smarty version 2.6.27, created on 2014-03-03 08:38:39
         compiled from default%5Cstudypost/index.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'default\\studypost/index.html', 30, false),array('modifier', 'truncate', 'default\\studypost/index.html', 39, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/header.html", 'smarty_include_vars' => array('page_title' => "Thị trường Mua-Bán, Phân phối Sản phẩm/Dịch vụ")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/verytopmenu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
<script type="application/x-javascript">

    $(document).ready(function() {
        
        $(window).scrollTop(198);
        
    });
    
</script>
'; ?>


<div class="outpage_box">
    <div class="row">
        <div class="facelike_main">
            
            <div id="facelike_col1">
                <div class="school-top-left-info">
                    <img src="<?php echo $this->_tpl_vars['school']['logo']; ?>
" />
                    <h1><?php echo $this->_tpl_vars['school']['name']; ?>
</h1>                    
                </div>
                <div class="top_user_info" style="display: none">
                    <img class="avatar" src="<?php if ($this->_tpl_vars['pb_company']): ?><?php echo $this->_tpl_vars['pb_company']['image']; ?>
<?php else: ?> <?php if ($this->_tpl_vars['user_avatar']): ?> <?php echo $this->_tpl_vars['user_avatar']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['theme_img_path']; ?>
image/usericon.jpg  <?php endif; ?>  <?php endif; ?>" width="20" height="20" />
                    <h4><?php echo $this->_tpl_vars['pb_userinfo']['first_name']; ?>
 <?php echo $this->_tpl_vars['pb_userinfo']['last_name']; ?>
</h4>
                    <a style="padding-left: 0; margin-right: 10px" class="name" href="<?php if ($this->_tpl_vars['pb_company']): ?><?php echo smarty_function_the_url(array('module' => 'space','userid' => ($this->_tpl_vars['pb_company']['cache_spacename'])), $this);?>
<?php else: ?>redirect.php?url=/virtual-office/<?php endif; ?>">
                        Vào trang quản trị
                    </a>
                </div>
                <br style="clear: both" />
                <div class="school_list" style="display: none">
                    <ul>
                        <li class="<?php if ($_GET['action'] == 'school'): ?>active<?php endif; ?>">
                            <a href="<?php echo smarty_function_the_url(array('module' => 'studypost','room' => 'school','id' => ($this->_tpl_vars['pb_userinfo']['school_id'])), $this);?>
" title="<?php echo $this->_tpl_vars['pb_userinfo']['school_name']; ?>
">
                                <?php echo ((is_array($_tmp=$this->_tpl_vars['pb_userinfo']['school_name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 40) : smarty_modifier_truncate($_tmp, 40)); ?>

                                <div class="more-studybar">Thành viên: <?php echo $this->_tpl_vars['school']['member_count']; ?>
</div>
                            </a>
                        </li>
                    </ul>
                </div>
                
                <div class="school_list">                    
                    <h4>Nhóm đã tham gia</h4>
                    <ul class="group_list">
                        <?php $_from = $this->_tpl_vars['joined_groups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_group'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_group']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['group_key'] => $this->_tpl_vars['group']):
        $this->_foreach['level_group']['iteration']++;
?>
                            <li class="">
                                <a href="###" title="<?php echo $this->_tpl_vars['group']['subject_name']; ?>
 <?php echo $this->_tpl_vars['group']['school_name']; ?>
">
                                    <?php echo $this->_tpl_vars['group']['subject_name']; ?>

                                    <div class="more-studybar">Thành viên: <?php echo $this->_tpl_vars['group']['member_count']; ?>
</div>
                                </a>
                            </li>
                        <?php endforeach; endif; unset($_from); ?>
                    </ul>
                </div>
            </div>
            
            <div id="facelike_col2">
                <div class="col2-top">
                    <div class="col2-top-banner">
                        <img src="<?php echo $this->_tpl_vars['school']['banner']; ?>
" />
                        <div class="banner-school-info">
                            <?php if ($this->_tpl_vars['school']['address']): ?><p><?php echo $this->_tpl_vars['school']['address']; ?>
</p><?php endif; ?>
                            <?php if ($this->_tpl_vars['school']['phone']): ?><p><label>Điện thoại:</label> <?php echo $this->_tpl_vars['school']['phone']; ?>
</p><?php endif; ?>
                            <?php if ($this->_tpl_vars['school']['email']): ?><p><label>Email:</label> <a href="mailto:<?php echo $this->_tpl_vars['school']['email']; ?>
"><?php echo $this->_tpl_vars['school']['email']; ?>
</a></p><?php endif; ?>
                            <?php if ($this->_tpl_vars['school']['website']): ?><p><label>Website:</label> <?php echo $this->_tpl_vars['school']['website']; ?>
</p><?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col2-bottom">
                    <div class="col2-bottom-left">
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/studypost/_main_content.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    </div>
                    <div class="col2-bottom-right">
                        <div class="school_list">
                            <h4>Trường</h4>
                            <ul class="group_list">
                                <li class="<?php if ($_GET['action'] == 'school'): ?>active<?php endif; ?>">
                                    <a style="background-image:url('<?php echo $this->_tpl_vars['WebRootUrl']; ?>
/<?php echo $this->_tpl_vars['school']['logo']; ?>
')" href="<?php echo smarty_function_the_url(array('module' => 'studypost','room' => 'school','id' => ($this->_tpl_vars['pb_userinfo']['school_id'])), $this);?>
" title="<?php echo $this->_tpl_vars['pb_userinfo']['school_name']; ?>
">
                                        <?php echo ((is_array($_tmp=$this->_tpl_vars['pb_userinfo']['school_name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 40) : smarty_modifier_truncate($_tmp, 40)); ?>

                                        <div class="more-studybar">Thành viên: <?php echo $this->_tpl_vars['school']['member_count']; ?>
</div>
                                    </a>
                                </li>

                                <?php $_from = $this->_tpl_vars['school_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['level']['iteration']++;
?>
                                    <li class="<?php if ($this->_tpl_vars['item']['id'] == $this->_tpl_vars['school']['id']): ?>active<?php endif; ?>" style="display: none">
                                        <a style="background-image:url('<?php echo $this->_tpl_vars['WebRootUrl']; ?>
/<?php echo $this->_tpl_vars['item']['logo']; ?>
')" href="<?php echo smarty_function_the_url(array('module' => 'studypost','room' => 'school','id' => ($this->_tpl_vars['item']['id'])), $this);?>
" title="<?php echo $this->_tpl_vars['item']['school_name']; ?>
">
                                            <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 40) : smarty_modifier_truncate($_tmp, 40)); ?>

                                            <div class="more-studybar">Thành viên: <?php echo $this->_tpl_vars['item']['member_count']; ?>
</div>
                                        </a>
                                    </li>
                                <?php endforeach; endif; unset($_from); ?>
                            </ul>
                            <h4>Nhóm học tập</h4>
                            <ul class="group_list">
                                <?php $_from = $this->_tpl_vars['groups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_group'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_group']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['group_key'] => $this->_tpl_vars['group']):
        $this->_foreach['level_group']['iteration']++;
?>
                                    <li class="">
                                        <a href="###" title="<?php echo $this->_tpl_vars['group']['subject_name']; ?>
 <?php echo $this->_tpl_vars['group']['school_name']; ?>
">
                                            <?php echo $this->_tpl_vars['group']['subject_name']; ?>

                                            <div class="more-studybar">Thành viên: <?php echo $this->_tpl_vars['group']['member_count']; ?>
</div>
                                        </a>
                                    </li>
                                <?php endforeach; endif; unset($_from); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/footer_none.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>