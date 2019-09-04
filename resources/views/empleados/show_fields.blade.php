<div class="row">
  <div class="clearfix"></div>

  @include('flash::message')
  @include('adminlte-templates::common.errors')

  <div class="clearfix"></div>

        <div class="col-lg-6">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Datos del Empleado</h3>
            </div>
          <div class="panel-body panel-profile">
            <a href="javascript:verAvatar();">
            <img class="profile-user-img img-responsive img-circle thumb-md center-block" src="{{asset($empleados->ufoto)}}" alt="User profile picture">
          </a>
            <h3 class="profile-username text-center">{{$empleados->nombre.' '.$empleados->apellidos}}</h3>

            <p class="text-muted text-center">{{Auth::user()->cargo}}</p>

            <ul class="list-group list-group-unbordered">
              @if($empleados->fingreso)
              <li class="list-group-item">
                <b>Fecha de Ingreso</b> <a class="pull-right">{{$empleados->fingreso->format('M, Y')}}</a>
              </li>
              @endif
              <li class="list-group-item">
                <b>CURP</b> <a class="pull-right">{{$empleados->curp}}</a>
              </li>
              <li class="list-group-item">
                <b>RFC</b> <a class="pull-right">{{$empleados->rfc}}</a>
              </li>
              <li class="list-group-item">
                <b>NSS</b> <a class="pull-right">{{$empleados->nss}}</a>
              </li>

              <li class="list-group-item">
                <b>Fecha de Nacimiento</b> <a class="pull-right">
                  @if($empleados->fnacimiento)
                  {{$empleados->fnacimiento->format('d-m-Y')}}
                  @endif
                </a>
              </li>
              <li class="list-group-item">
                <b>Comentarios</b> <br><textarea class="pull-right">{{$empleados->comentario}}</textarea>
              </li>
              <li class="list-group-item">
                <b>Estatus</b> <a class="pull-right">
                  {!! $empleados->bajatemp == 1 ? '<span class="label label-danger">Baja Temporal</span>' : '<span class="label label-success">Activo</span>' !!}</a>
              </li>
            </ul>

            <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#FotoEmpleadoModal"><b>Cambiar Foto de Perfil</b></button>
          </div>
          <!-- /.box-body -->
        </div>
      </div>
      @include('empleados.expediente')

    </div>

    <!-- sample modal content -->
    <div id="FotoEmpleadoModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Cargar imagen de empleado</h4>
                </div>
                {!! Form::open(['route'=>'empleado.upload.photo', 'enctype'=>'multipart/form-data'])!!}
                <div class="modal-body">

                    {!! Form::hidden('empleado_id', $empleados->id)!!}
                    {!! Form::file('empleadophoto', ['class'=>'form-control', 'accept'=>'image/*']) !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Guardar imagen</button>
                </div>
                {!! Form::close()!!}
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    @section('scripts')
    <script>
    function verAvatar()
    {
      Swal.fire({
        title: 'Foto del Empleado',
        text: 'Foto del archivo',
        imageUrl: '{{asset($empleados->ufoto)}}',
        imageWidth: 400,
        imageHeight: 300,
        imageAlt: 'Foto de Empleado',
        animation: true
      })
    }
    </script>
    @endsection
