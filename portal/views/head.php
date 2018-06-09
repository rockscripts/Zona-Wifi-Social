<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
        <script src="//apis.google.com/js/api.js"></script>       
        <link rel="stylesheet" href="<?php echo $my_url; ?>static/pure-min.css">
        <link rel="stylesheet" href="<?php echo $my_url; ?>static/grids-responsive-min.css">
        <link rel="stylesheet" href="<?php echo $my_url; ?>static/fontawesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo $my_url; ?>static/my.css">	
        <link rel="stylesheet" href="<?php echo $my_url; ?>static/slider/styles/style.css">		        
        <link rel="stylesheet" href="<?php echo $my_url; ?>static/jQui/ui.css">
        <link rel="shortcut icon" href="<?php echo $my_url; ?>favicon.ico">
        <style>
            <?=CSS?>
        </style>
        <meta name="viewport" content="width=device-width, initial-scale=1">		
        <title>ZonaWifiZocial.com</title>
    </head>
	<?php
				 $ads = $_SESSION["advertisings"];
				 $found = false;
				 if(is_array($ads)):
				 $found = false;
					foreach($ads as $ad):
					 if($ad["type"]==0 and $ad["position"]==3 and !$found):		 
					 ?>
					 <body style="background:url('<?=MY_URL_UPLOADS."/".$ad["id_user"]."/".$ad["media_file"]?>')!important;color:black;">
					 <?php
					 $found=true;
					 endif;		 
					endforeach;
					endif;
			    if(!$found):
				?> 
				<body>
				<?php
				endif;
			?>	
    <div class="top-bar">
         <?php 
	 $ads = $_SESSION["advertisings"];
	 if(is_array($ads)):
	 $found = false;
		foreach($ads as $ad):
		 if($ad["type"]==0 and $ad["position"]==4 and !$found):		 
		 ?>
		<img src="<?=MY_URL_UPLOADS."/".$ad["id_user"]."/".$ad["media_file"]?>" class="logo"/>
		 <?php
		 $found = true;
		 break;
		 endif;		 
		endforeach;
		endif;
	?>
                <?php
                if(!$found)
                {
                    ?>
                <h1><?php echo $title; ?></h1>
                <?php 
                }
                ?>
                <div class="top-language w100p"> 
                   <div class="language-container">
	 <div>
	 <?php $actual_link = "//$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>
	 <a href="<?=$actual_link?>&lang=es"><img src="<?php echo $my_url; ?>/static/images/ES.png" lang="es" class="lang-icon" title="EspaÒol"></a> 
	 <a href="<?=$actual_link?>&lang=en"><img src="<?php echo $my_url; ?>/static/images/US.png" lang="en" class="lang-icon" title="InglÈs"></a> 
	 <a href="<?=$actual_link?>&lang=fr"><img src="<?php echo $my_url; ?>/static/images/FR.png" lang="fr" class="lang-icon" title="Frances"> </a>
	 <a href="<?=$actual_link?>&lang=de"><img src="<?php echo $my_url; ?>/static/images/DE.png" lang="de" class="lang-icon" title="Aleman"> </a>
	 <a href="<?=$actual_link?>&lang=it"><img src="<?php echo $my_url; ?>/static/images/IT.png" lang="it" class="lang-icon" title="Italiano"></a> 
	 <a href="<?=$actual_link?>&lang=zh-TW"><img src="<?php echo $my_url; ?>/static/images/HK.png" lang="zh-TW" class="lang-icon" title="Chino"> </a>
	 </div>
	  <div id="google_translate_element" style="display:none;">	  
	  </div>
	  	 
    </div> 
                </div>
	<!-- nav-right -->
	</div>
    <div class="pure-g centered-row header">
        <!-- add .l-box to left-align image with next row -->
        <div class="pure-u-1">
           
            <!-- .pure-img makes images responsive -->
			 <?php
				 $ads = $_SESSION["advertisings"];
				 $found = false;
				 if(is_array($ads)): 
				 $found = false;
					foreach($ads as $ad):
					 if($ad["type"]==0 and $ad["position"]==1 and !$found):		 
					 ?>
					  <img class="pure-img" src="<?=MY_URL_UPLOADS."/".$ad["id_user"]."/".$ad["media_file"]?>"/>
					 <?php
					 $found=true;
					 endif;		 
					endforeach;
					endif;
			?>	
           
        </div> 
		
    </div>
	<div id="fb-root"></div>
	<script>
		window.fbAsyncInit = function() {
		FB.Event.subscribe('edge.create', function(response) 
		{		
		$( "#dialog-like-us" ).delay(4000).dialog( "close" );
		$( ".message-like-again" ).fadeOut();
		$( ".like-us-text" ).fadeIn();
		var data_url = $( ".auth-fb-login").attr("data-url");		
		window.location.href = data_url;		
		}); 
		FB.Event.subscribe('edge.remove', function(response) 
		{
			$( ".like-us-text" ).hide(function()
			{
				$( ".message-like-again" ).fadeIn();
			});									
		}); 
		};
		(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.8&appId=1822300584713400";
		  fjs.parentNode.insertBefore(js, fjs);
		  
		}(document, 'script', 'facebook-jssdk'));
	</script>

