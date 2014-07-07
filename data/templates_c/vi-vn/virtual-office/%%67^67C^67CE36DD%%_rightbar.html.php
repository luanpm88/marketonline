<?php /* Smarty version 2.6.27, created on 2014-07-04 15:37:47
         compiled from _rightbar.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'announce', '_rightbar.html', 4, false),)), $this); ?>
        <div class="notice">
              <h2><a href="announce.php?type=1"><?php echo $this->_tpl_vars['_announce']; ?>
</a></h2>
              <ul>
				<?php $this->_tag_stack[] = array('announce', array('row' => 10,'userid' => $this->_tpl_vars['MEMBER']['id'],'typeid' => 1,'membertypeid' => $this->_tpl_vars['MEMBER']['membertype_id'])); $_block_repeat=true;smarty_block_announce($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
					<?php if ($this->_tpl_vars['announce']['status']): ?>
						<li<?php if (! $this->_tpl_vars['announce']['read']): ?> class="notread"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['announce']['url']; ?>
"><?php echo $this->_tpl_vars['announce']['title']; ?>
</a></li>
					<?php endif; ?>
				<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_announce($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
              </ul>
           </div>
	   <div class="notice">
              <h2><a href="announce.php?type=6">Hướng dẫn</a></h2>
              <ul>
				<?php $this->_tag_stack[] = array('announce', array('row' => 10,'userid' => $this->_tpl_vars['MEMBER']['id'],'typeid' => 6,'membertypeid' => $this->_tpl_vars['MEMBER']['membertype_id'])); $_block_repeat=true;smarty_block_announce($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
					<?php if ($this->_tpl_vars['announce']['status']): ?>
						<li<?php if (! $this->_tpl_vars['announce']['read']): ?> class="notread"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['announce']['url']; ?>
"><?php echo $this->_tpl_vars['announce']['title']; ?>
</a></li>
					<?php endif; ?>
				<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_announce($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
              </ul>
        </div>