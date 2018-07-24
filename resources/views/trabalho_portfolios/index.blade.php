@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Trabalhos no portfólio do Behance</h1>
        <div class="col-xs-3 pull-right text-right">
{!! Form::open(['route' => ['trabalhoPortfolios.resync']]) !!}
    {!! Form::button('<i class="fa fa-recycle"></i> Re-syncronizar', [
        'type' => 'submit',
        'class' => 'btn btn-warning',
        'onclick' => "return confirm('Tem certeza? Vai re-sincronizar e todas as alterações serao descartadas')"
    ]) !!}
{!! Form::close() !!}
            
        </div>
        
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body" style="overflow:auto;">
                    @include('trabalho_portfolios.table')
            </div>
        </div>
    </div>
@endsection

