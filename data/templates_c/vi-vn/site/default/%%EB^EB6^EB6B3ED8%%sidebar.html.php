<?php /* Smarty version 2.6.27, created on 2014-02-10 14:14:56
         compiled from default/sidebar.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'default/sidebar.html', 4, false),)), $this); ?>
<div id="main_sidebar">
    <ul>
        <li>
            <a title="Gian hàng sản phẩm" href="<?php echo smarty_function_the_url(array('module' => 'product_main'), $this);?>
" style="background-color:rgba(108, 190, 66, 0.95);">
                <img src="<?php echo $this->_tpl_vars['theme_img_path']; ?>
image/product_bg.png" />
            </a>
        </li>
        <li>
            <a title="Học và làm" href="<?php echo smarty_function_the_url(array('module' => 'jobs'), $this);?>
" style="background-color:#83d328;">
                <img src="<?php echo $this->_tpl_vars['theme_img_path']; ?>
image/job_bg.png" />
            </a>
        </li>        
    </ul>
</div>