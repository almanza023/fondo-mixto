<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comprobante extends Model
{
    protected $table = 'comprobantes';

    protected $fillable = [
        'solicitud_id', 'banco', 'beneficiario', 'fecha', 'cheque', 'nit', 'ret_servicio', 'ret_compra', 'admin_papeleria'
        ,'concepto', 'por_compra', 'por_servicio', 'por_papeleria', 'por_descuento', 'valor',  'descuentos', 'subtotal', 'total', 'por_iva', 'iva'
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

   
    
    
    public function setBancoAttribute($value)
    {
        $this->attributes['banco'] = strtoupper ($value);
    }

    public function setConceptoAttribute($value)
    {
        $this->attributes['concepto'] = strtoupper ($value);
    }

   
}
