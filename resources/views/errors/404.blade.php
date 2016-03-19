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
                    <h1 class="text-align-center">404</h1>
                </div>
                <div class="col-md-7">
                    <div class="description">
                        <h3>Opps, it seems that this page does not exist here.</h3>
                        <p>If you are sure it should, search for it.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
