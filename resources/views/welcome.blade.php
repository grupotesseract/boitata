<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Coletivo Boitatá - Design </title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}"></script>

    </head>
    <body>

@include('googletagmanager::script')

        @include ('menu-principal')

        @include ('pagina-inicial.video')
        @include ('pagina-inicial.trabalhos_recentes')
        @include ('pagina-inicial.motion')
        @include ('pagina-inicial.editorial')

        @include ('footer')


    </body>
</html>
