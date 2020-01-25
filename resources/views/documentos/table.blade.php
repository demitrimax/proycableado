
<table class="table table-responsive" id="documentos-table">
    <thead>
        <tr>
            <th>Nombre Doc</th>
            <th>Descripcion</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
      @php

      function human_filesize($bytes, $decimals = 2) {
        $sz = 'BKMGTP';
        $factor = floor((strlen($bytes) - 1) / 3);
        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
      }

      @endphp

    @foreach($documentos as $documentos)

        <tr>
            <td>
              <a href="{{url('verdoc/'.$documentos->id)}}">{!! $documentos->nombre_doc !!}</a>
              @if (file_exists(storage_path('app/'.$documentos->file_servidor)) )
              ( {{ human_filesize(filesize(storage_path('app/'.$documentos->file_servidor))) }}bytes)
              @endif
            </td>
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
