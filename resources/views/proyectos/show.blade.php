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
                      <a href="{!! route('proyectos.index') !!}" class="btn btn-default">Regresar</a>
                      @can('proyectos-edit')
                      <a href="{!! route('proyectos.edit', [$proyectos->id]) !!}" class="btn btn-primary">Editar</a>
                      @endcan
                      @can('proyectos-terminar')
                        @if($proyectos->estatus_id == 'A')
                        <button onclick="ConfirmTerminar()" title="Terminar Proyecto" type="button" class="btn waves-effect btn-primary"> <i class="ion ion-checkmark-round"></i> </button>
                        @endif
                      @endcan
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
</script>
@endsection
