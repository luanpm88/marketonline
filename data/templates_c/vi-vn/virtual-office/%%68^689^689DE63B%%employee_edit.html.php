<?php /* Smarty version 2.6.27, created on 2014-07-07 14:41:37
         compiled from employee_edit.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'editor', 'employee_edit.html', 17, false),array('function', 'formhash', 'employee_edit.html', 32, false),array('modifier', 'default', 'employee_edit.html', 154, false),)), $this); ?>
<?php $this->assign('page_title', "Hồ sơ xin việc"); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
<script>
        //alert("sdfsdfsdfs");
	jQuery(document).ready(function($) {
	        
		$(\'.MenuItem31\').addClass(\'mActive\');
		
		
	});

</script>
'; ?>

<script src="../scripts/jquery/jquery.textbox.js" charset="<?php echo $this->_tpl_vars['charset']; ?>
"></script>
<?php echo smarty_function_editor(array('type' => 'tiny_mce'), $this);?>


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
	<div class="main_content employee_edit">
		<div class="blank"></div>
		    <div class="offer_banner"><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/offer_01.gif" /></div>
		<div class="offer_info_title"><h2><?php echo $this->_tpl_vars['page_title']; ?>
</h2></div>
		<div class="hint"><?php echo $this->_tpl_vars['_must_input_with_star']; ?>
</div>
			
		<form name="jobfrm" id="" action="employee.php" method="post" onsubmit="return checkEmployeeSubmit()">
		<?php echo smarty_function_formhash(array(), $this);?>
	
		<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['item']['id']; ?>
">
		
			<div class="employee_steps">
				<a href="#" class="active"><span>1</span>Thông tin chung</a>
				<a href="<?php if ($this->_tpl_vars['item']['id']): ?>employee.php?do=step2&id=<?php echo $this->_tpl_vars['item']['id']; ?>
<?php else: ?>#<?php endif; ?>" <?php if (! $this->_tpl_vars['item']['id']): ?>class="notyet"<?php endif; ?>><span>2</span>Hồ sơ chi tiết</a>
			</div>
			<br />
			<table>			
				<tr>
					<th valign="top" style="padding-top: 30px;">Số năm kinh nghiệm<font class="red">*</font></th>
					<td>
						<input type="checkbox" name="employee[newgrad]" <?php if ($this->_tpl_vars['item']['newgrad']): ?>checked<?php endif; ?> />
						Tôi mới tốt nghiệp/chưa có kinh nghiệm làm việc <br />
						<input type="text" name="employee[years_experience]" value="<?php if ($this->_tpl_vars['item']['newgrad']): ?>0<?php else: ?><?php echo $this->_tpl_vars['item']['years_experience']; ?>
<?php endif; ?>" <?php if ($this->_tpl_vars['item']['newgrad']): ?>disabled<?php endif; ?> />
					</td>
				</tr>
				<tr>
					<th valign="top" style="padding-top: 10px;">Trình độ ngoại ngữ</th>
					<td>
						<div class="language_select">
							<?php if ($this->_tpl_vars['item']['languages']): ?>
								<?php $_from = $this->_tpl_vars['item']['languages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_M'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_M']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['keyM'] => $this->_tpl_vars['itemM']):
        $this->_foreach['level_M']['iteration']++;
?>
									<div class="language_select_item">
										<select name="languages[<?php echo $this->_tpl_vars['keyM']; ?>
][name]">
											<option value="0">Chọn ngôn ngữ...</option>
											<?php $_from = $this->_tpl_vars['language_options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_0'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_0']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key0'] => $this->_tpl_vars['item0']):
        $this->_foreach['level_0']['iteration']++;
?>
												<option value="<?php echo $this->_tpl_vars['item0']['id']; ?>
" <?php if ($this->_tpl_vars['itemM']['0'] == $this->_tpl_vars['item0']['id']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['item0']['name']; ?>
</option>
											<?php endforeach; endif; unset($_from); ?>
										</select>
										<select name="languages[<?php echo $this->_tpl_vars['keyM']; ?>
][level]">
											<option value="0">Chọn trình độ...</option>
											<?php $_from = $this->_tpl_vars['LanguageLevels']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_0'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_0']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key0'] => $this->_tpl_vars['item0']):
        $this->_foreach['level_0']['iteration']++;
?>
												<option value="<?php echo $this->_tpl_vars['key0']; ?>
" <?php if ($this->_tpl_vars['itemM']['1'] == $this->_tpl_vars['key0']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['item0']; ?>
</option>
											<?php endforeach; endif; unset($_from); ?>
										</select>
										<a href="javascript:void(0)" class="close_but">X</a>
									</div>
								<?php endforeach; endif; unset($_from); ?>
							<?php else: ?>
								<div class="language_select_item">
										<select name="languages[0][name]">
											<option value="0">Chọn ngôn ngữ...</option>
											<?php $_from = $this->_tpl_vars['language_options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_0'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_0']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key0'] => $this->_tpl_vars['item0']):
        $this->_foreach['level_0']['iteration']++;
?>
												<option value="<?php echo $this->_tpl_vars['item0']['id']; ?>
"><?php echo $this->_tpl_vars['item0']['name']; ?>
</option>
											<?php endforeach; endif; unset($_from); ?>
										</select>
										<select name="languages[0][level]">
											<option value="0">Chọn trình độ...</option>
											<?php $_from = $this->_tpl_vars['LanguageLevels']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_0'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_0']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key0'] => $this->_tpl_vars['item0']):
        $this->_foreach['level_0']['iteration']++;
?>
												<option value="<?php echo $this->_tpl_vars['key0']; ?>
"><?php echo $this->_tpl_vars['item0']; ?>
</option>
											<?php endforeach; endif; unset($_from); ?>
										</select>
										<a href="javascript:void(0)" class="close_but">X</a>
								</div>
							<?php endif; ?>
							
						</div>
						<a class="add_button language_add_button" href="javascript:void(0)"><span>+</span> Thêm trình độ ngoại ngữ</a>
					</td>
				</tr>
				<tr>
					<th>Vị trí mong muốn<font class="red">*</font></th>
					<td><input placeholder="VD: Nhân viên kinh doanh, Nhân viên kỹ thuật, Tìm việc bán thời gian,..." type="text" name="employee[expected_position]" value="<?php echo $this->_tpl_vars['item']['expected_position']; ?>
" /></td>
				</tr>
				<tr>
					<th>Cấp bậc mong muốn<font class="red">*</font></th>
					<td>
						<select name="employee[joblevel_id]">
							<option value="0">Chọn</option>
							<?php $_from = $this->_tpl_vars['JobProficiencies']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_0'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_0']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key0'] => $this->_tpl_vars['item0']):
        $this->_foreach['level_0']['iteration']++;
?>
								<option value="<?php echo $this->_tpl_vars['key0']; ?>
" <?php if ($this->_tpl_vars['item']['joblevel_id'] == $this->_tpl_vars['key0']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['item0']; ?>
</option>
							<?php endforeach; endif; unset($_from); ?>
						</select>
					</td>
				</tr>
				<tr>
					<th>Nơi làm việc<font class="red">*</font></th>
					<td>
						<select name="areas[]" multiple>
							<?php echo $this->_tpl_vars['AreaOptions']; ?>

						</select>
					</td>
				</tr>
				<tr>
					<th>Ngành nghề<font class="red">*</font></th>
					<td>
						<select name="jobindusts[]" multiple>
							<?php echo $this->_tpl_vars['JobindustOptions']; ?>

						</select>
					</td>
				</tr>				
				<tr>
					<th>Mức lương mong muốn<font class="red">*</font></th>
					<td>
						<input type="radio" name="has_salary" value="1" <?php if ($this->_tpl_vars['item']['salary']): ?>checked="checked"<?php endif; ?> />
						<input type="text" name="employee[salary]" value="<?php echo $this->_tpl_vars['item']['salary']; ?>
"  <?php if (! $this->_tpl_vars['item']['salary']): ?>disabled<?php endif; ?> /> <span>
						<input type="radio" name="employee[salary_currency]" value="VNĐ" <?php if ($this->_tpl_vars['item']['salary_currency'] == "VNĐ"): ?>checked="checked"<?php endif; ?> /> VNĐ
						<input type="radio" name="employee[salary_currency]" value="USD" <?php if ($this->_tpl_vars['item']['salary_currency'] == 'USD'): ?>checked="checked"<?php endif; ?> /> USD &nbsp;&nbsp;&nbsp;/ tháng</span> <br />
						<input type="radio" name="has_salary" value="0" <?php if (! $this->_tpl_vars['item']['salary']): ?>checked="checked"<?php endif; ?> />
						Thương lượng
					</td>
				</tr>
				<tr>
					<th>Cho phép tìm kiếm</th>
					<td>
						<input type="checkbox" name="employee[searched]" <?php if ($this->_tpl_vars['item']['searched']): ?>checked<?php endif; ?> /> Cho phép tìm kiếm từ trang ngoài.
					</td>
				</tr>
				<tr>
				      <th class="circle_bottomleft"></th>
				      <td class="circle_bottomright"><input name="save" type="submit" id="save" value="Tiếp tục"></td>
				</tr>
			</table>
		</form>
	
	</div>
</div>

<script>
var cache_path = "../";
var app_language = '<?php echo $this->_tpl_vars['AppLanguage']; ?>
';
var area_id1 = <?php echo ((is_array($_tmp=@$this->_tpl_vars['item']['area_id1'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
 ;
var area_id2 = <?php echo ((is_array($_tmp=@$this->_tpl_vars['item']['area_id2'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
 ;
var area_id3 = <?php echo ((is_array($_tmp=@$this->_tpl_vars['item']['area_id3'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
 ;
var industry_id1 = <?php echo ((is_array($_tmp=@$this->_tpl_vars['item']['industry_id1'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
 ;
var industry_id2 = <?php echo ((is_array($_tmp=@$this->_tpl_vars['item']['industry_id2'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
 ;
var industry_id3 = <?php echo ((is_array($_tmp=@$this->_tpl_vars['item']['industry_id3'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
 ;
var industry_id4 = <?php echo ((is_array($_tmp=@$this->_tpl_vars['item']['industry_id4'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
 ;
var jobtype_id = <?php echo ((is_array($_tmp=@$this->_tpl_vars['item']['jobtype_id'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
 ;
</script>
<?php echo '
<script>
	
	function checkEmployeeSubmit()
	{
		var result = true;
		
		if (!$(\'input[name="employee[newgrad]"]\').prop(\'checked\') && $(\'input[name="employee[years_experience]"]\').val() == "") {
			if(!$(\'input[name="employee[years_experience]"]\').parent().find(\'label\').length) $(\'input[name="employee[years_experience]"]\').after(\'<label for="" class="errorz">Nội dung yêu cầu</label>\');
			result = false;
		}
		else
		{
			$(\'input[name="employee[years_experience]"]\').parent().find(\'label\').remove();
		}
		
		//if ($(\'.language_select div.language_select_item:first-child select\').eq(0).val() == "0"
		//    || $(\'.language_select div.language_select_item:first-child select\').eq(1).val() == "0"
		//    ) {
		//	if(!$(\'.language_select div.language_select_item:first-child\').parent().find(\'label\').length) $(\'.language_select div.language_select_item:first-child\').after(\'<label for="" class="errorz">Nội dung yêu cầu</label>\');
		//	result = false;
		//}
		//else
		//{
		//	$(\'.language_select div.language_select_item:first-child\').parent().find(\'label\').remove();
		//}
		
		//expected_position
		if ($(\'input[name="employee[expected_position]"]\').val() == "") {
			if(!$(\'input[name="employee[expected_position]"]\').parent().find(\'label\').length)
				$(\'input[name="employee[expected_position]"]\').after(\'<label for="" class="errorz">Nội dung yêu cầu</label>\');
			
			result = false;
		}
		else
		{
			$(\'input[name="employee[expected_position]"]\').parent().find(\'label\').remove();
		}
		
		if ($(\'select[name="employee[joblevel_id]"]\').val() == "0") {
			if(!$(\'select[name="employee[joblevel_id]"]\').parent().find(\'label\').length)
				$(\'select[name="employee[joblevel_id]"]\').after(\'<label for="" class="errorz">Nội dung yêu cầu</label>\');
			
			result = false;
		}
		else
		{
			$(\'select[name="employee[joblevel_id]"]\').parent().find(\'label\').remove();
		}
		
				
		if (!$(\'select[name="areas[]"]\').val()) {
			if(!$(\'select[name="areas[]"]\').parent().find(\'label\').length)
				$(\'select[name="areas[]"]\').after(\'<label for="" class="errorz">Nội dung yêu cầu</label>\');
			
			result = false;
		}
		else
		{
			$(\'select[name="areas[]"]\').parent().find(\'label\').remove();
		}
		
		if (!$(\'select[name="jobindusts[]"]\').val()) {
			if(!$(\'select[name="jobindusts[]"]\').parent().find(\'label\').length)
				$(\'select[name="jobindusts[]"]\').after(\'<label for="" class="errorz">Nội dung yêu cầu</label>\');
			
			result = false;
		}
		else
		{
			$(\'select[name="jobindusts[]"]\').parent().find(\'label\').remove();
		}
		
		if ($(\'input[name="has_salary"]:checked\').val() == "1" && ($(\'input[name="employee[salary]"]\').val() == "" || !$(\'input[name="employee[salary_currency]"]:checked\').length)) {
			$(\'input[name="employee[salary]"]\').parent().find(\'label\').remove();
				if ($(\'input[name="employee[salary]"]\').val() == "") {
					$(\'input[name="employee[salary]"]\').parent().find("br").after(\'<label for="" class="errorz">Nhập mức lương</label>\');
				}
				else
				{
					$(\'input[name="employee[salary]"]\').parent().find("br").after(\'<label for="" class="errorz">Chọn đơn vị tiền tệ</label>\');
				}

			
			result = false;
		}
		else
		{
			$(\'input[name="employee[salary]"]\').parent().find(\'label\').remove();
		}
		
		
		return result;
	}

jQuery(document).ready(function($) {	
	
	//employee_edit
	if ($(\'.language_select div\').length < 2) {
		$(\'.language_select div:first-child .close_but\').css("display","none");
	}
	$(\'.language_add_button\').click(function() {
		$(\'.language_select\').append($(\'.language_select div\').first().clone());
		$(\'.language_select div\').last().find(\'select\').val("0");
		if ($(\'.language_select div\').length > 2) {
			$(\'.language_add_button\').css("display","none");
		}
		$(\'.language_select div .close_but\').css("display","block");
		
		var cc = 0;
		$(\'.language_select div\').each(function(){
			$(this).find(\'select\').eq(0).attr("name", "languages["+cc+"][name]");
			$(this).find(\'select\').eq(1).attr("name", "languages["+cc+"][level]");
			cc++;
		});
	});
	$(\'.language_select_item .close_but\').live("click",function() {
		if ($(\'.language_select div\').length > 1) {
			$(this).parent().remove();
			$(\'.language_add_button\').css("display","block");
		}
		if ($(\'.language_select div\').length < 2) {
			$(\'.language_select div:first-child .close_but\').css("display","none");
		}
	});
	
	//$(\'input[name="employee[newgrad]"]\').prop(\'checked\')
	$(\'input[name="employee[newgrad]"]\').change(function() {		
		if ($(this).prop(\'checked\')) {
			$(\'input[name="employee[years_experience]"]\').val(0);
			$(\'input[name="employee[years_experience]"]\').prop(\'disabled\', true);
		}
		else
		{
			$(\'input[name="employee[years_experience]"]\').val("");			
			$(\'input[name="employee[years_experience]"]\').prop(\'disabled\', false);
			$(\'input[name="employee[years_experience]"]\').focus();
		}
	});
	
	$(\'.employee_edit select[name="jobindusts[]"]\').select2({ maximumSelectionSize: 3, placeholder: "Chọn ngành nghề"});
	$(\'.employee_edit select[name="areas[]"]\').select2({ maximumSelectionSize: 3, placeholder: "Chọn khu vực"});
	
	//$(\'input[name="employee[newgrad]"]\').prop(\'checked\')
	$(\'input[name="has_salary"]\').change(function() {		
		if ($(\'input[name="has_salary"]:checked\').val() == "1") {
			$(\'input[name="employee[salary]"]\').val("");			
			$(\'input[name="employee[salary]"]\').prop(\'disabled\', false);
			$(\'input[name="employee[salary]"]\').focus();
		}
		else
		{
			$(\'input[name="employee[salary]"]\').val(\'\');
			$(\'input[name="employee[salary]"]\').prop(\'disabled\', true);
		}
	});
	
	$(\'input[name="employee[salary]"]\').keyup(function(){
		$(this).parseNumber({format:"#,###", locale:"vn"});
		$(this).formatNumber({format:"#,###", locale:"vn"});
	});
})
</script>
'; ?>

<script src="../scripts/multi_select.js" charset="<?php echo $this->_tpl_vars['charset']; ?>
"></script>
<script src="../scripts/script_area.js"></script>
<script src="../scripts/script_industry.js"></script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>