<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserFavorite extends Model
{
    // use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table ='user_favorites';

}
