@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Bloco Behance
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'blocoBehances.store']) !!}

                        @include('bloco_behances.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
