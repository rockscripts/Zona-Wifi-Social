<div class="form-group {{ $errors->has('id_user@') ? 'has-error' : ''}}">
    {!! Form::label('id_user@', 'Id User@', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('id_user@', null, ['class' => 'form-control']) !!}
        {!! $errors->first('id_user@', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('first_name') ? 'has-error' : ''}}">
    {!! Form::label('first_name', 'First Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('last_name') ? 'has-error' : ''}}">
    {!! Form::label('last_name', 'Last Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    {!! Form::label('email', 'Email', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('gender') ? 'has-error' : ''}}">
    {!! Form::label('gender', 'Gender', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('gender', null, ['class' => 'form-control']) !!}
        {!! $errors->first('gender', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('birthday') ? 'has-error' : ''}}">
    {!! Form::label('birthday', 'Birthday', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('birthday', null, ['class' => 'form-control']) !!}
        {!! $errors->first('birthday', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('age_range') ? 'has-error' : ''}}">
    {!! Form::label('age_range', 'Age Range', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('age_range', null, ['class' => 'form-control']) !!}
        {!! $errors->first('age_range', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('religion') ? 'has-error' : ''}}">
    {!! Form::label('religion', 'Religion', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('religion', null, ['class' => 'form-control']) !!}
        {!! $errors->first('religion', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('political') ? 'has-error' : ''}}">
    {!! Form::label('political', 'Political', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('political', null, ['class' => 'form-control']) !!}
        {!! $errors->first('political', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('political') ? 'has-error' : ''}}">
    {!! Form::label('political', 'Political', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('political', null, ['class' => 'form-control']) !!}
        {!! $errors->first('political', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('profile_link') ? 'has-error' : ''}}">
    {!! Form::label('profile_link', 'Profile Link', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('profile_link', null, ['class' => 'form-control']) !!}
        {!! $errors->first('profile_link', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('website') ? 'has-error' : ''}}">
    {!! Form::label('website', 'Website', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('website', null, ['class' => 'form-control']) !!}
        {!! $errors->first('website', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('locale') ? 'has-error' : ''}}">
    {!! Form::label('locale', 'Locale', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('locale', null, ['class' => 'form-control']) !!}
        {!! $errors->first('locale', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('lacation') ? 'has-error' : ''}}">
    {!! Form::label('lacation', 'Lacation', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('lacation', null, ['class' => 'form-control']) !!}
        {!! $errors->first('lacation', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('hometown') ? 'has-error' : ''}}">
    {!! Form::label('hometown', 'Hometown', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('hometown', null, ['class' => 'form-control']) !!}
        {!! $errors->first('hometown', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('post_id') ? 'has-error' : ''}}">
    {!! Form::label('post_id', 'Post Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('post_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('post_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('access_token') ? 'has-error' : ''}}">
    {!! Form::label('access_token', 'Access Token', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('access_token', null, ['class' => 'form-control']) !!}
        {!! $errors->first('access_token', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('mac') ? 'has-error' : ''}}">
    {!! Form::label('mac', 'Mac', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('mac', null, ['class' => 'form-control']) !!}
        {!! $errors->first('mac', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>