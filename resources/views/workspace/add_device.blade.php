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
                            <form class="form-horizontal form-condensed" action='' method="POST">
                                <fieldset>
                                    <div class="control-group">
                                        <!-- Devicename -->
                                        <label class="control-label"  for="devicename">设备名称</label>
                                        <div class="controls form-group">
                                            <div class="col-md-10">
                                                <input type="text" id="devicename" name="devicename" placeholder="设备名称" class="form-control">
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
                            </form>
                        </div>
                        <div class="tab-pane" id="tab2">
                            <form class="form-horizontal form-condensed" action='' method="POST">
                                <fieldset>
                                    <div class="control-group">
                                    <label for="function_name" class="control-label">函数名</label>
                                    <div class="controls form-group">
                                            <div class="col-md-10">
                                                <input type="text" id="function_name" name="function_name" placeholder="函数名" class="form-control">
                                                <span class="help-block">函数名用于识别设备函数,可包含数字、字母、中文</span>
                                            </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label"  for="function_id">函数ID</label>
                                        <div class="controls form-group">
                                            <div class="col-md-10">
                                                <input type="text" id="function_id" name="function_id" placeholder="函数id" class="form-control">
                                                <span class="help-block">请输入设备中函数识别的id,仅能使用数字和字母</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label"  for="function_id">参数ID</label>
                                        <div class="controls form-group">
                                            <div class="col-md-10">
                                                <input type="text" id="function_id" name="function_id" placeholder="参数id" class="form-control">
                                                <span class="help-block">请输入函数中参数的id,仅能使用数字和字母</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row control-group">
                                        <label for="courier" class="control-label">选择参数类型</label>
                                        <div class="controls form-group">
                                            <div class="col-md-10"><select id="courier" data-placeholder="请选择函数参数类型" class="select-block-level chzn-select">
                                                <option value=""></option>
                                                <option value="bool">布尔型</option>
                                                <option value="int">数值型</option>
                                                <option value="string">字符串</option>
                                            </select>
                                            <span class="help-block pull-left">请选择函数参数类型,将会影响设备操控形式和调用检验</span></div>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                        <div class="tab-pane" id="tab3">
                            <form class="form-horizontal" action='' method="POST">
                                <fieldset>
                                    <div class="control-group">
                                        <label class="control-label"  for="name">Name on the Card</label>
                                        <div class="controls form-group">
                                            <div class="col-md-10"><input type="text" id="name" name="name" placeholder="" class="form-control"></div>
                                        </div>
                                    </div>
                                    <div class="form-row control-group">
                                        <label for="credit-card-type" class="control-label">Credit Card Type</label>
                                        <div class="controls form-group">
                                            <div class="col-md-10"><select id="credit-card-type" data-placeholder="Please select.." class="chzn-select select-block-level">
                                                <option value=""></option>
                                                <option value="Visa">Visa</option>
                                                <option value="Mastercard">Mastercard</option>
                                                <option value="Other">Other</option>
                                            </select></div>
                                        </div>
                                    </div>
                                    <div class="form-row control-group ">
                                        <label class="control-label" for="credit">Credit Card Number </label>
                                        <div class="controls form-group">
                                            <div class="col-md-10"><input id="credit" type="text" tabindex="3" class="form-control"></div>
                                        </div>
                                    </div>
                                    <div class="form-row control-group">
                                        <label for="expiration-date" class="control-label">Expiration Date</label>
                                        <div class="controls form-group">
                                            <div class="col-md-10"><input type="text" id="expiration-date"  class="form-control"></div>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                        <div class="tab-pane" id="tab4">
                            <h2>Thank you!</h2>
                            <p>Your submission has been received.</p>
                        </div>
                        <div class="description">
                            <ul class="pager wizard">
                                <li class="previous">
                                    <button class="btn btn-primary pull-left"><i class="fa fa-caret-left"></i> Previous</button>
                                </li>
                                <li class="next">
                                    <button class="btn btn-primary pull-right" >Next <i class="fa fa-caret-right"></i></button>
                                </li>
                                <li class="finish" style="display: none">
                                    <button class="btn btn-success pull-right" >Finish <i class="fa fa-check"></i></button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            </section>
        </div>
    </div>
</div>
@endsection

@section('pagescript')
<!-- page jquery plugins -->
<script src="{{ asset('lib/select2.js') }}"></script>
<script src="{{ asset('lib/jquery/jquery.bootstrap.wizard.js') }}"></script>
<script src="{{ asset('lib/jquery/jquery.maskedinput.js') }}"></script>
<script src="{{ asset('lib/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('lib/bootstrap-select/bootstrap-select.js') }}"></script>

<script src="{{ asset('scripts/wizard.js') }}"></script>
@endsection
