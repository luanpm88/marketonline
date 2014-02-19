<?php /* Smarty version 2.6.27, created on 2013-05-16 07:50:40
         compiled from area.edit.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_radios', 'area.edit.html', 77, false),array('modifier', 'default', 'area.edit.html', 77, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<link href="../scripts/jquery/colorpicker.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../scripts/jquery/colorpicker.js"></script>
<script>
var arr = [<?php echo $this->_tpl_vars['colors']; ?>
];
</script>
<?php echo '
<script>
jQuery(document).ready(function($) {
	$.fn.colorPicker.defaultColors = arr;
	$(\'#color1\').colorPicker();
})
</script>
'; ?>

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
        <li><a class="btn1" href="area.php?do=edit"><span><?php echo $this->_tpl_vars['_add_or_edit']; ?>
</span></a></li>
        <li><a href="area.php?do=country"><?php echo $this->_tpl_vars['_country']; ?>
</a></li>
        <li><a href="areatype.php"><?php echo $this->_tpl_vars['_sorts']; ?>
</a></li>
        <li><a href="area.php?do=clear"><?php echo $this->_tpl_vars['_clearing']; ?>
</a></li>
        <li><a href="area.php?do=refresh"><?php echo $this->_tpl_vars['_update_cache']; ?>
</a></li>
    </ul>
</div>
<div class="info">
  <form method="post" action="area.php" id="EditFrm" name="edit_frm">
    <table class="infoTable">
    <?php if ($_GET['id']): ?>
      <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>
" />
      <input type="hidden" name="page" value="<?php echo $_GET['page']; ?>
" />
      <tr>
        <th class="paddingT15"> <?php echo $this->_tpl_vars['_serial_number']; ?>
<?php echo $this->_tpl_vars['_colon']; ?>
</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" name="data[area][id]" value="<?php echo $this->_tpl_vars['item']['id']; ?>
" type="text" />        </td>
      </tr>
      <tr>
        <th class="paddingT15"> <?php echo $this->_tpl_vars['_the_area']; ?>
<?php echo $this->_tpl_vars['_naming_n']; ?>
</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" name="data[area][name]" value="<?php echo $this->_tpl_vars['item']['name']; ?>
" type="text" />&nbsp;<?php echo $this->_tpl_vars['_bold']; ?>
<input type="checkbox" name="highlight[style][1]" <?php if ($this->_tpl_vars['hl']['bold']): ?>checked<?php endif; ?>>&nbsp;<?php echo $this->_tpl_vars['_italic']; ?>
<input type="checkbox" name="highlight[style][2]" <?php if ($this->_tpl_vars['hl']['italic']): ?>checked<?php endif; ?>>&nbsp;<?php echo $this->_tpl_vars['_underline']; ?>
<input type="checkbox" name="highlight[style][3]" <?php if ($this->_tpl_vars['hl']['underline']): ?>checked<?php endif; ?>>&nbsp;<input type="text" name="highlight[color]" id="color1" value="<?php echo $this->_tpl_vars['hl']['color']; ?>
" title="">
		<label class="field_notice"><?php echo $this->_tpl_vars['_top_category_name_not_support_special_sign']; ?>
</label></td>
      </tr>
    <?php else: ?>
      <tr>
        <th class="paddingT15"> <?php echo $this->_tpl_vars['_the_area']; ?>
<?php echo $this->_tpl_vars['_naming_n']; ?>
</th>
        <td class="paddingT15 wordSpacing5"><textarea name="data[names]" id="dataNames"></textarea><label class="field_notice"><?php echo $this->_tpl_vars['_add_more_than_one_line_on_behalf_of_a_record']; ?>
</label></td>
      </tr>
    <?php endif; ?>
      <tr>
        <th class="paddingT15"> <?php echo $this->_tpl_vars['_parent_categories']; ?>
<?php echo $this->_tpl_vars['_colon']; ?>
</th>
        <td class="paddingT15 wordSpacing5">
        <select name="data[area][parent_id]" id="dataParentId">
        <option value="0"><?php echo $this->_tpl_vars['_no']; ?>
</option>
        <?php echo $this->_tpl_vars['CacheItems']; ?>

        </select>
       </td>
      </tr>
      <tr>
        <th class="paddingT15"> <?php echo $this->_tpl_vars['_param_type']; ?>
</th>
        <td class="paddingT15 wordSpacing5">
         <select name="data[area][areatype_id]" id="dataTypeId">
			<option value="0"><?php echo $this->_tpl_vars['_no']; ?>
</option>
            <?php $_from = $this->_tpl_vars['Types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key3'] => $this->_tpl_vars['item3']):
?>
            <option value="<?php echo $this->_tpl_vars['key3']; ?>
" <?php if ($this->_tpl_vars['key3'] == $this->_tpl_vars['item']['areatype_id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['item3']; ?>
</option>
            <?php endforeach; endif; unset($_from); ?>
        </select>   
        </td>
      </tr>
      <tr>
        <th class="paddingT15"> <?php echo $this->_tpl_vars['_link_url']; ?>
</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" name="data[area][url]" value="<?php echo $this->_tpl_vars['item']['url']; ?>
" type="text" /><label class="field_notice"><?php echo $this->_tpl_vars['_empty_will_be_default_url']; ?>
</label>        
		</td>
      </tr>
      <tr>
        <th class="paddingT15"> <?php echo $this->_tpl_vars['_whether_or']; ?>
<?php echo $this->_tpl_vars['_show_it']; ?>
<?php echo $this->_tpl_vars['_colon']; ?>
</th>
        <td class="paddingT15 wordSpacing5"><?php echo smarty_function_html_radios(array('name' => "data[area][available]",'options' => $this->_tpl_vars['AskAction'],'checked' => ((is_array($_tmp=@$this->_tpl_vars['item']['available'])) ? $this->_run_mod_handler('default', true, $_tmp, 1) : smarty_modifier_default($_tmp, 1)),'separator' => ""), $this);?>
</td>
      </tr>
      <tr>
        <th class="paddingT15"> <?php echo $this->_tpl_vars['_display_order']; ?>
</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" name="data[area][display_order]" type="text" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['item']['display_order'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
"></td>
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
<script>
var parent_id = "<?php echo ((is_array($_tmp=@$this->_tpl_vars['item']['parent_id'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
";
var areatype_id = "<?php echo ((is_array($_tmp=@$this->_tpl_vars['item']['areatype_id'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
";
</script>
<?php echo '
<script>
jQuery(document).ready(function($) {
	$(\'#dataParentId\').val(parent_id);
	$(\'#dataTypeId\').val(areatype_id);
})
</script>
'; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>