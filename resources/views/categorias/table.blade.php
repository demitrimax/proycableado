<table class="table table-responsive table-hover" id="categorias-table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($categorias as $categorias)
        <tr>
            <td>{!! $categorias->nombre !!}</td>
            <td>{!! $categorias->descripcion !!}</td>
            <td>
                {!! Form::open(['route' => ['categorias.destroy', $categorias->id], 'method' => 'delete', 'id'=>'form'.$categorias->id]) !!}
                <div class='btn-group'>
                    <a href="{!! route('categorias.show', [$categorias->id]) !!}" class='btn btn-info'><i class="glyphicon glyphicon-eye-open"></i></a>
                    @can('categorias-edit')
                    <a href="{!! route('categorias.edit', [$categorias->id]) !!}" class='btn btn-primary'><i class="glyphicon glyphicon-edit"></i></a>
                    @endcan
                    @can('categorias-delete')
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'button', 'class' => 'btn btn-danger', 'onclick' => "ConfirmDelete($categorias->id)"]) !!}
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
