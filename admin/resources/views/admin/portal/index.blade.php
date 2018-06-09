@extends('laravel-authentication-acl::admin.layouts.base-2cols')

@section('title')
Admin area: list Client Device
@stop

@section('content')

    <div class="container">
        <div class="row">
            <div class="">
                <div class="panel panel-default">
                    <div class="panel-heading">Portal Webs</div>
                    <div class="panel-body">

                        <?php
					   if(isset($_GET["device"]) )
					  {	
                                              if(isset($portal))
                                              {
                                                  if(sizeof($portal)<1)
                                                  {
                        ?> 
						  <a href="{{ url('/admin/portal/create?device=') }}<?=$_GET["device"]?>" class="btn btn-primary btn-xs" title="Add New Portal"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
						<?php		
                                             }
                                              }
					  }												
                        ?> 
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                      <th> Title </th><th> Device </th><th> User </th><th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($portal as $item)
                                    <tr>
                                       <td>{{ $item->title }}</td><td>{{ HTML::linkAction('Admin\ClientDevicesController@show', $item->mac , $item->id_device, array('target' => '_blank')) }}</td>
									   <td> <a href="{!! URL::route('users.profile.edit',['user_id' => $item->id_user]) !!}" target="_blank">{{$item->email}}</a></td>
                                        <td>
                                            <a href="{{ url('/admin/portal/' . $item->id_portal) }}" class="btn btn-success btn-xs" title="View Portal"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/admin/portal/' . $item->id_portal . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Portal"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/portal', $item->id_portal],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Portal" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Portal',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $portal->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection