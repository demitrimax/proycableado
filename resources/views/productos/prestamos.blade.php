@component('components.com_panel', ['title'=>'Prestamos'])
  <table class="table">
    <thead>
      <tr>
        <th>Prestado a:</th>
        <th>Fecha:</th>
        <th>Devuelto el:</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($productos->prestamos as $prestamo)
      <tr>
        <td>{!! $prestamo->empleado->nombrecompleto !!}</td>
        <td>{!! $prestamo->fecha->format('d-m-Y') !!}</td>
        <td>{!! $prestamo->devuelto_en ? $prestamo->devuelto_en->format('d-m-Y') : 'No Devuelto' !!}</td>
        <td>
          @if( empty($prestamo->devuelto_en) )
          {!! Form::button('<i class="fas fa-arrow-alt-circle-left"></i> Devolver', ['type'=>'button', 'class'=>'btn btn-success', 'onclick'=>'devolver('.$prestamo->producto_id.','.$prestamo->empleado_id.')']) !!}
          @else

          @endif
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endcomponent

@push('scripts')
<script>

function devolver(producto_id, empleado_id) {
  swal.fire({
        title: '¿Estás seguro?',
        text: 'Estás seguro de realizar la devolución.',
        type: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Continuar',
        }).then((result) => {
  if (result.value) {
    location.href="{{url('inventario')}}/"+producto_id+"/producto/"+empleado_id+"/empleado";
    //document.forms['form'+id].submit();
  }
})
}
</script>
@endpush
