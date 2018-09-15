<!-- Descricao Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('descricao', 'Descrição:') !!}
    {!! Form::text('descricao', null, ['class' => 'form-control']) !!}
</div>

<!-- Url Field -->
<div class="form-group col-sm-4">
    {!! Form::label('url', 'Link do youtube:') !!}
    {!! Form::text('url', null, ['class' => 'form-control']) !!}
</div>

<!-- Categorias Field -->
<div class="form-group col-sm-8">
@if (isset($editing))
    @include('categorias.select', [
        'selecionadas' => $motion->categorias->pluck('id')
    ])
@else
    @include('categorias.select')
@endif
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('motions.index') !!}" class="btn btn-default">Cancelar</a>
</div>
