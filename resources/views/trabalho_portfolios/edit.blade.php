@extends('layouts.app')

@section('css')
    <link href="/css/summernote.css" rel="stylesheet">

    <style type="text/css" media="screen">
        .nav-tabs-custom {
            min-height:700px;
        }
        .container-portfolio {
            padding:25px;
            max-height:800px;
            overflow:auto;
        }

        li.list-group-item {
            display: -webkit-box;
        }

        .descricao-container {
            background-color:#424242;
            display:block;
        }

        .tag {
            color: white;
            font-weight:bold;
            margin-right:10px;
        }
    </style>
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Trabalho Portfolio
        </h1>
    </section>
    <div class="content">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Infos Gerais</a></li>
                <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Conteudo</a></li>
                <li class="pull-right"> <a href="{!! route('trabalhoPortfolios.index') !!}" class="btn btn-primary"> 
                        <i class="fa fa-angle-left"></i> Voltar</a>
                </li>
                <li class="pull-right"> <a target="_blank" href="/portfolio/{{$trabalhoPortfolio->slug}}" class="btn btn-primary"> 
                        <i class="fa fa-eye"></i> Ver pagina do Trabalho</a>
                </li>
            </ul>
            <div class="tab-content">
                @include('adminlte-templates::common.errors')
                @include('flash::message')
                
                <div class="tab-pane active" id="tab_1">
                    {!! Form::model($trabalhoPortfolio, ['route' => ['trabalhoPortfolios.update', $trabalhoPortfolio->id], 'method' => 'patch']) !!}

                    @include('trabalho_portfolios.fields',[
                        'editing' => true
                    ])

                    {!! Form::close() !!}
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                    <div class="container-portfolio">
                        <ul class="list-group">
                            @foreach ($trabalhoPortfolio->blocosConteudo as $bloco)
                                <li class="list-group-item">
                                    <div class="col-xs-9 text-center behances-container">
                                        {!! $bloco->html !!}            
                                    </div>
                                    <div class="col-xs-3">
                                        {!! Form::open(['route' => ['blocoBehances.destroy', $bloco->id], 'method' => 'delete']) !!}
                                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
                                            'type' => 'submit',
                                            'class' => 'btn btn-danger btn-xs',
                                            'onclick' => "return confirm('Tem certeza?')"
                                        ]) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
    </div>
@endsection

@section('js')
    <script src="/js/summernote.js"></script>
    <script charset="utf-8">
    $('.summernote').summernote({ 
         minHeight: 200,
         fontSizes: ['12', '14', '18', '19', '20', '21','22','23','24','25', '28', '36', '48'],
         toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['format', ['style']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'paragraph']],
            ['height', ['height']],
            ['misc', ['fullscreen', 'undo', 'redo']]
          ]
         
    });
    </script>
@endsection
