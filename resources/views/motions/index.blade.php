@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<script src="{{ asset('js/app.js') }}"></script>
<style type="text/css" media="screen">
#secao-motion {
    margin-top: 2em;
    min-height: 770px;
}

#secao-motion .borda-top {
    background-position: 5% 65%;
    background-size: cover!important;
}

footer {
    min-height:60px;
    position: absolute;
    bottom : 0;
}

</style>
@endsection


@section('content')
    <section class="content-header">
        <h1 class="pull-left">Seção Motion</h1>
        @if (!\App\Models\Motion::count())
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('editorials.create') !!}">Adicionar</a>
        @endif
    </section>
    <div class="content" style="min-height:800px">
        <div class="clearfix"></div>
        @include('flash::message')
        <div class="row">
        @if (!\App\Models\Motion::count())
        @else
            @include('motions.view_motion')
        @endif
        </div>
        <div class="clearfix"></div>
    </div>
@endsection

