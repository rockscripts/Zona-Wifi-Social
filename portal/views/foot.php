<div id="footer"><b><?=PORTAL_TITLE?> <i class="fa fa-copyright" aria-hidden="true"></i> </b>  &nbsp;<?=COPYRIGHT?></div>
	<script src="<?php echo $my_url; ?>static/jquery.js" ></script>
	<script src="<?php echo $my_url; ?>static/jQui/jquery-ui.min.js" ></script>	 	
	<script>
	/*! timer.jquery 0.6.3 2016-08-09*/!function(a){function b(d){if(c[d])return c[d].exports;var e=c[d]={exports:{},id:d,loaded:!1};return a[d].call(e.exports,e,e.exports,b),e.loaded=!0,e.exports}var c={};return b.m=a,b.c=c,b.p="",b(0)}([function(a,b,c){"use strict";function d(a){return a&&a.__esModule?a:{"default":a}}var e=c(1),f=d(e),g=c(2),h=d(g);!function(){$.fn.timer=function(a){return a=a||"start",this.each(function(){$.data(this,h["default"].PLUGIN_NAME)instanceof f["default"]||$.data(this,h["default"].PLUGIN_NAME,new f["default"](this,a));var b=$.data(this,h["default"].PLUGIN_NAME);"string"==typeof a?"function"==typeof b[a]&&b[a]():b.start()})}}()},function(a,b,c){"use strict";function d(a){return a&&a.__esModule?a:{"default":a}}function e(a,b){if(!(a instanceof b))throw new TypeError("Cannot call a class as a function")}Object.defineProperty(b,"__esModule",{value:!0});var f=function(){function a(a,b){for(var c=0;c<b.length;c++){var d=b[c];d.enumerable=d.enumerable||!1,d.configurable=!0,"value"in d&&(d.writable=!0),Object.defineProperty(a,d.key,d)}}return function(b,c,d){return c&&a(b.prototype,c),d&&a(b,d),b}}(),g=c(2),h=d(g),i=c(3),j=d(i),k=function(){function a(b,c){if(e(this,a),this.element=b,this.originalConfig=$.extend({},c),this.totalSeconds=0,this.intervalId=null,this.html="html","INPUT"!==b.tagName&&"TEXTAREA"!==b.tagName||(this.html="val"),this.config=j["default"].getDefaultConfig(),c.duration&&(c.duration=j["default"].durationTimeToSeconds(c.duration)),"string"!=typeof c&&(this.config=$.extend(this.config,c)),this.config.seconds&&(this.totalSeconds=this.config.seconds),this.config.editable&&j["default"].makeEditable(this),this.startTime=j["default"].unixSeconds()-this.totalSeconds,this.config.duration&&this.config.repeat&&this.config.updateFrequency<1e3&&(this.config.updateFrequency=1e3),this.config.countdown){if(!this.config.duration)throw new Error("Countdown option set without duration!");if(this.config.editable)throw new Error("Cannot set editable on a countdown timer!");this.config.startTime=j["default"].unixSeconds()-this.config.duration,this.totalSeconds=this.config.duration}}return f(a,[{key:"start",value:function(){this.state!==h["default"].TIMER_RUNNING&&(j["default"].setState(this,h["default"].TIMER_RUNNING),this.render(),this.intervalId=setInterval(j["default"].intervalHandler.bind(null,this),this.config.updateFrequency))}},{key:"pause",value:function(){this.state===h["default"].TIMER_RUNNING&&(j["default"].setState(this,h["default"].TIMER_PAUSED),clearInterval(this.intervalId))}},{key:"resume",value:function(){this.state===h["default"].TIMER_PAUSED&&(j["default"].setState(this,h["default"].TIMER_RUNNING),this.config.countdown?this.startTime=j["default"].unixSeconds()-this.config.duration+this.totalSeconds:this.startTime=j["default"].unixSeconds()-this.totalSeconds,this.intervalId=setInterval(j["default"].intervalHandler.bind(null,this),this.config.updateFrequency))}},{key:"remove",value:function(){clearInterval(this.intervalId),$(this.element).data(h["default"].PLUGIN_NAME,null)}},{key:"reset",value:function(){var a=this.element,b=this.originalConfig;this.remove(),$(a).timer(b)}},{key:"render",value:function(){this.config.format?$(this.element)[this.html](j["default"].secondsToFormattedTime(this.totalSeconds,this.config.format)):$(this.element)[this.html](j["default"].secondsToPrettyTime(this.totalSeconds)),$(this.element).data("seconds",this.totalSeconds)}}]),a}();b["default"]=k},function(a,b){"use strict";Object.defineProperty(b,"__esModule",{value:!0});var c={PLUGIN_NAME:"timer",TIMER_RUNNING:"running",TIMER_PAUSED:"paused",DAYINSECONDS:86400,THIRTYSIXHUNDRED:3600,SIXTY:60,TEN:10};b["default"]=c},function(a,b,c){"use strict";function d(a){return a&&a.__esModule?a:{"default":a}}Object.defineProperty(b,"__esModule",{value:!0});var e=c(2),f=d(e),g=function(){var a=arguments.length<=0||void 0===arguments[0]?0:arguments[0],b=0,c=0,d=Math.floor(a/f["default"].SIXTY),e=d,g=void 0;return a>=f["default"].DAYINSECONDS&&(b=Math.floor(a/f["default"].DAYINSECONDS)),a>=f["default"].THIRTYSIXHUNDRED&&(c=Math.floor(a%f["default"].DAYINSECONDS/f["default"].THIRTYSIXHUNDRED)),a>=f["default"].SIXTY&&(e=Math.floor(a%f["default"].THIRTYSIXHUNDRED/f["default"].SIXTY)),g=a%f["default"].SIXTY,{days:b,hours:c,minutes:e,totalMinutes:d,seconds:g,totalSeconds:a}},h=function(a){return a=parseInt(a,10),a<10?"0"+a:a},i=function(){return{seconds:0,editable:!1,duration:null,callback:function(){console.log("Time up!")},repeat:!1,countdown:!1,format:null,updateFrequency:500}},j=function(){return Math.round(Date.now()/1e3)},k=function(a){var b=g(a);if(b.days)return b.days+":"+h(b.hours)+":"+h(b.minutes)+":"+h(b.seconds);if(b.hours)return b.hours+":"+h(b.minutes)+":"+h(b.seconds);var c="";return c=b.minutes?b.minutes+":"+h(b.seconds)+" min":b.seconds+" sec"},l=function(a,b){var c=g(a),d=[{identifier:"%d",value:c.days},{identifier:"%h",value:c.hours},{identifier:"%m",value:c.minutes},{identifier:"%s",value:c.seconds},{identifier:"%g",value:c.totalMinutes},{identifier:"%t",value:c.totalSeconds},{identifier:"%D",value:h(c.days)},{identifier:"%H",value:h(c.hours)},{identifier:"%M",value:h(c.minutes)},{identifier:"%S",value:h(c.seconds)},{identifier:"%G",value:h(c.totalMinutes)},{identifier:"%T",value:h(c.totalSeconds)}];return d.forEach(function(a){b=b.replace(a.identifier,a.value)}),b},m=function(a){if(!a)throw new Error("durationTimeToSeconds expects a string argument!");if(!isNaN(Number(a)))return a;a=a.toLowerCase();var b=a.match(/\d{1,2}d/),c=a.match(/\d{1,2}h/),d=a.match(/\d{1,2}m/),e=a.match(/\d{1,2}s/);if(!(b||c||d||e))throw new Error("Invalid string passed in durationTimeToSeconds!");var g=0;return b&&(g+=Number(b[0].replace("d","")*f["default"].DAYINSECONDS)),c&&(g+=Number(c[0].replace("h","")*f["default"].THIRTYSIXHUNDRED)),d&&(g+=Number(d[0].replace("m",""))*f["default"].SIXTY),e&&(g+=Number(e[0].replace("s",""))),g},n=function(a){var b=void 0,c=void 0;return a.indexOf("sec")>0?c=Number(a.replace(/\ssec/g,"")):a.indexOf("min")>0?(a=a.replace(/\smin/g,""),b=a.split(":"),c=Number(b[0]*f["default"].SIXTY)+Number(b[1])):a.match(/\d{1,2}:\d{2}:\d{2}:\d{2}/)?(b=a.split(":"),c=Number(b[0]*f["default"].DAYINSECONDS)+Number(b[1]*f["default"].THIRTYSIXHUNDRED)+Number(b[2]*f["default"].SIXTY)+Number(b[3])):a.match(/\d{1,2}:\d{2}:\d{2}/)&&(b=a.split(":"),c=Number(b[0]*f["default"].THIRTYSIXHUNDRED)+Number(b[1]*f["default"].SIXTY)+Number(b[2])),c},o=function(a,b){a.state=b,$(a.element).data("state",b)},p=function(a){$(a.element).on("focus",function(){a.pause()}),$(a.element).on("blur",function(){a.totalSeconds=n($(a.element)[a.html]()),a.resume()})},q=function(a){return a.totalSeconds=j()-a.startTime,a.config.countdown?(a.totalSeconds=a.config.duration-a.totalSeconds,0===a.totalSeconds&&(clearInterval(a.intervalId),o(a,f["default"].TIMER_STOPPED),a.config.callback(),$(a.element).data("seconds")),void a.render()):(a.render(),void(a.config.duration&&a.totalSeconds>0&&a.totalSeconds%a.config.duration===0&&(a.config.callback&&a.config.callback(),a.config.repeat||(clearInterval(a.intervalId),o(a,f["default"].TIMER_STOPPED),a.config.duration=null))))};b["default"]={getDefaultConfig:i,unixSeconds:j,secondsToPrettyTime:k,secondsToFormattedTime:l,durationTimeToSeconds:m,prettyTimeToSeconds:n,setState:o,makeEditable:p,intervalHandler:q}}]);
	</script>	
	<script src="<?php echo $my_url; ?>static/cookies.js" ></script>
        <?php
         if($_SESSION["device_portal"]["display_popup"]==1):
        ?>
	  <script src="<?php echo $my_url; ?>static/slider/wowslider.js" ></script>
           <script src="<?php echo $my_url; ?>static/slider/script.js" ></script>
        <?php
        endif;
        ?>  
	 
	  <script src="<?php echo $my_url; ?>static/videoplay/jquery.flash.js" ></script>
	  <script src="<?php echo $my_url; ?>static/videoplay/flarevideo.js" ></script>
	  <script src="<?php echo $my_url; ?>static/app.js" ></script>
	  <?php
	  if(isset($_SESSION["device_portal"])):
	  
	  ?>
	  <script> 
	  var display_main_popup = "<?=$_SESSION["device_portal"]["display_popup"]?>";
	  var display_like_us_popup = "<?=$_SESSION["device_portal"]["like_us_popup"]?>";
	  var close_popup_time = "<?=$_SESSION["device_portal"]["close_popup_time"]?>";
	  var close_popup_time_seconds = "<?=$_SESSION["device_portal"]["close_popup_time_seconds"]?>";
	  var close_popup_like_time = "<?=$_SESSION["device_portal"]["close_popup_like_time"]?>";
	  var close_popup_like_time_seconds = "<?=$_SESSION["device_portal"]["close_popup_like_time_seconds"]?>";
	   
		function display_like_us()
		{
			 $( function() {
				 
				$( "#dialog-like-us" ).dialog({
				  modal: true,
				  closeOnEscape: false,
				   open: function(event, ui) {
					   $("#dialog-like-us").fadeIn();
					$(function() {
								$("#dialog-like-us").css({
									'left' : '50%',
									'top' : '20%',
									'margin-left' : -$("#dialog-like-us").outerWidth()/2,
									'margin-top' : -$("#dialog-like-us").outerHeight()/2
								});
							});   
							if(close_popup_like_time>0)
						  var time = close_popup_like_time+'m'+close_popup_like_time_seconds+'s';
					    else
						  var time = close_popup_like_time_seconds+'s';
					$('.time-like-us').timer({
										countdown: true,
										duration: time,
										callback: function() 
										{
											 $( "#dialog-like-us" ).dialog( "close" );
											 window.location = $( ".auth-fb-login" ).attr("data-url");
										}
									});
				}
				});				
			  } );
		}
		</script>	
        <!--dialog with banners-->		
		<script>  
		if(display_main_popup==1)
		{
			$( function() 
		      {
				   $(".slider-popup-banners").dialog({
			          modal: true,
					  position:[0,0],
			          closeOnEscape: false,
			          open: function(event, ui) 
					   { 
                        $(".slider-popup-banners").fadeIn();					   
						$(function() {
							$(".slider-popup-banners").css({
								'left' : '50%',
								'top' : '0%',  
								'margin-left' : -($(window).outerWidth()+7)/2,
								//'margin-top' : -$(window).outerHeight()/2
							});
						});
						if(close_popup_time>0)
						  var time = close_popup_time+'m'+close_popup_time_seconds+'s';
					    else
						  var time = close_popup_time_seconds+'s';
						$('.time-banners').timer({
									countdown: true,
									duration:time,
									callback: function() 
									{
										 $(".slider-popup-banners").dialog( "close" );										 
									     $(".slider-popup-banners").fadeOut();
									} 
								});
					   }
			   });
			   });		  	
		}
		   	
	  </script>
	  <!--dialog with video-->
	  <script>
	  if(display_main_popup==2)
	  {
		 $("#dialog-video").dialog({
			          modal: true,
					  position:[0,0],
			          closeOnEscape: false,
			          open: function(event, ui) 
					   { 
					   $("#dialog-video").fadeIn();
                        $(function() {
							$("#dialog-video").css({
								'left' : '50%',
								'top' : '50%',
								'margin-left' : -$("#dialog-video").outerWidth()/2-3,
								'margin-top' : -$("#dialog-video").outerHeight()/2-5
							});
						});					   
					    var media_url = $(".media_url").attr("url");
						fv = $("#ads-video").flareVideo();
						  fv.load([
							{
							  src:  media_url,
							  type: 'video/mp4',
							  //autoplay : true,
							}
						         ]);
								 if($( window ).width()<500)
								 {
									$("#dialog-video").css("max-width",$( window ).width()); 
								 }
		                          $(document).ready(function() { 
									   var tabInterval = setInterval(function(){
										  $('div.play').trigger('click');
									   }, 1000);
									});
								    if(close_popup_time>0)
									  var time = close_popup_time+'m'+close_popup_time_seconds+'s';
									else
									  var time = close_popup_time_seconds+'s';
					                $('.time-video').timer({
									countdown: true,
									duration:  time,
									callback: function() 
									{
										 $("#dialog-video").dialog( "close" );
									     $("#dialog-video").fadeOut();
									}
								});					  
					   }	    
		}); 
	  }
	    
	  </script>
	  <script>
	  $(document).on("click",".auth-fb-login",function(){
		 if(display_like_us_popup==1)
		   {
			display_like_us(); 
		   }  
		 else
		   {
			window.location = $( ".auth-fb-login" ).attr("data-url");  
		   }
	  });	  
	  </script>
	  <?php
	  endif;
	  ?>
	  <?php
                        if(isset($_GET["lang"])):
                        ?>
                        <script>
                            var language_url_param = "<?php echo $_GET["lang"] ?>";
							ChnageLang(language_url_param); 
							function ChnageLang(value)//This function call when dropdown menu changes
							{ 
								Cookies.remove('googtrans',{ domain: 'rockscripts.org'});
								Cookies.remove('googtrans',{ domain: '.rockscripts.org'});
								Cookies.set('googtrans','/auto/'+value);
							}							
                        </script>
                        <?php
						else:
						?>
                        <script>
                            var language_url_param = "es";
							ChnageLang(language_url_param); 
							function ChnageLang(value)//This function call when dropdown menu changes
							{ 
								Cookies.remove('googtrans',{ domain: 'rockscripts.org'});
								Cookies.remove('googtrans',{ domain: '.rockscripts.org'});
								Cookies.set('googtrans','/auto/'+value);
							}							
                        </script>
                        <?php 
                        endif;
                        ?>  
						<script>
	/*! 
	 * jQuery Steps v1.1.0 - 09/04/2014
	 * Copyright (c) 2014 Rafael Staib (http://www.jquery-steps.com)
	 * Licensed under MIT http://www.opensource.org/licenses/MIT
	 */
	!function(a,b){function c(a,b){o(a).push(b)}function d(d,e,f){var g=d.children(e.headerTag),h=d.children(e.bodyTag);g.length>h.length?R(Z,"contents"):g.length<h.length&&R(Z,"titles");var i=e.startIndex;if(f.stepCount=g.length,e.saveState&&a.cookie){var j=a.cookie(U+q(d)),k=parseInt(j,0);!isNaN(k)&&k<f.stepCount&&(i=k)}f.currentIndex=i,g.each(function(e){var f=a(this),g=h.eq(e),i=g.data("mode"),j=null==i?$.html:r($,/^\s*$/.test(i)||isNaN(i)?i:parseInt(i,0)),k=j===$.html||g.data("url")===b?"":g.data("url"),l=j!==$.html&&"1"===g.data("loaded"),m=a.extend({},bb,{title:f.html(),content:j===$.html?g.html():"",contentUrl:k,contentMode:j,contentLoaded:l});c(d,m)})}function e(a){a.triggerHandler("canceled")}function f(a,b){return a.currentIndex-b}function g(b,c){var d=i(b);b.unbind(d).removeData("uid").removeData("options").removeData("state").removeData("steps").removeData("eventNamespace").find(".actions a").unbind(d),b.removeClass(c.clearFixCssClass+" vertical");var e=b.find(".content > *");e.removeData("loaded").removeData("mode").removeData("url"),e.removeAttr("id").removeAttr("role").removeAttr("tabindex").removeAttr("class").removeAttr("style")._removeAria("labelledby")._removeAria("hidden"),b.find(".content > [data-mode='async'],.content > [data-mode='iframe']").empty();var f=a('<{0} class="{1}"></{0}>'.format(b.get(0).tagName,b.attr("class"))),g=b._id();return null!=g&&""!==g&&f._id(g),f.html(b.find(".content").html()),b.after(f),b.remove(),f}function h(a,b){var c=a.find(".steps li").eq(b.currentIndex);a.triggerHandler("finishing",[b.currentIndex])?(c.addClass("done").removeClass("error"),a.triggerHandler("finished",[b.currentIndex])):c.addClass("error")}function i(a){var b=a.data("eventNamespace");return null==b&&(b="."+q(a),a.data("eventNamespace",b)),b}function j(a,b){var c=q(a);return a.find("#"+c+V+b)}function k(a,b){var c=q(a);return a.find("#"+c+W+b)}function l(a,b){var c=q(a);return a.find("#"+c+X+b)}function m(a){return a.data("options")}function n(a){return a.data("state")}function o(a){return a.data("steps")}function p(a,b){var c=o(a);return(0>b||b>=c.length)&&R(Y),c[b]}function q(a){var b=a.data("uid");return null==b&&(b=a._id(),null==b&&(b="steps-uid-".concat(T),a._id(b)),T++,a.data("uid",b)),b}function r(a,c){if(S("enumType",a),S("keyOrValue",c),"string"==typeof c){var d=a[c];return d===b&&R("The enum key '{0}' does not exist.",c),d}if("number"==typeof c){for(var e in a)if(a[e]===c)return c;R("Invalid enum value '{0}'.",c)}else R("Invalid key or value type.")}function s(a,b,c){return B(a,b,c,v(c,1))}function t(a,b,c){return B(a,b,c,f(c,1))}function u(a,b,c,d){if((0>d||d>=c.stepCount)&&R(Y),!(b.forceMoveForward&&d<c.currentIndex)){var e=c.currentIndex;return a.triggerHandler("stepChanging",[c.currentIndex,d])?(c.currentIndex=d,O(a,b,c),E(a,b,c,e),D(a,b,c),A(a,b,c),P(a,b,c,d,e,function(){a.triggerHandler("stepChanged",[d,e])})):a.find(".steps li").eq(e).addClass("error"),!0}}function v(a,b){return a.currentIndex+b}function w(b){var c=a.extend(!0,{},cb,b);return this.each(function(){var b=a(this),e={currentIndex:c.startIndex,currentStep:null,stepCount:0,transitionElement:null};b.data("options",c),b.data("state",e),b.data("steps",[]),d(b,c,e),J(b,c,e),G(b,c),c.autoFocus&&0===T&&j(b,c.startIndex).focus(),b.triggerHandler("init",[c.startIndex])})}function x(b,c,d,e,f){(0>e||e>d.stepCount)&&R(Y),f=a.extend({},bb,f),y(b,e,f),d.currentIndex!==d.stepCount&&d.currentIndex>=e&&(d.currentIndex++,O(b,c,d)),d.stepCount++;var g=b.find(".content"),h=a("<{0}>{1}</{0}>".format(c.headerTag,f.title)),i=a("<{0}></{0}>".format(c.bodyTag));return(null==f.contentMode||f.contentMode===$.html)&&i.html(f.content),0===e?g.prepend(i).prepend(h):k(b,e-1).after(i).after(h),K(b,d,i,e),N(b,c,d,h,e),F(b,c,d,e),e===d.currentIndex&&E(b,c,d),D(b,c,d),b}function y(a,b,c){o(a).splice(b,0,c)}function z(b){var c=a(this),d=m(c),e=n(c);if(d.suppressPaginationOnFocus&&c.find(":focus").is(":input"))return b.preventDefault(),!1;var f={left:37,right:39};b.keyCode===f.left?(b.preventDefault(),t(c,d,e)):b.keyCode===f.right&&(b.preventDefault(),s(c,d,e))}function A(b,c,d){if(d.stepCount>0){var e=d.currentIndex,f=p(b,e);if(!c.enableContentCache||!f.contentLoaded)switch(r($,f.contentMode)){case $.iframe:b.find(".content > .body").eq(d.currentIndex).empty().html('<iframe src="'+f.contentUrl+'" frameborder="0" scrolling="no" />').data("loaded","1");break;case $.async:var g=k(b,e)._aria("busy","true").empty().append(M(c.loadingTemplate,{text:c.labels.loading}));a.ajax({url:f.contentUrl,cache:!1}).done(function(a){g.empty().html(a)._aria("busy","false").data("loaded","1"),b.triggerHandler("contentLoaded",[e])})}}}function B(a,b,c,d){var e=c.currentIndex;if(d>=0&&d<c.stepCount&&!(b.forceMoveForward&&d<c.currentIndex)){var f=j(a,d),g=f.parent(),h=g.hasClass("disabled");return g._enableAria(),f.click(),e===c.currentIndex&&h?(g._enableAria(!1),!1):!0}return!1}function C(b){b.preventDefault();var c=a(this),d=c.parent().parent().parent().parent(),f=m(d),g=n(d),i=c.attr("href");switch(i.substring(i.lastIndexOf("#")+1)){case"cancel":e(d);break;case"finish":h(d,g);break;case"next":s(d,f,g);break;case"previous":t(d,f,g)}}function D(a,b,c){if(b.enablePagination){var d=a.find(".actions a[href$='#finish']").parent(),e=a.find(".actions a[href$='#next']").parent();if(!b.forceMoveForward){var f=a.find(".actions a[href$='#previous']").parent();f._enableAria(c.currentIndex>0)}b.enableFinishButton&&b.showFinishButtonAlways?(d._enableAria(c.stepCount>0),e._enableAria(c.stepCount>1&&c.stepCount>c.currentIndex+1)):(d._showAria(b.enableFinishButton&&c.stepCount===c.currentIndex+1),e._showAria(0===c.stepCount||c.stepCount>c.currentIndex+1)._enableAria(c.stepCount>c.currentIndex+1||!b.enableFinishButton))}}function E(b,c,d,e){var f=j(b,d.currentIndex),g=a('<span class="current-info audible">'+c.labels.current+" </span>"),h=b.find(".content > .title");if(null!=e){var i=j(b,e);i.parent().addClass("done").removeClass("error")._selectAria(!1),h.eq(e).removeClass("current").next(".body").removeClass("current"),g=i.find(".current-info"),f.focus()}f.prepend(g).parent()._selectAria().removeClass("done")._enableAria(),h.eq(d.currentIndex).addClass("current").next(".body").addClass("current")}function F(a,b,c,d){for(var e=q(a),f=d;f<c.stepCount;f++){var g=e+V+f,h=e+W+f,i=e+X+f,j=a.find(".title").eq(f)._id(i);a.find(".steps a").eq(f)._id(g)._aria("controls",h).attr("href","#"+i).html(M(b.titleTemplate,{index:f+1,title:j.html()})),a.find(".body").eq(f)._id(h)._aria("labelledby",i)}}function G(a,b){var c=i(a);a.bind("canceled"+c,b.onCanceled),a.bind("contentLoaded"+c,b.onContentLoaded),a.bind("finishing"+c,b.onFinishing),a.bind("finished"+c,b.onFinished),a.bind("init"+c,b.onInit),a.bind("stepChanging"+c,b.onStepChanging),a.bind("stepChanged"+c,b.onStepChanged),b.enableKeyNavigation&&a.bind("keyup"+c,z),a.find(".actions a").bind("click"+c,C)}function H(a,b,c,d){return 0>d||d>=c.stepCount||c.currentIndex===d?!1:(I(a,d),c.currentIndex>d&&(c.currentIndex--,O(a,b,c)),c.stepCount--,l(a,d).remove(),k(a,d).remove(),j(a,d).parent().remove(),0===d&&a.find(".steps li").first().addClass("first"),d===c.stepCount&&a.find(".steps li").eq(d).addClass("last"),F(a,b,c,d),D(a,b,c),!0)}function I(a,b){o(a).splice(b,1)}function J(b,c,d){var e='<{0} class="{1}">{2}</{0}>',f=r(_,c.stepsOrientation),g=f===_.vertical?" vertical":"",h=a(e.format(c.contentContainerTag,"content "+c.clearFixCssClass,b.html())),i=a(e.format(c.stepsContainerTag,"steps "+c.clearFixCssClass,'<ul role="tablist"></ul>')),j=h.children(c.headerTag),k=h.children(c.bodyTag);b.attr("role","application").empty().append(i).append(h).addClass(c.cssClass+" "+c.clearFixCssClass+g),k.each(function(c){K(b,d,a(this),c)}),j.each(function(e){N(b,c,d,a(this),e)}),E(b,c,d),L(b,c,d)}function K(a,b,c,d){var e=q(a),f=e+W+d,g=e+X+d;c._id(f).attr("role","tabpanel")._aria("labelledby",g).addClass("body")._showAria(b.currentIndex===d)}function L(a,b,c){if(b.enablePagination){var d='<{0} class="actions {1}"><ul role="menu" aria-label="{2}">{3}</ul></{0}>',e='<li><a href="#{0}" role="menuitem">{1}</a></li>',f="";b.forceMoveForward||(f+=e.format("previous",b.labels.previous)),f+=e.format("next",b.labels.next),b.enableFinishButton&&(f+=e.format("finish",b.labels.finish)),b.enableCancelButton&&(f+=e.format("cancel",b.labels.cancel)),a.append(d.format(b.actionContainerTag,b.clearFixCssClass,b.labels.pagination,f)),D(a,b,c),A(a,b,c)}}function M(a,c){for(var d=a.match(/#([a-z]*)#/gi),e=0;e<d.length;e++){var f=d[e],g=f.substring(1,f.length-1);c[g]===b&&R("The key '{0}' does not exist in the substitute collection!",g),a=a.replace(f,c[g])}return a}function N(b,c,d,e,f){var g=q(b),h=g+V+f,j=g+W+f,k=g+X+f,l=b.find(".steps > ul"),m=M(c.titleTemplate,{index:f+1,title:e.html()}),n=a('<li role="tab"><a id="'+h+'" href="#'+k+'" aria-controls="'+j+'">'+m+"</a></li>");n._enableAria(c.enableAllSteps||d.currentIndex>f),d.currentIndex>f&&n.addClass("done"),e._id(k).attr("tabindex","-1").addClass("title"),0===f?l.prepend(n):l.find("li").eq(f-1).after(n),0===f&&l.find("li").removeClass("first").eq(f).addClass("first"),f===d.stepCount-1&&l.find("li").removeClass("last").eq(f).addClass("last"),n.children("a").bind("click"+i(b),Q)}function O(b,c,d){c.saveState&&a.cookie&&a.cookie(U+q(b),d.currentIndex)}function P(b,c,d,e,f,g){var h=b.find(".content > .body"),i=r(ab,c.transitionEffect),j=c.transitionEffectSpeed,k=h.eq(e),l=h.eq(f);switch(i){case ab.fade:case ab.slide:var m=i===ab.fade?"fadeOut":"slideUp",o=i===ab.fade?"fadeIn":"slideDown";d.transitionElement=k,l[m](j,function(){var b=a(this)._showAria(!1).parent().parent(),c=n(b);c.transitionElement&&(c.transitionElement[o](j,function(){a(this)._showAria()}).promise().done(g),c.transitionElement=null)});break;case ab.slideLeft:var p=l.outerWidth(!0),q=e>f?-p:p,s=e>f?p:-p;a.when(l.animate({left:q},j,function(){a(this)._showAria(!1)}),k.css("left",s+"px")._showAria().animate({left:0},j)).done(g);break;default:a.when(l._showAria(!1),k._showAria()).done(g)}}function Q(b){b.preventDefault();var c=a(this),d=c.parent().parent().parent().parent(),e=m(d),f=n(d),g=f.currentIndex;if(c.parent().is(":not(.disabled):not(.current)")){var h=c.attr("href"),i=parseInt(h.substring(h.lastIndexOf("-")+1),0);u(d,e,f,i)}return g===f.currentIndex?(j(d,g).focus(),!1):void 0}function R(a){throw arguments.length>1&&(a=a.format(Array.prototype.slice.call(arguments,1))),new Error(a)}function S(a,b){null==b&&R("The argument '{0}' is null or undefined.",a)}a.fn.extend({_aria:function(a,b){return this.attr("aria-"+a,b)},_removeAria:function(a){return this.removeAttr("aria-"+a)},_enableAria:function(a){return null==a||a?this.removeClass("disabled")._aria("disabled","false"):this.addClass("disabled")._aria("disabled","true")},_showAria:function(a){return null==a||a?this.show()._aria("hidden","false"):this.hide()._aria("hidden","true")},_selectAria:function(a){return null==a||a?this.addClass("current")._aria("selected","true"):this.removeClass("current")._aria("selected","false")},_id:function(a){return a?this.attr("id",a):this.attr("id")}}),String.prototype.format||(String.prototype.format=function(){for(var b=1===arguments.length&&a.isArray(arguments[0])?arguments[0]:arguments,c=this,d=0;d<b.length;d++){var e=new RegExp("\\{"+d+"\\}","gm");c=c.replace(e,b[d])}return c});var T=0,U="jQu3ry_5teps_St@te_",V="-t-",W="-p-",X="-h-",Y="Index out of range.",Z="One or more corresponding step {0} are missing.";a.fn.steps=function(b){return a.fn.steps[b]?a.fn.steps[b].apply(this,Array.prototype.slice.call(arguments,1)):"object"!=typeof b&&b?void a.error("Method "+b+" does not exist on jQuery.steps"):w.apply(this,arguments)},a.fn.steps.add=function(a){var b=n(this);return x(this,m(this),b,b.stepCount,a)},a.fn.steps.destroy=function(){return g(this,m(this))},a.fn.steps.finish=function(){h(this,n(this))},a.fn.steps.getCurrentIndex=function(){return n(this).currentIndex},a.fn.steps.getCurrentStep=function(){return p(this,n(this).currentIndex)},a.fn.steps.getStep=function(a){return p(this,a)},a.fn.steps.insert=function(a,b){return x(this,m(this),n(this),a,b)},a.fn.steps.next=function(){return s(this,m(this),n(this))},a.fn.steps.previous=function(){return t(this,m(this),n(this))},a.fn.steps.remove=function(a){return H(this,m(this),n(this),a)},a.fn.steps.setStep=function(){throw new Error("Not yet implemented!")},a.fn.steps.skip=function(){throw new Error("Not yet implemented!")};var $=a.fn.steps.contentMode={html:0,iframe:1,async:2},_=a.fn.steps.stepsOrientation={horizontal:0,vertical:1},ab=a.fn.steps.transitionEffect={none:0,fade:1,slide:2,slideLeft:3},bb=a.fn.steps.stepModel={title:"",content:"",contentUrl:"",contentMode:$.html,contentLoaded:!1},cb=a.fn.steps.defaults={headerTag:"h1",bodyTag:"div",contentContainerTag:"div",actionContainerTag:"div",stepsContainerTag:"div",cssClass:"wizard",clearFixCssClass:"clearfix",stepsOrientation:_.horizontal,titleTemplate:'<span class="number">#index#.</span> #title#',loadingTemplate:'<span class="spinner"></span> #text#',autoFocus:!1,enableAllSteps:!1,enableKeyNavigation:!0,enablePagination:!0,suppressPaginationOnFocus:!0,enableContentCache:!0,enableCancelButton:!1,enableFinishButton:!0,preloadContent:!1,showFinishButtonAlways:!1,forceMoveForward:!1,saveState:!1,startIndex:0,transitionEffect:ab.none,transitionEffectSpeed:200,onStepChanging:function(){return!0},onStepChanged:function(){},onCanceled:function(){},onFinishing:function(){return!0},onFinished:function(){},onContentLoaded:function(){},onInit:function(){},labels:{cancel:"Cancel",current:"current step:",pagination:"Pagination",finish:"Finish",next:"Next",previous:"Previous",loading:"Loading ..."}}}(jQuery);
											
	
</script>
	<script>
	
	$(document).on("click",".login-instagram", function(){
		$("#dialog-whatsapp-auth").dialog({
			          modal: true,
					  position:[0,0],
			          closeOnEscape: false,
					  open: function(event, ui) 
					   { 
						   $("#dialog-whatsapp-auth").fadeIn();
							$(function() 
							{
								$("#dialog-whatsapp-auth").css({
									'left' : '50%',
									'top' : '50%',
									'margin-left' : -$("#dialog-whatsapp-auth").outerWidth()/2,
									'margin-top' : -$("#dialog-whatsapp-auth").outerHeight()/2-5
								});
							});	
					  
							$("#sender-wizard").steps({
									headerTag: "h3",
									bodyTag: "div",
									transitionEffect: "slideLeft",
									autoFocus: true,
									onStepChanging: function (event, currentIndex, newIndex)
										{
											if(currentIndex==0)
											{
										      var country_code = $("#mobile-country-code").val();
											  var mobile = $("#mobile-phone-request").val();
                                              var method = $("input[name=methodrequest]").val();	
											  if(isNumber(country_code) && isNumber(mobile))
											  {
												 $("#dialog-whatsapp-auth")  .find(".message-error").fadeOut();
												 send_verification_code(mobile,country_code,method); 
												 return true;
											  }
											  else
											  {
												$("#dialog-whatsapp-auth")  .find(".message-error").fadeIn();
												return false;
											  }
											  
											}
											else if(newIndex==0)
											{
												return true;
											}
											
										},
										onFinishing: function (event, currentIndex)
										{											
											return true;
										},
										onFinished: function (event, currentIndex)
										{
											  var country_code = $("#mobile-country-code").val();
											  var mobile = $("#mobile-phone-request").val();
											  mobile = country_code.concat(mobile);
											  var code = $("#code-verification").val();	
											  var result = verify_code(mobile,code);	
											  if(result)
											  {
												window.location = "<?=PORTAL_URL?>";
											  }
											  return true;
										}
								});
					   }
		}); 
		$("#dialog-whatsapp-auth").fadeIn();
	});	
	var ajax_plugin_url = "<?=$my_url?>";	
	
	$(document).on("click",".auth-ig-login",function()
	{
		var data_url = $(this).attr("data-url");
		window.location = data_url;
	});
        $(document).on("click",".login-twitter",function()
	{
	  send_to_auth_page()
	});
</script>	
	<script>
		set_client_time_zone();
	</script>
    </body>
</html>