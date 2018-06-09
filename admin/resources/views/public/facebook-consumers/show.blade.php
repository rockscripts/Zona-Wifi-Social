@extends('laravel-authentication-acl::admin.layouts.base-2cols')

@section('title')
Admin area: edit user
@stop

@section('content')
    <div class="container">

        <div class="row">
            <div class="">
                <div class="panel panel-default">
                    <div class="panel-heading">Facebook Consumer</div>
                    <div class="panel-body">
                        <!-- <a href="{{ url('admin/facebook-consumers/' . $facebookconsumer["attributes"]["id_fb_user"] . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Facebook Consumer"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>-->
                        
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/facebookconsumers', $facebookconsumer["attributes"]["id_fb_user"]],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete FacebookConsumer',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
						<!--<a href="{{ url('admin/facebook-consumers/' . $facebookconsumer["attributes"]["id_fb_user"] . '/edit') }}" class="btn btn-primary btn-xs" title="Send Message to his Facebook Message Imbox"><i class="fa fa-weixin" aria-hidden="true"></i></a>-->
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
								<td colspan="2" >
								<a href="{{ $facebookconsumer->profile_link }}" class="" style="text-decoration:none;font-size: 30px;margin-left: -9px;" target="_blank"> &nbsp;<i class="fa fa-facebook-square" aria-hidden="true"></i>&nbsp;Profile</a>
								
								</td>
                                   </tr><tr><th> Name </th><td>{{ ucfirst($facebookconsumer->first_name )}} </td></tr><tr><th> Last Name </th><td> {{ $facebookconsumer->last_name }} </td></tr>
								   <tr><th> Email </th><td> {{strtolower($facebookconsumer->email)  }} </td></tr>
								   <tr><th> Gender </th><td> {{ucfirst($facebookconsumer->gender)  }} </td></tr>
								   <tr><th> Date Created </th><td> {{ strtolower($facebookconsumer->created_at) }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection