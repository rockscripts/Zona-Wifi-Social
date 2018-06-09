$(document).ready(function(){
	$(".remove-element").remove();
	if($( "#ads-video" ).length>0)
	{
	var media_url = $(".media_url").attr("url");
	fv = $("#ads-video").flareVideo();
      fv.load([
        {
          src:  media_url,
          type: 'video/mp4'
        }
      ]);	
	}
	
	$(document).on("click",".lang-icon",function()
	{
		var lang = $(this).attr("lang");
		ChnageLang(lang);
	});
	$(document).on("click",".login-twitter",function()
	{
	  send_to_auth_page()
	});
	/*$( function() {
    $( "#tabs-consumers" ).tabs();
  } );*/
});
function ChnageLang(value)//This function call when dropdown menu changes
{ 
	Cookies.remove('googtrans',{ domain: 'wifi.rockscripts.org'});
    Cookies.remove('googtrans',{ domain: '.rockscripts.org'});
	Cookies.set('googtrans','/auto/'+value);
}
function send_to_auth_page()
{
    var ajax_plugin_url = window.location.protocol+"//"+window.location.host;
     $.ajax({
            type:'GET',
            data:{type:"json"}, 
            url: ajax_plugin_url+"/admin/twauth",
            success: function(response)  
            {    
                console.log(response);
                var url = JSON.parse(response);
                window.location = url;
            }
          }); 
}