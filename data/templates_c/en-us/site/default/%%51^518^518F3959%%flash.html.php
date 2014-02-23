<?php /* Smarty version 2.6.27, created on 2013-05-27 03:02:37
         compiled from default/flash.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/header.html", 'smarty_include_vars' => array('page_title' => ($this->_tpl_vars['page_title']))));
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
                        <?php echo $this->_tpl_vars['_login']; ?>
                    </h1>

        

    </div>
    <div class="fifteen columns"><div class="line"></div></div>
</div>


<div class="row">



       <div class="wrapper">
  <div class="blank6"></div>
  <div class="content">
	 <div class="info_tip clearfix">
		<div class="info_tip_left">
		<div class="info_tip_service clearfix">
			<span class="<?php echo $this->_tpl_vars['action_style']; ?>
"><?php echo $this->_tpl_vars['message']; ?>
</span>
		</div>
		</div>
		<div class="info_tip_right">
		<p class="back button"><a href="javascript:history.go(-1);"><?php echo $this->_tpl_vars['_go_back']; ?>
</a></p>
		<p class="close button"><a href="javascript:;" onclick="window.opener=null;window.close();"><?php echo $this->_tpl_vars['_close_window']; ?>
</a></p>
	   </div>         
	 </div>
  </div>
</div>
			

</div>



</div>
  </div>











<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>