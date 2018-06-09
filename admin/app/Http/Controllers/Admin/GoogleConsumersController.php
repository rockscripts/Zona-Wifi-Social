<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\InstagramConsumer;
use App\FacebookConsumer;
use App\TwitterConsumer;
use App\GoogleConsumer;
use Illuminate\Http\Request;
use Session;
use DB;
use Redirect;
use Illuminate\Support\Facades\Input;

class GoogleConsumersController extends Controller
{
	public $authentication = null;
	public $authentication_helper = null;
	public $email_platform_url = null;
	
	function __construct() 
	{
          $this->authentication = \App::make('authenticator');
	  $this->authentication_helper = \App::make('authentication_helper');
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
        $facebookconsumer = GoogleConsumer::findOrFail($id);
        $Permission = $this->authentication_helper->hasPermission(array("_member"));
        if($Permission)
	 return view('public.google-consumers.show', compact('facebookconsumer','clientdevice','user'));
	else
         return view('admin.google-consumers.show', compact('facebookconsumer','clientdevice','user'));
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
        GoogleConsumer::destroy($id);

        Session::flash('flash_message', 'Google Consumer deleted!');

        return redirect('admin/facebook-consumers?tab=google');
    }	
}
