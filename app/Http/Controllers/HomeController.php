<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use App\Models\proyectos;
use Carbon\Carbon;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //Alert::success('Prueba de SweetAlert');
        $cantproy = proyectos::get();


        $fechaActual = Carbon::parse(date('Y-m-d'));
        //fechas en los ultimos 30 días;
        $FTermino =  $fechaActual->subDays(30);
        $cantproyenelmes = $cantproy->where('created_at','>',$FTermino)->count();
        $proyatendidos = $cantproy->where('estatus_id','T')->count();
        $usuarios = new User;
        $usuariosOnline = $usuarios->allOnline()->count() ;

        return view('home')->with(compact('cantproy','cantproyenelmes','proyatendidos', 'usuariosOnline'));
    }

    public function profile(){
      return view('profile');
    }

    public function lockscreen() {
      return view('lockscreen');
    }
}
