<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PoblacionSolicitud extends Model
{
    protected $table = 'poblacion_solicitud';

    protected $fillable = [
        'poblacion_id', 'solicitud_id', 'numero_persona',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function poblacion()
    {
        return $this->belongsTo('App\Models\Poblacion');
    }

    public function solicitud()
    {
        return $this->belongsTo('App\Models\Solicitud');
    }
}
