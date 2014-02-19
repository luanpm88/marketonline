<?php /* Smarty version 2.6.27, created on 2014-01-13 14:54:09
         compiled from announce.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'announce', 'announce.html', 29, false),)), $this); ?>
<?php $this->assign('page_title', ($this->_tpl_vars['_announce'])); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


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
	
	<div class="main_content_left">
		<div class="blank"></div>
		    <div class="offer_banner"><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/offer_01.gif" /></div>
		<div class="offer_info_title"><h2><?php echo $this->_tpl_vars['_announce']; ?>
: <?php echo $this->_tpl_vars['item']['subject']; ?>
</h2></div>
      
		<div class="content-inner">
			<?php echo $this->_tpl_vars['item']['message']; ?>

		</div>
		
		
	</div>
	
	<div class="main_content_right">
           <div class="notice">
              <h2><?php echo $this->_tpl_vars['_announce']; ?>
</h2>
              <ul>
				<?php $this->_tag_stack[] = array('announce', array('row' => 10,'userid' => $this->_tpl_vars['MEMBER']['id'],'typeid' => 1)); $_block_repeat=true;smarty_block_announce($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
				<?php if ($this->_tpl_vars['announce']['status']): ?>
					<li<?php if (! $this->_tpl_vars['announce']['read']): ?> class="notread"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['announce']['url']; ?>
"><?php echo $this->_tpl_vars['announce']['title']; ?>
</a></li>
				<?php endif; ?>
				<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_announce($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
              </ul>
           </div>
        </div>
		
</div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
