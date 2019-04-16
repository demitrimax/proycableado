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
        $proyectos = $this->proyectosRepository->all();

        return view('proyectos.index')
            ->with('proyectos', $proyectos);
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

        $proyectos = $this->proyectosRepository->create($input);

        Flash::success('Proyectos guardado correctamente.');
        Alert::success('Proyectos guardado correctamente.');

        return redirect(route('proyectos.index'));
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
            Flash::error('Proyectos no encontrado');
            Alert::error('Proyectos no encontrado.');

            return redirect(route('proyectos.index'));
        }

        return view('proyectos.show')->with('proyectos', $proyectos);
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
            Flash::error('Proyectos no encontrado');
            Alert::error('Proyectos no encontrado');

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
            Flash::error('Proyectos no encontrado');
            Alert::error('Proyectos no encontrado');

            return redirect(route('proyectos.index'));
        }

        $proyectos = $this->proyectosRepository->update($request->all(), $id);

        Flash::success('Proyectos actualizado correctamente.');
        Alert::success('Proyectos actualizado correctamente.');

        return redirect(route('proyectos.index'));
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
            Flash::error('Proyectos no encontrado');
            Alert::error('Proyectos no encontrado');

            return redirect(route('proyectos.index'));
        }

        $this->proyectosRepository->delete($id);

        Flash::success('Proyectos borrado correctamente.');
        Flash::success('Proyectos borrado correctamente.');

        return redirect(route('proyectos.index'));
    }
}
