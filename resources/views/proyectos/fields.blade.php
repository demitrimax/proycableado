@section('css')

        <link href="{{asset('airdatepicker/dist/css/datepicker.min.css')}}" rel="stylesheet" type="text/css">

@endsection

@php
$valgenerico = false;
if (isset($proyectos->generico)){
  if ($proyectos->generico == 1)
  $valgenerico = true;
}
@endphp

  <!-- Generico Field -->
  <div class="form-group">
      {!! Form::label('generico', 'Generico:', ['class'=>'col-md-2 control-label']) !!}
      <div class="col-md-10">
      {!! Form::checkbox('generico', '1', $valgenerico, ['class' => 'checkbox checkbox-primary']) !!}
    </div>
  </div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:', ['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
    {!! Form::text('nombre', null, ['class' => 'form-control', 'maxlength'=>'100', 'required']) !!}
  </div>
</div>

<!-- Cat Cotratistas Id Field -->
<div class="form-group">
    {!! Form::label('cat_cotratistas_id', 'Cotratista:', ['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
    {!! Form::select('cat_cotratistas_id', $contratistas, null, ['class' => 'form-control']) !!}
  </div>
</div>

<!-- Cat Pais-Division Id Field -->
<div class="form-group">
    {!! Form::label('cat_pais-division_id', 'Pais-Division:', ['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
    {!! Form::select('cat_paisdivision_id', $catpaisdivision, null, ['class' => 'form-control']) !!}
  </div>
</div>

<!-- Cat Areaciudad Id Field -->
<div class="form-group">
    {!! Form::label('cat_areaciudad_id', 'Area-Ciudad:', ['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
    {!! Form::select('cat_areaciudad_id', $catareaciudad, null, ['class' => 'form-control']) !!}
  </div>
</div>

<!-- Cat Productos Id Field -->
<div class="form-group">
    {!! Form::label('cat_productos_id', 'Producto:', ['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
    {!! Form::select('cat_productos_id', $catproducto, null, ['class' => 'form-control']) !!}
  </div>
</div>

<!-- Supervidor Field -->
<div class="form-group">
    {!! Form::label('supervisor', 'Supervisor:', ['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
    {!! Form::text('supervisor', null, ['class' => 'form-control', 'maxlength'=>'100', 'required']) !!}
  </div>
</div>
@php
  $finicio = null;
  $ftermino = null;
  $fechas = null;
  if (isset($proyectos->finicio))
  {
    if (isset($proyectos->ftermino))
    {
      $finicio = date('d-m-Y', strtotime($proyectos->finicio));
      $ftermino = date('d-m-Y', strtotime($proyectos->ftermino));
      $fechas = $finicio." : ".$ftermino;
    }

  }


@endphp
<!-- Finicio Field -->
<div class="form-group date">
    {!! Form::label('fechas', 'Rango de Fechas:', ['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10" id="finicio-container">
    {!! Form::text('fechas', $fechas, ['class' => 'form-control datepicker-here', 'data-language'=>'es', 'data-range'=>'true', 'data-multiple-dates-separator'=>' : ', 'data-date-format'=>'yyyy-mm-dd', 'pattern'=>'.{23}', 'title'=>'Rango de Fechas']) !!}
  </div>
</div>


<!-- Identificacion Field -->
<div class="form-group">
    {!! Form::label('identificacion', 'Identificacion:', ['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
    {!! Form::select('identificacion', [''=>'','OB'=>'OB','DTTO'=>'DTTO','ID'=>'ID','OT'=>'OT','SISA'=>'SISA'],null, ['class' => 'form-control']) !!}
  </div>
</div>

<!-- Identificacion Field -->
<div class="form-group">
    {!! Form::label('observaciones', 'Observaciones:', ['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
    {!! Form::textarea('observaciones', null, ['class' => 'form-control']) !!}
  </div>
</div>


<!-- Identificacion Field -->
<div class="form-group">
    {!! Form::label('documento', 'Adjuntar archivo:', ['class'=>'col-md-2 control-label']) !!} <button type="button" class="btn btn-xs btn-default" data-toggle="tooltip" data-placement="top" title="Esto adjuntará otro documento al proyecto"><i class="fa fa-question-circle-o"></i></button>
    <div class="col-md-10">
    {!! Form::file('documento', null, ['class' => 'form-control fileupload']) !!}
  </div>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! url()->previous() !!}" class="btn btn-default">Cancelar</a>
</div>

@section('scripts')
<script src="{{asset('airdatepicker/dist/js/datepicker.min.js')}}"></script>
<script src="{{asset('airdatepicker/dist/js/i18n/datepicker.es.js')}}"></script>

@endsection
