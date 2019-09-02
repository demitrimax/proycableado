<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Alert;
use Flash;
use App\Models\proyectos;
use Carbon\Carbon;
use App\User;
use App\Models\tareas;
use Auth;

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
        if(Auth::user()->hasRole('administrador')){
          $tareascount = tareas::whereNull('terminado')->count();
        }
        else {
          $tareascount = tareas::whereNull('terminado')->where('user_id', Auth::user()->id)->count();
        }



        return view('home')->with(compact('cantproy','cantproyenelmes','proyatendidos', 'usuariosOnline', 'tareascount'));
    }

    public function profile(){
      return view('profile');
    }

    public function lockscreen() {
      return view('lockscreen');
    }

    public function profileUploadPhoto(Request $request)
    {
      $rules = [
        'profilephoto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ];
      $this->validate($request, $rules);
      /*
      $input = $request->all();
      $input['user_id'] = Auth::user()->id;
      //$documentos = $this->documentosRepository->create($input);

      $usuario = User::find(Auth::user()->id);

      $photo = $request->file('nombre_doc')->store('documentos');

      $usuario->avatar = $photo;

      $usuario->save();

      Flash::success('Avatar guardadao correctamente.');
      Alert::success('Avatar guardadao correctamente.');

      return back();
      */

      //guardar la imagen en el sistema de archivos
      $manager = new ImageManager;
      $file = $request->file('profilephoto');
      $path = public_path() . '/avatar/';
      $filename = uniqid().$file->getClientOriginalName();
      //cambiar el tamaño de la imagen
      $image = $manager->make($file)->resize(200, 400)->save($path.$filename);
      //$file->move($path,$filename);
      //guardar el registro de la Imagen
      $avatar = User::find(Auth::user()->id);
      $avatar->avatar = 'avatar/'.$filename;
      $avatar->save(); //INSERT
      Alert::success('Foto de perfil actualizada');
      Flash::success('Foto de perfil actualizada');
      return back();
    }
}
