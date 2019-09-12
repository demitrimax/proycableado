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
        <div class="row">
                                <div class="col-sm-6 col-lg-3">
                                    <div class="panel text-center">
                                        <div class="panel-heading">
                                            <h4 class="panel-title text-muted font-light">Proyectos Totales</h4>
                                        </div>
                                        <div class="panel-body p-t-10">
                                            <h2 class="m-t-0 m-b-15"><i class="mdi mdi-arrow-down text-danger m-r-10"></i><b>{{ $cantproy->count() }}</b></h2>
                                            <p class="text-muted m-b-0 m-t-20"><b>{{$cantproyenelmes}}</b> Capturados en los ultimos 30 días</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-lg-3">
                                    <div class="panel text-center">
                                        <div class="panel-heading">
                                            <h4 class="panel-title text-muted font-light">Proyectos Atendidos</h4>
                                        </div>
                                        <div class="panel-body p-t-10">
                                            <h2 class="m-t-0 m-b-15"><i class="mdi mdi-arrow-up text-success m-r-10"></i><b>{{$proyatendidos}}</b></h2>
                                            <p class="text-muted m-b-0 m-t-20"><b>{{ $cantproy->count() == 0 ? '0' : (int)(($proyatendidos/$cantproy->count())*100) }}%</b> del total atendidos.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-lg-3">
                                    <div class="panel text-center">
                                        <div class="panel-heading">
                                            <h4 class="panel-title text-muted font-light">Usuarios en Linea</h4>
                                        </div>
                                        <div class="panel-body p-t-10">
                                            <h2 class="m-t-0 m-b-15"><i class="mdi mdi-account-check text-success m-r-10"></i><b>{{$usuariosOnline}}</b></h2>
                                            <!--<p class="text-muted m-b-0 m-t-20"><b>22%</b> From Last 24 Hours</p> -->
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-lg-3">
                                    <div class="panel text-center">
                                        <div class="panel-heading">
                                            <h4 class="panel-title text-muted font-light">Tareas Pendientes</h4>
                                        </div>
                                        <div class="panel-body p-t-10">
                                            <h2 class="m-t-0 m-b-15"><i class="mdi mdi-arrow-down text-danger m-r-10"></i><b>{{$tareascount}}</b></h2>
                                            <p class="text-muted m-b-0 m-t-20">
                                              @hasrole('administrador')
                                                <a href="{{url('tareas')}}"> Ver todas las tareas</a>
                                                @else
                                                <a href="{{ url('profile') }}"> Ver Mis Tareas <a>
                                                @endhasrole
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>



        </div><!-- container -->

    </div> <!-- Page content Wrapper -->

@endsection
