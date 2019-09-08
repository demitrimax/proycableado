<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control maxlen', 'required', 'maxlength'=>'50']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::textarea('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('modelo', 'Modelo que aplica:') !!}
    {!! Form::text('modelo', null, ['class' => 'form-control', 'placeholder'=>'ej. Proyectos','required']) !!}
</div>

<!-- Imagen Field -->
<div class="form-group col-sm-6">
    {!! Form::label('imagen', 'Imagen:') !!}
    {!! Form::text('imagen', null, ['class' => 'form-control']) !!}
</div>

<!-- Icono Field -->
<div class="form-group col-sm-6">
    {!! Form::label('icono', 'Icono:') !!}
    {!! Form::text('icono', null, ['class' => 'form-control icp icp-auto']) !!}
</div>

<!-- Color Field -->
<div class="form-group col-sm-6">
    {!! Form::label('color', 'Color:') !!}
    {!! Form::text('color', null, ['class' => 'form-control colorpicker-default']) !!}
</div>
@php
  $icono = null;
  if(isset($docscategorias->icono)){
    $icono = $docscategorias->icono;
  }
@endphp

<div class="form-group col-sm-6">
  <p class="lead">
      <i class="{!! $icono ? $icono : 'fa fa-graduation-cap' !!}
      fa-3x picker-target"></i>
  </p>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('docscategorias.index') !!}" class="btn btn-default">Cancelar</a>
</div>

@section('css')
<link href="{{asset('vendor/fa-iconpicker/dist/css/fontawesome-iconpicker.min.css')}}" rel="stylesheet">
<link href="{{asset('appzia/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}" rel="stylesheet">
@endsection

@section('scripts')
<script src="{{asset('appzia/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')}}" type="text/javascript"></script>
<script src="{{asset('airdatepicker/dist/js/datepicker.min.js')}}"></script>
<script src="{{asset('airdatepicker/dist/js/i18n/datepicker.es.js')}}"></script>
<script src="{{asset('vendor/fa-iconpicker/dist/js/fontawesome-iconpicker.js')}}"></script>
<script src="{{asset('appzia/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>

    <script>
    //Bootstrap-MaxLength
       $('.maxlen').maxlength();
        $('.icp-auto').iconpicker();

        $('.icp').on('iconpickerSelected', function (e) {
     $('.lead .picker-target').get(0).className = 'picker-target fa-3x ' +
       e.iconpickerInstance.options.iconBaseClass + ' ' +
       e.iconpickerInstance.options.fullClassFormatter(e.iconpickerValue);
   });
   $('.colorpicker-default').colorpicker({
            format: 'hex'
        });

    </script>


@endsection
