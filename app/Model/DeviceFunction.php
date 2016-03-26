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

    /**
     * 查找方法所属的设备信息
     *
     * @return Model
     */
    public function devices(){
        return $this->belongsTo('App\Model\Devices','device_id');
    }

    /**
     * 查找方法的参数信息
     *
     * @return Model
     */
    public function params(){
        return $this->hasMany('App\Model\FunctionParams','function_id');
    }
}
