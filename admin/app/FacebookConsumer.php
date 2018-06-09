<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacebookConsumer extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'facebook_consumers';

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
    protected $fillable = ['id_fb_user', 'first_name', 'last_name', 'email', 'gender', 'birthday', 'age_range', 'religion', 'political', 'political', 'profile_link', 'website', 'locale', 'lacation', 'hometown', 'post_id', 'access_token', 'mac'];

    
}
