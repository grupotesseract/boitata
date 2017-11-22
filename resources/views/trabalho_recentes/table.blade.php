<table class="table table-responsive" id="trabalhoRecentes-table">
    <thead>
        <th>Titulo</th>
        <th>Ordem</th>
        <th>Url</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($trabalhoRecentes as $trabalhoRecente)
        <tr>
            <td>{!! $trabalhoRecente->titulo !!}</td>
            <td>{!! $trabalhoRecente->ordem !!}</td>
            <td>{!! $trabalhoRecente->url !!}</td>
            <td>
                {!! Form::open(['route' => ['trabalhoRecentes.destroy', $trabalhoRecente->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('trabalhoRecentes.show', [$trabalhoRecente->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('trabalhoRecentes.edit', [$trabalhoRecente->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>