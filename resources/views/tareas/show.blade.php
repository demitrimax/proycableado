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
                  <div class="col-md-6">

                    @include('tareas.show_fields')
                  </div>

                    <a href="{!! route('tareas.index') !!}" class="btn btn-default">Regresar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
