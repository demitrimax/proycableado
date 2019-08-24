@extends('layouts.app')
@section('title',config('app.name').' | Editar Producto' )
@section('content')
<div class="row">
      <div class="col-lg-12">
          @include('adminlte-templates::common.errors')
          <div class="panel panel-primary">
              <div class="panel-heading panel-header-default">
                  <h3 class="panel-title">Editar Producto</h3>
              </div>
              <div class="panel-body">
              {!! Form::model($productos, ['route' => ['productos.update', $productos->id], 'method' => 'patch']) !!}

                   @include('productos.fields')

              {!! Form::close() !!}
              </div>
          </div>
      </div>
  </div>
@endsection
