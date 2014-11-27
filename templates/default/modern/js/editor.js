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
                    
                    if (checkInputLength(tinyMCE.get(main_editor).getContent())) {
                        main_editor_box.find('.send-button').addClass("btn-primary");
                    } else {
                        main_editor_box.find('.send-button').removeClass("btn-primary");
                    }
                });
                editor.on('click', function(e) {
                    main_textarea.val(tinyMCE.get(main_editor).getContent());
                    
                    if (checkInputLength(tinyMCE.get(main_editor).getContent())) {
                        main_editor_box.find('.send-button').addClass("btn-primary");
                    } else {
                        main_editor_box.find('.send-button').removeClass("btn-primary");
                    }
                });
              
                //WHEN HIDE CONTROLS AND PLACEHOLDER FOR MAIN FORM
                $(document).mouseup(function (e)
                {
                    if (!main_editor_box.find('.mce-flow-layout-item').is(e.target)
                        && !main_editor_box.is(e.target) // if the target of the click isn't the container...
                        && main_editor_box.has(e.target).length === 0) // ... nor a descendant of the container
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
                }
            }
        });
        main_editor_form.on("click", ".send-button.btn-primary", function() {
            main_editor_form.submit();
        });
            
        
    }
    
    function checkInputLength(value) {
        var ok = true;

        if (value.replace(/<\/?[^>]+(>|$)/g, "").trim().split(" ").length < 10) {
            ok = false;
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