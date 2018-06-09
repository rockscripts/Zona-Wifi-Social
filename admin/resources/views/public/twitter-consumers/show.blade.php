@extends('laravel-authentication-acl::admin.layouts.base-2cols')

@section('title')
Twitter::edit consumer
@stop

@section('content')
    <div class="container">

        <div class="row">
            <div class="">
                <div class="panel panel-default">
                    <div class="panel-heading">Twitter Consumer</div>
                    <div class="panel-body">
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/destroy-twitter-consumers', $facebookconsumer["attributes"]["id_consumer"]],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Twitter Consumer',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}						
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
								<td colspan="2" >
								
								
								</td>
                                                                   <tr><th> Profile </th><td> <a href="//instagram.com/{{$facebookconsumer->username}}" target="_blank"> &nbsp;<img style="width:40px;" src="{{$facebookconsumer->profile_picture}}"/></a> </td></tr>
								   <tr><th> Full Name </th><td> {{ $facebookconsumer->full_name }} </td></tr>
								   <tr><th> Username </th><td> {{ucfirst($facebookconsumer->username)  }} </td></tr>
								   <tr><th> Email </th><td> <a href="{{ucfirst($facebookconsumer->email)  }}" target="_blank">{{ucfirst($facebookconsumer->email)  }}</a> </td></tr>								   
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div> 
            </div>
        </div>
    </div>
@endsection