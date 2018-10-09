<!-- Titulo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('titulo', 'Titulo:') !!}
    {!! Form::text('titulo', null, ['class' => 'form-control']) !!}
</div>

<!-- Categorias Field -->
<div class="form-group col-sm-6">
@if (isset($editing))
    @include('categorias.select', [
        'selecionadas' => $trabalhoPortfolio->categorias->pluck('id')
    ])
@else
    @include('categorias.select')
@endif
</div>

<!-- Url Behance Field -->
<div class="form-group col-sm-12">
    {!! Form::label('url_behance', 'Url Behance:') !!}
    {!! Form::text('url_behance', null, ['class' => 'form-control']) !!}
</div>

<!-- Url Amigavel Field -->
<div class="form-group col-sm-12">
    {!! Form::label('slug', 'Url Amigavel (a que vai aparecer na barra após /portfolio/):') !!}
    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div>

<!-- Descricao Field -->
<div class="form-group col-sm-12">
    {!! Form::label('descricao', 'Descricao:') !!}
    {!! Form::textarea('descricao', null, ['class' => 'form-control summernote' ]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('trabalhoPortfolios.index') !!}" class="btn btn-default">Cancelar</a>
</div>
