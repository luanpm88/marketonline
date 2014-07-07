<?php /* Smarty version 2.6.27, created on 2014-07-03 09:06:37
         compiled from default/studypost/_top_user_info.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'default/studypost/_top_user_info.html', 3, false),)), $this); ?>
<?php if ($this->_tpl_vars['pb_userid']): ?>
    <div class="top_user_info">
        <a href="<?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'memberpage','id' => ($this->_tpl_vars['pb_userinfo']['id']),'title' => ($this->_tpl_vars['pb_userinfo']['fullname'])), $this);?>
">
            <img class="avatar" src="<?php if ($this->_tpl_vars['user_avatar']): ?> <?php echo $this->_tpl_vars['user_avatar']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['theme_img_path']; ?>
image/usericon_big.jpg  <?php endif; ?>" width="20" height="20" />
        </a>
        <h4><a href="<?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'memberpage','id' => ($this->_tpl_vars['pb_userinfo']['id']),'title' => ($this->_tpl_vars['pb_userinfo']['fullname'])), $this);?>
"><?php echo $this->_tpl_vars['pb_userinfo']['first_name']; ?>
 <?php echo $this->_tpl_vars['pb_userinfo']['last_name']; ?>
</a></h4>
        <a style="padding-left: 0; margin-right: 10px" class="name" href="<?php echo $this->_tpl_vars['WebRootUrl']; ?>
redirect.php?url=/virtual-office/" target="_blank">
            Vào trang quản trị
        </a>
    </div>
<?php else: ?>
    <div class="top_user_info">
        <a href="#login-box" class="comment_but">
            <img class="avatar" src="<?php if ($this->_tpl_vars['user_avatar']): ?> <?php echo $this->_tpl_vars['user_avatar']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['theme_img_path']; ?>
image/usericon_big.jpg  <?php endif; ?>" width="20" height="20" />
        </a>
        <h4>Khách viếng thăm</h4>
        <a style="padding-left: 0; margin-right: 10px" class="name comment_but"  href="#login-box">
            Tham gia Diễn đàn
        </a>
    </div>
<?php endif; ?>