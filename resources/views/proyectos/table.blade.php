<table class="table" id="proyectos-table">
    <thead>
        <tr>
            <th>Folio</th>
            <th>Nombre</th>
            <th>Supervisor</th>
            <th>Identificacion</th>
            <th>Cat Productos Id</th>
            <th>Estatus</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($proyectos as $proyectos)
        <tr>
            <td><a href="{!! route('proyectos.show', [$proyectos->id]) !!}"> {!! $proyectos->folio !!} </a></td>
            <td>{!! $proyectos->nombre !!}</td>
            <td>{!! $proyectos->supervidor !!}</td>
            <td>{!! $proyectos->identificacion !!}</td>
            <td>{!! $proyectos->catproducto->nombre !!}</td>
            <td>{!! $proyectos->catestatus->nombre !!}</td>
            <td>
                {!! Form::open(['route' => ['proyectos.destroy', $proyectos->id], 'method' => 'delete', 'id'=>'form'.$proyectos->id]) !!}
                <div class='btn-group'>
                    <a href="{!! route('proyectos.show', [$proyectos->id]) !!}" class='btn btn-info'><i class="glyphicon glyphicon-eye-open"></i></a>
                    @can('proyectos-edit')
                    <a href="{!! route('proyectos.edit', [$proyectos->id]) !!}" class='btn btn-dark'><i class="glyphicon glyphicon-edit"></i></a>
                    @endcan
                    @can('proyectos-delete')
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'button', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Estas Seguro?')"]) !!}
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
