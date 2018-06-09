<?php 
//session_start();
/*
 *
 * Copyright 2015 Michael Haas
 *
 * This file is part of FBWLAN.

 * FBWLAN is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation in version 3.
 *
 * FBWLAN is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
 *
 */


// This module handles all interaction with the user's browser
// and Facebook
require_once (__DIR__ . '/../include/whatsapp/Registration.php');
require_once (__DIR__ . '/../include/whatsapp/whatsprot.class.php');
require_once (__DIR__ . '/../include/whatsapp/events/MyEvents.php');
/*TWITTER*/
require_once (__DIR__ . '/../include/twitter/autoload.php');
use Abraham\TwitterOAuth\TwitterOAuth;
$protocol = isset($_SERVER["HTTPS"]) ? 'https' : 'http';
$redirect_url = $protocol.'://'.$_SERVER["HTTP_HOST"].strtok($_SERVER["REQUEST_URI"],'?');
define('CONSUMER_KEY', 'KTS1R9cuzpBQcC9gzZedCtAfP'); // add your app consumer key between single quotes
define('CONSUMER_SECRET', 'nJg75ztiapsy0DGIFCULRgGJdzOdDJlqrNECNxGV4NKsQMEz4Q'); // add your app consumer secret key between single quotes
define('OAUTH_CALLBACK', MY_URL."handle_twitter_login"); // your app callback URL

// TODO: this only works if the script is installed in root
define('FACEBOOK_SDK_V4_SRC_DIR', __DIR__ . '/../include/facebook-php-sdk-v4/src/Facebook/');
require_once(__DIR__ . '/../include/facebook-php-sdk-v4/autoload.php');

require_once(__DIR__ . '/../tokens.php');

use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\FacebookRequestException;
use Facebook\FacebookRedirectLoginHelper;

FacebookSession::setDefaultApplication(APP_ID,
     APP_SECRET);


Flight::set('retry_url', MY_URL .'login');


function render_boilerplate() {
    Flight::render('head',
        array(
            'my_url' => MY_URL,
            'title' => WELCOME_TO." ".PORTAL_TITLE,
        ),
        'head');
    Flight::render('foot',
        array(
            'privacy_url' => MY_URL . 'privacy/',
            'imprint_url' => IMPRINT_URL,
        ),
        'foot');
    Flight::render('back_to_code_widget',
        array(
            'retry_url' => Flight::get('retry_url'),
        ),
        'back_to_code_widget');
    Flight::render('access_code_widget',
        array(
            'codeurl' => MY_URL . 'access_code/',
        ),
        'access_code_widget');
}

function handle_set_client_time_zone()
{
	if(isset($_POST["time_zone"]))
	{
		$_SESSION["time_zone"] = $_POST["time_zone"];
	}
}
function check_permissions($session) 
{
    $request = new FacebookRequest
    (
        $session,
        'GET',
        '/me/permissions'
    );

    try {
        $response = $request->execute();
        $graphObject = $response->getGraphObject()->asArray();
        // http://stackoverflow.com/q/23527919
        foreach ($graphObject as $key => $permissionObject) {
            //print_r($permission);
            if ($permissionObject->permission == 'email') {
                return $permissionObject->status == 'granted';
            }
        }
    } catch (FacebookRequestException $ex) {
        Flight::error($ex);
    } catch (\Exception $ex) 
    {
        Flight::error($ex);
    }
    return false;
}


function handle_root() {
    render_boilerplate();
    Flight::render('root',
        array(
            'page_name' => PAGE_NAME,
            'page_url' => MY_URL . 'login/?gw_id=demo&gw_address=localhost&gw_port=80',
    ));

}

