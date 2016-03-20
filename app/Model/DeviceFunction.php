<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DeviceFunction extends Model
{
    //
    protected $table = 'device_function';

    protected $fillable = [ 
        'device_id',
        'name',
        'full_name',
        'desc',
    ];
}
