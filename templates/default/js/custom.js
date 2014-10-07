    function addAreaMarker(lat,lng,html) {
	var point = new VLatLng(lat,lng);
	var marker = new VMarker(point);
	map.addOverlay(marker);
	VEvent.addListener(marker, 'click', function(obj, latlng) {
            //obj.openInfoWindow('Bạn vừa click lên marker');
	    alert("dd");
        });
	VEvent.addListener(marker, 'mouseover', function(obj) {
	    obj.openInfoWindow(html);
	});
	VEvent.addListener(marker, 'mouseout', function(obj) {
	    obj.closeInfoWindow();
	});
    }
    
    function getlatlng(pt)
    {
	if (map != null)
	{
	    console.log(pt);
	    if (pt.latitude == 0 && pt.longitude == 0)
		alert("Không tìm thấy.");
	    else
	    {
		var marker = new VMarker(pt, new VIcon());
		map.addOverlay(marker);
		map.setCenter(pt, 12);
		map.openInfoWindow(pt, 'Hồ Chí Minh');
	    }
	}
    }
    
    var map;
    function loadMap(lat,lng,zoom)
    {
	if (typeof(lat)=='undefined') {
	    lat = 16.0458134537522;
	}
	if (typeof(lng)=='undefined') {
	    lng = 107.5341796875;
	}
	if (typeof(zoom)=='undefined') {
	    zoom = 5;
	}
	if (VBrowserIsCompatible())
	{
	    map = new VMap(document.getElementById('vietbando_map'));
	    var pt = new VLatLng(lat, lng);
	    map.setCenter(pt, zoom);
	    //map.openInfoWindow(map.getCenter(), '<strong>Hello</strong>, Vietbando');
	    
	    //var client = new VClientGeocoder();
	    //client.getLatLng('444/4 CMT8, F11, quận 3, ho chi minh', 'getlatlng');
	}
    }
    
    function ajaxLoadModule(boxid, ajax_function, param_name, param_value, page, industry_id) {
	var type = '';
	var pages = '';
	var industry_s = '';
	var row_s = '';
	var num_per_row_s = '';
	if (typeof(param_value)!='undefined' && param_value!='') {
	    type = '&'+param_name+'='+param_value;
	}
	if (typeof(page)!='undefined' && page!='') {
	    pages = '&p='+page;
	}
	if (typeof(industry_id)!='undefined' && industry_id!='') {
	    industry_s = '&industry_id='+industry_id;
	}
	if (typeof(row)!='undefined' && row!='') {
	    row_s = '&row='+row;
	}
	if (typeof(num_per_row)!='undefined' && num_per_row!='') {
	    num_per_row_s = '&num_per_row='+num_per_row;
	}
	var box = $('.'+boxid);
	box.addClass("area-module-loading");
	$.ajax({
		url: "index.php?do=area&action="+ajax_function+"&area_id="+AREA_ID+"&areatype_id="+AREATYPE_ID+type+pages+industry_s+row_s+num_per_row_s,
	}).done(function ( data ) {
	    if( console && console.log ) {
		if(data != '')
		{
		    box.html(data);
		    box.show();
		    box.removeClass("area-module-loading");
		    box.removeClass("starting");
		    //alert(box.find('.pic span').length);
		    if (!box.find('.pic span').length) {
			box.find('.pic img').resizecrop({
			    width:143,
			    height:143
			});
		    }
		    
		    //paging
		    if($(data).filter('#cccount').html()) {
			//alert($(data).filter('#cccount').html());
			pagination($(data).filter('#cccount').html(), $(data).filter('#pppage').html())
		    }
		}
	    }
	});
    }
    
    function insertChatImage(image, box) {
	$('#chat-frame #chat-box-'+box+' textarea').val("<div class='ajax-loader'>Đang tải ảnh...</div>");
	postChatNew(box, image);
    }
    
    function getInbox() {
	if(getInbox_xhr && getInbox_xhr.readystate != 4){
		getInbox_xhr.abort();
	}
	//code
	getInbox_xhr = $.ajax({
		url: "index.php?do=product&action=ajaxInbox",
	}).done(function ( data ) {
		if( console && console.log ) {
			$("#inbox_out").html(data);
		}
	});
    }
    
    function getAnnounce(ann_count)
    {
	if(getAnnounce_xhr && getAnnounce_xhr.readystate != 4){
		getAnnounce_xhr.abort();
	}
	getAnnounce_xhr = $.ajax({
			   url: "index.php?do=product&action=getAnnounce",
		   }).done(function ( data ) {
			   if( console && console.log ) {
				   //alert(data);
				   $('#announce-frame').prepend(data);
				   
				   $('#announce-frame .announce-box').each(function(index){				    
				       if (!$(this).hasClass("showed")) {
					   $(this).addClass("ann"+ann_count);
					   $(this).addClass("showed");
					   setTimeout(function(){$(".ann"+ann_count).fadeOut()}, 60000);					
				       }				    
				   });
			   }
		   });
    }
    
    function renderProductHSlide() {
	//Top New Product Main Page
	var tp_page_num = Math.ceil($('.top_new_product_main .box ul li').length/5);
	var tp_html = '<div class="nav"><ul><li class="pointer prev"><</li>';
	for(var i=1; i<=tp_page_num; i++) {
	  tp_html += '<li class="num" rel="'+i+'">'+i+'</li>';
	}
	tp_html += '<li class="pointer next">></li></ul></div>';
	$('.top_new_product_main .box_inner').append(tp_html);
	$('.top_new_product_main .box_inner .nav ul li.num').eq(0).addClass("active");
	
	$('.top_new_product_main .box_inner .nav ul li.num').click(function() {
	    var element_width = ($('.top_new_product_main .box ul li.product').width()+22)*5;
	    var margin = element_width*($(this).html()-1);
	    //$('.top_new_product_main .box ul.products_').css("margin-left",-margin);
	    $(".top_new_product_main .box ul.products_").animate({
		marginLeft: '-'+margin+'px'
	    }, 700);
	    
	    $('.top_new_product_main .box_inner .nav ul li.num').removeClass("active");
	    $(this).addClass("active");
	});
	$('.top_new_product_main .box_inner .nav ul li.prev').click(function() {
	    var current = $('.top_new_product_main .box_inner .nav ul li.active').attr("rel");
	    $('.top_new_product_main .box_inner .nav ul li.num[rel='+(current-1)+']').trigger("click");
	});
	$('.top_new_product_main .box_inner .nav ul li.next').click(function() {
	    var current = $('.top_new_product_main .box_inner .nav ul li.active').attr("rel");
	    $('.top_new_product_main .box_inner .nav ul li.num[rel='+(parseInt(current)+1)+']').trigger("click");
	});
    }
    
    function resetKeyword() {	
	if (orderby == 'all' || $('#ProductName').val() == "") {
	    orderby = 'dateline';
	    $(".hotnewlist").removeClass("active");
	    $('#new_product_but').addClass("active");
	    $(".keyword_header").hide();
	}
	$('#ProductName').val("");
    }
    
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
    
    function getBottomIndustryList() {
	$.ajax({
	    url: "index.php?do=product&action=getBottomIndustryList",
	}).done(function ( data ) {
	    $('.bottom_industry_list').html(data);
	});
    }
    
    function getBottomRelatedProducts(a,b) {
	$.ajax({
	    url: "index.php?do=product&action=getBottomRelatedProducts&industry_id="+a+"&member_id="+b,
	}).done(function ( data ) {
	    $('.related_products_bottom').html(data);
	});
    }
    
    function updateChatboxNew()
    {
	if(updateChatboxNew_xhr && updateChatboxNew_xhr.readystate != 4){
	    updateChatboxNew_xhr.abort();
	}
	updateChatboxNew_xhr = $.ajax({
	    url: "index.php?do=product&action=updateChatboxNew",
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
								'<img width="40" height="40" src="'+companylogo+'" class="avatar">'+
								$('#chat-frame #chat-box-'+id+' textarea').val()+
							    '<span class="status">đang gửi...</span></li>');
	
	$('#chat-frame #chat-box-'+id+' .chat-list ul li.temp').emotions({
	    handle: "a#toggle",
	    css: null //Note: don't put comma (,) after the last property
	});
	
	$('#chat-frame #chat-box-'+id+' textarea').val("");
	$('#chat-frame #chat-box-'+id+' .chat-list').scrollTop($('#chat-frame #chat-box-'+id+' .chat-list')[0].scrollHeight);
	
			$.ajax({
			    type: "POST",
			    url: "index.php?do=product&action=postChatNew",
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
	    url: "index.php?do=product&action=removeChatboxNew&id="+uid,
	}).done(function ( data ) {
	    clearInterval(ichatbox[uid]);
	});
    }
    
    
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
		url: "index.php?do=product&action=ajaxUpdateChatsNew&ids="+ids+typing,
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
			    if(nneeww) $('#chat-frame #chat-box-'+i+' .chat-list').scrollTop($('#chat-frame #chat-box-'+i+' .chat-list').scrollTop()+66);
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
	    url: "index.php?do=product&action=getChatboxNew&id="+uid,
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
	
	
	
	function getChatFriendList(id) {	    
	    $('.chat_friend_list').css("height",$(window).height());
	    
	    if(getChatFriendList_xhr && getChatFriendList_xhr.readystate != 4){
		getChatFriendList_xhr.abort();
	    }
	    getChatFriendList_xhr = $.ajax({
		url: "index.php?do=studypost&action=getChatFriendList&id="+id			
	    }).done(function ( data ) {
		if( console && console.log ) {
		    
		    $('.chat_friend_list .main_list').html(data);
		    $('.chat_friend_list .scroll_list').css("height",$(window).height()-103);
		    if($('.chat_friend_list').css("right") == "0px")
		    {
			if(!$('.chat_friend_list .scroll_list').hasClass("mCustomScrollbar"))
			{
			    $('.chat_friend_list .scroll_list').mCustomScrollbar({
					    	autoHideScrollbar:true,
					    	theme:"light-thin",
					    	scrollSpeed: 40
					    });
			}
		    }
		}
	    });
	}
	
	function checkSelectStudypostType() {
	    var type = $('#job-learn select[name=type]').val();
	    
	    if (type == '') {
		alert("Bạn phải chọn: Trường / Môn học / Học viên");
		return false;
	    }
	    return true;
	}
	
	function loadStudygrouppicComment(box)
	{
		box.addClass('cloading');
		$.ajax({
				type: "POST",
				url: box.find('.comments-box form').attr("action"),
				data: "id="+box.find('.comments-box #pid').val()
			}).done(function ( data ) {
				if( console && console.log ) {
					//alert(data);
					box.find('.comments_list').html(data);
					
					if(box.find('.comments-box').css("display") != "none")
					{
					    box.find('.comments_list').mCustomScrollbar({
					    	autoHideScrollbar:true,
					    	theme:"light-thin",
					    	scrollSpeed: 40
					    });
					}
					
					
					box.removeClass('cloading');
				}
			});
	}
	
	function getStudygrouppictureDetail(id, index)
	  {
	    $('.offerbox-outer').html("<div class='offer-loading'>.</div>");
	    $("#offerbox-but").trigger("click");
	    
	        $.ajax({
			url: "index.php?do=studypost&action=getStudygrouppicDetail&id="+id			
		}).done(function ( data ) {
			if( console && console.log ) {
				//alert(data);
				
				$('.offerbox-outer').html(data);
				
				  //$("#offerbox-but").trigger("click");
				  
				  //for offer album
				  $('.left-offerbox a img').css("display", "none");
				  $('.left-offerbox a img[rel='+index+']').addClass("active");
				  $('.pic_description .pic_description_item[rel='+index+']').addClass("active");
				  
				  $('.offer_content_inner .left-offerbox span.next').click(function() {
				    $('.left-offerbox a img').each(function() {
				      if ($(this).hasClass("active")) {				     
					$(this).removeClass("active");
					$('.pic_description .pic_description_item[rel='+$(this).attr("rel")+']').removeClass("active");
					
					if ($(this).next().length) {
					  $(this).next().addClass("active");
					  $('.pic_description .pic_description_item[rel='+$(this).next().attr("rel")+']').addClass("active");
					}
					else
					{
					  $('.left-offerbox a img').eq(0).addClass("active");
					  $('.pic_description .pic_description_item[rel='+$('.left-offerbox a img').eq(0).attr("rel")+']').addClass("active");
					}					
					return false;
				      }
				    });
				  });
				  $('.offer_content_inner .left-offerbox span.previous').click(function() {
				    $('.left-offerbox a img').each(function() {
				      if ($(this).hasClass("active")) {				     
					$(this).removeClass("active");
					$('.pic_description .pic_description_item[rel='+$(this).attr("rel")+']').removeClass("active");
					
					if ($(this).prev().length) {
					  $(this).prev().addClass("active");
					  $('.pic_description .pic_description_item[rel='+$(this).prev().attr("rel")+']').addClass("active");
					}
					else
					{
					  $('.left-offerbox a img:last-child').addClass("active");
					  $('.pic_description .pic_description_item[rel='+$('.left-offerbox a img:last-child').attr("rel")+']').addClass("active");
					}					
					return false;
				      }
				    });
				  });
				  
				  $('.left-offerbox a').click(function() {
				    //$('.offer_content_inner .left-offerbox span.next').trigger("click");
				  });
				  
				  
				  
				  //$('.offer_transform ul.products li.product[rel="'+id+'"]').removeClass('loading');
                                  
                                  if ($('.left-offerbox img').length < 2) {
                                        $('.left-offerbox span').remove();
                                  }
				  
				$('.pic_description_item').each(function() {
				    loadStudygrouppicComment($(this).find('.detail-comments'));
				});
//				  
//				  $('#comment').val($.cookie("comment_tpm"));
			}
		});
	}
	
	function loadSchoolpicComment(box)
	{
		box.addClass('cloading');
		$.ajax({
				type: "POST",
				url: box.find('.comments-box form').attr("action"),
				data: "id="+box.find('.comments-box #pid').val()
			}).done(function ( data ) {
				if( console && console.log ) {
					//alert(data);
					box.find('.comments_list').html(data);
					
					if(box.find('.comments-box').css("display") != "none")
					{
					    box.find('.comments_list').mCustomScrollbar({
					    	autoHideScrollbar:true,
					    	theme:"light-thin",
					    	scrollSpeed: 40
					    });
					}
					
					
					box.removeClass('cloading');
				}
			});
	}
	
	function getSchoolpictureDetail(id, index)
	  {
	    $('.offerbox-outer').html("<div class='offer-loading'>.</div>");
	    $("#offerbox-but").trigger("click");
	    
	        $.ajax({
			url: "index.php?do=studypost&action=getSchoolpicDetail&id="+id			
		}).done(function ( data ) {
			if( console && console.log ) {
				//alert(data);
				
				$('.offerbox-outer').html(data);
				
				  //$("#offerbox-but").trigger("click");
				  
				  //for offer album
				  $('.left-offerbox a img').css("display", "none");
				  $('.left-offerbox a img[rel='+index+']').addClass("active");
				  $('.pic_description .pic_description_item[rel='+index+']').addClass("active");
				  
				  $('.offer_content_inner .left-offerbox span.next').click(function() {
				    $('.left-offerbox a img').each(function() {
				      if ($(this).hasClass("active")) {				     
					$(this).removeClass("active");
					$('.pic_description .pic_description_item[rel='+$(this).attr("rel")+']').removeClass("active");
					
					if ($(this).next().length) {
					  $(this).next().addClass("active");
					  $('.pic_description .pic_description_item[rel='+$(this).next().attr("rel")+']').addClass("active");
					}
					else
					{
					  $('.left-offerbox a img').eq(0).addClass("active");
					  $('.pic_description .pic_description_item[rel='+$('.left-offerbox a img').eq(0).attr("rel")+']').addClass("active");
					}					
					return false;
				      }
				    });
				  });
				  $('.offer_content_inner .left-offerbox span.previous').click(function() {
				    $('.left-offerbox a img').each(function() {
				      if ($(this).hasClass("active")) {				     
					$(this).removeClass("active");
					$('.pic_description .pic_description_item[rel='+$(this).attr("rel")+']').removeClass("active");
					
					if ($(this).prev().length) {
					  $(this).prev().addClass("active");
					  $('.pic_description .pic_description_item[rel='+$(this).prev().attr("rel")+']').addClass("active");
					}
					else
					{
					  $('.left-offerbox a img:last-child').addClass("active");
					  $('.pic_description .pic_description_item[rel='+$('.left-offerbox a img:last-child').attr("rel")+']').addClass("active");
					}					
					return false;
				      }
				    });
				  });
				  
				  $('.left-offerbox a').click(function() {
				    //$('.offer_content_inner .left-offerbox span.next').trigger("click");
				  });
				  
				  //$('.offer_transform ul.products li.product[rel="'+id+'"]').removeClass('loading');
                                  
                                  if ($('.left-offerbox img').length < 2) {
                                        $('.left-offerbox span').remove();
                                  }
				  
				$('.pic_description_item').each(function() {
				    loadSchoolpicComment($(this).find('.detail-comments'));
				});
				  
				  $('#comment').val($.cookie("comment_tpm"));
			}
		});
	}
	
	
	function toggleStudpicComment(box)
	{
	    if (box.find('form.picdes').hasClass("fhide")) {
		box.find('form.picdes').removeClass("fhide");
		box.find('form.picdes textarea').focus();
		box.find('.content').addClass("fhide");
		box.find('h4').addClass("fhide");
	    }
	    else
	    {
		box.find('form.picdes').addClass("fhide");		
		box.find('.content').removeClass("fhide");
		box.find('h4').removeClass("fhide");
	    }
	}
	
	function loadStudymemberimageComment(box)
	{
		box.addClass('cloading');
		$.ajax({
				type: "POST",
				url: box.find('.comments-box form').attr("action"),
				data: "id="+box.find('.comments-box #pid').val()
			}).done(function ( data ) {
				if( console && console.log ) {
					//alert(data);
					box.find('.comments_list').html(data);
					
					if(box.find('.comments-box').css("display") != "none")
					{
					    box.find('.comments_list').mCustomScrollbar({
					    	autoHideScrollbar:true,
					    	theme:"light-thin",
					    	scrollSpeed: 40
					    });
					}
					
					
					box.removeClass('cloading');
				}
			});
	}
	
	function postStudymemberimageComment(box)
	{
		valid = true;
		var guest_string = '';
		if (!box.find('#icomment').val().trim()) {
			alert(box.find('#icomment').val().trim());
			box.find('#icomment').addClass('invalid');
			box.find('#icomment').focus();
			box.find('#icomment').val("");
			valid = false;
		}
		else
		{
			box.find('#icomment').removeClass('invalid');			
		}
		
		//check guest
		if(box.find('#guest_name').length)
		{			
			if(box.find('#guest_name').val() == '' || box.find('#guest_email').val() == '')
			{		
				box.find('#guest_isedit').val("1");
				$("#guestbox-but").trigger("click");
				//$('input[name="box_guest_name"]').focus();
				valid = false;
			}
			else
			{
				guest_string = '&data[guest_name]='+box.find('#guest_name').val()+'&data[guest_email]='+box.find('#guest_email').val();
			}
		}
		
		if (valid) {
			box.addClass('cloading');
			box.find("#icomment").prop('disabled', true);
			
			//$.cookie("comment_tpm", null);
			
			$.ajax({
				type: "POST",
				url: box.find('.comments-box form').attr("action"),
				encoding: "UTF-8",
				data: "data[content]="+encodeURI(box.find('#icomment').val())+"&formhash="+box.find('#FormHash').val()+"&data[id]="+box.find('.comments-box #pid').val()+guest_string
			}).done(function ( data ) {
				if( console && console.log ) {
					//alert(data);
					box.find('.comments_list').html(data);
					//
					
					
					box.find(".comments_list").mCustomScrollbar({
						autoHideScrollbar:true,
						theme:"light-thin",
						scrollSpeed: 40
					});
					
					box.removeClass('cloading');
					box.find('#icomment').val("");
					box.find('#icomment').prop('disabled', false);
					
					//update count
					box.find('.comment_count').html(parseInt(box.find('.comment_count').html())+1);
					
					
					
					////
					//getInbox();
					
					//if(box.find('#guest_name').length && !$('.offer-detail-is').length)
					//{
					//    $("#offerbox-but").trigger("click");
					//    loadOfferComment();
					//}
				}
			});
		}
	}
	    
	    
	  function getStudypictureDetail(id, index)
	  {
	    $('.offerbox-outer').html("<div class='offer-loading'>.</div>");
	    $("#offerbox-but").trigger("click");
	    
	        $.ajax({
			url: "index.php?do=studypost&action=getStudypictureDetail&id="+id			
		}).done(function ( data ) {
			if( console && console.log ) {
				//alert(data);
				
				$('.offerbox-outer').html(data);
				
				  //$("#offerbox-but").trigger("click");
				  
				  //for offer album
				  $('.left-offerbox a img').css("display", "none");
				  $('.left-offerbox a img[rel='+index+']').addClass("active");
				  $('.pic_description .pic_description_item[rel='+index+']').addClass("active");
				  
				  $('.offer_content_inner .left-offerbox span.next').click(function() {
				    $('.left-offerbox a img').each(function() {
				      if ($(this).hasClass("active")) {				     
					$(this).removeClass("active");
					$('.pic_description .pic_description_item[rel='+$(this).attr("rel")+']').removeClass("active");
					
					if ($(this).next().length) {
					  $(this).next().addClass("active");
					  $('.pic_description .pic_description_item[rel='+$(this).next().attr("rel")+']').addClass("active");
					}
					else
					{
					  $('.left-offerbox a img').eq(0).addClass("active");
					  $('.pic_description .pic_description_item[rel='+$('.left-offerbox a img').eq(0).attr("rel")+']').addClass("active");
					}					
					return false;
				      }
				    });
				  });
				  $('.offer_content_inner .left-offerbox span.previous').click(function() {
				    $('.left-offerbox a img').each(function() {
				      if ($(this).hasClass("active")) {				     
					$(this).removeClass("active");
					$('.pic_description .pic_description_item[rel='+$(this).attr("rel")+']').removeClass("active");
					
					if ($(this).prev().length) {
					  $(this).prev().addClass("active");
					  $('.pic_description .pic_description_item[rel='+$(this).prev().attr("rel")+']').addClass("active");
					}
					else
					{
					  $('.left-offerbox a img:last-child').addClass("active");
					  $('.pic_description .pic_description_item[rel='+$('.left-offerbox a img:last-child').attr("rel")+']').addClass("active");
					}					
					return false;
				      }
				    });
				  });
				  
				  $('.left-offerbox a').click(function() {
				    //$('.offer_content_inner .left-offerbox span.next').trigger("click");
				  });
				  
				  
				  
				  //$('.offer_transform ul.products li.product[rel="'+id+'"]').removeClass('loading');
                                  
                                  if ($('.left-offerbox img').length < 2) {
                                        $('.left-offerbox span').remove();
                                  }
				  
				$('.pic_description_item').each(function() {
				    loadStudymemberimageComment($(this).find('.detail-comments'));
				});
//				  
//				  $('#comment').val($.cookie("comment_tpm"));
			}
		});
	}
	
	
	
	
	
    
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
	    $('li[chat-id="'+item.id+'"] .chatimage_thumb').fancybox();
	    //scroll to bottom
	    $('#chat-frame #chat-box-'+uid+' .chat-list').scrollTop($('#chat-frame #chat-box-'+uid+' .chat-list')[0].scrollHeight);
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
    
    var chat_page = 1;
    var chat_scroll = true;
    function getTopChat() {
	//code
	$.ajax({
		url: "index.php?do=product&action=getTopChatAnnounce",
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
		url: "index.php?do=product&action=getTopChatAnnounce&page="+chat_page,
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
    
    function updateChatbox()
    {
	$.ajax({
	    url: "index.php?do=product&action=updateChatbox",
	}).done(function ( data ) {
	    //alert(data);
	    var arr = jQuery.parseJSON(data);
	    $(arr).each(function(index,value) {
		//alert(value.id);
		if ($('#chat-box-'+value.id).length>0) {
		    if ($('#chat-box-'+value.id).hasClass('hidden')) {
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
	//$('#chat-frame #chat-box-'+uid+' .chat-form textarea').focus();
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
    
    function postChat(id, content, hash, membertype_id)
    {
	if(typeof(membertype_id)==='undefined') membertype_id = 0;
	//membertype_id
	var type_str = "";
	if (membertype_id) {
	    type_str = "&membertypeid="+membertype_id;
	}
	
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
	
	$('#chat-frame #chat-box-'+id+' .chat-list ul li.temp').emotions({
	    handle: "a#toggle",
	    css: null //Note: don't put comma (,) after the last property
	});
	
	$('#chat-frame #chat-box-'+id+' textarea').val("");
	$('#chat-frame #chat-box-'+id+' .chat-list').scrollTop($('#chat-frame #chat-box-'+id+' .chat-list')[0].scrollHeight);
	
			$.ajax({
			    type: "POST",
			    url: "index.php?do=product&action=postChat"+type_str,
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
    
    function getChatbox(uid, hide, membertype_id)
    {
	if(typeof(membertype_id)==='undefined') membertype_id = 0;
	//membertype_id
	var type_str = "";
	if (membertype_id) {
	    type_str = "&membertypeid="+membertype_id;
	}
	
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
	    url: "index.php?do=product&action=getChatbox&id="+uid+type_str,
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
		    removeChatbox(uid);	
		});
		
		//post chat
		$('#chat-frame #chat-box-'+uid+' .post-content').keydown(function(event) {
		    if (event.keyCode == 13) {
			event.preventDefault();
			
			var membertype_id = $('#chat-frame #chat-box-'+uid).attr('member-type');
		    	postChat(uid, $(this).val(), "zzz", membertype_id);
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
		//$('#chat-frame #chat-box-'+uid+' .post-content').focus();
	    }
	});
    }
	
	
	function goSearch() {
	    
	    $('#TopSearch .search_result').html('<div class="top_title">Đang tìm kiếm...</div><div class="no-search-top search-loading">Loading</div>');
	    $('#TopSearch .search_result').css("display", "block");
	    
	    clearTimeout(keytimeout);
	    
	    keytimeout = setTimeout(function(){
		fullTextSearch( $('#TopSearch input').val(),keyupcount);
	    }, 500);
	    
	    keyupcount++;
	    
	}
	
	//full text search
	function fullTextSearch(keyword, count) {
	    if(ajaxSearch_xhr && ajaxSearch_xhr.readystate != 4){
		ajaxSearch_xhr.abort();
	    }
	    if (keyupcount == count && keyword != '') {	
		ajaxSearch_xhr = $.ajax({
		    url: "index.php?do=product&action=ajaxSearch&type="+$('#verytopmenu .search-type .icon-search-box').attr("rel")+"&keyword="+encodeURIComponent(keyword)
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
				    $(this).addClass("active");
				},function () {
				    $('#TopSearch .search_result ul li').removeClass("active");
				    $('#TopSearch .search_result ul li:first-child').addClass("active");
				});
				
				//cart product image
				$('#TopSearch .search_result ul.shop img').resizecrop({
				   width:50,
				   height:50
				});
				$('#TopSearch .search_result ul.product img').resizecrop({
				   width:74,
				   height:74
				});
				
				if(!$('#TopSearch .search-scroll').hasClass("mCustomScrollbar"))
				{
				    $('#TopSearch .search-scroll').mCustomScrollbar({
					autoHideScrollbar:true,
					theme:"light-thin",
					scrollSpeed: 40
				    });
				}
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
		    //alert($('.detail-comments #comment').val().trim());
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
					    if(!$('.offer_detail_page').length) $("#offerbox-but").trigger("click");
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
	    
	    if(typeof(offertype) != 'undefined') ff += "&offertype="+offertype;
            
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
	var updateChatsNew_xhr;
	var ajaxSearch_xhr;
	var getInbox_xhr;
	var getAnnounce_xhr;
	var updateChatboxNew_xhr;
	var getChatFriendList_xhr;
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
		    if($('#TopSearch .search_result ul li').length > 0 && $('#TopSearch .search_result').css("display") != "none") {
			$('#TopSearch .search_result ul li.active').trigger("click");
			$('#TopSearch .search_result').css("display", "none");
		    }
		}
		
		if ($('#TopSearch .search_result ul li').length > 0) {
		    if (event.keyCode == 38)
		    {
			var currentli = $('#TopSearch .search_result ul li.active');
			if(currentli.prev().prop('tagName') == "LI")
			{
			    currentli.prev().addClass('active');
			    currentli.removeClass('active');
			    
			    var poss = ($('#TopSearch .search_result ul li.active').offset().top - $('.search-scroll').offset().top);
			    $('.search-scroll').mCustomScrollbar("scrollTo",poss-$('.mCSB_container').offset().top+200);
			}
		    }
		    if (event.keyCode == 40)
		    {
			var currentli = $('#TopSearch .search_result ul li.active');
			if(currentli.next().prop('tagName') == "LI")
			{
			    currentli.next().addClass('active');
			    currentli.removeClass('active');
			    
			    var poss = ($('#TopSearch .search_result ul li.active').offset().top - $('.search-scroll').offset().top);
			    $('.search-scroll').mCustomScrollbar("scrollTo",poss-$('.mCSB_container').offset().top+200);
			}
		    }
		}
		
		if ($(this).val() != "") {		    
		    if (event.keyCode != 38 && event.keyCode != 40 && event.keyCode != 13) goSearch();
		}
		else
		{
		    $('#TopSearch .search_result').css("display", "none");
		}
	    });
	    
	    $('#TopSearch input').live("focus", function(event){
		if ($(this).val() != "") {
		    //goSearch();
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
	    
	    //loadViewedHistory();
	    
	    
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
		
		$('#show-social').click(function(){
		
		   displayTet2014();
		
		});
		
		$('#menu-primary-navigation').hover(function() {
		    $('.banner-small-top').css("display","none");
		},
		function() {
		    $('.banner-small-top').css("display","block");
		}
		);
		
		
		$('#job-search-box .job-search-tab .tab-content select').select2();
		
		$('.pagination a, .pagination span').each(function( index ) {
		  if($.isNumeric($(this).html())) $(this).html(parseInt($(this).html()) + 1);
		  if($(this).html() == "2")
		  {
		     if (!$('.pagination span').length) {
		       $(this).before('<span>1</span>');
		     }
		     else
		     {
		       $(this).before('<a href="'+$(location).attr('href').replace("pos=", "posz=")+'">1</a>');
		     }
		  }
		});
		
		$('#TopWorkCategory ul.list-hot-cat li a').click(function(){		   
		    $('#job-learn input[name="type"]').val($(this).parent().attr('rel'));
		    $('#job-learn input[name="pos"]').remove();
		    $('#job-learn input[name="total_count"]').remove();
		    $('#job-learn form').submit();
		});
		
		$('#job-learn input[type="submit"]').click(function(){
		    $('#job-learn input[name="pos"]').remove();
		    $('#job-learn input[name="total_count"]').remove();
		});
		
		$('.job_city_link').click(function(){
		    $('#job-learn select[name="area"]').val($(this).attr('rel'));
		    $('#job-learn input[name="pos"]').remove();
		    $('#job-learn input[name="total_count"]').remove();
		    //$('#job-learn input[name="type"]').val('');
		    $('#job-learn form').submit();
		});
		
		//register tab
		//$('.you_are_form input[type="radio"]').removeAttr("checked");
		$('.main_user_select li').click(function() {
		    $('.main_user_select li').removeClass('active');
		    $(this).addClass('active');
		    
		    var type = $(this).attr("rel");
		    
		    
		    if (type == 'employee') {
			$('.you_are_form input[type="radio"]').removeAttr("checked");
			$('.you_are_form input[value="Employee"]').attr("checked","checked");
			$('.you_are_form').addClass("hide");
		    } else if(type == 'employer') {
			$('.you_are_form input[type="radio"]').removeAttr("checked");
			$('.you_are_form input[value="Employer"]').attr("checked","checked");
			$('.you_are_form').addClass("hide");
		    } else if(type == 'learner') {
			$('.you_are_form input[type="radio"]').removeAttr("checked");
			$('.you_are_form input[value="Learner"]').attr("checked","checked");
			$('.you_are_form').addClass("hide");
		    } else {
			$('.you_are_form').removeClass("hide");
		    }
		});
		//check for register type
		$('.main_user_select li.active').trigger("click");
                
                $('.joblevel_link').click(function(){		   
		    $('#job-learn input[name="type"]').val($(this).attr('rel'));
		    $('#job-learn input[name="pos"]').remove();
		    $('#job-learn input[name="total_count"]').remove();
		    $('#job-learn form').submit();
		});
                
                $('.job_indust_link').click(function(){		   
		    $('#job-learn select[name="indust"]').val($(this).attr('rel'));
		    $('#job-learn input[name="pos"]').remove();
		    $('#job-learn input[name="total_count"]').remove();
		    $('#job-learn form').submit();
		});
                
                $('.joblevel_link').click(function(){		   
		    $('#TopWorkCategory ul.list-hot-cat li[rel="'+$('.joblevel_link').attr("rel")+'"] a').trigger("click");
		});

                $(".quantity_val").keyup(function(){
                        $(this).parseNumber({format:"####", locale:"vn"});
                        $(this).formatNumber({format:"####", locale:"vn"});
                });

                $('.product_listing a.none,.product_listing img.none, .logo_box_u a, .red_box a').qtip({ // Grab some elements to apply the tooltip to
                    content: {
                        attr: 'title'                        
                    },
                    position: {
                        target: 'mouse', // Track the mouse as the positioning target
                        adjust: { x: 10, y: 25 } // Offset it slightly from under the mouse
                    }
                })
                
                $('.title_more_school_button').fancybox();
                
                
                $('.member-pics-album .thumbs .prev').addClass('ihide');
                if ($('.thumbs .inner_slider img').length < 5) {
                    $('.member-pics-album .thumbs .next').addClass('ihide');
                }
                $('.member-pics-album .thumbs .prev').click(function() {
                    var move = 1;
                    
                    for(var i = 0; i < move; i++)
                    {
                        if (parseInt( $('.thumbs .inner_slider').css("margin-left")) <  -121) {
                            $('.member-pics-album .thumbs .next').removeClass('ihide');
                            $('.thumbs .inner_slider').css("margin-left",parseInt( $('.thumbs .inner_slider').css("margin-left"))+122);
                        }
                        if (parseInt( $('.thumbs .inner_slider').css("margin-left")) >= -121)
                        {
                            $('.member-pics-album .thumbs .prev').addClass('ihide');
                        }
                    }
                });
                
                $('.member-pics-album .thumbs .next').click(function() {
                    var move = 1;
                    
                    for(var i = 0; i < move; i++)
                    {
                        if ($('.thumbs .inner_slider img').length*122 - 122*3 > -parseInt( $('.thumbs .inner_slider').css("margin-left"))) {
                            $('.thumbs .inner_slider').css("margin-left",parseInt( $('.thumbs .inner_slider').css("margin-left"))-122);
                            $('.member-pics-album .thumbs .prev').removeClass('ihide');
                        }
                        if ($('.thumbs .inner_slider img').length*122 - 122*3 <= -parseInt( $('.thumbs .inner_slider').css("margin-left")))
                        {
                            $('.member-pics-album .thumbs .next').addClass('ihide');
                        }
                    }
                });
		
		$('.pic_description .save').live("click", function(event) {
		    
		    var contentbox = $(this).parents('.pic_description_item');
		    
		    if ($.trim(contentbox.find('form.picdes textarea').val()) == "Thêm mô tả cho hình ảnh") {
			contentbox.find('form.picdes textarea').val("");
		    }
		    
		    if ($.trim(contentbox.find('form.picdes textarea').val()) == "") {
			contentbox.find('form.picdes textarea').val("");
		    }
		    
		    var data = $(this).parents('form').serialize();
		    
			$.ajax({
			    type: "POST",
			    url: $(this).parents('form.picdes').attr("action"),
			    encoding: "UTF-8",
			    data: data+"&id="+$('.left-offerbox a img.active').attr('rel')
			}).done(function ( data ) {
			    if( console && console.log ) {
				data = JSON.parse(data);
				//alert(data);
				contentbox.find('.content').html(data.withbreak);
				contentbox.find('form.picdes textarea').val(data.normal);
				toggleStudpicComment(contentbox);
				if(data.normal != '')
				{
				    contentbox.find('h4 a').html("Sửa mô tả cho hình ảnh");
				}
				else
				{
				    contentbox.find('h4 a').html("Thêm mô tả cho hình ảnh");
				    contentbox.find('form.picdes textarea').val("Thêm mô tả cho hình ảnh");
				}
			    }
			});
		});
		
		$('.pic_description .close').live("click", function(event) {
		    var contentbox = $(this).parents('.pic_description_item');
		    toggleStudpicComment(contentbox);	
		});
		
		$('.pic_description .pic_description_item h4 a').live("click", function(event) {
		    var contentbox = $(this).parents('.pic_description_item');
		    
		    toggleStudpicComment(contentbox);		    
		    
		});
		
		$('.overbox_del_studymempic').live("click", function() {
		    var ok = confirm("Bạn có chắc muốn xóa hình này!");
		    
		    if(ok)
		    {
			//alert($('.left-offerbox a img.active').attr("rel"));
			window.location = $('.left-offerbox a img.active').attr("del-url");
			//alert($('.left-offerbox a img.active').attr("del-url"));
		    }
		});
		
		$('.studymemberpic_textarea').live("keydown", function(event) {
			//$.cookie("comment_tpm", $('#comment').val());			
			if (event.keyCode == 13) {
			    event.preventDefault();
			    postStudymemberimageComment($(this).parents('.detail-comments'));
			}
		});
		
		$('.pic_description_form textarea').after('<span class="placeholder_textarea"></span>');
		
		//$('.pic_description_form textarea').live("keydown", function(event) {
		//	if ($.trim($(this).val()) == "Thêm mô tả cho hình ảnh") {
		//	    $(this).val("");
		//	}
		//});
		//$('.pic_description_form textarea').live("keyup", function(event) {
		//	if ($.trim($(this).val()) == "") {
		//	    $(this).val("Thêm mô tả cho hình ảnh");
		//	}
		//});
		$('.pic_description_form textarea').live("focus", function(event) {
			if ($.trim($(this).val()) == "Thêm mô tả cho hình ảnh") {
			    $(this).val("");
			}
		});
		$('.pic_description_form textarea').live("blur", function(event) {
			if ($.trim($(this).val()) == "") {
			    $(this).val("Thêm mô tả cho hình ảnh");
			}
		});
		
		
		//nav banners slider
		$('.school_banners li').first().addClass("active");
		if ($('.school_banners li').length > 1) {
		    $('.studybanner_nav.next').show();
		}
		$('.studybanner_nav.prev').click(function(){
		    var banneractive = $('.school_banners li.active');
		    if(banneractive.prev().length)
		    {
			banneractive.removeClass("active");
			banneractive.prev().addClass("active");
			$('.studybanner_nav.next').show();
			if (!banneractive.prev().prev().length) {
			    $(this).hide();
			}
		    }
		});
		$('.studybanner_nav.next').click(function(){
		    var banneractive = $('.school_banners li.active');
		    if(banneractive.next().length)
		    {
			banneractive.removeClass("active");
			banneractive.next().addClass("active");
			$('.studybanner_nav.prev').show();
			if (!banneractive.next().next().length) {
			    $(this).hide();
			}
		    }
		});
		
		
		$('.chat_friend_list .chat_list_hooker').live("click", function() {
		    //alert($('.chat_friend_list').css("right"));
		    if($('.chat_friend_list').css("right") == "0px")
		    {
			$('.chat_friend_list').css("right","-300px");
			$('#chat-frame').css("right","75px");
		    }
		    else
		    {
			$('.chat_friend_list').css("right","0px");
			$('#chat-frame').css("right","305px");
			if(!$('.chat_friend_list .scroll_list').hasClass("mCustomScrollbar"))
			{
			    $('.chat_friend_list .scroll_list').mCustomScrollbar({
				autoHideScrollbar:true,
				theme:"light-thin",
				scrollSpeed: 40
			    });
			}
		    }
		});
		
		//top search click
                $('#verytopmenu .search-type .icon-search-box, #verytopmenu .search-type .pointer').live("click", function(e) {
                    $('#verytopmenu .search-type ul').toggle();
                    e.stopPropagation();
                });
                $('body').click(function(){
                    $('#verytopmenu .search-type ul').fadeOut()                    
                });
                $('#verytopmenu .search-type ul li.product a').live("click", function() {
                    $('#verytopmenu .search-type .icon-search-box').removeClass("icon-shop");
                    $('#verytopmenu .search-type .icon-search-box').addClass("icon-product");
                    $('#verytopmenu .search-type .icon-search-box').attr("rel", "product");
                    $('#TopSearch input').attr("placeholder", $(this).attr("title"));
                    $('#TopSearch input').focus();
                    $.cookie("top-search-type","product");
                });
                $('#verytopmenu .search-type ul li.shop a').live("click", function() {
                    $('#verytopmenu .search-type .icon-search-box').removeClass("icon-product");
                    $('#verytopmenu .search-type .icon-search-box').addClass("icon-shop");
                    $('#verytopmenu .search-type .icon-search-box').attr("rel", "shop");
                    $('#TopSearch input').attr("placeholder", $(this).attr("title"));
                    $('#TopSearch input').focus();
                    $.cookie("top-search-type","shop");
                });
                
                if(typeof($.cookie("top-search-type")) == 'undefined') {
                    $.cookie("top-search-type","shop");
                }
                $('#verytopmenu .search-type ul li.'+$.cookie("top-search-type")+' a').trigger("click");
		
		
		$(".comment_but").live("click", function() {
                    if(typeof($(this).attr("redirect")) != "undefined" && $(this).attr("redirect") != "") {
			$('#LoggingFrm input[name="redirect"]').val($(this).attr("redirect"));
		    }
		    else {
			var newURL = window.location.protocol + "//" + window.location.host + "/" + window.location.pathname;
			//alert(newURL);
			$('#LoggingFrm input[name="redirect"]').val(newURL);
		    }
                });
		
		$('.home_stars').each(function() {
		    var string = '';
		    var rate = parseFloat($(this).html());
		    //alert(rate>3);
		    for(var i=1;i<=5;i++) {
			if (rate>i-1 && rate<i) {
			    string += '<span class="star half">2</span>';
			} else if (rate >= i) {
			    string += '<span class="star full">1</span>';
			} else {
			    string += '<span class="star none">3</span>';
			}
		    }
		    $(this).html(string);
		});
		
		//$('.shop_stars .detail_box span.detail_pointer').click(function() {
		//    $('.shop_stars .detail_box .vote_details').toggle();
		//});
		$('body').click(function(){$('.shop_stars .detail_box .vote_details').hide();});	
		$('.shop_stars .detail_box span.detail_pointer').click(function(e){$('.shop_stars .detail_box .vote_details').toggle();e.stopPropagation();});
		
		$('.video-overlay').append('<span class="vv-oo"></span>');
		$('.album_a_block').hover(function(){$(this).parent().find('.vv-oo').addClass('active')},function(){$(this).parent().find('.vv-oo').removeClass('active')});
		$('.company-container .album .filterable-grid .pic img').resizecrop({
			width:211,
			height:211		   
		});
		$('.album_fancy').fancybox();
		$('.album_detail_a_image').fancybox();
		
		
		
		
	});