$(document).ready(function() {
    $('body').on("click", ".post-box .edit-button", function() {
        var box = $(this).parents('.post-box');
        
        box.find('.content').toggle();
        box.find('.edit-box').toggle();
        
        if (!box.find('.mce-tinymce').length) {
            alert("ssss");
            showEditor("editor-"+box.attr("rel"));
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
                getStudyposts();
            }
        }
    });
    $('#'+name).parents('form').on("click", ".send-button.btn-primary", function() {
        $('#'+name).parents('form').submit();
        $('#'+name).parents('form').find('.send-button').removeClass("btn-primary");
    });
}