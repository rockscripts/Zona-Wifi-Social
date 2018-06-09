<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\FacebookConsumer;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Input;
use App\InstagramConsumer;
use App\TwitterConsumer;
use App\GoogleConsumer;

class FacebookConsumersController extends Controller
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
        $tab = Input::get('tab', false);
        $Permission = $this->authentication_helper->hasPermission(array("_member"));
        if($Permission)
		{
			
			
			if($tab)
			{
			 if($tab=="facebook")
			 {
				 $facebookconsumers = FacebookConsumer::join('client_devices', 'facebook_consumers.mac', '=', 'client_devices.mac')->join('users', 'client_devices.id_user', '=', 'users.id')->where('users.id', '=', $userLogged->id)->paginate(25);
				 return view('public.facebook-consumers.index', compact('facebookconsumers','user','clientdevice'));
			 }	
             if($tab=="instagram")
			 {
				 $facebookconsumers = InstagramConsumer::join('client_devices', 'instagram_consumers.mac', '=', 'client_devices.mac')->join('users', 'client_devices.id_user', '=', 'users.id')->where('users.id', '=', $userLogged->id)->paginate(25);
				 return view('public.facebook-consumers.indexig', compact('facebookconsumers','user','clientdevice'));
			 }	
             if($tab=="whatsapp")
			 {
				 $facebookconsumers = FacebookConsumer::join('client_devices', 'whatsapp_consumers.mac', '=', 'client_devices.mac')->join('users', 'client_devices.id_user', '=', 'users.id')->where('users.id', '=', $userLogged->id)->paginate(25);
				 return view('public.facebook-consumers.indexwa', compact('facebookconsumers','user','clientdevice'));
			 }
                          if($tab=="twitter")
			 {
				 $facebookconsumers = TwitterConsumer::join('client_devices', 'twitter_consumers.mac', '=', 'client_devices.mac')->join('users', 'client_devices.id_user', '=', 'users.id')->where('users.id', '=', $userLogged->id)->paginate(25);
				 return view('public.facebook-consumers.indextw', compact('facebookconsumers','user','clientdevice'));
			 }
                         if($tab=="google")
			 {
				 $facebookconsumers = GoogleConsumer::join('client_devices', 'google_consumers.mac', '=', 'client_devices.mac')->join('users', 'client_devices.id_user', '=', 'users.id')->where('users.id', '=', $userLogged->id)->paginate(25);
				 return view('public.facebook-consumers.indexgoo', compact('facebookconsumers','user','clientdevice'));
			 }
			}
			else{
				$facebookconsumers = FacebookConsumer::join('client_devices', 'facebook_consumers.mac', '=', 'client_devices.mac')->join('users', 'client_devices.id_user', '=', 'users.id')->where('users.id', '=', $userLogged->id)->paginate(25);
				 return view('public.facebook-consumers.index', compact('facebookconsumers','user','clientdevice'));
			}
			
		    
		}		 
		else
		{
		
		
		if($tab)
			{
			 if($tab=="facebook")
			 {
				 $facebookconsumers = FacebookConsumer::join('client_devices', 'facebook_consumers.mac', '=', 'client_devices.mac')->join('users', 'client_devices.id_user', '=', 'users.id')->paginate(25);
				 return view('admin.facebook-consumers.index', compact('facebookconsumers','user','clientdevice'));
			 }	
                         if($tab=="instagram")
			 {
				 $facebookconsumers = InstagramConsumer::join('client_devices', 'instagram_consumers.mac', '=', 'client_devices.mac')->join('users', 'client_devices.id_user', '=', 'users.id')->paginate(25);
				 return view('admin.facebook-consumers.indexig', compact('facebookconsumers','user','clientdevice'));
			 }	
                         if($tab=="whatsapp")
			 {
				 $facebookconsumers = FacebookConsumer::join('client_devices', 'whatsapp_consumers.mac', '=', 'client_devices.mac')->join('users', 'client_devices.id_user', '=', 'users.id')->paginate(25);
				 return view('admin.facebook-consumers.indexwa', compact('facebookconsumers','user','clientdevice'));
			 }	
                         if($tab=="twitter")
			 {
				 $facebookconsumers = FacebookConsumer::join('client_devices', 'twitter_consumers.mac', '=', 'client_devices.mac')->join('users', 'client_devices.id_user', '=', 'users.id')->paginate(25);
				 return view('admin.facebook-consumers.indextw', compact('facebookconsumers','user','clientdevice'));
			 }
                          if($tab=="google")
			 {
				 $facebookconsumers = TwitterConsumer::join('client_devices', 'google_consumers.mac', '=', 'client_devices.mac')->join('users', 'client_devices.id_user', '=', 'users.id')->where('users.id', '=', $userLogged->id)->paginate(25);
				 return view('admin.facebook-consumers.indexgoo', compact('facebookconsumers','user','clientdevice'));
			 }
			}
			else{
				$facebookconsumers = FacebookConsumer::join('client_devices', 'facebook_consumers.mac', '=', 'client_devices.mac')->join('users', 'client_devices.id_user', '=', 'users.id')->paginate(25);
				 return view('admin.facebook-consumers.index', compact('facebookconsumers','user','clientdevice'));
			}
		}
        	
		}			
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    /*public function create()
    {
		$userLogged = $this->authentication->getLoggedUser();
		if(!isset($userLogged->id))
		{
		 return view('laravel-authentication-acl::client.auth.login');
		}
        return view('admin.facebook-consumers.create');
    }*/

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
        $requestData = $request->all();
        
        FacebookConsumer::create($requestData);

        Session::flash('flash_message', 'FacebookConsumer added!');

        return redirect('admin/facebook-consumers');
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
        $facebookconsumer = FacebookConsumer::findOrFail($id);
        $Permission = $this->authentication_helper->hasPermission(array("_member"));
        if($Permission)
		 return view('public.facebook-consumers.show', compact('facebookconsumer','clientdevice','user'));
		else
        return view('admin.facebook-consumers.show', compact('facebookconsumer','clientdevice','user'));
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
		$facebookconsumer = FacebookConsumer::findOrFail($id);
		$Permission = $this->authentication_helper->hasPermission(array("_member"));
        if($Permission)
		 return view('public.facebook-consumers.edit', compact('facebookconsumer','clientdevice','user'));
		else
        return view('admin.facebook-consumers.edit', compact('facebookconsumer','clientdevice','user'));
	
        
    //    return view('admin.facebook-consumers.edit', compact('facebookconsumer'));
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
        $userLogged = $this->authentication->getLoggedUser();
		if(!isset($userLogged->id))
		{
		 return view('laravel-authentication-acl::client.auth.login');
		}
        $requestData = $request->all();
        
        $facebookconsumer = FacebookConsumer::findOrFail($id);
        $facebookconsumer->update($requestData);

        Session::flash('flash_message', 'FacebookConsumer updated!');

        return redirect('admin/facebook-consumers');
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
        $userLogged = $this->authentication->getLoggedUser();
        if(!isset($userLogged->id))
        {
         return view('laravel-authentication-acl::client.auth.login');
        }
        FacebookConsumer::destroy($id);
        Session::flash('flash_message', 'Facebook Consumer deleted!');
        return redirect('admin/facebook-consumers');
    }
}
