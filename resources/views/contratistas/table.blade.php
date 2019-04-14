<table class="table table-responsive" id="contratistas-table">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Rfc</th>
        <th>Direccion</th>
            <th colspan="3">Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($contratistas as $contratistas)
        <tr>
            <td>{!! $contratistas->nombre !!}</td>
            <td>{!! $contratistas->rfc !!}</td>
            <td>{!! $contratistas->direccion !!}</td>
            <td>
                {!! Form::open(['route' => ['contratistas.destroy', $contratistas->id], 'method' => 'delete', 'id'=>'form'.$contratistas->id]) !!}
                <div class='btn-group'>
                    <a href="{!! route('contratistas.show', [$contratistas->id]) !!}" class='btn btn-info btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    @can('contratistas-edit')
                    <a href="{!! route('contratistas.edit', [$contratistas->id]) !!}" class='btn btn-primary btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    @endcan
                    @can('contratistas-delete')
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'button', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Estas Seguro?')"]) !!}
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
