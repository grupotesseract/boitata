@if ( isset($motion) && $motion )
<section id="secao-motion">
    
    <div class="borda-top"></div>

    <h3>motion</h3>
    <div id="container-youtube-motion" class="col-xs-12 col-md-8 text-right">

        <iframe height="400" src="{{ $motion->url }}" frameborder="0" allowfullscreen></iframe>
    </div>
    <div id="container-texto-motion" class="col-xs-12 col-md-4 text-left">
        <h4>{{ $motion->descricao }}</h4>

     {{-- IGNORANDO ESSA TAG
       <p class="tag-motion">#tag</p>
      --}}

    </div>

</section>
@endif
