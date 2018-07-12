<!-- Titulo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('titulo', 'Titulo:') !!}
    {!! Form::text('titulo', null, ['class' => 'form-control']) !!}
</div>

<!-- Descricao Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descricao', 'Descricao:') !!}
    {!! Form::text('descricao', null, ['class' => 'form-control']) !!}
</div>

<!-- Url Behance Field -->
<div class="form-group col-sm-6">
    {!! Form::label('url_behance', 'Url Behance:') !!}
    {!! Form::text('url_behance', null, ['class' => 'form-control']) !!}
</div>

<!-- Json Behance Field -->
<div class="form-group col-sm-6">
    {!! Form::label('json_behance', 'Json Behance:') !!}
    {!! Form::text('json_behance', null, ['class' => 'form-control']) !!}
</div>

<!-- Covers Field -->
<div class="form-group col-sm-6">
    {!! Form::label('covers', 'Covers:') !!}
    {!! Form::text('covers', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('trabalhoPortfolios.index') !!}" class="btn btn-default">Cancel</a>
</div>
