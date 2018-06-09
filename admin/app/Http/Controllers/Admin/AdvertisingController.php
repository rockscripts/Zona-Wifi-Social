<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ClientDevice;
use App\Advertising;
use Illuminate\Http\Request;
use Session;
define('THUMBNAIL_IMAGE_MAX_WIDTH', 150);
define('THUMBNAIL_IMAGE_MAX_HEIGHT', 150);

class AdvertisingController extends Controller
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
				$advertising = Advertising::join('users', 'advertisings.id_user', '=', 'users.id')->join('client_devices', 'client_devices.id_device', '=', 'advertisings.id_device')->where('advertisings.id_user', '=', $userLogged->id)->where('advertisings.id_device', '=', $_GET["device"])->paginate(25);
				return view('public.advertising.index', compact('advertising','clientdevice','user'));
			 }
			 else
			 {
				$advertising = Advertising::join('users', 'advertisings.id_user', '=', 'users.id')->join('client_devices', 'client_devices.id_device', '=', 'advertisings.id_device')->where('advertisings.id_user', '=', $userLogged->id)->paginate(25);
				return view('public.advertising.index', compact('advertising','clientdevice','user')); 
			 }
			}
			else
			{
			if(isset($_GET["device"]))
			{
				$advertising = Advertising::join('users', 'advertisings.id_user', '=', 'users.id')->join('client_devices', 'client_devices.id_device', '=', 'advertisings.id_device')->where('advertisings.id_device', '=', $_GET["device"])->paginate(25);
				return view('admin.advertising.index', compact('advertising','clientdevice','user'));
			}
			else
			{
			    $advertising = Advertising::join('users', 'advertisings.id_user', '=', 'users.id')->join('client_devices', 'client_devices.id_device', '=', 'advertisings.id_device')->paginate(25);
			    return view('admin.advertising.index', compact('advertising','clientdevice','user'));	
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
			  return view('public.advertising.create', compact('clientdevice'));
			 }
			else
			 {
			  return view('admin.advertising.create');	
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
        $supported_image = array('gif','jpg','jpeg','png');
		$supported_video = array('mp4');
        $requestData = $request->all();
		/*echo "<pre>";
		print_r($requestData);die;*/
       // $id =\Auth::user()->id;
	    $authentication = \App::make('authenticator');
		$userLogged = $authentication->getLoggedUser();
        $uploadPath = public_path('/uploads/'.$userLogged->id."/");
		$extension = $request->file('media_file')->getClientOriginalExtension();
		$fileName = rand(11111, 99999) . '.' . $extension;
			
			$type = $request->input('type');
		if ($request->hasFile('media_file')) //only images
		{						
			if($type==0)
				
				{
					if (in_array(strtolower($extension), $supported_image)) 
					{
						$request->file('media_file')->move($uploadPath, $fileName);
						$requestData['media_file'] = $fileName;
						$this->generate_image_thumbnail($uploadPath.$fileName, $uploadPath."thum_".$fileName);
					}
				}
				elseif($type==1)
						
						{
							$request->file('media_file')->move($uploadPath, $fileName);
						$requestData['media_file'] = $fileName;
						}
			  
		}
        Advertising::create($requestData);

        Session::flash('flash_message', 'Advertising added!');

        return redirect('admin/advertising?device='.$request->input("id_device"));
    }


function generate_image_thumbnail($source_image_path, $thumbnail_image_path)
{
	
    list($source_image_width, $source_image_height, $source_image_type) = getimagesize($source_image_path);
    switch ($source_image_type) {
        case IMAGETYPE_GIF:
            $source_gd_image = imagecreatefromgif($source_image_path);
            break;
        case IMAGETYPE_JPEG:
            $source_gd_image = imagecreatefromjpeg($source_image_path);
            break;
			case "jpg":
            $source_gd_image = imagecreatefromjpg($source_image_path);
            break;
        case IMAGETYPE_PNG:
            $source_gd_image = imagecreatefrompng($source_image_path);
            break;
    }
    if ($source_gd_image === false) {
        return false;
    }
    $source_aspect_ratio = $source_image_width / $source_image_height;
    $thumbnail_aspect_ratio = THUMBNAIL_IMAGE_MAX_WIDTH / THUMBNAIL_IMAGE_MAX_HEIGHT;
    if ($source_image_width <= THUMBNAIL_IMAGE_MAX_WIDTH && $source_image_height <= THUMBNAIL_IMAGE_MAX_HEIGHT) {
        $thumbnail_image_width = $source_image_width;
        $thumbnail_image_height = $source_image_height;
    } elseif ($thumbnail_aspect_ratio > $source_aspect_ratio) {
        $thumbnail_image_width = (int) (THUMBNAIL_IMAGE_MAX_HEIGHT * $source_aspect_ratio);
        $thumbnail_image_height = THUMBNAIL_IMAGE_MAX_HEIGHT;
    } else {
        $thumbnail_image_width = THUMBNAIL_IMAGE_MAX_WIDTH;
        $thumbnail_image_height = (int) (THUMBNAIL_IMAGE_MAX_WIDTH / $source_aspect_ratio);
    }
    $thumbnail_gd_image = imagecreatetruecolor($thumbnail_image_width, $thumbnail_image_height);
    imagecopyresampled($thumbnail_gd_image, $source_gd_image, 0, 0, 0, 0, $thumbnail_image_width, $thumbnail_image_height, $source_image_width, $source_image_height);

    $img_disp = imagecreatetruecolor(THUMBNAIL_IMAGE_MAX_WIDTH,THUMBNAIL_IMAGE_MAX_WIDTH);
    $backcolor = imagecolorallocate($img_disp,0,0,0);
    imagefill($img_disp,0,0,$backcolor);

        imagecopy($img_disp, $thumbnail_gd_image, (imagesx($img_disp)/2)-(imagesx($thumbnail_gd_image)/2), (imagesy($img_disp)/2)-(imagesy($thumbnail_gd_image)/2), 0, 0, imagesx($thumbnail_gd_image), imagesy($thumbnail_gd_image));

    imagejpeg($img_disp, $thumbnail_image_path, 90);
    imagedestroy($source_gd_image);
    imagedestroy($thumbnail_gd_image);
    imagedestroy($img_disp);
    return true;
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
		$Permission = $this->authentication_helper->hasPermission(array("_member"));
		$advertising = Advertising::leftJoin('users', function($join){
					$join->on('users.id', '=', 'advertisings.id_user');
				})
				->where('advertisings.id_advertising', '=', $id)
				->get()->first();
			if($Permission)
			{
				return view('public.advertising.show', compact('advertising','user'))->with('user');	
			}
			else
			{
				return view('admin.advertising.show', compact('advertising','user'))->with('user');				
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
		$Permission = $this->authentication_helper->hasPermission(array("_member"));
		$advertising = Advertising::leftJoin('client_devices', function($join){
		$join->on('client_devices.id_device', '=', 'advertisings.id_device');
				})
				->where('advertisings.id_advertising', '=', $id)
				->get()->first();
			if($Permission)
			{ 			  
              return view('public.advertising.edit', compact('advertising','clientdevice'));
			}
			else
			{
              return view('admin.advertising.edit', compact('advertising','clientdevice'));	
			}        
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
        $supported_image = array('gif','jpg','jpeg','png');
		$supported_video = array('mp4');
        $requestData = $request->all();
		/*echo "<pre>";
		print_r($requestData);die;*/
       // $id =\Auth::user()->id;
	    $authentication = \App::make('authenticator');
		$userLogged = $authentication->getLoggedUser();
        
		$advertising = Advertising::findOrFail($id);
		if ($request->hasFile('media_file')) //only images
		{	
        $uploadPath = public_path('/uploads/'.$userLogged->id."/");
		$extension = $request->file('media_file')->getClientOriginalExtension();
		$fileName = rand(11111, 99999) . '.' . $extension;
        $type = $request->input('type');		
			if($type==0)
				
				{
					if (in_array(strtolower($extension), $supported_image)) 
					{
						$request->file('media_file')->move($uploadPath, $fileName);
						$requestData['media_file'] = $fileName;
						$this->generate_image_thumbnail($uploadPath.$fileName, $uploadPath."thum_".$fileName);
					}
				}
				elseif($type==1)
						
						{
							$request->file('media_file')->move($uploadPath, $fileName);
						    $requestData['media_file'] = $fileName;
						}
			  if(file_exists($uploadPath.$advertising["media_file"]))
				{
					unlink($uploadPath.$advertising["media_file"]);
					unlink($uploadPath."thum_".$advertising["media_file"]);
				}
		}
		
		
        
        $advertising->update($requestData);

        Session::flash('flash_message', 'Advertising updated!');

        return redirect('admin/advertising?device='.$request->input("id_device"));
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
        Advertising::destroy($id);

        Session::flash('flash_message', 'Advertising deleted!');

        return redirect('admin/advertising');
    }
}
