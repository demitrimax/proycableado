<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Ubicacion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('ubicacion', 'Ubicacion:') !!}
    {!! Form::textarea('ubicacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('bodegas.index') !!}" class="btn btn-default">Cancelar</a>
</div>
