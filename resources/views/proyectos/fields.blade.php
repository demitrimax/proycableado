<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Supervidor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('supervidor', 'Supervidor:') !!}
    {!! Form::text('supervidor', null, ['class' => 'form-control']) !!}
</div>

<!-- Finicio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('finicio', 'Finicio:') !!}
    {!! Form::date('finicio', null, ['class' => 'form-control','id'=>'finicio']) !!}
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
<div class="form-group col-sm-6">
    {!! Form::label('ftermino', 'Ftermino:') !!}
    {!! Form::date('ftermino', null, ['class' => 'form-control','id'=>'ftermino']) !!}
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
<div class="form-group col-sm-6">
    {!! Form::label('identificacion', 'Identificacion:') !!}
    {!! Form::text('identificacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Cat Cotratistas Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cat_cotratistas_id', 'Cat Cotratistas Id:') !!}
    {!! Form::number('cat_cotratistas_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Cat Pais-Division Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cat_pais-division_id', 'Cat Pais-Division Id:') !!}
    {!! Form::number('cat_pais-division_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Cat Areaciudad Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cat_areaciudad_id', 'Cat Areaciudad Id:') !!}
    {!! Form::number('cat_areaciudad_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Cat Productos Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cat_productos_id', 'Cat Productos Id:') !!}
    {!! Form::number('cat_productos_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Estatus Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estatus_id', 'Estatus Id:') !!}
    {!! Form::text('estatus_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('proyectos.index') !!}" class="btn btn-default">Cancelar</a>
</div>
