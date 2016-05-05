@extends('workspace.master')

@section('workcontent')
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-title">设备操作<small> 调用该设备的功能</small></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <section class="widget">
                    <header>
                        <h4>
                            <i class="fa fa-desktop"></i>
                            {{ $device->full_name }}
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
                                <h5 class="no-margin">设备中文名</h5>
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
        </div>

        <div class="row">
        @if(!empty($device->devicefunction[0]))
            @foreach($device->devicefunction as $function)
                <div class="col-md-6">
                    <section class="widget">
                        <header>
                            <h4>
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
                                                            <input id="{{ $function->name.$param->name }}" type="checkbox" checked="checked">
                                                        </span>
                                                    </label>
                                                @else
                                                <input type="text" id="{{ $function->name.$param->name }}" class="form-control" style="width:200px;">
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                    </fieldset>
                                    <div class="form-actions">
                                        <div>
                                            <button type="submit" class="btn btn-primary">调用函数</button>
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
var link = "ws://192.168.56.99:8083";
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
    var login_data = '{"type":"userlogin","name":"'+name+'","token":"'+token+'"}';
    //console.log("websocket握手成功，发送登录数据:"+login_data);
    ws.send(login_data);
}

// 服务端发来消息时
function onmessage(e)
{
    console.log(e.data);
    return;
    var data = eval("("+e.data+")");
    switch(data['type']){
        // 服务端ping客户端
        case 'response':
            console.log(data['msg']);
            //alert('done');
            break;
        case 'ping':
            ws.send('{"type":"pong"}');
            break;;
        // 登录 更新用户列表
        case 'login':
            //{"type":"login","client_id":xxx,"client_name":"xxx","client_list":"[...]","time":"xxx"}
            say(data['client_id'], data['client_name'],  data['client_name']+' 加入了聊天室', data['time']);
            if(data['client_list'])
            {
                client_list = data['client_list'];
            }
            else
            {
                client_list[data['client_id']] = data['client_name']; 
            }
            flush_client_list();
            console.log(data['client_name']+"登录成功");
            break;
        // 发言
        case 'say':
            //{"type":"say","from_client_id":xxx,"to_client_id":"all/client_id","content":"xxx","time":"xxx"}
            say(data['from_client_id'], data['from_client_name'], data['content'], data['time']);
            break;
        // 用户退出 更新用户列表
        case 'logout':
            //{"type":"logout","client_id":xxx,"time":"xxx"}
            say(data['from_client_id'], data['from_client_name'], data['from_client_name']+' 退出了', data['time']);
            delete client_list[data['from_client_id']];
            flush_client_list();
    }
}

$(function(){
    connect();
});

</script>
@endsection
