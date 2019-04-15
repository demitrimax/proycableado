@extends('layouts.app')
@section('title',config('app.name').' | Alta de Nuevo Catproductos' )
@section('content')
<div class="row">
      <div class="col-lg-12">
          @include('adminlte-templates::common.errors')
          <div class="panel panel-default">
              <div class="panel-heading">
                  <h3 class="panel-title">Alta de Productos</h3>
              </div>
              <div class="panel-body">
              {!! Form::open(['route' => 'catproductos.store']) !!}

                  @include('catproductos.fields')

              {!! Form::close() !!}
              </div>
          </div>
      </div>
  </div>

@endsection
