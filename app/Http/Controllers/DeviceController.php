<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
use DB;
use App\Model\Devices;
use App\Model\DeviceFunction;
use App\Model\FunctionParams;

class DeviceController extends Controller
{
    protected $user;

    public function __construct(){
        $this->user = Auth::user();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();
        //$device=Devices::where('user_id',$user->id)->get();
        $device=Devices::with('devicefunction','devicefunction.params')->all();
        //$device=Devices::where('user_id',$user->id)->simplePaginate(5);
        dd($device);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('workspace.add_device');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd($request);
        DB::beginTransaction();
        try{
            $device = new Devices;
            $device->user_id = $this->user->id;
            $device->name = $request['device_id'];
            $device->full_name = $request['device_name'];
            $device->desc = $request['device_desc'];
            $device->token = md5($request['device_id'].'-'.$request['device_name']);
            $device->save();

            $functionArr = $request['function'];
            foreach($functionArr as $functionTmp){
                $deviceFunction = new DeviceFunction;
                $deviceFunction->name = $functionTmp['function_id'];
                $deviceFunction->full_name = $functionTmp['function_name'];
                $deviceFunction->device_id = $device->id;
                $deviceFunction->save();

                $paramArr = $functionTmp['param'];
                foreach($paramArr as $paramTmp){
                    $functionParam = new FunctionParams;
                    $functionParam->name = $paramTmp['param_id'];
                    $functionParam->type = $paramTmp['param_type'];
                    $functionParam->device_id = $device->id;
                    $functionParam->function_id = $deviceFunction->id;
                    $functionParam->save();
                }
            }

            DB::commit();
        }
        catch(Exception $e){
            DB::rollBack();
            throw $e;
        }
        echo 'ok';

        //return redirect()->route('device.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $device = Devices::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
