@php
  $etapa_ac = $proyectos->etapa->id;
  $etapa_new = App\Models\catetapa::find($etapa_ac + 1);
  if(empty($etapa_new)){
    $etapanom = 'NINGUNA';
    $etapanewid = 0;
  } else {
    $etapanom = $etapa_new->nombre;
    $etapanewid = $etapa_new->id;
  }

@endphp
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
  <td>{!! $proyectos->identificacion.' '.$proyectos->identifi_text !!}</td>
</tr>

<!-- PEP Field -->
<tr>
  <th>{!! Form::label('pep', 'PEP:') !!}</th>
  <td>{!! $proyectos->pep !!}</td>
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

<!-- Etapa Id Field -->
<tr>
  <th>{!! Form::label('etapa_id', 'Etapa:') !!}</th>
  <td title="{!! $proyectos->etapa->descripcion !!}">
    <span class="badge" style="background-color:{!! $proyectos->etapa->color_hex !!}">
      {!! $proyectos->etapa->nombre !!}
    </span>
    @if($etapanewid > 0)
      @can('proyectos-cetapa')
        <button onclick="ConfirmCambioEtapa()" title="Cambiar de Etapa" type="button" class="btn btn-xs waves-effect btn-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="Pasar el proyecto a la siguiente etapa"> <i class="ion ion-checkmark-round"></i> </button>
      @endcan
    @endif
  </td>
</tr>

@push('scripts')
  @can('proyectos-cetapa')


  <script>
    function ConfirmCambioEtapa() {
      swal.fire({
            title: 'Cambiar de Etapa',
            text: 'El proyecto cambiará a la etapa {{$etapanom}}',
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cancelar',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Continuar',
            }).then((result) => {
      if (result.value) {
        //document.forms['formcetapa'].submit();
        window.location.href = "{{url('proyecto/'.$proyectos->id.'/cetapa/'.$etapanewid)}}";
      }
    })
    }
  </script>
  @endcan
@endpush