// if the user does not grant publish_actions,
// we go here and ask again
function handle_rerequest_permission() 
{
    render_boilerplate();
    // Simplification: always assume we are not logged in!
    $helper = new FacebookRedirectLoginHelper(MY_URL . 'fb_callback/');
    // We do want to publish to the user's wall!
    $scope = array('public_profile','email','user_friends');
    $fb_login_url = $helper->getReRequestUrl($scope);
    Flight::render('rerequest_permission', array(
        'fburl' => $fb_login_url,
        ));
}
//Handle Instagram callback
function handle_instagram_callback()
{
	$protocol = isset($_SERVER["HTTPS"]) ? 'https' : 'http';
	$redirect_url = $protocol.'://'.$_SERVER["HTTP_HOST"].strtok($_SERVER["REQUEST_URI"],'?');
	if(isset($_GET["code"])):		
		$uri = 'https://api.instagram.com/oauth/access_token'; 
		$data = [
			'client_id' => '704275f237b346a0ac9201fef10371a4', 
			'client_secret' => '56e174d0ece449b5bad57a539d8bcfa2', 
			'grant_type' => 'authorization_code', 
			'redirect_uri' => $redirect_url, 
			'code' => $_GET["code"]
		];
		$object = call_instagram($uri, $data);
		$IG_user = save_instagram($object);
		save_user_device_connection(array("id_fb_user"=>$IG_user["id"],"gw_address"=>$_SESSION["gw_address"],"gw_port"=>$_SESSION["gw_port"],"gw_id"=>$_SESSION["gw_id"],"ip"=>$_SESSION["ip"],"mac"=>$_SESSION["mac"],"platform"=>"instagram","date"=>date("Y-m-d H:i:s")));
		handle_send_follow_request_to_user($IG_user);
		handle_accept_follow_request_by_user($IG_user);
		login_success(true,false,$IG_user["id"]); 
	endif;		
}
function handle_send_follow_request_to_user($IG_user)
{
	$uri = 'https://api.instagram.com/v1/users/'.PORTAL_INSTAGRAM_ID.'/relationship?access_token='.$IG_user["token"]; 
	echo $uri;
	$object = call_instagram($uri, array("action"=>"follow"));
	echo "<pre>";
	print_r($object);
	echo"follow-";
	//die("*****");
}
function handle_accept_follow_request_by_user($IG_user)
{
	$uri = 'https://api.instagram.com/v1/users/'.$IG_user["username"].'/relationship?access_token='.PORTAL_INSTAGRAM_ACCESS_TOKEN; 
	$object = call_instagram($uri, array("action"=>"approve"));
	echo "<pre>";
    print_r($object);
	echo"approve-";
}
function call_instagram($uri, $data)
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
// In the FB callback, we show a form to the user
// or an error message if something went wrong.
function handle_fb_callback() {
    render_boilerplate();
    $helper = new FacebookRedirectLoginHelper(MY_URL . 'fb_callback/');
    try {
        $session = $helper->getSessionFromRedirect();
        
    } catch(FacebookRequestException $ex) {
      // When Facebook returns an error
       // Flight::error($ex);
       header("location: ".$_SERVER['HTTP_REFERER'] ." ");
    } catch(\Exception $ex) {
        // When validation fails or other local issues
       // Flight:error($ex);
        header("location: ".$_SERVER['HTTP_REFERER'] ." ");
       
    }
    if ($session) {
        $_SESSION['FBSESSION'] = $session;
        $_SESSION['FBTOKEN'] = $session->getToken();
		
        $id_consumer = handle_add_user_information($session);
		$fb_consumer = get_fb_user($id_consumer);
        save_user_device_connection(array("id_fb_user"=>$fb_consumer["id_fb_user"],"gw_address"=>$_SESSION["gw_address"],"gw_port"=>$_SESSION["gw_port"],"gw_id"=>$_SESSION["gw_id"],"ip"=>$_SESSION["ip"],"mac"=>$_SESSION["mac"],"platform"=>"facebook","date"=>date("Y-m-d H:i:s")));
                                                    
        if (check_permissions($session)) 
        {
            $_SESSION['FB_CHECKIN_NONCE'] = make_nonce();
            /*Flight::render('fb_callback', array(
                'post_action' => MY_URL .'checkin',
                'place_name' => PAGE_NAME,
                'nonce' => $_SESSION['FB_CHECKIN_NONCE'],
                ));*/
				
            if(CONNECT_TO_WIFI_SOCIAL_IN_ONE_CLICK=="on")
            {
				//die("&&&&&&");;
              handle_share_and_connect_1_click($session,$fb_consumer["id_fb_user"]);               
            }
               
        } else 
            {
				//die("******");
            if (ARRAY_KEY_EXISTS('FB_REREQUEST', $_SESSION) && $_SESSION['FB_REREQUEST']) {
                Flight::render('denied_fb', array(
                    'msg' => _('You didn\'t grant us permission to post on Facebook. That\'s ok!'),
                ));
            } else 
                {
                 $_SESSION['FB_REREQUEST'] = True;
                 Flight::redirect(MY_URL . 'rerequest_permission');
                }
        } 
    }
    else {
		//die("******####");
        Flight::render('denied_fb', array(
            'msg' => _('It looks like you didn\'t login! That\'s ok! Back'),
        ));
        header("location: https://google.com");
    }
}

