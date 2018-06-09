<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TwitterConsumer extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'twitter_consumers';

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
    protected $fillable = ['id_tw_user', 'full_name', 'profile_picture', 'email',  'username', 'access_token', 'mac', 'id_user', 'date'];

    
}
