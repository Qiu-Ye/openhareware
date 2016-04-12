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
@endsection
