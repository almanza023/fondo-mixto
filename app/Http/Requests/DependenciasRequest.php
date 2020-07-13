<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DependenciasRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre_dependencia' => 'required|min:3',
            'descripcion' => 'required|min:5',
        ];
    }

    public function attributes()
    {
        return [
            'nombre_dependencia' => 'Nombre de la Dependencia',
            'descripcion' => 'Descripción',
        ];
    }
}
