@extends('layout.layout');

@section('title', '404')

@section('header')
    <link href="{{ asset('css/application.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="single-widget-container error-page">
    <section class="widget transparent widget-404">
        <div class="body">
            <div class="row">
                <div class="col-md-5">
                    <h1 class="text-align-center">403</h1>
                </div>
                <div class="col-md-7">
                    <div class="description">
                        <h3>你没有访问该页面的权限,请勿尝试</h3>
                        <p>请确定你要找的网页地址</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
