<table class="table table-responsive" id="catareaciudads-table">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Activo</th>
        <th>Observaciones</th>
            <th colspan="3">Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($catareaciudads as $catareaciudad)
        <tr>
            <td>{!! $catareaciudad->nombre !!}</td>
            <td>{!! $catareaciudad->activo !!}</td>
            <td>{!! $catareaciudad->observaciones !!}</td>
            <td>
                {!! Form::open(['route' => ['catareaciudads.destroy', $catareaciudad->id], 'method' => 'delete', 'id'=>'form'.$catareaciudad->id]) !!}
                <div class='btn-group'>
                    <a href="{!! route('catareaciudads.show', [$catareaciudad->id]) !!}" class='btn btn-info btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('catareaciudads.edit', [$catareaciudad->id]) !!}" class='btn btn-primary btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'button', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Estas Seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@section('scripts')
<script>
function ConfirmDelete(id) {
    swal({
        title: "¿Estás seguro?",
        text: "Estás seguro de borrar este elemento.",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: 'btn-warning',
        confirmButtonText: "Continuar",
        closeOnConfirm: false
    }, function () {
        document.forms['form'+id].submit();
    });
}
</script>
@endsection
