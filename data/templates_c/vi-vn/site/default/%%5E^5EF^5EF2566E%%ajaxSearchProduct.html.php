<?php /* Smarty version 2.6.27, created on 2014-07-10 09:34:30
         compiled from default%5Cproduct/ajaxSearchProduct.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'default\\product/ajaxSearchProduct.html', 8, false),array('modifier', 'truncate', 'default\\product/ajaxSearchProduct.html', 12, false),)), $this); ?>
<div class="top_title">Sản phẩm</div>
<?php if ($this->_tpl_vars['list']): ?>
<div class="search-scroll">
<ul class="product">
    
    <?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['level']['iteration']++;
?>
        
            <li onclick="window.location=<?php echo smarty_function_the_url(array('id' => ($this->_tpl_vars['item']['id']),'module' => 'product','product_name' => ($this->_tpl_vars['item']['name']),'service' => ($this->_tpl_vars['item']['service'])), $this);?>
">
                <img src="<?php echo $this->_tpl_vars['item']['thumb']; ?>
" />
                <h2>
                    <a href="<?php echo smarty_function_the_url(array('id' => ($this->_tpl_vars['item']['id']),'module' => 'product','product_name' => ($this->_tpl_vars['item']['name']),'service' => ($this->_tpl_vars['item']['service'])), $this);?>
">
                        <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 40) : smarty_modifier_truncate($_tmp, 40)); ?>

                    </a>
                </h2>
                <p>
                    <?php echo $this->_tpl_vars['item']['shop_name']; ?>

                </p>
                <p>
                    <?php if ($this->_tpl_vars['item']['new_price'] || $this->_tpl_vars['item']['price']): ?>
			<?php if ($this->_tpl_vars['item']['new_price'] != "" && $this->_tpl_vars['item']['new_price'] != 0): ?>
				<span class="price">
                                    
                                    <span class="amount">
                                        <?php echo $this->_tpl_vars['item']['new_price']; ?>

                                    </span>
                                    <span class="price_unit">
                                        VNĐ<?php if ($this->_tpl_vars['item']['price_unit']): ?>/<?php echo $this->_tpl_vars['item']['price_unit']; ?>
<?php endif; ?>
                                    </span>
                                    <?php if ($this->_tpl_vars['item']['price']): ?>
                                    <!--<span class="old_price">
                                        <?php echo $this->_tpl_vars['item']['price']; ?>

                                        <span class="price_unit">
                                            VNĐ<?php if ($this->_tpl_vars['item']['price_unit']): ?>/<?php echo $this->_tpl_vars['item']['price_unit']; ?>
<?php endif; ?>
                                        </span>
                                    </span>-->
                                    <?php endif; ?>
                                </span>
			<?php else: ?>
				<span class="price"><span class="amount"><?php echo $this->_tpl_vars['item']['price']; ?>
</span> <span class="price_unit">VNĐ<?php if ($this->_tpl_vars['item']['price_unit']): ?>/<?php echo $this->_tpl_vars['item']['price_unit']; ?>
<?php endif; ?></span></span>
			<?php endif; ?>
                    <?php endif; ?>
                </p>
            </li>
        
    <?php endforeach; endif; unset($_from); ?>
    <li class="more-topsearch" onclick="window.location='<?php echo smarty_function_the_url(array('module' => "root-url"), $this);?>
index.php?do=product&level=search&keyword=<?php echo $_GET['keyword']; ?>
'">
        <h2><a href="<?php echo smarty_function_the_url(array('module' => "root-url"), $this);?>
index.php?do=product&level=search&keyword=<?php echo $_GET['keyword']; ?>
">
        Xem thêm...
        </a></h2>
    </li>
</ul>

</div>
<?php else: ?>
    <div class="no-search-top">Không có sản phẩm phù hợp</div>
<?php endif; ?>