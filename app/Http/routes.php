<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
//首页
//Route::any('/', 'HomeController@index');
Route::get('/', function () {
    if(Auth::check()){
        $a = '<a href="/logout">退出</a>';
        $user = Auth::user();
        $a.=$user['name'];
    }else{
        $a = '<a href="/login">登录</a>';
        return view('layout.index');
    }
    return $a;
});

//认证登录相关
Route::group(['middleware' => ['web']], function () {
    // 认证路由...
    Route::get('login', 'Auth\AuthController@getLogin');
    Route::post('login', 'Auth\AuthController@postLogin');
    //Route::get('logout', 'Auth\AuthController@getLogout');
    Route::get('logout', 'Auth\AuthController@logout');

    // 注册路由...
    Route::get('register', 'Auth\AuthController@getRegister');
    Route::post('register', 'Auth\AuthController@postRegister');

    // 发送密码重置链接路由
    Route::get('password/email', 'Auth\PasswordController@getEmail');
    Route::post('password/email', 'Auth\PasswordController@postEmail');
    
    // 密码重置路由
    Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
    Route::post('password/reset', 'Auth\PasswordController@postReset');
});


// 登录验证
Route::group(['middleware' => ['web', 'auth']], function () {
    //Route::get('/', function () {
    //    //return view('layout.index');
    //    if(Auth::check()){
    //        $a = '<a href="/logout">退出</a>';
    //        $user = Auth::user();
    //        $a.=$user['name'];
    //    }else{
    //        $a = '<a href="/login">登录</a>';
    //    }
    //    return $a;
    //});

    Route::any('/profile','DeviceController@index');

    Route::resource('/device','DeviceController');

    Route::any('/a',function(){
        echo Request::fullUrl();
        dd(Auth::user());
        //return route('device.index');
    });
});

Route::group(['prefix' => 'api', 'middleware' => ['api']], function() {
    Route::any('/calToken','ApiController@calToken');
    Route::any('/test','ApiController@test');
});
