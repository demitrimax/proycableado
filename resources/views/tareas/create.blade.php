@extends('layouts.app')
@section('title',config('app.name').' | Alta de Nuevo Tareas' )
@section('content')
<div class="row">
      <div class="col-lg-12">
          @include('adminlte-templates::common.errors')
          <div class="panel panel-default">
              <div class="panel-heading">
                  <h3 class="panel-title">Alta de Tareas</h3>
              </div>
              <div class="panel-body">
              {!! Form::open(['route' => 'tareas.store']) !!}

                  @include('tareas.fields')

              {!! Form::close() !!}
              </div>
          </div>
      </div>
  </div>
  
@endsection
