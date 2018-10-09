@extends('master')

@section('css')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
@endsection

@section('content')
    @include('portfolio.list')
@endsection

@section('js')
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    @if (\Agent::isMobile())
    <script charset="utf-8">
        $('#lista-tags').slick({
          dots: false,
          infinite: false,
          speed: 300,
          slidesToShow: 4,
          centerMode: false,
          variableWidth: true,
          prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-2x fa-caret-left"></i></button>',
          nextArrow: '<button type="button" class="slick-next"><i class="fa fa-2x fa-caret-right"></i></button>',
        });
    </script>
    @endif
@endsection
