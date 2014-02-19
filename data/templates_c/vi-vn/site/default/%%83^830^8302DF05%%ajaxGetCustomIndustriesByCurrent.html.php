<?php /* Smarty version 2.6.27, created on 2013-09-16 09:30:49
         compiled from default%5Cproduct/ajaxGetCustomIndustriesByCurrent.html */ ?>
<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_0'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_0']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key0'] => $this->_tpl_vars['item0']):
        $this->_foreach['level_0']['iteration']++;
?>
<div id="block_<?php echo $this->_tpl_vars['key0']; ?>
">
    <option value="-1"><?php echo $this->_tpl_vars['_select']; ?>
</option>
    <?php $_from = $this->_tpl_vars['item0']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_1'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_1']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key1'] => $this->_tpl_vars['item1']):
        $this->_foreach['level_1']['iteration']++;
?>
        <option value="<?php echo $this->_tpl_vars['item1']['id']; ?>
" <?php if ($this->_tpl_vars['item1']['id'] == $this->_tpl_vars['item0']['active']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['item1']['name']; ?>
</option>
    <?php endforeach; endif; unset($_from); ?>
    <option value="0">-<?php echo $this->_tpl_vars['_create_custom_industry']; ?>
-</option>
</div>
<?php endforeach; endif; unset($_from); ?>

