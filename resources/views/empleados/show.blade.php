@extends('layouts.app')
@section('title',config('app.name').' | Empleados' )
@section('content')
    <section class="content-header">
        <h1>
            Empleados
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">

                    @include('empleados.show_fields')

                    <a href="{!! route('empleados.index') !!}" class="btn btn-default">Regresar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
