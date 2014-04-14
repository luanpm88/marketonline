<?php /* Smarty version 2.6.27, created on 2014-03-12 08:10:39
         compiled from pms_send.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'editor', 'pms_send.html', 58, false),array('function', 'formhash', 'pms_send.html', 72, false),)), $this); ?>
<?php $this->assign('page_title', ($this->_tpl_vars['_send_message'])); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
<script>
	jQuery(document).ready(function($) {
		$(\'.MenuItem17\').addClass(\'mActive\');
	});
</script>
'; ?>


<script src="../scripts/jquery/jquery.textbox.js" charset="<?php echo $this->_tpl_vars['charset']; ?>
"></script>
<script>
var allows_maximum_input = "<?php echo $this->_tpl_vars['_allows_maximum_input']; ?>
";
var can_also_enter = "<?php echo $this->_tpl_vars['_can_also_enter']; ?>
";
</script>
<?php echo '
<script>
	
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
	
jQuery(document).ready(function($) {
	$("#Content").textbox({
		maxLength: 255,
		onInput: function(event, status) {
			$("#txtTips").html(allows_maximum_input+" <strong style=\'font-family:Arial;font-size:1.5em;\'>" + status.maxLength + "</strong> "+can_also_enter+" <strong style=\'font-family:Arial;font-size:1.5em;\'>" + status.leftLength + "</strong>");
		}
	});
	$("#Frm1").validate({
	submitHandler: function(form) {
		$(form).find(":submit").attr("disabled", true).attr("value",pb_lang.DO_PROCESSING);
		form.submit();
	}
	});
'; ?>

<?php if ($this->_tpl_vars['message']): ?>
<?php echo '
	$(\'#To\').focus();
'; ?>

<?php endif; ?>
<?php echo '
})
</script>
'; ?>

<?php echo smarty_function_editor(array('type' => 'tiny_mce'), $this);?>

<div class="wrap clearfix pms-out">
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
     <div class="hint" style="color: red"><?php echo $this->_tpl_vars['message']; ?>
</div>
	  <form name="sendmsgfrm" id="Frm1" action="pms.php" method="post">
	  <?php echo smarty_function_formhash(array(), $this);?>

       <table class="offer_info_content">
          <tr>
            <th class="circle_left"><?php echo $this->_tpl_vars['_send_to']; ?>
<font color="#FF6600">*</font></th>
             <td class="circle_right"><input <?php if ($this->_tpl_vars['message']): ?>style="border-color: red"<?php endif; ?> name="to" type="text" id="To" size="30" value="<?php echo $this->_tpl_vars['item']['to']; ?>
" class="required"><font color="#666666"><?php echo $this->_tpl_vars['_send_other_username']; ?>
</font></td>
          </tr>
          <tr>
            <th> <?php echo $this->_tpl_vars['_theme_n']; ?>
<font color="#FF6600">*</font></th>
            <td><input name="pms[title]" type="text" id="title" size="30" value="<?php echo $this->_tpl_vars['mm']['title']; ?>
" class="required"></td>
          </tr>
          <tr>
             <th><?php echo $this->_tpl_vars['_content']; ?>
<font color="#FF6600">*</font></th>
             <td>
		<input id="uploadIVbutton_out" type = "button" value = "Tải Ảnh/Video" 
       onclick ="javascript:document.getElementById('imagefile').click();">
		<textarea name="pms[content]" id="Content" cols="50" rows="6" wrap="VIRTUAL" class="required"><?php echo $this->_tpl_vars['mm']['content']; ?>
</textarea><div id="txtTips"></div></td>
          </tr>
          <tr>
             <th class="circle_bottomleft"></th>
             <td class="circle_bottomright"><input name="send" type=submit id="Send" value=" <?php echo $this->_tpl_vars['_send']; ?>
 ">&nbsp;&nbsp;<input name=reset type=reset id="reset" value=" <?php echo $this->_tpl_vars['_cancel']; ?>
 "></td>
          </tr>
           
        </table>
	  </form>
 </div>
 </div>

 
   <div id="uploadImageVideo" style="margin-top: -645px;margin-left: 517px">
		<iframe style="display: none" id="insertFrame" name="insertFrame" ></iframe>
		<form method="POST" action="<?php echo $this->_tpl_vars['SiteUrl']; ?>
index.php?do=product&action=uploadEditorFile" name="insertPicForm" id="insertPicForm" target="insertFrame" enctype="multipart/form-data" onsubmit="return checkUploadEditorInput()">
			<input type="hidden" name="do" value="product" />
			<input type="hidden" name="action" value="uploadEditorFile" />
			
			
			
      
			<input style="visibility: hidden; position: absolute; top: -20000px" id="imagefile" type="file" name="uploadEditorFile" id="uploadEditorFile" onchange="$('#insertPicForm').submit()" />
			
		</form>
	</div>
 
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>