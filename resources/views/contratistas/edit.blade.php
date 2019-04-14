@extends('layouts.app')
@section('title',config('app.name').' | Editar Contratistas' )
@section('content')
<div class="row">
      <div class="col-lg-12">
          @include('adminlte-templates::common.errors')
          <div class="panel panel-default">
              <div class="panel-heading">
                  <h3 class="panel-title">Editar Contratistas</h3>
              </div>
              <div class="panel-body">
              {!! Form::model($contratistas, ['route' => ['contratistas.update', $contratistas->id], 'method' => 'patch']) !!}

                   @include('contratistas.fields')

              {!! Form::close() !!}
              </div>
          </div>
      </div>
  </div>
@endsection
