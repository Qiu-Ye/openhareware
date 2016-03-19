<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    //
    public function profile(Request $request){
        $user = $request->user();
        //echo $user['name'].'登录成功';
        return view('workspace.device',$user);
    }
}
