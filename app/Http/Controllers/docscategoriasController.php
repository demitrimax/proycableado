<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatedocscategoriasRequest;
use App\Http\Requests\UpdatedocscategoriasRequest;
use App\Repositories\docscategoriasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Alert;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class docscategoriasController extends AppBaseController
{
    /** @var  docscategoriasRepository */
    private $docscategoriasRepository;

    public function __construct(docscategoriasRepository $docscategoriasRepo)
    {
        $this->docscategoriasRepository = $docscategoriasRepo;
        $this->middleware('permission:docscategorias-list');
        $this->middleware('permission:docscategorias-create', ['only' => ['create','store']]);
        $this->middleware('permission:docscategorias-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:docscategorias-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the docscategorias.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->docscategoriasRepository->pushCriteria(new RequestCriteria($request));
        $docscategorias = $this->docscategoriasRepository->all();

        return view('docscategorias.index')
            ->with('docscategorias', $docscategorias);
    }

    /**
     * Show the form for creating a new docscategorias.
     *
     * @return Response
     */
    public function create()
    {
        return view('docscategorias.create');
    }

    /**
     * Store a newly created docscategorias in storage.
     *
     * @param CreatedocscategoriasRequest $request
     *
     * @return Response
     */
    public function store(CreatedocscategoriasRequest $request)
    {
        $input = $request->all();

        $docscategorias = $this->docscategoriasRepository->create($input);

        Flash::success('Categoría de Documentos guardado correctamente.');
        Alert::success('Categoría de Documentos guardado correctamente.');

        return redirect(route('docscategorias.index'));
    }

    /**
     * Display the specified docscategorias.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $docscategorias = $this->docscategoriasRepository->findWithoutFail($id);

        if (empty($docscategorias)) {
            Flash::error('Categoría de Documentos no encontrado');
            Alert::error('Categoría de Documentos no encontrado.');

            return redirect(route('docscategorias.index'));
        }

        return view('docscategorias.show')->with('docscategorias', $docscategorias);
    }

    /**
     * Show the form for editing the specified docscategorias.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $docscategorias = $this->docscategoriasRepository->findWithoutFail($id);

        if (empty($docscategorias)) {
            Flash::error('Categoría de Documentos no encontrado');
            Alert::error('Categoría de Documentos no encontrado');

            return redirect(route('docscategorias.index'));
        }

        return view('docscategorias.edit')->with('docscategorias', $docscategorias);
    }

    /**
     * Update the specified docscategorias in storage.
     *
     * @param  int              $id
     * @param UpdatedocscategoriasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatedocscategoriasRequest $request)
    {
        $docscategorias = $this->docscategoriasRepository->findWithoutFail($id);

        if (empty($docscategorias)) {
            Flash::error('Categoría de Documentos no encontrado');
            Alert::error('Categoría de Documentos no encontrado');

            return redirect(route('docscategorias.index'));
        }

        $docscategorias = $this->docscategoriasRepository->update($request->all(), $id);

        Flash::success('Categoría de Documentos actualizado correctamente.');
        Alert::success('Categoría de Documentos correctamente.');

        return redirect(route('docscategorias.index'));
    }

    /**
     * Remove the specified docscategorias from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $docscategorias = $this->docscategoriasRepository->findWithoutFail($id);

        if (empty($docscategorias)) {
            Flash::error('Categoría de Documentos no encontrado');
            Alert::error('Categoría de Documentos no encontrado');

            return redirect(route('docscategorias.index'));
        }

        $this->docscategoriasRepository->delete($id);

        Flash::success('Categoría de Documentos borrado correctamente.');
        Alert::success('Categoría de Documentos borrado correctamente.');

        return redirect(route('docscategorias.index'));
    }
}
