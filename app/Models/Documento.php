<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Documento extends Model
{
    use SoftDeletes;

    protected $table = 'documentos';

    protected $fillable = [
        'tipo_documento', 'categoria',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected $dates = ['deleted_at'];

    public function solicitudes()
    {
        return $this->belongsToMany('App\Models\Solicitud', 'anexos');
    }
}
