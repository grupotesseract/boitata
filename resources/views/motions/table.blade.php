<table class="table table-responsive" id="motions-table">
    <thead>
        <tr>
            <th>Descricao</th>
        <th>Url</th>
        <th>Ativo</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($motions as $motion)
        <tr>
            <td>{!! $motion->descricao !!}</td>
            <td>{!! $motion->url !!}</td>
            <td>{!! $motion->ativo !!}</td>
            <td>
                {!! Form::open(['route' => ['motions.destroy', $motion->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('motions.show', [$motion->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('motions.edit', [$motion->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>