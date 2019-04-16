@extends('layouts.app')
@section('title',config('app.name').' | Proyectos' )
@section('content')
<div class="panel panel-primary">
  <div class="panel-heading">
      <h3 class="panel-title">Proyectos</h3>
  </div>

            <div class="panel-body">
                <div class="table-responsive">
                <table class="table table-striped table-bordered detail-view" id="proyectos-table">
                  <tbody>
                    @include('proyectos.show_fields')
                    </tbody>
                  </table>
                    <a href="{!! route('proyectos.index') !!}" class="btn btn-default">Regresar</a>
                </div>
            </div>

    </div>
@endsection
