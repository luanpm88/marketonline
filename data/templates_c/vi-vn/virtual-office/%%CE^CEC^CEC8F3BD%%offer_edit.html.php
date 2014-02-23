<?php /* Smarty version 2.6.27, created on 2014-02-12 15:07:23
         compiled from offer_edit.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'editor', 'offer_edit.html', 12, false),array('function', 'formhash', 'offer_edit.html', 257, false),array('function', 'pl', 'offer_edit.html', 289, false),array('function', 'html_radios', 'offer_edit.html', 485, false),array('function', 'html_options', 'offer_edit.html', 514, false),array('function', 'the_url', 'offer_edit.html', 614, false),array('modifier', 'pl', 'offer_edit.html', 295, false),array('modifier', 'default', 'offer_edit.html', 485, false),)), $this); ?>
<?php $this->assign('page_title', ($this->_tpl_vars['_business_information'])); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script src="<?php echo $this->_tpl_vars['SiteUrl']; ?>
scripts/jquery/jquery.colorbox.js" type="text/javascript"></script>
<link href="<?php echo $this->_tpl_vars['SiteUrl']; ?>
scripts/jquery/colorbox/colorbox.css" media="screen" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['SiteUrl']; ?>
scripts/jquery/jquery-ui.css" />
<script src="<?php echo $this->_tpl_vars['SiteUrl']; ?>
scripts/jquery/jquery-ui.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['SiteUrl']; ?>
css/reset.css" />
<script>
var SiteUrl = "<?php echo $this->_tpl_vars['SiteUrl']; ?>
";
var enter_title = "<?php echo $this->_tpl_vars['_enter_title']; ?>
";
</script>
<?php echo smarty_function_editor(array('type' => 'tiny_mce'), $this);?>



<?php echo '
<script>
	jQuery(document).ready(function($) {
		$(\'.MenuItem1\').addClass(\'mActive\');
	});
</script>
'; ?>



<?php echo '
<script>
	
	
	function checkHasImage() {
		if ($(\'#uploadfile0\').val() || $(\'#uploadlinkfile\').val() ||
			$(\'#uploadfile1\').val() || $(\'#uploadlinkfile1\').val() ||
			$(\'#uploadfile2\').val() || $(\'#uploadlinkfile2\').val() ||
			$(\'#uploadfile3\').val() || $(\'#uploadlinkfile3\').val() ||
			$(\'#uploadfile4\').val() || $(\'#uploadlinkfile4\').val() ||
			$(\'#p_image img\').length
		) {
			return true;
		}
		else
		{
			return false;
		}
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
	
	function deleteImage(id, pos) {
		//code
		if (parseInt($(\'.img_item input[type=radio]:checked\').val())+1 == pos) {
			//code
			//alert(parseInt($(\'.img_item input[type=radio]:checked\').val())-1);
			
			alert(\'Bạn không thể xóa hình chính. Vui lòng chọn hình khác làm hình chính trước khi xóa\');
			return;
		}
		
		$(\'#thumbs .tim_\'+pos).css(\'opacity\', \'0.2\');
		$.ajax({
			url: "../index.php?do=offer&action=ajaxDeleteImage&pid="+id+"&pos="+pos,
		}).done(function ( data ) {
			if( console && console.log ) {
				if(data == \'1\')
				{
					$(\'#thumbs .tim_\'+pos).fadeOut();
					$(\'.inputfile_\'+pos).fadeIn();
				}
			}
		});
	}
	
	function changeDefaultImage(id, pos) {
		//code
		$(\'#thumbs .tim_\'+pos).css(\'opacity\', \'0.2\');
		$.ajax({
			url: "../index.php?do=offer&action=changeDefaultImage&pid="+id+"&pos="+pos,
		}).done(function ( data ) {
			if( console && console.log ) {
				//alert(data)
				
				$(\'#p_image img\').attr(\'src\', ($(\'#thumbs .tim_\'+pos+\' img\').attr("src")));
				$(\'#thumbs .tim_\'+pos).css(\'opacity\', \'1\');
			}
		});
	}
	
	
	
	
	
	
	
	
	
jQuery(document).ready(function($) {
	$( "#multi_lang_tabs" ).tabs();
	$( "#tabs-ta" ).tabs();
	$(\'a[rel*=lightbox]\').colorbox({maxWidth:600,opacity:0.1});
	$(\'#CountryId\').change(function(){
        $("#CountryImage").attr("src",$("#CountryId").find(\'option:selected\').attr("title"));
    });
	
	
	
	$("#Frm1").validate({
	submitHandler: function(form) {
		var okk = true;
		if ($(\'#dataProductIndustryId1\').val() == 0) {
			okk = false;
		}
		
		if ($(\'#DataTradeTypeId\').val() == 0) {
			okk = false;
		}
		
		if(tinyMCE.activeEditor.getContent() == "")
		{			
			okk = false;
		}
		
		if(!checkHasImage() && ($(\'#DataTradeTypeId\').val() == 9 || $(\'#DataTradeTypeId\').val() == 10))
		{
			okk = false;
		}
		else
		{
			okk = true;
		}
		
		if ($(\'#DataTradePrice\').val().length < 5 && $(\'#DataTradePrice\').val() != "") {
			okk = false;
		}
		
		//alert(okk);
		if (okk) {
			$(form).find(":submit").attr("disabled", true).attr("value",pb_lang.DO_PROCESSING);
			document.GetDocumentByID(\'#save\').click();
		}
	}
	});
	
	$(\'#save\').click(function (){
		if ($(\'#dataProductIndustryId1\').val() == 0)
		{
			setTimeout(\'$("html, body").animate({ scrollTop: $("#dataIndustry").offset().top - 100 }, 100)\', 100);
			setTimeout(function(){
				$(\'#dataIndustry select\').removeClass(\'error\');
				$(\'#dataProductIndustryId1\').addClass(\'error\');			
				$(\'#dataIndustry\').append(\'<label for="dataIndustryName" generated="true" class="error">Chọn chuyên mục</label>\');
			}, 200);			
		}
		
		if ($(\'#DataTradeTypeId\').val() == 0) {
			$(\'p.kktype\').remove();
			$(\'#DataTradeTypeId\').after(\'<p for="" generated="true" class="error kktype">Chọn vị trí đăng</p>\');
			setTimeout(\'$("html, body").animate({ scrollTop: $("#dataIndustry").offset().top - 100 }, 100)\',100);
		}
		else
		{
			$(\'#DataTradeTypeId\').parent().find(\'.kktype\').remove();
		}
		
		if ($(\'#DataTradePrice\').val().length < 5 && $(\'#DataTradePrice\').val() != "") {
			if(!$(\'#DataTradePrice\').parent().find(\'label.err\').length) $(\'#DataTradePrice\').parent().append(\'<label for="" generated="true" class="err">Giá phải trên 1.000 VNĐ</label>\');
			$("html, body").animate({ scrollTop: $(\'#dataIndustry\').offset().top + 600 }, 100);
		}
		else
		{
			$(\'#DataTradePrice\').parent().find(\'label.err\').remove();
		}
		
		if(!checkHasImage() && !($(\'#DataTradeTypeId\').val() != 9 && $(\'#DataTradeTypeId\').val() != 10))
		{
			setTimeout(\'$("html, body").animate({ scrollTop: $("#dataIndustry").offset().top - 100 }, 100)\', 100);
				setTimeout(function(){					
					$(\'#p_image\').addClass(\'error\');			
					$(\'#p_image\').append(\'<label for="dataPicture" generated="true" class="error">'; ?>
Chưa thêm hình ảnh sản phẩm<?php echo '</label>\');
				}, 200);
		}
		else
		{
			$(\'#p_image\').removeClass(\'error\');
			$(\'#p_image\').find(\'label\').remove();
		}
		
		var areaerror = false;
		if(tinyMCE.activeEditor.getContent() == "")
		{
			$(\'#dataMultiTAvi-vn\').parent().find(\'label\').remove();
			$(\'#dataMultiTAvi-vn\').before(\'<label for="" class="errorz">Nội dung yêu cầu nhập</label>\');
			areaerror = true;
			$("html, body").animate({ scrollTop: $(\'#dataIndustry\').offset().top + 600 }, 100);
		}
		else
		{
			$(\'#dataMultiTAvi-vn\').parent().find(\'label\').remove();
		}
	});
	
	$(\'.img_item input[type=radio]\').change(function() {
		changeDefaultImage(\''; ?>
<?php echo $this->_tpl_vars['item']['id']; ?>
<?php echo '\', parseInt($(this).val())+1);
	});
	
	//main image
	var cur_id = parseInt($(\'.img_item input[type=radio]:checked\').val())+1;
	$(\'#p_image img\').attr(\'src\', $(\'#thumbs .tim_\'+cur_id+\' img\').attr("src"));
	
	if (!$(\'#thumbs\').children().length) {
		$(\'#image_size_note\').addClass(\'noImage\');
	}
	
	$(\'#dataMultivi-vn\').attr(\'class\', \'required\');
	$(\'#tabs-vi-vn br\').remove();
	
	$(\'#dataMultivi-vn\').attr(\'placeholder\',\''; ?>
<?php echo $this->_tpl_vars['_words_length']; ?>
<?php echo '\');
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
     <div class="offer_info_title"><h2><?php echo $this->_tpl_vars['_business_information']; ?>
 (<?php echo $this->_tpl_vars['_raovat']; ?>
)</h2></div>
		<form name="TradeFrm" id="Frm1" enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
">
		<?php echo smarty_function_formhash(array(), $this);?>

		<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['item']['id']; ?>
">
		<input type="hidden" name="do" value="save" />
        <div class="hint"><?php echo $this->_tpl_vars['_must_input_with_star']; ?>
</div>
	
	
	
	<div id="product_edit_box">
	
	
	
	<table id="product_formz" width="100%" cellpadding="10">
		<tr>
			<td colspan="2">
				<label><?php echo $this->_tpl_vars['_industry_product']; ?>
:<font class="red">*</font></label>
				<div id="dataIndustry">
								<select name="industry[id][1]" id="dataProductIndustryId1" class="level_1 required" ></select>
								<select name="industry[id][2]" id="dataProductIndustryId2" class="level_2"></select>
								<select name="industry[id][3]" id="dataProductIndustryId3" class="level_3" ></select>
								<select name="industry[id][4]" id="dataProductIndustryId4" class="level_4" ></select>
				</div>
				
			</td>
		</tr>
		<?php if (! $this->_tpl_vars['item']['id']): ?>
			<tr>
				<th style="padding-right: 15px;
    text-align: right; font-size: 14px;
    vertical-align: middle;
    width: 125px;" valign="middle"><?php echo $this->_tpl_vars['_theme_n']; ?>
<font class="red">*</font></th>
				<td>
							<div id="multi_lang_tabs">
							<?php echo smarty_function_pl(array('frm' => 'input','values' => $this->_tpl_vars['item']['title']), $this);?>

							
				</td>
			</tr>
		<?php else: ?>
			<tr>
				<td><label><?php echo $this->_tpl_vars['_theme_n']; ?>
<font class="red">*</font></label><strong><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('pl', true, $_tmp) : smarty_modifier_pl($_tmp)); ?>
</strong></td>
			</tr>
		<?php endif; ?>
	</table>
	
	
	
	<div style="padding: 0 5px;">
	
		<div id="product_formz" style="width: 300px;display: block;float:left; margin-top: 6px" valign="top">
				<div id="p_image">
				<?php if ($this->_tpl_vars['item']['image1']): ?><img id="uploadpic" src="" alt="<?php echo $this->_tpl_vars['item']['name']; ?>
" width="200" /><?php endif; ?>
			</div>
			<div id="thumbs">
				<?php if ($this->_tpl_vars['item']['image1'] != '../images/nopicture_small.gif' && $this->_tpl_vars['item']['image1']): ?>
				<div class="img_item tim_1">
					<img id="uploadpic" src="<?php echo $this->_tpl_vars['item']['image1']; ?>
" alt="<?php echo $this->_tpl_vars['item']['name1']; ?>
" />					
					<input title="Chọn làm hình chính" type="radio" name="data[product][default_pic]" value="0" <?php if ($this->_tpl_vars['item']['default_pic'] == 0): ?>checked="checked"<?php endif; ?> />
					<a href="#deleteImage" onclick="deleteImage('<?php echo $this->_tpl_vars['item']['id']; ?>
', '1');" ><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/delete-icon.png" /></a>
				</div><?php endif; ?>
				<?php if ($this->_tpl_vars['item']['image2'] != '../images/nopicture_small.gif' && $this->_tpl_vars['item']['image2']): ?>
				<div class="img_item tim_2">
					<img id="uploadpic" src="<?php echo $this->_tpl_vars['item']['image2']; ?>
" alt="<?php echo $this->_tpl_vars['item']['name2']; ?>
" />					
					<input title="Chọn làm hình chính" type="radio" name="data[product][default_pic]" value="1" <?php if ($this->_tpl_vars['item']['default_pic'] == 1): ?>checked="checked"<?php endif; ?> />
					<a href="#deleteImage" onclick="deleteImage('<?php echo $this->_tpl_vars['item']['id']; ?>
', '2');"><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/delete-icon.png" /></a>
				</div><?php endif; ?>
				<?php if ($this->_tpl_vars['item']['image3'] != '../images/nopicture_small.gif' && $this->_tpl_vars['item']['image3']): ?>
				<div class="img_item tim_3">
					<img id="uploadpic" src="<?php echo $this->_tpl_vars['item']['image3']; ?>
" alt="<?php echo $this->_tpl_vars['item']['name3']; ?>
" />					
					<input title="Chọn làm hình chính" type="radio" name="data[product][default_pic]" value="2" <?php if ($this->_tpl_vars['item']['default_pic'] == 2): ?>checked="checked"<?php endif; ?> />
					<a href="#deleteImage" onclick="deleteImage('<?php echo $this->_tpl_vars['item']['id']; ?>
', '3');"><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/delete-icon.png" /></a>
				</div><?php endif; ?>
				<?php if ($this->_tpl_vars['item']['image4'] != '../images/nopicture_small.gif' && $this->_tpl_vars['item']['image4']): ?>
				<div class="img_item tim_4">
					<img id="uploadpic" src="<?php echo $this->_tpl_vars['item']['image4']; ?>
" alt="<?php echo $this->_tpl_vars['item']['name4']; ?>
" />					
					<input title="Chọn làm hình chính" type="radio" name="data[product][default_pic]" value="3" <?php if ($this->_tpl_vars['item']['default_pic'] == 3): ?>checked="checked"<?php endif; ?> />
					<a href="#deleteImage" onclick="deleteImage('<?php echo $this->_tpl_vars['item']['id']; ?>
', '4');"><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/delete-icon.png" /></a>
				</div><?php endif; ?>
				<?php if ($this->_tpl_vars['item']['image5'] != '../images/nopicture_small.gif' && $this->_tpl_vars['item']['image5']): ?>
				<div class="img_item tim_5">
					<img id="uploadpic" src="<?php echo $this->_tpl_vars['item']['image5']; ?>
" alt="<?php echo $this->_tpl_vars['item']['name5']; ?>
" />					
					<input title="Chọn làm hình chính" type="radio" name="data[product][default_pic]" value="4" <?php if ($this->_tpl_vars['item']['default_pic'] == 4): ?>checked="checked"<?php endif; ?> />
					<a href="#deleteImage" onclick="deleteImage('<?php echo $this->_tpl_vars['item']['id']; ?>
', '5');"><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/delete-icon.png" /></a>
				</div><?php endif; ?>
			</div>
			<table id="table_images">
				<tr>
				  <td colspan=2 style="padding-bottom: 10px"><span id="image_size_note"><strong><?php echo $this->_tpl_vars['_upload_image']; ?>
</strong> <?php echo $this->_tpl_vars['_image_size_format_provision']; ?>
</span></td>
				</tr>
								
				<tr class="inputfile_1" <?php if ($this->_tpl_vars['item']['image1'] != '../images/nopicture_small.gif' && $this->_tpl_vars['item']['image1']): ?>style="display: none"<?php endif; ?>>
				<td class="pic_title">H1</td>
				<td>
				    <a href="#loadpic" onclick="$('#uploadfile0').trigger('click')"><?php echo $this->_tpl_vars['_upload_picture']; ?>
: <span class="picload0" style="color: #3B984C">......</span></a>
				    <input onchange="$('.picload0').html($(this).val());" style="display: none" name="pic" type="file" id="uploadfile0" onchange="preview()" />
				    <br><input title="<?php echo $this->_tpl_vars['_pic_note']; ?>
" name="linkpic" placeholder="<?php echo $this->_tpl_vars['_link_picture']; ?>
" class="linkpic" type="text" id="uploadlinkfile" />
				</td>

			      </tr>
				
				
				
				
			      <tr class="inputfile_2" <?php if ($this->_tpl_vars['item']['image2'] != '../images/nopicture_small.gif' && $this->_tpl_vars['item']['image2']): ?>style="display: none"<?php endif; ?>>
				<td class="pic_title">H2</td>
				<td>
				    <a href="#loadpic" onclick="$('#uploadfile1').trigger('click')"><?php echo $this->_tpl_vars['_upload_picture']; ?>
: <span class="picload1" style="color: #3B984C">......</span></a>
				    <input onchange="$('.picload1').html($(this).val())" style="display: none" name="pic1" type="file" id="uploadfile1" onchange="preview()" />
				    <br><input title="<?php echo $this->_tpl_vars['_pic_note']; ?>
" name="linkpic1" placeholder="<?php echo $this->_tpl_vars['_link_picture']; ?>
" class="linkpic" type="text" id="uploadlinkfile1" />
				</td>

			      </tr>

			      
			      
			      
			      <tr class="inputfile_3" <?php if ($this->_tpl_vars['item']['image3'] != '../images/nopicture_small.gif' && $this->_tpl_vars['item']['image3']): ?>style="display: none"<?php endif; ?>>
				<td class="pic_title">H3</td>
				<td>
				    <a href="#loadpic" onclick="$('#uploadfile2').trigger('click')"><?php echo $this->_tpl_vars['_upload_picture']; ?>
: <span class="picload2" style="color: #3B984C">......</span></a>
				    <input onchange="$('.picload2').html($(this).val())" style="display: none" name="pic2" type="file" id="uploadfile2" onchange="preview()" />
				    <br><input title="<?php echo $this->_tpl_vars['_pic_note']; ?>
" name="linkpic2" placeholder="<?php echo $this->_tpl_vars['_link_picture']; ?>
" class="linkpic" type="text" id="uploadlinkfile2" />
				     
				    </td>

			      </tr>
			      
			      
			      
			      <tr class="inputfile_4" <?php if ($this->_tpl_vars['item']['image4'] != '../images/nopicture_small.gif' && $this->_tpl_vars['item']['image4']): ?>style="display: none"<?php endif; ?>>
				<td class="pic_title">H4</td>
				<td>
				    <a href="#loadpic" onclick="$('#uploadfile3').trigger('click')"><?php echo $this->_tpl_vars['_upload_picture']; ?>
: <span class="picload3" style="color: #3B984C">......</span></a>
				    <input onchange="$('.picload3').html($(this).val())" style="display: none" name="pic3" type="file" id="uploadfile3" onchange="preview()" />
				    <br><input title="<?php echo $this->_tpl_vars['_pic_note']; ?>
" placeholder="<?php echo $this->_tpl_vars['_link_picture']; ?>
" name="linkpic3" class="linkpic" type="text" id="uploadlinkfile3" />
				     
				    </td>

			      </tr>
			      
			      
			      
			      <tr class="inputfile_5" <?php if ($this->_tpl_vars['item']['image5'] != '../images/nopicture_small.gif' && $this->_tpl_vars['item']['image5']): ?>style="display: none"<?php endif; ?> >
				<td class="pic_title">H5</td>
				<td>
				    <a href="#loadpic" onclick="$('#uploadfile4').trigger('click')"><?php echo $this->_tpl_vars['_upload_picture']; ?>
: <span class="picload4" style="color: #3B984C">......</span></a>
				    <input onchange="$('.picload4').html($(this).val())" style="display: none" name="pic4" type="file" id="uploadfile4" onchange="preview()" />
				    <br><input title="<?php echo $this->_tpl_vars['_pic_note']; ?>
" placeholder="<?php echo $this->_tpl_vars['_link_picture']; ?>
" name="linkpic4" class="linkpic" type="text" id="uploadlinkfile4" />
				     
				    </td>

			      </tr>
			      
			      
			</table>
		</div>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		<table class="offer_info_content offer_leftbox" style="margin-top: 5px;">
			
			
					  <?php if ($this->_tpl_vars['item']['id']): ?>
			      <tr>
				<th class="circle_left"><?php echo $this->_tpl_vars['_direction']; ?>
</th>
				<td class="circle_right"><?php if ($this->_tpl_vars['item']['if_urgent'] == '1'): ?><?php echo $this->_tpl_vars['_urgent']; ?>
<?php endif; ?><?php echo $this->_tpl_vars['TradeTypes'][$this->_tpl_vars['item']['type_id']]; ?>
</td>
			      </tr>
			      
			      <tr>
				<th><?php echo $this->_tpl_vars['_adwords']; ?>
</th>
				<td><?php if ($this->_tpl_vars['item']['adwords']): ?><?php echo $this->_tpl_vars['item']['adwords']; ?>
<?php else: ?><input name="data[trade][adwords]" id="trade_adwords" type="text" value="<?php echo $this->_tpl_vars['item']['adwords']; ?>
"/><?php endif; ?></td>
			      </tr>
			      <tr>
				<th><?php echo $this->_tpl_vars['_duration']; ?>
</th>
				<td><?php echo $this->_tpl_vars['item']['expire_date']; ?>
</td>
			      </tr>
					<?php else: ?>
					
					
					
				
					
					
			      <tr>
				<th class="circle_left"><?php echo $this->_tpl_vars['_release']; ?>
<font class="red">*</font></th>
				<td class="circle_right">
							<select name="data[trade][type_id]" id="DataTradeTypeId" class="required">
								<option value="0"><?php echo $this->_tpl_vars['_select']; ?>
</option>
								<?php $_from = $this->_tpl_vars['select_tradetypes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['f1'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['f1']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['f1']):
        $this->_foreach['f1']['iteration']++;
?>
								<?php if ($this->_tpl_vars['f1']['child']): ?>
								<optgroup label="<?php echo $this->_tpl_vars['f1']['name']; ?>
">
								<?php $_from = $this->_tpl_vars['f1']['child']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['f2'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['f2']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['f2']):
        $this->_foreach['f2']['iteration']++;
?>
									<option value="<?php echo $this->_tpl_vars['f2']['id']; ?>
"><?php echo $this->_tpl_vars['f2']['name']; ?>
</option>
								<?php endforeach; endif; unset($_from); ?>
								</optgroup>
								<?php else: ?>
								<option value="<?php echo $this->_tpl_vars['f1']['id']; ?>
"><?php echo $this->_tpl_vars['f1']['name']; ?>
</option>
								<?php endif; ?>
								<?php endforeach; endif; unset($_from); ?>
							</select>
				
				
				</td>
			      </tr>
			      
			      
			      
			      
			      
			      
			      
			      
			      <!--<tr>
				<th><?php echo $this->_tpl_vars['_adwords']; ?>
</th>
				<td><input name="data[trade][adwords]" id="trade_adwords" type="text" value="<?php echo $this->_tpl_vars['item']['adwords']; ?>
"/></td>
			      </tr>-->
			      <tr>
				<th><?php echo $this->_tpl_vars['_duration']; ?>
</th>
				<td><?php echo smarty_function_html_radios(array('name' => 'expire_days','options' => $this->_tpl_vars['OfferExpires'],'checked' => ((is_array($_tmp=@$this->_tpl_vars['item']['expire_days'])) ? $this->_run_mod_handler('default', true, $_tmp, 10) : smarty_modifier_default($_tmp, 10)),'separator' => ' '), $this);?>
</td>
			      </tr>
					<?php endif; ?>
					
					
				<tr>
					   <th><?php echo $this->_tpl_vars['_market']; ?>
</th>
					   <td class="tdright"><font color="#666666">
						<input placeholder="<?php echo $this->_tpl_vars['_market_note']; ?>
" name="data[trade][market]" type="text" id="dataProductMarket" value="<?php echo $this->_tpl_vars['item']['market']; ?>
"></font>					   
					   </td>
				</tr>
				
				<tr style="display: none">
					<th><?php echo $this->_tpl_vars['_area_tt']; ?>
<?php echo $this->_tpl_vars['_colon']; ?>
</th>
					<td>
								<div id="dataArea">
									<select name="area[id][1]" id="dataTradeAreaId1" class="level_1" ></select>
									<select name="area[id][2]" id="dataTradeAreaId2" class="level_2" ></select>
									<select name="area[id][3]" id="dataTradeAreaId3" class="level_3" ></select>
								</div>
		
								</td>
				</tr>
					
				<tr>
					  <th><?php echo $this->_tpl_vars['_product_brand']; ?>
</th>
					  <td class="tdright">
						<select name="data[trade][brand_id]" id="brand_id_select">
					      <option value="0"><?php echo $this->_tpl_vars['_select']; ?>
</option>
					      <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['UserBrands'],'selected' => $this->_tpl_vars['item']['brand_id']), $this);?>

					    </select> 
						<a href="#new_brand_box" onclick="$('#new_brand_box').css('display', 'block')" id="add_new_brand_but"><?php echo $this->_tpl_vars['_add_brand']; ?>
</a>
					  </td>
					</tr>
					
			      
			      
						  <?php $_from = $this->_tpl_vars['Forms']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['form'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['form']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key1'] => $this->_tpl_vars['item1']):
        $this->_foreach['form']['iteration']++;
?>
			      <tr>
				<th> <?php echo $this->_tpl_vars['item1']['label']; ?>
<?php echo $this->_tpl_vars['_colon']; ?>
</th>
				<td><font color="#666666">
				  <input name="data[formitem][<?php echo $this->_tpl_vars['key1']; ?>
]" type="text" id="<?php echo $this->_tpl_vars['item1']['id']; ?>
" value="<?php echo $this->_tpl_vars['item1']['value']; ?>
"></font></td>
			      </tr>
						  <?php endforeach; endif; unset($_from); ?>
			      <tr style="display: none">
				<th><?php echo $this->_tpl_vars['_country']; ?>
:</th>
				<td><select name="data[trade][country_id]" id="CountryId">
								<option><?php echo $this->_tpl_vars['_please_select']; ?>
</option>
							<?php $_from = $this->_tpl_vars['Countries']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['Countries'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['Countries']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['country']):
        $this->_foreach['Countries']['iteration']++;
?>
								<option value="<?php echo $this->_tpl_vars['country']['id']; ?>
" title="../images/country/<?php echo $this->_tpl_vars['country']['picture']; ?>
" <?php if ($this->_tpl_vars['country']['id'] == $this->_tpl_vars['item']['country_id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['country']['name']; ?>
</option>
							<?php endforeach; endif; unset($_from); ?>
				</select>&nbsp;&nbsp;<img src="../images/country/<?php echo $this->_tpl_vars['item']['country']; ?>
" id="CountryImage"></td>
			      </tr>
			      
			      
			      <tr>
				<th><?php echo $this->_tpl_vars['_the_price_n']; ?>
</th>
				<td><input name="data[trade][price]" type="text" id="DataTradePrice" value="<?php echo $this->_tpl_vars['item']['price']; ?>
"/><strong> VNĐ / </strong><input placeholder="Đơn vị sản phẩm (Ví dụ: cái, m2,...)" name="data[trade][price_unit]" type="text" id="dataTradePriceUnit" value="<?php echo $this->_tpl_vars['item']['price_unit']; ?>
"></td>
			      </tr>
			      
			      <tr>
				<th><?php echo $this->_tpl_vars['_tags_n']; ?>
</th>
				<td><input name="data[tag]" type="text" id="tag" value="<?php echo $this->_tpl_vars['item']['tag']; ?>
" title="<?php echo $this->_tpl_vars['_space_separate']; ?>
" /><label class="field_notice"><?php echo $this->_tpl_vars['_space_separate']; ?>
</label></td>
			      </tr>
			      
			  <!--<tr>
			      
			       <td colspan="2" style="padding: 5px 15px;"><?php echo $this->_tpl_vars['_check_information']; ?>
.
				<?php echo $this->_tpl_vars['_need_click']; ?>
 <a target="_blank" href="company.php" target="_self" class="font14b_org"><strong><?php echo $this->_tpl_vars['_modify_information']; ?>
</strong></a></td>
			   </tr>
	
			   <tr>
				<th ><?php echo $this->_tpl_vars['_contact_people']; ?>
</td>
				<td><?php echo ((is_array($_tmp=@$this->_tpl_vars['COMPANYINFO']['link_man'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['MemberInfo']['last_name']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['MemberInfo']['last_name'])); ?>
<font color="#999999"> <?php echo $this->_tpl_vars['_full_name']; ?>
 </font> </td>
			    </tr>-->
						<?php if ($this->_tpl_vars['CompanyId'] != ""): ?>
			  <!--<tr>
			    <th><?php echo $this->_tpl_vars['_company_name_n']; ?>
</th>
			    <td><?php echo $this->_tpl_vars['COMPANYINFO']['name']; ?>
<font color="#999999"> <?php echo $this->_tpl_vars['_company_full_name']; ?>
</font></td>
			  </tr>-->
						<?php endif; ?>
			      <!--<tr>
				<th><?php echo $this->_tpl_vars['_phone']; ?>
</th>
				<td>
					<?php echo $this->_tpl_vars['COMPANYINFO']['contact_mobile']; ?>

				</td>
			      </tr>
			      <tr>
				<th><?php echo $this->_tpl_vars['_email']; ?>
</th>
				<td>
					<?php echo $this->_tpl_vars['COMPANYINFO']['contact_email']; ?>

				</td>
			      </tr>-->
			      
			      <!--<tr >
				<th><?php echo $this->_tpl_vars['_email_addr']; ?>
</th>
				<td><?php echo $this->_tpl_vars['MemberInfo']['email']; ?>
</td>
			      </tr>-->
			      <!--<tr>
			      <th class="circle_bottomleft"></th>
				<td class="circle_bottomright">
					<input type="hidden" name="edit_trade" id="EditTrade" value="y" />
				</td>
			      </tr>-->
		</table>
	</div>
			 
			 <br style="clear:both"><br />
		<table>
			<tr>
                        
                        <td class="">
				<h3 style="font-size: 16px;margin-bottom: 5px;"><?php echo $this->_tpl_vars['_details_n']; ?>
<font class="red">*</font></h3>
							<div id="tabs-ta">
							<?php echo smarty_function_pl(array('frm' => 'textarea','values' => $this->_tpl_vars['item']['content'],'style' => "width:926px;height:550px",'rows' => '8','wrap' => 'VIRTUAL','class' => 'required'), $this);?>

							</div>
						<!--<br /><font color="#FF3300"><?php echo $this->_tpl_vars['_attention_explain']; ?>
<br>-->
                        </font></td>
                      </tr>
		</table>
			 
		</div>		 
			 
			 
			 
			 
	<br />
	<input type="submit" name="save" id="save" value="<?php echo $this->_tpl_vars['_finish_release']; ?>
">
						<?php if ($this->_tpl_vars['item']['id']): ?>
						&nbsp;<a style="float: right; margin-right: 20px;padding-top: 7px" href="../<?php echo smarty_function_the_url(array('module' => 'offer','id' => ($this->_tpl_vars['item']['id'])), $this);?>
" title="<?php echo $this->_tpl_vars['_preview']; ?>
<?php echo $this->_tpl_vars['item']['title']; ?>
" target="_blank" style="text-decoration:underline;color:blue;"><?php echo $this->_tpl_vars['_preview']; ?>
</a>
						<?php endif; ?>
			 
		</form>
		
		
		
		<div id="uploadImageVideo" style="margin-top:-553px;margin-left: 454px">
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
var type_id = <?php echo ((is_array($_tmp=@$this->_tpl_vars['type_id'])) ? $this->_run_mod_handler('default', true, $_tmp, 2) : smarty_modifier_default($_tmp, 2)); ?>
 ;
</script>
<?php echo '
<script>
$(function(){
  $(\'#DataTradeTypeId\').attr(\'value\', type_id);
});
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