<?php /* Smarty version 2.6.27, created on 2013-06-28 03:47:42
         compiled from default%5Cproduct/ajaxLoadMenuConnect.html */ ?>
<div id="mapp" style="display: none"><?php echo $this->_tpl_vars['Map']; ?>
</div>
<?php if ($this->_tpl_vars['Items']): ?>
<ul class="menu" id="menu-features-list">
		  <?php $_from = $this->_tpl_vars['Items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_0'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_0']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key0'] => $this->_tpl_vars['item0']):
        $this->_foreach['level_0']['iteration']++;
?>
		      <li class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-916 current_page_item menu-item-954" id="menu-item-954">
			<a class="item menu_lvl1" rel="<?php echo $this->_tpl_vars['item0']['id']; ?>
" href="javascript:void(0)">
			  <?php echo $this->_tpl_vars['item0']['name']; ?>

			</a>
		      </li>
		  <?php endforeach; endif; unset($_from); ?>
                  <li class="liback"><a class="mback" href="javascript:void(0)"><?php echo $this->_tpl_vars['_back']; ?>
</a></li>
		</ul>

<?php endif; ?>