@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="/css/dropzone.css" type="text/css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="/css/admin.css" type="text/css" media="screen" title="no title" charset="utf-8">

@endsection

@section('content')
    <section class="content-header">
        <h1>
            Editorial
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'editorials.store', 'files'=>true]) !!}

                        @include('editorials.fields', [
                            'ordem' => 1
                        ])

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
