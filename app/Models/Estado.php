<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estados';

    protected $fillable = [
        'nombre_estado', 'status',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function solicitudes()
    {
        return $this->belongsToMany('App\Models\Solicitud', 'historiales');
    }

    public function scopeEstado($query, $estado)
    {
        return $query->where('nombre_estado', $estado);
    }
}
