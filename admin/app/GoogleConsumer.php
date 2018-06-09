<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoogleConsumer extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'google_consumers';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id_consumer';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_goo_user', 'full_name', 'profile_picture', 'email', 'mac', 'id_user', 'date'];

    
}
