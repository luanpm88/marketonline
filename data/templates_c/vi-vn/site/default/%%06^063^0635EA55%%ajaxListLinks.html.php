<?php /* Smarty version 2.6.27, created on 2014-07-10 11:00:42
         compiled from default%5Cproduct/ajaxListLinks.html */ ?>

<h3><?php echo $this->_tpl_vars['_friend_links']; ?>
 : <?php echo $this->_tpl_vars['count_links']; ?>
</h3>
<div class="friendlink_box" style="margin-bottom: 20px;float: left; width: 100%">
			
			
			<?php if ($this->_tpl_vars['count_links']): ?>
			    <?php $_from = $this->_tpl_vars['links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_0'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_0']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key0'] => $this->_tpl_vars['item0']):
        $this->_foreach['level_0']['iteration']++;
?>
			    
			      <?php if ($this->_tpl_vars['item0']['shop_name'] && key0 < 9): ?>
				  <a target="_blank" class="link_item" href="<?php echo $this->_tpl_vars['item0']['link']; ?>
">
				    <img src="<?php echo $this->_tpl_vars['item0']['image']; ?>
" />
				    <span class="bg">.</span>
				    <title><?php echo $this->_tpl_vars['item0']['shop_name']; ?>
</title>
				  </a>
			      <?php endif; ?>
			    <?php endforeach; endif; unset($_from); ?>
			
			<?php else: ?>
			  <div class="empty_links"><?php echo $this->_tpl_vars['_empty_links']; ?>
</div>
			<?php endif; ?>
			
			
		      </div>