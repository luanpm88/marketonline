<!--//
$(document).ready(function(){
	if($("#kw").length>0){
		$("#kw").val(input_keywords).css("color","#999").bind({
			blur:function()
			{
				if($(this).val()=="")
				{
					$(this).val(input_keywords);
					$(this).css("color","#999");
				}
			},
			keyup:function()
			{
				if(event.keyCode==13)
				{
				   ;
				}
			},
			focus:function()
			{
				$(this).css("color","#333");
				if($(this).val()==input_keywords)
				{
					$(this).val("")
				}
			}
		});
	}
    $("#LoggingFrm").validate({
		rules: {
			"data[login_name]": { required: true},
			"data[login_pass]": { required: true}
		},
		messages: {
			"data[login_name]": pb_lang.INPUT_CORRECT_UNAME,
			"data[login_pass]": pb_lang.INPUT_PASSWD
		},
		submitHandler: function(form) {        
			$(form).find(":submit").attr("disabled", true);        
			form.submit();     
		}
	});
    
    
jQuery.validator.addMethod("usernameCheck", function(username) {
	//alert("Sdsdsd");
	var isSuccess = false;
	if (username.match(/^[a-zA-Z0-9.\-\s_]*$/)) {
		isSuccess = true;
	}	
	return isSuccess;

},pb_lang.INPUT_VALID_UNAME);
    

    $("#regfrm").validate({
		rules: {
			"data[member][username]": { required: true,rangelength:[5,20],usernameCheck: true },
			"data[member][userpass]": { required: true,rangelength:[6,20]},
			"data[member][email]": { required: true, email:true},
			"typename": { required: true},
			"re_memberpass": { required: true, equalTo: "#memberpass"},
			"confirm_email": { required: true, equalTo: "#dataMemberEmail"}
		},
		messages: {
			"data[member][username]": {
				required:pb_lang.INPUT_CORRECT_UNAME,
				rangelength:pb_lang.INPUT_BT_UNAME
			},
			"data[member][userpass]": {
				required:pb_lang.INPUT_PASSWD,
				rangelength:pb_lang.INPUT_BT_PASSWD
			},
			"data[member][email]": pb_lang.INPUT_CORRECT_EMAIL,
			"typename": pb_lang.INPUT_CORRECT_TYPENAME,
			"re_memberpass": pb_lang.RE_INPUT_PASSWD,
			"confirm_email": pb_lang.RE_INPUT_EMAIL
		},
		submitHandler: function(form) {
			
			
			
			$(form).find(":submit").attr("disabled", true);        
			form.submit();     
		}
	}); 

   $('#dataMemberUsername').blur(function (){
	 var username = $("#dataMemberUsername").val();
	 var params = "username="+username;
	 var action = "checkusername";
	 if(username){
		 $.ajax({
		   url:'ajax.php?action='+action,
		   type:'get',
		   dataType:'json',
		   data:params,	
		   error:function(XMLResponse){alert(pb_lang.CHECK_FAIL+":"+XMLResponse.responseText)},
		   success: update_checkusernameDiv
		 });
	}
   });	
   
   $('#dataUsername').blur(function (){
	 var username = $("#dataMemberUsername").val();
	 var params = "username="+username;
	 var action = "checkusername";
     $.ajax({
       url:'ajax.php?action='+action,
       type:'get',
       dataType:'json',
       data:params,
	   error:function(XMLResponse){alert(pb_lang.CHECK_FAIL+":"+XMLResponse.responseText)},
       success:getpass_checkusernameDiv
     });
   });
   
   $('#dataMemberReferrer').blur(function (){
	 var referrer = $("#dataMemberReferrer").val();
	 var params = "referrer="+referrer;
	 var action = "checkreferrer";
     $.ajax({
       url:'ajax.php?action='+action,
       type:'get',
       dataType:'json',
       data:params,
	   error:function(XMLResponse){alert(pb_lang.CHECK_FAIL+":"+XMLResponse.responseText)},
       success: update_checkReferrer
     });
   });	

   $('#memberpass').blur(function (){
	 var userpass = $("#memberpass").val();
	  if(userpass.length<6){
		 return;
	    }
	 });

   $('#exchange_imgcapt').click(function (){
	 $('#imgcaptcha').attr('src','captcha.php?sid=' + Math.random());
	 $('#login_auth').focus();
	 return false;
   });	

   $('#dataMemberEmail').blur(function (){
	 var email = $("#dataMemberEmail").val();
	 if(email.length<5){
		 return;
	 }
	 var params = "email="+email;
	 var action = "checkemail";
     $.ajax({
       url:'ajax.php?action='+action,
       type:'get',
       dataType:'json',
       data:params,
	   error:function(XMLResponse){alert(pb_lang.CHECK_FAIL+":"+XMLResponse.responseText)},
       success:update_checkemailDiv
     });
   });	
});
function update_checkusernameDiv(data){
	var errorNumber = data.isError;
	if(errorNumber!="0")
	{
		$("#Submit").attr('disabled', true);
		$("#membernameDiv").html('<img src="images/check_error.gif"> '+pb_lang.UNAME_EXIST);
	}else{
		$("#Submit").attr('disabled', false);
		$("#membernameDiv").html('');
	}
}
function update_checkReferrer(data){
	var errorNumber = data.isError;
	if(errorNumber!="0")
	{
		//$("#Submit").attr('disabled', true);
		$("#memberReferrer").html('<img src="images/check_error.gif"> '+pb_lang.UNVALID_REFERRER);
	}else{
		//$("#Submit").attr('disabled', false);
		$("#memberReferrer").html('');
	}
}
function update_checkemailDiv(data){
	var errorNumber = data.isError;
	if(errorNumber!="0")
	{
		$("#Submit").attr('disabled', true);
		if(errorNumber=="1"){
			$("#memberemailDiv").html('<img src="images/check_error.gif">'+pb_lang.EMAIL_EXIST);
		}else{
			$("#memberemailDiv").html('<img src="images/check_error.gif">'+pb_lang.INPUT_CORRECT_EMAIL);
		}
	}else{
		$("#Submit").attr('disabled', false);
		$("#memberemailDiv").html('');
	}
}
function getpass_checkusernameDiv(data){
	var errorNumber = data.isError;
	if(errorNumber!="0")
	{
		$("#GoNext").attr('disabled', true);
		$("#checkusernameDiv").html(pb_lang.CHECK_FAIL);
	}else{
		$("#GoNext").attr('disabled', false);
		$("#checkusernameDiv").html('');
	}
}
//-->