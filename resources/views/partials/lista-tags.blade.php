<div id="lista-tags" class="col-xs-12">
    @isset($mostrarTodos)
    <div class="tag">
        <a class="{{\Request::get('categoria') != null ? '' : 'active'}}" href="portfolio"> TODOS </a>
    </div>
    @endisset
    @foreach(\App\Models\Categoria::all() as $categoria)
        <div class="tag">
            <a class="{{\Request::get('categoria') == $categoria->id ? 'active' : '' }}" href="portfolio?categoria={{$categoria->id}}"> {{$categoria->nome}}</a>
        </div>
    @endforeach
</div>
