
<section id="secao-portfolio">

    <div class="borda-top"></div>

    <div class="container-portfolio container">
        <div class="row">
            <div class="col-xs-12 col-md-4"></div>
            <div class="col-xs-12 col-md-4 container-texto text-center">
                <h3>portfolio</h3>
            </div>
            <div class="col-xs-12 col-md-4">&nbsp;</div>
        </div>
        <style>
        </style>
        <ul class="grid effect-3" id="grid">
            @foreach($trabalhos as $trabalho)
            <li>
                <a href="/portfolio/{{ $trabalho->id }}">
                        <div class="img-portfolio" style="background-image: url('{{ $trabalho->URLCapa }}')">
                            <div class="titulo">
                                <h4>{{ $trabalho->titulo }}</h4>
                            </div>
                        </div>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</section>
