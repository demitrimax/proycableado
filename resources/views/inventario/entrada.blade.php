@extends('layouts.app')

@section('title',config('app.name').' | Inventario Entrada' )

@section('css')
<link href="{{asset('appzia/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet">
<link href="{{asset('airdatepicker/dist/css/datepicker.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('appzia/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
  @stack('css')
@endsection

@section('content')
<div class="clearfix"></div>

@include('flash::message')

@include('adminlte-templates::common.errors')
<div class="clearfix"></div>

{!! Form::open(['route'=>'inventario.regentrada', 'id'=>'RegistroInventario'])!!}
  {!! Form::hidden('usuario_id', Auth::user()->id) !!}
  {!! Form::hidden('tipo_mov', 'Entrada') !!}
<div class="panel panel-primary">
          <div class="panel-heading">Registro de Entradas del Inventario</div>


          <div class="form-layout">
            <div class="row">

              <div class="col-lg-8">
                <div class="form-group">
                  <label class="form-control-label">Proveedor: <span class="tx-danger">*</span></label>
                  {!! Form::select('proveedor_id', $proveedores, null, ['class'=>'form-control', 'required', 'placeholder'=>'Selecciones un proveedor'])!!}
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Fecha: <span class="tx-danger">*</span></label>
                  {!! Form::text('fecha', Date('Y-m-d'), ['class' => 'form-control datepicker-here', 'required','id'=>'finicio', 'data-language'=>'es', 'data-date-format'=>'yyyy-mm-dd', 'pattern'=>'(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))'] )!!}
                </div>
              </div><!-- col-4 -->


              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Bodega: <span class="tx-danger">*</span></label>
                  {!! Form::select('bodega_id', $bodegas, null, ['class' => 'form-control', 'required'] )!!}
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Número de Factura:</label>
                  {!! Form::text('numfactura', null, ['class' => 'form-control'] )!!}
                </div>
              </div><!-- col-4 -->

            </div><!-- row -->
            <div class="row mg-b-25">
              <div class="col-lg-12">

                <div class="panel panel-primary bd-0">
                  <div class="panel-heading card-header-default bg-primary">
                    PRODUCTOS
                  </div><!-- card-header -->

                  <div class="panel-body bd bd-t-0">
                    @include('inventario.products')
                    <p class="mg-b-0"></p>

                  </div><!-- card-body -->
                </div>
              </div>

            </div>

            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5" type="submit">Registrar Solicitud</button>
              <button class="btn btn-secondary" type="reset">Cancelar</button>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
        </div>
        {!! Form::close()!!}

  @endsection

  @section('scripts')
  <script src="{{asset('appzia/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('airdatepicker/dist/js/datepicker.min.js')}}"></script>
  <script src="{{asset('airdatepicker/dist/js/i18n/datepicker.es.js')}}"></script>
  <script>
       //Bootstrap-MaxLength
          $('.maxlen').maxlength();
          $(function () {
            $('[data-toggle="popover"]').popover()
          })
          //script ajax productos
          
  </script>
    @stack('scripts')
  @endsection
