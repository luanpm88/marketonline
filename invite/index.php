<html><head>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://apis.google.com/js/client.js"></script>
<script type="text/javascript" src="./invite.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    $('#selectall').click(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
    });
    
});
</script>
<style type="text/css">
input[type="button"],input[type="submit"] {
   border-top: 1px solid #96d1f8;
   background: #65a9d7;
   background: -webkit-gradient(linear, left top, left bottom, from(#3e9c88), to(#65a9d7));
   background: -webkit-linear-gradient(top, #3e9c88, #65a9d7);
   background: -moz-linear-gradient(top, #3e9c88, #65a9d7);
   background: -ms-linear-gradient(top, #3e9c88, #65a9d7);
   background: -o-linear-gradient(top, #3e9c88, #65a9d7);
   padding: 9px 18px;
   -webkit-border-radius: 20px;
   -moz-border-radius: 20px;
   border-radius: 20px;
   -webkit-box-shadow: rgba(0,0,0,1) 0 1px 0;
   -moz-box-shadow: rgba(0,0,0,1) 0 1px 0;
   box-shadow: rgba(0,0,0,1) 0 1px 0;
   text-shadow: rgba(0,0,0,.4) 0 1px 0;
   color: white;
   font-size: 14px;
   font-family: 'Lucida Grande', Helvetica, Arial, Sans-Serif;
   text-decoration: none;
   vertical-align: middle;
   }
button:hover {
   border-top-color: #78286c;
   background: #78286c;
   color: #ccc;
   }
button:active {
   border-top-color: #1b435e;
   background: #1b435e;
   }
html,body{
	margin: 0px;
	padding: 0px;
}
table, td, th {
    border: 1px solid black;
}
#checkbox1{
	float:left;margin-top:20px;
}
#prof
{
	height:50px;width:50px;float:left;
}
</style>
<title> Invite By Email Script</title>
</head>
<body style="font-family:lucida grande,tahoma,verdana,arial,sans-serif;font-size: 11px;">
<div style="margin:0px;padding:0px;background-color:black;color:white; height:50px;width:100%">
<h2 style="line-height:50px;">Invite By E-Mail Script - Inspired By Linkedin,Twitter Contact Importer</h2></div>
	<div class="cont" style="margin:20px;padding:20px;">
	<a class="google" href="#gmail"><img src="http://blogs-images.forbes.com/benkerschberg/files/2011/05/Google-Image-Result-for-http___christopherfoundas.com_wp-content_uploads_2010_04_gmail-icon-v2-256.png.jpg" style="height:100px;"></a></div>

	<div class="div" style="
     width:500px;
     height:500px;
     margin:0px auto;
     background:#e7e7e7;display:none;">
		<div style="border-style: solid;
    border-width: 1px;height:20px;padding:5px;background-color:black;color:white;"> <input type="checkbox" id="selectall" name="Select All"/>Select All
    <span style="float:right;padding:px;color:red;" id="o">Step 1 of 2 <progress id="prg" value="50" max="100"></progress></span></div><div style="clear:both;"></div>
    <div  id="main" style="border-style: solid;border-width: 1px;height:420px;overflow-y:scroll !important;overflow-x: hidden !important;">
    	<table id="table" style="width:500px;border-collapse: collapse;font-size:12px;font-weight:bold;" border="1">
    	
    	</table>
    </div>
    <div style="border-style: solid;
    border-width: 1px;height:40px;padding:5px;background-color:black;color:white;line-height:40px"><i>i-visionblog (c) 2014</i> <span style="float:right;" id="btn"><input type="submit" value="Follow" id="follow" name="Follow" />&nbsp;<input id="next" type="button" value="Skip" name="Next" /></span> </div>
	</div>

</body>
</html>