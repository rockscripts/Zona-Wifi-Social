
<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    {!! Form::label('title', 'Title', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('display_popup') ? 'has-error' : ''}}">
    {!! Form::label('display_popup', 'Display dialog', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('display_popup', ['deactivated', 'image', 'video'], null, ['class' => 'form-control']) !!}
        {!! $errors->first('display_popup', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group">
<label for="close_popup_time" class="col-md-4 control-label">Time to close dialog</label>
    <div class="col-md-6">
	<div style="float:left;">
	   <label class="left">Minutes </label>
       <select class="form-control" name="close_popup_time" id="close_popup_time" style="max-width: 63px;"><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option></select>
	</div>
	<div style="float:left;margin-left:10px;">
       <label class="left">Seconds </label>	  
	  <select class="form-control left" name="close_popup_time_seconds" id="close_popup_time_seconds"  style="max-width: 63px;">
	   <?php
	    for($i=1;$i<=59;$i++):
		?>
		  <option value="<?=$i?>"><?=$i?></option>
		<?php
		endfor;
	   ?> 
	   </select>
	</div>
	</div>
	</div>
<div class="form-group {{ $errors->has('redirect_url') ? 'has-error' : ''}}">
    {!! Form::label('redirect_url', 'Redirect to', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('redirect_url', null, ['class' => 'form-control']) !!}
        {!! $errors->first('redirect_url', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('access_code') ? 'has-error' : ''}}">
    {!! Form::label('access_code', 'Access Code', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('access_code', null, ['class' => 'form-control']) !!}
        {!! $errors->first('access_code', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="head-title"><h4><i class="fa fa-facebook-square" aria-hidden="true"></i> FACEBOOK SETTINGS</h4></div>
<div class="form-group {{ $errors->has('connect_fb') ? 'has-error' : ''}}">
<label for="connect_fb" class="col-md-4 control-label"><i class="fa fa-facebook-square" aria-hidden="true"></i> Connect with Facebook </label>
    <div class="col-md-6">
        {!! Form::select('connect_fb',['deactivated', 'activated'], null, ['class' => 'form-control']) !!}
        {!! $errors->first('connect_fb', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('fb_page_id') ? 'has-error' : ''}}">
   <label for="fb_page_id" class="col-md-4 control-label"><i class="fa fa-facebook-square" aria-hidden="true"></i> Fanpage ID</label>
    <div class="col-md-6">
        {!! Form::text('fb_page_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('fb_page_id', '<p class="help-block">:message</p>') !!}
    </div>
</div> 
<div class="form-group {{ $errors->has('fb_page_name') ? 'has-error' : ''}}">
<label for="fb_page_name" class="col-md-4 control-label"><i class="fa fa-facebook-square" aria-hidden="true"></i> Fanpage name</label>
    <div class="col-md-6">
        {!! Form::text('fb_page_name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('fb_page_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('share_action') ? 'has-error' : ''}}">
<label for="share_action" class="col-md-4 control-label"><i class="fa fa-facebook-square" aria-hidden="true"></i> Share our site?</label>
    <div class="col-md-6">
        {!! Form::select('share_action', ['deactivated', 'activated'], null, ['class' => 'form-control']) !!}
        {!! $errors->first('share_action', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<!--<div class="form-group {{ $errors->has('share_message') ? 'has-error' : ''}}">
<label for="share_message" class="col-md-4 control-label"><i class="fa fa-facebook-square" aria-hidden="true"></i> Share msn</label>
    <div class="col-md-6">
        {!! Form::textarea('share_message', null, ['class' => 'form-control']) !!}
        {!! $errors->first('share_message', '<p class="help-block">:message</p>') !!}
    </div>
</div>-->
<div class="form-group {{ $errors->has('like_us_popup') ? 'has-error' : ''}}">
<label for="like_us_popup" class="col-md-4 control-label"><i class="fa fa-facebook-square" aria-hidden="true"></i><span class="notranslate"> Like us</span>  dialog </label>
    <div class="col-md-6">
        {!! Form::select('like_us_popup',['deactivated', 'activated'], null, ['class' => 'form-control']) !!}
        {!! $errors->first('like_us_popup', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group">
<label for="like_us_popup" class="col-md-4 control-label"><i class="fa fa-facebook-square" aria-hidden="true"></i> Time to close <span class="notranslate">like us</span>  dialog</label>
    <div class="col-md-6">
	<div style="float:left;">
	   <label class="left">Minutes </label>
       <select class="form-control" name="close_popup_like_time" id="close_popup_like_time" style="max-width: 63px;"><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option></select>
	</div>
	<div style="float:left;margin-left:10px;">
       <label class="left">Seconds </label>	  
	  <select class="form-control left" name="close_popup_like_time_seconds"  id="close_popup_like_time_seconds" style="max-width: 63px;">
	   <?php
	    for($i=1;$i<=59;$i++):
		?>
		  <option value="<?=$i?>"><?=$i?></option>
		<?php
		endfor;
	   ?>
	   </select>
	</div>
	</div>
</div>
<div class="head-title"><h4><i class="fa fa-instagram" aria-hidden="true"></i> INSTAGRAM SETTINGS</h4></div>
<div class="form-group {{ $errors->has('connect_ig') ? 'has-error' : ''}}">
<label for="connect_ig" class="col-md-4 control-label"><i class="fa fa-instagram" aria-hidden="true"></i> Connect with Instagram </label>
    <div class="col-md-6">
        {!! Form::select('connect_ig',['deactivated', 'activated'], null, ['class' => 'form-control']) !!}
        {!! $errors->first('connect_ig', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<?php
if(!isset($portal))
{
	?>
	<center style="margin-bottom:10px;">Settings available on edit.<br></center>
	<?php
}
else
{
	?>
<div class="form-group {{ $errors->has('like_us_popup') ? 'has-error' : ''}}">
<label for="like_us_popup" class="col-md-4 control-label"> <i class="fa fa-instagram" aria-hidden="true"></i> Instagram Profile</label>
    <div class="col-md-6">
	<?php
	if(isset($portals_users_instagram->username)):
	?>
	<?=$portals_users_instagram->username?>
	<?php
	else:
	?>
	Account not linked
	<?php
	endif;
	?>
       <a  class="pure-button pure-button-primary login-face" href="https://instagram.com/oauth/authorize/?client_id=704275f237b346a0ac9201fef10371a4&redirect_uri=http%3A%2F%2Fzonawifisocial.com%2Fadmin%2Figauth&response_type=code&scope=basic+relationships"> <i class="fa fa-instagram button-authface" aria-hidden="true"></i> </a>
	   <br>
	   <small>First, log out on instagram to assign a different account.</small>
    </div>
</div>
	<?php
}
	?>
<div class="head-title"><h4><i class="fa fa-twitter" aria-hidden="true"></i> TWITTER SETTINGS</h4></div>
<div class="form-group {{ $errors->has('connect_tw') ? 'has-error' : ''}}">
<label for="connect_tw" class="col-md-4 control-label"><i class="fa fa-twitter" aria-hidden="true"></i> Connect with Twiter </label>
    <div class="col-md-6">
        {!! Form::select('connect_tw',['deactivated', 'activated'], null, ['class' => 'form-control']) !!}
        {!! $errors->first('connect_tw', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<?php
if(!isset($portal))
{
	?>
	<center style="margin-bottom:10px;">Settings available on edit.<br></center>
	<?php
}
else
{
	?>
<div class="form-group {{ $errors->has('like_us_popup') ? 'has-error' : ''}}">
<label for="like_us_popup" class="col-md-4 control-label"> <i class="fa fa-twitter" aria-hidden="true"></i> Twiter Profile</label>
    <div class="col-md-6">
	<?php
	if(isset($portals_users_twitter)):
	?>
	<?=$portals_users_twitter->username?>
	<?php
	else:
	?>
	Account not linked
	<?php
	endif;
	?>
       <a  class="pure-button pure-button-primary login-face login-twitter" href="javascript:void(0);"> <i class="fa fa-twitter button-authface" aria-hidden="true"></i> </a>
	   <br>
	   <small>First, log out on instagram to assign a different account.</small>
    </div>
</div>
	<?php
}
	?>

<div class="head-title" style="display: none;"><h4><i class="fa fa-whatsapp" aria-hidden="true"></i> WHATSAPP SETTINGS</h4></div>
<div style="display: none;" class="form-group {{ $errors->has('connect_wa') ? 'has-error' : ''}}">
<label for="connect_wa" class="col-md-4 control-label"><i class="fa fa-whatsapp" aria-hidden="true"></i> Connect with Whatsapp </label>
    <div class="col-md-6">
        {!! Form::select('connect_wa',['deactivated', 'activated'], null, ['class' => 'form-control']) !!}
        {!! $errors->first('connect_wa', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="head-title"><h4><i class="fa fa-google" aria-hidden="true"></i> GOOGLE SETTINGS</h4></div>
<div class="form-group {{ $errors->has('connect_go') ? 'has-error' : ''}}">
<label for="connect_go" class="col-md-4 control-label"><i class="fa fa-google" aria-hidden="true"></i> Connect with Google </label>
    <div class="col-md-6">
        {!! Form::select('connect_go',['deactivated', 'activated'], null, ['class' => 'form-control']) !!}
        {!! $errors->first('connect_go', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="head-title"><h4><i class="fa fa-css3" aria-hidden="true"></i> CUSTOM CSS</h4></div>
<div class="form-group {{ $errors->has('connect_wa') ? 'has-error' : ''}}">
<label for="connect_wa" class="col-md-4 control-label"><i class="fa fa-css3" aria-hidden="true"></i> CSS </label>
    <div class="col-md-6">
        <textarea name="css"><?php
        if(isset($portal->css))
         echo $portal->css;
            ?></textarea>
    </div>
</div>
<div class="device-edit-portal form-group {{ $errors->has('id_device') ? 'has-error' : ''}}">
    {!! Form::label('id_device', 'Id Device', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
		<input class="form-control" value="<?=$id_device?>" type="number" name="id_device" id="id_device">
        {!! $errors->first('id_device', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="user-edit-portal form-group {{ $errors->has('id_user') ? 'has-error' : ''}}">
    {!! Form::label('id_user', 'Id User', ['class' => 'col-md-4 control-label']) !!}  
    <div class="col-md-6">
        <input class="form-control" value="<?=$id_user?>" type="number" name="id_user" id="id_user">
        {!! $errors->first('id_user', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
<?php
if(isset($portal))
{
	?>
	  <script> 
	    var  close_popup_time = "<?=$portal->close_popup_time?>";
		var  close_popup_time_seconds = "<?=$portal->close_popup_time_seconds?>";
		var  close_popup_like_time = "<?=$portal->close_popup_like_time?>";
		var  close_popup_like_time_seconds = "<?=$portal->close_popup_like_time_seconds?>";
		var v1 = document.getElementById("close_popup_time");
		v1.value = close_popup_time;
		var v2 = document.getElementById("close_popup_time_seconds");
		v2.value = close_popup_time_seconds;
		var v3 = document.getElementById("close_popup_like_time");
		v3.value = close_popup_like_time;
		var v4 = document.getElementById("close_popup_like_time_seconds");
		v4.value = close_popup_like_time_seconds;
	  </script>
	<?php
}
?>