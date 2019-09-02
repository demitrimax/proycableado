@extends('layouts.app')

@section('title',config('app.name').' | Reporte Mensual de Asistencia' )

@section('content')
<table class="table">
  <thead>
    <tr>
      <th>Empleado</th>
      @foreach($asistenciames->sortBy('fecha')->unique('fecha') as $fechas)
      <th>{{ $misfechas[] = $fechas->fecha->format('d-m')}}</th>
      @endforeach
    </tr>
  </thead>
  <tbody>
    @foreach($asistenciames->unique('empleado_id') as $empleadoasiste)
    @if($empleadoasiste->empleado)
    <tr>
      <td>{{$empleadoasiste->empleado->nombre.' '.$empleadoasiste->empleado->apellidos}}</td>
      @foreach($misfechas as $fec)
        <td>
        @foreach($asistenciames->where('empleado_id', $empleadoasiste->empleado_id) as $fechas)
          @if($fechas->fecha->format('d-m') == $fec)
            <span class="badge badge-{!! $fechas->comentario ? 'alert' : 'success' !!}"><i class="ion ion-checkmark-circled" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{$fechas->comentario}}"></i></span> {{-- $fechas->fecha->format('d') --}}
            {!! $fechas->retardo == 1 ? '<span class="badge badge-warning" data-toggle="tooltip" data-placement="top" title="" data-original-title="Retardo"><i class="ion ion-alert-circled"></i></span>' : '' !!}
            {!! $fechas->extra == 1 ? '<span class="badge badge-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tiempo extra"><i class="ion ion-information-circled"></i></span>' : '' !!}
          @endif
        @endforeach
        </td>
      @endforeach
    </tr>
    @endif
    @endforeach
  </tbody>
</table>

@endsection
