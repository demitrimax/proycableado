<!-- Id Field -->
<tr>
  <th>{!! Form::label('id', 'Folio:') !!}</th>
  <td>{!! $proyectos->folio !!} {!! $proyectos->generico == 1 ? '(Generico)': '' !!}</td>
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
  <th>{!! Form::label('supervisor', 'Supervisor:') !!}</th>
  <td>{!! $proyectos->supervisor !!}</td>
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

<!-- Duración Attribute -->
<tr>
  <th>{!! Form::label('duracion', 'Duración del Proyecto:') !!}</th>
  <td>{!! $proyectos->duracionproy !!} días</td>
</tr>

@if($proyectos->estatus_id == 'T')
@if($proyectos->terminado)
<!-- Identificacion Field -->
<tr>
  <th>{!! Form::label('fterminado', 'Proyecto Terminado el día:') !!}</th>
  <td>{!! $proyectos->terminado->format('d-m-Y') !!}</td>
</tr>
@endif
@endif

<!-- Identificacion Field -->
<tr>
  <th>{!! Form::label('identificacion', 'Identificación:') !!}</th>
  <td>{!! $proyectos->identificacion !!}</td>
</tr>

<!-- Observaciones Field -->
<tr>
  <th>{!! Form::label('observaciones', 'Observaciones:') !!}</th>
  <td>{!! $proyectos->observaciones !!}</td>
</tr>


<!-- Estatus Id Field -->
<tr>
  <th>{!! Form::label('estatus_id', 'Estatus:') !!}</th>
  <td title="{!! $proyectos->estatusdate['descripcion'] !!}"> <span class="label label-{!! $proyectos->estatusdate['valor'] !!}">{!! $proyectos->catestatus->nombre !!}</span> </td>
</tr>
