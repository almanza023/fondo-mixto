<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fuente extends Model
{
    protected $table = 'fuentes';

    protected $fillable = [
        'fuente_verificacion',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function proyectos()
    {
        return $this->belongsToMany('App\Models\Proyecto');
    }

}
