<?php /* Smarty version 2.6.27, created on 2013-06-03 09:25:21
         compiled from brand_edit.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'formhash', 'brand_edit.html', 32, false),array('modifier', 'default', 'brand_edit.html', 70, false),)), $this); ?>
<?php $this->assign('page_title', ($this->_tpl_vars['_brands'])); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script src="../scripts/jquery/jquery.textbox.js" charset="<?php echo $this->_tpl_vars['charset']; ?>
"></script>
<script>
var allows_maximum_input = "<?php echo $this->_tpl_vars['_allows_maximum_input']; ?>
";
var can_also_enter = "<?php echo $this->_tpl_vars['_can_also_enter']; ?>
";
</script>
<?php echo '
<script>
jQuery(document).ready(function($) {
	$("#BrandDescription").textbox({
		maxLength: 255,
		onInput: function(event, status) {
			$("#txtTips").html(allows_maximum_input+" <strong style=\'font-family:Arial;font-size:1.5em;\'>" + status.maxLength + "</strong> "+can_also_enter+" <strong style=\'font-family:Arial;font-size:1.5em;\'>" + status.leftLength + "</strong>");
		}
	});
})
</script>
'; ?>

<div class="wrap clearfix">
    <div class="sidebar">
       <div class="sidebar_menu">
         <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
       </div>
    </div>
     <div class="main_content">
     <div class="blank"></div>
	 <div class="offer_banner"><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/offer_01.gif" /></div>
     <div class="offer_info_title"><h2><?php echo $this->_tpl_vars['_brands']; ?>
</h2></div>

	  <form method="post" action="brand.php" enctype="multipart/form-data" onsubmit="$('#Save').attr('disabled',true);">
	  <?php echo smarty_function_formhash(array(), $this);?>

	  <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['item']['id']; ?>
">
	  <input type="hidden" name="formattribute_ids" value="<?php echo $this->_tpl_vars['item']['formattribute_ids']; ?>
">
       <div class="hint"><?php echo $this->_tpl_vars['_must_input_with_star']; ?>
</div>
        <table class="offer_info_content">
			  <tr>
				<th><font class="red">*</font> <?php echo $this->_tpl_vars['_brand_name']; ?>
</th>
				<td class="tdright"><input name="data[brand][name]" type="text" id="dataBrandName" value="<?php echo $this->_tpl_vars['item']['name']; ?>
">
				<font color="#666666"><?php echo $this->_tpl_vars['_words_length']; ?>
</font></td>
			  </tr>
			  <tr>
				<th> <?php echo $this->_tpl_vars['_brands']; ?>
<?php echo $this->_tpl_vars['_alias_name']; ?>
</th>
				<td class="tdright"><input name="data[brand][alias_name]" type="text" id="dataBrandAliasName" value="<?php echo $this->_tpl_vars['item']['alias_name']; ?>
">
			     </td>
			  </tr>
			  <tr>
				<th><?php echo $this->_tpl_vars['_brand_type']; ?>
</th>
				<td>
					<select name="data[brand][type_id]" id="BrandTypeId">
                           <?php echo $this->_tpl_vars['BrandtypeOptions']; ?>

					</select>					
				</td>
			  </tr>
			  <tr>
			  <tr>
                    <th><?php echo $this->_tpl_vars['_description']; ?>
</th>
                    <td class="tdright"><textarea name="data[brand][description]" id="BrandDescription" rows="8" wrap="VIRTUAL" style="width:370px;"><?php echo $this->_tpl_vars['item']['description']; ?>
</textarea><div id="txtTips"></div></td>
              </tr>
			<tr>
             <th><?php echo $this->_tpl_vars['_brand_image']; ?>
</th>
                    <td>
                        <input name="pic" type="file" id="uploadfile" onchange="preview()" />
                         <span class="gray"><br>
                            <?php echo $this->_tpl_vars['_image_size_format_provision']; ?>
</span></td>
                    </tr>
                   <tr>
				   <?php if ($this->_tpl_vars['item']['image']): ?>
                     <th></th>
                      <td><a href="<?php echo ((is_array($_tmp=@$this->_tpl_vars['item']['image'])) ? $this->_run_mod_handler('default', true, $_tmp, "javascript:;") : smarty_modifier_default($_tmp, "javascript:;")); ?>
" id="uploadpic_hover" rel="lightbox"><img id="uploadpic" src="<?php echo $this->_tpl_vars['item']['image']; ?>
.small.jpg" alt="<?php echo $this->_tpl_vars['item']['name']; ?>
" width="75" height="75"/></a></td>
					  <?php endif; ?>
                    </tr>
			  <tr>
				<th class="circle_bottomleft"></th>
				<td class="circle_bottomright"><input name="save" type="submit" id="save" value=" <?php echo $this->_tpl_vars['_confirm_submit']; ?>
 "></td>
			  </tr>
          </table>
	</form>
</div>
</div>
<?php echo '
<script>
var type_id="{$item.type_id|default:1}";
jQuery(document).ready(function($) {
$("#Brandtypes option[value=\'"+type_id+"\']").attr("selected","selected");})
</script>
'; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>