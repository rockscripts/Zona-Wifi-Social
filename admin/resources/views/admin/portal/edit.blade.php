@extends('laravel-authentication-acl::admin.layouts.base-2cols')

@section('title')
Admin area: list Client Device
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Portal Web</div>
                    <div class="panel-body">

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($portal, [
                            'method' => 'PATCH',
                            'url' => ['/admin/portal', $portal->id_portal],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('admin.portal.form', ['submitButtonText' => 'Update'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection