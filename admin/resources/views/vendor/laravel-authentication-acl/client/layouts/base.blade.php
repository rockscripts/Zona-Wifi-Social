<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{{ asset('favicon.ico') }}}">
	{!! HTML::script('js/cookies.js') !!}
    {!! HTML::style('packages/jacopo/laravel-authentication-acl/css/bootstrap.min.css') !!}
    {!! HTML::style('packages/jacopo/laravel-authentication-acl/css/style.css') !!}
    {!! HTML::style('packages/jacopo/laravel-authentication-acl/css/baselayout.css') !!}
    {!! HTML::style('packages/jacopo/laravel-authentication-acl/css/fonts.css') !!}
    {!! HTML::style('//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css') !!}
	{!! HTML::script('packages/jacopo/laravel-authentication-acl/js/vendor/jquery-1.10.2.min.js') !!}
    {!! HTML::script('js/application.js') !!}
    @yield('head_css')
    {{-- End head css --}}

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

    <body>
        <div class="container">
			 <div class="language-container">
	 <div>
	 <a href="{{URL::to('/')}}?lang=es"><img src="{{{ asset('images/ES.png') }}}" lang="es" class="lang-icon" title="Español"></a> 
	 <a href="{{URL::to('/')}}?lang=en"><img src="{{{ asset('images/US.png') }}}" lang="en" class="lang-icon" title="Inglés"></a> 
	 <a href="{{URL::to('/')}}?lang=fr"><img src="{{{ asset('images/FR.png') }}}" lang="fr" class="lang-icon" title="Frances"> </a>
	 <a href="{{URL::to('/')}}?lang=de"><img src="{{{ asset('images/DE.png') }}}" lang="de" class="lang-icon" title="Aleman"> </a>
	 <a href="{{URL::to('/')}}?lang=it"><img src="{{{ asset('images/IT.png') }}}" lang="it" class="lang-icon" title="Italiano"></a> 
	 <a href="{{URL::to('/')}}?lang=zh-TW"><img src="{{{ asset('images/HK.png') }}}" lang="zh-TW" class="lang-icon" title="Chino"> </a>
	 </div>
	  <div id="google_translate_element" style="display:none;">	  
	  </div>
	  <script type="text/javascript"> 	  
	  
	   
		function googleTranslateElementInit() 
		{
		 new google.translate.TranslateElement({pageLanguage: 'auto'}, 'google_translate_element');
		 	
		}
     </script>  
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>   	 
    </div><!-- nav-right -->
            @yield('content')
        </div>
		
		<?php
                        if(isset($_GET["lang"])):
                        ?>
                        <script>
                            var language_url_param = "<?php echo $_GET["lang"] ?>";
							ChnageLang(language_url_param);   console.log( document.cookie);
                        </script>
                        <?php
                        endif;
                        ?>
    </body>
</html>