<!-- Id Field -->
<tr>
  <th>{!! Form::label('id', 'Folio:') !!}</th>
  <td>{!! $proyectos->folio !!}</td>
</tr>


<!-- Nombre Field -->
<tr>
  <th>{!! Form::label('nombre', 'Nombre:') !!}</th>
  <td>{!! $proyectos->nombre !!}</td>
</tr>

<!-- Cat Cotratistas Id Field -->
<tr>
  <th>{!! Form::label('cat_cotratistas_id', 'Contratista:') !!}</th>
  <td>{!! $proyectos->catContratista->nombre!!}</td>
</tr>


<!-- Cat Pais-Division Id Field -->
<tr>
  <th>{!! Form::label('cat_paisdivision_id', 'País-División:') !!}</th>
  <td>{!! $proyectos->catPaisDivision->nombre !!}</td>
</tr>


<!-- Cat Areaciudad Id Field -->
<tr>
  <th>{!! Form::label('cat_areaciudad_id', 'Area-Ciudad:') !!}</th>
  <td>{!! $proyectos->catAreaCiudad->nombre !!}</td>
</tr>


<!-- Cat Productos Id Field -->
<tr>
  <th>{!! Form::label('cat_productos_id', 'Producto:') !!}</th>
  <td>{!! $proyectos->catProducto->nombre !!}</td>
</tr>

<!-- Supervidor Field -->
<tr>
  <th>{!! Form::label('supervidor', 'Supervisor:') !!}</th>
  <td>{!! $proyectos->supervidor !!}</td>
</tr>


<!-- Finicio Field -->
<tr>
  <th>{!! Form::label('finicio', 'Fecha de inicio:') !!}</th>
  <td>{!! $proyectos->finicio->format('d-m-y') !!}</td>
</tr>


<!-- Ftermino Field -->
<tr>
  <th>{!! Form::label('ftermino', 'Fecha de termino:') !!}</th>
  <td>{!! $proyectos->ftermino->format('d-m-y') !!}</td>
</tr>


<!-- Identificacion Field -->
<tr>
  <th>{!! Form::label('identificacion', 'Identificación:') !!}</th>
  <td>{!! $proyectos->identificacion !!}</td>
</tr>


<!-- Estatus Id Field -->
<tr>
  <th>{!! Form::label('estatus_id', 'Estatus:') !!}</th>
  <td>{!! $proyectos->catestatus->nombre !!}</td>
</tr>
