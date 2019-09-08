@extends('layouts.app')
@section('title',config('app.name').' | Docscategorias' )
@section('content')

    <div class="content">
        <div class="panel panel-primary">
          <div class="panel-heading">
            Categoria de Documentos
          </div>
            <div class="panel-body">
                <div class="row" style="padding-left: 20px">
                <table class="table table-striped table-bordered detail-view" id="docscategorias-table">
                  <tbody>
                    @include('docscategorias.show_fields')
                    </tbody>
                  </table>
                    <a href="{!! route('docscategorias.index') !!}" class="btn btn-default">Regresar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
