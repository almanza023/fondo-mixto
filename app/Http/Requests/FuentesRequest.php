<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FuentesRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'fuente_verificacion' => 'required|min:3',
        ];
    }

    public function attributes()
    {
        return [
            'fuente_verificacion' => 'Fuente de Verificación',
        ];
    }
}
