@extends('layouts.app')
@section('title',config('app.name').' | Editar Clientes' )
@section('content')
<div class="row">
      <div class="col-lg-12">
          @include('adminlte-templates::common.errors')
          <div class="panel panel-primary">
              <div class="panel-heading card-header-default">
                  <h3 class="panel-title">Editar Clientes</h3>
              </div>
              <div class="panel-body">
              {!! Form::model($clientes, ['route' => ['clientes.update', $clientes->id], 'method' => 'patch']) !!}

                   @include('clientes.fields')

              {!! Form::close() !!}
              </div>
          </div>
      </div>
  </div>
@endsection
