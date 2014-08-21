<?php /* Smarty version 2.6.27, created on 2014-08-13 14:58:15
         compiled from default%5Cproduct/_bottom-related-products.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'default\\product/_bottom-related-products.html', 4, false),array('modifier', 'truncate', 'default\\product/_bottom-related-products.html', 8, false),)), $this); ?>
<ul>		
        <?php $_from = $this->_tpl_vars['bottom_related_products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['levelvv'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['levelvv']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['keyvv'] => $this->_tpl_vars['itemvv']):
        $this->_foreach['levelvv']['iteration']++;
?>
                <li class="">
                        <a href="<?php echo smarty_function_the_url(array('module' => 'product','id' => ($this->_tpl_vars['itemvv']['id']),'product_name' => ($this->_tpl_vars['itemvv']['name'])), $this);?>
" title="<?php echo $this->_tpl_vars['itemvv']['name']; ?>
">
                                <div class="img_box">
                                        <img title="<?php echo $this->_tpl_vars['itemvv']['name']; ?>
" alt="<?php echo $this->_tpl_vars['itemvv']['name']; ?>
" src="<?php echo $this->_tpl_vars['itemvv']['thumb']; ?>
" />
                                </div>
                                <?php echo ((is_array($_tmp=$this->_tpl_vars['itemvv']['name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 45) : smarty_modifier_truncate($_tmp, 45)); ?>

                        </a>
                        <?php if ($this->_tpl_vars['itemvv']['new_price'] || $this->_tpl_vars['itemvv']['price']): ?>
                                <?php if ($this->_tpl_vars['itemvv']['new_price'] != "" && $this->_tpl_vars['itemvv']['new_price'] != 0): ?>
                                        <span class="price"><?php if ($this->_tpl_vars['itemvv']['price']): ?><span class="old_price"><?php echo $this->_tpl_vars['itemvv']['price']; ?>
 <span class="price_unit">VNĐ<?php if ($this->_tpl_vars['itemvv']['price_unit']): ?>/<?php echo $this->_tpl_vars['itemvv']['price_unit']; ?>
<?php endif; ?></span></span><?php endif; ?> <span class="amount"><?php echo $this->_tpl_vars['itemvv']['new_price']; ?>
</span> <span class="price_unit">VNĐ<?php if ($this->_tpl_vars['itemvv']['price_unit']): ?>/<?php echo $this->_tpl_vars['itemvv']['price_unit']; ?>
<?php endif; ?></span></span> <?php if ($this->_tpl_vars['itemvv']['price_note']): ?><span class="noteprice">(<?php echo $this->_tpl_vars['itemvv']['price_note']; ?>
)</span><?php endif; ?>
                                <?php else: ?>
                                        <span class="price"><span class="amount"><?php echo $this->_tpl_vars['itemvv']['price']; ?>
</span> <span class="price_unit">VNĐ<?php if ($this->_tpl_vars['itemvv']['price_unit']): ?>/<?php echo $this->_tpl_vars['itemvv']['price_unit']; ?>
<?php endif; ?></span></span>
                                <?php endif; ?>
                        <?php endif; ?>
                </li>
        <?php endforeach; endif; unset($_from); ?>
</ul>