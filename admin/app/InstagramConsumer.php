<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstagramConsumer extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'instagram_consumers';

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
    protected $fillable = ['id_ig_user', 'full_name', 'profile_picture', 'website', 'bio', 'username', 'access_token', 'mac', 'date'];

    
}
