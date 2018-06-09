<?php
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


require_once('include/flight/flight/Flight.php');


require_once('config.php');



function init_token_db() {
    $db = Flight::db();
	$db_mail = Flight::db_mail();
    // TODO: add index on date column
    $db->exec('CREATE TABLE IF NOT EXISTS tokens (id INT AUTO_INCREMENT PRIMARY KEY, token CHAR(40) NOT NULL UNIQUE, date timestamp NOT NULL)');
}

function generate_token() {
    // Taken from wifidog Token.php, but use sha1 instead of md5sum
    return sha1(uniqid(rand(), 1));
}

function make_token() {
    // Temporary: purge tokens more often
    // Tokens are cleared on GW communication,
    // but there is no gateway right now
    clear_old_tokens();
    $db = Flight::db();
    $token = generate_token();
    $stmt = $db->prepare('INSERT INTO tokens (token,date) VALUES (:token,NOW())');
    $stmt->bindParam(':token', $token);
    $stmt->execute();
    return $token;
}


function clear_token($key, $value) {
    $db = Flight::db();
    $stmt = $db->prepare('DELETE FROM tokens WHERE token = :token');
    $stmt->bindParam(':token', $token);
    $stmt->execute();
}

function clear_old_tokens() {
    
    $db = Flight::db();
    //$stmt = $db->prepare('DELETE FROM tokens WHERE date < DATE_SUB(NOW(), INTERVAL :duration MINUTES)');
    // Cannot pass a constant by reference in $stmt->bindParam
    // As there is no security problem, simply concatenate SESSION_DURATION into string
    // http://stackoverflow.com/questions/6130077
    //$stmt->bindParam(':duration', SESSION_DURATION);
    $stmt = $db->prepare('DELETE FROM tokens WHERE date < DATE_SUB(NOW(), INTERVAL ' . SESSION_DURATION . ' MINUTE)');
    $stmt->execute();
    // http://stackoverflow.com/a/13009906
}

function is_token_valid($token) {
    $db = Flight::db();
    $stmt = $db->prepare('SELECT token FROM tokens WHERE token = :token');
    $stmt->bindParam(':token', $token);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    if (empty($data)) {
        return false;
    }
    if ($data['token'] == $token) {
        return true;
    }
    return false;
}

