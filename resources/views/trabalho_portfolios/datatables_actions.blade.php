<div class='btn-group'>
    <a href="{{ route('trabalhoPortfolios.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
</div>
<div class='btn-group'>
{!! Form::open(['route' => ['trabalhoPortfolios.destroy', $id], 'method' => 'delete']) !!}
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
{!! Form::close() !!}
</div>
<div class='btn-group'>
{!! Form::open(['route' => ['trabalhoPortfolios.atualizar', $id], 'method' => 'post']) !!}
    {!! Form::button('<i class="fa fa-behance"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-warning btn-xs',
        'onclick' => "return confirm('Atualizar o conteudo desse projeto a partir do Behance?')"
    ]) !!}
{!! Form::close() !!}
</div>
