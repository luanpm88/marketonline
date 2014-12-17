    $(document).ready(function() {
        $('body').on("click", ".post-box .edit-button", function() {
            var box = $(this).parents('.post-box');
            
            box.find('.content').toggle();
            box.find('.edit-box').toggle();
            
            if (!box.find('.mce-tinymce').length) {
                showEditor("editor-"+box.attr("rel"));
        }
        
        setInterval('cropping()',5000);
    });
        
    $(window).resize(function() {
        cropping();
        autoSidebarChatHeight();
    });
    
    
    $('body').on("click",".post-box a.view_more",function(){
        $(this).attr("rel-page",parseInt($(this).attr("rel-page"))+1);
        loadStudyPostComments($(this).attr("rel-id"), $(this).attr("rel-page"));
        $(this).removeClass("btn-primary");
    });
    $('body').on("keyup",".comment-edit-box textarea",function(){
        var box = $(this).parents(".comment-edit-box");
        checkCommentEditor(box);
    });
    $('body').on("click",".comment-edit-box .stars",function(){
        var box = $(this).parents(".comment-edit-box");
        checkCommentEditor(box);
    });
    $('body').on("click",".comment-edit-box .send-button.btn-primary",function() {
        $(this).parents("form").submit();
        $(this).removeClass("btn-primary");
    });
    
    $('body').on("mouseover",".postable .stars .star",function() {
        var box = $(this).parents(".stars");
        
        var prev_item = $(this);
        var next_item = $(this).next();
        
        while(prev_item.hasClass("item")) {
            prev_item.removeClass("glyphicon-star-empty");
            prev_item.addClass("glyphicon-star");
            
            prev_item = prev_item.prev();
        }
        
        while(next_item.hasClass("item")) {
            next_item.removeClass("glyphicon-star");
            next_item.addClass("glyphicon-star-empty");
            
            next_item = next_item.next();
        }
        
        box.find('.point').html($(this).attr("rel"));
    });
    
    $('body').on("click",".postable .stars .star",function() {
        var box = $(this).parents(".comment-edit-box");
        
        box.find('input[name="comment[star]"]').val($(this).attr("rel"));
    });
    
    $('body').on("mouseout",".postable .stars",function() {
        var box = $(this).parents(".comment-edit-box");
        var value = box.find('input[name="comment[star]"]').val();
        
        var item = box.find('.stars .star[rel='+value+']');
        
        var prev_item = item;
        var next_item = item.next();
        
        while(prev_item.hasClass("item")) {
            prev_item.removeClass("glyphicon-star-empty");
            prev_item.addClass("glyphicon-star");
            
            prev_item = prev_item.prev();
        }
        
        while(next_item.hasClass("item")) {
            next_item.removeClass("glyphicon-star");
            next_item.addClass("glyphicon-star-empty");
            
            next_item = next_item.next();
        }
        
        box.find('.point').html(value);
    });
    
    
    
    //clear inbox
    $('body').on("click",".top-mailbox-menu button",function(){
        clearInbox();
    });
    
    
    //
    $('body').on("click",".panel_view_all",function() {
        $(this).parent().parent().find('.list-group li').removeClass('hide');
        $(this).hide();
    });
    
    $('body').on("click",".chat-toggle",function() {
        if($(".chat_friend_list").hasClass("chat-hide")) {
            $(".chat_friend_list").removeClass("chat-hide");
        } else {
            $(".chat_friend_list").addClass("chat-hide");
        }
    });

});

function showEditor(name) {
        tinymce.init({
            selector: "."+name,
            language: "vi_VN",
            
            menubar: "",
            plugins: [
                "image,table,wordcount"
            ],
            toolbar: "table image | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link",
  
  
  
            content_css: ROOT_URL+"templates/default/modern/bootstrap/css/bootstrap.min.css,"+ROOT_URL+"templates/default/modern/css/custom_editor.css,"+ROOT_URL+"templates/default/modern/css/custom.css",
            relative_urls : false,
            remove_script_host : false,
            convert_urls : true,
            setup: function(editor) {
                //UPDATE TEXTAREA REAL TIME
                editor.on('keyup', function(e) {
                    $("#"+name).val(tinyMCE.get(name).getContent());
                    checkEditorInputLength(name);
                });
                editor.on('click', function(e) {
                    $("#"+name).val(tinyMCE.get(name).getContent());
                    checkEditorInputLength(name);
                });
                $('#'+main_editor+'_ifr').on('click', function(e) {
                    $("#"+name).val(tinyMCE.get(name).getContent());                    
                    checkEditorInputLength(name);
                });
                
                initAjaxForm(name);
            }
        
        });
        
        
}
function checkEditorInputLength(name) {
    var ok = true;
    var value = tinyMCE.get(name).getContent();
    
    var box = $("#"+name).parents(".post-box");
    
    if (value.replace(/<\/?[^>]+(>|$)/g, "").trim().split(" ").length < 2) {
        ok = false;
    }
    
    if (ok) {
        box.find('.send-button').addClass("btn-primary");
    } else {
        box.find('.send-button').removeClass("btn-primary");
    }
    
    return ok;
}

