<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatecatpaisdivisionRequest;
use App\Http\Requests\UpdatecatpaisdivisionRequest;
use App\Repositories\catpaisdivisionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Alert;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class catpaisdivisionController extends AppBaseController
{
    /** @var  catpaisdivisionRepository */
    private $catpaisdivisionRepository;

    public function __construct(catpaisdivisionRepository $catpaisdivisionRepo)
    {
        $this->catpaisdivisionRepository = $catpaisdivisionRepo;
        $this->middleware(['auth']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
        $this->middleware('permission:catpaisdivisions-list');
        $this->middleware('permission:catpaisdivisions-create', ['only' => ['create','store']]);
        $this->middleware('permission:catpaisdivisions-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:catpaisdivisions-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the catpaisdivision.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->catpaisdivisionRepository->pushCriteria(new RequestCriteria($request));
        $catpaisdivisions = $this->catpaisdivisionRepository->all();

        return view('catpaisdivisions.index')
            ->with('catpaisdivisions', $catpaisdivisions);
    }

    /**
     * Show the form for creating a new catpaisdivision.
     *
     * @return Response
     */
    public function create()
    {
        return view('catpaisdivisions.create');
    }

    /**
     * Store a newly created catpaisdivision in storage.
     *
     * @param CreatecatpaisdivisionRequest $request
     *
     * @return Response
     */
    public function store(CreatecatpaisdivisionRequest $request)
    {
        $input = $request->all();

        $catpaisdivision = $this->catpaisdivisionRepository->create($input);

        Flash::success('Pais-División Guardado correctamente.');
        Alert::success('Pais-División Guardado correctamente.');

        return redirect(route('catpaisdivisions.index'));
    }

    /**
     * Display the specified catpaisdivision.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $catpaisdivision = $this->catpaisdivisionRepository->findWithoutFail($id);

        if (empty($catpaisdivision)) {
            Flash::error('Pais-División no encontrado');
            Alert::error('Pais-División no encontrado');

            return redirect(route('catpaisdivisions.index'));
        }

        return view('catpaisdivisions.show')->with('catpaisdivision', $catpaisdivision);
    }

    /**
     * Show the form for editing the specified catpaisdivision.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $catpaisdivision = $this->catpaisdivisionRepository->findWithoutFail($id);

        if (empty($catpaisdivision)) {
          Flash::error('Pais-División no encontrado');
          Alert::error('Pais-División no encontrado');

            return redirect(route('catpaisdivisions.index'));
        }

        return view('catpaisdivisions.edit')->with('catpaisdivision', $catpaisdivision);
    }

    /**
     * Update the specified catpaisdivision in storage.
     *
     * @param  int              $id
     * @param UpdatecatpaisdivisionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecatpaisdivisionRequest $request)
    {
        $catpaisdivision = $this->catpaisdivisionRepository->findWithoutFail($id);

        if (empty($catpaisdivision)) {
          Flash::error('Pais-División no encontrado');
          Alert::error('Pais-División no encontrado');

            return redirect(route('catpaisdivisions.index'));
        }

        $catpaisdivision = $this->catpaisdivisionRepository->update($request->all(), $id);

        Flash::success('Pais-División actualizado correctamente.');
        Alert::success('Pais-División actualizado correctamente.');

        return redirect(route('catpaisdivisions.index'));
    }

    /**
     * Remove the specified catpaisdivision from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $catpaisdivision = $this->catpaisdivisionRepository->findWithoutFail($id);

        if (empty($catpaisdivision)) {
          Flash::error('Pais-División no encontrado');
          Alert::error('Pais-División no encontrado');

            return redirect(route('catpaisdivisions.index'));
        }

        $this->catpaisdivisionRepository->delete($id);

        Flash::success('Pais-División borrado correctamente.');
        Alert::success('Pais-División borrado correctamente.');

        return redirect(route('catpaisdivisions.index'));
    }
}
