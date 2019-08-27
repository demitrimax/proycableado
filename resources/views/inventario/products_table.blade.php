

<table class="table tabla-conceptos table-responsive table-hover" id="conceptos">
  <thead class="bg-danger">
    <tr>
      <th style="width:10%">Cantidad</th>
      <th style="width:10%;">Unidad</th>
      <th style="width:30%;">Producto</th>
      <th style="width:20%;">P. Unitario</th>
      <th style="width:20%;">Subtotal</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <td class="NCantidadProd">
        <div class="input-group NCantProd">
         <input type="number" class="form-control NCantidadProducto" id="cantidad[]" name="cantidad[0]" placeholder="Cantidad" title="Cantidad" min="1" value=1 >
      </div>
    </td>
    <td class="ColUMedida">
      <div class="input-group UMedida">
       <input type="text" class="form-control UnidadMedida" id="unidadmedida[]" name="unidadmedida[0]" placeholder="U. medida" title="Unidad de Medida" list="listunidad">
       <datalist id="listunidad" class="ListaUnidad">
       </datalist>
     </div>
    </td>
    <td>
      <div class="input-group col-md-12">
         {!! Form::select('producto[]', $productos, null, ['class'=>'form-control select2 producto', 'required', 'placeholder'=>'Seleccione un producto'])!!}
      </div>
    </td>
    <td class="ColIngImporte">
      <div class="input-group IngresoImporte">
        <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
        <input type="number" min="1" step="0.01" class="form-control PreUnitario" id="importecon[]" name="importecon[]" placeholder="Importe">
      </div>
    </td>
    <td class="ColNMonto">
      <div class="input-group NSubtotalProducto">
        <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
        <input type="number" min="1" step="0.01" class="form-control NMontoProducto" id="montoconcepto[]" name="montoconcepto[]" placeholder="Monto" readonly>
        <span class="input-group-btn">
          <button type="button" class="btn btn-warning btn" id ="btnagregarotro"><i class="fa fa-plus"></i></button>
        </span>
      </div>
    </td>
    </tr>
  </tbody>
</table>
<div class="content">
  <div class="row justify-content-end">
    <div class='col-4'>
         <table class="table bg-white">

           <tbody>
             <tr>
               <td class="pull-right"><b>SUBTOTAL</b></td>
               <td>
                 <div class="input-group">
                   <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                   {!! Form::text('csubtotal', null, ['class'=>'form-control text-right', 'id'=>'csubtotal', 'placeholder'=>'00000', 'readonly', 'step'=>'0.01'])!!}</td>
                   {!! Form::hidden('aSubtotal', null, ['class'=>'form-control', 'id'=>'aSubtotal'])!!}
                 </div>
             </tr>
             <tr>
               <td class="pull-right"><b>IVA</b></td>
               <td>
                 <div class="input-group">
                   <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                   {!! Form::text('civa', null, ['class'=>'form-control text-right', 'id'=>'civa', 'placeholder'=>'00000', 'readonly', 'step'=>'0.01'])!!}</td>
                   {!! Form::hidden('aIva', null, ['class'=>'form-control', 'id'=>'aIva'])!!}
                 </div>
             </tr>
             <tr>
               <td class="pull-right">
                 <b>TOTAL</b>
               </td>
               <td>
                 <div class="input-group">
                 <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                 <input type="text" min="1" class="form-control text-right" id="cTotal" name="cTotal" placeholder="00000" readonly step="0.01">
                 {!! Form::hidden('aTotal', null, ['class'=>'form-control', 'id'=>'aTotal'])!!}
               </div>
               </td>
             </tr>

           </tbody>
         </table>
       </div>
   </div>
</div>
@push('css')
<!-- select 2-->
<link href="{{asset('appzia/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
@endpush

@push('scripts')
<script src="{{asset('appzia/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('appzia/plugins/numeral.js/min/numeral.min.js')}}"></script>
<script>

$(document).ready(function() {
    $('.select2').select2();
});
//ACCION DEL BOTON DE ELIMINAR LINEA DE CONCEPTO
$('#RegistroInventario').on('click', 'button.QuitarConcepto', function() {
  console.log("prueba");
  $(this).parent().parent().parent().parent().remove();
  SumarTodosLosMontos();
  CalcularTotales();
})



//CALCULAR LA CANTIDAD POR EL PRECIO DEL PRODUCTO
$('#RegistroInventario').on('change', 'input.NCantidadProducto', function() {
  var PUnitario = $(this).parent().parent().parent().children(".ColIngImporte").children(".IngresoImporte").children(".PreUnitario");
  var Subtotal = $(this).parent().parent().parent().children(".ColNMonto").children(".NSubtotalProducto").children(".NMontoProducto");

  var precioFinal = Number($(this).val()) * Number(PUnitario.val());
  //console.log(precioFinal);
  Subtotal.val(precioFinal);

  SumarTodosLosMontos();
    CalcularTotales();
})


