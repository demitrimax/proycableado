@section('css')
<!-- DataTables -->
<link href="{{asset('appzia/plugins/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('appzia/plugins/datatables/buttons.bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('appzia/plugins/datatables/fixedHeader.bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('appzia/plugins/datatables/responsive.bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('appzia/plugins/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('appzia/plugins/datatables/scroller.bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

@endsection
<table class="table table-responsive" id="tareas-table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Avance</th>
            <th>Vencimiento</th>
            <th>Usuario Responsable</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($tareas as $tareas)
        <tr>
            <td><a href="{!! route('tareas.show', [$tareas->id]) !!}">{!! $tareas->nombre !!}</a></td>
            <td>
                <div class="progress progress-lg">
                    <div class="progress-bar progress-bar-purple" role="progressbar" aria-valuenow="{{$tareas->avance_porc}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$tareas->avance_porc}}%">
                                                                            {{$tareas->avance_porc}}%
                      </div>
                  </div>
              </td>
            <td>{!! $tareas->vencimiento->format('d-m-Y') !!} <span class="label label-{!! $tareas->estatusdate['valor'] !!}">{!! $tareas->estatusdate['descripcion'] !!}</span></td>
            <td>{!! $tareas->user->name !!}</td>
            <td>
                {!! Form::open(['route' => ['tareas.destroy', $tareas->id], 'method' => 'delete', 'id'=>'form'.$tareas->id]) !!}
                <div class='btn-group'>
                    <a href="{!! route('tareas.show', [$tareas->id]) !!}" class='btn btn-info'><i class="glyphicon glyphicon-eye-open"></i></a>
                    @can('tareas-edit')
                    <a href="{!! route('tareas.edit', [$tareas->id]) !!}" class='btn btn-primary'><i class="glyphicon glyphicon-edit"></i></a>
                    @endcan
                    @can('tareas-delete')
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'button', 'class' => 'btn btn-danger', 'onclick' => "ConfirmDelete($tareas->id)"]) !!}
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

!function($) {
    "use strict";

    var DataTable = function() {
        this.$dataTableButtons = $("#tareas-table")
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
        $('#datatable-keytable').DataTable({
          keys: true,
          "language": {
                    "url": "{{asset('appzia/plugins/datatables/Spanish.json')}}"
                }
        });
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

@endsection
