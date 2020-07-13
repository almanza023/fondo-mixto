<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidatePoblacionRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'poblacion' => 'required|exists:poblaciones,id',
            'total' => 'required|integer',
            'fuente_verificacion' => 'required|exists:fuentes,id',
        ];
    }

    public function messages()
    {
        return [
            'poblacion.exists' => 'Escoja una opcion valida para el campo :attribute',
            'fuente_verificacion.exists' => 'Escoja una opcion valida para el campo :attribute',
        ];
    }

    public function attributes()
    {
        return [
            'poblacion' => 'Poblacion',
            'total' => 'Total',
            'fuente_verificacion' => 'Fuente Verificacion',
        ];
    }
}