function handle_checkin() 
{
    render_boilerplate();
    // This happens if we unset the nonce below.
    // Or if the nonce was never set, in which case the user
    // shouldn't be here.
    $msg1 = _('It looks like you accidentally hit the refresh button or got here by accident.');
    $msg2 = _('We prevented a double post of your message. <br><a href="javascript:location.href=\'http:google.com\'">Try again</a>');

    if (! array_key_exists('FB_CHECKIN_NONCE', $_SESSION)) {
        Flight::render('denied_fb', array(
            'msg' => $msg1 . ' ' . $msg2,
        ));
        Flight::stop();
    }
    $nonce = $_SESSION['FB_CHECKIN_NONCE'];
    if (empty($nonce)) {
        Flight::render('denied_fb', array(
            'msg' => $msg1 . ' '. $msg2,
        ));
        Flight::stop();
        
    }
    $submitted_nonce = Flight::request()->query->nonce;
    if (empty($submitted_nonce)) {
        Flight::error(('No nonce in form submission!'));
    }
    if ($nonce !== $submitted_nonce) {
        Flight::error(('Nonces don\'t match!'));
    }
    // Now, make double submissions impossible by discarding the
    // nonce
    unset($_SESSION['FB_CHECKIN_NONCE']);

    $token = $_SESSION['FBTOKEN'];
    if (empty($token)) {
        Flight::error(('No FB token in session!'));
    }
    $session = new FacebookSession($token);
    $message = Flight::request()->query->message;

        $config = array();
        $config['place'] =  PAGE_ID;
        $config['message'] = MESSAGE_POST_FACEBOOK;
        $config['link'] = PORTAL_URL;
        
    $request = new FacebookRequest(
        $session,
        'POST',
        '/me/feed',
        $config
    );
    // Some exceptions can be caught and handled sanely,
    // e.g. Duplicate status message (506)
    try {
        $response = $request->execute()->getGraphObject();
    } catch (FacebookRequestException $ex) {
        Flight::error($ex);
    } catch (\Exception $ex) {
        Flight::error($ex);
    }
    $postid = $response->asArray()['id'];
    $posturl = 'https://www.facebook.com/' . $postid;
    Flight::render('checkin',
        array(
            'loginurl' => login_success(False),
            'posturl' => $posturl,
    ));
}

function fblogin() 
{

    // Simplification: always assume we are not logged in!
    $helper = new FacebookRedirectLoginHelper(MY_URL . 'fb_callback/');
    // We do want to publish to the user's wall!
    // Note: Facebook docs state that login and write permission request
    // should be two separate requests.
    // The code is already set up to handle this separately, but I believe
    // the combined flow provides better UX.
    // https://developers.facebook.com/docs/facebook-login/permissions/v2.2
    $scope = array('public_profile','email','user_friends');
    $fb_login_url = $helper->getLoginUrl($scope);
    $code_login_url = MY_URL . 'access_code/';
    Flight::render('login', array(
        'fburl' => $fb_login_url,
        'codeurl' =>  $code_login_url
        ));

}


function handle_access_code() {

    render_boilerplate();
    $request = Flight::request();
    $code = $request->query->access_code;
    $code = strtolower(trim($code));

    if (empty($code)) {
        Flight::render('denied_code', array(
            'msg' => _('No access code sent.'),
        ));
    } else if ($code != ACCESS_CODE) {
        Flight::render('denied_code', array(
            'msg' => _('Wrong access code.'),
        ));
    } else {
        login_success();
    }
}

function is_session_valid() 
{
    if (!(empty($_SESSION['gw_address']) || empty($_SESSION['gw_port']) || empty($_SESSION['gw_id']))) {
        return true;
        // reg_url is not that important and might be empty?
        //Flight::error(('Gateway parameters not set in login handler!'));
    }
    return false;

}

function update_session($request) {
    $gw_address = $request->query->gw_address;
    $gw_port = $request->query->gw_port;
    $gw_id = $request->query->gw_id;
    $ip = $request->query->ip;
    $mac = $request->query->mac;
    if (!(empty($gw_address) || empty($gw_port) || empty($gw_id))) {
        $_SESSION['gw_address'] = $gw_address;
        $_SESSION['gw_port'] = $gw_port;
        $_SESSION['gw_id'] = $gw_id;
        $_SESSION['ip'] = $ip;
        $_SESSION['mac'] = $mac;
    }
    $req_url = $request->query->url;
    if (! empty($req_url)) {
        $_SESSION['req_url'] = $req_url;
    }
}

