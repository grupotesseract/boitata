<table class="table table-responsive" id="editorials-table">
    <thead>
        <tr>
            <th>Titulo</th>
        <th>Ordem</th>
        <th>Url</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($editorials as $editorial)
        <tr>
            <td>{!! $editorial->titulo !!}</td>
            <td>{!! $editorial->ordem !!}</td>
            <td>{!! $editorial->url !!}</td>
            <td>
                {!! Form::open(['route' => ['editorials.destroy', $editorial->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('editorials.show', [$editorial->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('editorials.edit', [$editorial->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>