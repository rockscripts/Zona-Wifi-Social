<?php
// database host
define('DB_HOST', 'localhost');
// database port
define('DB_PORT', '3306');
// database name
define('DB_NAME', 'wifisocial');
// database user name
define('DB_USER', 'root');
// database password
define('DB_PASS', '');
define('DEFAULT_LANGUAGE', 'es');

// database host
define('DB_HOST_MAIL', 'localhost');
// database port
define('DB_PORT_MAIL', '3306');
// database name
define('DB_NAME_MAIL', 'rocksc5_mail');
// database user name
define('DB_USER_MAIL', 'root');
// database password
define('DB_PASS_MAIL', '');

//define('DEFAULT_LANGUAGE', 'es');

if(isset($_GET["lang"])):
require ("lang/".$_GET["lang"].".php");
else:
require ("lang/".DEFAULT_LANGUAGE.".php");
endif;

Flight::register('db', 'PDO', array('mysql:host='. DB_HOST . ';port=' . DB_PORT .';dbname='. DB_NAME,
    DB_USER, DB_PASS), function($db) {
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
});
/*Flight::register('db_mail', 'PDO', array('mysql:host='. DB_HOST_MAIL . ';port=' . DB_PORT_MAIL .';dbname='. DB_NAME_MAIL,
    DB_USER_MAIL, DB_PASS_MAIL), function($db_mail) {
        $db_mail->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
});*/

function get_device_portal_by_router_MAC($mac)
{   
    $db = Flight::db();
    $stmt = $db->prepare('SELECT * FROM client_devices LEFT JOIN portals ON portals.id_device = client_devices.id_device  LEFT JOIN portals_users_instagram ON portals.id_portal = portals_users_instagram.id_portal WHERE client_devices.mac = :mac');
    $stmt->bindParam(':mac', $mac);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    if (empty($data)) 
    {
        return false;
    }
    if ($data['mac'] == $mac) 
    {
        return $data;
    }
    return false;
}
function get_advertisings_by_device($id_device)
{   
    $db = Flight::db();
    $stmt = $db->prepare('SELECT * FROM advertisings WHERE advertisings.id_device = :id_device and advertisings.position!=0');
    $stmt->bindParam(':id_device', $id_device);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	if(empty($rows))
		return false;
	
    return $rows;
}
$device_portal = get_device_portal_by_router_MAC($_GET["gw_id"]);
/*echo'<pre>';
print_r($device_portal );
die;*/
/*echo utf8_encode($device_portal["title"]);die("******");*/
if(!$device_portal)
 {
	 $device_portal = get_device_portal_by_router_MAC($_SESSION["gw_id"]);
	 if(isset($_SESSION["gw_id"]))
	 {
		// ID of your Facebook page
	// This is where people will be checking in
	define('PAGE_ID', $device_portal["fb_page_id"]);	
	// Name of your facebook page
	// This is how your place will be called in this script
	// e.g. "Log in at PAGE_NAME"
	define('PAGE_NAME', utf8_encode($device_portal["fb_page_name"]));
	define('MESSAGE_POST_FACEBOOK', $device_portal["share_message"]);
	// Where user is sent after login is done
        define('PORTAL_URL', $device_portal["redirect_url"]);
	define('PORTAL_TITLE', utf8_encode($device_portal["title"]));
	define('FANPAGE_URL', "https://www.facebook.com/".$device_portal["fb_page_id"]."/"); 
	define('SHARE_ACTION', $device_portal["share_action"]); 	
	// This is the access code you can hand out to
	// people if they do not want to use Facebook.
	// Note: case sensitive!
	define('ACCESS_CODE', $device_portal["access_code"]);
	define('PORTAL_INSTAGRAM_ID',  $device_portal["id_ig_user"]);
        define('PORTAL_INSTAGRAM_ACCESS_TOKEN',  $device_portal["access_token"]);
	define('CONNECT_FB',  $device_portal["connect_fb"]);
	define('CONNECT_IG',  $device_portal["connect_ig"]);
	define('CONNECT_WA',  $device_portal["connect_wa"]);
        define('CONNECT_TW',  $device_portal["connect_tw"]);
        define('CONNECT_GO',  $device_portal["connect_go"]);
        define('CSS',  $device_portal["css"]);
	 }
	 else{die("***");}
	
 }
