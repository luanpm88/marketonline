<?php /* Smarty version 2.6.27, created on 2013-06-11 12:23:32
         compiled from membertype.edit.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pl', 'membertype.edit.html', 32, false),array('function', 'html_options', 'membertype.edit.html', 48, false),array('modifier', 'pl', 'membertype.edit.html', 48, false),)), $this); ?>
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
	$( "#multi_lang_tabs" ).tabs();
	$( "#tabs-ta" ).tabs();
})
</script>
'; ?>

<div id="currentPosition">
	<p><?php echo $this->_tpl_vars['_your_current_position']; ?>
 <?php echo $this->_tpl_vars['_member_center']; ?>
 &raquo; <?php echo $this->_tpl_vars['_user_center']; ?>
 &raquo; <?php echo $this->_tpl_vars['_sorts']; ?>
</p>
</div>
<div id="rightTop"> 
    <h3><?php echo $this->_tpl_vars['_member']; ?>
</h3> 
    <ul class="subnav">
		<li><a href="member.php"><?php echo $this->_tpl_vars['_management']; ?>
</a></li>
        <li><a href="membertype.php"><?php echo $this->_tpl_vars['_sorts']; ?>
</a></li>
        <li><a class="btn1" href="membertype.php?do=edit"><span><?php echo $this->_tpl_vars['_add_or_edit']; ?>
</span></a></li>
    </ul>
</div>
<div class="info">
  <form method="post" action="membertype.php" id="EditFrm" name="edit_frm">
  <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['item']['id']; ?>
" />
    <table class="infoTable">
      <tr>
        <th class="paddingT15"> <?php echo $this->_tpl_vars['_naming_n']; ?>
</th>
        <td class="paddingT15 wordSpacing5">
		<div id="multi_lang_tabs">
		<?php echo smarty_function_pl(array('frm' => 'input','values' => $this->_tpl_vars['item']['name'],'class' => 'infoTableInput2'), $this);?>

		</div>
		</td>
      </tr>   
      <tr>
        <th class="paddingT15"> <?php echo $this->_tpl_vars['_digest_n']; ?>
</th>
        <td class="paddingT15 wordSpacing5">
		<div id="tabs-ta">
		<?php echo smarty_function_pl(array('frm' => 'textarea','values' => $this->_tpl_vars['item']['description'],'style' => "width:550px;height:50px;"), $this);?>

		</div>
		</td>
      </tr>
      <tr>
        <th class="paddingT15"><?php echo $this->_tpl_vars['_default']; ?>
<?php echo $this->_tpl_vars['_member_group']; ?>
<?php echo $this->_tpl_vars['_colon']; ?>
</th>
        <td class="paddingT15 wordSpacing5">
        <select name="data[membertype][default_membergroup_id]" id="dataMembertypeGroupId">
        <?php echo smarty_function_html_options(array('options' => ((is_array($_tmp=$this->_tpl_vars['Membergroups'])) ? $this->_run_mod_handler('pl', true, $_tmp) : smarty_modifier_pl($_tmp)),'selected' => $this->_tpl_vars['item']['default_membergroup_id']), $this);?>

        </select>        </td>
      </tr>
      <tr>
        <th></th>
        <td class="ptb20">
			<input class="formbtn" type="submit" name="save" value="<?php echo $this->_tpl_vars['_save']; ?>
" />		</td>
      </tr>
    </table>
  </form>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>