<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{

    protected $table = 'actividades';

    protected $fillable = [
       'proyecto_id', 'nombre_actividad', 'fecha_inicio', 'fecha_final'
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];


    public function proyecto()
    {
        return $this->belongsTo('App\Models\Proyecto');
    }

}
