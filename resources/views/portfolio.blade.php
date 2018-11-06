@extends('master')

@section('css')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
@endsection

@section('content')
    @include('portfolio.list')
@endsection

@section('js')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    @if (\Agent::isMobile())
    <script charset="utf-8">
        $('#lista-tags').slick({
          dots: false,
          infinite: false,
          speed: 300,
          slidesToShow: 4,
          centerMode: false,
          variableWidth: true,
          prevArrow: '<button type="button" class="slick-prev"><img src="/fonts/caret-left-solid.svg"/></button>',
          nextArrow: '<button type="button" class="slick-next"><img src="/fonts/caret-right-solid.svg"/></button>',
        });
    </script>
    @endif
@endsection
