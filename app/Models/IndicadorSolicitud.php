<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndicadorSolicitud extends Model
{
    
    protected $table = 'indicador_solicitud';

    protected $fillable = [
        'indicador_id', 'solicitud_id'
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function indicador()
    {
        return $this->belongsTo('App\Models\Indicador');
    }

    public function solicitud()
    {
        return $this->belongsTo('App\Models\Solicitud');
    }
}
