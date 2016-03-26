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

    /**
     * 查找方法所属的设备信息
     *
     * @return Model
     */
    public function devices(){
        return $this->belongsTo('App\Model\Devices','device_id');
    }

    /**
     * 查找方法所属的设备信息
     *
     * @return Model
     */
    public function devicefunction(){
        return $this->hasMany('App\Model\FunctionParams','function_id');
    }
}
