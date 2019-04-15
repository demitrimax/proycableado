@extends('layouts.app')
@section('title',config('app.name').' | Editar Catproductos' )
@section('content')
<div class="row">
      <div class="col-lg-12">
          @include('adminlte-templates::common.errors')
          <div class="panel panel-default">
              <div class="panel-heading">
                  <h3 class="panel-title">Editar Producto</h3>
              </div>
              <div class="panel-body">
              {!! Form::model($catproductos, ['route' => ['catproductos.update', $catproductos->id], 'method' => 'patch']) !!}

                   @include('catproductos.fields')

              {!! Form::close() !!}
              </div>
          </div>
      </div>
  </div>
@endsection
