var clientId = '1082267381139-42rf3am2figk99e799cv19uau6o5t3rq.apps.googleusercontent.com';
var apiKey = 'AIzaSyCttmiP-8VoFYI-GN-Ayk7Tvth1HdMvYpo';
var scopes = 'https://www.google.com/m8/feeds';

$(document).on("click",".google", function(){
   gapi.client.setApiKey(apiKey);
   window.setTimeout(checkAuth,3);
});

function checkAuth() {
  gapi.auth.authorize({client_id: clientId, scope: scopes, immediate: false}, handleAuthResult);
}

function handleAuthResult(authResult) {
  if (authResult && !authResult.error) {
    $(".cont").hide();
    $(".div").show();

    $("#main").append("<img id=\"picload\" style=\"position:absolute;top:50%;left:50%;margin-top:-80px;margin-left:-50px;\"src=\"http://3.bp.blogspot.com/-f8kaYsWwvfQ/T6PQ57Bf6vI/AAAAAAAAASA/OXKSEQVlkGQ/s1600/17.gif\" />");
    $.get("https://www.google.com/m8/feeds/contacts/default/full?alt=json&access_token=" + authResult.access_token + "&max-results=700&v=3.0",
      function(response){
if(response.feed.entry.length > 0){
         //Handle Response
       console.log(response);
         var email= [];
         var pic = [];
        var surya = [];
console.log(response.feed.entry.length);
        for ( var i= 0 ; i < response.feed.entry.length ; i++)
    {  console.log(i);
          if(response.feed.entry[i].gd$phoneNumber)
           { continue; }
if(response.feed.entry[i].gd$email){
      email[i]= response.feed.entry[i].gd$email[0].address;
      console.log(email[i]); }
else
{  continue;
}
 }   
    $.post("process.php", { email: email },
    function(Result){
        console.log("success");
        console.log(Result);
          $("#picload").hide();
        for(var i =0 ; i < Result.newlist.length ; i++)
        {
       $("#table").append("<tr><td style=\"width:100%;line-height:39px;\"><input type=\"checkbox\" class=\"checkbox1\" value="+Result.newlist[i]+" name=\"check[]\" id=\"checkbox1\" style=\"line-height:13px;\"/><span>"+Result.newlist[i]+"</span></td></tr>"); }
        
       $("#next").click(function(){

        $("#table").html("");
        $("#btn").html("");

        $("#btn").html("<input type=\"submit\" value=\"Follow\" id=\"follow\" name=\"Follow\" />&nbsp;<input id=\"next\" type=\"button\" value=\"Cancel\" name=\"cancel\" />")
        $("#o").html("step 2 of 2 <progress id=\"prg\" value=\"100\" max=\"100\"></progress>");
if(Result.users.length > 0 ){
        for(var i=0;i < Result.users.length ; i++)
        $("#table").append("<tr><td style=\"width:50%\"><input type=\"checkbox\" value="+Result.users[i]+" name=\"check[]\" class=\"checkbox1\" id=\"checkbox1\" ><img src="+Result.pic[i]+"  id=\"prof\" /><span style=\"float:left;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;\">"+Result.name[i]+"<br/>"+Result.users[i]+"</span></td></tr>");
       
        } 
          else { $("#table").append("<h3>No existing users found when importing contcts</h3>"); } 
   
   });

  
});
}
else{   alert("something went wrong ! your contact list is undefined"); }
    });

        //  console.log(response.feed.entry[0].link[0].href);
      
  }
} 