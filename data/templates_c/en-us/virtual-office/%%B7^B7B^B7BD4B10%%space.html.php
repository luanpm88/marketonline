<?php /* Smarty version 2.6.27, created on 2013-05-22 08:55:15
         compiled from space.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'space.html', 17, false),array('function', 'formhash', 'space.html', 30, false),)), $this); ?>
<?php $this->assign('page_title', ($this->_tpl_vars['_diy_website'])); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
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
 <div class="offer_info_title"><h2><?php echo $this->_tpl_vars['page_title']; ?>
</h2></div>
  <table class="bggray">
	<tr>
	  <td class="gray" style="width:545px;"><span class="orange"><?php echo $this->_tpl_vars['_friendly_tip']; ?>
</span><?php echo $this->_tpl_vars['_space_name']; ?>
<?php echo $this->_tpl_vars['_change_style']; ?>
</td>
	  <td style="width:90px;"><a href="javascript:;" onclick="$('#SpaceNameModify').toggle();" class="btn_publish"><?php echo $this->_tpl_vars['_modify']; ?>
<?php echo $this->_tpl_vars['_space_name']; ?>
<?php echo $this->_tpl_vars['_name']; ?>
</a> </td>
      <td style="width:100px;"> <a href="<?php echo smarty_function_the_url(array('module' => 'space','id' => ($this->_tpl_vars['COMPANYINFO']['id']),'userid' => ($this->_tpl_vars['COMPANYINFO']['cache_spacename'])), $this);?>
" target="_blank" class="btn_publish" ><?php echo $this->_tpl_vars['_click_preview']; ?>
</a></td>
	</tr>
	<tbody id="SpaceNameModify" style="display:none;">
	<form name="space_form" action="<?php echo $_SERVER['PHP_SELF']; ?>
" method="post">
	<tr>
	  <td  colspan="3" class="gray"><?php echo $this->_tpl_vars['_space_name']; ?>
<?php echo $this->_tpl_vars['_name_n']; ?>
<input type="text" name="data[space_name]" id="dataSpaceName" value="<?php echo $this->_tpl_vars['COMPANYINFO']['cache_spacename']; ?>
" style="text-align:center;ime-mode:disabled;width:350px;" onkeyup="value=value.replace(/[^\w\.\/]/ig,'')" maxlength="100">&nbsp;<input type="submit" name="updateSpaceName" value="<?php echo $this->_tpl_vars['_submit_changes']; ?>
">&nbsp;<?php echo $this->_tpl_vars['_left_bracket']; ?>
<?php echo $this->_tpl_vars['_space_name']; ?>
<?php echo $this->_tpl_vars['_english_number_portfolio']; ?>
<?php echo $this->_tpl_vars['_right_bracket']; ?>

	  </td>
      
	</tr>
	</form>
	</tbody>
  </table>      
  <form name="stylefrm" action="<?php echo $_SERVER['PHP_SELF']; ?>
" method="post">
  <?php echo smarty_function_formhash(array(), $this);?>

  <table class="temp_style">
	<tr>
	<?php $_from = $this->_tpl_vars['Items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['templet'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['templet']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['templet']['iteration']++;
?>
	  <td>
	  <label for="style_<?php echo $this->_tpl_vars['item']['id']; ?>
"><a href="javascript:;" onclick="$('#skin_<?php echo $this->_tpl_vars['item']['id']; ?>
').show();"><img height="155" src="<?php echo $this->_tpl_vars['item']['picture']; ?>
" disabled="disabled"><span></span></a></label>
		<br>
		<label for="style_<?php echo $this->_tpl_vars['item']['id']; ?>
"><input type="radio" value="<?php echo $this->_tpl_vars['item']['id']; ?>
" name="data[member][styleid]" id="style_<?php echo $this->_tpl_vars['item']['id']; ?>
" <?php if ($this->_tpl_vars['item']['id'] == $this->_tpl_vars['templet_id']): ?>checked<?php endif; ?>><?php echo $this->_tpl_vars['item']['title']; ?>
</label>
		<?php if ($this->_tpl_vars['item']['styles']): ?>
		<div style="display:none;" id="skin_<?php echo $this->_tpl_vars['item']['id']; ?>
">
		<?php echo $this->_tpl_vars['_theme_n']; ?>
<select name="data[skin][<?php echo $this->_tpl_vars['item']['id']; ?>
]" id="skinsStyle<?php echo $this->_tpl_vars['item']['id']; ?>
">
			<?php $_from = $this->_tpl_vars['item']['styles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['skinkey'] => $this->_tpl_vars['skinitem']):
?>
			<option value="<?php echo $this->_tpl_vars['skinkey']; ?>
" <?php if ($this->_tpl_vars['style_id'] == $this->_tpl_vars['skinkey']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['skinitem']; ?>
</option>
			<?php endforeach; endif; unset($_from); ?>
			</select>
		</div>
		<?php endif; ?>
	</td>
	<?php if (!($this->_foreach['templet']['iteration'] % 4)): ?>
	</tr><tr>
	<?php endif; ?>
	<?php endforeach; else: ?>
	<td><?php echo $this->_tpl_vars['_no_provide_template']; ?>
</td>
	<?php endif; unset($_from); ?>
	</tr>
	</table>
	  <table class="trade_line">
		<tr>
		  <td height="1" background="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/index_trade_line.gif"></td>
		</tr>
	   <tr align="center" valign="bottom">
	  <td height="40">
	  <input name="save" type="submit" id="Save" value="<?php echo $this->_tpl_vars['_choose_submit']; ?>
">
	  </td>
	</tr>
  </table>
  </form>
	<table class="attentions">
		<tr>
		<?php echo $this->_tpl_vars['_change_style_tips']; ?>

		</tr>
	</table>
</div>
</div>
<?php echo '
<script type="text/javascript"> 
var lb=document.getElementsByTagName(\'label\'); 
for (i=0;i<lb.length;i++) { 
	lb[i].onclick=function () { 
		var lbfor=this.getAttribute(\'for\')?this.getAttribute(\'for\'):this.getAttribute(\'HTMLfor\')+\'\'; 
		document.getElementById(lbfor).click(); 
		document.getElementById(lbfor).focus(); 
	}             
} 
</script>
'; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>