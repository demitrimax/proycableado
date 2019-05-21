@extends('layouts.app')
@section('title',config('app.name').' | Editar Proyectos' )
@section('content')
<div class="row">
      <div class="col-lg-12">
          @include('adminlte-templates::common.errors')
          <div class="panel panel-default">
              <div class="panel-heading">
                  <h3 class="panel-title">Editar Proyectos</h3>
              </div>
              <div class="panel-body">
              {!! Form::model($proyectos, ['route' => ['proyectos.update', $proyectos->id], 'method' => 'patch', 'class'=>'form-horizontal', 'enctype' => 'multipart/form-data']) !!}

                   @include('proyectos.fields')

              {!! Form::close() !!}
              </div>
          </div>
      </div>
  </div>
@endsection
