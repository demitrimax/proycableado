<!-- Id Field -->
<tr>
  <th>{!! Form::label('id', 'Id:') !!}</th>
  <td>{!! $productos->id !!}</td>
</tr>


<!-- Nombre Field -->
<tr>
  <th>{!! Form::label('nombre', 'Nombre:') !!}</th>
  <td>{!! $productos->nombre !!}</td>
</tr>


<!-- Descripcion Field -->
<tr>
  <th>{!! Form::label('descripcion', 'Descripcion:') !!}</th>
  <td>{!! $productos->descripcion !!}</td>
</tr>


<!-- Imagen Field -->
<tr>
  <th>{!! Form::label('imagen', 'Imagen:') !!}</th>
  <td>{!! $productos->imagen !!}</td>
</tr>


<!-- Barcode Field -->
<tr>
  <th>{!! Form::label('barcode', 'Barcode:') !!}</th>
  <td>{!! $productos->barcode !!}</td>
</tr>

<tr>
  <th>{!! Form::label('codigo_1', 'Codigo 1:') !!}</th>
  <td>{!! $productos->codigo_1 !!}</td>
</tr>

<tr>
  <th>{!! Form::label('codigo_3', 'Código 3:') !!}</th>
  <td>{!! $productos->codigo_3 !!}</td>
</tr>


<!-- Categoria Id Field -->
<tr>
  <th>{!! Form::label('categoria_id', 'Categoria:') !!}</th>
  <td>{!! $productos->categoria->nombre !!}</td>
</tr>


<!-- Inventariable Field -->
<tr>
  <th>{!! Form::label('inventariable', 'Inventariable:') !!}</th>
  <td>{!! $productos->inventariable ? 'Sí' : 'No' !!}</td>
</tr>


<!-- Umedida Field -->
<tr>
  <th>{!! Form::label('umedida', 'Unidad de medida:') !!}</th>
  <td>{!! $productos->umedida !!}</td>
</tr>


<!-- Stock Min Field -->
<tr>
  <th>{!! Form::label('stock_min', 'Stock Min:') !!}</th>
  <td>{!! $productos->stock_min !!}</td>
</tr>

<!-- Umedida Field -->
<tr>
  <th>{!! Form::label('stock', 'Stock Actual:') !!}</th>
  <td>
    {!! $productos->stock !!}

        <ul class="list-group">
          @foreach($productos->inventarios->unique('bodega_id') as $inventario)
            <li class="list-group-item">
              <span class="badge">{{ $inventario->bodega->stockpro($productos->id) }}</span>
              {{ $inventario->bodega->nombre }}
            </li>
            @endforeach
          </ul>
  </td>
</tr>

<!-- Precio de Compra Field -->
<tr>
  <th>{!! Form::label('pcompra', 'Precio de Compra:') !!}</th>
  <td>${!! number_format($productos->pcompra,2) !!}</td>
</tr>
<!-- Precio de Venta Field -->
<tr>
  <th>{!! Form::label('pventa', 'Precio de Venta:') !!}</th>
  <td>${!! number_format($productos->pventa,2) !!}</td>
</tr>