//CALCULAR SUBTOTAL, IVA Y TOTAL
$('#RegistroInventario').on('change', 'input.PreUnitario', function() {
  var Cantidad = $(this).parent().parent().parent().children(".NCantidadProd").children(".NCantProd").children(".NCantidadProducto");
  var Subtotal = $(this).parent().parent().parent().children(".ColNMonto").children(".NSubtotalProducto").children(".NMontoProducto");
   var precioFinal = Number($(this).val()) * Number(Cantidad.val());
   Subtotal.val(precioFinal);
   SumarTodosLosMontos();

  CalcularTotales();
});

//SUMAR TODOS LOS PRECIOS
function SumarTodosLosMontos() {
  var ItemMonto = $('.NMontoProducto');
  var ArraySumaMonto = [];
  //console.log(ItemMonto.length);
  for (var i=0; i < ItemMonto.length; i++  )
  {
        ArraySumaMonto.push(Number($(ItemMonto[i]).val()));
        //console.log($(ItemMonto[i]).val());
  }
  //console.log('ArraySumaMonto',ArraySumaMonto);
  function sumaArrayMontos(total, numero)
  {
    return total + numero;
  }
    var SumaTotalMontoA = ArraySumaMonto.reduce(sumaArrayMontos);
    //console.log('SumaTotalMonto',SumaTotalMonto);
    SumaTotalMonto = numeral(SumaTotalMontoA);
    console.log(SumaTotalMontoA);
    $("#csubtotal").val(SumaTotalMonto.format('0,0.00'));
    $("#aSubtotal").val(SumaTotalMontoA);
}
function CalcularTotales()
{
  var Ssubtotal = numeral($("#csubtotal").val());
  var civa = numeral(parseFloat(Ssubtotal.value() * 0.16));
  $('#civa').val(civa.format('0,0.00'));
  $('#aIva').val(civa.value());
  var total = numeral(Ssubtotal.value()+civa.value());
  //console.log(total);
  $('#cTotal').val(total.format('0,0.00'));
  $('#aTotal').val(total.value());
}

    //calcular el IVA del monto ingresado en subtotal
    $('#csubtotal').on('change', function(e) {
      var subtotal = e.target.value;
      var civa = parseFloat(subtotal * 1.16);
      $('#civa').val(civa);
    });
var IdRow = 0;
$('#btnagregarotro').click(function() {
  //$(this).removeClass("btn-warning");
    IdRow = IdRow+1;
    var newRow =
    '<tr id="r'+IdRow+'">'+
        '<td class="NCantidadProd">'+
          '<div class="input-group NCantProd">'+
            '<input type="number" class="form-control NCantidadProducto" id="cantidad[]" name="cantidad[]" placeholder="Cantidad" title="Cantidad" min="1" required value=1>'+
          '</div>'+
        '</td>'+
    '<td class="ColUMedida">'+
      '<div class="input-group UMedida">'+
       '<input type="text" class="form-control UnidadMedida" id="unidadmedida[]" name="unidadmedida[]" placeholder="U. medida" required title="Unidad de Medida" list="listunidad">'+
       '<datalist id="listunidad" class="ListaUnidad">'+
       '</datalist>'+
     '</div>'+
    '</td>'+
    '<td>'+
      '<div class="input-group col-md-12">'+
         '{!! Form::select("producto[]", $productos, null, ["class"=>"form-control select2 producto", "required", "placeholder"=>"Seleccione un producto"])!!}'+
      '</div>'+
    '</td>'+
    '<td class="ColIngImporte">'+
    '<div class="input-group IngresoImporte">'+
      '<span class="input-group-addon"><i class="fa fa-dollar"></i></span>'+
      '<input type="number" step="0.01" min="1" class="form-control PreUnitario" id="importecon[]" name="importecon[]" placeholder="Importe">'+
      '</div>'+
    '</td>'+
    '<td class="ColNMonto">'+
      '<div class="input-group NSubtotalProducto">'+
        '<span class="input-group-addon"><i class="fa fa-dollar"></i></span>'+
        '<input type="number" step="0.01" min="1" class="form-control NMontoProducto" id="montoconcepto[]" name="montoconcepto[]" placeholder="monto" required readonly>'+
        '<span class="input-group-btn">'+
          '<button type="button" class="btn btn-danger btn QuitarConcepto" id="quitarconcepto"><i class="fa fa-times"></i></button>'+
        '</span>'+
      '</div>'+
    '</td>'
  ;
  $(newRow).appendTo($('#conceptos tbody'));
  $('.select2').select2();
}) ;

$( "RegistroInventario" ).submit(function( event ) {
  var total = numeral($('#cTotal'));
    console.log(total.val());
    event.preventDefault();
    //return;
  });

  //obtener el precio de venta del producto
  $('.producto').on('change', function(e) {
    //console.log(e);
    var productoid = e.target.value;
    //ajax
    $.get('{{url('precio/venta/producto')}}/' + productoid, function(data) {
      //exito al obtener los datos
      console.log(data);
      @if($operaciontipo == 'entrada')
      $('.PreUnitario').val(data.pcompra);
      @else
      $('.PreUnitario').val(data.pventa);
      @endif
      $('.UnidadMedida').val(data.umedida);

      SumarTodosLosMontos();
      CalcularTotales();
    });
  });
</script>
@endpush
