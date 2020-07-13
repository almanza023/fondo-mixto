<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ObservacionSolicitud extends Model
{
    
    protected $table = 'observacion_solicitudes';

    protected $fillable = [
        'solicitud_id', 'estado', 'actividades', 'pago', 'valor', 'observaciones'
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    
    public function solicitud()
    {
        return $this->belongsTo('App\Models\Solicitud');
    }
}
