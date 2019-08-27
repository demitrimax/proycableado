<table class="table table-responsive" id="empleados-table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>CURP</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($empleados as $empleados)
        <tr>
            <td>{!! $empleados->nombre.' '.$empleados->apellidos !!}</td>
            <td>{!! $empleados->curp !!}</td>
            <td>{!! $empleados->bajatemp == 1 ? '<span class="label label-danger">Baja Temporal</span>' : '<span class="label label-primary">Activo</span>'!!}</td>
            <td>
                {!! Form::open(['route' => ['empleados.destroy', $empleados->id], 'method' => 'delete', 'id'=>'form'.$empleados->id]) !!}
                <div class='btn-group'>
                    <a href="{!! route('empleados.show', [$empleados->id]) !!}" class='btn btn-info'><i class="glyphicon glyphicon-eye-open"></i></a>
                    @can('empleados-edit')
                    <a href="{!! route('empleados.edit', [$empleados->id]) !!}" class='btn btn-primary'><i class="glyphicon glyphicon-edit"></i></a>
                    @endcan
                    @can('empleados-delete')
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'button', 'class' => 'btn btn-danger', 'onclick' => "ConfirmDelete($empleados->id)"]) !!}
                    @endcan
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
  swal.fire({
        title: '¿Estás seguro?',
        text: 'Estás seguro de borrar este elemento.',
        type: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Continuar',
        }).then((result) => {
  if (result.value) {
    document.forms['form'+id].submit();
  }
})
}
</script>
@endsection
