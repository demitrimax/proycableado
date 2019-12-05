@extends('layouts.app')
@section('title',config('app.name').' | Productos' )
@section('content')

    <div class="content">
      <div class="row">
        <div class="col-lg-6">
        <div class="panel panel-primary">
        <div class="panel-heading panel-default">
          <h3 class="panel-title">Productos</h3>
        </div>
            <div class="panel-body">
                <div class="row" style="padding-left: 20px">
                <table class="table table-striped table-bordered detail-view" id="productos-table">
                  <tbody>
                    @include('productos.show_fields')
                    </tbody>
                  </table>
                    <a href="{!! route('productos.index') !!}" class="btn btn-default">Regresar</a>
                    @can('productos-edit')
                    <a href="{!! route('productos.edit', [$productos->id]) !!}" class='btn btn-primary'>Editar</a>
                    @endcan
                </div>
            </div>
        </div>
      </div>

      <div class="col-lg-6">

    @if($productos->inventariable <> 1)

        @include('productos.detoperaciones')
    @else

        @include('productos.prestamos')

      @endif

          </div>

  </div>
  </div>
@endsection

@section('scripts')
  @stack('scripts')
@endsection
