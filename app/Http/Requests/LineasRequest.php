<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LineasRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre_linea' => 'required:min:3',
            'descripcion' => 'required:min:3',
        ];
    }

    public function attributes()
    {
        return [
            'nombre_linea' => 'Nombre de la línea',
            'descripcion' => 'Descripción',
        ];
    }
}