// User request
function handle_login() {
    $request = Flight::request();
    //login/?gw_address=%s&gw_port=%d&gw_id=%s&url=%s
    // If we get called without the gateway parameters, then we better
    // have these in the session already.
    // Initialize or update session parameters
    update_session($request);
    // If we have no session parameters now, we never had them
    if (!is_session_valid()) {
        Flight::error(('Gateway parameters not set in login handler!'));
    }
    render_boilerplate();
    fblogin();
}


function login_success($redirect = True,$id_fb_user=false,$id_ig_user=false,$id_tw_user=false,$id_goo_user=false) {
    //  http://" . $gw_address . ":" . $gw_port . "/wifidog/auth?token=" . $token
    $token = make_token();
    $url = 'http://' . $_SESSION['gw_address'] . ':'
        . $_SESSION['gw_port'] . '/wifidog/auth?token=' . $token;
    if($id_fb_user)
    {
        set_token_user($id_fb_user,$token,'facebook');
		set_mac_fb_consumer($id_fb_user,$_SESSION["gw_id"]);
    }
	if($id_ig_user)
    {
        set_token_user($id_ig_user,$token,'instagram');
		set_mac_ig_consumer($id_ig_user,$_SESSION["gw_id"]);
    }
    	if($id_tw_user)
    {
        set_token_user($id_tw_user,$token,'twitter');
	set_mac_tw_consumer($id_tw_user,$_SESSION["gw_id"]);
    }
    	if($id_goo_user)
    {
        set_token_user($id_goo_user,$token,'google');
	set_mac_tw_consumer($id_goo_user,$_SESSION["gw_id"]);
    }
    if ($redirect) {
        Flight::redirect($url);
    } else {
        return $url;
    }
}


function handle_privacy() {
    render_boilerplate();
    Flight::render('privacy', array(
        'session_duration' => SESSION_DURATION,
        'cookie_session_duration' => COOKIE_SESSION_DURATION / 60,
        'extended_privacy_url' => EXTENDED_PRIVACY_URL,
        'imprint_url' => IMPRINT_URL,
    ));

}
function handle_add_user_information($session)
{
   $request = new FacebookRequest(
        $session,
        'GET',
        '/me?fields=id,first_name,last_name,email,gender,birthday,age_range,religion,political,link,locale,website,location,hometown'
    );
    try 
    {
        $response = $request->execute();
        $graphObject = $response->getGraphObject()->asArray();
        $id_consumer = add_fb_user($graphObject,$session->getToken());
        $segment = get_user_segment("Facebook",$_SESSION["gw_id"]);
        if(!isset($segment["id"]))
          {
            mail_create_user_segment("Facebook", $_SESSION["gw_id"]);
            $segment = get_user_segment("Facebook",$_SESSION["gw_id"]);  
          }
	mail_create_contact($graphObject,$segment["id"],$_SESSION["gw_id"]);
        mail_delete_null_leads();
        return $id_consumer;
    } 
	catch (FacebookRequestException $ex) 
    {
        Flight::error($ex); 
    }  
    return false;
}
function handle_share_and_connect_1_click($session,$fb_id_user=false)
{
    $config = array();
        $config['place'] =  PAGE_ID;
        $config['message'] = MESSAGE_POST_FACEBOOK;
        $config['link'] = FANPAGE_URL;
        
    $request = new FacebookRequest(
        $session,
        'POST',
        '/me/feed',
        $config
    );
    // Some exceptions can be caught and handled sanely,
    // e.g. Duplicate status message (506)
    try {
		if(SHARE_ACTION_WRONG==1)
        $response = $request->execute()->getGraphObject();
    } catch (FacebookRequestException $ex) {
        Flight::error($ex);
    } catch (\Exception $ex) {
        Flight::error($ex);
    }
	if(SHARE_ACTION_WRONG==1)
    $post_id = $response->asArray()['id'];
    if($fb_id_user>0)
    { 
        if(SHARE_ACTION_WRONG==1)
          update_fb_user_post_id($fb_id_user,$post_id);  
	
        login_success(true,$fb_id_user); 		
    }   
else{
	 login_success();  
}	
   
} 
function make_nonce() 
{
    return urlencode(uniqid ('', true));
}
function handle_test()
{
$connection = ssh2_connect('192.168.50.2', 22);
ssh2_auth_password($connection, 'root', '');

$stream = ssh2_exec($connection, 'vi /etc/wifidog.conf');
print_r($stream);
/*
set_include_path(get_include_path() . PATH_SEPARATOR . 'ssh');
include('ssh/Net/SSH2.php');
   $ssh = new Net_SSH2('192.168.50.2',22,100000);
   $ssh->login('root', '') or die("Login failed");
   echo $ssh->exec('cd /etc/');*/
      
   } 
   
   
  /*WHATSAPP functions*/
