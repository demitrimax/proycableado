@extends('layouts.app')
@section('title',config('app.name').' | Operación de Inventario' )
@section('content')

    <div class="content">
      <div class="row">
        <div class="col-lg-6">
        <div class="panel panel-primary">
        <div class="panel-heading card-header-default">
          <h3 class="panel-title">Operación de Inventario</h3>
        </div>
            <div class="panel-body">
                <div class="row" style="padding-left: 20px">

                    @include('invoperacions.show_fields')

                    <a href="{!! route('invoperacions.index') !!}" class="btn btn-secondary">Regresar</a>
                </div>
            </div>
        </div>
      </div>
      <div class="col-lg-6">
      <div class="card">
      <div class="card-header card-header-default">
        <h3 class="card-title">Detalle</h3>
      </div>
          <div class="card-body">

                  @include('invoperacions.detoperacion')

              </div>
          </div>
      </div>
    </div>
    </div>

@endsection
