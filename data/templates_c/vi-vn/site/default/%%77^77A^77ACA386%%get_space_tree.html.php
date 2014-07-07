<?php /* Smarty version 2.6.27, created on 2014-06-13 09:56:07
         compiled from default%5Cproduct/get_space_tree.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'default\\product/get_space_tree.html', 9, false),)), $this); ?>
                <section id="recent_products-3" class="widget-3 widget-last widget widget_recent_products">
                <div class="widget-inner">
                    <h3><?php echo $this->_tpl_vars['_product_category']; ?>
</h3>
		    <div class="scrollbarleft">
			<ul>
			    <?php $_from = $this->_tpl_vars['tree']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_0'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_0']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key0'] => $this->_tpl_vars['item0']):
        $this->_foreach['level_0']['iteration']++;
?>
					  <?php if (true): ?>
					      <li style="padding-left: <?php echo $this->_tpl_vars['item0']['padding']; ?>
px<?php if ($this->_tpl_vars['item0']['hide']): ?>;display: none<?php endif; ?>" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-916 current_page_item menu-item-954 plevel<?php echo $this->_tpl_vars['item0']['lpad']; ?>
 <?php if ($this->_tpl_vars['item0']['member_id'] == $_GET['memberid'] && $this->_tpl_vars['item0']['id'] == $_GET['typeid']): ?> active<?php endif; ?>" id="menu-item-954">
						<a class="item menu_lvl1" rel="<?php echo $this->_tpl_vars['item0']['id']; ?>
" content="<?php echo $this->_tpl_vars['item0']['id']; ?>
" href="<?php echo smarty_function_the_url(array('module' => 'producttype','typeid' => ($this->_tpl_vars['item0']['id']),'member_id' => ($this->_tpl_vars['item0']['member_id']),'userid' => ($_GET['userid'])), $this);?>
">
						  <span><?php echo $this->_tpl_vars['item0']['count']; ?>
</span><?php echo $this->_tpl_vars['item0']['name']; ?>
 
						</a>
					      </li>
					   <?php endif; ?>
			    <?php endforeach; endif; unset($_from); ?>
			</ul>
			</div>
		</div>
	      </section>