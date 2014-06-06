<?php /* Smarty version 2.6.27, created on 2014-05-23 16:42:38
         compiled from default/product/ajaxMainCategoryMenu.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'default/product/ajaxMainCategoryMenu.html', 2, false),)), $this); ?>
<div class="main-items-header">
    <a href="<?php echo smarty_function_the_url(array('module' => 'product_main'), $this);?>
" class="itemmain product">Sản phẩm</a>
    <a href="<?php echo smarty_function_the_url(array('module' => 'service_main'), $this);?>
" class="itemmain service">Dịch vụ</a>
    <a href="<?php echo smarty_function_the_url(array('module' => 'offer_main'), $this);?>
" class="itemmain market">Thương mại</a>
</div>

<div class="menu_industry_list">
	<!--<h3><a href="<?php echo smarty_function_the_url(array('module' => 'product_main'), $this);?>
">Danh mục sản phẩm</a></h3>-->
	<ul class="toptoptop">
		<?php $_from = $this->_tpl_vars['industries']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_0'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_0']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key0'] => $this->_tpl_vars['item0']):
        $this->_foreach['level_0']['iteration']++;
?>
			<li class="level0 <?php if ($this->_tpl_vars['level_0']%4 == 0): ?>clear<?php endif; ?>">
				<a class="level0" href="<?php if ($this->_tpl_vars['module'] == 'offers'): ?>index.php?do=product&action=offers&level=1&industryid=<?php echo $this->_tpl_vars['item0']['id']; ?>
<?php else: ?><?php echo smarty_function_the_url(array('module' => ($this->_tpl_vars['module']),'level' => 1,'industryid' => ($this->_tpl_vars['item0']['id'])), $this);?>
<?php endif; ?>"><?php echo $this->_tpl_vars['item0']['name']; ?>

                                <i></i></a>
				<ul style="display: none">
					<?php $_from = $this->_tpl_vars['item0']['sub']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_1_industry'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_1_industry']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key_level1'] => $this->_tpl_vars['level1']):
        $this->_foreach['level_1_industry']['iteration']++;
?>
						<li class="level1">
							<a class="level1" href="<?php if ($this->_tpl_vars['module'] == 'offers'): ?>index.php?do=product&action=offers&level=2&industryid=<?php echo $this->_tpl_vars['level1']['id']; ?>
<?php else: ?><?php echo smarty_function_the_url(array('module' => ($this->_tpl_vars['module']),'level' => 2,'industryid' => ($this->_tpl_vars['level1']['id'])), $this);?>
<?php endif; ?>"><?php echo $this->_tpl_vars['level1']['name']; ?>
</a>
						</li>
					<?php endforeach; endif; unset($_from); ?>
				</ul>
                                
			</li>
			<?php if ($this->_tpl_vars['level_0']++): ?><?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
	</ul>
</div>