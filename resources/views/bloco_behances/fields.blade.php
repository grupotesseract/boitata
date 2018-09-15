<!-- Json Behance Field -->
<div class="form-group col-sm-6">
    {!! Form::label('json_behance', 'Json Behance:') !!}
    {!! Form::text('json_behance', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('blocoBehances.index') !!}" class="btn btn-default">Cancel</a>
</div>
