<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleado extends Model
{
    use SoftDeletes;

    protected $table = 'empleados';

    protected $fillable = [
        'nid', 'nombre', 'apellido', 'email', 'celular', 'is_jefe',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected $dates = ['deleted_at'];

    protected $appends = ['name_complete'];

    protected $casts = ['is_jefe' => 'boolean'];

    public function user()
    {
        return $this->hasOne('App\User', 'empleado_id');
    }

    public function historyDependencias()
    {
        return $this->hasMany('App\Models\DependenciaEmpleado');
    }

    public function dependencias()
    {
        return $this->belongsToMany('App\Models\Dependencia', 'dependencia_empleado', 'empleado_id', 'dependencia_id')
            ->withPivot('id', 'motivo', 'fecha_salida', 'status')
            ->withTimestamps();
    }

    public function currentDependencia()
    {
        return $this->belongsToMany('App\Models\Dependencia')->wherePivot('status', 1)->withPivot('id', 'motivo', 'fecha_salida', 'status');
    }

    public function getNameCompleteAttribute()
    {
        return "{$this->nombre} {$this->apellido}";
    }

    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = ucwords($value);
    }

    public function setApellidoAttribute($value)
    {
        $this->attributes['apellido'] = ucwords($value);
    }

}
