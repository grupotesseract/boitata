@extends ('master')

@section ('content')
<section id="secao-portfolio">
    <div class="borda-top"></div>

    <div class="container-portfolio container">
        <a href="/portfolio">Voltar</a>
        {!! $trabalho->html_completo !!}
    </div>
</section>
@endsection
