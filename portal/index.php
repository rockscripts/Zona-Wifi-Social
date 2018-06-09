<?php
session_start();
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



// Configure some security features
// These already have sane defaults in recent PHP versions,
// so consider this as documentation
// A special bit of configuration for our host:
// An SSL proxy is provided at https://sslsites.de/your.domain/
// By default, a cookie is set for sslsites.de which means
// other websites available over that proxy can read the cookies!

@ini_set('session.cookie_path', parse_url(MY_URL, PHP_URL_PATH));
@ini_set('session.use_cookies', '1');
@ini_set('session.use_only_cookies', '1');
@ini_set('session.use_trans_sid', '0');
// This does have a default value listed?
ini_set('session.cookie_httponly', '1');
require_once('include/flight/flight/Flight.php');

// Load constants defined in config
require_once('config.php');

// Sessions valid for one hour
session_set_cookie_params(COOKIE_SESSION_DURATION);
if(isset($_SESSION["time_zone"]))
	{
		date_default_timezone_set($_SESSION["time_zone"]);
	}

require_once('tokens.php');


init_token_db();

require_once('handlers/fb_handlers.php');
require_once('handlers/gw_handlers.php');
@ini_set("display_errors", 1);




// HTTPS only!
if (parse_url(MY_URL, PHP_URL_SCHEME) === "https") {
    @ini_set('session.cookie_secure', '1');
}




Flight::route('/', 'handle_root');
Flight::route('/login/', 'handle_login');
Flight::route('/fb_callback', 'handle_fb_callback');
Flight::route('/checkin', 'handle_checkin');
Flight::route('/access_code', 'handle_access_code');
Flight::route('/privacy', 'handle_privacy');
Flight::route('/rerequest_permission/', 'handle_rerequest_permission');
Flight::route('/handle_instagram_callback/', 'handle_instagram_callback'); 
Flight::route('/handle_send_follow_request_to_user/', 'handle_send_follow_request_to_user'); 
Flight::route('/handle_send_verification_code_to_sender/', 'handle_send_verification_code_to_sender'); 
Flight::route('/handle_verify_code_for_sender/', 'handle_verify_code_for_sender'); 
Flight::route('/handle_send_whatsapp_message/', 'handle_send_whatsapp_message'); 
Flight::route('/handle_set_client_time_zone/', 'handle_set_client_time_zone');
Flight::route('/handle_twitter_login', 'handle_twitter_login');
Flight::route('/handle_twitter_callback', 'handle_twitter_callback');
Flight::route('/handle_save_google_profile', 'handle_save_google_profile');
Flight::route('/ping', 'handle_ping');
Flight::route('/auth', 'handle_auth');


// Once login is done, the gateway redirects
// the user to MY_URL . 'portal'
// We don't serve this here, so use external page
Flight::route('/portal', function() { Flight::redirect(PORTAL_URL); });
Flight::start();
?>