function add_fb_user($user,$access_code)
{
  $db = Flight::db();
  $id_consumer = exist_fb_user_consumer($user["id"], $_SESSION["gw_id"]);
  if(!$id_consumer)
  {
    $age_range = json_encode($user["age_range"]);     
    $stmt = $db->prepare('INSERT INTO facebook_consumers (id_fb_user,first_name,last_name,email,gender,birthday,age_range,religion,political,profile_link,website,lacation,hometown,locale,access_token,created_at,updated_at) VALUES (:id_fb_user,:first_name,:last_name,:email,:gender,:birthday,:age_range,:religion,:political,:profile_link,:website,:lacation,:hometown,:locale,:access_token,:created_at,:updated_at)');
    $stmt->bindParam(':id_fb_user', $user["id"]);
    $stmt->bindParam(':first_name', $user["first_name"]);
    $stmt->bindParam(':last_name', $user["last_name"]);
    $stmt->bindParam(':email', $user["email"]);    
    $stmt->bindParam(':gender', $user["gender"]);
    $stmt->bindParam(':birthday', $user["birthday"]);
    $stmt->bindParam(':age_range', $age_range);
    $stmt->bindParam(':religion', $user["religion"]);
    $stmt->bindParam(':political', $user["political"]);
    $stmt->bindParam(':profile_link', $user["link"]);
    $stmt->bindParam(':website', $user["website"]);
    $stmt->bindParam(':lacation', $user["lacation"]);
    $stmt->bindParam(':hometown', $user["hometown"]);
    $stmt->bindParam(':locale', $user["locale"]);
    $stmt->bindParam(':access_token', $access_code);
    $stmt->bindParam(':created_at', date("Y-m-d H:i:s"));
    $stmt->bindParam(':updated_at', date("Y-m-d H:i:s"));
    $stmt->execute();
	
	return $db->lastInsertId();  
  }
  else  
  {
    $stmt = $db->prepare('UPDATE facebook_consumers SET first_name=:first_name,last_name=:last_name,email=:email,gender=:gender,birthday=:birthday,age_range=:age_range,religion=:religion,political=:political,profile_link=:profile_link,website=:website,lacation=:lacation,hometown=:hometown,locale=:locale,access_token=:access_token WHERE id_fb_user=:id_fb_user AND id_consumer=:id_consumer');
    $stmt->bindParam(':id_fb_user', $user["id"]);
	$stmt->bindParam(':id_consumer', $id_consumer);
    $stmt->bindParam(':first_name', $user["first_name"]);
    $stmt->bindParam(':last_name', $user["last_name"]);
    $stmt->bindParam(':email', $user["email"]);    
    $stmt->bindParam(':gender', $user["gender"]);
    $stmt->bindParam(':birthday', $user["birthday"]);
    $stmt->bindParam(':age_range', $age_range);
    $stmt->bindParam(':religion', $user["religion"]);
    $stmt->bindParam(':political', $user["political"]);
    $stmt->bindParam(':profile_link', $user["link"]);
    $stmt->bindParam(':website', $user["website"]);
    $stmt->bindParam(':lacation', $user["lacation"]);
    $stmt->bindParam(':hometown', $user["hometown"]);
    $stmt->bindParam(':locale', $user["locale"]);
    $stmt->bindParam(':access_token', $access_code);
    $stmt->execute();  
     return $id_consumer; 
  }
     
}
function mail_create_contact($user,$segment,$mac,$segment_name="Facebook")
{
 $db_mail = Flight::db_mail();
 $db = Flight::db();
 $device_owner = get_device_owner($mac);
 $email_owner_user = get_mail_user($device_owner["email"]);
 if(!$email_owner_user)
 {	 }
 else
 {	
	if(!$device_owner){}
	else
	{
               if($segment_name=="Facebook")
               {
                $lead = mail_get_lead($user["email"], $email_owner_user["id"]);
		if(!$lead)//contact does not exist for owner. So, add it.
		{
			$date = date("Y-m-d H:i:s");
			$data = array("firstname"=>$user["first_name"],"lastname"=>$user["last_name"],"email"=>$user["email"],"ipAddress"=>get_client_ip(),"facebook"=>$user["link"],"owner"=>$email_owner_user["id"]);
			$params_endpoint = http_build_query($data);
			$end_point = MAIL_URL_ENDPOINT."/api/contacts/new";
			curl_post($end_point,$params_endpoint,"YWRtaW46Um9jayExMjM=");                        
			$mail_contact = get_mail_contact($user["email"]);
			$id_lead = $mail_contact["id"];
			/*add contact to segment*/
			$stmt = $db_mail->prepare("INSERT INTO lead_lists_leads (leadlist_id,lead_id,date_added,manually_removed,manually_added) VALUES (:leadlist_id,:lead_id,:date_added,:manually_removed,:manually_added)");	  
			$stmt->bindParam(':leadlist_id', $segment);
			$stmt->bindParam(':lead_id', $id_lead);
			$stmt->bindParam(':date_added',$date);
			$manually_removed =  0;
			$stmt->bindParam(':manually_removed', $manually_removed);   
			$manually_added =  1;		 
			$stmt->bindParam(':manually_added', $manually_added); 	
			$stmt->execute();  
		}
               }
               if($segment_name=="Google")
               {
                  $lead = mail_get_lead($user["email"], $email_owner_user["id"]);
		if(!$lead)//contact does not exist for owner. So, add it.
		{
			$date = date("Y-m-d H:i:s");
			$data = array("firstname"=>$user["first_name"],"lastname"=>$user["last_name"],"email"=>$user["email"],"ipAddress"=>get_client_ip(),"googleplus"=>"https://plus.google.com/".$user["id_goo_user"],"owner"=>$email_owner_user["id"]);
			$params_endpoint = http_build_query($data);
			$end_point = MAIL_URL_ENDPOINT."/api/contacts/new";
			curl_post($end_point,$params_endpoint,"YWRtaW46Um9jayExMjM=");                        
			$mail_contact = get_mail_contact($user["email"]);
			$id_lead = $mail_contact["id"];
			/*add contact to segment*/
			$stmt = $db_mail->prepare("INSERT INTO lead_lists_leads (leadlist_id,lead_id,date_added,manually_removed,manually_added) VALUES (:leadlist_id,:lead_id,:date_added,:manually_removed,:manually_added)");	  
			$stmt->bindParam(':leadlist_id', $segment);
			$stmt->bindParam(':lead_id', $id_lead);
			$stmt->bindParam(':date_added',$date);
			$manually_removed =  0;
			$stmt->bindParam(':manually_removed', $manually_removed);   
			$manually_added =  1;		 
			$stmt->bindParam(':manually_added', $manually_added); 	
			$stmt->execute();  
		} 
               }
                if($segment_name=="Twitter")
               {
                  $lead = mail_get_lead($user->email, $email_owner_user["id"]);
		if(!$lead)//contact does not exist for owner. So, add it.
		{
			$date = date("Y-m-d H:i:s");
			$data = array("firstname"=>$user->name,"lastname"=>"*","email"=>$user->email,"ipAddress"=>get_client_ip(),"twitter"=>"https://twitter.com/".$user->screen_name,"owner"=>$email_owner_user["id"]);
			$params_endpoint = http_build_query($data);
			$end_point = MAIL_URL_ENDPOINT."/api/contacts/new";
			curl_post($end_point,$params_endpoint,"YWRtaW46Um9jayExMjM=");                        
			$mail_contact = get_mail_contact($user->email);
			$id_lead = $mail_contact["id"];
			/*add contact to segment*/
			$stmt = $db_mail->prepare("INSERT INTO lead_lists_leads (leadlist_id,lead_id,date_added,manually_removed,manually_added) VALUES (:leadlist_id,:lead_id,:date_added,:manually_removed,:manually_added)");	  
			$stmt->bindParam(':leadlist_id', $segment);
			$stmt->bindParam(':lead_id', $id_lead);
			$stmt->bindParam(':date_added',$date);
			$manually_removed =  0;
			$stmt->bindParam(':manually_removed', $manually_removed);   
			$manually_added =  1;		 
			$stmt->bindParam(':manually_added', $manually_added); 	
			$stmt->execute();                                                  
		} 
               }
				
	}	
 } 
}
function mail_delete_null_leads()
{
 $db_mail = Flight::db_mail(); 
 $stmt = $db_mail->prepare("DELETE FROM leads WHERE owner_id IS NULL");
 $stmt->execute();
}
function get_user_segment($segment_name, $mac)
{
    $db_mail = Flight::db_mail();
    $device_owner = get_device_owner($mac);
    $email_user = get_mail_user($device_owner["email"]);
    $stmt = $db_mail->prepare('SELECT * FROM lead_lists WHERE name=:name AND created_by=:created_by');
    $stmt->bindParam(':name',$segment_name);
    $stmt->bindParam(':created_by',$email_user["id"]);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    if (empty($data)) {
           return false;
       }
           else
           {
             return $data;
           }
}

