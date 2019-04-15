<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatecatproductosRequest;
use App\Http\Requests\UpdatecatproductosRequest;
use App\Repositories\catproductosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Alert;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class catproductosController extends AppBaseController
{
    /** @var  catproductosRepository */
    private $catproductosRepository;

    public function __construct(catproductosRepository $catproductosRepo)
    {
        $this->catproductosRepository = $catproductosRepo;
        $this->middleware('permission:catproductos-list');
        $this->middleware('permission:catproductos-create', ['only' => ['create','store']]);
        $this->middleware('permission:catproductos-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:catproductos-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the catproductos.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->catproductosRepository->pushCriteria(new RequestCriteria($request));
        $catproductos = $this->catproductosRepository->all();

        return view('catproductos.index')
            ->with('catproductos', $catproductos);
    }

    /**
     * Show the form for creating a new catproductos.
     *
     * @return Response
     */
    public function create()
    {
        return view('catproductos.create');
    }

    /**
     * Store a newly created catproductos in storage.
     *
     * @param CreatecatproductosRequest $request
     *
     * @return Response
     */
    public function store(CreatecatproductosRequest $request)
    {
        $input = $request->all();

        $catproductos = $this->catproductosRepository->create($input);

        Flash::success('Producto guardado correctamente.');
        Alert::success('Producto guardado correctamente.');

        return redirect(route('catproductos.index'));
    }

    /**
     * Display the specified catproductos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $catproductos = $this->catproductosRepository->findWithoutFail($id);

        if (empty($catproductos)) {
            Flash::error('Producto no encontrado');
            Alert::error('Producto no encontrado.');

            return redirect(route('catproductos.index'));
        }

        return view('catproductos.show')->with('catproductos', $catproductos);
    }

    /**
     * Show the form for editing the specified catproductos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $catproductos = $this->catproductosRepository->findWithoutFail($id);

        if (empty($catproductos)) {
            Flash::error('Producto no encontrado');
            Alert::error('Producto no encontrado');

            return redirect(route('catproductos.index'));
        }

        return view('catproductos.edit')->with('catproductos', $catproductos);
    }

    /**
     * Update the specified catproductos in storage.
     *
     * @param  int              $id
     * @param UpdatecatproductosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecatproductosRequest $request)
    {
        $catproductos = $this->catproductosRepository->findWithoutFail($id);

        if (empty($catproductos)) {
            Flash::error('Producto no encontrado');
            Alert::error('Producto no encontrado');

            return redirect(route('catproductos.index'));
        }

        $catproductos = $this->catproductosRepository->update($request->all(), $id);

        Flash::success('Producto actualizado correctamente.');
        Alert::success('Producto actualizado correctamente.');

        return redirect(route('catproductos.index'));
    }

    /**
     * Remove the specified catproductos from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $catproductos = $this->catproductosRepository->findWithoutFail($id);

        if (empty($catproductos)) {
            Flash::error('Producto no encontrado');
            Alert::error('Producto no encontrado');

            return redirect(route('catproductos.index'));
        }

        $this->catproductosRepository->delete($id);

        Flash::success('Producto borrado correctamente.');
        Flash::success('Producto borrado correctamente.');

        return redirect(route('catproductos.index'));
    }
}
