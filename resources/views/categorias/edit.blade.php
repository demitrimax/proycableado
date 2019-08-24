@extends('layouts.app')
@section('title',config('app.name').' | Editar Categorias' )
@section('content')
<div class="row">
      <div class="col-lg-12">
          @include('adminlte-templates::common.errors')
          <div class="panel panel-primary">
              <div class="panel-heading">
                  <h3 class="panel-title">Editar Categorias</h3>
              </div>
              <div class="panel-body">
              {!! Form::model($categorias, ['route' => ['categorias.update', $categorias->id], 'method' => 'patch']) !!}

                   @include('categorias.fields')

              {!! Form::close() !!}
              </div>
          </div>
      </div>
  </div>
@endsection