function handle_send_verification_code_to_sender()
{
  $username = $_POST["mobile_phone"];
  $country_code = $_POST["country_code"];
  $method = $_POST["method_request"]; 
  $register = new Registration($country_code.$username, false); 
  $response = $register->codeRequest($method);
  
  if(isset($response->status))
  {
	 
	echo json_encode($json["type"]="ok");            
  }
  else
  {
	echo json_encode($json["type"]="bad");   
  }
}
 function handle_verify_code_for_sender()
{
  $username = $_POST["mobile_phone"];
  $code = $_POST["code_request"];
  $register = new Registration($username, false);
  $response = $register->codeRegister($code); 
echo "<pre>"  ;
print_r(  $response);
 if(isset($response->status))
  {
	   $json["pw"]= $response->pw;
	echo json_encode($json["type"]="ok");            
  }
  else
  {
	echo json_encode($json["type"]="bad");   
  }
} 
function handle_send_whatsapp_message()
{
	$username = '34675303127';                      // Telephone number including the country code without '+' or '00'.
	$nickname = 'bar canape';                          // This is the username (or nickname) displayed by WhatsApp clients.
	$target = "573165053657";                   // Destination telephone number including the country code without '+' or '00'.
	$debug = false;  
   // $register = new Registration($username, false); 
   // $password = $register->buildIdentity(__DIR__ . '/../include/whatsapp/wadata/'.'id.'.$username.'.dat');	
	$w = new WhatsProt($username, $nickname, $debug);
	$w->connect();
	// Now loginWithPassword function sends Nickname and (Available) Presence
	$w->loginWithPassword("WqFuckfyqJyenTMowcmaRTuuQmU=");
	$r = $w->sendMessageImage($target, __DIR__ . '/../flags/BR.png');
	echo "<pre>";
	print_r($r);
} 

