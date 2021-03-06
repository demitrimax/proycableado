@extends('layouts.app')
@section('title',config('app.name').' | Editar Documentos' )
@section('content')
<div class="row">
      <div class="col-lg-12">
          @include('adminlte-templates::common.errors')
          <div class="panel panel-default">
              <div class="panel-heading">
                  <h3 class="panel-title">Editar Documentos</h3>
              </div>
              <div class="panel-body">
              {!! Form::model($documentos, ['route' => ['documentos.update', $documentos->id], 'method' => 'patch']) !!}

                   @include('documentos.fields')

              {!! Form::close() !!}
              </div>
          </div>
      </div>
  </div>
@endsection
