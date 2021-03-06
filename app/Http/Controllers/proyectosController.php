<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateproyectosRequest;
use App\Http\Requests\UpdateproyectosRequest;
use App\Repositories\proyectosRepository;
use App\Http\Controllers\AppBaseController;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Helper\Html as HtmlHelper;
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
use App\Models\proyectos;
use App\Models\catetapa;

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

        $proyectos = proyectos::where('etapa_id',1)->orderBy('estatus_id', 'asc')->orderBy('ftermino', 'asc')->get();

        if(isset($_GET['filtro']) && $_GET['filtro'] > 0  )
        {

          $mifiltro = $_GET['filtro'];
          $proyectos = proyectos::where('etapa_id', $mifiltro )->orderBy('estatus_id', 'asc')->orderBy('ftermino', 'asc')->get();
        }

        $etapas = catetapa::all();

        return view('proyectos.index')
            ->with(compact('proyectos', 'etapas'));
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

        /*$rules = [
          'fechas' => 'regex: '
        ];
        $this->validate($request, $rules);
        */
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
          $documento->categoria_id = 1;
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
        $activity = \Spatie\Activitylog\Models\Activity::where('subject_type', 'App\Models\proyectos')->where('subject_id', $id)->get();

        return view('proyectos.show')->with(compact('proyectos','categoriasdocs', 'activity'));
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

    public function cambioEtapa(Request $request, $id, $etapa)
    {
        $proyecto = proyectos::find($id);
        $etapasel = catetapa::find($etapa);
        if(empty($etapasel)){
          Alert::error('No se puede pasar a la etapa seleccionada, No existe!');
          Flash::error('No se puede pasar a la etapa seleccionada, No existe!');
          return back();
        }
        $etapa_anterior = $proyecto->etapa->nombre;
        $proyecto->etapa_id = $etapasel->id;
        $proyecto->save();

        activity()->performedOn($proyecto)
                  ->causedBy(Auth::user())
                  ->withProperties(['Etapa Anterior' => $etapa_anterior, 'Etapa Nueva' => $etapasel->nombre ])
                  ->log('cambio de etapa');

        Alert::success('Se cambió de etapa satisfactoriamente');
        Flash::success('Se cambió de etapa correctamente');
        return back();
    }

    public function agregarComentario(Request $request)
    {
      $input = $request->all();
      if(isset($input['comentario']) && $input['comentario'] != ''){
        $comentario = new \App\Models\proycomentarios;
        $comentario->proyecto_id = $input['proyecto_id'];
        $comentario->usuario_id = Auth::user()->id;
        $comentario->comentario = $input['comentario'];
        $comentario->save();
      } else
      {
        Alert::error('Tienes que escribir un comentario');
        Flash::error('Tienes que escribir un comentario');
        return back();
      }


      Alert::success('Se agregó un nuevo comentario satisfactoriamente');
      Flash::success('Se agregó un nuevo comentario satisfactoriamente');

      return back();
    }
    public function deleteComentario($id)
    {

      $comentario = \App\Models\proycomentarios::find($id);
      if(empty($comentario)){
        Alert::error('No se puede eliminar, el comentario no existe');
        Flash::error('No se puede eliminar, el comentario no existe');
        return back();
      }

      $comentario->delete();
      Alert::success('Se eliminó el comentario correctamente!');
      Flash::success('Se eliminó el comentario correctamente!');

      return back();
    }
    public function proyectosExcel()
    {
      $proyectos = proyectos::all();
      $reader = IOFactory::createReader('Xlsx');
      $spreadsheet = $reader->load(public_path() . '/excel_plantillas/formato_proyectos.xlsx');
      $spreadsheet->getProperties()->setCreator('grupo Ammex tec sur')
          ->setLastModifiedBy('Ammex')
          ->setTitle('Reporte de Proyectos')
          ->setSubject('Reporte de Proyectos')
          ->setDescription('Reporte de proyectos')
          ->setKeywords('proyectos, ammex')
          ->setCategory('PROYECTOS');
      $wizard = new HtmlHelper();

      $spreadsheet->getActiveSheet()->setCellValue('E4', date('d-m-Y'));
      $baseRow = 11;

      foreach ($proyectos as $key => $proyecto) {
        //
        $row = $baseRow + $key;
        $activity = \Spatie\Activitylog\Models\Activity::where('subject_type', 'App\Models\proyectos')
                                                        ->where('subject_id', $proyecto->id)
                                                        ->where('updated_at', $proyecto->updated_at)
                                                        ->first();
        if(!empty($activity)){
          $usuario = \App\User::find($activity->causer_id);
          $usuarionombre = $usuario->name;
        }
        else {
          $usuarionombre = 'Sin Registro';
        }


        $documentos = '';
        foreach($proyecto->documentos->unique('categoria') as $documento){
          $documentos .= $documento->categoria->nombre.', ';
        }
        $spreadsheet->getActiveSheet()->setCellValue('A' . $row, $proyecto->folio)
                                      ->setCellValue('B'.$row, $proyecto->etapa->nombre)
                                      ->setCellValue('C'.$row, $proyecto->nombre)
                                      ->setCellValue('D'.$row, $proyecto->supervisor)
                                      ->setCellValue('E'.$row, $proyecto->identificacion)
                                      ->setCellValue('F'.$row, $proyecto->identifi_text)
                                      ->setCellValue('G'.$row, $proyecto->pep)
                                      ->setCellValue('H'.$row, $proyecto->catproducto->nombre)
                                      ->setCellValue('I'.$row, $documentos)
                                      ->setCellValue('J'.$row, $proyecto->catestatus->nombre)
                                      ->setCellValue('K'.$row, $proyecto->estatusdate['descripcion'])
                                      ->setCellValue('L'.$row, $proyecto->updated_at)
                                      ->setCellValue('M'.$row, $usuarionombre );


      }

      // Redirect output to a client’s web browser (Xlsx)
      header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      header('Content-Disposition: attachment;filename="GrupoTecSur_'.date('dmY').'.xlsx"');
      header('Cache-Control: max-age=0');
      // If you're serving to IE 9, then the following may be needed
      header('Cache-Control: max-age=1');

      // If you're serving to IE over SSL, then the following may be needed
      header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
      header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
      header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
      header('Pragma: public'); // HTTP/1.0

      $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
      $writer->save('php://output');
      exit;
    }
}
