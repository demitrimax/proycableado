
<div class="table-responsive">
  @if($proyectos->comentarios->count()>0)
  <table class="table table-bordered">
    <thead>
    <tr>
        <th>No.</th>
        <th>Fecha</th>
        <th>Comentario</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
      @foreach($proyectos->comentarios as $key=>$comentario)
    <tr>
        <td>{!! $key+1 !!}</td>
        <td>
          {{$comentario->created_at->format('d-m-Y')}}</a>
        </td>
        <td>{{$comentario->comentario}}</td>
        <td> <a href="{!! url('proyectos/comentario/'.$comentario->id.'/eliminar')!!}">Eliminar</a>     </td>
    </tr>
    @endforeach
    </tbody>
</table>
@else
No existen comentarios para el proyecto.
@endif

<button title="Agregar Comentario" type="button" class="btn waves-effect btn-primary" data-toggle="modal" data-target="#addComentario"> <i class="ion ion-document-text"></i> Agregar Comentario</button>
</div>


<div id="addComentario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
      <div class="modal-content">
          {!! Form::open(['route' => 'comentarios.agregar']) !!}
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" id="myModalLabel">Agregar un comentario</h4>
          </div>
          <div class="modal-body">
              {!! Form::hidden('redirect', 'proyectos.show')!!}
              {!! Form::hidden('proyecto_id', $proyectos->id)!!}
              <!-- Nombre Doc Field -->
              <div class="form-group">
                  {!! Form::label('comentario', 'Comentario:') !!}
                  {!! Form::text('comentario', null, ['class' => 'form-control maxlen', 'maxlength' => '150']) !!}
              </div>


          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary waves-effect waves-light">Agregar</button>
          </div>
          {!! Form::close() !!}
      </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>

@push('scripts')
<script src="{{asset('appzia/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')}}" type="text/javascript"></script>
<script>
//Bootstrap-MaxLength
   $('.maxlen').maxlength();
</script>
@endpush
