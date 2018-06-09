<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () 
{
	$authentication = \App::make('authenticator');
    $userLogged = $authentication->getLoggedUser();
	if(!$userLogged)
	{
		return view('laravel-authentication-acl::client.auth.login');
	}
	else
	{
		$authentication_helper =\App::make('authentication_helper');
		$Permission = $authentication_helper->hasPermission(array("_member"));
        if($Permission)
		{
			 return redirect('admin/client-devices');
		}
		else
		{
			return View::make('laravel-authentication-acl::admin.dashboard.default');
		}
		
	}
});

Route::resource('admin/client-devices', 'Admin\\ClientDevicesController');

Route::resource('admin/client-devices', 'Admin\\ClientDevicesController');
Route::resource('admin/client-devices', 'Admin\\ClientDevicesController');
Route::resource('admin/facebook-consumers', 'Admin\\FacebookConsumersController');
Route::resource('admin/destroy-facebook-consumers','Admin\\FacebookConsumersController@destroy'); 
Route::resource('admin/instagram-consumers', 'Admin\\InstagramConsumersController');
Route::resource('admin/advertising', 'Admin\\AdvertisingController');
Route::resource('admin/portal', 'Admin\\PortalController');

Route::get('admin/igauth', [
        'uses' => 'Admin\\PortalController@igauth'
]);

Route::get('admin/instagram-consumers/{id}', [
        'uses' => 'Admin\\InstagramConsumersController@show'
]);

Route::resource('admin/destroy-instagram-consumers','Admin\\InstagramConsumersController@destroy'); 

Route::get('admin/instagram-consumers',[
        'uses' => 'Admin\\InstagramConsumersController@index'
]);

Route::get('admin/twauth', [
        'uses' => 'Admin\\PortalController@twauth'
]);

Route::get('admin/twitter-consumers/{id}', [
        'uses' => 'Admin\\TwitterConsumersController@show'
]);
Route::resource('admin/destroy-twitter-consumers','Admin\\TwitterConsumersController@destroy'); 

Route::get('admin/google-consumers/{id}', [
        'uses' => 'Admin\\GoogleConsumersController@show'
]);
Route::resource('admin/destroy-google-consumers','Admin\\GoogleConsumersController@destroy'); 