<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatecatareaciudadRequest;
use App\Http\Requests\UpdatecatareaciudadRequest;
use App\Repositories\catareaciudadRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Alert;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class catareaciudadController extends AppBaseController
{
    /** @var  catareaciudadRepository */
    private $catareaciudadRepository;

    public function __construct(catareaciudadRepository $catareaciudadRepo)
    {
        $this->catareaciudadRepository = $catareaciudadRepo;
        $this->middleware('permission:catareaciudads-list');
        $this->middleware('permission:catareaciudads-create', ['only' => ['create','store']]);
        $this->middleware('permission:catareaciudads-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:catareaciudads-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the catareaciudad.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->catareaciudadRepository->pushCriteria(new RequestCriteria($request));
        $catareaciudads = $this->catareaciudadRepository->all();

        return view('catareaciudads.index')
            ->with('catareaciudads', $catareaciudads);
    }

    /**
     * Show the form for creating a new catareaciudad.
     *
     * @return Response
     */
    public function create()
    {
        return view('catareaciudads.create');
    }

    /**
     * Store a newly created catareaciudad in storage.
     *
     * @param CreatecatareaciudadRequest $request
     *
     * @return Response
     */
    public function store(CreatecatareaciudadRequest $request)
    {
        $input = $request->all();

        $catareaciudad = $this->catareaciudadRepository->create($input);

        Flash::success('Catareaciudad guardado correctamente.');
        Alert::success('Catareaciudad guardado correctamente.');

        return redirect(route('catareaciudads.index'));
    }

    /**
     * Display the specified catareaciudad.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $catareaciudad = $this->catareaciudadRepository->findWithoutFail($id);

        if (empty($catareaciudad)) {
            Flash::error('Catareaciudad no encontrado');
            Alert::error('Catareaciudad no encontrado.');

            return redirect(route('catareaciudads.index'));
        }

        return view('catareaciudads.show')->with('catareaciudad', $catareaciudad);
    }

    /**
     * Show the form for editing the specified catareaciudad.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $catareaciudad = $this->catareaciudadRepository->findWithoutFail($id);

        if (empty($catareaciudad)) {
            Flash::error('Catareaciudad no encontrado');
            Alert::error('Catareaciudad no encontrado');

            return redirect(route('catareaciudads.index'));
        }

        return view('catareaciudads.edit')->with('catareaciudad', $catareaciudad);
    }

    /**
     * Update the specified catareaciudad in storage.
     *
     * @param  int              $id
     * @param UpdatecatareaciudadRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecatareaciudadRequest $request)
    {
        $catareaciudad = $this->catareaciudadRepository->findWithoutFail($id);

        if (empty($catareaciudad)) {
            Flash::error('Catareaciudad no encontrado');
            Alert::error('Catareaciudad no encontrado');

            return redirect(route('catareaciudads.index'));
        }

        $catareaciudad = $this->catareaciudadRepository->update($request->all(), $id);

        Flash::success('Catareaciudad actualizado correctamente.');
        Alert::success('Catareaciudad actualizado correctamente.');

        return redirect(route('catareaciudads.index'));
    }

    /**
     * Remove the specified catareaciudad from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $catareaciudad = $this->catareaciudadRepository->findWithoutFail($id);

        if (empty($catareaciudad)) {
            Flash::error('Catareaciudad no encontrado');
            Alert::error('Catareaciudad no encontrado');

            return redirect(route('catareaciudads.index'));
        }

        $this->catareaciudadRepository->delete($id);

        Flash::success('Catareaciudad borrado correctamente.');
        Flash::success('Catareaciudad borrado correctamente.');

        return redirect(route('catareaciudads.index'));
    }
}
