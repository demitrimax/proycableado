@extends('layouts.app')
@section('title',config('app.name').' | Editar Invproveedores' )
@section('content')
<div class="row">
      <div class="col-lg-12">
          @include('adminlte-templates::common.errors')
          <div class="panel panel-primary">
              <div class="panel-heading card-header-default">
                  <h3 class="panel-title">Editar Invproveedores</h3>
              </div>
              <div class="panel-body">
              {!! Form::model($invproveedores, ['route' => ['invproveedores.update', $invproveedores->id], 'method' => 'patch']) !!}

                   @include('invproveedores.fields')

              {!! Form::close() !!}
              </div>
          </div>
      </div>
  </div>
@endsection
