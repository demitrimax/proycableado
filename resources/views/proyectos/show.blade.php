@extends('layouts.app')
@section('title',config('app.name').' | Proyecto '.$proyectos->nombre )
@section('content')
<div class="panel panel-primary">
  <div class="panel-heading">
      <h3 class="panel-title">Proyectos</h3>
  </div>

          <div class="row">
            <div class="col-md-6">
              <div class="panel-body">
                  <div class="table-responsive">
                  <table class="table table-striped table-bordered detail-view" id="proyectos-table">
                    <tbody>
                      @include('proyectos.show_fields')
                      </tbody>
                    </table>
                      {!! Form::open(['route' => ['proyectos.destroy', $proyectos->id], 'method' => 'delete', 'id'=>'form'.$proyectos->id]) !!}
                      <a href="{!! route('proyectos.index') !!}" class="btn btn-default">Regresar</a>
                      @can('proyectos-edit')
                      <a href="{!! route('proyectos.edit', [$proyectos->id]) !!}" class="btn btn-primary">Editar</a>
                      @endcan
                      @can('proyectos-terminar')
                        @if($proyectos->estatus_id == 'A')
                        <button onclick="ConfirmTerminar()" title="Terminar Proyecto" type="button" class="btn waves-effect btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Terminar el Proyecto actual"> <i class="ion ion-checkmark-round"></i> </button>
                        @endif
                      @endcan
                      @can('proyectos-delete')
                      {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'button', 'class' => 'btn btn-danger', 'onclick' => "ConfirmDelete($proyectos->id)", 'data-original-title'=>'Eliminar Proyecto', 'data-toggle'=>'tooltip', 'data-placement'=>'top' ]) !!}
                      @endcan
                      {!! Form::close() !!}
                  </div>
              </div>
          </div>
        </div>

    </div>
@endsection

@section('scripts')
<script>
function ConfirmTerminar() {
  swal.fire({
        title: '¿Estás seguro?',
        text: 'El proyecto cambiará de Estatus a TERMINADO.',
        type: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Continuar',
        }).then((result) => {
  if (result.value) {
    window.location.href = '{{url('proyecto/'.$proyectos->id.'/terminar')}}';
    //document.forms['form'+id].submit();
  }
})
}
function ConfirmDelete(id) {
  swal.fire({
        title: 'ELIMINAR PROYECTO',
        text: 'El proyecto actual será eliminado.',
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
