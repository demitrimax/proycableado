@extends('layouts.app')
@section('title',config('app.name').' | Editar Catetapas' )
@section('content')
<div class="row">
      <div class="col-lg-12">
          @include('adminlte-templates::common.errors')
          <div class="panel panel-default">
              <div class="panel-heading">
                  <h3 class="panel-title">Editar Etapa</h3>
              </div>
              <div class="panel-body">
              {!! Form::model($catetapa, ['route' => ['catetapas.update', $catetapa->id], 'method' => 'patch']) !!}

                   @include('catetapas.fields')

              {!! Form::close() !!}
              </div>
          </div>
      </div>
  </div>
@endsection
