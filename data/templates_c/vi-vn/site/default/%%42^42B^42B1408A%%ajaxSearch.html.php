<?php /* Smarty version 2.6.27, created on 2013-11-04 12:11:30
         compiled from default%5Cproduct/ajaxSearch.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'default\\product/ajaxSearch.html', 9, false),array('modifier', 'strip_tags', 'default\\product/ajaxSearch.html', 10, false),)), $this); ?>
<div class="top_title">Tên Gian Hàng</div>
<ul>
    
    <?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['level']['iteration']++;
?>
        <?php if ($this->_tpl_vars['item']['shop_name']): ?>
            <li>
                <img src="<?php echo $this->_tpl_vars['item']['logo']; ?>
" />
                <h2>
                    <a href="<?php echo smarty_function_the_url(array('module' => 'space','userid' => ($this->_tpl_vars['item']['cache_spacename'])), $this);?>
">
                        <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['shop_name'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>

                    </a>
                </h2>
                <p>
                    <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['name'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
 (<?php echo $this->_tpl_vars['item']['last_name']; ?>
 <?php echo $this->_tpl_vars['item']['first_name']; ?>
)
                </p>
            </li>
        <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
</ul>