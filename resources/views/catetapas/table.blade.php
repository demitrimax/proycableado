<table class="table table-responsive" id="catetapas-table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th colspan="3">Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($catetapas as $catetapa)
        <tr>
            <td><span class="badge" style="background-color:{!! $catetapa->color_hex !!}">{!! $catetapa->nombre !!}</span></td>
            <td>{!! $catetapa->descripcion !!}</td>
            <td>
                {!! Form::open(['route' => ['catetapas.destroy', $catetapa->id], 'method' => 'delete', 'id'=>'form'.$catetapa->id]) !!}
                <div class='btn-group'>
                    <a href="{!! route('catetapas.show', [$catetapa->id]) !!}" class='btn btn-info btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    @can('catetapas-edit')
                    <a href="{!! route('catetapas.edit', [$catetapa->id]) !!}" class='btn btn-primary btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    @endcan
                    @can('catetapas-delete')
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'button', 'class' => 'btn btn-danger btn-xs', 'onclick' => "ConfirmDelete($catetapa->id)"]) !!}
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
