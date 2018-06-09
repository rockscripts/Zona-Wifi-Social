@extends('laravel-authentication-acl::admin.layouts.base-2cols')

@section('title')
Instagram:Consumers
@stop

@section('content')
<ul class="consumers-tabs">
	  <li ><a href="{{url('/admin/facebook-consumers/?tab=facebook')}}"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
	  <li class="active-consumer-tab-item"><i class="fa fa-instagram" aria-hidden="true"></i></li>
	  <li><a href="{{url('/admin/facebook-consumers/?tab=twitter')}}"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
           <li><a href="{{url('/admin/facebook-consumers/?tab=google')}}"><i class="fa fa-google" aria-hidden="true"></i></a></li>
	</ul>
    <div class="container">
	
        <div class="row">
            <div class="">
                <div class="panel panel-default">
                    <div class="panel-heading">Instagram Consumers</div>
                    <div class="panel-body">

                       <!-- <a href="{{ url('/admin/facebook-consumers/create') }}" class="btn btn-primary btn-xs" title="Add New Facebook Consumer"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                        <br/>
                        <br/>-->
						<a href="{{ url('/admin/instagram-consumers?app=instagram') }}" style="font-size: 18px;" class="btn btn-primary btn-xs"><i class="fa fa-share-alt-square" aria-hidden="true"></i> Marketing tool</a>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                       <th> Profile </th><th> Username </th><th> MAC </th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($facebookconsumers as $item)
                                    <tr>
									<td style="max-width:35px;">
									<a href="//instagram.com/{{$item->username}}" target="_blank"> &nbsp;<img style="width:40px;" src="{{$item->profile_picture}}"/></a>
									</td>
									    <td  class="notranslate">{{ $item->username }}</td>
										<td>
										{{ HTML::linkAction('Admin\ClientDevicesController@show', $item->mac , $item->id_device, array('target' => '_blank')) }}
										</td>
                                        <td>
                                            <a href="{{ url('/admin/instagram-consumers/' . $item["attributes"]["id_consumer"]) }}" class="btn btn-success btn-xs" title="View Instagram Consumer"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                          <!--  <a href="{{ url('/admin/facebook-consumers/' . $item["attributes"]["id_user"] . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Facebook Consumer"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>-->
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/destroy-instagram-consumers', $item["attributes"]["id_consumer"]],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Instagram Consumer" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Instagram Consumer',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr> 
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $facebookconsumers->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection