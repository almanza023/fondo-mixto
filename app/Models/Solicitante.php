<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Solicitante extends Model
{
    use SoftDeletes;

    protected $table = 'solicitantes';

    protected $fillable = [
        'municipio_id',
        'persona_id',
        'proponente_id',
        'nid',
        'nombre',
        'apellido',
        'razon_social',
        'email',
        'direccion',
        'celular',
        'representante_legal',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected $appends = ['name_complete'];

    protected $dates = ['deleted_at'];

    public function getNameCompleteAttribute()
    {
        return "{$this->nombre} {$this->apellido}";
    }

    public function setRazonSocialAttribute($value)
    {
        $this->attributes['razon_social'] = strtoupper($value);
    }

    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = strtoupper($value);
    }

    public function setApellidoAttribute($value)
    {
        $this->attributes['apellido'] = strtoupper($value);
    }

    

    public function municipio()
    {
        return $this->belongsTo('App\Models\Municipio');
    }

    public function persona()
    {
        return $this->belongsTo('App\Models\Persona');
    }

    public function proponente()
    {
        return $this->belongsTo('App\Models\proponente');
    }

    public function solicitudes()
    {
        return $this->hasMany('App\Models\Solicitud');
    }

}
