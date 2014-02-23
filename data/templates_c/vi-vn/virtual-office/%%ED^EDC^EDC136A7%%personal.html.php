<?php /* Smarty version 2.6.27, created on 2014-02-17 10:36:38
         compiled from personal.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'formhash', 'personal.html', 276, false),array('function', 'html_radios', 'personal.html', 322, false),array('modifier', 'default', 'personal.html', 530, false),)), $this); ?>
<?php $this->assign('page_title', ($this->_tpl_vars['_profile'])); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
<script>
		function checkOtherSubject()
		{
			if ($(\'input[name="other_subject"]:checked\').length) {
				//$(\'.subject_name span.select_box\').css("display","none");				
				$(\'.other_subjects input[name="other_subject_name"]\').css("display","inline");
				$(\'.other_subjects input[name="other_subject_name"]\').focus();
			}
			else
			{
				//$(\'.subject_name span.select_box\').css("display","inline");				
				$(\'.other_subjects input[name="other_subject_name"]\').css("display","none");
			}
		}
		
		function checkOtherSchool()
		{
			if ($(\'input[name="other_school"]:checked\').length) {
				$(\'.school_name span.select_box\').css("display","none");				
				$(\'.school_name input[name="other_school_name"]\').css("display","inline");
				$(\'.school_name input[name="other_school_name"]\').focus();
			}
			else
			{
				$(\'.school_name span.select_box\').css("display","inline");				
				$(\'.school_name input[name="other_school_name"]\').css("display","none");
			}
		}
		
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
<?php echo $this->_tpl_vars['_change_personal_photo']; ?>
<?php echo '\');
				
				'; ?>
<?php if (! $this->_tpl_vars['item']['photo']): ?><?php echo '
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

    
    
	jQuery(document).ready(function($) {
		$(\'.MenuItem18\').addClass(\'mActive\');
		
		$("#Frm1").validate({
		    submitHandler: function(form) {
			
			
			var result = true;
			
			'; ?>
<?php if (! $this->_tpl_vars['item']['photo']): ?><?php echo '
			//    if($(\'#change_logo_but\').val() == \'\')
			//    {
			//	result = false;
			//    }
			'; ?>
<?php endif; ?><?php echo '
	
			if (($(\'#dataMemberfieldAreaId3\').val() ==  \'0\' && $(\'#dataMemberfieldAreaId1\').val() ==  \'1\') || $(\'#dataMemberfieldAreaId1\').val() ==  \'0\') {
				
				$(\'#dataMemberfieldAreaId3\').parent().find(\'label\').remove();
				$(\'#dataMemberfieldAreaId3\').parent().append(\'<label for="" class="errorz">Nội dung yêu cầu nhập</label>\');
				result = false;
			}
			
			//if ($(\'#dataMemberfieldAreaId3\').val() ==  \'0\') {			
			//	result = false;
			//}
			
			
				if(!$(\'input[name="memberfield[gender]"]:checked\').val())
				{						
					result = false;
				}
			
			if(($(\'#school_select\').val() == "0" && !$(\'input[name="other_school"]:checked\').length) ||
				($(\'input[name="other_school_name"]\').val() == "" && $(\'input[name="other_school"]:checked\').length))
			{
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
			
			'; ?>
<?php if (! $this->_tpl_vars['item']['photo']): ?><?php echo '
				//if($(\'#change_logo_but\').val() == \'\')
				//{
				//	$(\'.cclogo\').find(\'label.errorz\').remove();
				//	$(\'.cclogo\').append(\'<label for="" style="clear:both" class="errorz">Bạn phải chọn logo đại diện</label>\');
				//	$("html, body").animate({ scrollTop: 100 }, 100);
				//	result = false;
				//}
				//else
				//{
				//	$(\'.cclogo\').find(\'label.errorz\').remove();
				//}
				//$(\'#change_logo_but\').change(function(){
				//	$(\'.cclogo\').find(\'label.errorz\').remove();
				//});
			'; ?>
<?php endif; ?><?php echo '
	
			if (($(\'#dataMemberfieldAreaId3\').val() ==  \'0\' && $(\'#dataMemberfieldAreaId1\').val() ==  \'1\') || $(\'#dataMemberfieldAreaId1\').val() ==  \'0\') {
			
				$(\'#dataMemberfieldAreaId3\').parent().find(\'label\').remove();
				$(\'#dataMemberfieldAreaId3\').parent().append(\'<label for="" class="errorz">Nội dung yêu cầu nhập</label>\');
				result = false;
			}
			else
			{
			    $(\'#dataMemberfieldAreaId3\').parent().find(\'label\').remove();
			}
			$(\'#dataMemberfieldAreaId3, #dataMemberfieldAreaId2, #dataMemberfieldAreaId1\').change(function(){
				if ($(\'#dataMemberfieldAreaId3\').val() !=  \'0\') {
					$(\'#dataMemberfieldAreaId3\').parent().find(\'label\').remove();
				}
				else
				{
					$(\'#dataMemberfieldAreaId3\').parent().find(\'label\').remove();
					$(\'#dataMemberfieldAreaId3\').parent().append(\'<label for="" class="errorz">Nội dung yêu cầu nhập</label>\');
				}
			});
			
			
			
				if(!$(\'input[name="memberfield[gender]"]:checked\').val())
				{
						$(\'.gendercheck\').find(\'label.errorz\').remove();
						$(\'.gendercheck\').append(\'<label for="" class="errorz">Nội dung yêu cầu nhập</label>\');
						result = false;
				}
				else
				{
						$(\'.gendercheck\').find(\'label.errorz\').remove();
				}
				
			if(($(\'#school_select\').val() == "0" && !$(\'input[name="other_school"]:checked\').length) ||
				($(\'input[name="other_school_name"]\').val() == "" && $(\'input[name="other_school"]:checked\').length))
			{
				$(\'.school_name\').parent().find(\'label.errorz\').remove();
				$(\'.school_name\').parent().append(\'<label for="" class="errorz">Nội dung yêu cầu nhập</label>\');
				result = false;
			}
			else
			{
				$(\'.school_name\').parent().find(\'label.errorz\').remove();
			}
				
			
			if (!result) {
				$("html, body").animate({ scrollTop:100 }, 100);
			}
		});
		
		$("#MemberPhoto").change(function(){
		    readURL(this);
		});
		
		$(\'#change_logoz a\').click(function() {
				//alert("sdfsdf");
				$(\'#change_logo_but\').trigger(\'click\');
			});
			
			$(\'#change_logo_but\').change(function() {
				//$(\'#company_top_info #CompanyLogo\').html(\'<p>Logo đã được thay đổi. Bạn phải lưu thông tin để thấy logo mới.</p>\');		
				uploadLogo(this);
			});
			
			
		//show hide school
		checkOtherSchool();
		$(\'input[name="other_school"]\').change(function(){
			checkOtherSchool();
		});
		
		//show hide subject
		checkOtherSubject();
		$(\'input[name="other_subject"]\').change(function(){
			checkOtherSubject();
		});
	});
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
	
<?php if (( ! $this->_tpl_vars['hasProfile'] || ! $this->_tpl_vars['hasCompany'] ) && $this->_tpl_vars['membertype_id'] != 4 && $this->_tpl_vars['membertype_id'] != 5 && $this->_tpl_vars['membertype_id'] != 6): ?>

<div class="steps">
	<div>
	    <h2<?php if ($this->_tpl_vars['hasProfile']): ?> class="done"<?php endif; ?>><a class="active" href="personal.php"><?php echo $this->_tpl_vars['_complete_pro_date']; ?>
</a></h2><?php if ($this->_tpl_vars['hasProfile']): ?> <img style="margin-left: 10px;margin-right: -13px; position: absolute" src="../templates/office/images/published_big.png" /><?php endif; ?>
	</div>
	<div>
	    <h2<?php if ($this->_tpl_vars['hasCompany']): ?> class="done"<?php endif; ?>><a href="company.php"><?php echo $this->_tpl_vars['_added_comany_info']; ?>
</a></h2><?php if ($this->_tpl_vars['hasCompany']): ?> <img style="margin-left: 10px; margin-right: -13px;" src="../templates/office/images/published_big.png" /><?php endif; ?>
	</div>
</div>

<?php endif; ?>


<?php if (! $this->_tpl_vars['hasProfile'] && $this->_tpl_vars['membertype_id'] != 5): ?>
<?php echo '
<script>
    jQuery(document).ready(function($) {
	setTimeout(function(){$(\'.message_step\').fadeIn()}, 200);
    });
</script>
'; ?>

<div class="message_step" style="display: none"><?php echo $this->_tpl_vars['_no_step1']; ?>
</div>
<?php endif; ?>


<?php if (( false )): ?>

<div class="steps">
	<div>
	    <h2><a class="active" href="personal.php"><?php echo $this->_tpl_vars['_complete_pro_date_personal']; ?>
<?php if ($this->_tpl_vars['hasProfile']): ?> <img style="margin-left: 10px;margin-right: -13px;" src="../templates/office/images/published.png" /><?php endif; ?></a></h2>
	</div>
</div>
	
<?php endif; ?>



<div class="hide">
	<iframe name="upload_logo"  id="upload_logo"></iframe>
	<form target="upload_logo" id="upload_logo_form" enctype="multipart/form-data" action="../index.php?do=product&amp;action=change_ava" method="post" id="Frm1" name="productaddfrm">
	  <?php echo smarty_function_formhash(array(), $this);?>

	  <input type="hidden" value="<?php echo $this->_tpl_vars['MEMBER']['username']; ?>
" name="admin">
	  <input type="hidden" value="<?php echo $this->_tpl_vars['MEMBER']['id']; ?>
" name="com_id">
	  <input type="file" id="change_logo_but" name="upload_logo">
	  <input type="submit" value="tải lên" style="padding: 2px 10px; margin-left: 10px;" class="checkout_but">
	</form>	
</div>
	
     <div class="blank"></div>
	 <div class="offer_banner"><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/offer_01.gif" /></div>
     <div class="offer_info_title"><h2><?php echo $this->_tpl_vars['page_title']; ?>
</h2></div>
     <div class="hint"><?php echo $this->_tpl_vars['_must_input_with_star']; ?>
</div>
	  <form name="companyeditfrm" id="Frm1" method="post" enctype="multipart/form-data">
	  <?php echo smarty_function_formhash(array(), $this);?>

		
		<input type="hidden" value="" name="image_tmp" id="image_tmp">
		
		
		<div id="product_edit_box" style="margin-bottom: 10px;">
		 
		<table id="company_top_info" width="100%">
			<tr>
				<td class="circle_leftz cclogo" valign="top">
					<div id="CompanyLogo" style="">
					    <?php if ($this->_tpl_vars['item']['photo']): ?>
						<img id="mem_photo" src="<?php echo $this->_tpl_vars['item']['image']; ?>
" />
					    <?php else: ?>
						<img id="mem_photo" src="../images/personal_nopic.png" />
					    <?php endif; ?>
					</div>
					    
					
					<div style="margin-top: 5px;<?php if ($this->_tpl_vars['item']['photo']): ?> display: none<?php endif; ?>" id="change_logoz"><a href="javascript:void(0)"><?php if ($this->_tpl_vars['item']['photo']): ?><?php echo $this->_tpl_vars['_change_personal_photo']; ?>
<?php else: ?><?php echo $this->_tpl_vars['_add_personal_photo']; ?>
<?php endif; ?></a></div>
					<input id="com_pic" style="margin-bottom: 5px;position: absolute;margin-left: -50000px" name="photo" type="file" id="MemberPhoto" size="32" onchange="document.getElementById('CompanyLogo').innerHTML='<img src=\''+this.value+'\' width=117 height=63>'">
					
				</td>
				<td class="circle_right" valign="top">
					<div class="tablebox_personal">
						<table class="offer_info_content">
							<tr>
								<th class="circle_left"><?php echo $this->_tpl_vars['_vorname']; ?>
<font color="#FF6600">*</font></th>
								<td class="circle_right"><input name="memberfield[first_name]" type="text" placeholder="<?php echo $this->_tpl_vars['_first_name']; ?>
" id="memberlastname" value="<?php echo $this->_tpl_vars['item']['first_name']; ?>
" size="25">&nbsp;<input placeholder="<?php echo $this->_tpl_vars['_last_name']; ?>
" name="memberfield[last_name]" type="text" id="memberlastname" value="<?php echo $this->_tpl_vars['item']['last_name']; ?>
" class="required" size="25"></td>
							      </tr>
							      
							      <tr>
								<th><?php echo $this->_tpl_vars['_sex_n']; ?>
<font color="#FF6600">*</font></th>
								<td class="gendercheck"><?php echo smarty_function_html_radios(array('name' => "memberfield[gender]",'options' => $this->_tpl_vars['Genders'],'checked' => $this->_tpl_vars['item']['gender'],'separator' => ' '), $this);?>
</td>
							      </tr>
							       <tr style="display: none">
								<th><?php echo $this->_tpl_vars['_contact_phone']; ?>
</th>
								<td><input placeholder="<?php echo $this->_tpl_vars['_contact_phone']; ?>
" size="25" name="memberfield[tel]" type="text" id="membertel" value="<?php echo $this->_tpl_vars['item']['tel']; ?>
">
								
								 <!--<input placeholder="<?php echo $this->_tpl_vars['_fax_number']; ?>
" size="25" name="memberfield[fax]" type="text" id="memberfax" value="<?php echo $this->_tpl_vars['item']['fax']; ?>
">-->
								</td>
							      </tr>
							      <tr>
								<th><?php echo $this->_tpl_vars['_mobile_number']; ?>
<font color="#FF6600">*</font></th>
								<td><input size="25" name="memberfield[mobile]" type="text" id="membermobile" value="<?php echo $this->_tpl_vars['item']['mobile']; ?>
" class="required">
								    
								</td>
							      </tr>
							      <tr>
								<th><?php echo $this->_tpl_vars['_email_addr']; ?>
<font color="#FF6600">*</font></th>
								<td><input name="member[email]" type="text" id="memberemail" value="<?php echo $this->_tpl_vars['item']['email']; ?>
" size="40" class="required email"> (<a name="mod" href="javascript:;" onclick="javascript:$('#memberemail').attr('disabled',false);"><?php echo $this->_tpl_vars['_modify']; ?>
</a>)</td>
							      </tr>
							      <tr>
								<th><?php echo $this->_tpl_vars['_area']; ?>
<font color="#FF6600">*</font></th>
								<td>
											<div id="dataArea">
												<select name="area[id][1]" id="dataMemberfieldAreaId1" class="level_1" style="width:120px;" ></select>
												<select name="area[id][2]" id="dataMemberfieldAreaId2" class="level_2" style="width:120px;"></select>
												<select name="area[id][3]" id="dataMemberfieldAreaId3" class="level_3" style="width:120px;"></select>
											</div>
											</td>
							      </tr>
							      
							      <tr>
								<th><?php echo $this->_tpl_vars['_address']; ?>
</th>
								<td><input placeholder="Số đường Tên đường, Phường/Xã" name="memberfield[address]" type="text" id="memberaddress" value="<?php echo $this->_tpl_vars['item']['address_s']; ?>
" class=""></td>
							      </tr>
							      
						</table>
						</div>
				</td>
			</tr>
		</table>
		
		
		
		
		
		
		
		
		<?php if ($this->_tpl_vars['membertype_id'] == 6): ?>
		
				<br style="clear: both" />		
				<h3>Thông tin học tập</h3>
				<span class="top-table">.</span>
				<table class="offer_info_content">
			      
				        <tr>
						<th>Trường<font color="#FF6600">*</font></th>
						<td>
							<input type="checkbox" name="other_school" /> Không có trong danh sách
							<br />
							<span class="school_name">
								<span class="select_box">
									<select name="memberfield[school_id]" id="school_select">
										<?php $_from = $this->_tpl_vars['Schools']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_0'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_0']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key0'] => $this->_tpl_vars['item0']):
        $this->_foreach['level_0']['iteration']++;
?>
											<option value="<?php echo $this->_tpl_vars['item0']['id']; ?>
" <?php if ($this->_tpl_vars['item']['school_id'] == $this->_tpl_vars['item0']['id']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['item0']['name']; ?>
</option>
										<?php endforeach; endif; unset($_from); ?>
									</select>
								</span>
								<input placeholder="Nhập tên trường" type="text" size="30" name="other_school_name" />
							</span>
							
						</td>
					</tr>
					<tr>
						<th>Khoa</th>
						<td>
							<input size="30" name="memberfield[department]" type="text" id="memberskype" value="<?php echo $this->_tpl_vars['item']['skype']; ?>
">
						</td>
					</tr>
					<tr>
						<th>Lớp</th>
						<td>
							<input size="30" name="memberfield[class]" type="text" id="memberskype" value="<?php echo $this->_tpl_vars['item']['skype']; ?>
">
						</td>
					</tr>
					<tr>
						<th>Mã số sinh viên</th>
						<td>
							<input size="30" name="memberfield[mssv]" type="text" id="memberskype" value="<?php echo $this->_tpl_vars['item']['skype']; ?>
">
						</td>
					</tr>
					<tr>
						<th>Liên kết học tập</th>
						<td>
							<span class="subject_name">
								<span class="select_box">
									<select name="subjects_id[]" id="subject_select" multiple>
										<?php $_from = $this->_tpl_vars['Subjects']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_0'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_0']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key0'] => $this->_tpl_vars['item0']):
        $this->_foreach['level_0']['iteration']++;
?>
											<option value="<?php echo $this->_tpl_vars['item0']['id']; ?>
" <?php if ($this->_tpl_vars['item0']['selected']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['item0']['name']; ?>
</option>
										<?php endforeach; endif; unset($_from); ?>
									</select>
								</span>								
							</span>
							<div class="other_subjects">
								<input type="checkbox" name="other_subject" /> Thêm môn học (nếu không có trong danh sách trên)
								<br /><input placeholder="Nhập tên môn học khác, cách nhau bằng dấy phẩy (,)" type="text" size="50" name="other_subject_name" />
							</div>
						</td>
					</tr>
								      
				    
				</table>
						<span class="top-table">.</span>
			
		<?php endif; ?>
		
		
		
		
		
		
		
		
		<br />		
		<h3><?php echo $this->_tpl_vars['_addition_info_person']; ?>
 (nếu có)</h3>
		<span class="top-table">.</span>
		<table class="offer_info_content">
              
		    <tr style="display: none">
							<th><?php echo $this->_tpl_vars['_postcode']; ?>
</th>
							<td><input size="30" name="memberfield[zipcode]" type="text" id="memberzipcode" value="<?php echo $this->_tpl_vars['item']['zipcode']; ?>
"></td>
						      </tr>
						      
						      <!--<tr>
							<th>ICQ<?php echo $this->_tpl_vars['_number_n']; ?>
</th>
							<td><input name="memberfield[icq]" type="text" id="membericq" value="<?php echo $this->_tpl_vars['item']['icq']; ?>
"></td>
						      </tr>-->
						      <tr>
							<th>Skype<?php echo $this->_tpl_vars['_colon']; ?>
</th>
							<td><input size="30" name="memberfield[skype]" type="text" id="memberskype" value="<?php echo $this->_tpl_vars['item']['skype']; ?>
"></td>
						      </tr>
						      <!--<tr>
							<th>Trang Facebook</th>
							<td><input size="30" placeholder="Đường dẫn đến trang facebook" name="memberfield[facebook]" type="text" id="memberskype" value="<?php echo $this->_tpl_vars['item']['facebook']; ?>
"></td>
						      </tr>-->
						      <tr style="display: none">
							<th>Msn Messenger<?php echo $this->_tpl_vars['_colon']; ?>
</th>
							<td><input size="30" name="memberfield[msn]" type="text" id="membermsn" value="<?php echo $this->_tpl_vars['item']['msn']; ?>
"></td>
						      </tr>
						      <tr>
							<th>Yahoo Messenger<?php echo $this->_tpl_vars['_colon']; ?>
</th>
							<td><input size="30" name="memberfield[yahoo]" type="text" id="memberyahoo" value="<?php echo $this->_tpl_vars['item']['yahoo']; ?>
"></td>
						      </tr>
						      
						      
						      <tr style="display: none">
							<th>CMND <?php echo $this->_tpl_vars['_number_n']; ?>
</th>
							<td><input size="30" name="memberfield[qq]" type="text" id="memberqq" value="<?php echo $this->_tpl_vars['item']['qq']; ?>
" class=""></td>
						      </tr>
						     
						      <tr style="display: none">
							<th><?php echo $this->_tpl_vars['_fax_number']; ?>
</th>
							<td></td>
						      </tr>
						      
						      
						      
						      <tr style="display: none">
							<th><?php echo $this->_tpl_vars['_job_status']; ?>
</th>
							<td><input size="40" type="radio" name="personal[resume_status]" value="1" <?php if ($this->_tpl_vars['resume_status'] == 1): ?>checked="checked"<?php endif; ?>> <?php echo $this->_tpl_vars['_like_job']; ?>
 <input type="radio" name="personal[resume_status]" value="0" <?php if ($this->_tpl_vars['resume_status'] == 0): ?>checked="checked"<?php endif; ?>> <?php echo $this->_tpl_vars['_not_like_job']; ?>
 </td>
						      </tr>
						      <tr style="display: none">
							<th><?php echo $this->_tpl_vars['_highest_education']; ?>
</th>
							<td>
										<select name="personal[max_education]" id="MaxEducation">
										<?php $_from = $this->_tpl_vars['Educations']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['Educations'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['Educations']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key1'] => $this->_tpl_vars['item1']):
        $this->_foreach['Educations']['iteration']++;
?>
										<option value="<?php echo $this->_tpl_vars['key1']; ?>
" <?php if ($this->_tpl_vars['max_education'] == $this->_tpl_vars['key1']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['item1']; ?>
</option>
										<?php endforeach; endif; unset($_from); ?>
										</select>
										</td>
						      </tr>
						      <tr>
							<th><?php echo $this->_tpl_vars['_personal_homepage']; ?>
</th>
							<td><input name="memberfield[site_url]" type="text" id="site_url" value="<?php echo $this->_tpl_vars['item']['site_url']; ?>
"></td>
						      </tr>
						       <tr style="display: none">
							<th><?php echo $this->_tpl_vars['_login_jump']; ?>
</th>
							<td><select name="member[office_redirect]" id="MemberOfficeRedirect">
											<?php $_from = $this->_tpl_vars['OfficeRedirects']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['office_redirect'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['office_redirect']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key1'] => $this->_tpl_vars['item1']):
        $this->_foreach['office_redirect']['iteration']++;
?>
											<option value="<?php echo $this->_tpl_vars['key1']; ?>
" <?php if ($this->_tpl_vars['key1'] == $this->_tpl_vars['item']['office_redirect']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['item1']; ?>
</option>
											<?php endforeach; endif; unset($_from); ?>
							</select></td>
						      </tr>
		    
		</table>
				<span class="top-table">.</span>
		</div>
		
		
		<input name="save" type="submit" id="save" value="<?php echo $this->_tpl_vars['_save']; ?>
" />
	    </form>
  </div>
 </div>
<script language="javascript">
var enter_name = "<?php echo $this->_tpl_vars['_enter_name']; ?>
";
var enter_website_error = "<?php echo $this->_tpl_vars['_enter_website_error']; ?>
";
var cache_path = "../";
var app_language = '<?php echo $this->_tpl_vars['AppLanguage']; ?>
';
var area_id1 = <?php echo ((is_array($_tmp=@$this->_tpl_vars['item']['area_id1'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
 ;
var area_id2 = <?php echo ((is_array($_tmp=@$this->_tpl_vars['item']['area_id2'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
 ;
var area_id3 = <?php echo ((is_array($_tmp=@$this->_tpl_vars['item']['area_id3'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
 ;
</script>
<?php echo '
<script>
jQuery(document).ready(function($) {
	$("#Frm1").validate({
	submitHandler: function(form) {
		$(form).find(":submit").attr("disabled", true).attr("value",pb_lang.DO_PROCESSING);
		form.submit();
	}
	});
})
</script>
'; ?>

<script src="../scripts/multi_select.js" charset="<?php echo $this->_tpl_vars['charset']; ?>
"></script>
<script src="../scripts/script_area.js"></script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>