<?php /* Smarty version 2.6.27, created on 2014-02-26 12:11:26
         compiled from default%5Cstudypost/school.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'the_url', 'default\\studypost/school.html', 490, false),array('function', 'formhash', 'default\\studypost/school.html', 519, false),array('modifier', 'truncate', 'default\\studypost/school.html', 500, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/header.html", 'smarty_include_vars' => array('page_title' => "Thị trường Mua-Bán, Phân phối Sản phẩm/Dịch vụ")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/verytopmenu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
<script type="application/x-javascript">
    
    function deleteStudypostcomment(box)
    {
        var id = box.attr("rel");
        
        $.ajax({   
            url: ROOT_URL+"index.php?do=studypost&action=deleteComment&id="+id,
            success: function(data){
                box.parent().find(".count_current_comment").html(parseInt(box.parent().find(".count_current_comment").html())-1);
                box.remove();
            }   
        });
    }
    
    function checkStatsEditor(texta)
    {
            if ($.trim(texta.val()).length > 3 || texta.parent().parent().find(".stars .result").attr("value") != "0") {
                texta.parent().parent().find(".send-button").addClass("active");
            }
            else
            {
                texta.parent().parent().find(".send-button").removeClass("active");
            }
    }
    
    function loadStudyPostCommnets(studypost_id, current_count)
    {
        var count = "";
        if (typeof current_count != "undefined") {
            count = current_count;
            count = $(\'.studypost_box[rel=\'+studypost_id+\'] .comment_list .is_item\').length - 1;
        }
        
        $.ajax({   
            url: ROOT_URL+"index.php?do=studypost&action=ajaxLoadStudypostComments&studypost_id="+studypost_id+"&count="+count,
            success: function(data){
                //alert(data);
                
                $(\'.studypost_box[rel=\'+studypost_id+\'] .comment_list\').html(data);
                
                if (count != "") {
                    $(\'.studypost_box[rel=\'+studypost_id+\'] .count_current_comment\').html(parseInt(count)+10);
                }
            }   
        });  
    }
    
    function postStudypostComment(form)
    {
        $.ajax({   
            type: "POST",            
            url: form.attr("action"),
            data: form.serialize(),
            success: function(data){
                var studypost_id = form.find("input[name=\'comment[studypost_id]\']").val();
                loadStudyPostCommnets(studypost_id);
                
                if (form.parent().find("input[name=\'comment[star]\']").val() != "0") {
                    form.find(".post_star").hide();
                }
                
                form.find("textarea").val("");
                form.find(".stars .star[rel=\'0\']").trigger("click");
                form.find(".stars .star").removeClass("light");                
                
                checkStatsEditor(form.find("textarea"));
            }   
        }); 
    }
    
    function deleteStudypost(id)
    {
        $.ajax({   
            url: ROOT_URL+"index.php?do=studypost&action=delete&id="+id,
            success: function(data){
                //$(\'#studypost-main-content\').html(data);
                hideEditStudypostForm();
                $(\'.studypost_box[rel=\'+id+\']\').remove();
                load_pos -= 1;
            }   
        }); 
    }
    
    function hideEditStudypostForm()
    {
        var item_des = $(\'.studypost_box .inner-content\');
        var item_src = $(\'.edit_studypost_form\');
        
        item_des.css("visibility","visible");
        item_des.css("height","auto");
        item_src.addClass("hide_editor");
        item_src.css("position","");
        item_src.css("left","");
        
        clearInterval(resizeEditorInterval);
    }
    
    function showEditStudypostForm(id)
    {
        var item_des = $(\'.studypost_box[rel=\'+id+\'] .inner-content\');
        var item_src = $(\'.edit_studypost_form\');
        var editor = tinymce.get(item_src.find(\'textarea\').attr("id"));
        
        item_src.find(\'input[name="studypost[id]"]\').val(id);
        editor.setContent(item_des.html());
        item_src.removeClass("hide_editor");
        item_des.css("visibility","hidden");
        item_src.css("top", item_des.offset().top);
        item_src.css("left", item_des.offset().left);
        item_src.width(item_des.width());
        item_des.height(item_src.height());
        item_src.css("position", "absolute");
        
        
        editor.execCommand(\'mceAutoResize\');
        onChangeEditor(editor, false);
        
        resizeEditorInterval = setInterval(function() {item_des.height(item_src.height());},500);
    }
    
    function clearStudypostForm()
    {
        var editor = tinymce.get(\'studypost-content\');
        $(\'#studypost-content\').val("");
        editor.setContent("<p>Đăng tải thông tin cho trường của bạn...</p>");
    }
    
    function loadStudyPosts(new_list)
    {
        if (typeof new_list != "undefined")
        {
            $(\'#studypost-main-content\').html("");
            load_pos = 0;
            scroll_enabled = false;
        }
        
        $.ajax({   
            url: ROOT_URL+"index.php?do=studypost&action=ajaxLoadStudyposts&type=school&load_pos="+load_pos+"&load_num="+load_num,
            success: function(data){
                $(\'#studypost-main-content\').append(data);
                scroll_enabled = true;
                load_pos += load_num;
            }   
        });  
    }
    
    function postStudypost(form)
    {
        
        var editor = tinymce.get(form.find(\'textarea\').attr("id"));
        form.find(\'textarea\').val(editor.getContent());
        
        $.ajax({   
            type: "POST",            
            url: form.attr("action"),
            data: form.serialize(),
            success: function(data){
                clearStudypostForm()
                loadStudyPosts(true);
                $("html, body").animate({ scrollTop: 0 }, 100);
            }   
        });  
    }
    
    function editStudypost(form)
    {
        
        var editor = tinymce.get(form.find(\'textarea\').attr("id"));
        form.find(\'textarea\').val(editor.getContent());
        
        $.ajax({   
            type: "POST",            
            url: form.attr("action"),
            data: form.serialize(),
            success: function(data){
                clearStudypostForm();
                //loadStudyPosts();
                hideEditStudypostForm();
                var boxid = form.find("input[name=\'studypost[id]\']").val();
                
                $(\'.studypost_box[rel=\'+boxid+\'] .box_content .inner-content\').html(data);
            }   
        });  
    }
    
        function inserEditorFile(url, image) {
		$(\'#uploadIVbutton\').attr(\'disabled\',\'\');
		$(\'#uploadIVbutton\').attr(\'value\',\'Tải ảnh/video\');
		if (image) {
			currentEditor.execCommand(\'mceInsertContent\', false, "<img width=\'100%\' src=\''; ?>
<?php echo $this->_tpl_vars['WebRootUrl']; ?>
<?php echo 'attachment/"+url+"\' />");
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
    
    function countWord(string) {
        if (string == \'\') {
            return 0;
        }
        //alert(string.replace(/(<p>|<\\/p>)/g, ""));
        return string.replace(/(<p>|<\\/p>)/g, \'\').replace(/\\n/g,\' \').replace(/\\s(\\s)*/ig,\' \').split(\' \').length;
    }
    
    function onChangeEditor(editor, main)
    {
        var content = editor.getContent();
        
        //salert(editor.parent());
        var box = \'\';
        if (main) {
            box = \'.facelike_postform \';
        }
        else
        {
            box = \'.edit_studypost_form \';
        }
        
        $(box+\'.word-count span\').html(countWord(content));
        
        if (countWord(content) > 2 && content != \'<p>Đăng tải thông tin cho trường của bạn...</p>\') {
            $(box+\'.send-button\').addClass("active");
        }
        else
        {
            $(box+\'.send-button\').removeClass("active");
        }
    }
    
    function hideEditorControl()
    {

    }
    
    function showEditor(item, main)
    {
        tinymce.init({
                selector: item,
                plugins: [
                        "autoresize advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
                        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                        "table contextmenu directionality emoticons template textcolor paste textcolor"
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
                
                setup: function(ed) {                            
                            ed.on(\'keypress\', function(e) {
                               onChangeEditor(ed, main);
                            });
                            ed.on(\'init\', function(e) {
                               $(\'.mce-toolbar-grp\').addClass("editor-hide");
                               onChangeEditor(ed, main);
                            });
                            ed.on(\'focus\', function(e) {
                               //alert(ed.getContent());
                               var content = ed.getContent();
                               if (content == \'<p>Đăng tải thông tin cho trường của bạn...</p>\') {
                                    ed.setContent("");                                    
                               }
                               onChangeEditor(ed, main);
                            });
                            ed.on(\'blur\', function(e) {
                               //alert(ed.getContent());
                               var content = ed.getContent();
                               if (content == \'\') {
                                    ed.setContent(\'<p>Đăng tải thông tin cho trường của bạn...</p>\');                                    
                               }
                               onChangeEditor(ed, main);
                            });
                        },
                        
                entity_encoding : "raw",
                autoresize_bottom_margin : 1,
                content_css : "'; ?>
<?php echo $this->_tpl_vars['theme_img_path']; ?>
<?php echo 'css/editorcontent.css"

        });
    }
    
    var ROOT_URL = "'; ?>
<?php echo $this->_tpl_vars['WebRootUrl']; ?>
<?php echo '";
    var currentEditor;
    var resizeEditorInterval;
    $(document).ready(function() {
        
        showEditor(\'#studypost-content\', true);
        showEditor(\'#edit-studypost-content\', false);        
        
        $(\'.show-editor-button\').live("click", function() {
            if ($(this).parent().parent().find(\'.mce-toolbar-grp\').hasClass("editor-hide")) {
                $(this).parent().parent().find(\'.mce-toolbar-grp\').removeClass("editor-hide");
                $(this).addClass("showed");
            }
            else {
                $(this).parent().parent().find(\'.mce-toolbar-grp\').addClass("editor-hide");
                $(this).removeClass("showed");
            }
            var editor = tinymce.get($(this).parent().parent().find("textarea").attr("id"));
            editor.focus();
        });
        
        $(\'.facelike_postform .send-button.active\').live(\'click\', function() {
            postStudypost($(this).parent().parent());
        });
        
        $(\'.edit_studypost_form .send-button.active\').live(\'click\', function() {
            editStudypost($(this).parent().parent());
        });
        
        //load study posts
        loadStudyPosts(true);
        
        $(\'.add-image-button\').click(function() {
            currentEditor = tinymce.get($(this).parent().parent().find("textarea").attr("id"));
        });
        
        $(\'.studypost_box .box_edit_but\').live("click", function() {
            hideEditStudypostForm();
            showEditStudypostForm($(this).parent().parent().attr(\'rel\'));
        })
        
        $(\'.studypost_box .box_delete_but\').live("click", function() {
            hideEditStudypostForm();
            deleteStudypost($(this).parent().parent().attr(\'rel\'));
        })
        
        $(\'.edit_studypost_form .close-button\').live("click", function() {
            hideEditStudypostForm();
        });
        
        $(\'.post_star .star\').live("mouseover", function() {
            var rel = parseInt($(this).attr("rel"));
            $(this).parent().find(\'.star\').each(function() {
                if (parseInt($(this).attr("rel")) <= rel) {
                    $(this).addClass("light");
                }
                else
                {
                    $(this).removeClass("light");
                }
            });
            $(this).parent().find(\'.result\').html($(this).attr("rel"));
            if ($(this).attr("rel") == "0") {
                $(this).parent().find(\'.result\').html("");
            }
        });
        
        $(\'.post_star .star\').live("mouseout", function() {
            $(this).parent().find(\'.star\').removeClass(\'light\');
            $(this).parent().find(\'.result\').html($(this).parent().find(\'.result\').attr("value"));
            if ($(this).parent().find(\'.result\').attr("value") == "0") {
                $(this).parent().find(\'.result\').html("");
            }
            
            $(this).parent().find(\'.star\').each(function() {
                if (parseInt($(this).attr("rel")) <= parseInt($(this).parent().find(\'.result\').attr("value"))) {
                    $(this).addClass("light");
                }
            });           
        });
        
        $(\'.post_star .star\').live("click", function() {
            $(this).parent().find(\'.result\').attr("value", $(this).attr(\'rel\'));
            $(this).parent().find(\'.result\').html($(this).attr(\'rel\'));
            if ($(this).attr(\'rel\') == "0") {
                $(this).parent().find(\'.result\').html("");
            }
            
            $(this).parent().parent().find("input[name=\'comment[star]\']").val($(this).attr(\'rel\'));
            
            checkStatsEditor($(this).parent().parent().find(\'.editor textarea\'));
        });
        
        //hide show stats
        $(\'.studypost_box .stats ul li a\').live("click",function() {
            //$(\'.tab_item\').css("display","none");
            //$(this).parent().parent().parent().find(\'#\'+$(this).attr("rel")+"_content").css("display","block");
        });
        
        $(\'.studypost_box .actions .send-button\').live("click",function(e) {
            e.preventDefault();
        });
        
        $(\'.studypost_box .actions .send-button.active\').live("click",function(e) {
            var form = $(this).parent().parent();
            postStudypostComment(form);
            e.preventDefault();
        });
        
        $(\'.stats_content .editor textarea\').live("keypress",function(e) {            
            checkStatsEditor($(this));
        });
        //$(\'.stats_content .editor textarea\').live("change",function(e) {
            //checkStatsEditor($(this));
        //});
        
        $(\'.comment_item .commentbox_delete_but\').live("click", function() {            
            deleteStudypostcomment($(this).parent().parent());
        })
        
        $(\'.view_morecomment a\').live("click", function() {
            //alert($(this).parent().find(".count_current_comment").html());
            
            loadStudyPostCommnets($(this).parent().parent().parent().parent().attr("rel"), $(this).parent().find(".count_current_comment").html())
        });
        
    });
    
    var scroll_enabled = false;
    var load_pos = 0;
    var load_num = 5;
    $(document).scroll(function(){		
	if(($(document).height()-$(window).height()-$(document).scrollTop()) < 500){
	    if (scroll_enabled) {
		scroll_enabled = false;
		//code
		console.log(\'Scrolled to bottom\');
		
                loadStudyPosts();		
	    }
	}
    });
    
</script>
'; ?>


<div class="outpage_box">
    <div class="row">
        <div class="facelike_main">
            
            <div id="facelike_col1">
                <div class="school-top-left-info">
                    <img src="<?php echo $this->_tpl_vars['school']['logo']; ?>
" />
                    <h1><?php echo $this->_tpl_vars['school']['name']; ?>
</h1>
                    <?php if ($this->_tpl_vars['school']['address'] && false): ?><p><label>Địa chỉ:</label> <?php echo $this->_tpl_vars['school']['address']; ?>
</p><?php endif; ?>
                    <?php if ($this->_tpl_vars['school']['phone'] && false): ?><p><label>Điện thoại:</label> <?php echo $this->_tpl_vars['school']['address']; ?>
</p><?php endif; ?>
                    <?php if ($this->_tpl_vars['school']['email'] && false): ?><p><label>Email:</label> <a href="mailto:<?php echo $this->_tpl_vars['school']['email']; ?>
"><?php echo $this->_tpl_vars['school']['email']; ?>
</a></p><?php endif; ?>
                    <?php if ($this->_tpl_vars['school']['website'] && false): ?><p><label>Website:</label> <?php echo $this->_tpl_vars['school']['website']; ?>
</p><?php endif; ?>
                </div>
                <div class="top_user_info" style="display: none">
                    <img class="avatar" src="<?php if ($this->_tpl_vars['pb_company']): ?><?php echo $this->_tpl_vars['pb_company']['image']; ?>
<?php else: ?> <?php if ($this->_tpl_vars['user_avatar']): ?> <?php echo $this->_tpl_vars['user_avatar']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['theme_img_path']; ?>
image/usericon.jpg  <?php endif; ?>  <?php endif; ?>" width="20" height="20" />
                    <h4><?php echo $this->_tpl_vars['pb_userinfo']['first_name']; ?>
 <?php echo $this->_tpl_vars['pb_userinfo']['last_name']; ?>
</h4>
                    <a style="padding-left: 0; margin-right: 10px" class="name" href="<?php if ($this->_tpl_vars['pb_company']): ?><?php echo smarty_function_the_url(array('module' => 'space','userid' => ($this->_tpl_vars['pb_company']['cache_spacename'])), $this);?>
<?php else: ?>redirect.php?url=/virtual-office/<?php endif; ?>">
                        Vào trang quản trị
                        
                    </a>
                </div>
                <br style="clear: both" />
                <div class="school_list" style="display: none">
                    <ul>
                        <li class="<?php if ($_GET['action'] == 'school'): ?>active<?php endif; ?>">
                            <a href="<?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'school','id' => ($this->_tpl_vars['pb_userinfo']['school_id'])), $this);?>
" title="<?php echo $this->_tpl_vars['pb_userinfo']['school_name']; ?>
">
                                <?php echo ((is_array($_tmp=$this->_tpl_vars['pb_userinfo']['school_name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 40) : smarty_modifier_truncate($_tmp, 40)); ?>

                                <div class="more-studybar">Thành viên: <?php echo $this->_tpl_vars['school']['member_count']; ?>
</div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div id="facelike_col2">
                <div class="col2-top">
                    <div class="col2-top-banner">
                        
                    </div>
                </div>
                <div class="col2-bottom">
                    <div class="col2-bottom-left">
                        <div class="facelike_content">
                            <div class="facelike_postform">
                                <form class="studypost_form" method="post" action="<?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'post'), $this);?>
">
                                    <?php echo smarty_function_formhash(array(), $this);?>

                                    <input type="hidden" name="studypost[school_id]" value="<?php echo $this->_tpl_vars['pb_userinfo']['school_id']; ?>
" />
                                    
                                    <div class="textarea-content">
                                        <div class="top-controls">
                                            <a href="javascript:void(0)" onclick="javascript:document.getElementById('imagefile').click();" class="add-image-button">Tải ảnh/video</a>
                                            <a href="javascript:void(0)" class="show-editor-button">Công cụ soạn thảo</a>
                                        </div>                             
                                        <textarea name="studypost[content]" style="width:100%" id="studypost-content">Đăng tải thông tin cho trường của bạn...</textarea>                                
                                    </div>
                                    
                                    <div class="bottom-control">
                                        <label class="word-count">Số từ: <span></span></label>
                                        <input type="button" value="Gửi bài" class="send-button" />
                                    </div>
                                </form>
                                
                                <div id="uploadImageVideo" style="margin-top: -595px;">
                                    <iframe style="display: none" id="insertFrame" name="insertFrame" ></iframe>
                                    <form method="POST" action="<?php echo $this->_tpl_vars['SiteUrl']; ?>
index.php?do=product&action=uploadEditorFile" name="insertPicForm" id="insertPicForm" target="insertFrame" enctype="multipart/form-data" onsubmit="return checkUploadEditorInput()">
                                            <input type="hidden" name="do" value="product" />
                                            <input type="hidden" name="action" value="uploadEditorFile" />
                                            <input type="hidden" name="tag" value="studypost_<?php echo $this->_tpl_vars['pb_userinfo']['username']; ?>
_" /> 
                                            <input style="visibility: hidden; position: absolute; top: -20000px" id="imagefile" type="file" name="uploadEditorFile" id="uploadEditorFile" onchange="$('#insertPicForm').submit()" />                                                    
                                    </form>
                                </div>
                                
                            </div>
                            <br style="clear: both" />
                            
                            <div id="studypost-main-content"></div>
                            <div id="studypost-bottom-line-content"></div>
                            
                            <div class="edit_studypost_form hide_editor" style="">
                                <form class="studypost_form" method="post" action="<?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'update'), $this);?>
">
                                    <?php echo smarty_function_formhash(array(), $this);?>

                                    <input type="hidden" name="studypost[school_id]" value="<?php echo $this->_tpl_vars['pb_userinfo']['school_id']; ?>
" />
                                    <input type="hidden" name="studypost[id]" value="" />
                                    
                                    <div class="textarea-content">
                                        <div class="top-controls">
                                            <a href="javascript:void(0)" onclick="javascript:document.getElementById('imagefile').click();" class="add-image-button">Tải ảnh/video</a>
                                            
                                            
                                            <a href="javascript:void(0)" class="show-editor-button">Công cụ soạn thảo</a>
                                        </div>                             
                                        <textarea name="studypost[content]" style="width:100%" id="edit-studypost-content">Đăng tải thông tin cho trường của bạn...</textarea>                                
                                    </div>
                                    
                                    <div class="bottom-control">
                                        <label class="word-count">Số từ: <span></span></label>
                                        
                                        <input type="button" value="Đóng" class="close-button" />
                                        <input type="button" value="Lưu lại" class="send-button" />
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col2-bottom-right">
                        <div class="school_list">
                            <ul>
                                <li class="<?php if ($_GET['action'] == 'school'): ?>active<?php endif; ?>">
                                    <a style="background-image:url('<?php echo $this->_tpl_vars['WebRootUrl']; ?>
/<?php echo $this->_tpl_vars['school']['logo']; ?>
')" href="<?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'school','id' => ($this->_tpl_vars['pb_userinfo']['school_id'])), $this);?>
" title="<?php echo $this->_tpl_vars['pb_userinfo']['school_name']; ?>
">
                                        <?php echo ((is_array($_tmp=$this->_tpl_vars['pb_userinfo']['school_name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 40) : smarty_modifier_truncate($_tmp, 40)); ?>

                                        <div class="more-studybar">Thành viên: <?php echo $this->_tpl_vars['school']['member_count']; ?>
</div>
                                    </a>
                                </li>
                                <?php $_from = $this->_tpl_vars['groups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level_group'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level_group']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['group_key'] => $this->_tpl_vars['group']):
        $this->_foreach['level_group']['iteration']++;
?>
                                    <li class="">
                                        <a href="http://localhost/marketonline/index.php?do=studypost&amp;action=school" title="<?php echo $this->_tpl_vars['group']['subject_name']; ?>
 <?php echo $this->_tpl_vars['group']['school_name']; ?>
">
                                            <?php echo $this->_tpl_vars['group']['subject_name']; ?>

                                            <div class="more-studybar">Thành viên: <?php echo $this->_tpl_vars['group']['member_count']; ?>
</div>
                                        </a>
                                    </li>
                                <?php endforeach; endif; unset($_from); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/footer_none.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>