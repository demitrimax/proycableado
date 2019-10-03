@section('css')
<!-- DataTables -->
<link href="{{asset('appzia/plugins/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('appzia/plugins/datatables/buttons.bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('appzia/plugins/datatables/fixedHeader.bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('appzia/plugins/datatables/responsive.bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('appzia/plugins/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('appzia/plugins/datatables/scroller.bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

@endsection
<table class="table table-responsive table-hover" id="productos-table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>U. Medida</th>
            <th>Existencias</th>
            <th>Acciones</th>
        </tr>
    </thead>

</table>

@section('scripts')
<!-- Datatables-->
<script src="{{asset('appzia/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('appzia/plugins/datatables/dataTables.bootstrap.js')}}"></script>
<script src="{{asset('appzia/plugins/datatables/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('appzia/plugins/datatables/buttons.bootstrap.min.js')}}"></script>
<script src="{{asset('appzia/plugins/datatables/jszip.min.js')}}"></script>
<script src="{{asset('appzia/plugins/datatables/pdfmake.min.js')}}"></script>
<script src="{{asset('appzia/plugins/datatables/vfs_fonts.js')}}"></script>
<script src="{{asset('appzia/plugins/datatables/buttons.html5.min.js')}}"></script>
<script src="{{asset('appzia/plugins/datatables/buttons.print.min.js')}}"></script>
<script src="{{asset('appzia/plugins/datatables/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{asset('appzia/plugins/datatables/dataTables.keyTable.min.js')}}"></script>
<script src="{{asset('appzia/plugins/datatables/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('appzia/plugins/datatables/responsive.bootstrap.min.js')}}"></script>
<script src="{{asset('appzia/plugins/datatables/dataTables.scroller.min.js')}}"></script>

<script>
$(document).ready(function() {

var table = $('#productos-table').DataTable({
    serverSide: true,
    processing: true,
    ajax: "{!! url('inventario/lista/productos') !!}",
    stateSave: false,
    columns: [
        { data: 'nombre', name: 'nombre',
        'render': function(val, _, obj) {
              return '<a href="{{url('productos')}}/' + obj.id + '" target="_self">' + val + '</a>'; }
            },
        { data:'categoria', name: 'categoria',
          "defaultContent": "<i>N/D</i>" },
        { data:'umedida', name: 'medida' },
        { data:'stock', name: 'stock' },
        { data:'acciones', name: 'acciones', orderable: false, searchable: false,
        'render': function(val, _, obj) {

              return @can('productos-edit') '<a href="productos/' + obj.id + '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Detalles</a> ' + @else  '' +   @endcan @can('productos-delete') '<a href="productos/' + obj.id + '/delete" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Eliminar</a> '  @else '' @endcan ;
            }
          },

    ],

});

} );
</script>

<script>
function ConfirmDelete(id) {
  swal.fire({
        title: '¿Estás seguro?',
        text: 'Estás seguro de borrar este elemento.',
        type: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Continuar',
        }).then((result) => {
  if (result.value) {
    document.forms['form'+id].submit();
  }
})
}
</script>
@endsection
