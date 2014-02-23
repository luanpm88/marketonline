<?php /* Smarty version 2.6.27, created on 2013-06-08 03:10:12
         compiled from type.edit.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="currentPosition">
	<p><?php echo $this->_tpl_vars['_your_current_position']; ?>
 <?php echo $this->_tpl_vars['_extension']; ?>
 &raquo; <?php echo $this->_tpl_vars['_options']; ?>
</p>
</div>
<div id="rightTop"> 
    <h3><?php echo $this->_tpl_vars['_options']; ?>
</h3> 
    <ul class="subnav">
		<li><a href="type.php"><?php echo $this->_tpl_vars['_management']; ?>
</a></li>
        <li><a class="btn1" href="type.php?do=edit"><span><?php echo $this->_tpl_vars['_add_or_edit']; ?>
</span></a></li>
    </ul>
</div>
<div class="info">
  <form method="post" action="type.php" id="EditFrm" name="edit_frm">
  	<input type="hidden" name="page" value="<?php echo $_GET['page']; ?>
" />
	<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['item']['id']; ?>
" />
	<input type="hidden" name="do" value="typeoption" />
    <table class="infoTable">
      <tr>
        <th class="paddingT15"> <?php echo $this->_tpl_vars['_title']; ?>
<?php echo $this->_tpl_vars['_colon']; ?>
</th>
        <td class="paddingT15 wordSpacing5">          
		<input class="infoTableInput2" name="data[typeoption][option_label]" value="<?php echo $this->_tpl_vars['item']['option_label']; ?>
" /></td>
      </tr>
      <tr>
        <th class="paddingT15"> <?php echo $this->_tpl_vars['_param_value']; ?>
</th>
        <td class="paddingT15 wordSpacing5">          
		<input class="infoTableInput2" name="data[typeoption][option_value]" value="<?php echo $this->_tpl_vars['item']['option_value']; ?>
" /></td>
      </tr>
      <tr>
        <th class="paddingT15"><?php echo $this->_tpl_vars['_param_type']; ?>
</th>
        <td class="paddingT15 wordSpacing5">
		<div id="divEdit" style="display: block;">
		<select name="data[typeoption][typemodel_id]">
		<?php $_from = $this->_tpl_vars['TypeModels']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item1']):
?>
		<option value="<?php echo $this->_tpl_vars['item1']['id']; ?>
" <?php if ($this->_tpl_vars['item1']['id'] == $this->_tpl_vars['item']['typemodel_id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['item1']['title']; ?>
:<?php echo $this->_tpl_vars['item1']['type_name']; ?>
</option>
		<?php endforeach; endif; unset($_from); ?>
		</select>&nbsp;<input class="formbtn" type="button" name="add" id="Add" value="<?php echo $this->_tpl_vars['_add']; ?>
" />
		</div>
		<div id="divAdd" style="display: none;">
		<input class="infoTableInput2" name="data[typemodel][title]" value="" />:<input class="infoTableInput2" name="data[typemodel][type_name]" value="" />
		</div>
		</td>
      </tr>
      <tr>
        <th></th>
        <td class="ptb20">
			<input class="formbtn" type="submit" name="save" value="<?php echo $this->_tpl_vars['_save_and_pub']; ?>
" />		</td>
      </tr>
    </table>
  </form>
</div>
<?php echo '
<script language="javascript">
$(function(){
	$("#Add").click(
		function(){
				$("#divAdd").slideToggle(\'fast\');
			}
		);
	})
</script>
'; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>