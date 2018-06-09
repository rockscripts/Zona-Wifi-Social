<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\InstagramConsumer;
use App\FacebookConsumer;
use App\TwitterConsumer;
use Illuminate\Http\Request;
use Session;
use DB;
use Redirect;
use Illuminate\Support\Facades\Input;

class TwitterConsumersController extends Controller
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
        $facebookconsumer = TwitterConsumer::findOrFail($id);
        $Permission = $this->authentication_helper->hasPermission(array("_member"));
        if($Permission)
		 return view('public.twitter-consumers.show', compact('facebookconsumer','clientdevice','user'));
		else
        return view('admin.twitter-consumers.show', compact('facebookconsumer','clientdevice','user'));
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
        TwitterConsumer::destroy($id);

        Session::flash('flash_message', 'Twitter Consumer deleted!');

        return redirect('admin/facebook-consumers?tab=twitter');
    }
	
	public function index()
	{
            $userLogged = $this->authentication->getLoggedUser();
		if(!isset($userLogged->id))
		{
		 return view('laravel-authentication-acl::client.auth.login');
		}
                else
		{
                
                }
	}
	public function set_permissions($email)
	{
	 $laravel_connection = DB::connection('mysql');	
	 $laravel_connection->table('users')
            ->where('email', $email)
            ->update(['permissions' => '{"_member":1}']);
	}
	public function email_platform_check_user($email,$f_name=null,$l_name=null)
	{
		$email_connection = DB::connection('mysql4');
		$email_account_profile = $email_connection->table('users')->select('*')->where("email",$email)->get();
		if(!isset($email_account_profile[0]))
		   {
			 $this->add_user_to_email_platform($email,$f_name,$l_name);	
             $this->set_permissions($email);		 
		   }
	}
	public function add_user_to_email_platform($email,$f_name,$l_name)
	{
	 $date = date("Y-m-d H:i:s");	 
	 $username=explode("@",$email);
	 $email_connection = DB::connection('mysql4');
	 $laravel_connection = DB::connection('mysql');	
	   /*Add user*/
	   $data = array(         "username"=>$username[0],
							  "password"=>'$2y$13$hH0MJoCTMo8oATUn7Mx0XOfUNFJrbVot3KlNpdvJd2cRaHCopJUp.',
							  "first_name"=>$f_name,
							  "last_name"=>$l_name,
							  "email"=>$email,
							  "role_id"=>2,
							  "is_published"=>1,
							  "date_added"=>$date, 
							  "created_by"=>1,
							  "created_by_user"=>"Alex Grisales Rivera",
							  "timezone"=>"America/Bogota",
							  "locale"=>"es"
					);
		 
		$user_id = $email_connection->table('users')->insertGetId($data);	
		/*add dashboard widgets*/
		$data = array(
						array('is_published'=>1, 'date_added'=> $date,"created_by"=>$user_id,"created_by_user"=>$f_name." ".$l_name,"name"=>"Contactos creados","type"=>"created.leads.in.time","width"=>100,"height"=>330,"ordering"=>0,"params"=>'a:1:{s:5:"lists";s:21:"identifiedVsAnonymous";}'),
						array('is_published'=>1, 'date_added'=> $date,"created_by"=>$user_id,"created_by_user"=>$f_name." ".$l_name,"name"=>"Top lista","type"=>"top.lists","width"=>25,"height"=>330,"ordering"=>2,"params"=>'a:0:{}'),
						//array('is_published'=>1, 'date_added'=> $date,"created_by"=>$user_id,"created_by_user"=>$f_name." ".$l_name,"name"=>"Visitas","type"=>"page.hits.in.time","width"=>100,"height"=>330,"ordering"=>1,"params"=>'a:0:{}'),
						array('is_published'=>1, 'date_added'=> $date,"created_by"=>$user_id,"created_by_user"=>$f_name." ".$l_name,"name"=>"Correos enviados / abiertos","type"=>"emails.in.time","width"=>100,"height"=>330,"ordering"=>1,"params"=>'a:0:{}'),
						array('is_published'=>1, 'date_added'=> $date,"created_by"=>$user_id,"created_by_user"=>$f_name." ".$l_name,"name"=>"Visitantes únicos / que regresan","type"=>"anonymous.vs.identified.leads","width"=>25,"height"=>330,"ordering"=>3,"params"=>'a:0:{}'),
						//array('is_published'=>1, 'date_added'=> $date,"created_by"=>$user_id,"created_by_user"=>$f_name." ".$l_name,"name"=>"Contactos identificados VS anónimos","type"=>"ignored.vs.read.emails","width"=>25,"height"=>215,"ordering"=>8,"params"=>'a:0:{}'),
						//array('is_published'=>1, 'date_added'=> $date,"created_by"=>$user_id,"created_by_user"=>$f_name." ".$l_name,"name"=>"Tiempos de espera","type"=>"dwell.times","width"=>25,"height"=>215,"ordering"=>9,"params"=>'a:0:{}'),
						array('is_published'=>1, 'date_added'=> $date,"created_by"=>$user_id,"created_by_user"=>$f_name." ".$l_name,"name"=>"Correos por enviar","type"=>"upcoming.emails","width"=>50,"height"=>330,"ordering"=>4,"params"=>'a:0:{}'),
		             );		
		 $email_connection->table('widgets')->insert($data);
		 /*add stage*/
		 /*$data = array("name" => $stage_name,"weight" => $weight,"owner_id"=>$user_id,"created_by_user"=>$f_name." ".$l_name,"date_added"=>$date);		 
		 $email_connection->table('stages')->insert($data);*/
	}
	public function connect_email_platform($auth)
	{			
		try {
         if ($auth->validateAccessToken()) 
		 {
			if ($auth->accessTokenUpdated()) 
			{
				$accessTokenData = $auth->getAccessTokenData();
				echo "<pre>";
				print_r($accessTokenData);
			}
         } 
		} 
		catch (Exception $e) 
		{
			// Do Error handling
		}
	}
	
	function curl_get($url, $username_password) 
	{    
	
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");


		$headers = array();
		$headers[] = "Authorization: Basic ".$username_password;
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$result = curl_exec($ch);
		if (curl_errno($ch)) {
			echo 'Error:' . curl_error($ch);
		}
		else
		{
			return json_decode($result);
			curl_close ($ch);
		}		
	}
	function curl_post($url,$params, $username_password) 
	{    
	
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$params);


		$headers = array();
		$headers[] = "Authorization: Basic ".$username_password;
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$result = curl_exec($ch);
		if (curl_errno($ch)) {
			echo 'Error:' . curl_error($ch);
		}
		else
		{
			return json_decode($result);
			curl_close ($ch);
		}		
	}
}
