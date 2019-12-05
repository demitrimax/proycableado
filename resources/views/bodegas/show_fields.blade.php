<!-- Id Field -->
<tr>
  <th>{!! Form::label('id', 'Id:') !!}</th>
  <td>{!! $bodegas->id !!}</td>
</tr>


<!-- Nombre Field -->
<tr>
  <th>{!! Form::label('nombre', 'Nombre:') !!}</th>
  <td>{!! $bodegas->nombre !!}</td>
</tr>


<!-- Ubicacion Field -->
<tr>
  <th>{!! Form::label('ubicacion', 'Ubicacion:') !!}</th>
  <td>{!! $bodegas->ubicacion !!}</td>
</tr>


<!-- Created At Field -->
<tr>
  <th>{!! Form::label('created_at', 'Creado el:') !!}</th>
  <td>{!! $bodegas->created_at->format('d-m-Y H:i:s') !!}</td>
</tr>


<!-- Updated At Field -->
<tr>
  <th>{!! Form::label('updated_at', 'Actualizado el:') !!}</th>
  <td>{!! $bodegas->updated_at->format('d-m-Y H:i:s') !!}</td>
</tr>
