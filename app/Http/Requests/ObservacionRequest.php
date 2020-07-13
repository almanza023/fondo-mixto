<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ObservacionRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'solicitud_id' => 'required|integer',
            'estado' => 'required|integer',            
            'pago' => 'required',
            'valor' => 'required',            
        ];
    }

    public function attributes()
    {
        return [
            'solicitud_id' => 'Solicitud ',
            'estado' => 'Estado',
            'pago' => 'Forma de pago',
            'valor' => 'Valor',            
        ];
    }
}
