@extends('layouts.app')
@section('title',config('app.name').' | Perfil de Usuario' )
@section('content')

<section class="content">

  <div class="row">
    <div class="clearfix"></div>

    @include('flash::message')
    @include('adminlte-templates::common.errors')

    <div class="clearfix"></div>

          <div class="col-lg-6">
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

              <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#FotoPerfilModal"><b>Editar Perfil</b></button>
            </div>
            <!-- /.box-body -->
          </div>

        </div>
        <div class="col-lg-6">
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
                              <a href="{!! route('tareas.show', [$tarea->id]) !!}">{{$tarea->nombre}}</a>
                          </li>
                          @endforeach
                      </ul>
                  </div>

          </div>
          <!-- /.box-body -->
        </div>

      </div>



</section>



<!-- sample modal content -->
<div id="FotoPerfilModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Cargar imagen de perfil</h4>
            </div>
            {!! Form::open(['route'=>'profile.upload.photo', 'enctype'=>'multipart/form-data'])!!}
            <div class="modal-body">
                <h4>Puede cargar una foto nueva para su perfil</h4>
                {!! Form::hidden('user_id', Auth::user()->id)!!}
                {!! Form::file('profilephoto', ['class'=>'form-control', 'accept'=>'image/*']) !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light">Guardar imagen</button>
            </div>
            {!! Form::close()!!}
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@endsection
