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
      $empleados = empleados::orderBy('apellidos','asc')->whereNull('bajatemp')->get();
      return view('asistencia.lista')->with(compact('empleados'));
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
        //verificar que no se repite
        $asistencia = asistencia::where('fecha',$fecha)->where('empleado_id',$miempleado->id)->first();

        if(empty($asistencia)){
          $asistencia = new asistencia;
        }

        if(!empty($empleado['asistencia'])){
          $asistencia->empleado_id = $miempleado->id;
          $asistencia->fecha = $fecha;
        }
        if(!empty($empleado['retardo'])){
          $asistencia->retardo = 1;
        }
        if(!empty($empleado['extra'])){
          $asistencia->extra = 1;
        }
          $asistencia->save();

      }

      Alert::success('Asistencia guardada correctamente');
      Flash::success('Asistencia guardada correctamente');
      return back();
    }
}
