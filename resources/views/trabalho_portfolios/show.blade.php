@extends('layouts.app')

@section('css')
<style type="text/css" media="screen">
    .container-portfolio {
        background-color:#010302;
        display: -webkit-box;
    }

    .container-descricao {
        background-color:#424242;
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
                        <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Preview</a></li>
                        <li class="pull-right"> <a href="{!! route('trabalhoPortfolios.index') !!}" class="btn btn-primary"> 
                                <i class="fa fa-angle-left"></i> Voltar</a> </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            @include('trabalho_portfolios.show_fields')
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_2">
                            <div class="container-portfolio">
                                <div class="col-xs-3 descricao-container">
                                    <h1>{{ $trabalhoPortfolio->titulo }}</h1>

                                    <p> {{ $trabalhoPortfolio->descricao }} </p>
                                </div>
                                <div class="col-xs-9 text-center behances-container">
                                    {!! $trabalhoPortfolio->htmlCompleto !!}            
                                </div>
                            </div>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
            </div>
@endsection
