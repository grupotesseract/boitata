@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Motion
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($motion, ['route' => ['motions.update', $motion->id], 'method' => 'patch']) !!}

                        @include('motions.fields',[
                            'editing' => true
                        ])

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
