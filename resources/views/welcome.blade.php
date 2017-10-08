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

        @include ('menu-principal')
        @include ('home.video')
        @include ('home.trabalhos_recentes')
        @include ('home.motion')
        @include ('home.editorial')

    </body>
</html>
