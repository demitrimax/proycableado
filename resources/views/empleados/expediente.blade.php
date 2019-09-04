<div class="col-lg-6">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Expediente</h3>
    </div>
  <div class="panel-body panel-profile">

    <ul class="list-group list-group-unbordered">
      @foreach($empleados->documentos as $key=>$documento)
      <li class="list-group-item">
        <b>{{$documento->categoria->nombre}}</b> <a class="pull-right" href="{{url('verdoc/'.$documento->id)}}">{{$documento->nombre_doc}}</a>
      </li>
      @endforeach

    </ul>

    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#AgregarDocumento"><b>Agregar Documento</b></button>
  </div>
  <!-- /.box-body -->
</div>
</div>

<!-- sample modal content -->
<div id="AgregarDocumento" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Carga de Documentos del Empleado</h4>
            </div>
            {!! Form::open(['route'=>'empleado.carga.documento', 'enctype'=>'multipart/form-data'])!!}
            <div class="modal-body">
              <p>Cargue el Documento del expediente</p>
              <div class="form-group">
                {!! Form::label('descripcion', 'Descripción:') !!}
                {!! Form::textarea('descripcion', null, ['class'=>'form-control']) !!}
              </div>
              <div class="form-group">
                {!! Form::label('categoria_id', 'Categoría:') !!}
                {!! Form::select('categoria_id', $categoriasDoc, null, ['class'=>'form-control', 'placeholder'=>'Seleccione una categoría', 'required']) !!}
              </div>
              <div class="form-group">
                {!! Form::hidden('empleado_id', $empleados->id)!!}
                {!! Form::file('empleadodoc', ['class'=>'form-control']) !!}
              </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light">Cargar Documento</button>
            </div>
            {!! Form::close()!!}
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
