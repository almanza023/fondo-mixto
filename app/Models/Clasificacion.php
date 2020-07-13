<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clasificacion extends Model
{
    protected $table = 'clasificaciones';

    protected $fillable = [
        'tipo_poblacion', 'status',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected $casts = ['status' => 'boolean'];

    public function poblaciones()
    {
        return $this->hasMany('App\Models\Poblacion');
    }

   
}