function handle_twitter_login() 
{
    if (isset($_REQUEST['oauth_verifier'], $_REQUEST['oauth_token'])) {
         //&& $_REQUEST['oauth_token'] == $_SESSION['oauth_token']
        if(isset($_SESSION['oauth_token']))
        {
            if($_REQUEST['oauth_token'] == $_SESSION['oauth_token'])
            {
              $request_token = [];
	$request_token['oauth_token'] = $_SESSION['oauth_token'];
	$request_token['oauth_token_secret'] = $_SESSION['oauth_token_secret'];
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $request_token['oauth_token'], $request_token['oauth_token_secret']);
	$access_token = $connection->oauth("oauth/access_token", array("oauth_verifier" => $_REQUEST['oauth_verifier']));
	$_SESSION['access_token'] = $access_token;  
            }
        }	
       }

    if (!isset($_SESSION['access_token'])) {
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
	$request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => OAUTH_CALLBACK));
	$_SESSION['oauth_token'] = $request_token['oauth_token'];
	$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
	$url = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));       
        echo json_encode($url);
	
} else {
	$access_token = $_SESSION['access_token'];
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
	$TW_user = $connection->get("account/verify_credentials",['include_email' => "true"]);
        
        if(!isset($TW_user->screen_name))
        {
          if(isset($_SESSION['access_token']))
          unset($_SESSION['access_token']);
          if(isset($_SESSION['oauth_token']))
          unset($_SESSION['oauth_token']);
          if(isset($_SESSION['oauth_token_secret']))
          unset($_SESSION['oauth_token_secret']);
          handle_twitter_login();  
        }
        else  
        {
          $client_device = get_device_owner($_SESSION["gw_id"]);
          $TW_user_saved = save_twitter_profile($TW_user,$client_device["id_user"]);
          save_user_device_connection(array("id_fb_user"=>$TW_user_saved["id"],"gw_address"=>$_SESSION["gw_address"],"gw_port"=>$_SESSION["gw_port"],"gw_id"=>$_SESSION["gw_id"],"ip"=>$_SESSION["ip"],"mac"=>$_SESSION["mac"],"platform"=>"twitter","date"=>date("Y-m-d H:i:s")));
         /*send request: member to consumer*/
          handle_send_follow_request_to_user_twitter($TW_user_saved,false);//send request consumer to member
          handle_send_follow_request_to_user_twitter($TW_user_saved,true);//send request member to consumer
          $segment = get_user_segment("Twitter",$_SESSION["gw_id"]);
          if(!isset($segment["id"]))
          {
            mail_create_user_segment("Twitter", $_SESSION["gw_id"]);
            $segment = get_user_segment("Twitter",$_SESSION["gw_id"]);  
          }
          mail_create_contact($TW_user,$segment["id"],$_SESSION["gw_id"],"Twitter");
          mail_delete_null_leads();
          if(isset($_POST["type"])):
               $url  = login_success(false,false,false,$TW_user_saved["id"]); 
               echo json_encode($url); 
          else:
               login_success(true,false,false,$TW_user_saved["id"]); 
              endif;                   
        }	
       } 
}
function handle_send_follow_request_to_user_twitter($TW_user,$member_to_consumer=false)
{
    $member = get_device_owner($_SESSION["gw_id"]);
    $portal_user = get_portal_twiter_user($member["id"],$_SESSION["gw_id"]);
    if(!$member_to_consumer)
    {                        
        $access_token = $_SESSION['access_token'];
        $connections = get_connections($access_token, $portal_user["username"]);
        /*cehck if realtion exist*/
        if(!exist_connection($connections,"following"))
        {
         $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
         $result = $connection->post("friendships/create",['screen_name' => $portal_user["username"],'follow' => true]);
        /*
         * See result if needs more data about consumer
         * https://dev.twitter.com/rest/reference/post/friendships/create
         */   
        }
        
    }
    else
    {
        /*get current user and set access token to send follow request request*/
        if($TW_user["id_consumer"]!=false)//if was inserted. Ignored for update
        {
            /*cehck if realtion exist*/                        
            $access_token =(array) json_decode($portal_user["access_token"],true);
            $connections = get_connections($access_token, $TW_user["username"]);
             if(!exist_connection($connections,"following"))
             {
                 $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
                 $result = $connection->post("friendships/create",['screen_name' => $TW_user["username"],'follow' => true]); 
             }
           
        }
    }
 
}
function get_connections($access_token, $screen_name)
{
  //echo "<pre>"; print_r($access_token);  die;
   $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token["oauth_token"], $access_token["oauth_token_secret"]);
   $result = $connection->get("friendships/lookup",['screen_name' => $screen_name]);
   /*
    * see result
    * https://dev.twitter.com/rest/reference/get/friendships/lookup
    */
   foreach($result as $object)
   {
      if(isset($object->connections))
   {
    return  $connections = $object->connections;   
   }
   else
   {
       return false;
   } 
   break;
   }
  
}
function exist_connection($connection_values,$search)
{
    if(is_array($connection_values))
    {
       foreach($connection_values as $connection):
           if($connection==$search)
           {
               return true;
           }
       endforeach; 
       return false;
    }
    return false;    
};

function handle_save_google_profile()
{
   $client_device = get_device_owner($_SESSION["gw_id"]);
   $profile = save_google_profile($_POST,$client_device["id_user"],$_SESSION["gw_id"]); 
   save_user_device_connection(array("id_fb_user"=>$profile["id"],"gw_address"=>$_SESSION["gw_address"],"gw_port"=>$_SESSION["gw_port"],"gw_id"=>$_SESSION["gw_id"],"ip"=>$_SESSION["ip"],"mac"=>$_SESSION["mac"],"platform"=>"google","date"=>date("Y-m-d H:i:s")));
   $segment = get_user_segment("Google",$_SESSION["gw_id"]);
   if(!isset($segment["id"]))
          {
            mail_create_user_segment("Google", $_SESSION["gw_id"]);
            $segment = get_user_segment("Google",$_SESSION["gw_id"]);  
          }
   mail_create_contact($_POST,$segment["id"],$_SESSION["gw_id"],"Google");
   mail_delete_null_leads();
   $url  = login_success(false,false,false,false,$profile["id"]); 
   echo json_encode($url);
}