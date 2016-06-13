<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Devices extends Model
{
    //
    protected $table = 'devices';

    protected $fillable = [ 
        'user_id',
        'name',
        'full_name',
        'desc',
        'token',
    ];

    /**
     * 查找设备的设备方法信息
     *
     * @return Model
     */
    public function devicefunction(){
        return $this->hasMany('App\Model\DeviceFunction','device_id');
    }

    /**
     * 查找设备接收参数信息
     *
     * @return Model
     */
    public function recparams(){
        return $this->hasMany('App\Model\ReceiveParams','device_id');
    }


    /**
     * 查找设备的主人
     *
     * @return Model
     */
    public function owner(){ 
        return $this->belongsTo('App\User','user_id');
    }
}
