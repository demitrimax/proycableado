@section('css')
<!-- Summernote css -->
<link href="{{asset('appzia/plugins/summernote/summernote.css')}}" rel="stylesheet" />
<link href="{{asset('appzia/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet">
<link href="{{asset('airdatepicker/dist/css/datepicker.min.css')}}" rel="stylesheet" type="text/css">

@endsection
<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control maxlen', 'required', 'maxlength'=>'35']) !!}
</div>

<!-- Apellidos Field -->
<div class="form-group col-sm-6">
    {!! Form::label('apellidos', 'Apellidos:') !!}
    {!! Form::text('apellidos', null, ['class' => 'form-control maxlen', 'required', 'maxlength'=>'60' ]) !!}
</div>

<!-- Curp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('curp', 'CURP:') !!}
    {!! Form::text('curp', null, ['class' => 'form-control maxlen', 'maxlength'=>'18']) !!}
</div>

<!-- RFC Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rfc', 'RFC:') !!}
    {!! Form::text('rfc', null, ['class' => 'form-control maxlen', 'maxlength'=>'13']) !!}
</div>

<!-- NSS Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nss', 'NSS:') !!} <span class="badge badge-info" data-toggle="tooltip" data-placement="top" title="Número de Seguridad Social"><i class="fa fa-info-circle"></i></span>
    {!! Form::text('nss', null, ['class' => 'form-control maxlen', 'maxlength'=>'11']) !!}
</div>
@php
  $fechaingreso = null;
  if(isset($empleados->fingreso))
  {
    $fechaingreso = $empleados->fingreso->format('Y-m-d');
  }
@endphp
<!-- Fecha de Ingreso Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fingreso', 'Fecha de Ingreso:') !!} <span class="badge badge-info" data-toggle="tooltip" data-placement="top" title="Fecha de Ingreso"><i class="fa fa-info-circle"></i></span>
    {!! Form::text('fingreso', $fechaingreso, ['class' => 'form-control datepicker-here', 'data-language'=>'es', 'data-date-format'=>'yyyy-mm-dd', 'title'=>'Fecha de Ingreso']) !!}
</div>
@php
  $fechanacimiento = null;
  if(isset($empleados->fnacimiento))
  {
    $fechanacimiento = $empleados->fnacimiento->format('Y-m-d');
  }
@endphp
<!-- Fecha de Nacimiento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fnacimiento', 'Fecha de Nacimiento:') !!} <span class="badge badge-info" data-toggle="tooltip" data-placement="top" title="Fecha de Nacimiento"><i class="fa fa-info-circle"></i></span>
    {!! Form::text('fnacimiento', $fechanacimiento, ['class' => 'form-control datepicker-here', 'data-language'=>'es', 'data-date-format'=>'yyyy-mm-dd', 'title'=>'Fecha de Nacimiento']) !!}
</div>
@php
  $bajaval = 0;
  if(isset($empleados->bajatemp)){
    $bajaval = 1;
    if($empleados->bajaval == 0){
      $bajaval = 0;
    }
  }
@endphp
@isset($empleados->nombre)
<!-- Curp Field -->
<div class="form-group col-sm-6">
    <div class="checkbox checkbox-primary">
    {!! Form::hidden('bajatemp', 0)!!}
    {!! Form::checkbox('bajatemp', 1, $bajaval) !!}
    {!! Form::label('bajatemp', 'Baja Temporal') !!}
  </div>
</div>
@endisset

<div class="form-group col-sm-12">
    {!! Form::label('comentario', 'Comentarios:') !!}
    {!! Form::textarea('comentario', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('empleados.index') !!}" class="btn btn-default">Cancelar</a>
</div>

@section('scripts')
<script src="{{asset('appzia/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')}}" type="text/javascript"></script>
<script src="{{asset('airdatepicker/dist/js/datepicker.min.js')}}"></script>
<script src="{{asset('airdatepicker/dist/js/i18n/datepicker.es.js')}}"></script>

        <!--Summernote js-->
        <script src="{{asset('appzia/plugins/summernote/summernote.min.js')}}"></script>
        <script>
        //Bootstrap-MaxLength
           $('.maxlen').maxlength();

           $(function () {
             $('[data-toggle="popover"]').popover()
           })
            jQuery(document).ready(function(){

                $('.summernote').summernote({
                    height: 200,                 // set editor height

                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor

                    focus: true                 // set focus to editable area after initializing summernote
                });

            });
        </script>


@endsection
