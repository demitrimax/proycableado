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
    <tbody>
    @foreach($productos as $productos)
        <tr>
            <td><a href="{!! route('productos.show', [$productos->id]) !!}">{!! $productos->nombre !!}</a> {!! $productos->inventariable ? '<span class="badge badge-warning">Inventariable<span>' : ''!!}</td>
            <td>{!! $productos->categoria->nombre !!}</td>
            <td>{!! $productos->umedida !!}</td>
            <td>{!! $productos->stock !!}</td>
            <td>
                {!! Form::open(['route' => ['productos.destroy', $productos->id], 'method' => 'delete', 'id'=>'form'.$productos->id]) !!}
                <div class='btn-group'>
                    <a href="{!! route('productos.show', [$productos->id]) !!}" class='btn btn-info btn-xs'><i class="fa fa-eye"></i></a>
                    @can('productos-edit')
                    <a href="{!! route('productos.edit', [$productos->id]) !!}" class='btn btn-primary btn-xs'><i class="fa fa-pencil"></i></a>
                    @endcan
                    @can('productos-delete')
                    {!! Form::button('<i class="fa fa-trash-o"></i>', ['type' => 'button', 'class' => 'btn btn-danger btn-xs', 'onclick' => "ConfirmDelete($productos->id)"]) !!}
                    @endcan
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
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


!function($) {
    "use strict";

    var DataTable = function() {
        this.$dataTableButtons = $("#productos-table")
    };
    DataTable.prototype.createDataTableButtons = function() {
        0 !== this.$dataTableButtons.length && this.$dataTableButtons.DataTable({
            ordering: false,
            dom: "Bfrtip",
            "language": {
                      "url": "{{asset('appzia/plugins/datatables/Spanish.json')}}"
                  },
            buttons: [{
                extend: "copy",
                className: "btn-success"
            }, {
                extend: "csv"
            }, {
                extend: "excel"
            }, {
                extend: "pdf"
            }, {
                extend: "print"
            }],
            responsive: !0
        });
    },
    DataTable.prototype.init = function() {
        //creating demo tabels
        $('#datatable').dataTable();
        $('#datatable-keytable').DataTable({keys: true});
        var table = $('#datatable-fixed-header').DataTable({fixedHeader: true});

        //creating table with button
        this.createDataTableButtons();
    },
    //init
    $.DataTable = new DataTable, $.DataTable.Constructor = DataTable
}(window.jQuery),

//initializing
function ($) {
    "use strict";
    $.DataTable.init();
}(window.jQuery);

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
