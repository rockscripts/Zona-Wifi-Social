@extends('laravel-authentication-acl::admin.layouts.base-2cols')

@section('title')
Client:: Device
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Device</div>
                    <div class="panel-body">

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($clientdevice, [
                            'method' => 'PATCH',
                            'url' => ['/admin/client-devices', $clientdevice->id_device],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('public.client-devices.form', ['submitButtonText' => 'Update'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection