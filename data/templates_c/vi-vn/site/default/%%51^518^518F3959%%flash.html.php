<?php /* Smarty version 2.6.27, created on 2014-08-15 10:41:27
         compiled from default/flash.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/header.html", 'smarty_include_vars' => array('page_title' => ($this->_tpl_vars['box_title']))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo $this->_tpl_vars['redirectz']; ?>

<?php echo $this->_tpl_vars['js_head']; ?>







<div id="body-wrapper" >
<div id="body-wrapper-padding">
<!--[if lt IE 7]>
<div class="alert">Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different
    browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to
    experience this site.
</div><![endif]-->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/topmenu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<div class="row">
    <div class="fifteen columns" id="page-title">
        <a class="back" href="javascript:history.back()"></a>
        <div class="subtitle">
            
                        <p><?php echo $this->_tpl_vars['_announcement']; ?>
</p>
        </div>
        <h1 class="page-title">
                        <?php echo $this->_tpl_vars['page_title']; ?>
                    </h1>

        

    </div>

</div>


<div class="row res_box res_done_box flash_boxz">
    <h2><?php echo $this->_tpl_vars['box_title']; ?>
</h2>
    <div class="success_box">
	<h4><?php echo $this->_tpl_vars['message']; ?>
</h4>
    </div>
    
    <div class="reg_foot">
			    
			    <a class="gomail" href="javascript:history.go(-1);"><?php echo $this->_tpl_vars['_go_back']; ?>
</a>
			</div>
</div>

<div class="row">

</div>



</div>
  </div>











<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>