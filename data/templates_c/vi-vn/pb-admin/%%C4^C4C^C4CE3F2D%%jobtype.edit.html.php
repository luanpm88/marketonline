<?php /* Smarty version 2.6.27, created on 2013-06-08 02:04:11
         compiled from jobtype.edit.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_radios', 'jobtype.edit.html', 54, false),array('modifier', 'default', 'jobtype.edit.html', 70, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="currentPosition">
 <p><?php echo $this->_tpl_vars['_your_current_position']; ?>
 <?php echo $this->_tpl_vars['_trade_management']; ?>
 &raquo; <?php echo $this->_tpl_vars['_job']; ?>
</p>
</div>
<div id="rightTop"> 
    <h3><?php echo $this->_tpl_vars['_job']; ?>
</h3>
    <ul class="subnav">
		<li><a href="job.php"><?php echo $this->_tpl_vars['_management']; ?>
</a></li>
        <li><a href="jobtype.php"><?php echo $this->_tpl_vars['_position_classification']; ?>
</a></li>
        <li><a class="btn1" href="jobtype.php?do=edit"><span><?php echo $this->_tpl_vars['_add_or_edit']; ?>
</span></a></li>
    </ul>
</div>
<div class="info">
  <form method="post" action="jobtype.php" id="EditFrm" name="edit_frm">
  <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['item']['id']; ?>
" />
  <input type="hidden" name="page" value="<?php echo $_GET['page']; ?>
" />
    <table class="infoTable">
      <tr>
        <th class="paddingT15"> <?php echo $this->_tpl_vars['_add_method']; ?>
</th>
        <td class="paddingT15 wordSpacing5">
		<select name="data[method]" id="DataMethod">
			<option value="1"><?php echo $this->_tpl_vars['_add_one_by_one']; ?>
</option>
			<option value="2"><?php echo $this->_tpl_vars['_copy_from_the_industry_classification']; ?>
</option>
        </select></td>
      </tr>
	  <tbody id="DataMethod1">
	    <?php if ($_GET['id']): ?>
      <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>
" />
      <input type="hidden" name="page" value="<?php echo $_REQUEST['page']; ?>
" />
      <tr>
        <th class="paddingT15"> <?php echo $this->_tpl_vars['_category_name']; ?>
<?php echo $this->_tpl_vars['_colon']; ?>
</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" name="data[jobtype][name]" value="<?php echo $this->_tpl_vars['item']['name']; ?>
" type="text" /><label class="field_notice"><?php echo $this->_tpl_vars['_top_category_name_not_support_special_sign']; ?>
</label>        </td>
      </tr>
    <?php else: ?>
	      <tr>
        <th class="paddingT15"> <?php echo $this->_tpl_vars['_category_name']; ?>
<?php echo $this->_tpl_vars['_colon']; ?>
</th>
        <td class="paddingT15 wordSpacing5"><textarea name="data[jobtype][name]" id="dataNames"></textarea><label class="field_notice"><?php echo $this->_tpl_vars['_add_more_than_one_line_on_behalf_of_a_record']; ?>
</label></td>
      </tr>
    <?php endif; ?> 
      
      <tr>
        <th class="paddingT15"> <?php echo $this->_tpl_vars['_parent_categories']; ?>
<?php echo $this->_tpl_vars['_colon']; ?>
</th>
        <td class="paddingT15 wordSpacing5">
        <select name="data[jobtype][parent_id]" id="JobtypeParentId">
        <option value="0"><?php echo $this->_tpl_vars['_top_categories']; ?>
</option>
        <?php echo $this->_tpl_vars['JobtypeOptions']; ?>

        </select>
        </td>
      </tr>
	  	</tbody>
	  <tbody id="DataMethod2" style="display:none;">
	  		        <tr>
        <th class="paddingT15"> <?php echo $this->_tpl_vars['_whether_or']; ?>
<?php echo $this->_tpl_vars['_overcast']; ?>
<?php echo $this->_tpl_vars['_colon']; ?>
</th>
        <td class="paddingT15 wordSpacing5"><?php echo smarty_function_html_radios(array('name' => "data[coverage]",'options' => $this->_tpl_vars['AskAction'],'checked' => 1,'separator' => ""), $this);?>
<label class="field_notice"><?php echo $this->_tpl_vars['_if_choose_not_disorders_may_lead_to']; ?>
</label></td>
      </tr> 
      <tr>
        <th class="paddingT15"> <?php echo $this->_tpl_vars['_whether_or']; ?>
<?php echo $this->_tpl_vars['_empty']; ?>
<?php echo $this->_tpl_vars['_colon']; ?>
</th>
        <td class="paddingT15 wordSpacing5"><?php echo smarty_function_html_radios(array('name' => "data[truncate]",'options' => $this->_tpl_vars['AskAction'],'checked' => 0,'separator' => ""), $this);?>
</td>
      </tr>      
	  </tbody>
      <tr>
        <th></th>
        <td class="ptb20">
			<input class="formbtn" type="submit" name="save" value="<?php echo $this->_tpl_vars['_save_and_pub']; ?>
" />		</td>
      </tr>
    </table>
  </form>
</div>
<script>
var parent_id = "<?php echo ((is_array($_tmp=@$this->_tpl_vars['item']['parent_id'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
";
</script>
<?php echo '
<script>
jQuery(document).ready(function($) {
	$("#JobtypeParentId").val(parent_id);
		$("#DataMethod").change( function() { 
		$("#DataMethod1, #DataMethod2").toggle();
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