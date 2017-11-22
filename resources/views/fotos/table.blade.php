<table class="table table-responsive" id="fotos-table">
    <thead>
        <th>Image Name</th>
        <th>Image Path</th>
        <th>Image Extension</th>
        <th>Owner Id</th>
        <th>Owner Type</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($fotos as $foto)
        <tr>
            <td>{!! $foto->image_name !!}</td>
            <td>{!! $foto->image_path !!}</td>
            <td>{!! $foto->image_extension !!}</td>
            <td>{!! $foto->owner_id !!}</td>
            <td>{!! $foto->owner_type !!}</td>
            <td>
                {!! Form::open(['route' => ['fotos.destroy', $foto->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('fotos.show', [$foto->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('fotos.edit', [$foto->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>