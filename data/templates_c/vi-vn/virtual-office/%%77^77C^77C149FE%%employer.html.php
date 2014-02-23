<?php /* Smarty version 2.6.27, created on 2014-01-13 16:34:20
         compiled from employer.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'employer.html', 9, false),array('function', 'editor', 'employer.html', 257, false),array('function', 'formhash', 'employer.html', 298, false),array('function', 'html_radios', 'employer.html', 415, false),)), $this); ?>
<?php $this->assign('page_title', ($this->_tpl_vars['_company_information'])); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="../scripts/jquery/selectbox.js"></script>
<script>
var app_language = '<?php echo $this->_tpl_vars['AppLanguage']; ?>
';
</script>
<script type="text/javascript" src="../data/cache/<?php echo $this->_tpl_vars['AppLanguage']; ?>
/type.js"></script>
<script>
option_employee_amount = "<?php echo ((is_array($_tmp=@$this->_tpl_vars['item']['option_employee_amount'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
";
option_year_annual = "<?php echo ((is_array($_tmp=@$this->_tpl_vars['item']['option_year_annual'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
";
option_reg_fund = "<?php echo ((is_array($_tmp=@$this->_tpl_vars['item']['option_reg_fund'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
";
option_manage_type = "<?php echo ((is_array($_tmp=@$this->_tpl_vars['item']['option_manage_type'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
";
option_position = "<?php echo ((is_array($_tmp=@$this->_tpl_vars['item']['option_position'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
";
option_economic_type = "<?php echo ((is_array($_tmp=@$this->_tpl_vars['item']['option_economic_type'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
";
</script>


<?php echo '
<script>
	jQuery(document).ready(function($) {
		$(\'.MenuItem10\').addClass(\'mActive\');
	});
</script>
'; ?>



<?php echo '
<script type="text/javascript">
	function uploadLogo(item) {
		//alert("uploading......");
		$(\'#upload_logo_form\').submit();
		$(\'#CompanyLogo img\').css(\'opacity\',\'0.3\');
	}
	
	function changeLogo(image) {
		//alert("Thay logo thành công");
		$(\'#CompanyLogo img\').css(\'opacity\',\'1\');
		d = new Date();
		$(\'#CompanyLogo\').html(\'<img alt="(tỉ lệ: 1.2 x 1 - VD: 600 x 500)" title="(tỉ lệ: 1.2 x 1 - VD: 600 x 500)" style="margin-bottom: 0" src="../attachment/\'+image+"?"+d.getTime()+\'" width="230" id="LogoCom" alt="" />\');
		//$(\'#CompanyLogo\').html(\'src\', \'../attachment/\'+image+"?"+d.getTime());
		$(\'#CompanyLogo img\').resizecrop({
			width:238,
			height:238		   
		});
		
		$(\'#change_logoz a\').html(\''; ?>
<?php echo $this->_tpl_vars['_change_logo']; ?>
<?php echo '\');
		
		'; ?>
<?php if (! $this->_tpl_vars['item']['logo']): ?><?php echo '
			$(\'#image_tmp\').val(image);
		'; ?>
<?php endif; ?><?php echo '
	}
	
	function readURL(input) {

		if (input.files && input.files[0]) {
		    var reader = new FileReader();
	    
		    reader.onload = function (e) {
			$(\'#CompanyLogo img\').attr(\'src\', e.target.result);
			$(\'#CompanyLogo img\').resizecrop({
					width:238,
					height:238		   
			});
		    }
	    
		    reader.readAsDataURL(input.files[0]);
		}
	}
	
	function insertBrand(){
		alert("OKIE");
	}
	
	function inserEditorFile(url, image) {
		$(\'#uploadIVbutton\').attr(\'disabled\',\'\');
		$(\'#uploadIVbutton\').attr(\'value\',\'Tải Ảnh/Video\');
		if (image) {
			tinyMCE.activeEditor.execCommand(\'mceInsertContent\', false, "<img src=\'../attachment/"+url+"\' />");
		}
		else
		{
			alert("Video đã được chèn thành công. Sau khi nhấn nút lưu ở dưới, bạn xem video này ở trang chi tiết.");
			tinyMCE.activeEditor.execCommand(\'mceInsertContent\', false, \'<video controls width="640" height="360">\'
										+\'<source src="../attachment/\'+url+\'" type="video/mp4" />\'
										+\'Your browser does not support the video tag.</video>\');
		}		
	}
	
	function checkUploadEditorInput() {
		//code
		if($(\'#uploadEditorFile\').val() == \'\')
		{
			$(\'#uploadEditorFile\').css(\'border\', \'solid 1px red\');
			return false;
		} else
		{
			$(\'#uploadEditorFile\').css(\'border\', \'none\');
			$(\'#uploadIVbutton\').attr(\'disabled\',\'disabled\');
			$(\'#uploadIVbutton\').attr(\'value\',\'Đang tải...\');
			return true;
		}
	}
	
	
	
	
jQuery(document).ready(function($) {
	//$(\'#dataCompanyEmployeeAmount\').options(employee_amount);
	//$("#dataCompanyEmployeeAmount")[0].options[option_employee_amount].selected = true;
	//$(\'#dataCompanyYearAnnual\').options(year_annual);
	//$("#dataCompanyYearAnnual")[0].options[option_year_annual].selected = true;
	//$(\'#dataCompanyRegFund\').options(reg_fund);
	//$("#dataCompanyRegFund")[0].options[option_reg_fund].selected = true;
	//$(\'#dataCompanyManageType\').options(manage_type);
	//$("#dataCompanyManageType")[0].options[option_manage_type].selected = true;
	////$(\'#dataCompanyPosition\').options(position);
	////$("#dataCompanyPosition")[0].options[option_position].selected = true;
	//$(\'#dataCompanyEconomicType\').options(economic_type);
	//$("#dataCompanyEconomicType")[0].options[option_economic_type].selected = true;
	
	$("#CompanyFrm").validate({
	submitHandler: function(form) {
		var result = true;

		'; ?>
<?php if (! $this->_tpl_vars['item']['logo']): ?><?php echo '
			if($(\'#change_logo_but\').val() == \'\')
			{
				//alert("Bạn phải chọn logo đại diện");
				//$("html, body").animate({ scrollTop: 100 }, 100);
				result = false;
			}			
		'; ?>
<?php endif; ?><?php echo '
		
		if ($(\'#telcode\').val() ==  \'\' || $(\'#telzone\').val() == \'\' || $(\'#tel\').val() == \'\') {
			//$(\'.tel_area td label\').remove();
			//$(\'.tel_area td\').append(\'<label for="contact_mobile" generated="true" class="error">Nội dung yêu cầu nhập</label>\');
			result = false;
		}
		
		if ($(\'#faxcode\').val() ==  \'\' || $(\'#faxzone\').val() == \'\' || $(\'#tel\').val() == \'\') {
			//$(\'.fax_area td label\').remove();
			//$(\'.fax_area td\').append(\'<label for="contact_mobile" generated="true" class="error">Nội dung yêu cầu nhập</label>\');
			result = false;
		}
		
		if (($(\'#dataCompanyAreaId3\').val() ==  \'0\' && $(\'#dataCompanyAreaId1\').val() ==  \'1\') || $(\'#dataCompanyAreaId1\').val() ==  \'0\') {			
			result = false;
		}
		
		
		
		if (result) {
			$(form).find(":submit").attr("disabled", true).attr("value",pb_lang.DO_PROCESSING);
			form.submit();
		}
	}
	});
	
	
	$(\'#CompanyEdit\').click(function() {
		var result = true;

		'; ?>
<?php if (! $this->_tpl_vars['item']['logo']): ?><?php echo '
			if($(\'#change_logo_but\').val() == \'\')
			{
				$(\'.cclogo\').find(\'label.errorz\').remove();
				$(\'.cclogo #shop_name\').before(\'<label for="" style="clear:both" class="errorz">Bạn phải chọn logo đại diện</label>\');
				$("html, body").animate({ scrollTop: 100 }, 100);
				result = false;
			}
			else
			{
				$(\'.cclogo\').find(\'label.errorz\').remove();
			}			
			$(\'#change_logo_but\').change(function(){
				$(\'.cclogo\').find(\'label.errorz\').remove();
			});
		'; ?>
<?php endif; ?><?php echo '
		
		if ($(\'#telcode\').val() ==  \'\' || $(\'#telzone\').val() == \'\' || $(\'#tel\').val() == \'\') {
			$(\'.tel_area td label\').remove();
			$(\'.tel_area td\').append(\'<label for="" class="errorz">Nội dung yêu cầu nhập</label>\');
			result = false;
		}
		$(\'#telcode, #telzone, #tel\').keyup(function(){
			if ($(\'#telcode\').val() !=  \'\' && $(\'#telzone\').val() != \'\' && $(\'#tel\').val() != \'\') {
				$(\'.tel_area td label\').remove();
			}
		});
		
		if ($(\'#faxcode\').val() ==  \'\' || $(\'#faxzone\').val() == \'\' || $(\'#fax\').val() == \'\') {
			$(\'.fax_area td label\').remove();
			$(\'.fax_area td\').append(\'<label for="" class="errorz">Nội dung yêu cầu nhập</label>\');
			result = false;
		}
		$(\'#faxcode, #faxzone, #fax\').keyup(function(){
			if ($(\'#faxcode\').val() !=  \'\' && $(\'#faxzone\').val() != \'\' && $(\'#fax\').val() != \'\') {
				$(\'.fax_area td label\').remove();
			}
		});
		
		if (($(\'#dataCompanyAreaId3\').val() ==  \'0\' && $(\'#dataCompanyAreaId1\').val() ==  \'1\') || $(\'#dataCompanyAreaId1\').val() ==  \'0\') {
			
			$(\'#dataCompanyAreaId3\').parent().find(\'label\').remove();
			$(\'#dataCompanyAreaId3\').parent().append(\'<label for="" class="errorz">Nội dung yêu cầu nhập</label>\');
			result = false;
		}
		else
		{
		    $(\'#dataCompanyAreaId3\').parent().find(\'label\').remove();
		}
		$(\'#dataCompanyAreaId3, #dataCompanyAreaId2, #dataCompanyAreaId1\').change(function(){
			if ($(\'#dataCompanyAreaId3\').val() !=  \'0\') {
				$(\'#dataCompanyAreaId3\').parent().find(\'label\').remove();
			}
			else
			{
				$(\'#dataCompanyAreaId3\').parent().find(\'label\').remove();
				$(\'#dataCompanyAreaId3\').parent().append(\'<label for="" class="errorz">Nội dung yêu cầu nhập</label>\');
			}
		});
		
		
		
		if (!result) {
			$("html, body").animate({ scrollTop:100 }, 100);
		}
		
	});
	
	$(\'#change_logoz a\').click(function() {
		//alert("sdfsdf");
		$(\'#change_logo_but\').trigger(\'click\');
	});
	
	$(\'#change_logo_but\').change(function() {
		//$(\'#company_top_info #CompanyLogo\').html(\'<p>Logo đã được thay đổi. Bạn phải lưu thông tin để thấy logo mới.</p>\');		
		uploadLogo(this);
	});
	
	'; ?>
<?php if (! $this->_tpl_vars['hasCompany']): ?><?php echo '	
		if ($(\'input[name="data[company][link_man]"]\').val()) {
			$(\'.gendercheck\').attr("rel", "done");
			
			$(\'input[name="data[company][link_man]"]\').keyup(function(){
				if ($(\'.gendercheck\').attr("rel") == "done") {
					$(\'.gendercheck input\').prop(\'checked\', false);
				}
				$(\'.gendercheck\').attr("rel", "notdone");				
			});
		}
	'; ?>
<?php endif; ?><?php echo '
	
})
</script>
'; ?>

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
     <div class="main_content">

	
<?php if (( ! $this->_tpl_vars['hasProfile'] || ! $this->_tpl_vars['hasCompany'] ) && $this->_tpl_vars['membertype_id'] != 4 && $this->_tpl_vars['membertype_id'] != 5): ?>

<div class="steps">
	<div>
	    <h2<?php if ($this->_tpl_vars['hasProfile']): ?> class="done"<?php endif; ?>><a href="personal.php"><?php echo $this->_tpl_vars['_complete_pro_date']; ?>
</a></h2><?php if ($this->_tpl_vars['hasProfile']): ?> <img style="margin-left: 10px;margin-right: -13px;position: absolute" src="../templates/office/images/published_big.png" /><?php endif; ?>
	</div>
	<div>
	    <h2<?php if ($this->_tpl_vars['hasCompany']): ?> class="done"<?php endif; ?>><a class="active" href="company.php"><?php echo $this->_tpl_vars['_added_comany_info']; ?>
</a></h2><?php if ($this->_tpl_vars['hasCompany']): ?> <img style="margin-left: 10px; margin-right: -13px;" src="../templates/office/images/published_big.png" /><?php endif; ?>
	</div>
    </div>

    
	
<?php endif; ?>


<?php if (! $this->_tpl_vars['hasCompany']): ?>
<?php echo '
<script>
    jQuery(document).ready(function($) {
	setTimeout(function(){$(\'.message_step\').fadeIn()}, 200);
    });
</script>
'; ?>

	<div class="message_step" style="display: none"><?php echo $this->_tpl_vars['_no_employer_step2']; ?>
</div>
<?php endif; ?>


<div style="display: none">
	<iframe name="upload_logo"  id="upload_logo"></iframe>
	<form target="upload_logo" id="upload_logo_form" enctype="multipart/form-data" action="../index.php?do=product&amp;action=change_logo" method="post" id="Frm1" name="productaddfrm">
	  <?php echo smarty_function_formhash(array(), $this);?>

	  <input type="hidden" value="<?php echo $this->_tpl_vars['MEMBER']['uername']; ?>
" name="admin">
	  <input type="hidden" value="<?php echo $this->_tpl_vars['COMPANYINFO']['id']; ?>
" name="com_id">
	  <input type="file" id="change_logo_but" name="upload_logo">
	  <input type="submit" value="tải lên" style="padding: 2px 10px; margin-left: 10px;" class="checkout_but">
	</form>	
</div>



	
     <div class="blank"></div>
	 <div class="offer_banner"><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/offer_01.gif" /></div>
     <div class="offer_info_title"><h2><?php echo $this->_tpl_vars['_employer_info']; ?>
</h2></div>
     <div class="hint"><?php echo $this->_tpl_vars['_must_input_with_star']; ?>
</div>
	  <?php echo $this->_tpl_vars['Errors']; ?>

	  <form name="company_frm" id="CompanyFrm" action="<?php echo $_SERVER['PHP_SELF']; ?>
" method="post" enctype="multipart/form-data">
		 <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['item']['id']; ?>
">        
		 <input type="hidden" name="data[companyfield][company_id]" value="<?php echo $this->_tpl_vars['item']['id']; ?>
">        
		 <?php echo smarty_function_formhash(array(), $this);?>
        
		 <input type="hidden" name="do" id="Do" value="save" />
		 <input type="hidden" value="" name="image_tmp" id="image_tmp">

		 
		 
		 
		<div id="product_edit_box" style="margin-bottom: 10px;">
		 
		<table id="company_top_info" width="100%">
			<tr>
				<td class="circle_leftz cclogo" valign="top">
					
					<div id="CompanyLogo" style="">
						<?php if ($this->_tpl_vars['item']['picture']): ?>
							<img alt="(tỉ lệ: 1.2 x 1 - VD: 600 x 500)" title="(tỉ lệ: 1.2 x 1 - VD: 600 x 500)" style="margin-bottom: 0" src="<?php echo $this->_tpl_vars['item']['logo']; ?>
" width="230" id="LogoCom" alt="<?php echo $this->_tpl_vars['_logo_image']; ?>
" />
						
						<?php else: ?>
							<img alt="(tỉ lệ: 1.2 x 1 - VD: 600 x 500)" title="(tỉ lệ: 1.2 x 1 - VD: 600 x 500)" style="margin-bottom: 0" src="../images/company_nopic.png" width="230" id="LogoCom" alt="<?php echo $this->_tpl_vars['_logo_image']; ?>
" />
						<?php endif; ?>
					
					</div>
					<div style="margin-top: 5px;<?php if ($this->_tpl_vars['item']['picture']): ?> display: none<?php endif; ?>" id="change_logoz"><a href="javascript:void(0)"><?php if ($this->_tpl_vars['item']['picture']): ?><?php echo $this->_tpl_vars['_change_logo']; ?>
<?php else: ?><?php echo $this->_tpl_vars['_add_logo']; ?>
<?php endif; ?></a></div>
					<div id="shop_name"><input title="<?php echo $this->_tpl_vars['_shop_name_limit']; ?>
" alt="<?php echo $this->_tpl_vars['_shop_name_limit']; ?>
" maxlength="25" value="<?php echo $this->_tpl_vars['item']['shop_name']; ?>
" id="company_shop_name" name="data[company][shop_name]" class="required" type="text" placeholder="<?php echo $this->_tpl_vars['_input_shop_name']; ?>
"/></div>
					
					<input id="com_pic" style="margin-bottom: 5px;position: absolute;margin-left: -50000px" name="pic" type="file" id="Picture" size="32" onchange="document.getElementById('CompanyLogo').innerHTML='<img src=\''+this.value+'\' width=117 height=63>'">
					
				</td>
				<td class="circle_right" valign="top">
					<div class="tablebox_company">
						<table class="offer_info_content">
							<tr>
								<th class="circle_left"><?php echo $this->_tpl_vars['_employer_name_n']; ?>
<font class="red">*</font></th>
								<td class="circle_right"><input placeholder="Tên Nhà Tuyển Dụng" type="text" name="data[company][name]" id="dataCompanyName" value="<?php echo $this->_tpl_vars['item']['name']; ?>
" size="30" class="required"></td>
							</tr>
							<tr>
								<th><?php echo $this->_tpl_vars['_location']; ?>
<font class="red">*</font></th>
								<td>						
								<div id="dataArea">
								    <select name="area[id][1]" id="dataCompanyAreaId1" class="level_1" style="width:140px;" ></select>
								    <select name="area[id][2]" id="dataCompanyAreaId2" class="level_2" style="width:140px;"></select>
								    <select name="area[id][3]" id="dataCompanyAreaId3" class="level_3" style="width:140px;"></select>
								</div>
								</td>
							</tr>
							<tr>
								<th><?php echo $this->_tpl_vars['_address']; ?>
<font class="red">*</font> </th>
								<td><input placeholder="Số đường Tên đường, Phường/Xã" name="data[company][address]" type="text" id="address" value="<?php echo $this->_tpl_vars['item']['address']; ?>
" class="required"> </td>
							</tr>
							<tr class="tel_area">
										<th><?php echo $this->_tpl_vars['_contact_phone']; ?>
<font class="red">*</font></th>
										<td><input name="data[telcode]" type="text" id="telcode" value="<?php echo $this->_tpl_vars['item']['telcode']; ?>
" size="4" maxlength="4">
										-
										  <input name="data[telzone]" type="text" id="telzone" value="<?php echo $this->_tpl_vars['item']['telzone']; ?>
" size="4" maxlength="4">
										-
										<input name="data[tel]" type="text" id="tel" value="<?php echo $this->_tpl_vars['item']['tel']; ?>
" size="15"> <?php echo $this->_tpl_vars['_format']; ?>
</td>
							</tr>
							<tr class="fax_area">
										<th><?php echo $this->_tpl_vars['_fax_number']; ?>
<font class="red">*</font></th>
										<td><input name="data[faxcode]" type="text" id="faxcode" value="<?php echo $this->_tpl_vars['item']['faxcode']; ?>
" size="4" maxlength="4">
								-
								<input name="data[faxzone]" type="text" id="faxzone" value="<?php echo $this->_tpl_vars['item']['faxzone']; ?>
" size="4" maxlength="4">
								-
								<input name="data[fax]" type="text" id="fax" value="<?php echo $this->_tpl_vars['item']['fax']; ?>
" size="15"> <?php echo $this->_tpl_vars['_format']; ?>
</td>
							</tr>
							<tr>
								<th><?php echo $this->_tpl_vars['_business_email_n']; ?>
<font class="red">*</font> </th>
								<td><input name="data[company][email]" type="text" id="email" value="<?php echo $this->_tpl_vars['item']['email']; ?>
" size="32" class="required"></td>
							</tr>
							<tr>
								<th><?php echo $this->_tpl_vars['_company_home']; ?>
</th>
								<td><input name="data[company][site_url]" type="text" id="site_url" value="<?php echo $this->_tpl_vars['item']['site_url']; ?>
" size="32"></td>
							</tr>
						</table>
					</div>					
				</td>
			</tr>
			
		</table>
		 
		<br />
		<h2><?php echo $this->_tpl_vars['_person_company_contact']; ?>
</h2>
		
		<span class="top-table">.</span>
		<table class="offer_info_content">
              
              <tr style="display: none">
                <th> <?php echo $this->_tpl_vars['_company_en_name']; ?>
</th>
                <td><input name="data[company][english_name]" type="text" id="english_name" value="<?php echo $this->_tpl_vars['item']['english_name']; ?>
" size="30"></td>
              </tr>
	      
	      
	      <tr>
                <th><?php echo $this->_tpl_vars['_contact_people']; ?>
 </th>
                <td><input name="data[company][link_man]" type="text" id="linkman" value="<?php echo $this->_tpl_vars['item']['link_man']; ?>
" size="32">
			<?php echo $this->_tpl_vars['_chucvu']; ?>

			<input name="data[company][position]" type="text" id="dataCompanyPosition" value="<?php echo $this->_tpl_vars['item']['position']; ?>
" size="30">
			
			<span class="gendercheck" style="margin-left: 10px"><?php echo smarty_function_html_radios(array('name' => "data[company][link_man_gender]",'options' => $this->_tpl_vars['Genders'],'checked' => $this->_tpl_vars['item']['link_man_gender'],'separator' => ' '), $this);?>
</span>
		</td>
              </tr>
	      
	      <tr>
                <th><?php echo $this->_tpl_vars['_mobile_number']; ?>
:</th>
                <td><input name="data[company][contact_mobile]" type="text" id="contact_mobile" value="<?php echo $this->_tpl_vars['item']['contact_mobile']; ?>
" size="32"></td>
              </tr>
	      
	      <tr>
                <th><?php echo $this->_tpl_vars['_email']; ?>
:</th>
                <td><input name="data[company][contact_email]" type="text" id="contact_email" value="<?php echo $this->_tpl_vars['item']['contact_email']; ?>
" size="32"></td>
              </tr>
	      
	      
	      
		</table>
		<span class="bottom-table">.</span>
		
		
		
		
		
		<br />
		<h2><?php echo $this->_tpl_vars['_thungo_company']; ?>
</h2>
		 <p>
                    <textarea name="data[company][description]" rows="80" wrap="VIRTUAL" id="company_des" style="width:100%;height: 600px"><?php echo $this->_tpl_vars['item']['description']; ?>
</textarea>
                </p>
		 
		 
</div>
		 
       <input name="company_edit" type="submit" id="CompanyEdit" value="<?php echo $this->_tpl_vars['_confirm_submit']; ?>
">
		 
          
	</form>
	  
	  
	<div id="uploadImageVideo" style="margin-top: -595px;">
		<iframe style="display: none" id="insertFrame" name="insertFrame" ></iframe>
		<form method="POST" action="<?php echo $this->_tpl_vars['SiteUrl']; ?>
index.php?do=product&action=uploadEditorFile" name="insertPicForm" id="insertPicForm" target="insertFrame" enctype="multipart/form-data" onsubmit="return checkUploadEditorInput()">
			<input type="hidden" name="do" value="product" />
			<input type="hidden" name="action" value="uploadEditorFile" />
			
			
			<input id="uploadIVbutton" type = "button" value = "Tải Ảnh/Video" 
       onclick ="javascript:document.getElementById('imagefile').click();">
      
			<input style="visibility: hidden; position: absolute; top: -20000px" id="imagefile" type="file" name="uploadEditorFile" id="uploadEditorFile" onchange="$('#insertPicForm').submit()" />
			
		</form>
	</div>
	  

</div>
</div>
<script>
var cache_path = "../";
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
</script>
<script src="../scripts/multi_select.js" charset="<?php echo $this->_tpl_vars['charset']; ?>
"></script>
<script src="../scripts/script_area.js"></script>
<script src="../scripts/script_industry.js"></script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>