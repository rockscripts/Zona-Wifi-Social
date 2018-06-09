<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portal extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'portals';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id_portal';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_postal', 'title', 'display_popup', 'close_popup_time','close_popup_time_seconds', 'redirect_url', 'fb_page_id', 'fb_page_name', 'share_action', 'share_message','like_us_popup','close_popup_like_time','close_popup_like_time_seconds','access_code','connect_fb','connect_ig','connect_wa','connect_tw','connect_go','id_device', 'id_user', 'css'];
	
	public function user()
		{
			return $this->HasOne('App\User', 'id');
		}
	public function clientdevice()
		{
			return $this->belongsTo('App\ClientDevice','id_device');
		}
    
}
