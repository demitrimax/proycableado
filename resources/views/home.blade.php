@extends('layouts.app')

@section('content')

<div class="">
    <div class="page-header-title">
        <h4 class="page-title">Dashboard</h4>
    </div>
</div>

    <div class="page-content-wrapper ">

        <div class="container">

          <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Dashboard</h3>
            </div>
            <div class="panel-body">
              @if (session('status'))
                  <div class="alert alert-success" role="alert">
                      {{ session('status') }}
                  </div>
              @endif

              Ha iniciado sesión correctamente!
            </div>
        </div>

        </div><!-- container -->

    </div> <!-- Page content Wrapper -->

@endsection
