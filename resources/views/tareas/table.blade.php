<table class="table table-responsive" id="tareas-table">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Descripcion</th>
        <th>Vencimiento</th>
        <th>Usuario Responsable</th>
            <th colspan="3">Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($tareas as $tareas)
        <tr>
            <td>{!! $tareas->nombre !!}</td>
            <td>{!!  str_limit(strip_tags($tareas->descripcion), $limit = 50, $end = '...') !!}</td>
            <td>{!! $tareas->vencimiento->format('d-m-Y') !!}</td>
            <td>{!! $tareas->user->name !!}</td>
            <td>
                {!! Form::open(['route' => ['tareas.destroy', $tareas->id], 'method' => 'delete', 'id'=>'form'.$tareas->id]) !!}
                <div class='btn-group'>
                    <a href="{!! route('tareas.show', [$tareas->id]) !!}" class='btn btn-info'><i class="glyphicon glyphicon-eye-open"></i></a>
                    @can('tareas-edit')
                    <a href="{!! route('tareas.edit', [$tareas->id]) !!}" class='btn btn-primary'><i class="glyphicon glyphicon-edit"></i></a>
                    @endcan
                    @can('tareas-delete')
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'button', 'class' => 'btn btn-danger', 'onclick' => "ConfirmDelete($tareas->id)"]) !!}
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
