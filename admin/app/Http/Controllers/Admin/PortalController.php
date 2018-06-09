<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ClientDevice;
use App\Portal;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

use Abraham\TwitterOAuth\TwitterOAuth;
/*twitter credentials*/
$protocol = isset($_SERVER["HTTPS"]) ? 'https' : 'http';
define('CONSUMER_KEY', 'kX1OV65yzZXjlcJ1ExHVcGiGY'); // add your app consumer key between single quotes
define('CONSUMER_SECRET', 'UMrZdIxKrwPED1JipZHImAIsGk2O9IokxVdQJHw5oUG5pyUGq8'); // add your app consumer secret key between single quotes
define('OAUTH_CALLBACK', $protocol.'://'.$_SERVER["HTTP_HOST"]."/admin/twauth"); // your app callback URL

class PortalController extends Controller
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
			if(isset($_GET["device"]))
			{
				$portal = Portal::join('users', 'portals.id_user', '=', 'users.id')->join('client_devices', 'portals.id_device', '=', 'client_devices.id_device')->where('portals.id_user', '=', $userLogged->id)->where('portals.id_device', '=', $_GET["device"])->paginate(25);
                return view('public.portal.index', compact('portal','user','clientdevice'));  
			}
			else
			{
				$portal = Portal::join('users', 'portals.id_user', '=', 'users.id')->join('client_devices', 'portals.id_device', '=', 'client_devices.id_device')->where('portals.id_user', '=', $userLogged->id)->paginate(25);
                return view('public.portal.index', compact('portal','user','clientdevice'));  
			}
			
		  }
		  else
		  {
			if(isset($_GET["device"]))
			{
			$portal = Portal::join('users', 'portals.id_user', '=', 'users.id')->join('client_devices', 'portals.id_device', '=', 'client_devices.id_device')->where('portals.id_device', '=', $_GET["device"])->paginate(25);
            return view('admin.portal.index', compact('portal','user','clientdevice'));    
			}
			else
			{
				$portal = Portal::join('users', 'portals.id_user', '=', 'users.id')->join('client_devices', 'portals.id_device', '=', 'client_devices.id_device')->paginate(25);
            return view('admin.portal.index', compact('portal','user','clientdevice'));    
			}
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
                $portal = null;
		if(!isset($userLogged->id)) 
		{
		 return view('laravel-authentication-acl::client.auth.login');
		}
		else
		{
			$Permission = $this->authentication_helper->hasPermission(array("_member"));
			if(!isset($_GET["device"]))
			{
				 return redirect('admin/client-devices');
			}
			else
			{
			
			if($Permission)
		     {
		      $clientdevice = ClientDevice::where('id_device', '=' ,$_GET["device"])->with('user')->firstOrFail();
                      $id_user = 	$userLogged->id;
                      $id_device = 	$_GET["device"];		  
			  return view('public.portal.create', compact('portal','clientdevice','id_user','id_device'));
			 }
			else
			 {
			  return view('admin.portal.create', compact('portal','clientdevice'));	
			 }	
			}
		}
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
        $requestData = $request->all();
		
       
        Portal::create($requestData);

        Session::flash('flash_message', 'Portal added!');

        return redirect('admin/portal?device='.$request->input("id_device"));
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
		$portal = Portal::leftJoin('users', function($join){
                $join->on('users.id', '=', 'portals.id_user');
            })
			->leftJoin('client_devices', function($join){
				$join->on('client_devices.id_device', '=', 'portals.id_device');
            })
			
            ->where('portals.id_portal', '=', $id)
            ->get()->first();
		$Permission = $this->authentication_helper->hasPermission(array("_member"));
		if($Permission)
		{
		  return view('public.portal.show', compact('portal'));	
		}
		else
		{
		  return view('admin.portal.show', compact('portal'));	
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
                $portal = Portal::findOrFail($id);
		session(['id_user' => $portal["id_user"],'id_portal' => $portal["id_portal"],'url_redirect'=>url()->current()]);
		$portals_users_instagram = DB::table('portals_users_instagram')->where('id_user', $portal["id_user"])->where('id_portal', $portal["id_portal"])->first();
		$portals_users_twitter = DB::table('portals_users_twitter')->where('id_user', $portal["id_user"])->where('id_portal', $portal["id_portal"])->first();
                $Permission = $this->authentication_helper->hasPermission(array("_member"));
		
		if($Permission)
		{
		 $id_user = 	$userLogged->id;
                 $id_device = $portal["id_device"];
		  return view('public.portal.edit', compact('portal','portals_users_instagram','id_user','id_device','portals_users_twitter'));	
		}
		else
		{
	          return view('admin.portal.edit', compact('portal','portals_users_instagram','portals_users_twitter'));
		}
       
    }
	public function igauth()
	{
		$code = Input::get('code', false);
		if($code):		
		$uri = 'https://api.instagram.com/oauth/access_token'; 
		$data = [
			'client_id' => '704275f237b346a0ac9201fef10371a4', 
			'client_secret' => '56e174d0ece449b5bad57a539d8bcfa2', 
			'grant_type' => 'authorization_code', 
			'redirect_uri' => 'http://zonawifisocial.com/admin/igauth', 
			'code' => $_GET["code"]
		];
		$object = $this->call_instagram($uri, $data);
		$id_portal = session()->get('id_portal');
		$id_user = session()->get('id_user');
		$this->save_instagram_portal_user($object,$id_user,$id_portal);
		return redirect(session()->get('url_redirect'));
	endif;	
	}
	public function save_instagram_portal_user($object,$id_user,$id_portal)
	{
	 $portal_user_instagram = DB::table('portals_users_instagram')->where('id_user', $id_user)->where('id_portal', $id_portal)->first();
	 if(!isset($portal_user_instagram->username)):
	  DB::table('portals_users_instagram')->insert(
                                                        ['id_ig_user' => $object->user->id, 
                                                         'id_user' => $id_user, 
                                                         'id_portal' => $id_portal, 
                                                         'full_name' => $object->user->full_name, 
                                                         'profile_picture' => $object->user->profile_picture,
                                                         'website' => $object->user->website,
                                                         'bio' => $object->user->bio,
                                                         'username' => $object->user->username,
                                                         'access_token' => $object->access_token,
                                                         'date' => date("Y-m-d H:i:s"),
                                                         ]
                                                        );
       return $object->user->id;
	   else:
	   
	   DB::table('portals_users_instagram')->where('id_user', (int)$id_user)
	                                       ->where('id_portal',(int) $id_portal)
	                                       ->update(
                                                            ['id_ig_user' => $object->user->id, 
                                                             'id_user' => $id_user, 
                                                             'id_portal' => $id_portal, 
                                                             'full_name' => $object->user->full_name, 
                                                             'profile_picture' => $object->user->profile_picture,
                                                             'website' => $object->user->website,
                                                             'bio' => $object->user->bio,
                                                             'username' => $object->user->username,
                                                             'access_token' => $object->access_token,
                                                             'date' => date("Y-m-d H:i:s"),
                                                             ]
                                                      );
	 endif;	  								
	}
	private function call_instagram($uri, $data)
	{
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $uri); // uri
			curl_setopt($ch, CURLOPT_POST, true); // POST
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // POST DATA
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // RETURN RESULT true
			curl_setopt($ch, CURLOPT_HEADER, 0); // RETURN HEADER false
			curl_setopt($ch, CURLOPT_NOBODY, 0); // NO RETURN BODY false / we need the body to return
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); // VERIFY SSL HOST false
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); // VERIFY SSL PEER false
			return json_decode(curl_exec($ch)); // 
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
        $portal = Portal::findOrFail($id);
        $portal->update($requestData);

        Session::flash('flash_message', 'Portal updated!');

        return redirect('admin/portal?device='.$request->input("id_device"));
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
        Portal::destroy($id);

        Session::flash('flash_message', 'Portal deleted!');

        return redirect('admin/portal');
    }
    
    
    function twauth() 
{
    if (isset($_REQUEST['oauth_verifier'], $_REQUEST['oauth_token'])) {
        if(session()->get('oauth_token'))
        {
            if($_REQUEST['oauth_token'] == session()->get('oauth_token'))
            {
              $request_token = [];
            $request_token['oauth_token'] = session()->get('oauth_token');
            $request_token['oauth_token_secret'] = session()->get('oauth_token_secret');
            $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $request_token['oauth_token'], $request_token['oauth_token_secret']);
            $access_token = $connection->oauth("oauth/access_token", array("oauth_verifier" => $_REQUEST['oauth_verifier']));
            session(['access_token' =>$access_token]); 
            }
        }	
       }

    if (!(session()->get('access_token'))) {
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
	$request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => OAUTH_CALLBACK));
        session(['oauth_token' =>$request_token['oauth_token'],'oauth_token_secret' =>$request_token['oauth_token_secret']]); 
	$url = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token'])); 
        if(isset($_GET["type"]))
         echo json_encode($url);
        else
         return redirect(session()->get('url_redirect'));
	
} else {
	$access_token = session()->get('access_token');
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
	$TW_user = $connection->get("account/verify_credentials",['include_email' => true]);
        
        if(!isset($TW_user->screen_name))
        {
          if((session()->get('access_token')))
              session()->forget('access_token');
          if((session()->get('oauth_token')))
              session()->forget('oauth_token');
          if((session()->get('oauth_token_secret')))
              session()->forget('oauth_token_secret');
          $this->twauth();  
        }
        else  
        {
          $id_portal = session()->get('id_portal');
	  $id_user = session()->get('id_user');
          $this->save_twitter_portal_user($TW_user, $id_user, $id_portal); 
           if(isset($_GET["type"]))
            echo json_encode($url);
           else
            return redirect(session()->get('url_redirect'));
         /*send request: member to consumer*/
        }	
}

}
public function save_twitter_portal_user($object,$id_user,$id_portal)
	{
    
	 $portal_user_twitter = DB::table('portals_users_twitter')->where('id_user', $id_user)->where('id_portal', $id_portal)->first();
	 $portal  = DB::table('portals')->where('id_portal', $id_portal)->first();
         $device  = DB::table('client_devices')->where('id_device', $portal->id_device)->first();
         if(!isset($portal_user_twitter->username)):
	  DB::table('portals_users_twitter')->insert(
                                                        ['id_tw_user' => $object->id_str, 
                                                         'id_user' => $id_user, 
                                                         'id_portal' => $id_portal, 
                                                         'full_name' => $object->name, 
                                                         'profile_picture' => $object->profile_image_url,
                                                        // 'email' => $object->email,
                                                         'mac' => $device->mac,
                                                         'username' => $object->screen_name,
                                                         'access_token' => json_encode(session()->get('access_token')),
                                                         'date' => date("Y-m-d H:i:s"),
                                                         ]
                                                     );
                  return $object->id_str;
	   else:	   
	   DB::table('portals_users_twitter')->where('id_user', (int)$id_user)
	                                       ->where('id_portal',(int) $id_portal)
	                                       ->update(
                                                            ['id_tw_user' => $object->id_str, 
                                                         'id_user' => $id_user, 
                                                         'id_portal' => $id_portal, 
                                                         'full_name' => $object->name, 
                                                         'profile_picture' => $object->profile_image_url,
                                                        // 'email' => $object->email,
                                                         'mac' => $device->mac,
                                                         'username' => $object->screen_name,
                                                         'access_token' => json_encode(session()->get('access_token')),
                                                         'date' => date("Y-m-d H:i:s"),
                                                             ]
                                                        );
	 endif;	  								
	}
}
