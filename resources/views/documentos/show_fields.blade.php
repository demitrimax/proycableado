<!-- Id Field -->
<tr>
  <th>{!! Form::label('id', 'Id:') !!}</th>
  <td>{!! $documentos->id !!}</td>
</tr>


<!-- Nombre Doc Field -->
<tr>
  <th>{!! Form::label('nombre_doc', 'Nombre Doc:') !!}</th>
  <td>{!! $documentos->nombre_doc !!}</td>
</tr>


<!-- File Servidor Field -->
<tr>
  <th>{!! Form::label('file_servidor', 'File Servidor:') !!}</th>
  <td>{!! $documentos->file_servidor !!}</td>
</tr>


<!-- Descripcion Field -->
<tr>
  <th>{!! Form::label('descripcion', 'Descripcion:') !!}</th>
  <td>{!! $documentos->descripcion !!}</td>
</tr>


<!-- Created At Field -->
<tr>
  <th>{!! Form::label('created_at', 'Creado el:') !!}</th>
  <td>{!! $documentos->created_at->format('d-m-Y h:i:s') !!}</td>
</tr>


<!-- Updated At Field -->
<tr>
  <th>{!! Form::label('updated_at', 'Actualizado el:') !!}</th>
  <td>{!! $documentos->updated_at->format('d-m-Y h:i:s') !!}</td>
</tr>
