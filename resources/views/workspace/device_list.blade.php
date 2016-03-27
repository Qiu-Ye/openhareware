@extends('workspace.master')

@section('workcontent')
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-title">设备列表<small> 你所拥有的设备信息</small></h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <section class="widget">
                    <header>
                        <h4>
                            <i class="fa fa-list-ol"></i>
                            设备详情列表
                        </h4>
                    </header>
                    <div class="body">
                        <blockquote>
                            这里展示了所有你注册到平台上的设备信息
                        </blockquote>
                        <table id="device_list" class="table table-striped">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Icon</th>
                                <th>中文名称</th>
                                <th>连接ID</th>
                                <th>简介</th>
                                <th>Token</th>
                                <th>创建日期</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($devices as $device)
                            <tr>
                                <td>{{ $device->id }}</td>
                                <td><i class="fa fa-qrcode fa-2x"></i></td>
                                <td><strong>{{ $device->full_name }}</strong></td>
                                <td>{{ $device->name }}</td>
                                <td>{{ $device->desc }}</td>
                                <td>{{ $device->token }}</td>
                                <td class="hidden-phone-landscape">{{ $device->created_at }}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary" onclick="location.href='{{ url("device").'/'.$device->id }}'">
                                        功能调用
                                    </button>
                                    <button class="btn btn-sm btn-warning" data-toggle="model" data-target="#del-device-{{ $device->id }}">
                                        删除设备
                                    </button>
                                </td>
                            </tr>
                                    <div id="del-device-{{ $device->id }}" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="del-device-{{ $device->id }}Label">
                                      <div class="modal-dialog modal-sm" aria-hidden="true">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Modal title</h4>
                                          </div>
                                          <div class="modal-body">
                                            <p>One fine body&hellip;</p>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                            @endforeach
                            </tbody>
                        </table>
                        <div style="float:right;font-weight:bold">
                        {!! $devices->render() !!}
                        </div>
                    </div>
                </section>
            </div>
        </div>
@endsection

@section('pagescript')
<script src="{{ asset('lib/jquery/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('lib/select2.js') }}"></script>

<script src="{{ asset('scripts/tables-dynamic.js') }}"></script>
@endsection
