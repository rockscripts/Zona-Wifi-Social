
<div class="form-group {{ $errors->has('keyword') ? 'has-error' : ''}}">
    {!! Form::label('keyword', 'Keyword', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('keyword', null, ['class' => 'form-control']) !!}
        {!! $errors->first('keyword', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    {!! Form::label('type', 'Type', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('type', ['image', 'video'], null, ['class' => 'form-control']) !!}
        {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('media_file') ? 'has-error' : ''}}">
    {!! Form::label('media_file', 'Media File', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::file('media_file', null, ['class' => 'form-control']) !!}
        {!! $errors->first('media_file', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('position') ? 'has-error' : ''}}">
    {!! Form::label('position', 'Position', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('position', ['deactivated','login page', 'dialog','background page','logo'], null, ['class' => 'form-control']) !!}
        {!! $errors->first('position', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<?php
$authentication = \App::make('authenticator');
$userLogged = $authentication->getLoggedUser(); 
if(isset($_GET["device"]))
{
	?>
	<input type="hidden" name="id_device" value="<?=$_GET["device"]?>">
	<?php
}
else
{
	?>
	<input type="hidden" name="id_device" value="<?=$advertising->id_device?>">
	<?php
}
?>
<input type="hidden" name="id_user" value="<?=$userLogged->id?>">

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>