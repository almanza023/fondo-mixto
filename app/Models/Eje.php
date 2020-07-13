<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Eje extends Model
{
    protected $table = 'ejes';

    protected $fillable = [
        'nombre_eje', 'nombre_programa',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function indicadores()
    {
        return $this->hasMany('App\Models\Indicador');
    }
}
