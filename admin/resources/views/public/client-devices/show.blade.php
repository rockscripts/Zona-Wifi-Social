@extends('laravel-authentication-acl::admin.layouts.base-2cols')

@section('title')
Admin area: Show Client Device
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="">
                <div class="panel panel-default">
                    <div class="panel-heading">Device</div>
                    <div class="panel-body">

                        <a href="{{ url('admin/client-devices/' . $clientdevice->id_device . '/edit') }}" class="btn btn-primary btn-xs" title="Edit ClientDevice"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/clientdevices', $clientdevice->id_device],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete ClientDevice',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <!--<tr>
                                        <th>ID</th><td>{{ $clientdevice->id_device }}</td>
                                    </tr>
                                   -->
								
									<tr><th> Name </th><td> {{ $clientdevice->name }} </td></tr>
									<tr><th> Mac </th><td> {{ $clientdevice->mac }} </td></tr>
									<tr><th> Created at </th><td> {{ $clientdevice->created_at }} </td></tr>
                                </tbody>
                            </table>
                        </div>  

                    </div>
                </div> 
            </div>
        </div>
    </div>
@endsection