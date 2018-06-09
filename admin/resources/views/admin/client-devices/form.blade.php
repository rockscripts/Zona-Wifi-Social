<!--<div class="form-group {{ $errors->has('id_device') ? 'has-error' : ''}}">
    {!! Form::label('id_device', 'Id Device', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('id_device', null, ['class' => 'form-control']) !!}
        {!! $errors->first('id_device', '<p class="help-block">:message</p>') !!}
    </div>
</div>--> 
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('mac') ? 'has-error' : ''}}">
    {!! Form::label('mac', 'Mac', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('mac', null, ['class' => 'form-control']) !!}
        {!! $errors->first('mac', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('ip') ? 'has-error' : ''}}">
    {!! Form::label('ip', 'Ip', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('ip', null, ['class' => 'form-control']) !!}
        {!! $errors->first('ip', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('device_username') ? 'has-error' : ''}}">
    {!! Form::label('device_username', 'Login Username', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('device_username', null, ['class' => 'form-control']) !!}
        {!! $errors->first('device_username', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('device_password') ? 'has-error' : ''}}">
    {!! Form::label('device_password', 'Login Password', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::password('device_password', ['class' => 'form-control']) !!}
        {!! $errors->first('device_password', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<?php
$authentication = \App::make('authenticator');
$userLogged = $authentication->getLoggedUser();
?>
<input type="hidden" name="id_user" value="<?=$userLogged->id?>">

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
