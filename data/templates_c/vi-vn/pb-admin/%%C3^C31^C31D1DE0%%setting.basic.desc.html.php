<?php /* Smarty version 2.6.27, created on 2013-05-21 09:33:12
         compiled from setting.basic.desc.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pl', 'setting.basic.desc.html', 30, false),array('function', 'editor', 'setting.basic.desc.html', 45, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<link rel="stylesheet" type="text/css" href="../scripts/jquery/jquery-ui.css" />
<script src="../scripts/jquery/jquery-ui.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../css/reset.css" />
<?php echo '
<script>
jQuery(document).ready(function($) {
	$( "#tabs-ta" ).tabs();
})
</script>
'; ?>

<div id="currentPosition">
	<p><?php echo $this->_tpl_vars['_your_current_position']; ?>
 <?php echo $this->_tpl_vars['_setting_global']; ?>
 &raquo; <?php echo $this->_tpl_vars['_site_info']; ?>
</p>
</div>
<div id="rightTop">
	<h3><?php echo $this->_tpl_vars['_site_info']; ?>
</h3>
	<ul class="subnav">
		<li><a href="setting.php?do=basic"><?php echo $this->_tpl_vars['_basic_setting']; ?>
</a></li>
		<li><a href="setting.php?do=basic_contact"><?php echo $this->_tpl_vars['_contact_method']; ?>
</a></li>
		<li><a class="btn1" href="setting.php?do=basic_desc"><span><?php echo $this->_tpl_vars['_site_desc']; ?>
</span></a></li>
	</ul>
</div>
<div class="info">
  <form method="post">
    <table class="infoTable">
      <tr>
        <th class="paddingT15"><label for="price_format"> <?php echo $this->_tpl_vars['_site_desc_n']; ?>
</label></th>
        <td class="paddingT15 wordSpacing5">
		<div id="tabs-ta">
		<?php echo smarty_function_pl(array('frm' => 'textarea','values' => $this->_tpl_vars['item']['SITE_DESCRIPTION'],'style' => "width:650px;height:300px;"), $this);?>

		</div>
	
          <span class="gray"><?php echo $this->_tpl_vars['_site_desc_and_show']; ?>
</span>
		</td>
      </tr>
      <tr>
        <th></th>
        <td class="ptb20"><input class="formbtn" type="submit" name="savebasic" value="<?php echo $this->_tpl_vars['_submit']; ?>
" />
          <input class="formbtn" type="reset" name="reset" value="<?php echo $this->_tpl_vars['_reset']; ?>
" />
        </td>
      </tr>
    </table>
  </form>
</div>
<?php echo smarty_function_editor(array('type' => 'tiny_mce'), $this);?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>