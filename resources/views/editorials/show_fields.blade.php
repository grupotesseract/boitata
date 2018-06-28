<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $editorial->id !!}</p>
</div>

<!-- Titulo Field -->
<div class="form-group">
    {!! Form::label('titulo', 'Titulo:') !!}
    <p>{!! $editorial->titulo !!}</p>
</div>

<!-- Ordem Field -->
<div class="form-group">
    {!! Form::label('ordem', 'Ordem:') !!}
    <p>{!! $editorial->ordem !!}</p>
</div>

<!-- Url Field -->
<div class="form-group">
    {!! Form::label('url', 'Url:') !!}
    <p>{!! $editorial->url !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $editorial->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $editorial->updated_at !!}</p>
</div>

