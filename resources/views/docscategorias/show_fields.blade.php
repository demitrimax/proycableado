<!-- Id Field -->
<tr>
  <th>{!! Form::label('id', 'Id:') !!}</th>
  <td>{!! $docscategorias->id !!}</td>
</tr>


<!-- Nombre Field -->
<tr>
  <th>{!! Form::label('nombre', 'Nombre:') !!}</th>
  <td>{!! $docscategorias->nombre !!}</td>
</tr>


<!-- Descripcion Field -->
<tr>
  <th>{!! Form::label('descripcion', 'Descripcion:') !!}</th>
  <td>{!! $docscategorias->descripcion !!}</td>
</tr>


<!-- Imagen Field -->
<tr>
  <th>{!! Form::label('imagen', 'Imagen:') !!}</th>
  <td>{!! $docscategorias->imagen !!}</td>
</tr>

<!-- Icono Field -->
<tr>
  <th>{!! Form::label('icono', 'Icono:') !!}</th>
  <td>{!! $docscategorias->icono !!} <span class="badge" style="background-color:{!!$docscategorias->color !!}"> <i class="{!! $docscategorias->icono!!} fa-3x"></i></span></td>
</tr>


<!-- Created At Field -->
<tr>
  <th>{!! Form::label('created_at', 'Created At:') !!}</th>
  <td>{!! $docscategorias->created_at !!}</td>
</tr>


<!-- Updated At Field -->
<tr>
  <th>{!! Form::label('updated_at', 'Updated At:') !!}</th>
  <td>{!! $docscategorias->updated_at !!}</td>
</tr>


<!-- Deleted At Field -->
<tr>
  <th>{!! Form::label('deleted_at', 'Deleted At:') !!}</th>
  <td>{!! $docscategorias->deleted_at !!}</td>
</tr>
