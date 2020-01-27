@extends('layouts.app')
@section('title',config('app.name').' | Alta de Nuevo Etapa|' )
@section('content')
<div class="row">
      <div class="col-lg-12">
          @include('adminlte-templates::common.errors')
          <div class="panel panel-default">
              <div class="panel-heading">
                  <h3 class="panel-title">Alta de Catetapa</h3>
              </div>
              <div class="panel-body">
              {!! Form::open(['route' => 'catetapas.store']) !!}

                  @include('catetapas.fields')

              {!! Form::close() !!}
              </div>
          </div>
      </div>
  </div>

@endsection
