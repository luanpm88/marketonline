<?php /* Smarty version 2.6.27, created on 2013-11-13 09:02:35
         compiled from policy.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'policy.html', 9, false),array('function', 'editor', 'policy.html', 88, false),array('function', 'formhash', 'policy.html', 107, false),)), $this); ?>
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
		$(\'.MenuItem11\').addClass(\'mActive\');
	});
</script>
'; ?>


<?php echo '
<script type="text/javascript">
	
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

	$("#PolicyFrm").validate({
	submitHandler: function(form) {
		$(form).find(":submit").attr("disabled", true).attr("value",pb_lang.DO_PROCESSING);
		form.submit();
	}
	});
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
	

	
     <div class="blank"></div>
	 <div class="offer_banner"><img src="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/offer_01.gif" /></div>
     <div class="offer_info_title"><h2><?php echo $this->_tpl_vars['_policy']; ?>
</h2></div>
     <div class="hint"><?php echo $this->_tpl_vars['_must_input_with_star']; ?>
</div>
	  <?php echo $this->_tpl_vars['Errors']; ?>

	  <form name="policy_frm" id="PolicyFrm" action="<?php echo $_SERVER['PHP_SELF']; ?>
" method="post">
		 <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['item']['id']; ?>
">        
		 <input type="hidden" name="data[companyfield][company_id]" value="<?php echo $this->_tpl_vars['item']['id']; ?>
">        
		 <?php echo smarty_function_formhash(array(), $this);?>
        
		 <input type="hidden" name="do" id="Do" value="save" />
		 
		 
		 
<div id="product_edit_box" style="margin-bottom: 10px;">
		 

		
		
		<h3><?php echo $this->_tpl_vars['_policy']; ?>
</h3>
		 <p>
                    <textarea name="data[company][policy]" rows="80" wrap="VIRTUAL" id="company_policy" style="width:100%;height: 600px"><?php echo $this->_tpl_vars['item']['policy']; ?>
</textarea>
                </p>
		 
		 
</div>
		 
       <input name="company_edit" type="submit" id="CompanyEdit" value="<?php echo $this->_tpl_vars['_confirm_submit']; ?>
">
		 
          
	</form>
	  
	  
	  <div id="uploadImageVideo" style="margin-top: -594px;margin-left: 459px">
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