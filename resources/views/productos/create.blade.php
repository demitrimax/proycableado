@extends('layouts.app')
@section('title',config('app.name').' | Alta de Nuevo Productos' )
@section('content')
<div class="row">
      <div class="col-lg-12">
          @include('adminlte-templates::common.errors')
          <div class="panel panel-primary">
              <div class="panel-heading card-header-default">
                  <h3 class="panel-title">Alta de Productos</h3>
              </div>
              <div class="panel-body">
              {!! Form::open(['route' => 'productos.store']) !!}

                  @include('productos.fields')

              {!! Form::close() !!}
              </div>
          </div>
      </div>
  </div>

@endsection
