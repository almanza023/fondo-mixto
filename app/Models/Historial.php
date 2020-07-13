<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    protected $table = 'historiales';

    protected $fillable = [
        'user_id', 'solicitud_id', 'estado_id', 'descripcion', 'status',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function solicitud()
    {
        return $this->belongsTo('App\Models\Solicitud');
    }

    public function estado()
    {
        return $this->belongsTo('App\Models\Estado');
    }
}
