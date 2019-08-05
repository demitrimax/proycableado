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

        return redirect(route('empleados.index'));
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
}
