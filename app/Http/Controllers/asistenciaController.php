<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;
use Alert;
use App\Models\empleados;
use App\Models\asistencia;
use carbon\carbon;

class asistenciaController extends Controller
{
    //
    public function index()
    {
      //$input = $request->all();
      $empleados = empleados::orderBy('apellidos','asc')->whereNull('bajatemp')->orWhere('bajatemp',0)->get();
      $mifecha = Date('Y-m-d');

      $asistencia = asistencia::where('fecha', $mifecha)->get();
      $meses = asistencia::selectRaw('MONTH(fecha) as mes, YEAR(fecha) as anio')
                            ->groupBy('anio','mes')
                            ->orderBy('anio', 'desc')
                            ->orderBy('mes', 'desc')
                            ->get();
      //dd($meses);
      $losmeses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
      $mesesasistencia = [];
      foreach($meses as $key=>$mes){
        $mesdigito = str_pad($mes->mes, 2, '0', STR_PAD_LEFT);
        $mesesasistencia[$mesdigito.'-'.$mes->anio] = $losmeses[$mes->mes-1].' '.$mes->anio;
      }
      //dd($mesesasistencia);
      return view('asistencia.lista')->with(compact('empleados', 'asistencia', 'mesesasistencia'));
    }

    public function filtrofecha(Request $request)
    {
      $input = $request->all();
      $empleados = empleados::orderBy('apellidos','asc')->whereNull('bajatemp')->orWhere('bajatemp',0)->get();
      $mifecha = Date('Y-m-d');
      if(isset($input['fecha'])){
        $mifecha = $input['fecha'];
      }

      $asistencia = asistencia::where('fecha', $mifecha)->get();
      $meses = asistencia::selectRaw('MONTH(fecha) as mes, YEAR(fecha) as anio')
                            ->groupBy('anio','mes')
                            ->get();
      $losmeses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
      $mesesasistencia = [];
      foreach($meses as $key=>$mes){
        $mesesasistencia[] = ['mes' => $losmeses[$mes->mes-1].' '.$mes->anio];
      }
      return view('asistencia.lista')->with(compact('empleados', 'mifecha', 'asistencia', 'mesesasistencia'));
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
          $asistencia->comentario = $empleado['comentario'];
          $asistencia->save();
        }

      }

      Alert::success('Asistencia guardada correctamente');
      Flash::success('Asistencia guardada correctamente');
      return redirect(route('asistencia'));
    }

    public function reportemensual(Request $request)
    {
      $input = $request->all();
      $mesanio = $input['mesanio'];
      $mes = substr($mesanio, 0, 2);
      $anio = substr($mesanio, 3);
      $finicio_ = carbon::parse($anio.'-'.$mes.'-01');
      $finicio = $finicio_->format('Y-m-d');
      $ftermino = $finicio_->endOfMonth()->format('Y-m-d');

      $asistenciames = asistencia::whereBetween('fecha', [$finicio, $ftermino])->get();
      //dd($asistenciames);
      return view('asistencia.reporte')->with(compact('asistenciames'));
    }
}
