@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit facebook consumer {{ $facebookconsumer->id_user }}</div>
                    <div class="panel-body">

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($facebookconsumer, [
                            'method' => 'PATCH',
                            'url' => ['/admin/facebook-consumers', $facebookconsumer->id_user],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('admin.facebook-consumers.form', ['submitButtonText' => 'Update'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection