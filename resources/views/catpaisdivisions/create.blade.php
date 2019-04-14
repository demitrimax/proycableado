@extends('layouts.app')

@section('content')
    <div class="row">
          <div class="col-lg-12">
              @include('adminlte-templates::common.errors')
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <h3 class="panel-title">Alta de País-División</h3>
                  </div>
                  <div class="panel-body">
                    {!! Form::open(['route' => 'catpaisdivisions.store']) !!}

                        @include('catpaisdivisions.fields')

                    {!! Form::close() !!}
                  </div>
              </div>
          </div>
      </div>

@endsection
