<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
    protected $table = 'presupuestos';

    protected $fillable = [
        'proyecto_id',
        'rubro',
        'recurso_municipio',
        'fondo_mixto',
        'ministerio_cultura',
        'ingreso_propio',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function proyecto()
    {
        return $this->belongsTo('App\Models\Proyecto');
    }
}
