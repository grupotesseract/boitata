
<section id="secao-editorial">

    <div class="borda-top"></div>

    <div class="container-editorial">
        <div class="col-xs-12 col-md-2"></div>
        <div class="col-xs-12 col-md-2 container-texto">
            <h3>editorial</h3>
        </div>
        <div class="col-xs-12 col-md-3">
            <div class="container-item-editorial text-center">
                <a href="{{ $primeiroEditorial->url }}" target="_blank">
                    <img src="{{ $primeiroEditorial->linkFoto }}" alt="{{ $primeiroEditorial->titulo }}" >
                    <h4>{{ $primeiroEditorial->titulo }}</h4>
                </a>
            </div>
        </div>
        <div class="col-xs-12 col-md-3">
            <div class="container-item-editorial text-center">
                <a href="{{ $segundoEditorial->url }}" target="_blank">
                    <img src="{{ $segundoEditorial->linkFoto }}" alt="{{ $segundoEditorial->titulo }}" >
                    <h4>{{ $segundoEditorial->titulo }}</h4>
                </a>
            </div>
        </div>
        <div id="fix-altura-mobile" class="col-xs-12 col-md-2"></div>
        
</div>

</section>
