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

          <div class="col-md-6">
            <div class="panel-body">
              @can('documentos-list')
                  @php

                  function human_filesize($bytes, $decimals = 2) {
                    $sz = 'BKMGTP';
                    $factor = floor((strlen($bytes) - 1) / 3);
                    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
                  }

                  @endphp
                <div class="table-responsive">
                  @if($proyectos->documentos->count()>0)
                  <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Documento</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($proyectos->documentos as $key=>$documento)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>
                          <a href="{{url('verdoc/'.$documento->id)}}">{{$documento->nombre_doc}}</a>
                          @if (file_exists(storage_path('app/'.$documento->file_servidor)) )
                          ( {{ human_filesize(filesize(storage_path('app/'.$documento->file_servidor))) }}bytes)
                          @endif

                        </td>
                        <td>{{$documento->descripcion}}</td>
                        <td>

                          <button type="button" class="btn waves-effect btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="Eliminar"> <i class="fa fa-times"></i> </button>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                @else
                No existen documentos para el proyecto.
                @endif
                </div>
                @endcan
                @can('documentos-create')
                  @if($proyectos->estatus_id == 'A')
                  <button title="Agregar Documento" type="button" class="btn waves-effect btn-primary" data-toggle="modal" data-target="#addDoc"> <i class="ion ion-document-text"></i> Agregar Documento</button>
                  @endif
                @endcan
            </div>

        </div>


        </div>

    </div>
    @can('documentos-create')
    <div id="addDoc" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
          <div class="modal-content">
              {!! Form::open(['route' => 'documentos.store', 'enctype' => 'multipart/form-data']) !!}
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title" id="myModalLabel">Agregar Documento al proyecto</h4>
              </div>
              <div class="modal-body">
                  {!! Form::hidden('redirect', 'proyectos.show')!!}
                  {!! Form::hidden('proyecto_id', $proyectos->id)!!}
                  <!-- Nombre Doc Field -->
                  <div class="form-group">
                      {!! Form::label('nombre_doc', 'Documento:') !!}
                      {!! Form::file('nombre_doc', null, ['class' => 'form-control']) !!}
                  </div>

                  <!-- Descripcion Field -->
                  <div class="form-group">
                      {!! Form::label('descripcion', 'Descripcion o Comentario:') !!}
                      {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
                  </div>


              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary waves-effect waves-light">Agregar</button>
              </div>
              {!! Form::close() !!}
          </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
  </div>
  @endcan
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
