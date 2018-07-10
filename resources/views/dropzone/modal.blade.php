@extends('layouts.partials.modal')

@section('modal-id', $modal_id)

@section('modal-title', 'Insira as imagens abaixo')

@section('modal-body')


<div class="container-area-upload">
    {!! Form::open(['url' => $formUrl, 'id' => 'dropzone-container', 'class'=>"dropzone"]) !!}
        
        <!-- Campos hidden identificando a relação -->
        <div class="form-group col-sm-12 col-lg-12">
            {!! Form::hidden('owner_id', isset($owner_id) ? $owner_id : '') !!}
            {!! Form::hidden('owner_type', isset($owner_type) ? $owner_type : '') !!}
        </div>

        <div class="fallback">
            <input name="file" type="file" multiple />
        </div>
    {!! Form::close() !!}
</div>


@endsection

@section('scripts')
@endsection


