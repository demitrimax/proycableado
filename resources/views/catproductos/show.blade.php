@extends('layouts.app')
@section('title',config('app.name').' | Catproductos' )
@section('content')
    <section class="content-header">
        <h1>
            Detalles de Producto
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                <table class="table table-striped table-bordered detail-view" id="catproductos-table">
                  <tbody>
                    @include('catproductos.show_fields')
                    </tbody>
                  </table>
                    <a href="{!! route('catproductos.index') !!}" class="btn btn-default">Regresar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
