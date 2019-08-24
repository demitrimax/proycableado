<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;
use Alert;
use App\Models\empleados;
use App\Models\asistencia;

class asistenciaController extends Controller
{
    //
    public function index()
    {
      //$input = $request->all();
      $empleados = empleados::orderBy('apellidos','asc')->whereNull('bajatemp')->get();
      $mifecha = Date('Y-m-d');

      $asistencia = asistencia::where('fecha', $mifecha)->get();
      $meses = asistencia::selectRaw('MONTH(fecha) as mes, YEAR(fecha) as anio')
                            ->groupBy('anio','mes')
                            ->get();
      //$losmeses = [''$meses->
      return view('asistencia.lista')->with(compact('empleados', 'asistencia', 'meses'));
    }

    public function filtrofecha(Request $request)
    {
      $input = $request->all();
      $empleados = empleados::orderBy('apellidos','asc')->whereNull('bajatemp')->get();
      $mifecha = Date('Y-m-d');
      if(isset($input['fecha'])){
        $mifecha = $input['fecha'];
      }

      $asistencia = asistencia::where('fecha', $mifecha)->get();
      $meses = asistencia::selectRaw('MONTH(fecha) as mes, YEAR(fecha) as anio')
                            ->groupBy('anio','mes')
                            ->get();
      //dd($asistencia);
      return view('asistencia.lista')->with(compact('empleados', 'mifecha', 'asistencia', 'meses'));
    }

    public function registrar(Request $request)
    {
      $input = $request->all();
      $empleados = $input['empleados'];
      $fecha = $input['fecha'];
      //dd($empleados);

      foreach($empleados as $empleado){
        //buscar el id del empleado
        $miempleado = empleados::find($empleado['id']);
        if(empty($miempleado)){

        }
        //para que no se repita, buscar la asistencia registrada de ese dia
        $asistencia = asistencia::where('fecha',$fecha)->where('empleado_id',$miempleado->id)->first();
        //si existe entonces actualiza
        if(empty($asistencia)){
          $asistencia = new asistencia;
          $asistencia->empleado_id = $miempleado->id;
        }
          if($empleado['asistencia'] == 1){
          $asistencia->fecha = $fecha;
          $asistencia->retardo = $empleado['retardo'];
          $asistencia->extra = $empleado['extra'];
          $asistencia->save();
        }

      }

      Alert::success('Asistencia guardada correctamente');
      Flash::success('Asistencia guardada correctamente');
      return back();
    }
}
