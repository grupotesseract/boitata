<!-- Titulo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('titulo', 'Titulo:') !!}
    {!! Form::text('titulo', null, ['class' => 'form-control']) !!}
</div>

<!-- Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('url', 'Link do behance:') !!}
    {!! Form::text('url', null, ['class' => 'form-control']) !!}
</div>

<!-- Ordem Field -->
<div class="form-group col-sm-2">
{!! Form::label('ordem', 'Posicinamento') !!} <br>
    {{ Form::radio('ordem', 1) }} Central
<br>
    {{ Form::radio('ordem', 2) }} á Direita
</div>

<!-- Categorias Field -->
<div class="form-group col-sm-6">
    @include('categorias.select')
</div>

<!-- Imagem Field -->
<div class="form-group col-sm-4">
    {!! Form::label('file', 'Upload da imagem:') !!}
    {!! Form::file('file', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('editorials.index') !!}" class="btn btn-default">Cancelar</a>
</div>


