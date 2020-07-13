<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FuenteProyecto extends Model
{
    protected $table = 'fuente_proyecto';

    protected $fillable = [
        'proyecto_id', 'fuente_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function proyecto()
    {
        return $this->belongsTo('App\Models\Proyecto');
    }

    public function fuente()
    {
        return $this->belongsTo('App\Models\Fuente');
    }

}
