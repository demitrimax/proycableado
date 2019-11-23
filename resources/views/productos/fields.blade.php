@section('css')
<link href="{{asset('appzia/plugins/medium-editor/default.css')}}" rel="stylesheet">
<link href="{{asset('appzia/plugins/summernote/summernote.css')}}" rel="stylesheet">

@endsection
<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control maxlen', 'required', 'maxlength'=>'50']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::textarea('descripcion', null, ['class' => 'form-control texteditor']) !!}
</div>

<!-- Imagen Field -->
<div class="form-group col-sm-6">
    {!! Form::label('imagen', 'Imagen:') !!}
    <label class="custom-file">
    {!! Form::file('imagen', null, ['class' => 'form-control', 'class'=>'custom-file-control custom-file-control-inverse']) !!}
    <span ></span>
    </label>
</div>


<!-- Barcode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('barcode', 'Barcode:') !!}
    {!! Form::text('barcode', null, ['class' => 'form-control maxlen', 'maxlength'=>'20']) !!}
</div>

<!-- Codigo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('codigo_1', 'Código 1:') !!}
    {!! Form::text('codigo_1', null, ['class' => 'form-control maxlen', 'maxlength'=>'20']) !!}
</div>

<!-- Codigo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('codigo_2', 'Código 2:') !!}
    {!! Form::text('codigo_2', null, ['class' => 'form-control maxlen', 'maxlength'=>'20']) !!}
</div>

<!-- Codigo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('codigo_3', 'Código 3:') !!}
    {!! Form::text('codigo_3', null, ['class' => 'form-control maxlen', 'maxlength'=>'20']) !!}
</div>

<!-- Categoria Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categoria_id', 'Categoría:') !!}
    {!! Form::select('categoria_id', $categorias, null, ['class' => 'form-control', 'required', 'placeholder'=>'Seleccione']) !!}
</div>

<!-- Inventariable Field -->
<div class="form-group col-sm-6">
    <label class="ckbox checkbox-inline">
        {!! Form::hidden('inventariable', 0) !!}
        {!! Form::checkbox('inventariable', '1', null) !!} <span>Inventariable</span>  <button type="button" class="btn btn-sm btn-primary" data-toggle="popover" title="Inventariable" data-content="El material inventariable es aquel que no sufre un rápido deterioro por su uso, como herramienta, mobiliario"><i class="fa fa-question"></i></button>
    </label>
</div>

<!-- Umedida Field -->
<div class="form-group col-sm-6">
    {!! Form::label('umedida', 'Unidad de medida:') !!}
    {!! Form::text('umedida', null, ['class' => 'form-control maxlen', 'required', 'maxlength'=>'10']) !!}
</div>

<!-- Medida Field -->
<div class="form-group col-sm-6">
    {!! Form::label('medida', 'Medida:') !!}
    {!! Form::text('medida', null, ['class' => 'form-control maxlen', 'required', 'maxlength'=>'30']) !!}
</div>

<!-- Stock Min Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stock_min', 'Stock Min:') !!}
    {!! Form::number('stock_min', null, ['class' => 'form-control']) !!}
</div>


<!-- Precio Compra Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pcompra', 'Precio de Compra:') !!}
    <div class="input-group">
      <span class="input-group-addon tx-size-sm lh-2">$</span>
      {!! Form::number('pcompra', null, ['class' => 'form-control', 'required', 'step'=>'0.01', 'aria-label'=>'Amount (to the nearest dollar)']) !!}
    </div>
</div>

<!-- Precio Venta Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pventa', 'Precio de Venta:') !!}
    <div class="input-group">
      <span class="input-group-addon tx-size-sm lh-2">$</span>
      {!! Form::number('pventa', null, ['class' => 'form-control', 'required', 'step'=>'0.01', 'aria-label'=>'Amount (to the nearest dollar)']) !!}
    </div>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('productos.index') !!}" class="btn btn-default">Cancelar</a>
</div>

@section('scripts')
<script src="{{asset('appzia/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')}}" type="text/javascript"></script>
<script src="{{asset('appzia/plugins/medium-editor/medium-editor.js')}}"></script>
<script src="{{asset('appzia/plugins/summernote/summernote.min.js')}}"></script>

<script>
      $(function(){
        'use strict';

        // Summernote editor
        $('.texteditor').summernote({
          height: 150,
          tooltip: false
        })
      });
      //Bootstrap-MaxLength
         $('.maxlen').maxlength();
         $(function () {
           $('[data-toggle="popover"]').popover()
         })
</script>
@endsection
