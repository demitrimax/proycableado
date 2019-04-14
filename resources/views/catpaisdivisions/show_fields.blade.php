<table class="table table-striped table-bordered detail-view">
  <tbody>
    <tr>
      <th>{!! Form::label('id', 'Id:') !!}</th>
      <td>{!! $catpaisdivision->id !!}</td>
    </tr>
    <tr>
      <th>{!! Form::label('nombre', 'Nombre:') !!}</th>
      <td>{!! $catpaisdivision->nombre !!}</td>
    </tr>
    <tr>
      <th>{!! Form::label('observaciones', 'Observaciones:') !!}</th>
      <td>{!! $catpaisdivision->observaciones !!}</td>
    </tr>
    <tr>
      <th>{!! Form::label('created_at', 'Fecha Creación:') !!}</th>
      <td>{!! $catpaisdivision->created_at !!}</td>
    </tr>
    </tbody>
  </table>
