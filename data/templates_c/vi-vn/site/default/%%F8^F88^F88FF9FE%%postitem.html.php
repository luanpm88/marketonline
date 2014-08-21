<?php /* Smarty version 2.6.27, created on 2014-08-14 16:35:33
         compiled from default/job/postitem.html */ ?>
<?php if ($this->_tpl_vars['pb_username'] != ""): ?>
  <div class="postitem jobpost">	
      <a target="_blank" href="redirect.php?url=/virtual-office/job.php?do=edit"><?php echo $this->_tpl_vars['_add_job']; ?>
</a>
      <a href="redirect.php?url=/virtual-office/employee.php?do=edit" class="notyet">Đăng tìm việc</a>
  </div>
<?php else: ?>
  <div class="postitem jobpost">
      <a redirect="redirect.php?url=/virtual-office/job.php?do=edit" href="#login-box" class="comment_but"><?php echo $this->_tpl_vars['_add_job']; ?>
</a>
      <a redirect="redirect.php?url=/virtual-office/employee.php?do=edit" href="#login-box" class="comment_but">Đăng tìm việc</a>
  </div>
<?php endif; ?>