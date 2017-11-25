<li class="{{ Request::is('trabalhoRecentes*') ? 'active' : '' }}">
    <a href="{!! route('trabalhoRecentes.index') !!}"><i class="fa fa-eye"></i><span>Trabalhos Recentes</span></a>
</li>

<li class="{{ Request::is('categorias*') ? 'active' : '' }}">
    <a href="{!! route('categorias.index') !!}"><i class="fa fa-asterisk"></i><span>Categorias</span></a>
</li>

<li class="{{ Request::is('motions*') ? 'active' : '' }}">
    <a href="{!! route('motions.index') !!}"><i class="fa fa-play"></i><span>Motions</span></a>
</li>
