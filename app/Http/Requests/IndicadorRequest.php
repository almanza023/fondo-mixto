<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndicadorRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre_indicador' => 'required|min:3',
            'eje_id' => 'required|integer|exists:ejes,id',
            'meta' => 'required|integer|min:1',
        ];
    }

    public function attributes()
    {
        return [
            'nombre_indicador' => 'Nombre del indicador',
        ];
    }
}
