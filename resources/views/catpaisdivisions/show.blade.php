@extends('layouts.app')

@section('content')
      <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Detalles País-División</h3>
                    </div>
                    <div class="panel-body">
                      @include('catpaisdivisions.show_fields')
                      <a href="{!! route('catpaisdivisions.index') !!}" class="btn btn-default">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
  
@endsection
