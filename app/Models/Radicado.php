<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Radicado extends Model
{
    use SoftDeletes;

    protected $table = 'radicados';

    protected $fillable = [
        'codigo_radicado',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected $dates = ['deleted_at'];

    public function solicitudes()
    {
        return $this->belongsToMany('App\Models\Solicitud', 'radicado_solicitud');
    }
}
