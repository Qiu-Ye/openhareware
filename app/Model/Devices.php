<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Devices extends Model
{
    //
    protected $table = 'devices';

    protected $fillable = [ 
        'name',
        'full_name',
        'desc',
        'token',
    ];
}
