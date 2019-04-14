<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatecontratistasRequest;
use App\Http\Requests\UpdatecontratistasRequest;
use App\Repositories\contratistasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Alert;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class contratistasController extends AppBaseController
{
    /** @var  contratistasRepository */
    private $contratistasRepository;

    public function __construct(contratistasRepository $contratistasRepo)
    {
        $this->contratistasRepository = $contratistasRepo;
        $this->middleware('permission:contratistas-list');
        $this->middleware('permission:contratistas-create', ['only' => ['create','store']]);
        $this->middleware('permission:contratistas-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:contratistas-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the contratistas.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->contratistasRepository->pushCriteria(new RequestCriteria($request));
        $contratistas = $this->contratistasRepository->all();

        return view('contratistas.index')
            ->with('contratistas', $contratistas);
    }

    /**
     * Show the form for creating a new contratistas.
     *
     * @return Response
     */
    public function create()
    {
        return view('contratistas.create');
    }

    /**
     * Store a newly created contratistas in storage.
     *
     * @param CreatecontratistasRequest $request
     *
     * @return Response
     */
    public function store(CreatecontratistasRequest $request)
    {
        $input = $request->all();

        $contratistas = $this->contratistasRepository->create($input);

        Flash::success('Contratistas guardado correctamente.');
        Alert::success('Contratistas guardado correctamente.');

        return redirect(route('contratistas.index'));
    }

    /**
     * Display the specified contratistas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contratistas = $this->contratistasRepository->findWithoutFail($id);

        if (empty($contratistas)) {
            Flash::error('Contratistas no encontrado');
            Alert::error('Contratistas no encontrado.');

            return redirect(route('contratistas.index'));
        }

        return view('contratistas.show')->with('contratistas', $contratistas);
    }

    /**
     * Show the form for editing the specified contratistas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contratistas = $this->contratistasRepository->findWithoutFail($id);

        if (empty($contratistas)) {
            Flash::error('Contratistas no encontrado');
            Alert::error('Contratistas no encontrado');

            return redirect(route('contratistas.index'));
        }

        return view('contratistas.edit')->with('contratistas', $contratistas);
    }

    /**
     * Update the specified contratistas in storage.
     *
     * @param  int              $id
     * @param UpdatecontratistasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecontratistasRequest $request)
    {
        $contratistas = $this->contratistasRepository->findWithoutFail($id);

        if (empty($contratistas)) {
            Flash::error('Contratistas no encontrado');
            Alert::error('Contratistas no encontrado');

            return redirect(route('contratistas.index'));
        }

        $contratistas = $this->contratistasRepository->update($request->all(), $id);

        Flash::success('Contratistas actualizado correctamente.');
        Alert::success('Contratistas actualizado correctamente.');

        return redirect(route('contratistas.index'));
    }

    /**
     * Remove the specified contratistas from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contratistas = $this->contratistasRepository->findWithoutFail($id);

        if (empty($contratistas)) {
            Flash::error('Contratistas no encontrado');
            Alert::error('Contratistas no encontrado');

            return redirect(route('contratistas.index'));
        }

        $this->contratistasRepository->delete($id);

        Flash::success('Contratistas borrado correctamente.');
        Flash::success('Contratistas borrado correctamente.');

        return redirect(route('contratistas.index'));
    }
}
