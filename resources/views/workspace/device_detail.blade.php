@extends('workspace.master')

@section('workcontent')
    <link href="{{ asset('css/loading/loaders.css') }}" rel="stylesheet">
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-title">设备操作<small> 调用该设备的功能</small></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <section class="widget">
                    <header>
                        <h4>
                            <i class="fa fa-desktop"></i>
                            {{ $device->full_name }}基本信息
                            <small>{{ $device->name }}</small>
                        </h4>
                    </header>
                    <div class="body">
                        <!--<p><strong>设备描述:</strong>{{ $device->desc }}</p>-->
                        <div class="list-group users-list-group">
                            <a href="#" class="list-group-item">
                                <h5 class="no-margin">设备中文名</h5>
                                <small class="text-muted">{{ $device->full_name }}</small>
                            </a>
                        </div>
                        <div class="list-group users-list-group">
                            <a href="#" class="list-group-item">
                                <h5 class="no-margin">设备ID</h5>
                                <small class="text-muted">{{ $device->name }}</small>
                            </a>
                        </div>
                        <div class="list-group users-list-group">
                            <a href="#" class="list-group-item">
                                <h5 class="no-margin">设备描述</h5>
                                <small class="text-muted">{{ $device->desc }}</small>
                            </a>
                        </div>
                        <div class="list-group users-list-group">
                            <a href="#" class="list-group-item">
                                <h5 class="no-margin">设备Token</h5>
                                <small class="text-muted">{{ $device->token }}</small>
                            </a>
                        </div>
                    </div><!--end of body-->
                </section>
            </div>
            <div class="col-md-6">
                <section class="widget">
                    <header>
                        <h4>
                            <i class="fa fa-desktop"></i>
                            {{ $device->full_name }}接收参数实时列表
                        </h4>
                    </header>
                    <div class="body">
                        @if(!empty($device->recparams[0]))
                            @foreach($device->recparams as $recparam)
                            <div class="list-group users-list-group">
                                <a href="#" class="list-group-item">
                                    <h5 class="no-margin">{{ $recparam->name }}</h5>
                                    <small class="text-muted">实时值:<span id="{{ $recparam->name }}" class="badge badge-important"></span></small>
                                    <div class="value pull-right">
                                    
                                </div>
                                </a>
                            </div>
                            @endforeach
                        @else
                            <div class="list-group users-list-group">
                                <a href="#" class="list-group-item">
                                    <h5 class="no-margin">该设备没有注册上传参数</h5>
                                </a>
                            </div>
                        @endif
                    </div><!--end of body-->
                </section>
            </div>
        </div>
    
        <hr>

        <div class="row function_rows">
        @if(!empty($device->devicefunction[0]))
            @foreach($device->devicefunction as $function)
                <div class="col-md-6">
<div id="{{$function->name}}-loading" class="loaded" style="position: absolute;z-index: 999;filter: Alpha(Opacity=50);
    opacity: 0.5;
    width: 100%;
    height: 100%;display:none;
background-color:#000;

">
  <div class="loader" style="padding-left: 219px;padding-top: 52px;">
    <div class="loader-inner pacman">
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>
</div>
                    <section class="widget">
                        <header>
                            <h4 id="{{ $function->name }}" data-fullname="{{ $function->full_name }}">
                                {{ $function->full_name }}
                                <small>{{ $function->name }}</small>
                            </h4>
                        </header>
                        <div class="body">
                            <!--<legend class="section">调用参数</legend>-->
                            <div class="row">
                                <div class="form-horizontal">
                                    <fieldset>
                                    @foreach($function->params as $param)
                                        <div class="control-group">
                                            <label class="control-label" for="{{ $function->name.$param->name }}">{{ $param->name }}</label>
                                            <div class="controls form-group">
                                                @if($param->type == 'bool')
                                                    <label class="checkbox inline">
                                                        <span class="switch switch-small" data-on="primary" data-off="danger">
                                                            <input class="function_param" data-paramname="{{ $param->name }}" type="checkbox" checked="checked">
                                                        </span>
                                                    </label>
                                                @else
                                                <input type="text" id="{{ $function->name.$param->name }}" data-paramname="{{ $param->name }}" class="form-control function_param" style="width:200px;">
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                    </fieldset>
                                    <div class="form-actions">
                                        <div>
                                            <button type="submit" class="btn btn-primary function_call" data-btn_function_name="{{$function->name}}">调用函数</button>
                                            <button type="button" class="btn btn-default">取消</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            @endforeach
        @else
        <div class="col-md-12">
            <section class="widget">
                <header>
                    <h4>
                        暂无功能
                    </h4>
                </header>
            <div class="body">
                 <p>您在注册设备时并未注册功能函数</p>
             </div>
            </section>
        </div>
        @endif
