@extends('workspace.master')

@section('workcontent')
    <div class="row">
        <div class="col-md-12">
            <h2 class="page-title">新增设备 <small>设备信息</small></h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-7 col-md-offset-1">
            <section class="widget">
            <header>
                <h4>
                    <i class="eicon-window"></i>
                   Microduino设备 
                    <small>详细信息</small>
                </h4>
            </header>
            <div class="body">
                <form class="form-horizontal form-condensed" action='{{ url("device") }}' method="POST">
                {!! csrf_field() !!}
                <div id="wizard" class="form-wizard">
                    <ul class="wizard-navigation nav-justified">
                        <li><a href="#tab1" data-toggle="tab"><small>1.</small><strong>设备描述</strong></a></li>
                        <li><a href="#tab2" data-toggle="tab"><small>2.</small> <strong>功能注册</strong></a></li>
                        <li><a href="#tab3" data-toggle="tab"><small>3.</small> <strong>Token发放</strong></a></li>
                        <li><a href="#tab4" data-toggle="tab"><small>4.</small> <strong>注册成功</strong></a></li>
                    </ul>
                    <div id="bar" class="progress progress-small">
                        <div class="progress-bar progress-bar-inverse"></div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane" id="tab1">
                                <fieldset>
                                    <div class="control-group">
                                        <!-- Devicename -->
                                        <label class="control-label"  for="device_name">设备名称</label>
                                        <div class="controls form-group">
                                            <div class="col-md-10">
                                                <input type="text" id="devicename" name="device_name" placeholder="设备名称" class="form-control">
                                                <span class="help-block">设备名用于识别设备,可包含数字、字母、中文</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <!-- device_desc -->
                                        <label class="control-label"  for="device_desc">设备描述</label>
                                        <div class="controls form-group">
                                            <div class="col-md-10">
                                                <textarea rows="4" class="form-control" id="device_desc" name="device_desc"  placeholder="设备描述"></textarea>
                                                <span class="help-block">请输入关于这个设备的基本描述,用于设备展示</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <!-- device_id -->
                                        <label class="control-label"  for="device_id">设备ID</label>
                                        <div class="controls form-group">
                                            <div class="col-md-10">
                                                <input type="text" id="device_id" name="device_id" placeholder="设备id" class="form-control">
                                                <span class="help-block">请输入设备识别的id,仅能使用数字和字母</span>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                        </div>
                        <div class="tab-pane" id="tab2">
                                <fieldset>
                                    <legend>函数信息</legend>
                                    <div class="control-group">
                                    <label for="function[1]function_name" class="control-label">函数名</label>
                                    <div class="controls form-group">
                                            <div class="col-md-10">
                                                <input type="text" id="function[1]function_name" name="function[1]function_name" placeholder="函数名" class="form-control">
                                                <span class="help-block">函数名用于识别设备函数,可包含数字、字母、中文</span>
                                            </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label"  for="function[1]function_id">函数ID</label>
                                        <div class="controls form-group">
                                            <div class="col-md-10">
                                                <input type="text" id="function[1]function_id" name="function[1]function_id" placeholder="函数id" class="form-control">
                                                <span class="help-block">请输入设备中函数识别的id,仅能使用数字和字母</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label"  for="function[1]param[1]param_id">参数ID</label>
                                        <div class="controls form-group">
                                            <div class="col-md-10">
                                                <div class="input-group" style="margin-bottom:10px">
                                                    <input type="text" id="function[1]param[1]param_id" name="function[1]param[1]param_id" placeholder="参数id" class="form-control">
                                                    <div class="input-group-btn">
                                                         <select id="function[1]param[1]param_type" class="selectpicker" data-style="btn-success" name="function[1]param[1]param_type">
                                                            <option value="bool">布尔型</option>
                                                            <option value="int">数值型</option>
                                                            <option value="string">字符串</option>
                                                         </select>
                                                         <button type="button" class="btn btn-warning add-function-param" data-funNo="1"><i class="fa fa-plus"></i></button>
                                                    </div>
                                                </div>
                                                <span class="help-block">请输入函数中参数的id和参数类型,仅能使用数字和字母</span>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                            <div class="add_fun" style="height:20px">
                                <button id="addFuncition" type="button" class="btn btn-default btn-xs pull-right">
                                    <i class="fa fa-plus"></i>
                                    新增函数
                                </button>
                            </div>

                        </div>
                        <div class="tab-pane" id="tab3">
                                <fieldset>
                                    <div class="control-group">
                                        <label class="control-label"  for="token">设备Token</label>
                                        <div class="controls form-group">
                                            <div class="col-md-10">
                                                <div class="input-group">
                                                    <input type="text" id="token" name="token" placeholder="暂无token" disabled="disabled" class="form-control">
                                                    <div class="input-group-btn">
                                                         <button type="button" class="btn btn-warning add-function-param" data-funNo="1"><i class="fa fa-plus"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <span class="help-block pull-left">请记住设备Token,用于设备连接到平台</span>
                                        </div>
                                    </div>
                                </fieldset>
                        </div>
                        <div class="tab-pane" id="tab4">
                            <h2>注册信息填完!</h2>
                            <p>设备信息检验通过,点击提交完成设备信息注册</p>
                        </div>
                        <div class="description">
                            <ul class="pager wizard">
                                <li class="previous">
                                    <button class="btn btn-primary pull-left" onclick ="return false;"><i class="fa fa-caret-left"></i> 上一步</button>
                                </li>
                                <li class="next">
                                    <button class="btn btn-primary pull-right" onclick ="return false;">下一步 <i class="fa fa-caret-right"></i></button>
                                </li>
                                <li class="finish" style="display: none">
                                    <button class="btn btn-success pull-right" type="submit" >提交 <i class="fa fa-check"></i></button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            </section>
        </div>
    </div>
</div>
@endsection

@section('pagescript')
<!-- page jquery plugins -->
<script src="{{ asset('lib/jquery/jquery.bootstrap.wizard.js') }}"></script>
<script src="{{ asset('lib/jquery/jquery.maskedinput.js') }}"></script>
<script src="{{ asset('lib/bootstrap-select/bootstrap-select.js') }}"></script>

<script src="{{ asset('scripts/wizard.js') }}"></script>
@endsection
