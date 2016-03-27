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
                        <table id="datatable-table" class="table table-striped">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th class="no-sort">Icon</th>
                                <th>Name</th>
                                <th class="no-sort hidden-phone-landscape">Info</th>
                                <th>Description</th>
                                <th class="hidden-phone-landscape">Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td><i class="fa fa-qrcode fa-2x"></i></td>
                                <td><strong>Algerd</strong></td>
                                <td class="hidden-phone-landscape">
                                    <small>
                                        <strong>Type:</strong>
                                        &nbsp; JPEG
                                    </small>
                                    <br>
                                    <small>
                                        <strong>Dimensions:</strong>
                                        &nbsp; 200x150
                                    </small>
                                </td>
                                <td><a href="#">Palo Alto</a></td>
                                <td class="hidden-phone-landscape">June 27, 2013</td>
                            </tr>
                            <tr>
                                <td>19</td>
                                <td><i class="fa fa-volume-down fa-2x"></i></td>
                                <td><strong>Uladz'</strong></td>
                                <td class="hidden-phone-landscape">
                                    <small>
                                        <strong>Type:</strong>
                                        &nbsp; JPEG
                                    </small>
                                    <br>
                                    <small>
                                        <strong>Dimensions:</strong>
                                        &nbsp; 2200x1600
                                    </small>
                                </td>
                                <td><a href="#">Mahileu</a></td>
                                <td class="hidden-phone-landscape">December 7, 2013</td>
                            </tr>
                            </tbody>
                        </table>
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
