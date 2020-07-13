<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PoblacionRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'clasificacion_id' => 'required',
            'detalle' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'clasificacion_id' => 'Clasificación',
            'detalle' => 'Detalle',

        ];

    }
}
