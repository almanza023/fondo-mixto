<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Indicador extends Model
{
    protected $table = 'indicadores';

    protected $fillable = [
        'eje_id', 'nombre_indicador', 'meta', 'status',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected $casts = ['status'];

    public function eje()
    {
        return $this->belongsTo('App\Models\Eje');
    }

    public function periodos()
    {
        return $this->hasMany('App\Models\Periodo');
    }

    public function solicitudes()
    {
        return $this->belongsToMany('App\Models\Solicitud')->withTimestamps();
    }
   

    public function metas()
    {
        return $this->hasMany('App\Models\IndicadorMeta');
    }

}
