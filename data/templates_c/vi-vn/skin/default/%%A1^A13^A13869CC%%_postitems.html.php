<?php /* Smarty version 2.6.27, created on 2014-08-13 15:43:54
         compiled from ../../default/_postitems.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', '../../default/_postitems.html', 3, false),)), $this); ?>

<?php if ($this->_tpl_vars['pb_username'] != ""): ?>
<a target="_blank" href="<?php echo smarty_function_the_url(array('module' => 'redirect','url' => "/virtual-office/product.php?do=edit"), $this);?>
"><?php echo $this->_tpl_vars['_post_product']; ?>
</a>
<a target="_blank" href="<?php echo smarty_function_the_url(array('module' => 'redirect','url' => "/virtual-office/product.php?do=edit%26type=service"), $this);?>
"><?php echo $this->_tpl_vars['_add_service']; ?>
</a>

<?php else: ?>
<a class="comment_but" target="_blank" href="#login-box" redirect="<?php echo smarty_function_the_url(array('module' => 'redirect','url' => "/virtual-office/product.php?do=edit"), $this);?>
"><?php echo $this->_tpl_vars['_post_product']; ?>
</a>
<a class="comment_but" target="_blank" href="#login-box" redirect="<?php echo smarty_function_the_url(array('module' => 'redirect','url' => "/virtual-office/product.php?do=edit%26type=service"), $this);?>
"><?php echo $this->_tpl_vars['_add_service']; ?>
</a>
<?php endif; ?>