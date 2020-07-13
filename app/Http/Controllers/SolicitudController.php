<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProyectoRequest;
use App\Http\Requests\ValidateActividadRequest;
use App\Http\Requests\ValidatePoblacionRequest;
use App\Http\Requests\ValidatePresupuestoRequest;
use App\Http\Requests\ValidateSolicitudRequest;
use App\Models\Actividad;
use App\Models\Categoria;
use App\Models\Clasificacion;
use App\Models\Documento;
use App\Models\Fuente;
use App\Models\Historial;
use App\Models\Linea;
use App\Models\Poblacion;
use App\Models\Presupuesto;
use App\Models\Proceso;
use App\Models\Proyecto;
use App\Models\Solicitante;
use App\Models\Solicitud;
use App\Repositories\SolicitudRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;

class SolicitudController extends Controller
{

    protected $repository;

    public function __construct(SolicitudRepository $repository)
    {
        $this->middleware('auth');
        $this->middleware('recepcion')->only(['index', 'store', 'storeProyecto', 'storeFile']);
        $this->repository = $repository;
    }

    public function index()
    {

        $documentos = Documento::all(['id', 'tipo_documento', 'categoria']);
        $clasificaciones = Clasificacion::with('poblaciones:id,clasificacion_id,detalle')->get(['id', 'tipo_poblacion']);
        $poblaciones = Poblacion::get(['id', 'detalle', 'clasificacion_id']);
        $categorias = Categoria::all(['id', 'tipo_solicitud']);
        $lineas = Linea::all(['id', 'nombre_linea', 'descripcion']);
        $solicitantes = Solicitante::all(['id', 'razon_social', 'nombre', 'apellido']);
        $fuentes = Fuente::all(['id', 'fuente_verificacion']);

        $solicitudes = $this->repository->buildQuery('Recepcion Entrada')->get();

        if (request()->ajax()) {

            $solicitudes = $this->repository->buildQuery('Recepcion Entrada')->get();

            if (count($solicitudes) == 0) {
                return response()->json(['warning' => 'Error en el servidor']);
            } else {
                return response()->view('ajax.table-solicitudes', compact('solicitudes'));
            }

        }
        return view('solicitud.index', compact('categorias', 'solicitudes', 'solicitantes', 'lineas', 'poblaciones', 'clasificaciones', 'fuentes', 'documentos'));
    }

    public function archivo()    {

        $solicitudes = $this->repository->buildQuery('Archivado')->get();
        if (request()->ajax()) {
            $solicitudes = $this->repository->buildQuery('Archivado')->get();

            if (count($solicitudes) == 0) {
                return response()->json(['warning' => 'Error en el servidor']);
            } else {
                return response()->view('ajax.table-solicitudes-archivo', compact('solicitudes'));
            }

        }
        return view('archivo.index', compact('solicitudes'));
    } 

    public function store(Request $request)
    {
        if (request()->ajax()) {

            $name = "";

            $solicitud = new Solicitud;

            $solicitud = $this->createObjectSolicitud($request, $solicitud);

            DB::beginTransaction();
            try {

                $solicitud->save();

                $name = $this->storeFile($request, $solicitud);

                if ($solicitud->categoria->tipo_solicitud == 'Proyecto') {
                    $this->storeProyecto($request, $solicitud);
                }

                if ($request->total) {
                    $this->storePoblacion($request, $solicitud);
                }

                $this->repository->addStatusSolicitud($solicitud, 'Recepción Entrada', 'Solicitud Ingresada por Recepcion');

                $radicado = $this->repository->storeRadicado();
                $solicitud->radicados()->attach($radicado->id, ['status' => 1, 'descripcion' => 'Radicado de Entrada', 'tipo_radicado'=>$request->tipo_radicado]);

                DB::commit();

                return response()->json(['success' => 'SOLICITUD CREADA CON EXITO!']);

            } catch (\Exception $ex) {
                DB::rollback();
                \File::delete(public_path() . '/documentos/solicitudes/' . $name);

                return response()->json(['warning' => $ex->getMessage()]);
            }

        }

    }