<div id="dialog-like-us">
<div class="timer-content"><p><i class="fa fa-clock-o" aria-hidden="true"></i> <b><span class="time-like-us notranslate"></span></b></p></div>
	<div class="message-like-again">
	 <i class="fa fa-info-circle" aria-hidden="true"></i> <?=DISLIKE_TEXT_DIALOG?>	
	</div>
	<p class="like-us-text">
	  <?=LIKE_US_TXT_DIALOG?>
	</p>
	
	<?php
	if(SHARE_ACTION==1):
	?>
	<div class="fb-like" data-href="<?=FANPAGE_URL?>" data-width="240" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
	<?php
	else:
	?>
	<div class="fb-like" data-href="<?=FANPAGE_URL?>" data-width="240" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="false"></div>
	<?php
	endif;
	?>
</div>

<div class="slider-popup-banners">
<div id="wowslider-container">
<div class="timer-content"><p><i class="fa fa-clock-o" aria-hidden="true"></i> <b><span class="time-banners notranslate"></span></b></p></div>
	<div class="ws_images"><ul>
	<?php
		$ads = $_SESSION["advertisings"];
		if(is_array($ads)):
		foreach($ads as $ad):
		 if($ad["type"]==0 and $ad["position"]==2):		 
		 ?>
		 <li><a href="javascript:void(0);"><img src="<?=MY_URL_UPLOADS."/".$ad["id_user"]."/".$ad["media_file"]?>" alt="" title="" id="wows_0"/></a></li>
		 <?php
		 endif;
		endforeach;
		endif;
	?>		
	</ul>
	</div>
		<a href="#" class="ws_frame"></a>
		<div class="ws_shadow"></div>
	</div>
	</div>
	
<div id="dialog-video">
<div class="timer-content"><p><i class="fa fa-clock-o" aria-hidden="true"></i> <b><span class="time-video notranslate"></span></b></p></div>
	 <div id="ads-video" class="video"></div>
	 <?php
	 $ads = $_SESSION["advertisings"];
	 if(is_array($ads)):
	 $found = false;
		foreach($ads as $ad):
		 if($ad["type"]==1 and $ad["position"]==2 and !$found):		 
		 ?>
		 <div class="media_url" url="<?=MY_URL_UPLOADS."/".$ad["id_user"]."/".$ad["media_file"]?>"></div>
		 <?php
		 $found = true;
		 break;
		 endif;		 
		endforeach;
		endif;
	?>	
</div>
<div class="wrap">

    
  
