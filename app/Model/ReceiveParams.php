<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ReceiveParams extends Model
{
    //
    protected $table = 'receive_params';

    protected $fillable = [ 
        'device_id',
        'name',
        'unit',
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
}
