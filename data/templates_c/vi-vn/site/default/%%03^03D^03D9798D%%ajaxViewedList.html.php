<?php /* Smarty version 2.6.27, created on 2014-06-06 16:35:16
         compiled from default/product/ajaxViewedList.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'default/product/ajaxViewedList.html', 6, false),)), $this); ?>
<div class="scroll-content">
    <ul>
    <?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_0'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_0']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key0'] => $this->_tpl_vars['item0']):
        $this->_foreach['level_0']['iteration']++;
?>
                <li>
                                  <?php if (true): ?>
                                      <a title="<?php echo $this->_tpl_vars['item0']['name']; ?>
" class="link_item" href="<?php echo smarty_function_the_url(array('id' => ($this->_tpl_vars['item0']['id']),'module' => 'product','product_name' => ($this->_tpl_vars['item0']['name'])), $this);?>
">
                                        <img alt="<?php echo $this->_tpl_vars['item0']['name']; ?>
" title="<?php echo $this->_tpl_vars['item0']['name']; ?>
" src="<?php echo $this->_tpl_vars['item0']['smallimg']; ?>
" />				    
                                        <!--<title><?php echo $this->_tpl_vars['item0']['name']; ?>
</title>-->
                                      </a>
                                  <?php endif; ?>
                </li>
    <?php endforeach; endif; unset($_from); ?>
    </ul>
</div>