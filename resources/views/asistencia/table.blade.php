@section('css')
<!-- Summernote css -->
<link href="{{asset('appzia/plugins/summernote/summernote.css')}}" rel="stylesheet" />
<link href="{{asset('appzia/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet">
<link href="{{asset('airdatepicker/dist/css/datepicker.min.css')}}" rel="stylesheet" type="text/css">
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('appzia/plugins/datatables/dataTables.bootstrap.min.css')}}">
@endsection

{!! Form::open(['route' => 'asistencia.registrar', 'id'=>'formasistencia'])!!}
<div class="form-group col-md-6">
    {!! Form::label('fecha', 'Fecha:') !!}<button type="button" class="btn btn-sm btn-primary" data-toggle="popover" title="Formato de Fecha" data-content="Escriba la fecha en formato yyyy-mm-dd o utilice el selector de fecha."><i class="fa fa-question"></i></button>
  <div class="input-group">
    @php
      $fecha = date('Y-m-d');
      //dd($asistencia);
      if(isset($mifecha)){
        $fecha = $mifecha;

      }
    @endphp
    {!! Form::text('fecha', date('Y-m-d'), ['id'=>'fecha','placeholder'=>'yyyy-mm-dd','class' => 'form-control datepicker-here', 'data-language'=>'es', 'data-date-format'=>'yyyy-mm-dd', 'required', 'pattern'=>'(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))' ] ) !!}
      <span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar"></i></span>
      <span class="input-group-addon bg-custom b-0"><button class="btn btn-info btn-xs" type="button" onclick="FiltroFecha()">Filtrar por Fecha</button></span>
  </div>

</div>


<table class="table table-responsive" id="empleados-table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>CURP</th>
            <th> <div class="checkbox checkbox-success"> {!! Form::checkbox('selectall', 1, 0, ['class'=>'form-control', 'id'=>'selectall'])!!} {!! Form::label('selectall', 'Asistencia') !!}</div></th>
            <th>Retardo</th>
            <th title="Tiempo Extra">Extra</th>
            <th>Comentario</th>
        </tr>
    </thead>
    <tbody>
    @foreach($empleados as $empleados)
        <tr>
            <td><img src="{{asset($empleados->ufoto)}}" alt="user-img" class="thumb-sm img-circle">
              {!! $empleados->nombre.' '.$empleados->apellidos !!}</td>
            <td>{!! $empleados->curp !!}</td>
            {!! Form::hidden('empleados['.$empleados->id.'][id]', $empleados->id) !!}
            <td>
              @php
                $asisten = false;
                $retardo = false;
                $extra = false;
                //dd($asistencia);
                foreach($asistencia->where('empleado_id',$empleados->id) as $asiste){
                  //dd($asiste);
                  $asisten = false;
                  $retardo = false;
                  $extra = false;
                  if($asiste->fecha){
                    $asisten = true;
                  }
                  if($asiste->extra == 1){
                    $extra = true;
                  }
                  if($asiste->retardo == 1){
                    $retardo = true;
                  }
                }

              @endphp

              <div class="checkbox checkbox-success">

                    {!! Form::hidden('empleados['.$empleados->id.'][asistencia]', 0) !!}
                    {!! Form::checkbox('empleados['.$empleados->id.'][asistencia]', 1, $asisten, ['value'=>$asisten, 'class'=>'asisten']) !!}
                    {!! Form::label('empleados['.$empleados->id.'][asistencia]', 'A') !!}
                </div>

            </td>
            <td>

                <div class="checkbox checkbox-warning">
                        {!! Form::hidden('empleados['.$empleados->id.'][retardo]', 0) !!}
                        {!! Form::checkbox('empleados['.$empleados->id.'][retardo]', 1, $retardo) !!}
                        {!! Form::label('empleados['.$empleados->id.'][retardo]', 'R') !!}
              </div>

            </td>
            <td>

              <div class="checkbox checkbox-info">
                {!! Form::hidden('empleados['.$empleados->id.'][extra]', 0) !!}
                {!! Form::checkbox('empleados['.$empleados->id.'][extra]', 1, $extra) !!}
                {!! Form::label('empleados['.$empleados->id.'][extra]', 'TE') !!}
                </div>

            </td>
            <td>
              {{Form::text('empleados['.$empleados->id.'][comentario]', null, ['class'=>'form-control', 'maxlength'=>'50', 'placeholder'=>'Escriba un comentario para la asistencia'])}}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<button type="submit" class="btn btn-success" >Guardar Asistencia</button>
{!! Form::close() !!}

@section('scripts')
<script src="{{asset('appzia/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')}}" type="text/javascript"></script>
<script src="{{asset('airdatepicker/dist/js/datepicker.min.js')}}"></script>
<script src="{{asset('airdatepicker/dist/js/i18n/datepicker.es.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('appzia/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('appzia/plugins/datatables/dataTables.bootstrap.js')}}"></script>
<script>

  $('#fecha').datepicker({
      language: 'es',
      maxDate: new Date() // Now can select only dates, which goes after today,

  })

  var dp = $('#fecha').datepicker().data('datepicker');

  @isset($mifecha)
  var miFecha = new Date('{{$mifecha}}')
  dp.selectDate(miFecha);
  @else
    dp.selectDate(new Date());
  @endisset
  function FiltroFecha() {
    var fecha = $('#fecha').val();
    if (fecha.length > 7) {
      var form = document.getElementById('formasistencia');
      form.action='{{url('asistencia/filtro/fecha')}}';
      form.submit();
    }

  }
  $("#selectall").on("click", function() {
    //alert('Se ha cambiado la propiedad');
    $(".asisten").prop("checked", this.checked);
  });
</script>
@endsection
