<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RadicadoSolicitud extends Model
{
    protected $table = 'radicado_solicitud';

    protected $fillable = [
        'radicado_id', 'solicitud_id', 'status', 'descripcion', 'tipo_radicado',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function radicado()
    {
        return $this->belongsTo('App\Models\Radicado');
    }

    public function solicitud()
    {
        return $this->belongsTo('App\Models\Solicitud');
    }
}
