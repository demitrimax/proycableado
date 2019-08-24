@extends('layouts.app')
@section('title',config('app.name').' | Alta de Nuevo Clientes' )
@section('content')
<div class="row">
      <div class="col-lg-12">
          @include('adminlte-templates::common.errors')
          <div class="panel panel-primary">
              <div class="panel-heading panel-header-default">
                  <h3 class="panel-title">Alta de Clientes</h3>
              </div>
              <div class="panel-body">
              {!! Form::open(['route' => 'clientes.store']) !!}

                  @include('clientes.fields')

              {!! Form::close() !!}
              </div>
          </div>
      </div>
  </div>

@endsection
