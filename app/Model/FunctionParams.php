<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FunctionParams extends Model
{
    //
    protected $table = 'function_params';

    protected $fillable = [ 
        'device_id',
        'function_id',
        'name',
        'full_name',
        'desc',
        'type',
        'limit',
    ];
}
