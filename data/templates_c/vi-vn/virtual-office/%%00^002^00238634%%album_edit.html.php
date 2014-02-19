<?php /* Smarty version 2.6.27, created on 2013-09-19 07:55:12
         compiled from album_edit.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'editor', 'album_edit.html', 10, false),array('function', 'formhash', 'album_edit.html', 71, false),array('function', 'html_options', 'album_edit.html', 104, false),)), $this); ?>
<?php $this->assign('page_title', ($this->_tpl_vars['_company_album'])); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script src="<?php echo $this->_tpl_vars['SiteUrl']; ?>
scripts/jquery/jquery.colorbox.js" type="text/javascript"></script>
<link href="<?php echo $this->_tpl_vars['SiteUrl']; ?>
scripts/jquery/colorbox/colorbox.css" media="screen" rel="stylesheet" type="text/css"/>
<script src="../scripts/jquery/jquery.textbox.js" charset="<?php echo $this->_tpl_vars['charset']; ?>
"></script>
<script>
var allows_maximum_input = "<?php echo $this->_tpl_vars['_allows_maximum_input']; ?>
";
var can_also_enter = "<?php echo $this->_tpl_vars['_can_also_enter']; ?>
";
</script>
<?php echo smarty_function_editor(array('type' => 'tiny_mce'), $this);?>


<?php echo '
<script>
	jQuery(document).ready(function($) {
		$(\'.MenuItem12\').addClass(\'mActive\');
	});
</script>
'; ?>


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
		maxLength: 120,
		onInput: function(event, status) {
			$("#txtTips").html(allows_maximum_input+" <strong style=\'font-family:Arial;font-size:1.5em;\'>" + status.maxLength + "</strong> "+can_also_enter+" <strong style=\'font-family:Arial;font-size:1.5em;\'>" + status.leftLength + "</strong>");
		}
	});
	$(\'a[rel*=lightbox]\').colorbox({maxWidth:600,opacity:0.1});
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
     <div class="offer_info_title"><h2>
	<?php if ($this->_tpl_vars['membertype_id'] == 2): ?><?php echo $this->_tpl_vars['_album_company']; ?>
<?php endif; ?>
	<?php if ($this->_tpl_vars['membertype_id'] == 3): ?><?php echo $this->_tpl_vars['_album_shop']; ?>
<?php endif; ?>
	<?php if ($this->_tpl_vars['membertype_id'] == 1): ?><?php echo $this->_tpl_vars['_album_person']; ?>
<?php endif; ?>
     </h2></div>
     <div class="hint"><?php echo $this->_tpl_vars['_must_input_with_star']; ?>
</div>

     
     
     <div id="product_edit_box">
     
     
	  <form name="edit_frm" method="post" action="album.php" enctype="multipart/form-data" onsubmit="$('#BtnSubmit').attr('disabled',true);">
	  <?php echo smarty_function_formhash(array(), $this);?>

	  <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['item']['id']; ?>
">
	  <input type="hidden" name="do" value="save">

       <div><?php echo $this->_tpl_vars['_title']; ?>
<font class="red">*</font>: <input style="padding: 4px;margin-bottom: 10px;" type="text" id="albumTitle" name="album[title]" value="<?php echo $this->_tpl_vars['item']['title']; ?>
" /></div>
       
       
       <div id="image_box">
		<?php if ($this->_tpl_vars['item']['image']): ?>
			<a href="<?php echo $this->_tpl_vars['item']['image']; ?>
" id="uploadpic_hover" rel="lightbox"><img id="uploadpic" src="<?php echo $this->_tpl_vars['item']['image']; ?>
.small.jpg" alt="<?php echo $this->_tpl_vars['item']['title']; ?>
" width="80" height="80" border="0" /></a>
		<?php endif; ?>
		<span class="gray" style="padding-bottom: 5px;display: block">
                  <?php echo $this->_tpl_vars['_image_size_format_provision']; ?>
</span>
		<?php if ($this->_tpl_vars['item']['id']): ?><h2>
			Thay hình khác:
		</h2><?php endif; ?>
		<input name="pic" type="file" id="uploadfile" style="width: 240px;" onchange="preview()" />
                
	
	
       </div>
       
       
       
       
       <table class="offer_info_content album_edit_box" style="display: none">
          <!--<tr>
            <th class="circle_left"><font class="red">*</font><?php echo $this->_tpl_vars['_show_title']; ?>
</th>
            <td class="circle_right"><input type="text" id="albumTitle" name="album[title]" value="<?php echo $this->_tpl_vars['item']['title']; ?>
" /></td>
          </tr>-->
          <tr style="display: none">
            <th><?php echo $this->_tpl_vars['_categories']; ?>
</th>
            <td><select name="album[type_id]">
				<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['AlbumTypes'],'selected' => $this->_tpl_vars['item']['type_id']), $this);?>

            </select></td>
          </tr>
          <!--<tr>
            <th><font class="red">&nbsp; </font><?php echo $this->_tpl_vars['_simple_description']; ?>
</th>
            <td><textarea name="album[description]" id="Content" cols="60" rows="8" wrap="VIRTUAL"><?php echo $this->_tpl_vars['item']['description']; ?>
</textarea><div id="txtTips"></div></td>
          </tr>-->
          <!--<tr>
            <th><?php echo $this->_tpl_vars['_attachment_upload']; ?>
</th>
            <td>
                
             </td>
          </tr>-->
		  <?php if ($this->_tpl_vars['item']['image']): ?>
          <tr>
           <th></th>
             <td></td>
          </tr>
          <?php endif; ?>
          <!--<tr>
           <th class="circle_bottomleft"></th>
             <td class="circle_bottomright"><input name="btnSubmit" type="submit" id="BtnSubmit" value=" <?php echo $this->_tpl_vars['_confirm_submit']; ?>
 "></td>
          </tr>-->
       </table>
       
       <h3 style="clear: both; padding-top: 20px;"><?php echo $this->_tpl_vars['_description']; ?>
<font class="red">*</font></h3>
		 <p>
                    <textarea name="album[description]" rows="80" wrap="VIRTUAL" id="company_des" style="width:100%;height: 400px" class="required"><?php echo $this->_tpl_vars['item']['description']; ?>
</textarea>
                </p>
       
       
	
	  
	  <br style="clear: both" />
       <input style="margin-top: 20px;margin-right: -12px" name="save" type="submit" id="save" value=" <?php echo $this->_tpl_vars['_confirm_submit']; ?>
 ">
	 </form>
	  
	  <div id="uploadImageVideo" style="margin-top: -390px;">
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
  </div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>