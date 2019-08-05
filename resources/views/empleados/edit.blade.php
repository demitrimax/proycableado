@extends('layouts.app')
@section('title',config('app.name').' | Editar Empleados' )
@section('content')
<div class="row">
      <div class="col-lg-12">
          @include('adminlte-templates::common.errors')
          <div class="panel panel-default">
              <div class="panel-heading">
                  <h3 class="panel-title">Editar Empleados</h3>
              </div>
              <div class="panel-body">
              {!! Form::model($empleados, ['route' => ['empleados.update', $empleados->id], 'method' => 'patch']) !!}

                   @include('empleados.fields')

              {!! Form::close() !!}
              </div>
          </div>
      </div>
  </div>
@endsection
