<?php /* Smarty version 2.6.27, created on 2014-08-13 14:58:16
         compiled from default%5Cproduct/_bottom-industry-list.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'default\\product/_bottom-industry-list.html', 1, false),)), $this); ?>
        <h3><a href="<?php echo smarty_function_the_url(array('module' => 'product_main'), $this);?>
">Danh mục sản phẩm</a></h3>
	<ul>
		<?php $_from = $this->_tpl_vars['industries']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_0'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_0']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key0'] => $this->_tpl_vars['item0']):
        $this->_foreach['level_0']['iteration']++;
?>
			<li class="level0 <?php if ($this->_tpl_vars['level_0']%4 == 0): ?>clear<?php endif; ?>">
				<a class="level0" href="<?php echo smarty_function_the_url(array('module' => 'products','level' => 1,'industryid' => ($this->_tpl_vars['item0']['id']),'title' => ($this->_tpl_vars['item0']['name'])), $this);?>
"><?php echo $this->_tpl_vars['item0']['name']; ?>
</a>
				<ul>
					<?php $_from = $this->_tpl_vars['item0']['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_1_industry'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_1_industry']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key_level1'] => $this->_tpl_vars['level1']):
        $this->_foreach['level_1_industry']['iteration']++;
?>
						<li class="level1 <?php if ($this->_tpl_vars['key_level1'] > 4): ?>hide<?php endif; ?>">
							<a class="level1" href="<?php echo smarty_function_the_url(array('module' => 'products','level' => 2,'industryid' => ($this->_tpl_vars['level1']['id']),'title' => ($this->_tpl_vars['level1']['name'])), $this);?>
"><?php echo $this->_tpl_vars['level1']['name']; ?>
</a>
						</li>
					<?php endforeach; endif; unset($_from); ?>
					<li class="view-more"><a href="javascript:void(0)">Xem thêm</a></li>
				</ul>
			</li>
			<?php if ($this->_tpl_vars['level_0']++): ?><?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
		<li class="level0 more-item"><a href="<?php echo smarty_function_the_url(array('module' => 'product_main'), $this);?>
">Sản phẩm mới</a></li>
		<li class="level0 more-item"><a href="<?php echo smarty_function_the_url(array('module' => 'product_main'), $this);?>
#sale">Giảm giá/Khuyến mãi</a></li>
	</ul>