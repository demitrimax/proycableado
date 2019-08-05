@extends('layouts.app')
@section('title',config('app.name').' | Tareas' )
@section('content')
    <section class="content-header">
        <h1>
            Tareas
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="progress progress-lg">
                      <div class="progress-bar progress-bar-purple" role="progressbar" aria-valuenow="{{$tareas->avance_porc}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$tareas->avance_porc}}%">
                                                                              {{$tareas->avance_porc}}%
                        </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">

                    @include('tareas.show_fields')
                    @can('tareas-list')
                    <a href="{!! route('tareas.index') !!}" class="btn btn-default">Regresar</a>
                    @else
                    <a href="{!! url()->previous() !!}" class="btn btn-default">Regresar</a>
                    @endcan
                  </div>
                  <div class="col-md-6">
                    @include('tareas.regavances')
                  </div>


                </div>
            </div>
        </div>
    </div>
@endsection
