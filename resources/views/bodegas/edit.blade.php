@extends('layouts.app')
@section('title',config('app.name').' | Editar Bodegas' )
@section('content')
<div class="row">
      <div class="col-lg-12">
          @include('adminlte-templates::common.errors')
          <div class="panel panel-primary">
              <div class="panel-heading ">
                  <h3 class="panel-title">Editar Bodegas</h3>
              </div>
              <div class="panel-body">
              {!! Form::model($bodegas, ['route' => ['bodegas.update', $bodegas->id], 'method' => 'patch']) !!}

                   @include('bodegas.fields')

              {!! Form::close() !!}
              </div>
          </div>
      </div>
  </div>
@endsection
