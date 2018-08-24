@extends ('master')

@section ('content')
<section id="secao-portfolio">
    <div class="borda-top"></div>

    <div class="container-portfolio container">
        <div class="row text-right">
            <div class="col-xs-3">&nbsp;</div>
            <div class="col-xs-9 text-center">
                <div class="container-btn-voltar">
                    <a href="/portfolio" class="voltar">Voltar <i class="fa fa-arrow-left"></i></a>
                </div>
            </div>
        </div>
        <div class="col-xs-3 descricao-container">
            <h1>{{ $trabalho->titulo }}</h1>

            @foreach($trabalho->categorias as $categoria) 
                <span class="tag">{{$categoria->nome}}</span>
            @endforeach

            <p> {!! $trabalho->descricao !!} </p>

        </div>
        <div class="col-xs-9 text-center behances-container">
            {!! $trabalho->htmlCompleto !!}            
        </div>

    </div>
</section>
@endsection
