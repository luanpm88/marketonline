<?php /* Smarty version 2.6.27, created on 2014-06-13 16:07:40
         compiled from default%5Cstudypost/group_info_edit.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'default\\studypost/group_info_edit.html', 20, false),)), $this); ?>
    <script type='text/javascript' src='http://code.jquery.com/jquery-1.11.1.min.js'></script>
    <script src="<?php echo $this->_tpl_vars['theme_img_path']; ?>
js/tinymce/tinymce.min.js"></script>
    <?php echo '
        <style>
            a {
                text-decoration: none;
            }
            .button-style
            {
                padding: 5px 10px;
                border: none;
                color: #fff;
                background: #3B984C;
                font-size: 14px;
                cursor: pointer;
            }
        </style>
    '; ?>

    <div class="group-info-edit" style="margin: 0 -8px;">
        <form action="<?php echo smarty_function_the_url(array('module' => "root-url"), $this);?>
index.php?do=studypost&action=update_group_info" method="post">
            <input type="hidden" name="type" value="<?php echo $_GET['type']; ?>
" />
            <input type="hidden" name="group_id" value="<?php echo $_GET['group_id']; ?>
" />
            <a href="javascript:void(0)" onclick="javascript:document.getElementById('imagefile').click();" class="add-image-button">Tải ảnh/video</a>
            <textarea style="height: 200px" name="group-info-content" id="group-info-content"><?php echo $this->_tpl_vars['group']['info']; ?>
</textarea>
            
            <input class="button-style" type="submit" value="Lưu thay đổi" style="margin-top: 10px;" />
            <input class="button-style" type="button" value="Đóng" style="margin-top: 10px;margin-left: 5px;background: #aaa" onclick="window.parent.location.reload(false);" />
        </form>
    </div>
    
    
    <div id="uploadImageVideo" style="margin-top: -595px;">
        <iframe style="display: none" id="insertFrame" name="insertFrame" ></iframe>
        <form method="POST" action="<?php echo $this->_tpl_vars['SiteUrl']; ?>
index.php?do=product&action=uploadEditorFile" name="insertPicForm" id="insertPicForm" target="insertFrame" enctype="multipart/form-data" onsubmit="return checkUploadEditorInput()">
                <input type="hidden" name="do" value="product" />
                <input type="hidden" name="action" value="uploadEditorFile" />
                <input type="hidden" name="tag" value="groupinfo_<?php echo $this->_tpl_vars['pb_userinfo']['username']; ?>
_" /> 
                <input style="visibility: hidden; position: absolute; top: -20000px" id="imagefile" type="file" name="uploadEditorFile" id="uploadEditorFile" onchange="$('#insertPicForm').submit()" />                                                    
        </form>
    </div>

<?php echo '
<script>
    
    function inserEditorFile(url, image) {
        var currentEditor = tinyMCE.get(\'group-info-content\');
        $(\'#uploadIVbutton\').removeAttr(\'disabled\');
        $(\'#uploadIVbutton\').attr(\'value\',\'Tải ảnh/video\');
        if (image) {
            currentEditor.execCommand(\'mceInsertContent\', false, "<p><img width=\'100%\' src=\''; ?>
<?php echo $this->_tpl_vars['WebRootUrl']; ?>
<?php echo 'attachment/"+url+"\' /></p><p></p>");
            currentEditor.focus();
            
            currentEditor.execCommand(\'mceAutoResize\');
        }
        else
        {
            alert("Video đã được chèn thành công. Sau khi nhấn nút lưu ở dưới, bạn xem video này ở trang chi tiết.");
            currentEditor.execCommand(\'mceInsertContent\', false, \'<video controls width="640" height="360">\'
                                        +\'<source src="'; ?>
<?php echo $this->_tpl_vars['WebRootUrl']; ?>
<?php echo 'attachment/\'+url+\'" type="video/mp4" />\'
                                        +\'Your browser does not support the video tag.</video>\');
            currentEditor.execCommand(\'mceAutoResize\');
        }
        
        //move to last line
        currentEditor.selection.select(currentEditor.getBody(), true); // ed is the editor instance
        currentEditor.selection.collapse(false);
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
    
    //function loadEditorGroup() {
        tinymce.init({
            selector: \'textarea[name=group-info-content]\',
            plugins: [
                    "autoresize advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "table directionality emoticons template textcolor paste textcolor"
            ],
            language : \'vi_VN\',
    
            toolbar1: "preview code bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | fontselect fontsizeselect | forecolor backcolor",
            toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink image media | preview",
            toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons",
    
            menubar: false,
            toolbar_items_size: \'small\',
    
            style_formats: [
                    {title: \'Bold text\', inline: \'b\'},
                    {title: \'Red text\', inline: \'span\', styles: {color: \'#ff0000\'}},
                    {title: \'Red header\', block: \'h1\', styles: {color: \'#ff0000\'}},
                    {title: \'Example 1\', inline: \'span\', classes: \'example1\'},
                    {title: \'Example 2\', inline: \'span\', classes: \'example2\'},
                    {title: \'Table styles\'},
                    {title: \'Table row 1\', selector: \'tr\', classes: \'tablerow1\'}
            ],
    
            templates: [
                    {title: \'Test template 1\', content: \'Test 1\'},
                    {title: \'Test template 2\', content: \'Test 2\'}
            ],
                        
            entity_encoding : "raw",
            autoresize_bottom_margin : 1,
            content_css : "'; ?>
<?php echo $this->_tpl_vars['theme_img_path']; ?>
<?php echo 'css/editorcontent.css"
        });
    //}
</script>
'; ?>