<table class="table table-striped table-bordered detail-view" id="invproveedores-table">
  <tbody>
      <!-- Id Field -->
      <tr>
        <th>{!! Form::label('id', 'Id:') !!}</th>
        <td>{!! $invproveedores->id !!}</td>
      </tr>


      <!-- Nombre Field -->
      <tr>
        <th>{!! Form::label('nombre', 'Nombre:') !!}</th>
        <td>{!! $invproveedores->nombre !!}</td>
      </tr>


      <!-- Rfc Field -->
      <tr>
        <th>{!! Form::label('rfc', 'Rfc:') !!}</th>
        <td>{!! $invproveedores->rfc !!}</td>
      </tr>


      <!-- Domicilio Field -->
      <tr>
        <th>{!! Form::label('domicilio', 'Domicilio:') !!}</th>
        <td>{!! $invproveedores->domicilio !!}</td>
      </tr>


      <!-- Telefono Field -->
      <tr>
        <th>{!! Form::label('telefono', 'Telefono:') !!}</th>
        <td>{!! $invproveedores->telefono !!}</td>
      </tr>


      <!-- Contacto Field -->
      <tr>
        <th>{!! Form::label('contacto', 'Contacto:') !!}</th>
        <td>{!! $invproveedores->contacto !!}</td>
      </tr>


      <!-- Observaciones Field -->
      <tr>
        <th>{!! Form::label('observaciones', 'Observaciones:') !!}</th>
        <td>{!! $invproveedores->observaciones !!}</td>
      </tr>


      <!-- Created At Field -->
      <tr>
        <th>{!! Form::label('created_at', 'Creado el:') !!}</th>
        <td>{!! $invproveedores->created_at->format('d-m-Y H:i:s') !!}</td>
      </tr>



      <!-- Updated At Field -->
      <tr>
        <th>{!! Form::label('updated_at', 'Actualizado el:') !!}</th>
        <td>{!! $invproveedores->updated_at->format('d-m-Y H:i:s') !!}</td>
      </tr>
    </tbody>
  </table>
