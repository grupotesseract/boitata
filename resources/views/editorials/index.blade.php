@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<script src="{{ asset('js/app.js') }}"></script>
<style>
#secao-editorial div.container-editorial {
    margin-top: 2em 0;
}
#secao-editorial {
    min-height: 770px;
    min-height: 770px;
}
#secao-editorial div.container-editorial {
    margin: 2em 0;
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
        <h1 class="pull-left">Seção Editorial</h1>
        @if (!\App\Models\Editorial::count())
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('editorials.create') !!}">Adicionar</a>
        @endif
        
    </section>
    <div class="content" style="min-height:800px">
        <div class="clearfix"></div>
        @include('flash::message')
        <div class="row">
        @if (!\App\Models\Editorial::count())
        @else
            @include('editorials.view_editorial')
        @endif
        </div>
        <div class="clearfix"></div>
    </div>
@endsection

