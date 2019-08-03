<div class="panel panel-color panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">Registro de Avances</h3>
    </div>
    <div class="panel-body">

      <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#RegistroAvances">Registrar Avance</button>
    </div>
</div>

<!--  Modal content for the above example -->
  <div id="RegistroAvances" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title" id="myLargeModalLabel">Registrar Avance</h4>
              </div>
              {!! Form::open(['route' => 'tareas.avanceregistro']) !!}
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                        {!! Form::label('concepto', 'Concepto:') !!}
                        {!! Form::text('concepto', null, ['class' => 'form-control maxlen', 'required', 'maxlength' => '35']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('observaciones', 'Observaciones:') !!}
                        {!! Form::textarea('concepto', null, ['class' => 'form-control maxlen', 'required', 'maxlength' => '35']) !!}
                    </div>

                    <div class="form-group">
                    {!! Form::label('avance', 'Avance:') !!}
                    <div class="input-group bootstrap-touchspin">
                        {!! Form::number('avance', null, ['class' => 'form-control', 'required', 'max' => '100', 'min'=>'0']) !!}
                        <span class="input-group-addon bootstrap-touchspin-postfix">%</span>
                    </div>
                  </div>


                </div>

                </div>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary waves-effect waves-light">Registrar Avance</button>
            </div>
            {!! Form::close() !!}
          </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
