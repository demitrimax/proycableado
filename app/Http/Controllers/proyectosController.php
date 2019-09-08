<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateproyectosRequest;
use App\Http\Requests\UpdateproyectosRequest;
use App\Repositories\proyectosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Alert;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\catproductos;
use App\Models\catpaisdivision;
use App\Models\catareaciudad;
use App\Models\contratistas;
use App\catestatus;
use App\Models\documentos;
use App\Models\docscategorias;
use Auth;

class proyectosController extends AppBaseController
{
    /** @var  proyectosRepository */
    private $proyectosRepository;

    public function __construct(proyectosRepository $proyectosRepo)
    {
        $this->proyectosRepository = $proyectosRepo;
        $this->middleware('permission:proyectos-list');
        $this->middleware('permission:proyectos-create', ['only' => ['create','store']]);
        $this->middleware('permission:proyectos-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:proyectos-delete', ['only' => ['destroy']]);
        $this->middleware('permission:proyectos-terminar', ['only' =>['terminar']]);
    }

    /**
     * Display a listing of the proyectos.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->proyectosRepository->pushCriteria(new RequestCriteria($request));
        $proyectos = $this->proyectosRepository->orderBy('estatus_id', 'asc')->orderBy('ftermino', 'asc')->get();

        return view('proyectos.index')
            ->with(compact('proyectos'));
    }

    /**
     * Show the form for creating a new proyectos.
     *
     * @return Response
     */
    public function create()
    {
        $catareaciudad = catareaciudad::pluck('nombre','id');
        $catpaisdivision = catpaisdivision::pluck('nombre','id');
        $catproducto = catproductos::pluck('nombre','id');
        $contratistas = contratistas::pluck('nombre','id');
        $estatus = catestatus::pluck('nombre','id');
        return view('proyectos.create')->with(compact('catareaciudad','catpaisdivision','catproducto','contratistas','estatus'));
    }

    /**
     * Store a newly created proyectos in storage.
     *
     * @param CreateproyectosRequest $request
     *
     * @return Response
     */
    public function store(CreateproyectosRequest $request)
    {
        $input = $request->all();
        $findstring = ":";
        $pos = strpos($input['fechas'],$findstring);
        $finicio = substr($input['fechas'], 0, 10);
        $ftermino = substr($input['fechas'], $pos+2, 10);
        $input['finicio'] = date('Y-m-d', strtotime($finicio));
        $input['ftermino'] = date('Y-m-d', strtotime($ftermino));

        //dd($input);
        $proyectos = $this->proyectosRepository->create($input);

        if(isset($input['documento'])){
          //guardar el documento
          $documento = new documentos;

          //$documento->nombre_doc = $request->file('documento')->store('documentos');
          $doc = $request->file('documento')->store('documentos');

          $documento->file_servidor = $doc;
          $documento->nombre_doc = $request->file('documento')->getClientOriginalName();
          $documento->descripcion = 'Documento correspondiente al proyecto: '.$request->input('nombre');
          $documento->user_id = Auth::user()->id;
          $documento->save();
          //hacer la referencia muchos a muchos
          $proyectos->documentos()->attach($documento);
        }


        Flash::success('Proyecto guardado correctamente.');
        Alert::success('Proyecto guardado correctamente.');

        //return redirect(route('proyectos.index'));
        return redirect(route('proyectos.show', [$proyectos->id]));
    }

    /**
     * Display the specified proyectos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $proyectos = $this->proyectosRepository->findWithoutFail($id);

        if (empty($proyectos)) {
            Flash::error('Proyecto no encontrado');
            Alert::error('Proyecto no encontrado.');

            return redirect(route('proyectos.index'));
        }
        $categoriasdocs = docscategorias::where('modelo','proyectos')->pluck('nombre','id');

        return view('proyectos.show')->with(compact('proyectos','categoriasdocs'));
    }

    /**
     * Show the form for editing the specified proyectos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $proyectos = $this->proyectosRepository->findWithoutFail($id);

        if (empty($proyectos)) {
            Flash::error('Proyecto no encontrado');
            Alert::error('Proyecto no encontrado');

            return redirect(route('proyectos.index'));
        }

        $catareaciudad = catareaciudad::pluck('nombre','id');
        $catpaisdivision = catpaisdivision::pluck('nombre','id');
        $catproducto = catproductos::pluck('nombre','id');
        $contratistas = contratistas::pluck('nombre','id');
        $estatus = catestatus::pluck('nombre','id');

        return view('proyectos.edit')->with(compact('proyectos', 'catareaciudad','catpaisdivision','catproducto','contratistas','estatus'));
    }

    /**
     * Update the specified proyectos in storage.
     *
     * @param  int              $id
     * @param UpdateproyectosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateproyectosRequest $request)
    {
        $proyectos = $this->proyectosRepository->findWithoutFail($id);

        if (empty($proyectos)) {
            Flash::error('Proyecto no encontrado');
            Alert::error('Proyecto no encontrado');

            return redirect(route('proyectos.index'));
        }
        $input = $request->all();
        if (!isset($input['generico'])){
                  $input['generico'] = 0;
        }
        $findstring = ":";
        $pos = strpos($input['fechas'],$findstring);
        $finicio = substr($input['fechas'], 0, 10);
        $ftermino = substr($input['fechas'], $pos+2, 10);
        //$input['finicio'] = $finicio;
        //$input['ftermino'] = $ftermino;
        $input['finicio'] = date('Y-m-d', strtotime($finicio));
        $input['ftermino'] = date('Y-m-d', strtotime($ftermino));

        //dd($input);

        $proyectos = $this->proyectosRepository->update($input, $id);

        if(isset($input['documento'])){
          //guardar el documento
          $documento = new documentos;

          //$documento->nombre_doc = $request->file('documento')->store('documentos');
          $doc = $request->file('documento')->store('documentos');

          $documento->file_servidor = $doc;
          $documento->nombre_doc = $request->file('documento')->getClientOriginalName();
          $documento->descripcion = 'Documento actualizado correspondiente al proyecto: '.$request->input('nombre');
          $documento->user_id = Auth::user()->id;
          $documento->save();
          //hacer la referencia muchos a muchos
          $proyectos->documentos()->attach($documento);
        }

        Flash::success('Proyecto actualizado correctamente.');
        Alert::success('Proyecto actualizado correctamente.');

        //return redirect(route('proyectos.index'));
        return redirect(route('proyectos.show', [$proyectos->id]));
    }

    /**
     * Remove the specified proyectos from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $proyectos = $this->proyectosRepository->findWithoutFail($id);

        if (empty($proyectos)) {
            Flash::error('Proyecto no encontrado');
            Alert::error('Proyecto no encontrado');

            return redirect(route('proyectos.index'));
        }

        $this->proyectosRepository->delete($id);

        Flash::success('Proyecto borrado correctamente.');
        Alert::success('Proyecto borrado correctamente.');

        return redirect(route('proyectos.index'));
    }

    public function terminar($id)
    {
      $proyectos = $this->proyectosRepository->findWithoutFail($id);

      if (empty($proyectos)) {
          Flash::error('Proyecto no encontrado');
          Alert::error('Proyecto no encontrado');

          return back();
      }
      $proyectos->estatus_id = 'T';
      //corregir la fecha el signo de minuto esta mal
      $proyectos->terminado = date('Y-m-d h:m:s');
      $proyectos->save();

      Flash::success('Proyecto Terminado correctamente.');
      Alert::success('Proyecto Terminado correctamente.');

      return back();

    }
}
