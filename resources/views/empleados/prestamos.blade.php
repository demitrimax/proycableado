
@component('components.com_panel', ['title'=>'Prestamos de Equipo/Herramientas'])
<table class="table">
  <thead>
    <tr>
      <th>Equipo</th>
      <th>Fecha</th>
      <th>Devuelto</th>
    </tr>
  </thead>
  <tbody>
    @foreach($empleados->prestamos as $prestamo)
    <tr>
      <td>{!! $prestamo->producto->nombre !!}</td>
      <td>{!! $prestamo->fecha->format('d-m-Y') !!}</td>
      <td>
        {!! $prestamo->devuelto_en ? $prestamo->devuelto_en->format('d-m-Y') : 'No Devuelto' !!}
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endcomponent
