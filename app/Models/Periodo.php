<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    protected $table = 'periodos';

    protected $fillable = [
        'indicador_id',
        'fecha_inicio',
        'fecha_final',
        'cantidad',
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function indicador()
    {
        return $this->belongsTo('App\Models\Indicador');
    }

}
