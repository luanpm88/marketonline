        var ichatbox = new Array();
        
        function insertAtCaret(areaId,text) {
            var txtarea = document.getElementById(areaId);
            var scrollPos = txtarea.scrollTop;
            var strPos = 0;
            var br = ((txtarea.selectionStart || txtarea.selectionStart == '0') ? 
                "ff" : (document.selection ? "ie" : false ) );
            if (br == "ie") { 
                txtarea.focus();
                var range = document.selection.createRange();
                range.moveStart ('character', -txtarea.value.length);
                strPos = range.text.length;
            }
            else if (br == "ff") strPos = txtarea.selectionStart;
        
            var front = (txtarea.value).substring(0,strPos);  
            var back = (txtarea.value).substring(strPos,txtarea.value.length); 
            txtarea.value=front+text+back;
            strPos = strPos + text.length;
            if (br == "ie") { 
                txtarea.focus();
                var range = document.selection.createRange();
                range.moveStart ('character', -txtarea.value.length);
                range.moveStart ('character', strPos);
                range.moveEnd ('character', 0);
                range.select();
            }
            else if (br == "ff") {
                txtarea.selectionStart = strPos;
                txtarea.selectionEnd = strPos;
                txtarea.focus();
            }
            txtarea.scrollTop = scrollPos;
        }
        
        function insertChatImage(image, box) {
            $('#chat-frame #chat-box-'+box+' textarea').val("<div class='ajax-loader'>Đang tải ảnh...</div>");
            postChatNew(box, image);
        }
        
        
        var updateChatboxNew_xhr;
        function updateChatboxNew()
        {
            if(updateChatboxNew_xhr && updateChatboxNew_xhr.readystate != 4){
                updateChatboxNew_xhr.abort();
            }
            updateChatboxNew_xhr = $.ajax({
                url: ROOT_URL+"index.php?do=product&action=updateChatboxNew",
            }).done(function ( data ) {
                //alert(data);
                var arr = jQuery.parseJSON(data);
                $(arr).each(function(index,value) {
                    //alert(value.id);
                    if ($('#chat-box-'+value).length>0) {
                        if ($('#chat-box-'+value).hasClass('hidden')) {
                            getChatboxNew(value, true);
                        }
                        else
                        {
                            getChatboxNew(value, false);		       
                        }
                    }
                    else
                    {
                        getChatboxNew(value, true);
                    }
                });
            });
        }
        
        function postChatNew(id, content, hash)
        {	
            if ($.trim(content) == "") {
                $('#chat-frame #chat-box-'+id+' textarea').val("");
                return;
            }
            
            //remove notification
            $('#chat-frame #chat-box-'+id+' .notification').html('');
            
            $('#chat-frame #chat-box-'+id).addClass("chatloading");	
            
            $('#chat-frame #chat-box-'+id+' .chat-list ul').append('<li class="me temp" rel="'+$('#chat-frame #chat-box-'+id+' .chat-list ul li:last-child').attr("rel")+'" class="me">'+
                                                                    '<span class="glyphicon glyphicon-refresh avatar chat-ava-load"></span>'+
                                                                    $('#chat-frame #chat-box-'+id+' textarea').val()+
                                                                '<span class="status">đang gửi...</span></li>');
            
            $('#chat-frame #chat-box-'+id+' .chat-list ul li.temp').emotions({
                handle: "a#toggle",
                css: null //Note: don't put comma (,) after the last property
            });
            
            $('#chat-frame #chat-box-'+id+' textarea').val("");
            $('#chat-frame #chat-box-'+id+' .chat-list').scrollTop($('#chat-frame #chat-box-'+id+' .chat-content').prop("scrollHeight"));
            
                            $.ajax({
                                type: "POST",
                                url: ROOT_URL+"index.php?do=product&action=postChatNew",
                                encoding: "UTF-8",
                                data: "data[content]="+encodeURIComponent(content)+"&formhash="+hash+"&data[id]="+id
                            }).done(function ( data ) {
                                if( console && console.log ) {
                                    $('#chat-frame #chat-box-'+id).removeClass("chatloading");
                                }
                            });
        }
    
    
        function removeChatboxNew(uid)
        {
            $.ajax({
                url: ROOT_URL+"index.php?do=product&action=removeChatboxNew&id="+uid,
            }).done(function ( data ) {
                clearInterval(ichatbox[uid]);
            });
        }
    
        var updateChatsNew_xhr;
        function updateChatsNew()
        {
            //get current chatboxs
            var ids = '';
            $('#chat-frame .chat-box').each(function(){
                
                var last = 0;
                if ($(this).find('.chat-content .chat-list ul li').length > 1) {
                    if($(this).find('.chat-content .chat-list ul li[read=0]').length) {
                      last = $(this).find('.chat-content .chat-list ul li[read=0]').first().attr("rel");
                    }
                    else {
                      last = parseInt($(this).find('.chat-content .chat-list ul li').last().attr("rel"))+1;
                    }
                }
                
                ids += $(this).attr('rel')+"_"+last+",";
                
            });
            
            var typing = '';	
            if ($(':focus').hasClass('post-content') && $(':focus').val().trim() != '' ) {
                typing = '&typing='+$(':focus').parent().parent().attr("rel");
            }
            
            if(updateChatsNew_xhr && updateChatsNew_xhr.readystate != 4){
                updateChatsNew_xhr.abort();
            }
            
            //if(!updateChatsNew_xhr || updateChatsNew_xhr.readyState == 4){
                
                updateChatsNew_xhr = $.ajax({
                    url: ROOT_URL+"index.php?do=product&action=ajaxUpdateChatsNew&ids="+ids+typing,
                }).done(function ( data ) {
                    if( console && console.log ) {
                        //remove temp item
                        
                        $('#chat-frame .chat-box .chat-list ul li.chatloading').remove();
                        
                        //update chats
                        var datajson = JSON.parse(data);
                        $.each(datajson, function(i, items){
                            //Update each chatbox
                            var element = null;
                            for (var j = items.data.length-1; j >= 0; j--) {
                                element = items.data[j];
                                //update each chat line			
                                updateChatsById(i, element);			
                                
                            }
                            
                            //check if viewed
                            var last_line = $('#chat-frame #chat-box-'+i+' .chat-list ul li').last();
                            if (last_line.hasClass("me") && last_line.attr("read") == '1') {
                                if(items.data.length) $('#chat-frame #chat-box-'+i+' .notification').html(items.data[0].viewed_notice);
                            }
                            else
                            {
                                $('#chat-frame #chat-box-'+i+' .notification').html('');
                            }
                            
                            $('#chat-frame #chat-box-'+i+' .chat-list ul li .emotion').emotions({
                                handle: "a#toggle",
                                css: null //Note: don't put comma (,) after the last property
                            });
                            
                            if (items.typing) {
                                var nneeww = $('#chat-frame #chat-box-'+i+' .typing').css("display") == "none";
                                $('#chat-frame #chat-box-'+i+' .typing').show();
                                if(nneeww) $('#chat-frame #chat-box-'+i+' .chat-content').scrollTop($('#chat-frame #chat-box-'+i+' .chat-content').prop("scrollHeight")+66);
                            }
                            else
                            {
                                $('#chat-frame #chat-box-'+i+' .typing').hide();
                            }
                            
                            //updateReadChat(i);
                        });
                        
                        //check for unread message
                        checkChatboxUnread();		
                        
                    }
                });
            //}
        }
    
        var chat_interval;
        function getChatboxNew(uid, hide)
        {
            //show hide chatbox when exsit
            if ($('#chat-box-'+uid).length>0) {
                //alert("exists");
                if (hide) {
                    hideChatbox(uid);
                }
                else
                {
                    showChatbox(uid);
                }
                return;
            }
            
            //Load new chatbox
            $.ajax({
                url: ROOT_URL+"index.php?do=product&action=getChatboxNew&id="+uid,
            }).done(function ( data ) {
                if( console && console.log && $('#chat-box-'+uid).length<1 ) {
                    //alert(data);
                    
                    $('#chat-frame').prepend(data);
                    $('#chat-frame #chat-box-'+uid+' .chat-content').scrollTop($('#chat-frame #chat-box-'+uid+' .chat-content').prop("scrollHeight"));
                    
                    // Chat box functions
                    $('#chat-frame #chat-box-'+uid+' .chat-title').click(function() {
                       
                        
                        $(this).parent().find(".chat-content").toggle();
                        $(this).parent().find(".chat-form").toggle();
                        
                        //Title click
                        if ($(this).parent().hasClass("hidden")) {
                            $(this).parent().removeClass("hidden");			
                            updateReadChat(uid);
                            $('#chat-frame #chat-box-'+uid+' .chat-content').scrollTop($('#chat-frame #chat-box-'+uid+' .chat-content').prop("scrollHeight"));
                            
                        }
                        else
                        {
                            $(this).parent().addClass("hidden");
                        }
                        
                        //***checkChatboxUnread();
                        //$(this).parent().find(".chat-form textarea").focus();
                    });
                    
                    $('#chat-frame #chat-box-'+uid+' .chat-title h2 a').click(function() {
                            if (!$(this).parent().parent().parent().hasClass("hidden"))
                            {				
                                    window.location = $(this).attr("rel");
                            }
                    });
                    
                    //close chatbox
                    $('#chat-frame #chat-box-'+uid+' .chat-title span.chat-close-but').click(function(){
                        $(this).parent().parent().parent().remove();
                        removeChatboxNew(uid);	
                    });
                    
                    //post chat
                    $('#chat-frame #chat-box-'+uid+' .post-content').keydown(function(event) {
                        if (event.keyCode == 13) {
                            event.preventDefault();
                            
                            postChatNew(uid, $(this).val());
                            
                            $('#chat-frame #chat-box-'+uid+' .chat-content').scrollTop($('#chat-frame #chat-box-'+uid+' .chat-content').prop("scrollHeight"));
                            
                            $('#chat-frame #chat-box-'+uid+' .emotion-box').hide();
                        }
                    });
                    $('#chat-frame #chat-box-'+uid+' .post-content').focus(function() {
                        $('#chat-frame #chat-box-'+uid+' .emotion-box').hide();
                        updateReadChat(uid);
                    });
                    
                    //refresh new post
                    clearInterval(chat_interval);
                    chat_interval = setInterval("updateChatsNew()", 5000);
                    
                    //hide chatbox
                    if (hide) {
                        hideChatbox(uid);
                    }
                    
                    
                    //set read chats
                    if(!$('#chat-frame #chat-box-'+uid).hasClass("hidden"))
                    {
                        updateReadChat(uid);
                    }
                    
                    
                    //check chatbox status
                    //***checkChatboxUnread();
                    
                    //focus
                    //$('#chat-frame #chat-box-'+uid+' .post-content').focus();
                    
                    $('#chat-frame #chat-box-'+uid+' .emotion-box').emotions({
                        handle: "a#toggle",
                        css: null //Note: don't put comma (,) after the last property
                    });
                    
                    $('#chat-frame #chat-box-'+uid+' .emotion-box-but').click(function(){
                        $('#chat-frame #chat-box-'+uid+' .emotion-box').toggle();
                    });
                    $('#chat-frame #chat-box-'+uid+' .emotion-box span img').click(function() {
                        insertAtCaret("chatboxarea"+uid,' '+decodeURIComponent(unescape($(this).attr("rel"))).replace('&lt;','<').replace('&gt;', '>').replace('&amp;', '&')+' ');
                    });		
                    $('#chat-frame #chat-box-'+uid+' .chat-form textarea').click(function(){
                        $('#chat-frame #chat-box-'+uid+' .emotion-box').hide();
                    });
                    
                    $('#chat-frame #chat-box-'+uid+' .chatimage-box-but').click(function(){
                        $('#uploadChatImage input[name=chatbox_id]').val(uid);
                        $('#uploadChatImage_but').trigger("click");
                    });
                }
            });
        }
        
        
        
        
        
        
        
        function updateChatsById(uid, item)
        {
            if ($('#chat-frame #chat-box-'+uid+' .chat-list ul li[chat-id='+item.id+']').length) {
                //update esxit line
                var line = $('#chat-frame #chat-box-'+uid+' .chat-list ul li[chat-id='+item.id+']');
                
                //update read
                if (line.attr("read") == '0' && item.read == '1') {
                    line.attr("read", item.read);
                    
                }
                
            }
            else
            {
                $('#chat-frame #chat-box-'+uid+' .chat-list ul li.temp').remove();
                //render chat line if not exsit
                $('#chat-frame #chat-box-'+uid+' .chat-list ul').append(renderChatLine(item));
                //$('li[chat-id="'+item.id+'"] .chatimage_thumb').fancybox();
                //scroll to bottom
                $('#chat-frame #chat-box-'+uid+' .chat-content').scrollTop($('#chat-frame #chat-box-'+uid+' .chat-content').prop("scrollHeight"));
            }
        }
    
        function renderChatLine(item)
        {
            var result = '<li class="'+item.me+'" rel="'+item.created_or+'" chat-id="'+item.id+'" read="'+item.read+'">'
                                +'<span class="datetimec">'+item.created+'</span>'
                                +'<img width="40" height="40" src="'+item.company_logo+'" class="avatar">'
                                +'<span class="emotion">'+item.content.replace(/\\/g, '')+'</span></li>';
            
            return result;
        }
    
        function updateChats()
        {
            //get current chatboxs
            var ids = '';
            $('#chat-frame .chat-box').each(function(){
                ids += $(this).attr('rel')+"_"+$(this).attr('member-type')+",";
            });	
            
            $.ajax({
                url: ROOT_URL+"index.php?do=product&action=ajaxUpdateChats&ids="+ids,
            }).done(function ( data ) {
                if( console && console.log ) {
                    //remove temp item
                    
                    $('#chat-frame .chat-box .chat-list ul li.chatloading').remove();
                    
                    //update chats
                    var datajson = JSON.parse(data);
                    $.each(datajson, function(i, items){
                        //Update each chatbox
                        var element = null;
                        for (var j = items.length-1; j >= 0; j--) {
                            element = items[j];
                            //update each chat line			
                            updateChatsById(i, element);			
                            
                        }
                        
                        //check if viewed
                        var last_line = $('#chat-frame #chat-box-'+i+' .chat-list ul li').last();
                        if (last_line.hasClass("me") && last_line.attr("read") == '1') {
                            $('#chat-frame #chat-box-'+i+' .notification').html(items[0].viewed_notice);
                        }
                        else
                        {
                            $('#chat-frame #chat-box-'+i+' .notification').html('');
                        }
                        
                        
                        
                        
                    });
                    
                    //check for unread message
                    checkChatboxUnread();
                }
            });
        }
    
        function updateReadTopChat()
        {
            //alert(id);
            var ids = '-1';
            $('#quick_message_content ul li[read=0]').each(function(){
                ids = ids+','+$(this).attr("chat-id");
                $(this).attr("read", 1);
            });
            //alert(ids);
            if(ids != '-1') setReadChat(ids);
            $('#messagehome .message_counter').remove();
        }
    
        
        function getTopChat() {
            //code
            $.ajax({
                    url: ROOT_URL+"index.php?do=product&action=getTopChatAnnounce",
            }).done(function ( data ) {
                    if( console && console.log ) {
                            $("#message_out").html(data);
                            
                            $('#quick_message_content').css("display","none");
                            $('#quick_message_content').css("visibility","visible");
                            $("#messagehome a.but").click(function(e){
                                    $('.over_air_box').css("display","none");
                                    $('#quick_message_content').toggle();
                                    e.stopPropagation();
                                    updateReadTopChat();
                                });
                            $("#messagehome .message_close").click(function(){
                                $('#quick_message_content').css("display","none");
                            });
    
                            $("#quick_message_content ul").scroll( function(){
                                var current = $("#quick_message_content ul li.loading").offset().top;
                                var min = $("#quick_message_content").offset().top+$("#quick_message_content").height();
                                if(min - current - 35 > 0 && chat_scroll) {
                                    chat_scroll = false;
                                    getTopChatScroll();
                                }
                            });
                    }
            });
        }
        
        function getTopChatScroll() {
            //code
            $.ajax({
                    url: ROOT_URL+"index.php?do=product&action=getTopChatAnnounce&page="+chat_page,
            }).done(function ( data ) {
                    if( console && console.log ) {
                        //$("#message_out").html(data);
                        $('#quick_message_content ul li.loading').before($("<div>").html(data).find('#quick_message_content ul').html());
                        $('#quick_message_content ul li.loading').eq(0).remove();
                        $('#quick_message_content ul li.no_sms').remove();
                        chat_scroll = true;
                        chat_page += 1;
                    }
            });
        }
    
    
        function checkChatboxUnread()
        {
            $('#chat-frame .chat-box').each(function() {
                if ($(this).hasClass("hidden") || !on_page) {
                    if($(this).find("ul li[read=0]").not("ul li.me").length)
                    {
                        $(this).addClass("unread");
                        $(this).find(".unread_count").remove();
                        $(this).prepend('<span class="unread_count">'+$(this).find("ul li[read=0]").not("ul li.me").length+'</span>');
                        
                        
                        //BOOONGGGGGGGGGGGGGGGGGGGGGGGGGG ===========  
                        //update boong from cookie
                        var cookiestring = '';
                        if (typeof($.cookie("cookiestring")) != 'undefined') {
                                cookiestring = $.cookie("cookiestring");
                        }
                        $(this).find("ul li[read=0]").not("ul li.me, ul li.boong").each(function(){
                            if(cookiestring.indexOf("["+$(this).attr("chat-id")+"]") >= 0)
                                $(this).addClass('boong');
                        });
                        
                        
                        
                        //play boong
                        if ($(this).find("ul li[read=0]").not("ul li.me, ul li.boong").length) {
                            var audioElement = document.createElement('audio');
                            audioElement.setAttribute('src', 'http://marketonline.vn/images/alert.mp3');
                            audioElement.play();
                            
                            $(this).find("ul li[read=0]").not("ul li.me, ul li.boong").addClass('boong');		
                            $(this).find("ul li[read=0].boong").each(function(){
                                //alert(cookiestring.indexOf("["+$(this).attr("chat-id")+"]"));
                                if(cookiestring.indexOf("["+$(this).attr("chat-id")+"]") <= 0)
                                    cookiestring += "["+$(this).attr("chat-id")+"]";
                            });
                            $.cookie("cookiestring", cookiestring);
                        }
                        //==========================
                        
                        
                        
                        
                    }
                    else
                    {
                        $(this).removeClass("unread");
                        $(this).find(".unread_count").remove();
                    }
                }
                else
                {
                    $(this).removeClass("unread");
                    $(this).find(".unread_count").remove();
                }
                $(this).find('ul li[read=1]').removeClass('boong');
                //$(this).find('.chat-list').scrollTop($(this).find('.chat-list')[0].scrollHeight);
            });
        }
    
        function updateReadChat(id)
        {
            if (!on_page) {
                return;
            }
            //alert(id);
            var ids = '-1';
            $('#chat-frame #chat-box-'+id+' .chat-list ul li[read=0]').not('#chat-frame #chat-box-'+id+' .chat-list ul li.me').each(function(){
                ids = ids+','+$(this).attr("chat-id");
                $(this).attr("read", 1);
            });
            //alert(ids);
            if(ids != '-1') setReadChat(ids);
        }
        
        function setReadChat(ids) {
            
            setTimeout(function() {
                $.ajax({
                    url: ROOT_URL+"index.php?do=product&action=setReadChat&id="+ids,
                }).done(function ( data ) {
                    //clearInterval(ichatbox[uid]);
                });
            }, 6000);
            
        }
    
        function hideChatbox(uid)
        {
            var item = $('#chat-frame #chat-box-'+uid);	
            item.find(".chat-content").css("display", "none");
            item.find(".chat-form").css("display", "none");
    
            //Title click
            item.addClass("hidden");
        }
        
        function showChatbox(uid)
        {
            var item = $('#chat-frame #chat-box-'+uid);	
            item.find(".chat-content").css("display", "block");
            item.find(".chat-form").css("display", "block");
    
            //Title click
            item.removeClass("hidden");
            updateReadChat(uid);
            //$('#chat-frame #chat-box-'+uid+' .chat-form textarea').focus();
        }
    
        
        function getNewChats(uid)
        {
            if (true) {
                chat_lock = 1;
            
                var dates = '';
                var seen = '';
                if ($('#chat-frame #chat-box-'+uid+' .chat-list ul li').not('#chat-frame #chat-box-'+uid+' .chat-list ul li.temp').length) {
                   dates = "&date="+$('#chat-frame #chat-box-'+uid+' .chat-list ul li:last-child').attr("rel");
                }
                
                var lastchat = $('#chat-frame #chat-box-'+uid+' .chat-list ul li').not('#chat-frame #chat-box-'+uid+' .chat-list ul li.temp').last();
                if(lastchat.hasClass('me'))
                {
                    if (lastchat.attr('read') == '0') {
                        seen = "&seen="+lastchat.attr("chat-id");
                        //$('#chat-frame #chat-box-'+uid+' .notification').html('wait for being seen');
                    }
                    else
                    {
                        //$('#chat-frame #chat-box-'+uid+' .notification').html('Đã xem');
                    }
                    
                }
                else
                {
                    $('#chat-frame #chat-box-'+uid+' .notification').html('');
                }
        
                $.ajax({
                    url: ROOT_URL+"index.php?do=product&action=getNewChats&id="+uid+dates+seen,
                }).done(function ( data ) {
                    if( console && console.log ) {
                        
                        $("<div>").html(data).find('.chat-list li').each(function(){
                            
                            $('#chat-frame #chat-box-'+uid+' .chat-list ul li.temp').remove();
                            
                            
                            if($('#chat-frame #chat-box-'+uid+' .chat-list ul li[box-id='+$(this).attr("box-id")+']').length == 0)
                            {
                                $('#chat-frame #chat-box-'+uid+' .chat-list ul').append($(this).clone());
                                $('#chat-frame #chat-box-'+uid+' .chat-content').scrollTop($('#chat-frame #chat-box-'+uid+' .chat-content').prop("scrollHeight"));
                                
                                
                                
                                //play sound
                                if (!$(this).hasClass("me") && $('#chat-frame #chat-box-'+uid).hasClass("hidden")) {
                                    //var audioElement = document.createElement('audio');
                                    //audioElement.setAttribute('src', 'http://marketonline.vn/images/alert.mp3');
                                    //audioElement.play();
                                }
                                
                            }
                        });
                        
                        if(!$('#chat-frame #chat-box-'+uid).hasClass("hidden"))
                        {
                            updateReadChat(uid);		    
                        }
                        
                        checkChatboxUnread();
                        
                        
                        //seen
                        if($("<div>").html(data).find('.seen-id').length)
                        {
                            var new_lastchat = $('#chat-frame #chat-box-'+uid+' .chat-list ul li').last();
                            var lastchat = $('#chat-frame #chat-box-'+uid+' .chat-list ul li[chat-id='+$("<div>").html(data).find('.seen-id').html()+']');
                            
                            //alert(lastchat.attr('chat-id'));
                            //alert(new_lastchat.attr('chat-id'));
                            
                            if (new_lastchat.attr('chat-id') == lastchat.attr('chat-id'))
                            {
                                lastchat.attr('read','1');
                                $('#chat-frame #chat-box-'+uid+' .notification').html($("<div>").html(data).find('.seen-content').html());
                                
                                //alert($("<div>").html(data).find('.seen-content').html());
                            }
                            else
                            {
                                $('#chat-frame #chat-box-'+uid+' .notification').html('');
                            }
                        }
                        
                        
                        //opoen lock
                        chat_lock = 0;
                    }
                    
                    
                });
                
            }
        }