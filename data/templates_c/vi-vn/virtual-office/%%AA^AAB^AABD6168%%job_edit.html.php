<?php /* Smarty version 2.6.27, created on 2014-02-12 12:29:44
         compiled from job_edit.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'fetch', 'job_edit.html', 18, false),array('function', 'editor', 'job_edit.html', 20, false),array('function', 'formhash', 'job_edit.html', 38, false),array('function', 'html_options', 'job_edit.html', 68, false),array('function', 'html_radios', 'job_edit.html', 97, false),array('modifier', 'default', 'job_edit.html', 97, false),)), $this); ?>
<?php $this->assign('page_title', ($this->_tpl_vars['_company_job'])); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
<script>
        //alert("sdfsdfsdfs");
	jQuery(document).ready(function($) {
	        
		$(\'.MenuItem14\').addClass(\'mActive\');
		
		
	});

</script>
'; ?>



<?php echo smarty_function_fetch(array('file' => "../scripts/date.js"), $this);?>

<script src="../scripts/jquery/jquery.textbox.js" charset="<?php echo $this->_tpl_vars['charset']; ?>
"></script>
<?php echo smarty_function_editor(array('type' => 'tiny_mce'), $this);?>

<script>
var allows_maximum_input = "<?php echo $this->_tpl_vars['_allows_maximum_input']; ?>
";
var can_also_enter = "<?php echo $this->_tpl_vars['_can_also_enter']; ?>
";
</script>
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
     <div class="hint"><?php echo $this->_tpl_vars['_must_input_with_star']; ?>
</div>

	  <form name="jobfrm" id="Frm1" action="job.php" method="post">
	  <?php echo smarty_function_formhash(array(), $this);?>

	  <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['item']['id']; ?>
">
		
		<div class="tt_bound">
		  <table class="offer_info_content job_edit_page">       

                      <tr>
                         <th class="circle_left">
				<?php echo $this->_tpl_vars['_title']; ?>
 <font color="#FF6600">*</font></th>
                         <td class="circle_right"><input placeholder="Tên công việc (tiêu đề hiển thị trong danh sách tuyển dụng)" name="job[name]" type="text" id="jobname" value="<?php echo $this->_tpl_vars['item']['name']; ?>
" class="required"></td>
                      </tr>
		      <tr>
                        <th><?php echo $this->_tpl_vars['_job_cat']; ?>
<font color="#FF6600">*</font></th>
                        <td class="tdright">
				<select name="jobcats[]" id="JobcatId" class="required" multiple>
					<?php echo $this->_tpl_vars['JobcatOptions']; ?>

				</select>
			</td>
                      </tr>		      
		      <tr>
                        <th><?php echo $this->_tpl_vars['_job_indust']; ?>
<font color="#FF6600">*</font></th>
                        <td class="tdright">
				<select name="jobindusts[]" id="JobindustId" class="required" multiple>
					<?php echo $this->_tpl_vars['JobindustOptions']; ?>

				</select>
			</td>
                      </tr>
		      <tr>
			<th><?php echo $this->_tpl_vars['_job_nature']; ?>
<font color="#FF6600">*</font></th>
                        <td class="tdright"><select name="job[worktype_id]">
						<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['Worktype'],'selected' => $this->_tpl_vars['item']['worktype_id']), $this);?>

						</select></td>
                      </tr>
		      <tr>
                        <th><?php echo $this->_tpl_vars['_location_job']; ?>
<font color="#FF6600">*</font></th>
                        <td class="tdright">
						<div id="dataArea">
							<select name="area[id][1]" id="dataCompanyAreaId1" class="level_1"></select>
							<select name="area[id][2]" id="dataCompanyAreaId2" class="level_2"></select>
							<select name="area[id][3]" id="dataCompanyAreaId3" class="level_3"></select>
						</div>
						<input style="width:414px;margin-top:5px;" placeholder="Số Tên đường, Phường/Xã" name="job[work_address]" type="text" id="address" value="<?php echo $this->_tpl_vars['item']['address']; ?>
">
						</td>
                      </tr>
		      
			
		      
			</table>
		</div>
		
		<div class="tt_bound">
			<table class="offer_info_content job_edit_page">
		      
		      
		      
		      
		      
		      <tr>
                        <th><?php echo $this->_tpl_vars['_sex']; ?>
</th>
                        <td class="tdright"><?php echo smarty_function_html_radios(array('name' => "job[require_gender_id]",'options' => $this->_tpl_vars['Genders'],'checked' => ((is_array($_tmp=@$this->_tpl_vars['item']['require_gender_id'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)),'separator' => ' '), $this);?>
</td>
                      </tr>
		       <tr>
                        <th><?php echo $this->_tpl_vars['_age']; ?>
</th>
                        <td class="tdright"><input name="job[require_age]" type="text" id="require_age" value="<?php echo $this->_tpl_vars['item']['require_age']; ?>
"></td>
                      </tr>
		      <tr>
                        <th><?php echo $this->_tpl_vars['_job_type']; ?>
</th>
                        <td class="tdright">
				<select name="job[jobtype_id]" id="JobtypeId">
					<option value="0">Tất cả</option>
					<?php echo $this->_tpl_vars['JobtypeOptions']; ?>

				</select>
			</td>
                      </tr>
		      <tr>
                        <th><?php echo $this->_tpl_vars['_education']; ?>
</th>
                        <td class="tdright"><select name="job[require_education_id]">
                          <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['Educations'],'selected' => $this->_tpl_vars['item']['require_education_id']), $this);?>

                        </select></td>
                      </tr>
		      <tr>
                        <th><?php echo $this->_tpl_vars['_exper']; ?>
</th>
                        <td class="tdright"><input placeholder="Số năm kinh nghiệm" name="job[exper]" type="text" id="require_exper" value="<?php echo $this->_tpl_vars['item']['exper']; ?>
"></td>
                      </tr>
		      
		      
		  </table>
		</div>
		
		
		
		
		
		<div class="tt_bound">
		  <table class="offer_info_content job_edit_page">       
		  
		      <!--<tr>
                        <th><?php echo $this->_tpl_vars['_industry']; ?>
<font color="#FF6600">*</font></th>
                        <td class="tdright"><input class="required" name="job[industry]" type="text" id="industry" value="<?php echo $this->_tpl_vars['item']['industry']; ?>
"></td>
                      </tr>-->
		      
		      
			<tr>
					<th><?php echo $this->_tpl_vars['_salary']; ?>
<font class="red">*</font></th>
					<td>
						<input type="radio" name="has_salary" value="1" <?php if ($this->_tpl_vars['item']['salary']): ?>checked="checked"<?php endif; ?> />
						<input type="text" name="job[salary]" value="<?php echo $this->_tpl_vars['item']['salary']; ?>
"  <?php if (! $this->_tpl_vars['item']['salary']): ?>disabled<?php endif; ?> /> <span>
						<input type="radio" name="job[salary_currency]" value="VNĐ" <?php if ($this->_tpl_vars['item']['salary_currency'] == "VNĐ"): ?>checked="checked"<?php endif; ?> /> VNĐ
						<input type="radio" name="job[salary_currency]" value="USD" <?php if ($this->_tpl_vars['item']['salary_currency'] == 'USD'): ?>checked="checked"<?php endif; ?> /> USD &nbsp;&nbsp;&nbsp;/ tháng</span> <br />
						<input type="radio" name="has_salary" value="0" <?php if (! $this->_tpl_vars['item']['salary'] && $this->_tpl_vars['item']['id']): ?>checked="checked"<?php endif; ?> />
						Thương lượng
					</td>
			</tr>
		     
		      
		      <!--<tr>
                        <th><?php echo $this->_tpl_vars['_salary']; ?>
<font color="#FF6600">*</font></th>
                        <td class="tdright"><input class="required" name="job[salary]" type="text" id="salary" value="<?php echo $this->_tpl_vars['item']['salary']; ?>
"></td>
                      </tr>-->
		      <tr>
                        <th><?php echo $this->_tpl_vars['_testtime']; ?>
</th>
                        <td class="tdright"><input placeholder="Ví dụ: 1 tháng, 2 tháng,..." name="job[testtime]" type="text" id="require_testtime" value="<?php echo $this->_tpl_vars['item']['testtime']; ?>
"></td>
                      </tr>
		      <tr>
                        <th><?php echo $this->_tpl_vars['_job_number']; ?>
<font color="#FF6600">*</font></th>
                        <td class="tdright"><input placeholder="Số lượng ứng viên cần tuyển" name="job[peoples]" type="text" id="peoples" value="<?php echo $this->_tpl_vars['item']['peoples']; ?>
" size="2" maxlength="5" class="required number"> (<?php echo $this->_tpl_vars['_peoples']; ?>
)</td>
                      </tr>
		      <tr>
                        <th><?php echo $this->_tpl_vars['_publish_date_deadline']; ?>
<font color="#FF6600">*</font></th>
                        <td class="tdright"><input class="date_deadline required" placeholder="ngày/tháng/năm" type="text" name="job[expired_dates]" value='<?php echo $this->_tpl_vars['item']['expired_dates']; ?>
' id=""><!--<span class="btn_calendar" id="calendar-date1"></span>--> </td>
                      
                      </tr>
		      
		      
		      
		      
		      
		      
		      
		      
		      
		      
		      
		      
                      
                      
                      
                      
                      
                      
		      
		      <tr style="display: none">
                        <th><?php echo $this->_tpl_vars['_salary']; ?>
</th>
                        <td class="tdright"><select name="job[salary_id]">
						<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['Salary'],'selected' => $this->_tpl_vars['item']['salary_id']), $this);?>

						</select></td>
                      </tr>
                      
		      
                      <tr style="display: none">
                        <th><?php echo $this->_tpl_vars['_industry']; ?>
</th>
                        <td class="tdright">
						<div id="dataIndustry">
							<select name="industry[id][1]" id="dataCompanyIndustryId1" class="level_1"></select>
							<select name="industry[id][2]" id="dataCompanyIndustryId2" class="level_2"></select>
							<select name="industry[id][3]" id="dataCompanyIndustryId3" class="level_3"></select>
							<select name="industry[id][4]" id="dataCompanyIndustryId4" class="level_4"></select>
						</div>
						</td>
                      </tr>
                      
                      <!--<tr>
                        <th><?php echo $this->_tpl_vars['_job_address']; ?>
<font color="#FF6600">*</font></th>
                        <td class="tdright"><input name="job[work_station]" type="text" id="work_station" value="<?php echo $this->_tpl_vars['item']['work_station']; ?>
" class="required"/></td>
                      </tr>-->
                      <!--<tr>
                        <th><?php echo $this->_tpl_vars['_category']; ?>
<?php echo $this->_tpl_vars['_colon']; ?>
<font color="#FF6600">*</font></th>
                        <td class="tdright">
						<select name="job[jobtype_id]" id="JobtypeId">
        <option value="0"><?php echo $this->_tpl_vars['_select_category']; ?>
</option>
        <?php echo $this->_tpl_vars['JobtypeOptions']; ?>

        </select>
						</td>
                      </tr>-->
		      <tr style="display: none">
		      <th><?php echo $this->_tpl_vars['_job_category']; ?>
<?php echo $this->_tpl_vars['_colon']; ?>
<font color="#FF6600">*</font></th>
                        <td class="tdright">
			    <input type="text" name="job[jobtype]" id="JobType" />
			</td>
                      </tr>
		      
			
                  </table>     
		</div> 
		      
		      
		      
		      
		      
		<div class="tt_bound"> 
			<table class="offer_info_content job_edit_page">
					    
			    <tr>
			      <th><?php echo $this->_tpl_vars['_job_description']; ?>
<font color="#FF6600">*</font></th>
			      <td class="tdright"><textarea name="job[content]" cols="35" rows="4" id="Content"><?php echo $this->_tpl_vars['item']['content']; ?>
</textarea><div id="txtTips"></div></td>
			    </tr>
			    
			    
			    <tr>
			      <th><?php echo $this->_tpl_vars['_skills']; ?>
</th>
			      <td class="tdright"><textarea name="job[skills]" cols="35" rows="4" id="Skills" class=""><?php echo $this->_tpl_vars['item']['skills']; ?>
</textarea><div id="txtTips"></div></td>
			    </tr>
			    
			    <tr>
			      <th><?php echo $this->_tpl_vars['_job_other']; ?>
</th>
			      <td class="tdright"><textarea name="job[job_other]" cols="35" rows="4" id="job_other" class=""><?php echo $this->_tpl_vars['item']['job_other']; ?>
</textarea><div id="txtTips"></div></td>
			    </tr>
			    
			    <tr>
			      <th><?php echo $this->_tpl_vars['_rprofile']; ?>

				<br /><br />
				<span style="font-weight: normal;font-size: 13px;">
					(Gồm: yêu cầu giấy tờ/bằng cấp,<br> hình thức/địa điểm nộp hồ sơ,...)
				</span>
			      </th>
			      <td class="tdright"><textarea name="job[rprofile]" cols="35" rows="4" id="Rprofile" class=""><?php echo $this->_tpl_vars['item']['rprofile']; ?>
</textarea><div id="txtTips"></div></td>
			    </tr>
			    
				
			    

			</table>
		</div>
		
		
		<div class="tt_bound"> 
			<table class="offer_info_content job_edit_page">
					    
			    <tr>
			      <th>Thông tin liên hệ nộp hồ sơ<br><br><span style="font-weight: normal;font-size: 13px;">(Có thể thay đổi thông tin liên hệ cho phù hợp)</span></th>
				<td class="tdright">
					
					<?php if ($this->_tpl_vars['item']['contact_name'] == ""): ?>
					
						<div style="margin-bottom: 5px;">
							<label style="width:70px;display:block;float:left">Họ và tên</label>
									<input name="job[contact_name]" type="text" id="linkman" value="<?php echo $this->_tpl_vars['COMPANYINFO']['link_man']; ?>
" size="32" class="required">
									<?php echo $this->_tpl_vars['_chucvu']; ?>

									<input name="job[contact_position]" type="text" id="dataCompanyPosition" value="<?php echo $this->_tpl_vars['COMPANYINFO']['position']; ?>
" size="30">
								  
									<span class="gendercheck" style="margin-left: 10px"><?php echo smarty_function_html_radios(array('name' => "job[contact_gender]",'options' => $this->_tpl_vars['Genders'],'checked' => $this->_tpl_vars['COMPANYINFO']['link_man_gender'],'separator' => ' '), $this);?>
</span>
						</div>
								
						<div style="margin-bottom: 5px;">
							<label style="width:70px;display:block;float:left"><?php echo $this->_tpl_vars['_mobile_number']; ?>
</label>
									<input name="job[contact_mobile]" type="text" id="contact_mobile" value="<?php echo $this->_tpl_vars['COMPANYINFO']['contact_mobile']; ?>
" size="32" class="required">
						</div>
										
								
						<div style="margin-bottom: 5px;">
							<label style="width:70px;display:block;float:left"><?php echo $this->_tpl_vars['_email']; ?>
</label>
									<input name="job[contact_email]" type="text" id="contact_email" value="<?php echo $this->_tpl_vars['COMPANYINFO']['contact_email']; ?>
" size="32" class="required">
						</div>
					
					<?php else: ?>
						<div style="margin-bottom: 5px;">
							<label style="width:70px;display:block;float:left">Họ và tên</label>
									<input name="job[contact_name]" type="text" id="linkman" value="<?php echo $this->_tpl_vars['item']['contact_name']; ?>
" size="32">
									<?php echo $this->_tpl_vars['_chucvu']; ?>

									<input name="job[contact_position]" type="text" id="dataCompanyPosition" value="<?php echo $this->_tpl_vars['item']['contact_position']; ?>
" size="30">
								  
									<span class="gendercheck" style="margin-left: 10px"><?php echo smarty_function_html_radios(array('name' => "job[contact_gender]",'options' => $this->_tpl_vars['Genders'],'checked' => $this->_tpl_vars['item']['contact_gender'],'separator' => ' '), $this);?>
</span>
						</div>
								
						<div style="margin-bottom: 5px;">
							<label style="width:70px;display:block;float:left"><?php echo $this->_tpl_vars['_mobile_number']; ?>
</label>
									<input name="job[contact_mobile]" type="text" id="contact_mobile" value="<?php echo $this->_tpl_vars['item']['contact_mobile']; ?>
" size="32">
						</div>
										
								
						<div style="margin-bottom: 5px;">
							<label style="width:70px;display:block;float:left"><?php echo $this->_tpl_vars['_email']; ?>
</label>
									<input name="job[contact_email]" type="text" id="contact_email" value="<?php echo $this->_tpl_vars['item']['contact_email']; ?>
" size="32">
						</div>
					<?php endif; ?>
								
					
				</td>
			    </tr>
			    
			    <tr>
			      <th class="circle_bottomleft"></th>
			      <td class="circle_bottomright"><input name="save" type="submit" id="save" value="<?php echo $this->_tpl_vars['_save']; ?>
"></td>
			    </tr>
			    
			</table>
		</div>
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

jQuery(document).ready(function($) {
	$("#JobtypeId").val(jobtype_id);
	$("#Content").textbox({
		maxLength: 255,
		onInput: function(event, status) {
			$("#txtTips").html(allows_maximum_input+" <strong style=\'font-family:Arial;font-size:1.5em;\'>" + status.maxLength + "</strong> "+can_also_enter+" <strong style=\'font-family:Arial;font-size:1.5em;\'>" + status.leftLength + "</strong>");
		}
	});
	$("#Frm1").validate({
	submitHandler: function(form) {
	    var result = true;
		
		if(tinyMCE.get(\'Content\').getContent() == "")
		{
			result = false;
		}
		
		if ($(\'#dataCompanyAreaId2\').val() ==  \'0\') {			
			result = false;
		}
		
		if ($(\'input[name="has_salary"]:checked\').val() == "1" && ($(\'input[name="job[salary]"]\').val() == "" || !$(\'input[name="job[salary_currency]"]:checked\').length)) {
			result = false;
		}
		
		if (!$(\'input[name="has_salary"]:checked\').length) {
			result = false;
		}
		
		if (result) {
			$(form).find(":submit").attr("disabled", true).attr("value",pb_lang.DO_PROCESSING);
			document.GetDocumentByID(\'#save\').click();
		}   
	    
	}
	});
	
	$(\'#save\').click(function() {
		var result = true;
		
		var areaerror = false;
		if(tinyMCE.get(\'Content\').getContent() == "")
		{
			$(\'#Content\').parent().find(\'label\').remove();
			$(\'#Content\').before(\'<label for="" class="errorz">Nội dung yêu cầu nhập</label>\');
			areaerror = true;
		}
		else
		{
			$(\'#Content\').parent().find(\'label\').remove();
		}
		
		if ($(\'#dataCompanyAreaId2\').val() ==  \'0\') {
			
			$(\'#dataCompanyAreaId3\').parent().find(\'label\').remove();
			$(\'#dataCompanyAreaId3\').parent().append(\'<label for="" class="errorz">Yêu cầu chọn cấp thấp nhất là cấp Tỉnh/Thành</label>\');
			result = false;
		}
		else
		{
		    $(\'#dataCompanyAreaId2\').parent().find(\'label\').remove();
		}
		$(\'#dataCompanyAreaId3, #dataCompanyAreaId2, #dataCompanyAreaId1\').change(function(){
			if ($(\'#dataCompanyAreaId2\').val() !=  \'0\') {
				$(\'#dataCompanyAreaId3\').parent().find(\'label\').remove();
			}
			else
			{
				$(\'#dataCompanyAreaId3\').parent().find(\'label\').remove();
				$(\'#dataCompanyAreaId3\').parent().append(\'<label for="" class="errorz">Yêu cầu chọn thấp nhất cấp Tỉnh/Thành</label>\');
			}
		});
		
		
		if ($(\'input[name="has_salary"]:checked\').val() == "1" && ($(\'input[name="job[salary]"]\').val() == "" || !$(\'input[name="job[salary_currency]"]:checked\').length)) {
			$(\'input[name="job[salary]"]\').parent().find(\'label\').remove();
				if ($(\'input[name="job[salary]"]\').val() == "") {
					$(\'input[name="job[salary]"]\').parent().find("br").after(\'<label for="" class="errorz">Nhập mức lương</label>\');
				}
				else
				{
					$(\'input[name="job[salary]"]\').parent().find("br").after(\'<label for="" class="errorz">Chọn đơn vị tiền tệ</label>\');
				}

			
			result = false;
		}
		else
		{
			$(\'input[name="job[salary]"]\').parent().find(\'label.errorz\').remove();
		}
		
		if (!$(\'input[name="has_salary"]:checked\').length) {
			$(\'input[name="job[salary]"]\').parent().find(\'label.errornull\').remove();
			$(\'input[name="job[salary]"]\').parent().append(\'<label for="" class="errornull">Yêu cầu chọn</label>\');
			
			result = false;
		}
		else
		{
			$(\'input[name="job[salary]"]\').parent().find(\'label.errornull\').remove();
		}
		
		if (!result) {
			$("html, body").animate({ scrollTop:100 }, 100);
		}
		else if (areaerror) {
			setTimeout( function(){
				if ($(window).scrollTop() > 600) {
					$("html, body").animate({ scrollTop:600 }, 100);
				}
			}, 100);			
		}

		
	});
	
	//$(\'input[name="employee[newgrad]"]\').prop(\'checked\')
	$(\'input[name="has_salary"]\').change(function() {		
		if ($(\'input[name="has_salary"]:checked\').val() == "1") {
			$(\'input[name="job[salary]"]\').val("");			
			$(\'input[name="job[salary]"]\').prop(\'disabled\', false);
			$(\'input[name="job[salary]"]\').focus();
		}
		else
		{
			$(\'input[name="job[salary]"]\').val(\'\');
			$(\'input[name="job[salary]"]\').prop(\'disabled\', true);
		}
	});
	
	$(\'input[name="job[salary]"]\').keyup(function(){
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