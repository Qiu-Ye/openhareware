<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ApiController extends Controller
{
    //
    public function calToken(Request $request){
        $deviceId = $request['device_id'];
        $deviceName = $request['device_name'];
        //return bcrypt($deviceId.'-'.$deviceName);
        return md5($deviceId.'-'.$deviceName);
    }
}