    public function show($id)
    {
        if (request()->ajax()) {

            $solicitud = $this->repository->findSolicitudNormal($id);

            if ($solicitud->categoria->tipo_solicitud == 'Proyecto') {

                $solicitud = $this->repository->findSolicitudProject($id);

            }

            return response()->view('ajax.detail-solicitud', compact('solicitud'));
        }
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function validateSolicitud(ValidateSolicitudRequest $request)
    {
        return response()->json(['success' => 'OK']);
    }

    public function validateFormato(ProyectoRequest $request)
    {
        return response()->json(['success' => 'OK']);
    }

    public function validatePoblacion(ValidatePoblacionRequest $request)
    {
        return response()->json(['success' => 'OK']);
    }

    public function validateActividad(ValidateActividadRequest $request)
    {
               
        $nombre_actividad = $request->nombre_actividad;
        $fecha_ini = $request->fecha_inicio;
        $fecha_final = $request->fecha_final;

        
          $exito=Actividad::create([
                'proyecto_id' => $request->proyecto_id,
                'nombre_actividad' => $nombre_actividad,
                'fecha_inicio' => $fecha_ini,
                'fecha_final' => $fecha_final,
            ]);
            if($exito){
                return response()->json(['success' => 'ACTIVIDAD REGISTRADA EXITOSAMENTE']);
            }
            return response()->json(['warning' => 'ERROR AL REGISTRAR ACTIVIDAD']);
           
       
       
    }

    public function validatePresupuesto(ValidatePresupuestoRequest $request)
    {
        return response()->json(['success' => 'OK']);
    }

    public function sendManagement($id)
    {
        if (request()->ajax()) {

            $solicitud = $this->repository->findHistoriesStatus($id);

            if ($this->repository->validateStatus($solicitud->historiales, 'Recepción Entrada')) {

                DB::beginTransaction();
                try {
                    $this->repository->updateStatus($solicitud, 'Verificacion Gerencia', 'Solicitud Enviada A Gerencia');
                    DB::commit();
                    return response()->json(['success' => 'SOLICITUD ENVIADA CON EXITO!']);
                } catch (\Exception $ex) {
                    DB::rollback();
                    return response()->json(['warning' => 'OOPS! ERROR DEL SERVIDOR']);
                }
            } else {
                return response()->json(['warning' => 'ESTA SOLICITUD YA FUE ENVIADA']);
            }
        }

    }

    //Metodo de enviar a recepcion
  public function enviarRecepcion($id)
  {
      if (request()->ajax()) {

          $solicitud = $this->repository->findHistoriesStatus($id);

              DB::beginTransaction();
              try {
                  $this->repository->updateStatus($solicitud, 'Recepción Entrada', 'Solicitud Ingresada por Recepcion');
                  DB::commit();
                  return response()->json(['success' => 'SOLICITUD ENVIADA CON EXITO!']);
              } catch (\Exception $ex) {
                  DB::rollback();
                  return response()->json(['warning' => 'OOPS! ERROR DEL SERVIDOR']);
              }

      }

  }


  //Metodo de enviar a ASISTENTE
  public function enviarAsistente($id)
  {
      if (request()->ajax()) {

          $solicitud = $this->repository->findHistoriesStatus($id);

              DB::beginTransaction();
              try {
                  $this->repository->updateStatus($solicitud, 'Verificacion Asistente', 'Solicitud Enviada a Asistente Administrativo');
                  DB::commit();
                  return response()->json(['success' => 'SOLICITUD ENVIADA CON EXITO!']);
              } catch (\Exception $ex) {
                  DB::rollback();
                  return response()->json(['warning' => 'OOPS! ERROR DEL SERVIDOR']);
              }

      }

  }

     //Metodo de enviar a director administrativo
     public function enviarDirector($id)
     {
         if (request()->ajax()) {
   
             $solicitud = $this->repository->findHistoriesStatus($id);
   
                 DB::beginTransaction();
                 try {
                     $this->repository->updateStatus($solicitud, 'Verificación Director Administrativo', 'Solicitud Ingresada a dirección administrativa');
                     DB::commit();
                     return response()->json(['success' => 'SOLICITUD ENVIADA CON EXITO!']);
                 } catch (\Exception $ex) {
                     DB::rollback();
                     return response()->json(['warning' => 'OOPS! ERROR DEL SERVIDOR']);
                 }
   
         }
   
     }

  //Metodo de enviar a juridica
  public function enviarJuridica($id)
  {
      if (request()->ajax()) {

          $solicitud = $this->repository->findHistoriesStatus($id);

              DB::beginTransaction();
              try {
                  $this->repository->updateStatus($solicitud, 'Recepcion Juridica', 'Solicitud Enviada A Juridica');
                  DB::commit();
                  return response()->json(['success' => 'SOLICITUD ENVIADA CON EXITO!']);
              } catch (\Exception $ex) {
                  DB::rollback();
                  return response()->json(['warning' => 'OOPS! ERROR DEL SERVIDOR']);
              }
      }

  }

  


 //Metodo de enviar a proyectos
 public function enviarProyectos($id)
 {
     if (request()->ajax()) {

         $solicitud = $this->repository->findHistoriesStatus($id);

             DB::beginTransaction();
             try {
                 $this->repository->updateStatus($solicitud, 'Verificacion Proyecto', 'Solicitud Enviada A Proyectos');
                 DB::commit();
                 return response()->json(['success' => 'SOLICITUD ENVIADA CON EXITO!']);
             } catch (\Exception $ex) {
                 DB::rollback();
                 return response()->json(['warning' => 'OOPS! ERROR DEL SERVIDOR']);
             }
     }

 }

  //Metodo de enviar a proyectos
  public function enviarArchivo($id)
  {
      if (request()->ajax()) {
 
          $solicitud = $this->repository->findHistoriesStatus($id);
 
              DB::beginTransaction();
              try {
                  $this->repository->updateStatus($solicitud, 'Archivado', 'Solicitud Enviada A Archivo');
                  DB::commit();
                  return response()->json(['success' => 'SOLICITUD ENVIADA CON EXITO!']);
              } catch (\Exception $ex) {
                  DB::rollback();
                  return response()->json(['warning' => 'OOPS! ERROR DEL SERVIDOR']);
              }
      }
 
  }

    public function createObjectSolicitud($request, $solicitud)
    {

        $solicitud->categoria_id = $request->categoria_id;
        $solicitud->solicitante_id = $request->solicitante_id;
        $solicitud->status = 1;
        $solicitud->descripcion = $request->descripcion_solicitud;

        return $solicitud;

    }

    public function storeFile($request, $solicitud)
    {
        if ($request->file('archivo_solicitud')) {
            $path= public_path() . '/documentos/solicitudes/'. $solicitud->id;
            File::makeDirectory($path, $mode = 0777, true, true);   
            $file = $request->file('archivo_solicitud');
            $name = time() . $file->getClientOriginalName();
            $file->move($path, $name);
            $solicitud->archivo = $name;
            $solicitud->save();
            return $name;
        }
        return "";
    }

    public function storePoblacion($request, $solicitud)
    {
        $total = $request->total;
        $poblaciones = $request->id_poblacion;

        for ($i = 0; $i < count($total); $i++) {
            $solicitud->poblaciones()->attach($poblaciones[$i], ['numero_persona' => $total[$i]]);
        }
    }

    public function storeProyecto($request, $solicitud)
    {
        $proyecto = new Proyecto;

        $proyecto->solicitud_id = $solicitud->id;
        $proyecto->descripcion = '';
        $proyecto->titulo = strtoupper ($request->descripcion_solicitud);
        $proyecto->fecha_inicio = $request->fecha_ini;
        $proyecto->fecha_final = $request->fecha_fin;
        $proyecto->antecedentes = $request->antecedentes;
        $proyecto->justificacion = $request->justificacion;
        $proyecto->metodologia = $request->metodologia;
        $proyecto->objetivo_general = $request->objetivo_general;
        $proyecto->objetivo_especifico = $request->objetivo_especifico;
        $proyecto->metas = $request->metas;

        $proyecto->save();

        $lineas = $request->id_linea;
        $fuentes = $request->fuente_verificacion;

       

        
        $presupuestos = [];

        /* Guardar Actividades
        $actividades = [];
        $nombre_actividad = $request->nombre_actividad;
        $fecha_ini = $request->fecha_inicio;
        $fecha_final = $request->fecha_final;

        for ($i = 0; $i < count($nombre_actividad); $i++) {
            $actividades[] = new Actividad([
                'nombre_actividad' => $nombre_actividad[$i],
                'fecha_inicio' => $fecha_ini[$i],
                'fecha_final' => $fecha_final[$i],
            ]);
        }
*/
        $rubros = $request->rubro;
        $recursoMunicipio = $request->recurso_municipio;
        $fondoMixto = $request->fondo_mixto;
        $ministerio = $request->ministerio_cultura;
        $ingreso = $request->ingreso_propio;
        
        

        for ($i = 0; $i < count($rubros); $i++) {
            $presupuestos[] = new Presupuesto([
                'rubro' => $rubros[$i],
                'recurso_municipio' => $recursoMunicipio[$i],
                'fondo_mixto' => $fondoMixto[$i],
                'ministerio_cultura' => $ministerio[$i],
                'ingreso_propio' => $ingreso[$i],
            ]);
        }

        //$proyecto->actividades()->saveMany($actividades);
        $proyecto->presupuestos()->saveMany($presupuestos);

        $proceso = Proceso::proceso('Proceso de Aprobacion')->first();

        $proyecto->procesos()->attach($proceso->id, ['status' => 1, 'descripcion' => 'Solicitud de Proyecto en espera de Aprobacion']);

    }


}
