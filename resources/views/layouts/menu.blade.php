<li class="{{ Request::is('trabalhoRecentes*') ? 'active' : '' }}">
    <a href="{!! route('trabalhoRecentes.index') !!}"><i class="fa fa-eye"></i><span>Trabalhos Recentes</span></a>
</li>

<li class="{{ Request::is('categorias*') ? 'active' : '' }}">
    <a href="{!! route('categorias.index') !!}"><i class="fa fa-asterisk"></i><span>Categorias</span></a>
</li>

<li class="{{ Request::is('motions*') ? 'active' : '' }}">
    <a href="{!! route('motions.index') !!}"><i class="fa fa-play"></i><span>Motion</span></a>
</li>

<li class="{{ Request::is('editorials*') ? 'active' : '' }}">
    <a href="{!! route('editorials.index') !!}"><i class="fa fa-book"></i><span>Editorial</span></a>
</li>

<li class="{{ Request::is('trabalhoPortfolios*') ? 'active' : '' }}">
    <a href="{!! route('trabalhoPortfolios.index') !!}"><i class="fa fa-behance"></i><span>Portfólio</span></a>
</li>

{{--
<li class="{{ Request::is('blocoBehances*') ? 'active' : '' }}">
    <a href="{!! route('blocoBehances.index') !!}"><i class="fa fa-edit"></i><span>Bloco Behances</span></a>
</li>
--}}

