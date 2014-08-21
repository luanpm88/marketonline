<?php /* Smarty version 2.6.27, created on 2014-08-14 14:26:40
         compiled from shop.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'shop.html', 9, false),array('function', 'editor', 'shop.html', 271, false),array('function', 'formhash', 'shop.html', 313, false),array('function', 'html_radios', 'shop.html', 435, false),)), $this); ?>
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
	
	function inserEditorFile(url, image) {
		$(\'#uploadIVbutton\').removeAttr(\'disabled\');
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
		
		if (($(\'#dataCompanyAreaId3\').val() ==  \'0\' && $(\'#dataCompanyAreaId1\').val() ==  \'1\') || $(\'#dataCompanyAreaId1\').val() ==  \'0\') {
			$(\'#company_des\').before();
			result = false;
		}
		
		if(tinyMCE.activeEditor.getContent() == "")
		{			
			result = false;
		}
		
		if(!$(\'input[name="data[company][link_man_gender]"]:checked\').val())
		{
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
		
		
		
		if ($(\'#dataCompanyAreaId3\').val() ==  \'0\') {
			
			$(\'#dataCompanyAreaId3\').parent().find(\'label\').remove();
			$(\'#dataCompanyAreaId3\').parent().append(\'<label for="" class="errorz">Nội dung yêu cầu nhập</label>\');
			result = false;
		}
		else
		{
			$(\'#dataCompanyAreaId3\').parent().find(\'label\').remove();
		}
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
		
				
		var areaerror = false;
		if(tinyMCE.activeEditor.getContent() == "")
		{
			$(\'#company_des\').parent().find(\'label\').remove();
			$(\'#company_des\').before(\'<label for="" class="errorz">Nội dung yêu cầu nhập</label>\');
			areaerror = true;
		}
		else
		{
			$(\'#company_des\').parent().find(\'label\').remove();
		}
		
		
				if(!$(\'input[name="data[company][link_man_gender]"]:checked\').val())
				{
						$(\'.gendercheck\').find(\'label.errorz\').remove();
						if($(\'#linkman\').val() != \'\') $(\'.gendercheck\').append(\'<label for="linkman" class="errorz">Chọn giới tính</label>\');
						result = false;
						
						if (result) {
							$("html, body").animate({ scrollTop:800 }, 100);
						}
				}
				else
				{
						$(\'.gendercheck\').find(\'label.errorz\').remove();
				}
		
		
		if (!result) {
			$("html, body").animate({ scrollTop:100 }, 100);
		}
		else if (areaerror) {
			setTimeout( function(){
				if ($(window).scrollTop() > 700) {
					$("html, body").animate({ scrollTop:1200 }, 100);
				}
			}, 100);			
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
	
	
<?php if (! $this->_tpl_vars['hasProfile'] || ! $this->_tpl_vars['hasCompany']): ?>

<div class="steps">
	<div>
	    <h2<?php if ($this->_tpl_vars['hasProfile']): ?> class="done"<?php endif; ?>><a href="personal.php"><?php echo $this->_tpl_vars['_complete_pro_date']; ?>
</a></h2><?php if ($this->_tpl_vars['hasProfile']): ?> <img style="margin-left: 10px;margin-right: -13px;position: absolute" src="../templates/office/images/published_big.png" /><?php endif; ?>
	</div>
	<div>
	    <h2<?php if ($this->_tpl_vars['hasCompany']): ?> class="done"<?php endif; ?>><a class="active" href="company.php"><?php echo $this->_tpl_vars['_added_comany_info']; ?>
</a></h2><?php if ($this->_tpl_vars['hasCompany']): ?> <img style="margin-left: 10px; margin-right: -13px;position: absolute" src="../templates/office/images/published_big.png" /><?php endif; ?>
	</div>
    </div>

    <?php if (! $this->_tpl_vars['hasCompany']): ?>
    
    <?php echo '
<script>
    jQuery(document).ready(function($) {
	setTimeout(function(){$(\'.message_step\').fadeIn()}, 200);
    });
</script>
'; ?>


	<div class="message_step" style="display: none"><?php echo $this->_tpl_vars['_no_step2']; ?>
</div>
    <?php endif; ?>
	
<?php endif; ?>




<div class="hide">
	<iframe name="upload_logo"  id="upload_logo"></iframe>
	<form target="upload_logo" id="upload_logo_form" enctype="multipart/form-data" action="../index.php?do=product&amp;action=change_logo" method="post" id="Frm1" name="productaddfrm">
	  <?php echo smarty_function_formhash(array(), $this);?>

	  <input type="hidden" value="<?php echo $this->_tpl_vars['MEMBER']['username']; ?>
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
     <div class="offer_info_title"><h2><?php echo $this->_tpl_vars['_shop_info']; ?>
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
			<?php if (! $this->_tpl_vars['hasCompany']): ?><input type="hidden" value="1" name="isnew" id="isnew"><?php endif; ?>
		
		 
		 
<div id="product_edit_box" style="margin-bottom: 10px;">
		 
		<table id="company_top_info" width="100%">
			<tr>
				<td class="circle_leftz cclogo" valign="top">
					
					<div id="CompanyLogo" style="">
						
						<?php if ($this->_tpl_vars['item']['logo']): ?>
							<img alt="(tỉ lệ: 1.2 x 1 - VD: 600 x 500)" title="(tỉ lệ: 1.2 x 1 - VD: 600 x 500)" style="margin-bottom: 0" src="<?php echo $this->_tpl_vars['item']['logo']; ?>
" width="230" id="LogoCom" alt="<?php echo $this->_tpl_vars['_logo_image']; ?>
" />
						
						<?php else: ?>
							<img alt="(tỉ lệ: 1.2 x 1 - VD: 600 x 500)" title="(tỉ lệ: 1.2 x 1 - VD: 600 x 500)" style="margin-bottom: 0" src="../images/company_nopic.png" width="230" id="LogoCom" alt="<?php echo $this->_tpl_vars['_logo_image']; ?>
" />
						<?php endif; ?>
					
					</div>
					<div style="margin-top: 5px; <?php if ($this->_tpl_vars['item']['picture']): ?> display: none<?php endif; ?>" id="change_logoz"><a href="javascript:void(0)"><?php if ($this->_tpl_vars['item']['logo']): ?><?php echo $this->_tpl_vars['_change_logo']; ?>
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
								<th class="circle_left"><?php echo $this->_tpl_vars['_shop_name_n']; ?>
<font class="red">*</font></th>
								<td class="circle_right"><input placeholder="Tên Cửa Hàng hoặc lấy Tên Công Ty / Tên Nhà Phân Phối" type="text" name="data[company][name]" id="dataCompanyName" value="<?php echo $this->_tpl_vars['item']['name']; ?>
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
								<td><input placeholder="Số Tên đường, Phường/Xã" name="data[company][address]" type="text" id="address" value="<?php echo $this->_tpl_vars['item']['address']; ?>
" class="required"> </td>
							</tr>
							<tr class="tel_area">
										<th><?php echo $this->_tpl_vars['_contact_phone']; ?>
</th>
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
</th>
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
					<table class="offer_info_content no_background">
						<tr>
							<th class="circle_left"><?php echo $this->_tpl_vars['_keyword']; ?>
<font class="red">*</font></th>
							<td class="circle_right"><input placeholder="<?php echo $this->_tpl_vars['_space_separate_shop']; ?>
" type="text" name="data[tag]" id="dataTag" value="<?php echo $this->_tpl_vars['item']['tag']; ?>
" size="30" class="required"></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		 
		<br />
		<h2><?php echo $this->_tpl_vars['_shop_intro']; ?>
</h2>
		<h3>A. <?php echo $this->_tpl_vars['_person_company_contact']; ?>
</h3>
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
<font class="red">*</font> </th>
                <td><input name="data[company][link_man]" type="text" id="linkman" value="<?php echo $this->_tpl_vars['item']['link_man']; ?>
" size="32" class="required">
			<?php echo $this->_tpl_vars['_chucvu']; ?>
 
			<input name="data[company][position]" type="text" id="dataCompanyPosition" value="<?php echo $this->_tpl_vars['item']['position']; ?>
" size="30">
			
			<span class="gendercheck" style="margin-left: 10px"><?php echo smarty_function_html_radios(array('name' => "data[company][link_man_gender]",'options' => $this->_tpl_vars['Genders'],'checked' => $this->_tpl_vars['item']['link_man_gender'],'separator' => ' '), $this);?>
</span>
		</td>
              </tr>
	      
	      <tr>
                <th><?php echo $this->_tpl_vars['_mobile_number']; ?>
:<font class="red">*</font></th>
                <td><input name="data[company][contact_mobile]" type="text" id="contact_mobile" value="<?php echo $this->_tpl_vars['item']['contact_mobile']; ?>
" size="32" class="required"></td>
              </tr>
	      
	      <tr>
                <th><?php echo $this->_tpl_vars['_email']; ?>
:<font class="red">*</font></th>
                <td><input name="data[company][contact_email]" type="text" id="contact_email" value="<?php echo $this->_tpl_vars['item']['contact_email']; ?>
" size="32" class="required"></td>
              </tr>
	      <tr>
                <th>Facebook:</th>
                <td><input placeholder="<?php echo $this->_tpl_vars['_facebook_note']; ?>
" name="data[company][facebook]" type="text" id="contact_facebook" value="<?php echo $this->_tpl_vars['item']['facebook']; ?>
" style="width:432px;"></td>
              </tr>
	      
		</table>
		<span class="bottom-table">.</span>
		
		
		
		<h3>B. <?php echo $this->_tpl_vars['_shop_power']; ?>
</h3>
		<span class="top-table">.</span>
		<table class="offer_info_content">
              
              
	      
	      <tr style="display: none">
                <th><?php echo $this->_tpl_vars['_main_business_place']; ?>
<font class="red">*</font> </th>
                <td><input placeholder="<?php echo $this->_tpl_vars['_address']; ?>
" name="data[company][main_biz_place]" type="text" id="main_biz_place" value="<?php echo $this->_tpl_vars['item']['main_biz_place']; ?>
" size="32" class=""> 
                <?php echo $this->_tpl_vars['_provinces_city_name']; ?>
</td>
              </tr>
              <tr>
                <th><?php echo $this->_tpl_vars['_main_customer']; ?>
 (nếu có)</th>
                <td><input placeholder="<?php echo $this->_tpl_vars['_vp_address']; ?>
" name="data[company][main_customer]" type="text" id="main_customer" value="<?php echo $this->_tpl_vars['item']['main_customer']; ?>
" size="32">
		
		
		
                                  </td>
              </tr>
	      <tr>
                <th></th>
                <td>
		<input placeholder="<?php echo $this->_tpl_vars['_phone']; ?>
" name="data[company][vp_address]" type="text" id="vp_address" value="<?php echo $this->_tpl_vars['item']['vp_address']; ?>
" size="32">
		<input placeholder="<?php echo $this->_tpl_vars['_fax']; ?>
" name="data[company][vp_fax]" type="text" id="vp_fax" value="<?php echo $this->_tpl_vars['item']['vp_fax']; ?>
" size="32">
		<input placeholder="<?php echo $this->_tpl_vars['_email']; ?>
" name="data[company][vp_email]" type="text" id="vp_email" value="<?php echo $this->_tpl_vars['item']['vp_email']; ?>
" size="32">
                                  </td>
              </tr>
	      <!--<tr>
                <th><?php echo $this->_tpl_vars['_brand_name']; ?>
</th>
                <td><input name="data[company][main_brand]" type="text" id="main_brand" value="<?php echo $this->_tpl_vars['item']['main_brand']; ?>
" size="32"></td>
              </tr>-->
	      <tr>
                <th> <?php echo $this->_tpl_vars['_sectors']; ?>
</td>
                <td>
                <div id="dataIndustry" style="display: none">
                    <select name="industry[id][1]" id="dataCompanyIndustryId1" class="level_1"  ></select>
                    <select name="industry[id][2]" id="dataCompanyIndustryId2" class="level_2" ></select>
                    <select name="industry[id][3]" id="dataCompanyIndustryId3" class="level_3" ></select>
		    <select name="industry[id][4]" id="dataCompanyIndustryId4" class="level_4" ></select>
		    
		    
                </div>
			<ul class="industry_list_checkbox">
				<?php $_from = $this->_tpl_vars['industries_checkbox']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_0'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_0']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key0'] => $this->_tpl_vars['itemc']):
        $this->_foreach['level_0']['iteration']++;
?>
				     <li><input type="checkbox" <?php if ($this->_tpl_vars['itemc']['checked']): ?>checked="checked"<?php endif; ?> name="industries_checkbox[]" value="<?php echo $this->_tpl_vars['itemc']['id']; ?>
"><?php echo $this->_tpl_vars['itemc']['name']; ?>
</li>
				<?php endforeach; endif; unset($_from); ?>
				<li><input type="checkbox" name="industries_checkbox[]" value="0"><?php echo $this->_tpl_vars['_others']; ?>
</li>
			</ul>
                </td>
              </tr>
	      
	      <tr>
                <th><?php echo $this->_tpl_vars['_legal_note_company']; ?>
</th>
                <td><font color="#666666"> <span class="zi">
                  <input name="data[company][reg_address]" type="text" id="reg_address" value="<?php echo $this->_tpl_vars['item']['reg_address']; ?>
">
                </span> </font>
		
		</td>
              </tr>
	      <tr>
                <th><?php echo $this->_tpl_vars['_registration_date']; ?>
</th>
                <td><font color="#666666"> <span class="zi">
			<input style="width: 194px" type="text" placeholder="<?php echo $this->_tpl_vars['_date_format2']; ?>
" name="data[company][registration_date]" id="dataFoundDate" value="<?php echo $this->_tpl_vars['item']['registration_date']; ?>
"> 
                </span></font>(Ví dụ: 31-01-2013)
		
		</td>
              </tr>
	      
	      <!--<tr>
                <th><?php echo $this->_tpl_vars['_registration_year']; ?>
</th>
                <td><font color="#666666"> <span class="zi">
			<input style="width: 99px" type="text" name="data[company][found_date]" id="dataFoundDate" value="<?php echo $this->_tpl_vars['item']['found_year']; ?>
">
                </span> </font>
		
		</td>
              </tr>-->
	      
	      <tr>
                <th><?php echo $this->_tpl_vars['_registration_year']; ?>
</th>
                <td><font color="#666666"> <span class="zi">
			<input style="width: 99px" type="text" name="data[company][found_date]" id="dataFoundDate" value="<?php echo $this->_tpl_vars['item']['found_year']; ?>
">
                </span> </font>
		
		</td>
              </tr>
	      
	      
	      <tr>
                <th><?php echo $this->_tpl_vars['_legal_person']; ?>
</th>
                <td><font color="#666666"> <span class="zi">
                  <input name="data[company][boss_name]" type="text" id="bossname" value="<?php echo $this->_tpl_vars['item']['boss_name']; ?>
">
                </span> </font></td>
              </tr>
	       <tr>
                <th><?php echo $this->_tpl_vars['_shop_boss_man']; ?>
</th>
                <td><font color="#666666"> <span class="zi">
                  <input name="data[company][chairman]" type="text" id="chairman" value="<?php echo $this->_tpl_vars['item']['chairman']; ?>
">
                </span> </font></td>
              </tr>
	      <tr>
                <th><?php echo $this->_tpl_vars['_registration_funds']; ?>
</th>
                <td>
			<input name="data[company][reg_fund]" type="text" id="dataCompanyRegFund" value="<?php echo $this->_tpl_vars['item']['reg_fund']; ?>
" size="30">			
		</td>
              </tr>
	      <tr>
                <th><?php echo $this->_tpl_vars['_mst']; ?>
</th>
                <td><font color="#666666"> <span class="zi">
                  <input name="data[company][mst]" type="text" id="mst" value="<?php echo $this->_tpl_vars['item']['mst']; ?>
">
                </span> </font></td>
              </tr>
	       
              <tr>
                <th><?php echo $this->_tpl_vars['_bank_account']; ?>
</th>
                <td><input name="data[company][bank_account]" type="text" id="bank_account" value="<?php echo $this->_tpl_vars['item']['bank_account']; ?>
" size="32">
		<input style="width: 400px" placeholder="<?php echo $this->_tpl_vars['_opening_bank']; ?>
" name="data[company][bank_from]" type="text" id="bank_from" value="<?php echo $this->_tpl_vars['item']['bank_from']; ?>
" size="32">
		</td>
              </tr>
	      <tr>
                <th><?php echo $this->_tpl_vars['_bussiness_form']; ?>
</th>
                <td>			
			<input placeholder="Tư nhân / Nhà nước" name="data[company][property]" type="text" id="dataCompanyEconomicType" value="<?php echo $this->_tpl_vars['item']['property']; ?>
" size="30">			
		</td>
              </tr>
	      
	       <tr>
                <th> <?php echo $this->_tpl_vars['_business_model']; ?>
</th>
                <td>			
			<input placeholder="CTy TNHH / Cổ phần ..." name="data[company][manage_type]" type="text" id="dataCompanyManageType" value="<?php echo $this->_tpl_vars['item']['manage_type']; ?>
" size="30">			
		</td>
              </tr>
              
	      
              
              <tr>
                <th> <?php echo $this->_tpl_vars['_employees_number']; ?>
</th>
                <td>			
			<input name="data[company][employee_amount]" type="text" id="dataCompanyEmployeeAmount" value="<?php echo $this->_tpl_vars['item']['employee_amount']; ?>
" size="30">			
		</td>
              </tr>
              <tr>
                <th> <?php echo $this->_tpl_vars['_year_turnover']; ?>
</th>
                <td>			
			<input name="data[company][year_annual]" type="text" id="dataCompanyYearAnnual" value="<?php echo $this->_tpl_vars['item']['year_annual']; ?>
" size="30">			
		</td>
              </tr>
             
              
              <tr style="display:none">
                <th><?php echo $this->_tpl_vars['_company_profile']; ?>
<font class="red">*</font> </th>
                <td></td>
              </tr>
              
              
             <!-- <tr>
                <th><?php echo $this->_tpl_vars['_zip']; ?>
 </th>
                <td><input name="data[company][zipcode]" type="text" id="zipcode" value="<?php echo $this->_tpl_vars['item']['zipcode']; ?>
" class=""> </td>
              </tr>-->
              
              
              
              
             
              
              
              
              
              
              
              
              
             <!-- <tr>
                <th><?php echo $this->_tpl_vars['_longitude']; ?>
</th>
                <td><input name="data[companyfield][map_longitude]" type="text" id="map_longitude" value="<?php echo $this->_tpl_vars['item']['map_longitude']; ?>
" size="32">&nbsp;<a href="card.php"><?php echo $this->_tpl_vars['_click_and_search']; ?>
</a></td>
              </tr>
              <tr>
                <th><?php echo $this->_tpl_vars['_latitude']; ?>
</th>
                <td><input name="data[companyfield][map_latitude]" type="text" id="map_latitude" value="<?php echo $this->_tpl_vars['item']['map_latitude']; ?>
" size="32">&nbsp;<a href="card.php"><?php echo $this->_tpl_vars['_click_and_search']; ?>
</a></td>
              </tr>-->
              
              <tr style="display: none">
                <th><?php echo $this->_tpl_vars['_company_logo']; ?>
</th>
                <td>
			</td>
              </tr>
	      
	      <tr style="display: none">
                <th><?php echo $this->_tpl_vars['_company_banner']; ?>
 (1200x400)</th>
                <td><div><input name="banner" type="file" id="Banner" size="32" ></div>
		<?php if ($this->_tpl_vars['item']['banner']): ?><div style="margin-top: 5px"><img style="width: 300px; height: 100px" src="<?php echo $this->_tpl_vars['item']['banner']; ?>
" width="117" height="63" alt="<?php echo $this->_tpl_vars['_company_banner']; ?>
" /></div><?php endif; ?></td>
              </tr>
	      
              
          </table>
		<span class="bottom-table">.</span>
		
		
		<h3>C. <?php echo $this->_tpl_vars['_thungo_shop']; ?>
<font class="red">*</font></h3>
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