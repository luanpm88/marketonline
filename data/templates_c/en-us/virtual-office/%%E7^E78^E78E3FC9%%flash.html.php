<?php /* Smarty version 2.6.27, created on 2013-05-15 07:02:55
         compiled from flash.html */ ?>
<?php $this->assign('page_title', ($this->_tpl_vars['title'])); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo $this->_tpl_vars['redirect']; ?>

<div class="wrap clearfix">
    <div class="sidebar">
       <div class="sidebar_menu">
         <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
       </div>
    </div>
     <div class="main_content">
     <div class="blank"></div>

     <div class="offer_info_title"><h2><?php echo $this->_tpl_vars['_action_tip']; ?>
</h2></div>
        <table class="offer_info_tips">
        <tr>
        <th rowspan="2"><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/<?php echo $this->_tpl_vars['action_img']; ?>
"></th>
        <td><?php echo $this->_tpl_vars['message']; ?>
</td>
      </tr>
      <tr>
        <td><span><a href="<?php echo $this->_tpl_vars['url']; ?>
" class="btn_publish"><?php echo $this->_tpl_vars['_go_back']; ?>
</a></span><span><a href="index.php" class="btn_publish"><?php echo $this->_tpl_vars['_go_office_room']; ?>
</a></span></td>
      </tr>
      </table>
      
     </div>
   </div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>