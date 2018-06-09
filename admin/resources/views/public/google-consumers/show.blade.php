@extends('laravel-authentication-acl::admin.layouts.base-2cols')

@section('title')
Google::edit consumer
@stop

@section('content')
    <div class="container">

        <div class="row">
            <div class="">
                <div class="panel panel-default">
                    <div class="panel-heading">Google Consumer</div>
                    <div class="panel-body">
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/destroy-google-consumers', $facebookconsumer["attributes"]["id_consumer"]],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Google Consumer',
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
                                                                   <tr><th> Profile </th><td> <a href="//plus.google.com/{{$facebookconsumer->id_goo_user}}" target="_blank"> &nbsp;<img style="width:40px;" src="{{$facebookconsumer->profile_picture}}"/></a> </td></tr>
								   <tr><th> Full Name </th><td> {{ $facebookconsumer->full_name }} </td></tr>
								   <tr><th> Email </th><td>{{strtolower($facebookconsumer->email)  }}</td></tr>
                                                                  <tr><th> Date created </th><td> {{ucfirst($facebookconsumer->date)  }}</td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div> 
            </div>
        </div>
    </div>
@endsection