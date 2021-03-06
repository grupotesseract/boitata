<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Boitatá - Design & Projetos - Ideias que tomam forma</title>

        <meta name="description" content="Você tem uma ideia e não sabe por onde começar? Vem falar com a gente.  Consultoria - Criação de marca - Cartão de visitas e papelaria em geral - Ilustração - Motion - Site - Aplicativos - Instalações.">
        <link rel="canonical" href="https://coletivoboitata.com.br" />

        <meta name="keywords" content="Design,Bauru,Illustração,WebDesign,Posters,Motion,Editorial,Identidade visual,Teaser,Projetos">

        <meta property="og:type" content="website" />
        <meta property="og:title" content="Boitatá - Design & Projetos - Ideias que tomam forma"/>
        <meta property="og:image" content="https://coletivoboitata.com.br/og_image_boitata.jpeg"/>
        <meta property="og:image:type" content="image/jpeg">
        <meta property="og:image:width" content="800">
        <meta property="og:image:height" content="410">
        <meta property="og:url" content="https://coletivoboitata.com.br"/>
        <meta property="og:description" content="Você tem uma ideia e não sabe por onde começar? Vem falar com a gente.  Consultoria - Criação de marca - Cartão de visitas e papelaria em geral - Ilustração - Motion - Site - Aplicativos - Instalações."/>

        <link rel="shortcut icon" href="/favicon.ico">
        <link rel="icon" sizes="16x16 32x32 64x64" href="/favicon.ico">
        <link rel="icon" type="image/png" sizes="196x196" href="/favicon-192.png">
        <link rel="icon" type="image/png" sizes="160x160" href="/favicon-160.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96.png">
        <link rel="icon" type="image/png" sizes="64x64" href="/favicon-64.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16.png">
        <link rel="apple-touch-icon" href="/favicon-57.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/favicon-114.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/favicon-72.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/favicon-144.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/favicon-60.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/favicon-120.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/favicon-76.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/favicon-152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/favicon-180.png">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/favicon-144.png">
        <meta name="msapplication-config" content="/browserconfig.xml">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}?v={{time()}}">
        <script src="{{ asset('js/app.js') }}?v={{time()}}"></script>

        <script src="//code.jivosite.com/widget.js" data-jv-id="S4XDgWdKhk" async></script>

        @yield('css')
    </head>

    <body>
        @if (env('APP_ENV') === 'production')
            @include('googletagmanager::script')

        @endif

        @include('menu-principal')

        @yield('content')

        @include('footer')

        @if (env('APP_ENV') === 'local')
            <script src="http://localhost:3000/browser-sync/browser-sync-client.js?v=2.26.0"></script>
        @endif

        @yield('js')
    </body>
</html>
