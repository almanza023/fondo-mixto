<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table = 'municipios';

    protected $fillable = [
        'departamento_id',
        'nombre_municipio',
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function departamento()
    {
        return $this->belongsTo('App\Models\Departamento');
    }

    public function solicitantes()
    {
        return $this->hasMany('App\Models\Solicitante');
    }

}
