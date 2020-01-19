<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatecatetapaRequest;
use App\Http\Requests\UpdatecatetapaRequest;
use App\Repositories\catetapaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Alert;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class catetapaController extends AppBaseController
{
    /** @var  catetapaRepository */
    private $catetapaRepository;

    public function __construct(catetapaRepository $catetapaRepo)
    {
        $this->catetapaRepository = $catetapaRepo;
        $this->middleware('permission:catetapas-list');
        $this->middleware('permission:catetapas-create', ['only' => ['create','store']]);
        $this->middleware('permission:catetapas-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:catetapas-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the catetapa.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->catetapaRepository->pushCriteria(new RequestCriteria($request));
        $catetapas = $this->catetapaRepository->all();

        return view('catetapas.index')
            ->with('catetapas', $catetapas);
    }

    /**
     * Show the form for creating a new catetapa.
     *
     * @return Response
     */
    public function create()
    {
        return view('catetapas.create');
    }

    /**
     * Store a newly created catetapa in storage.
     *
     * @param CreatecatetapaRequest $request
     *
     * @return Response
     */
    public function store(CreatecatetapaRequest $request)
    {
        $input = $request->all();

        $catetapa = $this->catetapaRepository->create($input);

        Flash::success('Catetapa guardado correctamente.');
        Alert::success('Catetapa guardado correctamente.');

        return redirect(route('catetapas.index'));
    }

    /**
     * Display the specified catetapa.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $catetapa = $this->catetapaRepository->findWithoutFail($id);

        if (empty($catetapa)) {
            Flash::error('Catetapa no encontrado');
            Alert::error('Catetapa no encontrado.');

            return redirect(route('catetapas.index'));
        }

        return view('catetapas.show')->with('catetapa', $catetapa);
    }

    /**
     * Show the form for editing the specified catetapa.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $catetapa = $this->catetapaRepository->findWithoutFail($id);

        if (empty($catetapa)) {
            Flash::error('Catetapa no encontrado');
            Alert::error('Catetapa no encontrado');

            return redirect(route('catetapas.index'));
        }

        return view('catetapas.edit')->with('catetapa', $catetapa);
    }

    /**
     * Update the specified catetapa in storage.
     *
     * @param  int              $id
     * @param UpdatecatetapaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecatetapaRequest $request)
    {
        $catetapa = $this->catetapaRepository->findWithoutFail($id);

        if (empty($catetapa)) {
            Flash::error('Catetapa no encontrado');
            Alert::error('Catetapa no encontrado');

            return redirect(route('catetapas.index'));
        }

        $catetapa = $this->catetapaRepository->update($request->all(), $id);

        Flash::success('Catetapa actualizado correctamente.');
        Alert::success('Catetapa actualizado correctamente.');

        return redirect(route('catetapas.index'));
    }

    /**
     * Remove the specified catetapa from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $catetapa = $this->catetapaRepository->findWithoutFail($id);

        if (empty($catetapa)) {
            Flash::error('Catetapa no encontrado');
            Alert::error('Catetapa no encontrado');

            return redirect(route('catetapas.index'));
        }

        $this->catetapaRepository->delete($id);

        Flash::success('Catetapa borrado correctamente.');
        Alert::success('Catetapa borrado correctamente.');

        return redirect(route('catetapas.index'));
    }
}
