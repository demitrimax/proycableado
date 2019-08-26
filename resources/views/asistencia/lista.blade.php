@extends('layouts.app')

@section('title',config('app.name').' | Pasar Asistencia' )

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                  <h3 class="panel-title">Pasar Asistencia</h3>
              </div>
                <div class="panel-body">

                    <div class="content">
                        <div class="clearfix"></div>

                        @include('flash::message')

                        <div class="clearfix"></div>
                        @include('asistencia.table')
                        <button class="btn btn-primary waves-effect waves-light" type="button" data-toggle="modal" data-target="#myModal">Reporte Mensual</button>
                    </div>
                </div> <!-- panel-body -->
            </div> <!-- panel -->
        </div> <!-- col -->
    </div>

    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title" id="myModalLabel">Reporte Mensual de Asistencia</h4>
              </div>
              {!! Form::open(['url' => ['asistencia/reporte'], 'method' => 'post'])!!}
              <div class="modal-body">
                  <h4>Seleccione el Mes</h4>

                  {!! Form::select('mesanio', $mesesasistencia, null, ['class'=>'form-control'])!!}
              </div>

              <div class="modal-footer">
                  <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-primary waves-effect waves-light">Ver Reporte</button>
              </div>
              {!! Form::close()!!}
          </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
  </div>
@endsection
