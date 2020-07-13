<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $table = 'proyectos';

    protected $fillable = [
        'solicitud_id',
        'descripcion',
        'titulo',
        'fecha_inicio',
        'fecha_final',
        'antecedentes',
        'justificacion',
        'metodologia',
        'objetivo_general',
        'objetivo_especifico',
        'metas',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function solicitud()
    {
        return $this->belongsTo('App\Models\Solicitud');
    }

    public function lineas()
    {
        return $this->belongsToMany('App\Models\Linea')->withTimestamps();
    }

    public function procesos()
    {
        return $this->belongsToMany('App\Models\Proceso')->withTimestamps();
    }

    public function procesoCurrent()
    {
        return $this->belongsToMany('App\Models\Proceso')->wherePivot('status', 1);
    }

    public function fuentes()
    {
        return $this->belongsToMany('App\Models\Fuente')->withTimestamps();
    }

    public function actividades()
    {
        return $this->hasMany('App\Models\Actividad');
    }

    public function historiales()
    {
        return $this->hasMany('App\Models\ProcesoProyecto');
    }

    public function presupuestos()
    {
        return $this->hasMany('App\Models\Presupuesto');
    }
}
