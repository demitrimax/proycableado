@extends('layouts.app')
@section('title',config('app.name').' | Editar Tareas' )
@section('content')
<div class="row">
      <div class="col-lg-12">
          @include('adminlte-templates::common.errors')
          <div class="panel panel-default">
              <div class="panel-heading">
                  <h3 class="panel-title">Editar Tareas</h3>
              </div>
              <div class="panel-body">
              {!! Form::model($tareas, ['route' => ['tareas.update', $tareas->id], 'method' => 'patch']) !!}

                   @include('tareas.fields')

              {!! Form::close() !!}
              </div>
          </div>
      </div>
  </div>
@endsection
