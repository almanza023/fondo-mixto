<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComprobanteRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
           'solicitud_id'=> 'required|integer',
           'banco'=> 'required|min:3',
           'beneficiario'=> 'required|min:3',
           'cheque' => 'required|min:3',
           'nit' => 'required|min:3',
           'fecha' => 'required',
           'concepto' => 'required',
           'valor' => 'required|integer',
           'por_servicio' => 'required',
           'ret_servicio' => 'required',
           'por_compra' => 'required',
           'ret_compra' => 'required',
           'por_papeleria' => 'required',
           'admin_papeleria' => 'required',
           'por_descuento' => 'required',
           'descuentos' => 'required',
           'subtotal' => 'required',
           'por_iva' => 'required',
           'iva' => 'required',
           'total' => 'required',
        ];
    }
    public function attributes(){
        return [
           'solicitud_id'=> 'SOLICITUD',
           'solicitud_id'=> 'BENEFICIARIO',
           'banco'=> 'BANCO',
           'cheque' => 'CHEQUE',
           'nit' => 'NIT',
           'fecha' => 'FECHA',
           'concepto' => 'CONCEPTO',
           'valor' => 'VALOR',
           'por_servicio' => 'PORCENTAJE  RETEFUENTE POR SERVICIO',
           'ret_servicio' => 'MENOS RETEFUENTE POR SERVICIO',
           'por_compra' => 'PORCENTAJE RETEFUENTE POR COMPRA',
           'ret_compra' => 'MENOS RETEFUENTE POR COMPRA',
           'por_papeleria' => 'PORCENTAJE ADMINISTRACIÓN Y PAPELERIA',
           'admin_papeleria' => 'ADMINISTRACIÓN Y PAPELERIA',
           'por_descuento' => 'PORCENTAJE DEDUCCIONES Y DESCUENTOS',
           'descuentos' => 'MENOS DEDUCCIONES Y DESCUENTOS',
           'subtotal' => 'SUBTOTAL',
           'por_iva' => 'PORCENTAJE IVA',
           'iva' => 'IVA',
           'total' => 'TOTAL',
        ];
    }
}
