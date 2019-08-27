@extends('layouts.app')
@section('title',config('app.name').' | Operación de Inventario' )
@section('content')

    <div class="content">


        <div class="panel panel-primary">
        <div class="panel-heading card-header-default">
          <h3 class="panel-title">Operación de Inventario</h3>
        </div>
            <div class="panel-body">

                    @include('invoperacions.invdetped')


                  <div class="col-lg-12">
                    @include('invoperacions.detoperacion')
                  </div>

                    <a href="{!! route('invoperacions.index') !!}" class="btn btn-secondary">Regresar</a>
                </div>
            </div>
        </div>



@endsection
