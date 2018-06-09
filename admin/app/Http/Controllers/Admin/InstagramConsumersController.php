<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\InstagramConsumer;
use App\FacebookConsumer;
use Illuminate\Http\Request;
use Session;
use DB;
use Redirect;
use Illuminate\Support\Facades\Input;
use Mautic\Auth\ApiAuth;
use Aws\Ses\SesClient;

class InstagramConsumersController extends Controller
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
        $facebookconsumer = InstagramConsumer::findOrFail($id);
        $Permission = $this->authentication_helper->hasPermission(array("_member"));
        if($Permission)
	 return view('public.instagram-consumers.show', compact('facebookconsumer','clientdevice','user'));
	else
         return view('admin.instagram-consumers.show', compact('facebookconsumer','clientdevice','user'));
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
        InstagramConsumer::destroy($id);

        Session::flash('flash_message', 'Instagram Consumer deleted!');

        return redirect('admin/facebook-consumers?tab=instagram');
    }
	
	public function index()
	{
        $date = date("Y-m-d H:i:s");	 
        $userLogged = $this->authentication->getLoggedUser();
	 $username=explode("@",$userLogged->email);
	 $credentials = base64_encode("{$username[0]}:");
	 if(!isset($userLogged->email))
		{
		 return view('laravel-authentication-acl::client.auth.login');
		}
		else
		{
			
			if(isset($_GET["app"])):
			  if($_GET["app"]=="instagram"):
			 
			 $iap_connection = DB::connection('mysql2');
			 $iap_account = $iap_connection->table('tbl_users')->select('*')->where("username",$userLogged->email)->get();
			   if(isset($iap_account[0]))
			   {
					return Redirect::to('http://iap.rockscripts.org/index.php/wifiapp?email='.$userLogged->email.'&app=wifi'); 
			   }
			   else
			   {				   
				   $data = array("username"=>$userLogged->email,"password"=>"5f75fd5155076d0fe0a3c783c7dd79b5","default_timezone"=>"America/Bogota","changed"=>$date,"created"=>$date);
				   $iap_connection->table('tbl_users')->insert($data);	
				   return Redirect::to('http://iap.rockscripts.org/index.php/wifiapp?email='.$userLogged->email.'&app=wifi'); 
			   }
			   elseif($_GET["app"]=="facebook"):
			       $fbap_connection = DB::connection('mysql3');
				   $fbap_account = $fbap_connection->table('users')->select('*')->where("email",$userLogged->email)->get();
				     if(isset($fbap_account[0]))
					 {
						return Redirect::to('http://fbap.rockscripts.org/signin.php?username='.$username[0].'&app=wifi'); 	 
					 }
					 else
					 {
						$fbap_connection1 = DB::connection('mysql');
				        $fbap_account_profile = $fbap_connection1->table('user_profile')->select('*')->where("user_id",$userLogged->id)->get();					   
                       if(isset($fbap_account_profile[0]))
							{
								
								$data = array("username"=>$username[0],
								              "password"=>"23bcbed562b68a17fe8199738e33933f21c74823a246367c02871e99db7d08a7",
											  "salt"=>"5172a7faa69befbc6568308bcf66f37f",
								              "firstname"=>$fbap_account_profile[0]->first_name,
											  "lastname"=>$fbap_account_profile[0]->last_name,
											  "email"=>$userLogged->email,
											  "roles"=>3,
											  "active"=>1,
											  "signup"=>$date
											  );
							    $user_id = $fbap_connection->table('users')->insertGetId($data);
								$data = array("id"=>$user_id,
								              "userid"=>$user_id,
											  "postInterval"=>30,
								              "lang"=>"espanol",
											  "limitImportGroups"=>500,
											  "limitImportPages"=>500,
											  "show_groups"=>0,
											  "show_pages"=>1,
											  "load_groups"=>0,
											  "load_pages"=>0,
											  "load_own_pages"=>1,
											  "timezone"=>"America/Bogota",
											  );
							    $fbap_connection->table('user_options')->insert($data);
								return Redirect::to('http://fbap.rockscripts.org/signin.php?username='.$username[0].'&app=wifi'); 			                	
							}
							
					 }
				 elseif($_GET["app"]=="email"):	
				 $email_connection = DB::connection('mysql4');
			         $email_account_profile = $email_connection->table('users')->select('*')->where("email",$userLogged->email)->get();
				 
				   if(!isset($email_account_profile[0]))
				   {
					   $laravel_connection = DB::connection('mysql');
					   $laravel_account_profile = $laravel_connection->table('user_profile')->select('*')->where("user_id",$userLogged->id)->get();	
					   /*Add user*/
					   $data = array(         "username"=>$username[0],
											  "password"=>'$2y$13$hH0MJoCTMo8oATUn7Mx0XOfUNFJrbVot3KlNpdvJd2cRaHCopJUp.',
											  "first_name"=>$laravel_account_profile[0]->first_name,
											  "last_name"=>$laravel_account_profile[0]->last_name,
											  "email"=>$userLogged->email,
											  "role_id"=>2,
											  "is_published"=>1,
											  "date_added"=>$date,
											  "created_by"=>1,
											  "created_by_user"=>"Alex Grisales Rivera",
											  "timezone"=>"America/Bogota",
											  "locale"=>"es"
											  );
                        $user_id = $email_connection->table('users')->insertGetId($data);	
						$data = array(
							array('is_published'=>1, 'date_added'=> $date,"created_by"=>$user_id,"created_by_user"=>$laravel_account_profile[0]->first_name." ".$laravel_account_profile[0]->last_name,"name"=>"Contactos creados","type"=>"created.leads.in.time","width"=>100,"height"=>330,"ordering"=>0,"params"=>'a:1:{s:5:"lists";s:21:"identifiedVsAnonymous";}'),
							array('is_published'=>1, 'date_added'=> $date,"created_by"=>$user_id,"created_by_user"=>$laravel_account_profile[0]->first_name." ".$laravel_account_profile[0]->last_name,"name"=>"Top lista","type"=>"top.lists","width"=>25,"height"=>330,"ordering"=>4,"params"=>'a:0:{}'),
							array('is_published'=>1, 'date_added'=> $date,"created_by"=>$user_id,"created_by_user"=>$laravel_account_profile[0]->first_name." ".$laravel_account_profile[0]->last_name,"name"=>"Visitas","type"=>"page.hits.in.time","width"=>100,"height"=>330,"ordering"=>1,"params"=>'a:0:{}'),
							array('is_published'=>1, 'date_added'=> $date,"created_by"=>$user_id,"created_by_user"=>$laravel_account_profile[0]->first_name." ".$laravel_account_profile[0]->last_name,"name"=>"Emails enviados / abiertos","type"=>"emails.in.time","width"=>100,"height"=>330,"ordering"=>2,"params"=>'a:0:{}'),
							array('is_published'=>1, 'date_added'=> $date,"created_by"=>$user_id,"created_by_user"=>$laravel_account_profile[0]->first_name." ".$laravel_account_profile[0]->last_name,"name"=>"Visitantes únicos / que regresan","type"=>"anonymous.vs.identified.leads","width"=>25,"height"=>330,"ordering"=>6,"params"=>'a:0:{}'),
							array('is_published'=>1, 'date_added'=> $date,"created_by"=>$user_id,"created_by_user"=>$laravel_account_profile[0]->first_name." ".$laravel_account_profile[0]->last_name,"name"=>"Contactos identificados VS anónimos","type"=>"ignored.vs.read.emails","width"=>25,"height"=>215,"ordering"=>8,"params"=>'a:0:{}'),
							array('is_published'=>1, 'date_added'=> $date,"created_by"=>$user_id,"created_by_user"=>$laravel_account_profile[0]->first_name." ".$laravel_account_profile[0]->last_name,"name"=>"Tiempos de espera","type"=>"dwell.times","width"=>25,"height"=>215,"ordering"=>9,"params"=>'a:0:{}'),
							array('is_published'=>1, 'date_added'=> $date,"created_by"=>$user_id,"created_by_user"=>$laravel_account_profile[0]->first_name." ".$laravel_account_profile[0]->last_name,"name"=>"Correos por enviar","type"=>"upcoming.emails","width"=>50,"height"=>330,"ordering"=>3,"params"=>'a:0:{}'),
						);		
                         $email_connection->table('widgets')->insert($data);					
                         return Redirect::to('http://mail.rockscripts.org/s/login?app=mail&user='.$credentials); 				
				   }
				   else
				   {											
                    return Redirect::to('http://mail.rockscripts.org/s/login?app=mail&user='.$credentials);    
				   } 
                elseif($_GET["app"]=="test"):
                 $this->SES_verify_email("alex.rivera.ws@gmail.com");
			   endif;
			endif;			
		}	 
	}
	public function SES_verify_email($email)
	{
		$SES_service = $this->SES_init_service();
		$SES_service->verifyEmailIdentity( array('EmailAddress' => $email));
	}
	public function SES_init_service()
	{
		$SesClient = new SesClient([
									'version'     => 'latest',
									'region'      => 'us-east-1',
									'credentials' => [
										'key'    => 'AKIAIOB2CNH3VIQKIYLQ',
										'secret' => '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',
									],
								]);
		return $SesClient;
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
