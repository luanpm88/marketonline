<?php /* Smarty version 2.6.27, created on 2014-03-21 09:24:33
         compiled from header.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'sprintf', 'header.html', 960, false),array('function', 'the_url', 'header.html', 982, false),array('function', 'formhash', 'header.html', 1042, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->_tpl_vars['charset']; ?>
">
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title><?php echo $this->_tpl_vars['page_title']; ?>
 - <?php echo $this->_tpl_vars['_office_room']; ?>
 - <?php echo $this->_tpl_vars['_G']['site_name']; ?>
</title>

<link href="../images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />

<link href="../css/common.css" rel="stylesheet" type="text/css">
<link href="<?php echo $this->_tpl_vars['office_theme_path']; ?>
images/style.css" rel="stylesheet" type="text/css">
<script src="../scripts/jquery.js"></script>
<script type='text/javascript' src='../templates/default/js/jquery.jcookie.min.js'></script>
<script src="../data/cache/<?php echo $this->_tpl_vars['JsLanguage']; ?>
/locale.js" charset="<?php echo $this->_tpl_vars['charset']; ?>
"></script>
<script src="../scripts/jquery/jquery.validate_.js"></script>
<script src="../scripts/general.js"></script>
<script type='text/javascript' src='../images/jwplayer/jwplayer.js'></script>
<script type='text/javascript' src='../templates/default/js/jquery.resizecrop-1.0.3.js'></script>
<script src="../scripts/hashtable.js"></script>
<script src="../scripts/jquery.numberformatter.js"></script>

<link href="../templates/default/js/select2/select2.css" rel="stylesheet" type="text/css">
<script src="../templates/default/js/select2/select2.min.js"></script>
<script src="../templates/default/js/select2/select2_locale_vi.js"></script>


<link href="../templates/office/calendar/jquery.datepick.css" rel="stylesheet" type="text/css">
<script src="../templates/office/calendar/jquery.datepick.js"></script>
<script src="../templates/office/calendar/jquery.datepick-vi.js"></script>
<!--<script type="text/javascript" src="https://getfirebug.com/firebug-lite.js"></script>-->
<!--<script src="http://marketonline.vn/scripts/mudim-0.9-r162.js"></script>-->
<?php echo '
<script>
	
	function updateChatsById(uid, item)
    {
	if ($(\'#chat-frame #chat-box-\'+uid+\' .chat-list ul li[chat-id=\'+item.id+\']\').length) {
	    //update esxit line
	    var line = $(\'#chat-frame #chat-box-\'+uid+\' .chat-list ul li[chat-id=\'+item.id+\']\');
	    
	    //update read
	    if (line.attr("read") == \'0\' && item.read == \'1\') {
		line.attr("read", item.read);
	    }
	    
	}
	else
	{
	    $(\'#chat-frame #chat-box-\'+uid+\' .chat-list ul li.temp\').remove();
	    //render chat line if not exsit
	    $(\'#chat-frame #chat-box-\'+uid+\' .chat-list ul\').append(renderChatLine(item));
	    //scroll to bottom
	    $(\'#chat-frame #chat-box-\'+uid+\' .chat-list\').scrollTop($(\'#chat-frame #chat-box-\'+uid+\' .chat-list\')[0].scrollHeight);
	}
    }
    
    function renderChatLine(item)
    {
	var result = \'<li class="\'+item.me+\'" rel="\'+item.created_or+\'" chat-id="\'+item.id+\'" read="\'+item.read+\'">\'
                            +\'<span class="datetimec">\'+item.created+\'</span>\'
                            +\'<img width="40" height="40" src="\'+item.company_logo+\'" class="avatar">\'
                            +item.content+\'</li>\';
	
	return result;
    }
    
    function updateChats()
    {
	//get current chatboxs
	var ids = \'\';
	$(\'#chat-frame .chat-box\').each(function(){
	    ids += $(this).attr(\'rel\')+",";
	});	
	
	$.ajax({
	    url: "../index.php?do=product&action=ajaxUpdateChats&ids="+ids,
	}).done(function ( data ) {
	    if( console && console.log ) {
		//remove temp item
		
		$(\'#chat-frame .chat-box .chat-list ul li.chatloading\').remove();
		
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
		    var last_line = $(\'#chat-frame #chat-box-\'+i+\' .chat-list ul li\').last();
		    if (last_line.hasClass("me") && last_line.attr("read") == \'1\') {
		        $(\'#chat-frame #chat-box-\'+i+\' .notification\').html(items[0].viewed_notice);
		    }
		    else
		    {
			$(\'#chat-frame #chat-box-\'+i+\' .notification\').html(\'\');
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
	var ids = \'-1\';
	$(\'#quick_message_content ul li[read=0]\').each(function(){
	    ids = ids+\',\'+$(this).attr("chat-id");
	    $(this).attr("read", 1);
	});
	//alert(ids);
	if(ids != \'-1\') setReadChat(ids);
	$(\'#messagehome .message_counter\').remove();
    }
    
    function getTopChat() {
		//code
		$.ajax({
			url: "../index.php?do=product&action=getTopChatAnnounce",
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
	    url: "../index.php?do=product&action=updateChatbox",
	}).done(function ( data ) {
	    //alert(data);
	    var arr = jQuery.parseJSON(data);
	    $(arr).each(function(index,value) {
		//alert(value);
		if ($(\'#chat-box-\'+value.id).length>0) {
		    if ($(\'#chat-box-\'+value.id).hasClass(\'hidden\')) {
			getChatbox(value.id, true, value.membertype_id);
		    }
		    else
		    {
			getChatbox(value.id, false, value.membertype_id);		       
		    }
		}
		else
		{
		    getChatbox(value.id, true, value.membertype_id);
		}
	    });
	});
    }
    
    function checkChatboxUnread()
    {
	$(\'#chat-frame .chat-box\').each(function() {
	    if ($(this).hasClass("hidden") || !on_page) {
		if($(this).find("ul li[read=0]").not("ul li.me").length)
		{
		    $(this).addClass("unread");
		    $(this).find(".unread_count").remove();
		    $(this).prepend(\'<span class="unread_count">\'+$(this).find("ul li[read=0]").not("ul li.me").length+\'</span>\');
		    
		    
		    //BOOONGGGGGGGGGGGGGGGGGGGGGGGGGG ===========  
		    //update boong from cookie
		    var cookiestring = \'\';
		    if (typeof($.cookie("cookiestring")) != \'undefined\') {
			    cookiestring = $.cookie("cookiestring");
		    }
		    $(this).find("ul li[read=0]").not("ul li.me, ul li.boong").each(function(){
			if(cookiestring.indexOf("["+$(this).attr("chat-id")+"]") >= 0)
			    $(this).addClass(\'boong\');
		    });
		    
		    //play boong
		    if ($(this).find("ul li[read=0]").not("ul li.me, ul li.boong").length) {
			var audioElement = document.createElement(\'audio\');
			audioElement.setAttribute(\'src\', \'http://marketonline.vn/images/alert.mp3\');
			audioElement.play();
			
			$(this).find("ul li[read=0]").not("ul li.me, ul li.boong").addClass(\'boong\');		
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
	    
	    //$(this).find(\'.chat-list\').scrollTop($(this).find(\'.chat-list\')[0].scrollHeight);
	});
    }
    
    function updateReadChat(id)
    {
	if (!on_page) {
	    return;
	}
	//alert(id);
	var ids = \'-1\';
	$(\'#chat-frame #chat-box-\'+id+\' .chat-list ul li[read=0]\').not(\'#chat-frame #chat-box-\'+id+\' .chat-list ul li.me\').each(function(){
	    ids = ids+\',\'+$(this).attr("chat-id");
	    $(this).attr("read", 1);
	});
	//alert(ids);
	if(ids != \'-1\') setReadChat(ids);
    }    
    function setReadChat(ids) {
	
	setTimeout(function() {
	    $.ajax({
		url: "../index.php?do=product&action=setReadChat&id="+ids,
	    }).done(function ( data ) {
		//clearInterval(ichatbox[uid]);
	    });
	}, 6000);
	
    }
    
    function hideChatbox(uid)
    {
	var item = $(\'#chat-frame #chat-box-\'+uid);	
		    item.find(".chat-content").css("display", "none");
		    item.find(".chat-form").css("display", "none");

		    //Title click
		    item.addClass("hidden");
    }
    function showChatbox(uid)
    {
	var item = $(\'#chat-frame #chat-box-\'+uid);	
		    item.find(".chat-content").css("display", "block");
		    item.find(".chat-form").css("display", "block");

		    //Title click
		    item.removeClass("hidden");
		    updateReadChat(uid);
		    $(\'#chat-frame #chat-box-\'+uid+\' .chat-form textarea\').focus();
    }
    
    function removeChatbox(uid)
    {
	$.ajax({
	    url: "../index.php?do=product&action=removeChatbox&id="+uid,
	}).done(function ( data ) {
	    clearInterval(ichatbox[uid]);
	});
    }
    
    function getNewChats(uid)
    {
	if (true) {
	    chat_lock = 1;
	
	    var dates = \'\';
	    var seen = \'\';
	    if ($(\'#chat-frame #chat-box-\'+uid+\' .chat-list ul li\').not(\'#chat-frame #chat-box-\'+uid+\' .chat-list ul li.temp\').length) {
	       dates = "&date="+$(\'#chat-frame #chat-box-\'+uid+\' .chat-list ul li:last-child\').attr("rel");
	    }
	    
	    var lastchat = $(\'#chat-frame #chat-box-\'+uid+\' .chat-list ul li\').not(\'#chat-frame #chat-box-\'+uid+\' .chat-list ul li.temp\').last();
	    if(lastchat.hasClass(\'me\'))
	    {
		if (lastchat.attr(\'read\') == \'0\') {
		    seen = "&seen="+lastchat.attr("chat-id");
		    //$(\'#chat-frame #chat-box-\'+uid+\' .notification\').html(\'wait for being seen\');
		}
		else
		{
		    //$(\'#chat-frame #chat-box-\'+uid+\' .notification\').html(\'Đã xem\');
		}
		
	    }
	    else
	    {
		$(\'#chat-frame #chat-box-\'+uid+\' .notification\').html(\'\');
	    }
    
	    $.ajax({
		url: "../index.php?do=product&action=getNewChats&id="+uid+dates+seen,
	    }).done(function ( data ) {
		if( console && console.log ) {
		    
		    $("<div>").html(data).find(\'.chat-list li\').each(function(){
			
			$(\'#chat-frame #chat-box-\'+uid+\' .chat-list ul li.temp\').remove();
			
			
			if($(\'#chat-frame #chat-box-\'+uid+\' .chat-list ul li[box-id=\'+$(this).attr("box-id")+\']\').length == 0)
			{
			    $(\'#chat-frame #chat-box-\'+uid+\' .chat-list ul\').append($(this).clone());
			    $(\'#chat-frame #chat-box-\'+uid+\' .chat-list\').scrollTop($(\'#chat-frame #chat-box-\'+uid+\' .chat-list\')[0].scrollHeight);
			    
			    
			    
			    //play sound
			    if (!$(this).hasClass("me") && $(\'#chat-frame #chat-box-\'+uid).hasClass("hidden")) {
				//var audioElement = document.createElement(\'audio\');
				//audioElement.setAttribute(\'src\', \'http://marketonline.vn/images/alert.mp3\');
				//audioElement.play();
			    }
			    
			}
		    });
		    
		    if(!$(\'#chat-frame #chat-box-\'+uid).hasClass("hidden"))
		    {
			updateReadChat(uid);		    
		    }
		    
		    checkChatboxUnread();
		    
		    
		    //seen
		    if($("<div>").html(data).find(\'.seen-id\').length)
		    {
			var new_lastchat = $(\'#chat-frame #chat-box-\'+uid+\' .chat-list ul li\').last();
			var lastchat = $(\'#chat-frame #chat-box-\'+uid+\' .chat-list ul li[chat-id=\'+$("<div>").html(data).find(\'.seen-id\').html()+\']\');
			
			//alert(lastchat.attr(\'chat-id\'));
			//alert(new_lastchat.attr(\'chat-id\'));
			
			if (new_lastchat.attr(\'chat-id\') == lastchat.attr(\'chat-id\'))
			{
			    lastchat.attr(\'read\',\'1\');
			    $(\'#chat-frame #chat-box-\'+uid+\' .notification\').html($("<div>").html(data).find(\'.seen-content\').html());
			    
			    //alert($("<div>").html(data).find(\'.seen-content\').html());
			}
			else
			{
			    $(\'#chat-frame #chat-box-\'+uid+\' .notification\').html(\'\');
			}
		    }
		    
		    
		    //opoen lock
		    chat_lock = 0;
		}
		
		
	    });
	    
	}
    }
    
    function postChat(id, content, hash, membertype_id)
    {
	if(typeof(membertype_id)===\'undefined\') membertype_id = 0;
	//membertype_id
	var type_str = "";
	if (membertype_id) {
	    type_str = "&membertypeid="+membertype_id;
	}
	
	if ($.trim(content) == "") {
	    $(\'#chat-frame #chat-box-\'+id+\' textarea\').val("");
	    return;
	}
	
	//remove notification
	$(\'#chat-frame #chat-box-\'+id+\' .notification\').html(\'\');
	
	$(\'#chat-frame #chat-box-\'+id).addClass("chatloading");	
	
	$(\'#chat-frame #chat-box-\'+id+\' .chat-list ul\').append(\'<li class="me temp" rel="\'+$(\'#chat-frame #chat-box-\'+id+\' .chat-list ul li:last-child\').attr("rel")+\'" class="me">\'+
								\'<img width="40" height="40" src="\'+companylogo+\'" class="avatar">\'+
								$(\'#chat-frame #chat-box-\'+id+\' textarea\').val()+
							    \'<span class="status">đang gửi...</span></li>\');
	
	$(\'#chat-frame #chat-box-\'+id+\' textarea\').val("");
	$(\'#chat-frame #chat-box-\'+id+\' .chat-list\').scrollTop($(\'#chat-frame #chat-box-\'+id+\' .chat-list\')[0].scrollHeight);
	
			$.ajax({
			    type: "POST",
			    url: "../index.php?do=product&action=postChat"+type_str,
			    encoding: "UTF-8",
			    data: "data[content]="+content+"&formhash="+hash+"&data[id]="+id
			}).done(function ( data ) {
			    if( console && console.log ) {
			        //alert(\'#chat-frame #chat-box-\'+id+\' .chat-list ul li[rel=\'+$(data).attr("rel")+\']\');
				//if($(\'#chat-frame #chat-box-\'+id+\' .chat-list ul li[rel=\'+$(data).attr("rel")+\']\').length == 0)
				//    $(\'#chat-frame #chat-box-\'+id+\' .chat-list ul\').append(data);
				
				$(\'#chat-frame #chat-box-\'+id).removeClass("chatloading");
				
			    }
			});
    }
    
    function getChatbox(uid, hide, membertype_id)
    {
	if(typeof(membertype_id)===\'undefined\') membertype_id = 0;
	//membertype_id
	var type_str = "";
	if (membertype_id) {
	    type_str = "&membertypeid="+membertype_id;
	}
	//show hide chatbox when exsit
	if ($(\'#chat-box-\'+uid).length>0) {
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
	    url: "../index.php?do=product&action=getChatbox&id="+uid+type_str,
	}).done(function ( data ) {
	    if( console && console.log ) {
		//alert(data);
		
		$(\'#chat-frame\').prepend(data);
		$(\'#chat-frame #chat-box-\'+uid+\' .chat-list\').scrollTop($(\'#chat-frame #chat-box-\'+uid+\' .chat-list\')[0].scrollHeight);
		
		// Chat box functions
		$(\'#chat-frame #chat-box-\'+uid+\' .chat-title\').click(function() {
		   
		    
		    $(this).parent().find(".chat-content").toggle();
		    $(this).parent().find(".chat-form").toggle();
		    
		    //Title click
		    if ($(this).parent().hasClass("hidden")) {
			$(this).parent().removeClass("hidden");			
			updateReadChat(uid);
			$(\'#chat-frame #chat-box-\'+uid+\' .chat-list\').scrollTop($(\'#chat-frame #chat-box-\'+uid+\' .chat-list\')[0].scrollHeight);
			
		    }
		    else
		    {
			$(this).parent().addClass("hidden");
		    }
		    
		    //***checkChatboxUnread();
		    $(this).parent().find(".chat-form textarea").focus();
		});
		
		$(\'#chat-frame #chat-box-\'+uid+\' .chat-title h2 a\').click(function() {
			if (!$(this).parent().parent().parent().hasClass("hidden"))
			{				
				window.location = $(this).attr("rel");
			}
		});

		//close chatbox
		$(\'#chat-frame #chat-box-\'+uid+\' .chat-title span.chat-close-but\').click(function(){
		    $(this).parent().parent().parent().remove();
		    removeChatbox(uid);	
		});

		//post chat
		$(\'#chat-frame #chat-box-\'+uid+\' .post-content\').keydown(function(event) {			
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
		if(!$(\'#chat-frame #chat-box-\'+uid).hasClass("hidden"))
		{
		    updateReadChat(uid);
		}
		
		
		//check chatbox status
		//***checkChatboxUnread();
		
		//focus
		$(\'#chat-frame #chat-box-\'+uid+\' .post-content\').focus();
	    }
	});
    }
	
	function tooltipHelper(item, content)
	{
		item.append("<div class=\'tooltip-box\'><span class=\'pointer-tooltip\'>...</span><div class=\'tooltip-box-content\'>"+content+"</div></div>");
	}
	
	function getCustomIndustriesByCurrent(id) {
		if (id != 0) {
			$(\'#dataCustomIndustry select\').addClass("iloading");
			$.ajax({
				url: "../index.php?do=product&action=getCustomIndustriesByCurrent&id="+id+"&member_id='; ?>
<?php echo $this->_tpl_vars['MEMBER']['id']; ?>
<?php echo '",
			}).done(function ( data ) {
				if( console && console.log ) {
					for (var i=1; i<5; i++) {
						if ($(data).filter(\'#block_\'+i).html()) {
							//alert($(data).filter(\'#block_\'+i).html());
							$(\'#dataCustomIndustry .pos_\'+i+\' select\').html($(data).filter(\'#block_\'+i).html());
							$(\'#dataCustomIndustry .pos_\'+i).css(\'visibility\', \'visible\');
							$(\'#dataCustomIndustry .pos_\'+i+\' input\').attr(\'disabled\',\'disabled\');
							$(\'#dataCustomIndustry .pos_\'+i+\' input\').css(\'display\', \'none\');
							$(\'#dataCustomIndustry .pos_\'+i+\' select\').removeAttr(\'disabled\');
						}
						$(\'#dataCustomIndustry select\').removeClass("iloading");
					}
					
				}
			});	
		}
		else
		{
			getCustomIndustriesByParent(0, 1);
		}
		
	}
	
	function getCustomIndustriesByCustomParent(id, level) {
		if (level > 3 || id == 0) {				
			changeIndustry();			
			if (id == 0) {
				for (var i=parseInt(level)+1; i < 5; i++) {
					$(\'#dataCustomIndustry .pos_\'+i+\' select\').html(\'<option value="0">-'; ?>
<?php echo $this->_tpl_vars['_create_custom_industry']; ?>
<?php echo '-</option>\');
					$(\'#dataCustomIndustry .pos_\'+i).css(\'visibility\', \'hidden\');
					$(\'#dataCustomIndustry .pos_\'+i+\' input\').attr(\'disabled\',\'disabled\');
					$(\'#dataCustomIndustry .pos_\'+i+\' select\').attr(\'disabled\',\'disabled\');
				}
			}
			return;
		}

		$(\'#dataCustomIndustry .pos_\'+level+\' select\').addClass("iloading");

		$.ajax({
			url: "../index.php?do=product&action=getCustomIndustriesByCustomParent&id="+id+"&member_id='; ?>
<?php echo $this->_tpl_vars['MEMBER']['id']; ?>
<?php echo '",
		}).done(function ( data ) {
			if( console && console.log ) {
				//alert(data);
				$(\'#dataCustomIndustry .pos_\'+(parseInt(level)+1)+\' select\').html(data);				
				changeIndustry();
				$(\'#dataCustomIndustry .pos_\'+level+\' select\').removeClass("iloading");
			}
		});
	}
	
	function getCustomIndustriesByParent(id, level) {
		if (id == 0 && level == 1) {
			$(\'#dataCustomIndustry .pos_\'+level+\' select\').addClass("iloading");
			$.ajax({
			url: "../index.php?do=product&action=getCustomIndustriesByParent&id=-1&member_id='; ?>
<?php echo $this->_tpl_vars['MEMBER']['id']; ?>
<?php echo '",
			}).done(function ( data ) {
				if( console && console.log ) {
					$(\'#dataCustomIndustry .pos_\'+level+\' select\').html(data);
					changeIndustry();
					$(\'#dataCustomIndustry .pos_\'+level+\' select\').removeClass("iloading");
					//getCustomIndustriesByCustomParent($(\'#dataCustomIndustry .pos_\'+level+\' select\').val(), level)
				}
			});	
		}
		else
		{
			$(\'#dataCustomIndustry .pos_\'+(parseInt(level)+1)+\' select\').addClass("iloading");
			$.ajax({
				url: "../index.php?do=product&action=getCustomIndustriesByParent&id="+id+"&member_id='; ?>
<?php echo $this->_tpl_vars['MEMBER']['id']; ?>
<?php echo '",
			}).done(function ( data ) {
				if( console && console.log ) {
					$(\'#dataCustomIndustry .pos_\'+(parseInt(level)+1)+\' select\').html(data);
					changeIndustry();
					$(\'#dataCustomIndustry .pos_\'+(parseInt(level)+1)+\' select\').removeClass("iloading");
					//getCustomIndustriesByCustomParent($(\'#dataCustomIndustry .pos_\'+(parseInt(level)+1)+\' select\').val(), parseInt(level)+1)
				}
			});
		}
	}
	
	function updateCustomIndustry() {
		for (var i=1; i < 5; i++) {
			if ($(\'#dataCustomIndustry .pos_\'+i+\' select\').val() != 0) {
				$(\'#dataCustomIndustry .pos_\'+i+\' input\').attr(\'disabled\',\'disabled\');
				$(\'#dataCustomIndustry .pos_\'+i+\' input\').css(\'display\', \'none\');
			}
			else
			{
				$(\'#dataCustomIndustry .pos_\'+i+\' input\').removeAttr(\'disabled\');
				$(\'#dataCustomIndustry .pos_\'+i+\' input\').removeAttr("style");				
			}
		}
	}
	
	function changeIndustry(item) {
		//alert($(item).val());
		//getCustomIndustriesByParent($(item).val(), $(item).attr("rel"));
		var index = parseInt($(item).attr("rel"));
		
		for (var i=4; i > 0; i--) {			
			//getCustomIndustriesByParent($(\'#dataProductIndustryId\'+i).val(), $(\'#dataProductIndustryId\'+i).attr("rel"));
			
			if ($(\'#dataProductIndustryId\'+i).val() != 0) {
				$(\'#dataCustomIndustry .pos_\'+i).css(\'visibility\', \'hidden\');
				$(\'#dataCustomIndustry .pos_\'+i+\' input\').attr(\'disabled\',\'disabled\');
				$(\'#dataCustomIndustry .pos_\'+i+\' select\').attr(\'disabled\',\'disabled\');
			}
			else
			{
				$(\'#dataCustomIndustry .pos_\'+i).css(\'visibility\', \'visible\');
				$(\'#dataCustomIndustry .pos_\'+i+\' input\').removeAttr(\'disabled\');
				$(\'#dataCustomIndustry .pos_\'+i+\' select\').removeAttr(\'disabled\');
				
				for(var j=i+1; j < 5; j++)
				{
					if ((($(\'#dataCustomIndustry .pos_\'+(j-1)+\' select\').val() != -1)) && $(\'#dataCustomIndustry .pos_\'+(j-1)).css(\'visibility\') == \'visible\') {
						$(\'#dataCustomIndustry .pos_\'+j).css(\'visibility\', \'visible\');
						$(\'#dataCustomIndustry .pos_\'+j+\' input\').removeAttr(\'disabled\');
						$(\'#dataCustomIndustry .pos_\'+j+\' select\').removeAttr(\'disabled\');
					}
					else
					{
						$(\'#dataCustomIndustry .pos_\'+j).css(\'visibility\', \'hidden\');
						$(\'#dataCustomIndustry .pos_\'+j+\' input\').attr(\'disabled\',\'disabled\');
						$(\'#dataCustomIndustry .pos_\'+j+\' select\').attr(\'disabled\',\'disabled\');
					}
				}
			}
		}
		updateCustomIndustry();
	}
	
	
	var chat_lock = 0;
	var chat_interval;
	var on_page = 1;
	var boong = 1;
	var companylogo = \''; ?>
<?php if ($this->_tpl_vars['COMPANYINFO']['name']): ?>../<?php echo $this->_tpl_vars['COMPANYINFO']['logo']; ?>
<?php else: ?><?php if ($this->_tpl_vars['user_avatar']): ?> ../<?php echo $this->_tpl_vars['user_avatar']; ?>
 <?php else: ?> ../templates/default/image/usericon.jpg  <?php endif; ?><?php endif; ?><?php echo '\';
$(document).ready(function() {
	
	$("#GoTop").click(function(){
		$(\'html, body\').animate({scrollTop: \'0px\'}, 300);return false;
	});
	$("#check_all").click(function(){
		var isCheckAll=$(this).attr("checked");
		$(\'input[type="checkbox"][rel="check_item"]\').each(function(){
		   $(this).attr("checked",isCheckAll);
		});
	});
	
	$(\'#settingbox\').css(\'margin-left\', $(\'#settingouter\').width()-205);
	
	$(\'#CompanyLogo img\').resizecrop({
		   width:238,
		   height:238
		   
		 });
	$(\'#CompanyLogo img\').css(\'display\', \'block\');
	//$(\'#CompanyLogo img\').
	
	$(\'.bglist img.iiimg\').resizecrop({
		   width:75,
		   height:75		   
	});
	
	$(\'img.img_album\').resizecrop({
		   width:160,
		   height:160		   
	});
	
	$(\'.avatar img\').resizecrop({
		   width:80,
		   height:80		   
	});
	
	$("#add_new_brand_but").fancybox({
			\'padding\': 0,
			\'zoomOpacity\': true,
			\'zoomSpeedIn\': 500,
			\'zoomSpeedOut\': 500,
			\'overlayOpacity\': 0.75,
			\'frameWidth\': 530,
			\'frameHeight\': 400,
			\'hideOnContentClick\': false
		});
	
	$(\'#new_brand_box:before\').click(function() {
		alert(\'sdds\');
		$(\'#new_brand_box\').css(\'display\', \'none\');
	});
	
	getCart();
	//getInbox();
	
	$(\'#dataCustomIndustry select\').change(function(){
		//changeIndustry();
		getCustomIndustriesByCustomParent($(this).val(), $(this).attr("rel"));
	});
	$(\'#dataCustomIndustry input\').keyup(function(){
		for(var j=parseInt($(this).attr("rel"))+1; j < 5; j++)
		{
			if ($(this).val() != \'\' && j == parseInt($(this).attr("rel"))+1) {
				$(\'#dataCustomIndustry .pos_\'+j+\' select\').html(\'<option value="0">-'; ?>
<?php echo $this->_tpl_vars['_create_custom_industry']; ?>
<?php echo '-</option>\');
				$(\'#dataCustomIndustry .pos_\'+j).css(\'visibility\', \'visible\');
				$(\'#dataCustomIndustry .pos_\'+j+\' input\').removeAttr(\'disabled\');
				$(\'#dataCustomIndustry .pos_\'+j+\' input\').removeAttr("style");
				$(\'#dataCustomIndustry .pos_\'+j+\' select\').removeAttr(\'disabled\');
			}
			else
			{
				$(\'#dataCustomIndustry .pos_\'+j+\' select\').html(\'<option value="0">-'; ?>
<?php echo $this->_tpl_vars['_create_custom_industry']; ?>
<?php echo '-</option>\');
				$(\'#dataCustomIndustry .pos_\'+j).css(\'visibility\', \'hidden\');
				$(\'#dataCustomIndustry .pos_\'+j+\' input\').attr(\'disabled\', \'disabled\');
				$(\'#dataCustomIndustry .pos_\'+j+\' input\').css("display", "none");
				$(\'#dataCustomIndustry .pos_\'+j+\' select\').attr(\'disabled\', \'disabled\');
			}
		}
		
	});
	
	getCustomIndustriesByCurrent('; ?>
<?php if ($this->_tpl_vars['item']['producttype_id']): ?><?php echo $this->_tpl_vars['item']['producttype_id']; ?>
<?php else: ?>0<?php endif; ?><?php echo ');
	
	
	$("#dataProductPrice").keyup(function(){
		$(this).parseNumber({format:"#,###", locale:"vn"});
		$(this).formatNumber({format:"#,###", locale:"vn"});
	});
	$("#dataProductNewPrice").keyup(function(){
		$(this).parseNumber({format:"#,###", locale:"vn"});
		$(this).formatNumber({format:"#,###", locale:"vn"});
	});
	$("#DataTradePrice").keyup(function(){
		$(this).parseNumber({format:"#,###", locale:"vn"});
		$(this).formatNumber({format:"#,###", locale:"vn"});
	});
	
	$("input[name=\'job[peoples]\']").keyup(function(){
		$(this).parseNumber({format:"#,###", locale:"vn"});
		$(this).formatNumber({format:"#,###", locale:"vn"});
	});	
	
	if (window.location.hash == "#newshop") {
		tooltipHelper($(\'.shop_menu\'), "<h2>Chúc mừng bạn đã khởi tạo thành công gian hàng online</h2> Nhấn vào liên kết bên trên để vào gian hàng của bạn");
	}
	
	if(!$(\'.main_content_right ul li\').length)
	{
		$(\'.main_content_right\').css("display", "none");
	}
	
	
	setInterval(function(){ updateChatbox(); }, 8000);
	
	
	///chattt
	'; ?>

		<?php $_from = $this->_tpl_vars['chatboxs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['level']['iteration']++;
?>
		    
		    
			
			<?php if ($this->_tpl_vars['item']['userid'] != '' && $this->_tpl_vars['item']['userid'] != 0 && $this->_tpl_vars['item']['typeid'] != ''): ?>
                                getChatbox(<?php echo $this->_tpl_vars['item']['userid']; ?>
, true, <?php echo $this->_tpl_vars['item']['typeid']; ?>
);			    
                        <?php endif; ?>

			
			
		<?php endforeach; endif; unset($_from); ?>
	<?php echo '
	
	
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
	})
	
	var date = new Date();
	var minutes = 120;
	date.setTime(date.getTime() + (minutes * 60 * 1000));
	$.cookie.settings = {
		    path : "/",
		    expires : date
	};
	
	
	$(\'#JobcatId\').select2({ maximumSelectionSize: 3, placeholder: "Chọn chức năng"});
	$(\'#JobindustId\').select2({ maximumSelectionSize: 3, placeholder: "Chọn ngành nghề"});
	$(\'#school_select\').select2({ maximumSelectionSize: 3, placeholder: "Chọn trường"});
	$(\'#subject_select\').select2({ placeholder: "Tìm môn liên kết"});
	
	$(".date_deadline").datepick();
	
	
	//$(\'#change_logoz a\').live("click",function() {
	//	//alert("sdfsdf");
	//	$(\'#change_logo_but\').trigger(\'click\');
	//});
	
});


</script>
'; ?>



<?php echo '
<style>
#body-wrapper {
	background-attachment:fixed!important;
	background-repeat:repeat;
}
</style>

<script type="application/x-javascript">
	
	function insertBrand(id, title){
		//alert(id);
		$(\'#brand_id_select\').append(\'<option value="\'+id+\'">\'+title+\'</option>\');
		$(\'#brand_id_select\').val(id);
		$(\'#new_brand_box\').css(\'display\', \'none\');
		
		
	}
	
	function getCart(p_id, amount) {
		var param = "";
		if(typeof(p_id)!=\'undefined\')
		{
			param += "&id="+p_id;
		}
		if(typeof(amount)!=\'undefined\') param += "&amount="+amount;
		
		//code
		$.ajax({
			url: "../index.php?do=product&action=getTopCartAjax"+param,
		}).done(function ( data ) {
			if( console && console.log ) {
				//alert(data);
				$(\'#topCart\').html(data);
				$(\'a.cart_link\').attr(\'href\', \'../index.php?do=product&action=add_cart\');
				$(\'a.cart_link\').attr(\'target\', \'_blank\');
				$(\'.item_rows\').hover(
					function () {
					    //$(\'#settingbox\').fadeIn();
					}
					,
					function () {
					    $(\'.item_rows\').fadeOut();
					}
				);
				
				//alert
				if(typeof(p_id)!=\'undefined\')
				{
					//alert("'; ?>
<?php echo $this->_tpl_vars['_added_to_cart']; ?>
<?php echo '");
					//$(\'#box_alert\')
					$(\'#hiddenclicker\').trigger(\'click\');
				}
			}
		});
	}
	
	function removeCartItem(id, row, down) {
		//code
		//alert(down.replace(/\\./g, ""));
		//alert($.number($(\'#cart_total\').html().replace(/\\./g, "") - down.replace(/\\./g, ""), 0, \',\', \'.\'));
		
		$.ajax({
			url: "../index.php?do=product&action=add_cart&task=remove&cartitemid="+id,
		}).done(function ( data ) {
			if( console && console.log ) {
				//alert(data);
				$(row).parent().parent().fadeOut();
				$(\'#cart_count\').html($(\'#cart_count\').html()-1);
				
				$(\'#cart_total\').html($.number($(\'#cart_total\').html().replace(/\\./g, "") - down.replace(/\\./g, ""), 0, \',\', \'.\'));
				
			}
		});
	}
	
	function getInbox() {
		//code
		$.ajax({
			url: "../index.php?do=product&action=ajaxInbox",
		}).done(function ( data ) {
			if( console && console.log ) {
				$("#inbox_out").html(data);
			}
		});
	}
	
	
</script>

	'; ?>



</head>
<body>
	<?php if ($this->_tpl_vars['pb_userinfo']['current_type'] == 6): ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "topmenu_study.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php else: ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "topmenu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php endif; ?>
	
<div id="content_bkg">
<div id="basePageFrame">
    <div class="header clearfix" style="display: none">
	
        <div class="header_nav">
       </div>
       <div class="login_info"><?php echo ((is_array($_tmp=$this->_tpl_vars['_hello'])) ? $this->_run_mod_handler('sprintf', true, $_tmp, $this->_tpl_vars['UserName']) : sprintf($_tmp, $this->_tpl_vars['UserName'])); ?>
(<a href="personal.php" style="text-decoration:underline;"><?php echo $_SESSION['MemberName']; ?>
</a>)
       <?php if ($this->_tpl_vars['menu']['pms'] && $this->_tpl_vars['newpm']): ?><a href="pms.php" title=""><img src="../images/message.gif" alt="<?php echo $this->_tpl_vars['newpm']; ?>
" /></a><?php endif; ?>
       </div>
    </div>
    <div class="header_txt">
       <div class="welcome_txt">
	   <span class="title" id="welcome-to"><?php echo $this->_tpl_vars['_welcome_to_office']; ?>
</span>
	   <form name="searchFrm" id="HeadSearchFrm" action="../index.php" target="_blank" method="get">
	   <input type="hidden" name="do" value="offer" />
	   <input type="hidden" name="action" value="lists" />
	   <span class="search"><input name="q" type="text"  id="SearchKeyword" value="<?php echo $this->_tpl_vars['_input_keywords']; ?>
" onfocus="if(this.value=='<?php echo $this->_tpl_vars['_input_keywords']; ?>
') this.value='';" onblur="if(this.value=='') this.value='<?php echo $this->_tpl_vars['_input_keywords']; ?>
';" class="input_white" /><input type="submit" value="<?php echo $this->_tpl_vars['_search']; ?>
" onclick="if($('#SearchKeyword').val()=='<?php echo $this->_tpl_vars['_input_keywords']; ?>
') alert('<?php echo $this->_tpl_vars['_input_keywords']; ?>
');$('#SearchKeyword').focus();return false;" /></span>
	   </form>
	   </div>
       <!--<div class="welcome_txt_small"><span><?php echo $this->_tpl_vars['_service_hotline']; ?>
<?php echo $this->_tpl_vars['service_tel']; ?>
</span></div>-->
   </div>
   <div id="main-nav">
	 <div class="nav-wrapper">
		<ul>
			<li><a href="index.php" id="home-page"><span><?php echo $this->_tpl_vars['_office_homepage']; ?>
</span></a></li>
			
			<li><a class="current_nav" href="offer.php" id="info-manage"><span><?php echo $this->_tpl_vars['_info_manage']; ?>
</span></a></li>
			<?php if ($this->_tpl_vars['hasProfile'] && $this->_tpl_vars['membertype_id'] == 6): ?>
			      <li><a class="" href="<?php echo smarty_function_the_url(array('module' => 'studypost','action' => 'memberpage','id' => ($this->_tpl_vars['pb_userinfo']['id'])), $this);?>
" id="info-manage"><span><?php echo $this->_tpl_vars['pb_userinfo']['first_name']; ?>
 <?php echo $this->_tpl_vars['pb_userinfo']['last_name']; ?>
</span></a></li>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['COMPANYINFO']['cache_spacename'] && $this->_tpl_vars['COMPANYINFO']['status'] == 1 && $this->_tpl_vars['MEMBER']['membertype_id'] != 5): ?><li class="shop_menu"><a href="<?php echo $this->_tpl_vars['COMPANYINFO']['space_url']; ?>
" target="_blank"><span><?php echo $this->_tpl_vars['COMPANYINFO']['shop_name']; ?>
</span></a></li><?php endif; ?>
			<li><a href="../logging.php?action=logout"><span><?php echo $this->_tpl_vars['_login_out']; ?>
</span></a></li>
		</ul>
	</div>
  </div>
   
   <?php if ($this->_tpl_vars['no_company_info']): ?><div class="no_editable"></div><p class="no_company_info"><?php echo $this->_tpl_vars['_pls_complete_company_info']; ?>
<span onclick="javascript:history.back()">X</span></p><?php endif; ?>
   
   
   
   <?php echo '
<script>
	function checkBrandOverBoxCheck() {
		var result = true;
		
		if ($(\'#dataBrandName\').val() == \'\') {
			$(\'#dataBrandName\').after(\'<label for="dataBrandName" generated="true" class="error">Nội dung yêu cầu nhập</label>\');
			result = false;
		}
		
		if (result) {
			$(\'#save_brand\').attr(\'disabled\',true);
			$(\'#save_brand\').val(\'Đang thực hiện...\');
		}
		
		return result;
	}
	
	jQuery(document).ready(function($) {
		$("#IKK").validate({
		submitHandler: function(form) {
	
							//$(\'#dataProductIndustryId4\').css(\'border\', \'solid 1px red\');
							$(form).find(":submit").attr("disabled", true).attr("value",pb_lang.DO_PROCESSING);
							document.GetDocumentByID(\'#save\').click();
			
		}
		});
	})	
</script>
'; ?>

   
<div id="new_brand_box" style="display: none;">
	
	<span class="close_box_but" onclick="$('#new_brand_box').css('display', 'none')">X</span>
	
	
	
	<div class="new_brand_box_inner" style="padding: 0px 20px 10px 20px;width: 906px">
		
		<iframe style="display: none" name="BrandOverFrame" id="BrandOverFrame"></iframe>
	
			 <div class="content_inner">
			 
			<div class="offer_info_title"><h2><?php echo $this->_tpl_vars['_brands']; ?>
</h2></div>	
				
				
<form id="#IKK" target="BrandOverFrame" method="post" action="brand.php" enctype="multipart/form-data" onsubmit="return checkBrandOverBoxCheck()">
	  <?php echo smarty_function_formhash(array(), $this);?>

	  <input type="hidden" name="target" value="1" />
	  <input type="hidden" name="formattribute_ids" value="<?php echo $this->_tpl_vars['item']['formattribute_ids']; ?>
" />
        <div class="hint"><?php echo $this->_tpl_vars['_must_input_with_star']; ?>
</div>
        <table class="offer_info_content">
			  <tr>
				<th><?php echo $this->_tpl_vars['_brand_name']; ?>
<font class="red">*</font></th>
				<td class="tdright"><input style="width: 350px;" placeholder="<?php echo $this->_tpl_vars['_brand_name_desc']; ?>
 (<?php echo $this->_tpl_vars['_ex_logo_brand']; ?>
)" name="data[brand][name]" type="text" id="dataBrandName" value="">
				</td>
			  </tr>
			
			  
		<tr>
				<th valign="top"><?php echo $this->_tpl_vars['_brand_image']; ?>
</th>
                    <td>
			
                        <input name="pic" type="file" id="uploadfile" onchange="preview()" />
                         <span class="gray"><br>
                            <?php echo $this->_tpl_vars['_image_size_format_provision']; ?>
</span></td>
		    
                    </tr>
			  <tr>
                    <th valign="top"><?php echo $this->_tpl_vars['_description']; ?>
</th>
                    <td class="tdright"><textarea name="data[brand][description]" id="BrandDescription" rows="8" wrap="VIRTUAL" style="width:700px;"></textarea><div id="txtTips"></div></td>
              </tr>
			
                   
			  <tr>
				<th class="circle_bottomleft"></th>
				<td class="circle_bottomright"><input name="save" type="submit" class="save_brand" id="savez" value=" <?php echo $this->_tpl_vars['_confirm_submit']; ?>
 " /></td>
			  </tr>
		</table>
	</form>

</div>

	</div>
	
</div>
   
   
   <div id="chat-frame">
    
   </div>
   
   
<div id="upgrade_shop" class="notifybox" style="display: none">
	<div class="notifybox_inner">
		<span class="notifybox_close_box_but" onclick="$(this).parent().parent().css('display', 'none')">X</span>
		<h2>Đăng ký tạo SHOP</h2>
		<h3>Bạn là:</h3>
		<ul class="select_shop_type">
			<li><a href="company.php?do=change_grouptype&id=2">Cá Nhân</a></li>
			<li><a href="company.php?do=change_grouptype&id=1">Cửa Hàng</a></li>
			<li><a href="company.php?do=change_grouptype&id=3">Công Ty</a></li>
		</ul>
	</div>
</div>

<div id="upgrade_company" class="notifybox" style="display: none">
	<div class="notifybox_inner">
		<span class="notifybox_close_box_but" onclick="$(this).parent().parent().css('display', 'none')">X</span>
		<h2>Đăng ký tạo SHOP</h2>
		<h3>Bạn là:</h3>
		<ul class="select_shop_type">
			<li><a href="company.php?do=upgrade_company&id=1">Cá Nhân</a></li>
			<li><a href="company.php?do=upgrade_company&id=3">Cửa Hàng</a></li>
			<li><a href="company.php?do=upgrade_company&id=2">Công Ty</a></li>
		</ul>
	</div>
</div>