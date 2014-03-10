<?php /* Smarty version 2.6.27, created on 2014-03-10 11:17:31
         compiled from default/studypost/_top_user_info.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'default/studypost/_top_user_info.html', 4, false),)), $this); ?>
<div class="top_user_info" style="display: none">
                    <img class="avatar" src="<?php if ($this->_tpl_vars['user_avatar']): ?> <?php echo $this->_tpl_vars['user_avatar']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['theme_img_path']; ?>
image/usericon.jpg  <?php endif; ?>" width="20" height="20" />
                    <h4><?php echo $this->_tpl_vars['pb_userinfo']['first_name']; ?>
 <?php echo $this->_tpl_vars['pb_userinfo']['last_name']; ?>
</h4>
                    <a style="padding-left: 0; margin-right: 10px" class="name" href="<?php if ($this->_tpl_vars['pb_company']): ?><?php echo smarty_function_the_url(array('module' => 'space','userid' => ($this->_tpl_vars['pb_company']['cache_spacename'])), $this);?>
<?php else: ?>redirect.php?url=/virtual-office/<?php endif; ?>">
                        Vào trang quản trị
                    </a>
                </div>
                <br style="clear: both" />