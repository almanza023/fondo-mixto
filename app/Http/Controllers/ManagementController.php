<?php

namespace App\Http\Controllers;

use App\Http\Requests\ObservacionRequest;
use App\Models\Historial;
use App\Models\Indicador;
use App\Models\ObservacionSolicitud;
use App\Models\Proyecto;
use App\Models\Solicitud;
use App\Repositories\SolicitudRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManagementController extends Controller
{

    protected $repository;

    public function __construct(SolicitudRepository $repository)
    {
        $this->repository = $repository;
        $this->middleware(['auth', 'gerencia']);
    }

    public function index()
    {

        $solicitudes = $this->repository->buildQuery('Verificacion Gerencia')->get();

        if (request()->ajax()) {

            $solicitudes = $this->repository->buildQuery('Verificacion Gerencia')->get();

            if (count($solicitudes) == 0) {
                return response()->json(['warning' => 'ERROR EN EL SERVIDOR']);
            } else {
                return response()->view('ajax.table-solicitudes-management', compact('solicitudes'));
            }

        }
        $indicadores=Indicador::all(['id', 'nombre_indicador']);

        return view('management.index', compact('solicitudes', 'indicadores'));

    }

    public function show($id)
    {
        if (request()->ajax()) {

            $historials=Historial::where('solicitud_id', $id)->get();
            
            $solicitud = $this->repository->findSolicitudNormal($id);

            if ($solicitud->categoria->tipo_solicitud == 'Proyecto') {

                $solicitud = $this->repository->findSolicitudProject($id);

            }

            return response()->view('ajax.detail-management', compact('solicitud', 'historials'));
        }
    }

    public function approveSolicitud($id)
    {
        if (request()->ajax()) {

            $solicitud = Solicitud::findOrFail($id);

            $proyecto = Proyecto::find($solicitud->proyecto->id);

            if ($this->repository->validateProcesos($proyecto->historiales, 'Proceso de Aprobacion') && !$this->repository->validateProcesos($proyecto->historiales, 'Aprobado')) {

                DB::beginTransaction();
                try {

                    $this->repository->updateProcesos($proyecto, 'Aprobado', 'Proyecto Aprobado');

                    DB::commit();

                    return response()->json(['success' => 'PROYECTO APROBADO CON EXITO!', 'status' => 'Aprobado', 'solicitud' => $id]);
                } catch (\Exception $ex) {
                    DB::rollback();
                    return response()->json(['warning' => 'OOPS! ERROR DEL SERVIDOR']);
                }

            } else {
                return response()->json(['warning' => 'ESTE PROYECTO YA FUE APROBADO']);
            }
        }

    }

    public function denySolicitud($id)
    {
        if (request()->ajax()) {

            $solicitud = Solicitud::findOrFail($id);

            $proyecto = Proyecto::find($solicitud->proyecto->id);

            if ($this->repository->validateProcesos($proyecto->historiales, 'Proceso Rechazado') && !$this->repository->validateProcesos($proyecto->historiales, 'Rechazado')) {

                DB::beginTransaction();
                try {

                    $this->repository->updateProcesos($proyecto, 'Rechazado', 'Proyecto Rechazado');

                    DB::commit();

                    return response()->json(['success' => 'PROYECTO RECHAZADO CON EXITO!', 'status' => 'Aprobado', 'solicitud' => $id]);
                } catch (\Exception $ex) {
                    DB::rollback();
                    return response()->json(['warning' => 'OOPS! ERROR DEL SERVIDOR']);
                }

            } else {
                return response()->json(['warning' => 'ESTE PROYECTO YA FUE RECHAZADO']);
            }
        }

    }

    public function storeObservaciones(ObservacionRequest $request)
    {
        if (request()->ajax()) {           
                $obs=ObservacionSolicitud::create($request->all());
                if($obs){
                    return response()->json(['success' => 'DATOS REGISTRADOS CON EXITO CON EXITO']);
                }else {
                return response()->json(['warning' => 'ERROR AL REGISTRAR OBSERVACIONES']);

                }
                
        }
            
     } 
     

}
