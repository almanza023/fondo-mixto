<?php

namespace App\Repositories;

use App\Models\Estado;
use App\Models\Proceso;
use App\Models\Radicado;
use App\Models\Solicitud;
use Illuminate\Support\Facades\Auth;

class SolicitudRepository
{

    public function buildQuery($status)
    {
        return Solicitud::with('categoria:id,tipo_solicitud',
            'solicitante:id,nombre,apellido,razon_social,persona_id',
            'solicitante.persona:id,tipo_persona')
            ->whereHas('estados', function ($query) use ($status) {
                $query->where('nombre_estado', $status);
            });

    }

    public function findSolicitudNormal($id)
    {
        return Solicitud::where('id', $id)->with('solicitante:id,nombre,apellido,razon_social,persona_id',
            'solicitante.persona:id,tipo_persona',
            'categoria:id,tipo_solicitud', 'radicadoCurrent')
            ->first();
    }

    public function findSolicitudProject($id)
    {
        return Solicitud::where('id', $id)->with('solicitante:id,nombre,apellido,razon_social,persona_id',
            'categoria:id,tipo_solicitud',
            'proyecto.actividades', 'proyecto.presupuestos', 'proyecto.procesoCurrent' ,'radicadoCurrent', 'poblaciones.clasificacion', 'documentos')
            ->first();
    }

    public function addStatusSolicitud($solicitud, $estado, $descripcion)
    {
        $estado = Estado::estado($estado)->first();
        $solicitud->estados()->attach($estado->id, ['user_id' => Auth::id(), 'status' => 1, 'descripcion' => $descripcion]);
    }

    public function storeRadicado()
    {
        $radicado = new Radicado;
        $radicado->codigo_radicado = auth()->id() + time();
        $radicado->save();

        return $radicado;
    }

    
    

    public function findHistoriesStatus($id)
    {
        return Solicitud::where('id', $id)->with('historiales.estado')->first(['id']);
    }

    public function validateStatus($histories, $status)
    {
        foreach ($histories as $history) {
            if ($history->estado->nombre_estado == $status) {
                return true;
            }
        }
        return false;
    }

    public function validateProcesos($histories, $status)
    {
        foreach ($histories as $history) {
            if ($history->proceso->nombre_proceso == $status) {
                return true;
            }
        }
        return false;
    }

    public function updateStatus($solicitud, $status, $descripcion)
    {
        foreach ($solicitud->historiales as $history) {
            $solicitud->estados()->updateExistingPivot($history->estado_id, ['status' => 0]);
        }

        $this->addStatusSolicitud($solicitud, $status, $descripcion);

    }

    public function updateProcesos($proyecto, $status, $descripcion)
    {
        foreach ($proyecto->historiales as $history) {
            $proyecto->procesos()->updateExistingPivot($history->proceso_id, ['status' => 0]);
        }

        $this->addStatusProyecto($proyecto, $status, $descripcion);

    }

    public function addStatusProyecto($proyecto, $status, $descripcion)
    {
        $proceso = Proceso::proceso($status)->first();
        $proyecto->procesos()->attach($proceso->id, ['status' => 1, 'descripcion' => $descripcion]);
    }

}
