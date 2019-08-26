@extends('layouts.app')
@section('title',config('app.name').' | Alta de Nuevo Invproveedores' )
@section('content')
<div class="row">
      <div class="col-lg-12">
          @include('adminlte-templates::common.errors')
          <div class="panel panel-primary">
              <div class="panel-heading card-header-default">
                  <h3 class="panel-title">Alta de Invproveedores</h3>
              </div>
              <div class="panel-body">
              {!! Form::open(['route' => 'invproveedores.store']) !!}

                  @include('invproveedores.fields')

              {!! Form::close() !!}
              </div>
          </div>
      </div>
  </div>

@endsection
