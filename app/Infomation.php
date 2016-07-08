<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Infomation extends Model
{
    //
    protected $table = 'informations';
    public $timestamps = true;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
}