function mail_create_user_segment($segment_name, $mac)
{
    $db_mail = Flight::db_mail();
    $device_owner = get_device_owner($mac);
    $email_user = get_mail_user($device_owner["email"]);
    $is_published = 1;
    $is_global = 1;
    $filters = "a:0:{}";
    $date = date("Y-m-d H:i:s");
    $alias = $segment_name."_".$mac;
    $stmt = $db_mail->prepare('INSERT INTO lead_lists (is_published, date_added,created_by, created_by_user, name, alias, filters, is_global) VALUES(:is_published, :date_added, :created_by, :created_by_user, :name, :alias, :filters, :is_global)');
    $stmt->bindParam(':is_published',$is_published);
    $stmt->bindParam(':date_added',$date);
    $stmt->bindParam(':created_by',$email_user["id"]);
    $stmt->bindParam(':created_by_user',$email_user["username"]);
    $stmt->bindParam(':name',$segment_name);
    $stmt->bindParam(':alias',$alias);
    $stmt->bindParam(':filters',$filters);
    $stmt->bindParam(':is_global',$is_global);
    $stmt->execute();
}

function mail_get_lead($email, $owner_id)
{
 $db_mail = Flight::db_mail();	
 $stmt = $db_mail->prepare('SELECT * FROM leads WHERE email=:email AND owner_id=:owner_id');
 $stmt->bindParam(':email',$email);
 $stmt->bindParam(':owner_id',$owner_id);
 $stmt->execute();
 $data = $stmt->fetch(PDO::FETCH_ASSOC);
 if (empty($data)) {
        return false;
    }
	else
	{
		return $data;
	}
}
function update_lead_stage($id_owner, $id_lead,$stage_name)
{
	
	$db_mail = Flight::db_mail();
	$stage = get_stage_by_owner($id_owner,$stage_name);
	$db_mail = Flight::db_mail();
    $stmt = $db_mail->prepare("UPDATE leads SET stage_id=:stage_id WHERE owner_id=:owner_id AND id=:id");
	$stmt->bindParam(':stage_id', $stage['id']);
    $stmt->bindParam(':owner_id', $id_owner);    
	$stmt->bindParam(':id', $id_lead);
    $stmt->execute();
    return false;  
}
function get_stage_by_owner($id_owner,$stage_name)
{ 
 $db_mail = Flight::db_mail();
 $stmt = $db_mail->prepare('SELECT * FROM stages WHERE created_by=:created_by AND name=:name');
 $stmt->bindParam(':created_by',$id_owner);
 $stmt->bindParam(':name',$stage_name);
 $stmt->execute();
 $data = $stmt->fetch(PDO::FETCH_ASSOC);
 if (empty($data)) {
        return false;
    }
	else
	{
		return $data;
	}
}
function get_device_owner($mac)
{
	$db = Flight::db();
    $stmt = $db->prepare('SELECT * FROM client_devices LEFT JOIN users ON client_devices.id_user = users.id WHERE mac=:mac');
    $stmt->bindParam(':mac', $mac);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    if (empty($data)) {
        return false;
    }
	else
	{
		return $data;
	}	
}
function get_mail_user($email)
{
	$db_mail = Flight::db_mail();
	$stmt = $db_mail->prepare('SELECT * FROM users WHERE email = :email');
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    if (empty($data)) {
        return false;
    }
	else
	{
		return $data;
	}
}
function get_mail_contact($email)
{
	$db_mail = Flight::db_mail();
	$stmt = $db_mail->prepare('SELECT * FROM leads WHERE email = :email');
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    if (empty($data)) {
        return false;
    }
	else
	{ 
		return $data;
	}
}
function get_fb_user($id_consumer)
{    
    $db = Flight::db();
    $stmt = $db->prepare('SELECT * FROM facebook_consumers WHERE id_consumer = :id_consumer');
    $stmt->bindParam(':id_consumer', $id_consumer);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    if (empty($data)) 
    {
        return false;
    }
    if ($data['id_consumer'] == $id_consumer) 
    {
        return $data;
    }
    return false;
}
function set_mac_fb_consumer($id_fb_user,$mac)
{
	  $db = Flight::db();
    $stmt = $db->prepare("UPDATE facebook_consumers SET mac=:mac WHERE id_fb_user=:id_fb_user");
    $stmt->bindParam(':id_fb_user', $id_fb_user);
    $stmt->bindParam(':mac', $mac);
    $stmt->execute();
}
function exist_fb_user_consumer($id_fb_user, $mac)
{    
    $db = Flight::db();
    $stmt = $db->prepare('SELECT * FROM facebook_consumers WHERE id_fb_user = :id_fb_user and mac=:mac');
    $stmt->bindParam(':id_fb_user', $id_fb_user);
	$stmt->bindParam(':mac', $mac);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    if (empty($data)) 
    {
        return false;
    }
    if ($data['id_fb_user'] == $id_fb_user and $data['mac']==$mac) 
    {
        return $data['id_consumer'];
    }
    return false;
}
function update_fb_user_post_id($id_fb_user,$post_id)
{    
    $db = Flight::db();
    $stmt = $db->prepare("UPDATE facebook_consumers SET post_id=:post_id WHERE id_fb_user=:id_fb_user");
    $stmt->bindParam(':id_fb_user', $id_fb_user);
    $stmt->bindParam(':post_id', $post_id);
    $stmt->execute();
    return false;
}

