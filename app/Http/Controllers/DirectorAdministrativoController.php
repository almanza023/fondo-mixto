<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProyectoRequest;
use App\Http\Requests\ValidateActividadRequest;
use App\Http\Requests\ValidatePoblacionRequest;
use App\Http\Requests\ValidatePresupuestoRequest;
use App\Http\Requests\ValidateSolicitudRequest;
use App\Models\Actividad;
use App\Models\Anexo;
use App\Models\Categoria;
use App\Models\Clasificacion;
use App\Models\ClausuraSolicitud;
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
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;

class DirectorAdministrativoController extends Controller
{

    protected $repository;

    public function __construct(SolicitudRepository $repository)
    {
        $this->middleware('auth');
        //$this->middleware('administrador')->only(['index', 'store', 'storeProyecto', 'storeFile']);
        $this->repository = $repository;
    }

    public function index()
    {
        $documentos=Documento::all();   
        $solicitudes = $this->repository->buildQuery('Verificación Director Administrativo')->get();

        if (request()->ajax()) {

            $solicitudes = $this->repository->buildQuery('Verificación Director Administrativo')->get();

            if (count($solicitudes) == 0) {
                return response()->json(['warning' => 'ERROR EN EL SERVIDOR']);
            } else {
                return response()->view('ajax.table-solicitudes-director', compact('solicitudes'));
            }
        }

        return view('director.index', compact('solicitudes', 'documentos'));

    }

    public function edit($id){
        $documentos = Documento::all(['id', 'tipo_documento', 'categoria']);
        $clasificaciones = Clasificacion::with('poblaciones:id,clasificacion_id,detalle')->get(['id', 'tipo_poblacion']);
        $poblaciones = Poblacion::get(['id', 'detalle', 'clasificacion_id']);
        $categorias = Categoria::all(['id', 'tipo_solicitud']);
        $lineas = Linea::all(['id', 'nombre_linea', 'descripcion']);
        $solicitantes = Solicitante::all(['id', 'razon_social', 'nombre', 'apellido']);
        $fuentes = Fuente::all(['id', 'fuente_verificacion']);
        $solicitud=Solicitud::find($id);
        $anexos=Anexo::where('solicitud_id', $id)->get();       
        return view('director.edit', compact('solicitud', 'categorias',
         'documentos', 'clasificaciones', 'fuentes', 'solicitantes', 'anexos'));
    }



    public function show($id)
    {
        if (request()->ajax()) {
            $solicitud = $this->repository->findSolicitudNormal($id);
            $historials=Historial::where('solicitud_id', $id)->get();       
            $anexos=Anexo::where('solicitud_id', $id)->get();

            if ($solicitud->categoria->tipo_solicitud == 'Proyecto') {
                $solicitud = $this->repository->findSolicitudProject($id);

            }
            return response()->view('ajax.detail-director', compact('solicitud', 'historials', 'anexos'));
        }


    
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
            
          $exito=Presupuesto::create([
                'proyecto_id' => $request->proyecto_id,
                'rubro' => '0',
                'recurso_municipio' => $request->recurso_municipio,
                'fondo_mixto' => $request->fondo_mixto,
                'ministerio_cultura' => $request->ministerio_cultura,
                'ingreso_propio' => $request->ingreso_propio,
            ]);
            if($exito){
                return response()->json(['success' => 'PRESUPUESTO REGISTRADO EXITOSAMENTE']);
            }
            return response()->json(['warning' => 'ERROR AL REGISTRAR PRESUPUESTO']);
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

   

    public function storeFile(Request $request)
    {
       
        $obj=Anexo::where('documento_id', $request->documento_id)
        ->where('solicitud_id', $request->solicitud_id)->get();
        $num=count($obj);
        if($num ==0){
        $path= public_path() . '/documentos/solicitudes/'. $request->solicitud_id;
        $carpeta = File::makeDirectory($path, $mode = 0777, true, true);        
        $anexo= new Anexo();
        $anexo->documento_id=$request->documento_id;
        $anexo->solicitud_id=$request->solicitud_id;
        $anexo->status=1;
        $anexo->date=Carbon::now()->format('Y-m-d');
        if ($request->file('archivo')) {
            $doc=Documento::find($request->documento_id);     
            $file = $request->file('archivo');
            $name = $doc->tipo_documento.'.'. $file->getClientOriginalExtension();
            $file->move($path, $name);
            $anexo->name = $name;         
            $anexo->save();
            return response()->json(['success' => 'DOCUMENTO CARGADO EXITOSAMENTE']);
        }else {
            return response()->json(['success' => 'NO EXISTE DOCUMENTO']);
        }
        
        }else {
            return response()->json(['warning' => 'ESTE DOCUMENTO YA FUE CARGADO']);
        }
    }

    
    public function deleteActividad($id, $ids){
       
        $act=Actividad::find($id)->delete();
        
        if($act){
        return redirect()->route('director.edit', $ids)->with(['succes'=>'ACTIVIDAD ELIMINADA EXITOSAMENTE']);

        }      
        return redirect()->route('director.edit', $ids)->with(['waring'=>'ERROR AL ELIMINAR ACTIVIDAD']);

    }

    public function deletePresupuesto($id, $ids){       
        $act=Presupuesto::find($id)->delete();        
        if($act){
        return redirect()->route('director.edit', $ids)->with(['succes'=>'PRESUPUESTO ELIMINADO EXITOSAMENTE']);

        }      
        return redirect()->route('director.edit', $ids)->with(['waring'=>'ERROR AL ELIMINAR PRESUPUESTO']);

    }

    public function deleteAnexo($ida, $ids){
         
        $path= public_path() . '/documentos/solicitudes/'. $ids;             
        $anexo=Anexo::find($ida);
        if(File::exists($path.'/'.$anexo->name)){
            File::delete($path.'/'.$anexo->name);
           
        }
        $anexo->delete();
        
        if($anexo){
        return redirect()->route('director.edit', $ids)->with(['succes'=>'PRESUPUESTO ELIMINADO EXITOSAMENTE']);

        }      
        return redirect()->route('director.edit', $ids)->with(['waring'=>'ERROR AL ELIMINAR PRESUPUESTO']);

    }

    public function storeClausura(Request $request){
         
        if(!empty($request->motivo)){
            $clausura=ClausuraSolicitud::create($request->all());
             
        if($clausura){
            return response()->json(['success' => 'CLAUSURA DE SOLICITUD CARGADA EXITOSAMENTE']);
    
            }      
            return response()->json(['warning' => 'ERROR AL REGISTRAR DATOS']);
        }
       

    else {
        return response()->json(['warning' => 'CAMPO MOTIVO ES OBLIGATORIO']);
    }
}


}


