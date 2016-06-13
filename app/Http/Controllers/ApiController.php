<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\Devices;

class ApiController extends Controller
{
    //
    public function calToken(Request $request){
        $deviceId = $request['device_id'];
        $deviceName = $request['device_name'];
        //return bcrypt($deviceId.'-'.$deviceName);
        $return = md5($deviceId.'-'.$deviceName);
        return response()->json(array('status' => 0, 'data' => $return));
    }

    public function test(){
        $devices = Devices::find(29);
        echo 'success';
        return;
    }
}
