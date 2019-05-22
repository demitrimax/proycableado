@extends('layouts.app')
@section('title',config('app.name').' | Perfil de Usuario' )
@section('content')

<section class="content">

  <div class="row">

          <div class="col-lg-5">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Perfil del Usuario</h3>
              </div>
            <div class="panel-body panel-profile">
              <a href="#">
              <img class="profile-user-img img-responsive img-circle thumb-md center-block" src="{{asset(Auth::user()->uavatar)}}" alt="User profile picture">
            </a>
              <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>

              <p class="text-muted text-center">{{Auth::user()->cargo}}</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Miembro desde</b> <a class="pull-right">{{Auth::user()->created_at->format('M, Y')}}</a>
                </li>
                <li class="list-group-item">
                  <b>Correo Electronico</b> <a class="pull-right">{{Auth::user()->email}}</a>
                </li>
                <li class="list-group-item">
                  <b>Roles</b> <a class="pull-right">@foreach( Auth::user()->roles as $rol )
                    <span class="label label-success">{{$rol->name}}</span>
                  @endforeach</a>
                </li>
              </ul>

              <a href="#" class="btn btn-primary btn-block"><b>Editar Perfil</b></a>
            </div>
            <!-- /.box-body -->
          </div>

        </div>
        <div class="col-lg-5">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Tareas Asignadas</h3>
            </div>
          <div class="panel-body panel-profile">
            <div class="col-md-12">
                      <h5>Progreso</h5>
                      <ul class="list-group">
                        @foreach( $vartareas as $key=>$tarea)
                          <li class="list-group-item">
                            @if($tarea->avance_porc)
                              <span class="badge badge-primary">{{$tarea->avance_porc}}%</span>
                              @endif
                              {{$tarea->nombre}}
                          </li>
                          @endforeach
                      </ul>
                  </div>

          </div>
          <!-- /.box-body -->
        </div>

      </div>



</section>
@endsection
