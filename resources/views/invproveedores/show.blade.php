@extends('layouts.app')
@section('title',config('app.name').' | Invproveedores' )
@section('content')

    <div class="content">
        <div class="panel panel primary">
        <div class="panel-heading card-header-default">
          <h3 class="panel-title">Detalle del Proveedor</h3>
        </div>
            <div class="card-body">
                <div class="row" style="padding-left: 20px">

                    @include('invproveedores.show_fields')

                    <a href="{!! route('invproveedores.index') !!}" class="btn btn-default">Regresar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
