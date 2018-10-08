<div id="filtro-tags" class="col-xs-12">
    @isset($mostrarTodos)
        <a href="portfolio"> TODOS </a>
    @endisset
    @foreach(\App\Models\Categoria::all() as $categoria)
        <a href="portfolio?categoria={{$categoria->id}}"> {{$categoria->nome}}</a>
    @endforeach
</div>
