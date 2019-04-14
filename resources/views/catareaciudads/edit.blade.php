@extends('layouts.app')
@section('title',config('app.name').' | Editar Catareaciudads' )
@section('content')
<div class="row">
      <div class="col-lg-12">
          @include('adminlte-templates::common.errors')
          <div class="panel panel-default">
              <div class="panel-heading">
                  <h3 class="panel-title">Editar Área o Ciudad</h3>
              </div>
              <div class="panel-body">
              {!! Form::model($catareaciudad, ['route' => ['catareaciudads.update', $catareaciudad->id], 'method' => 'patch']) !!}

                   @include('catareaciudads.fields')

              {!! Form::close() !!}
              </div>
          </div>
      </div>
  </div>
@endsection
