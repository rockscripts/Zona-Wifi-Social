<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ClientDevice;
use Illuminate\Http\Request;
use Session;


class ClientDevicesController extends Controller
{
	public $authentication = null;
	public $authentication_helper = null;
	function __construct() 
	{
      $this->authentication = \App::make('authenticator');
	  $this->authentication_helper = \App::make('authentication_helper');
	  
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
		$userLogged = $this->authentication->getLoggedUser();
		if(!isset($userLogged->id))
		{
		 return view('laravel-authentication-acl::client.auth.login');
		}
		else
		{
	    
		$Permission = $this->authentication_helper->hasPermission(array("_member"));
        if($Permission)
		{
			$clientdevices = ClientDevice::join('users', 'client_devices.id_user', '=', 'users.id')->where('users.id', '=', $userLogged->id)->paginate(25);
			return view('public.client-devices.index', compact('clientdevices','user'));
		}
		 
		else
		{
			$clientdevices = ClientDevice::join('users', 'client_devices.id_user', '=', 'users.id')->paginate(25);
		    return view('admin.client-devices.index', compact('clientdevices','user'));	
		}
        
		}
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
		$userLogged = $this->authentication->getLoggedUser();
		if(!isset($userLogged->id))
		{
		 return view('laravel-authentication-acl::client.auth.login');
		}
        return view('admin.client-devices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $userLogged = $this->authentication->getLoggedUser();
		if(!isset($userLogged->id))
		{
		 return view('laravel-authentication-acl::client.auth.login');
		}
		 $this->validate($request, [
        'mac' => 'unique:client_devices'
    ]);
        $requestData = $request->all();
        
        ClientDevice::create($requestData);

        Session::flash('flash_message', 'Client Device added!');

        return redirect('admin/client-devices');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
		$userLogged = $this->authentication->getLoggedUser();
		if(!isset($userLogged->id))
		{
		 return view('laravel-authentication-acl::client.auth.login');
		}
		else
		{
			$clientdevice = ClientDevice::where('id_device', '=' ,$id)->with('user')->firstOrFail();        
			$Permission = $this->authentication_helper->hasPermission(array("_member"));
			if($Permission)
			 return view('public.client-devices.show', compact('clientdevice','user'));
			else
			return view('admin.client-devices.show', compact('clientdevice','user'));
		}        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
		$userLogged = $this->authentication->getLoggedUser();
		if(!isset($userLogged->id))
		{
		 return view('laravel-authentication-acl::client.auth.login');
		}
		else
		{
        $clientdevice = ClientDevice::where('id_device', '=' ,$id)->with('user')->firstOrFail();
		
		$Permission = $this->authentication_helper->hasPermission(array("_member"));
        if($Permission)
		 return view('public.client-devices.edit', compact('clientdevice','user'));
		else
        return view('admin.client-devices.edit', compact('clientdevice','user'));
		}
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        $requestData = $request->all();
        
        $clientdevice = ClientDevice::findOrFail($id);
        $clientdevice->update($requestData);

        Session::flash('flash_message', 'ClientDevice updated!');

        return redirect('admin/client-devices');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        ClientDevice::destroy($id);

        Session::flash('flash_message', 'ClientDevice deleted!');

        return redirect('admin/client-devices');
    }
}
