<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndicadorMetaRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'indicador_id' => 'required|integer',
            'year' => 'required|integer',
            'cantidad' => 'required|integer',
        ];
    }

    public function attributes()
    {
        return [
            'indicador_id' => 'Indicador',
            'year' => 'Año',
            'cantidad' => 'Cantidad',
        ];
    }
}
