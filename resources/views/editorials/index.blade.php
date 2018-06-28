@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<script src="{{ asset('js/app.js') }}"></script>
@endsection

@section('content')
    <section class="content-header">
        <h1>Seção Editorial</h1>
    </section>
    <div class="content" style="min-height:800px">
        @include('flash::message')
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="col-xs-12">
                    @include('editorials.view_editorial')
                </div>
            </div>
        </div>
    </div>
@endsection

