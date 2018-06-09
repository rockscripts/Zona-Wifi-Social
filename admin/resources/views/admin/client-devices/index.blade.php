@extends('laravel-authentication-acl::admin.layouts.base-2cols')

@section('title')
Admin area: list Client Device
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="">
                <div class="panel panel-default">
                    <div class="panel-heading">Clients Devices</div>
                    <div class="panel-body">
						
                        <a href="{{ url('/admin/client-devices/create') }}" class="btn btn-primary btn-xs" title="Add New Client Device"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th> Name </th><th> Mac </th><th>User </th><th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($clientdevices as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td><td>{{ $item->mac }}</td><td> {{ HTML::linkAction('Admin\ClientDevicesController@show', $item->email , $item->id_user, array('target' => '_blank')) }}</td>
                                        <td>
										<a href="{{ url('/admin/advertising/?device=' . $item->id_device) }}" class="btn btn-primary btn-xs" title="View advertisings for this device"><i class="fa fa-picture-o" aria-hidden="true"></i></a>
						<a href="{{ url('/admin/portal/?device=' . $item->id_device) }}" class="btn btn-primary btn-xs" title="View portal for this device"><i class="fa fa-chrome"></i></a>
                                            <a href="{{ url('/admin/client-devices/' . $item->id_device) }}" class="btn btn-success btn-xs" title="View Client Device"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/admin/client-devices/' . $item->id_device . '/edit') }}" class="btn btn-primary btn-xs" title="Edit ClientDevice"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/client-devices', $item->id_device],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Client Device" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete ClientDevice',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $clientdevices->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection