    function autoAjustVerytopmenu() {
	//move verytopmenu with small screen
        if(1200 > $(window).width()) {
            $('#verytopmenu').css("margin-left", -$(window).scrollLeft());
        }
        else
        {
            $('#verytopmenu').css("margin-left", ($(window).width() - 1200)/2);
        }
    }
    
    function isValidEmailAddress(emailAddress) {
	var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
	return pattern.test(emailAddress);
    };

    function loadViewedHistory()
    {
	$.ajax({
	    url: "index.php?do=product&action=viewedList",
	}).done(function ( data ) {
	    if( console && console.log ) {
		$('#history-list-frame .content .history-list').html(data);
		if (!$(data).find("li").length) {
		    $('#history-list-frame').css("display","none");
		}
		if ($(data).find("li").length <13) {
		    $('#history-list-frame .content span.nav').remove();
		}
		//
		$('#history-list-frame .content .history-list ul li a img').resizecrop({
			width:80,
			height:80		   
		});
		
		$('#history-list-frame .content span.next').click( function(event) {
		    var lineheight = $('#history-list-frame .content .history-list ul li:first-child').height()+20;
		    var linenum = $('#history-list-frame .content .history-list ul li').length/12;
		    var pos = parseInt($('#history-list-frame .content .history-list ul').css("margin-top"));
		    
		    if (pos > -(lineheight*(linenum-1))) {
			$('#history-list-frame .content .history-list ul').css("margin-top", (pos-(lineheight))+"px");			
			$('#history-list-frame .content span.prev').removeClass("hide");
		    }
		    
		    var newp = parseInt($('#history-list-frame .content .history-list ul').css("margin-top"));
		    if (newp <= -(lineheight*(linenum-1))) {
			if (!$(this).hasClass("hide")) {
			    $(this).addClass("hide")
			}
		    }
		    event.stopPropagation();
		});
		$('#history-list-frame .content span.prev').click( function(event) {
		    var lineheight = $('#history-list-frame .content .history-list ul li:first-child').height()+20;
		    var linenum = $('#history-list-frame .content .history-list ul li').length/12;
		    var pos = parseInt($('#history-list-frame .content .history-list ul').css("margin-top"));

		    if (pos <= -106) {
			$('#history-list-frame .content .history-list ul').css("margin-top", (pos+(lineheight))+"px");			
			$('#history-list-frame .content span.next').removeClass("hide");
		    }
		    else
		    {
			
		    }
		    
		    var newp = parseInt($('#history-list-frame .content .history-list ul').css("margin-top"));
		    if (newp > -106) {
			if (!$(this).hasClass("hide")) {
			    $(this).addClass("hide")
			}
		    }
		    event.stopPropagation();
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
	    //scroll to bottom
	    $('#chat-frame #chat-box-'+uid+' .chat-list').scrollTop($('#chat-frame #chat-box-'+uid+' .chat-list')[0].scrollHeight);
	}
    }
    
    function renderChatLine(item)
    {
	var result = '<li class="'+item.me+'" rel="'+item.created_or+'" chat-id="'+item.id+'" read="'+item.read+'">'
                            +'<span class="datetimec">'+item.created+'</span>'
                            +'<img width="40" height="40" src="'+item.company_logo+'" class="avatar">'
                            +item.content+'</li>';
	
	return result;
    }
    
    function updateChats()
    {
	//get current chatboxs
	var ids = '';
	$('#chat-frame .chat-box').each(function(){
	    ids += $(this).attr('rel')+",";
	});	
	
	$.ajax({
	    url: "index.php?do=product&action=ajaxUpdateChats&ids="+ids,
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
			url: "index.php?do=product&action=getTopChatAnnounce",
		}).done(function ( data ) {
			if( console && console.log ) {
				$("#message_out").html(data);
				//alert(data);
			}
		});
    }
    
    function updateChatbox()
    {
	$.ajax({
	    url: "index.php?do=product&action=updateChatbox",
	}).done(function ( data ) {
	    //alert(data);
	    var arr = jQuery.parseJSON(data);
	    $(arr).each(function(index,value) {
		//alert(value);
		if ($('#chat-box-'+value).length>0) {
		    if ($('#chat-box-'+value).hasClass('hidden')) {
			getChatbox(value, true);
		    }
		    else
		    {
			getChatbox(value, false);		       
		    }
		}
		else
		{
		    getChatbox(value, true);
		}
	    });
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
		url: "index.php?do=product&action=setReadChat&id="+ids,
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
		    $('#chat-frame #chat-box-'+uid+' .chat-form textarea').focus();
    }
    
    function removeChatbox(uid)
    {
	$.ajax({
	    url: "index.php?do=product&action=removeChatbox&id="+uid,
	}).done(function ( data ) {
	    clearInterval(ichatbox[uid]);
	});
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
		url: "index.php?do=product&action=getNewChats&id="+uid+dates+seen,
	    }).done(function ( data ) {
		if( console && console.log ) {
		    
		    $("<div>").html(data).find('.chat-list li').each(function(){
			
			$('#chat-frame #chat-box-'+uid+' .chat-list ul li.temp').remove();
			
			
			if($('#chat-frame #chat-box-'+uid+' .chat-list ul li[box-id='+$(this).attr("box-id")+']').length == 0)
			{
			    $('#chat-frame #chat-box-'+uid+' .chat-list ul').append($(this).clone());
			    $('#chat-frame #chat-box-'+uid+' .chat-list').scrollTop($('#chat-frame #chat-box-'+uid+' .chat-list')[0].scrollHeight);
			    
			    
			    
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
    
    function postChat(id, content, hash)
    {
	if ($.trim(content) == "") {
	    $('#chat-frame #chat-box-'+id+' textarea').val("");
	    return;
	}
	
	//remove notification
	$('#chat-frame #chat-box-'+id+' .notification').html('');
	
	$('#chat-frame #chat-box-'+id).addClass("chatloading");	
	
	$('#chat-frame #chat-box-'+id+' .chat-list ul').append('<li class="me temp" rel="'+$('#chat-frame #chat-box-'+id+' .chat-list ul li:last-child').attr("rel")+'" class="me">'+
								'<img width="40" height="40" src="'+companylogo+'" class="avatar">'+
								$('#chat-frame #chat-box-'+id+' textarea').val()+
							    '<span class="status">đang gửi...</span></li>');
	
	$('#chat-frame #chat-box-'+id+' textarea').val("");
	$('#chat-frame #chat-box-'+id+' .chat-list').scrollTop($('#chat-frame #chat-box-'+id+' .chat-list')[0].scrollHeight);
	
			$.ajax({
			    type: "POST",
			    url: "index.php?do=product&action=postChat",
			    encoding: "UTF-8",
			    data: "data[content]="+content+"&formhash="+hash+"&data[id]="+id
			}).done(function ( data ) {
			    if( console && console.log ) {
			        //alert('#chat-frame #chat-box-'+id+' .chat-list ul li[rel='+$(data).attr("rel")+']');
				//if($('#chat-frame #chat-box-'+id+' .chat-list ul li[rel='+$(data).attr("rel")+']').length == 0)
				//    $('#chat-frame #chat-box-'+id+' .chat-list ul').append(data);
				
				$('#chat-frame #chat-box-'+id).removeClass("chatloading");
				
			    }
			});
    }
    
    function getChatbox(uid, hide)
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
	    url: "index.php?do=product&action=getChatbox&id="+uid,
	}).done(function ( data ) {
	    if( console && console.log && $('#chat-box-'+uid).length<1 ) {
		//alert(data);
		
		$('#chat-frame').prepend(data);
		$('#chat-frame #chat-box-'+uid+' .chat-list').scrollTop($('#chat-frame #chat-box-'+uid+' .chat-list')[0].scrollHeight);
		
		// Chat box functions
		$('#chat-frame #chat-box-'+uid+' .chat-title').click(function() {
		   
		    
		    $(this).parent().find(".chat-content").toggle();
		    $(this).parent().find(".chat-form").toggle();
		    
		    //Title click
		    if ($(this).parent().hasClass("hidden")) {
			$(this).parent().removeClass("hidden");			
			updateReadChat(uid);
			$('#chat-frame #chat-box-'+uid+' .chat-list').scrollTop($('#chat-frame #chat-box-'+uid+' .chat-list')[0].scrollHeight);
			
		    }
		    else
		    {
			$(this).parent().addClass("hidden");
		    }
		    
		    //***checkChatboxUnread();
		    $(this).parent().find(".chat-form textarea").focus();
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
		    removeChatbox(uid);	
		});
		
		//post chat
		$('#chat-frame #chat-box-'+uid+' .post-content').keydown(function(event) {
		    if (event.keyCode == 13) {
			event.preventDefault();
		    	postChat(uid, $(this).val(), "zzz");
		    }
		});		
		
		//refresh new post
		clearInterval(chat_interval);
		chat_interval = setInterval("updateChats()", 5000);
		
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
		$('#chat-frame #chat-box-'+uid+' .post-content').focus();
	    }
	});
    }
	
	
	function goSearch() {
		    clearTimeout(keytimeout);
		    
		    keytimeout = setTimeout(function(){
			fullTextSearch( $('#TopSearch input').val(),keyupcount);
		    }, 500);
		    
		    keyupcount++;
	}
	
	//full text search
	function fullTextSearch(keyword, count) {
	    if (keyupcount == count) {
		$.ajax({
		    url: "index.php?do=product&action=ajaxSearch&keyword="+encodeURIComponent(keyword)
		}).done(function ( data ) {
		    if( console && console.log ) {
			//alert(data);
			if (keyupcount == count) {
			    if (data != "") {
				$('#TopSearch .search_result').html(data);
				$('#TopSearch .search_result').css("display", "block");
				
				$('#TopSearch .search_result ul li:first-child').addClass("active");
				
				$('#TopSearch .search_result ul li').hover(function () {
				    $('#TopSearch .search_result ul li:first-child').removeClass("active");
				},function () {
				    $('#TopSearch .search_result ul li:first-child').addClass("active");
				});
			    }
			    else
			    {
				$('#TopSearch .search_result').css("display", "none");
			    }
			}
		    }
		});
	    }
	}
	
	//offer comments	
	function loadOfferComment()
	{
		$('.detail-comments').addClass('cloading');
		$.ajax({
				type: "POST",
				url: $('.detail-comments .comments-box form').attr("action"),
				data: "id="+$('.detail-comments .comments-box #pid').val()
			}).done(function ( data ) {
				if( console && console.log ) {
					//alert("ddd");
					$('.detail-comments .comments_list').html(data);
					
					if($('.detail-comments .comments-box').css("display") != "none")
					{
					    $(".detail-comments .comments_list").mCustomScrollbar({
					    	autoHideScrollbar:true,
					    	theme:"light-thin",
					    	scrollSpeed: 40
					    });
					}
					
					
					$('.detail-comments').removeClass('cloading');
				}
			});
	}
	
	function postOfferComment()
	{
		valid = true;
		var guest_string = '';
		if (!$('.detail-comments #comment').val().trim()) {
		    alert($('.detail-comments #comment').val().trim());
			$('.detail-comments #comment').addClass('invalid');
			$('.detail-comments #comment').focus();
			$('.detail-comments #comment').val("");
			valid = false;
		}
		else
		{
			$('.detail-comments #comment').removeClass('invalid');			
		}
		
		//check guest
		if($('.detail-comments #guest_name').length)
		{			
			if($('.detail-comments #guest_name').val() == '' || $('.detail-comments #guest_email').val() == '')
			{		
				$('.detail-comments #guest_isedit').val("1");
				$("#guestbox-but").trigger("click");
				//$('input[name="box_guest_name"]').focus();
				valid = false;
			}
			else
			{
				guest_string = '&data[guest_name]='+$('#guest_name').val()+'&data[guest_email]='+$('#guest_email').val();
			}
		}
		
		if (valid) {
			$('.detail-comments').addClass('cloading');
			$(".detail-comments #comment").prop('disabled', true);
			
			$.cookie("comment_tpm", null);
			
			$.ajax({
				type: "POST",
				url: $('.detail-comments .comments-box form').attr("action"),
				encoding: "UTF-8",
				data: "data[content]="+encodeURI($('.detail-comments #comment').val())+"&formhash="+$('.detail-comments #FormHash').val()+"&data[id]="+$('.detail-comments .comments-box #pid').val()+guest_string
			}).done(function ( data ) {
				if( console && console.log ) {
					//alert(data);
					$('.detail-comments .comments_list').html(data);
					//
					
					
					$(".detail-comments .comments_list").mCustomScrollbar({
						autoHideScrollbar:true,
						theme:"light-thin",
						scrollSpeed: 40
					});
					//
					$('.detail-comments').removeClass('cloading');
					$('.detail-comments #comment').val("");
					$(".detail-comments #comment").prop('disabled', false);
					
					//update count
					$(".detail-comments .comment_count").html(parseInt($(".detail-comments .comment_count").html())+1);
					
					//
					getInbox();
					
					if($('.detail-comments #guest_name').length && !$('.offer-detail-is').length)
					{
					    $("#offerbox-but").trigger("click");
					    loadOfferComment();
					}
				}
			});
		}
	}
	
	//get filter for list ajax products pages
        function getFilterProducts()
        {
            var ff = "&orderby="+orderby;
	    if(industryid != 0) ff += "&industryid="+industryid;
	    if(service != 0) ff += "&type=service";
	    //for other product
	    if(other != 0) ff += "&type=other";				
	    //for offer
	    if(offer != 0) ff += "&type=offer";
	    //for sale
	    if(sale != 0) ff += "&type=sale";
            
            if($('#ProductName').val())
	    {
		ff += "&q="+$('#ProductName').val();
		$('.page-title span.keyword').html($('#ProductName').val());
	    }
            
            return ff;
        }
        
        
	//for offer
	  function getOfferDetail(id, show)
	  {	    
	    $('.offer_transform ul.products li.product[rel="'+id+'"]').addClass('loading');
	    
	    $('.offerbox-outer').html("<div class='offer-loading'>.</div>");
	    $("#offerbox-but").trigger("click");
	    
	    var showstr = '';
	    if (show) {
		showstr = '&show=1';
	    }
	    
	      $.ajax({
			url: "index.php?do=product&action=getOfferDetail&id="+id+showstr			
		}).done(function ( data ) {
			if( console && console.log ) {
				//alert(data);
				
				$('.offerbox-outer').html(data);
				
				  //$("#offerbox-but").trigger("click");
				  
				  //for offer album
				  $('.left-offerbox a img').css("display", "none");
				  $('.left-offerbox a img').eq(0).addClass("active");
				  
				  $('.offer_content_inner .left-offerbox span.next').click(function() {
				    $('.left-offerbox a img').each(function() {
				      if ($(this).hasClass("active")) {				     
					$(this).removeClass("active");
					if ($(this).next().length) {
					  $(this).next().addClass("active");
					}
					else
					{
					  $('.left-offerbox a img').eq(0).addClass("active");
					}					
					return false;
				      }
				    });
				  });
				  $('.offer_content_inner .left-offerbox span.previous').click(function() {
				    $('.left-offerbox a img').each(function() {
				      if ($(this).hasClass("active")) {				     
					$(this).removeClass("active");
					if ($(this).prev().length) {
					  $(this).prev().addClass("active");
					}
					else
					{
					  $('.left-offerbox a img:last-child').addClass("active");
					}					
					return false;
				      }
				    });
				  });
				  
				  $('.left-offerbox a').click(function() {
				    $('.offer_content_inner .left-offerbox span.next').trigger("click");
				  });
				  
				  
				  
				  $('.offer_transform ul.products li.product[rel="'+id+'"]').removeClass('loading');
                                  
                                  if ($('.left-offerbox img').length < 2) {
                                        $('.left-offerbox span').remove();
                                  }
				  
				  
				  loadOfferComment();
				  
				  $('#comment').val($.cookie("comment_tpm"));
			}
		});
	  }
	  
	  
	var keyupcount = 0;
	var keytimeout;
	var chat_lock = 0;
	var chat_interval;
	var on_page = 1;
	var boong = 1;
	$(document).ready(function() {
	    
	    $('.toolbox-close').click(function() {
		 $(this).parent().fadeOut();
	    });
	    
	    
	    //for offer comment boxes
	    $('.detail-comments h4').live("click", function() {
		$('.detail-comments .comments-box').toggle();
		
		if (!$('.detail-comments .mCSB_container').length) {
		    $(".detail-comments .comments_list").mCustomScrollbar({
						autoHideScrollbar:true,
						theme:"light-thin",
						scrollSpeed: 40
					});
		}
		
	    });
	    
	    $('.detail-comments #comment').live("keydown", function(event) {
			$.cookie("comment_tpm", $('#comment').val());
			if (event.keyCode == 13) {				
				event.preventDefault();
				if(typeof postComment !== 'undefined' && $.isFunction(postComment))
				{
				    postComment();				
				}
				else if(typeof postOfferComment !== 'undefined' && $.isFunction(postOfferComment))
				{
				    postOfferComment();				
				}			
			}
	    });
	    
	    //Top Search
	    $('#TopSearch input').live("keyup", function(event){
		//alert($('#TopSearch .search_result ul li').length);
		if (event.keyCode == 13 && $('#TopSearch .search_result ul li').length) {
		    $('#TopSearch .search_result ul li:first-child').trigger("click");			
		}
			
		if ($(this).val() != "") {		    
		    goSearch();
		}
		else
		{
		    $('#TopSearch .search_result').css("display", "none");
		}
	    });
	    
	    $('#TopSearch input').live("focus", function(event){
		if ($(this).val() != "") {
		    goSearch();
		}
	    });
	    
	    $('#TopSearch input').live("click", function(event){
		if ($(this).val() != "") {
		    goSearch();
		}
	    });
	    
	    $('#TopSearch .search_result ul li').live("click", function(){		
		window.location = $(this).find('a').attr("href");
	    });
	    
	    $('body').not('#TopSearch input').click(function(){$('#TopSearch .search_result').css("display","none");});
	    
	    
	    
	    $(window).on("blur focus", function(e) {
		var prevType = $(this).data("prevType");
	    
		if (prevType != e.type) {   //  reduce double fire issues
		    switch (e.type) {
			case "blur":
			    on_page = 0;
			    //console.log(on_page);
			    break;
			case "focus":
			    on_page = 1;
			    //console.log(on_page);
			    break;
		    }
		}
	    
		$(this).data("prevType", e.type);
	    });
	    
	    //start cookie
	    //cookie
		var date = new Date();
		var minutes = 120;
		date.setTime(date.getTime() + (minutes * 60 * 1000));
		$.cookie.settings = {
		    path : "/",
		    expires : date
		};
		
		
	    //for history list
	    
	    //update toogle-button position
	    $('#history-list-frame .content').css("margin-bottom", - $('#history-list-frame .content').height() - $('#history-list-frame .content .toggle-button').height());
	    
	    
	    
	    $('#history-list-frame .content .toggle-button').click(function(event) {
		if(parseInt($('#history-list-frame .content').css("margin-bottom")) < 0)
		{
		    $('#history-list-frame .content').css("margin-bottom", "0");
		}
		else
		{
		    $('#history-list-frame .content').css("margin-bottom", - $('#history-list-frame .content').height() - $('#history-list-frame .content .toggle-button').height());
		}
		event.stopPropagation();
	    });
	    
	    $('*').not('#history-list-frame .content .toggle-button,#history-list-frame .content span.nav').click(function(){
		$('#history-list-frame .content').css("margin-bottom", - $('#history-list-frame .content').height() - $('#history-list-frame .content .toggle-button').height());
	    });
	    
	    loadViewedHistory();
	    
	    
	    $('.login_pls a.comment_but').click(function() {
		$.cookie("offerid", $('.detail-comments .comments-box #pid').val());
		$('#LoggingFrm').append('<input type="text" name="redirect" type="hidden" value="'+document.URL+'#comment_link" />');		
	    });
	    
	    
	    //update guest info
		if ($.cookie("guest_name") && $.cookie("guest_email")) {
			$('input[name="box_guest_name"]').val($.cookie("guest_name"));
			$('input[name="box_guest_email"]').val($.cookie("guest_email"));
		}
		if($('input[name="box_guest_name"]').val() != '' && $('input[name="box_guest_name"]').val() != '')
		{
			$('#guest_name').val($('input[name="box_guest_name"]').val());
			$('#guest_email').val($('input[name="box_guest_email"]').val());
			$('.guest_info').html('<strong>'+$('#guest_name').val()+'</strong> ('+$('#guest_email').val()+') | <a class="change_guest_info" href="javascript:void(0)">Chỉnh sửa</a> - <a class="delete_guest_info" href="javascript:void(0)">Thoát</a>');
		}
                $('.guest_form button').live("click",function() {
                    var ok = true;
                    if($('input[name="box_guest_name"]').val() == '')
                    {
                        $('input[name="box_guest_name"]').addClass('error');
                        ok = false;
                    }
                    else
                    {
                        $('input[name="box_guest_name"]').removeClass('error');
                        $('#guest_name').val($('input[name="box_guest_name"]').val());
                    }
                    
                    if($('input[name="box_guest_email"]').val() == '' || !isValidEmailAddress($('input[name="box_guest_email"]').val()))
                    {
                        $('input[name="box_guest_email"]').addClass('error');
                        ok = false;
                    }
                    else
                    {
                        $('input[name="box_guest_email"]').removeClass('error');
                        $('#guest_email').val($('input[name="box_guest_email"]').val());
                    }
                    
                    
                    if (ok) {
			if ($('#guest_isedit').val() == "1") {
				if(typeof postComment !== 'undefined' && $.isFunction(postComment))
				{
				    postComment();				
				}
				else if(typeof postOfferComment !== 'undefined' && $.isFunction(postOfferComment))
				{
				    postOfferComment();				
				}
			}
			$('.fancybox-close').trigger("click");
                        $('.guest_info').html('<strong>'+$('#guest_name').val()+'</strong> ('+$('#guest_email').val()+') | <a class="change_guest_info" href="javascript:void(0)">Chỉnh sửa</a> - <a class="delete_guest_info" href="javascript:void(0)">Thoát</a>');
			
			$.cookie("guest_name", $('#guest_name').val());
			$.cookie("guest_email", $('#guest_email').val());
                    }
                });
		
		$('.change_guest_info').live("click", function(){
			$('#guest_isedit').val("0");
			$("#guestbox-but").trigger("click");
		});
		$('.delete_guest_info').live("click", function(){
			$.cookie("guest_name", null);
			$.cookie("guest_email", null);
			$('.guest_info').html('');
			$('input[name="box_guest_email"]').val('');
                        $('#guest_email').val('');
			$('input[name="box_guest_name"]').val('');
                        $('#guest_name').val('');
		});
		
		$('input[name="box_guest_name"],input[name="box_guest_email"]').live("keyup",function(event){
			if (event.keyCode == 13) {
				$('.guest_form button').trigger("click");			
			}
		});
		
		if (window.location.hash == "#comment_link") {		   
		    $('.woocommerce_tabs .tabs li').removeClass("active");
		    $('.woocommerce_tabs .tabs li').eq(1).addClass("active");
		    $('.woocommerce_tabs .tabs li').eq(1).trigger("click");
		    $('.woocommerce_tabs .panel').css("display","none");
                    $($('.woocommerce_tabs .tabs li').eq(1).find("a").attr("href")).css("display","block");
		    
		    
		    //for offer
		    if(!(typeof postComment !== 'undefined' && $.isFunction(postComment)) && !$('.offer-detail-is').length)
		    {
			setTimeout('$("#new_offer_but").trigger("click")',2000);
			//alert($.cookie("offerid"));
			setTimeout('getOfferDetail('+$.cookie("offerid")+',"1")',2000);
		    }
		}
	    
		$('#comment').val($.cookie("comment_tpm"));
		
		
	});