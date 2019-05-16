<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatedocumentosRequest;
use App\Http\Requests\UpdatedocumentosRequest;
use App\Repositories\documentosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Alert;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Support\Facades\Storage;
use App\Models\documentos;

class documentosController extends AppBaseController
{
    /** @var  documentosRepository */
    private $documentosRepository;

    public function __construct(documentosRepository $documentosRepo)
    {
        $this->documentosRepository = $documentosRepo;
        $this->middleware('permission:documentos-list');
        $this->middleware('permission:documentos-create', ['only' => ['create','store']]);
        $this->middleware('permission:documentos-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:documentos-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the documentos.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->documentosRepository->pushCriteria(new RequestCriteria($request));
        $documentos = $this->documentosRepository->all();

        return view('documentos.index')
            ->with('documentos', $documentos);
    }

    /**
     * Show the form for creating a new documentos.
     *
     * @return Response
     */
    public function create()
    {
        return view('documentos.create');
    }

    /**
     * Store a newly created documentos in storage.
     *
     * @param CreatedocumentosRequest $request
     *
     * @return Response
     */
    public function store(CreatedocumentosRequest $request)
    {
        $rules = [
          'nombre_doc' => 'required|file',
        ];
        $this->validate($request, $rules);

        $input = $request->all();

        //$documentos = $this->documentosRepository->create($input);

        $documentos = new documentos;

        $documento = $request->file('nombre_doc')->store('documentos');
        $documentos->file_servidor = $documento;
        $documentos->nombre_doc = $request->file('nombre_doc')->getClientOriginalName();
        $documentos->descripcion = $request->input('descripcion');
        $documentos->save();

        Flash::success('Documentos guardado correctamente.');
        Alert::success('Documentos guardado correctamente.');

        if( isset($input['redirect'])) {

          if(isset($input['proyecto_id'])){
            $proyecto_id = $input['proyecto_id'];
            $proyecto = proyectos::find($proyecto_id);
            $documentos->proyecto()->attach($proyecto);
            $modelo_id = $proyecto_id;
          }

          $redirect = $input['redirect'];
          return redirect(route($redirect,[$modelo_id]));
        }

        return redirect(route('documentos.index'));
    }

    /**
     * Display the specified documentos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $documentos = $this->documentosRepository->findWithoutFail($id);

        if (empty($documentos)) {
            Flash::error('Documentos no encontrado');
            Alert::error('Documentos no encontrado.');

            return redirect(route('documentos.index'));
        }

        return view('documentos.show')->with('documentos', $documentos);
    }

    /**
     * Show the form for editing the specified documentos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $documentos = $this->documentosRepository->findWithoutFail($id);

        if (empty($documentos)) {
            Flash::error('Documentos no encontrado');
            Alert::error('Documentos no encontrado');

            return redirect(route('documentos.index'));
        }

        return view('documentos.edit')->with('documentos', $documentos);
    }

    /**
     * Update the specified documentos in storage.
     *
     * @param  int              $id
     * @param UpdatedocumentosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatedocumentosRequest $request)
    {
        $documentos = $this->documentosRepository->findWithoutFail($id);

        if (empty($documentos)) {
            Flash::error('Documentos no encontrado');
            Alert::error('Documentos no encontrado');

            return redirect(route('documentos.index'));
        }

        $documentos = $this->documentosRepository->update($request->all(), $id);

        Flash::success('Documentos actualizado correctamente.');
        Alert::success('Documentos actualizado correctamente.');

        return redirect(route('documentos.index'));
    }

    /**
     * Remove the specified documentos from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $documentos = $this->documentosRepository->findWithoutFail($id);

        if (empty($documentos)) {
            Flash::error('Documentos no encontrado');
            Alert::error('Documentos no encontrado');

            return redirect(route('documentos.index'));
        }

        $this->documentosRepository->delete($id);

        Flash::success('Documentos borrado correctamente.');
        Flash::success('Documentos borrado correctamente.');

        return redirect(route('documentos.index'));
    }
}
