<?php /* Smarty version 2.6.27, created on 2014-07-04 16:11:01
         compiled from product_edit.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'editor', 'product_edit.html', 13, false),array('function', 'formhash', 'product_edit.html', 337, false),array('function', 'html_options', 'product_edit.html', 551, false),array('function', 'html_radios', 'product_edit.html', 582, false),array('function', 'the_url', 'product_edit.html', 645, false),array('block', 'announce', 'product_edit.html', 322, false),array('modifier', 'default', 'product_edit.html', 582, false),)), $this); ?>
<?php if ($this->_tpl_vars['getvar']['type'] == 'service'): ?>
	<?php $this->assign('page_title', ($this->_tpl_vars['_add_service'])); ?>
<?php else: ?>
	<?php $this->assign('page_title', ($this->_tpl_vars['_product_management'])); ?>
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script src="<?php echo $this->_tpl_vars['SiteUrl']; ?>
scripts/jquery/jquery.colorbox.js" type="text/javascript"></script>
<link href="<?php echo $this->_tpl_vars['SiteUrl']; ?>
scripts/jquery/colorbox/colorbox.css" media="screen" rel="stylesheet" type="text/css"/>
<script>
var SiteUrl = "<?php echo $this->_tpl_vars['SiteUrl']; ?>
";
</script>
<?php echo smarty_function_editor(array('type' => 'tiny_mce'), $this);?>



<?php echo '
<script>
	jQuery(document).ready(function($) {
		$(\'.MenuItem'; ?>
<?php if ($this->_tpl_vars['getvar']['type'] == 'service'): ?>21<?php else: ?>4<?php endif; ?><?php echo '\').addClass(\'mActive\');
	});
</script>
'; ?>



<?php echo '
<style>
</style>
<script>
	
	function IsValidImageUrl(url) {
		$("<img>", {
		    src: url,
		    error: function() { alert(url + \': \' + false); },
		    load: function() { alert(url + \': \' + true); }
		});
	}
	
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
	
	function checkHasCustomIndustry() {
		for (var i=1; i<5; i++) {
			if(!$(\'#dataCustomProductIndustryId\'+i).attr("disabled") && ($(\'#dataCustomProductIndustryId\'+i).val() > 0 || ($(\'#dataCustomProductIndustryId\'+i).val() == 0 && $(\'.pos_\'+i+\' input\').val() != ""))){
				return true;
			}
		}
		return false;
	}
	
	function inserEditorFile(url, image) {
		$(\'#uploadIVbutton\').removeAttr(\'disabled\');
		$(\'#uploadIVbutton\').attr(\'value\',\'Tải Ảnh/Video\');
		if (image) {
			tinyMCE.activeEditor.execCommand(\'mceInsertContent\', false, \'<img src="../attachment/\'+url+\'" />\');
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
			url: "../index.php?do=product&action=ajaxDeleteImage&pid="+id+"&pos="+pos,
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
			url: "../index.php?do=product&action=changeDefaultImage&pid="+id+"&pos="+pos,
		}).done(function ( data ) {
			if( console && console.log ) {
				//alert(data)
				
				$(\'#p_image img\').attr(\'src\', ($(\'#thumbs .tim_\'+pos+\' img\').attr("src")));
				$(\'#thumbs .tim_\'+pos).css(\'opacity\', \'1\');
			}
		});
	}
	
jQuery(document).ready(function($) {	
	$(\'a[rel*=lightbox]\').colorbox({maxWidth:600,opacity:0.1});
	$(\'#CountryId\').change(function(){
        $("#CountryImage").attr("src",$("#CountryId").find(\'option:selected\').attr("title"));
	});
	$("#Frm1").validate({
	submitHandler: function(form) {
		var okie = false;
		
		

		if ($(\'#dataProductIndustryId1\').val() != 0) {
			if ($(\'#dataProductIndustryId2\').val() != 0 && !'; ?>
<?php echo $this->_tpl_vars['item']['service']; ?>
<?php echo ') {
				//if($(\'#dataProductIndustryId3\').val() != 0)
				//{			
					//if(($(\'#dataProductIndustryId4\').children().length > 1 && $(\'#dataProductIndustryId4\').val() != 0) || $(\'#dataProductIndustryId4\').children().length == 1)
					//{
						okie = true;
					//}					
				//}				
			}
			else if ('; ?>
<?php echo $this->_tpl_vars['item']['service']; ?>
<?php echo ') {
				okie = true;
			}				
		}
			
		if(checkHasCustomIndustry())
		{
			okie = true;
		}
		
		if(checkHasImage())
		{
			okie = true;
		}
		else
		{
			okie = false;
		}
	
	
	'; ?>
<?php if ($this->_tpl_vars['getvar']['type'] != 'service'): ?><?php echo '
	
		if ($(\'#dataProductPrice\').val().length < 5 || $(\'#dataProductPrice\').val() == "") {
			okie = false;
		}

	'; ?>
<?php endif; ?><?php echo '
	
		if(tinyMCE.activeEditor.getContent() == "")
		{			
			okie = false;
		}

		if (okie) {
			$(form).find(":submit").attr("disabled", true).attr("value",pb_lang.DO_PROCESSING);
			document.GetDocumentByID(\'#save\').click();
		}

	}
	});
	
	$(\'#save\').click(function () {
		//alert(checkHasCustomIndustry());
		if(!checkHasCustomIndustry())
		{		
			if ($(\'#dataProductIndustryId1\').val() != 0)
			{
				if ($(\'#dataProductIndustryId2\').val() != 0 && !'; ?>
<?php echo $this->_tpl_vars['item']['service']; ?>
<?php echo ')
				{
					//if($(\'#dataProductIndustryId3\').val() != 0)
					//{			
					//	if(($(\'#dataProductIndustryId4\').children().length > 1 && $(\'#dataProductIndustryId4\').val() != 0) || $(\'#dataProductIndustryId4\').children().length == 1)
					//	{							
					//	}
					//	else
					//	{
					//		$("html, body").animate({ scrollTop: $(\'#dataIndustry\').offset().top - 100 }, 100);
					//		setTimeout(function(){
					//			$(\'#dataIndustry select\').removeClass(\'error\');
					//			$(\'#dataProductIndustryId4\').addClass(\'error\');			
					//			$(\'#dataIndustry\').append(\'<label for="dataIndustryName" generated="true" class="error">'; ?>
<?php echo $this->_tpl_vars['_must_select_industry']; ?>
<?php echo '</label>\');
					//		}, 200);
					//	}
					//}
					//else
					//{
					//	$("html, body").animate({ scrollTop: $(\'#dataIndustry\').offset().top - 100 }, 100);
					//	setTimeout(function(){
					//		$(\'#dataIndustry select\').removeClass(\'error\');
					//		$(\'#dataProductIndustryId3\').addClass(\'error\');			
					//		$(\'#dataIndustry\').append(\'<label for="dataIndustryName" generated="true" class="error">'; ?>
<?php echo $this->_tpl_vars['_must_select_industry']; ?>
<?php echo '</label>\');
					//	}, 200);
					//}	
				}
				else if(!'; ?>
<?php echo $this->_tpl_vars['item']['service']; ?>
<?php echo ')
				{
					$("html, body").animate({ scrollTop: $(\'#dataIndustry\').offset().top - 100 }, 100);
					setTimeout(function(){
						$(\'#dataIndustry select\').removeClass(\'error\');
						$(\'#dataProductIndustryId2\').addClass(\'error\');			
						$(\'#dataIndustry\').append(\'<label for="dataIndustryName" generated="true" class="error">'; ?>
<?php echo $this->_tpl_vars['_must_select_industry']; ?>
<?php echo '</label>\');
					}, 200);
				}
			}
			else
			{
				$("html, body").animate({ scrollTop: $(\'#dataIndustry\').offset().top - 100 }, 100);
				setTimeout(function(){
					$(\'#dataIndustry select\').removeClass(\'error\');
					$(\'#dataProductIndustryId1\').addClass(\'error\');			
					$(\'#dataIndustry\').append(\'<label for="dataIndustryName" generated="true" class="error">'; ?>
<?php echo $this->_tpl_vars['_must_select_industry']; ?>
<?php echo '</label>\');
				}, 200);
			}
		}
		
		if(!checkHasImage())
		{
			$("html, body").animate({ scrollTop: $(\'#dataIndustry\').offset().top - 100 }, 100);
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
			$(\'#dataProductContent\').parent().find(\'label\').remove();
			$(\'#dataProductContent\').before(\'<label for="" class="errorz">Nội dung yêu cầu nhập</label>\');
			areaerror = true;
			$("html, body").animate({ scrollTop: $(\'#dataIndustry\').offset().top + 500 }, 100);
		}
		else
		{
			$(\'#dataProductContent\').parent().find(\'label\').remove();
		}
		
	'; ?>
<?php if ($this->_tpl_vars['getvar']['type'] != 'service'): ?><?php echo '
	
		if ($(\'#dataProductPrice\').val().length < 5 || $(\'#dataProductPrice\').val() == "") {
			$("html, body").animate({ scrollTop: $(\'#dataIndustry\').offset().top }, 100);
			setTimeout(function(){					
					$(\'#dataProductPrice\').addClass(\'error\');			
					$(\'#dataProductPriceUnit\').after(\'<label for="dataPrice" generated="true" class="error errorPrice">'; ?>
Nhập giá sản phẩm ( > 1.000 VNĐ)<?php echo '</label>\');
				}, 200);
		}
		else
		{
			$(\'#dataProductPrice\').removeClass(\'error\');
			$(\'.errorPrice\').remove();
		}
	
	'; ?>
<?php endif; ?><?php echo '

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
     <div class="offer_info_title">
	<h2><?php if ($this->_tpl_vars['getvar']['type'] == 'service'): ?><?php echo $this->_tpl_vars['_service_add_edit']; ?>
<?php else: ?><?php echo $this->_tpl_vars['_product_add_edit']; ?>
<?php endif; ?></h2>
	<div class="top-announce">
		<?php $this->_tag_stack[] = array('announce', array('row' => 1,'userid' => $this->_tpl_vars['MEMBER']['id'],'typeid' => 6,'membertypeid' => $this->_tpl_vars['MEMBER']['membertype_id'])); $_block_repeat=true;smarty_block_announce($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
			<a target="_blank" href="announce.php?type=6">Hướng dẫn</a>
		<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_announce($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
		<?php $this->_tag_stack[] = array('announce', array('row' => 1,'userid' => $this->_tpl_vars['MEMBER']['id'],'typeid' => 1,'membertypeid' => $this->_tpl_vars['MEMBER']['membertype_id'])); $_block_repeat=true;smarty_block_announce($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
			<a target="_blank" href="announce.php?type=1"><?php echo $this->_tpl_vars['_announce']; ?>
</a>
		<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_announce($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>		
	</div>
     </div>

     
     
     
     <?php if ($this->_tpl_vars['back_link']): ?><a class="back_product_list" href="<?php echo $this->_tpl_vars['back_link']; ?>
"><< <?php echo $this->_tpl_vars['_back_product_list']; ?>
</a><?php endif; ?>
     
	  <form name="productaddfrm" id="Frm1" method="post" action="<?php echo $_ENV['PHP_SELF']; ?>
" enctype="multipart/form-data" onsubmit="$('#Save').attr('disabled',true);">
	  <?php echo smarty_function_formhash(array(), $this);?>

		<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['item']['id']; ?>
">
		<input type="hidden" name="formattribute_ids" value="<?php echo $this->_tpl_vars['item']['formattribute_ids']; ?>
">
		<input type="hidden" name="redirect" value="<?php echo $this->_tpl_vars['back_link']; ?>
">
		<?php if ($this->_tpl_vars['getvar']['type']): ?><input type="hidden" name="data[product][service]" value="1" /><?php endif; ?>
		<div class="hint"><?php echo $this->_tpl_vars['_must_input_with_star']; ?>
</div>
		<p class="notice"><?php echo $this->_tpl_vars['notice']; ?>
</p>
       
       
       
       
       
       
       
       
       
       
<div id="product_edit_box">
       
       <table id="product_formz" width="100%" cellpadding="10" class="super_product_form">
	<tr>
		<td colspan="2">
			<label><?php echo $this->_tpl_vars['_industry_product']; ?>
:<font class="red">*</font></label>
			<div id="dataIndustry">
							<select name="industry[id][1]" id="dataProductIndustryId1" class="level_1" rel="1"></select>
							<select name="industry[id][2]" id="dataProductIndustryId2" class="level_2" rel="2"></select>
							<select name="industry[id][3]" id="dataProductIndustryId3" class="level_3" rel="3"></select>
							<select name="industry[id][4]" id="dataProductIndustryId4" class="level_4" rel="4"></select>
						</div>
			<span class="industry_info"><?php echo $this->_tpl_vars['_main_industry_info']; ?>
</span>
			
		</td>
	</tr>
	<tr style="">
		<td colspan="2">
			<label><?php echo $this->_tpl_vars['_custom_industry']; ?>
:<font class="red">*</font></label>
				<div id="dataCustomIndustry">
					<div class="i_item pos_1">						
						<select name="customIndustry[id][1]" id="dataCustomProductIndustryId1" class="level_1" rel="1" >
							<option value="-1"><?php echo $this->_tpl_vars['_select']; ?>
</option>
							<option value="0">-<?php echo $this->_tpl_vars['_create_custom_industry']; ?>
-</option>
						</select>
						<input name="customIndustry[name][1]" value="" placeholder="<?php echo $this->_tpl_vars['_create_custom_industry']; ?>
" rel="1" />
					</div>					
					<div class="i_item pos_2">						
						<select name="customIndustry[id][2]" id="dataCustomProductIndustryId2" class="level_2" rel="2" >
							<option value="-1"><?php echo $this->_tpl_vars['_select']; ?>
</option>
							<option value="0">-<?php echo $this->_tpl_vars['_create_custom_industry']; ?>
-</option>
						</select>
						<input name="customIndustry[name][2]" value="" placeholder="<?php echo $this->_tpl_vars['_create_custom_industry']; ?>
" rel="2"  />
					</div>
					<div class="i_item pos_3">						
						<select name="customIndustry[id][3]" id="dataCustomProductIndustryId3" class="level_3" rel="3" >
							<option value="-1"><?php echo $this->_tpl_vars['_select']; ?>
</option>
							<option value="0">-<?php echo $this->_tpl_vars['_create_custom_industry']; ?>
-</option>
						</select>
						<input name="customIndustry[name][3]" value="" placeholder="<?php echo $this->_tpl_vars['_create_custom_industry']; ?>
" rel="3"  />
					</div>
					<div class="i_item pos_4">						
						<select name="customIndustry[id][4]" id="dataCustomProductIndustryId4" class="level_4" rel="4" >
							<option value="-1"><?php echo $this->_tpl_vars['_select']; ?>
</option>
							<option value="0">-<?php echo $this->_tpl_vars['_create_custom_industry']; ?>
-</option>
						</select>
						<input name="customIndustry[name][4]" value="" placeholder="<?php echo $this->_tpl_vars['_create_custom_industry']; ?>
" rel="4" />
					</div>
				</div>
				<span class="industry_info"><?php echo $this->_tpl_vars['_custom_industry_info']; ?>
</span>
		</td>
	</tr>
	<tr>
		<td colspan="2" style="padding-top: 15px;">
			<label><?php if ($this->_tpl_vars['getvar']['type'] == 'service'): ?><?php echo $this->_tpl_vars['_service_name']; ?>
<?php else: ?><?php echo $this->_tpl_vars['_product_name']; ?>
<?php endif; ?>:<font class="red">*</font></label>
			<input placeholder="<?php echo $this->_tpl_vars['_words_length']; ?>
" maxlength="70" style="width: 406px" name="data[product][name]" type="text" id="dataProductName" value="<?php echo $this->_tpl_vars['item']['name']; ?>
" class="required">
		</td>
	</tr>

	<tr>
		<td style="width: 300px;display: block" valign="top">
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
		</td>
		<td valign="top">
			<span class="top-table">.</span>
			<table class="offer_info_content">
				<tr>
					   <th><?php echo $this->_tpl_vars['_market']; ?>
<font class="red">*</font></th>
					   <td class="tdright"><font color="#666666">
						<input placeholder="<?php echo $this->_tpl_vars['_market_note']; ?>
" name="data[product][market]" type="text" id="dataProductMarket" value="<?php echo $this->_tpl_vars['item']['market']; ?>
" class="required"></font>					   
					   </td>
				</tr>
				<!--<tr>
				  <th><?php echo $this->_tpl_vars['_area_tt']; ?>
<?php echo $this->_tpl_vars['_colon']; ?>
</th>
				  <td class="tdright">
					<div id="dataArea">
								  <select name="area[id][1]" id="dataProductAreaId1" class="level_1" ></select>
								  <select name="area[id][2]" id="dataProductAreaId2" class="level_2" ></select>
								  <select name="area[id][3]" id="dataProductAreaId3" class="level_3"></select>
							  </div>
	  
							  </td>
				</tr>-->
				<tr>
					   <th> <?php if ($this->_tpl_vars['getvar']['type'] == 'service'): ?><?php echo $this->_tpl_vars['_service_code']; ?>
<?php else: ?><?php echo $this->_tpl_vars['_product_code']; ?>
<?php endif; ?><?php echo $this->_tpl_vars['_colon']; ?>
</th>
					   <td class="tdright"><font color="#666666">
						<input name="data[product][product_code]" type="text" id="dataProductProductCode" value="<?php echo $this->_tpl_vars['item']['product_code']; ?>
"></font>					   
					   </td>
				</tr>
				<tr>
				  <th><?php echo $this->_tpl_vars['_product_brand']; ?>
</th>
				  <td class="tdright"><select name="data[product][brand_id]" id="brand_id_select">
				      <option value="0"><?php echo $this->_tpl_vars['_select']; ?>
</option>
				      <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['UserBrands'],'selected' => $this->_tpl_vars['item']['brand_id']), $this);?>

				    </select> <a href="#new_brand_box" onclick="$('#new_brand_box').css('display', 'block')" id="add_new_brand_but"><?php if ($this->_tpl_vars['getvar']['type'] == 'service'): ?><?php echo $this->_tpl_vars['_add_brand_service']; ?>
<?php else: ?><?php echo $this->_tpl_vars['_add_brand_product']; ?>
<?php endif; ?></a>
				  
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
<?php if ($this->_tpl_vars['key1'] == 6 || ( $this->_tpl_vars['getvar']['type'] != 'service' && $this->_tpl_vars['key1'] == 7 )): ?><font class="red">*</font><?php endif; ?></th>
					   <td class="tdright"><font color="#666666">
					     <input placeholder="<?php echo $this->_tpl_vars['item1']['description']; ?>
" name="data[formitem][<?php echo $this->_tpl_vars['key1']; ?>
]" type="text" id="<?php echo $this->_tpl_vars['item1']['id']; ?>
" value="<?php echo $this->_tpl_vars['item1']['value']; ?>
" <?php if ($this->_tpl_vars['key1'] == 6 || ( $this->_tpl_vars['getvar']['type'] != 'service' && $this->_tpl_vars['key1'] == 7 )): ?>class="required"<?php endif; ?>></font>
					   </td>
					</tr>
				<?php endforeach; endif; unset($_from); ?>
				
					<tr>
					  <th><?php echo $this->_tpl_vars['_the_price_n']; ?>
<font class="red">*</font></th>
					  <td class="tdright"><input name="data[product][price]" type="text" id="dataProductPrice" value="<?php echo $this->_tpl_vars['item']['price']; ?>
">
						<strong>VNĐ / </strong><input placeholder="Đơn vị sản phẩm (Ví dụ: cái, m2,...)" name="data[product][price_unit]" type="text" id="dataProductPriceUnit" value="<?php echo $this->_tpl_vars['item']['price_unit']; ?>
">
					  </td>
					</tr>
					<tr>
					   <th> <?php echo $this->_tpl_vars['_the_new_price']; ?>
<?php echo $this->_tpl_vars['_colon']; ?>
</th>
					   <td class="tdright"><font color="#666666">
					     <input name="data[product][new_price]" type="text" id="dataProductNewPrice" value="<?php echo $this->_tpl_vars['item']['new_price']; ?>
"></font>
					   <input placeholder="Ghi chú (Ví dụ: giá khuyến mãi)" name="data[product][price_note]" type="text" id="dataProductPriceNote" value="<?php echo $this->_tpl_vars['item']['price_note']; ?>
">
					   </td>
					</tr>

				<tr style="display: none">
				  <th class="circle_left"><?php echo $this->_tpl_vars['_product_type']; ?>
<font class="red">*</font></th>
				  <td class="circle_right"><?php echo smarty_function_html_radios(array('name' => "data[product][sort_id]",'options' => $this->_tpl_vars['ProductSorts'],'checked' => ((is_array($_tmp=@$this->_tpl_vars['item']['sort_id'])) ? $this->_run_mod_handler('default', true, $_tmp, 2) : smarty_modifier_default($_tmp, 2)),'separator' => ' '), $this);?>
</td>
				</tr>
				
				
				
						    
				<tr style="display: none">
				  <th><?php echo $this->_tpl_vars['_country']; ?>
:</th>
				  <td><select name="data[product][country_id]" id="CountryId">
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
				
				
				
				
				  <!--		  <tr>
					  <th><?php echo $this->_tpl_vars['_sorts_n']; ?>
</th>
					  <td><select name="data[product][category_id]" id="ProductpriceCategory">
					  <?php echo $this->_tpl_vars['Productcategories']; ?>
	
					  </select></td>
				    </tr>-->
				
				<tr>
				  <th><?php echo $this->_tpl_vars['_tags_n']; ?>
</th>
				  <td class="tdright"><input class="infoTableInput2" name="data[tag]" type="text" id="tag" value="<?php echo $this->_tpl_vars['item']['tag']; ?>
" /><label class="field_notice"><?php echo $this->_tpl_vars['_space_separate']; ?>
</label></td>
				</tr>
				

		    </table>
			<span class="bottom-table">.</span>
			
			
		</td>
	</tr>
       </table>
       
       <br />
       
       <table>
	<tr>
				  
				  <td class="">
					<h3 style="font-size: 16px;margin-bottom: 5px;"><?php echo $this->_tpl_vars['_details_n']; ?>
<font class="red">*</font></h3>
					<input class="editor_imagevideo" id="uploadIVbutton" type = "button" value = "Tải Ảnh/Video" 
						onclick ="javascript:document.getElementById('imagefile').click();">
					<textarea name="data[product][content]" id="dataProductContent" rows="16" wrap="VIRTUAL" style="width:926px;height: 550px" class=""><?php echo $this->_tpl_vars['item']['content']; ?>
</textarea>
					<!-- tinyMCE.activeEditor.execCommand('mceInsertContent', false, "Whatever text");-->
					
				      </td>
				</tr>
       </table>
       
      
    </div>  
      
      
       <br />
       <input name="save" type="submit" id="save" value=" <?php echo $this->_tpl_vars['_confirm_submit']; ?>
 ">
							  <?php if ($this->_tpl_vars['item']['id']): ?>
							  &nbsp;<a class="preview_link" href="<?php echo smarty_function_the_url(array('module' => 'product','id' => ($this->_tpl_vars['item']['id']),'product_name' => ($this->_tpl_vars['item']['name'])), $this);?>
" title="<?php echo $this->_tpl_vars['_preview']; ?>
<?php echo $this->_tpl_vars['item']['name']; ?>
" target="_blank" style="text-decoration:underline;color:blue;"><?php echo $this->_tpl_vars['_preview']; ?>
</a>
							  <?php endif; ?>
	</form>
	  
	
	<br />

	<div id="uploadImageVideo">
		<iframe style="display: none" id="insertFrame" name="insertFrame" ></iframe>
		<form method="POST" action="<?php echo $this->_tpl_vars['SiteUrl']; ?>
index.php?do=product&action=uploadEditorFile" name="insertPicForm" id="insertPicForm" target="insertFrame" enctype="multipart/form-data" onsubmit="return checkUploadEditorInput()">
			<input type="hidden" name="do" value="product" />
			<input type="hidden" name="action" value="uploadEditorFile" />
			
			
			
      
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
</script>
<?php echo '
<script>
jQuery(document).ready(function($) {
	$("#ProductpriceCategory").val("{$item.category_id|default:0}")
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