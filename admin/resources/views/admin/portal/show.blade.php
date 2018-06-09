@extends('laravel-authentication-acl::admin.layouts.base-2cols')

@section('title')
Admin::Portal
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="">
                <div class="panel panel-default">
                    <div class="panel-heading">Portal Web</div>
                    <div class="panel-body">

                        <a href="{{ url('admin/portal/' . $portal->id_portal . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Portal"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/portal', $portal->id_portal],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Portal',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                   <tr><th> Title </th><td> {{ $portal->title }} </td></tr>
								   <tr><th> Main dialog </th><td> 
								   <?php
								   if($portal->display_popup==0)
								   {
									   ?>
									   Disabled
									   <?php
								   }
								   elseif($portal->display_popup==0)
								   {
									   ?>
									   Banner
									   <?php
								   }
								   else
								   {
									   ?>
									   Video
									   <?php
								   }
								   ?>
								   </td></tr>
								   <tr><th> Time to close dialog </th><td> {{ $portal->close_popup_time }}m:{{ $portal->close_popup_time_seconds}}s </td></tr>
								   <tr><th> Redirect to </th><td> <a href="{{ $portal->redirect_url }}">{{ $portal->redirect_url }} </a></td></tr>
								    <tr><th> Access Code </th><td>{{ $portal->access_code }} </td></tr>
								   <tr><th><i class="fa fa-facebook-square" aria-hidden="true"></i> Fanpage ID  </th><td> <a href="http://facebook.com/{{ $portal->fb_page_id }}">{{ $portal->fb_page_id }}</a> </td></tr>
								   <tr><th><i class="fa fa-facebook-square" aria-hidden="true"></i> Fanpage Name  </th><td> {{ $portal->fb_page_name }} </td></tr>
								      <tr><th><i class="fa fa-facebook-square" aria-hidden="true"></i> Share our site?  </th><td> 
								   <?php
								   if($portal->share_action==0)
								   {
									   ?>
									   Deactivated
									   <?php
								   }
								   else
								   {
									   ?>
									   Activated
									   <?php
								   }
								   ?></td></tr>
								   <tr><th> <i class="fa fa-facebook-square" aria-hidden="true"></i> Share msn  </th><td><textarea disabled width="100%" heigth="200px">{{ $portal->share_message }}</textarea></td></tr>
								
								   <tr><th><i class="fa fa-facebook-square" aria-hidden="true"></i> <span class="notranslate"> Like us</span>  dialog  </th><td> 
								   <?php
								   if($portal->like_us_popup==0)
								   {
									   ?>
									   Deactivated
									   <?php
								   }
								   else
								   {
									   ?>
									   Activated
									   <?php
								   }
								   ?></td></tr>
								   <tr><th><i class="fa fa-facebook-square" aria-hidden="true"></i> Time to close <span class="notranslate">like us</span>  dialog </th><td> {{ $portal->close_popup_like_time }}m:{{ $portal->close_popup_like_time_seconds}}s </td></tr>
								   <tr><th>  Device  </th><td>{{ HTML::linkAction('Admin\ClientDevicesController@show', $portal->mac , $portal->id_device, array('target' => '_blank')) }}</td></tr>
								   <tr><th>   User</th><td> <a href="{!! URL::route('users.profile.edit',['user_id' => $portal->id_user]) !!}" target="_blank">{{$portal->email}}</a></td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection