
{{ Form::label('categorias', 'Categorias') }}
{{ Form::select('categorias[]', 
    \App\Models\Categoria::all()->pluck('nome', 'id'),  
    isset($selecionadas) ? $selecionadas : [], 
    ['multiple' => 'multiple', 'class'=>'form-control select2' ]
)}}
