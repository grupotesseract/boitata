@if ( isset($motion) && $motion )
<section id="secao-motion">
    <div class="borda-top"></div>
    <h3>motion</h3>
    <div id="container-youtube-motion" class="col-xs-12 col-md-8 text-right">
        <iframe height="400" src="{{ $motion->url }}" frameborder="0" allowfullscreen></iframe>
    </div>
    <div id="container-texto-motion" class="col-xs-12 col-md-4 text-left">
        <h4>{{ $motion->descricao }}</h4>
        @foreach ($motion->categorias as $Categoria)
            <p class="tags">{{$Categoria->nome}}</p>
        @endforeach
    </div>
    <a class="btn btn-default" href="/motions/{{$motion->id}}/edit">
        <i class="fa fa-pencil"></i> Trocar
    </a>
</section>
@endif
