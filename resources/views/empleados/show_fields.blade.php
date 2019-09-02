<table class="table table-striped table-bordered detail-view" id="empleados-table">
  <tbody>
    <!-- Id Field -->
    <tr>
      <th>{!! Form::label('id', 'Id:') !!}</th>
      <td>{!! $empleados->id !!}</td>
    </tr>


    <!-- Nombre Field -->
    <tr>
      <th>{!! Form::label('nombre', 'Nombre:') !!}</th>
      <td>{!! $empleados->nombre !!}</td>
    </tr>


    <!-- Apellidos Field -->
    <tr>
      <th>{!! Form::label('apellidos', 'Apellidos:') !!}</th>
      <td>{!! $empleados->apellidos !!}</td>
    </tr>


    <!-- Curp Field -->
    <tr>
      <th>{!! Form::label('curp', 'CURP:') !!}</th>
      <td>{!! $empleados->curp !!}</td>
    </tr>

    <!-- Curp Field -->
    <tr>
      <th>{!! Form::label('rfc', 'RFC:') !!}</th>
      <td>{!! $empleados->rfc !!}</td>
    </tr>


  </tbody>
</table>
