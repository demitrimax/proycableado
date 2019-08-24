@extends('layouts.app')
@section('title',config('app.name').' | Alta de Nueva Bodega' )
@section('content')
<div class="row">
      <div class="col-lg-12">
          @include('adminlte-templates::common.errors')
          <div class="panel panel-primary">
              <div class="panel panel-heading">
                  <h3 class="panel-title">Alta de Bodegas</h3>
              </div>
              <div class="panel-body">
              {!! Form::open(['route' => 'bodegas.store']) !!}

                  @include('bodegas.fields')

              {!! Form::close() !!}
              </div>
          </div>
      </div>
  </div>

@endsection
