@extends('layouts.app')

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
                   {!! Form::model($editorial, ['route' => ['editorials.update', $editorial->id], 'method' => 'patch']) !!}

                        @include('editorials.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection