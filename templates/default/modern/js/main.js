$(document).ready(function() {
    $('body').on("click", ".post-box .edit-button", function() {
        var box = $(this).parents('.post-box');
        
        box.find('.content').toggle();
        box.find('.edit-box').toggle();
        
        if (!box.find('.mce-tinymce').length) {
            showEditor("editor-"+box.attr("rel"));
        }
    });
    
    
    $('body').on("click",".post-box a.view_more",function(){
        $(this).attr("rel-page",parseInt($(this).attr("rel-page"))+1);
        loadStudyPostCommnets($(this).attr("rel-id"), $(this).attr("rel-page"));
        
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
  
  
  
            content_css: ROOT_URL+"templates/default/modern/bootstrap/css/bootstrap.min.css,"+ROOT_URL+"templates/default/modern/css/custom_editor.css",
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
    
    if (value.replace(/<\/?[^>]+(>|$)/g, "").trim().split(" ").length < 10) {
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
    
    function loadStudyPostCommnets(studypost_id, page)
    {
        var v_page = "";
        if (typeof page != "undefined") {
            v_page = page;
        }
        
        $.ajax({   
            url: ROOT_URL+"index.php?do=studypost&action=ajaxStudypostComments&studypost_id="+studypost_id+"&page="+v_page,
            success: function(data){
                if(!page) {
                    $('.post-box-'+studypost_id+' .panel-footer').html(data);
                } else {
                    $('.post-box-'+studypost_id+' .panel-footer .list-group').append($("<div>").html(data).find('.list-group').html());
                    
                    if (!$("<div>").html(data).find('.view_more').length) {
                        $('.post-box-'+studypost_id+' a.view_more').remove();
                    }
                }
            }   
        });  
    }