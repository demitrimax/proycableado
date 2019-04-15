@extends('layouts.app')
@section('title',config('app.name').' | Alta de Nuevo Proyectos' )
@section('content')
<div class="col-sm-12">
  @include('adminlte-templates::common.errors')
  <div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Alta de Proyectos</h3>
    </div>
      <div class="panel-body">
        {!! Form::open(['route' => 'proyectos.store', 'class'=>'form-horizontal']) !!}

            @include('proyectos.fields')

        {!! Form::close() !!}

      </div> <!-- panel-body -->
  </div> <!-- panel -->
</div>

@endsection