else
 {
	$_SESSION["gw_id"] = $_GET["gw_id"];
	$_SESSION["device_portal"] = $device_portal = get_device_portal_by_router_MAC($_GET["gw_id"]); 
	$_SESSION["advertisings"] = $advertisings = get_advertisings_by_device($device_portal["id_device"]); 
	// ID of your Facebook page
	// This is where people will be checking in
	define('PAGE_ID', $device_portal["fb_page_id"]);
	
	// Name of your facebook page
	// This is how your place will be called in this script
	// e.g. "Log in at PAGE_NAME"
	define('PAGE_NAME', utf8_encode($device_portal["fb_page_name"]));
	define('MESSAGE_POST_FACEBOOK', $device_portal["share_message"]);
	// Where user is sent after login is done
        define('PORTAL_URL', $device_portal["redirect_url"]);
	define('PORTAL_TITLE', utf8_encode($device_portal["title"]));
	define('FANPAGE_URL', "https://www.facebook.com/".$device_portal["fb_page_id"]."/");
	define('SHARE_ACTION', $device_portal["share_action"]); 
	define('ACCESS_CODE', $device_portal["access_code"]);
	define('PORTAL_INSTAGRAM_ID',  $device_portal["id_ig_user"]);
        define('PORTAL_INSTAGRAM_ACCESS_TOKEN',  $device_portal["access_token"]);
	define('CONNECT_FB',  $device_portal["connect_fb"]);
	define('CONNECT_IG',  $device_portal["connect_ig"]);
	define('CONNECT_WA',  $device_portal["connect_wa"]);
        define('CONNECT_TW',  $device_portal["connect_tw"]);
        define('CONNECT_GO',  $device_portal["connect_go"]);
        define('CSS',  $device_portal["css"]);
 }
//$advertisings = get_advertisings_by_device($device["id_device"]);
// Facebook Details

define('APP_NAME', 'WIFI SOCIAL');
define('APP_ID', '1822300584713400');
// Facebook app secret
define('APP_SECRET', '308dddb9c2c77be56fea46e78c09c9ff');






// The URL where this script lives
// This will typically a directory as the .htaccess
// rewrites all requests to index.php
// Example: https://example.xyz/wifi/
define('MY_URL', 'http://zws.com/portal/');
define('MY_URL_UPLOADS', 'http://zws.com/admin/public/uploads/');
// How long the wifi session persists before if expires
// Set this in Minutes
define('SESSION_DURATION', 60 * 12);
// Don't forget to whitelist these domains on the gateway!
// URL pointing to an extended privacy policy
// Note that this script ships with a default privacy notice
// which may not be suitable for you 
// If set to the empty string, then the link will not be rendered
define('EXTENDED_PRIVACY_URL', 'http://example.xyz/privacy/');

// URL pointing to an imprint as required in some jurisdictions
// If set to the empty string, then the link will not be rendered
define('IMPRINT_URL', 'http://example.xyz/imprint/');

// How long the session cookie is valid.
// You probably do not have to change this.
// In seconds
define('COOKIE_SESSION_DURATION', 3600 * 24);


// Display helpful message to the FB review people
define('FB_REVIEW', False);

define('CONNECT_TO_WIFI_SOCIAL_IN_ONE_CLICK', "on");
 
//define('CONNECT_WITH_CODE', 0);
define('SHARE_ACTION_WRONG', 0); 
define('MAIL_URL_ENDPOINT',"http://mail.rockscripts.org");
//test();
?> 