@extends('layouts.app')
@section('title',config('app.name').' | Categorias' )
@section('content')

    <div class="content">
        <div class="panel panel-primary">
        <div class="panel-heading card-header-default">
          <h3 class="panel-title">Detalle de la Categoria</h3>
        </div>
            <div class="panel-body">
                <div class="row" style="padding-left: 20px">

                    @include('categorias.show_fields')

                    <a href="{!! route('categorias.index') !!}" class="btn btn-default">Regresar</a>
                    @can('categorias-edit')
                    <a href="{!! route('categorias.edit', [$categorias->id]) !!}" class='btn btn-primary'>Editar</a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
