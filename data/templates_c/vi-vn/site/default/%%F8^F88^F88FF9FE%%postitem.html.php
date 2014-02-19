<?php /* Smarty version 2.6.27, created on 2014-02-10 13:47:21
         compiled from default/job/postitem.html */ ?>
<?php if ($this->_tpl_vars['pb_username'] != ""): ?>
  <div class="postitem jobpost">	
	<a target="_blank" href="redirect.php?url=/virtual-office/job.php?do=edit"><?php echo $this->_tpl_vars['_add_job']; ?>
</a>
	
	<a href="redirect.php?url=/virtual-office/employee.php?do=edit" class="notyet">Đăng tìm việc</a>
	<!--<a href="#box_underi" class="notyet">Đăng tài liệu</a>-->
  </div>
<?php else: ?>
  <div class="postitem jobpost">
	<a href="#login-box" class="comment_but"><?php echo $this->_tpl_vars['_add_job']; ?>
</a>
	
	<a href="#login-box" class="comment_but">Đăng tìm việc</a>
	<!--<a href="#box_underi" class="notyet">Đăng tài liệu</a>-->
  </div>
<?php endif; ?>