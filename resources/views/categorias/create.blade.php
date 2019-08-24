@extends('layouts.app')
@section('title',config('app.name').' | Alta de Nuevo Categorias' )
@section('content')
<div class="row">
      <div class="col-lg-12">
          @include('adminlte-templates::common.errors')
          <div class="panel panel-primary">
              <div class="panel-heading">
                  <h3 class="panel-title">Alta de Categorias</h3>
              </div>
              <div class="panel-body">
              {!! Form::open(['route' => 'categorias.store']) !!}

                  @include('categorias.fields')

              {!! Form::close() !!}
              </div>
          </div>
      </div>
  </div>

@endsection
