@extends('layouts.app')

@section('title',config('app.name').' | Inventario Prestamos' )

@section('css')
<link href="{{asset('appzia/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet">
<link href="{{asset('airdatepicker/dist/css/datepicker.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('appzia/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
  @stack('css')
@endsection

@section('scripts')
<script src="{{asset('appzia/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')}}" type="text/javascript"></script>
<script src="{{asset('airdatepicker/dist/js/datepicker.min.js')}}"></script>
<script src="{{asset('airdatepicker/dist/js/i18n/datepicker.es.js')}}"></script>
<script src="{{asset('appzia/plugins/select2/js/select2.full.min.js')}}"></script>
<script>
     //Bootstrap-MaxLength
        $('.maxlen').maxlength();
        $(function () {
          $('[data-toggle="popover"]').popover()
        })

        $(document).ready(function() {
            $('.select2').select2();
        });

</script>
  @stack('scripts')
@endsection

@section('content')

  @component('components.com_panel', ['title'=>'Datos del prestamo', 'color'=>'info'])
      {!! Form::open(['route'=>'inventario.registro.prestamo'])!!}
        <div class="form-group col-md-6">
            <label class="col-md-2 control-label">Seleccione el Empleado:</label>
            <div class="col-md-10">
              {!!  Form::select('empleado_id', $empleados->pluck('nombrecompleto','id'), null, ['class'=>'form-control select2', 'placeholder'=>'Seleccione el usuario', 'required' ]) !!}
            </div>
        </div>
        <div class="form-group col-md-6">
            <label class="col-md-2 control-label">Herramienta/ Artículo:</label>
            <div class="col-md-10">
              {!!  Form::select('producto_id', $productos->pluck('nombreserie','id'), null, ['class'=>'form-control select2', 'placeholder'=>'Seleccione el producto', 'required' ]) !!}
            </div>
        </div>

        <button type="submit" class="btn btn-primary waves-effect waves-light">Registrar prestamo</button>
        {!! Form::close() !!}
  @endcomponent


@endsection
