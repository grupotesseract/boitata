@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Foto
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($foto, ['route' => ['fotos.update', $foto->id], 'method' => 'patch']) !!}

                        @include('fotos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection