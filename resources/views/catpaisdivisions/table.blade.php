<table class="table table-responsive" id="catpaisdivisions-table">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Observaciones</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($catpaisdivisions as $catpaisdivision)
        <tr>
            <td>{!! $catpaisdivision->nombre !!}</td>
            <td>{!! $catpaisdivision->observaciones !!}</td>
            <td>
                {!! Form::open(['route' => ['catpaisdivisions.destroy', $catpaisdivision->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('catpaisdivisions.show', [$catpaisdivision->id]) !!}" class='btn btn-info'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('catpaisdivisions.edit', [$catpaisdivision->id]) !!}" class='btn btn-dark'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Estas Seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