function initAjaxForm(name) {
    $('#'+name).parents('form').ajaxForm({
        beforeSend: function() {                
        },
        uploadProgress: function(event, position, total, percentComplete) {
        },
        complete: function(xhr) {
            if (xhr.responseText == "ok") {
                //getStudyposts();
                location.reload(); 
            }
        }
    });
    $('#'+name).parents('form').on("click", ".send-button.btn-primary", function() {
        $('#'+name).parents('form').submit();
        $('#'+name).parents('form').find('.send-button').removeClass("btn-primary");
    });
}

    function studyfriend(friendid, but) {
            $(but).addClass("friending");
            var temp = $(but).html();
            $(but).html("Đang xử lý...");
            $.ajax({
                    url: ROOT_URL+"index.php?do=studypost&action=ajaxFriend&friendid="+friendid,
            }).done(function ( data ) {
                    if( console && console.log ) {
                            //alert(data);
                            if(data == "1")
                            {
                                $(but).removeClass("friending");
                                $(but).addClass("friendpendding");
                                $(but).attr("title", "Hủy lời mời");
                                $(but).html("Đã gửi lời mời kết bạn");
                                $('.friend_menu_items').addClass("active");
                            }
                            else
                            {
                                $(but).removeClass("friending");
                                $(but).removeClass("friendpendding");
                                $(but).attr("title", "Kết bạn");
                                $(but).html("+ Kết bạn");
                                $('.friend_menu_items').removeClass("active");
                            }
                        }                        
            });
    }
    
    function loadStudyPostComments(studypost_id, page)
    {
        var v_page = "";
        if (typeof page != "undefined") {
            v_page = page;
        }
        
        $.ajax({   
            url: ROOT_URL+"index.php?do=studypost&action=ajaxStudypostComments&studypost_id="+studypost_id+"&page="+v_page,
            success: function(data){
                if(page==0) {
                    $('.post-box-'+studypost_id+' .comment-container').html(data);
                    $('.sudypostcomment_form').ajaxForm({
                        beforeSend: function() {                
                        },
                        uploadProgress: function(event, position, total, percentComplete) {
                        },
                        complete: function(xhr) {
                            if (xhr.responseText=="not_logging") {
                                alert("Lỗi! Bạn chưa đăng nhập!");
                            } else {
                                loadStudyPostComments(xhr.responseText,0);
                            }                            
                        }
                    });
                } else {
                    $('.post-box-'+studypost_id+' .comment-container .list-group').append($("<div>").html(data).find('.list-group').html());
                    $('.post-box-'+studypost_id+' a.view_more').addClass("btn-primary");
                    if (!$("<div>").html(data).find('.view_more').length) {
                        $('.post-box-'+studypost_id+' a.view_more').remove();
                    }
                }
                renderStars(".point_rate");
                
                cropping();
            }   
        });  
    }
    
    function renderStars(name) {
        $(name).each(function() {
            var html = '<div class="stars">'
            var num = parseInt($(this).attr("rel"));
            var value = num;
            var class_name = "glyphicon-star";
            
            if ($(this).hasClass("postable")) {
                html += '<span rel="" class="star star-cancel glyphicon glyphicon-remove-sign"></span>';
                class_name = "glyphicon-star-empty";
                value = "";
            }
            
            for(var i=0;i<num;i++) {
                html += '<span rel="'+(i+1)+'" class="star item glyphicon '+class_name+'"></span>';
            }
            
            html += ' <span class="point badge">'+value+'</span></div>';
            
            $(this).html(html);
        });            
    }
    
    function checkWordCount(value, count) {
        if (value.replace(/<\/?[^>]+(>|$)/g, "").trim().split(" ").length < count) {
            return false;
        } else {
            return true;
        }
    }
    
    function deleteStudypostcomment(id,box_id)
    {
        $.ajax({   
            url: ROOT_URL+"index.php?do=studypost&action=deleteComment&id="+id,
            success: function(data){
                loadStudyPostComments(box_id,0);
            }
        });
    }
    
    function checkCommentEditor(box) {
        var value = box.find('textarea').val();
        if (checkWordCount(value, 2) || box.find('input[name="comment[star]"]').val() != '') {
            box.find('.send-button').addClass("btn-primary");
        } else {
            box.find('.send-button').removeClass("btn-primary");
        }
    }
    
    function cropping() {
        $('.imges-size-1 a').each(function() {
            var scale = 13/18;
            $(this).css('height',$(this).width()*scale);
            
            $(this).css('background-image','url('+$(this).attr("href")+')');
            if($(this).find('img').width()*scale < $(this).find('img').height()) {
              $(this).css('background-size',$(this).width()+'px auto');
            } else {
              $(this).css('background-size','auto '+$(this).height()+'px');
            }
            $(this).css('background-repeat','no-repeat');
            $(this).css('background-position','center center');
        });
        
        $('.imges-size-2 a').each(function() {
            var scale = 18/13;
            
            $(this).css('height',$(this).width()*scale);
            
            $(this).css('background-image','url('+$(this).attr("href")+')');
            if($(this).find('img').width()*scale < $(this).find('img').height()) {
              $(this).css('background-size',$(this).width()+'px auto');
            } else {
              $(this).css('background-size','auto '+$(this).height()+'px');
            }
            $(this).css('background-repeat','no-repeat');
            $(this).css('background-position','center center');
        });
        
        $('.imges-size-3 a').each(function() {
            var scale = 1;
            $(this).css('height',$(this).width()*scale);
            
            $(this).css('background-image','url('+$(this).attr("href")+')');
            if($(this).find('img').width()*scale < $(this).find('img').height()) {
              $(this).css('background-size',$(this).width()+'px auto');
            } else {
              $(this).css('background-size','auto '+$(this).height()+'px');
            }
            $(this).css('background-repeat','no-repeat');
            $(this).css('background-position','center center');
        });
        
        $('.banner-right-19_6.img-cropping').each(function() {
            var scale = 9/16;
            $(this).css('height',$(this).width()*scale);
            
            $(this).css('background-image','url('+$(this).attr("bg-data")+')');
            if($(this).find('img').width()*scale < $(this).find('img').height()) {
              $(this).css('background-size',$(this).width()+'px auto');
            } else {
              $(this).css('background-size','auto '+$(this).height()+'px');
            }
            $(this).css('background-repeat','no-repeat');
            $(this).css('background-position','center center');
        });
    }
    
    function clearInbox() {
		//code
		$.ajax({
			url: ROOT_URL+"index.php?do=product&action=ajaxClearInbox",
		}).done(function ( data ) {
			if( console && console.log ) {
				
			}
		});
    }
    
    var getChatList_xhr;
    function getChatList(id) {	    
        
        
        if(getChatList_xhr && getChatList_xhr.readystate != 4){
            getChatList_xhr.abort();
        }
        getChatList_xhr = $.ajax({
            url: ROOT_URL+"index.php?do=studypost&action=ajaxChatList&id="+id			
        }).done(function ( data ) {
            if( console && console.log ) {
                
                $('.chat_friend_list').html(data);
                //alert(data);
                autoSidebarChatHeight();
            }
        });
    }
    
    function autoSidebarChatHeight() {
        $('.chat-sidebar-content').css("max-height",$(window).height()-150);
    }
    
    
    
    