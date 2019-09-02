<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateempleadosRequest;
use App\Http\Requests\UpdateempleadosRequest;
use App\Repositories\empleadosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Alert;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\empleados;
use Intervention\Image\ImageManager;

class empleadosController extends AppBaseController
{
    /** @var  empleadosRepository */
    private $empleadosRepository;

    public function __construct(empleadosRepository $empleadosRepo)
    {
        $this->empleadosRepository = $empleadosRepo;
        $this->middleware('permission:empleados-list');
        $this->middleware('permission:empleados-create', ['only' => ['create','store']]);
        $this->middleware('permission:empleados-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:empleados-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the empleados.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->empleadosRepository->pushCriteria(new RequestCriteria($request));
        $empleados = $this->empleadosRepository->all();

        return view('empleados.index')
            ->with('empleados', $empleados);
    }

    /**
     * Show the form for creating a new empleados.
     *
     * @return Response
     */
    public function create()
    {
        return view('empleados.create');
    }

    /**
     * Store a newly created empleados in storage.
     *
     * @param CreateempleadosRequest $request
     *
     * @return Response
     */
    public function store(CreateempleadosRequest $request)
    {
        $input = $request->all();

        $empleados = $this->empleadosRepository->create($input);

        Flash::success('Empleado guardado correctamente.');
        Alert::success('Empleado guardado correctamente.');

        return redirect(route('empleados.index'));
    }

    /**
     * Display the specified empleados.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $empleados = $this->empleadosRepository->findWithoutFail($id);

        if (empty($empleados)) {
            Flash::error('Empleado no encontrado');
            Alert::error('Empleado no encontrado.');

            return redirect(route('empleados.index'));
        }

        return view('empleados.show')->with('empleados', $empleados);
    }

    /**
     * Show the form for editing the specified empleados.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $empleados = $this->empleadosRepository->findWithoutFail($id);

        if (empty($empleados)) {
            Flash::error('Empleado no encontrado');
            Alert::error('Empleado no encontrado');

            return redirect(route('empleados.index'));
        }

        return view('empleados.edit')->with('empleados', $empleados);
    }

    /**
     * Update the specified empleados in storage.
     *
     * @param  int              $id
     * @param UpdateempleadosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateempleadosRequest $request)
    {
        $empleados = $this->empleadosRepository->findWithoutFail($id);

        if (empty($empleados)) {
            Flash::error('Empleado no encontrado');
            Alert::error('Empleado no encontrado');

            return redirect(route('empleados.index'));
        }

        $empleados = $this->empleadosRepository->update($request->all(), $id);

        Flash::success('Empleado actualizado correctamente.');
        Alert::success('Empleado actualizado correctamente.');

        return redirect(route('empleados.show', [$empleados->id]));
    }

    /**
     * Remove the specified empleados from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $empleados = $this->empleadosRepository->findWithoutFail($id);

        if (empty($empleados)) {
            Flash::error('Empleado no encontrado');
            Alert::error('Empleado no encontrado');

            return redirect(route('empleados.index'));
        }

        $this->empleadosRepository->delete($id);

        Flash::success('Empleados borrado correctamente.');
        Alert::success('Empleados borrado correctamente.');

        return redirect(route('empleados.index'));
    }
    public function empleadoUploadPhoto(Request $request)
    {
      $rules = [
        'empleadophoto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'empleado_id'   => 'required',
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
      $file = $request->file('empleadophoto');
      $path = public_path() . '/empleadophoto/';
      $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
      //dd($extension);
      $filename = uniqid().$file->getClientOriginalName();
      $filename = uniqid().'.'.$extension;

      //cambiar el tamaño de la imagen
      $image = $manager->make($file)->resize(400, 300)->save($path.$filename);
      //$file->move($path,$filename);
      //guardar el registro de la Imagen
      $empleado = empleados::find($request->input('empleado_id'));
      $empleado->foto = 'empleadophoto/'.$filename;
      $empleado->save(); //INSERT
      Alert::success('Se ha guardado la foto del empleado');
      Flash::success('Se ha guardado la foto del empleado');
      return back();
    }
}
