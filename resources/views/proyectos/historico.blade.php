
<?php
function json_to_table($json){
//$section = file_get_contents($file);

$arr = json_decode($json);

echo "<table>";
echo "<tbody>";
echo "<tr>";
echo "<th>";
echo "Questions";
echo "</th>";
echo "</tr>";

foreach($arr as $k=>$v){
echo "<tr>";
echo "<td>";
echo "$v";
echo "</td>";
echo "</tr>";
}

echo "</tbody>";
echo "</table>";
}

function mitabla($myjson) {
  foreach ($myjson as $k => $v){
    if (is_array($v)){
    print_r($v);
    }
  }
}
?>

<div class="table-responsive">
  @if($activity->count()>0)
  <table class="table table-bordered">
    <thead>
    <tr>
        <th>No.</th>
        <th>Fecha</th>
        <th>Actividad</th>
        <th>Usuario</th>
    </tr>
    </thead>
    <tbody>
      @foreach($activity as $key=>$actividad)
    <tr>
        <td>{!! $key+1 !!}</td>
        <td>
          {{$actividad->created_at->format('d-m-Y')}}</a>
        </td>
        <td>{{ $actividad->properties }}</td>
        <td>{{ \App\User::find($actividad->causer_id)->name }}  </td>
    </tr>
    @endforeach
    </tbody>
</table>
@else
No existen registros de actividad.
@endif


</div>
