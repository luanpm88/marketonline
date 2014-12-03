    var main_editor_box;
    var main_editor;
    var main_textarea;
    var main_editor_form;
    function loadMainEditor() {
        main_editor_box = $('#main-editor').parents('.main-text-editor');        
        main_textarea = $('#main-editor');
        main_editor = 'main-editor';
        main_editor_form = $('#main_editor_form');
        
        tinymce.init({
            selector: "#"+main_editor,
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
               
                //ON INIT
                editor.on('init', function(e) {
                    //TOGGLE PLACEHOLDER
                    hideMainEditor();
                });               
                
                //SHOW CONTROLS FOR MAIN FORM
                editor.on('focus', function(e) {
                    main_editor_box.removeClass('hide-control');
                });
                editor.on('click', function(e) {
                    main_editor_box.removeClass('hide-control');
                });
                //UPDATE TEXTAREA REAL TIME
                editor.on('keyup', function(e) {
                    main_textarea.val(tinyMCE.get(main_editor).getContent());                    
                    checkMainEditorInputLength();
                });
                editor.on('click', function(e) {
                    main_textarea.val(tinyMCE.get(main_editor).getContent());                    
                    checkMainEditorInputLength();
                });
                $('#'+main_editor+'_ifr').on('click', function(e) {
                    main_textarea.val(tinyMCE.get(main_editor).getContent());                    
                    checkMainEditorInputLength();
                });
              
                //WHEN HIDE CONTROLS AND PLACEHOLDER FOR MAIN FORM
                $("body").on("click", ".page", function (e)
                {
                    if (!main_editor_form.is(e.target) // if the target of the click isn't the container...
                        && main_editor_form.has(e.target).length === 0) // ... nor a descendant of the container
                    {                        
                        //TOGGLE PLACEHOLDER
                        hideMainEditor();
                    }
                });
              
          }
        
        });
        
        $('#main_editor_form').ajaxForm({
            beforeSend: function() {                
                //TOGGLE PLACEHOLDER
                hideMainEditor();
            },
            uploadProgress: function(event, position, total, percentComplete) {
                
            },
            complete: function(xhr) {
                if (xhr.responseText == "ok") {
                    getStudyposts();
                    tinyMCE.get('main-editor').setContent("");
                    main_textarea.val(tinyMCE.get('main-editor').getContent());
                    
                    //TOGGLE PLACEHOLDER
                    hideMainEditor();
                    
                    if ($('.uploader-box').hasClass("active")) {
                        resetUploadForm();
                        $('.uploader-box textarea').val("");
                    }
                } else {
                    alert(xhr.responseText);
                }
            }
        });
        main_editor_form.on("click", ".send-button.btn-primary", function() {
            main_editor_form.submit();            
        });
            
        
        
        'use strict';
        // Change this to the location of your server-side upload handler:
        var url = ROOT_URL+'uploader/server/php/';
            uploadButton = $('<button/>')
                .addClass('btn btn-primary')
                .prop('disabled', true)
                .text('Processing...')
                .on('click', function () {
                    var $this = $(this),
                        data = $this.data();
                    $this
                        .off('click')
                        .text('Abort')
                        .on('click', function () {
                            $this.remove();
                            data.abort();
                        });
                    data.submit().always(function () {
                        $this.remove();
                    });
                });
        $('#fileupload').fileupload({
            url: url,
            dataType: 'json',
            autoUpload: false,
            acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
            maxFileSize: 5000000, // 5 MB
            // Enable image resizing, except for Android and Opera,
            // which actually support image resizing, but fail to
            // send Blob objects via XHR requests:
            disableImageResize: /Android(?!.*Chrome)|Opera/
                .test(window.navigator.userAgent),
            previewMaxWidth: 100,
            previewMaxHeight: 100,
            previewCrop: true
        }).on('fileuploadadd', function (e, data) {
            data.context = $('<div/>').appendTo('#files');
            $.each(data.files, function (index, file) {
                var node = $('<p/>')
                        .append($('<span/>').text(file.name));
                if (!index) {
                    node
                        .append('<br>')
                        .append(uploadButton.clone(true).data(data));
                }
                node.appendTo(data.context);
                node.find('button').trigger("click");
                checkUploadFiles();
            });
        }).on('fileuploadprocessalways', function (e, data) {
            var index = data.index,
                file = data.files[index],
                node = $(data.context.children()[index]);
            if (file.preview) {
                node
                    .prepend('<br>')
                    .prepend(file.preview);
            }
            if (file.error) {
                node
                    .append('<br>')
                    .append($('<span class="text-danger"/>').text(file.error));
            }
            if (index + 1 === data.files.length) {
                data.context.find('button')
                    .text('Upload')
                    .prop('disabled', !!data.files.error);
            }
        }).on('fileuploadprogressall', function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        }).on('fileuploaddone', function (e, data) {
            $.each(data.result.files, function (index, file) {
                if (file.url) {
                    var link = $('<a>')
                        .attr('target', '_blank')
                        .prop('href', file.url);
                    $(data.context.children()[index])
                        .wrap(link);
                    
                    $(data.context.children()[index]).parent().append('<a class="btn btn-default remove-pic">Xóa</a>');
                    $('#main_editor_form').prepend('<input type="hidden" name="post_files[]" value="'+file.url+'" />');
                    
                } else if (file.error) {
                    var error = $('<span class="text-danger"/>').text(file.error);
                    $(data.context.children()[index])
                        .append('<br>')
                        .append(error);
                }
                console.log(data);
            });
        }).on('fileuploadfail', function (e, data) {
            $.each(data.files, function (index) {
                var error = $('<span class="text-danger"/>').text('File upload failed.');
                $(data.context.children()[index])
                    .append('<br>')
                    .append(error);
            });
        }).prop('disabled', !$.support.fileInput)
            .parent().addClass($.support.fileInput ? undefined : 'disabled');
    
            
        $('body').on("click",".nav-pills > li",function() {
            $(".nav-pills > li").removeClass("active");
            $(".form-tab").removeClass("active");
            
            $(this).addClass("active");
            $("."+$(this).attr("rel")).addClass("active");
            
            $('input[name=post_type]').val($(this).attr("type-name"));
        });
        
        
        $('body').on("click",".uploader-box .upload-button.btn-primary",function() {
            $('#main_editor_form').submit();
            $(this).removeClass("btn-primary");
        });
        
        $('body').on("click",".remove-pic",function() {
            $('input[value="'+ $(this).parent().find('a').attr("href")+'"]').remove();
            $(this).parent().remove();
            checkUploadFiles();
        });
    }
    
    function checkMainEditorInputLength() {
        var ok = true;
        var value = tinyMCE.get(main_editor).getContent();
        
        if (value.replace(/<\/?[^>]+(>|$)/g, "").trim().split(" ").length < 2) {
            ok = false;
        }
        
        if (ok) {
            main_editor_box.find('.send-button').addClass("btn-primary");
        } else {
            main_editor_box.find('.send-button').removeClass("btn-primary");
        }
        
        return ok;
    }
    
    function hideMainEditor() {
        //HIDE CONTROLS
        main_editor_box.addClass('hide-control');
                        
        if(tinyMCE.get(main_editor).getContent() != "") {
            main_editor_box.find('.placeholder').hide();
        } else {
            main_editor_box.find('.placeholder').show();
        }
    }
    
    function checkUploadFiles() {
        if($('#files div').length > 0 && $('#files div').length < 4) {
            $('.uploader-box .upload-button').addClass("btn-primary");
        } else {
            $('.uploader-box .upload-button').removeClass("btn-primary");
        }
        
        if($('#files div').length > 2) {
            $('.upload-controls').hide();
        } else {
            $('.upload-controls').show();
        }
    }
    
    function resetUploadForm() {
        $('.progress-bar').css("width","0%");
        $('#files').html("");
        $('#main_editor_form input[name="post_files[]"]').remove();        
        checkUploadFiles();
    }