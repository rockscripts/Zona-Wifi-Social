@extends('laravel-authentication-acl::admin.layouts.base-2cols')

@section('title')
Clients::Ads list
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="">
                <div class="panel panel-default">
                    <div class="panel-heading">Advertising list</div>
                    <div class="panel-body">
                      <?php
					  if(isset($_GET["device"]))
					  {												
                        ?>
						  <a href="{{ url('/admin/advertising/create?device=') }}<?=$_GET["device"]?>" class="btn btn-primary btn-xs" title="Add New Advertising"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
						<?php					
					  }											
                        ?> 
                      
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                       <th> Keyword </th><th> Type </th>
									   <th> Position </th><th> MAC </th><th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($advertising as $item)
                                    <tr>
										<td>{{ $item->keyword }}</td>
										<td><?php
										if($item->type==0)
										{
									     ?>
                                            <i class="fa fa-picture-o" aria-hidden="true"></i>&nbsp;Image
										<?php
										}
										?> 
										<?php
										if($item->type==1)
										{
									     ?>
                                            <i class="fa fa-video-camera" aria-hidden="true"></i>&nbsp;Video
										<?php
										}
										?>
										</td>
										<td>
										<?php
										if($item->position==0)
										{
									     ?>
                                           Deactivated
										<?php
										}
										?> 
										<?php
										if($item->position==1)
										{
									     ?>
                                            Login page 
										<?php
										}
										?>
										<?php
										if($item->position==2)
										{
									     ?>
                                            Dialog
										<?php
										}
										?>
										<?php
										if($item->position==3)
										{
									     ?>
                                            Background page
										<?php
										}
										?>
                                            <?php
										if($item->position==4)
										{
									     ?>
                                            Logo
										<?php
										}
										?>
										</td>
										<td>
										{{ HTML::linkAction('Admin\ClientDevicesController@show', $item->mac , $item->id_device, array('target' => '_blank')) }}
										</td>
                                        <td>
                                            <a href="{{ url('/admin/advertising/' . $item->id_advertising) }}" class="btn btn-success btn-xs" title="View Advertising"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/admin/advertising/' . $item->id_advertising . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Advertising"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/advertising', $item->id_advertising],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Advertising" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Advertising',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $advertising->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection