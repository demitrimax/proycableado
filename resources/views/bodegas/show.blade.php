@extends('layouts.app')
@section('title',config('app.name').' | Bodegas' )
@section('content')

    <div class="content">
        <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Detalle de la Bodega</h3>
        </div>
            <div class="panel-body">
                <div class="row" style="padding-left: 20px">
                <table class="table table-striped table-bordered detail-view" id="bodegas-table">
                  <tbody>
                    @include('bodegas.show_fields')
                    </tbody>
                  </table>
                    <a href="{!! route('bodegas.index') !!}" class="btn btn-default">Regresar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
