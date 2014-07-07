<?php /* Smarty version 2.6.27, created on 2014-07-04 14:43:25
         compiled from announce.edit.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'editor', 'announce.edit.html', 2, false),array('function', 'fetch', 'announce.edit.html', 3, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo smarty_function_editor(array('type' => 'tiny_mce'), $this);?>

<?php echo smarty_function_fetch(array('file' => "../scripts/date.js"), $this);?>

<div id="currentPosition">
	<p><?php echo $this->_tpl_vars['_your_current_position']; ?>
 <?php echo $this->_tpl_vars['_setting_global']; ?>
 &raquo; <?php echo $this->_tpl_vars['_announcement']; ?>
</p>
</div>
<div id="rightTop"> 
    <h3><?php echo $this->_tpl_vars['_announcement']; ?>
</h3> 
    <ul class="subnav">
		<li><a href="announce.php"><?php echo $this->_tpl_vars['_management']; ?>
</a></li>
        <li><a class="btn1" href="announce.php?do=edit"><span><?php echo $this->_tpl_vars['_add_or_edit']; ?>
</span></a></li>
        <li><a href="announcementtype.php"><?php echo $this->_tpl_vars['_sorts']; ?>
</a></li>
    </ul>
</div>
<div class="info">
  <form action="announce.php" method="post" id="EditFrm" name="edit_frm">
  <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>
">
  <input type="hidden" name="page" value="<?php echo $_GET['page']; ?>
" />
    <table class="infoTable">
      <tr>
        <th class="paddingT15"> <?php echo $this->_tpl_vars['_title']; ?>
<?php echo $this->_tpl_vars['_colon']; ?>
</th>
        <td class="paddingT15 wordSpacing5">          
		<input class="infoTableInput2" name="data[announcement][subject]" value="<?php echo $this->_tpl_vars['item']['subject']; ?>
" /><label class="field_notice"><?php echo $this->_tpl_vars['_title_display']; ?>
</label>        </td>
      </tr>
      <tr>
        <th class="paddingT15">Hiển thị</th>
        <td class="paddingT15 wordSpacing5"> 
		<input type="radio" name="data[announcement][status]" value="1" <?php if ($this->_tpl_vars['item']['status']): ?>checked="checked"<?php endif; ?> type="text" /> Bật
		<input type="radio" name="data[announcement][status]" value="0" <?php if (! $this->_tpl_vars['item']['status']): ?>checked="checked"<?php endif; ?> type="text" /> Tắt
	</td>
      </tr>
      <tr>
        <th class="paddingT15">Nhóm hiển thị</th>
        <td class="paddingT15 wordSpacing5">          
		<input style="width: 225px" placeholder="Cách nhau bằng dấu phẩy" class="infoTableInput2" name="data[announcement][membertypes]" value="<?php echo $this->_tpl_vars['item']['membertypes']; ?>
" />
		<label class="field_notice">để trống:tất cả; 1:Cá nhân; 2:Công ty; 3:Cửa hàng; 4:xin việc; 5:tuyển dụng </label>        </td>
      </tr>
      <tr>
        <th class="paddingT15"> <?php echo $this->_tpl_vars['_categories']; ?>
</th>
        <td class="paddingT15 wordSpacing5">
			<select name="data[announcement][announcetype_id]">
			<?php $_from = $this->_tpl_vars['Types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['typename']):
?>
			<option value="<?php echo $this->_tpl_vars['key']; ?>
" <?php if ($this->_tpl_vars['item']['announcetype_id'] == $this->_tpl_vars['key']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['typename']; ?>
</option>
			<?php endforeach; endif; unset($_from); ?>
			</select></td>
      </tr>
      <tr>
        <th class="paddingT15"><?php echo $this->_tpl_vars['_date_end']; ?>
</th>
        <td class="paddingT15 wordSpacing5"> 
		<input name="data[display_expiration]" value="<?php echo $this->_tpl_vars['item']['display_expiration']; ?>
" type="text" id="date1" /><span class="btn_calendar" id="calendar-date1"></span><label class="field_notice"><?php echo $this->_tpl_vars['_is_empty_or_zero_never_expires']; ?>
</label></td>
      </tr>
      <tr>
        <!--<th class="paddingT15"> <?php echo $this->_tpl_vars['_content']; ?>
</th>-->
        <td class="paddingT15 wordSpacing5" colspan="2">
		<input id="uploadIVbutton" type = "button" value = "Tải Ảnh/Video" 
       onclick ="javascript:document.getElementById('imagefile').click();">
        <textarea style="width:100%;height:800px;" name="data[announcement][message]" id="dataAnnouncementMessage"><?php echo $this->_tpl_vars['item']['message']; ?>
</textarea>        </td>
	
	
	
	
      </tr>
      <tr>
        <th></th>
        <td class="ptb20">
		
			<input class="formbtn" type="submit" name="save" value="<?php echo $this->_tpl_vars['_save']; ?>
" />		</td>
      </tr>
    </table>
  </form>
  
  
  
  <div id="uploadImageVideo" style="margin-top: -595px;display: none">
		<iframe style="display: none" id="insertFrame" name="insertFrame" ></iframe>
		<form method="POST" action="<?php echo $this->_tpl_vars['SiteUrl']; ?>
index.php?do=product&action=uploadEditorFile" name="insertPicForm" id="insertPicForm" target="insertFrame" enctype="multipart/form-data" onsubmit="return checkUploadEditorInput()">
			<input type="hidden" name="do" value="product" />
			<input type="hidden" name="action" value="uploadEditorFile" />
			
			
			
      
			<input style="visibility: hidden; position: absolute; top: -20000px" id="imagefile" type="file" name="uploadEditorFile" id="uploadEditorFile" onchange="$('#insertPicForm').submit()" />
			
		</form>
	</div>
  
  
</div>
<?php echo '
<script>
Calendar.setup({
	trigger    : "calendar-date1",
	animation  : false,
	inputField : "date1",
	onSelect   : function() { this.hide() }
});
</script>
'; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>