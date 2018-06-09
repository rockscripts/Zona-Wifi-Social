@extends('laravel-authentication-acl::admin.layouts.base-2cols')

@section('title')
Clients::Show Ads
@stop

@section('content')

    <div class="container">
        <div class="row">
            <div class="">
                <div class="panel panel-default">
                    <div class="panel-heading">Advertising item</div>
                    <div class="panel-body">

                        <a href="{{ url('admin/advertising/' . $advertising->id_advertising . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Advertising"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/advertising', $advertising->id_advertising],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Advertising',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody> 
																
                                   </tr><tr><th> Keyword </th><td> {{ $advertising->keyword }} </td></tr>
								   <tr><th> Type </th><td><?php
										if($advertising->type==0)
										{
									     ?>
                                            <i class="fa fa-picture-o" aria-hidden="true"></i>&nbsp;Image
										<?php
										}
										?> 
										<?php
										if($advertising->type==1)
										{
									     ?>
                                            <i class="fa fa-video-camera" aria-hidden="true"></i>&nbsp;Video
										<?php
										}
										?> </td></tr>
								   
								  <tr>
								   <tr>
									<th> Position </th>
								  <td>
								  <?php
										if($advertising->position==0)
										{
									     ?>
                                          Deactivated
										<?php
										}
										?> 
										<?php
										if($advertising->position==1)
										{
									     ?>
										 Login page
										<?php
										}
										?>
								  <?php
										if($advertising->position==2)
										{
									     ?>
                                           Dialog
										<?php
										}
										?>
										<?php
										if($advertising->position==3)
										{
									     ?>
                                           Background page
										<?php
										}
										?>
								  </td>
								  </tr>
								  <td colspan="2">
								  <?php
										if($advertising->type==0)
										{
									     ?>
                                           <img src="{{ URL::to('/') }}/uploads/{{$advertising->id_user}}/{{$advertising->media_file}}" class="banner-show">
										<?php
										}
										?> 
										<?php
										if($advertising->type==1)
										{
									     ?>
                                           <div id="ads-video" class="video"></div>
								  <div class="media_url" url="{{ URL::to('/') }}/uploads/{{$advertising->id_user}}/{{$advertising->media_file}}"></div>
										<?php
										}
										?>
								  
								  </td>
								  </tr>	
								   
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection