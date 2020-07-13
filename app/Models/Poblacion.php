<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poblacion extends Model
{
    protected $table = 'poblaciones';

    protected $fillable = [
        'clasificacion_id', 'detalle',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function solicitudes()
    {
        return $this->belongsToMany('App\Models\Solicitud', 'poblacion_solicitud');
    }

    public function clasificacion()
    {
        return $this->belongsTo('App\Models\Clasificacion');
    }
}
