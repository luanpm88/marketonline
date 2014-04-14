<?php /* Smarty version 2.6.27, created on 2014-03-11 11:33:33
         compiled from default/product/ajaxGetCustomIndustriesByParent.html */ ?>
<option value="-1"><?php echo $this->_tpl_vars['_select']; ?>
</option>	
<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_0'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_0']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key0'] => $this->_tpl_vars['item0']):
        $this->_foreach['level_0']['iteration']++;
?>
    <option value="<?php echo $this->_tpl_vars['item0']['id']; ?>
"><?php echo $this->_tpl_vars['item0']['name']; ?>
</option>			      
<?php endforeach; endif; unset($_from); ?>
<option value="0">-<?php echo $this->_tpl_vars['_create_custom_industry']; ?>
-</option>