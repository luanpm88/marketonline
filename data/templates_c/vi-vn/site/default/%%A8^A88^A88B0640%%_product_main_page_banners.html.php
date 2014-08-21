<?php /* Smarty version 2.6.27, created on 2014-08-13 14:58:04
         compiled from default%5Cproduct/_product_main_page_banners.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'default\\product/_product_main_page_banners.html', 8, false),array('modifier', 'truncate', 'default\\product/_product_main_page_banners.html', 10, false),)), $this); ?>

<div class="box"><div class="box_inner">
<ul class="">
<?php $_from = $this->_tpl_vars['ads']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['level']['iteration']++;
?>


    <li class="product<?php echo $this->_tpl_vars['item']['id']; ?>
 boxcols">
        <a target="_blank" class="leftlogodetailz" href="<?php echo smarty_function_the_url(array('module' => 'ad','id' => ($this->_tpl_vars['item']['id'])), $this);?>
">
                <img title="<?php echo $this->_tpl_vars['item']['title']; ?>
" alt="<?php echo $this->_tpl_vars['item']['title']; ?>
" src="<?php echo $this->_tpl_vars['item']['src']; ?>
" />
                <?php if ($this->_tpl_vars['item']['description']): ?><span class="description"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['description'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 100) : smarty_modifier_truncate($_tmp, 100)); ?>
</span><?php endif; ?>
        </a>
    </li>


<?php endforeach; endif; unset($_from); ?></ul>
</div></div>
<br style="clear: both" />