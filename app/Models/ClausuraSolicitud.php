<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClausuraSolicitud extends Model
{
    
    protected $table = 'clausura_solicitud';

    protected $fillable = [
        'motivo', 'solicitud_id'
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

   

    public function solicitud()
    {
        return $this->belongsTo('App\Models\Solicitud');
    }
}
