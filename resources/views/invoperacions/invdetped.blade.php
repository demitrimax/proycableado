<div class="panel pd-20 pd-sm-40">
          <h6 class="panel-body-title">Operación ID: {!! $invoperacion->folio !!}</h6>
          <p class="mg-b-20 mg-sm-b-30">Tipo de Operación:<b> {!! $invoperacion->tipo_mov !!}</b> <span class="badge badge-{{$invoperacion->estatush['label']}}">{!! $invoperacion->estatush['estado'] !!}</span></p>

          <div class="form-layout">
            <div class="row">

            @if($invoperacion->proveedor_id)
              <div class="col-md-4">
                  {!! Form::label('proveedor_id', 'Proveedor:') !!}
                  {!! Form::text('proveedor', $invoperacion->proveedor->nombre, ['class'=>'form-control', 'readonly']) !!}
              </div><!-- col-4 -->
              @endif
              @if($invoperacion->cliente_id)
              <div class="col-md-4">
                  {!! Form::label('cliente', 'Cliente:') !!}
                  {!! Form::text('cliente', $invoperacion->cliente->nombre, ['class'=>'form-control', 'readonly']) !!}
              </div><!-- col-4 -->
              @endif
              <div class="col-md-2">
                  {!! Form::label('fecha', 'Fecha:') !!}
                  {!! Form::text('fecha', $invoperacion->fecha->format('d-m-Y'), ['class'=>'form-control text-right', 'readonly']) !!}
              </div><!-- col-4 -->

              @if($invoperacion->facturara_id)
              <div class="col-md-4">
                  {!! Form::label('facturar_a', 'Empresa:') !!}
                  {!! Form::text('facturar_a', $invoperacion->facturara->nombre, ['class'=>'form-control', 'readonly']) !!}
              </div><!-- col-4 -->
              @endif

              <div class="col-md-4">
                  {!! Form::label('numfactura', 'Número de Factura:') !!}
                  {!! Form::text('numfactura', $invoperacion->numfactura, ['class'=>'form-control', 'readonly']) !!}
              </div><!-- col-4 -->

            </div><!-- row -->


          </div><!-- form-layout -->
        </div>
