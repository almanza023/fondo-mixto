<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndicadorMeta extends Model
{
    
    protected $table = 'indicador_metas';

    protected $fillable = [
        'indicador_id', 'year', 'cantidad'
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function indicador()
    {
        return $this->belongsTo('App\Models\Indicador');
    }

    

    
}
