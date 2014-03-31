<?php /* Smarty version 2.6.27, created on 2014-03-18 16:28:25
         compiled from flash.html */ ?>
<?php $this->assign('page_title', ($this->_tpl_vars['title'])); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="wrap clearfix flash_page">
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
     <div id="announce_div">
        <h2><?php echo $this->_tpl_vars['message']; ?>
</h2>
        <p>
            <span><a href="<?php echo $this->_tpl_vars['url']; ?>
" class="btn_publish"><?php echo $this->_tpl_vars['_go_back']; ?>
</a></span><span><a href="index.php" class="btn_publish"><?php echo $this->_tpl_vars['_go_office_room']; ?>
</a></span>
        </p>
     </div>
     

      
     </div>
   </div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>