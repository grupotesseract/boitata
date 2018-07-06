<!-- Titulo Field -->
<div class="form-group col-sm-4">
    {!! Form::label('titulo', 'Titulo:') !!}
    {!! Form::text('titulo', null, ['class' => 'form-control']) !!}
</div>

<!-- Url Field -->
<div class="form-group col-sm-4">
    {!! Form::label('url', 'Link do behance:') !!}
    {!! Form::text('url', null, ['class' => 'form-control']) !!}
</div>

<!-- Categorias Field -->
<div class="form-group col-sm-4">
@if (isset($editing))
    @include('categorias.select', [
        'selecionadas' => $editorial->categorias->pluck('id')
    ])
@else
    @include('categorias.select')
@endif
</div>

<div class="form-group col-sm-12 col-lg-12">
    @if ( isset($owner_id) )
        {!! Form::hidden('owner_id', $owner_id) !!}
    @endif
    @if ( isset($owner_type) )
        {!! Form::hidden('owner_type', $owner_type) !!}
    @endif
</div>

<div class="form-group col-sm-6">
    {!! Form::label('ordem', 'Ordem de aparicao:') !!}
    {!! Form::select('ordem', [1 => 'primeiro', 2 => 'segundo'], null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('file', 'Imagem:') !!}
    {!! Form::file('file') !!}
</div>

{{--
<div class="form-group col-sm-12">
    @include('dropzone.upload', [
        'formUrl' => 'fotos/create'
    ])
</div>
--}}

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('editorials.index') !!}" class="btn btn-default">Cancelar</a>
</div>