<div id="dialog-whatsapp-auth">
        <div id="add-sender-form">    
            <div id="sender-wizard">
                <h3><i class="fa fa-phone" aria-hidden="true"></i> Solicitud</h3>
                <div>
				<div class="message-error">
	 <i class="fa fa-info-circle" aria-hidden="true"></i> Country code and phone number must be numeric.
	</div>
                    <p>Amablemente, digite el cÛdigo de paÌs y su numero de whatsapp sin 00 y +:<br>
                    <i class="fa fa-check-circle" aria-hidden="true"></i> 57 3165053657</p>
                    <div> 
                        <table class="form-whatsapp">
                            <tr>
                                <td><b>Mov√≠l:</b> </td>
                                <td>
								<table>
								<tr>
								<td>
								
								<input type="text" id="mobile-country-code" style="width:50px;margin-bottom: 7px;" name="mobile-phone" class="style-4"><small>C. code</small></td><td><input style="width: 142px;margin-bottom: 7px;" type="text" id="mobile-phone-request" name="mobile-phone" class="style-4"><small>Phone number</small></td>
								</tr>
								</table>
								</td>
                            </tr>
                            <tr>
                                <td><b>MÈtodo:</b></td>
                                <td>
                                    <table>
                                        <tr>
                                            <td><span>SMS</span></td><td><input type="radio" name="methodrequest" id="method-code-request" value="sms" checked = "checked"></td>
                                            <td><span>Voz</span></td><td><input type="radio" name="methodrequest" id="method-code-request" value="voice"></td></td>
                                        </tr>
                                    </table>                                   
                            </tr>
                        </table> 
                    </div>
                </div>
                <h3><i class="fa fa-wifi" aria-hidden="true"></i> Verificaci√≥n</h3>
                <div>
                    <p>Amablemente, digite el c√≥digo que recibio.<br>
					<i class="fa fa-check-circle" aria-hidden="true"></i> Seis d√≠gitos<br>
                    <i class="fa fa-check-circle" aria-hidden="true"></i> 123456<br>
                    <i class="fa fa-check-circle" aria-hidden="true"></i> 123-456</p>
                    </p>
                    <div> 
                        <table>
                            <td>CÛdigo:</td>
                            <td><input type="text" id="code-verification" name="code_verification" max-size="7" class="style-4"></td>
                        </table>                       
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>
        
<!--Google script-->
<script>
            var googleUser = {};
            var startApp = function() {
              
              gapi.load('auth2', function(){
                auth2 = gapi.auth2.init({
                  client_id: '916662480462-um7vlekpiagtgvbf1maaifd8qa9fgrpg.apps.googleusercontent.com',
                  cookiepolicy: 'single_host_origin',
                  scope: 'profile email',
                  immediate: false
                });
                attachSignin(document.getElementById('login-google'));
              });
            };

            function attachSignin(element) {
              auth2.attachClickHandler(element, {},
                  function(googleUser) {
                    console.log(googleUser.getBasicProfile());
                    $.ajax({
                            type:'POST',
                            data:{"id_goo_user":googleUser.getBasicProfile().getId(),"full_name":googleUser.getBasicProfile().getName(),"profile_picture":googleUser.getBasicProfile().getImageUrl(),"email":googleUser.getBasicProfile().getEmail(),"first_name":googleUser.getBasicProfile().getGivenName(),"last_name":googleUser.getBasicProfile().getFamilyName()},
                            url: ajax_plugin_url+"handle_save_google_profile/",
                            success: function(response) 
                            {                                    
                                var url = JSON.parse(response);
                                window.location = url;
                            }
                          }); 
                  }, function(error) { 
                    console.log(error);
                  });
            }
  </script> 
  <script>startApp();</script>
  
<script type="text/javascript">
function send_to_auth_page()
{
    $.ajax({
            type:'POST',
            data:{"type":"json"},
            url: ajax_plugin_url+"handle_twitter_login/",
            success: function(response) 
            {    
                var url = JSON.parse(response);
                window.location = url;
            }
          }); 
}
</script>