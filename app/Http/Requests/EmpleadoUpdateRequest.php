<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadoUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nid' => 'required|min:3|integer',
            'nombre' => 'required|min:3',
            'apellido' => 'required|min:3',
            'email' => 'required|min:3',
            'celular' => 'required|min:3',
        ];
    }

    public function attributes()
    {
        return [
            'nid' => 'Numero Identificacion',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'email' => 'Correo Electronico',
        ];
    }
}
