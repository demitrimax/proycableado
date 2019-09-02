
<table class="table table-responsive" id="docscategorias-table">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Descripcion</th>
        <th>Imagen</th>
            <th colspan="3">Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($docscategorias as $docscategorias)
        <tr>
            <td>{!! $docscategorias->nombre !!}</td>
            <td>{!! \App\Helpers\SomeClass::cortar_string($docscategorias->descripcion, 50)  !!}</td>
            <td>{!! $docscategorias->imagen !!}</td>
            <td>
                {!! Form::open(['route' => ['docscategorias.destroy', $docscategorias->id], 'method' => 'delete', 'id'=>'form'.$docscategorias->id]) !!}
                <div class='btn-group'>
                    <a href="{!! route('docscategorias.show', [$docscategorias->id]) !!}" class='btn btn-info btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    @can('docscategorias-edit')
                    <a href="{!! route('docscategorias.edit', [$docscategorias->id]) !!}" class='btn btn-primary btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    @endcan
                    @can('docscategorias-delete')
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'button', 'class' => 'btn btn-danger btn-xs', 'onclick' => "ConfirmDelete($docscategorias->id)"]) !!}
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