function save_user_device_connection($device_connection)
{
    $db = Flight::db();    
    $stmt = $db->prepare("INSERT INTO users_devices_connections (id_fb_user,gw_address,gw_port,gw_id,ip,mac,platform,date) VALUES (:id_fb_user,:gw_address,:gw_port,:gw_id,:ip,:mac,:platform, :date)");     
    $stmt->execute($device_connection);
    return $db->lastInsertId(); 
}
function set_token_user($id_fb_user,$token,$platform)
{
    $db = Flight::db();
    $stmt = $db->prepare("UPDATE tokens SET id_fb_user=:id_fb_user, platform=:platform WHERE token=:token");
    $stmt->bindParam(':id_fb_user', $id_fb_user);
    $stmt->bindParam(':token', $token);
	$stmt->bindParam(':platform', $platform);
    $stmt->execute();
    return false;  
}



function save_instagram($object)
{
	$db = Flight::db();
	if(is_object($object)):
		if(!exist_ig_user_consumer($object->user->id,$_SESSION["gw_id"])):		
			   
			$stmt = $db->prepare("INSERT INTO instagram_consumers (id_ig_user,full_name,profile_picture,website,bio,username,access_token,date) VALUES (:id_ig_user,:full_name,:profile_picture,:website,:bio,:username,:access_token,:date)");     
			$stmt->bindParam(':id_ig_user', $object->user->id);
			$stmt->bindParam(':full_name', $object->user->full_name);
			$stmt->bindParam(':profile_picture', $object->user->profile_picture);
			$stmt->bindParam(':website', $object->user->website);
			$stmt->bindParam(':bio', $object->user->bio);
			$stmt->bindParam(':username', $object->user->username);
			$stmt->bindParam(':access_token', $object->access_token);
			$stmt->bindParam(':date', date("Y-m-d H:i:s"));
			$stmt->execute();
			return array("id"=>$object->user->id,"token"=>$object->access_token,"username"=>$object->user->username);
		else:
		    $stmt = $db->prepare('UPDATE instagram_consumers SET full_name=:full_name,profile_picture=:profile_picture,website=:website,bio=:bio,username=:username,access_token=:access_token WHERE id_ig_user=:id_ig_user');			
			$stmt->bindParam(':id_ig_user', $object->user->id);
			$stmt->bindParam(':full_name', $object->user->full_name);
			$stmt->bindParam(':profile_picture', $object->user->profile_picture);
			$stmt->bindParam(':website', $object->user->website);
			$stmt->bindParam(':bio', $object->user->bio);
			$stmt->bindParam(':username', $object->user->username);
			$stmt->bindParam(':access_token', $object->access_token);
			$stmt->execute();  
			return array("id"=>$object->user->id,"token"=>$object->access_token,"username"=>$object->user->username);
			
		endif;	
		
		    
	endif;
}
function exist_ig_user_consumer($id_ig_user, $mac)
{    
    $db = Flight::db();
    $stmt = $db->prepare('SELECT * FROM instagram_consumers WHERE id_ig_user = :id_ig_user and mac=:mac');
    $stmt->bindParam(':id_ig_user', $id_ig_user);
	 $stmt->bindParam(':mac', $mac);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    if (empty($data)) 
    {
        return false;
    }
    if ($data['id_ig_user'] == $id_ig_user and $data['mac']==$mac) 
    {
        return true;
    }
    return false;
}
function get_portal_instagram_user($id_ig_user)
{    
    $db = Flight::db();
    $stmt = $db->prepare('SELECT * FROM portals_users_instagram WHERE id_ig_user = :id_ig_user');
    $stmt->bindParam(':id_ig_user', $id_ig_user);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    if (empty($data)) 
    {
        return false;
    }
    if ($data['id_ig_user'] == $id_ig_user) 
    {
        return $data;
    }
    return false;
}
function set_mac_ig_consumer($id_ig_user,$mac)
{
	$db = Flight::db();
    $stmt = $db->prepare("UPDATE instagram_consumers SET mac=:mac WHERE id_ig_user=:id_ig_user");
    $stmt->bindParam(':id_ig_user', $id_ig_user);
    $stmt->bindParam(':mac', $mac);
    $stmt->execute();
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
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
function test()
{
    $data = array("firstname"=>"camila","lastname"=>"gomez","email"=>"testtttt@gmail.com","ipAddress"=>get_client_ip(),"facebook"=>"facebook.com","owner"=>20);
    $params_endpoint = http_build_query($data);
    $end_point = MAIL_URL_ENDPOINT."/api/contacts/new";
    curl_post($end_point,$params_endpoint,"YWRtaW46Um9jayExMjM=");
}


/*twitter*/
function save_twitter_profile($object,$id_user)
{
	$db = Flight::db();
	if(is_object($object)):
		if(!exist_twitter_profile($object->id_str,$_SESSION["gw_id"])):		
			if(isset($object->email))   
			$stmt = $db->prepare("INSERT INTO twitter_consumers (id_tw_user,full_name,profile_picture,email,username, access_token, mac, id_user, date) VALUES (:id_tw_user,:full_name,:profile_picture,:email,:username,:access_token,:mac,:id_user, :date)");     
			else
                        $stmt = $db->prepare("INSERT INTO twitter_consumers (id_tw_user,full_name,profile_picture,username,access_token,mac, id_user, date) VALUES (:id_tw_user,:full_name,:profile_picture,:username,:access_token,:mac,:id_user, :date)");         
                         
                        $stmt->bindParam(':id_tw_user', $object->id_str);
			$stmt->bindParam(':full_name', $object->name);
			$stmt->bindParam(':profile_picture', $object->profile_image_url);
                        if(isset($object->email))
			$stmt->bindParam(':email', $object->email);
                        
			$stmt->bindParam(':username', $object->screen_name);
                        $stmt->bindParam(':access_token', json_encode($_SESSION['access_token']));
			$stmt->bindParam(':mac',$_SESSION["gw_id"]);
                        $stmt->bindParam(':id_user',$id_user);
			$stmt->bindParam(':date', date("Y-m-d H:i:s"));
			$stmt->execute();                        
			return array("id_consumer"=>$db->lastInsertId(),"id"=>$object->id_str,"token"=>$_SESSION['access_token'],"username"=>$object->screen_name);
		else:
                    
                        if(isset($object->email))   
		         $stmt = $db->prepare('UPDATE twitter_consumers SET full_name=:full_name,profile_picture=:profile_picture,email=:email,username=:username,access_token=:access_token WHERE id_tw_user=:id_tw_user');			
			else
                         $stmt = $db->prepare('UPDATE twitter_consumers SET full_name=:full_name,profile_picture=:profile_picture,username=:username,access_token=:access_token WHERE id_tw_user=:id_tw_user');			
                        
                        $stmt->bindParam(':id_tw_user', $object->id_str);
			$stmt->bindParam(':full_name', $object->name);
			$stmt->bindParam(':profile_picture', $object->profile_image_url);
                        if(isset($object->email))  
			$stmt->bindParam(':email', $object->email);
                        
			$stmt->bindParam(':username', $object->screen_name);
			$stmt->bindParam(':access_token', $object->access_token);
			$stmt->execute();  
			return array("id_consumer"=>false,"id"=>$object->id_str,"token"=>$_SESSION['access_token'],"username"=>$object->screen_name);			
		endif;	
		
		    
	endif;
}
function exist_twitter_profile($id_tw_user, $mac)
{    
    $db = Flight::db();
    $stmt = $db->prepare('SELECT * FROM twitter_consumers WHERE id_tw_user = :id_tw_user and mac=:mac');
    $stmt->bindParam(':id_tw_user', $id_tw_user);
	 $stmt->bindParam(':mac', $mac);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    if (empty($data)) 
    {
        return false;
    }
    if ($data['id_tw_user'] == $id_tw_user and $data['mac']==$mac) 
    {
        return true;
    }
    return false;
}
function set_mac_tw_consumer($id_tw_user,$mac)
{
    $db = Flight::db();
    $stmt = $db->prepare("UPDATE twitter_consumers SET mac=:mac WHERE id_tw_user=:id_tw_user");
    $stmt->bindParam(':id_tw_user', $id_tw_user);
    $stmt->bindParam(':mac', $mac);
    $stmt->execute();
}
function get_portal_twiter_user($member_id,$mac)
{    
    $db = Flight::db();
    $stmt = $db->prepare('SELECT * FROM portals_users_twitter WHERE id_user = :id_user AND mac=:mac');
    $stmt->bindParam(':id_user', $member_id);
     $stmt->bindParam(':mac', $mac);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    if (empty($data)) 
    {
        return false;
    }
    if ($data['id_user'] == $member_id) 
    {
        return $data;
    }
    return false;
}
function save_google_profile($_vars,$id_user,$mac)
{
   if(isset($_vars["id_goo_user"])) 
   {
    $db = Flight::db();	
    if(!exist_google_user_consumer($_vars["id_goo_user"],$_SESSION["gw_id"])):		
        $stmt = $db->prepare("INSERT INTO google_consumers (id_goo_user,full_name,profile_picture,email,id_user,mac, date) VALUES (:id_goo_user,:full_name,:profile_picture,:email,:id_user,:mac,:date)");     
        $stmt->bindParam(':id_goo_user', $_vars["id_goo_user"]);
        $stmt->bindParam(':full_name', $_vars["full_name"]);
        $stmt->bindParam(':profile_picture', $_vars["profile_picture"]);
        $stmt->bindParam(':email', $_vars["email"]);
        $stmt->bindParam(':id_user', $id_user);
        $stmt->bindParam(':mac', $mac);
        $stmt->bindParam(':email', $_vars["email"]);
        $stmt->bindParam(':date', date("Y-m-d H:i:s"));
        $stmt->execute();
        return array("id"=>$_vars["id_goo_user"]);
    else:
        $stmt = $db->prepare('UPDATE google_consumers SET full_name=:full_name,profile_picture=:profile_picture,email=:email,id_user=:id_user,mac=:mac WHERE id_goo_user=:id_goo_user');			
        $stmt->bindParam(':id_goo_user', $_vars["id_goo_user"]);
        $stmt->bindParam(':full_name', $_vars["full_name"]);
        $stmt->bindParam(':profile_picture', $_vars["profile_picture"]);
        $stmt->bindParam(':email', $_vars["email"]);
        $stmt->bindParam(':id_user', $id_user);
        $stmt->bindParam(':mac', $mac);
        $stmt->execute();  
            return array("id"=>$_vars["id_goo_user"]);			
    endif;	  
   }
}
function exist_google_user_consumer($id_goo_user, $mac)
{    
    $db = Flight::db();
    $stmt = $db->prepare('SELECT * FROM google_consumers WHERE id_goo_user = :id_goo_user and mac=:mac');
    $stmt->bindParam(':id_goo_user', $id_goo_user);
    $stmt->bindParam(':mac', $mac);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    if (empty($data)) 
    {
        return false;
    }
    if ($data['id_goo_user'] == $id_goo_user and $data['mac']==$mac) 
    {
        return true;
    }
    return false;
}