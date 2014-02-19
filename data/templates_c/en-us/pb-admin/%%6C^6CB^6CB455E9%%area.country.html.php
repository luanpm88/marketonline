<?php /* Smarty version 2.6.27, created on 2013-05-14 01:40:23
         compiled from area.country.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="currentPosition">
	<p><?php echo $this->_tpl_vars['_your_current_position']; ?>
 <?php echo $this->_tpl_vars['_setting_global']; ?>
 &raquo; <?php echo $this->_tpl_vars['_area']; ?>
</p>
</div>
<div id="rightTop"> 
    <h3><?php echo $this->_tpl_vars['_area']; ?>
</h3> 
    <ul class="subnav">
		<li><a href="area.php"><?php echo $this->_tpl_vars['_management']; ?>
</a></li>
        <li><a href="area.php?do=edit"><?php echo $this->_tpl_vars['_add_or_edit']; ?>
</a></li>
        <li><a class="btn1" href="area.php?do=country"><span><?php echo $this->_tpl_vars['_country']; ?>
</span></a></li>
        <li><a href="areatype.php"><?php echo $this->_tpl_vars['_sorts']; ?>
</a></li>
        <li><a href="area.php?do=clear"><?php echo $this->_tpl_vars['_clearing']; ?>
</a></li>
        <li><a href="area.php?do=refresh"><?php echo $this->_tpl_vars['_update_cache']; ?>
</a></li>
    </ul>
</div>
<div class="tdare">
  <form name="list_frm" id="ListFrm" action="area.php" method="post">
  <table width="100%" cellspacing="0" class="dataTable" summary="<?php echo $this->_tpl_vars['_data_zone']; ?>
">
    <thead>
		<tr>
		  <th class="firstCell"><input type="checkbox" name="idAll" id="idAll" onclick="pbCheckAll(this,'id[]');" title="<?php echo $this->_tpl_vars['_select_switch']; ?>
"></th>
		  <th><?php echo $this->_tpl_vars['_serial_number']; ?>
</th>
		  <th><?php echo $this->_tpl_vars['_display_order']; ?>
</th>
		  <th><label for="idAll"><?php echo $this->_tpl_vars['_naming']; ?>
</label></th>
	    </tr>
    </thead>
    <tbody>	<?php $_from = $this->_tpl_vars['Items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
		<tr class="tatr2">
		  <td class="firstCell"><input type="checkbox" name="id[]" value="<?php echo $this->_tpl_vars['item']['id']; ?>
" onclick="pbCheckItem(this,'idAll');" id="item_<?php echo $this->_tpl_vars['item']['id']; ?>
" title="<?php echo $this->_tpl_vars['item']['id']; ?>
">
		  <input type="hidden" name="tid[]" value="<?php echo $this->_tpl_vars['item']['id']; ?>
" />		  </td>
		  <td><input type="text" name="data[name][]" value="<?php echo $this->_tpl_vars['item']['name']; ?>
"></td>
		  <td><input type="text" name="data[display_order][]" value="<?php echo $this->_tpl_vars['item']['display_order']; ?>
"></td>
		  <td><input type="text" name="data[picture][]" value="<?php echo $this->_tpl_vars['item']['picture']; ?>
">&nbsp;&nbsp;<img src="../images/country/<?php echo $this->_tpl_vars['item']['picture']; ?>
" alt="<?php echo $this->_tpl_vars['item']['name']; ?>
" /></td>
	    </tr>
		<?php endforeach; else: ?>
		<tr class="no_data info">
		  <td colspan="4"><?php echo $this->_tpl_vars['_no_datas']; ?>
</td>
		</tr>
	<?php endif; unset($_from); ?>
    </tbody>
	<tbody>
	  <tr class="tatr2" id="tRow0" style="display : none ;">
        <td></td>
        <td><input type="text" name="name[]" value="" /></td>
        <td><input type="text" name="display_order[]" value="0" /></td>
        <td><input type="text" name="picture[]" value="" /></td>
	  </tr>
	</tbody>    
	<tr class="tatr2">
		<td></td>
		<td colspan="4"><img src="<?php echo $this->_tpl_vars['admin_theme_path']; ?>
images/add.gif" /><a href="javascript:;" onclick="$('#tRow0').clone().show().appendTo( $('#tRow0').parent() );" style="color: blue;">&nbsp;<?php echo $this->_tpl_vars['_add_new_type']; ?>
</a></td>
	</tr>
	</table>
	<div id="dataFuncs" title="<?php echo $this->_tpl_vars['_action_zone']; ?>
">
    <div class="left paddingT15" id="batchAction">
      <input type="submit" name="del_country" value="<?php echo $this->_tpl_vars['_delete']; ?>
" class="formbtn batchButton"/>
      <input type="submit" name="update_country" value="<?php echo $this->_tpl_vars['_submit']; ?>
" class="formbtn batchButton"/>
    </div>
    <div class="pageLinks"><?php echo $this->_tpl_vars['ByPages']; ?>
</div>
    <div class="clear"/>
    </div>
	</form>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>