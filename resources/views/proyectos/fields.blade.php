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
    {!! Form::label('supervidor', 'Supervisor:', ['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
    {!! Form::text('supervidor', null, ['class' => 'form-control', 'maxlength'=>'100']) !!}
  </div>
</div>
@php
  $finicio = null;
  $ftermino = null;
  if (isset($proyectos->finicio))
  {
    $finicio = date('Y-m-d', strtotime($proyectos->finicio));
  }
  if (isset($proyectos->ftermino))
  {
    $ftermino = date('Y-m-d', strtotime($proyectos->ftermino));
  }

@endphp
<!-- Finicio Field -->
<div class="form-group">
    {!! Form::label('finicio', 'Fecha de inicio:', ['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
    {!! Form::date('finicio', $finicio, ['class' => 'form-control','id'=>'finicio']) !!}
  </div>
</div>

@section('scripts')
    <script type="text/javascript">
        $('#finicio').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Ftermino Field -->
<div class="form-group">
    {!! Form::label('ftermino', 'Fecha de Termino:', ['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
    {!! Form::date('ftermino', $ftermino, ['class' => 'form-control','id'=>'ftermino']) !!}
  </div>
</div>

@section('scripts')
    <script type="text/javascript">
        $('#ftermino').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Identificacion Field -->
<div class="form-group">
    {!! Form::label('identificacion', 'Identificacion:', ['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
    {!! Form::select('identificacion', ['','OB','DTTO','ID','OT','SISA'],null, ['class' => 'form-control']) !!}
  </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('proyectos.index') !!}" class="btn btn-default">Cancelar</a>
</div>
