<table class="table table-responsive" id="trabalhoRecentes-table">
    <thead>
        <th>Ordem</th>
        <th>Titulo</th>
        <th>Link do Behance</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($trabalhoRecentes as $trabalhoRecente)
        <tr>
            <td>{!! $trabalhoRecente->ordem !!}</td>
            <td>{!! $trabalhoRecente->titulo !!}</td>
            <td> <a href="{!! $trabalhoRecente->url !!}">{!! $trabalhoRecente->url !!}</a></td>
            <td>
                {!! Form::open(['route' => ['trabalhoRecentes.destroy', $trabalhoRecente->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
