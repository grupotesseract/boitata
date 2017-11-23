
{{ Form::label('categorias', 'Categorias') }}
{{ Form::select('categorias[]', 
    \App\Models\Categoria::all()->pluck('nome', 'id'),  
    [], 
    ['multiple' => 'multiple', 'class'=>'form-control select2' ]
)}}
