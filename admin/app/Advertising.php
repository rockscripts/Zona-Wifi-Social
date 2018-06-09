<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertising extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'advertisings';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id_advertising';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [ 'keyword', 'type', 'position', 'media_file', 'id_device', 'id_user'];

    public function user()
    {
        return $this->HasOne('App\User', 'id');
    }
	 public function clientdevice()
    {
        return $this->belongsTo('App\ClientDevices','id_device');
    }
}
