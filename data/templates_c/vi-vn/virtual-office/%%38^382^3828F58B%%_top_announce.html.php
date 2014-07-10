<?php /* Smarty version 2.6.27, created on 2014-07-07 14:50:51
         compiled from _top_announce.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'announce', '_top_announce.html', 2, false),)), $this); ?>
        <div class="top-announce">
                <?php $this->_tag_stack[] = array('announce', array('row' => 1,'userid' => $this->_tpl_vars['MEMBER']['id'],'typeid' => 1,'membertypeid' => $this->_tpl_vars['MEMBER']['membertype_id'])); $_block_repeat=true;smarty_block_announce($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
			<a target="_blank" href="announce.php?type=1"><?php echo $this->_tpl_vars['_announce']; ?>
</a>
		<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_announce($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
		<?php $this->_tag_stack[] = array('announce', array('row' => 1,'userid' => $this->_tpl_vars['MEMBER']['id'],'typeid' => 6,'membertypeid' => $this->_tpl_vars['MEMBER']['membertype_id'])); $_block_repeat=true;smarty_block_announce($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
			<a target="_blank" href="announce.php?type=6">Hướng dẫn</a>
		<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_announce($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
				
	</div>