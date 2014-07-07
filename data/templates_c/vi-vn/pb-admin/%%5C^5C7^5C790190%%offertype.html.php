<?php /* Smarty version 2.6.27, created on 2014-07-04 10:00:37
         compiled from offertype.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'sprintf', 'offertype.html', 36, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="currentPosition">
	<p><?php echo $this->_tpl_vars['_your_current_position']; ?>
 <?php echo $this->_tpl_vars['_trade_management']; ?>
 &raquo; <?php echo $this->_tpl_vars['_offer']; ?>
</p>
</div>
<div id="rightTop"> 
    <h3><?php echo $this->_tpl_vars['_offer']; ?>
</h3> 
    <ul class="subnav">
		<li><a href="offer.php"><?php echo $this->_tpl_vars['_management']; ?>
</a></li>
		<li><a href="offer.php?do=setting"><?php echo $this->_tpl_vars['_setting']; ?>
</a></li>
		<li><a class="btn1" href="offertype.php"><span><?php echo $this->_tpl_vars['_sorts']; ?>
</span></a></li>
    </ul>
</div>
<div class="mrightTop"> 
    <div class="fontl"><?php echo $this->_tpl_vars['_if_you_changed']; ?>
</div> 
    <div class="fontr"></div> 
</div> 
<div class="tdare">
  <form name="list_frm" id="ListFrm" action="offertype.php" method="post">
  <table width="100%" cellspacing="0" class="dataTable" summary="<?php echo $this->_tpl_vars['_data_zone']; ?>
">
    <thead>
	<tr class="header">
		<th class="firstCell"><label for="idAll"><input type="checkbox" name="idAll" id="idAll" onclick="pbCheckAll(this,'id[]');" title="<?php echo $this->_tpl_vars['_select_switch']; ?>
"></label></th>
		<th><?php echo $this->_tpl_vars['_display_order']; ?>
</th>
		<th><?php echo $this->_tpl_vars['_naming']; ?>
</th>
		<th></th>
		<th><?php echo $this->_tpl_vars['_serial_number']; ?>
</th>
		<th></th>
	</tr>
    </thead>
    <tbody>
	<?php $_from = $this->_tpl_vars['Items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
	<?php if ($this->_tpl_vars['item']['parent_id'] == '0'): ?>
	<tr class="tatr2">
	<td class="firstCell"><input type="checkbox" name="id[]" value="<?php echo $this->_tpl_vars['item']['id']; ?>
" onclick="pbCheckItem(this,'idAll');" id="item_<?php echo $this->_tpl_vars['item']['id']; ?>
" title="<?php echo $this->_tpl_vars['item']['id']; ?>
"></td>
	<td><input type="text" size="3" name="display_order[]" value="<?php echo $this->_tpl_vars['item']['display_order']; ?>
" /></td>
	<td><div><input type="text" name="name[]" value="<?php echo $this->_tpl_vars['item']['name']; ?>
" size="15" />&nbsp;&nbsp;<a href="###" onclick="addrowdirect=1;addrow(this, 1, <?php echo $this->_tpl_vars['item']['id']; ?>
)" class="addchildboard"><?php echo $this->_tpl_vars['_add']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['_type_levels'])) ? $this->_run_mod_handler('sprintf', true, $_tmp, 2) : sprintf($_tmp, 2)); ?>
</a></div></td>
	<td></td>
	<td><input type="text" name="tid[]" value="<?php echo $this->_tpl_vars['item']['id']; ?>
" size="15" /></td>
	<td class="handler">
           <ul id="handler_icon">
            <li><a class="btn_delete" href="offertype.php?id=<?php echo $this->_tpl_vars['item']['id']; ?>
&do=del" title="<?php echo $this->_tpl_vars['_delete']; ?>
"><?php echo $this->_tpl_vars['_delete']; ?>
</a></li>
          </ul>		  </td>
	</tr>
	<?php $_from = $this->_tpl_vars['Items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item1']):
?>
	<?php if ($this->_tpl_vars['item1']['parent_id'] == $this->_tpl_vars['item']['id']): ?>
	<tr class="tatr2">
	<td></td>
	<td><input type="text" size="3" name="display_order[]" value="<?php echo $this->_tpl_vars['item1']['display_order']; ?>
" /></td>
	<td><div class="lastboard"><input type="text" name="name[]" value="<?php echo $this->_tpl_vars['item1']['name']; ?>
" size="15" /></div></td>
	<td></td>
	<td><input type="text" name="tid[]" value="<?php echo $this->_tpl_vars['item1']['id']; ?>
" size="15" /></td>
	<td class="handler">
           <ul id="handler_icon">
            <li><a class="btn_delete" href="offertype.php?id=<?php echo $this->_tpl_vars['item1']['id']; ?>
&do=del" title="<?php echo $this->_tpl_vars['_delete']; ?>
"><?php echo $this->_tpl_vars['_delete']; ?>
</a></li>
          </ul>		  </td>
	</tr>
	<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
	<?php endif; ?>
	<?php endforeach; else: ?>
	<tr class="no_data info">
	  <td colspan="5"><?php echo $this->_tpl_vars['_no_datas']; ?>
</td>
	</tr>
	<?php endif; unset($_from); ?>
	<tr><td colspan="1"></td><td colspan="5"><div><a href="###" onclick="addrow(this, 0, 0)" class="addtr">&nbsp;<?php echo $this->_tpl_vars['_add']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['_type_levels'])) ? $this->_run_mod_handler('sprintf', true, $_tmp, 1) : sprintf($_tmp, 1)); ?>
</a></div></td></tr>
    </tbody>
	</table>
	<div id="dataFuncs" title="<?php echo $this->_tpl_vars['_action_zone']; ?>
">
    <div class="left paddingT15" id="batchAction">
      <input type="submit" name="del" value="<?php echo $this->_tpl_vars['_delete']; ?>
" class="formbtn batchButton"/>
      <input type="submit" name="update" value="<?php echo $this->_tpl_vars['_submit']; ?>
" class="formbtn batchButton"/>
    </div>
    <div class="clear"/>
    </div>
	</form>
</div>
<?php echo '
<script type="text/JavaScript">
	var rowtypedata = [
		[[1, \'\', \'td25\'], [1,\'<input name="newdisplayorder[]" value="" size="3" type="text">\', \'td25\'], [1, \'<input name="newname[]" value="" size="15" type="text">\'], [1, \'\', \'\'], [5, \'<input name="newid[]" value="" size="15" type="text"><input type="hidden" name="newparentid[]" value="0" />\']],
		[[1, \'\', \'td25\'], [1,\'<input name="newdisplayorder[]" value="" size="3" type="text">\', \'td25\'], [1, \'<div class=\\"board\\"><input name="newname[]" value="" size="15" type="text"></div>\'], [1, \'\', \'\'], [5, \'<input name="newid[]" value="" size="15" type="text"><input type="hidden" name="newparentid[]" value="{1}" />\']]
	];
	function app(obj) {
		var inputs = obj.parentNode.parentNode.getElementsByTagName(\'input\');
		for(var i = 0; i < inputs.length; i++) {
			if(inputs[i].name == \'newname[]\') {
				inputs[i].value = obj.options[obj.options.selectedIndex].innerHTML;
			} else if(inputs[i].name == \'newid[]\') {
				inputs[i].value = obj.value;
			}
		}
	}
</script>
'; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>