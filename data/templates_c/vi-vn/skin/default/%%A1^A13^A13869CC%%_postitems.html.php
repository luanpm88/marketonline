<?php /* Smarty version 2.6.27, created on 2014-07-07 10:35:52
         compiled from ../../default/_postitems.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', '../../default/_postitems.html', 1, false),)), $this); ?>
<a target="_blank" href="<?php echo smarty_function_the_url(array('module' => 'redirect','url' => "/virtual-office/product.php?do=edit"), $this);?>
"><?php echo $this->_tpl_vars['_post_product']; ?>
</a>
	<a target="_blank" href="<?php echo smarty_function_the_url(array('module' => 'redirect','url' => "/virtual-office/product.php?do=edit%26type=service"), $this);?>
"><?php echo $this->_tpl_vars['_add_service']; ?>
</a>