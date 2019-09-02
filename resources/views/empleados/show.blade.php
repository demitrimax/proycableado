@extends('layouts.app')
@section('title',config('app.name').' | Empleados' )
@section('content')

    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">

                    @include('empleados.show_fields')

                    <a href="{!! route('empleados.index') !!}" class="btn btn-default">Regresar</a>
                    @can('empleados-edit')
                    <a href="{!! route('empleados.edit', [$empleados->id]) !!}" class='btn btn-primary'>Editar</a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
    
@endsection
