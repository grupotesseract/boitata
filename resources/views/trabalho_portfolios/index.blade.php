@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Trabalhos no portfólio do Behance
           -  </h1>
        {!! Form::open(['route' => ['trabalhoPortfolios.resync']]) !!}
            {!! Form::button('<i class="fa fa-recycle"></i> atualizar todos', [
                'type' => 'submit',
                'class' => 'btn btn-warning btn-xs',
                'onclick' => "return confirm('Tem certeza? Isso ira deletar  todos os projetos atuais e inseri-los novamente a partir do Behance.')"
            ]) !!}
        {!! Form::close() !!}
        {!! Form::open(['route' => ['trabalhoPortfolios.getNovos']]) !!}
            {!! Form::button('<i class="fa fa-plus"></i> obter novos', [
                'type' => 'submit',
                'class' => 'btn btn-success btn-xs',
                'onclick' => "return confirm('Deseja buscar por novos projetos no Behance?')"
            ]) !!}
        {!! Form::close() !!}
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

