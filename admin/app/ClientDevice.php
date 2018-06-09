<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientDevice extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'client_devices';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id_device';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [ 'id_user', 'mac', 'name', 'ip', 'device_username', 'device_password'];

     
	public function user()
		{
			return $this->HasOne('App\User', 'id');
		}
    public function portal()
		{
			return $this->HasOne('App\Portal', 'id_portal');
		}
		 public function advertising()
    {
        return $this->belongsTo('App\Advertising','id_device');
    }
}