@endsection

@section('pagescript')
<script src="{{ asset('lib/bootstrap/bootstrap-switch.js') }}"></script>
<script type="text/javascript">
var ws = {};
//var link = "ws://192.168.199.222:8082";
//var link = "ws://192.168.191.3:8082";
//var link = "ws://192.168.56.99:8082";
var link = "ws://10.205.6.174:8082";
//var link = "ws://10.205.6.167:8082";
var device_id = "{{$device->id}}";
var name = "{{ Auth::user()->name }}";
var token = "{{ Auth::user()->remember_token }}";

// 连接服务端
function connect() {
   // 创建websocket
   ws = new WebSocket(link);
   // 当socket连接打开时，输入用户名
   ws.onopen = onopen;
   // 当有消息时根据消息类型显示不同信息
   ws.onmessage = onmessage; 
   ws.onclose = function() {
      console.log("连接关闭，定时重连");
      connect();
   };
   ws.onerror = function() {
      console.log("出现错误");
   };
}

// 连接建立时发送登录信息
function onopen()
{
    // 登录
    var login_data = '{"type":"userlogin","name":"'+name+'","token":"'+token+'","device_id":"'+device_id+'"}';
    //console.log("发送登录数据:"+login_data);
    ws.send(login_data);
}

// 服务端发来消息时
function onmessage(e)
{
    //console.log(e.data);
    var data = eval("("+e.data+")");
    console.log(data);
    switch(data['type']){
        case 'response':
            console.log(data['msg']);
            //alert('done');
            break;
        // 服务端ping客户端
        case 'ping':
            ws.send('{"type":"pong"}');
            break;;
        // 接收参数
        case 'send':
            for(var i in data['data']){
                $('#'+data['data'][i]['param']).text(data['data'][i]['value']);
            }
            break;
        case 'function_response':
            console.log($("#"+data['data']['function']));
            var function_name = $("#"+data['data']['function']).data('fullname');
            $("#"+data['data']['function'] +"-loading").hide();
            if(data['data']['status'] == '0'){
                alert('函数 '+function_name+' 调用成功');
            }else{
                alert('函数 '+function_name+' 调用失败');
            }
            break;
    }
}

function function_init(){
    $('.function_call').click(function() {
        //var control_data = '{"type":"userlogin","name":"'+name+'","token":"'+token+'",""device_id:"'+device_id+'"}';
        var function_name = $(this).data('btn_function_name');
        $(this).parents("div.function_rows").find('#'+function_name +"-loading").show();
        var params = new Array();
        $(this).parents('section').find('input.function_param').each(function(){
            if($(this).attr('type') == 'checkbox'){
                if($(this).attr('checked') == true){
                    var value = 1;
                }else{
                    var value = 0;
                }
            }else{
                var value = $(this).val();
            }
            var paramTmp = {
                "paramname":$(this).data('paramname'),
                "value":value
            };
            //paramTmp.paramname = $(this).id;
            //paramTmp.value = $(this).val();
            params.push(paramTmp);
        });
        var control_data = {
            "type":"control",
            "data":{
                'function_name':function_name,
                'params':params,
                "device_id":device_id
            }
        };
        //ws.send(control_data.toJSONString());
        console.log(JSON.stringify(control_data));
        ws.send(JSON.stringify(control_data));
    });
}

$(function(){
    connect();
    function_init();
});

</script>
@endsection
