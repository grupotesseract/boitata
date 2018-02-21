<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Coletivo Boitatá - Design & Projetos</title>

        <meta name="description" content="">
        <link rel="canonical" href="https://coletivoboitata.com.br" />

        <meta property="og:title" content="Coletivo Boitatá - Design & Projetos"/>
        <meta property="og:image" content="https://coletivoboitata.com.br/og_image_boitata.png"/>
        <meta property="og:url" content="https://coletivoboitata.com.br"/>
        <meta property="og:description" content=""/>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}"></script>

    </head>
    <body>

        @include ('googletagmanager::script')

        @include ('menu-principal')

        @include ('pagina-inicial.video')
        @include ('pagina-inicial.trabalhos_recentes')
        @include ('pagina-inicial.motion')
        @include ('pagina-inicial.editorial')

        @include ('footer')


    </body>
</html>
