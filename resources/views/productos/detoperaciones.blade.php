@component('components.com_panel', ['title'=>'Operaciones'])

          <table class="table mg-b-0 table-primary table-hover">
              <thead class="bg-info">
                <tr>
                  <th>No.  </th>
                  <th>Fecha</th>
                  <th>Tipo</th>
                  <th>Cantidad</th>
                  <th>Bodega</th>
                  <th>P. Unitario</th>
                  <th>Monto</th>
                  <th>Estatus</th>
                </tr>
              </thead>
              <tbody>
                @foreach($productos->inventarios as $key=>$movinvent)
                <tr>
                  <td><a href="{{url('invoperacions/'.$movinvent->operacion->id)}}">{{ str_pad($movinvent->id, 5, "0", STR_PAD_LEFT) }}</a> </td>
                  <td>{{$movinvent->fecha->format('d-m-y')}}</td>
                  <td>{{$movinvent->tipo_operacion}}</td>
                  <td>{{$movinvent->cantidad}}</td>
                  <td>{{$movinvent->bodega->nombre}}</td>
                  <td>{{number_format($movinvent->punitario,2)}}</td>
                  <td>{{number_format($movinvent->importe,2)}}</td>
                  <td><span class="badge badge-{{$movinvent->estatush['label']}}">{{$movinvent->estatush['estado']}}</span></td>
                </tr>
                @endforeach
              </tbody>
            </table>
@endcomponent
