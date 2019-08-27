@extends('layouts.app')
@section('title',config('app.name').' | Editar Invoperacions' )
@section('content')
<div class="row">
      <div class="col-lg-12">
          @include('adminlte-templates::common.errors')
          <div class="panel panel-primary">
              <div class="panel-heading card-header-default">
                  <h3 class="panel-title">Editar Operación</h3>
              </div>
              <div class="panel-body">
              {!! Form::model($invoperacion, ['route' => ['invoperacions.update', $invoperacion->id], 'method' => 'patch']) !!}

                   @include('invoperacions.fields')

              {!! Form::close() !!}
              </div>
          </div>
      </div>
  </div>
@endsection
