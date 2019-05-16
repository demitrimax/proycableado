<table class="table table-responsive" id="documentos-table">
    <thead>
        <tr>
            <th>Nombre Doc</th>
        <th>File Servidor</th>
        <th>Descripcion</th>
            <th colspan="3">Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($documentos as $documentos)
        <tr>
            <td>{!! $documentos->nombre_doc !!}</td>
            <td>{!! $documentos->file_servidor !!}</td>
            <td>{!! $documentos->descripcion !!}</td>
            <td>
                {!! Form::open(['route' => ['documentos.destroy', $documentos->id], 'method' => 'delete', 'id'=>'form'.$documentos->id]) !!}
                <div class='btn-group'>
                    <a href="{!! route('documentos.show', [$documentos->id]) !!}" class='btn btn-info btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    @can('documentos-edit')
                    <a href="{!! route('documentos.edit', [$documentos->id]) !!}" class='btn btn-primary btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    @endcan
                    @can('documentos-delete')
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'button', 'class' => 'btn btn-danger btn-xs', 'onclick' => "ConfirmDelete($documentos->id)"]) !!}
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
  swal({
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
